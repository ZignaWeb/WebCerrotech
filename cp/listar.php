
	<? include("r/html/menuSec.php");?>    
    
    <form id="filter-form" class="small-12 large-6 right" action="<?="?q=".$_GET["q"]."&a=listar"?>" method="post">
            	<div class="small-12 medium-4 left">
                <select id="select" name="q" >
                    <?
                    foreach($secciones[$_GET["q"]]["c"] as $val){
						if (!isset($val["search"]) || $val["search"]==1) {
                        	echo '<option value="'.$val["db"].'">'.$val["t"].'</option>';
						}
                    }
                    ?>
                </select>
                </div>
                <div class="small-12 medium-4 left">
                <input type="text" name="d" placeholder="<?=$inline[$lang]["searchTerm"]?>" />
                </div>
                <div class="small-12 medium-4 left ">
                <input class="small-12 button tiny" type="submit" value="<?=$inline[$lang]["search"]?>" />
                </div>
    </form>
    <hr />
   	<div class="column small-12">
        <h1><?=$inline[$lang]["viendo"]?> <?=$secciones[$_GET["q"]]["t"]?></h1>
    </div>
    <hr />
    <div class="small-12 column">
    <div>
    	<?
		if (isset($_POST["q"]) && isset($_POST["d"])) {
		$q=mysql_real_escape_string($_POST["q"]);
		$d=mysql_real_escape_string($_POST["d"]);
		$condicion = "`$q` LIKE '%$d%'";
		}else{
			$condicion = "1";
		}
		
		$rqg=mysql_query("SELECT * FROM `".$secciones[$_GET["q"]]["db"]."` WHERE $condicion ORDER BY `id` DESC");
		$rng=mysql_num_rows($rqg);
		
		$txt="<span>$rng</span> ".$inline[$lang]["results"];
		
		if ($_POST){
			$txt.=", ".$inline[$lang]["buscando"]." $q: <span>$d</span>";
		}
		
		if (isset($_GET["p"])){
			$p=$_GET["p"];
			$a=$p*$xpag-$xpag;
			$b=$xpag;
			$limit="LIMIT $a,$b";
			$txt.= " (".$inline[$lang]["pagina"]." $p ".$inline[$lang]["of"]." ".ceil($rng/$xpag).")";
		}else{
			$limit="LIMIT 0,$xpag";
			$p=1;
		}
		
		$rq=mysql_query("SELECT * FROM `".$secciones[$_GET["q"]]["db"]."` WHERE $condicion ORDER BY `id` DESC $limit");
		$rn=mysql_num_rows($rq);
		
		echo "<p class='alert-box info'>$txt</p>";
		
		
		?>
    </div>
    <table class="small-12" cellpadding="0" cellspacing="0">
    <?
	// estados 0:espera - 1:llegó - 2:cancelada app - 3:cancelada autogestion
	if (isset($_POST["q"]) && isset($_POST["d"])) {
		$q=mysql_real_escape_string($_POST["q"]);
		$d=mysql_real_escape_string($_POST["d"]);
		
		if ($secciones[$_GET["q"]]["c"][$q]["type"]=="select") {
			$d=trim(strtolower(array_search($d,$secciones[$_GET["q"]]["c"][$q]["options"])));
		}
		
		$condicion = "`$q` LIKE '%$d%'";
		$from="`".$secciones[$_GET["q"]]["db"]."`";
		$orderby="ORDER BY `id`";
		if (isset($secciones[$_GET["q"]]["c"][$q]["get"])){
			
			$tabla1=$secciones[$secciones[$_GET["q"]]["c"][$q]["get"]]["db"];
			$tabla2=$secciones[$_GET["q"]]["db"];
			
			$from ="`".$tabla1."`, `".$tabla2."`";
			$key=key($secciones[$secciones[$_GET["q"]]["c"][$q]["get"]]["c"]);
			$condicion = "`".$tabla1."`.`id`=`".$tabla2."`.`$q` AND `$tabla1`.`".$secciones[$secciones[$_GET["q"]]["c"][$q]["get"]]["c"][$key]["db"]."` LIKE '%$d%'";
			$orderby="ORDER BY `".$tabla1."`.`id`";
		}
		
	}else{
		$condicion = "1";
		$from="`".$secciones[$_GET["q"]]["db"]."`";
		$orderby="ORDER BY `id`";
	}
	
	$rqt="SELECT * FROM $from WHERE $condicion $orderby DESC $limit";
	$i=0;
	$rq=mysql_query($rqt);
	$rn=mysql_num_rows($rq);
	if ($rn>0){
		echo "<thead><tr>";
			foreach($secciones[$_GET["q"]]["c"] as $val){
				if (!isset($val["hide"]) || $val["hide"]<2) {
					echo "<th>". $val["t"]."</th>";
				}
			}
			echo "<th id='joy_context_actions'></th>";
			echo "</tr></thead>";
		while($rd=mysql_fetch_assoc($rq)){
			$i++;
			echo "<tr>";
				foreach($secciones[$_GET["q"]]["c"] as $key => $val){
					if (!isset($val["hide"]) || $val["hide"]<2) {
						if ($val["type"]=="select") {$rd[$val["db"]]=$val["options"][$rd[$val["db"]]];}
						if ($val["type"]=="img"){
							// ([a-zA-Z\-_0-9]+)(\.jpg|\.gif|\.png|\.jpeg)
							$regEx="#(\.jpg|\.gif|\.png|\.jpeg)#";
							preg_match($regEx, $rd[$val["db"]],$matches);							
							if (count($matches)>0){
								$rd[$val["db"]]="<img class='list_thumb th center' src='./".$dir["imgs"]."/thumb/".$rd[$val["db"]]."' />";
							}elseif($rd[$val["db"]]===NULL){
								$rd[$val["db"]]="<img class='list_thumb th center' src='http://placehold.it/200x200&text=N/A' />";
							}else{
								$rd[$val["db"]]="<a href='".$dir["imgs"]."/files/".$rd["url"]."' target='_blank'><img class='list_thumb th center' src='http://placehold.it/200x200&text=DOCUMENT' /></a>";
							}
						}
						if (isset($val["get"])){
							$xxx=mysql_fetch_assoc(mysql_query("SELECT * FROM `".$secciones[$val["get"]]["db"]."` WHERE `id`='".$rd[$val["db"]]."'"));
							$key=key($secciones[$val["get"]]["c"]);
							$rd[$val["db"]]=$xxx[$secciones[$val["get"]]["c"][$key]["db"]];
						}
							
						if ($val["type"]!="password"){
							if (isset($val["hide"]) && $val["hide"]==1 ) {
								$id="id='i".$val["db"].$i."'"; 
								$modalclass = 'reveal-modal';
								$datareveal = 'data-reveal';
								$popllink='<a href="#" data-reveal-id="i'.$val["db"].$i.'">'.$info[$lang]["show"].' '.$val["t"].'</a>';
								$closemodal='<a class="close-reveal-modal">&#215;</a>';
							}else{
								$id='';$modalclass = '';$datareveal = ''; $popllink='';$closemodal='';
							}
							echo "<td><div $id $datareveal class='$modalclass'>".
								replacetags ($rd[$val["db"]])
								." $closemodal </div> $popllink </td>";
						}else{
							
							echo "<td > ***** </td>";
						}
						
					}
				}
			echo "
				<td class='button-group' style='min-width:200px'>";
				array_multisort($secciones[$_GET["q"]]["a"]);
				foreach($secciones[$_GET["q"]]["a"] as $keya => $vala){
					if($vala["p"]<=$_SESSION["mypermisos"] && $vala["menu"]=="context"){
						if ($keya == "delete") {
							$btn = "alert";
							$confirm = "eliminarelemeto";
						}else{
							$btn = "";
							$confirm = "";
						}
						
						if ($keya == "medias") {
							// ?q=med&a=cargar&dep_table=exi&dep_id=1
							echo "<a class='$btn $confirm button tiny small-4 right' href='./?q=med&a=cargar&dep_table=".$_GET["q"]."&dep_id=".$rd["id"]."'>".$vala["t"]."</a>";	
						}else{
							echo "<a class='$btn $confirm button tiny small-4 right' href='./?q=".$_GET["q"]."&a=$keya&i=".$rd["id"]."'>".$vala["t"]."</a>";
						}
					}
				}
				/*
				if($secciones[$_GET["q"]]["a"]["editar"]["p"]<=$_SESSION["mypermisos"]){
				echo "<a class='btn-editar button tiny small-6' href='./?q=".$_GET["q"]."&a=editar&i=".$rd["id"]."'><span class='icon16x16 hide-for-large-up ui-icon-pencil'></span><span class='show-for-large-up'>Editar</span></a>";
				}
				if($secciones[$_GET["q"]]["a"]["delete"]["p"]<=$_SESSION["mypermisos"]){
				echo "<a class='button tiny small-6 alert eliminarelemeto' href='./?q=".$_GET["q"]."&a=eliminar&i=".$rd["id"]."'><span class='icon16x16 hide-for-large-up ui-icon-trash'></span><span class='show-for-large-up'>Eliminar</span></a>";
				}
				*/
				echo "</td>
			</tr>";
		}
	}else{
		echo "<p class='alert-box warning '>".str_replace("[:x:]",$secciones[$_GET["q"]]["t"],$inline[$lang]["noresults"])."</p>";
	}
    ?>
    </table>
    <div class="pagination-centered">
      <ul class="pagination">
    <?
	if ($rng>$xpag){
		$url=requestURI ();
		$strpos=strpos($url,"&p=");
			if ($strpos){
				$url=substr($url,0,$strpos);
			}
		$pn=ceil($rng/$xpag);
		if ($p==1)   {$arrowa="unavailable";$linka="#";}else{$arrowa=""; $linka=$url.'&p='.($p-1);}
		if ($p==$pn) {$arrowb="unavailable";$linkb="#";}else{$arrowb=""; $linkb=$url.'&p='.($p+1);}
		
		echo '<li class="arrow '.$arrowa.'"><a href="'.$url.'&p=1">&laquo;</a></li>
		<li class="arrow '.$arrowa.'"><a href="'.$linka.'">&lsaquo;</a></li>';
		for ($i=1;$i<=$pn;$i++) {
			if ($i==$p) { $current="current";}else{$current="";}
			if ($i==1 || $i==$pn || ($i>$p-3 && $i<$p+3)) {
				
				if ($i==$p-2 && $i>=3) {
					echo "<li class='unavailable'>...</li>";
				}
				
				echo "<li class='$current'><a href='$url&p=$i'>$i</a></li>";
				
				if($i==$p+2 && $i<=$pn-2) {
					echo "<li class='unavailable'>...</li>";
				}
				
			}
		}
		echo '<li class="arrow '.$arrowb.'"><a href="'.$linkb.'">&rsaquo;</a></li>
		<li class="arrow '.$arrowb.'"><a href="'.$url.'&p='.$pn.'">&raquo;</a></li>';
	}
	?>
      </ul>
    </div>
    </div>