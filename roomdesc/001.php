<?php
    $_SESSION['dangerLVL'] = "0";
    $dirN='active greenfield';
    $dirNE='active greenfield';
    $dirE='active greenfield';
    $dirSE='active greenfield';
    $dirS='active greenfield';
    $dirSW='active greenfield';
    $dirW='active greenfield';
    $dirNW='active greenfield';
    $icon = file_get_contents("img/svg/sun.svg");
    $icon = file_get_contents("img/svg/grassyfield.svg");

//<button class="nobtn" type="submit" name="input1" value="pillar">pillar</button>

echo '<div class="roomBox">
  <span class="icon gold">'.$icon.'</span>
  <h4 class="blue">This is it. The world is yours.</h4>
	<h3 class="greenfield">Grassy Field Crossroads</h3>
	<p>The air is warm and the sky above is bright blue. You are standing in the center of a large grassy field. There is a sign here with a gold chest at its base. To the southwest you see a cabin.</p>
  <form id="mainForm" method="post" action="" name="formInput">

    <button type="submit" name="input1" value="west">West</button>
    <button type="submit" name="input1" value="south">South</button>
	<button type="submit" name="input1" value="north">North</button>
	<button type="submit" name="input1" value="east">East</button>
	<button class="brownBG" type="submit" name="input1" value="read sign">Read Sign</button>



  <div class="btn" open-modal>Read Sign</div>

  <div class="flex-contain dddgrayBG modal">
    <span class="closer">close</span>
    <h3>Grassy Field <span class="gold">Directory</span></h3>
    <form id="mainForm" method="post" action="" name="formInput">
    <div class="double-column">
    <div><p class="">Healing Waterfall</p><input type="submit" name="input1" class="blueBG" value="northwest" /></div>
    <div><p class="">Shaman Tent</p><input type="submit" name="input1" class="purpleBG" value="northeast" /> </div>
        <div><p class="">Beach</p><input type="submit" name="input1" class="sandBG" value="west" /></div>
        <div><p class="">Wood Cabin</p><input type="submit" name="input1" class="brownBG" value="southwest" /> </div>
    </div>
    ---------------------------------------------------</br>
    <p>Visit the <span class="">OLD MAN</span> at the cabin to start your first quest.</p>
  </div>


	<button class="blueBG" type="submit" name="input1" value="view map">View Map</button>
	<button class="goldBG" type="submit" name="input1" value="open chest">Open Chest</button>
	</form>
  </div>';
