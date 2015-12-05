<?php

namespace Archive\Application;

class CreateLinkUseCase {

	public function __construct() {
	}
	
	public function execute() {
		$app = \App::getInstance();
		$em = new \Archive\Port\Adaptor\Persistence\PDO\LinkEntityManager();
		$link = $em->create( $app->REQUEST );
		return $link;
	}
}