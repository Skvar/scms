<?php

use Classes\JBaseChapter;
use Controls\JCollector;
use Viewers\JCollectorViewer;
//----------------------------------------------------
class JMainChapter extends JBaseChapter
{
//----------------------------------------------------
	private $Publication;
//----------------------------------------------------
	public function __construct($index,$name)
	{
		parent::__construct($index,$name);	
	}
//----------------------------------------------------	
	public function GetMenuString()
	{
		return Array(0=>Array('caption'=>'Главная','icon'=>'icon-home','link'=>'index.php'));
	}
//----------------------------------------------------		
	public function GetCommandString($tab)
	{
		return Array(Array('caption'=>'добавить'));
		
	}
	
	
//----------------------------------------------------		
	public function Load($id=0)
	{
		$this->Publication = (new JCollector("JNew"))->Load();
		$this->Viewer = new JCollectorViewer($this->Publication,$this->Name);
		$this->Message("Load ".$this->Publication->Name." type ".typeNews);
	}
	
//----------------------------------------------------	
	public function Save($id)
	{
	}
//----------------------------------------------------		
	public function Edit($id)
	{
		
	}
//----------------------------------------------------	

	
}
?>