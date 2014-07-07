<ol class="joyride-list modal" data-joyride>
<?
foreach ($joy[$lang] as $val) {
	echo '<li data-id="'.$val["i"].'"  data-options="tip_location:top;tip_animation:fade" data-text="Next">
        <h4>'.$val["h"].'</h4>
        <p>'.$val["t"].'</p>
      </li>';
}
?>
      <li data-button="End">
        <h4><?=$str[$lang]["esotodo"]?></h4>
        <p><?=$str[$lang]["yacono"]?></p>
      </li>
    </ol>