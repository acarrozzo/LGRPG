<?php
                        $roomname = "Dragon’s Ledge";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc620'];

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


// -------------------------------------------------------------------------- BATTLE VARIABLES
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $enemy=$row['enemy'];




    if ($input=='get flower' || $input=='pick flower' || $input=='pick up flower') {  // ---- PICK FLOWER
        if ($row['flower'] <= 2) {
            echo $message="You can only pick a flower here if you already have 3 in your inventory. Return to the Grassy Field and then the Red Town Babylon Gardens, and then under the Ocean to get the first 3.
<br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($row['flower'] >= 4) {
            echo 'You cannot pick up another flower here. You already have 4.<br/>';
            $message="<i>You cannot pick up another flower here. You already have 4.</i></br>";
            include('update_feed.php'); // --- update feed
        } else {
            echo 'You pick a flower. You now have 4!<br/>';
            $message="<i>You pick a flower. You now have 4!</i></br>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET flower = flower + 1");
        }
    }


    // -------------------------------------------------------------------------- If room ready create random rand #
    $rand = rand(1, 2);
    // -------------------------------------------------------------------------- INITIALIZE - 1/2
    if (($rand == 1) && $infight==0 && $endfight==0) {
        $results = $link->query("UPDATE $user SET enemy = 'Dragon'");
        include('battle.php');
    }
    // -------------------------------------------------------------------------- IN BATTLE
    elseif ($infight >=1) {
        include('battle.php');
    }

    // include ('battle-sets/mountains.php');


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

    elseif ($input=='e' || $input=='east') {
        echo 'You travel east<br/>';
        $message="<i>You travel east</i></br>".$_SESSION['desc619'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '619'"); // -- room change
            $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }




    // ----------------------------------- end of room function
    include('function-end.php');
}
