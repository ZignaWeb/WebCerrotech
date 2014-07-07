<?
if ($embed!=1 || !isset($embed)) { 
	header("Location:./");
}
?>
<hr />
<h2 class="column small-12"><?=$inline[$lang]["setup"]?></h2>
<p class="column small-12"><?=$info[$lang]["setup"]?></p>
<hr />
<h3><?=$info[$lang]["dataconfigstatus"]?></h3>
<?
// crear tablas
foreach($secciones as $val){
	$tabla = $val["db"];
	$checTablesT="SELECT 1 FROM  `$tabla` ";
	$checTablesQ = mysql_query($checTablesT);
	if ($checTablesQ==FALSE){
		$sqlTable = "CREATE TABLE `$tabla` (";
		foreach($val["c"] as $val1){
			$columna = $val1["db"];
			$type	= $val1["val"];
			# varchar / text / file / email / number / date / datetime
			if ($type=="varchar" || $type=="file" || $type=="email" ){
				$sqlTable .=" `$columna` VARCHAR(100), ";
			}elseif($type=="text" || $type=="codigo"){
				$sqlTable .=" `$columna` TEXT, ";
			}elseif($type=="number" || $type=="select") {
				$sqlTable .=" `$columna` INT, ";
			}elseif($type=="date"){
				$sqlTable .=" `$columna` DATE, ";
			}elseif($type=="datetime"){
				$sqlTable .=" `$columna` DATETIME, ";
			}
		}
		
		$sqlTable .= "`id` INT NOT NULL AUTO_INCREMENT, PRIMARY KEY ( `id` ))";

		if (mysql_query($sqlTable)) {
			echo "<p class='column small-12 alert-box success'>".$info[$lang]["tablacreada"].": '$tabla'</p>";
		}else{
			echo "<p class='column small-12 alert-box alert'>".$info[$lang]["errorcreatetable"]." '$tabla'</p>";
		}

	}else{
		echo "<p class='column small-12 alert-box info'>".str_replace("[:x:]",$tabla,$info[$lang]["tablaexiste"])."</p>";
	}
}
?>