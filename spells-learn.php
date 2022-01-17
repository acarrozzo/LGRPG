<?php
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {


// ------ COPIED VARIABLES AND MATH FROM SKILLS.PHP / SPELLS.PHP!!!

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
    if ($fireball_cost > $fireball_max) {
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
    if ($frostball_cost > $frostball_max) {
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
    if ($poisondart_cost > $poisondart_max) {
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
    if (($atomicblast_cost-10) > $atomicblast_max) {
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
    if ($heal_cost > $heal_max) {
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
    if ($regenerate_cost > $regenerate_max) {
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
    if ($antidote_cost > $antidote_max) {
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
    if ($magicarmor_cost > $magicarmor_max) {
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
    if ($ironskin_cost > $ironskin_max) {
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
    if ($wings_cost > $wings_max) {
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
    if ($gills_cost > $gills_max) {
        $gills_cost = 'max';
    }




    // ---------------------------------------------------------------------------------- // END VARIABLES
    // ---------------------------------------------------------------------------------- // END VARIABLES
    // ---------------------------------------------------------------------------------- // END VARIABLES




    // ------ END COPIED VARIABLES



    // -------------------------------------------------------------------------------Fireball - learn
    if ($input=='learn fireball') {
        if ($fireball_cost == 'max') {
            echo $message="You have MAXED out your Fireball spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$fireball_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $fireball_cost SP)
		<strong class='px40 red'>Fireball </strong>
		is now level
		<strong class='px60 red'>$fireball_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET fireball = fireball + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $fireball_cost");
        }
    }
    // -------------------------------------------------------------------------------Fireball - learn MAX
    if ($input=='max fireball') {
        if ($sp<$fireball_cost && $fireball_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($fireball_cost <= $fireball_max && $fireball_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $fireball_cost SP)
		<strong class='px40 red'>Fireball </strong>
		is now level
		<strong class='px60 red'>$fireball_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET fireball = fireball + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $fireball_cost");
                $fireball_new = $fireball_new + 1;
                $fireball_cost = $fireball_cost + 1;
                $sp = $sp - $fireball_cost;
            }
        }
        if ($fireball_max == $fireball_new-1) {
            echo $message="<strong class='learnBox px30 red'>FIREBALL MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$fireball_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Frostball - learn
    if ($input=='learn frostball') {
        if ($frostball_cost == 'max') {
            echo $message="You have MAXED out your Frostball spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$frostball_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $frostball_cost SP)
		<strong class='px40 blue'>Frostball </strong>
		is now level
		<strong class='px60 blue'>$frostball_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET frostball = frostball + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $frostball_cost");
        }
    }

    // -------------------------------------------------------------------------------Frostball - learn MAX
    if ($input=='max frostball') {
        if ($sp<$frostball_cost && $frostball_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($frostball_cost <= $frostball_max && $frostball_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $frostball_cost SP)
		<strong class='px40 blue'>Frostball </strong>
		is now level
		<strong class='px60 blue'>$frostball_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET frostball = frostball + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $frostball_cost");
                $frostball_new = $frostball_new + 1;
                $frostball_cost = $frostball_cost + 1;
                $sp = $sp - $frostball_cost;
            }
        }
        if ($frostball_max == $frostball_new-1) {
            echo $message="<strong class='learnBox px30 blue'>FROSTBALL MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$frostball_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Poison Dart - learn
    if ($input=='learn poison dart') {
        if ($poisondart_cost == 'max') {
            echo $message="You have MAXED out your Poison Dart spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$poisondart_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $poisondart_cost SP)
		<strong class='px40 green'>Poison Dart </strong>
		is now level
		<strong class='px60 green'>$poisondart_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET poisondart = poisondart + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $poisondart_cost");
        }
    }

    // -------------------------------------------------------------------------------Poison Dart - learn MAX
    if ($input=='max poison dart') {
        if ($sp<$poisondart_cost && $poisondart_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($poisondart_cost <= $poisondart_max && $poisondart_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $poisondart_cost SP)
		<strong class='px40 green'>Poison Dart </strong>
		is now level
		<strong class='px60 green'>$poisondart_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET poisondart = poisondart + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $poisondart_cost");
                $poisondart_new = $poisondart_new + 1;
                $poisondart_cost = $poisondart_cost + 1;
                $sp = $sp - $poisondart_cost;
            }
        }
        if ($poisondart_max == $poisondart_new-1) {
            echo $message="<strong class='learnBox px30 green'>POISON DART MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$poisondart_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Atomic Blast - learn
    if ($input=='learn atomic blast') {
        if ($atomicblast_cost == 'max') {
            echo $message="You have MAXED out your Atomic Blast spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$atomicblast_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $atomicblast_cost SP)
		<strong class='px40 black'>Atomic Blast </strong>
		is now level
		<strong class='px60 black'>$atomicblast_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET atomicblast = atomicblast + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $atomicblast_cost");
        }
    }

    // -------------------------------------------------------------------------------Atomic Blast - learn MAX
    if ($input=='max atomic blast') {
        if ($sp<$atomicblast_cost && $atomicblast_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($atomicblast_cost <= ($atomicblast_max+10) && $atomicblast_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $atomicblast_cost SP)
		<strong class='px40 black'>Atomic Blast </strong>
		is now level
		<strong class='px60 black'>$atomicblast_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET atomicblast = atomicblast + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $atomicblast_cost");
                $atomicblast_new = $atomicblast_new + 1;
                $atomicblast_cost = $atomicblast_cost + 1;
                $sp = $sp - $atomicblast_cost;
            }
        }
        if ($atomicblast_max == $atomicblast_new-1) {
            echo $message="<strong class='learnBox px30 black'>ATOMIC BAST MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$atomicblast_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Heal - learn
    if ($input=='learn heal') {
        if ($heal_cost == 'max') {
            echo $message="You have MAXED out your Heal spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$heal_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $heal_cost SP)
		<strong class='px40 green'>Heal </strong>
		is now level
		<strong class='px60 green'>$heal_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET heal = heal + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $heal_cost");
        }
    }

    // -------------------------------------------------------------------------------Heal - learn MAX
    if ($input=='max heal') {
        if ($sp<$heal_cost && $heal_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($heal_cost <= $heal_max && $heal_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $heal_cost SP)
		<strong class='px40 green'>Heal </strong>
		is now level
		<strong class='px60 green'>$heal_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET heal = heal + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $heal_cost");
                $heal_new = $heal_new + 1;
                $heal_cost = $heal_cost + 1;
                $sp = $sp - $heal_cost;
            }
        }
        if ($heal_max == $heal_new-1) {
            echo $message="<strong class='learnBox px30 green'>HEAL MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$heal_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Regenerate - learn
    if ($input=='learn regenerate') {
        if ($regenerate_cost == 'max') {
            echo $message="You have MAXED out your Regenerate spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$regenerate_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $regenerate_cost SP)
		<strong class='px40 green'>Regenerate </strong>
		is now level
		<strong class='px60 green'>$regenerate_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET regenerate = regenerate + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $regenerate_cost");
        }
    }
    // -------------------------------------------------------------------------------Regenerate - learn MAX
    if ($input=='max regenerate') {
        if ($sp<$regenerate_cost && $regenerate_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($regenerate_cost <= $regenerate_max && $regenerate_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $regenerate_cost SP)
		<strong class='px40 green'>Regenerate </strong>
		is now level
		<strong class='px60 green'>$regenerate_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET regenerate = regenerate + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $regenerate_cost");
                $regenerate_new = $regenerate_new + 1;
                $regenerate_cost = $regenerate_cost + 1;
                $sp = $sp - $regenerate_cost;
            }
        }
        if ($regenerate_max == $regenerate_new-1) {
            echo $message="<strong class='learnBox px30 green'>REGENERATE MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$regenerate_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Antidote - learn
    if ($input=='learn antidote') {
        if ($antidote_cost == 'max') {
            echo $message="You have MAXED out your Antidote spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$antidote_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $antidote_cost SP)
		<strong class='px40 green'>Antidote </strong>
		is now level
		<strong class='px60 green'>$antidote_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET antidote = antidote + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $antidote_cost");
        }
    }
    // -------------------------------------------------------------------------------Antidote - learn MAX
    if ($input=='max antidote') {
        if ($sp<$antidote_cost && $antidote_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($antidote_cost <= $antidote_max && $antidote_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $antidote_cost SP)
		<strong class='px40 green'>Antidote </strong>
		is now level
		<strong class='px60 green'>$antidote_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET antidote = antidote + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $antidote_cost");
                $antidote_new = $antidote_new + 1;
                $antidote_cost = $antidote_cost + 1;
                $sp = $sp - $antidote_cost;
            }
        }
        if ($antidote_max == $antidote_new-1) {
            echo $message="<strong class='learnBox px30 green'>ANTIDOTE MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$antidote_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Magic Armor - learn
    if ($input=='learn magic armor') {
        if ($magicarmor_cost == 'max') {
            echo $message="You have MAXED out your Magic Armor spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$magicarmor_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $magicarmor_cost SP)
		<strong class='px40 gold'>Magic Armor </strong>
		is now level
		<strong class='px60 gold'>$magicarmor_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET magicarmor = magicarmor + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $magicarmor_cost");
        }
    }
    // -------------------------------------------------------------------------------Magic Armor - learn MAX
    if ($input=='max magic armor') {
        if ($sp<$magicarmor_cost && $magicarmor_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($magicarmor_cost <= $magicarmor_max && $magicarmor_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $magicarmor_cost SP)
		<strong class='px40 gold'>Magic Armor </strong>
		is now level
		<strong class='px60 gold'>$magicarmor_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET magicarmor = magicarmor + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $magicarmor_cost");
                $magicarmor_new = $magicarmor_new + 1;
                $magicarmor_cost = $magicarmor_cost + 1;
                $sp = $sp - $magicarmor_cost;
            }
        }
        if ($magicarmor_max == $magicarmor_new-1) {
            echo $message="<strong class='learnBox px30 gold'>MAGIC ARMOR MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$magicarmor_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Iron Skin - learn
    if ($input=='learn iron skin') {
        if ($ironskin_cost == 'max') {
            echo $message="You have MAXED out your Iron Skin spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$ironskin_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $ironskin_cost SP)
		<strong class='px40 gold'>Iron Skin </strong>
		is now level
		<strong class='px60 gold'>$ironskin_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET ironskin = ironskin + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $ironskin_cost");
        }
    }
    // -------------------------------------------------------------------------------Iron Skin - learn MAX
    if ($input=='max iron skin') {
        if ($sp<$ironskin_cost && $ironskin_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($ironskin_cost <= $ironskin_max && $ironskin_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $ironskin_cost SP)
		<strong class='px40 gold'>Iron Skin </strong>
		is now level
		<strong class='px60 gold'>$ironskin_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET ironskin = ironskin + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $ironskin_cost");
                $ironskin_new = $ironskin_new + 1;
                $ironskin_cost = $ironskin_cost + 1;
                $sp = $sp - $ironskin_cost;
            }
        }
        if ($ironskin_max == $ironskin_new-1) {
            echo $message="<strong class='learnBox px30 gold'>IRON SKIN MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$ironskin_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Wings - learn
    if ($input=='learn wings') {
        if ($wings_cost == 'max') {
            echo $message="You have MAXED out your Wings spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$wings_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $wings_cost SP)
		<strong class='px40 blue'>Wings </strong>
		is now level
		<strong class='px60 blue'>$wings_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET wings = wings + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $wings_cost");
        }
    }
    // -------------------------------------------------------------------------------Wings - learn MAX
    if ($input=='max wings') {
        if ($sp<$wings_cost && $wings_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($wings_cost <= $wings_max && $wings_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $wings_cost SP)
		<strong class='px40 blue'>Wings </strong>
		is now level
		<strong class='px60 blue'>$wings_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET wings = wings + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $wings_cost");
                $wings_new = $wings_new + 1;
                $wings_cost = $wings_cost + 1;
                $sp = $sp - $wings_cost;
            }
        }
        if ($wings_max == $wings_new-1) {
            echo $message="<strong class='learnBox px30 blue'>WINGS MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$wings_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
    // -------------------------------------------------------------------------------Gills - learn
    if ($input=='learn gills') {
        if ($gills_cost == 'max') {
            echo $message="You have MAXED out your Gills spell! Search for more advanced teachers.<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($sp<$gills_cost) {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            echo $message = "
		<div class='learnBox'>
		(You spend $gills_cost SP)
		<strong class='px40 blue'>Gills </strong>
		is now level
		<strong class='px60 blue'>$gills_new</strong>
		</div>";
            include('update_feed.php'); // --- update feed
            $query = $link->query("UPDATE $user SET gills = gills + 1");
            $query = $link->query("UPDATE $user SET sp = sp - $gills_cost");
        }
    }
    // -------------------------------------------------------------------------------Gills - learn MAX
    if ($input=='max gills') {
        if ($sp<$gills_cost && $gills_cost !='max') {
            echo $message=$notenoughsp;
            include('update_feed.php');
        } else {
            while ($gills_cost <= $gills_max && $gills_cost <= $sp) {
                echo $message = "
		<div class='learnBox'>
		(You spend $gills_cost SP)
		<strong class='px40 blue'>Gills </strong>
		is now level
		<strong class='px60 blue'>$gills_new</strong>
		</div>";
                include('update_feed.php'); // --- update feed
                $query = $link->query("UPDATE $user SET gills = gills + 1");
                $query = $link->query("UPDATE $user SET sp = sp - $gills_cost");
                $gills_new = $gills_new + 1;
                $gills_cost = $gills_cost + 1;
                $sp = $sp - $gills_cost;
            }
        }
        if ($gills_max == $gills_new-1) {
            echo $message="<strong class='learnBox px30 blue'>GILLS MAX!</strong>";
            include('update_feed.php');
        } elseif ($sp<$gills_cost) {
            echo $message='You don\'t have enough SP!';
            include('update_feed.php');
        }
    }
}
