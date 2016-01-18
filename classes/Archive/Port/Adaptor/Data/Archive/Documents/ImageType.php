<?php
	namespace Archive\Port\Adaptor\Data\Archive\Documents;
		
	/**
	 * Page image.
	 * 
	 */
	class ImageType extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:summerfields:Archive:Documents";
		const ROOT = "ImageType";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Src = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $Width = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $Height = null;
		/**
		 * @maxOccurs 1 
		 * @var \Double
		 */
		protected $Size = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["src"] = array(
				"prop"=>"Src",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Src
			);
			$this->_properties["width"] = array(
				"prop"=>"Width",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Width
			);
			$this->_properties["height"] = array(
				"prop"=>"Height",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Height
			);
			$this->_properties["size"] = array(
				"prop"=>"Size",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Size
			);
		}
		/**
		 * @param \String $val
		 */
		public function setSrc (  $val ) {
			$this->Src = $val;
			$this->_properties["src"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setWidth (  $val ) {
			$this->Width = $val;
			$this->_properties["width"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setHeight (  $val ) {
			$this->Height = $val;
			$this->_properties["height"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Double $val
		 */
		public function setSize (  $val ) {
			$this->Size = $val;
			$this->_properties["size"]["text"] = $val;
			return $this;
		}
		/**
		 * @return \String
		 */
		public function getSrc() {
			return $this->Src;
		}
		/**
		 * @return \Integer
		 */
		public function getWidth() {
			return $this->Width;
		}
		/**
		 * @return \Integer
		 */
		public function getHeight() {
			return $this->Height;
		}
		/**
		 * @return \Double
		 */
		public function getSize() {
			return $this->Size;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Archive\Port\Adaptor\Data\Archive\Documents\ImageTypeValidator( $this, $handler );
			$validator->validate();
		}
			
		
		public function toXmlStr( $xmlns=self::NS, $xmlname=self::ROOT ) {
			return parent::toXmlStr($xmlns,$xmlname);
		}

		/**
		* Вывод в XMLWriter
		* @codegen true
		* @param XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		* @param int $mode
		*/
		public function toXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS, $mode = \Adaptor_XML::ELEMENT ) {
			if( $mode & \Adaptor_XML::STARTELEMENT ) $xw->startElementNS( NULL, $xmlname, $xmlns );
			$this->attributesToXmlWriter( $xw, $xmlname, $xmlns );
			$this->elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( $mode & \Adaptor_XML::ENDELEMENT ) $xw->endElement();
		}
				
		/**
		* Вывод атрибутов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function attributesToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::attributesToXmlWriter( $xw, $xmlname, $xmlns );
		}
		/**
		* Вывод элементов в \XMLWriter
		* @param \XMLWriter $xw
		* @param string $xmlname Имя корневого узла
		* @param string $xmlns Пространство имен
		*/
		protected function elementsToXmlWriter ( \XMLWriter &$xw, $xmlname = self::ROOT, $xmlns = self::NS ) {
			parent::elementsToXmlWriter( $xw, $xmlname, $xmlns );
			if( ($prop = $this->getSrc()) !== NULL ) {
				$xw->writeElement( 'src', $prop );
			}
			if( ($prop = $this->getWidth()) !== NULL ) {
				$xw->writeElement( 'width', $prop );
			}
			if( ($prop = $this->getHeight()) !== NULL ) {
				$xw->writeElement( 'height', $prop );
			}
			if( ($prop = $this->getSize()) !== NULL ) {
				$xw->writeElement( 'size', $prop );
			}
		}

		/**
		 * Чтение атрибутов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function attributesFromXmlReader ( \XMLReader &$xr ) {
			parent::attributesFromXmlReader( $xr );	
		}
				
		/**
		 * Чтение элементов из \XMLReader
		 * @param \XMLReader $xr
		 */
		public function elementsFromXmlReader ( \XMLReader &$xr ) {
			switch ( $xr->localName ) {
				case "src":
					$this->setSrc( $xr->readString() );
					break;
				case "width":
					$this->setWidth( $xr->readString() );
					break;
				case "height":
					$this->setHeight( $xr->readString() );
					break;
				case "size":
					$this->setSize( $xr->readString() );
					break;
				default:
					parent::elementsFromXmlReader( $xr );
			}
		}
		/**
		 * Чтение данных JSON объекта, результата работы json_decode,
		 * в объект
		 * @param mixed array | stdObject
		 *
		 */
		public function fromJSON( $arg ) {
			parent::fromJSON( $arg );
			$props = [];
			if( is_array( $arg ) ) {
				$props = $arg;
			} elseif( is_object( $arg ) ) {
				foreach( $arg as $k=>$v ) {
					$props[$k] = $v;
				}
			}
			if(isset($props["src"])) {
				$this->setSrc($props["src"]);
			}
			if(isset($props["width"])) {
				$this->setWidth($props["width"]);
			}
			if(isset($props["height"])) {
				$this->setHeight($props["height"]);
			}
			if(isset($props["size"])) {
				$this->setSize($props["size"]);
			}
		}
		
	}
		

