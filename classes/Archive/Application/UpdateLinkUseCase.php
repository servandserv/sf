<?php

namespace Archive\Application;

class UpdateLinkUseCase {

	public function __construct() {
	}
	
	public function execute( $id ) {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\LinkEntityManager();
		if( $link = $em->findById( $id ) ) {
		    try {
		        $conn = $app->DB_CONNECT;
			    $conn->beginTransaction();
		        $link = $em->update( $link, $app->REQUEST );
		        $conn->commit();
		        return $link;
		    } catch(\Exception $e) {
			    $conn->rollback();
			    $app->throwError($e);
		    }
		} else $app->throwError( new \Exception( "Link $id not found", 404 ) );
	}
}