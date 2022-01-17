<?php
// --------------------------------------------------------------------------------- Stats TAB
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $evolve = $row['evolve'];
    $physicaltraining = $row['physicaltraining'];
    $mentaltraining = $row['mentaltraining'];

    //-------------------copied from hud.php
    $bp = $row['bp'];
    $onehanded=$row['onehanded'];
    $twohanded=$row['twohanded'];
    $ranged=$row['ranged'];
    $toughness=$row['toughness'];
    $weapontype = $row['weapontype'];
    $blockSkill = $row['block'];
    $hp = $row['hp'];
    $hpmax = $row['hpmax'];
    $mp = $row['mp'];
    $mpmax = $row['mpmax'];
    $xp = $row['xp'];
    $currency = $row['currency'];
    //-------------------copied from function-level.php
    $level = $row['level'];
    $nxlevel = $level + 1;
    $xp = $row['xp'];
    $nextlevel = ($level+1) * ($level+1) * ($level+1);		// EASY LEVELING
    $prevlevel = $level * $level * $level;
    if ($prevlevel == 1) {
        $prevlevel = 0;
    }
    //$nextlevel = ($level+1) * ($level+1) * ($level+1) * ($level+1);	// DIFFICULT LEVELING
    //$prevlevel = $level * $level * $level * $level;

    $num_total = $nextlevel - $prevlevel;
    $num_xp = $xp - $prevlevel;
    $need = $nextlevel - $xp;
    $count1 = $num_xp / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);

    //------------------


    // --------------------------------------------------------------------------- USERNAME + LVL
    // --------------------------------------------------------------------------- USERNAME + LVL
    // --------------------------------------------------------------------------- USERNAME + LVL

    //echo '<article data-pop="stats" id="stats">';
    //echo '<form id="mainForm" method="post" action="" name="formInput">';
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
    $char = file_get_contents("img/svg/char-commander.svg");
    $char = file_get_contents("img/svg/char-ranger1.svg");


    echo '<div class="gbox">';
    echo '<h1>'.$row['username'].'</h1>';
    echo '<i class="icon ddgray character card">'.$char.'</i>';
    echo '<h3 class="toprightX boxX ddgray"> lvl <span class="gold">'. $row['level'].'</span></h3>';
    echo '<div class="buffbound">';
    //<span class= "cyan"> e</span><span class="cyan">'. $row['evolve'].'</span>

    // --------------------------------------------------------------------------- Poison Buff Box
    if ($_SESSION['poisonyou'] >  0) {
        echo '<span class="green buffBox">poison -'.$_SESSION['poisonyou'].'</span>';
    }
    // --------------------------------------------------------------------------- COLORS Box
    if ($_SESSION['reds'] >  0) {
        echo '<span class="red buffBox">str</span>';
    }
    if ($_SESSION['greens'] >  0) {
        echo '<span class="green buffBox">dex</span>';
    }
    if ($_SESSION['blues'] >  0) {
        echo '<span class="blue buffBox">mag</span>';
    }
    if ($_SESSION['yellows'] >  0) {
        echo '<span class="gold buffBox">def</span>';
    }
    if ($_SESSION['purples'] >  0) {
        echo '<span class="purple buffBox">xp</span>';
    }
    if ($_SESSION['golds'] >  0) {
        echo '<span class="yellow buffBox">$</span>';
    }
    if ($_SESSION['coffee'] >  0) {
        echo '<span class="lightbrown buffBox">java</span>';
    }
    if ($_SESSION['tea'] >  0) {
        echo '<span class="yellowgreen buffBox">tea</span>';
    }
    // --------------------------------------------------------------------------- Iron Skin Buff Box
    if ($_SESSION['ironskin_amount'] >  0) {
        echo '<span class="lightbrown buffBox">ironskin +'.$_SESSION['ironskin_amount'].'</span>';
    }
    // --------------------------------------------------------------------------- Regenerate Buff Box
    if ($_SESSION['regenerate_clicks'] >  0) {
        echo '<span class="red buffBox">regen +'.$row['regenerate'].'</span>';
    }
    // --------------------------------------------------------------------------- Flying Buff Box
    if ($_SESSION['flying'] >  0) {
        echo '<span class="blue buffBox">wings</span>';
    }
    // --------------------------------------------------------------------------- Breathing Water Buff Box
    if ($_SESSION['breathingwater'] >  0) {
        echo '<span class="darkblue buffBox">gills</span>';
    }

    echo '</div>'; // end buffbound box


    $extrahp = 0;
    $extramp = 0;


    // --------------------------------------------------------------------------- HP BAR
    // HP Percent
    $percent = (($hp / $hpmax)* 100);
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
    <span> HP</span>
	</div>
	<strong class="maxxer "><span class="'.$barNUMcolor.'">'.$hp.'</span>/'.$hpmax.'</strong>
	';
    echo '</div>';

    // --------------------------------------------------------------------------- Magic Armor Buff Box
    if ($_SESSION['magicarmor_amount'] >  0) {
        echo '<h4 class="red magicarmorBox">+'.$_SESSION['magicarmor_amount'].'</h4>';
    }


    // --------------------------------------------------------------------------- MP BAR
    // MP Percent
    $percent = (($mp / $mpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    $extramp = $row['mp'] - $row['mpmax'];

    if ($mp >  $mpmax) {
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'yellow';
    } else {
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'lightgray';
    }

    echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
     <span>MP</span>
	</div>
	<strong class="maxxer"><span class="'.$barNUMcolor.'">'.$mp.'</span>/'.$mpmax.'</strong>
	</div>';




    // --------------------------------------------------------------------------- XP BAR
    //$num_total = $nextlevel - $prevlevel;
    //$num_xp = $xp - $prevlevel;
    //$need = $nextlevel - $xp;

    $levelxp = $xp - $prevlevel;

    //$count1 = $num_xp / $num_total;
    //$count2 = $count1 * 100;
    //$count = number_format($count2, 0);

    // XP Percent
    $xpPercent = $count2;
    if ($xpPercent > 100) {
        $xpPercent = 100;
    }
    if ($xpPercent < 0) {
        $xpPercent = 0;
    }
    //$percent = $percent * $scale;

    $barBGcolor = 'greenBG';
    $barNUMcolor = 'lightgray';

    echo '
	<div class="bar">
	<div style="width: '.$xpPercent.'%" class="barMid '.$barBGcolor.'">
	<span>XP</span>
   <strong class="count '.$barBGcolor.'"> '.$levelxp.' </strong>
    </div></div>';

    echo '<div class="right"><a class="btnl lgray" href="" data-link2="skills">SKILLS &gt;</a></div>';

    // ----------------------------------------------------------------------------------------------------------- BP, SP, COIN, ROOM

    echo'<h4><span class="">BP</span> ';
    if ($row['bp']>0) {
        echo '<span class=" gold"> '.$row['bp'].'</span> ';
    } else {
        echo'<span class=" gray"> '.$row['bp'].'</span> ';
    }

    echo '<span class="">SP </span> ';
    if ($row['sp']>=10) {
        echo'<span class=" blue"> '.$row['sp'].'</span> ';
    } elseif ($row['sp']>=1) {
        echo'<span class=" gold"> '.$row['sp'].'</span> ';
    } else {
        echo'<span class=" gray"> '.$row['sp'].'</span> ';
    }
    echo '</h4>';
    echo '<h5>';
    echo'<span class="">PT </span><span class="red ">'.$mentaltraining.'</span> ' ;
    echo'<span class="">MT </span><span class="blue ">'.$mentaltraining.'</span> ' ;
    echo '</h5>';

    echo '<h5>';
    echo'<span class="">'.$_SESSION['currency'].'</span> ';
    echo '<span class="gold ">'.$currency.'</span> ' ;
    echo '</h5>';
    echo ' <span class="gold right">r'.$room.'</span>' ;
    /*
        $currencyorig = $currency;
        if ($currency > 10000000) {
            $currency = $currency / 1000000;
            $currency = floor($currency);
            echo '<span class="white ">'.$currency.'m</span> <span class="gray"> ['.$currencyorig.']</span>' ;
        } elseif ($currency > 10000) {
            $currency = $currency / 1000;
            $currency = floor($currency);
            echo '<span class="yellow ">'.$currency.'k </span> <span class="gray"> ['.$currencyorig.']</span>' ;
        } else {
            echo '<span class="gold ">'.$currency.'</span> ' ;
        }

    */


    echo '<h6>';
    if ($row['goldkey']==1) {
        echo ' <span class=" yellow"> You have '.$row['goldkey'].' gold key!</span> ';
    }
    if ($row['goldkey']>1) {
        echo ' <span class=" yellow"> You have '.$row['goldkey'].' gold keys!</span> ';
    }

    echo '</h6>' ;
}



// ----------------------------------------------------------------------------- HUD TAB
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $bp = $row['bp'];

    $onehanded=$row['onehanded'];
    $twohanded=$row['twohanded'];
    $ranged=$row['ranged'];
    $toughness=$row['toughness'];
    $weapontype = $row['weapontype'];
    $blockSkill = $row['block'];
    $hp = $row['hp'];
    $hpmax = $row['hpmax'];
    $mp = $row['mp'];
    $mpmax = $row['mpmax'];
    $xp = $row['xp'];

    $currency=$row['currency'];
    //	$goldkey=$row['goldkey'];


    //	 if ($roomID==2)  { //$dangerLVL = $_SESSION['dangerLVL'] = "901"; }
    //else if ($roomID==1)  { //$dangerLVL = $_SESSION['dangerLVL'] = "900"; }


    // ------------------------------------ USER STAT BAR MATH!
    ////$scale = 2.80;
    // HP Percent
    $percent = (($hp / $hpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }
    ////$percent = $percent * $scale;

    //<article data-pop="hud" id="hud">
    //<a href="" class="closePop"><i class="fa fa-times"></i></a>

    //<h3 class="user">'.$row['username'].'</h3>
    //<span class="lvl">'. $row['level'].'</span>

    //echo '<div id="hud">';










    // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Resets all BUFFS **


    $query = "UPDATE $user SET strmod = str";
    mysqli_query($link, $query);
    $query = "UPDATE $user SET defmod = def";
    mysqli_query($link, $query);
    $query = "UPDATE $user SET dexmod = dex";
    mysqli_query($link, $query);
    $query = "UPDATE $user SET magmod = mag";
    mysqli_query($link, $query);

    $_SESSION["healthregen"]= 0;
    $_SESSION["manaregen"]= 0;


    echo '</div>';
    echo '<div class="gbox">';
    echo '<h2 class="gold">Equipped</h2>';
    echo '<div class="topright"><a class="btn" href="" class="menuIcon" data-link="inv">Open INV ></a></div>';
    echo '<div><span class="eqpcat">Right</span> '. $row['equipR'].'<span class="iStat">';
    include('buff-right.php');
    echo '</span>';


    $held = $row['equipR'];

    if ($held=='wooden bow' || $held=='hunter bow' || $held=='long bow' || $held=='iron bow' || $held=='enchanted bow' || $held=='venom bow'
    || $held=='silver bow' || $held=='steel bow' || $held=='ranger bow'
    || $held=='mithril bow' || $held=='black bow') {
        $_SESSION['bow_equipped'] = 1;
        echo '<span class="ammo"><span class="gold"> arrows </span> x'.$row['arrows'].'</span> ';
    } else {
        $_SESSION['bow_equipped'] = 0;
    }


    if ($held=='crossbow' || $held=='iron crossbow' || $held=='compound crossbow' || $held=='hand crossbow'
    || $held=='silver crossbow' || $held=='steel crossbow' || $held=='keeper\'s crossbow'
    || $held=='mithril crossbow' || $held=='black crossbow') {
        $_SESSION['crossbow_equipped'] = 1;
        echo '<span class="ammo"><span class="gold"> bolts </span> x'.$row['bolts'].'</span> ';
    } else {
        $_SESSION['crossbow_equipped'] = 0;
    }

    if ($held=='javelin') {
        echo '<span class="ammo"><span class="alt gold"> qty </span> x'.$row['javelin'].'</span> ';
    }
    if ($held=='iron javelin') {
        echo '<span class="ammo"><span class="alt gold" qty </span> x'.$row['ironjavelin'].'</span> ';
    }
    if ($held=='steel javelin') {
        echo '<span class="ammo"><span class="alt gold"> qty </span> x'.$row['steeljavelin'].'</span> ';
    }
    if ($held=='mithril javelin') {
        echo '<span class="ammo"><span class="alt gold"> qty </span> x'.$row['mithriljavelin'].'</span> ';
    }


    echo '</div><div><span class="eqpcat">Left</span> '. $row['equipL'].'<span class="iStat">';
    include('buff-left.php');
    '</span>';
    echo '</div><div><span class="eqpcat">Head</span> '. $row['equipHead'].'<span class="iStat">';
    include('buff-head.php');
    '</span>';
    echo '</div><div><span class="eqpcat">Body</span> '. $row['equipBody'].'<span class="iStat">';
    include('buff-body.php');
    '</span>';
    echo '</div><div><span class="eqpcat">Hands</span> '. $row['equipHands'].'<span class="iStat">';
    include('buff-hands.php');
    '</span>';
    echo '</div><div><span class="eqpcat">Feet</span> '. $row['equipFeet'].'<span class="iStat">';
    include('buff-feet.php');
    '</span>';
    if ($row['equipRing1'] != '<span> - - - </span>') {
        echo '</div><div><span class="eqpcat">Ring1</span> '. $row['equipRing1'].'<span class="iStat">';
        include('buff-ring1.php');
        '</span>';
    }
    if ($row['equipRing2'] != '<span> - - - </span>') {
        echo '</div><div><span class="eqpcat">Ring2</span> '. $row['equipRing2'].'<span class="iStat">';
        include('buff-ring2.php');
        '</span>';
    }

    if ($row['equipNeck'] != '<span> - - - </span>') {
        echo '</div><div><span class="eqpcat">Neck</span> '. $row['equipNeck'].'<span class="iStat">';
        include('buff-neck.php');
        '</span>';
    }
    // if ($row['equipAura'] != '<span> - - - </span>'){ echo '</div><div><span class="eqpcat">Aura</span> '. $row['equipAura']; include ('buff-aura.php'); }

    echo '</div>';


    if ($row['equipAura'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat "></span> '. $row['equipAura'].'<span class="iStat">';
        include('buff-aura.php');
        '</span>';
        echo '</div>';
    }

    if ($row['equipComp'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat ">Comp</span> '. $row['equipComp'].'<span class="iStat">';
        include('buff-comp.php');
        '</span>';
        echo '</div>';
    }
    if ($row['equipPet'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat ">Pet</span> '. $row['equipPet'].'<span class="iStat">';
        include('buff-pet.php');
        '</span>';
        echo '</div>';
    }
    if ($row['equipMount'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat ">Mount</span> '. $row['equipMount'].'<span class="iStat">';
        include('buff-mount.php');
        '</span>';
        echo '</div>';
    }
    if ($row['equipArtifact'] != '<span> - - - </span>') {
        echo '<div><span class="eqpcat">Artifact</span> '. $row['equipArtifact'].'<span class="iStat">';
        include('buff-artifact.php');
        '</span>';
        echo '</div>';
    }

    //echo '</div>';
}






























echo '</div>';
echo '<div class="gbox lgray">';
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    if ($bp==0) {
        echo '<h2 class="gold">Main Stats </h2>';
    } else {
        echo '<h2 class="gold">Main Stats</h2>
        <h3 class="topright box"><span class="yellow">'.$row['bp'].' </span><span>BP</span></h3>';
    }

    $strEQ = $row['strmod'] - $row['str'];
    $dexEQ = $row['dexmod'] - $row['dex'];
    $magEQ = $row['magmod'] - $row['mag'];
    $defEQ = $row['defmod'] - $row['def'];
    echo '<div>';
    // ----------------------------------------------------------------------------------------------------------- STR
    echo '<span class="statcat red"> STR </span> ';
    if ($row['strmod'] ==  0) {
        echo ' '. $row['str'].' ';
    } elseif ($row['strmod'] >=  $row['str']) {
        echo 'base<span class="red">'. $row['str'].' </span> + eq<span class="red">'.$strEQ.'</span>';
    } elseif ($row['strmod'] <  $row['str']) {
        echo 'base<span class="black">'.$row['str'].'</span> + eq<span class="black">'.$strEQ.'</span>';
    }
    if ($weapontype==1) {
        echo ' + one-handed<span class="red">'.$onehanded.'</span>  ';
        $row['strmod'] += $onehanded;
        $results = $link->query("UPDATE $user SET strmod = strmod + $onehanded");
    }
    if ($weapontype==2) {
        echo ' + two-handed<span class="red">'.$twohanded.'</span>   ';
        $row['strmod'] += $twohanded;
        $results = $link->query("UPDATE $user SET strmod = strmod + $twohanded");
    }
    if ($_SESSION['reds']>0) {
        echo ' <span class="red"> +20</span>';
        $row['strmod'] += 20;
        $results = $link->query("UPDATE $user SET strmod = strmod +20");
    }

    if ($_SESSION['coffee']>0) {
        echo ' <span class="lightbrown"> +5</span>';
        $row['strmod'] += 5;
        $results = $link->query("UPDATE $user SET strmod = strmod + 5");
    }

    echo '<span class="maxstat"><span class="red"> '.$row['strmod'].' </span></span>';

    echo '</div>';

    if ($bp>0) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="+1 str" >+1 STR</button>';
    }
    if ($bp>1) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="all str" >+'.$bp.' STR</button>';
    }

    // ----------------------------------------------------------------------------------------------------------- DEX
    echo '<div>';
    echo '<span class="statcat green"> DEX </span> ';

    if ($row['dexmod'] ==  0) {
        echo 'base'. $row['dex'].' ';
    } elseif ($row['dexmod'] >=  $row['dex']) {
        echo 'base<span class="green">'. $row['dex'].' </span> + eq<span class="green">'.$dexEQ.'</span>';
    } elseif ($row['dexmod'] <  $row['dex']) {
        echo 'base<span class="black">'.$row['dex'].'</span> + eq<span class="black">'.$dexEQ.'</span>';
    }
    if ($weapontype==3) {
        echo '<span class=""> + ranged<span class="green">'.$ranged.'</span>  </span>';
        $row['dexmod'] += $ranged;
        $results = $link->query("UPDATE $user SET dexmod = dexmod + $ranged");
    }
    if ($_SESSION['greens']>0) {
        echo ' <span class="green"> +20</span>';
        $row['dexmod'] += 20;
        $results = $link->query("UPDATE $user SET dexmod = dexmod +20");
    }
    if ($_SESSION['coffee']>0) {
        echo ' <span class="lightbrown"> +5</span>';
        $row['dexmod'] += 5;
        $results = $link->query("UPDATE $user SET dexmod = dexmod +5");
    }

    $maxdex = $row['dexmod'];
    echo '<span class="maxstat"><span class="green"> '.$row['dexmod'].' </span></span>';

    echo '</div>';


    if ($bp>0) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="+1 dex" >+1 DEX</button>';
    }
    if ($bp>1) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="all dex" >+'.$bp.' DEX</button>';
    }

    // ----------------------------------------------------------------------------------------------------------- MAG
    echo '<div>';
    echo '<span class="statcat blue"> MAG </span>';

    if ($row['magmod'] ==  0) {
        echo 'base'. $row['mag'].' ';
    } elseif ($row['magmod'] >=  $row['mag']) {
        echo 'base<span class="blue">'. $row['mag'].' </span> + eq<span class="blue">'.$magEQ.'</span>  ';
    } elseif ($row['magmod'] <  $row['mag']) {
        echo 'base<span class="black">'.$row['mag'].'</span> + eq<span class="black">'.$magEQ.'</span>  ';
    }
    if ($weapontype==4) {
        echo '<span class=""> + null </span>';
    }
    if ($_SESSION['blues']>0) {
        echo ' <span class="blue"> +20</span>';
        $row['magmod'] += 20;
        $results = $link->query("UPDATE $user SET magmod = magmod + 20");
    }
    if ($_SESSION['coffee']>0) {
        echo ' <span class="lightbrown"> +5</span>';
        $row['magmod'] += 5;
        $results = $link->query("UPDATE $user SET magmod = magmod + 5");
    }
    $maxmag = $row['magmod'];
    echo '<span class="maxstat">  <span class="blue"> '.$row['magmod'].' </span></span>';
    echo '</div>';

    if ($bp>0) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="+1 mag" >+1 MAG</button>';
    }
    if ($bp>1) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="all mag" >+'.$bp.' MAG</button>';
    }
    // ----------------------------------------------------------------------------------------------------------- DEF
    echo '<div>';
    echo '<span class="statcat gold"> DEF </span>';
    if ($row['defmod'] ==  0) {
        echo 'base'. $row['def'].' ';
    } elseif ($row['defmod'] >=  $row['def']) {
        echo 'base<span class="gold">'. $row['def'].' </span> + eq<span class="gold">'.$defEQ.'</span> ';
    } elseif ($row['defmod'] <  $row['def']) {
        echo 'base<span class="black">'.$row['def'].'</span> + eq<span class="black">'.$defEQ.'</span> ';
    }


    if ($row['toughness'] >=1) {
        echo ' + tough<span class="gold">'.$row['toughness'].'</span>  ';
        $row['defmod'] += $row['toughness'];
    }


    if ($_SESSION['yellows']>0) {
        echo ' <span class="gold"> +20</span>';
        $row['defmod'] += 20;
        $results = $link->query("UPDATE $user SET defmod = defmod + 20");
    }
    if ($_SESSION['coffee']>0) {
        echo ' <span class="lightbrown"> +5</span>';
        $row['defmod'] += 5;
        $results = $link->query("UPDATE $user SET defmod = defmod + 5");
    }

    // shield check for block
    if (($row['block'] >=1) && ($row['equipL'] == 'training shield' || $row['equipL'] == 'basic shield'
                            || $row['equipL'] == 'kite shield' || $row['equipL'] == 'buckler' || $row['equipL'] == 'wooden shield'
                            || $row['equipL'] == 'hunter shield' || $row['equipL'] == 'iron shield' || $row['equipL'] == 'iron kite shield'
                            || $row['equipL'] == 'silver shield' || $row['equipL'] == 'steel shield' || $row['equipL'] == 'steel kite shield'
                            || $row['equipL'] == 'red shield') || $row['equipL'] == 'mithril shield' || $row['equipL'] == 'mithril kite shield'
                            || $row['equipL'] == 'sphinx shield' || $row['equipL'] == 'ranger shield' || $row['equipL'] == 'ultima shield') {
        $doubleBlock = ($row['block']*2);
        $row['defmod'] += $doubleBlock;
        echo ' + block<span class="gold">'.$doubleBlock.'</span>  ';
    }


    if ($_SESSION['ironskin_amount'] > 0) {
        echo ' + ironskin<span class="gold">'.$_SESSION['ironskin_amount'].'</span> ';
        $row['defmod'] += $_SESSION['ironskin_amount'];
    }

    $maxdef = $row['defmod'];
    echo '<span class="maxstat">  <span class="gold"> '.$row['defmod'].' </span></span>';
    echo '</div>';


    if ($bp>0) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="+1 def" >+1 DEF</button>';
    }
    if ($bp>1) {
        echo '<button type="submit" class="yellowBG ddgray" name="input1" value="all def" >+'.$bp.' DEF</button>';
    }

    $statTotal = $row['strmod'] + $row['dexmod'] + $row['magmod'] + $row['defmod'];

    echo '<div><span  class="maxstat"><h4 class="white">Stat Total </h4> <span class="white maxstat">'. $statTotal .'</span></span></div>';




    // ----------------------------------------------------------------------------------------------------------- END HUD STATS!




    echo '</div>';
    echo '<div class="gbox">';

    echo '<h2 class="gold">Battle Stats</h2>
    <h3>clicks <span class="blue">'. $row['clicks'].'</span></h3>
	  	<h3>kills <span class="green">'. $row['KLtotalkill'].'</span></h3>
	   	<h3>deaths <span class="red"> '. $row['deaths'].'</span></h3>';

    echo '</div>';
    echo '<div class="gbox">';

    echo '
	<div class="bar">
	<div style="width: '.$xpPercent.'%" class="barMid '.$barBGcolor.'">
	<span>XP</span> <strong class="count '.$barBGcolor.'"> '.$levelxp.' </strong>
    </div></div>';
    echo '
    <h2 class="gold">Experience</h2>
    <h4>Level: <span class="green">'.$level.'</span></h4>
    <h3>Total XP: <span class="green">'.$xp.'</span></h3>
    <h4>XP at next level: <span class="green">'.$nextlevel.'</span></h4>
    <h4>XP gained this level: <span class="green">'.$levelxp.'</span></h4>
    <h4>You are <span class="green">'.$count.'%</span> to the next level</h4>
    <h4>You need <span class="green">'.$need.'</span> more XP to reach level '.$nxlevel.'</h4>
