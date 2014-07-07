    <? include("r/html/menuSec.php");?>
	<hr />
   	<div class="column small-12">
        <h1><?=$inline[$lang]["cargar"]?>:  <?=$secciones[$_GET["q"]]["t"]?></h1>
    </div>
    <hr />
    <div class="large-8 column">
    <?
	if (!$_POST) {
		
		// if si tiene dependecias
		if (isset($secciones[$_GET["q"]]["c"]["dep_table"]) && isset($secciones[$_GET["q"]]["c"]["dep_id"])) {
			
			foreach ($secciones as $key => $sec) {
				foreach ($sec["c"] as $field) {
					if (isset($field["dependency"]) && $field["dependency"]==$_GET["q"]) {
						$dep_table[$key]=$key;
					}
				}
			}
			
			if (!isset($_GET["dep_table"]) && count($dep_table)>0 ) {
				
				$url=requestURI();
				foreach ($dep_table as $key) {
					echo "<a class='botonlista small-12 secondary button' href='$url&dep_table=".$key."'>".$secciones[$key]["t"]."</a>";
				}
				
			}elseif (isset($_GET["dep_table"]) && !isset($_GET["dep_id"])) {
				echo "<h3>".$inline[$lang]["Elegir"]." ".$secciones[$_GET["dep_table"]]["t"]."</h3>";
				
				// reset($secciones);
				$s2   = $secciones;
				$k	= key($s2[$_GET["dep_table"]]["c"]);
				
				$t	= $s2[$_GET["dep_table"]]["c"][$k]["db"];
				$from = $s2[$_GET["dep_table"]]["db"];
				
				$qt   = "SELECT id, $t FROM $from";
				$q 	= mysql_query($qt);
				unset($s2);
				$url=requestURI ();
				if (mysql_num_rows($q)>0){
					while ($idatos=mysql_fetch_assoc($q)) {
						echo "<a class='botonlista small-12 secondary button' href='$url&dep_id=".$idatos["id"]."'>".$idatos[$k]."</a>";
					}
				}else{
					echo str_replace("[:x:]",$secciones[$_GET["dep_table"]]["t"],$inline[$lang]["noresults"]);
					echo "<hr /><a href='?q=".$_GET["dep_table"]."&a=cargar' class='button tiny clear'>".$inline[$lang]["cargar"].": ".$secciones[$_GET["dep_table"]]["t"]."</a>";
				}
				
				
			}else{
				include('r/html/getFormElements.php');
			}
			
			
		// else si no tiene dependecias
		}else{
		include('r/html/getFormElements.php');
		}
		
	?>
    	</div>
        
        <div class="column large-4">
        	<h2><?=$inline[$lang]["Tips"]?></h2>
            <?
			foreach($tipsCargar[$lang] as $tip){
				echo "<p>$tip</p>";
			}
			?>
        </div>
    <?
	}else{
		// array search para ver si hay un unique definido en arq y corrovorar que no exista un registro con el mismo valor
		$q="INSERT INTO `".$secciones[$_GET["q"]]["db"]."` SET ";
		$e="";
		$i=0;
		$imgs=array();
		$size=array();
		foreach ($secciones[$_GET["q"]]["c"] as $val) {
			$i++;
			if ($val["val"]!="date") {
				$postv = $_POST[$val["db"]];
			}else{
				$postv = date('Y-n-j H:i:s', strtotime(str_replace('-', '/', $_POST[$val["db"]])));
			}
			
			if ($postv!="" && $val["val"]!="file") {
				if ($i>1){$q.=",";}
				$q.=" `".$val["db"]."`='".$postv."'";
			}elseif($val["val"]=="file"){
				array_push($imgs,$val["db"]);
				array_push($size,$secciones[$_GET["dep_table"]]["c"]["img"]["imgsizes"]);
			}elseif($postv=="" && (isset($val["force"]) && $val["force"]==1)){
				$e.= str_replace("[:x:]",$val["t"],$error[$lang]["oneobli"]);
			}
			
			if (isset($val["dependency"])) {
				$dep["tabla"] = $_GET["q"];
			}
			
		}
		if ($e!=""){
			echo '<div data-alert class="alert-box warning medium-6 medium-offset-3 small-8 small-offset-2">
	  '.$e.'
	  <a href="#" class="close">&times;</a> 
	</div><a href="javascript:history.go(-1)">'.$inline[$lang]["goback"].'</a>';
		}else{
			if (mysql_query($q)){
				$lastid=mysql_insert_id();
				echo $str[$lang]["cargado"].ucfirst($secciones[$_GET["q"]]["t"]);
				logIntoHistory($ahora,$_SESSION["myuserid"],$str[$lang]["crear"].$secciones[$_GET["q"]]["t"],$q);
				// time / quien / accion / codigo
			}else{
				echo $str[$lang]["nocargado"].ucfirst($secciones[$_GET["q"]]["t"])." (".htmlentities($q).")";
			}
			$tabla=$secciones[$_GET["q"]]["db"];
			$dep_table = $secciones[$_GET["dep_table"]]["db"];
			$dep_id    = $_GET["dep_id"];
			$imgn=count($imgs);
			for($i=0;$i<$imgn;$i++){					
				subirImg ($imgs[$i],$dir["imgs"],$tabla,$lastid,$size[$i]);
			}
			$url=requestURI ();
			?>
            <hr />
            <div class="button-group">
            <a href="<?=$url?>" class="button small-12 medium-6 large-6"><?=$str[$lang]["unamas"]?></a>
            <?
			if (isset($dep["tabla"])) {
				$dep["id"] 	= $lastid;
				// boton apra cargar dependencias
				echo '<a class="button small-12 medium-6 large-6" href="?q=med&a=cargar&dep_table='.$dep["tabla"].'&dep_id='.$dep["id"].'">'.$str[$lang]["upfoto"].'</a><hr />';
			}
		}
		?>
        </div>
        <hr />
        <?


	}
	include ("r/html/linkpopup.php");
	?>
    </div>

    
</div>