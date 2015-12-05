<?php

namespace Archive\Application;

class FindUnionUseCase {

	public function __construct() {
	}
	
	public function execute( $id ) {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\UnionEntityManager();
		if( $union = $em->findById( $id ) ) {
			return $union;
		} else $app->throwError( new \Exception( "Union $id not found", 404 ) );
	}
	
}