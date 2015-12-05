<?php

namespace Archive\Port\Adaptor\Persistence\PDO;

class ResourceEntityManager {

	public function __construct() {
	}
	
	public function findById($id) {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$resource = NULL;
		$query = "SELECT * FROM `resources` WHERE id=? OR autoid=?;";
		$sth = $conn->prepare($query);
		$sth->execute(array($id,$id));
		while($row = $sth->fetch()) {
			switch($row['type']) {
				case "person":
					$resource = new \Archive\Port\Adaptor\Data\Archive\Persons\Person();
					$resource->fromXmlStr($row["xmlview"]);
					break;
		        case "union":
					$resource = new \Archive\Port\Adaptor\Data\Archive\Unions\Union();
					$resource->fromXmlStr($row["xmlview"]);
					break;
		        case "document":
					$resource = new \Archive\Port\Adaptor\Data\Archive\Documents\Document();
					$resource->fromXmlStr($row["xmlview"]);
					break;
				default:
					$resource = new \Archive\Port\Adaptor\Data\Archive\Resources\Resource();
					$resource->fromXmlStr($row["xmlview"]);
					break;
			}
		}
		return $resource;
	}
	
	public function lastmod( $id = null ) {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$sth = $conn->prepare("SELECT UNIX_TIMESTAMP(`updated`) as `lastmod` FROM `resources` ORDER BY `updated` DESC LIMIT 0,1;");
		$sth->execute(array());
		$row = $sth->fetch();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\LinkEntityManager();
		return max($row["lastmod"],$em->lastmod($id));
	}

}