<?php

namespace Archive\Application;

class DeleteEventUseCase extends \Archive\Application\EntityManagerAdaptor {

	public function __construct() {
	}
	
	public function execute($id) {
		$app = \App::getInstance();
		$em = $app->EM->create("\Archive\Port\Adaptor\Data\Archive\Events\Event");
		return $this->delete( $id, $em );
		/*
		$em = new \Archive\Port\Adaptor\Persistence\PDO\EventEntityManager();
		if( $event = $em->findById( $id ) ) {
			try {
				$conn = $app->DB_CONNECT;
				$conn->beginTransaction();
				$event = $em->delete( $event );
				$conn->commit();
				return $event;
			} catch(\Exception $e) {
				$conn->rollback();
				$app->throwError($e);
			}
		} else throw new \Exception( "Event $id not found", 404 );
		*/
	}
}