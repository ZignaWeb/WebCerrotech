<nav class="top-bar" data-topbar>
  <ul class="title-area">
    <li class="name">
      <h1><a href="./"><?=$site_name?></a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span><?=$inline[$lang]["menu"]?></span></a></li>
  </ul>

  <section class="top-bar-section">

    <!-- Left Nav Section -->
    <ul class="left">
      <li class="has-dropdown">
        <a href="#" id="joy_menu_ver"><?=$inline[$lang]["listar"]?></a><ul class="dropdown">
          <?
		  array_multisort($secciones);
		  foreach($secciones as $key => $val){
			if ($val["a"]["listar"]["p"]<=$_SESSION["mypermisos"] && $key !="his") {
				echo "<li><a href='./?q=$key&a=listar'>".$val["t"]."</a></li>";
			  }
	      }
		  ?>
        </ul>
      </li>
      <li class="has-dropdown">
        <a href="#" id="joy_menu_cargar"><?=$inline[$lang]["cargar"]?></a><ul class="dropdown">
          <?
		  foreach($secciones as $key => $val){
				if ($val["a"]["cargar"]["p"]<=$_SESSION["mypermisos"]) {
					echo "<li><a href='./?q=".$key."&a=cargar'>".$val["t"]."</a></li>";
				}
			}
		  ?>
        </ul>
      </li>
    </ul>
    
    <!-- Right Nav Section -->
    <ul class="right">
    	<?
		foreach($cpa as $val){
			echo "<li class='has-dropdown'><a href='#' id='joy_menu_cp'>".$val["t"]."</a><ul class='dropdown'>";
			foreach ($val["c"] as $val1) {
				if ($val1["p"]<=$_SESSION["mypermisos"]) {
					if ($val1["db"]=="his") {
						echo "<li><a href='./?q=".$val1["db"]."&a=listar'>".$val1["t"]."</a></li>";
					}else{
						echo "<li><a href='./?q=".$val1["db"]."'>".$val1["t"]."</a></li>";
					}
				}
			}
			echo "</ul></li>";
		}
      ?>
      <li class="alert"><a href="#" onclick="$(document).foundation('joyride', 'start');"><?=$str[$lang]["joytext"]?></a></li>
      <li class="alert"><a href="./logout.php" id="joy_menu_salir"><?=$inline[$lang]["salir"]?></a></li>
    </ul>
  </section>
</nav>