<?
function requestURI () {
	return "?".$_SERVER['QUERY_STRING'];
}
function printbars($var){
	echo "<div class='bar'>";
	$c=0;
	global $co;
	shuffle($co);
	$varn=count($var);
	$porSum=0;
	$an=0;
	foreach ($var as $val ) {
		$an=$an+$val["n"];
	}
	$i=0;
	foreach ($var as $key => $val){
		$i++;
		if ($i==$varn) {
			$por=100-$porSum;
		}else{
			$por=floor($val["n"]*100/$an);
			$porSum=$porSum+$por;
		}
		if ($por!=0){
			echo "<span style='width:".$por."%; background:".$co[$c]."' title='".$por."%'>".$val["s"]."</span>";
			$c++;
		}
	}
	echo "</div><p>";
	foreach ($var as $key => $val){
		echo "<span>".$val["t"].":</span> ".$val["n"]." ";
	}
	echo "<p>";
}

function subirImg ($name_media_field,$destination_dir,$tabla,$relid,$sizes=false) {
	global $dir;
	global $secciones;
	$tmp_name = $_FILES[$name_media_field]['tmp_name'];
	if ( is_dir($destination_dir) && is_uploaded_file($tmp_name))
	{
		$img_type  = $_FILES[$name_media_field]['type'];
		if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg") || strpos($img_type,"gif") || strpos($img_type,"png") ){
			$img_file  = $name_media_field.time().'.'.str_replace("image/","",$img_type);
			if(move_uploaded_file($tmp_name, $destination_dir.'/'.$img_file)){
				$type="img";
				$imageDim=getimagesize($destination_dir.'/'.$img_file);
				$imageRel=$imageDim[0]/$imageDim[1];
				$maxH=900;
				$maxW=900;
				$maxSizes=$sizes;
				$querry="UPDATE `$tabla` SET `$name_media_field` = '$img_file'";
				if ($tabla=="media") {
					$querry.=", `type` = '$type'";
				}
				$querry.=" WHERE `id`='$relid'";
				if (mysql_query($querry)){
					
					foreach ($maxSizes as $key => $val) {
						
						if ($val["w"]!="auto" && $val["h"]!="auto") {
							$newImgRel=$val["w"]/$val["h"];
							$image_p = imagecreatetruecolor($val["w"], $val["h"]);
							if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
								$image = imagecreatefromjpeg($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "gif")){
								$image = imagecreatefromgif($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "png")){
								imagesavealpha($image_p, true); 
								$color = imagecolorallocatealpha($image_p,0x00,0x00,0x00,127); 
								imagefill($image_p, 0, 0, $color); 
								$image = imagecreatefrompng($destination_dir.'/'.$img_file);
							}
							if ($imageRel>$newImgRel){
								// dimensiones
								$H  = $val["h"];
								$W  = $imageDim[0]*$val["h"]/$imageDim[1];
								// offsets
								$oX =-($W-$val["w"])/2;
								$oY =0;
							}else{
								// dimensiones
								$W  = $val["w"];
								$H  = $imageDim[1]*$val["w"]/$imageDim[0];
								//ofesets
								$oY=-($H-$val["h"])/2;
								$oX=0;
							}
						}elseif($val["h"]=="auto" && $val["w"]=="auto"){
							$newImgRel=$imageRel;
							if ($imageRel<$maxW/$maxH){
								// dimensiones
								$W  = $imageDim[0]*$maxH/$imageDim[1];
								$H  = $maxH;
							}else{
								// dimensiones
								$W  = $maxW;
								$H  = $imageDim[0]*$maxW/$imageDim[1];
							}
							
							$image_p = imagecreatetruecolor($W, $H);
							if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
								$image = imagecreatefromjpeg($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "gif")){
								$image = imagecreatefromgif($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "png")){
								imagesavealpha($image_p, true); 
								$color = imagecolorallocatealpha($image_p,0x00,0x00,0x00,127); 
								imagefill($image_p, 0, 0, $color); 
								$image = imagecreatefrompng($destination_dir.'/'.$img_file);
							}
							
						}else{
							
							if ($val["h"]=="auto"){
								// dimensiones
								$W  = $val["w"];
								$H  = $imageDim[1]*$val["w"]/$imageDim[0];
							}elseif ($val["w"]=="auto"){
								// dimensiones
								$W  = $imageDim[0]*$val["h"]/$imageDim[1];
								$H  = $val["h"];
							}
							
							$image_p = imagecreatetruecolor($W, $H);
							if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
								$image = imagecreatefromjpeg($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "gif")){
								$image = imagecreatefromgif($destination_dir.'/'.$img_file);
							}elseif ( strpos($img_type, "png")){
								imagesavealpha($image_p, true); 
								$color = imagecolorallocatealpha($image_p,0x00,0x00,0x00,127); 
								imagefill($image_p, 0, 0, $color); 
								$image = imagecreatefrompng($destination_dir.'/'.$img_file);
							}
							$oY=0;
							$oX=0;
						}
						//imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						imagecopyresampled($image_p, $image, $oX, $oY, 0, 0, $W, $H, $imageDim[0], $imageDim[1]);
						if ( strpos($img_type, "jpeg") || strpos($img_type,"jpg")){
							imagejpeg( $image_p, $destination_dir.'/'.$key.'/'.$img_file,90);
						}elseif ( strpos($img_type, "gif")){
							imagegif( $image_p, $destination_dir.'/'.$key.'/'.$img_file);
						}elseif ( strpos($img_type, "png")){
							imagepng( $image_p, $destination_dir.'/'.$key.'/'.$img_file);
						}
						
					}
					echo '<p><img src="./'.$dir["imgs"].'/thumb/'.$img_file.'" /></p>';
					if (unlink($destination_dir.'/'.$img_file)) {
						echo "<!--Temp media (".$destination_dir.'/'.$img_file.") eliminado-->";
					}else{
						echo "<!--Error: Temp media (".$destination_dir.'/'.$img_file.") NO eliminado-->";;
					}
				}else{echo "<p>no se pudo cargar la imagen ($querry)</p>";}
			}else{echo "<p>".$error["copyfilefail"]."</p>";}
		}elseif(strpos($img_type, "pdf")){
			$img_file  = $name_media_field.time().'.'.str_replace("application/","",$img_type);
			echo "<p>PDF</p>";
			if(move_uploaded_file($tmp_name, $destination_dir.'/files/'.$img_file)){
				$type="doc";
				$querry="UPDATE `$tabla` SET `url` = '$img_file', `type` = '$type' WHERE `id`='$relid'";
				if (mysql_query($querry)){
					echo "<p>Media agregada</p>";					
				}else{
					echo "<p>not Ok</p>";
				}
			}else{echo "<p>".$error["copyfilefail"]."</p>";}
		}else{
			echo '<p>'.$error["wrongformat"].'</p>';
		}
	}
}

