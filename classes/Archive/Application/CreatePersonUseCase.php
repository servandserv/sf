<?php

namespace Archive\Application;

class CreatePersonUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\PersonEntityManager();
		try {
		    $conn = $app->DB_CONNECT;
			$conn->beginTransaction();
		    $person = $em->create( $app->REQUEST );
		    $conn->commit();
		    return $person;
		} catch(\Exception $e) {
			$conn->rollback();
			$app->throwError($e);
		}
	}
}