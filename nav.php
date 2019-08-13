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

     // $hp = $row['hp'];



    $mapID = 'r'.$_SESSION['roomID']; // set room ID for map image and location


    //include ('room-desc.php');



    //if ($roomID==2)  { //$dangerLVL = $_SESSION['dangerLVL'] = "1001"; }
    //else if ($roomID==1)  { //$dangerLVL = $_SESSION['dangerLVL'] = "1000"; }


    echo'<div class="nav">';
    /*echo '<div class="quickBox">
        <form id="mainForm" method="post" action="" name="formInput">
    <input type="submit" class="fBtn actionAttack redBG" name="input1" value="attack">
    <input type="submit" class="fBtn actionRest greenBG" name="input1" value="rest">
    <input type="submit" class="fBtn actionSearch goldBG" name="input1" value="search">
    <input type="submit" class="fBtn actionLook blueBG" name="input1" value="look">


    </form>
    </div>';*/

    /*
    <form id="mainForm" method="post" action="" name="formInput">
            <input class="nw" type="submit" name="input1" value="nw" />
            <input class="n" type="submit" name="input1" value="n" />
            <input class="ne" type="submit" name="input1" value="ne" />
            <input class="w" type="submit" name="input1" value="w" />
            <input class="e" type="submit" name="input1" value="e" />
            <input class="sw" type="submit" name="input1" value="sw" />
            <input class="s" type="submit" name="input1" value="s" />
            <input class="se" type="submit" name="input1" value="se" />
            <input class="u" type="submit" name="input1" value="u" />
            <input class="d" type="submit" name="input1" value="d" />
        </form>
        */
    //	<form id="mainForm" method="post" action="" name="formInput">

    echo '
<div class="nav-center">
<div class="quickBox">
<input type="submit" class="blue" name="input1" value="look">
<input type="submit" class="green" name="input1" value="rest">
<input type="submit" class="gold" name="input1" value="search">
<input type="submit" class="red" name="input1" value="attack">
</div>


	<div id="map" class="toggle transitionXXX '.$mapID.'"></div>
	<div id="compass">


		<span class="nw '.$dirNW.'"><input class="" type="submit" name="input1" value="nw" /><i class="rotate45 fa fa-chevron-circle-left"></i></span>
		<span class="n '.$dirN.'"><input class="" type="submit" name="input1" value="n" /><i class="fa fa-chevron-circle-up"></i></span>
		<span class="ne '.$dirNE.'"><input class="" type="submit" name="input1" value="ne" /><i class="rotate45 fa fa-chevron-circle-up"></i></span>
		<span class="w '.$dirW.'"><input class="" type="submit" name="input1" value="w" /><i class="fa fa-chevron-circle-left"></i></span>
		<span class="e '.$dirE.'"><input class="" type="submit" name="input1" value="e" /><i class="fa fa-chevron-circle-right"></i></span>
		<span class="sw '.$dirSW.'"><input class="" type="submit" name="input1" value="sw" /><i class="rotate45 fa fa-chevron-circle-down"></i></span>
		<span class="s '.$dirS.'"><input class="" type="submit" name="input1" value="s" /><i class="fa fa-chevron-circle-down"></i></span>
		<span class="se '.$dirSE.'"><input class="" type="submit" name="input1" value="se" /><i class="rotate45 fa fa-chevron-circle-right"></i></span>
		<span class="u '.$dirU.'"><input class="" type="submit" name="input1" value="u" /><i class="fa fa-arrow-circle-up"></i></span>
		<span class="d '.$dirD.'"><input class="" type="submit" name="input1" value="d" /><i class="fa fa-arrow-circle-down"></i></span>

	</div>
  </div>';

    echo '</div>';

    //   	</form>
//  <p class="danger">danger lvl <strong>'.$_SESSION['dangerLVL'].'</strong></p>
}
