<?php
namespace Viewers\Page{
	
	use Classes\JBaseViewer;


	//----------------------------------------------------
	class JPageHeader extends JBaseViewer
	{
	 
	//----------------------------------------------------
		public function __construct($data)
		{
			parent::__construct("JPageHeader");
			$this->viewData = $data;		
		}
	//----------------------------------------------------	
		public function Render(){
			include("js.header.html");
			include("js.menu.html");
			include("js.companel.html");
		}
	}
}
?>