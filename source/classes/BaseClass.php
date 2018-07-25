<?php
namespace Classes{
	include_once("log.php");
	require_once("AutoLoader.php");



	//----------------------------------------------------
	abstract class JBaseClass {
	//----------------------------------------------------	
		public $objectID;
		public $iResult;	
		public $Name;
		
	//----------------------------------------------------		
		function __construct($cName)
		{
			$this->Name = $cName;	
			$this->iResult = false;
			$this->objectID = 0;
		}	
	//logs-----------------------------------------------------------	
		protected function Error($message,$echo=false){$this->Log(lmError,$message);if($echo) echo $message; }
		protected function Message($message,$echo=false){$this->Log(lmMessage,$message);if($echo) echo $message; }
		protected function Warning($message,$echo=false){$this->Log(lmWarning,$message);if($echo) echo $message; }
	//----------------------------------------------------	
		private function Log($type,$message)
		{
			$logLevel = 0;
			if($logLevel<=$type){
				AddLog($type,$this->Name,$message);
			}
		}	 
	}
}
?>