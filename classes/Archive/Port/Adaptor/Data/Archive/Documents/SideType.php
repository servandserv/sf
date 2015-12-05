<?php
	namespace Archive\Port\Adaptor\Data\Archive\Documents;
		
	/**
	 * One side of the document page
	 * 
	 */
	class SideType extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:summerfields:Archive:Documents";
		const ROOT = "SideType";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Name = null;
		/**
		 * @maxOccurs unbound Page image area.
		 * @var Archive\Port\Adaptor\Data\Archive\Documents\Area[]
		 */
		protected $Area = [];
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Documents\SideType\Large
		 */
		protected $Large = null;
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Documents\SideType\Thumb
		 */
		protected $Thumb = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["name"] = array(
				"prop"=>"Name",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Name
			);
			$this->_properties["Area"] = array(
				"prop"=>"Area",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Area
			);
			$this->_properties["Large"] = array(
				"prop"=>"Large",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Large
			);
			$this->_properties["Thumb"] = array(
				"prop"=>"Thumb",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Thumb
			);
		}
		/**
		 * @param \String $val
		 */
		public function setName (  $val ) {
			$this->Name = $val;
			$this->_properties["name"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\Area $val
		 */
		public function setArea ( \Archive\Port\Adaptor\Data\Archive\Documents\Area $val ) {
			$this->Area[] = $val;
			$this->_properties["Area"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\Area[]
		 */
		public function setAreaArray ( array $vals ) {
			$this->Area = $vals;
			$this->_properties["Area"]["text"] = $vals;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\SideType\Large $val
		 */
		public function setLarge ( \Archive\Port\Adaptor\Data\Archive\Documents\SideType\Large $val ) {
			$this->Large = $val;
			$this->_properties["Large"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\SideType\Thumb $val
		 */
		public function setThumb ( \Archive\Port\Adaptor\Data\Archive\Documents\SideType\Thumb $val ) {
			$this->Thumb = $val;
			$this->_properties["Thumb"]["text"] = $val;
			return $this;
		}
		/**
		 * @return \String
		 */
		public function getName() {
			return $this->Name;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Documents\Area | []
		 */
		public function getArea($index = null) {
			if( $index !== null ) {
				$res = isset($this->Area[$index]) ? $this->Area[$index] : null;
			} else {
				$res = $this->Area;
			}
			return $res;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Documents\SideType\Large
		 */
		public function getLarge() {
			return $this->Large;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Documents\SideType\Thumb
		 */
		public function getThumb() {
			return $this->Thumb;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Archive\Port\Adaptor\Data\Archive\Documents\SideTypeValidator( $this, $handler );
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
			if( ($prop = $this->getName()) !== NULL ) {
				$xw->writeElement( 'name', $prop );
			}
			if( $props = $this->getArea() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( ($prop = $this->getLarge()) !== NULL ) {
        			$xw->startElement( 'Large');
					$prop->toXmlWriter( $xw, NULL, NULL, \Adaptor_XML::CONTENTS );
					$xw->endElement();
			}
			if( ($prop = $this->getThumb()) !== NULL ) {
        			$xw->startElement( 'Thumb');
					$prop->toXmlWriter( $xw, NULL, NULL, \Adaptor_XML::CONTENTS );
					$xw->endElement();
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
				case "name":
					$this->setName( $xr->readString() );
					break;
				case "Area":
					$Area = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Area");
					$this->setArea( $Area->fromXmlReader( $xr ) );
					break;
				case "Large":
					$Large = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\SideType\\Large");
					$this->setLarge( $Large->fromXmlReader( $xr ) );
					break;
				case "Thumb":
					$Thumb = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\SideType\\Thumb");
					$this->setThumb( $Thumb->fromXmlReader( $xr ) );
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
			if(isset($props["name"])) {
				$this->setName($props["name"]);
			}
			if(isset($props["Area"])) {
				if( is_array($props["Area"]) ) {
					foreach($props["Area"] as $k=>$v) {
						$Area = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Area");
						$Area->fromJSON($v);
						$this->setArea($Area);
					}
				}
			}
			if(isset($props["Large"])) {
				$Large = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\SideType\\Large");
				$Large->fromJSON($props["Large"]);
				$this->setLarge($Large);
			}
			if(isset($props["Thumb"])) {
				$Thumb = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\SideType\\Thumb");
				$Thumb->fromJSON($props["Thumb"]);
				$this->setThumb($Thumb);
			}
		}
		
	}
		

