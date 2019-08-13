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
    if ($onehanded_cost > $onehanded_max) {
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
    if ($twohanded_cost > $twohanded_max) {
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
    if ($ranged_cost > $ranged_max) {
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
    if ($toughness_cost > $toughness_max) {
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
    if ($block_cost > $block_max) {
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
    if ($ddge_cost > $ddge_max) {
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
    if ($slice_cost > $slice_max) {
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
    if ($smash_cost > $smash_max) {
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
    if ($aim_cost > $aim_max) {
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
    if ($magicstrike_cost > $magicstrike_max) {
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
    if ($multiarrow_cost > $multiarrow_max) {
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
    if ($boltupgrade_cost > $boltupgrade_max) {
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
    if ($physicaltraining_cost > $physicaltraining_max) {
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
    if ($mentaltraining_cost > $mentaltraining_max) {
        $mentaltraining_cost = 'max';
    }
    // ---------------------------------------------------------------------------------- // END VARIABLES
    // ---------------------------------------------------------------------------------- // END VARIABLES
    // ---------------------------------------------------------------------------------- // END VARIABLES






    // ---------------------------------------------------------------------------------- // START SKILL MENU
    //echo '<article data-pop="skills" id="skills">';

    //<form id="mainForm" method="post" action="" name="formInput">
    echo'
			<h2>Skills<span class="spCount white">You have <span class="px50 gold">'.$sp.'</span> sp</span></h2>';


    echo '<h2>Training</h2>';

    // ---------------------------------------------------------------------------------- Physical Training
    if ($row['physicaltraining']>=1 && $physicaltraining_cost == 'max') {
        echo '<div class="hilite">
Physical Training <span class="green">'. $row['physicaltraining'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['physicaltraining']>=1 && $sp>=$physicaltraining_cost) {
        echo '<div class="hilite">
Physical Training <span>'. $row['physicaltraining'].'</span> <span class="px14 gray"> / '.$physicaltraining_max.'</span>
<input type="submit" class="" name="input1" value="learn physical training" />
<input type="submit" class="max" name="input1" value="max physical training" />
<span class="px12 gold"> '.$physicaltraining_cost.' sp</span>
</div>	';
    } elseif ($row['physicaltraining']>=1 && $sp<$physicaltraining_cost) {
        echo '<div class="hilite">
Physical Training <span>'. $row['physicaltraining'].'</span> <span class="px14 gray"> / '.$physicaltraining_max.'</span>
<span class="px12 darkestgray"> need '.$physicaltraining_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2">Physical Training </span></div>';
    }


    // ---------------------------------------------------------------------------------- Mental Training
    if ($row['mentaltraining']>=1 && $mentaltraining_cost == 'max') {
        echo '<div class="hilite">
Mental Training <span class="green">'. $row['mentaltraining'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['mentaltraining']>=1 && $sp>=$mentaltraining_cost) {
        echo '<div class="hilite">
Mental Training <span>'. $row['mentaltraining'].'</span> <span class="px14 gray"> / '.$mentaltraining_max.'</span>
<input type="submit" class="" name="input1" value="learn mental training" />
<input type="submit" class="max" name="input1" value="max mental training" />
<span class="px12 gold"> '.$mentaltraining_cost.' sp</span>
</div>	';
    } elseif ($row['mentaltraining']>=1 && $sp<$mentaltraining_cost) {
        echo '<div class="hilite">
Mental Training <span>'. $row['mentaltraining'].'</span> <span class="px14 gray"> / '.$mentaltraining_max.'</span>
<span class="px12 darkestgray"> need '.$mentaltraining_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2">Mental Training </span></div>';
    }

    echo '<h2>Offense</h2>';

    // ----------------------------------------------------------------------------------One Handed
    if ($row['onehanded']>=1 && $onehanded_cost == 'max') {
        echo '<div class="hilite">
One Handed <span class="green">'. $row['onehanded'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['onehanded']>=1 && $sp<$onehanded_cost) {
        echo '<div class="hilite">
One Handed <span>'. $row['onehanded'].'</span> <span class="px14 gray"> / '.$onehanded_max.'</span>
<span class="px12 darkestgray"> need '.$onehanded_cost.' sp</span>
</div>	';
    } elseif ($row['onehanded']==0 && $sp < 1 && $onehanded_cost != 'max') {
        echo '<div class="hilite">
One Handed <span class="gray px14"> '. $row['onehanded'].' </span><span class="px14 gray"> / '.$onehanded_max.'</span>
<span class="px12 darkestgray"> need '.$onehanded_cost.' sp</span>
</div>	';
    } elseif ($row['onehanded']==0 && $onehanded_cost != 'max') {
        echo '<div class="hilite">
One Handed <span class="gray px14"> '. $row['onehanded'].' </span><span class="px14 gray"> / '.$onehanded_max.'</span>
<input type="submit" class="" name="input1" value="learn one handed" />
<input type="submit" class="max" name="input1" value="max one handed" />
<span class="px12 gold"> '.$onehanded_cost.' sp</span>
</div>	';
    } elseif ($row['onehanded']>=0 && $sp>=$onehanded_cost) {
        echo '<div class="hilite">
One Handed <span>'. $row['onehanded'].'</span> <span class="px14 gray"> / '.$onehanded_max.'</span>
<input type="submit" class="" name="input1" value="learn one handed" />
<input type="submit" class="max" name="input1" value="max one handed" />
<span class="px12 gold"> '.$onehanded_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2">One Handed </span></div>';
    }
    // ----------------------------------------------------------------------------------Two Handed
    if ($row['twohanded']>=1 && $twohanded_cost == 'max') {
        echo '<div class="hilite">
Two Handed <span class="green">'. $row['twohanded'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['twohanded']>=1 && $sp<$twohanded_cost) {
        echo '<div class="hilite">
Two Handed <span>'. $row['twohanded'].'</span> <span class="px14 gray"> / '.$twohanded_max.'</span>
<span class="px12 darkestgray"> need '.$twohanded_cost.' sp</span>
</div>	';
    } elseif ($row['twohanded']==0 && $sp < 1 && $twohanded_cost != 'max') {
        echo '<div class="hilite">
Two Handed <span class="gray px14"> '. $row['twohanded'].' </span><span class="px14 gray"> / '.$twohanded_max.'</span>
<span class="px12 darkestgray"> need '.$twohanded_cost.' sp</span>
</div>	';
    } elseif ($row['twohanded']==0 && $twohanded_cost != 'max') {
        echo '<div class="hilite">
Two Handed <span class="gray px14"> '. $row['twohanded'].' </span><span class="px14 gray"> / '.$twohanded_max.'</span>
<input type="submit" class="" name="input1" value="learn two handed" />
<input type="submit" class="max" name="input1" value="max two handed" />
<span class="px12 gold"> '.$twohanded_cost.' sp</span>
</div>	';
    } elseif ($row['twohanded']>=0 && $sp>=$twohanded_cost) {
        echo '<div class="hilite">
Two Handed <span>'. $row['twohanded'].'</span> <span class="px14 gray"> / '.$twohanded_max.'</span>
<input type="submit" class="" name="input1" value="learn two handed" />
<input type="submit" class="max" name="input1" value="max two handed" />
<span class="px12 gold"> '.$twohanded_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2">Two Handed </span></div>';
    }

    // ---------------------------------------------------------------------------------- Ranged
    if ($row['ranged']>=1 && $ranged_cost == 'max') {
        echo '<div class="hilite">
 Ranged <span class="green">'. $row['ranged'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['ranged']>=1 && $sp<$ranged_cost) {
        echo '<div class="hilite">
 Ranged <span>'. $row['ranged'].'</span> <span class="px14 gray"> / '.$ranged_max.'</span>
<span class="px12 darkestgray"> need '.$ranged_cost.' sp</span>
</div>	';
    } elseif ($row['ranged']==0 && $sp < 1 && $ranged_cost != 'max') {
        echo '<div class="hilite">
Ranged <span class="gray px14"> '. $row['ranged'].' </span><span class="px14 gray"> / '.$ranged_max.'</span>
<span class="px12 darkestgray"> need '.$ranged_cost.' sp</span>
</div>	';
    } elseif ($row['ranged']==0 && $ranged_cost != 'max') {
        echo '<div class="hilite">
Ranged <span class="gray px14"> '. $row['ranged'].' </span><span class="px14 gray"> / '.$ranged_max.'</span>
<input type="submit" class="" name="input1" value="learn ranged" />
<input type="submit" class="max" name="input1" value="max ranged" />
<span class="px12 gold"> '.$ranged_cost.' sp</span>
</div>	';
    } elseif ($row['ranged']>=0 && $sp>=$ranged_cost) {
        echo '<div class="hilite">
 Ranged <span>'. $row['ranged'].'</span> <span class="px14 gray"> / '.$ranged_max.'</span>
<input type="submit" class="" name="input1" value="learn ranged" />
<input type="submit" class="max" name="input1" value="max ranged" />
<span class="px12 gold"> '.$ranged_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2"> Ranged </span></div>';
    }




    echo '<h2>Attacks</h2>';


    // ---------------------------------------------------------------------------------- Slice
    if ($row['slice']>=1 && $slice_cost == 'max') {
        echo '<div class="hilite">
 Slice <span class="green">'. $row['slice'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['slice']>=1 && $sp<$slice_cost) {
        echo '<div class="hilite">
 Slice <span>'. $row['slice'].'</span> <span class="px14 gray"> / '.$slice_max.'</span>
<span class="px12 darkestgray"> need '.$slice_cost.' sp</span>
</div>	';
    } elseif ($row['slice']==0 && $sp < 1 && $slice_cost != 'max') {
        echo '<div class="hilite">
Slice <span class="gray px14"> '. $row['slice'].' </span><span class="px14 gray"> / '.$slice_max.'</span>
<span class="px12 darkestgray"> need '.$slice_cost.' sp</span>
</div>	';
    } elseif ($row['slice']==0 && $slice_cost != 'max') {
        echo '<div class="hilite">
Slice <span class="gray px14"> '. $row['slice'].' </span><span class="px14 gray"> / '.$slice_max.'</span>
<input type="submit" class="" name="input1" value="learn slice" />
<input type="submit" class="max" name="input1" value="max slice" />
<span class="px12 gold"> '.$slice_cost.' sp</span>
</div>	';
    } elseif ($row['slice']>=0 && $sp>=$slice_cost) {
        echo '<div class="hilite">
 Slice <span>'. $row['slice'].'</span> <span class="px14 gray"> / '.$slice_max.'</span>
<input type="submit" class="" name="input1" value="learn slice" />
<input type="submit" class="max" name="input1" value="max slice" />
<span class="px12 gold"> '.$slice_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2"> Slice </span></div>';
    }

    // ---------------------------------------------------------------------------------- Smash
    if ($row['smash']>=1 && $smash_cost == 'max') {
        echo '<div class="hilite">
 Smash <span class="green">'. $row['smash'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['smash']>=1 && $sp<$smash_cost) {
        echo '<div class="hilite">
 Smash <span>'. $row['smash'].'</span> <span class="px14 gray"> / '.$smash_max.'</span>
<span class="px12 darkestgray"> need '.$smash_cost.' sp</span>
</div>	';
    } elseif ($row['smash']==0 && $sp < 1 && $smash_cost != 'max') {
        echo '<div class="hilite">
Smash <span class="gray px14"> '. $row['smash'].' </span><span class="px14 gray"> / '.$smash_max.'</span>
<span class="px12 darkestgray"> need '.$smash_cost.' sp</span>
</div>	';
    } elseif ($row['smash']==0 && $smash_cost != 'max') {
        echo '<div class="hilite">
Smash <span class="gray px14"> '. $row['smash'].' </span><span class="px14 gray"> / '.$smash_max.'</span>
<input type="submit" class="" name="input1" value="learn smash" />
<input type="submit" class="max" name="input1" value="max smash" />
<span class="px12 gold"> '.$smash_cost.' sp</span>
</div>	';
    } elseif ($row['smash']>=0 && $sp>=$smash_cost) {
        echo '<div class="hilite">
 Smash <span>'. $row['smash'].'</span> <span class="px14 gray"> / '.$smash_max.'</span>
<input type="submit" class="" name="input1" value="learn smash" />
<input type="submit" class="max" name="input1" value="max smash" />
<span class="px12 gold"> '.$smash_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2"> Smash </span></div>';
    }

    // ---------------------------------------------------------------------------------- Aim
    if ($row['aim']>=1 && $aim_cost == 'max') {
        echo '<div class="hilite">
 Aim <span class="green">'. $row['aim'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['aim']>=1 && $sp<$aim_cost) {
        echo '<div class="hilite">
 Aim <span>'. $row['aim'].'</span> <span class="px14 gray"> / '.$aim_max.'</span>
<span class="px12 darkestgray"> need '.$aim_cost.' sp</span>
</div>	';
    } elseif ($row['aim']==0 && $sp < 1 && $aim_cost != 'max') {
        echo '<div class="hilite">
Aim <span class="gray px14"> '. $row['aim'].' </span><span class="px14 gray"> / '.$aim_max.'</span>
<span class="px12 darkestgray"> need '.$aim_cost.' sp</span>
</div>	';
    } elseif ($row['aim']==0 && $aim_cost != 'max') {
        echo '<div class="hilite">
Aim <span class="gray px14"> '. $row['aim'].' </span><span class="px14 gray"> / '.$aim_max.'</span>
<input type="submit" class="" name="input1" value="learn aim" />
<input type="submit" class="max" name="input1" value="max aim" />
<span class="px12 gold"> '.$aim_cost.' sp</span>
</div>	';
    } elseif ($row['aim']>=0 && $sp>=$aim_cost) {
        echo '<div class="hilite">
 Aim <span>'. $row['aim'].'</span> <span class="px14 gray"> / '.$aim_max.'</span>
<input type="submit" class="" name="input1" value="learn aim" />
<input type="submit" class="max" name="input1" value="max aim" />
<span class="px12 gold"> '.$aim_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2"> Aim </span></div>';
    }





    // ---------------------------------------------------------------------------------- Magic Strike
    if ($row['magicstrike']>=1 && $magicstrike_cost == 'max') {
        echo '<div class="hilite">
 Magic Strike <span class="green">'. $row['magicstrike'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['magicstrike']>=1 && $sp<$magicstrike_cost) {
        echo '<div class="hilite">
 Magic Strike <span>'. $row['magicstrike'].'</span> <span class="px14 gray"> / '.$magicstrike_max.'</span>
<span class="px12 darkestgray"> need '.$magicstrike_cost.' sp</span>
</div>	';
    } elseif ($row['magicstrike']==0 && $sp < 1 && $magicstrike_cost != 'max') {
        echo '<div class="hilite">
Magic Strike <span class="gray px14"> '. $row['magicstrike'].' </span><span class="px14 gray"> / '.$magicstrike_max.'</span>
<span class="px12 darkestgray"> need '.$magicstrike_cost.' sp</span>
</div>	';
    } elseif ($row['magicstrike']==0 && $magicstrike_cost != 'max') {
        echo '<div class="hilite">
Magic Strike <span class="gray px14"> '. $row['magicstrike'].' </span><span class="px14 gray"> / '.$magicstrike_max.'</span>
<input type="submit" class="" name="input1" value="learn magic strike" />
<input type="submit" class="max" name="input1" value="max magic strike" />
<span class="px12 gold"> '.$magicstrike_cost.' sp</span>
</div>	';
    } elseif ($row['magicstrike']>=0 && $sp>=$magicstrike_cost) {
        echo '<div class="hilite">
 Magic Strike <span>'. $row['magicstrike'].'</span> <span class="px14 gray"> / '.$magicstrike_max.'</span>
<input type="submit" class="" name="input1" value="learn magic strike" />
<input type="submit" class="max" name="input1" value="max magic strike" />
<span class="px12 gold"> '.$magicstrike_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2"> Magic Strike </span></div>';
    }


    echo '	<h2>Defense</h2>';
    // ---------------------------------------------------------------------------------- Toughness
    if ($row['toughness']>=1 && $toughness_cost == 'max') {
        echo '<div class="hilite">
 Toughness <span class="green">'. $row['toughness'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['toughness']>=1 && $sp<$toughness_cost) {
        echo '<div class="hilite">
 Toughness <span>'. $row['toughness'].'</span> <span class="px14 gray"> / '.$toughness_max.'</span>
<span class="px12 darkestgray"> need '.$toughness_cost.' sp</span>
</div>	';
    } elseif ($row['toughness']==0 && $sp < 1 && $toughness_cost != 'max') {
        echo '<div class="hilite">
Toughness <span class="gray px14"> '. $row['toughness'].' </span><span class="px14 gray"> / '.$toughness_max.'</span>
<span class="px12 darkestgray"> need '.$toughness_cost.' sp</span>
</div>	';
    } elseif ($row['toughness']==0 && $toughness_cost != 'max') {
        echo '<div class="hilite">
Toughness <span class="gray px14"> '. $row['toughness'].' </span><span class="px14 gray"> / '.$toughness_max.'</span>
<input type="submit" class="" name="input1" value="learn toughness" />
<input type="submit" class="max" name="input1" value="max toughness" />
<span class="px12 gold"> '.$toughness_cost.' sp</span>
</div>	';
    } elseif ($row['toughness']>=0 && $sp>=$toughness_cost) {
        echo '<div class="hilite">
 Toughness <span>'. $row['toughness'].'</span> <span class="px14 gray"> / '.$toughness_max.'</span>
<input type="submit" class="" name="input1" value="learn toughness" />
<input type="submit" class="max" name="input1" value="max toughness" />
<span class="px12 gold"> '.$toughness_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2"> Toughness </span></div>';
    }


    // ---------------------------------------------------------------------------------- Block
    if ($row['block']>=1 && $block_cost == 'max') {
        echo '<div class="hilite">
 Block <span class="green">'. $row['block'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['block']>=1 && $sp<$block_cost) {
        echo '<div class="hilite">
 Block <span>'. $row['block'].'</span> <span class="px14 gray"> / '.$block_max.'</span>
<span class="px12 darkestgray"> need '.$block_cost.' sp</span>
</div>	';
    } elseif ($row['block']==0 && $sp < 1 && $block_cost != 'max') {
        echo '<div class="hilite">
Block <span class="gray px14"> '. $row['block'].' </span><span class="px14 gray"> / '.$block_max.'</span>
<span class="px12 darkestgray"> need '.$block_cost.' sp</span>
</div>	';
    } elseif ($row['block']==0 && $block_cost != 'max') {
        echo '<div class="hilite">
Block <span class="gray px14"> '. $row['block'].' </span><span class="px14 gray"> / '.$block_max.'</span>
<input type="submit" class="" name="input1" value="learn block" />
<input type="submit" class="max" name="input1" value="max block" />
<span class="px12 gold"> '.$block_cost.' sp</span>
</div>	';
    } elseif ($row['block']>=0 && $sp>=$block_cost) {
        echo '<div class="hilite">
 Block <span>'. $row['block'].'</span> <span class="px14 gray"> / '.$block_max.'</span>
<input type="submit" class="" name="input1" value="learn block" />
<input type="submit" class="max" name="input1" value="max block" />
<span class="px12 gold"> '.$block_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2"> Block </span></div>';
    }

    // ---------------------------------------------------------------------------------- Dodge
    if ($row['ddge']>=1 && $ddge_cost == 'max') {
        echo '<div class="hilite">
 Dodge <span class="green">'. $row['ddge'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['ddge']>=1 && $sp<$ddge_cost) {
        echo '<div class="hilite">
 Dodge <span>'. $row['ddge'].'</span> <span class="px14 gray"> / 10</span>
<span class="px12 darkestgray"> need '.$ddge_cost.' sp</span>
</div>	';
    } elseif ($row['ddge']==0 && $sp < 1 && $ddge_cost != 'max') {
        echo '<div class="hilite">
Dodge <span class="gray px14"> '. $row['ddge'].' </span><span class="px14 gray"> / '.$ddge_max.'</span>
<span class="px12 darkestgray"> need '.$ddge_cost.' sp</span>
</div>	';
    } elseif ($row['ddge']==0 && $ddge_cost != 'max') {
        echo '<div class="hilite">
Dodge <span class="gray px14"> '. $row['ddge'].' </span><span class="px14 gray"> / '.$ddge_max.'</span>
<input type="submit" class="" name="input1" value="learn dodge" />
<input type="submit" class="max" name="input1" value="max dodge" />
<span class="px12 gold"> '.$ddge_cost.' sp</span>
</div>	';
    } elseif ($row['ddge']>=0 && $sp>=$ddge_cost) {
        echo '<div class="hilite">
 Dodge <span>'. $row['ddge'].'</span> <span class="px14 gray"> / '.$ddge_max.'</span>
<input type="submit" class="" name="input1" value="learn dodge" />
<input type="submit" class="max" name="input1" value="max dodge" />
<span class="px12 gold"> '.$ddge_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2"> Dodge </span></div>';
    }


    echo '<h2>Upgrades</h2>';


    // ----------------------------------------------------------------------------------Multi Arrow
    if ($row['multiarrow']>=1 && $multiarrow_cost == 'max') {
        echo '<div class="hilite">
Multi Arrow <span class="green">'. $row['multiarrow'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['multiarrow']>=1 && $sp<$multiarrow_cost) {
        echo '<div class="hilite">
Multi Arrow <span>'. $row['multiarrow'].'</span> <span class="px14 gray"> / '.$multiarrow_max.'</span>
<span class="px12 darkestgray"> need '.$multiarrow_cost.' sp</span>
</div>	';
    } elseif ($row['multiarrow']==0 && $sp < 1 && $multiarrow_cost != 'max') {
        echo '<div class="hilite">
Multi Arrow <span class="gray px14"> '. $row['multiarrow'].' </span><span class="px14 gray"> / '.$multiarrow_max.'</span>
<span class="px12 darkestgray"> need '.$multiarrow_cost.' sp</span>
</div>	';
    } elseif ($row['multiarrow']==0 && $multiarrow_cost != 'max') {
        echo '<div class="hilite">
Multi Arrow <span class="gray px14"> '. $row['multiarrow'].' </span><span class="px14 gray"> / '.$multiarrow_max.'</span>
<input type="submit" class="" name="input1" value="learn multi arrow" />
<input type="submit" class="max" name="input1" value="max multi arrow" />
<span class="px12 gold"> '.$multiarrow_cost.' sp</span>
</div>	';
    } elseif ($row['multiarrow']>=0 && $sp>=$multiarrow_cost) {
        echo '<div class="hilite">
Multi Arrow <span>'. $row['multiarrow'].'</span> <span class="px14 gray"> / '.$multiarrow_max.'</span>
<input type="submit" class="" name="input1" value="learn multi arrow" />
<input type="submit" class="max" name="input1" value="max multi arrow" />
<span class="px12 gold"> '.$multiarrow_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2">Multi Arrow </span></div>';
    }

    // ----------------------------------------------------------------------------------Bolt Upgrade
    if ($row['boltupgrade']>=1 && $boltupgrade_cost == 'max') {
        echo '<div class="hilite">
Bolt Upgrade <span class="green">'. $row['boltupgrade'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';
    } elseif ($row['boltupgrade']>=1 && $sp<$boltupgrade_cost) {
        echo '<div class="hilite">
Bolt Upgrade <span>'. $row['boltupgrade'].'</span> <span class="px14 gray"> / '.$boltupgrade_max.'</span>
<span class="px12 darkestgray"> need '.$boltupgrade_cost.' sp</span>
</div>	';
    } elseif ($row['boltupgrade']==0 && $sp < 1 && $boltupgrade_cost != 'max') {
        echo '<div class="hilite">
Bolt Upgrade <span class="gray px14"> '. $row['boltupgrade'].' </span><span class="px14 gray"> / '.$boltupgrade_max.'</span>
<span class="px12 darkestgray"> need '.$boltupgrade_cost.' sp</span>
</div>	';
    } elseif ($row['boltupgrade']==0 && $boltupgrade_cost != 'max') {
        echo '<div class="hilite">
Bolt Upgrade <span class="gray px14"> '. $row['boltupgrade'].' </span><span class="px14 gray"> / '.$boltupgrade_max.'</span>
<input type="submit" class="" name="input1" value="learn bolt upgrade" />
<input type="submit" class="max" name="input1" value="max bolt upgrade" />
<span class="px12 gold"> '.$boltupgrade_cost.' sp</span>
</div>	';
    } elseif ($row['boltupgrade']>=0 && $sp>=$boltupgrade_cost) {
        echo '<div class="hilite">
Bolt Upgrade <span>'. $row['boltupgrade'].'</span> <span class="px14 gray"> / '.$boltupgrade_max.'</span>
<input type="submit" class="" name="input1" value="learn bolt upgrade" />
<input type="submit" class="max" name="input1" value="max bolt upgrade" />
<span class="px12 gold"> '.$boltupgrade_cost.' sp</span>
</div>	';
    } else {
        echo '<div><span class="alt2">Bolt Upgrade </span></div>';
    }




    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    // ---------------------------------------------------------------------------------- SKILL DESCRIPTIONS
    echo '	<br><br><br><br><br><br><br>
<h2 class="px30 darkestgray">SKILL DESCRIPTIONS</h2>	';

    echo '<h2 class="px50 darkestgray">TRAINING</h2>';
    echo '
<div class="descrip">
<h6 class="red">Physical Training [PASSIVE]</h6>
<p class="px16">PT increases the amount of HP you gain when you level, as well as when you rest.</p>
<p><i class="gold">10</i> Pajama Shaman</p>
<p><i class="gold">20</i> Warrior\'s Guild</p>
<p><i class="gold">25</i> Ranger\'s Guild</p>
<p><i class="gold">30</i> Star City</p>
<p><i class="gold">50</i> Barbarian\'s Guild / Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="blue">Mental Training [PASSIVE]</h6>
<p class="px16">MT increases the amount of MP you gain when you level, as well as when you rest.</p>
<p><i class="gold">10</i> Pajama Shaman</p>
<p><i class="gold">20</i> Wizard\'s Guild</p>
<p><i class="gold">25</i> Ranger\'s Guild</p>
<p><i class="gold">30</i> Star City</p>
<p><i class="gold">50</i> Warlock\'s Guild</p>
</div>
';



    echo '<h2 class="px50 darkestgray">OFFENSE</h2>	';


    echo'
<div class="descrip">
<h6 class="red">One Handed [PASSIVE]</h6>
<p class="px16">Increases damage done with all one handed weapons. Each point in the skill is another point higher for STR.</p>
<p><i class="gold">5</i> Young Soldier</p>
<p><i class="gold">10</i> Traveling Warrior</p>
<p><i class="gold">20</i> Warrior\'s Guild</p>
<p><i class="gold">30</i> Star City</p>
<p><i class="gold">50</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="red">Two Handed [PASSIVE]</h6>
<p class="px16">Increases damage done with all two handed weapons. Each point in the skill is another point higher for STR.</p>
<p><i class="gold">5</i> Young Soldier</p>
<p><i class="gold">10</i> Traveling Warrior</p>
<p><i class="gold">20</i> Warrior\'s Guild</p>
<p><i class="gold">30</i> Star City</p>
<p><i class="gold">50</i> Barbarian\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="green">Ranged [PASSIVE]</h6>
<p class="px16">Increases damage done with all ranged weapons. Each point in the skill is another point higher for DEX.</p>
<p><i class="gold">5</i> Jack Lumber</p>
<p><i class="gold">15</i> Hunter Bill</p>
<p><i class="gold">30</i> Ranger\'s Guild</p>
<p><i class="gold">50</i> Druid\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="black">Warcraft [PASSIVE]</h6>
<p class="px16">Increases damage done with all 1h, 2h or ranged weapons. Each point in the skill is another point higher for STR or DEX.</p>
<p><i class="gold">10</i> Master Trainer</p>
<p><i class="gold">30</i> Barbarian\'s Guild</p>
</div>
';



    echo '<h2 class="px50 darkestgray">ATTACKS</h2>';

    echo '
<div class="descrip">
<h6 class="red">Slice [ATTACK]</h6>
<p class="px16">Adds extra damage to your ONE HANDED attacks. </p>
<p class="px16 gold">Adds ( 1 - skill lvl ) extra damage to your 1h attack damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="gold">5</i> Traveling Warrior</p>
<p><i class="gold">10</i> Warrior\'s Guild</p>
<p><i class="gold">20</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="red">Smash [ATTACK]</h6>
<p class="px16">Adds extra damage to your TWO HANDED attacks. </p>
<p class="px16 gold">Adds ( 1 - skill lvl ) extra damage to your 2h attack damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="gold">5</i> Traveling Warrior</p>
<p><i class="gold">10</i> Warrior\'s Guild</p>
<p><i class="gold">20</i> Knight\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="green">Aim [ATTACK]</h6>
<p class="px16">Adds extra damage to your RANGED attacks. </p>
<p class="px16 gold">Adds ( 1 - skill lvl ) extra damage to your ranged damage. <span class="lightgray">[ COST: skill lvl mp ]</span></p>
<p><i class="gold">5</i> Hunter Bill</p>
<p><i class="gold">10</i> Ranger\'s Guild</p>
<p><i class="gold">20</i> Assassin\'s Guild</p>
</div>
';
    echo '
<div class="descrip">
<h6 class="blue">Magic Strike [ATTACK]</h6>
<p class="px16">Adds some magic damage to your normal STR attacks. </p>
<p class="px16 gold">Adds ( lvl x 5% MAG )	damage.	 <span class="lightgray">[ COST: 2 x skill lvl mp ]</span></p>
<p><i class="gold">10</i> Warrior\'s Guild</p>
<p><i class="gold">20</i> Knight\'s Guild</p>
</div>
';




    echo '<h2 class="px50 darkestgray">DEFENSE</h2>';
    echo '
<div class="descrip">
<h6 class="gold">Toughness [PASSIVE]</h6>
<p class="px16">Increases Defense. Each point in the skill is another point added to DEF.</p>
<p><i class="gold">5</i> Young Soldier</p>
<p><i class="gold">10</i> Traveling Warrior</p>
<p><i class="gold">20</i> Warrior\'s Guild</p>
<p><i class="gold">30</i> Star City</p>
<p><i class="gold">50</i> Barbarian\'s Guild / Knight\'s Guild</p>
</div>
';

    echo '
<div class="descrip">
<h6 class="gold">Block [PASSIVE]</h6>
<p class="px16">Increases Defense with shields. When a shield is equipped each point in the skill is another 2 points added to DEF.</p>
<p><i class="gold">10</i> Warrior\'s Guild</p>
<p><i class="gold">30</i> Knight\'s Guild</p>
</div>
';

    echo '
<div class="descrip">
<h6 class="gold">Dodge [PASSIVE]</h6>
<p class="px16">Skill LVL % chance to dodge enemie\'s attack</p>
<p><i class="gold">5</i> Hunter Bill</p>
<p><i class="gold">10</i> Ranger\'s Guild</p>
<p><i class="gold">15</i> Assassin\'s Guild</p>
</div>
';

    echo '<h2 class="px50 darkestgray">UPGRADES</h2>';

    echo '</span>';
    //echo'</form></article>';
}
