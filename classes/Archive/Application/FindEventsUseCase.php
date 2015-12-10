<?php

namespace Archive\Application;

class FindEventsUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$evs = new \Archive\Port\Adaptor\Data\Archive\Events();
		$params = array();
		$start = isset($app->QUERY['start']) ? intval($app->QUERY['start']) : 0;
		$count = isset($app->QUERY['count']) ? intval($app->QUERY['count']) : (isset($app->QUERY['search']) ? 100 : 100 );
		$where = "";
		if(isset($app->QUERY['type'])&&$app->QUERY['type']!="") {
			$where = " AND `ek`.`type`= :type";
			$id = trim($app->QUERY['id']);
			$params[":type"] = $type;
			$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		    $ref->setRel("type");
		    $ref->setHref($id);
		    $evs->setRef($ref);
	    }
	    $query = "SELECT `r`.`autoid`,`r`.`xmlview` FROM `resources` AS `r` 
		            LEFT JOIN `events_keys` AS `ek` ON `ek`.`eventId`=`r`.`id`
		            WHERE `r`.`type`='event' $where
		            ORDER BY `ek`.`dt` LIMIT $start,$count;";
		$sth = $conn->prepare($query);
		$sth->execute(array());
		while($row = $sth->fetch()) {
			$ev = new \Archive\Port\Adaptor\Data\Archive\Events\Event();
			$ev->fromXmlStr($row["xmlview"]);
			$evs->setEvent($ev);
		}
		$evs->setPI(str_replace($app->API_VERSION.$app->PATH_INFO,"",$_SERVER["SCRIPT_URI"])."/stylesheets/Archive/Timeline.xsl");
		return $evs;
	}
}