<?php
// ---------------------------------------------------- 009 - Spider Cave
$_SESSION['dangerLVL'] = "3";
$dirN='active darkgray';
$dirE='active darkgray';
$icon = file_get_contents("img/svg/scorpion1.svg");

echo '<div class="roomBox">
    <span class="icon darkgray">'.$icon.'</span>
  	<h3 class="">Spider Cave</h3>
    <p>Inside the spider cave.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="north">North</button>
  	<button type="submit" name="input1" value="east">East</button>
  	<button class="redBG" type="submit" name="input1" value="attack">Attack</button>
	</form>
  </div>';
