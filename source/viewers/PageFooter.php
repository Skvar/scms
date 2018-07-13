<?php
include_once("BaseViewer.php");
//----------------------------------------------------
class JPageFooter extends JBaseViewer
{
 
//----------------------------------------------------
	public function __construct($data)
	{
		parent::__construct("JPageFooter");
		$this->Name = "JPageFooter";
		
	}
//----------------------------------------------------	
	public function Render(){
		echo "FOOTER";
	}
}
?>