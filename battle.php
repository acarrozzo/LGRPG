<?php
// -- ---------------------------------  BATTLE !!!!!!!!!!!!!!!!!!!!!

    // ---------------------------------------------------------------BATTLE BOX
    // ---------------------------------------------------------------BATTLE BOX
    // ---------------------------------------------------------------BATTLE BOX
    //if ($enemyhp >= 0){
    $message="<div class='battleFrame'><div class='battleBox'>";
    include('update_feed_alt.php'); // --- update feed
//	}


// -------------------------DB CONNECT!
include('db-connect.php');
    // -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $enemy=$row['enemy'];     // enemy Stats
    if ($infight == 0) {
        include('battle-initialize.php');
    }
}
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $username=$row['username'];

    $currency = $_SESSION['currency'];
    $xp=$row['xp'];
    $level=$row['level'];

    $hp=$row['hp'];      // User Stats
    $hpmax=$row['hpmax'];
    $mp=$row['mp'];
    $mpmax=$row['mpmax'];
    $str=$row['str'];
    $strmod=$row['strmod'];
    $dex=$row['dex'];
    $dexmod=$row['dexmod'];
    $mag=$row['mag'];
    $magmod=$row['magmod'];
    $def=$row['def'];
    $defmod=$row['defmod'];

    $onehanded=$row['onehanded'];
    $twohanded=$row['twohanded'];
    $ranged=$row['ranged'];
    $toughness=$row['toughness'];
    $blockSkill=$row['block'];
    $ddge=$row['ddge'];

    $slice=$row['slice'];
    $smash=$row['smash'];
    $aim=$row['aim'];


    $equipR=$row['equipR'];
    $equipL=$row['equipL'];
    $pet = $row['equipPet'];
    $comp = $row['equipComp'];

    $arrows=$row['arrows'];
    $bolts=$row['bolts'];
    $javelin=$row['javelin'];
    $ironjavelin=$row['ironjavelin'];
    $steeljavelin=$row['steeljavelin'];
    //$mithriljavelin=$row['mithriljavelin'];

    $multiarrow=$row['multiarrow'];
    $boltupgrade=$row['boltupgrade'];


    $enemy=$row['enemy'];     // enemy Stats
    $enemyhp=$row['enemyhp'];
    $enemyhpmax=$row['enemyhpmax'];
    $enemyatt=$row['enemyatt'];
    $enemydef=$row['enemydef'];

    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $weapontype = $_SESSION['weapontype'] = $row['weapontype'];

    //$flyingenemycheck = 0;		// rest flying enemy check
            $dodgeCheck = 0;			// reset enemy dodge check
            $magResist = 0;			// reset enemy magic resist check
            $otherAttackCheck = 0;		// enemy OTHER attack check - so doesn't do regular attack // NOT NEEDED
            $otherEAttackCheck = 0;	// enemy OTHER defend check
                $youDodge = 0;    // you dodge check - so don't apply damage
            $enemyLoop = 1; // sets first enemy attack, will remain 1 if multi attack is checked
            $enemyLoopCount = 1; //multi count

            if ($_SESSION['eDoubleHit'] == 1) {
                $_SESSION['eAlwaysHit'] =1;
            } elseif ($_SESSION['eTripleHit'] == 1) {
                $_SESSION['eAlwaysHit'] =2;
            } else {
                $_SESSION['eAlwaysHit'] =0;
            }
}

//function BATTLEnumbers() {


//}

// BATTLEnumbers(); // call the function

