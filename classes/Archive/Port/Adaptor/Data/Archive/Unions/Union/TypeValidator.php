<?php

	namespace Archive\Port\Adaptor\Data\Archive\Unions\Union;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Unions\Union\Type
	 *
	 */
	class TypeValidator extends \Archive\Port\Adaptor\Data\Archive\Unions\UnionTypeTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Int $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

