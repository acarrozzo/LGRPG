<?php include('head.php');?>


<?php
// ---------------------------------------------------------------------------- INV TAB
// -------------------------DB CONNECT!
/*
include ('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){

    $whichmap = $_SESSION['selectmap'];
*/
    //	<form id="mainForm" method="post" action="" name="formInput">




      echo'<div class="gbox">';
      echo'<h1>Map of Vega</h1>';
      echo'<h3 class="blue">Quick Teleport</h3>';
      echo'<p> You can fast travel to any teleport location you have visited before.</p>';

      echo '  <div class="map-tiles">
      <div class="tile blueBG"><span>Star City</span></div>
      <div class="tile dgrayBG"><span>Mountains</span></div>
      <div class="tile darkgreenBG"><span>Dark Forest</span></div>
      <div class="tile oceanBG"><span>Blue Ocean</span></div>
      <div class="tile greenBG active">
        <div class="map-tiles2">

        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>
        <div class="tile2 grayBG"><span></span></div>

        </div>
        <span>Grassy Field</span>

      </div>
      <div class="tile dgreenBG forestBG"><span>Forest</span></div>
      <div class="tile swampBG"><span>Swamp</span></div>
      <div class="tile grayBG"><span>Rocky Flats</span></div>
      <div class="tile redBG"><span>Red Town</span></div>
      </div>';

      echo '</div>';


///////////////////////////////////////////////////





echo '
<article data-pop="maps" id="maps" class="teleport">
<div id="absolutemap">


<div class="tall percent100 noBG">';



    if (1 == 1) {
        echo '<div class="maplist">

<div>
  <img src="img/lightgray_worldmap_v1.jpg" />
  <span class="blueBG mapBtn">WORLD MAP</span>
</div>

<div>
  <img src="img/lightgray_map_grassyfield_main.jpg" />
  <span class="yellowgreenBG mapBtn">Grassy Field</span>
</div>

<div>
  <img src="img/lightgray_map_grassyfield_underground.jpg" />
  <span class="lightbrownBG mapBtn">Grassy Field Underground</span>
</div>
    <div>
  <img src="img/lightgray_map_forest_main.jpg" />
  <span class="greenBG mapBtn">Forest</span>
</div>
</div>

';
    } elseif ($whichmap == '0') {
        echo '<li><img src="img/lightgray_map_roomzero.jpg" /></li></li>';
    } elseif ($whichmap == 'grassyfield') {
        echo '<li><img src="img/lightgray_map_grassyfield_main.jpg" /></li>';
    } elseif ($whichmap == 'grassyfieldunderground') {
        echo '<li><img src="img/lightgray_map_grassyfield_underground.jpg" /></li>';
    } elseif ($whichmap == 'forest') {
        echo '<li><img src="img/lightgray_map_forest_main.jpg" /></li>';
    } elseif ($whichmap == 'forestunderground') {
        echo '<li><img src="img/lightgray_map_forest_underground.jpg" /></li>';
    } elseif ($whichmap == 'redtown') {
        echo '<li><img src="img/lightgray_map_redtown_main.jpg" /></li>';
    } elseif ($whichmap == 'redtownsewers') {
        echo '<li><img src="img/lightgray_map_redtown_sewers.jpg" /></li>';
    } elseif ($whichmap == 'redtownupperlevel') {
        echo '<li><img src="img/lightgray_map_redtown_upperlevel.jpg" /></li>';
    } elseif ($whichmap == 'stonemine') {
        echo '<li><img src="img/lightgray_map_stonemine_main.jpg" /></li>';
    } elseif ($whichmap == 'stonemineunderground') {
        echo '<li><img src="img/lightgray_map_stonemine_underground.jpg" /></li>';
    } elseif ($whichmap == 'blueocean') {
        echo '<li><img src="img/lightgray_map_blueocean_main.jpg" /></li>';
    } elseif ($whichmap == 'blueoceanunderwater') {
        echo '<li><img src="img/lightgray_map_blueocean_underwater.jpg" /></li>';
    }







    echo '</div>
	</div>
<div class="graysheet">	</div>

    </article>
';
 // </form>
//}
