<?php
namespace Viewers{
	
use Classes\JBaseViewer;
//----------------------------------------------------
class JDocumentViewer extends JBaseViewer
{
 
 	private $fullView;
//----------------------------------------------------
	public function __construct($data,$fv=false)
	{
		parent::__construct("JDocumentViewer");
		$this->viewData = $data;
		$this->fullView = $fv;
	}

//----------------------------------------------------	
	public function Render()
	{
		include("js.viewer.doc.html");
	
	}
}
}
?>