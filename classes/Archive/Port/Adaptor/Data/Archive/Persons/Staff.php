<?php
	namespace Archive\Port\Adaptor\Data\Archive\Persons;
		
	class Staff extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:summerfields:Archive:Persons";
		const ROOT = "Staff";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var Archive\Port\Adaptor\Data\Archive\Refs\Ref[]
		 */
		protected $Ref = [];
		/**
		 * @maxOccurs unbounded 
		 * @var Archive\Port\Adaptor\Data\Archive\Persons\Person[]
		 */
		protected $Person = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Ref"] = array(
				"prop"=>"Ref",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Ref
			);
			$this->_properties["Person"] = array(
				"prop"=>"Person",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Person
			);
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Refs\Ref $val
		 */
		public function setRef ( \Archive\Port\Adaptor\Data\Archive\Refs\Ref $val ) {
			$this->Ref[] = $val;
			$this->_properties["Ref"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Refs\Ref[]
		 */
		public function setRefArray ( array $vals ) {
			$this->Ref = $vals;
			$this->_properties["Ref"]["text"] = $vals;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Persons\Person $val
		 */
		public function setPerson ( \Archive\Port\Adaptor\Data\Archive\Persons\Person $val ) {
			$this->Person[] = $val;
			$this->_properties["Person"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Persons\Person[]
		 */
		public function setPersonArray ( array $vals ) {
			$this->Person = $vals;
			$this->_properties["Person"]["text"] = $vals;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Refs\Ref | []
		 */
		public function getRef($index = null) {
			if( $index !== null ) {
				$res = isset($this->Ref[$index]) ? $this->Ref[$index] : null;
			} else {
				$res = $this->Ref;
			}
			return $res;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Persons\Person | []
		 */
		public function getPerson($index = null) {
			if( $index !== null ) {
				$res = isset($this->Person[$index]) ? $this->Person[$index] : null;
			} else {
				$res = $this->Person;
			}
			return $res;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Archive\Port\Adaptor\Data\Archive\Persons\StaffValidator( $this, $handler );
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
			if( $props = $this->getRef() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getPerson() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
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
				case "Ref":
					$Ref = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Refs\\Ref");
					$this->setRef( $Ref->fromXmlReader( $xr ) );
					break;
				case "Person":
					$Person = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Persons\\Person");
					$this->setPerson( $Person->fromXmlReader( $xr ) );
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
			if(isset($props["Ref"])) {
				if( is_array($props["Ref"]) ) {
					foreach($props["Ref"] as $k=>$v) {
						$Ref = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Refs\\Ref");
						$Ref->fromJSON($v);
						$this->setRef($Ref);
					}
				}
			}
			if(isset($props["Person"])) {
				if( is_array($props["Person"]) ) {
					foreach($props["Person"] as $k=>$v) {
						$Person = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Persons\\Person");
						$Person->fromJSON($v);
						$this->setPerson($Person);
					}
				}
			}
		}
		
	}
		

