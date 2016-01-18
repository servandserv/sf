<?php

	namespace Archive\Port\Adaptor\Data\Archive\Events\Event;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Events\Event\Dt
	 *
	 */
	class DtValidator extends \Archive\Port\Adaptor\Data\Archive\Events\DtTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