// ===================================================================================================== SET ATTACK NUMBERS
if ($endfight !=1 && 1==1) {  // ---------------------------- SET ATTACK NUMBERS
    if ($_SESSION['magiccast'] == 1 && $input == 'attack') {	 // magic ATTACK
        $damage = $magic_amount;
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        $damagetotal = $damage - $block;
    } elseif ($weapontype == 1) {			 // 1h ATTACK
        $damage = rand(0, ($strmod-$onehanded));
        $damageskill = rand(0, $onehanded);
        if ($_SESSION['slice']==1) {
            $slicedmg = rand(1, $slice);
        } else {
            $slicedmg=0;
        }
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        $damagetotal = ($damage + $damageskill + $slicedmg) - $block;
    } elseif ($weapontype == 2) {			 // 2h ATTACK
        $damage = rand(0, ($strmod-$twohanded));
        $damageskill = rand(0, $twohanded);
        if ($_SESSION['smash']==1) {
            $smashdmg = rand(1, $smash);
        } else {
            $smashdmg=0;
        }
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        $damagetotal = ($damage + $damageskill +$smashdmg) - $block;
    } elseif ($weapontype == 3) {	 // ranged ATTACK
        $damage = rand(0, ($dexmod-$ranged));
        $damageskill = rand(0, $ranged);
        if ($_SESSION['aim']==1) {
            $aimdmg = rand(1, $aim);
        } else {
            $aimdmg=0;
        }
        if ($boltupgrade >= 1 && $_SESSION['crossbow_equipped']==1) {
            $budmg = rand(1, $boltupgrade);
        } else {
            $budmg=0;
        }
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        $damagetotal = ($damage + $damageskill + $aimdmg + $budmg) - $block;
    } elseif ($weapontype == 0) {			 // none equipped
        $damageskill=0;
        $damage = rand(0, $strmod);
        $block = rand(0, $enemydef);
        if ($_SESSION['ePureD'] >= 1) {
            $block = $enemydef;
        }	// enemy pure defense check
        $damagetotal = $damage - $block;
    } else {
        $damagetotal=0;
        $_SESSION['magiccast'] = 0;
        echo '......!!!last ditch attack! check battle.php<br/>';
    }


    // ===================================================================================================== BATTLE MATH - REDO DOWN BELOW FOR MULTI
    // BLOCK MATH
    if ($equipL == 'training shield' || $equipL == 'basic shield'
                || $equipL == 'kite shield' || $equipL == 'buckler' || $equipL == 'wooden shield'
                || $equipL == 'hunter shield' || $equipL == 'iron shield' || $equipL == 'iron kite shield'
                || $equipL == 'silver shield' || $equipL == 'steel shield' || $equipL == 'steel kite shield') {
        $blockAmt = rand(1, $blockSkill);
    } else {
        $blockAmt = 0;
    }


    if ($_SESSION['ironskin_amount']>0) {	 // ironskin rand
        $ironskin_rand = rand(1, $_SESSION['ironskin_amount']);
    } else {
        $ironskin_rand = 0;
    }


    $edamage = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $eblock = rand(0, $defmod) + rand(0, $toughness) + $blockAmt + $ironskin_rand;
    $edamagetotal = $edamage - $eblock;
    if ($_SESSION['ePureA'] >= 1) {
        $edamagetotal = $enemyatt;
    }	// enemy pure attack check

    $enemydodgeRand = rand(1, 100); // enemy dodge chance LVL x 10%

    if ($damagetotal <= 0) {
        $damagetotal = 0;
    }   // if negative damage make 0
    if ($edamagetotal <= 0) {
        $edamagetotal = 0;
    } // if negative damage make 0

    if ($_SESSION['notthe'] == 1) {
        $the = '';
        $The = '';
    } else {
        $the ='the';
        $The ='The';
    }	// set no THE for unique boss characters, ex: Diablo, Omar the Dead


    // ===================================================================================================== YOU ATTACK
    // ===================================================================================================== YOU ATTACK
    // ===================================================================================================== YOU ATTACK

    if (($input == 'attack' || $input == 'a') && $endfight != 1) {
        // -------------------------DB QUERY!
        $sql = "SELECT * FROM $username";
        if (!$result = $link->query($sql)) {
            die('There was an error running the query [' . $link->error . ']');
        }
        // -------------------------recalculate variables

        while ($row = $result->fetch_assoc()) {
            $enemyhp=$row['enemyhp'];
            $hp=$row['hp'];
            $infight=$row['infight'];
        }


        // ===================================================================================================== Flying Enemy Check
        echo 'MagicCast::::: '.$_SESSION['magiccast'].'    ';
      //  if ($_SESSION['eFly'] == 1  && (($weapontype != 3  || ($weapontype == 3 && $_SESSION['magiccast'] == 1  && $_SESSION['spell'] != 'magic strike'))) && $_SESSION['flying'] == 0) {
          if ($_SESSION['eFly'] == 1  && $_SESSION['flying'] == 0 && ($weapontype != 3  && ($_SESSION['magiccast'] != 1 || $_SESSION['spell'] != 'magic strike'))) {
            echo "You need to use a ranged weapon to hit $the flying $enemy!<br/>";
            $message="<span class='yellow redBG'>You need to use a ranged weapon to hit $the flying $enemy!!!</span><br/>";
            //$flyingenemycheck = 1;
        //$_SESSION['poison_amt'] = 0; // reset poison
        include('update_feed_alt.php'); // --- update feed
        }
        // --------------------------------------------------------------------------- NO AMMO check
        elseif ($arrows <= 0 && $_SESSION['bow_equipped'] == 1) {
            echo $message = '<i>You ran out of arrows! Equip another weapon.</i><br/>';
            include('update_feed_alt.php');
        } // ----- arrow shot
        elseif ($bolts <= 0 && $_SESSION['crossbow_equipped'] == 1) {
            echo $message = '<i>You ran out of bolts! Equip another weapon.</i><br/>';
            include('update_feed_alt.php');
        } // ----- bolt shot
        elseif ($javelin <= 0 && $equipR == "javelin") {
            echo $message = '<i>You ran out of javelins! Equip another weapon.</i><br/>';
            include('update_feed_alt.php');
        } // ----- no javelins
        elseif ($ironjavelin <= 0 && $equipR == "iron javelin") {
            echo $message = '<i>You ran out of iron javelins! Equip another weapon.</i><br/>';
            include('update_feed_alt.php');
        } // ----- no javelins
        elseif ($steeljavelin <= 0 && $equipR == "steel javelin") {
            echo $message = '<i>You ran out of steel javelins! Equip another weapon.</i><br/>';
            include('update_feed_alt.php');
        } // ----- no javelins
        //else if ($mitriljavelin <= 0 && $equipR == "mitril javelin") {  			echo $message = '<i>You ran out of mitriljavelins! Equip another weapon.</i><br/>'; include ('update_feed_alt.php'); } // ----- no javelins





        // ===================================================================================================== ENEMY DODGE CHECK
    elseif ($enemydodgeRand < ($_SESSION['eDodge'] * 10)) { // ------------  // enemy dodge chance LVL x 10%
                echo "".$The." $enemy dodges your attack!<br/>";
        $message = "$the $enemy <span class='blue'>dodges</span> your attack!<br/>
				<span class='dodged'>Dodged $damagetotal</span>";
        include('update_feed_alt.php'); // --- update feed
        $otherEAttackCheck = 1;
        $dodgeCheck = 1;
    }
        // ===================================================================================================== MAGIC ATTACK

        elseif ($_SESSION['magiccast'] == 1 && $input == 'attack') {
            if ($mp < $spell_cost) {
                echo $message="<i>You don't have enough MP to cast $spell</i><br/>";
                include('update_feed_alt.php'); // --- update feed
                $otherEAttackCheck = 1;
            } elseif ($_SESSION['eMagImm']==1) { 	// ----------------------------------------------- MAG RESIST ENEMY
                echo $message = "".$The." $enemy is immune to magic!<br/>";
                include('update_feed_alt.php'); // --- update feed
                $_SESSION['poison_amt']=0; // reset poison
                $magResist = 1;
                $otherEAttackCheck = 1;
            }

            //<span class='total red blueborder'> $damagetotal </span>  <br/>
        elseif ($spell == 'magic strike') { // ----------------------------------------------- MAGIC STRIKE!  //  && $otherEAttackCheck == 0
            echo "You attack with a magic imbued $equipR for $spell_cost MP and hit ".$the." $enemy for $damagetotal damage.<br/>";
            $message="
			<span class='attackMath red'>$damage - $block = $damagetotal</span>
					You <strong class='attackName'>Attack</strong> with a
					<span class='blue'>magic imbued </span> <strong class='attackWeapon'>$equipR!</strong>
					<span class='attackCost'>(-$slice_cost mp)</span>
					<strong class='attackBig red'>$damagetotal</strong>";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp
            $results = $link->query("UPDATE $user SET mp = mp - $spell_cost"); // -- mp change

            // -------------------------------------------- AMMO USE DUPLICATE x2 //////////////////////////////////////
            if ($_SESSION['bow_equipped'] == 1) {
                $results = $link->query("UPDATE $user SET arrows = arrows - 1");
            } //minus arrow
            if ($_SESSION['crossbow_equipped'] == 1) {
                $results = $link->query("UPDATE $user SET bolts = bolts - 1");
            } //minus bolt
            if ($equipR == "javelin") {
                $results = $link->query("UPDATE $user SET javelin = javelin - 1");
            } //minus javelin
            if ($equipR == "iron javelin") {
                $results = $link->query("UPDATE $user SET ironjavelin = ironjavelin - 1");
            } //minus javelin
            if ($equipR == "steel javelin") {
                $results = $link->query("UPDATE $user SET steeljavelin = steeljavelin - 1");
            } //minus javelin
        //if ($equipR == "mithril javelin") { $results = $link->query("UPDATE $user SET mithriljavelin = mithriljavelin - 1");	} //minus javelin
                //////////////////////////////////////////////////////////////////////////////////////////////
        }
            //<span class='total blue blueborder'> $damagetotal </span>
        elseif ($otherEAttackCheck == 0) { // ----------------------------------------------- MAGIC HIT!
            echo "You cast $spell for $spell_cost MP and hit ".$the." $enemy for $damagetotal damage<br/>";
            $message="
			<span class='attackMath red'>$damage - $block = $damagetotal </span>
			You cast <strong class='$spellColor'>$spell!</strong>
			<span class='attackCost'>(-$spell_cost mp)</span>
			<strong class='attackBig red'>$damagetotal</strong>";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp
            $results = $link->query("UPDATE $user SET mp = mp - $spell_cost"); // -- mp change
        }
        }

        // -------------------------------------------------------------------------------------------- WEAPON ATTACK
        // -------------------------------------------------------------------------------------------- WEAPON ATTACK

        elseif ($_SESSION['eStrImm']==1) { 	// ----------------------------------------------- STR RESIST ENEMY
            echo $message = "".$The." $enemy is immune to melee attacks!<br/>";
            include('update_feed_alt.php'); // --- update feed
            $otherEAttackCheck = 1;
        } elseif ($_SESSION['eDexImm']==1 && $weapontype == 3) { 	// ----------------------------------------------- DEX RESIST ENEMY
            echo $message = "".$The." $enemy is immune to ranged attacks!<br/>";
            include('update_feed_alt.php'); // --- update feed
            $otherEAttackCheck = 1;
        } elseif (1==1) { // ----------------------------------------------- WEAPON HIT!
    if ($_SESSION['multi_hit']>=1) { // ----------------------------------------------- MultiCheck!

        $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp

        $weapondrop = rand(1, 500); // weapon drop 1/500

        //<span class='total red redborder'> $damagetotal </span> <br/>
                if ($_SESSION['slice'] == 1 && $weapontype == 1 && $otherEAttackCheck == 0) {  // 1h SLICE
                    echo "You Slice ".$the." $enemy with your $equipR for $damagetotal damage.<br/>";
                    $message="
					<span class='attackMath red'>( $damage + $damageskill + $slicedmg ) - $block = $damagetotal</span>
					You <strong class='attackName'>Slice</strong> ".$the." $enemy with your  <strong class='attackWeapon'>$equipR!</strong>
					<span class='attackCost'>(-$slice_cost_cast mp)</span>
					<strong class='attackBig red'>$damagetotal</strong>";

                    $results = $link->query("UPDATE $user SET mp = mp - $slice_cost_cast"); // -- mp change
                    include('update_feed_alt.php'); // --- update feed
                }
        //<span class='total red redborder'> $damagetotal </span><br/>
                elseif ($_SESSION['smash'] == 1 && $weapontype == 2) {  // 2h SMASH
                    echo "You Smash ".$the." $enemy with your $equipR for $damagetotal damage.<br/>";
                    $message="
					<span class='attackMath red'>( $damage + $damageskill + $smashdmg ) - $block = $damagetotal</span>
					You <strong class='attackName'>Smash</strong> ".$the." $enemy with your  <strong class='attackWeapon'>$equipR!</strong>
					<span class='attackCost'>(-$smash_cost_cast mp)</span>
					<strong class='attackBig red'>$damagetotal</strong>";
                    $results = $link->query("UPDATE $user SET mp = mp - $smash_cost_cast"); // -- mp change
                    include('update_feed_alt.php'); // --- update feed
                }
        //<span class='total green greenborder'> $damagetotal </span><br/>
        elseif ($_SESSION['aim'] == 1 && $_SESSION['crossbow_equipped'] == 1
                                                && $boltupgrade >= 1 && $weapontype == 3) {  // AIM & BOLT UPGRADE
            echo "You AIM with your upgraded $equipR and hit ".$the." $enemy for $damagetotal damage.<br/>";
            $message="You AIM with your upgraded $equipR! [ -$aim_cost_cast mp]
					<span class='alt2 attack red'>( $damage + $damageskill + $aimdmg + $budmg ) - $block = $damagetotal</span><br/>";

            $results = $link->query("UPDATE $user SET mp = mp - $aim_cost_cast"); // -- mp change

            include('update_feed_alt.php'); // --- update feed
        }
        //<span class='total green greenborder'> $damagetotal </span><br/>
                elseif ($_SESSION['aim'] == 1 && $weapontype == 3) {  // AIM
                    $arrowsLeft = $arrows - 1;

                    echo "You AIM with your $equipR and hit ".$the." $enemy for $damagetotal damage.<br/>";
                    $message="
					<span class='attackMath green'>( $damage + $damageskill + $aimdmg ) - $block = $damagetotal</span>
					You <strong class='attackWeapon green'>Aim</strong> with your <strong class='attackWeapon'>$equipR</strong>! <br/>
					<span class='attackCost gray'>$arrowsLeft arrows left</span>
					<span class='attackCost blue'>-$aim_cost_cast mp</span>
					<strong class='attackBig green'>$damagetotal</strong>
					";

                    $results = $link->query("UPDATE $user SET mp = mp - $aim_cost_cast"); // -- mp change

                    include('update_feed_alt.php'); // --- update feed
                }
        //<span class='total greenborder green'> $damagetotal </span><br/>
                elseif ($weapontype==3) { // DISPLAY FOR PROJECTILE
                    $arrowsLeft = $arrows - 1;
                    while ($_SESSION['bow_equipped'] >= 0) {
                        echo "You attack ".$the." $enemy with your $equipR for $damagetotal damage.";
                        $message="
					<strong class='attackMath green'>( $damage + $damageskill ) - $block = $damagetotal</strong>
					You attack with your <strong class='attackWeapon'>$equipR</strong><br/>
					<span class='attackCost gray'>$arrowsLeft arrows left</span>
					<strong class='attackBig green'><i class='icon-bow-arrow'></i>$damagetotal</strong>";
                        include('update_feed_alt.php'); // --- update feed

                        $multiarrowhit = rand(0, $multiarrow);
                        echo ' M-a: '.$multiarrowhit;
                        $chance100 = rand(1, 100);
                        echo ' M-a %: '.$chance100;
                        if ($multiarrowhit >= $chance100) {
                            $_SESSION['bow_equipped'] = 1;
                        } else {
                            $_SESSION['bow_equipped'] = -1;
                        }
                    }
                }
        //<span class='total red'> $damagetotal </span><br/>
                else { // DISPLAY FOR ONE or TWO HANDED WEAPONS
                echo "You attack ".$the." $enemy with your $equipR for $damagetotal damage.";
                    $message="
				<strong class='attackMath red'>( $damage + $damageskill ) - $block = $damagetotal</strong>
				You attack with your
				<strong class='attackWeapon'>$equipR</strong>
				<strong class='attackBig red'>$damagetotal</strong> ";
                    include('update_feed_alt.php'); // --- update feed
                }
        // weapon drop
        if ($weapondrop == 1) {
            echo $message="<i class='red'>O NO!!! As you attack with your $equipR it becomes unequipped!! Equip a weapon!</i><br/>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET equipR = 'fists'");
            if ($equipR == $equipL) {
                $results = $link->query("UPDATE $user SET equipL = '- - -'");
            } // Drop for Double handed check
        }

        $_SESSION['multi_hit']=0;
    }
            $_SESSION['multi_hit'] = 1;
            // -------------------------------------------- AMMO USE DUPLICATE x2
            if ($equipR == "wooden bow" || $equipR == "hunter bow" || $equipR == "long bow" || $equipR == "iron bow" || $equipR == "enchanted bow"
                || $equipR == "steel bow" || $equipR == "silver bow" || $equipR == "ranger bow" || $equipR == "mithril bow") {
                $results = $link->query("UPDATE $user SET arrows = arrows - 1");
            } //minus arrow
            if ($equipR == "crossbow" || $equipR == "hunter crossbow" || $equipR == "compound crossbow" || $equipR == "iron crossbow"
                || $equipR == "steel crossbow" || $equipR == "silver crossbow" || $equipR == "mithril crossbow") {
                $results = $link->query("UPDATE $user SET bolts = bolts - 1");
            } //minus bolt
            if ($equipR == "javelin") {
                $results = $link->query("UPDATE $user SET javelin = javelin - 1");
            } //minus javelin
            if ($equipR == "iron javelin") {
                $results = $link->query("UPDATE $user SET ironjavelin = ironjavelin - 1");
            } //minus javelin
            if ($equipR == "steel javelin") {
                $results = $link->query("UPDATE $user SET steeljavelin = steeljavelin - 1");
            } //minus javelin
        //if ($equipR == "mithril javelin") { $results = $link->query("UPDATE $user SET mithriljavelin = mithriljavelin - 1");	} //minus javelin
        }
    } // --- end attack
}


