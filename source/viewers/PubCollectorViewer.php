<?php
include_once("BaseViewer.php");
//----------------------------------------------------
class JPubCollectorViewer extends JBaseViewer
{
 	private $Header;
//----------------------------------------------------
	public function __construct($data,$header)
	{
		parent::__construct("JPubCollectorViewer");
		$this->Name = "JPubCollectorViewer";
		$this->viewData = $data;
		$this->Header = $header;
		
	}
//----------------------------------------------------	
	public function Render(){
		
		include("js.collector.start.html");
		foreach($this->viewData as $index => $pub)
		{
			if(is_a($pub->Viewer,"JBaseViewer")) $pub->Viewer->Render();
		}
		include("js.collector.end.html");
	}
}
?>