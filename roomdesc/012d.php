<?php
// ---------------------------------------------------- 012d - Scorpion Control Room
$_SESSION['dangerLVL'] = "5";
$dirN='active redbrown';
$icon = file_get_contents("img/svg/rat2.svg");

echo '<div class="roomBox">
    <span class="icon redbrown">'.$icon.'</span>
    <h3 class="redbrown">Scorpion Control Room</h3>
    <p>This room is lighter than the others. There is a lever on the wall.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="north">North</button>
  	<button class="goldBG" type="submit" name="input1" value="flip lever">Flip Lever</button>
	</form>
  </div>';
