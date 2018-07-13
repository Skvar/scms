<?php
include_once("BaseClass.php");
//----------------------------------------------------
abstract class JBaseChapter extends JBaseClass
{
	public $Viewer;
//----------------------------------------------------
	public function __construct($index,$name)
	{
		parent::__construct($name);
		$this->objectID = $index;		
	}
//----------------------------------------------------		
	abstract protected function Load($id);
	abstract protected function Save($id);
	abstract protected function Edit($id);	
//----------------------------------------------------	
	abstract public function GetMenuString();
	abstract public function GetCommandString($tab);
}
?>