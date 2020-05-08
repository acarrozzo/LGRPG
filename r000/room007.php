<?php
// -- 007 -- Grassy Field Cave Entrance
$roomname = "Grassy Field Cave Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc007'];
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
    $quest4=$row['quest4'];


    // -------------------------------------------------------------------------- ROOM ACTIONS

    if ($input=='read signXX') {  //read sign
        echo $message ="<i>You read the sign:</i><br/>Beware the spiders and scorpions that live in the cave to the south. You will need a weapon if you want to survive. Go west of here and grab a sword and shield if you haven't already.<br/>";
        include('update_feed.php'); // --- update feed
    }

    // -------------------------------------------------------------------------- READ SIGN!
if ($input=='read sign') {  //read sign
   echo	 '<i>You read the Spider Cave Entrance Sign:</i><br>';

    $message="
   <i>you read the sign:</i>
   <div class='sign'>
   <h3>Spider Cave <span class='darkestgray'>Entrance </span></h3>
<p>Beware the spiders and scorpions that live in the cave to the south. You will need a weapon if you want to survive. </p>
<strong class='darkestgray'>Go west of here and equip a sword and shield if you want to enter the cave.</strong>
</div>
";
    include('update_feed.php'); // --- update feed
}




    // -------------------------------------------------------------------------- TRAVEL
    elseif ($input=='n' || $input=='north') {
        echo 'You travel north<br/>';
        $message="<i>You travel north</i><br/>".$_SESSION['desc006'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '006'");// -- room change
    } elseif ($input=='nw' || $input=='northwest') {
        echo 'You travel northwest<br/>';
        $message="<i>You travel northwest</i><br/>".$_SESSION['desc001'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '001'");// -- room change
    } elseif ($input=='w' || $input=='west') {
        echo 'You travel west<br/>';
        $message="<i>You travel west</i><br/>".$_SESSION['desc002'];
        include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '002'");// -- room change
    } elseif ($input=='s' || $input=='south') {
        //if($quest4 < 2) {
        //	echo $message="<i>You need a weapon before you can enter the Spider Cave! Go 3 spaces west of here, talk to the Young Soldier and complete QUEST 4 to get your first Sword & Shield (or 2-Handed Sword!)</i><br/>";
        if ($row['equipR']=='fists') {
            echo $message="<i>You can't enter the Spider Cave without a weapon! Go 3 spaces west of here and talk to the Young Soldier to get a sword.</i><br/>";
            include('update_feed.php'); // --- update feed
        } else {
            echo 'You enter the Spider Cave<br/>';
            $message="<i>You go south and enter the spider cave</i><br/>".$_SESSION['desc008'];
            include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = '008'"); // -- room change
    $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        }
    }
    echo 'XXX'.$row['equipR'];

    // ----------------------------------- end of room function
    include('function-end.php');
}
