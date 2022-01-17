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
  	<h3 class="greenfield">Grassy Field Cave Entrance</h3>
  	<p>In the Grassy Field at an entrance to a dark cave. There is a sign here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button type="submit" name="input1" value="west">West</button>
  	<button type="submit" name="input1" value="nw">Northwest</button>
  	<button type="submit" name="input1" value="north">North</button>
  	<button type="submit" name="input1" value="south">South</button>
  	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
	</form></div>';
