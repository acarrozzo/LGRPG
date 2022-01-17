<?php
// ---------------------------------------------------- 017 - On the Beach
$_SESSION['dangerLVL'] = "0";
$dirS='active sand';
$dirE='active dirt';
$dirN='active sand';
$icon = file_get_contents("img/svg/beach-umbrella.svg");

echo '<div class="roomBox">
    <span class="icon sand big">'.$icon.'</span>
      <h3 class="blue">On the Beach</h3>
      	<p>The Sun is directly overhead and there is a cool breeze. The waves slowly roll in.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
    <button class="sandBG" type="submit" name="input1" value="north">North</button>
  	<button class="sandBG" type="submit" name="input1" value="south">South</button>
    <button class="dirtBG" type="submit" name="input1" value="east">East</button>
  	</form>
  </div>';
