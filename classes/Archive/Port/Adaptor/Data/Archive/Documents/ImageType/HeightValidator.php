<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents\ImageType;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\ImageType\Height
	 *
	 */
	class HeightValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\IntegerValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Integer $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

