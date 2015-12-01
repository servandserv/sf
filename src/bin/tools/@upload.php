<?php

require_once __DIR__.'/../../../conf/bootstrap.php';

define("ROTATED_DIR","/tmp/SF/rotated");
define("CROPED_DIR","/tmp/SF/croped");
define("IMAGES_DIR","/var/www/localhost/htdocs/sfdev/web/images");

array_shift( $argv );
$base = dirname( dirname( __FILE__ ) );
$imports = array();
$pcount = 0;
$data = $years = $leagues = $links = [];
$start = isset($argv[0]) ? intval( $argv[0] ) : 0;
$end = isset($argv[1]) ? intval( $argv[1] ) : 10000000;
$passwd = $argv[2];

//print $start.$end.$passwd;exit;

$fullname = CROPED_DIR;
$fullname = preg_replace('/\/{2,}/','/',$fullname);

if( is_dir( $fullname ) ) {
    $dir = new RecursiveDirectoryIterator( $fullname );
    foreach( new RecursiveIteratorIterator( $dir ) as $val ) {
        if( $val->isFile() && !strpos(strtolower($val->getPathname()),"._") && (
            $val->isFile() && strpos(strtolower($val->getPathname()),".jpg") != 0 ||
            $val->isFile() && strpos(strtolower($val->getPathname()),".gif") != 0 ||
            $val->isFile() && strpos(strtolower($val->getPathname()),".jpeg") != 0 ||
            $val->isFile() && strpos(strtolower($val->getPathname()),".JPG") != 0 ||
            $val->isFile() && strpos(strtolower($val->getPathname()),".JPEG") != 0 ||
            $val->isFile() && strpos(strtolower($val->getPathname()),".png") != 0 ) ) {
            
            $docpath = str_replace(dirname(dirname($val->getPathname()))."/","",dirname($val->getPathname()));
            if( intval( $docpath ) >= $start && intval( $docpath ) <= $end ) {
                //echo $docpath."\n";
                $parts = pathinfo($val->getPathname());
                if(strstr($val->getPathname(),"back")) {
                    $imports[$docpath]["backs"][] = $parts["filename"];
                } else {
                    $imports[$docpath]["faces"][] = $parts["filename"];
                }
                /*if( count($imports[$docpath]["backs"]) > 0 ) {
                    print "More then one back in $docpath.";
                    exit;
                }*/
                $meta = ROTATED_DIR."/".$docpath."/".$parts["filename"].".meta.txt";
                // Сохраним старые комментарии если они есть
                if( file_exists( $meta ) ) {
                    $imports[$docpath]["comments"] = preg_replace( array("/\\n/","/ {1,}/"), array(" "," "), htmlspecialchars( file_get_contents( $meta ) ) );
                } else {
                    $imports[$docpath]["comments"] = "";
                }
            }
        }
    }
}
//print_r($imports);
//exit;
// сохраняем
$dsn = "mysql:host=localhost;dbname=archive";
$opt = array(
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
try {
	$conn = new PDO($dsn,'servandserv',$passwd,$opt);
} catch (PDOException $e) {
	die('Connection error: '.$e->getMessage());
}
$docs = [];
try {
    foreach($imports as $docpath=>$data) {
        $doc = new \Archive\Port\Adaptor\Data\Archive\Documents\Document();
        // проверим есть ли уже в базе сведения о таком документе
        // если есть то будем обновлять данные по файлам не трогая другую информацию
        $params = array($docpath);
        $query = "select `res`.`xmlview` from `resources` as `res` left join `documents_keys` as `keys` on `keys`.`documentId`=`res`.`id` where `keys`.`type`='document' and `keys`.`path`=?";
        $sth = $conn->prepare($query);
        $sth->execute($params);
        if( $row = $sth->fetch() ) {
            $doc->fromXmlStr($row["xmlview"]);
            $doc->setPath($docpath);
        } else {
            $doc->setPath($docpath);
        }
        if(!$doc->getComments()&&$data["comments"]) $doc->setComments($data["comments"]);
        $count = 0;
        foreach( $data["faces"] as $face ) {
            $docs[$docpath]["files"][$count]["face"] = $face;
            if(isset($data["backs"][$count]) ) {
                $docs[$docpath]["files"][$count]["back"] = $data["backs"][$count];
            }
            $count++;
        }
        $oldFiles = $doc->getPage();
        $files = [];
        foreach($docs[$docpath]["files"] as $file) {
            $fs = new \Archive\Port\Adaptor\Data\Archive\Documents\Page();
            foreach($oldFiles as $oldFile) {
                if( $oldFile->getFace() == $file["face"] ) {
                    $fs->setComments($oldFile->getComments());
                    // obverse/reverse
                    if($obv = $oldFile->getObverse()) $fs->setObverse($obv);
                    if($rev = $oldFile->getReverse()) $fs->setReverse($rev);
                }
            }
            //$fs->setFace( $file["face"] );
            //if(!$fs->getObverse()) {
                $obv = new \Archive\Port\Adaptor\Data\Archive\Documents\Page\Obverse();
                $obv->setName( $file["face"] );
                $large = new \Archive\Port\Adaptor\Data\Archive\Documents\SideType\Large();
                $imageinfo = getimagesize(IMAGES_DIR."/archive/".$docpath."/".$file["face"].".large.jpg");
                $large->setSrc("/archive/".$docpath."/".$file["face"].".large.jpg");
                $large->setWidth($imageinfo[0]);
                $large->setHeight($imageinfo[1]);
                $large->setSize(filesize(IMAGES_DIR."/archive/".$docpath."/".$file["face"].".large.jpg"));
                $obv->setLarge($large);
                
                $thumb = new \Archive\Port\Adaptor\Data\Archive\Documents\SideType\Thumb();
                $imageinfo = getimagesize(IMAGES_DIR."/archive/".$docpath."/".$file["face"].".thumb.640x.jpg");
                $thumb->setSrc("/archive/".$docpath."/".$file["face"].".thumb.640x.jpg");
                $thumb->setWidth($imageinfo[0]);
                $thumb->setHeight($imageinfo[1]);
                $thumb->setSize(filesize(IMAGES_DIR."/archive/".$docpath."/".$file["face"].".thumb.640x.jpg"));
                $obv->setThumb($thumb);
                $fs->setObverse($obv);
            //}
            if(isset($file["back"])) {
                //if(!$fs->getReverse()) {
                    $rev = new \Archive\Port\Adaptor\Data\Archive\Documents\Page\Reverse();
                    $rev->setName( $file["back"] );
                    $large = new \Archive\Port\Adaptor\Data\Archive\Documents\SideType\Large();
                    $imageinfo = getimagesize(IMAGES_DIR."/archive/".$docpath."/".$file["back"].".large.jpg");
                    $large->setSrc("/archive/".$docpath."/".$file["back"].".large.jpg");
                    $large->setWidth($imageinfo[0]);
                    $large->setHeight($imageinfo[1]);
                    $large->setSize(filesize(IMAGES_DIR."/archive/".$docpath."/".$file["back"].".large.jpg"));
                    $rev->setLarge($large);
                
                    $thumb = new \Archive\Port\Adaptor\Data\Archive\Documents\SideType\Thumb();
                    $imageinfo = getimagesize(IMAGES_DIR."/archive/".$docpath."/".$file["back"].".thumb.640x.jpg");
                    $thumb->setSrc("/archive/".$docpath."/".$file["back"].".thumb.640x.jpg");
                    $thumb->setWidth($imageinfo[0]);
                    $thumb->setHeight($imageinfo[1]);
                    $thumb->setSize(filesize(IMAGES_DIR."/archive/".$docpath."/".$file["back"].".thumb.640x.jpg"));
                    $rev->setThumb($thumb);
                    $fs->setReverse($rev);
                //}
                //$fs->setBack($file["back"]);
            }
            $files[$file["face"]] = $fs;
        }
        ksort($files);
        $doc->setPageArray($files);
        $docs[$docpath] = $doc;
        //print $doc->toJSON()."\n";exit;
    }
    ksort($docs);
} catch(\Exception $e) {
    print $e->getMessage();
    print_r($data);
    exit;
}
//print "sdsds";exit;
/*
$str="";
foreach($docs as $k=>$doc) {
    $str.="$k: ".$doc->toJSON()."\n";
}
file_put_contents("files.txt",$str);
exit;
*/

$query = "SELECT `autoid` FROM `resources` ORDER BY `autoid` DESC LIMIT 0,1";
$params = array();
$sth = $conn->prepare($query);
$sth->execute($params);
if($row = $sth->fetch()) {
    print "Последний ресурс - ".$row["autoid"]."\n";
}

$new=0;
foreach($docs as $docpath=>$doc) {
    if($doc->getID()) {
        $query = "UPDATE `resources` SET `xmlview`=:xmlview WHERE `id`=:id;";
        $params = array(
            ":id"=>$doc->getID(),
            ":xmlview"=>$doc->toXmlStr()
        );
        $sth = $conn->prepare($query);
        $sth->execute($params);
        
    } else {
        $doc->setID(\Archive\Infrastructure\Helpers\UUID::generate());
        
        try {
			$conn->beginTransaction();
        
            $query = "INSERT INTO `resources` ( `id`, `type`, `uniqueId`,`xmlview` ) VALUES ( :id, :type, :uniqueId, :xmlview );";
            $params = array(
                ":id"=>$doc->getID(),
                ":type"=>"document",
                ":uniqueId"=>sha1($doc->getPath()),
                ":xmlview"=>$doc->toXmlStr()
            );
            $sth = $conn->prepare($query);
            $sth->execute($params);
        
            $query = "INSERT INTO `documents_keys` ( `documentId`, `type`, `path`,`published`,`year` ) VALUES ( :id, :type, :path, :published, :year );";
            $params = array(
                ":id"=>$doc->getID(),
                ":type"=>0,
                ":path"=>$doc->getPath(),
                ":published"=>0,
                ":year"=>""
            );
            $sth1 = $conn->prepare($query);
            $sth1->execute($params);
        
            $conn->commit();
        } catch(\Exception $e) {
			$conn->rollback();
			die($e->getMessage());
		}
        $new++;
    }
}

print( "Total ".count($docs).", new ".$new );