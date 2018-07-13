<?php
include_once("BaseController.php");
//----------------------------------------------------
class JOrganization extends JBaseController
{
	public $Name;
	public $Type;
	public $TypeName;
	public $Address;
	public $Phones;
	public $Email;
	public $Property = Array();
//----------------------------------------------------
	public function __construct($id)
	{
		parent::__construct("JOrganizationControl");
		$this->objectID = $id;
		
	}
//----------------------------------------------------	

		public function Load()
		{
			
			$tmp = $this->LoadRow("
					SELECT org.name,org.description,prop.value as orgType,padr.property as address,pphone.property as phone,pemail.property as email
					FROM livOrganizations org 
					LEFT JOIN livProperty prop on prop.section='orgTypes' AND org.type=prop.index 
			        LEFT JOIN livObjProperty padr on padr.owner=org.id AND padr.description='Адрес'
			        LEFT JOIN livObjProperty pphone on pphone.owner=org.id AND pphone.description='Телефон'
			        LEFT JOIN livObjProperty pemail on pemail.owner=org.id AND pemail.description='e-mail'
					WHERE org.id=".$this->objectID);
					

			$this->Type = $tmp['orgType'];
			$this->Name = $tmp['name'];
			$this->Address = $tmp['address'];
			$this->Phones = $tmp['phone'];
			$this->Email = $tmp['email'];	
			
			$this->iResult = true;
			
			return $this->iResult;
		}

}
?>