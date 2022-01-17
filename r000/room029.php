<?php
                        $roomname = "Stone Path North | Grand Quest Pillar";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc029'];
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
    //	$results = $link->query("UPDATE $user SET grandquest2 = 0");


    $grandquest1=$row['grandquest1'];
    $grandquest2=$row['grandquest2'];
    $grandquest3=$row['grandquest3'];
    $grandquest4=$row['grandquest4'];
    $grandquest5=$row['grandquest5'];

    $quest1=$row['quest1'];
    $quest2=$row['quest2'];
    $quest3=$row['quest3'];
    $quest4=$row['quest4'];
    $quest5=$row['quest5'];
    $quest6=$row['quest6'];
    $quest7=$row['quest7'];
    $quest8=$row['quest8'];
    $quest9=$row['quest9'];

    $quest10=$row['quest10'];
    $quest11=$row['quest11'];
    $quest12=$row['quest12'];
    $quest13=$row['quest13'];
    $quest14=$row['quest14'];
    $quest15=$row['quest15'];
    $quest16=$row['quest16'];
    $quest17=$row['quest17'];
    $quest18=$row['quest18'];
    $quest19=$row['quest19'];
    $quest20=$row['quest20'];
    $quest21=$row['quest21'];
    $quest22=$row['quest22'];
    $quest23=$row['quest23'];
    $quest24=$row['quest24'];
    $quest25=$row['quest25'];
    $quest26=$row['quest26'];
    $quest27=$row['quest27'];
    $quest28=$row['quest28'];
    $quest29=$row['quest29'];

    $quest30=$row['quest30'];
    $quest31=$row['quest31'];
    $quest32=$row['quest32'];
    $quest33=$row['quest33'];
    $quest34=$row['quest34'];
    $quest35=$row['quest35'];
    $quest36=$row['quest36'];
    $quest37=$row['quest37'];
    $quest38=$row['quest38'];
    $quest39=$row['quest39'];

    $quest40=$row['quest40'];
    $quest41=$row['quest41'];
    $quest42=$row['quest42'];
    $quest43=$row['quest43'];
    $quest44=$row['quest44'];
    $quest45=$row['quest45'];
    $quest46=$row['quest46'];
    $quest47=$row['quest47'];
    $quest48=$row['quest48'];
    $quest49=$row['quest49'];

    $quest50=$row['quest50'];

    if (1==2) {
    } //nada

    // -------------------------------------------------------------------------- GQ1) GRASSY FIELD
    elseif ($input=='grand quest 1') {
        if ($grandquest1 == 0) {
            echo $message = "You Start Grand Quest 1) Grassy Field Savior!<br/>";
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET grandquest1 = 1"); // -- room change
        } elseif ($grandquest1 == 2) {
            echo $message="You already completed Grand Quest 1) Grassy Field Savior</br>";
            include('update_feed.php'); // --- update feed
        } elseif ($grandquest1 == 1 && ($quest1==2 && $quest2==2 && $quest3==2 && $quest4==2 && $quest5==2 && $quest6==2 && $quest7==2 && $quest8==2 && $quest9==2 && $quest10==2)) {
            echo 'You have Completed Grand Quest 1) Grassy Field Savior!';
            $message = "<div class='questWin'><h5>Grand Quest 1 Completed!</h3>
		<h4>Grassy Field Savior</h4>
		Congrats! You have saved the Grassy Field from certain doom!
	  	<h4>Rewards</h4>
  	  	[ + 200 xp  ]<br />
      	[ + 5000 $currency ]</div><br/>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 5000");
            $results = $link->query("UPDATE $user SET xp = xp + 200");
            $results = $link->query("UPDATE $user SET grandquest1 = 2");
        } elseif ($grandquest1 == 1) {
            echo $message = 'Grand Quest 1 not completed yet. To complete GQ1 you need to help the good people in the Grassy Field. Help the Old Man, the Young Soldier and Jack Lumber. O, and Freddy too! (Complete quests 1-10)<br/>';
            include('update_feed.php'); // --- update feed
        }
    }


    // -------------------------------------------------------------------------- GQ2) Red Town
    elseif ($input=='grand quest 2') {
        if ($grandquest2 == 0) {
            echo $message = "You Start Grand Quest 2) Red Town Savior!<br/>";
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET grandquest2 = 1"); // -- room change
        } elseif ($grandquest2 == 2) {
            echo $message="You already completed Grand Quest 2) Red Town Savior</br>";
            include('update_feed.php'); // --- update feed
        } elseif ($grandquest2 == 1 &&
    ($quest11==2 && $quest12==2 && $quest13==2 && $quest14==2 && $quest15==2 && $quest16==2 && $quest17==2 && $quest18==2 && $quest19==2 && $quest20==2 && $quest21==2 && $quest22==2 && $quest23==2 && $quest24==2 && $quest25==2 && $quest26==2 && $quest27==2 && $quest28==2 && $quest29==2 && $quest30==2)) {
            echo 'You have Completed Grand Quest 2) Red Town Savior!';
            $message = "<div class='questWin'><h5>Grand Quest 2 Completed!</h3>
		<h4>Red Town Savior</h4>
		Congrats! You have saved Red Town and the Forest from certain doom!
	  	<h4>Rewards</h4>
  	  	[ + 5000 xp  ]<br />
      	[ + 10000 $currency ]</div><br/>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 10000");
            $results = $link->query("UPDATE $user SET xp = xp + 5000");
            $results = $link->query("UPDATE $user SET grandquest2 = 2");
        } elseif ($grandquest2 == 1) {
            echo $message = 'Grand Quest 2 not completed yet. To complete GQ2 you need to help the good people of the Forest and Red Town. (Complete quests 11-30)<br/>';
            include('update_feed.php'); // --- update feed
        }
    }



    // -------------------------------------------------------------------------- GQ3) Stone Mine
    elseif ($input=='grand quest 3') {
        if ($grandquest3 == 0) {
            echo $message = "You Start Grand Quest 3) Stone Mine Savior!<br/>";
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET grandquest3 = 1"); // -- room change
        } elseif ($grandquest3 == 2) {
            echo $message="You already completed Grand Quest 3) Stone Mine Savior</br>";
            include('update_feed.php'); // --- update feed
        } elseif ($grandquest3 == 1 &&
    ($quest31==2 && $quest32==2 && $quest33==2 && $quest34==2 && $quest35==2 && $quest36==2 && $quest37==2 && $quest38==2 && $quest39==2 && $quest40==2 && $quest41==2 && $quest42==2 && $quest43==2 && $quest44==2 && $quest45==2 && $quest46==2 && $quest47==2 && $quest48==2 && $quest49==2 && $quest50==2)) {
            echo 'You have Completed Grand Quest 3) Stone Mine Savior!';
            $message = "<div class='questWin'><h5>Grand Quest 3 Completed!</h3>
		<h4>Stone Mine Savior</h4>
		Congrats! You have saved the Stone Mine and the Blue Ocean from certain doom!
	  	<h4>Rewards</h4>
  	  	[ + 10,000 xp  ]<br />
      	[ + 20,000 $currency ]</div><br/>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET currency = currency + 20000");
            $results = $link->query("UPDATE $user SET xp = xp + 10000");
            $results = $link->query("UPDATE $user SET grandquest3 = 2");
        } elseif ($grandquest3 == 1) {
            echo $message = 'Grand Quest 3 not completed yet. To complete GQ3 you need to help the good people of the Stone Mine and Blue Ocean. (Complete quests 31-50)<br/>';
            include('update_feed.php'); // --- update feed
        }
    }







    // -------------------------------------------------------------------------- Battle TRAVEL
    if (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
        $input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
        $input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
        $input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
        $input=='u' || $input=='up' || $input=='d' || $input=='down')   && $infight >= 1) {
        echo 'You cannot leave the room in the middle of battle!<br/>';
        $message="<i>You cannot leave the room in the middle of battle!</i><br/>";
        include('update_feed.php'); // --- update feed
    }
    // -------------------------------------------------------------------------- TRAVEL

    elseif ($input=='s' || $input=='south') {
        echo 'You travel south<br/>';
        $message="<i>You travel south</i></br>".$_SESSION['desc005'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '005'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='nw' || $input=='northwest') {
        echo 'You travel northwest<br/>';
        $message="<i>You travel northwest</i></br>".$_SESSION['desc030'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '030'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }






    // ----------------------------------- end of room function
    include('function-end.php');
}
