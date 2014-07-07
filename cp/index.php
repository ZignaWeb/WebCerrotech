<?
include("r/main.php");
$embed=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
if ($error_reporting=="1") {
	ini_set('error_reporting', E_ALL);
	echo 'Current PHP version: ' . phpversion();
}

$title=$site_name;
if (isset($_GET["a"])) {
	$title.=" ".$secciones[$_GET["q"]]["a"][$_GET["a"]]["t"];
}
if (isset($_GET["q"])) {
	if (isset($secciones[$_GET["q"]])){
		$title.=" ".$secciones[$_GET["q"]]["t"];
	}
}
?>
<title><?=$title?></title>
<link href="r/css/normalize.css" rel="stylesheet" type="text/css" />
<link href="r/css/foundation.css" rel="stylesheet" type="text/css" />
<link href="r/css/jQui.css" rel="stylesheet" type="text/css" />
<link href="r/css/custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="r/js/jquery.js"></script>
<script type="text/javascript" src="r/js/modernizr.js"></script>
<script type="text/javascript" src="r/js/funciones.js"></script>
<script type="text/javascript" src="r/js/jQui.js"></script>
<script type="text/javascript" src="r/js/timepicker.js"></script>
<script type="text/javascript" src="r/js/autosize.js"></script>
</head>

<body>
	<div class="small-12 medium-10 medium-offset-1">
	<?

	if (isset($_GET["e"])){
		$safeE= htmlentities($_GET["e"]);
		errorPrint($safeE);
	}

	if(isset($_SESSION["myusername"]) && isset($_SESSION["mypermisos"])){
		
		include ("r/html/menu.php");
		if (isset($_GET["a"]) && isset($_GET["q"])) {
			if ($secciones[$_GET["q"]]["p"]<=$_SESSION["mypermisos"]) {
				include(htmlentities($_GET["a"]).'.php');
			}else{
				$embed=0;
				echo "<div class='alert-box warning'>".str_replace("[:x:]",ucfirst($_SESSION["myusername"]),$error[$lang]["credenciales"])." ".$secciones[$_GET["q"]]["p"]."<a href='#' class='close'>&times;</a></div>";
			}
		}elseif(isset($_GET["q"]) && !isset($_GET["a"])){
			include(htmlentities($_GET["q"]).'.php');
		}else{
			include("home.php");
		}
	}else{
		include ('login.php');
	}
	?>
    </div>
    
    <? include("r/html/joyride.php")?>
    
    <script type="text/javascript" src="r/js/foundation.min.js"></script>
    <script>
    	$(document).foundation();
    </script>
</body>
</html>