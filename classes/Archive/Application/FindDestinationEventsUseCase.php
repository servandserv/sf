<?php

namespace Archive\Application;

class FindDestinationEventsUseCase {

	public function __construct() {
	}
	
	public function execute($id) {
		$app = \App::getInstance();
		$events = new \Archive\Port\Adaptor\Data\Archive\Events();
		$conn = $app->DB_CONNECT;
		$params = array();
		$params[":id"] = $id;
		$ref = new \Archive\Port\Adaptor\Data\Archive\Refs\Ref();
		$ref->setRel("destination");
		$ref->setHref($id);
		$events->setRef($ref);
		$query = "SELECT `r`.`xmlview` AS `rxmlview`,`l`.`xmlview` AS `lxmlview` FROM `links` AS `l` 
		            LEFT JOIN `resources` AS `r` ON `l`.`source`=`r`.`id`
		            WHERE `l`.`destination`=:id AND `r`.`type`='event'
		            ORDER BY `l`.`autoid`;";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$event = new \Archive\Port\Adaptor\Data\Archive\Events\Event();
			$event->fromXmlStr($row["rxmlview"]);
			$link = new \Archive\Port\Adaptor\Data\Archive\Links\Link();
			$link->fromXmlStr($row["lxmlview"]);
			$event->setLink($link);
			$events->setEvent($event);
		}
		return $events;
	}
}