<?php

//------ 000 ROOM ZERO


  if ($roomID=='000') {
      $_SESSION['dangerLVL'] = "0";
      $icon = file_get_contents("img/svg/roomzero.svg");
  }
  echo '<div class="roomBox">
  <span class="icon gray">'.$icon.'</span>
  	<h2>Room Zero</h2>
  	<p>You are in an empty room. The walls are all gray and there are no windows or doors. The only light you see comes from a pillar in the center of the room. There is a small sign on the side of the pillar and a small piece of paper on the floor</p>
  	<form id="mainForm" method="post" action="" name="formInput">
  	<input type="submit" name="input1" value="ex sign" />
  	<input type="submit" name="input1" value="ex pillar" />
  	<input type="submit" name="input1" value="ex light" />
  	<input type="submit" name="input1" value="ex button" />
  	<input class="brownBG" type="submit" name="input1" value="read sign" />
  	<input class="blueBG" type="submit" name="input1" value="pick up map" />
  	<input class="goldBG" type="submit" name="input1" value="press button" />
  	</form>
    </div>';