// -------------------------------------------------------------------------------------------------------------------------- COMPANION
// -------------------------------------------------------------------------------------------------------------------------- COMPANION
// -------------------------------------------------------------------------------------------------------------------------- COMPANION
// -------------------------DB QUERY! // -------------------------------------------- COMPANION Recalculate enemy HP
            $sql = "SELECT * FROM $username";
            if (!$result = $link->query($sql)) {
                die('There was an error running the query [' . $link->error . ']');
            }
            // -------------------------recalculate variables for pet
            while ($row = $result->fetch_assoc()) {
                $enemyhp=$row['enemyhp'];
            }

    if ($comp == 'dwarf axeman' && $enemyhp > 0) {	// -------------------------------------------------------------- COMPANION ATTACK
        $compBase = rand(1, 5);
        $compEdef = rand(0, ($block/10));
        if ($_SESSION['ePureD'] >= 1) {
            $compEdef = ($enemydef/10);
        }	// enemy pure defense check
        $compHit = $compBase - $compEdef;
        if ($compHit < 0) {
            $compHit = 0;
        } // set damage to 0 if negative //: $compBase-$compEdef =


        $message="<span class='attackMath'>Dwarf axeman <strong class='red'>$compHit</strong></span>";


        include('update_feed_alt.php'); // --- update feed
        $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $compHit"); // subtract enemy hp
    }

    if ($comp == 'elf ranger' && $enemyhp > 0) {	// -------------------------------------------------------------- COMPANION ATTACK
        $compBase = rand(1, 10);
        $compEdef = rand(0, ($block/10));
        if ($_SESSION['ePureD'] >= 1) {
            $compEdef = ($enemydef/10);
        }	// enemy pure defense check
        $compHit = $compBase - $compEdef;
        if ($compHit < 0) {
            $compHit = 0;
        } // set damage to 0 if negative //$compBase-$compEdef =

        $message="<span class='attackMath'>Elf ranger: <strong class='green'>$compHit</strong></span>";
        include('update_feed_alt.php'); // --- update feed
        $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $compHit"); // subtract enemy hp
    }

