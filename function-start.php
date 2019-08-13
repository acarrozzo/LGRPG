<?php
$funflag=0;
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $retreatroom = $_SESSION['retreatroom'];


    include('cost.php');

    include('function-shop.php');
    include('function-equip.php');
    include('function-magic.php');
    include('function-teleport.php');
    include('function-craft.php');
    include('function-heal.php');
    include('function-cheats.php');
    include('function-transform.php');
    include('function-help.php');
    include('function-sell.php');

    include('skills-learn.php');
    include('spells-learn.php');








    // --------------------------------------------------------------------------- GLOBAL CHAT
    if (strpos($input, 'chat') !== false && strpos($input[0], 'c') !== false && strpos($input[1], 'h') !== false && strpos($input[2], 'a') !== false) {
        $chatString='You chat: '.substr($input, 4, 120);
        $chatString2='<strong>'.$username.'</strong>:'.substr($input, 4, 120);
        file_put_contents("chat-log.html", $chatString2."<br/>", FILE_APPEND); //writes last chat to chat-log.html
        echo $message=$chatString;
        include('update_feed.php'); // --- update feed
  //$funflag=1;
    }

    // --------------------------------------------------------------------------- LOOK!
    elseif ($input=='look' || $input=='l' || $input=='look around' || $input=='+') {
        $message = 'You look around: '.$roomname.$_SESSION['lookdesc']; //$lookdesc
        echo 'You look around: <span class="px16">'.$roomname.'</span><br/>';
        include('update_feed.php'); // --- update feed
    }
    // --------------------------------------------------------------------------- REST HEAL
    elseif ($input=="rest") {
        $sql = "SELECT * FROM $username";
        if (!$result = $link->query($sql)) {
            die('There was an error running the query [' . $link->error . ']');
        }
        // -------------------------DB OUTPUT!
        while ($row = $result->fetch_assoc()) {
            $hpmax=$row['hpmax'];
            $mpmax=$row['mpmax'];
            $physicaltraining=$row['physicaltraining'];
            $mentaltraining=$row['mentaltraining'];
            $hp=$row['hp'];
            $mp=$row['mp'];

            if ($room == '20' || $room == '005b' || $room == '225b' || $room == '226d' || $room == '232x' || $room == '210' || $room == '118' || $room == '307' || $room == '413' || $room == '497' || $room == '308a') {
            } // bypass regular rest if resting at waterfall

            elseif ($hp >= $hpmax && $mp >= $mpmax && $infight == 0) {
                echo $message = "You already have full HP and MP<br/>";
                include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        $results = $link->query("UPDATE $user SET infight = 0"); // -- reset fight
        //if (($hp + $physicaltraining) >$hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); }
        //if (($mp + $mentaltraining) >$mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); }
            } elseif ($infight == 0) {
                if ($hp<$hpmax) {
                    $query = $link->query("UPDATE $user SET hp = hp + $physicaltraining ");
                }
                if ($mp<$mpmax) {
                    $query = $link->query("UPDATE $user SET mp = mp + $mentaltraining ");
                }
                echo $message = "You rest and heal $physicaltraining HP and $mentaltraining MP<br/>";
                include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
        $results = $link->query("UPDATE $user SET infight = 0"); // -- reset fight

        //if (($hp + $physicaltraining) >$hpmax) {$query = $link->query("UPDATE $user SET hp = $hpmax "); }
        //if (($mp + $mentaltraining) >$mpmax) {$query = $link->query("UPDATE $user SET mp = $mpmax "); }
            } else {
                echo $message = "You can't rest in the middle of battle!<br/>";
                include('update_feed.php'); // --- update feed
            }
            $funflag=1;
        }
    } elseif (($input == 'retreat' || $input == 're')) { // ------------ YOU RETREAT
        if ($infight == 1) {
            echo $message="You RETREAT from the fight back into the previous room!<br/>";
            include('update_feed.php'); // --- update feed
        $results = $link->query("UPDATE $user SET room = '$retreatroom'"); // run to previous room
        $results = $link->query("UPDATE $user SET infight = '0'");
            //$results = $link->query("UPDATE $user SET endfight = '1'");
            $results = $link->query("UPDATE $user SET endfight = '1'");
        } else {
            echo $message="<i>You are not in battle. You don't need to retreat.</i><br/>";
            include('update_feed.php'); // --- update feed
        }
    }


    // --------------------------------------------------------------------------- CLEAR FEED
    elseif ($input=="clear feed") {
        echo "you clear the feed<br/>";
        $feed_clear = 'Feed Cleared!!<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/>-<br/><br/>You look around:'.$_SESSION['lookdesc'];
        $query = $link->prepare("UPDATE $user SET feed = ? ");
        $query->bind_param("s", $feed_clear);
        $query->execute();
        $funflag=1;
    }



    // --------------------------------------------------------------------------- reset fight variables
    elseif ($input=="reset fight") {
        $results = $link->query("UPDATE $user SET infight = '0'");
        $results = $link->query("UPDATE $user SET endfight = '0'");
        $funflag=1;
    }
    // --------------------------------------------------------------------------- TURN HINTS ON
    elseif ($input=="turn hints on") {
        echo 'You turn on hints and tips </br>';
        $message ='<br/><i>You turn on hints and tips</i><br/>';
        include('update_feed.php'); // --- update feed ALT
        $funflag=1;
        $_SESSION['hints']=1;
    } elseif ($input=="turn hints off") {
        echo 'You turn off hints and tips </br>';
        $message ='<br/><i>You turn off hints and tips</i><br/>';
        include('update_feed.php'); // --- update feed ALT
        $funflag=1;
        $_SESSION['hints']=2;
    }
    // --------------------------------------------------------------------------- VIEW MAPS!
    elseif ($input=="view room zero map") {
        echo 'You view the room zero map<br/>';
        $message ='<br/><i>You view the room zero map:</i><br/>
	<a title="Forest" target="_blank" rel="map" href="img/lightgray_map_roomzero.jpg">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_roomzero.jpg"><br/>click to open map in new window and view full size
	</a><br/>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    } elseif ($input=="view grassy field map") {
        echo 'You view the grassy field map<br/>';
        $message ='<br/><i>You view the grassy field map:</i><br/>
	<a title="Grassy Field Map" target="_blank" rel="map" href="img/lightgray_map_grassyfield_main.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_grassyfield_main.jpg"><br/>click to open map in new window and view full size
	</a><br/>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    } elseif ($input=="view grassy field underground map") {
        echo 'You view the grassy field map<br/>';
        $message ='<br/><i>You view the grassy field underground map:</i><br/>
	<a target="_blank" rel="map" href="img/lightgray_map_grassyfield_underground.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_grassyfield_underground.jpg"><br/>click to open map in new window and view full size
	</a><br/>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    } elseif ($input=="view forest map") {
        echo 'You view the forest map<br/>';
        $message ='<br/><i>You view the forest map:</i><br/>
	<a title="Forest" target="_blank" rel="map" href="img/lightgray_map_forest_main.jpg">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_forest_main.jpg"><br/>click to open map in new window and view full size
	</a><br/>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    } elseif ($input=="view forest underground map") {
        echo 'You view the forest underground map<br/>';
        $message ='<br/><i>You view the forest underground map:</i><br/>
	<a title="Forest" target="_blank" rel="map" href="img/lightgray_map_forest_underground.jpg">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_forest_underground.jpg"><br/>click to open map in new window and view full size
	</a><br/>';
        include('update_feed_alt.php'); // --- update feed ALT
        $funflag=1;
    }




    // --------------------------------------------------------------------------- NULL COMMAND / REFRESH
    elseif ($input=='') {
        echo '<i>refreshed</i></br>';
        $message = ' ';
        include('update_feed.php'); // --- update feed
$funflag=1;
    }

    // --------------------------------------------------------------------------- command fun flags
    elseif ($input=='stats') {
        $funflag=1;
    }
}
