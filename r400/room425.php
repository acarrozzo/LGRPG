<?php
                        $roomname = "Master Temple";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc425'];
//$dangerLVL = $_SESSION['dangerLVL'] = "50"; // danger level

include('function-start.php');

// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $quest47=$row['quest47'];
    $quest48=$row['quest48'];
    $quest49=$row['quest49'];
    $quest50=$row['quest50'];


    $reds=$row['reds'];
    $greens=$row['greens'];
    $blues=$row['blues'];
    $yellows=$row['yellows'];
    $redbalm=$row['redbalm'];
    $bluebalm=$row['bluebalm'];



    // ------------------------------  EVOLVE FUNCTION

    if ($input == 'evolve') {
        include('function-evolve.php');
    }

    // --------------------------------------------------------------------------- REST HEAL
    if ($input=="rest") {
        $query = $link->query("UPDATE $user SET hp = $hpmax + 100 ");
        $query = $link->query("UPDATE $user SET mp = $mpmax + 100 ");
        echo $message = "You rest at the Master Temple! (+100 HP, +100 MP)<br/>";
        include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }



    // ------------------------------  MASTER PACK

    if ($input=="grab master pack") {  // ---- GRAB Master Pack
      echo $message="<div class='menuAction'><h4 class='ocean'>You replenish your Masterpack</h3><br/>";
      include('update_feed.php'); // --- update feed
        if ($reds>= 3) {	// ------------------------------  reds
            echo $message="<i class='fa fa-times-circle lightred'></i>You have ".$reds." reds.";
            include('update_feed_alt.php'); // --- update feed
        } else {
            echo $message="<i class='fa fa-arrow-circle-up green'></i>You now have ".$reds." reds.";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET reds = 3");
        }
        if ($greens>= 3) {	// ------------------------------  greens
            echo $message="<i class='fa fa-times-circle lightred'></i>You have ".$greens." greens.";
            include('update_feed_alt.php'); // --- update feed
        } else {
            echo $message="<i class='fa fa-arrow-circle-up green'></i>You now have ".$greens." greens.";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET greens = 3");
        }
        if ($blues>= 3) {	// ------------------------------  blues
            echo $message="<i class='fa fa-times-circle lightred'></i>You have ".$blues." blues.";
            include('update_feed_alt.php'); // --- update feed
        } else {
            echo $message="<i class='fa fa-arrow-circle-up green'></i>You now have ".$blues." blues.";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET blues = 3");
        }
        if ($yellows>= 3) {	// ------------------------------  yellows
            echo $message="<i class='fa fa-times-circle lightred'></i>You have ".$yellows." yellows.";
            include('update_feed_alt.php'); // --- update feed
        } else {
            echo $message="<i class='fa fa-arrow-circle-up green'></i>You now have ".$yellows." yellows.";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET yellows = 3");
        }
        if ($redbalm>= 3) {	// ------------------------------  red balm
            echo $message="<i class='fa fa-times-circle lightred'></i>You have ".$redbalm." red balms.";
            include('update_feed_alt.php'); // --- update feed
        } else {
            echo $message="<i class='fa fa-arrow-circle-up green'></i>You now have ".$redbalm." red balms.";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET redbalm = 3");
        }
        if ($bluebalm>= 3) {	// ------------------------------  blue balm
            echo $message="<i class='fa fa-times-circle lightred'></i>You have <span class='blue'>".$bluebalm." blue balms</span>.";
            include('update_feed_alt.php'); // --- update feed
        } else {
            echo $message="<i class='fa fa-arrow-circle-up green'></i>You have <span class='blue'>".$bluebalm." blue balms</span>.";
            include('update_feed_alt.php'); // --- update feed
            $results = $link->query("UPDATE $user SET bluebalm = 3");
        }
        echo $message="</div>";
        include('update_feed_alt.php'); // --- update feed

    }

    // -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy=$row['enemy'];
    // -------------------------------------------------------------------------- After Battle - SAFE ROOM
    if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
        $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
        $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
        $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
        $input!='u' && $input!='up' && $input!='d' && $input!='down') {
        echo "This room is safe.<br/>";
    }
    // -------------------------------------------------------------------------- INITIALIZE temple boss
    if ($input=='attack temple boss' && ($quest47 < 2 || $quest48 < 2 || $quest49 < 2 || $quest50 < 2)) {
        echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You can't attack the Water Temple Guardian yet. You need to complete these quests first by defeating the 4 Water Temple Bosses.</div>";
        include('update_feed.php');   // --- update feed
    }
    // -------------------------------------------------------------------------- INITIALIZE Water Temple Guardian!
    elseif (($input=='attack guardian' || $input=='attack') && $infight==0) {
        if ($input=='attack guardian') {
            $input = 'attack';
        }
        $results = $link->query("UPDATE $user SET enemy = 'Water Temple Guardian'");
        include('battle.php');
    }
    // -------------------------------------------------------------------------- IN BATTLE
    elseif ($infight >=1) {
        if ($input=='attack guardian') {
            $input = 'attack';
        }
        include('battle.php');
    }






    // ---------------------- START ALL QUESTS ---------------------- //
    if ($input=='start quests' || $input=='start quests') {
        if ($quest47 <1) {
            echo $message = "<div class='menuAction'><em class='gold'>You start the Master Temple's Quests! (47 - 50)</em><br>Check your Quests tab to review what needs to be done.</div> ";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET quest47 = 1");
            $results = $link->query("UPDATE $user SET quest48 = 1");
            $results = $link->query("UPDATE $user SET quest49 = 1");
            $results = $link->query("UPDATE $user SET quest50 = 1");
        }
    }

    // ---------------------- QUEST 47) Test of Strength ---------------------- //
    if ($input=='info 47') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 47 Info</strong><br>
		You need to defeat the Thunder Barbarian found at the Red Water Temple. Be careful, the Barbarian hits hard with Power and Critical strikes.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 47') {
        if ($quest47 == 1 && $row['KLthunderbarbarian']>=1) {
            echo $message="<div class='questWin'>
		<h3>Quest 47 Completed!</h3>
		<h4>Test of Strength</h4>
		CONGRATS! You have indeed defeated the powerful Thunder Barbarian! The Water Temple Guardian hands you a shiny pair of Thunder Boots!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 1000 $currency ]<br />
      	[ + Thunder Boots! ]</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET xp = xp + 1000");
            $results = $link->query("UPDATE $user SET currency = currency + 1000");
            $results = $link->query("UPDATE $user SET thunderboots = thunderboots + 1");
            $results = $link->query("UPDATE $user SET quest47 = 2");
        } elseif ($quest47 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 47 Not Complete</strong><br>
		To complete this quest you need to defeat the Thunder Barbarian found at the Red Water Temple.</div>";
            include('update_feed.php'); // --- update feed
        }
    }

    // ---------------------- QUEST 48) Test of Dexterity ---------------------- //
    if ($input=='info 48') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 48 Info</strong><br>
		You need to defeat the Smooth Ranger found at the Green Water Temple. Be prepared for a long fight as the Ranger can heal itself.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 48') {
        if ($quest48 == 1 && $row['KLsmoothranger']>=1) {
            echo $message="<div class='questWin'>
		<h3>Quest 48 Completed!</h3>
		<h4>Test of Dexterity</h4>
 		CONGRATS! You have indeed defeated the Smooth Ranger. The Water Temple Guardian hands you the smoothest pair of Silk Bracers you've ever seen!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 1000 $currency ]<br />
      	[ + Silk Bracers! ]</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET xp = xp + 1000");
            $results = $link->query("UPDATE $user SET currency = currency + 1000");
            $results = $link->query("UPDATE $user SET silkbracers = silkbracers + 1");
            $results = $link->query("UPDATE $user SET quest48 = 2");
        } elseif ($quest48 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 48 Not Complete</strong><br>
		 To complete this quest you need to defeat the Smooth Ranger found at the Green Water Temple.
</div>";
            include('update_feed.php'); // --- update feed
        }
    }
    // ---------------------- QUEST 49) Test of Magic ---------------------- //
    if ($input=='info 49') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 49 Info</strong><br>
		You need to defeat the Coral Wizard found at the Blue Water Temple. Don't expect to use magic to defeat him though, the Wizard is immune.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 49') {
        if ($quest49 == 1 && $row['KLcoralwizard']>=1) {
            echo $message="<div class='questWin'>
		<h3>Quest 49 Completed!</h3>
		<h4>Test of Magic</h4>
 		CONGRATS! You have indeed defeated the mystical Coral Wizard. The Water Temple Guardian hands you a snazzy Coral Necklace!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 1000 $currency ]<br />
      	[ + Coral Necklace! ]</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET xp = xp + 1000");
            $results = $link->query("UPDATE $user SET currency = currency + 1000");
            $results = $link->query("UPDATE $user SET coralnecklace = coralnecklace + 1");
            $results = $link->query("UPDATE $user SET quest49 = 2");
        } elseif ($quest49 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 49 Not Complete</strong><br>
		 To complete this quest you need to defeat the Coral Wizard found at the Blue Water Temple.
</div>";
            include('update_feed.php'); // --- update feed
        }
    }
    // ---------------------- QUEST 50) Test of Defense ---------------------- //
    if ($input=='info 50') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 50 Info</strong><br>
		You need to defeat the Heavy Walrus found at the Yellow Water Temple. You have to hit him hard though, he has very high pure defense.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 50') {
        if ($quest50 == 1 && $row['KLheavywalrus']>=1) {
            echo $message="<div class='questWin'>
		<h3>Quest 50 Completed!</h3>
		<h4>Test of Defense</h4>
		CONGRATS! You have indeed defeated the resilient Heavy Walrus. The Water Temple Guardian hands you a really Heavy Spear!
	  	<h4>Rewards</h4>
  	  	[ + 1000 xp  ]<br />
      	[ + 1000 $currency ]<br />
      	[ + Heavy Spear! ]</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET xp = xp + 1000");
            $results = $link->query("UPDATE $user SET currency = currency + 1000");
            $results = $link->query("UPDATE $user SET heavyspear = heavyspear + 1");
            $results = $link->query("UPDATE $user SET quest50 = 2");
        } elseif ($quest50 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 50 Not Complete</strong><br>
		To complete this quest you need to defeat the Heavy Walrus found at the Yellow Water Temple.
		</div>";
            include('update_feed.php'); // --- update feed
        }
    }





    // -------------------------------------------------------------------------- Battle TRAVEL
    if (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
        $input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
        $input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
        $input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
        $input=='u' || $input=='up' || $input=='d' || $input=='down')  && $infight >= 1) {
        echo 'You cannot leave the room in the middle of battle!<br/>';
        $message="<i>You cannot leave the room in the middle of battle!</i><br/>";
        include('update_feed.php'); // --- update feed
    }

    // -------------------------------------------------------------------------- TRAVEL
    elseif ($input=='sw' || $input=='southwest') {
        echo 'You travel southwest.<br/>';
        $message="<i>You travel southwest to the Green Water Temple.</i></br>".$_SESSION['desc418'];
        include('update_feed.php');   // --- update feed
               $results = $link->query("UPDATE $user SET room = '418'"); // -- room change
               $results = $link->query("UPDATE $user SET endfight = 2"); // -- reset fight
    } elseif ($input=='ne' || $input=='northeast') {
        echo 'You travel northeast.<br/>';
        $message="<i>You travel northeast to the Blue Water Temple.</i></br>".$_SESSION['desc409'];
        include('update_feed.php');   // --- update feed
               $results = $link->query("UPDATE $user SET room = '409'"); // -- room change
               $results = $link->query("UPDATE $user SET endfight = 2"); // -- reset fight
    } elseif ($input=='nw' || $input=='northwest') {
        echo 'You travel northwest.<br/>';
        $message="<i>You travel northwest to the Red Water Temple.</i></br>".$_SESSION['desc423'];
        include('update_feed.php');   // --- update feed
               $results = $link->query("UPDATE $user SET room = '423'"); // -- room change
               $results = $link->query("UPDATE $user SET endfight = 2"); // -- reset fight
    } elseif ($input=='se' || $input=='southeast') {
        echo 'You travel southeast.<br/>';
        $message="<i>You travel southeast to the Yellow Water Temple.</i></br>".$_SESSION['desc405'];
        include('update_feed.php');   // --- update feed
               $results = $link->query("UPDATE $user SET room = '405'"); // -- room change
               $results = $link->query("UPDATE $user SET endfight = 2"); // -- reset fight
    }






    // ----------------------------------- end of room function
    include('function-end.php');
}
