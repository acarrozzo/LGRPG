<?php
                        $roomname = "Wooded Mountain Path";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc603'];

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


    include('function-choptree.php');
    include('battle-sets/mountains.php');










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
        $message="<i>You travel east</i></br>".$_SESSION['desc612'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '612'"); // -- room change
            $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='nw' || $input=='northwest') {
        echo 'You travel northwest<br/>';
        $message="<i>You travel northwest</i></br>".$_SESSION['desc605'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '605'"); // -- room change
            $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='se' || $input=='southeast') {
        echo 'You travel southeast<br/>';
        $message="<i>You travel southeast</i></br>".$_SESSION['desc602'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '602'"); // -- room change
            $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='sw' || $input=='southwest') {
        echo 'You travel southwest<br/>';
        $message="<i>You travel southwest</i></br>".$_SESSION['desc604'];
        include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET room = '604'"); // -- room change
            $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }





    // ----------------------------------- end of room function
    include('function-end.php');
}
