<?php

namespace Archive\Application;

class FindUnionsUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		$unions = new \Archive\Port\Adaptor\Data\Archive\Unions();
		$conn = $app->DB_CONNECT;
		$params = array();
		$start = isset($app->QUERY['start']) ? intval($app->QUERY['start']) : 0;
		$count = isset($app->QUERY['count']) ? intval($app->QUERY['count']) : (isset($app->QUERY['search']) ? 100 : 100 );
		$where = "";
		if(isset($app->QUERY['type'])&&$app->QUERY['type']!="") {
			$where = " AND `uk`.`type` = :type";
			$params[":type"] = trim($app->QUERY['type']);
			$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		    $ref->setRel("type");
		    $ref->setHref(trim($app->QUERY['type']));
		    $unions->setRef($ref);
	    }
		$query = "SELECT `r`.`xmlview` FROM `resources` AS `r` 
		            LEFT JOIN `unions_keys` AS `uk` ON `uk`.`unionId`=`r`.`id`
		            WHERE `r`.`type`='union' $where
		            ORDER BY `uk`.`name` LIMIT $start,$count;";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$union = new \Archive\Port\Adaptor\Data\Archive\Unions\Union();
			$union->fromXmlStr($row["xmlview"]);
			$unions->setUnion($union);
		}
		//$unions->setPI(str_replace($app->API_VERSION.$app->PATH_INFO,"",$_SERVER["SCRIPT_URI"])."/stylesheets/Archive/Unions.xsl");
		return $unions;
	}
}