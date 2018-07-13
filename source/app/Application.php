<?php
include_once("BaseClass.php");
//------------------------------


//------------------------------
include_once("PageHeader.php");
include_once("PageBody.php");
include_once("PageFooter.php");
//------------------------------

include_once("user.php");
include_once("organization.php");


class JApplication extends JBaseClass
{
//----------------------------------------------------
	public $Autor;
	public $Version;
	public $User;
	public $Title;

	private $Menu = Array();
	private $Command = Array();
	private $ArgString;
	private $Chapters = Array();
	private $ChapterIndex = 0;
	private $TabControl = 0;
	private $Owner=Array();
	private $hDB = NULL;
//----------------------------------------------------
	public function __construct($arg,$conffile = "")
	{
		parent::__construct(NULL,"SCMS Application");
		$this->Name = "SCMS";
		$this->Version = 0.7;
		

		$this->Message("The application starts");
		$this->DBConnection("dbconf.php");
		
		$this->ArgString = $arg;
		$this->objectID = 0;
		
		$this->MakeChapters();	
		$this->LoadOwner(confOurOrg);
		
		$this->User = new JUser(0);
		$this->User->CheckAuthorizy();
		
		$this->Title = $this->Owner->Name.($this->User->Type?(": ".$this->User->UserName):"");
		
//---------------------------------------------------------	
		$this->Chapters[chapterUser]->SetUser($this->User);
	
		
		
//merge menu string-----------------------------------------
		foreach($this->Chapters as $key => $chapter){
			if(is_a($chapter,"JBaseChapter")){		
				$m = $chapter->GetMenuString();	
				foreach($m as $pos => $val){
					if(isset($val['subitem'])){
						if(!isset($this->Menu[$pos])) $this->Menu[$pos] =  $val;
						foreach($val['subitem'] as $subpos => $subval) $this->Menu[$pos]['subitem'][$subpos] = $subval;		
					}
					else $this->Menu[$pos] =  $val;	
				}
			}
		}
		ksort($this->Menu);
//---------------------------------------------------
		$this->ChapterIndex = intval(isset($arg['cid']) ? $arg['cid'] : 1);
		$this->TabControl	= intval(isset($arg['tab']) ? $arg['tab'] : 0);
		$this->objectID		= intval(isset($arg['id']) ? $arg['id'] : 0);
//---------------------------------------------------
		$cChapter = $this->Chapters[$this->ChapterIndex];
		if(is_a($cChapter,"JBaseChapter")){	
			$tmp = $cChapter->GetCommandString($this->TabControl);
			if(!empty($tmp)) $this->Command = $tmp;
			$cChapter->Load($this->objectID);
		}
	}	
//----------------------------------------------------	
	public function Render()
	{

		(new JPageHeader(Array('owner'=>$this->Owner,'menu'=>$this->Menu,'command'=>$this->Command)))->Render();
		(new JPageBody($this->Chapters[$this->ChapterIndex]->Viewer))->Render();
		(new JPageFooter(Array('owner'=>$this->Owner,'menu'=>$this->Menu)))->Render();
		
		//print_r($this->ArgString);
		//print_r($this->Menu);
	}		
//----------------------------------------------------		
	private function MakeChapters()
	{
		
		global $ReqModules;
		global $UsedModules;
		
		$ix = 0;
		foreach($ReqModules as $class => $title)
		{
			 if(file_exists("source/app/".$class.".php")){
	
				include_once($class.".php");			
				$cname = "J".$class;		
				$this->Chapters[$ix] = new $cname($ix,$title);
		
				$ix++;	
			}
			else{
				$this->Error("Required module ".$class." not found.");
				return false;
			}
		}
		
		foreach($UsedModules as $class => $title)
		{
			 if(file_exists("source/app/".$class.".php")){
	
				include_once($class.".php");			
				$cname = "J".$class;		
				$this->Chapters[$ix] = new $cname($ix,$title);
				$ix++;	
			}
			else{
				$this->Error("Module ".$class." not found.");
			}
		}
		
		return true;
	
	}
//----------------------------------------------------
	private function LoadOwner($id)
	{	
		$this->Owner = new JOrganization($id);
		$this->Owner->Load();
	}
//----------------------------------------------------	
	private function DBConnection($conffile)
	{

		require($conffile);
		
		$this->hDB = mysqli_init();
		
		mysqli_options($this->hDB,MYSQLI_OPT_LOCAL_INFILE, true);
		
		if (!mysqli_real_connect($this->hDB,$db_host, $db_user, $db_pass,$db_name)) {
    		$this->Error("Error connectings to mySQL DB");
    		exit();
		}
 		
 		mysqli_query ($this->hDB,"set character_set_client='utf8'"); 
 		mysqli_query ($this->hDB,"set character_set_results='utf8'"); 
 		mysqli_query ($this->hDB,"set collation_connection='utf8_general_ci'");
 		
		$GLOBALS['hdb'] = $this->hDB;	
		unset($db_user,$db_pass,$db_name,$db_host);	
		return true;	
	}
//----------------------------------------------------	
	public function GetDBContext(){
		return $this->hDB;
	}
};
?>