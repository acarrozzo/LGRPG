<?php
                        $roomname = "Town Hall Plaza";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc221'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

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
    $quest21=$row['quest21'];
    $quest22=$row['quest22'];
    $quest23=$row['quest23'];

    $flower=$row['flower'];
    $cookedmeat=$row['cookedmeat'];
    $KLmasterthief=$row['KLmasterthief'];


    // ---------------------- START ALL QUESTS ---------------------- //
    if ($input=='start quests') {
        if ($quest21 <1 || $quest22 <1 || $quest23 <1) {
            echo $message = "<div class='menuAction'><em class='gold'>You start the Red Town Plaza Quests! (21 - 23)</em><br>Check your Quests tab to review what needs to be done.</div> ";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET quest21 = 1");
            $results = $link->query("UPDATE $user SET quest22 = 1");
            $results = $link->query("UPDATE $user SET quest23 = 1");
        }
    }






    // ---------------------- QUEST 21) Twice as Nice ---------------------- //
    if ($input=='info 21') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 21 Info</strong><br>
		You need 2 flowers. Return to the Grassy Field to pick the first flower if you don't have it yet. Then you can pick a 2nd one from the Babylon Gardens found right here in Town Hall.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 21') {
        if ($flower >= 2) {
            echo $message="<div class='questWin'>
		<h3>Quest 21 Completed!</h3>
		<h4>Twice as Nice</h4>
		Congrats! You have picked 2 flowers! Very difficult i'm sure. You get 5 wings potions and 5 gills potions.
	  	<h4>Rewards</h4>
  	  	[ + 200 xp  ]<br />
      	[ + 200 $currency ]<br />
      	[ + 5 Wings Potions ]<br/>
      	[ + 5 Gills Potions ]</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 200");
            $results = $link->query("UPDATE $user SET xp = xp + 200");
            $results = $link->query("UPDATE $user SET wingspotion = wingspotion + 5");
            $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 5");
            $results = $link->query("UPDATE $user SET flower = flower - 2");
            $results = $link->query("UPDATE $user SET quest21 = 2");
        } elseif ($quest21 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 21 Not Complete</strong><br>
	To complete this quest you need to pick 2 flowers. You can get one at the Grassy Field and another one here at the Babylon Gardens.</div>";
            include('update_feed.php'); // --- update feed
        }
    }




    // ---------------------- QUEST 22) Cookin up some Meat-a-balls ---------------------- //
    if ($input=='info 22') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 22 Info</strong><br>
		Many creatures drop meat when slain. You can cook the raw meat over a fire [craft] and bring the cooked pieces here.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 22') {
        if ($cookedmeat >= 5) {
            echo $message="<div class='questWin'>
		<h3>Quest 22 Completed!</h3>
		<h4>Cookin up some Meat-a-balls</h4>
		Congrats! You hand 5 pieces of meat to the Chef. He shows you how to cook authentic italian meatballs and gives you 5 of them as a reward for your help. Meatballs heal 400 HP.
	  	<h4>Rewards</h4>
  	  	[ + 200 xp  ]<br />
      	[ + 200 $currency ]<br />
      	[ + 5 Meatballs ]<br/>
      	[ Can Cook Meatballs! ]</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 200");
            $results = $link->query("UPDATE $user SET xp = xp + 200");
            $results = $link->query("UPDATE $user SET meatball = meatball + 5");
            $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat - 5");
            $results = $link->query("UPDATE $user SET quest22 = 2");
        } elseif ($quest22 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 22 Not Complete</strong><br>
	 To complete this quest you need 5 cooked pieces of meat.</div>";
            include('update_feed.php'); // --- update feed
        }
    }







    // ---------------------- QUEST 23) Stolen Teddy Bear ---------------------- //
    if ($input=='info 23') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 23 Info</strong><br>
		You see a little girl crying in her parent's arms. They inform you that their little girl's teddy bear has been stolen. They know it was one of the thieves that hide down in the sewers. Find their headquarters and defeat their master to retrieve the teddy bear.</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 23') {
        if ($KLmasterthief >= 1) {
            echo $message="<div class='questWin'>
		<h3>Quest 23 Completed!</h3>
		<h4>Stolen Teddy Bear</h4>
		Congrats! Little Suzie cheers for joy when you hand her the stuffed animal.  She decides she loves her Teddy Bear more than her new pet hamster, so she gives the pet to you. Your new Pet Hampster will chew your enemies HP down little by little.
	  	<h4>Rewards</h4>
  	  	[ + 500 xp  ]<br />
      	[ + 500 $currency ]<br />
      	[ + Pet Hampster!! ]</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 500");
            $results = $link->query("UPDATE $user SET xp = xp + 500");
            $results = $link->query("UPDATE $user SET pethampster = pethampster + 1");
            $results = $link->query("UPDATE $user SET quest23 = 2");
            $results = $link->query("UPDATE $user SET equipPet = 'pet hampster'");
        } elseif ($quest23 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 23 Not Complete</strong><br>
	  To complete this quest you need to defeat the Master Thief, you can find him in the Sewers below town.</div>";
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
    elseif ($input=='n' || $input=='north') {
        echo 'You travel north<br/>';
        $message="<i>You travel north</i></br>".$_SESSION['desc222'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 222"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='sw' || $input=='southwest') {
        echo 'You travel southwest<br/>';
        $message="<i>You travel southwest</i></br>".$_SESSION['desc218'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 218"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }





    // ----------------------------------- end of room function
    include('function-end.php');
}
