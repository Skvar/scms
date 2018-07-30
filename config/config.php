<?php
//PHP Setup-------------------------------------------------------
ini_set('upload_max_filesize', '200M');
ini_set('post_max_size', '200M');
ini_set('session.gc_maxlifetime', 60*3000);
ini_set('session.gc_divisor', 1000);

//const------------------------------------------------------------
if(!defined("confOurOrg"))					define("confOurOrg",473);
if(!defined("workDir"))						define("workDir",'/test');
if(!defined("defLogPath"))					define("defLogPath",'logs/'); 


//Set paths-------------------------------------------------------
set_include_path($_SERVER['DOCUMENT_ROOT'].workDir."/".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/libs".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/templates".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/config".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/source/classes".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/source/app".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/source/viewers".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/source/controls".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/source/utils".PATH_SEPARATOR.
				 $_SERVER['DOCUMENT_ROOT'].workDir."/source");
				
//styles-----------------------------------------------------------
$stylefiles = Array("libs/bootstrap/css/bootstrap.css", 
					"libs/icomoon/style.css",
					"templates/styles.css?ver=0.009"
					);
					
//scripts----------------------------------------------------------
$scriptfiles = Array(	"libs/jquery/jquery-3.3.1.js",
						"libs/bootstrap/js/bootstrap.min.js",
						"source/js/ajax.js",
						"source/js/jsloop.js?ver=0.001",
						"libs/spin.min.js"
					);	
				
//favicons---------------------------------------------------------
$icons = Array("favicon.png"); 
				 
				 
//modules----------------------------------------------------------
$ReqModules = Array(
				"UserChapter"=>"Вход в личный кабинет"
);

$UsedModules = Array(
				"MainChapter"=>"Главная страница",
				"BuildingsChapter"=>"Жилой фонд",
				"DocsChapter"=>"Нормативные документы",
				"LinksChapter"=>"Ссылки на ресурсы ЖКХ",
				"PricesChapter"=>"Тарифы и цены"
);
if(!defined("chapterUser"))					define("chapterUser",0);
if(!defined("chapterMain"))					define("chapterMain",1);
if(!defined("chapterBuildings"))			define("chapterBuildings",2);
if(!defined("chapterDoc"))					define("chapterDoc",3);
if(!defined("chapterLink"))					define("chapterLink",4);
if(!defined("chapterPrice"))				define("chapterPrice",5);

?>