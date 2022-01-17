<?php
// -- 014 -- Dirt Road West
$roomname = "Dirt Road West";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc014'];
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

// -------------------------------------------------------------------------- ROOM ACTIONS

    if ($input == 'rest') {
        echo $message="<h4 class='dirt'>While resting you sleep walk and stumble upon a secret cache on the side of the road!</h4>
        <p>Master Blade • Off Hand Mace • Silver Pajamas • Silver Slippers • 100 Red Balm • 100 Blue Balm • Double HP & MP</p>";
        include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET hp = hpmax + hpmax");
        $results = $link->query("UPDATE $user SET mp = mpmax + mpmax");
        $results = $link->query("UPDATE $user SET masterblade = 1");
        $results = $link->query("UPDATE $user SET offhandmace = 1");
        $results = $link->query("UPDATE $user SET silverpajamas = 1");
        $results = $link->query("UPDATE $user SET silverslippers = 1");
        $results = $link->query("UPDATE $user SET redbalm = 100");
        $results = $link->query("UPDATE $user SET bluebalm = 100");
    }





    // -------------------------------------------------------------------------- TRAVEL
    if ($input=='w' || $input=='west') {
        echo 'You travel west<br/>';
        $message="<i>You travel west</i><br/>".$_SESSION['desc017'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '017'"); // -- room change
    } elseif ($input=='e' || $input=='east') {
        echo 'You travel east<br/>';
        $message="<i>You travel east</i><br/>".$_SESSION['desc004'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '004'"); // -- room change
    }


    // ----------------------------------- end of room function
    include('function-end.php');
}
