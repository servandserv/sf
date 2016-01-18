<?php

	namespace Archive\Port\Adaptor\Data\Archive\Refs;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Refs\Ref
	 *
	 */
	class RefValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Refs\Ref $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			$this->addSimpleValidator( 'Rel', new \Archive\Port\Adaptor\Data\Archive\Refs\Ref\RelValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getRel() ), $handler ) );
			$this->addSimpleValidator( 'Href', new \Archive\Port\Adaptor\Data\Archive\Refs\Ref\HrefValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getHref() ), $handler ) );
			}
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Rel','0' );
			$this->assertMaxOccurs( 'Rel','1' );
			$this->assertMinOccurs( 'Href','0' );
			$this->assertMaxOccurs( 'Href','1' );
		}
	}
	

