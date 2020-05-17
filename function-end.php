<?php

include('function-randomevents.php');

include('function-die.php');
include('function-level.php');
include('function-items.php');
include('function-statuseffects.php');


// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $fire=$row['fire'];
    $craftingtable=$row['craftingtable'];
    $room=$row['room'];

    $lastroom = $_SESSION['lastroom'];

    // -----------------------------------------------------------------------------CRAFTING TABLE AND FIRE DISPLAY!
    if (($craftingtable == $room) && ($fire == $room)  && ($input == 'look' || $room != $lastroom)) {
        $message = "
      <p>A <span class='red'>Crafting Table </span> and <span class='gold'>Cooking Fire </span> is set up here</p>
      <a href data-link2='craft' class='redBG btn'>
      <i class='icon white small'>".file_get_contents("img/svg/table.svg")."</i>
       Craft Now</a> ";
        include('update_feed_alt.php'); // --- update feed
    } elseif (($fire == $room) && ($input == 'look' || $room != $lastroom)) {
        $message = "
        <p>A <span class='red'>Cooking Fire </span> burns here</p>
        <a href data-link2='craft' class='redBG btn'>
        <i class='icon white small'>".file_get_contents("img/svg/fire.svg")."</i> Cook</a> ";
        include('update_feed_alt.php'); // --- update feed
    } elseif (($craftingtable == $room) && ($input == 'look' || $room != $lastroom)) {
        $message = "
        <p>A <span class='red'>Crafting Table </span> is set up here</p>
        <a href data-link2='craft' class='redBG btn'>
        <i class='icon white small'>".file_get_contents("img/svg/table.svg")."</i> Craft Now</a> ";
        include('update_feed_alt.php'); // --- update feed
    }


    // --------------------------------------------------------------------------- GRAND QUEST STARTS
    if ($row['grandquest1']=='0' && ($row['quest1']>='1' || $row['quest2']>='1' || $row['quest3']>='1')) {
        $query = $link->query("UPDATE $user SET grandquest1 = 1 ");
        echo $message = "You start GRAND QUEST 1! Help the good people of the Grassy Field (Complete Quests 1-9)<br/>";
        include('update_feed.php'); // --- update feed
    }




    // --------------------------------------------------------------------------- function flag - DISPLAYS NOTHING
    if ($funflag==1 ||
 $input == "increase str" ||
 $input == "increase dex" ||
 $input == "increase mag" ||
 $input == "increase def" ||
 $room != $lastroom
) {
    }



    // --------------------------------------------------------------------------- SEARCH
    elseif ($input=="search") {
        if ($infight==1000) {
            echo "You cannot search in the middle of battle.</br>";
            $message='<i>You cannot search in the middle of battle.</i><br/>';
            include('update_feed.php'); // --- update feed
        } else {
            echo "You search the room.</br>";
            $message='<i>You search the room and find nothing.</i><br/>';
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        }
        $funflag=1;
    }
    // --------------------------------------------------------------------------- NO DIRECTION
    elseif ($input=='n' || $input=='north' ||
        $input=='ne' || $input=='northeast' ||
        $input=='e' || $input=='east' ||
        $input=='se' || $input=='southeast' ||
        $input=='s' || $input=='south' ||
        $input=='sw' || $input=='southwest' ||
        $input=='w' || $input=='west' ||
        $input=='nw' || $input=='northwest' ||
        $input=='u' || $input=='up' ||
        $input=='d' || $input=='down') {
        echo $message = "<i>You don't see an exit in that direction: $input</i><br/>";
        include('update_feed.php'); // --- update feed
    }

    // --------------------------------------------------------------------------- NOTHING TO ATTACK
    elseif ($input=='attack' || $input=='a') {
        echo $message = "<i>There is nothing here to attack.</i><br/>";
        include('update_feed.php'); // --- update feed
    }

    // --------------------------------------------------------------------------- NOT RECOGNIZED COMMAND
    else {
        echo $message = "<i>$notcommand "."$input</i><br/>";
        include('update_feed.php'); // --- update feed
    }

    $results = $link->query("UPDATE $user SET clicks = clicks + 1"); // -- clicks
} // -end while
