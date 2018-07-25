<?php
namespace Viewers{
	
	use Classes\JBaseViewer;
	//----------------------------------------------------
	class JLinkViewer extends JBaseViewer
	{
	 
	//----------------------------------------------------
		public function __construct($data)
		{
			parent::__construct("JLinkViewer");
			$this->Name = "JLinkViewer";
			$this->viewData = $data;
		}
	//----------------------------------------------------	
		public function Render()
		{
			include("js.viewer.link.html");
		}
	}
}
?>