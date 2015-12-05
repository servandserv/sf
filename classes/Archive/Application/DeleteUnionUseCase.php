<?php

namespace Archive\Application;

class DeleteUnionUseCase {

	public function __construct() {
	}
	
	public function execute($id) {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\UnionEntityManager();
		if( $union = $em->findById( $id ) ) {
			try {
				$conn = $app->DB_CONNECT;
				$conn->beginTransaction();
				$union = $em->delete( $union );
				$conn->commit();
				return $union;
			} catch(\Exception $e) {
				$conn->rollback();
				$app->throwError($e);
			}
		} else throw new \Exception( "Union $id not found", 404 );
	}
}