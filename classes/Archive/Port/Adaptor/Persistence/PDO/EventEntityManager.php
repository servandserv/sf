<?php

namespace Archive\Port\Adaptor\Persistence\PDO;

class EventEntityManager extends \Archive\Port\Adaptor\Persistence\PDO\ResourceEntityManager {

	public function __construct() {
	}
	
	public function findById( $id ) {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$event = NULL;
		$params = array($id);
		$query = "SELECT * FROM `resources` WHERE `id`=?";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$event = new \Archive\Port\Adaptor\Data\Archive\Events\Event();
			$event->fromXmlStr($row["xmlview"]);
		}
		return $event;
	}
	
	public function create( \Archive\Port\Adaptor\Data\Archive\Events\Event $event ) {
		$app = \App::getInstance();
		$event->setID(\Archive\Infrastructure\Helpers\UUID::generate());
		$handler = new \Happymeal\Port\Adaptor\Data\ValidationHandler();
		$event->validateType( $handler );
		if($handler->hasErrors()) {
			$errors = $handler->getErrors();
			foreach($errors as $code=>$err){
				$app->throwError( new \Exception( implode( ";", $err ), $code ) );
			}
		} else {
			$conn = $app->DB_CONNECT;
			$params = array();
			$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->insert()
				->t("resources")
				->set()
					->c("id")->eq()->val($event->getID(),$qb::NOT_NULL)
					->c("type")->eq()->val("event")
					->c("uniqueId")->eq()->val($this->getUniqueId($event),$qb::NOT_NULL)
					->c("xmlview")->eq()->val($event->toXmlStr())
				->fi();
			//print($query);print_r($params);exit;
			$sth = $conn->prepare($query);
			$sth->execute($params);
			
			$params = array();
			$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->insert()
				->t("events_keys")
				->set()
					->c("eventId")->eq()->val($event->getID(),$qb::NOT_NULL)
					->c("name")->eq()->val($event->getName(),$qb::NOT_NULL)
					->c("dt")->eq()->val($event->getDt(),$qb::NOT_NULL)
					->c("type")->eq()->val($event->getType(),$qb::NOT_NULL)
			    ->fi();
			
			$sth1 = $conn->prepare($query);
			$sth1->execute($params);
			
			return $event;
		}
	}
	
	public function update( \Archive\Port\Adaptor\Data\Archive\Events\Event $old, \Archive\Port\Adaptor\Data\Archive\Events\Event $event ) {
		$app = \App::getInstance();
		$handler = new \Happymeal\Port\Adaptor\Data\ValidationHandler();
		$event->setID($old->getID());
		$event->validateType( $handler );
		if($handler->hasErrors()) {
			$errors = $handler->getErrors();
			foreach($errors as $code=>$err){
				$app->throwError( new \Exception( implode( ";", $err ), $code ) );
			}
		} else {
			$conn = $app->DB_CONNECT;
			$params = array();
			$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->update()
				->t("resources")
				->set()
				    ->c("uniqueId")->eq()->val($this->getUniqueId($event),$qb::NOT_NULL)
					->c("xmlview")->eq()->val($event->toXmlStr())
				->where()
					->c("id")->eq()->val($event->getID())
				->fi();
			//print($query);print_r($params);exit;
			$sth = $conn->prepare($query);
			$sth->execute($params);
			
			$params = array();
			$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->update()
				->t("events_keys")
				->set()
					->c("name")->eq()->val($event->getName(),$qb::NOT_NULL)
					->c("dt")->eq()->val($event->getDt(),$qb::NOT_NULL)
					->c("type")->eq()->val($event->getType(),$qb::NOT_NULL)
			    ->where()
					->c("eventId")->eq()->val($event->getID())
			    ->fi();
			
			$sth1 = $conn->prepare($query);
			$sth1->execute($params);
			
			return $event;
		}
	}
	
	public function delete( \Archive\Port\Adaptor\Data\Archive\Events\Event $event ) {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$params = [];
		$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
		$query = $qb->delete()
			->from()->t("resources")
			->where()
				->c("id")->eq()->val($event->getID())
			->fi();
		$sth = $conn->prepare($query);
		$sth->execute($params);
		// delete unions keys
		$params = [];
		$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
		$query = $qb->delete()
			->from()->t("events_keys")
			->where()
				->c("eventId")->eq()->val($event->getID())
			->fi();
		$sth1 = $conn->prepare($query);
		$sth1->execute($params);
		// delete all unions links
		$params=[$event->getID(),$event->getID()];
		$sth2 = $conn->prepare("DELETE FROM `links` WHERE `source`=? OR `destination`=?;");
		$sth2->execute($params);
		return $event;
	}
	
	private function getUniqueId( \Archive\Port\Adaptor\Data\Archive\Events\Event $event ) {
	    return sha1($event->getName().$event->getDt());
	}
}