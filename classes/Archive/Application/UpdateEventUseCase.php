<?php

namespace Archive\Application;

class UpdateEventUseCase {

	public function __construct() {
	}
	
	public function execute( $id ) {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\EventEntityManager();
		if( $event = $em->findById( $id ) ) {
		    try {
		        $conn = $app->DB_CONNECT;
			    $conn->beginTransaction();
		        $event = $em->update( $event, $app->REQUEST );
		        $conn->commit();
		        return $event;
		    } catch(\Exception $e) {
			    $conn->rollback();
			    $app->throwError($e);
		    }
		} else $app->throwError( new \Exception( "Event $id not found", 404 ) );
	}
}