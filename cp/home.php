<hr />
<h1 class="column small-12"><?=$inline[$lang]["Bienvenido"]?> <?=$_SESSION["myusername"]?>!</h1>
<hr />
<div>
<? 

foreach($secciones as $key => $val){
	if ($val["a"]["listar"]["p"]<=$_SESSION["mypermisos"]) {
		echo "<div class='column small-12 medium-6 large-4'>";
		echo "<div class='panel'>";
		// numero de registros
		$t="SELECT `id` FROM `".$val["db"]."`";
		$q=mysql_query($t);
		$n=mysql_num_rows($q);
		echo "<h4>".$val["t"]." <span class='label round top right'>$n</span> </h2><hr />";
		// acciones 
		$acciones=array();
		foreach($val["a"] as $keya => $accion){
			if ($accion["p"]<=$_SESSION["mypermisos"] && $accion["menu"]=="menu") {
				$acciones[$keya]=$accion["t"];
			}
		}
		$an=count($acciones);
		if ($an>=4){$culClass="small-3";}
		elseif($an==3){$culClass="small-4";}
		elseif($an==2){$culClass="small-6";}
		else{$culClass="small-12";}
		
		foreach ($acciones as $keyp => $valp) {
			echo "<a class='$culClass column button tiny' href='./?q=$key&a=$keyp'>".$valp."</a>";
		}
		
		echo "<hr /></div></div>";
	}
}

?>
</div>
<hr />
<div class="column small-12">
	<h2 id="joy_contenido_permisos"><?=$inline[$lang]["permisos"]?></h2>
    <p><?=str_replace("[:x:]",$_SESSION["mypermisos"],$inline[$lang]["permisosBajadas"])?></p>
</div>
	<?
	foreach($secciones as $key => $val){
		if ($val["a"]["listar"]["p"]<=$_SESSION["mypermisos"]) {
			echo "<div class='column small-12 medium-6 large-4 left'><h4> ".$val["t"]." </h4>";
			foreach ($val["a"] as $key => $val1) {
				if ($val1["p"]<=$_SESSION["mypermisos"]) {
					$class="success";
					echo " <span class='label round $class'>".$val1["t"]."</span>";
				}
			}
			echo "</div>";
		}
	}
	?>