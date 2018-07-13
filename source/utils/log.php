<?php

if(!defined("lmError"))				define("lmError",2);
if(!defined("lmMessage"))			define("lmMessage",0);
if(!defined("lmWarning"))			define("lmWarning",1);
if(!defined("lmLine"))				define("lmLine",3);

static $hFile;
//-----------------------------------------------------
function CreateLog($path)
{
	global $hFile;
	
	$fname = $path."log[".$_SERVER['REMOTE_ADDR']."]_[".date("d.m.Y")."].log";
	$hFile = fopen($fname,"a");
	
	if($hFile){
		AddLog(lmMessage,"<>","Log is open at ".date("H.i.s"));

		AddLog(lmLine);
		return true;
	}
	return false;
}
//-----------------------------------------------------
function CloseLog1()
{
	global $hFile;
	if(!$hFile) return;
	AddLog(lmLine);
	fclose($hFile);
}
//-----------------------------------------------------
function AddLog($type,$object="<>",$message="")
{
	global $hFile;
	if(!$hFile) return;
	$logstring = "";
	switch($type){
		case lmLine:
			$logstring = str_repeat("-",40)."\n";
		break;
		case lmMessage:
			$logstring = "<M><".$object.">".$message."\n";
		break;
		case lmWarning:
			$logstring = "<W><".$object.">".$message."\n";
		break;
		case lmError:
			$logstring = "<E><".$object.">".$message."\n";
		break;
	}
	
	fwrite($hFile,$logstring,strlen($logstring));
	
	
}
//-----------------------------------------------------
function CleanUpLogs()
{
	
}

?>