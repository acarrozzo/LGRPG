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

    // ----------------------------------------------------------------------------------One Handed MATH
    $onehanded = $row['onehanded'];
    $onehanded_cost = $onehanded_new = $onehanded + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $onehanded_max = 30;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $onehanded_max = 20;
    }		// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $onehanded_max = 10;
    }	// traveling warrior
    elseif ($row['quest4'] >= 2) {
        $onehanded_max = 5;
    }			// young soldier
    else {
        $onehanded_max = 0;
    }
    if ($onehanded_cost > $onehanded_max && $onehanded_max > 0) {
        $onehanded_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Two Handed MATH
    $twohanded = $row['twohanded'];
    $twohanded_cost = $twohanded_new = $twohanded + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $twohanded_max = 30;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $twohanded_max = 20;
    }		// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $twohanded_max = 10;
    }	// traveling warrior
    elseif ($row['quest4'] >= 2) {
        $twohanded_max = 5;
    }			// young soldier
    else {
        $twohanded_max = 0;
    }
    if ($twohanded_cost > $toughness_max && $toughness_max > 0) {
        $twohanded_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Ranged MATH
    $ranged = $row['ranged'];
    $ranged_cost = $ranged_new = $ranged + 1;
    if ($row['rangerskillFlag'] >= 1) {
        $ranged_max = 30;
    }		// ranged 30
    elseif ($row['hunterbillFlag'] >= 1) {
        $ranged_max = 15;
    }	// ranged 15
    elseif ($row['jacklumberFlag'] >= 1) {
        $ranged_max = 5;
    }	// ranged 5
    else {
        $ranged_max = 0;
    }
    if ($ranged_cost > $ranged_max && $ranged_max > 0) {
        $ranged_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Toughness MATH
    $toughness = $row['toughness'];
    $toughness_cost = $toughness_new = $toughness + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $toughness_max = 30;
    }			// blue city
    elseif ($row['warriorskillFlag'] >= 1) {
        $toughness_max = 20;
    }		// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $toughness_max = 10;
    }	// traveling warrior
    elseif ($row['quest4'] >= 2) {
        $toughness_max = 5;
    }			// young soldier
    else {
        $toughness_max = 0;
    }
    if ($toughness_cost > $toughness_max && $toughness_max > 0) {
        $toughness_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Block MATH
    $block = $row['block'];
    $block_cost = $block_new = $block + 1;
    if ($row['warriorskillFlag'] >= 1) {
        $block_max = 10;
    }		// warriors guild
    else {
        $block_max = 0;
    }
    if ($block_cost > $block_max && $block_max > 0) {
        $block_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Dodge MATH
    $ddge = $row['ddge'];
    $ddge_cost = $ddge_new = $ddge + 1;
    if ($row['rangerskillFlag'] >= 1) {
        $ddge_max = 10;
    }				// rangers guild
    elseif ($row['hunterbillFlag'] >= 1) {
        $ddge_max = 5;
    }		// hunter bill
    else {
        $ddge_max = 0;
    }
    if ($ddge_cost > $ddge_max && $ddge_max > 0) {
        $ddge_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Slice MATH
    $slice = $row['slice'];
    $slice_cost = $slice_new = $slice + 1;
    if ($row['warriorskillFlag'] >= 1) {
        $slice_max = 10;
    }				// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $slice_max = 5;
    }		// traveling warrior
    else {
        $slice_max = 0;
    }
    if ($slice_cost > $slice_max && $slice_max > 0) {
        $slice_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Smash MATH
    $smash = $row['smash'];
    $smash_cost = $smash_new = $smash + 1;
    if ($row['warriorskillFlag'] >= 1) {
        $smash_max = 10;
    }				// warriors guild
    elseif ($row['travelingwarriorFlag'] >= 1) {
        $smash_max = 5;
    }		// traveling warrior
    else {
        $smash_max = 0;
    }
    if ($smash_cost > $smash_max && $smash_max > 0) {
        $smash_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Aim MATH
    $aim = $row['aim'];
    $aim_cost = $aim_new = $aim + 1;
    if ($row['rangerskillFlag'] >= 1) {
        $aim_max = 20;
    }				// rangers guild
    elseif ($row['hunterbillFlag'] >= 1) {
        $aim_max = 5;
    }		// hunter bill
    else {
        $aim_max = 0;
    }
    if ($aim_cost > $aim_max && $aim_max > 0) {
        $aim_cost = 'max';
    }
    // ----------------------------------------------------------------------------------Magic Strike MATH
    $magicstrike = $row['magicstrike'];
    $magicstrike_cost = $magicstrike_new = $magicstrike + 1;
    if ($row['warriorskillFlag'] >= 1) {
        $magicstrike_max = 10;
    }				// warriors guild
    else {
        $magicstrike_max = 0;
    }
    if ($magicstrike_cost > $magicstrike_max && $magicstrike_max > 0) {
        $magicstrike_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Multi Arrow MATH
    $multiarrow = $row['multiarrow'];
    $multiarrow_cost = $multiarrow_new = $multiarrow + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $multiarrow_max = 30;
    }		// blue city
    elseif ($row['rangerskillFlag'] >= 1) {
        $multiarrow_max = 20;
    }		// rangers guild
    else {
        $multiarrow_max = 0;
    }
    if ($multiarrow_cost > $multiarrow_max && $multiarrow_max > 0) {
        $multiarrow_cost = 'max';
    }

    // ----------------------------------------------------------------------------------Bolt Upgrade MATH
    $boltupgrade = $row['boltupgrade'];
    $boltupgrade_cost = $boltupgrade_new = $boltupgrade + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $boltupgrade_max = 30;
    }		// blue city
    elseif ($row['rangerskillFlag'] >= 1) {
        $boltupgrade_max = 20;
    }		// rangers guild
    else {
        $boltupgrade_max = 0;
    }
    if ($boltupgrade_cost > $boltupgrade_max && $boltupgrade_max > 0) {
        $boltupgrade_cost = 'max';
    }

    // ----------------------------------------------------------------------------------PT MATH
    $physicaltraining = $row['physicaltraining'];
    $physicaltraining_cost = $physicaltraining_new = $physicaltraining + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $physicaltraining_max = 30;
    }			// blue city
    elseif ($row['rangerskillFlag'] >= 1) {
        $physicaltraining_max = 25;
    }			// rangers guild
    elseif ($row['warriorskillFlag'] >= 1) {
        $physicaltraining_max = 20;
    }		// warriors guild
    else {
        $physicaltraining_max = 10;
    }
    if ($physicaltraining_cost > $physicaltraining_max && $physicaltraining_max > 0) {
        $physicaltraining_cost = 'max';
    }

    // ----------------------------------------------------------------------------------MT MATH
    $mentaltraining = $row['mentaltraining'];
    $mentaltraining_cost = $mentaltraining_new = $mentaltraining + 1;
    if ($row['starcitysskillsFlag'] >= 1) {
        $mentaltraining_max = 30;
    }			// blue city
    elseif ($row['rangerskillFlag'] >= 1) {
        $mentaltraining_max = 25;
    }		// rangers guild
    elseif ($row['wizardskillFlag'] >= 1) {
        $mentaltraining_max = 20;
    }		// wizards guild
    else {
        $mentaltraining_max = 10;
    }
    if ($mentaltraining_cost > $mentaltraining_max && $mentaltraining_max > 0) {
        $mentaltraining_cost = 'max';
    }
    // ---------------------------------------------------------------------------------- // END VARIABLES
    // ---------------------------------------------------------------------------------- // END VARIABLES
    // ---------------------------------------------------------------------------------- // END VARIABLES






    // ---------------------------------------------------------------------------------- // START SKILL MENU
    //echo '<article data-pop="skills" id="skills">';
    //<form id="mainForm" method="post" action="" name="formInput">
    //<h4 class="spCount white">You have <span class="purple">'.$sp.'</span> SP</h4>

    echo'<h3 class="spCount white">SP <span class="purple">'.$sp.'</span></h3>';
    echo'<div class="gbox">';

    echo'  <h1>Skills</h1>';
    echo '<p class="gray">Use SP to purchase and upgrade SKILLS and SPELLS. Skills range from passive to active. To see more details about skills and where you can learn them, scroll down. </p>';
    echo '</div>';
    echo'<div class="gbox">';

    echo'<h2>Training</h2>';
    echo'<p class="gray">Physical and Mental Training should be your top priority.</p>';
    // ---------------------------------------------------------------------------------- Physical Training
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($physicaltraining_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($physicaltraining_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$physicaltraining_cost) { // not enough sp to upgrade skill
        $button='disable';
    }

    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/strong.svg").'</span>
          <h4 class="inline '.$maxcolor.'">Physical Training</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['physicaltraining'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$physicaltraining_max.'</span>
          <div class="gray">Increases the amount of HP you gain when you level</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$physicaltraining_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn physical training">+1 Physical Training</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max physical training">MAX Physical Training</button>
          ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Mental Training
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($mentaltraining_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($mentaltraining_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$mentaltraining_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/smart.svg").'</span>
          <h4 class="inline '.$maxcolor.'">Mental Training</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['mentaltraining'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$mentaltraining_max.'</span>
          <div class="gray">Increases the amount of MP you gain when you level</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$mentaltraining_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn mental training">+1 Mental Training</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max mental training">MAX Mental Training</button>
          ';
    echo '</div>';

    echo'</div><div class="gbox">';

    echo'<h2>Offense</h2>';
    echo '<p class="gray">Do more damage by specializing in a specific wepaon type.</p>';

    // ---------------------------------------------------------------------------------- One Handed
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($onehanded_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($onehanded_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$onehanded_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/sword1.svg").'</span>
          <h4 class="inline '.$maxcolor.'">One Handed</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['onehanded'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$onehanded_max.'</span>
          <div class="gray">Do more damage with one handed weapons</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$onehanded_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn one handed">+1 One Handed</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max one handed">MAX One Handed</button>
          ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Two Handed
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($twohanded_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($twohanded_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$twohanded_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/axe1.svg").'</span>
          <h4 class="inline '.$maxcolor.'">Two Handed</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['twohanded'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$twohanded_max.'</span>
          <div class="gray">Do more damage with two handed weapons</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$twohanded_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn two handed">+1 Two Handed</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max two handed">MAX Two Handed</button>
          ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Ranged
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($ranged_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($ranged_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$ranged_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/bowarrow.svg").'</span>
          <h4 class="inline '.$maxcolor.'">Ranged</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['ranged'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$ranged_max.'</span>
          <div class="gray">Do more damage with ranged weapons</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$ranged_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn ranged">+1 Ranged</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max ranged">MAX Ranged</button>
          ';
    echo '</div>';

    echo'</div><div class="gbox">';
    echo'<h2>Special Attacks</h2>';
    echo '<p class="gray">Special Attacks cost a little MP to cause even more damage.</p>';
    // ---------------------------------------------------------------------------------- Slice
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($slice_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($slice_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$slice_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/slice.svg").'</span>
          <h4 class="inline '.$maxcolor.'">Slice</h4>
          <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['slice'].'</span></h3>
          <span class="lgray '.$stat.'">/'.$slice_max.'</span>
          <div class="gray">Slicing causes extra damage with one handed weapons</div>
          <div class="purple '.$cost.'"> Cost for next level: '.$slice_cost.' SP</div>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn slice">+1 Slice</button>
          <button type="submit" class="purpleBG '.$button.'" name="input1" value="max slice">MAX Slice</button>
          ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Smash
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($smash_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($smash_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$smash_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/smash.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Smash</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['smash'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$smash_max.'</span>
              <div class="gray">Smashing causes extra damage with two handed weapons</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$smash_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn smash">+1 Smash</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max smash">MAX Smash</button>
              ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Aim
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($aim_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($aim_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$aim_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/aim.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Aim</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['aim'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$aim_max.'</span>
                  <div class="gray">Aiming causes extra damage with ranged weapons</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$aim_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn aim">+1 Aim</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max aim">MAX Aim</button>
                  ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Magic Strike
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($magicstrike_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($magicstrike_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$magicstrike_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/magicstrike.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Magic Strike</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['magicstrike'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$magicstrike_max.'</span>
                  <div class="gray">Adds magical damage to your weapon attack</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$magicstrike_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn magic strike">+1 Magic Strike</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max magic strike">MAX Magic Strike</button>
                  ';
    echo '</div>';

    echo'</div><div class="gbox">';
    echo '<h2>Defense</h2>';
    echo '<p class="gray">Skills that increase your defense and survivability</p>';
    // ---------------------------------------------------------------------------------- Toughness
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($toughness_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($toughness_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$toughness_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/toughness.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Toughness</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['toughness'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$toughness_max.'</span>
                  <div class="gray">Toughness increases defense</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$toughness_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn toughness">+1 Toughness</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max toughness">MAX Toughness</button>
                  ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Block
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($block_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($block_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$block_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/block.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Block</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['block'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$block_max.'</span>
                  <div class="gray">Increase defense even more with a shield equipped</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$block_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn block">+1 Block</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max block">MAX Block</button>
                  ';
    echo '</div>';

    // ---------------------------------------------------------------------------------- Dodge
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($ddge_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($ddge_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$ddge_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/dodge.svg").'</span>
                  <h4 class="inline '.$maxcolor.'">Dodge</h4>
                  <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['ddge'].'</span></h3>
                  <span class="lgray '.$stat.'">/'.$ddge_max.'</span>
                  <div class="gray">Increase your chances of dodging an attack</div>
                  <div class="purple '.$cost.'"> Cost for next level: '.$ddge_cost.' SP</div>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn dodge">+1 Dodge</button>
                  <button type="submit" class="purpleBG '.$button.'" name="input1" value="max dodge">MAX Dodge</button>
                  ';
    echo '</div>';


    echo'</div><div class="gbox">';
    echo '<h2>Upgrades</h2>';
    echo '<p class="gray">Specialize even further and do more damage.</p>';
    // ---------------------------------------------------------------------------------- Multi Arrow
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($multiarrow_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($multiarrow_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$multiarrow_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/multiarrow.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Multi Arrow</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['multiarrow'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$multiarrow_max.'</span>
              <div class="gray">Do more damage with bows</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$multiarrow_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn multi arrow">+1 Multi Arrow</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max multi arrow">MAX Multi Arrow</button>
              ';
    echo '</div>';
    // ---------------------------------------------------------------------------------- Bolt Upgrade
    $stat=$button=$zeroskill=$cost=$maxcolor='';
    $color="purple";
    if ($boltupgrade_cost == 'max') { // at max skill level
        $button=$cost='hide';
        $color=$maxcolor='green';
    } elseif ($boltupgrade_max==0) { // skill not available yet
        $stat =$button = $cost='hide';
        $zeroskill = 'disable';
    } elseif ($sp<$boltupgrade_cost) { // not enough sp to upgrade skill
        $button='disable';
    }
    echo '<div class="gslice '.$zeroskill.'">';
    echo '<span class="icon ddgray">'.file_get_contents("img/svg/boltupgrade.svg").'</span>
              <h4 class="inline '.$maxcolor.'">Bolt Upgrade</h4>
              <h3 class="inline '.$stat.'"><span class="'.$color.'">'.$row['boltupgrade'].'</span></h3>
              <span class="lgray '.$stat.'">/'.$boltupgrade_max.'</span>
              <div class="gray">Do more damage with crossbows</div>
              <div class="purple '.$cost.'"> Cost for next level: '.$boltupgrade_cost.' SP</div>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="learn bolt upgrade">+1 Bolt Upgrade</button>
              <button type="submit" class="purpleBG '.$button.'" name="input1" value="max bolt upgrade">MAX Bolt Upgrade</button>
              ';
    echo '</div>';


    echo '</div>';




    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    echo '
    <br><br><br><br><br><br><br>
    <div class="gbox">

<h2>SKILL DESCRIPTIONS</h2>	';

    echo '<h2>TRAINING</h2>';
    echo '
<div class="descrip">
<h6 class="red">Physical Training [PASSIVE]</h6>
<p>PT increases the amount of HP you gain when you level, as well as when you rest.</p>
<p><i class="purple">10</i> Pajama Shaman</p>
<p><i class="purple">20</i> Warrior\'s Guild</p>
<p><i class="purple">25</i> Ranger\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Barbarian\'s Guild / Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="blue">Mental Training [PASSIVE]</h6>
<p>MT increases the amount of MP you gain when you level, as well as when you rest.</p>
<p><i class="purple">10</i> Pajama Shaman</p>
<p><i class="purple">20</i> Wizard\'s Guild</p>
<p><i class="purple">25</i> Ranger\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Warlock\'s Guild</p>
</div>
';



    echo '<h2>OFFENSE</h2>	';


    echo'
<div class="descrip">
<h6 class="red">One Handed [PASSIVE]</h6>
<p>Increases damage done with all one handed weapons. Each point in the skill is another point higher for STR.</p>
<p><i class="purple">5</i> Young Soldier</p>
<p><i class="purple">10</i> Traveling Warrior</p>
<p><i class="purple">20</i> Warrior\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="red">Two Handed [PASSIVE]</h6>
<p>Increases damage done with all two handed weapons. Each point in the skill is another point higher for STR.</p>
<p><i class="purple">5</i> Young Soldier</p>
<p><i class="purple">10</i> Traveling Warrior</p>
<p><i class="purple">20</i> Warrior\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Barbarian\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="green">Ranged [PASSIVE]</h6>
<p>Increases damage done with all ranged weapons. Each point in the skill is another point higher for DEX.</p>
<p><i class="purple">5</i> Jack Lumber</p>
<p><i class="purple">15</i> Hunter Bill</p>
<p><i class="purple">30</i> Ranger\'s Guild</p>
<p><i class="purple">50</i> Druid\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="black">Warcraft [PASSIVE]</h6>
<p>Increases damage done with all 1h, 2h or ranged weapons. Each point in the skill is another point higher for STR or DEX.</p>
<p><i class="purple">10</i> Master Trainer</p>
<p><i class="purple">30</i> Barbarian\'s Guild</p>
</div>
';



    echo '<h2>ATTACKS</h2>';

    echo '
<div class="descrip">
<h6 class="red">Slice [ATTACK]</h6>
<p>Adds extra damage to your ONE HANDED attacks. </p>
<p class="purple">Adds ( 1 - skill lvl ) extra damage to your 1h attack damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="purple">5</i> Traveling Warrior</p>
<p><i class="purple">10</i> Warrior\'s Guild</p>
<p><i class="purple">20</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="red">Smash [ATTACK]</h6>
<p>Adds extra damage to your TWO HANDED attacks. </p>
<p class="purple">Adds ( 1 - skill lvl ) extra damage to your 2h attack damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="purple">5</i> Traveling Warrior</p>
<p><i class="purple">10</i> Warrior\'s Guild</p>
<p><i class="purple">20</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="green">Aim [ATTACK]</h6>
<p>Adds extra damage to your RANGED attacks. </p>
<p class="purple">Adds ( 1 - skill lvl ) extra damage to your ranged damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="purple">5</i> Hunter Bill</p>
<p><i class="purple">10</i> Ranger\'s Guild</p>
<p><i class="purple">20</i> Assassin\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="blue">Magic Strike [ATTACK]</h6>
<p>Adds some magic damage to your normal STR attacks. </p>
<p class="purple">Adds ( lvl x 5% MAG )	damage.	 <span class="lightgray">[ COST: 2 x skill lvl mp ]</span></p>
<p><i class="purple">10</i> Warrior\'s Guild</p>
<p><i class="purple">20</i> Knight\'s Guild</p>
</div>
';




    echo '<h2>DEFENSE</h2>';
    echo '
<div class="descrip">
<h6 class="purple">Toughness [PASSIVE]</h6>
<p>Increases Defense. Each point in the skill is another point added to DEF.</p>
<p><i class="purple">5</i> Young Soldier</p>
<p><i class="purple">10</i> Traveling Warrior</p>
<p><i class="purple">20</i> Warrior\'s Guild</p>
<p><i class="purple">30</i> Star City</p>
<p><i class="purple">50</i> Barbarian\'s Guild / Knight\'s Guild</p>
</div>
';

    echo '
<div class="descrip">
<h6 class="purple">Block [PASSIVE]</h6>
<p>Increases Defense with shields. When a shield is equipped each point in the skill is another 2 points added to DEF.</p>
<p><i class="purple">10</i> Warrior\'s Guild</p>
<p><i class="purple">30</i> Knight\'s Guild</p>
</div>
';

    echo '
<div class="descrip">
<h6 class="purple">Dodge [PASSIVE]</h6>
<p>Skill LVL % chance to dodge enemie\'s attack</p>
<p><i class="purple">5</i> Hunter Bill</p>
<p><i class="purple">10</i> Ranger\'s Guild</p>
<p><i class="purple">15</i> Assassin\'s Guild</p>
</div>';

    echo '<h2>UPGRADES</h2>';

    echo '</div>';
    //echo'</form></article>';
}
