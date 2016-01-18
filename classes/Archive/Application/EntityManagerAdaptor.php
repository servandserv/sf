<?php

namespace Archive\Application;

abstract class EntityManagerAdaptor {

	public function create( $entity ) {
		$app = \App::getInstance();
		$em = $app->EM->create("\\".get_class($entity));
		try {
		    $conn = $app->DB_CONNECT;
			$conn->beginTransaction();
		    $entity = $em->create( $entity );
		    $conn->commit();
		    return $entity;
		} catch(\Exception $e) {
			$conn->rollback();
			$app->throwError($e);
		}
	}
	
	public function delete($id, $em) {
		$app = \App::getInstance();
		if( $entity = $em->findById( $id ) ) {
			try {
				$conn = $app->DB_CONNECT;
				$conn->beginTransaction();
				$entity = $em->delete( $entity );
				$conn->commit();
				return $entity;
			} catch(\Exception $e) {
				$conn->rollback();
				$app->throwError($e);
			}
		} else throw new \Exception( "Entity $id not found", 404 );
	}
}