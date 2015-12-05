<?php
	namespace Archive\Port\Adaptor\Data\Archive;
		
	class Resources extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:summerfields:Archive:Resources";
		const ROOT = "Resources";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Persons
		 */
		protected $Persons = null;
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Unions
		 */
		protected $Unions = null;
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Documents
		 */
		protected $Documents = null;
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Events
		 */
		protected $Events = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Persons"] = array(
				"prop"=>"Persons",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Persons
			);
			$this->_properties["Unions"] = array(
				"prop"=>"Unions",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Unions
			);
			$this->_properties["Documents"] = array(
				"prop"=>"Documents",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Documents
			);
			$this->_properties["Events"] = array(
				"prop"=>"Events",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Events
			);
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Persons $val
		 */
		public function setPersons ( \Archive\Port\Adaptor\Data\Archive\Persons $val ) {
			$this->Persons = $val;
			$this->_properties["Persons"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Unions $val
		 */
		public function setUnions ( \Archive\Port\Adaptor\Data\Archive\Unions $val ) {
			$this->Unions = $val;
			$this->_properties["Unions"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents $val
		 */
		public function setDocuments ( \Archive\Port\Adaptor\Data\Archive\Documents $val ) {
			$this->Documents = $val;
			$this->_properties["Documents"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Events $val
		 */
		public function setEvents ( \Archive\Port\Adaptor\Data\Archive\Events $val ) {
			$this->Events = $val;
			$this->_properties["Events"]["text"] = $val;
			return $this;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Persons
		 */
		public function getPersons() {
			return $this->Persons;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Unions
		 */
		public function getUnions() {
			return $this->Unions;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Documents
		 */
		public function getDocuments() {
			return $this->Documents;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Events
		 */
		public function getEvents() {
			return $this->Events;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Archive\Port\Adaptor\Data\Archive\ResourcesValidator( $this, $handler );
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
			if( ($prop = $this->getPersons()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getUnions()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getDocuments()) !== NULL ) {
					$prop->toXmlWriter( $xw );
			}
			if( ($prop = $this->getEvents()) !== NULL ) {
					$prop->toXmlWriter( $xw );
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
				case "Persons":
					$Persons = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Persons");
					$this->setPersons( $Persons->fromXmlReader( $xr ) );
					break;
				case "Unions":
					$Unions = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Unions");
					$this->setUnions( $Unions->fromXmlReader( $xr ) );
					break;
				case "Documents":
					$Documents = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents");
					$this->setDocuments( $Documents->fromXmlReader( $xr ) );
					break;
				case "Events":
					$Events = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Events");
					$this->setEvents( $Events->fromXmlReader( $xr ) );
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
			if(isset($props["Persons"])) {
				$Persons = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Persons");
				$Persons->fromJSON($props["Persons"]);
				$this->setPersons($Persons);
			}
			if(isset($props["Unions"])) {
				$Unions = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Unions");
				$Unions->fromJSON($props["Unions"]);
				$this->setUnions($Unions);
			}
			if(isset($props["Documents"])) {
				$Documents = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents");
				$Documents->fromJSON($props["Documents"]);
				$this->setDocuments($Documents);
			}
			if(isset($props["Events"])) {
				$Events = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Events");
				$Events->fromJSON($props["Events"]);
				$this->setEvents($Events);
			}
		}
		
	}
		

