<?php

	namespace Archive\Port\Adaptor\Data\Archive\Documents;
	
	/**
	 *
	 * Валидатор класса Archive\Port\Adaptor\Data\Archive\Documents\ImageType
	 *
	 */
	class ImageTypeValidator extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexTypeValidator {
		public function __construct( \Archive\Port\Adaptor\Data\Archive\Documents\ImageType $tdo = NULL, \Happymeal\Port\Adaptor\Data\ValidationHandler $handler = NULL ) {
			parent::__construct( $tdo, $handler);
			$this->addSimpleValidator( 'Src', new \Archive\Port\Adaptor\Data\Archive\Documents\ImageType\SrcValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\String( $tdo->getSrc() ), $handler ) );
			$this->addSimpleValidator( 'Width', new \Archive\Port\Adaptor\Data\Archive\Documents\ImageType\WidthValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getWidth() ), $handler ) );
			$this->addSimpleValidator( 'Height', new \Archive\Port\Adaptor\Data\Archive\Documents\ImageType\HeightValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Integer( $tdo->getHeight() ), $handler ) );
			$this->addSimpleValidator( 'Size', new \Archive\Port\Adaptor\Data\Archive\Documents\ImageType\SizeValidator( new \Happymeal\Port\Adaptor\Data\XML\Schema\Double( $tdo->getSize() ), $handler ) );
		}
				
		public function validate() {
			parent::validate();
			$this->assertMinOccurs( 'Src','1' );
			$this->assertMaxOccurs( 'Src','1' );
			$this->assertMinOccurs( 'Width','1' );
			$this->assertMaxOccurs( 'Width','1' );
			$this->assertMinOccurs( 'Height','1' );
			$this->assertMaxOccurs( 'Height','1' );
			$this->assertMinOccurs( 'Size','1' );
			$this->assertMaxOccurs( 'Size','1' );
		}
	}
	

