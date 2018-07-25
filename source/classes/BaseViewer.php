<?php
namespace Classes{
	use Classes\JBaseClass;
	//----------------------------------------------------
	abstract class JBaseViewer extends JBaseClass
	{
		protected $viewData;
	//----------------------------------------------------
		public function __construct($index)
		{
			parent::__construct("JBaseViewer");
			$this->objectID = 0;			
		}
	//----------------------------------------------------	
		abstract public function Render();
	}
}

?>