';

    echo '</div>';
    echo '<div class="gbox">';

    echo '
    <h2 class="gold">Quests</h2>
    <div class="topright"><a class="btn" href="" class="menuIcon" data-link="quests">Open Quests ></a></div>
    <h4>Quests Completed: <span class="gold">X</span></h4>';

    echo '</div>';
    echo '<div class="gbox">';


    echo	'<h2 class="gold">Gold Chests</h2>';

    echo '<h4><span class="yellowgreen">Grassy Field </span>';
    if ($row['chest1'] >=1) {
        echo '<span class="green right">OPENED!</span></h4>';
    } else {
        echo '<span class="black right"> Locked</span></h4> ';
    }

    echo '<h4><span class="green">Forest</span> ';
    if ($row['chest2'] >=1) {
        echo '<span class="green right">OPENED!</span></h4>';
    } else {
        echo '<span class="black right"> Locked</span></h4> ';
    }

    echo '<h4><span class="red">Red Town</span> ';
    if ($row['chest3'] >=1) {
        echo '<span class="green right">OPENED!</span></h4>';
    } else {
        echo '<span class="black right"> Locked</span></h4> ';
    }

    echo '<h4><span class="gray">Stone Mine</span> ';
    if ($row['chest4'] >=1) {
        echo '<span class="green right">OPENED!</span></h4>';
    } else {
        echo '<span class="black right"> Locked</span></h4>';
    }

    echo '<h4><span class="blue">Blue Ocean</span> ';
    if ($row['chest5'] >=1) {
        echo '<span class="green right">OPENED!</span></h4>';
    } else {
        echo '<span class="black right"> Locked </span></h4>';
    }

    echo '<h4><span class="dgreen">Dark Forest</span> ';
    if ($row['chest6'] >=1) {
        echo '<span class="green right">OPENED!</span></h4>';
    } else {
        echo '<span class="black right"> Locked </span></h4>';
    }

    echo '<h4><span class="dgray">Stone Mountain</span> ';
    if ($row['chest7'] >=1) {
        echo '<span class="green right">OPENED!</span></h4>';
    } else {
        echo '<span class="black right"> Locked </span></h4>';
    }

    echo '<h4><span class="blue">Star City</span> ';
    if ($row['chest8'] >=1) {
        echo '<span class="green right">OPENED!</span></h4>';
    } else {
        echo '<span class="black right"> Locked </span></h4>';
    }



    echo '</div>';
    echo '<div class="gbox">';
    echo '<h2 class="gold">Other Containers</h2>';
    echo '<h4><span class="lightgray">Silver Chests:  '.$row['silverchests'].'</span></h4>';
    echo '<h4><span class="gray">Gray Chests: '.$row['graychests'].'</span></h4>';
    echo '<h4><span class="brown">Wooden Chests: '.$row['woodenchests'].'</span></h4>';
    echo '<h4><span class="lightbrown">Pots Smashed:  '.$row['pots'].'</span></h4>';


    echo '</div>';

    //include ('stickman.php');

//echo '</form>';
//echo '</article>';
}
