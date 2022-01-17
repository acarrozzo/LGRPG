<?php
// ---------------------------------------------------- 20 - Healing Springs
$_SESSION['dangerLVL'] = "0";
$dirS='active greenfield';
$dirSE='active greenfield';
$dirE='active greenfield';
$dirNW='active blue';
$icon = file_get_contents("img/svg/waterfall.svg");

echo '<div class="roomBox">
    <span class="icon blue">'.$icon.'</span>
    <h3 class="blue">Healing Springs</h3>
    <h4 class="green">Mountain Waterfall</h4>
    <p>Relax in the warm waters that have formed here. Along your journey you will come across many waterfalls, lakes, fountains and other natural springs. Rest at these locations to supercharge your Health and Mana.</p>
      <form id="mainForm" method="post" action="" name="formInput">
    	<button type="submit" name="input1" value="s">South</button>
    	<button type="submit" name="input1" value="se">Southeast</button>
    	<button type="submit" name="input1" value="e">East</button>
    	<button class="greenBG" type="submit" name="input1" value="rest">Rest</button>
  	</form>
  </div>';
//      <button class="blueBG" type="submit" name="input1" value="nw">Northwest</button>
