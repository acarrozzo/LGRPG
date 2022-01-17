<?php
// ---------------------------------------------------- 012c - Scorpion Pit Path
$_SESSION['dangerLVL'] = "6";
$dirNW='active redbrown';
$dirN='active redbrown';
$icon = file_get_contents("img/svg/scorpion4.svg");

echo '<div class="roomBox">
    <span class="icon redbrown">'.$icon.'</span>
    <h3 class="redbrown">Scorpion Pit Path</h3>
    <p>You continue through the dark scorpion lair.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="northwest">Northwest</button>
  	<button type="submit" name="input1" value="north">North</button>
	</form>
  </div>';
