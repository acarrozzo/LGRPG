<?php

// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $magicstrike=$row['magicstrike'];
    $fireball=$row['fireball'];
    $frostball=$row['frostball'];
    $poisondart=$row['poisondart'];
    $atomicblast=$row['atomicblast'];
    $recall=$row['recall'];


    $heal=$row['heal'];
    $regenerate=$row['regenerate'];
    $ironskin=$row['ironskin'];
    $wings=$row['wings'];
    $gills=$row['gills'];

    $purplepotion=$row['purplepotion'];
    $redpotion=$row['redpotion'];
    $bluepotion=$row['bluepotion'];
    $cookedmeat=$row['cookedmeat'];
    $rawmeat=$row['rawmeat'];
    $redberry=$row['redberry'];
    $blueberry=$row['blueberry'];

    $veggies=$row['veggies'];
    $meatball=$row['meatball'];
    $bluefish=$row['bluefish'];

    $redbalm=$row['redbalm'];
    $bluebalm=$row['bluebalm'];
    $purplebalm=$row['purplebalm'];

    $wingspotion=$row['wingspotion'];
    $gillspotion=$row['gillspotion'];
    $antidotepotion=$row['antidotepotion'];
    $coffee=$row['coffee'];
    $tea=$row['tea'];
    $reds=$row['reds'];
    $greens=$row['greens'];
    $blues=$row['blues'];
    $yellows=$row['yellows'];
    $golds=$row['golds'];
    $purples=$row['purples'];


    $currency = $row['currency'];

    echo'<div class="coinBar">';
    echo'<span class="roomID">#'.$roomID.'</span> | ';
    if ($endfight==1) {
        echo $message;
        $query = $link->query("UPDATE $user SET endfight = 2 ");
    } elseif ($_SESSION['dangerLVL'] == 0) {
        echo '	<span class="">no danger</span>';
    } elseif ($endfight>=1) {
        echo '	<span class="  green">danger LVL <span class="blue">'.$_SESSION['dangerLVL'].'</span> <span class="green">SAFE</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level*3)) { 		//10 			/30
        echo '	<span class=" ">danger LVL <span class="black">'.$_SESSION['dangerLVL'].'</span> <span class="black">SUICIDE!!! </span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level*2)) { 		//10 			/20
        echo '	<span class=" ">danger LVL <span class="black">'.$_SESSION['dangerLVL'].'</span>  <span class="black">INSANE!! </span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level*(1.5))) { 		//10 			/15
        echo '	<span class=" ">danger LVL <span class="darkred">'.$_SESSION['dangerLVL'].'</span>  <span class="darkred">VERY HIGH! </span></span>';
    } elseif ($_SESSION['dangerLVL'] > $level) {		//10  // 10
        echo '	<span class=" ">danger LVL <span class="red">'.$_SESSION['dangerLVL'].'</span>  <span class="red">HIGH </span></span>';
    } elseif ($_SESSION['dangerLVL'] == $level) {		//10  // 10
        echo '	<span class=" ">danger LVL <span class="red">'.$_SESSION['dangerLVL'].'</span>  <span class="gold">EVEN MATCH! </span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level/(1.25))) { //10  // 8
        echo '	<span class=" ">danger LVL <span class="orange">'.$_SESSION['dangerLVL'].'</span>  <span class="orange">AVG</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level/(1.5))) { //10  // 6.666
        echo '	<span class=" ">danger LVL <span class="gold">'.$_SESSION['dangerLVL'].'</span> <span class="gold">AVG </span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level/2)) { //10  // 5
        echo '	<span class=" ">danger LVL <span class="yellow">'.$_SESSION['dangerLVL'].'</span> <span class="yellow">LOW</span></span>';
    } elseif ($_SESSION['dangerLVL'] >= ($level/3)) { //10  // 3.333
        echo '	<span class=" ">danger LVL <span class="yellowgreen">'.$_SESSION['dangerLVL'].'</span>  <span class="yellowgreen">VERY LOW</span></span>';
    } elseif ($_SESSION['dangerLVL'] < ($level/3)) { //10  // 3.333
        echo '	<span class=" ">danger LVL <span class="green">'.$_SESSION['dangerLVL'].'</span>  <span class="green">SUPER EZ</span></span>';
    } else {
        echo '	<span class=" ">danger LVL <span class="gold">'.$_SESSION['dangerLVL'].'</span>  <span class="gold"> LAST? check hud</span></span>';
    }
    //echo'</div>';


    echo ' | ';

    //------------------------------------------------------------------------------------------ BP, SP, COIN BAR
//echo'<div class="coinBar">';
        if ($row['bp']>1) {
            echo '<br><span class="btn goldBG" data-link="stats"> Spend Build Points</span> ';
        } // BTN
    echo'<span class="">BP</span> ';
    if ($row['bp']>0) {
        echo '<strong class="gold"> '.$row['bp'].'</strong> ';
    } else {
        echo'<strong class=""> '.$row['bp'].'</strong> ';
    }

    //echo ' | ';
    if ($row['sp']>20) {
        echo '<br>
	<span class="btn blueBG" data-link2="skills"> Buy Skills </span>
	<span class="btn blueBG" data-link2="spells"> Buy Spells </span>';
    } // BTN
    echo ' <span class=" ">SP</span> ';
    if ($row['sp']>=15) {
        echo'<strong class="gold" > '.$row['sp'].'</strong> ';
    } elseif ($row['sp']>=1) {
        echo'<span class="">'.$row['sp'].'</span> ';
    } else {
        echo'<strong class=""> '.$row['sp'].'</strong> ';
    }



    echo ' | ';
    echo' <span class="">'.$_SESSION['currency'].'</span>';
    //echo' <span class="gold"> currency </span> ';
    $currencyorig = $currency;
    if ($currency > 10000000) {
        $currency = $currency / 1000000;
        $currency = floor($currency);
        echo '<strong class="cyan"> '.$currency.'m</strong>' ;
    } elseif ($currency > 10000) {
        $currency = $currency / 1000;
        $currency = floor($currency);
        echo '<strong class="yellow"> '.$currency.'k </strong>' ;
    } else {
        echo '<strong class="gold"> '.$currency.'</strong>' ;
    }

    // <span class=""> ['.$currencyorig.']</span>
    if ($row['goldkey']>0) {
        echo '<strong class="gold"> '.$row['goldkey'].' gold key!</strong> ';
    }
    echo '</div>';

    // --------------------------------------------------------------------------- wooden boat
    if ($row['equipMount'] != 'wooden boat' && $row['MOUNTwoodenboat'] > 0 &&

($room == '016' || $room == 401 || $room == 402 || $room == 403 || $room == 404 || $room == 405 || $room == 406 || $room == 407 || $room == 408 || $room == 409 || $room == 410 || $room == 411 || $room == 412 || $room == 413 || $room == 414 || $room == 415 || $room == 416 || $room == 417 || $room == 418 || $room == 419 || $room == 420 || $room == 421 || $room == 422 || $room == 423 || $room == 424 || $room == 426)

) {
        echo '<div><input class="white lightbrownBG px16" type="submit" name="input1" value="use wooden boat" /> </div>';
    }
} // END WHILE
