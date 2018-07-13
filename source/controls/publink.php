<?php
include_once("BaseController.php");
include_once("LinkViewer.php");
//----------------------------------------------------
class JPublicationLink extends JBaseController
{

	public $Link;
	public $Viewer;
//----------------------------------------------------
	public function __construct($id)
	{
		parent::__construct("JLinkController".$id);
		$this->objectID = $id;

		$this->Viewer = new JLinkViewer($this);
		
	}
//----------------------------------------------------		
	function Load()
	{
		$data = $this->LoadRow("SELECT id,type,post,postheader,postdate FROM livPublications WHERE id=".$this->objectID);		
		$this->Title 	= isset($data['postheader']) 	?  $data['postheader'] 	: "";
		$this->Text 	= isset($data['post']) 			?  $data['post']		: "";
		$this->Date 	= isset($data['postdate']) 		?  $data['postdate'] 	: "";	
		$this->Link		= isset($data['postdescription']) 		?  $data['postdescription'] 	: "";
			
		return $this;
	}
//----------------------------------------------------	
}
?>