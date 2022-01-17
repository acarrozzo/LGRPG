<?php
// --------------------------------------------------------------------------------- Skills TAB
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {


// ---------------------------------------------------------------------------------- // START VARIABLES
    // ---------------------------------------------------------------------------------- // START VARIABLES
    // ---------------------------------------------------------------------------------- // START VARIABLES
    $level = $row['level'];
    $xp = $row['xp'];
    $hp = $row['hpmax'];
    $mp = $row['mpmax'];
    $bp = $row['bp'];
    $sp = $row['sp'];

    $cash = $row['currency'];
    $toopoor = $_SESSION['toopoor'];
    $notenoughbp = $_SESSION['notenoughbp'];
    $notenoughsp = $_SESSION['notenoughsp'];

    $quest4 = $row['quest4']; // 1h, 2h, LVL 5
$teleport2 = $row['teleport2']; // 1h, 2h, LVL 10
$quest19 = $row['quest19']; // Warriors Guild Initiation
$quest20 = $row['quest20']; // Wizards Guild Initiation

$pajamashamanFlag = $row['pajamashamanFlag'];
    $youngsoldierFlag = $row['youngsoldierFlag'];
    $jacklumberFlag = $row['jacklumberFlag'];
    $hunterbillFlag = $row['hunterbillFlag'];
    $travelingwarriorFlag = $row['travelingwarriorFlag'];
    $travelingwizardFlag = $row['travelingwizardFlag'];
    $warriorskillFlag = $row['warriorskillFlag'];
    $wizardskillFlag = $row['wizardskillFlag'];
    $miningskillFlag = $row['miningskillFlag'];
    $rangerskillFlag = $row['rangerskillFlag'];
    $mastertrainerFlag = $row['mastertrainerFlag'];
    $starcitysskillsFlag = $row['starcitysskillsFlag'];
    $starcityspellsFlag = $row['starcityspellsFlag'];

    // ----------------------------------------------------------------------------------Fireball MATH
    $fireball = $row['fireball'];
    $fireball_cost = $fireball_new = $fireball + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $fireball_max = 20;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $fireball_max = 10;
    } elseif ($row['travelingwizardFlag'] >= 1) {
        $fireball_max = 5;
    } elseif ($row['pajamashamanFlag'] >= 1) {
        $fireball_max = 3;
    } else {
        $fireball_max = 0;
    }
    if ($fireball_cost > $fireball_max && $fireball_max > 0) {
        $fireball_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Frostball MATH
    $frostball = $row['frostball'];
    $frostball_cost = $frostball_new = $frostball + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $frostball_max = 20;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $frostball_max = 10;
    } elseif ($row['travelingwizardFlag'] >= 1) {
        $frostball_max = 5;
    } else {
        $frostball_max = 0;
    }
    if ($frostball_cost > $frostball_max && $frostball_max > 0) {
        $frostball_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Poison Dart MATH
    $poisondart = $row['poisondart'];
    $poisondart_cost = $poisondart_new = $poisondart + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $poisondart_max = 10;
    } else {
        $poisondart_max = 0;
    }
    if ($poisondart_cost > $poisondart_max && $poisondart_max > 0) {
        $poisondart_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Atomic Blast MATH
    $atomicblast = $row['atomicblast'];
    $atomicblast_new = $atomicblast + 1;
    $atomicblast_cost = $atomicblast + 11;		// --- PRO Spell
    if ($row['wizardskillFlag'] >= 1) {
        $atomicblast_max = 5;
    } else {
        $atomicblast_max = 0;
    }
    if (($atomicblast_cost-10) > $atomicblast_max && $atomicblast_max > 0) {
        $atomicblast_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Heal MATH
    $heal = $row['heal'];
    $heal_cost = $heal_new = $heal + 1;
    if ($row['starcityspellsFlag'] >= 1) {
        $heal_max = 20;
    } elseif ($row['wizardskillFlag'] >= 1) {
        $heal_max = 10;
    } elseif ($row['travelingwizardFlag'] >= 1) {
        $heal_max = 5;
    } elseif ($row['pajamashamanFlag'] >= 1) {
        $heal_max = 3;
    } else {
        $heal_max = 0;
    }
    if ($heal_cost > $heal_max && $heal_max > 0) {
        $heal_cost = 'max';
    }
    // ----------------------------------------------------------------------------------regenerate MATH
    $regenerate = $row['regenerate'];
    $regenerate_cost = $regenerate_new = $regenerate + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $regenerate_max = 10;
    } else {
        $regenerate_max = 0;
    }
    if ($regenerate_cost > $regenerate_max && $regenerate_max > 0) {
        $regenerate_cost = 'max';
    }
    // ----------------------------------------------------------------------------------antidote MATH
    $antidote = $row['antidote'];
    $antidote_cost = $antidote_new = $antidote + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $antidote_max = 10;
    } else {
        $antidote_max = 0;
    }
    if ($antidote_cost > $antidote_max && $antidote_max > 0) {
        $antidote_cost = 'max';
    }


    // ----------------------------------------------------------------------------------magicarmor MATH
    $magicarmor = $row['magicarmor'];
    $magicarmor_cost = $magicarmor_new = $magicarmor + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $magicarmor_max = 10;
    } else {
        $magicarmor_max = 0;
    }
    if ($magicarmor_cost > $magicarmor_max && $magicarmor_max > 0) {
        $magicarmor_cost = 'max';
    }
    // ----------------------------------------------------------------------------------ironskin MATH
    $ironskin = $row['ironskin'];
    $ironskin_cost = $ironskin_new = $ironskin + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $ironskin_max = 10;
    } else {
        $ironskin_max = 0;
    }
    if ($ironskin_cost > $ironskin_max && $ironskin_max > 0) {
        $ironskin_cost = 'max';
    }
    // ----------------------------------------------------------------------------------wings MATH
    $wings = $row['wings'];
    $wings_cost = $wings_new = $wings + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $wings_max = 5;
    } else {
        $wings_max = 0;
    }
    if ($wings_cost > $wings_max && $wings_max > 0) {
        $wings_cost = 'max';
    }
    // ----------------------------------------------------------------------------------gills MATH
    $gills = $row['gills'];
    $gills_cost = $gills_new = $gills + 1;
    if ($row['wizardskillFlag'] >= 1) {
        $gills_max = 5;
    } else {
        $gills_max = 0;
    }
    if ($gills_cost > $gills_max && $gills_max > 0) {
        $gills_cost = 'max';
    }




    // ---------------------------------------------------------------------------------- // END VARIABLES
    // ---------------------------------------------------------------------------------- // END VARIABLES
    // ---------------------------------------------------------------------------------- // END VARIABLES



    echo '<h3 class="spCount white">SP <span class="purple">'.$sp.'</span></h3>';
    echo'<div class="gbox">';
    echo '<h1>Spells</h1>';
    echo '<p class="gray">Use SP to purchase and upgrade SKILLS and SPELLS. Spells will almost always consume MP to cast. To see more details about SPELLS and where you can learn them, scroll down. </p>';
    echo '</div>';
    echo'<div class="gbox">';
    echo'<h2>Destruction</h2>';
    echo'<p class="gray">Attack enemies with powerful Destruction magic</p>';



    // ---------------------------------------------------------------------------------- Fireball
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($fireball_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($fireball_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$fireball_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/fireball.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Fireball</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['fireball'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$fireball_max.'</span>
              <div class="gray">Throw a fireball at your enemies</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$fireball_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn fireball">+1 Fireball</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max fireball">MAX Fireball</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Frostball
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($frostball_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($frostball_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$frostball_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/frostball.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Frostball</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['frostball'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$frostball_max.'</span>
              <div class="gray">Same as Fireball except cold</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$frostball_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn frostball">+1 Frostball</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max frostball">MAX Frostball</button>
              ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Poison Dart
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($poisondart_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($poisondart_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$poisondart_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/poisondart.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Poison Dart</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['poisondart'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$poisondart_max.'</span>
              <div class="gray">Launch a Poison Dart at your enemies to do damage over time</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$poisondart_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn poison dart">+1 Poison Dart</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max poison dart">MAX Poison Dart</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Atomic Blast
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($atomicblast_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($atomicblast_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$atomicblast_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/atomicblast.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Atomic Blast</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['atomicblast'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$atomicblast_max.'</span>
              <div class="gray">PRO SPELL: Atomic Blast causes devastating damage but is expensive to cast</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$atomicblast_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn atomic blast">+1 Atomic Blast</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max atomic blast">MAX Atomic Blast</button>
              ';
    echo '</div>';

    echo '</div>';
    echo'<div class="gbox">';
    echo '<h2>Restoration</h2>';
    echo'<p class="gray">Support your character with a variety of healing spells.</p>';



    // ---------------------------------------------------------------------------------- Heal
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($heal_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($heal_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$heal_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/heal.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Heal</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['heal'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$heal_max.'</span>
              <div class="gray">Heal your HP at any time</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$heal_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn heal">+1 Heal</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max heal">MAX Heal</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Regenerate
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($regenerate_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($regenerate_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$regenerate_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/regenerate.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Regenerate</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['regenerate'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$regenerate_max.'</span>
              <div class="gray">Regenerate health over time</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$regenerate_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn regenerate">+1 Regenerate</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max regenerate">MAX Regenerate</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Antidote
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($antidote_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($antidote_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$antidote_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/antidote.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Antidote</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['antidote'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$antidote_max.'</span>
              <div class="gray">Cure yourself of poison and become immune for a short time</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$antidote_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn antidote">+1 Antidote</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max antidote">MAX Antidote</button>
              ';
    echo '</div>';

    echo '</div>';
    echo'<div class="gbox">';
    echo '<h2>Alteration</h2>';
    echo'<p class="gray">Manipulate yourself and the world around you to your advantage with Alteration spells.</p>';

    // ---------------------------------------------------------------------------------- Magic Armor
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($magicarmor_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($magicarmor_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$magicarmor_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/magicarmor.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Magic Armor</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['magicarmor'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$magicarmor_max.'</span>
              <div class="gray">Magic Armor protects you by absorbing damage</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$magicarmor_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn magic armor">+1 Magic Armor</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max magic armor">MAX Magic Armor</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Iron Skin
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($ironskin_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($ironskin_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$ironskin_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/ironskin.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Iron Skin</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['ironskin'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$ironskin_max.'</span>
              <div class="gray">Increase defense with Iron Skin</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$ironskin_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn iron skin">+1 Iron Skin</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max iron skin">MAX Iron Skin</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Wings
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($wings_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($wings_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$wings_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/wings.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Wings</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['wings'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$wings_max.'</span>
              <div class="gray">Wings give you the ability to fly</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$wings_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn wings">+1 Wings</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max wings">MAX Wings</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Gills
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($gills_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='gold';
    } elseif ($gills_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$gills_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/gills.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Gills</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['gills'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$gills_max.'</span>
              <div class="gray">Gills allows you to breathe underwater</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$gills_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn gills">+1 Gills</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max gills">MAX Gills</button>
              ';
    echo '</div>';

    echo '</div>';


    ////////////////////////////////



    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
    echo '	<br><br><br><br><br><br><br><br><br><br>
<h2 class="px30 darkestgray">SPELL DESCRIPTIONS</h2>	';
    echo '<h2 class="px50 darkestgray clear">DESTRUCTION</h2>	';


    echo'
<div class="descrip">
<h6 class="red">Fireball</h6>
<p class="px16">Launch a destructive Fireball at your enemy.</p>
<p class="px14"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="px14"><span class="blue">Cost: </span> 5 + (2*lvl) mp </p>
<p><i class="purple">3</i> Pajama Shaman</p>
<p><i class="purple">5</i> Traveling Wizard</p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">20</i> Star City</p>
<p><i class="purple">30</i> Warlock\'s Guild</p>
</div>
';
    echo'
<div class="descrip">
<h6 class="blue">Frostball</h6>
<p class="px16">Launch a destructive Frostball at your enemy.</p>
<p class="px14"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="px14"><span class="blue">Cost: </span> 5 + (2*lvl) mp </p>
<p><i class="purple">5</i> Traveling Wizard</p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">20</i> Star City</p>
<p><i class="purple">30</i> Warlock\'s Guild</p>
</div>
';
    echo'
<div class="descrip">
<h6 class="green">Poison Dart</h6>
<p class="px16">Launch a Poisonous Dart at your enemy.</p>
<p class="px14"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="px14"><span class="green">Poison: </span> rand (lvl*2) </p>
<p class="px14"><span class="blue">Cost: </span> 5 + (3*lvl) mp </p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">20</i> Star City</p>
<p><i class="purple">30</i> Warlock\'s Guild</p>
</div>
';
    echo'
<div class="descrip">
<h6 class="black">Atomic Blast</h6>
<p class="px16">Destroy your enemy with Atomic Power.</p>
<p class="px14"><span class="red">Damage: </span>  lvl*rand(mag)  </p>
<p class="px14"><span class="blue">Cost: </span> 100*lvl mp </p>
<p><i class="purple">5</i> Wizard\'s Guild</p>
<p><i class="purple">10</i> Star City</p>
<p><i class="purple">15</i> Warlock\'s Guild</p>
</div>
';


    echo '<h2 class="px50 darkestgray">RESTORATION</h2>	';


    echo'
<div class="descrip">
<h6 class="green">Heal</h6>
<p class="px16">Use Magic to Heal your Hit Points.</p>
<p class="px14"><span class="green">Heal Amount: </span> rand(1,mag) + (rand(1,mag)*lvl)  </p>
<p class="px14"><span class="blue">Cost: </span> 2*lvl mp </p>
<p><i class="purple">3</i> Pajama Shaman</p>
<p><i class="purple">5</i> Traveling Wizard</p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">20</i> Star City</p>
<p><i class="purple">30</i> Knight\'s Guild</p>
</div>
';
    echo'
<div class="descrip">
<h6 class="green">Regenerate</h6>
<p class="px16">Regenerate your HP for many clicks.</p>
<p class="px14"><span class="green">Regen Amount: </span> rand(lvl,lvl*2) hp  </p>
<p class="px14"><span class="purple">Clicks: </span> rand(magbase, magmod) clicks  </p>
<p class="px14"><span class="blue">Cost: </span> 20*lvl mp </p>
<p><i class="purple">10</i> Wizard\'s Guild</p>
<p><i class="purple">30</i> Knight\'s Guild</p>
</div>
';


    echo '<h2 class="px50 darkestgray">ALTERATION</h2>	';


    echo'
</span>';
    //echo'</form></article>';
}
