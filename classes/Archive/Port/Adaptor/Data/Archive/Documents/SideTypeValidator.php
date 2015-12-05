<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\SideType
	 *
	 */
	class SideTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Documents\SideType $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'Name', new \Archive\Port\Adaptor\Data\Archive\Documents\SideType\NameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getName() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Name','1' );
			$this->assertMaxOccurs( 'Name','1' );
			$this->assertMinOccurs( 'Area','0' );
			$this->assertMaxOccurs( 'Area','unbound' );
			$this->assertMinOccurs( 'Large','0' );
			$this->assertMaxOccurs( 'Large','1' );
			$this->assertMinOccurs( 'Thumb','0' );
			$this->assertMaxOccurs( 'Thumb','1' );
		}
	}
	

