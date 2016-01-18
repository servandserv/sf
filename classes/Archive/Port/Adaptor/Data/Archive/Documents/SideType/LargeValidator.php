<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents\SideType;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\SideType\Large
	 *
	 */
	class LargeValidator extends \Archive\Port\Adaptor\Data\Archive\Documents\ImageTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Documents\SideType\Large $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