// -------------------------------------------------------------------------------------------------------------------------- PETS
    // -------------------------------------------------------------------------------------------------------------------------- PETS
    // -------------------------------------------------------------------------------------------------------------------------- PETS
    // -------------------------DB QUERY! // -------------------------------------------- PET Recalculate enemy HP
            $sql = "SELECT * FROM $username";
            if (!$result = $link->query($sql)) {
                die('There was an error running the query [' . $link->error . ']');
            }
            // -------------------------recalculate variables for pet
            while ($row = $result->fetch_assoc()) {
                $enemyhp=$row['enemyhp'];
            }

// ----------------------------------------------------------------------------------------------------- HAMPSTER ATTACK
    if ($pet == 'pet hampster' && $enemyhp > 0 && $_SESSION['eFly'] != 1) {
        $bite = rand(0, 2);
        $message="<span class='attackMath'> Pet hampster: <strong class='red'> $bite</strong></span>";
        include('update_feed_alt.php'); // --- update feed
        $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $bite"); // subtract enemy hp
    } elseif ($pet == 'pet hampster' && $enemyhp > 0 && $_SESSION['eFly'] == 1) {
        $message="Pet hampster can't attack flying enemies.<br/>";
        include('update_feed_alt.php'); // --- update feed
    }

// ----------------------------------------------------------------------------------------------------- BAT ATTACK
    if ($pet == 'pet bat' && $enemyhp > 0) {
        $bite = rand(0, 3);
        $message="<span class='attackMath'>Pet bat: <strong class='red'> $bite</strong></span>";
        include('update_feed_alt.php'); // --- update feed
        $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $bite"); // subtract enemy hp
    }



