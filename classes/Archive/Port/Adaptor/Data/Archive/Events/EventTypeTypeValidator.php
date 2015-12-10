<?php

	namespace Archive\Port\Adaptor\Data\Archive\Events;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Events\EventTypeType
	 *
	 */
	class EventTypeTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\IntValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Int $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
			$enum = array( '1', '2' );
			$this->assertEnumeration( $this->tdo->_text() , $enum );
		}
	}
	

