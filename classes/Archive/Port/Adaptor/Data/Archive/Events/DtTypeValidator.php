<?php

	namespace Archive\Port\Adaptor\Data\Archive\Events;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Events\DtType
	 *
	 */
	class DtTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\StringValidator {
		const PATTERN1 = "/(18|19|20)(\\d|\\?){2}(-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01]))?/u";
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
	

