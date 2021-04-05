<?php
                        $roomname = "Wizard's Guild";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225'];
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

// include ('battle-sets/thief.php');

    $quest20=$row['quest20'];
    $KLkoboldmaster=$row['KLkoboldmaster'];



    // -------------------------------------------------------------------------- Teleport Kobold Lair
    if ($input=='teleport to kobold lair') {
        echo 'You teleport to the entrance of the Kobold Lair!<br/>';
        $message="<i>You teleport to the entrance of the Kobold Lair! </i><br/>".$_SESSION['desc115'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '115'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // End fight
    $results = $link->query("UPDATE $user SET infight = 0"); // End Fight
    $message=""; //so doesn't display message in HUD battle status
    }


    // -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
   echo	 '<i>You read the Wizard\'s Guild Sign.</i><br>';

    $message="
   <i>you read the sign:</i>
   <div class='sign darkgrayBG'>
---------------------------------------------------<br>
<span class='px25 lgray'>Wizard's Guild Entrance</span><br>
---------------------------------------------------<br>
Do you like hurling great balls of fire at your enemies? Do you want to regenerate health using powerful magic? Do you dream about flying through the sky like a dragon? Well then you want to join the Wizard's Guild!<br/><br/>
Simply travel to the Kobold Lair and defeat their Master to prove you are worthy. You can then learn stronger spells, access exclusive quests and purchase better wizardry items.<br/><br/>
Get 2 Free Wizard Items upon Initation! <br/>
---------------------------------------------------
</div>
";
    include('update_feed.php'); // --- update feed
}

    // ---------------------- START ALL QUESTS ---------------------- //
    if ($input=='start quests' || $input=='start quest 20') {
        if ($quest20 <1) {
            echo $message = "<div class='menuAction'><em class='gold'>You start the Wizard Initiation Quest! (20)</em><br>Check your Quests tab to review what needs to be done.</div> ";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET quest20 = 1");
        }
    }
    // ---------------------- QUEST 20) Defeat the Kobold Master ---------------------- //
    if ($input=='info 20') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 20 Info</strong><br>
		To join the Wizards Guild you have to defeat the Kobold Master. His Lair is found in the northwest part of the Forest Map. Follow the path out of town all the way north and then go SW when you can't go any further. </div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 20') {
        if ($KLkoboldmaster >= 1) {
            echo $message='<div class="questWin">
		<h3>Quest 20 Completed!</h3>
		<h4>Defeat the Kobold Master</h4>
		Congrats! You have indeed slain the Kobold Master. Welcome to the Wizard\'s Guild! You can enter by heading UP. Your signing bonus is a new Wizard Staff and Wizard Hat!!
	  	<h4>Rewards</h4>
  	  	[ + 500 xp  ]<br />
      	[ + 1000 '.$_SESSION['currency'].' ]<br />
      	[ + Wizard Hat ]<br/>
		[ + Wizard Staff ]</div>

		<form id="mainForm" method="post" action="" name="formInput">
			<button class="purpleBG" type="submit" name="input1" value="up">Enter Wizard\'s Guild</button>
			</form>';

            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET xp = xp + 500");
            $results = $link->query("UPDATE $user SET currency = currency + 1000");
            $results = $link->query("UPDATE $user SET wizardhat = wizardhat + 1");
            $results = $link->query("UPDATE $user SET wizardstaff = wizardstaff + 1");
            $results = $link->query("UPDATE $user SET quest20 = 2");
        } elseif ($quest20 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 20 Not Complete</strong><br>
	To complete this quest you need to find and kill the Kobold Master. Find him in his lair north of here.</div>";
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
    elseif ($input=='nw' || $input=='northwest') {
        echo 'You travel northwest<br/>';
        $message="<i>You travel northwest</i></br>".$_SESSION['desc210'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 210"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='u' || $input=='up') {
        if ($quest20 >=2) {
            echo 'You travel up<br/>';
            $message="<i>You travel up</i></br>".$_SESSION['desc225a'];
            include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        } else {
            echo $message = "You need to complete the quest here to become a member of the Wizards Guild!";
            include('update_feed.php'); // --- update feed
        }
    }







    // ----------------------------------- end of room function
    include('function-end.php');
}
