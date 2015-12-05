<?php
	namespace Archive\Port\Adaptor\Data\Archive;
		
	class Documents extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:summerfields:Archive:Documents";
		const ROOT = "Documents";
		const PREF = NULL;
		/**
		 * @maxOccurs unbounded 
		 * @var Archive\Port\Adaptor\Data\Archive\Documents\Document[]
		 */
		protected $Document = [];
		/**
		 * @maxOccurs unbounded 
		 * @var Archive\Port\Adaptor\Data\Archive\Refs\Ref[]
		 */
		protected $Ref = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["Document"] = array(
				"prop"=>"Document",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Document
			);
			$this->_properties["Ref"] = array(
				"prop"=>"Ref",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Ref
			);
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\Document $val
		 */
		public function setDocument ( \Archive\Port\Adaptor\Data\Archive\Documents\Document $val ) {
			$this->Document[] = $val;
			$this->_properties["Document"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\Document[]
		 */
		public function setDocumentArray ( array $vals ) {
			$this->Document = $vals;
			$this->_properties["Document"]["text"] = $vals;
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
		 * @return Archive\Port\Adaptor\Data\Archive\Documents\Document | []
		 */
		public function getDocument($index = null) {
			if( $index !== null ) {
				$res = isset($this->Document[$index]) ? $this->Document[$index] : null;
			} else {
				$res = $this->Document;
			}
			return $res;
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
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Archive\Port\Adaptor\Data\Archive\DocumentsValidator( $this, $handler );
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
			if( $props = $this->getDocument() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( $props = $this->getRef() ) {
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
				case "Document":
					$Document = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Document");
					$this->setDocument( $Document->fromXmlReader( $xr ) );
					break;
				case "Ref":
					$Ref = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Refs\\Ref");
					$this->setRef( $Ref->fromXmlReader( $xr ) );
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
			if(isset($props["Document"])) {
				if( is_array($props["Document"]) ) {
					foreach($props["Document"] as $k=>$v) {
						$Document = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Document");
						$Document->fromJSON($v);
						$this->setDocument($Document);
					}
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
		}
		
	}
		

