<?php
namespace Viewers\Page{	
	use Classes\JBaseViewer;
	//----------------------------------------------------
	class JPageBody extends JBaseViewer
	{

	//----------------------------------------------------
		public function __construct($data)
		{
			parent::__construct("JPageBody");
			$this->Name = "JPageBody";
			$this->viewData = $data;		
		}
	//----------------------------------------------------	
		public function Render(){
			

			include("js.page.start.html");
			
		
			if(is_a($this->viewData,"Classes\JBaseViewer")){
					$this->viewData->Render();
			}
			else print_r($this->viewData);
			
			include("js.page.end.html");
		}
	}
}
?>