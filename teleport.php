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
    echo'<p> Click the spinning compass [ <span class="icon yellow spin inline">'.file_get_contents("img/svg/star-compass.svg").'</span> ] to teleport</p>';

    echo '  <div class="map-tiles">';



    // ------------- STAR CITY MAP
echo '
    <div class="tile m7 blueBG" data-map-1><span>Star City</span></div>';



    // ------------- MOUNTAINS MAP
echo '
    <div class="tile m6 dgrayBG" data-map-1><span>Mountains</span></div>';



    // ------------- DARK FOREST MAP
echo '
    <div class="tile m5 darkgreenBG" data-map-1><span>Dark Forest</span></div>';



    // ------------- OCEAN MAP
echo '
    <div class="tile m4 oceanBG" data-map-1><span>Blue Ocean</span></div>';



    // ------------- GRASSY FIELD MAP
echo '<div class="tile m0 greenBG active" data-map-1>
      <span class="icon yellow spin">'.file_get_contents("img/svg/star-compass.svg").'</span>
      <span>Grassy Field</span>
    </div>
      <div class="map-tiles2 lgreenBG" data-map-2>
      <h2>Grassy Field</h2>
      <div class="close-map-2" data-close-map>close</div>


      <div class="tile2 none"></div>
      <div class="tile2 none"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 none"></div>
      <div class="tile2 sandBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 none"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 none"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 sandBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 lightblueBG border greenborder"></div>
      <div class="tile2 greenBG"></div>
      <div class="tile2 darkblueBG border greenborder"><p>Shop, Skills, & Spells</p></div>
      <div class="tile2 none"></div>
      <div class="tile2 brownBG border forestborder"></div>
      <div class="tile2 sandBG"></div>
      <div class="tile2 dirtBG"></div>
      <div class="tile2 greenBG"><p>flower</p></div>
      <div class="tile2 greenBG rounded" open-modal>
        <span class="icon teleport yellow spin ">'.file_get_contents("img/svg/star-compass.svg").'</span>
        <span class="path w greenBG"></span>
        <span class="path nw greenBG"></span>
        <span class="path n greenBG"></span>
        <span class="path ne greenBG"></span>
        <span class="path e greenBG"></span>
        <span class="path se greenBG"></span>
        <span class="path s greenBG"></span>
        <span class="path sw greenBG"></span>

      </div>
        <div class="modal greenBG">
          <span class="icon yellow">'.file_get_contents("img/svg/star-compass.svg").'</span>
          <p class="">Teleport to the Grassy Field? </p>
          <span class="closer">close</span>
          <button class="goldBG" type="submit" name="input1" value="grassy field">Yes</button>
        </div>

      <div class="tile2 greenBG"><p>Basic Shop</p></div>
      <div class="tile2 dirtBG"></div>
      <div class="tile2 dirtBG"></div>
      <div class="tile2 sandBG"></div>
      <div class="tile2 lgrayBG border dgrayborder"></div>
      <div class="tile2 brownBG border greenborder">
        <p>QUESTS</p>
        <p>Old Man</p>
      </div>
      <div class="tile2 greenBG"></div>
      <div class="tile2 greenBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 none"></div>
      <div class="tile2 sandBG"></div>
      <div class="tile2 swampBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 darkgrayBG"></div>
      <div class="tile2 darkgrayBG"></div>
      <div class="tile2 darkgrayBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 none"></div>
      <div class="tile2 dgrayBG"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 darkgrayBG"></div>
      <div class="tile2 darkgrayBG"></div>
      <div class="tile2 none"></div>
    </div>';



