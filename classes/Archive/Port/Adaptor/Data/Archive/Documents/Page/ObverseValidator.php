<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents\Page;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\Page\Obverse
	 *
	 */
	class ObverseValidator extends \Archive\Port\Adaptor\Data\Archive\Documents\SideTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Documents\Page\Obverse $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

