<?php

// ---------------------------------------------------- 003c - Young Soldier | Weapons Training Area

$_SESSION['dangerLVL'] = "000";
$dirE='active greenfield';
$icon = file_get_contents("img/svg/trainingarea.svg");

/*echo '<div class="roomBox">
    <span class="icon blue">'.$icon.'</span>
    <h3 class="blue">Young Soldier</h3>
    <h4>Weapon Training</h4>
    <p>The training area is breezy and overlooks the ocean. There are racks of weapons and armor set up here. A young soldier is here to assist you with your training.</p>
    <a href data-link="weap" class="btn goldBG">Weapons </a>
    <a href data-link2="skills" class="btn goldBG">Skills </a>
    <a href data-link="quests" class="btn goldBG">Quests </a>
    <form id="mainForm" method="post" action="" name="formInput">
    <input class="blueBG" type="submit" name="input1" value="pick up sword and shield" />
    <input class="blueBG" type="submit" name="input1" value="pick up 2-handed sword" />
    <button type="submit" name="input1" value="east">East</button>
    </form></div>';
  */
  echo '<div class="roomBox">
      <span class="icon blue">'.$icon.'</span>
    	<h3 class="blue">Young Soldier</h3>
    	<h4>Weapons Training</h4>
    	<p>The training area is breezy and overlooks the ocean. There are racks of weapons and armor set up here. A young soldier is here to assist you with your training.</p>
      <form id="mainForm" method="post" action="" name="formInput">
    	<a href data-link="quests" class="btn goldBG">Quests</a>
      <a href data-link2="skills" class="btn purpleBG">Skills</a>
      <a href data-link="inv" class="btn greenBG">Inventory</a>
    	<button class="blueBG" type="submit" name="input1" value="pick up weapons">Pick Up Weapons</button>
      <button class="redBG" type="submit" name="input1" value="attack dummy">Attack Dummy</button>
    	<button type="submit" name="input1" value="east">East</button>

  	</form>
    </div>';
