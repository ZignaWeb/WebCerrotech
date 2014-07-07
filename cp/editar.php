    <? include("r/html/menuSec.php");?>
	<hr />
   	<div class="column small-12">
        <h1><?=$inline[$lang]["editar"]?>: <?=$secciones[$_GET["q"]]["t"]?></h1>
    </div>
    <hr />
		<div class="column right large-4">
        	<h2><?=$inline[$lang]["Tips"]?></h2>
            <?
			foreach($tipsEditar[$lang] as $tip){
				echo "<p>$tip</p>";
			}
			?>
        </div>
    <?
	if (!$_POST) {
	?>
    	<form class="large-8 column" id="adminForm" action="?q=<?=$_GET["q"]?>&a=editar&i=<?=$_GET["i"]?>" method="post" enctype="multipart/form-data">
        	<?
			$d=mysql_fetch_assoc(mysql_query("SELECT * FROM `".$secciones[$_GET["q"]]["db"]."` WHERE `id`='".$_GET["i"]."'"));
			foreach ($secciones[$_GET["q"]]["c"] as $val) {
				
				$titulo=$val["t"];
				$palceholder=$titulo;
				
				if (isset($val["hide"]) && $val["hide"]>1) {$hidden=" style='display:none'";}else{$hidden="";}
				if (isset($val["force"]) && $val["force"]==1) {$clase=" force";$char="<span class='asterisco'>*</span>";}else{$clase=""; $char="";}
				if ($val["val"]=="date"){
					$clase.=" date";
					$titulo.=" <span style='font-size:12px'>$fDateTxt</span>";
					}else{
					$clasetime="";
				}
				if ($val["val"]=="datetime"){
					$clase.=" datetime";
					$titulo.=" <span style='font-size:12px'>$fDateTimeTxt</span>";
					}else{
					$clasetime="";
				}
				
				if (isset($val["autofill"])) {
					$valor=$val["autofill"];
					}else{
					$valor="";
				}
				
				
				$label = "<div $hidden><h3>$titulo $char</h3>";
				echo $label;
				
				if (!isset($val["dependency"])) {
				
				if (isset($val["force"]) && $val["force"]==1) {$clase=" force";$char="<span class='asterisco'>*</span>";}else{$clase=""; $char="";}
				
				$valor=$d[$val["db"]];
				
				if ($val["type"]=="input"){
					echo "<input type='text' class='$clase' placeholder='".$palceholder."' name='".$val["db"]."' value='$valor'/>";
				}elseif ($val["type"]=="password"){
					echo "<input class='$clase' type='password' placeholder='".$palceholder."' name='".$val["db"]."' value='$valor'/>";
				}elseif ($val["type"]=="textarea"){
					echo "<div class='rtfbox' id='".$val["db"]."'>";
					if (!isset($val["rtf"]) || $val["rtf"] != "no") {
						include ("r/html/rtfbuttons.php");
					}
					echo "<textarea class='$clase' rows='5' placeholder='".$palceholder."' name='".$val["db"]."'>$valor</textarea>
						<script type='text/javascript'>richTextualize('#".$val["db"]."');</script>
					</div>";
				}elseif ($val["type"]=="img"){
					echo "<img class='th $clase' src='".$dir["imgs"]."/thumb/$valor'><input placeholder='".$palceholder."' name='".$val["db"]."' type='file' />";
				}elseif($val["type"]=="drop"){
					$tabla=$secciones[$val["get"]]["db"];
					$key=key($secciones[$val["get"]]["c"]);
					$field=$secciones[$val["get"]]["c"][$key]["db"];
					
					echo "<select class='$clase' name='".$val["db"]."'><option value=' '>".$inline[$lang]["sindefinir"]."</option>";
					$gq=mysql_query("SELECT * FROM `$tabla` WHERE 1 ORDER BY `$field` ASC");
					while ($gd=mysql_fetch_assoc($gq)){
						if ($gd["id"]==$valor) {$selected="selected='selected'";}else{$selected="";}
						echo "<option $selected value='".$gd["id"]."'>".$gd[$field]."</option>";
					}
					echo "</select>";
						
				}elseif($val["type"]=="select"){
					echo "<div class='optGroup $clase'>";
					foreach($val["options"] as $key => $text){
						if ($valor == $key){ $check = "checked";}else{$check="";}
						echo "<input type='radio' $check id='".$val["db"]."$key' name='".$val["db"]."' value='$key' /> <label for='".$val["db"]."$key' >$text</label>";
					}
				}
				// if true end
				}else{
					$dep["tabla"] = $_GET["q"];
					$dep["id"] 	= $_GET["i"];
				}
				echo "</div>";
			}
			?>
            </div>
            <?
			if (isset($dep) && $secciones["med"]["a"]["listar"]["p"]<=$_SESSION["mypermisos"]) {
				echo "<h3>".$inline[$lang]["medias"]."</h3><hr/><div class='galleryAdmin'>";
				$i=0;
				// lista de elementos cargados
				$mq = mysql_query( "SELECT * 
									FROM `ag_media` 
									WHERE `dep_table`='".$dep["tabla"]."' AND `dep_id`='".$dep["id"]."'");
				while ($md = mysql_fetch_assoc($mq)) {
					$i++;
					if ($md["type"]=="img") {
						$media=$dir["imgs"]."/thumb/".$md["url"];
					}else{
						$media="http://placehold.it/200x200&text=".$md["type"];
					}
					$botonesAdmin = "<ul class='button-group'>";
					if ($secciones["med"]["a"]["delete"]["p"]<=$_SESSION["mypermisos"]) {
						$botonesAdmin .= "<li><a title='".$inline[$lang]["delete"]."' href='?q=med&a=delete&i=".$md["id"]."' class='small-6 medium-6 large-6  button alert eliminarelemeto tiny'><span>&nbsp;</span></a></li>";
					}
					if ($secciones["med"]["a"]["editar"]["p"]<=$_SESSION["mypermisos"]) {
						$botonesAdmin .="<li><a title='".$inline[$lang]["editar"]."' href='?q=med&a=editar&i=".$md["id"]."' class='edit small-6 medium-6 large-6 button tiny'><span>&nbsp;</span></a></li>";
					$botonesAdmin .="</ul>";
					}
					echo "<div class='small-6 medium-4 large-3 column mediaItem'>
						<div class='imgHold' style='background:url($media) center; background-size:cover'></div>
						$botonesAdmin
					</div>";
				}
				if ($i==0) {
					echo "<p>".str_replace("[:x:]","media",$inlint[$lang]["noresults"])."</p>";
				}
				// boton apra cargar dependencias
				if ($secciones["med"]["a"]["cargar"]["p"]<=$_SESSION["mypermisos"]) {
				echo '<a class="button small-12 secondary tiny" style="margin-top:20px;" href="?q=med&a=cargar&dep_table='.$dep["tabla"].'&dep_id='.$dep["id"].'">'.$str[$lang]["upfoto"].'</a>';
				}
			}
			?>
			<hr />
            <input class="button small-12" type="submit" />
        </form>
        
		
		<?
		
	}else{
		$q="UPDATE `".$secciones[$_GET["q"]]["db"]."` SET ";
		$e="";
		$i=0;
		$imgs=array();
		$size=array();
		foreach ($secciones[$_GET["q"]]["c"] as $val) {
			$i++;
			if ($val["val"]!="date") {
				$postv = $_POST[$val["db"]];
			}else{
				$postv = date($fDateTime, strtotime(str_replace('-', '/', $_POST[$val["db"]])));
			}
			
			if ($postv!="" && $val["val"]!="file") {
				if ($i>1){$q.=",";}
				$q.=" `".$val["db"]."`='".$postv."'";
			}elseif($val["val"]=="file"){
				array_push($imgs,$val["db"]);
				array_push($size,$secciones[$_POST["dep_table"]]["c"]["img"]["imgsizes"]);
			}elseif($postv=="" && $val["force"]==1){
				$e.= str_replace("[:x:]",$val["t"],$error[$lang]["oneobli"]);
			}
			
			if (isset($val["dependency"])) {
				$dep["tabla"] = $_GET["q"];
			}
			
		}
		$q.=" WHERE `id`='".$_GET["i"]."'";
		if ($e!=""){
			echo $e;
		}else{
			if (mysql_query($q)){
				echo $inline[$lang]["editado"].": ".ucfirst($secciones[$_GET["q"]]["t"]);
				logIntoHistory($ahora,$_SESSION["myuserid"],$inline[$lang]["editar"].": ".$secciones[$_GET["q"]]["t"],$q);
				// time / quien / accion / codigo
			}else{
				echo ucfirst($error["tryagain"]);
			}
			
			$tabla=$secciones[$_GET["q"]]["db"];
			$dep_table = $secciones[$_GET["dep_table"]]["db"];
			$dep_id    = $_GET["dep_id"];
			$lastid    = $_GET["i"];
			$imgn=count($imgs);
			for($i=0;$i<$imgn;$i++){					
				subirImg ($imgs[$i],$dir["imgs"],$tabla,$lastid,$size[$i]);
			}
		
		}
	}
	include ("r/html/linkpopup.php");
	?>
	<script type="text/javascript">
        $(document).load(function(){
            $( ".date" ).datepicker({ dateFormat: "yy-mm-dd", numberOfMonths: 2 });
			$( ".datetime" ).datetimepicker({ dateFormat: "yy-mm-dd", numberOfMonths: 2 });
        });
    </script>