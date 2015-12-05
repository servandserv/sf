<?php

	namespace Archive\Port\Adaptor\Data\Archive\Resources;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Resources\Resource
	 *
	 */
	class ResourceValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Resources\Resource $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'ID', new \Archive\Port\Adaptor\Data\Archive\Resources\Resource\IDValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getID() ), $handler ) );
			$this->addSimpleValidator( 'Type', new \Archive\Port\Adaptor\Data\Archive\Resources\Resource\TypeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getType() ), $handler ) );
			$this->addSimpleValidator( 'UniqueId', new \Archive\Port\Adaptor\Data\Archive\Resources\Resource\UniqueIdValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getUniqueId() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'ID','1' );
			$this->assertMaxOccurs( 'ID','1' );
			$this->assertMinOccurs( 'Type','1' );
			$this->assertMaxOccurs( 'Type','1' );
			$this->assertMinOccurs( 'UniqueId','0' );
			$this->assertMaxOccurs( 'UniqueId','1' );
		}
	}
	

