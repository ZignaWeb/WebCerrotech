<?
session_start();

// datos de la session
$session_timeframe = 120; // en minutos
$error_reporting = 0;
// Variabels de pantalla
$site_name = "ADMIN";
$site_logo = "";
$lang = "es"; // es - en

// DB
include ("sql.php");
$db_table_prefix = "";
$temp["user"]["n"]="francisco";
$temp["user"]["p"]="machado";

// emails
$email_reservas="restosibaris@windsortower.com";

// variables de navegación
$xpag=20; // numero de elementos mostrado por pagina

// timezone
// date_default_timezone_set('America/Argentina/Cordoba'); // php v5 o superior
$fDate="Y-n-j";
$fDateTxt="AAAA/MM/DD";
$fDateTime="Y-n-j H:i:s";
$fDateTimeTxt="AAAA/MM/DD HH:MM:SS";

$hoy = date($fDate);
$hoy = date($fDate);
$ahora = date($fDateTime);
//strings
include ("strings/inline.php");

// directiorios (desde el root)
$dir["imgs"]="uploads"; // imagenes

// check for timeout and update time if 
if (isset($_SESSION["myusername"]) && isset($_SESSION["timeout"]) && $_SESSION['timeout'] + $session_timeframe * 60 < time()) {
     header("Location: logout.php?e=timeout");
}else{
	$_SESSION['timeout'] = time();
}
include("arq.php");
include("funciones.php");
?>