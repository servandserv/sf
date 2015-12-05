<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents\SideType;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\SideType\Thumb
	 *
	 */
	class ThumbValidator extends \Archive\Port\Adaptor\Data\Archive\Documents\ImageTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Documents\SideType\Thumb $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

