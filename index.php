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
<link rel="icon" type="image/png" href="favicon.png">
<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.css" asp-append-version="true" />
<link rel="stylesheet" href="libs/icomoon/style.css" asp-append-version="true" />
<link rel="stylesheet" href="templates/styles.css?ver=0.009" asp-append-version="true" />
<script src="libs/jquery/jquery-3.3.1.js" asp-append-version="true" ></script>
<script src="libs/bootstrap/js/bootstrap.min.js" asp-append-version="true" ></script>
<script src="source/js/ajax.js" asp-append-version="true" ></script>
<script src="source/js/jsloop.js?ver=0.001" asp-append-version="true" ></script>
<script src="libs/spin.min.js" asp-append-version="true" ></script>
<title><?= $jApp->Title ?></title>
</head>
<body>
<?php $jApp->Render(); ?>
</body>
</html>
<?php CloseLog1(); ?>