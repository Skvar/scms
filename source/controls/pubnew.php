<?php
include_once("BaseController.php");
include_once("NewViewer.php");
//----------------------------------------------------
class JPublicationNew extends JBaseController
{
	
	public $Viewer;
//----------------------------------------------------
	public function __construct($id)
	{
		parent::__construct("JNewController".$id);
		$this->objectID = $id;
		$this->Viewer = new JNewViewer($this);	
	}
//----------------------------------------------------	
	function Load()
	{
		$data = $this->LoadRow("SELECT id,type,post,postheader,postdate FROM livPublications WHERE id=".$this->objectID);		
		$this->Title 	= isset($data['postheader']) 	?  $data['postheader'] 	: "";
		$this->Text 	= isset($data['post']) 			?  $data['post']		: "";
		$this->Date 	= isset($data['postdate']) 		?  $data['postdate'] 	: "";	
			
		return $this;
	}
//----------------------------------------------------	
}
?>