// -------------------------------------------------------------------------------------------------------------------------- POISON
// -------------------------------------------------------------------------------------------------------------------------- POISON
// -------------------------------------------------------------------------------------------------------------------------- POISON

            // -------------------------DB QUERY! // -------------------------------------------- Poison Recalculate enemy HP
            $sql = "SELECT * FROM $username";
            if (!$result = $link->query($sql)) {
                die('There was an error running the query [' . $link->error . ']');
            }
            // -------------------------recalculate variables for poison
            while ($row = $result->fetch_assoc()) {
                $enemyhp=$row['enemyhp'];
            }



                // -------------------------------------------- Check for poison weapons!
                if ($_SESSION['poison_amt']<=0 && ($equipR=='poison saber' || $equipR=='jim bo' || $equipR=='jim bow') && $input=='attack') {
                    $_SESSION['poison_amt'] = rand(1, 5);					 // poison weapons
                }


                    // -------------------------------------------------------------------------------------- Poison
if ($_SESSION['poison_amt']>0 && $enemyhp > 0 && $magResist != 1 && $_SESSION['eFly'] != 1) { // ------- Poison on Enemy
                $poison_amt = $_SESSION['poison_amt'] = $_SESSION['poison_amt'] - 1;
    if ($poison_amt > 0) {
        echo "".$The." $enemy is poisoned $poison_amt<br/>";
        $message="<span class='attackMath'> Poison: <strong class='green'> ".$_SESSION['poison_amt']." </strong></span>";
        include('update_feed_alt.php'); // --- update feed
                    $results = $link->query("UPDATE $user SET enemyhp = enemyhp - $poison_amt"); // subtract enemy hp w/ poison
    }
}




// ---------------------------------- END BATTLE CHECKS

// ---------------------------------- Start Enemy Battle Box
    $message="</div><div class='battleBox alignR'>";
    include('update_feed_alt.php'); // --- update feed

