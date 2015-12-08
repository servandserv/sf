<?php

namespace Archive\Application;

class FindSourceDocumentsUseCase {

	public function __construct() {
	}
	
	public function execute($id) {
		$app = \App::getInstance();
		$docs = new \Archive\Port\Adaptor\Data\Archive\Documents();
		$conn = $app->DB_CONNECT;
		$params = array();
		$params[":id"] = $id;
		$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		$ref->setRel("source");
		$ref->setHref($id);
		$unions->setRef($ref);
		$query = "SELECT `r`.`xmlview` AS `rxmlview`,`l`.`xmlview` AS `lxmlview` FROM `links` AS `l` 
		            LEFT JOIN `resources` AS `r` ON `l`.`destination`=`r`.`id`
		            WHERE `l`.`source`=:id AND `r`.`type`='document'
		            ORDER BY `l`.`autoid`;";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$doc = new \Archive\Port\Adaptor\Data\Archive\Documents\Document();
			$doc->fromXmlStr($row["rxmlview"]);
			$link = new \Archive\Port\Adaptor\Data\Archive\Links\Link();
			$link->fromXmlStr($row["lxmlview"]);
			$doc->setLink($link);
			$docs->setDocument($doc);
		}
		return $docs;
	}
}