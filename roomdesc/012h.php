<?php
// ---------------------------------------------------- 012h - Scorpion Throne Room
$_SESSION['dangerLVL'] = "30";
$dirS='active redbrown';
$icon = file_get_contents("img/svg/scorpion8.svg");

echo '<div class="roomBox">
    <span class="icon big3 redbrown">'.$icon.'</span>
    <h3 class="redbrown">Scorpion Throne Room</h3>
    <p>You stand in an enormous throne room. Very few travelers have reached. The King of all Scorpions calls this place home. There is a chest here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button type="submit" name="input1" value="south">South</button>
  	<button class="darkestgrayBG" type="submit" name="input1" value="open chest">Open Chest</button>
	</form>
  </div>';
