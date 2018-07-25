<?php
namespace Controls{
	
	

	if(!defined("typeNews"))				define("typeNews",1);
	if(!defined("typeDocs"))			define("typeDocs",2);
	if(!defined("typeLinks"))			define("typeLinks",5);

	use Classes\JBaseController; 

	//----------------------------------------------------
	class JCollector extends JBaseController
	{
		private $Publication;
		private $Type;
		private $Indexes;
	//----------------------------------------------------
		public function __construct($type)
		{
			parent::__construct("JCollector".$type);
			$this->Type = $type;
			
			$scr = 'use Controls\\'.$type.';
					
						$val[\'name\'] = '.$type.'::GetTableName();
						$val[\'rule\'] = '.$type.'::GetTableRule();
						return $val;
			
					';
			$tbl = eval($scr);
			if($tbl===false){
				$this->iResult = false;
				unset($tmp,$tbl);
				return;
			}
			
			$this->iResult = true;
			
			$tmp = $this->LoadData("SELECT id FROM ".$tbl['name']." WHERE ".$tbl['rule']);
					
			foreach($tmp as $ix => $val) $this->Indexes[] = $val['id'];	
			unset($tmp,$tbl);				
		}
	//----------------------------------------------------		
		static public function Get($id)
		{
			
		}
	//---------------------------------------------------	
		function Load()
		{	
	
			if(count($this->Indexes)){				
				foreach($this->Indexes as $ix => $id){
						$class="Controls\\".$this->Type;
						$this->Publication[] = (new $class($id))->Load();
				}
					
				unset($out);
				
				return $this->Publication;	
			}
		}
	}
}
?>