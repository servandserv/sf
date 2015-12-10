<?php

	namespace Archive\Port\Adaptor\Data\Archive\Events\Event;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Events\Event\Type
	 *
	 */
	class TypeValidator extends \Archive\Port\Adaptor\Data\Archive\Events\EventTypeTypeValidator {
		public function __construct( \Happymeal\Port\Adaptor\Data\XML\Schema\Int $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
		}
				
		public function validate() {
			parent::validate();
		}
	}
	

