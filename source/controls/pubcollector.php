<?php

if(!defined("typeNews"))				define("typeNews",1);
if(!defined("typeDocs"))			define("typeDocs",2);
if(!defined("typeLinks"))			define("typeLinks",5);

include_once("BaseController.php");
include_once("pubnew.php");
include_once("pubdoc.php");
include_once("publink.php");
include_once("PubCollectorViewer.php");
//----------------------------------------------------
class JPublicationCollector extends JBaseController
{
	private $Publication;
	private $Type;
	private $Indexes;
//----------------------------------------------------
	public function __construct($type)
	{
		parent::__construct("JPublicationCollector".$type);
		$this->Type = $type;
		
		$tmp = $this->LoadData("SELECT id FROM livPublications WHERE type=".$this->Type);
		foreach($tmp as $ix => $val) $this->Indexes[] = $val['id'];					
	}
//---------------------------------------------------	
	function Load()
	{	
		switch($this->Type){
			case typeNews:	
				foreach($this->Indexes as $ix => $id){
					$this->Publication[] = (new JPublicationNew($id))->Load();
				}
			break;
			case typeDocs:
				foreach($this->Indexes as $ix => $id){
					$this->Publication[] = (new JPublicationDocument($id))->Load();
				}
			break;
			case typeLinks:
				foreach($this->Indexes as $ix => $id){
					$this->Publication[] = (new JPublicationLink($id))->Load();
				}
			break;
		}	
		unset($out);
		
		
		return $this->Publication;	
	}
}
?>