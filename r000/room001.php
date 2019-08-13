<?php

// -- 001 -- Grassy Field Crossroads
$roomname = "Grasslands Crossroads";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc001'];
////$dangerLVL = $_SESSION['dangerLVL'] = "111"; // danger level

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
    $chest1 = $row['chest1'];
    $goldkey = $row['goldkey'];
    $teleport1 = $row['teleport1'];
    $pajamashamanFlag = $row['pajamashamanFlag'];


    // -------------------------------------------------------------------------- Activate Grassy Field Teleport
    if ($row['teleport1'] == 0) {
        $results = $link->query("UPDATE $user SET teleport1 = 1");
        echo $message="<i>You can now teleport to the Grassy Field! Go to the WORLD tab and click GRASSY FIELD to teleport to this location at any time. </i><br/>";
        include('update_feed.php'); // --- update feed
    }

    // -------------------------------------------------------------------------- ROOM ACTIONS

    if ($input=='help') {
        echo 'help info<br/>';
        $message="<i>Hey there $username. Right now you are standing in the middle of a grassy field and can run off in any direction you like<br/><br/>
	Explore the area but know you can't get too far without first talking to the Old Man and Young Soldier to the southwest. Go visit them and do what they ask. You will then get the key neccesary to open this chest, which is needed to talk to Jack.<br/><br/>
	Feel free to explore the area as much as you like. There is no time limit and you can take a break and return back at any time.</i><br/>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='ex sign') {  //ex sign
   echo 'You examine the sign.<br/>';
        $message="<i>You examine the sign:</i><br />The sign is made of wood<br>";
        include('update_feed.php'); // --- update feed
    }
    // -------------------------------------------------------------------------- READ SIGN!
    elseif ($input=='read sign') {
        echo '<i>You read the Grassy Field Directory</i> <br>  ';
        $message="
<i>you read the sign:</i>
<div class='sign'>
<h3>Grassy Field <span class='darkestgray'>Directory</span></h3>
<form id='mainForm' method='post' action='' name='formInput'>
<p><input type='submit' name='input1' class='darkestgray' value='southwest' /> Wood Cabin</p>
<p><input type='submit' name='input1' class='darkestgray' value='northwest' /> Healing Waterfall </p>
<p><input type='submit' name='input1' class='darkestgray' value='west' /> Beach</span> </p>
---------------------------------------------------</br>
<p>Visit the <span class='darkestgray'>OLD MAN</span> at the cabin to start your first quests.</p>
---------------------------------------------------
</form>
</div>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='read signOLD') {  //read sign
   echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
GRASSY FIELD DIRECTORY<br/>
SW - Log Cabin (Old Man &amp; Young Soldier)<br />
NE - Pajama Shaman (shop, sell, skills, &amp; spells) <br />
NW - Healing Glade (rest to heal) <br />
SE - Spider Cave [DANGER] (gain xp, items &amp; ".$currency.") <br />
North - Mountains - off limits<br />
East - Jack LUMBER'S Forest Gate<br />
South - Bat Cave, Stone Mines <br />
West - Beach, Ocean <br />
-------------------------------------------</br>
1) VISIT the OLD MAN &amp; YOUNG SOLDIER for the GOLD KEY.<br/>
2) VISIT JACK LUMBER to gain access to the FOREST</br>
-------------------------------------------</p>";
        include('update_feed.php'); // --- update feed
    }

    // ------------------------------------- ------------------------------------- CHEST 1 Boomerang
    elseif ($input=='ex chest') {
        echo 'You examine the chest.<br/>';
        $message="<i>You examine the chest:<br />The chest is made of solid gold and is shut tight. Looks like you need a key.</i><br>";
        include('update_feed.php'); // --- update feed
    } elseif ($input=='open chest' || $input=='unlock chest') {
        if ($chest1 >= 1) { 	 // --- already opened
            echo 'You already opened this gold chest. Remember that sweet boomerang?<br/>';
            $message="<i>You already opened this gold chest. Remember that sweet boomerang?</i>";
            include('update_feed.php'); // --- update feed
        } elseif (($chest1 == 0) &&  ($row['goldkey'] <= 0)) {  // ---- no key
    echo $message="<i>You need a Gold Key to open this chest. You can get one by completing Quest 5 from the Young Soldier. You can find him by going southwest and then west.</i><br/>";
            include('update_feed.php'); // --- update feed
        } elseif ($chest1 > 0 || $goldkey >= 1) {  // ---- open!
    echo 'You use your golden key to open the chest!<br/>';
            $message="You use your golden key to open the chest!<br/>";
            include('update_feed.php'); // --- update feed
            $cash = rand(100, 200);
            $message = "<i>the chest contains:</i>
	<div class='goldchestopen'>
	<h3>Grassy Field</h3>
	<h3>Gold Chest</h3>
	<p>+ 50 XP</p>
	<p>+ $cash $currency</p>
	<p>+ 3 Red Potions</p>
	<p>+ 5 Cooked Meat</p>
	<p>+ 1 Silver Key</p>
	<p>+ Glowing Brace! <span class='px14'>(+1 mag)</span></p>
	<p class='px25'>+ Boomerang! <span class='px14'>(+1 dex)</span></p>
	</div>";
            include('update_feed.php'); // --- update feed
            $results = $link->query("UPDATE $user SET xp = xp + 50");
            $results = $link->query("UPDATE $user SET currency = currency + $cash");
            $results = $link->query("UPDATE $user SET redpotion = redpotion + 3");
            $results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 3");
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
            $results = $link->query("UPDATE $user SET boomerang = boomerang + 1");
            $results = $link->query("UPDATE $user SET glowingbrace = glowingbrace + 1");
            $results = $link->query("UPDATE $user SET chest1 = 1");
            $results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
            $results = $link->query("UPDATE $user SET grandquest2 = 1");
        }
    } elseif ($input == 'reset chest') {
        $results = $link->query("UPDATE $user SET chest1 = 0");
        $results = $link->query("UPDATE $user SET goldkey = 1");
    }

    // --------------------------------------------------------------------------- PICK UP MAP
    elseif ($input=="pick up map" || $input=="view map") {
        echo 'You pick up the grassy field map:<br/>';
        $message ='<br/><i>You pick up the grassy field map. Check your INV to view the map at anytime</i><br/>
	<a target="_blank" rel="map" href="img/lightgray_map_grassyfield_main.jpg" class="fancybox">
	<img class="mapimage" width="350" height="350" alt="View Map"  src="img/lightgray_map_grassyfield_main.jpg"><br/>
	click to open map in new window and view full size</a><br/>';
        include('update_feed_alt.php'); // --- update feed ALT
        $results = $link->query("UPDATE $user SET grassyfieldmap = 1");
    }


    // -------------------------------------------------------------------------- TRAVEL
    elseif ($input=='down' || $input=='d') {
        echo 'You magically enter Room Zero<br/>';
        $message="<i>You magically enter Room Zero</i><br/>".$_SESSION['desc000'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '000'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='s' || $input=='south') {
        echo 'You travel south<br/>';
        $message="<i>You travel south</i></br>".$_SESSION['desc002'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '002'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='w' || $input=='west') {
        echo 'You travel west<br/>';
        $message="<i>You travel west</i></br>".$_SESSION['desc004'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '004'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='sw' || $input=='southwest') {
        echo 'You travel southwest<br/>';
        $message="<i>You travel southwest</i></br>".$_SESSION['desc003'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '003'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='n' || $input=='north') {
        echo 'You travel north<br/>';
        $message="<i>You travel north</i></br>".$_SESSION['desc005'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '005'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='e' || $input=='east') {
        echo 'You travel east<br/>';
        $message="<i>You travel east</i></br>".$_SESSION['desc006'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '006'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='ne' || $input=='northeast') {
        echo 'You travel northeast<br/>';
        $message="<i>You travel northeast</i></br>".$_SESSION['desc021'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '021'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
                // ---------------------- SPELL FLAG! ----------------------
                if ($pajamashamanFlag==0) {
                    echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
The Pajama Shaman can teach you Magic! You can now learn the <em class='red'>FIREBALL</em> and <em class='green'>HEAL</em> spell!</span></div> ";
                    include('update_feed.php'); // --- update feed
                    $results = $link->query("UPDATE $user SET pajamashamanFlag = 1");
                }
    } elseif ($input=='nw' || $input=='northwest') {
        echo 'You travel northwest<br/>';
        $message="<i>You travel northwest</i></br>".$_SESSION['desc020'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '020'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    } elseif ($input=='se' || $input=='southeast') {
        echo 'You travel southeast<br/>';
        $message="<i>You travel southeast</i></br>".$_SESSION['desc007'];
        include('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '007'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
    }

    $n=1;
    $ne=1;
    $e=1;
    $se=1;
    $s=1;
    $sw=1;
    $w=1;
    $nw=1;




    // ----------------------------------- end of room function
    include('function-end.php');
}
