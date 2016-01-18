<?php

	namespace Archive\Port\Adaptor\Data\Archive\Events\Event;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Events\Event\Name
	 *
	 */
	class NameValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

