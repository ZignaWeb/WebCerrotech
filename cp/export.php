<?
$get=$_GET["q"];
if ($secciones[$get]["a"]["export"]["p"]<=$_SESSION["mypermisos"]) {
?>
    <hr />
    <?=$secciones[$get]["a"]["export"]["p"]?><=<?=$_SESSION["mypermisos"]?>
    <h1><?=$inline[$lang]["export"]?> <?=$secciones[$get]["t"]?></h1>
    <a href="export2.php?q=<?=$get?>"><?=$inline[$lang]["download"]?></a>
<?
}else{
?>
	<hr />
	<div class='alert-box warning'><?=$error[$lang]["notenoughpermits"]?><a href='#' class='close'>&times;</a></div>
<?
}
?>