// ---------------------------------- START ENEMY ATTACK LOOP
while ($enemyLoop == 1) {


// -------------------------DB QUERY!
    $sql = "SELECT * FROM $username";
    if (!$result = $link->query($sql)) {
        die('There was an error running the query [' . $link->error . ']');
    }
    // -------------------------recalculate variables
    while ($row = $result->fetch_assoc()) {
        $enemyhp=$row['enemyhp'];
        $hp=$row['hp'];
        $infight=$row['infight'];
    }
    // ------------------------ ENEMY DIES
    if ($enemyhp <= 0 && $infight >=1) {
        $_SESSION['poison_amt']=0; // reset poison on enemy death
      $enemyLoop = 0; // resets enemy multi loop
$message="</div></div>";
        include('update_feed_alt.php'); // --- update feed
        include('battle-win.php');
    }




    // ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
    // ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
    // ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
    // ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
    // ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK
    // ----------------------------------------------------------------------------------------------------------------- ENEMY ATTACK

    $enemycritattack = rand(1, 10); 		// enemy CRITICAL attack 10%
$enemyrandpickpocket = rand(1, 5); 	// enemy pickpocket chance 20%
$enemyhealchance = rand(1, 4); 		// enemy heal chance 25%
$enemypowerattack = rand(1, 3); 		// enemy POWER attack 33%
$enemybite = rand(1, 5); 				// enemy bite chance 20%
$enemyrage = rand(1, 5); 				// enemy rage chance 20%

$ddgecheck = rand(1, 100); 			// You Dodge chance LVL/100

    // ------------------------ YOU DIE
    if ($hp <= 0) {
        echo 'DEATH ):';
    } elseif ($enemyhp < 0) { // enemy alive check
    // echo 'ENEMY DEAD (:';
    }
    // ---------------------------------------------------------------------------------------- YOU DODGE ENEMY ATTACK!
elseif ($infight == 1 && $enemyhp > 0 && ($ddgecheck <= $ddge)) { // YOU DODGE
    echo "You dodge ".$the." $enemy's attack! ($edamagetotal)<br/>";
    $message="You dodge $the $enemy's attack!<span class='dodged'>Dodged $edamagetotal</span>";
    include('update_feed_alt.php'); // --- update feed
    $otherAttackCheck = 1;
    $youDodge = 1;
}
    // ---------------------------------------------------------------------------------------- ENEMY HEAL	 - 25%
    elseif ($infight == 1 && $enemyhp > 0 && ($_SESSION['eHeal'] >= 1) && ($enemyhp < 20 || $enemyhealchance == 1)) {
        $edamage = $edamage/2;
        $results = $link->query("UPDATE $user SET enemyhp = enemyhp + $edamage");
        echo ''.$The.' '.$enemy.' casts a heal spell for +'.$edamage.' hp!<br/>';
        $message="$the $enemy casts a <i class='green'>heal</i> spell! <span class='totalXXX green'>+ $edamage</span><br/></br>";
        include('update_feed_alt.php'); // --- update feed
        if ($enemyhp + $edamage > $enemyhpmax) {
            $results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
        }
    }
    // ---------------------------------------------------------------------------------------- ENEMY CRITICAL ATTACK - X10 ATTACK (1/10 chance)
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eCrit']==1 &&  $enemycritattack == 1) {
        $edamage1 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage2 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage3 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage4 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage5 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage6 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage7 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage8 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage9 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage10 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamagetotal = ($edamage1 + $edamage2 + $edamage3 + $edamage4 + $edamage5 + $edamage6 + $edamage7 + $edamage8 + $edamage9 + $edamage10) - $eblock;
        if ($_SESSION['ePureA'] >= 1) {
            $edamagetotal = $enemyatt*10;
        }	// enemy pure attack check

        // <span class='total power'>$edamagetotal</span></br>
        if ($edamagetotal <= 0) {
            $edamagetotal = 0;
        } // if negative damage make 0
        echo ''.$The.' '.$enemy.' hits you with a CRITICAL ATTACK for '.$edamagetotal.' damage!<br/>';
        $message="$The $enemy hits you with a CRITICAL ATTACK!
	<span class='attack red'>( $edamage1 + $edamage2 + $edamage3 + $edamage4 + $edamage5 + $edamage6 + $edamage7 + $edamage8 + $edamage9 + $edamage10 ) - $eblock = $edamagetotal</span><br/>";
        include('update_feed_alt.php'); // --- update feed
        $otherAttackCheck = 1;
    }
    // ---------------------------------------------------------------------------------------- ENEMY RAGE ATTACK - 2-4 PURE COMBO ATTACK (1/5 chance)
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eRage']==1 &&  $enemyrage == 1) {
        $rageCombo = $rageCountdown = rand(2, 4);
        $edamagetotal = $enemyatt * $rageCombo;
        while ($rageCountdown > 0) {
            $message="$The $enemy attacks with PURE RAGE! <span class='red'>$enemyatt</span></br>";
            include('update_feed_alt.php'); // --- update feed
            $rageCountdown -= 1;
        }
        //<span class='total power'>$edamagetotal</span></br>
        if ($edamagetotal <= 0) {
            $edamagetotal = 0;
        } // if negative damage make 0
        echo ''.$The.' '.$enemy.' goes on a RAGE filled RAMPAGE for '.$edamagetotal.' total damage.<br/>';
        $message="$The $enemy goes on a RAMPAGE for
	<span class='attack red'> $enemyatt x $rageCombo = $edamagetotal</span><br/>";
        include('update_feed_alt.php'); // --- update feed
        $otherAttackCheck = 1;
    }

    // ---------------------------------------------------------------------------------------- ENEMY POWER ATTACK - X3 ATTACK (1/3 chance)
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['ePow']==1 &&  $enemypowerattack == 1) {
        $edamage1 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage2 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamage3 = rand(0, $enemyatt); 	 // ENEMY ATTACK
    $edamagetotal = ($edamage1 + $edamage2 + $edamage3) - $eblock;
        if ($_SESSION['ePureA'] >= 1) {
            $edamagetotal = $enemyatt*3;
        }	// enemy pure attack check
        //<span class='total power'>$edamagetotal</span></br>
        if ($edamagetotal <= 0) {
            $edamagetotal = 0;
        } // if negative damage make 0
        echo ''.$The.' '.$enemy.'</span> unleashes a <span class="red">Power Attack</span> for '.$edamagetotal.' damage.<br/>';
        $message="
		<span class='attackMath red'>( $edamage1 + $edamage2 + $edamage3 ) - $eblock = $edamagetotal</span>
		<strong class='ddgray'>$The $enemy </strong>unleashes a <strong class='red'>Power Attack</strong>!
		<strong class='attackBig red'>$edamagetotal</strong>";
        include('update_feed_alt.php'); // --- update feed
        $otherAttackCheck = 1;
    }

    //	$message="<p>The $enemy unleashes a POWER ATTACK!</p> <span class='total redBG power'>$edamagetotal</span></br>
    // ---------------------------------------------------------------------------------------- ENEMY BITE - X2 PURE ATTACK (1/5 chance)
    //<span class='total power'>$edamagetotal</span></br>
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eBite']>=1 && $enemybite == 1) {
        $edamage1 = $enemyatt; 	 // ENEMY ATTACK
    $edamage2 = $enemyatt; 	 // ENEMY ATTACK
    $edamagetotal = $edamage1 + $edamage2;
        echo ''.$The.' '.$enemy.' BITES you for '.$edamagetotal.' damage!<br/>';
        $message="$The $enemy BITES you!
	<span class='attack red'>( $edamage1 + $edamage2 ) = $edamagetotal</span><br/>";
        include('update_feed_alt.php'); // --- update feed
        $otherAttackCheck = 1;
    }


    // ---------------------------------------------------------------------------------------- ENEMY MAG ATTACK // USES MAG AS DEF
    //<span class='total blue'>$edamagetotal</span></br>
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eMag'] == 1) {
        $eblock = rand(0, $magmod) + $blockAmt;	// new mag block
    $edamagetotal = $edamage - $eblock;		// new damage
    if ($edamagetotal <= 0) {
        $edamagetotal = 0;
    } // if negative damage make 0
        echo ''.$The.' '.$enemy.' casts a spell at you for '.$edamagetotal.' damage.<br/>';
