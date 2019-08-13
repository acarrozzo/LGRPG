<?php
// --------------------------------------------------------------------------------- NAV MAP
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {

        //<div class="navfloat">
    echo '<form id="mainForm" method="post" action="" name="formInput">';
    //echo '<nav>';

    // echo '<a href="" class="menuIcon" data-link="stats"><span>'.$row['username'].'</span><i class="fa fa-child"></i></a>	';
    echo '<ul id="tabs">';

    if ($roomID=='003c') {
        echo '<li><a class=" eqpp hilight"  data-link="weap" href="">WEAP</a></li>';
    } else {
        echo '<li><a class=" eqpp"  data-link="weap" href="">WEAP</a></li>';
    }
    echo '
    <li><a class="eqpp" data-link="armor" href="">ARMOR</a></li>
    <li><a class="eqpp" data-link="acc" href="">ACC</a></li>
    <li><a class="eqpp" data-link="comp" href="">COMP</a></li>
    <li><a class="eqpp" data-link="bag" href="">BAG</a></li>';

 

    if ($roomID=='001') {
        echo '<li><a class="hilight" data-link="stats" href="">Stats</a></li>';
    } else {
        echo '<li><a class="" data-link="stats" href="">Stats</a></li>';
    }

    if ($roomID=='003c' || $roomID=='021' || $roomID=='024' || $roomID=='106' || $roomID=='118' || $roomID=='226c' || $roomID=='225e' || $roomID=='515d' || $roomID=='610') {
        echo '<li><a class="hilight" data-link="skills" href="">Skills</a></li>';
    } else {
        echo '<li><a class="" data-link="skills" href="">Skills</a></li>';
    }

    if ($roomID=='021' || $roomID=='105' || $roomID=='225e') {
        echo '<li><a class="hilight" data-link="spells" href="">Spells</a></li>';
    } else {
        echo '<li><a class="" data-link="spells" href="">Spells</a></li>';
    }


    if ($roomID=='032' || $roomID=='112' || $roomID=='329' || $roomID=='498' || $roomID=='517') {
        echo '<li><a class="hilight" data-link="kl" href="">KL</a></li>';
    } else {
        echo '<li><a class="" data-link="kl" href="">KL</a></li>';
    }

    if ($roomID=='003' || $roomID=='003c' || $roomID=='024' || $roomID=='103' || $roomID=='118' || $roomID=='128' || $roomID=='215' || $roomID=='225' || $roomID=='226' || $roomID=='221' || $roomID=='222z' || $roomID=='226e' || $roomID=='225g' || $roomID=='303' || $roomID=='306' || $roomID=='308' || $roomID=='308c' || $roomID=='413' || $roomID=='425' || $roomID=='424' || $roomID=='502' || $roomID=='506' || $roomID=='515' || $roomID=='515b' || $roomID=='607' || $roomID=='608' || $roomID=='609' || $roomID=='611') {
        echo '<li><a class=" hilight" data-link="quests" href="">Quests</a></li>';
    } else {
        echo '<li><a class="" data-link="quests" href="">Quests</a></li>';
    }


    //if ($roomID=='001' || $roomID=='104' || $roomID=='028b' || $roomID=='121' || $roomID=='209' || $roomID=='111e' ){ echo '<li><a class="tabbb hilight" href="#maps">MAP</a></li>';}
    //		else { echo '<li><a class="tabbb" href="#maps">MAP</a></li>';}


    if ($roomID=='001' || $roomID=='104' || $roomID=='210' || $roomID=='121' || $roomID=='226d' || $roomID=='225b' || $roomID=='307' || $roomID=='308a' || $roomID=='413' || $roomID=='484' || $roomID=='425') {
        echo '<li><a class=" hilight" data-link="teleport" href="">Teleport</a></li>';
    } else {
        echo '<li><a class="" data-link="teleport" href="">Teleport</a></li>';
    }



    if ($row['craftingtable'] == $row['room'] || $roomID=='024' || $roomID=='025' || $roomID=='103c' || $roomID=='308b') {
        echo '<li><a class=" eqpp hilight" data-link="craft" href="">CRAFT</a></li>';
    } else {
        echo '<li><a class=" eqpp" data-link="craft" href="">CRAFT</a></li>';
    }



    if ($roomID=='021' || $roomID=='006' || $roomID=='207' || $roomID=='216' || $roomID=='227' || $roomID=='220' || $roomID=='229' || $roomID=='236' || $roomID=='226b' || $roomID=='225c' || $roomID=='225f' || $roomID=='310' || $roomID=='308d' || $roomID=='237' || $roomID=='515e') {
        echo '<li><a class=" hilight" data-link="shop" href="">SHOP</a></li>';
    }

    if ($roomID=='425') {
        echo '<li><a class=" hilight" data-link="evolve" href="">EVOLVE</a></li>';
    }




    echo'
    <li><a class="" data-link="system" href="">system</a></li>
	<li><a class=" btn game closePop darkestgrayBG"  href=""><p>EXIT MENU</p></a></li>
	</ul>';




    //echo '</div>';
 //echo '</nav>';
 //echo '</form>';
}
