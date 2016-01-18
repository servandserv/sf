<?php

	namespace Archive\Port\Adaptor\Data\Archive\Persons\Person;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Persons\Person\League
	 *
	 */
	class LeagueValidator extends \Archive\Port\Adaptor\Data\Archive\Persons\LeagueTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