//        $message=" $The $enemy casts a spell at you
        //	<span class='attack blue'>$edamage - $eblock = $edamagetotal</span><br/>";
        $message=
        "<span class='blue attackNums'>$edamage - $eblock = $edamagetotal</span>
		<span>$The <strong class='blue'> $enemy </strong> casts a spell at you for <strong class='attackBig blue'>$edamagetotal</strong></span>";
        include('update_feed_alt.php'); // --- update feed
        $otherAttackCheck = 1;
    }
    // ---------------------------------------------------------------------------------------- ENEMY PROJ ATTACK // USES DEX AS DEF
    //<span class='total green'>$edamagetotal</span></br>
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eDex']==1) {
        $eblock = rand(0, $dexmod)+ $blockAmt;	// new dex block
    $edamagetotal = $edamage - $eblock;	 	// new damage
    if ($edamagetotal <= 0) {
        $edamagetotal = 0;
    } // if negative damage make 0
        echo ''.$The.' '.$enemy.' attacks you for '.$edamagetotal.' damage.<br/>';
        $message=" $The $enemy attacks you
	<span class='attack green'>$edamage - $eblock = $edamagetotal</span><br/>";
        include('update_feed_alt.php'); // --- update feed
        $otherAttackCheck = 1;
    }
    // ---------------------------------------------------------------------------------------- ENEMY PICKPOCKET
    elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['eSteal'] >=1 && ($enemyrandpickpocket == 1)) {
        $pickpocketAMT = rand(1, $level*3);		// coin amt
        $results = $link->query("UPDATE $user SET currency = currency - $pickpocketAMT");
        echo ''.$The.' '.$enemy.' pickpockets '.$pickpocketAMT.' '.$currency.' from you!<br/>';
        $message="$The $enemy pickpockets <span class='gold'>$pickpocketAMT</span> $currency from you!</br>";
        include('update_feed_alt.php'); // --- update feed
    }
    // ---------------------------------------------------------------------------------------- ENEMY BASE ATTACK!!!
    //else
    //if ($infight == 1 && $enemyhp > 0 && $otherAttackCheck !=1)
    //<span class='total'>$edamagetotal</span><br>
    elseif ($infight == 1 && $enemyhp > 0) {
        echo ''.$The.' '.$enemy.' attacks you for '.$edamagetotal.' damage.<br/>';
        $message=
        "<span class='red attackNums'>$edamage - $eblock = $edamagetotal</span>
		<span>$The <strong class='darkergray'> $enemy </strong> attacks you for <strong class='attackBig red'>$edamagetotal</strong></span>";
        include('update_feed_alt.php'); // --- update feed
    }

    //echo 'HP'.$hp.' -- MAX'.$hpmax.' -- eDAM'.$edamagetotal;



    // --------------------------------------------------------------------------------------------REMOVE HP FROM YOU!!!
    // --------------------------------------------------------------------------------------------REMOVE HP FROM YOU!!!
    // --------------------------------------------------------------------------------------------REMOVE HP FROM YOU!!!


    if ($youDodge == 1 || $infight==0) {
        $edamagetotal=0;
    } // If you dodged damage is 0, OR if battle is over
