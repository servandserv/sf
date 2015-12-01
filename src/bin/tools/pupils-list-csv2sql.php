<?php

// 1097;;;Malcolm Saunders;Malcolm Saunders;;;M G;George;Saunders;01/01/1896;1026
// yearEntered;yearLeft;null;null;FullName;Esq;Deceased;initials;FirstName;LastName;DOB;rollNo

array_shift( $argv );
$pcount = 0;
$persons = $forms = $links = $doubles = $uniques = [];
foreach( $argv as $file ) {
    // распарсим загруженный файл
    $lines = file( $file );
    $count = count( $lines );
    for( $i = 0; $i < $count; $i++ ) {
        $pcount++;
        //$line = iconv( "windows-1251", "UTF-8", $lines[$i] );
        $el = preg_split( "/[;\n\r]/", $lines[$i], -1);
        for( $j = 0; $j < count( $el ); $j++ ) {
            $el[$j] = trim( $el[$j] );
        }
        
        if(!isYear($el[0]) || !isYear($el[0]) || !isDOB($el[10]) || count($el) != 13) {
            print("Error in $file line $i ".print_r($el,true));
            exit;
        }
        
        if($el[0] && $el[1] && $el[1] < $el[0]) {
            print("Error in $file line $i ".print_r($el,true));
            exit;
        }
        
        
        $el[12] = gen_uuid();
        
        $persons[] = $el;
    }
}

$uniques = [];
// clean the tables
//$sql = "DELETE FROM `resources` WHERE type='person' AND id IN (SELECT `source` FROM `links` WHERE `type` = 'pupil');";
//$sql .= "DELETE FROM `persons_keys` WHERE personId IN (SELECT `source` FROM `links` WHERE `type` = 'pupil');";
$sql = "DELETE FROM `resources` WHERE `type`='person';";
$sql .= "DELETE FROM `persons_keys`;";
$sql .= "DELETE FROM `links` WHERE `type`='pupil';";
$sql .= "INSERT INTO `resources` (id,type,uniqueId,xmlview) VALUES \n";

foreach($persons as $p) {
    if($p[10]!=null) {
        $d = explode("/",$p[10]);
        $p[10] = $d[2]."-".$d[1]."-".$d[0];
    }
    $uniqueId = sha1($p[4].$p[11]);
    if(!isset($uniques[$uniqueId])) {
        $uniques[$uniqueId] = $p[4];
    } else {
        print "dublicate key $uniqueId for ".$p[4];exit;
    }
    $sql .= "(";
    $sql .= "\"".$p[12]."\",";
    $sql .= "\"person\",";
    $sql .= "\"".$uniqueId."\",";
    $xw = new \XMLWriter();
    $xw->openMemory();
    $xw->setIndent(false);
    //$xw->setIndentString(' ');
    $xw->startDocument('1.0', 'UTF-8');
    $xw->startElementNS(null,"Person","urn:com:summerfields:Archive:Persons");
    $xw->writeElement("ID",$p[12]);
    $xw->writeElement("fullName",trim($p[4]));
    $xw->writeElement("esq",$p[5]==="Esq" ?1:0);
    $xw->writeElement("deceased",$p[6]==="DECEASED"?1:0);
    $xw->writeElement("initials",trim($p[7]));
    $xw->writeElement("middleNames",trim($p[8]));
    $xw->writeElement("lastName",trim($p[9]));
    $xw->writeElement("DOB",$p[10]);
    $xw->writeElement("rollNo",$p[11]);
    $xw->endElement();
    $xw->endDocument();
    $sql .= "\"".mysql_escape_string($xw->flush())."\"),\n";
}

$sql = substr($sql,0,-2).";";

$sql .= "INSERT INTO `persons_keys` (`personId`,`fullName`,`initials`,`dob`,`middleName`,`firstName`,`lastName`,`esq`,`deceased`,`rollNo`,`no`,`league`) VALUES ";
foreach($persons as $p) {
    if($p[10]!=null) {
        $d = explode("/",$p[10]);
        $p[10] = $d[2]."-".$d[1]."-".$d[0];
    }
    $sql .= "(";
    $sql .= "\"".$p[12]."\",";
    $sql .= "\"".trim($p[4])."\",";
    $sql .= "\"".trim($p[7])."\",";
    $sql .= "\"".$p[10]."\",";
    $sql .= "\"".trim($p[8])."\",";
    $sql .= "\"\",";
    $sql .= "\"".trim($p[9])."\",";
    $sql .= "\"".($p[5]==="Esq" ?1:0)."\",";
    $sql .= "\"".($p[6]==="DECEASED"?1:0)."\",";
    $sql .= "\"".$p[11]."\",";
    $sql .= "\"\",";
    $sql .= "\"\"),\n";
}

$sql = substr($sql,0,-2).";";

$sql .= "INSERT INTO `links` (id,type,source,destination,dt_start,dt_end,xmlview) VALUES";
foreach($persons as $p) {
    $id = gen_uuid();
    $sql .= "(";
    $sql .= "\"".$id."\",";
    $sql .= "\"pupil\",";
    $sql .= "\"".$p[12]."\",";
    $sql .= "\"d5WqRO3g\",";
    $sql .= "\"".$p[0]."\",";
    $sql .= "\"".$p[1]."\",";
    $xw = new \XMLWriter();
    $xw->openMemory();
    $xw->setIndent(false);
    //$xw->setIndentString(' ');
    $xw->startDocument('1.0', 'UTF-8');
    $xw->startElementNS(null,"Link","urn:com:summerfields:Archive:Links");
    $xw->writeElement("ID",$id);
    $xw->writeElement("type","pupil");
    $xw->writeElement("source",$p[12]);
    $xw->writeElement("destination","d5WqRO3g");
    $xw->writeElement("dtStart",$p[0]);
    $xw->writeElement("dtEnd",$p[1]);
    $xw->endElement();
    $xw->endDocument();
    $sql .= "\"".mysql_escape_string($xw->flush())."\"),\n";
}

$sql = substr($sql,0,-2).";";


file_put_contents("../sql/pupils.sql",$sql);


function gen_uuid($len=8) {
    $hex = md5("summerfields_1864" . uniqid("", true));
    $pack = pack('H*', $hex);
    $uid = base64_encode($pack);        // max 22 chars
    $uid = preg_replace("#(*UTF8)[^A-Za-z0-9]#", "", $uid);    // mixed case
    if ($len<4) $len=4;
    if ($len>128) $len=128;                       // prevent silliness, can remove
    while (strlen($uid)<$len) $uid = $uid . gen_uuid(22);     // append until length achieved
    return substr($uid, 0, $len);
}

function isYear($var) {
    if($var == null) return true;
    $regexp = "/^(18|19|20)\d\d$/";
    if(preg_match($regexp,$var)) return true;
}

function isDOB($var) {
    if($var == null) return true;
    $regexp = "/^\d\d\/\d\d\/(18|19|20)\d\d$/";
    if(preg_match($regexp,$var)) return true;
}
