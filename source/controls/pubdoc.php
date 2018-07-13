<?php
include_once("BaseController.php");
include_once("DocViewer.php");
//----------------------------------------------------
class JPublicationDocument extends JBaseController
{
	public $Text;
	public $Title;
	public $Date;
	public $SubTitle;
	public $Viewer;
//----------------------------------------------------
	public function __construct($id)
	{
		parent::__construct("JDocumentController".$id);	
		$this->objectID = $id;	
		$this->Viewer = new JDocumentViewer($this);		
	}
//----------------------------------------------------	
	function Load()
	{
		$data = $this->LoadRow("SELECT id,type,post,postheader,postdate,postdescription FROM livPublications WHERE id=".$this->objectID);	
		
		$this->Title 	= isset($data['postheader']) 	?  $data['postheader'] 	: "";
		$this->Text 	= isset($data['post']) 			?  $data['post']		: "";
		$this->Date 	= isset($data['postdate']) 		?  $data['postdate'] 	: "";
		$this->SubTitle = isset($data['postdescription'])?  $data['postdescription']: "";
	
			
		return $this;
	
	}
//----------------------------------------------------	
}
?>