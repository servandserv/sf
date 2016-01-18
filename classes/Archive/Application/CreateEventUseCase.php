<?php

namespace Archive\Application;

class CreateEventUseCase extends \Archive\Application\EntityManagerAdaptor {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		return $this->create($app->REQUEST);
		/*
		$em = new \Archive\Port\Adaptor\Persistence\PDO\EventEntityManager();
		try {
		    $conn = $app->DB_CONNECT;
			$conn->beginTransaction();
		    $event = $em->create( $app->REQUEST );
		    $conn->commit();
		    return $event;
		} catch(\Exception $e) {
			$conn->rollback();
			$app->throwError($e);
		}
		*/
	}
}