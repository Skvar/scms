<?php
$sst = session_status();
if($sst == PHP_SESSION_NONE) session_start();
//-------------------------------------------------------
include("config/config.php");
//-------------------------------------------------------
include("log.php");
$res = CreateLog(defLogPath);

include("Application.php");

$jApp = new JApplication($_GET);		 
?>
<html lang='RU-ru' ng-app='scms6'>
<head>
<meta charset="UTF-8"/>
<meta content='width=768' name='viewport'>

<?= $jApp->FavIconString ?>
<?= $jApp->StylesString ?>
<?= $jApp->JScriptsString ?>

<title><?= $jApp->Title ?></title>
</head>
<body>
<?php $jApp->Render(); ?>
</body>
</html>
<?php CloseLog1(); ?>