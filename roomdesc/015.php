<?php
// ---------------------------------------------------- 015 - On the Beach
$_SESSION['dangerLVL'] = "0";
$dirS='active sand';
$icon = file_get_contents("img/svg/beach-rock.svg");

echo '<div class="roomBox">
    <span class="icon sand big">'.$icon.'</span>
    <h3 class="blue">On the Beach by a Giant Rock</h3>
    <p>The Sun is directly overhead and there is a cool breeze. You can mine stone from the giant rocks here.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<button class="sandBG" type="submit" name="input1" value="south">South</button>
  	<button class="dgrayBG" type="submit" name="input1" value="mine stone">Mine Rock</button>
  	</form>
  </div>';
