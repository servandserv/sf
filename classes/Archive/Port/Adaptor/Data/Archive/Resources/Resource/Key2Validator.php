<?php

	namespace Archive\Port\Adaptor\Data\Archive\Resources\Resource;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Resources\Resource\Key2
	 *
	 */
	class Key2Validator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

