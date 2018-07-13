<?php
include_once("BaseViewer.php");
//----------------------------------------------------
class JNewViewer extends JBaseViewer
{
 
//----------------------------------------------------
	public function __construct($data)
	{
		parent::__construct("JNewViewer");
		$this->Name = "JNewViewer";
		$this->viewData = $data;
		
	}
//----------------------------------------------------	
	public function Render()
	{
		include("js.viewer.new.html");
	}
}
?>