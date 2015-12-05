<?php
	namespace Archive\Port\Adaptor\Data\Archive\Documents;
		
	class Page extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:summerfields:Archive:Documents";
		const ROOT = "Page";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Name = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Comments = null;
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Documents\Page\Obverse
		 */
		protected $Obverse = null;
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Documents\Page\Reverse
		 */
		protected $Reverse = null;
		public function __construct() {
			parent::__construct();
			
			$this->_properties["name"] = array(
				"prop"=>"Name",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Name
			);
			$this->_properties["comments"] = array(
				"prop"=>"Comments",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Comments
			);
			$this->_properties["Obverse"] = array(
				"prop"=>"Obverse",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->Obverse
			);
			$this->_properties["Reverse"] = array(
				"prop"=>"Reverse",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Reverse
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
		 * @param \String $val
		 */
		public function setComments (  $val ) {
			$this->Comments = $val;
			$this->_properties["comments"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\Page\Obverse $val
		 */
		public function setObverse ( \Archive\Port\Adaptor\Data\Archive\Documents\Page\Obverse $val ) {
			$this->Obverse = $val;
			$this->_properties["Obverse"]["text"] = $val;
			return $this;
		}
		/**
		 * @param Archive\Port\Adaptor\Data\Archive\Documents\Page\Reverse $val
		 */
		public function setReverse ( \Archive\Port\Adaptor\Data\Archive\Documents\Page\Reverse $val ) {
			$this->Reverse = $val;
			$this->_properties["Reverse"]["text"] = $val;
			return $this;
		}
		/**
		 * @return \String
		 */
		public function getName() {
			return $this->Name;
		}
		/**
		 * @return \String
		 */
		public function getComments() {
			return $this->Comments;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Documents\Page\Obverse
		 */
		public function getObverse() {
			return $this->Obverse;
		}
		/**
		 * @return Archive\Port\Adaptor\Data\Archive\Documents\Page\Reverse
		 */
		public function getReverse() {
			return $this->Reverse;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Archive\Port\Adaptor\Data\Archive\Documents\PageValidator( $this, $handler );
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
			if( ($prop = $this->getComments()) !== NULL ) {
				$xw->writeElement( 'comments', $prop );
			}
			if( ($prop = $this->getObverse()) !== NULL ) {
        			$xw->startElement( 'Obverse');
					$prop->toXmlWriter( $xw, NULL, NULL, \Adaptor_XML::CONTENTS );
					$xw->endElement();
			}
			if( ($prop = $this->getReverse()) !== NULL ) {
        			$xw->startElement( 'Reverse');
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
				case "comments":
					$this->setComments( $xr->readString() );
					break;
				case "Obverse":
					$Obverse = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Page\\Obverse");
					$this->setObverse( $Obverse->fromXmlReader( $xr ) );
					break;
				case "Reverse":
					$Reverse = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Page\\Reverse");
					$this->setReverse( $Reverse->fromXmlReader( $xr ) );
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
			if(isset($props["comments"])) {
				$this->setComments($props["comments"]);
			}
			if(isset($props["Obverse"])) {
				$Obverse = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Page\\Obverse");
				$Obverse->fromJSON($props["Obverse"]);
				$this->setObverse($Obverse);
			}
			if(isset($props["Reverse"])) {
				$Reverse = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Documents\\Page\\Reverse");
				$Reverse->fromJSON($props["Reverse"]);
				$this->setReverse($Reverse);
			}
		}
		
	}
		

