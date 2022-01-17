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
    $mapID = 'r'.$_SESSION['roomID']; // set room ID for map image and location


    //include ('room-desc.php');



    //if ($roomID==2)  { //$dangerLVL = $_SESSION['dangerLVL'] = "1001"; }
    //else if ($roomID==1)  { //$dangerLVL = $_SESSION['dangerLVL'] = "1000"; }


    echo '<div class="badges">';
    // -------------------------------- SPEND SP BADGE
    if ($row['sp']>=20) {
        echo '
      <a href="" data-link2="skills" class="btn purpleBG white badge">
          <i class="icon">'.file_get_contents("img/svg/magicstrike.svg").'</i>
          <span class="alert">'.$row['sp'].'</span>
          </a>';
    }


    $questCount=0; // reset quest count for quest badges
    // --------------------------------  QUEST BADGES OLD MAN
    if ($roomID=='003') {
        if ($row['quest1']<2) {
            $questCount++;
        }
        if ($row['quest2']<2) {
            $questCount++;
        }
        if ($row['quest3']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES YOUNG SOLDIER
    if ($roomID=='003c') {
        if ($row['quest4']<2) {
            $questCount++;
        }
        if ($row['quest5']<2) {
            $questCount++;
        }
        if ($row['quest6']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES JACK LUMBER
    if ($roomID=='024') {
        if ($row['quest7']<2) {
            $questCount++;
        }
        if ($row['quest8']<2) {
            $questCount++;
        }
        if ($row['quest9']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES FREDDIE
    if ($roomID=='103') {
        if ($row['quest10']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES RED GUARD CAPTAIN
    if ($roomID=='215') {
        if ($row['quest11']<2) {
            $questCount++;
        }
        if ($row['quest12']<2) {
            $questCount++;
        }
        if ($row['quest13']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES FOREST GNOME
    if ($roomID=='128') {
        if ($row['quest14']<2) {
            $questCount++;
        }
        if ($row['quest15']<2) {
            $questCount++;
        }
        if ($row['quest16']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES HUNTER BILL
    if ($roomID=='118') {
        if ($row['quest17']<2) {
            $questCount++;
        }
        if ($row['quest18']<2) {
            $questCount++;
        }
    }
    // -------------------  QUEST BADGES WARRIORS GUILD INITIATION
    if ($roomID=='226') {
        if ($row['quest19']<2) {
            $questCount++;
        }
    }
    // -------------------  QUEST BADGES WIZARDS GUILD INITIATION
    if ($roomID=='225') {
        if ($row['quest20']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES Town Hall Plaza
    if ($roomID=='221') {
        if ($row['quest21']<2) {
            $questCount++;
        }
        if ($row['quest22']<2) {
            $questCount++;
        }
        if ($row['quest23']<2) {
            $questCount++;
        }
    }
    // -------------------  QUEST BADGES RED TOWN MAYOR
    if ($roomID=='222z') {
        if ($row['quest24']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES Warriors guild - pete
    if ($roomID=='226e') {
        if ($row['quest25']<2) {
            $questCount++;
        }
        if ($row['quest26']<2) {
            $questCount++;
        }
        if ($row['quest27']<2) {
            $questCount++;
        }
    }
    // --------------------------------  QUEST BADGES Wizards guild - Morty
    if ($roomID=='225g') {
        if ($row['quest28']<2) {
            $questCount++;
        }
        if ($row['quest29']<2) {
            $questCount++;
        }
        if ($row['quest30']<2) {
            $questCount++;
        }
    }


    // -------------------------------- ALL QUEST BADGES
    if ($questCount>0) {
        //if ($roomID=='003' || $roomID=='003c' || $roomID=='024') {
        $questBtnTop = '<a href="" data-link="quests" class="btn goldBG white badge">
            <i class="icon">'.file_get_contents("img/svg/trophy.svg").'</i>';
        $questBtnTBottom = '<span class="alert">'.$questCount.'</span>
          </a>';
        echo $questBtnTop;
        echo $questBtnTBottom;
        //}
    }

    // -------------------------------- CRAFT BADGES
    if ($roomID=='025' || ($row['craftingtable'] == $row['room'])) {
        echo '<a href="" data-link2="craft" class="btn  red  white redBG badge">
        <i class="icon">'.file_get_contents("img/svg/craft.svg").'</i>';
        echo '<span class="alert">'.$row['wood'].'</span>
      </a>';
    }

    // -------------------------------- COOK MEAT BADGE
    if ($roomID=='003' && $row['rawmeat']>=1) {
        echo '<button class="badge redBG lightgray" type="submit" name="input1" value="cook meat">
        <i class="icon">'.file_get_contents("img/svg/steak.svg").'</i>
        <span class="alert">'.$row['rawmeat'].'</span>
        </button>';
    }




    // -------------------------------- BADGE - CHOP TREE
    if ($row['wood']<10 && $roomID=='025') {
        $wood10 = 10 - $row['wood'];
        echo '
      <button class="btn forestBG white badge" type="submit" name="input1" value="chop tree">
          <i class="icon">'.file_get_contents("img/svg/axelog.svg").'</i>
          <span class="alert">'.$wood10.'</span>
          </button>';
    }

    // -------------------------------- BADGE - PICK BLUEBERRY
    if ($row['blueberry']<5 && $roomID=='005') {
        $opposite = 5 - $row['blueberry'];
        echo '
      <button class="btn blueBG white badge" type="submit" name="input1" value="pick 5 blueberry">
          <i class="icon">'.file_get_contents("img/svg/blueberry.svg").'</i>
          <span class="alert">'.$opposite.'</span>
          </button>';
    }

    // -------------------------------- BADGE - CHOP TREE


    echo '</div>';




    echo'<div class="nav">';



    echo '<div class="navhud">';


    $char = file_get_contents("img/svg/character.svg");
    $char = file_get_contents("img/svg/char-spearman.svg");
    $char = file_get_contents("img/svg/char-darkprince.svg");
    $char = file_get_contents("img/svg/char-general.svg");
    $char = file_get_contents("img/svg/char-wizard.svg");
    $char = file_get_contents("img/svg/char-wanderer.svg");
    $char = file_get_contents("img/svg/char-mage.svg");
    $char = file_get_contents("img/svg/char-marauder.svg");
    $char = file_get_contents("img/svg/char-soldier.svg");
    $char = file_get_contents("img/svg/char-beastmaster.svg");
    $char = file_get_contents("img/svg/char-barbarian.svg");
    $char = file_get_contents("img/svg/char-ranger1.svg");
    $char = file_get_contents("img/svg/char-commander.svg");


    echo '<i class="icon ddgray character">'.$char.'</i>';
    echo '<div class="lightgray">'.$row['username'].'<span class="gray"> lvl </span><span class="gold">'. $row['level'].'</span></div>';

    // --------------------------------------------------------------------------- HP BAR
    // HP Percent
    $percent = (($row['hp'] / $row['hpmax'])* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    if ($row['hp'] >  $row['hpmax']) { // HP EXTRA
        $barBGcolor = 'redBG';
        $barNUMcolor = 'yellow';
        $extrahp = $row['hp'] - $row['hpmax'];
    } else { // HP NORMALbr
        $barBGcolor = 'redBG';
        $barNUMcolor = 'lightgray';
    }
    echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
     <span>HP</span>
	</div>
	<strong class="maxxer "><span class="'.$barNUMcolor.'">'.$row['hp'].'</span></strong>
	';
    echo '</div>';

    // --------------------------------------------------------------------------- Magic Armor Buff Box
    if ($_SESSION['magicarmor_amount'] >  0) {
        echo '<span class="red magicarmorBox">+'.$_SESSION['magicarmor_amount'].'</span>';
    }


    // --------------------------------------------------------------------------- MP BAR
    // MP Percent
    $percent = (($row['mp'] / $row['mpmax'])* 100);
    if ($percent > 100) {
        $percent = 100;
    }


    if ($row['mp'] >  $row['mpmax']) { // HP EXTRA
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'yellow';
        $extramp = $row['mp'] - $row['mpmax'];
    } else {
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'lightgray';
    }

    echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
    <span> MP</span>
	</div>
	<strong class="maxxer"><span class="'.$barNUMcolor.'">'.$row['mp'] .'</span></strong>
	</div>


  ';

    // XP Percent
    $xpPercent = $count2;
    if ($xpPercent > 100) {
        $xpPercent = 100;
    }
    if ($xpPercent < 0) {
        $xpPercent = 0;
    }
    $xpPercent = round($xpPercent,2);
    //$percent = $percent * $scale;

    $barBGcolor = 'greenBG';
    $barNUMcolor = 'lightgray';
    echo '
<div class="bar">
<div style="width: '.$xpPercent.'%" class="barMid '.$barBGcolor.'">
<span>XP</span>
  </div>
  <strong class="maxxer"> '.$xpPercent.'% </strong>
  </div>';


    echo '</div>';




    echo '
    <div class="nav-center">

<div class="quickBox">
<input type="submit" class="red" name="input1" value="attack">
<input type="submit" class="gold" name="input1" value="search">
<input type="submit" class="green" name="input1" value="rest">
<input type="submit" class="blue" name="input1" value="look">



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
    <div class="updown">
		<span class="u '.$dirU.'"><input class="" type="submit" name="input1" value="u" /><i class="fa fa-arrow-circle-up"></i>Up</span>
		<span class="d '.$dirD.'"><input class="" type="submit" name="input1" value="d" /><i class="fa fa-arrow-circle-down"></i>Down</span>
    </div>
    </div>

    </div>
  </div>';


    //   	</form>
//  <p class="danger">danger lvl <strong>'.$_SESSION['dangerLVL'].'</strong></p>
}
