<?php

namespace Archive\Application;

class FindUnionUseCase {

	public function __construct() {
	}
	
	public function execute( $id ) {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\UnionEntityManager();
		if( $union = $em->findById( $id ) ) {
		    $union->setPI(str_replace($app->API_VERSION.$app->PATH_INFO,"",$_SERVER["SCRIPT_URI"])."/stylesheets/Archive/Union.xsl");
			return $union;
		} else $app->throwError( new \Exception( "Union $id not found", 404 ) );
	}
	
}