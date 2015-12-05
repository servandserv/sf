<?php

	namespace Archive\Port\Adaptor\Data\Archive;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Links
	 *
	 */
	class LinksValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Links $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Ref','0' );
			$this->assertMaxOccurs( 'Ref','unbounded' );
			$this->assertMinOccurs( 'Link','0' );
			$this->assertMaxOccurs( 'Link','unbounded' );
		}
	}
	

