<?php

	namespace Archive\Port\Adaptor\Data\Archive\Unions;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Unions\UnionTypeType
	 *
	 */
	class UnionTypeTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\IntValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Int $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
			$enum = array( '1', '2', '3', '4', '9' );
			$this->assertEnumeration( $this->tdo->_text() , $enum );
		}
	}
	

