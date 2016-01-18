<?php

	namespace Archive\Port\Adaptor\Data\Archive\Events;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Events\Event
	 *
	 */
	class EventValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Events\Event $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			$this->addSimpleValidator( 'Autouid', new \Archive\Port\Adaptor\Data\Archive\Events\Event\AutouidValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getAutouid() ), $handler ) );
			$this->addSimpleValidator( 'ID', new \Archive\Port\Adaptor\Data\Archive\Events\Event\IDValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getID() ), $handler ) );
			$this->addSimpleValidator( 'Name', new \Archive\Port\Adaptor\Data\Archive\Events\Event\NameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getName() ), $handler ) );
			$this->addSimpleValidator( 'Dt', new \Archive\Port\Adaptor\Data\Archive\Events\Event\DtValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getDt() ), $handler ) );
			$this->addSimpleValidator( 'Type', new \Archive\Port\Adaptor\Data\Archive\Events\Event\TypeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Int( $tdo->getType() ), $handler ) );
			$this->addSimpleValidator( 'Comments', new \Archive\Port\Adaptor\Data\Archive\Events\Event\CommentsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getComments() ), $handler ) );
			}
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Autouid','0' );
			$this->assertMaxOccurs( 'Autouid','1' );
			$this->assertMinOccurs( 'ID','0' );
			$this->assertMaxOccurs( 'ID','1' );
			$this->assertMinOccurs( 'Name','1' );
			$this->assertMaxOccurs( 'Name','1' );
			$this->assertMinOccurs( 'Dt','1' );
			$this->assertMaxOccurs( 'Dt','1' );
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
	

