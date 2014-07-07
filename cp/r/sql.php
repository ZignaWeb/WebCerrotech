<?
$db_server="localhost";
$db_usr="cerrotec_admin";
$db_psw="cebeigfrrrotec";
$db_name="cerrotec_autogestion";

$dbh = mysql_connect ($db_server, $db_usr, $db_psw) or die ('I cannot connect to the database because: ' . mysql_error()); mysql_select_db ($db_name);
?>