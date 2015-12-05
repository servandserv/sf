<?php

	namespace Archive\Port\Adaptor\Data\Archive;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Resources
	 *
	 */
	class ResourcesValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Resources $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Persons','0' );
			$this->assertMaxOccurs( 'Persons','1' );
			$this->assertMinOccurs( 'Unions','0' );
			$this->assertMaxOccurs( 'Unions','1' );
			$this->assertMinOccurs( 'Documents','0' );
			$this->assertMaxOccurs( 'Documents','1' );
			$this->assertMinOccurs( 'Events','0' );
			$this->assertMaxOccurs( 'Events','1' );
		}
	}
	

