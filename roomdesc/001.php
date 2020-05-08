<?php
    $_SESSION['dangerLVL'] = "0";
    $dirN='active greenfield';
    $dirNE='active greenfield';
    $dirE='active greenfield';
    $dirSE='active greenfield';
    $dirS='active greenfield';
    $dirSW='active greenfield';
    $dirW='active greenfield';
    $dirNW='active greenfield';
    $icon = file_get_contents("img/svg/sun.svg");
    $icon = file_get_contents("img/svg/grassyfield.svg");

echo '<div class="roomBox">
  <span class="icon gold">'.$icon.'</span>
  <h4 class="blue">This is it. The world is yours.</h4>
	<h2 class="greenfield">Grassy Field Crossroads</h2>
	<p>The air is warm and the sky above is bright blue. You are standing in the center of a large grassy field. There is a sign here with a gold chest at its base. To the southwest you see a cabin.</p>
	<form id="mainForm" method="post" action="" name="formInput">
    <input type="submit" name="input1" value="west" />
    <input type="submit" name="input1" value="south" />
	<input type="submit" name="input1" value="north" />
	<input type="submit" name="input1" value="east" />
	<input class="brownBG" type="submit" name="input1" value="read sign" />
	<input class="blueBG" type="submit" name="input1" value="view map" />
	<input class="goldBG" type="submit" name="input1" value="open chest" />
	</form>
  </div>';
