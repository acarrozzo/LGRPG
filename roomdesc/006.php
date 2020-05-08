<?php
// ---------------------------------------------------- 006 - Grassy Field East / Basic Shop
$_SESSION['dangerLVL'] = "000";
$dirN='active greenfield';
$dirS='active greenfield';
$dirW='active greenfield';
$dirE='active dirt';
$icon = file_get_contents("img/svg/basicshop.svg");

echo '<div class="roomBox">
    <span class="icon brown">'.$icon.'</span>
    <h2 class="greenfield">Grassy Field East</h2>
    <h4 class="brown">Basic Shop</h4>
  	<p>A Basic Shop is set up here where you can buy weapons, armor and other useful items. To the south is a cave and north is a strange tent. To the far east you see a forest.</p>
  	<a class="btn goldBG" data-link="shop">Shop</a>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<input type="submit" name="input1" value="west" />
  	<input type="submit" name="input1" value="north" />
  	<input type="submit" name="input1" value="south" />
  	<input type="submit" name="input1" value="east" />
	</form></div>';
