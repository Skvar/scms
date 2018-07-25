<?php
use Classes\JBaseChapter;
use Controls\JDocument;
use Viewers\JDocumentViewer;
use Controls\JCollector;
use Viewers\JCollectorViewer;
//----------------------------------------------------
class JDocsChapter extends JBaseChapter
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
					0=>Array(
						'caption'=>'Нормативные документы',
						'icon'=>'icon-folder',
						'link'=>'index.php?cid='.chapterDoc
					)
				)
			)
		);
	}
	
	
//----------------------------------------------------		
	public function Load($id=0)
	{
		if(!$id){
			$this->Publication = (new JCollector("JDocument"))->Load();
			$this->Viewer = new JCollectorViewer($this->Publication,$this->Name);
			$this->Message("Load ".$this->Publication->Name." type ".typeDocs);
		}
		else{
			$this->Publication = (new JDocument($id))->Load();
			$this->Viewer = new JDocumentViewer($this->Publication,true);
			$this->Message("Load ".$this->Publication->Name." id ".$id);
		}
	}
	
//----------------------------------------------------		
	public function GetCommandString($tab)
	{		
	
		if(is_a($this->Viewer,"Viewers\JCollectorViewer")){
			$out =  Array(
				Array(
					'caption'=>'Список документов'
				),
				Array(
					'caption'=>'Добавить'
				)
			);			
		}
		elseif(is_a($this->Viewer,"Viewers\JDocumentViewer")){
			$out =  Array(
				Array(
					'caption'=>'Править'
				),
				Array(
					'caption'=>'Удалить'
				)
			);
		}
		return $out;	
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