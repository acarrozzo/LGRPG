<?php
// ---------------------------------------------------- 003bb - Destroyed Basement

$_SESSION['dangerLVL'] = "3";
$dirE='active dirt';
$icon = file_get_contents("img/svg/basement2.svg");


echo '<div class="roomBox">
    <span class="icon brown">'.$icon.'</span>
    <h2 class="brown">Destroyed Basement</h2>
    <p>A destroyed water-logged basement. Rat crap is everywhere. You can rest in between battles to restore lost hit points.</p>
    <form id="mainForm" method="post" action="" name="formInput">
    <input type="submit" name="input1" value="east" />
    <input class="brownBG" type="submit" name="input1" value="read sign" />
    <input class="redBG" type="submit" name="input1" value="attack" />
	</form></div>';
