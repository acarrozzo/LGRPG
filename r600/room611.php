<?php
                        $roomname = "Star City Blue Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc611'];

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
    $quest70=$row['quest70'];

    $KLbutcher=$row['KLbutcher'];
    $KLkingsquid=$row['KLkingsquid'];
    $KLgiantmountaingiant=$row['KLgiantmountaingiant'];




    // -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
   echo	 '<i>You read the Blue Gate Sign.</i><br>';

    $message="
   <i>you read the sign:</i>
   <div class='sign'>
---------------------------------------------------<br>
<span class='px30 gold'>Star City Blue Gate</span><br>
---------------------------------------------------<br>
Find the 3 keys to open the Gate! <br/>
KEY OF WRATH: Dropped by the one who made Red Beard fat. <br/>
KEY OF GREED: Dropped by the slimy king of the ocean. <br/>
KEY OF PRIDE: Dropped by the one who stands atop the tallest peak <br/>
---------------------------------------------------
</div>";
    include('update_feed.php'); // --- update feed
}




    // ---------------------- START ALL QUESTS ---------------------- //
    if ($input=='start quest' || $input=='start quest 70') {
        if ($quest70 < 1) {
            echo $message = "<div class='menuAction'><em class='gold'>You approach Rigel the Brave requesting access to the City. He tells you to return with the 3 required keys. (70)</em><br>Check your Quests tab to review what needs to be done.</div> ";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET quest70 = 1");
        }
    }



    // ---------------------- QUEST 70) Ranger's Guild Initiation ---------------------- //
    if ($input=='info 70') {
        echo $message="<div class='menuAction'><strong class='green px30'>Quest 70 Info</strong><br>
		To complete this quest and open the city gate you must collect the 3 required keys. </div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='complete 70') {
        if ($KLbutcher >= 1 && $KLkingsquid >= 1 && $KLgiantmountaingiant >= 1) {
            echo $message="<div class='questWin'>
		<h3>Quest 70 Completed!</h3>
		<h4>) Open the Gate	</h4>
		CONGRATS! You hand Rigel the Key of Wrath, Greed, and Pride. He lifts them up to the sky and the gate’s magic pulls them right from his hand. The 3 keys all click in unison and the gate opens for you. Welcome to Star City.
	  	<h4>Rewards</h4>
  	  	[ + 10,000 xp  ]<br />
      	[ + 50,000 $currency ]<br />
		[ + Access to Star City! ]</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET xp = xp + 10000");
            $results = $link->query("UPDATE $user SET currency = currency + 50000");
            $results = $link->query("UPDATE $user SET quest70 = 2");
        } elseif ($quest70 == 1) {
            echo $message="<div class='menuAction'><strong class='green px30'>Quest 70 Not Complete</strong><br>
	To complete this quest and open the city gate you must collect the 3 required keys. </div>";
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
    elseif ($input=='w' || $input=='west') {
        if ($quest70 == 2) {
            echo 'You walk through the Blue Gates and enter Star City!<br/>';
            $message="<i>You walk through the Blue Gates and enter Star City!</i></br>".$_SESSION['desc701'];
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '701'"); // -- room change
            $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        } else {
            echo $message="<i>You can't enter Star City until you complete quest 70.</i><br/>";
            include('update_feed.php'); // --- update feed
        }
    } elseif ($input=='e' || $input=='east') {
        echo 'You travel east<br/>';
        $message="<i>You travel east</i></br>".$_SESSION['desc610'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '610'"); // -- room change
            $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }



    // ----------------------------------- end of room function
    include('function-end.php');
}
