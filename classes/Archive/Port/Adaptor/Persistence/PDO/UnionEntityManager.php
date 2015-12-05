<?php

namespace Archive\Port\Adaptor\Persistence\PDO;

class UnionEntityManager {

	public function __construct() {
	}
	
	public function findById( $id ) {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$union = NULL;
		$params = array($id);
		$query = "SELECT * FROM `resources` WHERE `id`=?";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$union = new \Archive\Port\Adaptor\Data\Archive\Unions\Union();
			$union->fromXmlStr($row["xmlview"]);
		}
		return $union;
	}
	
	public function create( \Archive\Port\Adaptor\Data\Archive\Unions\Union $union ) {
		$app = \App::getInstance();
		$union->setID(\Archive\Infrastructure\Helpers\UUID::generate());
		$handler = new \Happymeal\Port\Adaptor\Data\ValidationHandler();
		$union->validateType( $handler );
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
					->c("id")->eq()->val($union->getID(),$qb::NOT_NULL)
					->c("type")->eq()->val("union")
					->c("uniqueId")->eq()->val(sha1($union->getName()),$qb::NOT_NULL)
					->c("xmlview")->eq()->val($union->toXmlStr())
				->fi();
			//print($query);print_r($params);exit;
			$sth = $conn->prepare($query);
			$sth->execute($params);
			
			$params = array();
			$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->insert()
				->t("unions_keys")
				->set()
					->c("unionId")->eq()->val($union->getID(),$qb::NOT_NULL)
					->c("name")->eq()->val($union->getName(),$qb::NOT_NULL)
					->c("founded")->eq()->val($union->getFounded(),$qb::NOT_NULL)
					->c("type")->eq()->val($union->getType(),$qb::NOT_NULL)
			    ->fi();
			
			$sth1 = $conn->prepare($query);
			$sth1->execute($params);
			
			return $union;
		}
	}
	
	public function update( \Archive\Port\Adaptor\Data\Archive\Unions\Union $old, \Archive\Port\Adaptor\Data\Archive\Unions\Union $union ) {
		$app = \App::getInstance();
		$handler = new \Happymeal\Port\Adaptor\Data\ValidationHandler();
		$union->setID($old->getID());
		$union->validateType( $handler );
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
				    ->c("uniqueId")->eq()->val(sha1($union->getName()),$qb::NOT_NULL)
					->c("xmlview")->eq()->val($union->toXmlStr())
				->where()
					->c("id")->eq()->val($union->getID())
				->fi();
			//print($query);print_r($params);exit;
			$sth = $conn->prepare($query);
			$sth->execute($params);
			
			$params = array();
			$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->update()
				->t("unions_keys")
				->set()
					->c("name")->eq()->val($union->getName(),$qb::NOT_NULL)
					->c("founded")->eq()->val($union->getFounded(),$qb::NOT_NULL)
					->c("type")->eq()->val($union->getType(),$qb::NOT_NULL)
			    ->where()
					->c("unionId")->eq()->val($union->getID())
			    ->fi();
			
			$sth1 = $conn->prepare($query);
			$sth1->execute($params);
			
			return $union;
		}
	}
	
	public function delete( \Archive\Port\Adaptor\Data\Archive\Unions\Union $union ) {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$params = [];
		$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
		$query = $qb->delete()
			->from()->t("resources")
			->where()
				->c("id")->eq()->val($union->getID())
			->fi();
		$sth = $conn->prepare($query);
		$sth->execute($params);
		// delete unions keys
		$params = [];
		$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
		$query = $qb->delete()
			->from()->t("unions_keys")
			->where()
				->c("unionId")->eq()->val($union->getID())
			->fi();
		$sth1 = $conn->prepare($query);
		$sth1->execute($params);
		// delete all unions links
		$params=[$union->getID(),$union->getID()];
		$sth2 = $conn->prepare("DELETE FROM `links` WHERE `source`=? OR `destination`=?;");
		$sth2->execute($params);
		return $union;
	}
}