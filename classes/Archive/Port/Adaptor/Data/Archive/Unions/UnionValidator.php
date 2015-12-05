<?php

	namespace Archive\Port\Adaptor\Data\Archive\Unions;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Unions\Union
	 *
	 */
	class UnionValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Unions\Union $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'Autouid', new \Archive\Port\Adaptor\Data\Archive\Unions\Union\AutouidValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getAutouid() ), $handler ) );
			$this->addSimpleValidator( 'ID', new \Archive\Port\Adaptor\Data\Archive\Unions\Union\IDValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getID() ), $handler ) );
			$this->addSimpleValidator( 'Name', new \Archive\Port\Adaptor\Data\Archive\Unions\Union\NameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getName() ), $handler ) );
			$this->addSimpleValidator( 'Founded', new \Archive\Port\Adaptor\Data\Archive\Unions\Union\FoundedValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getFounded() ), $handler ) );
			$this->addSimpleValidator( 'Type', new \Archive\Port\Adaptor\Data\Archive\Unions\Union\TypeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Int( $tdo->getType() ), $handler ) );
			$this->addSimpleValidator( 'Comments', new \Archive\Port\Adaptor\Data\Archive\Unions\Union\CommentsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getComments() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Autouid','0' );
			$this->assertMaxOccurs( 'Autouid','1' );
			$this->assertMinOccurs( 'ID','0' );
			$this->assertMaxOccurs( 'ID','1' );
			$this->assertMinOccurs( 'Name','1' );
			$this->assertMaxOccurs( 'Name','1' );
			$this->assertMinOccurs( 'Founded','1' );
			$this->assertMaxOccurs( 'Founded','1' );
			$this->assertMinOccurs( 'Type','1' );
			$this->assertMaxOccurs( 'Type','1' );
			$this->assertMinOccurs( 'Comments','0' );
			$this->assertMaxOccurs( 'Comments','1' );
			$this->assertMinOccurs( 'Link','0' );
			$this->assertMaxOccurs( 'Link','1' );
			$this->assertMinOccurs( 'Ref','0' );
			$this->assertMaxOccurs( 'Ref','unbounded' );
		}
	}
	

