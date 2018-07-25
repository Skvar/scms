<?php
namespace Viewers\Page{
	
	use Classes\JBaseViewer;
	//----------------------------------------------------
	class JPageFooter extends JBaseViewer
	{
	 
	//----------------------------------------------------
		public function __construct($data)
		{
			parent::__construct("JPageFooter");
			$this->viewData = $data;				
		}
	//----------------------------------------------------	
		public function Render(){
			include("js.footer.html");
		}
	}
}
?>