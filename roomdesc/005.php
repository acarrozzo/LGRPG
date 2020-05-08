<?php
// ---------------------------------------------------- 005 - Grassy Field North
$_SESSION['dangerLVL'] = "000";
$dirN='active gray';
$dirS='active greenfield';
$dirW='active greenfield';
$dirE='active greenfield';
    $icon = file_get_contents("img/svg/blueberry.svg");


echo '<div class="roomBox">
    <span class="icon blue">'.$icon.'</span>
    <h2 class="greenfield">Grassy Field North</h2>
    <h4 class="blue">Blueberry patch</h4>
  	<p>Blueberry bushes grow in this part of the field. To the west you see a waterfall and to the east an odd tent. To the south you see the main crossroads.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<input type="submit" name="input1" value="east" />
  	<input type="submit" name="input1" value="south" />
  	<input type="submit" name="input1" value="north" />
  	<input type="submit" name="input1" value="west" />
  	<input type="submit" name="input1" value="examine tent" />
  	<input class="blueBG " type="submit" name="input1" value="pick 5 blueberry" />
	</form></div>';
