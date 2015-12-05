<?php

namespace Archive\Application;

class FindDestinationPersonsUseCase {

	public function __construct() {
	}
	
	public function execute($id) {
		$app = \App::getInstance();
		$persons = new \Archive\Port\Adaptor\Data\Archive\Persons();
		$conn = $app->DB_CONNECT;
		$params = array();
		$params[":id"] = $id;
		$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		$ref->setRel("destination");
		$ref->setHref($id);
		$persons->setRef($ref);
		$query = "SELECT `r`.`xmlview` AS `rxmlview`,`l`.`xmlview` AS `lxmlview` FROM `links` AS `l` 
		            LEFT JOIN `resources` AS `r` ON `l`.`source`=`r`.`id`
		            WHERE `l`.`destination`=:id AND `r`.`type`='person'
		            ORDER BY `l`.`autoid`;";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$person = new \Archive\Port\Adaptor\Data\Archive\Persons\Person();
			$person->fromXmlStr($row["rxmlview"]);
			$link = new \Archive\Port\Adaptor\Data\Archive\Links\Link();
			$link->fromXmlStr($row["lxmlview"]);
			$person->setLink($link);
			$persons->setPerson($person);
		}
		return $persons;
	}
}