if ($_SESSION['magicarmor_amount'] > 0) { // --- remove from magic armor first
        $_SESSION['magicarmor_amount'] =  $_SESSION['magicarmor_amount']  - $edamagetotal;
    if ($_SESSION['magicarmor_amount'] <= 0) { // magic armor run out, set remainder
        $remainder = $_SESSION['magicarmor_amount'] - $_SESSION['magicarmor_amount'] - $_SESSION['magicarmor_amount'];
        $results = $link->query("UPDATE $user SET hp = hp - $remainder");
    }
} else {
    $results = $link->query("UPDATE $user SET hp = hp - $edamagetotal");  // SUBTRACT YOUR HP!!!
}



    $eMultiCheck = rand(1, 100); // enemy multi hit rand
    //echo 'EMULTI: '.$eMultiCheck;

    if ($enemyhp > 0 && $enemyhp>0 && (($eMultiCheck < ($_SESSION['eMulti'] *10)) || $_SESSION['eAlwaysHit']>=1)) { // LVL * 10% chance of ENEMY MULTI ATTACK
        $enemyLoop = 1;
        $_SESSION['eAlwaysHit'] = $_SESSION['eAlwaysHit'] - 1;
        $enemyLoopCount = $enemyLoopCount + 1;
        echo $message="<strong class='multiHit'>hit ".$enemyLoopCount." </strong>";
        include('update_feed_alt.php'); // --- update feed


        // ================================================================= REDO !!! BATTLE MATH - COPIED FROM ABOVE, FOR ENEMY MULTI HIT
        if ($_SESSION['ironskin_amount']>0) {	 // ironskin rand
            $ironskin_rand = rand(1, $_SESSION['ironskin_amount']);
        } else {
            $ironskin_rand = 0;
        }

        $edamage = rand(0, $enemyatt); 	 // ENEMY ATTACK
        $eblock = rand(0, $defmod) + rand(0, $toughness) + $blockAmt + $ironskin_rand;
        $edamagetotal = $edamage - $eblock;
        if ($_SESSION['ePureA'] >= 1) {
            $edamagetotal = $enemyatt;
        }	// enemy pure attack check



        if ($edamagetotal <= 0) {
            $edamagetotal = 0;
        } // if negative damage make 0
    }	// END MULTI ATTACK CHECK

    else {
        $enemyLoop = 0;
    }
} // ------ end enemy attack loop






// ------------------------------------------------------------------------------------------------------------------ POISON YOU
    // -------------------------DB QUERY! // ----------------------------- Poison Recalculate enemy HP
    $sql = "SELECT * FROM $username";
    if (!$result = $link->query($sql)) {
        die('There was an error running the query [' . $link->error . ']');
    }
    // -------------------------recalculate variables for poison
    while ($row = $result->fetch_assoc()) {
        $enemyhp=$row['enemyhp'];
    }

    if ($infight == 1 && $enemyhp > 0 && $_SESSION['ePoison'] ==1 && $_SESSION['poisonyou'] < 1) { // ENEMY POISONS YOU LEVEL 1) 1-lvl/2
        $poisonMax = $level/2;
        $poisonyou = $_SESSION['poisonyou'] = rand(1, $poisonMax);
    } elseif ($infight == 1 && $enemyhp > 0 && $_SESSION['ePoison'] ==2 && $_SESSION['poisonyou'] < 1) { // ENEMY POISONS YOU LEVEL 2) 1-lvl
        $poisonMax = $level;
        $poisonyou = $_SESSION['poisonyou'] = rand(1, $poisonMax);
    }
    if ($_SESSION['poisonyou']>0) { // ------- Poison on YOU
        $poisonyou = $_SESSION['poisonyou'] = $_SESSION['poisonyou'] - 1;
        if ($poisonyou > 0) {
            echo "You are poisoned for $poisonyou<br/>";
            $message="You are <span class='green'>poisoned</span> for <span class='green'>$poisonyou </span>";
            $message="<span class='attackMath'> You are poisoned for <strong class='green'>$poisonyou </strong></span>";
            include('update_feed_alt.php'); // --- update feed
                    $results = $link->query("UPDATE $user SET hp = hp - $poisonyou"); // subtract enemy hp w/ poison
        }
    }


// ---------------------------------------------------------------BATTLE BOX END!

// ------------------------ end normal battle box if no death
if ($enemyhp > 0) {
    $message="</div>";
    include('update_feed_alt.php'); // --- update feed

    // ---------------------------------------------------------------HP SUMMARY BETWEEN BOXES!
    //	if ($hp < $hpmax) {
    if (1 == 2) {
        $breaker = ' :: ';
        $hpleft = $hp - $edamagetotal;
        $damagetotal = $damagetotal + $bite + $compHit + $poison_amt;
        $message = "
		<span class='totes px20'>-$damagetotal </span>
		<span class='gray'>$breaker</span>
		<span class='totes px20'>-$edamagetotal </span>

		<span class='hpleft'>
		<span class='black'> $enemyhp</span>
		<span class='gray'>$breaker</span>
		<span class='red'> $hpleft</span>
		</span>";

        // include ('update_feed_alt.php'); // --- update feed

        $message = "</div>"; // --- end of BATTLE FRAME
        include('update_feed_alt.php'); // --- update feed
    }
}
//	$message = "<div class='defeated'> <strong>$enemy defeated! </strong></div>"; // BATTLE HUD // so the close div doesnt mess up the HUD

//$message="</div>"; // ---END BATTLE FRAME
//	include ('update_feed_alt.php'); // --- update feed
