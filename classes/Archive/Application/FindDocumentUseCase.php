<?php

namespace Archive\Application;

class FindDocumentUseCase {

	public function __construct() {
	}
	
	public function execute( $id ) {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\DocumentEntityManager();
		if( $doc = $em->findById( $id ) ) {
			return $doc;
		} else $app->throwError( new \Exception( "Document $id not found", 404 ) );
	}
	
}