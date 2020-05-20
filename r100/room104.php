<?php
// -- 104 -- On a Stone Path by a Forest Gate
$roomname = "On a Stone Path by a Forest Gate";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc104'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

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
    $quest11=$row['quest11'];
    $quest12=$row['quest12'];
    $quest13=$row['quest13'];
    $teleport2 = $row['teleport2'];

    $travelingwizardFlag = $row['travelingwizardFlag'];
    $travelingwarriorFlag = $row['travelingwarriorFlag'];



    include('battle-sets/forest-path.php');



    // -------------------------------------------------------------------------- Activate Forest Path Teleport
    if ($teleport2 == 0) {
        $results = $link->query("UPDATE $user SET teleport2 = 1");
        echo $message="<i>You can now teleport to the Forest Path! Click 'forest path' to teleport to this location at any time. </i><br/>";
        include('update_feed.php'); // --- update feed
    }
    // -------------------------------------------------------------------------- ROOM ACTIONS

    // -------------------------------------------------------------------------- READ SIGN!
elseif ($input=='read sign') {  //read sign
   echo '<i>You read the Forest Path Directory</i> <br>  ';
    $message="
   <i>you read the sign:</i>
   <div class='sign'>
   <h3>Forest Path <i>Directory</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
<span class='direc'><input type='submit' name='input1' value='north' /></span> <span class='hilight'>Traveling Wizard ( Spell Trainer ), Kobold Lair, Path to Dark Forest & Stone Mountains</span><br />
<span class='direc'><input type='submit' name='input1' value='northeast' /></span> <span class='hilight'>Forest ( Hunter Bill, Forest Gnome Lots o' Trees )</span><br />
<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='hilight'>Freddie's Leather Farm, Path to Grassy Field</span> <br />
<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Traveling Warrior ( Skill Trainer ), Ogre Lair, Path to Red Town</span><br />
---------------------------------------------------</br>
<span class='hilight'>BATTLE PATHS</span><br>
Head north to train and fight enemies to make you stronger at magic.<br/>
Head south to train and fight enemies to make you stronger at melee.<br>
---------------------------------------------------<br>
<span class='hilight'>FOREST GATE</span><br>
To gain access to the Forest, visit the Red Guard Captain and complete any one of his quests. You can find him all the way north of the Red Town Grand Square.<br>
---------------------------------------------------<br>
</form></div>";
    include('update_feed.php'); // --- update feed
}

    // --------------------------------------------------------------------------- PICK UP MAP
    if ($input=="pick up map") {
        echo 'You pick up the forest map:<br/>';
        $message ='<br/><i>You pick up the forest map. Check your INV to view the map at anytime</i><br/>
	<a target="_blank" rel="map" href="img/lightgray_map_forest_main.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_forest_main.jpg"><br/>
	click to open map in new window and view full size</a><br/>';
        include('update_feed_alt.php'); // --- update feed ALT
        $results = $link->query("UPDATE $user SET forestmap = 1");
    }


    // -------------------------------------------------------------------------- Battle TRAVEL
    elseif (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
        $input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
        $input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
        $input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
        $input=='u' || $input=='up' || $input=='d' || $input=='down')  && $infight >= 1) {
        echo 'You cannot leave the room in the middle of battle!<br/>';
        $message="<i>You cannot leave the room in the middle of battle!</i><br/>";
        include('update_feed.php'); // --- update feed
    }
    // -------------------------------------------------------------------------- ROOM ACTIONS
elseif ($input=='read signOLD') {  //read sign OLD
   echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
North - Kobold Lair, Dark Forest, Mountains<br/>
East - Forest<br/>
West - Freddie's Leather Factory, Grassy Field<br/>
South - Ogre Lair, Red Town, Stone Mines</br>
-------------------------------------------</p>";
    include('update_feed.php'); // --- update feed
}


    // -------------------------------------------------------------------------- TRAVEL


    elseif ($input=='s' || $input=='south') {
        echo 'You travel south<br/>';
        $message="<i>You travel south</i></br>".$_SESSION['desc106'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 106"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        // ---------------------- SKILL FLAG! ---------------------- //
        if ($travelingwarriorFlag==0) {
            echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
			You can now learn new SKILLS from the Traveling Warrior!</div> ";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET travelingwarriorFlag = 1");
        }
    } elseif ($input=='w' || $input=='west') {
        echo 'You travel west<br/>';
        $message="<i>You travel west</i></br>".$_SESSION['desc102'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 102"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='n' || $input=='north') {
        echo 'You travel north<br/>';
        $message="<i>You travel north</i></br>".$_SESSION['desc105'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 105"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        // ---------------------- SKILL FLAG! ---------------------- //
        if ($travelingwizardFlag==0) {
            echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
			You can now learn new SPELLS from the Traveling Wizard!</div> ";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET travelingwizardFlag = 1");
        }
    } elseif ($input=='ne' || $input=='northeast') {
        if ($quest11 == 1 || $quest12 == 1 || $quest13 == 1) {
            echo 'You travel northeast and enter the forest<br/>';
            $message="<i>You travel northeast and enter the forest</i><br/>".$_SESSION['desc116'];
            include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET room = 116"); // -- room change
    $_SESSION['emptytree'] = 0; // reset tree
        } else {
            echo 'As you attempt to enter the forest you are stopped by a Red Guard.<br/>';
            $message="<i>As you attempt to enter the Forest you are stopped by a Red Guard. You will need authorization from the Red Guard Captain to enter. Visit him at the Barracks in the town south of here.  </i><br/>";
            include('update_feed.php'); // --- update feed
        }
    }

    // ----------------------------------- end of room function
    include('function-end.php');
}
