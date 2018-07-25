<?php
namespace Controls{
	use Classes\JBaseController;
	use Viewers\JNewViewer;
	//----------------------------------------------------
	class JNew extends JBaseController
	{
		
		public $Viewer;
		static $TableName = "livPublications";
		static $TableRule = "type=1";	
	//----------------------------------------------------
		public function __construct($id)
		{
			parent::__construct("JNewController".$id);		
			$this->objectID = $id;
			$this->Viewer = new JNewViewer($this);	
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
				
			return $this;
		}
	//----------------------------------------------------	
	}
}
?>