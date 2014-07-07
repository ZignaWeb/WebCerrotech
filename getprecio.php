<?
include("cp/r/sql.php");
$carrierid=$_GET["carrier"];
$telid=$_GET["tel"];
$marcaid=$_GET["marca"];

$ct="	SELECT `precioC` 
			FROM ag_preciosXcarrier
			WHERE `carrierid`=".$carrierid." 
			AND `telefonoid`=".$telid."
		";
$cq=mysql_query($ct);

$tt="	SELECT `precioT` 
			FROM ag_telefono
			WHERE `id`=".$telid."
		";
$tq=mysql_query($tt);
$td=mysql_fetch_assoc($tq);

$mt="	SELECT `precioM` 
			FROM ag_marcas
			WHERE `id`=".$marcaid."
		";
$mq=mysql_query($mt);
if ($cd=mysql_fetch_assoc($cq)){
	$precio=$cd["precioC"];	
}else if(isset($td["precioT"])) {
	$precio=$td["precioT"];
}else if($md=mysql_fetch_assoc($mq)) {
	$precio=$md["precioM"];;
}else {$precio="error";
}

echo"$precio";
?>