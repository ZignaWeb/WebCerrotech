    <? 
	include("r/html/menuSec.php");
	?>
	<hr />
   	<div class="column small-12">
        <h1><?=$inline[$lang]["delete"]?>:  <?=$secciones[$_GET["q"]]["t"]?></h1>
    </div>
    <hr />

    <?
	$que=mysql_real_escape_string($_GET["q"]);
	$ide=mysql_real_escape_string($_GET["i"]);
	
		if (borrar($secciones[$que]["db"],$ide)){
			echo '<p>'.$inline[$lang]["eliminado"].': '.ucfirst($secciones[$que]["t"]).'</p>';
		}else{
			echo '<p>'.$error[$lang]["tryagain"].'</p>';
		}
		
		function borrar($table, $idregistro){
			global $que;
			global $secciones;
			global $ahora;
			global $inline;
			$q="DELETE FROM `".$table."` WHERE `id`='".$idregistro."'";
			if (mysql_query($q)){
				logIntoHistory($ahora,$_SESSION["myuserid"],$inline[$lang]["delete"].": ".$secciones[$que]["t"],$q);
				// time / quien / accion / codigo
				return true;
			}else{
				return false;
			}
		}
	?>
    <a class="button" onclick="javascript:history.go(-1)"><?=$inline[$lang]["goback"]?></a>
<script type="text/javascript">
// setTimeout(function(){history.go(-1)},1000);
</script>