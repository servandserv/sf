<?php

	namespace Archive\Port\Adaptor\Data\Archive\Unions\Union;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Unions\Union\Founded
	 *
	 */
	class FoundedValidator extends \Archive\Port\Adaptor\Data\Archive\Unions\UnionFoundedTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

