<?php
// -- 017 -- On the Beach
$roomname = "On the Beach";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc017'];
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
    // -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy=$row['enemy'];


    // -------------------------------------------------------------------------- READ SIGN!
    if ($input=='read sign') {
        echo '<i>You read the Beach Sign</i> <br>  ';
        $message="
   <i>you read the sign:</i>
   <div class='sign'>
   <h3>On the Beach <i>Reading a Sign</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
<br>
<p><input type='submit' name='input1' class='hov percent100' value='north'/></p><br>
Go north past the <span class='hilight'>Abandoned Docks</span> to reach the <span class='hilight'>Giant Rock</span>. If you have a pickaxe you can mine some quick stone there.<br>
<br>
<br>
<br>
<p><input type='submit' name='input1' class='hov percent100' value='south'/></p><br>
You can fight Sand Crabs to the south. <br>
</form>
</div>";
        include('update_feed.php'); // --- update feed
    }


    /*
// -------------------------------------------------------------------------- After Battle - SAFE ROOM
if ($endfight == 1 && $input!='n' && $input!='north' && $input!='ne' && $input!='northeast' &&
        $input!='e' && $input!='east' && $input!='se' && $input!='southeast' &&
        $input!='s' && $input!='south' && $input!='sw' && $input!='southwest' &&
        $input!='w' && $input!='west' && $input!='nw' && $input!='northwest' &&
        $input!='u' && $input!='up' && $input!='d' && $input!='down' ) { echo "This room is safe.<br/>"; }
// -------------------------------------------------------------------------- ROOM READY - RAND NUM GENERATOR
if ($infight < 1 && $endfight != 1)
    {	$rand = rand (1,10);
    } 	else {	$rand=0; } // default rand
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
        \*/



    // -------------------------------------------------------------------------- TRAVEL
    elseif ($input=='s' || $input=='south') {
        echo 'You travel south<br/>';
        $message="<i>You travel south</i><br/>".$_SESSION['desc018'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '018'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='n' || $input=='north') {
        echo 'You travel north<br/>';
        $message="<i>You travel north</i><br/>".$_SESSION['desc016'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '016'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='e' || $input=='east') {
        echo 'You travel east<br/>';
        $message="<i>You travel north</i><br/>".$_SESSION['desc014'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '014'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }


    // ----------------------------------- end of room function
    include('function-end.php');
}
