<?php
use Classes\JBaseChapter;
//----------------------------------------------------
class JBuildingsChapter extends JBaseChapter
{
//----------------------------------------------------
	public function __construct($index,$name)
	{
		parent::__construct($index,$name);
		
		$this->Name = "Buildings chapter";
	}
//----------------------------------------------------	
	public function GetMenuString()
	{
		return Array(
			1=>Array(
				'icon'=>'icon-logo',
				'caption'=>'Наша организация',
				'subitem'=>Array(
					0=>Array(
						'caption'=>'Жилой фонд',
						'icon'=>'icon-home',
						'link'=>'index.php?cid='.chapterBuildings
					)
				)
			)
		);
	}
//----------------------------------------------------		
	public function GetCommandString($tab)
	{
		
	}
	
//----------------------------------------------------		
	public function Load($id=0)
	{

	}

	
//----------------------------------------------------	
	protected function Save($id)
	{
	}
//----------------------------------------------------		
	protected function Edit($id)
	{
		
	}
//----------------------------------------------------	
}
?>