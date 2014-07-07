<? 
include("r/main.php");
session_start();
session_destroy();
if ($_GET["e"]) {$e="?e=".$_GET["e"];}
header("location:./$e");
?>