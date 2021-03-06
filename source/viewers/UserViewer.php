<?php
namespace Viewers{
	
	use Classes\JBaseViewer;
	//----------------------------------------------------
	class JUserViewer extends JBaseViewer
	{
	 
	 	private $fullView;
	//----------------------------------------------------
		public function __construct($data)
		{
			parent::__construct("JUserViewer");
			$this->viewData = $data;
		}
	//----------------------------------------------------	
		public function Render()
		{
			if(is_a($this->viewData,"Controls\JUser")){
				
				switch($this->viewData->Type){
					case userUnAuthorized:
						include("js.viewer.userauth.html");
					break;
					case userAuthorized:
						include("js.viewer.usercab.html");
					break;
					case userAdministrator:
						include("js.viewer.admincab.html");
					break;
				}	
			}
			
		}
	}
}
?>