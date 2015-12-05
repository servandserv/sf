<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\Page
	 *
	 */
	class PageValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Documents\Page $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'Name', new \Archive\Port\Adaptor\Data\Archive\Documents\Page\NameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getName() ), $handler ) );
			$this->addSimpleValidator( 'Comments', new \Archive\Port\Adaptor\Data\Archive\Documents\Page\CommentsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getComments() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Name','0' );
			$this->assertMaxOccurs( 'Name','1' );
			$this->assertMinOccurs( 'Comments','0' );
			$this->assertMaxOccurs( 'Comments','1' );
			$this->assertMinOccurs( 'Obverse','1' );
			$this->assertMaxOccurs( 'Obverse','1' );
			$this->assertMinOccurs( 'Reverse','0' );
			$this->assertMaxOccurs( 'Reverse','1' );
		}
	}
	

