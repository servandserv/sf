<?php

namespace Archive\Application;

class FindPersonsUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		$persons = new \Archive\Port\Adaptor\Data\Archive\Persons();
		$conn = $app->DB_CONNECT;
		$params = array();
		$start = isset($app->QUERY['start']) ? intval($app->QUERY['start']) : 0;
		$count = isset($app->QUERY['count']) ? intval($app->QUERY['count']) : (isset($app->QUERY['search']) ? 100 : 100 );
		$where = "";
		if(isset($app->QUERY['fn'])&&$app->QUERY['fn']!="") {
			$where = " AND `pk`.`fullName` LIKE :fn";
			$params[":fn"] = "%".trim($app->QUERY['fn'])."%";
			$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		    $ref->setRel("fn");
		    $ref->setHref(trim($app->QUERY['fn']));
		    $persons->setRef($ref);
	    }
	    if(isset($app->QUERY['in'])&&$app->QUERY['in']!="") {
	        $where .= " AND ((`l`.`dt_start` <= :start AND `l`.`dt_start` IS NOT NULL) AND (`l`.`dt_end` >= :end AND `l`.`dt_end` IS NOT NULL))";
		    $params[":start"] = trim($app->QUERY['in']);
		    $params[":end"] = trim($app->QUERY['in']);
		    $ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		    $ref->setRel("in");
		    $ref->setHref(trim($app->QUERY['in']));
		    $persons->setRef($ref);
	    }
		$query = "SELECT `r`.`xmlview`, `l`.`xmlview` AS `lxmlview` FROM `resources` AS `r` 
		            LEFT JOIN `persons_keys` AS `pk` ON `pk`.`personId`=`r`.`id`
		            LEFT JOIN `links` as `l` ON `r`.`id`=`l`.`source`
		            WHERE `r`.`type`='person' $where
		            ORDER BY `pk`.`lastName`,`pk`.`dob` LIMIT $start,$count;";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$person = new \Archive\Port\Adaptor\Data\Archive\Persons\Person();
			$person->fromXmlStr($row["xmlview"]);
			$link = new \Archive\Port\Adaptor\Data\Archive\Links\Link();
			$link->fromXmlStr($row["lxmlview"]);
			$person->setLink($link);
			$persons->setPerson($person);
		}
		$persons->setPI(str_replace($app->API_VERSION.$app->PATH_INFO,"",$_SERVER["SCRIPT_URI"])."/stylesheets/Archive/Persons.xsl");
		return $persons;
	}
}