<?php

	namespace Archive\Port\Adaptor\Data\Archive\Unions;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Unions\UnionFoundedType
	 *
	 */
	class UnionFoundedTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		const PATTERN1 = "/(18|19|20)[0-9\?]{2}/u";
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\String $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			if($tdo !== NULL) {
			}
		}
				
		public function validate() {
			parent::validate();
			$this->assertPattern( $this->tdo->_text(), $this::PATTERN1 );
		}
	}
	

