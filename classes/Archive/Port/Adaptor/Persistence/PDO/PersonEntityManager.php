<?php

namespace Archive\Port\Adaptor\Persistence\PDO;

class PersonEntityManager extends \Archive\Port\Adaptor\Persistence\PDO\ResourceEntityManager {

	public function __construct() {
	}
	
	public function findById( $id ) {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$person = NULL;
		$params = array($id);
		$query = "SELECT * FROM `resources` WHERE `id`=?";
		$sth = $conn->prepare($query);
		$sth->execute($params);
		while($row = $sth->fetch()) {
			$person = new \Archive\Port\Adaptor\Data\Archive\Persons\Person();
			$person->fromXmlStr($row["xmlview"]);
		}
		return $person;
	}
	
	public function create( \Archive\Port\Adaptor\Data\Archive\Persons\Person $person ) {
		$app = \App::getInstance();
		$person->setID(\Archive\Infrastructure\Helpers\UUID::generate());
		$handler = new \Happymeal\Port\Adaptor\Data\ValidationHandler();
		$person->validateType( $handler );
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
					->c("id")->eq()->val($person->getID(),$qb::NOT_NULL)
					->c("type")->eq()->val("person")
					->c("key1")->eq()->val($person->getLastName(),$qb::NOT_NULL)
					->c("key2")->eq()->val($person->getDOB(),$qb::NOT_NULL)
					->c("key3")->eq()->val($person->getRollNo(),$qb::NOT_NULL)
					->c("xmlview")->eq()->val($person->toXmlStr())
				->fi();
			//print($query);print_r($params);exit;
			$sth = $conn->prepare($query);
			$sth->execute($params);
			
			$params = array();
			$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->insert()
				->t("persons_keys")
				->set()
					->c("id")->eq()->val($person->getID(),$qb::NOT_NULL)
					->c("dob")->eq()->val($person->getDOB(),$qb::NOT_NULL)
					->c("fullName")->eq()->val($person->getFullName(),$qb::NOT_NULL)
					->c("middleName")->eq()->val($person->getMiddleName(),$qb::NOT_NULL)
					->c("lastName")->eq()->val($person->getLastName(),$qb::NOT_NULL)
					->c("firstName")->eq()->val($person->getFirstName(),$qb::NOT_NULL)
					->c("initials")->eq()->val($person->getInitials(),$qb::NOT_NULL)
					->c("esq")->eq()->val($person->getEsq(),$qb::NOT_NULL)
					->c("deceased")->eq()->val($person->getDeceased(),$qb::NOT_NULL)
					->c("rollNo")->eq()->val($person->getRollNo(),$qb::NOT_NULL)
					->c("no")->eq()->val($person->getNo(),$qb::NOT_NULL)
					->c("league")->eq()->val($person->getLeague(),$qb::NOT_NULL)
			    ->fi();
			
			$sth = $conn->prepare($query);
			$sth->execute($params);
			
			return $person;
		}
	}
	
	public function update( \Archive\Port\Adaptor\Data\School\Persons\Person $person ) {
		$app = \App::getInstance();
		$handler = new \Happymeal\Port\Adaptor\Data\ValidationHandler();
		$person->validateType( $handler );
		if($handler->hasErrors()) {
			$errors = $handler->getErrors();
			foreach($errors as $code=>$err){
				$app->throwError( new \Exception( implode( ";", $err ), $code ) );
			}
		} else {
			$conn = $app->DB_CONNECT;
			$params = array();
			$qb = new \School\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->update()
				->t("resources")
				->set()
				    ->c("key1")->eq()->val($person->getLastName(),$qb::NOT_NULL)
					->c("key2")->eq()->val($person->getDOB(),$qb::NOT_NULL)
					->c("key3")->eq()->val($person->getRollNo(),$qb::NOT_NULL)
					->c("xmlview")->eq()->val($person->toXmlStr())
				->where()
					->c("id")->eq()->val($person->getID())
				->fi();
			//print($query);print_r($params);exit;
			$sth = $conn->prepare($query);
			$sth->execute($params);
			
			$params = array();
			$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
			$query = $qb->update()
				->t("persons_keys")
				->set()
					->c("dob")->eq()->val($person->getDOB(),$qb::NOT_NULL)
					->c("fullName")->eq()->val($person->getFullName(),$qb::NOT_NULL)
					->c("middleName")->eq()->val($person->getMiddleName(),$qb::NOT_NULL)
					->c("lastName")->eq()->val($person->getLastName(),$qb::NOT_NULL)
					->c("firstName")->eq()->val($person->getFirstName(),$qb::NOT_NULL)
					->c("initials")->eq()->val($person->getInitials(),$qb::NOT_NULL)
					->c("esq")->eq()->val($person->getEsq(),$qb::NOT_NULL)
					->c("deceased")->eq()->val($person->getDeceased(),$qb::NOT_NULL)
					->c("rollNo")->eq()->val($person->getRollNo(),$qb::NOT_NULL)
					->c("no")->eq()->val($person->getNo(),$qb::NOT_NULL)
					->c("league")->eq()->val($person->getLeague(),$qb::NOT_NULL)
			    ->where()
					->c("id")->eq()->val($person->getID())
			    ->fi();
			
			$sth = $conn->prepare($query);
			$sth->execute($params);
			
			return $person;
		}
	}
	
	public function delete( \Archive\Port\Adaptor\Data\School\Persons\Person $person ) {
		$app = \App::getInstance();
		$conn = $app->DB_CONNECT;
		$params = [];
		$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
		$query = $qb->delete()
			->from()->t("resources")
			->where()
				->c("id")->eq()->val($person->getID())
			->fi();
		$sth = $conn->prepare($query);
		$sth->execute($params);
		// delete person keys
		$params = [];
		$qb = new \Archive\Port\Adaptor\Persistence\QueryBuilder($params);
		$query = $qb->delete()
			->from()->t("persons_keys")
			->where()
				->c("id")->eq()->val($person->getID())
			->fi();
		$sth1 = $conn->prepare($query);
		$sth1->execute($params);
		// delete all person links
		$params=[];
		$sth2 = $conn->prepare("DELETE FROM `links` WHERE `source`=? OR `destination`=?;");
		$sth2->execute($params);
		return $person;
	}
	
}