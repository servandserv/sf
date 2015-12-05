<?php

namespace Archive\Application;

class PatchDocumentUseCase {

	public function __construct() {
	}
	
	public function execute( $id ) {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\DocumentEntityManager();
		if( $doc = $em->findById( $id ) ) {
		    try {
		        $conn = $app->DB_CONNECT;
			    $conn->beginTransaction();
		        $doc = $em->patch( $app->REQUEST, $doc );
		        $conn->commit();
		        return $doc;
		    } catch(\Exception $e) {
			    $conn->rollback();
			    $app->throwError($e);
		    }
		} else $app->throwError( new \Exception( "Document \"$id\" not found", 404 ) );
	}
}