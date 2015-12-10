<?php

namespace Archive\Application;

class CreateEventUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
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
	}
}