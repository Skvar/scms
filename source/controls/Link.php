<?php
namespace Controls{
	use Classes\JBaseController; 
	use Viewers\JLinkViewer;
	//----------------------------------------------------
	class JLink extends JBaseController
	{

		public $Link;
		public $Viewer;
		static $TableName = "livPublications";
		static $TableRule = "type=5";
	//----------------------------------------------------
		public function __construct($id)
		{
			parent::__construct("JLinkController".$id);
			$this->objectID = $id;	
			$this->Viewer = new JLinkViewer($this);
			
		}
	//----------------------------------------------------		
		static public function Get($id)
		{
			
		}
	//----------------------------------------------------		
		function Load()
		{
			$data = $this->LoadRow("SELECT id,type,post,postheader,postdate FROM ".static::$TableName." WHERE id=".$this->objectID);		
			$this->Title 	= isset($data['postheader']) 	?  $data['postheader'] 	: "";
			$this->Text 	= isset($data['post']) 			?  $data['post']		: "";
			$this->Date 	= isset($data['postdate']) 		?  $data['postdate'] 	: "";	
			$this->Link		= isset($data['postdescription']) 		?  $data['postdescription'] 	: "";
				
			return $this;
		}
	//----------------------------------------------------	
	}
}
?>