<?php
// ---------------------------------------------------- 007 - Grassy Field Cave Entrance
$_SESSION['dangerLVL'] = "000";
$dirN='active greenfield';
$dirS='active dgray';
$dirW='active greenfield';
$dirNW='active greenfield';
$icon = file_get_contents("img/svg/cave1.svg");

echo '<div class="roomBox">
    <span class="icon darkgray">'.$icon.'</span>
  	<h2 class="greenfield">Grassy Field Cave Entrance</h2>
  	<p>In the Grassy Field at an entrance to a dark cave. There is a sign here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<input type="submit" name="input1" value="west" />
  	<input type="submit" name="input1" value="nw" />
  	<input type="submit" name="input1" value="north" />
  	<input type="submit" name="input1" value="south" />
  	<input class="brownBG" type="submit" name="input1" value="read sign" />
	</form></div>';
