<?php

	namespace Archive\Port\Adaptor\Data\Archive\Persons;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Persons\Person
	 *
	 */
	class PersonValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Persons\Person $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			$this->addSimpleValidator( 'Autouid', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\AutouidValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getAutouid() ), $handler ) );
			$this->addSimpleValidator( 'ID', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\IDValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getID() ), $handler ) );
			$this->addSimpleValidator( 'FullName', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\FullNameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getFullName() ), $handler ) );
			$this->addSimpleValidator( 'Initials', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\InitialsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getInitials() ), $handler ) );
			$this->addSimpleValidator( 'MiddleNames', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\MiddleNamesValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getMiddleNames() ), $handler ) );
			$this->addSimpleValidator( 'FirstName', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\FirstNameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getFirstName() ), $handler ) );
			$this->addSimpleValidator( 'LastName', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\LastNameValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getLastName() ), $handler ) );
			$this->addSimpleValidator( 'Esq', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\EsqValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getEsq() ), $handler ) );
			$this->addSimpleValidator( 'Deceased', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\DeceasedValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getDeceased() ), $handler ) );
			$this->addSimpleValidator( 'DOB', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\DOBValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getDOB() ), $handler ) );
			$this->addSimpleValidator( 'RollNo', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\RollNoValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getRollNo() ), $handler ) );
			$this->addSimpleValidator( 'No', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\NoValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getNo() ), $handler ) );
			$this->addSimpleValidator( 'League', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\LeagueValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getLeague() ), $handler ) );
			$this->addSimpleValidator( 'Comments', new \Archive\Port\Adaptor\Data\Archive\Persons\Person\CommentsValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getComments() ), $handler ) );
			}
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Autouid','0' );
			$this->assertMaxOccurs( 'Autouid','1' );
			$this->assertMinOccurs( 'ID','0' );
			$this->assertMaxOccurs( 'ID','1' );
			$this->assertMinOccurs( 'FullName','1' );
			$this->assertMaxOccurs( 'FullName','1' );
			$this->assertMinOccurs( 'Initials','0' );
			$this->assertMaxOccurs( 'Initials','1' );
			$this->assertMinOccurs( 'MiddleNames','0' );
			$this->assertMaxOccurs( 'MiddleNames','1' );
			$this->assertMinOccurs( 'FirstName','0' );
			$this->assertMaxOccurs( 'FirstName','1' );
			$this->assertMinOccurs( 'LastName','0' );
			$this->assertMaxOccurs( 'LastName','1' );
			$this->assertMinOccurs( 'Esq','0' );
			$this->assertMaxOccurs( 'Esq','1' );
			$this->assertMinOccurs( 'Deceased','0' );
			$this->assertMaxOccurs( 'Deceased','1' );
			$this->assertMinOccurs( 'DOB','0' );
			$this->assertMaxOccurs( 'DOB','1' );
			$this->assertMinOccurs( 'RollNo','0' );
			$this->assertMaxOccurs( 'RollNo','1' );
			$this->assertMinOccurs( 'No','0' );
			$this->assertMaxOccurs( 'No','1' );
			$this->assertMinOccurs( 'League','0' );
			$this->assertMaxOccurs( 'League','1' );
			$this->assertMinOccurs( 'Comments','0' );
			$this->assertMaxOccurs( 'Comments','1' );
			$this->assertMinOccurs( 'Ref','0' );
			$this->assertMaxOccurs( 'Ref','unbounded' );
			$this->assertMinOccurs( 'Link','0' );
			$this->assertMaxOccurs( 'Link','1' );
		}
	}
	

