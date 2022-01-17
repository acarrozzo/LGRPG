<?php
// -- 016 -- Abandoned Docks On the Beach
$roomname = "Abandoned Docks On the Beach";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc016'];
//$dangerLVL = $_SESSION['dangerLVL'] = "2"; // danger level

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



/*
// -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy=$row['enemy'];
// -------------------------------------------------------------------------- After Battle - SAFE ROOM
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
        $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
        $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
        $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
        $input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }
// -------------------------------------------------------------------------- ROOM READY - RAND NUM GENERATOR
if ($infight < 1 && $endfight != 1)
    {	$rand = rand (1,10);
    } 	else {	$rand=99; } // default rand
// -------------------------------------------------------------------------- INITIALIZE sand crab - 20%
if(($input=='attack sand crab' || $input=='attack' || $rand <= 2 ) && $infight==0 && $endfight==0)
    {	if ($input=='attack sand crab') { $input = 'attack'; }
        $results = $link->query("UPDATE $user SET enemy = 'Sand Crab'");
        include ('battle.php');	}
// -------------------------------------------------------------------------- IN BATTLE
else if ($infight >=1 )
    { 	if($input=='attack sand crab') { $input = 'attack'; }
        include ('battle.php');	}
        */



    // -------------------------------------------------------------------------- ROOM ACTIONS


    if ($input=='read signOLD') {  //read sign OLDD
        echo $message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
To access the Ocean you need to be flying. You can use a wings potions or wings spell. You can drink a wings potions or cast a wings spell. Buy some potions or learn the spell at Red Town.</br>
-------------------------------------------</p>";
        include('update_feed.php'); // --- update feed
    }






    // -------------------------------------------------------------------------- READ SIGN!
elseif ($input=='read sign') {  //read sign
   echo	 '<i>You read the Blue Ocean Dock Sign</i><br>';

    $message="
   <i>you read the sign:</i>
   <div class='sign'>
   <h3><i class='blue px16'>Blue Ocean </i>DOCKS</h3>
---------------------------------------------------<br>
<span class='px20 blue'>To access the Blue Ocean you need to be in a boat.</span><br>
 Craft a boat using 20 wood. If you don't know how to craft yet, visit Jack Lumber east of here.<br>
---------------------------------------------------
</div>
";
    include('update_feed.php'); // --- update feed
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
        if ($row['equipMount'] == 'wooden boat') {
            echo 'You travel west in your wooden boat to the Blue Ocean!<br/>';
            $message="<i>You travel west in your wooden boat to the Blue Ocean! </i></br>".$_SESSION['desc401'];
            include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '401'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        } else {
            echo $message = "You try to go west to the Blue Ocean but you can't yet. To access it you need a boat! You can craft one out of 20 wood.</br>";
            include('update_feed.php'); // --- update feed
        }
    } elseif ($input=='s' || $input=='south') {
        echo 'You travel south<br/>';
        $message="<i>You travel south</i><br/>".$_SESSION['desc017'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '017'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='n' || $input=='north') {
        echo 'You travel north<br/>';
        $message="<i>You travel north</i><br/>".$_SESSION['desc015'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '015'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }


    // ----------------------------------- end of room function
    include('function-end.php');
}
