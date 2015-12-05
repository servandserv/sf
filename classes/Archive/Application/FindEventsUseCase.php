<?php

namespace Archive\Application;

class FindEventsUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$evs = new \Archive\Port\Adaptor\Data\Archive\Events();
		$query = "SELECT `xmlview` FROM `resources` WHERE `type`='event';";
		$sth = $conn->prepare($query);
		$sth->execute(array());
		while($row = $sth->fetch()) {
			$ev = new \Archive\Port\Adaptor\Data\Archive\Events\Event();
			$ev->fromXmlStr($row["xmlview"]);
			$evs->setLink($ev);
		}
		$evs->setPI(str_replace($app->API_VERSION.$app->PATH_INFO,"",$_SERVER["SCRIPT_URI"])."/stylesheets/Archive/Timeline.xsl");
		return $evs;
	}
}