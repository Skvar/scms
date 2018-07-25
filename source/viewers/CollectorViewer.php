<?php
namespace Viewers{
	
	use Classes\JBaseViewer;
	//----------------------------------------------------
	class JCollectorViewer extends JBaseViewer
	{
	 	private $Header;
	//----------------------------------------------------
		public function __construct($data,$header)
		{
			parent::__construct("JCollectorViewer");
			$this->viewData = $data;
			$this->Header = $header;
			
		}
	//----------------------------------------------------	
		public function Render(){
			
		
			include("js.collector.start.html");
			
			if(is_array($this->viewData)){			
				foreach($this->viewData as $index => $pub)
				{
					if(is_a($pub->Viewer,"Classes\JBaseViewer")) $pub->Viewer->Render();
				}
			}
			include("js.collector.end.html");
		}
	}
}
?>