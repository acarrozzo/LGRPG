<?php

// ---------------------------------------------------- 025 - Free Trees
$_SESSION['dangerLVL'] = "0";
$dirS='active forest';
$icon = file_get_contents("img/svg/treefarm.svg");

/*if ($hatchet <=0) {
    $button = '<button class="brownBG" type="submit" name="input1" value="get hatchet">Get Hatchet</button>';
} else {
    $button = '<button class="forestBG" type="submit" name="input1" value="chop tree">Chop Tree</button>';
}
*/
echo '<div class="roomBox">
    <span class="icon forest">'.$icon.'</span>
    <h3 class="forest">Tree Farm</h3>
    <h4 class="brown">Free Wood</h4>
    <p>Jack Lumber has a pretty nice tree farm here. Feel free to chop down some trees. Pick up a hatchet and have at it.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="s">South</button>
    <button class="brownBG" type="submit" name="input1" value="get hatchet">Get Hatchet</button>
    <button class="forestBG" type="submit" name="input1" value="chop tree">Chop Tree</button>
    <a href data-link2="craft" class="redBG btn">Craft </a>
  	</form>
  </div>';
