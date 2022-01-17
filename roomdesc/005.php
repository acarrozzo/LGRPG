<?php
// ---------------------------------------------------- 005 - Grassy Field North
$_SESSION['dangerLVL'] = "000";
$dirN='active gray';
$dirS='active greenfield';
$dirW='active greenfield';
$dirE='active greenfield';
    $icon = file_get_contents("img/svg/blueberry.svg");


echo '<div class="roomBox">
    <span class="icon blue small">'.$icon.'</span>
    <h3 class="greenfield">Grassy Field North</h3>
    <h4 class="blue">Blueberry patch</h4>
  	<p>Blueberry bushes grow in this part of the field. To the west you see a waterfall and to the east an odd tent. To the south you see the main crossroads.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button type="submit" name="input1" value="east">East</button>
  	<button type="submit" name="input1" value="south">South</button>
  	<button type="submit" name="input1" value="north">North</button>
  	<button type="submit" name="input1" value="west">West</button>
  	<button type="submit" name="input1" value="examine tent">Ex Tent</button>
  	<button class="blueBG " type="submit" name="input1" value="pick 5 blueberry">Pick 5 Blueberry</button>
	</form></div>';
