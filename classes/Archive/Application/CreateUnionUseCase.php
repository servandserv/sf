<?php

namespace Archive\Application;

class CreateUnionUseCase extends Archive\Application\EntityManagerAdaptor {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		return $this->create( $app->REQUEST );
		/*
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
		*/
	}
}