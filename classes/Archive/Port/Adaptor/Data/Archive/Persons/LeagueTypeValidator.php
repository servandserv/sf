<?php

	namespace Archive\Port\Adaptor\Data\Archive\Persons;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Persons\LeagueType
	 *
	 */
	class LeagueTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
			$enum = array( 'Maclaren', 'Case', 'Congreve', 'Moseley' );
			$this->assertEnumeration( $this->tdo->_text() , $enum );
		}
	}
	