// ------------- FOREST MAP
if ($row['quest9']>=2){
  $forestactive = "active";
}
echo '<div class="tile m1  forestBG '.$forestactive.'"  data-map-1>
      <span class="icon yellow spin">'.file_get_contents("img/svg/star-compass.svg").'</span>
      <span>Forest</span></div>
      <div class="map-tiles2 lgreenBG" data-map-2>
      <h2>Forest</h2>
      <div class="close-map-2" data-close-map>close</div>
      <div class="tile2 none"></div>
      <div class="tile2 none"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 darkgreenBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 darkgrayBG"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 brownBG border forestborder"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 forestBG"></div>
      ';

      if ($row['teleport4']>=1){
        echo '
        <div class="tile2 forestBG border goldborder" open-modal>
        <span class="icon yellow spin">'.file_get_contents("img/svg/star-compass.svg").'</span>';
      }
      else {
        echo '<div class="tile2 forestBG border goldborder">';
      }
          echo '
          <span class="path w forestBG"></span>
          <span class="path nw forestBG"></span>
          <span class="path n forestBG"></span>
          <span class="path e forestBG"></span>
          <span class="path se forestBG"></span>
          <span class="path s forestBG"></span>
          <span class="path sw forestBG"></span>
      </div>
      <div class="modal forestBG">
            <span class="icon yellow">'.file_get_contents("img/svg/star-compass.svg").'</span>
            <p class="">Teleport to the Forest? </p>
            <span class="closer">close</span>
            <button class="goldBG" type="submit" name="input1" value="forest">Yes</button>
      </div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 greenBG"></div>
      <div class="tile2 brownBG border forestborder"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 dirtBG"></div>
      <div class="tile2 greenBG"></div>

      <div class="tile2 grayBG" open-modal>';
      if ($row['teleport2']>=1){
        echo '
        <span class="icon yellow spin">'.file_get_contents("img/svg/star-compass.svg").'</span>';
      }
            echo '
            <span class="path w grayBG"></span>
            <span class="path n grayBG"></span>
            <span class="path ne redBG"></span>
            <span class="path s grayBG"></span>
      </div>
      <div class="modal forestBG">
            <span class="icon yellow">'.file_get_contents("img/svg/star-compass.svg").'</span>
            <p class="">Teleport to the Forest Path? </p>
            <span class="closer">close</span>
            <button class="goldBG" type="submit" name="input1" value="forest path">Yes</button>
      </div>


      <div class="tile2 none"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 brownBG border forestborder"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 dirtBG"></div>
      <div class="tile2 darkgrayBG"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 forestBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 dirtBG"></div>
      <div class="tile2 grayBG"></div>
      <div class="tile2 none"></div>
      <div class="tile2 lgrayBG border redborder"></div>
      <div class="tile2 none"></div>
      <div class="tile2 forestBG"></div>
    </div>';



    // ------------- SWAMP MAP
    echo '  <div class="tile m8 swampBG" data-map-1><span>Swamp</span></div>';



    // ------------- ROCKY FLATS MAP
    if ($row['teleport5']>=1){
      $rockyflatsactive = "active";
    }
    echo '<div class="tile m3 grayBG '.$rockyflatsactive.'"  data-map-1>
          <span class="icon yellow spin">'.file_get_contents("img/svg/star-compass.svg").'</span>
          <span>Rocky Flats</span></div>
          <div class="map-tiles2 lgrayBG" data-map-2>
          <h2>Rocky Flats</h2>
          <div class="close-map-2" data-close-map>close</div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>

          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>

          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>

          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>

          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>

          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>

          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          ';
          echo '</div>';








    // ------------- RED TOWN MAP
    if ($row['teleport3']>=1){
      $redtownactive = "active";
    }
    echo '<div class="tile m2 redBG '.$redtownactive.'"  data-map-1>
          <span class="icon yellow spin">'.file_get_contents("img/svg/star-compass.svg").'</span>
          <span>Red Town</span></div>
          <div class="map-tiles2 lightgrayBG" data-map-2>
          <h2>Red Town</h2>
          <div class="close-map-2" data-close-map>close</div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 grayBG"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 brownBG"></div>
          <div class="tile2 grayBG"></div>
          <div class="tile2 none"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 greenBG"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 greenBG"></div>
          <div class="tile2 grayBG"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 grayBG"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 lgrayBG border redborder" open-modal>';
            echo '<span class="icon yellow spin">'.file_get_contents("img/svg/star-compass.svg").'</span>';
          echo '
        </div>
        <div class="modal redBG">
              <span class="icon yellow">'.file_get_contents("img/svg/star-compass.svg").'</span>
              <p class="">Teleport to Red Town? </p>
              <span class="closer">close</span>
              <button class="goldBG" type="submit" name="input1" value="red town">Yes</button>
        </div>

          <div class="tile2 lgrayBG"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 none"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 brownBG"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 lgrayBG border redborder"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 grayBG"></div>
          <div class="tile2 grayBG"></div>
          <div class="tile2 grayBG"></div>
          <div class="tile2 dirtBG"></div>
          <div class="tile2 none"></div>
          <div class="tile2 none"></div>
          <div class="tile2 greenBG"></div>
          <div class="tile2 none"></div>
          <div class="tile2 lgrayBG"></div>
          <div class="tile2 none"></div>

';
    echo '</div>';
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
