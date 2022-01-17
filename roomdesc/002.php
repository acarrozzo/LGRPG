<?php


// ---------------------------------------------------- 002 - Grassy Field South
//if ($roomID=='002') {
    $_SESSION['dangerLVL'] = "0";
    $dirN='active greenfield';
    $dirE='active greenfield';
    $dirS='active gray';
    $dirW='active greenfield';
    $icon = file_get_contents("img/svg/redberry.svg");
//}
echo '<div class="roomBox">

    <span class="icon red small">'.$icon.'</span>
	<h3 class="greenfield">Grassy Field South</h3>
  <h4 class="red">Redberry Patch</h4>
	<p>The grass starts to get rocky in this area. There is a redberry bush here. Eat redberry to restore lost health points. To the east you see an entrance to a cave and to the west you see a cabin.</p>
	<form id="mainForm" method="post" action="" name="formInput">
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="west">West</button>
	<button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="east">East</button>
	<button class="redBG " type="submit" name="input1" value="pick 5 redberry">Pick 5 Redberry</button>
  </form>
  </div>';
