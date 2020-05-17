<?php
// -- 015 -- On the Beach
$roomname = "On the Beach";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc015'];
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

// -------------------------------------------------------------------------- ROOM ACTIONS

    $pickaxe = $row['pickaxe'];
    $stone = $row['stone'];


    if ($input=='mine stone') {  // --- mine stonex
        if ($pickaxe >= 1 && $stone < 10) {
            $stoneQty = rand(2, 4);
            echo 'You mine some stone [ '.+$stoneQty.' stone ]<br/>';
            $message="You mine some stone [ +$stoneQty stone ]</br>";
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET stone = stone + $stoneQty"); // -- room change
        $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        } elseif ($pickaxe >= 1 && $stone >=10) {
            echo $message = "You can't mine more than 10 stone here!<br/>";
            include('update_feed.php'); // --- update feed
        } else {
            echo 'You need a pickaxe to mine stone. You can make one at a Crafting Table.<br/>';
            $message="You need a pickaxe to mine stone. You can make one at a Crafting Table.</br>";
            include('update_feed.php'); // --- update feed
        }
    }

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
    // -------------------------------------------------------------------------- Battle TRAVEL
    if (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
            $input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
            $input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
            $input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
            $input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
        echo 'You cannot leave the room in the middle of battle!<br/>';
        $message="<i>You cannot leave the room in the middle of battle!</i><br/>";
        include ('update_feed.php'); // --- update feed
        }

    */

    // -------------------------------------------------------------------------- TRAVEL
    elseif ($input=='s' || $input=='south') {
        echo 'You travel south<br/>';
        $message="<i>You travel south</i><br/>".$_SESSION['desc016'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '016'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }

    // ----------------------------------- end of room function
    include('function-end.php');
}
