<?php
namespace Classes{ 
include_once("log.php");
  class JAutoLoader
  {
    const debug = 1;
    public function __construct(){}

    public static function autoload($file)
    {
      clearstatcache();
      
    
      $ppf = explode("\\",$file); 
      $last = count($ppf)-1;
      for($a=0;$a<$last;$a++){
	  	$ppf[$a] = strtolower($ppf[$a]);
	  }	  
	  $ppf[$last] = substr($ppf[$last],1);
	 
      $file = implode("\\",$ppf);
      

      $file = str_replace('\\', '/', $file);
      $path = './source';
      $filepath = $path ."/". $file . '.php';
      
		
      if (file_exists($filepath))
      {
        if(JAutoLoader::debug) JAutoLoader::StPutFile(('подключили ' .$filepath));
        require_once($filepath);
        
      }
      else
      { 
      	echo "File not found ".$filepath;
      }
    }

    private static function StPutFile($data)
    {
    	//echo ($data."<br>");
    }
    
  }
  \spl_autoload_register('Classes\JAutoLoader::autoload');
}
?>