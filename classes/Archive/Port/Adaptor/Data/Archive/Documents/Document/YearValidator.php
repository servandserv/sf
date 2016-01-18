<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents\Document;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\Document\Year
	 *
	 */
	class YearValidator extends \Archive\Port\Adaptor\Data\Archive\Documents\DocumentYearTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

