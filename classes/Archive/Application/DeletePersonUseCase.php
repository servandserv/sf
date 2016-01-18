<?php

namespace Archive\Application;

class DeletePersonUseCase extends \Archive\Application\EntityManagerAdaptor {

	public function __construct() {
	}
	
	public function execute($id) {
		$app = \App::getInstance();
		$em = $app->EM->create("\Archive\Port\Adaptor\Data\Archive\Persons\Person");
		return $this->delete($id,$em);
		/*
		$em = new \Archive\Port\Adaptor\Persistence\PDO\PersonEntityManager();
		if( $person = $em->findById( $id ) ) {
			try {
				$conn = $app->DB_CONNECT;
				$conn->beginTransaction();
				$person = $em->delete( $person );
				$conn->commit();
				return $person;
			} catch(\Exception $e) {
				$conn->rollback();
				$app->throwError($e);
			}
		} else throw new \Exception( "Person $id not found", 404 );
		*/
	}
}