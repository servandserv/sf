<?php

namespace Archive\Application;

class CreateUnionUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\UnionEntityManager();
		try {
		    $conn = $app->DB_CONNECT;
			$conn->beginTransaction();
		    $union = $em->create( $app->REQUEST );
		    $conn->commit();
		    return $union;
		} catch(\Exception $e) {
			$conn->rollback();
			$app->throwError($e);
		}
	}
}