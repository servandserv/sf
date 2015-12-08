<?php
	namespace Archive\Port\Adaptor\Data\Archive\Persons;
		
	class Person extends \Happymeal\Port\Adaptor\Data\XML\Schema\AnyComplexType {
			
		const NS = "urn:com:summerfields:Archive:Persons";
		const ROOT = "Person";
		const PREF = NULL;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $Autouid = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $ID = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $FullName = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Initials = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $MiddleNames = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $FirstName = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $LastName = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Esq = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Deceased = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $DOB = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $RollNo = null;
		/**
		 * @maxOccurs 1 
		 * @var \Integer
		 */
		protected $No = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $League = null;
		/**
		 * @maxOccurs 1 
		 * @var \String
		 */
		protected $Comments = null;
		/**
		 * @maxOccurs unbounded 
		 * @var Archive\Port\Adaptor\Data\Archive\Refs\Ref[]
		 */
		protected $Ref = [];
		/**
		 * @maxOccurs 1 
		 * @var Archive\Port\Adaptor\Data\Archive\Links\Link
		 */
		protected $Link = null;
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
			$this->_properties["fullName"] = array(
				"prop"=>"FullName",
				"ns"=>"",
				"minOccurs"=>1,
				"text"=>$this->FullName
			);
			$this->_properties["initials"] = array(
				"prop"=>"Initials",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Initials
			);
			$this->_properties["middleNames"] = array(
				"prop"=>"MiddleNames",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->MiddleNames
			);
			$this->_properties["firstName"] = array(
				"prop"=>"FirstName",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->FirstName
			);
			$this->_properties["lastName"] = array(
				"prop"=>"LastName",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->LastName
			);
			$this->_properties["esq"] = array(
				"prop"=>"Esq",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Esq
			);
			$this->_properties["deceased"] = array(
				"prop"=>"Deceased",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Deceased
			);
			$this->_properties["DOB"] = array(
				"prop"=>"DOB",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->DOB
			);
			$this->_properties["rollNo"] = array(
				"prop"=>"RollNo",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->RollNo
			);
			$this->_properties["no"] = array(
				"prop"=>"No",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->No
			);
			$this->_properties["league"] = array(
				"prop"=>"League",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->League
			);
			$this->_properties["comments"] = array(
				"prop"=>"Comments",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Comments
			);
			$this->_properties["Ref"] = array(
				"prop"=>"Ref",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Ref
			);
			$this->_properties["Link"] = array(
				"prop"=>"Link",
				"ns"=>"",
				"minOccurs"=>0,
				"text"=>$this->Link
			);
		}
		/**
		 * @param \Integer $val
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
		 * @param \String $val
		 */
		public function setFullName (  $val ) {
			$this->FullName = $val;
			$this->_properties["fullName"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setInitials (  $val ) {
			$this->Initials = $val;
			$this->_properties["initials"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setMiddleNames (  $val ) {
			$this->MiddleNames = $val;
			$this->_properties["middleNames"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setFirstName (  $val ) {
			$this->FirstName = $val;
			$this->_properties["firstName"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setLastName (  $val ) {
			$this->LastName = $val;
			$this->_properties["lastName"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setEsq (  $val ) {
			$this->Esq = $val;
			$this->_properties["esq"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setDeceased (  $val ) {
			$this->Deceased = $val;
			$this->_properties["deceased"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setDOB (  $val ) {
			$this->DOB = $val;
			$this->_properties["DOB"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setRollNo (  $val ) {
			$this->RollNo = $val;
			$this->_properties["rollNo"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \Integer $val
		 */
		public function setNo (  $val ) {
			$this->No = $val;
			$this->_properties["no"]["text"] = $val;
			return $this;
		}
		/**
		 * @param \String $val
		 */
		public function setLeague (  $val ) {
			$this->League = $val;
			$this->_properties["league"]["text"] = $val;
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
		 * @param Archive\Port\Adaptor\Data\Archive\Links\Link $val
		 */
		public function setLink ( \Archive\Port\Adaptor\Data\Archive\Links\Link $val ) {
			$this->Link = $val;
			$this->_properties["Link"]["text"] = $val;
			return $this;
		}
		/**
		 * @return \Integer
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
		 * @return \String
		 */
		public function getFullName() {
			return $this->FullName;
		}
		/**
		 * @return \String
		 */
		public function getInitials() {
			return $this->Initials;
		}
		/**
		 * @return \String
		 */
		public function getMiddleNames() {
			return $this->MiddleNames;
		}
		/**
		 * @return \String
		 */
		public function getFirstName() {
			return $this->FirstName;
		}
		/**
		 * @return \String
		 */
		public function getLastName() {
			return $this->LastName;
		}
		/**
		 * @return \String
		 */
		public function getEsq() {
			return $this->Esq;
		}
		/**
		 * @return \String
		 */
		public function getDeceased() {
			return $this->Deceased;
		}
		/**
		 * @return \String
		 */
		public function getDOB() {
			return $this->DOB;
		}
		/**
		 * @return \Integer
		 */
		public function getRollNo() {
			return $this->RollNo;
		}
		/**
		 * @return \Integer
		 */
		public function getNo() {
			return $this->No;
		}
		/**
		 * @return \String
		 */
		public function getLeague() {
			return $this->League;
		}
		/**
		 * @return \String
		 */
		public function getComments() {
			return $this->Comments;
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
		 * @return Archive\Port\Adaptor\Data\Archive\Links\Link
		 */
		public function getLink() {
			return $this->Link;
		}
		
		public function validateType( \Happymeal\Port\Adaptor\Data\ValidationHandler $handler ) {
			$validator = new \Archive\Port\Adaptor\Data\Archive\Persons\PersonValidator( $this, $handler );
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
			if( ($prop = $this->getFullName()) !== NULL ) {
				$xw->writeElement( 'fullName', $prop );
			}
			if( ($prop = $this->getInitials()) !== NULL ) {
				$xw->writeElement( 'initials', $prop );
			}
			if( ($prop = $this->getMiddleNames()) !== NULL ) {
				$xw->writeElement( 'middleNames', $prop );
			}
			if( ($prop = $this->getFirstName()) !== NULL ) {
				$xw->writeElement( 'firstName', $prop );
			}
			if( ($prop = $this->getLastName()) !== NULL ) {
				$xw->writeElement( 'lastName', $prop );
			}
			if( ($prop = $this->getEsq()) !== NULL ) {
				$xw->writeElement( 'esq', $prop );
			}
			if( ($prop = $this->getDeceased()) !== NULL ) {
				$xw->writeElement( 'deceased', $prop );
			}
			if( ($prop = $this->getDOB()) !== NULL ) {
				$xw->writeElement( 'DOB', $prop );
			}
			if( ($prop = $this->getRollNo()) !== NULL ) {
				$xw->writeElement( 'rollNo', $prop );
			}
			if( ($prop = $this->getNo()) !== NULL ) {
				$xw->writeElement( 'no', $prop );
			}
			if( ($prop = $this->getLeague()) !== NULL ) {
				$xw->writeElement( 'league', $prop );
			}
			if( ($prop = $this->getComments()) !== NULL ) {
				$xw->writeElement( 'comments', $prop );
			}
			if( $props = $this->getRef() ) {
				foreach( $props as $prop ) {
					$prop->toXmlWriter( $xw );
				}
			}
			if( ($prop = $this->getLink()) !== NULL ) {
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
				case "autouid":
					$this->setAutouid( $xr->readString() );
					break;
				case "ID":
					$this->setID( $xr->readString() );
					break;
				case "fullName":
					$this->setFullName( $xr->readString() );
					break;
				case "initials":
					$this->setInitials( $xr->readString() );
					break;
				case "middleNames":
					$this->setMiddleNames( $xr->readString() );
					break;
				case "firstName":
					$this->setFirstName( $xr->readString() );
					break;
				case "lastName":
					$this->setLastName( $xr->readString() );
					break;
				case "esq":
					$this->setEsq( $xr->readString() );
					break;
				case "deceased":
					$this->setDeceased( $xr->readString() );
					break;
				case "DOB":
					$this->setDOB( $xr->readString() );
					break;
				case "rollNo":
					$this->setRollNo( $xr->readString() );
					break;
				case "no":
					$this->setNo( $xr->readString() );
					break;
				case "league":
					$this->setLeague( $xr->readString() );
					break;
				case "comments":
					$this->setComments( $xr->readString() );
					break;
				case "Ref":
					$Ref = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Refs\\Ref");
					$this->setRef( $Ref->fromXmlReader( $xr ) );
					break;
				case "Link":
					$Link = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Links\\Link");
					$this->setLink( $Link->fromXmlReader( $xr ) );
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
			if(isset($props["fullName"])) {
				$this->setFullName($props["fullName"]);
			}
			if(isset($props["initials"])) {
				$this->setInitials($props["initials"]);
			}
			if(isset($props["middleNames"])) {
				$this->setMiddleNames($props["middleNames"]);
			}
			if(isset($props["firstName"])) {
				$this->setFirstName($props["firstName"]);
			}
			if(isset($props["lastName"])) {
				$this->setLastName($props["lastName"]);
			}
			if(isset($props["esq"])) {
				$this->setEsq($props["esq"]);
			}
			if(isset($props["deceased"])) {
				$this->setDeceased($props["deceased"]);
			}
			if(isset($props["DOB"])) {
				$this->setDOB($props["DOB"]);
			}
			if(isset($props["rollNo"])) {
				$this->setRollNo($props["rollNo"]);
			}
			if(isset($props["no"])) {
				$this->setNo($props["no"]);
			}
			if(isset($props["league"])) {
				$this->setLeague($props["league"]);
			}
			if(isset($props["comments"])) {
				$this->setComments($props["comments"]);
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
			if(isset($props["Link"])) {
				$Link = \Adaptor_Bindings::create("\\Archive\\Port\\Adaptor\\Data\\Archive\\Links\\Link");
				$Link->fromJSON($props["Link"]);
				$this->setLink($Link);
			}
		}
		
	}
		

