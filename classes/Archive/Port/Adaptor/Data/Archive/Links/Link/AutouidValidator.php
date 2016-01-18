<?php

	namespace Archive\Port\Adaptor\Data\Archive\Links\Link;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Links\Link\Autouid
	 *
	 */
	class AutouidValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\IntegerValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Integer $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

