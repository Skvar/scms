<?php
include_once("BaseClass.php");


//----------------------------------------------------
abstract class JBaseController extends JBaseClass {
//----------------------------------------------------	
	protected $hDB = NULL;
//----------------------------------------------------		
	function __construct($cName)
	{
		parent::__construct($cName);
		$this->hDB = $GLOBALS['hdb'];
		
	}
//----------------------------------------------------		
	abstract protected function Load();
	//-----------------------------------------------------------------------------------	
	protected function Insert($tabble,$data)
	{
		if(!$this->hdb) return false;
			
		$z1 = "";
		$z2 = "";
		$q = "";
	
		foreach($data as $key => $val){
			$z1.=$q.$key;
			$z2.=$q."'".$val."'";		
			$q = ",";		
		}	
		$query = "INSERT INTO $tabble (".$z1.") VALUES(".$z2.")";
		
		return  $this->Query($query);
	}

//Загрузка в массив------------------------------------------------------------------------
	protected function LoadData($query)
	{	
		if(!$this->hDB) return false;
		
		
		$out = Array();
		$res = mysqli_query($this->hDB,$query);
		if (mysqli_connect_errno() || !$res) return false;

		while($data = mysqli_fetch_assoc($res)) $out[] = $data;	

		return $out;
	}

//Загрузка строки в массив------------------------------------------------------------------------
	protected function LoadRow($query)
	{	
		if(!$this->hDB) return false;
		
		$out = Array();
		$res = mysqli_query($this->hDB,$query);
		if (mysqli_connect_errno() || !$res) return false;

		$data = mysqli_fetch_assoc($res);	

		return $data;
	}
//-----------------------------------------------------------------------------------
	protected function Query($query)
	{
		if(!$this->hDB) return false;
		
		$res = mysqli_query($this->hDB,$query);	
		if($res!==false){
			$this->LastRecord = mysqli_insert_id($this->hDB);
			return true;
		}
		return false;
	}

	 
}
?>