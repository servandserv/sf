<?php

	namespace Archive\Port\Adaptor\Data\Archive;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents
	 *
	 */
	class DocumentsValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Documents $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Document','0' );
			$this->assertMaxOccurs( 'Document','unbounded' );
			$this->assertMinOccurs( 'Ref','0' );
			$this->assertMaxOccurs( 'Ref','unbounded' );
		}
	}
	

