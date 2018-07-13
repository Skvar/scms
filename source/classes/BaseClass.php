<?php
include_once("log.php");



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
	protected function Error($message){$this->Log(lmError,$message);}
	protected function Message($message){$this->Log(lmMessage,$message);}
	protected function Warning($message){$this->Log(lmWarning,$message);}
//----------------------------------------------------	
	private function Log($type,$message)
	{
		$logLevel = 0;
		if($logLevel<=$type){
			AddLog($type,$this->Name,$message);
		}
	}	 
}
?>