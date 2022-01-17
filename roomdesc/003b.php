<?php

// ----------------------------------------------------   // ---------------------------------------------------- 003b - Cabin Basement


$_SESSION['dangerLVL'] = "1";
$dirW='active dirt';
$dirU='active greenfield';
$icon = file_get_contents("img/svg/basement.svg");

echo '<div class="roomBox">
    <span class="icon brown">'.$icon.'</span>
    <h3 class="brown">Cabin Basement</h3>
    <p>A water-logged basement. It\'s very messy and smelly. You can attack rats here. Go back up to return to the cabin.</p>
    <form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="west">West</button>
    <button class="goldBG" type="submit" name="input1" value="up">Up</button>
    <button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
    <button class="redBG" type="submit" name="input1" value="attack">Attack</button>
	</form></div>';
