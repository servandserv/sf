<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents\Area;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\Area\X
	 *
	 */
	class XValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\DoubleValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Double $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

