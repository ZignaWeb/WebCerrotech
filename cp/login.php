<?
if ($embed!=1 || !isset($embed)) { 
	header("Location:./");
}else{
?>
<form class="medium-6 medium-offset-3 small-8 small-offset-2" data-reveal id="login" action="logincheck.php" method="post">
	<hr />
	<h1><?=$site_name?></h1>
    <hr />
	<fieldset>
	<legend><?=$inline[$lang]["login"]?></legend>
	<label><span><?=$inline[$lang]["Username"]?></span><input name="usr" id="usr" type="text" value=""></label><br />
	<label><span><?=$inline[$lang]["Password"]?></span><input name="psw" id="psw" type="password" value=""></label><br />
	<input class="button small-12" type="submit" />
	</fieldset>
</form>
<?
}
?>