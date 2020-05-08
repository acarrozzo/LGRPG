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
    $bossTeleportCost = $level * 3;
    //<form id="mainForm" method="post" action="" name="formInput">
    //echo '<section data-pop="teleport" id="teleport" class="teleport panel">';


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
    echo '<div class="gbox">';

    //---------------------------------------------------------------------------- MAP TELEPORT
    echo'<h2>Map Teleport<span class="right"><span class="">mp cost: </span> <span class ="blue">1</span></span></h2>';



    echo '<div class="mapCube darkergray"><span>Star City</span></div>';

    if ($row['teleport9']>=1) {
        echo '<input class="mapCube dgrayBG" type="submit" name="input1" value="mountains" /> ';
    } else {
        echo '<div class="mapCube darkergray"><span>Mountains</span></div>';
    }

    if ($row['teleport8']>=1) {
        echo '<input class="mapCube darkgreenBG" type="submit" name="input1" value="dark forest" /> ';
    } else {
        echo '<div class="mapCube darkergray"><span>Dark Forest</span></div>';
    }

    if ($row['teleport6']>=1) {
        echo '<input class="mapCube blueBG" type="submit" name="input1" value="blue ocean" /> ';
    } else {
        echo '<div class="mapCube darkergray"><span>Ocean</span></div>';
    }

    if ($row['teleport1']>=1) {
        echo '<input class="mapCube wide greenBG" type="submit" name="input1" value="grassy field" /> ';
    } else {
        echo '<div class="mapCube darkergray"><span>Grassy Field</span></div>';
    }

    if ($row['teleport4']>=1) {
        echo '<input class="mapCube dgreenBG" type="submit" name="input1" value="forest" /> ';
    } elseif ($row['teleport2']>=1) {
        echo '<input class="mapCube dgreenBG" type="submit" name="input1" value="forest path" /> ';
    } else {
        echo '<div class="mapCube dgray"><span>Forest</span></div>';
    }

    echo '<div class="mapCube darkergray"><span>Swamp</span></div>';



    if ($row['teleport5']>=1) {
        echo '<input class="mapCube white grayBG" type="submit" name="input1" value="dwarf village" /> ';
    } else {
        echo '<div class="mapCube darkergray"><span>Rocky Plains</span></div>';
    }


    if ($row['teleport3']>=1) {
        echo '<input class="mapCube redBG" type="submit" name="input1" value="red town" /> ';
    } else {
        echo '<div class="mapCube darkergray"><span>Red Town</span></div>';
    }



    if ($row['teleport7']>=1) {
        echo '<input class=" darkblueBG" type="submit" name="input1" value="underwater" /> ';
    } else {
        echo '<div class=" darkergray"><span>Underwater</span></div>';
    }

    if ($row['KLthunderbarbarian']>=1 || $row['KLsmoothranger']>=1 || $row['KLcoralwizard']>=1 || $row['KLheavywalrus']>=1) {
        echo '<input class=" wide oceanBG white" type="submit" name="input1" value="master water temple" /> ';
    } else {
        echo '<div class=" darkergray"><span>Master Temple</span></div>';
    }






    //echo "</section>";



    //echo "<section data-pop2='teleport' class='panel'>";



    echo '</div>';
    echo '<div class="gbox">';

    echo'<h2>Guild Teleport<span class="right"><span class="">mp cost: </span> <span class ="blue">1</span></span></h2>';

    if ($row['quest19']>=2) {
        echo '<input class=" darkblueBG" type="submit" name="input1" value="warrior\'s guild" /> ';
    }
    if ($row['quest20']>=2) {
        echo '<input class=" purpleBG" type="submit" name="input1" value="wizard\'s guild" /> ';
    }
    if ($row['quest31']>=2) {
        echo '<input class=" goldBG darkgray" type="submit" name="input1" value="mining guild" /> ';
    }
    if ($row['quest57']>=2) {
        echo '<input class=" dgreenBG" type="submit" name="input1" value="ranger\'s guild" /> ';
    }
    echo '</div>';
    echo '<div class="gbox">';
    //---------------------------------------------------------------------------- BOSS TELEPORT
    echo'<h2>Boss Teleport<span class="right"><span class="">mp cost: </span> <span class ="blue">'.$bossTeleportCost.'</span></span></h2>';

    if ($row['KLgator']>=1) {
        echo '<input class=" greenBG" type="submit" name="input1" value="gator" /> ';
    }
    if ($row['KLgoblinchief']>=1) {
        echo '<input class=" white brownBG" type="submit" name="input1" value="goblin chief" /> ';
    }
    if ($row['KLogrelieutenant']>=1) {
        echo '<input class=" white darkblueBG" type="submit" name="input1" value="ogre lieutenant" /> ';
    }
    if ($row['KLkoboldmaster']>=1) {
        echo '<input class=" white purpleBG" type="submit" name="input1" value="kobold master" /> ';
    }
    if ($row['KLmasterthief']>=1) {
        echo '<input class=" darkgray yellowBG" type="submit" name="input1" value="master thief" /> ';
    }
    if ($row['KLomar']>=1) {
        echo '<input class=" blackBG" type="submit" name="input1" value="omar the dead" /> ';
    }
    if ($row['KLmongoliandeathworm']>=1) {
        echo '<input class=" dgreenBG" type="submit" name="input1" value="mongolian death worm" /> ';
    }
    if ($row['KLpossessedaxeman']>=1) {
        echo '<input class=" blueBG" type="submit" name="input1" value="possessed axeman" /> ';
    }
    if ($row['KLcrocodile']>=1) {
        echo '<input class=" darkgreenBG" type="submit" name="input1" value="crocodile" /> ';
    }
    if ($row['KLkraken']>=1) {
        echo '<input class=" greenBG" type="submit" name="input1" value="kraken" /> ';
    }
    if ($row['KLscorpionking']>=1) {
        echo '<input class=" redBG" type="submit" name="input1" value="scorpion king" /> ';
    }
    if ($row['KLredbeard']>=1) {
        echo '<input class=" redBG" type="submit" name="input1" value="red beard" /> ';
    }
    if ($row['KLwatertempleguardian']>=1) {
        echo '<input class=" blueBG" type="submit" name="input1" value="water temple guardian" /> ';
    }
    if ($row['KLphoenix']>=1) {
        echo '<input class=" brownBG" type="submit" name="input1" value="phoenix" /> ';
    }
    if ($row['KLcyclops']>=1) {
        echo '<input class=" grayBG" type="submit" name="input1" value="cyclops" /> ';
    }
    if ($row['KLminotaur']>=1) {
        echo '<input class=" blueBG" type="submit" name="input1" value="minotaur" /> ';
    }

    if ($row['KLtrollking']>=1) {
        echo '<input class=" darkgreenBG" type="submit" name="input1" value="troll king" /> ';
    }

    echo '</div>';
    echo '<div class="gbox">';
    //---------------------------------------------------------------------------- RECALL
    echo '<h2>Recall <i>mp cost: free</i></h2>';
    echo '<input class=" blackBG half" type="submit" name="input1" value="set recall" /> ';
    echo '<input class=" darkblueBG" type="submit" name="input1" value="recall" /> ';
    echo '<div>current recall room: <span class="gold">'.$recall.' $recallRoomName</span></div>';

    echo '</div>';

    //echo '</section>';
}//</form>
