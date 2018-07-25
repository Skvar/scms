<?php
use Classes\JBaseChapter;
use Controls\JCollector;
use Viewers\JCollectorViewer;
//----------------------------------------------------
class JLinksChapter extends JBaseChapter
{
	private $Publication;
//----------------------------------------------------
	public function __construct($index,$name)
	{
		parent::__construct($index,$name);
		
	}
//----------------------------------------------------	
	public function GetMenuString()
	{
		return Array(
			2=>Array(
				'icon'=>'icon-attachment',
				'caption'=>'Информация для жителей',
				'subitem'=>Array(
					1=>Array(
						'caption'=>'Ссылки на внешние ресурсы',
						'icon'=>'icon-link',
						'link'=>'index.php?cid='.chapterLink
					)
				)
			)
		);
	}
	
	
//----------------------------------------------------		
	public function Load($id=0)
	{
		$this->Publication = (new JCollector("JLink"))->Load();
		$this->Viewer = new JCollectorViewer($this->Publication,$this->Name);
		$this->Message("Load ".$this->Publication->Name." type ".typeLinks);
	}
	
//----------------------------------------------------		
	public function GetCommandString($tab)
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