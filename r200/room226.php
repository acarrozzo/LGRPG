<?php
                        $roomname = "Warrior's Guild";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc226'];
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

    $quest19=$row['quest19'];
    $KLogrelieutenant=$row['KLogrelieutenant'];

    // -------------------------------------------------------------------------- Teleport ogre Lair
    if ($input=='teleport to ogre lair') {
        echo 'You teleport to the entrance of the Ogre Lair!<br/>';
        $message="<i>You teleport to the entrance of the Ogre Lair! </i><br/>".$_SESSION['desc111'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '111'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // End fight
    $results = $link->query("UPDATE $user SET infight = 0"); // End Fight
    $message=""; //so doesn't display message in HUD battle status
    }

    // -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
   echo	 '<i>You read the Warrior\'s Guild Sign.</i><br>';

    $message="
   <i>you read the sign:</i>
   <div class='sign darkgrayBG'>
---------------------------------------------------<br>
<span class='px25 lgray'>Warrior's Guild Entrance</span><br>
---------------------------------------------------<br>
Do you enjoy destroying your enemies with massive warhammers and super sharp swords? Do you want to block huge amounts of damage with your shield? Do you want to become the strongest warrior anyone has ever seen?! Well then you want to join the Warrior's Guild. <br/><br/> Find and defeat the Ogre Lieutenant to prove you are worthy. Once in the Guild you can learn stronger skills, purchase better equipment and get access to exclusive Warrior Quests.<br/><br/>Get 2 Free Swords upon Initiation!!<br/>
---------------------------------------------------
</div>
";
    include('update_feed.php'); // --- update feed
}








    // ---------------------- START ALL QUESTS ---------------------- //
    if ($input=='start quests' || $input=='start quest 19') {
        if ($quest19 <1) {
            echo $message = "<div class='menuAction'><em class='gold'>You start the Warrior's Initiation Quest! (19)</em><br>Check your Quests tab to review what needs to be done.</div> ";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET quest19 = 1");
        }
    }
    // ---------------------- QUEST 19) Defeat the Ogre Lieutenant ---------------------- //
    if ($input=='info 19') {
        echo $message="<div class='menuAction'><strong class='green'>Quest 19 Info</strong><br>
		To join the Warrior's Guild you have to defeat the Ogre Lieutenant. His Lair is found in the southwest part of the Forest Map. Follow the path out of town to the north and then go W when you reach the Forest Map. </div>";
        include('update_feed.php'); // --- update feed
    }
    if ($input=='complete 19') {
        if ($KLogrelieutenant >= 1) {
            echo $message='<div class="questWin">
		<h3>Quest 19 Completed!</h3>
		<h4>Defeat the Ogre Lieutenant</h4>
		Congrats! You have indeed slain the Ogre Lieutenant. Welcome to the Warrior\'s Guild! You can enter by heading UP. Your sign up bonus is a new Bastard Sword and Great Sword!!
	  	<h4>Rewards</h4>
  	  	[ + 500 xp  ]<br />
      	[ + 1000 '.$_SESSION['currency'].' ]<br />
      	[ + Bastard Sword (1h) ]<br/>
				[ + Great Sword (2h) ]</div>
				<form id="mainForm" method="post" action="" name="formInput">
				  <button class="blueBG" type="submit" name="input1" value="up">Enter Warrior\'s Guild</button>
					</form>';

            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET xp = xp + 500");
            $results = $link->query("UPDATE $user SET currency = currency + 1000");
            $results = $link->query("UPDATE $user SET bastardsword = bastardsword + 1");
            $results = $link->query("UPDATE $user SET greatsword = greatsword + 1");
            $results = $link->query("UPDATE $user SET quest19 = 2");
        } elseif ($quest19 == 1) {
            echo $message="<div class='menuAction'><strong class='green'>Quest 19 Not Complete</strong><br>
	To complete this quest you need to find and kill the Ogre Lieutenant. Find him in his lair north of here.</div>";
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
    elseif ($input=='se' || $input=='southeast') {
        echo 'You travel southeast<br/>';
        $message="<i>You travel southeast</i></br>".$_SESSION['desc210'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 210"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='u' || $input=='up') {
        if ($quest19 >=2) {
            echo 'You travel up<br/>';
            $message="<i>You travel up</i></br>".$_SESSION['desc226a'];
            include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '226a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        } else {
            echo $message = "You need to complete the quest here to become a member of the Warriors Guild!";
            include('update_feed.php'); // --- update feed
        }
    }







    // ----------------------------------- end of room function
    include('function-end.php');
}
