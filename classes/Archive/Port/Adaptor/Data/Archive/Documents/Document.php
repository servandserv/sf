<?php
	namespace Archive\Port\Adaptor\Data\Archive\Documents;
		
	class Document extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:summerfields:Archive:Documents";
		const ROOT = "Document";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Autouid = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $ID = null;
		/**
		 * @maxOccurs 1 
		 * @var \Int
		 */
		protected $Type = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Year = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Path = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $Published = null;
		/**
		 * @maxOccurs 1 
		 * @var \Int
		 */
		protected $Readiness = "0";
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Comments = null;
		/**
		 * @maxOccurs unbounded 
		 * @var Archive\Port\Adaptor\Data\Archive\Documents\Page[]
		 */
		protected $Page = [];
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Links\Link
		 */
		protected $Link = null;
		/**
		 * @maxOccurs unbounded 
		 * @var Archive\Port\Adaptor\Data\Archive\Refs\Ref[]
		 */
		protected $Ref = [];
		public function __construct() {
			parent::__construct();
			
			$this->_properties["autouid"] = array(
				"prop"=>"Autouid",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Autouid
			);
			$this->_properties["ID"] = array(
				"prop"=>"ID",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->ID
			);
			$this->_properties["type"] = array(
				"prop"=>"Type",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Type
			);
			$this->_properties["year"] = array(
				"prop"=>"Year",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Year
			);
			$this->_properties["path"] = array(
				"prop"=>"Path",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Path
			);
			$this->_properties["published"] = array(
				"prop"=>"Published",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Published
			);
			$this->_properties["readiness"] = array(
				"prop"=>"Readiness",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Readiness
			);
			$this->_properties["comments"] = array(
				"prop"=>"Comments",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Comments
			);
			$this->_properties["Page"] = array(
				"prop"=>"Page",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Page
			);
			$this->_properties["Link"] = array(
				"prop"=>"Link",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Link
			);
			$this->_properties["Ref"] = array(
				"prop"=>"Ref",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Ref
			);
		}
		/**
		 * @param \String $val
		 */
		public function setAutouid (  $val ) {
			$this->Autouid = $val;
			$this->_properties["autouid"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setID (  $val ) {
			$this->ID = $val;
			$this->_properties["ID"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Int $val
		 */
		public function setType (  $val ) {
			$this->Type = $val;
			$this->_properties["type"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setYear (  $val ) {
			$this->Year = $val;
			$this->_properties["year"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setPath (  $val ) {
			$this->Path = $val;
			$this->_properties["path"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setPublished (  $val ) {
			$this->Published = $val;
			$this->_properties["published"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Int $val
		 */
		public function setReadiness (  $val ) {
			$this->Readiness = $val;
			$this->_properties["readiness"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setComments (  $val ) {
			$this->Comments = $val;
			$this->_properties["comments"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\Page $val
		 */
		public function setPage ( \Archive\Port\Adaptor\Data\Archive\Documents\Page $val ) {
			$this->Page[] = $val;
			$this->_properties["Page"]["text"][] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\Page[]
		 */
		public function setPageArray ( array $vals ) {
			$this->Page = $vals;
			$this->_properties["Page"]["text"] = $vals;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Links\Link $val
		 */
		public function setLink ( \Archive\Port\Adaptor\Data\Archive\Links\Link $val ) {
			$this->Link = $val;
			$this->_properties["Link"]["text"] = $val;
			return $this;
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
		 * @return \String
		 */
		public function getAutouid() {
			return $this->Autouid;
		}
		/**
		 * @return \String
		 */
		public function getID() {
			return $this->ID;
		}
		/**
		 * @return \Int
		 */
		public function getType() {
			return $this->Type;
		}
		/**
		 * @return \String
		 */
		public function getYear() {
			return $this->Year;
		}
		/**
		 * @return \String
		 */
		public function getPath() {
			return $this->Path;
		}
		/**
		 * @return \Integer
		 */
		public function getPublished() {
			return $this->Published;
		}
		/**
		 * @return \Int
		 */
		public function getReadiness() {
			return $this->Readiness;
		}
		/**
		 * @return \String
		 */
		public function getComments() {
			return $this->Comments;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Documents\Page | []
		 */
		public function getPage($index = null) {
			if( $index !== null ) {
				$res = isset($this->Page[$index]) ? $this->Page[$index] : null;
			} else {
				$res = $this->Page;
			}
			return $res;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Links\Link
		 */
		public function getLink() {
			return $this->Link;
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
			$validator = new \Archive\Port\Adaptor\Data\Archive\Documents\DocumentValidator( $this, $handler );
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
			if( ($prop = $this->getAutouid()) !== NULL ) {
				$xw->writeElement( 'autouid', $prop );
			}
			if( ($prop = $this->getID()) !== NULL ) {
				$xw->writeElement( 'ID', $prop );
			}
			if( ($prop = $this->getType()) !== NULL ) {
				$xw->writeElement( 'type', $prop );
			}
			if( ($prop = $this->getYear()) !== NULL ) {
				$xw->writeElement( 'year', $prop );
			}
			if( ($prop = $this->getPath()) !== NULL ) {
				$xw->writeElement( 'path', $prop );
			}
			if( ($prop = $this->getPublished()) !== NULL ) {
				$xw->writeElement( 'published', $prop );
			}
			if( ($prop = $this->getReadiness()) !== NULL ) {
				$xw->writeElement( 'readiness', $prop );
			}
			if( ($prop = $this->getComments()) !== NULL ) {
				$xw->writeElement( 'comments', $prop );
			}
			if( $props = $this->getPage() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( ($prop = $this->getLink()) !== NULL ) {
					$prop->toXmlWriter( $xw );
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
				case "autouid":
					$this->setAutouid( $xr->readString() );
					break;
				case "ID":
					$this->setID( $xr->readString() );
					break;
				case "type":
					$this->setType( $xr->readString() );
					break;
				case "year":
					$this->setYear( $xr->readString() );
					break;
				case "path":
					$this->setPath( $xr->readString() );
					break;
				case "published":
					$this->setPublished( $xr->readString() );
					break;
				case "readiness":
					$this->setReadiness( $xr->readString() );
					break;
				case "comments":
					$this->setComments( $xr->readString() );
					break;
				case "Page":
					$Page = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Page");
					$this->setPage( $Page->fromXmlReader( $xr ) );
					break;
				case "Link":
					$Link = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Links\\Link");
					$this->setLink( $Link->fromXmlReader( $xr ) );
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
			if(isset($props["autouid"])) {
				$this->setAutouid($props["autouid"]);
			}
			if(isset($props["ID"])) {
				$this->setID($props["ID"]);
			}
			if(isset($props["type"])) {
				$this->setType($props["type"]);
			}
			if(isset($props["year"])) {
				$this->setYear($props["year"]);
			}
			if(isset($props["path"])) {
				$this->setPath($props["path"]);
			}
			if(isset($props["published"])) {
				$this->setPublished($props["published"]);
			}
			if(isset($props["readiness"])) {
				$this->setReadiness($props["readiness"]);
			}
			if(isset($props["comments"])) {
				$this->setComments($props["comments"]);
			}
			if(isset($props["Page"])) {
				if( is_array($props["Page"]) ) {
					foreach($props["Page"] as $k=>$v) {
						$Page = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Page");
						$Page->fromJSON($v);
						$this->setPage($Page);
					}
				}
			}
			if(isset($props["Link"])) {
				$Link = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Links\\Link");
				$Link->fromJSON($props["Link"]);
				$this->setLink($Link);
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
		

