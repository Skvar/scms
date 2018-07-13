<?php
include_once("BaseChapter.php");
include_once("pubcollector.php");
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
			$this->Publication = (new JPublicationCollector(typeDocs))->Load();
			$this->Viewer = new JPubCollectorViewer($this->Publication,$this->Name);
			$this->Message("Load ".$this->Publication->Name." type ".typeDocs);
		}
		else{
			$this->Publication = (new JPublicationDocument($id))->Load();
			$this->Viewer = new JDocumentViewer($this->Publication,true);
			$this->Message("Load ".$this->Publication->Name." id ".$id);
		}
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