function draw_calendar($month,$year,$daychange,$daysoff){
	
	$headings = array('Do','Lu','Ma','Mi','Ju','Vi','Sa');
	global $hoy;
	// calendario
	$calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
	
	
	/* table headings */
	$calendar.= '<tr class="calendar-row"><td class="calendar-day-head">'.implode('</td><td class="calendar-day-head">',$headings).'</td></tr>';

	/* days and weeks vars now ... */
	$running_day = date('w',mktime(0,0,0,$month,1,$year));
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
	$days_in_this_week = 1;
	$day_counter = 0;
	$dates_array = array();

	/* row for week one */
	$calendar.= '<tr class="calendar-row">';

	/* print "blank" days until the first of the current week */
	for($x = 0; $x < $running_day; $x++):
		$calendar.= '<td class="calendar-day-np"> </td>';
		$days_in_this_week++;
	endfor;

	/* keep going with days.... */
	$offn=count($daysoff);
	for($list_day = 1; $list_day <= $days_in_month; $list_day++):
		$clase="";
		if ($offn>0){
			$fulldate="$year-$month-$list_day";
			$fulldate= date($fDate, strtotime($fulldate));
			if (in_array($fulldate,$daysoff)){
				$clase .= " off";
			}
		}
		
		// hoy
		if ($hoy=="$year-$month-$list_day") {$clase .= " shadow";}
		
		$calendar.= '<td class="calendar-day '.$clase.'">';
			/* add in the day number */
			
			$calendar.= '<a class="day-number" href="'.$daychange.'d='.$year."-".$month."-".$list_day.'">'.$list_day.'</a>';

			/** QUERY THE DATABASE FOR AN ENTRY FOR THIS DAY !!  IF MATCHES FOUND, PRINT THEM !! **/
			$calendar.= str_repeat('<p> </p>',2);
			
		$calendar.= '</td>';
		if($running_day == 6):
			$calendar.= '</tr>';
			if(($day_counter+1) != $days_in_month):
				$calendar.= '<tr class="calendar-row">';
			endif;
			$running_day = -1;
			$days_in_this_week = 0;
		endif;
		$days_in_this_week++; $running_day++; $day_counter++;
	endfor;

	/* finish the rest of the days in the week */
	if($days_in_this_week < 8):
		for($x = 1; $x <= (8 - $days_in_this_week); $x++):
			$calendar.= '<td class="calendar-day-np"> </td>';
		endfor;
	endif;

	/* final row */
	$calendar.= '</tr>';

	/* end the table */
	$calendar.= '</table>';
	
	/* all done, return result */
	return $calendar;
}


function query_to_csv ($db_conn, $query, $filename, $attachment = false, $headers = true) {
	if($attachment) {
		// send response headers to the browser
		header( 'Content-Type: text/csv' );
		header( 'Content-Disposition: attachment;filename='.$filename);
		$fp = fopen('php://output', 'w');
	} else {
		$fp = fopen($filename, 'w');
	}
	
	$result = mysql_query($query, $db_conn) or die( mysql_error( $db_conn ) );
	global $getq;
	if($headers) {
		// output header row (if at least one row exists)
		$row = mysql_fetch_assoc($result);
		if($row) {
			fputcsv($fp, array_keys($row));
			// reset pointer back to beginning
			mysql_data_seek($result, 0);
		}
	}
	
	while($row = mysql_fetch_assoc($result)) {
		fputcsv($fp, $row);
	}
	
	fclose($fp);
}
function errorPrint ($e) {
	global $error;
	global $lang;
	echo '<div data-alert class="alert-box warning medium-6 medium-offset-3 small-8 small-offset-2">
	  '.$error[$lang][$e].'
	  <a href="#" class="close">&times;</a> 
	</div>';
}

// time / quien / accion / codigo
function logIntoHistory ($fecha, $quien, $accion, $codigo) {
	$codigo=addslashes($codigo);
	mysql_query("INSERT INTO `historial` SET `fechahora`='$fecha', `quien`='$quien', `accion`='$accion', `codigo`='$codigo'");
}

function replacetags ($texto) {
	return nl2br(str_replace(
	array  ("[","]"),
	array  ("<",">"),
			$texto
	));
}

function formattext ($texto) {
	$texto = nl2br(stripslashes($texto));
	return $texto;
}

function fFecha ($fecha) {
	$date = date_create($fecha);
	return date_format($date, 'd/m/ Y');//F j, Y
}
?>