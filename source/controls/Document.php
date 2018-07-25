<?php
namespace Controls{
use Classes\JBaseController; 
use Viewers\JDocumentViewer;
	//----------------------------------------------------
	class JDocument extends JBaseController
	{
		public $Text;
		public $Title;
		public $Date;
		public $SubTitle;
		public $Viewer;
		static $TableName = "livPublications";
		static $TableRule = "type=2";
	//----------------------------------------------------
		public function __construct($id)
		{
			parent::__construct("JDocumentController".$id);	
			$this->objectID = $id;	
			$this->Viewer = new JDocumentViewer($this);		
		}
	//----------------------------------------------------		
		static public function Get($id)
		{
			
		}
	//----------------------------------------------------	
		function Load()
		{
			$data = $this->LoadRow("SELECT id,type,post,postheader,postdate,postdescription FROM ".static::$TableName." WHERE id=".$this->objectID);	
			
			$this->Title 	= isset($data['postheader']) 	?  $data['postheader'] 	: "";
			$this->Text 	= isset($data['post']) 			?  $data['post']		: "";
			$this->Date 	= isset($data['postdate']) 		?  $data['postdate'] 	: "";
			$this->SubTitle = isset($data['postdescription'])?  $data['postdescription']: "";
		
				
			return $this;
		
		}
	//----------------------------------------------------	
	}
}
?>