<? 
if ($embed!=1 || !isset($embed)) { 
	header("Location:./");
}else{
	$q = htmlentities($_GET["q"]);
	$a = htmlentities($_GET["a"]);
	$ac = $secciones[$q]["a"];
	echo '<dl id="joy_menu_sec" class="sub-nav large-6 left"><dt>'.$secciones[$q]["t"].'</dt>';
	foreach ($ac as $key => $val){
		if ($val["p"]<=$_SESSION["mypermisos"] && $val["menu"]=="menu"){
			if ($a==$val["db"]) {$class="class='active'";}else{$class="";}
			if ($key=="export") {$id="id='joy_menu_sec_exportar'";}else{$id="";}
			echo "<dd $id $class><a href='./?q=".$q."&amp;a=".$val["db"]."'>".$val["t"]."</a></dd>";
		}
	}
	echo '</dl>';
}
if ($a!="")
{
	if ($secciones[$q]["a"][$a]["p"]>$_SESSION["mypermisos"]) {
		echo " <hr> <div class='alert-box warning'>".$error[$lang]["notenoughpermits"]."
		".$secciones[$q]["a"][$a]["p"]."<=".$_SESSION["mypermisos"]."<a href='#' class='close'>&times;</a></div>
		<script type='text/javascript' src='r/js/foundation.min.js'></script>
		<script>
			$(document).foundation();
		</script>
		</body>
		</html>";
		exit;
	}
}
?>