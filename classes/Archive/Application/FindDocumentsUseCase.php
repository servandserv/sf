<?php

namespace Archive\Application;

class FindDocumentsUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		$docs = new \Archive\Port\Adaptor\Data\Archive\Documents();
		$conn = $app->DB_CONNECT;
		$params = array();
		$start = isset($app->QUERY['start']) ? intval($app->QUERY['start']) : 0;
		$count = isset($app->QUERY['count']) ? intval($app->QUERY['count']) : (isset($app->QUERY['search']) ? 100 : 100 );
		$where = "";
		if(isset($app->QUERY['id'])&&$app->QUERY['id']!="") {
			$where = " AND `r`.`id`= :id";
			$id = trim($app->QUERY['id']);
			$params[":id"] = $id;
			$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		    $ref->setRel("id");
		    $ref->setHref($id);
		    $docs->setRef($ref);
	    }
	    if(isset($app->QUERY['path'])&&$app->QUERY['path']!="") {
			$where = " AND `dk`.`path`= :path";
			$path = trim($app->QUERY['path']);
			$params[":path"] = $path;
			$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		    $ref->setRel("path");
		    $ref->setHref($path);
		    $docs->setRef($ref);
	    }
	    if(isset($app->QUERY['snumber'])&&$app->QUERY['snumber']!="") {
	        $start = intval(trim($app->QUERY['snumber']));
	        $count = 1;
	    }
		$query = "SELECT `r`.`autoid`,`r`.`xmlview` FROM `resources` AS `r` 
		            LEFT JOIN `documents_keys` AS `dk` ON `dk`.`documentId`=`r`.`id`
		            WHERE `r`.`type`='document' $where
		            ORDER BY `dk`.`path` LIMIT $start,$count;";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
		    $autoid = $row["autoid"];
			$doc = new \Archive\Port\Adaptor\Data\Archive\Documents\Document();
			$doc->fromXmlStr($row["xmlview"]);
			$docs->setDocument($doc);
		}
		if(count($docs->getDocument())==1) {
		    $params = [$autoid];
		    $query = "SELECT COUNT(`autoid`) AS `total` FROM `resources` WHERE `type`='document' AND `autoid` < ?;";
		    $sth = $conn->prepare($query);
		    $sth->execute($params);
		    while($row = $sth->fetch()) {
		        $ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		        $ref->setRel("snumber");
		        $ref->setHref($row["total"]);
		        $docs->setRef($ref);
		    }
		    
		    $query = "SELECT COUNT(`autoid`) AS `total` FROM `resources` WHERE `type`='document';";
		    $sth = $conn->prepare($query);
		    $sth->execute($params);
		    while($row = $sth->fetch()) {
		        $ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		        $ref->setRel("max");
		        $ref->setHref($row["total"]-1);
		        $docs->setRef($ref);
		    }
		}
		return $docs;
	}
}