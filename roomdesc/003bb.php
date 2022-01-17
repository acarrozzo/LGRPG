<?php
// ---------------------------------------------------- 003bb - Destroyed Basement

$_SESSION['dangerLVL'] = "3";
$dirE='active dirt';
$icon = file_get_contents("img/svg/basement2.svg");


echo '<div class="roomBox">
    <span class="icon brown">'.$icon.'</span>
    <h3 class="brown">Destroyed Basement</h3>
    <p>A destroyed water-logged basement. Rat crap is everywhere. You can rest in between battles to restore lost hit points.</p>
    <form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="east">East</button>
    <button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>
    <button class="redBG" type="submit" name="input1" value="attack">Attack</button>
	</form></div>';
