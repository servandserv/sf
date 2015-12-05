<?php

namespace Archive\Application;

class FindDestinationUnionsUseCase {

	public function __construct() {
	}
	
	public function execute($id) {
		$app = \App::getInstance();
		$unions = new \Archive\Port\Adaptor\Data\Archive\Unions();
		$conn = $app->DB_CONNECT;
		$params = array();
		$params[":id"] = $id;
		$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		$ref->setRel("destination");
		$ref->setHref($id);
		$unions->setRef($ref);
		$query = "SELECT `r`.`xmlview` AS `rxmlview`,`l`.`xmlview` AS `lxmlview` FROM `links` AS `l` 
		            LEFT JOIN `resources` AS `r` ON `l`.`source`=`r`.`id`
		            WHERE `l`.`destination`=:id AND `r`.`type`='union'
		            ORDER BY `l`.`autoid`;";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$union = new \Archive\Port\Adaptor\Data\Archive\Unions\Union();
			$union->fromXmlStr($row["rxmlview"]);
			$link = new \Archive\Port\Adaptor\Data\Archive\Links\Link();
			$link->fromXmlStr($row["lxmlview"]);
			$union->setLink($link);
			$unions->setUnion($union);
		}
		return $unions;
	}
}