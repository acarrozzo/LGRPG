<?php
// ---------------------------------------------------- 012g - Scorpion Nest
$_SESSION['dangerLVL'] = "15";
$dirN='active redbrown';
$dirSW='active redbrown';
$icon = file_get_contents("img/svg/scorpion7.svg");

echo '<div class="roomBox">
    <span class="icon big2 redbrown">'.$icon.'</span>
    <h3 class="redbrown">Scorpion Nest</h3>
    <p>The vicious Scorpion Queen lives here. You have killed many of her children and she is not happy. </p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="north">North</button>
  	<button type="submit" name="input1" value="southwest">Southwest</button>
	</form>
  </div>';
