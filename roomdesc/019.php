<?php
// ---------------------------------------------------- 019 - Sand Crab Nest
$_SESSION['dangerLVL'] = "3";
$dirN='active sand';
$icon = file_get_contents("img/svg/beach-crabs.svg");

echo '<div class="roomBox">
    <span class="icon sand big">'.$icon.'</span>
    <h3 class="blue">Sand Crab Nest</h3>
      <p>This part of the beach is swarming with Sand Crabs. They just won\'t stop! Teleport to the Grassy Field to escape here.</p><form id="mainForm" method="post" action="" name="formInput">
      <button class="sandBG" type="submit" name="input1" value="north">North</button>
    	<button class="redBG" type="submit" name="input1" value="attack">Attack</button>
      <button class="greenBG" type="submit" name="input1" value="grassy field">Teleport to Grassy Field</button>
  	</form>
  </div>';
