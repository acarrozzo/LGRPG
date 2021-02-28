<?php

// ----------------------------------------------------------------------------- HUD GROUP

// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {

//------------------------------------ BATTLE STATUS

    $hp = $row['hp'];
    $hpmax = $row['hpmax'];
    $mp = $row['mp'];
    $mpmax = $row['mpmax'];
    $str = $row['str'];
    $mag = $row['mag'];
    $dex = $row['dex'];
    $def = $row['def'];

    $strmod = $row['strmod'];
    $magmod = $row['magmod'];
    $dexmod = $row['dexmod'];
    $defmod = $row['defmod'];

    $enemy = $row['enemy'];
    $enemyhpmax = $row['enemyhpmax'];
    $enemyhp = $row['enemyhp'];
    $enemyatt = $row['enemyatt'];
    $enemydef = $row['enemydef'];

    $infight = $row['infight'];
    $endfight = $row['endfight'];
    $weapontype = $row['weapontype'];

    $currency = $row['currency'];

    //  HP Percent
    $percent = (($hp / $hpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    //$barBGcolor = 'blackBG';
    $barBGcolor = 'redBG';
    $barNUMcolor = 'lightgray';

    $enemyLVL = $_SESSION['eLvl'];			// enemy level



    //  $uncookedmeat = $row['uncookedmeat'];
    //  $uncookedmeat = $row['uncookedmeat']; ?>


<?php
    if ($infight >= 1) {
        $hudActive = "inBattle";
    } else {
        $hudActive = "";
    }



    echo '<div id="hud" class="'.$hudActive.'">'; ?>
<?php



if ($infight >= 1) {



// ----------------------------------------------------------------------------------------------------------- UBOX
    echo '<div id="uBox">';

    echo '<h3 class="user"> <span class="lvlBox"> '.$level.' </span> '.$row['username'].'</h3>';

    echo   '<div class="statBarsXXX">
		<div class="bar hpBar">
		<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
		</div>
		</div>';
    /*
    if ( $row['hp'] >  $row['hpmax'] ) // HP EXTRA
    {
    echo '<span class="extrahpBox">'.$extrahp.'</span>';
    }
    */
    //  echo'	</li>';

    // MP Percent
    $percent = (($mp / $mpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }
    //$percent = $percent * $scale;

    $extramp = $row['mp'] - $row['mpmax'];

    if ($mp >  $mpmax) {
        //		 $barBGcolor = 'yellowBG';
        //		 $barNUMcolor = 'darkgray';

        $barBGcolor = 'blueBG';
        $barNUMcolor = 'lightgray';
    //echo '<li><span class="blue">MP </span> <span class="yellow">'.$mp.' </span> / '.$mpmax;
    } else {
        $barBGcolor = 'blueBG';
        $barNUMcolor = 'lightgray';
        //echo '<li><span class="blue">MP</span> '.$mp.' / '.$mpmax;
    }

    //if ($mp>$mpmax) {$mp=$mpmax;} // show max mp if mp is more than max

    echo '
	<div class="bar mpBar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
    </div></div>';
    /*
        if ( $row['mp'] >  $row['mpmax'] ) // HP EXTRA
        {
        echo '<span class="extrahpBox mpBox">'.$extramp.'</span>';
        }
    */

    $level = $row['level'];
    $nxlevel = $level + 1;
    $xp = $row['xp'];

    $nextlevel = ($level+1) * ($level+1) * ($level+1);
    $prevlevel = $level * $level * $level;
    //$nextlevel = ($level+1) * ($level+1) * ($level+1) * ($level+1);
    //$prevlevel = $level * $level * $level * $level;

    $num_total = $nextlevel - $prevlevel;
    $num_xp = $xp - $prevlevel;
    $need = $nextlevel - $xp;
    $levelxp = $xp - $prevlevel;

    $count1 = $num_xp / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);

    // XP Percent
    $percent = $count2;
    if ($percent > 100) {
        $percent = 100;
    }
    if ($percent < 0) {
        $percent = 0;
    }
    //$percent = $percent * $scale;

    $barBGcolor = 'greenBG';
    $barNUMcolor = 'lightgray';

    //echo '<div class="bar xpBar"><div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'"></div></div>';
    echo '</div>';

    // --------------------------------------------------------------------------- HP NUMBERS
if ($row['hp'] >  $row['hpmax']) { // HP EXTRA
            $barBGcolor = 'redBG';
    $barNUMcolor = 'lightgray';
    $extrahp = $row['hp'] - $row['hpmax'];
}

    if ($_SESSION['magicarmor_amount'] >  0) {
        echo '<span class="red magicarmorBox">+'.$_SESSION['magicarmor_amount'].'</span>';
    }

    echo '<div>';
    echo '
		<span><strong class="red"> '.$hp.'</strong>hp</span>
		<span><strong class="blue"> '.$mp.'</strong>mp</span>'; // <span>/'.$hpmax.'hp</span>  //<span>/'.$mpmax.'mp</span>';

    // --------------------------------------------------------------------------- Magic Armor Buff Box

    echo '<strong class="statBox">';


    if ($weapontype == 3) {
        echo '<span>R</span> <span class="green">'.$row['dexmod'].' </span> ';
    } elseif ($row['magmod'] > $row['strmod'] && $row['magmod'] > $row['dexmod']) {
        echo '<span>M</span> <span class="blue">'.$row['magmod'].' </span>';
    } else {
        echo '<span>A</span> <span class="red">'.$row['strmod'].' </span>';
    }


    echo '<span>D</span> <span class="gold">'.$row['defmod'].' </span>
			</strong>';
    echo '<div class="buffbound">';

    // --------------------------------------------------------------------------- Poison Buff Box
    if ($_SESSION['poisonyou'] >  0) {
        echo '<span class="green buffBox">poisoned '.$_SESSION['poisonyou'].'</span>';
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

    echo '</div>'; 	// end buffbound box
    echo '</div>';
    echo '</div>';	// end uBox




    // Enemy HP Percent
    $epercent = (($enemyhp / $enemyhpmax)* 100);
    if ($percent > 100) {
        $percent = 100;
    }

    echo '<div id="eBox">';     // ENEMY BATTLE BOX
    //echo'	<span class="">You are hit for</span><div class="attacknumber redBG">'.$edamagetotal.'</div>
    //	HP<span class="black">'.$enemyhp.' / '.$enemyhpmax.'</span>
    echo '
		<h3 class=""> '.$enemy.' <span class="lvlBox"> '.$enemyLVL.' </span></h3>
		<div class="bar">
		<div style="width: '.$epercent.'%" class="barMid redBG">
		<div class="barStat '.$barNUMcolor.'">
		</div>
		</div>
		</div>

		<div>
		<strong class="red"> '.$enemyhp.'</strong><span>/'.$enemyhpmax.'hp</span>
		<div class="statBox">
		<span class=""> A </span><strong class="red">'.$enemyatt.'</strong>
		<span class=""> D </span><strong class="gold">'.$enemydef.'</strong>
		</div>
		';

    echo'
		<strong class="buffbound">';
    if ($_SESSION['eFly'] >= 1) {
        echo '<strong class="buffBox blue">Flying</strong>';
    }
    if ($_SESSION['eCrit'] >= 1) {
        echo '<strong class="buffBox white">Crit</strong>';
    }
    if ($_SESSION['eRage'] >= 1) {
        echo '<strong class="buffBox red">Rage</strong>';
    }
    if ($_SESSION['ePow'] >= 1) {
        echo '<strong class="buffBox red">Pow</strong>';
    }
    if ($_SESSION['eBite'] >= 1) {
        echo '<strong class="buffBox red">Bite</strong>';
    }
    if ($_SESSION['eDex'] >= 1) {
        echo '<strong class="buffBox green">Range</strong>';
    }
    if ($_SESSION['eMag'] >= 1) {
        echo '<strong class="buffBox blue">Mag</strong>';
    }
    if ($_SESSION['eHeal'] >= 1) {
        echo '<strong class="buffBox green">Heal</strong>';
    }
    if ($_SESSION['eSteal'] >= 1) {
        echo '<strong class="buffBox gold">Steal'.$_SESSION['eSteal'].'</strong>';
    }
    if ($_SESSION['eMulti'] >= 1) {
        echo '<strong class="buffBox purple">Multi '.$_SESSION['eMulti'].'</strong>';
    }
    if ($_SESSION['eDoubleHit'] >= 1) {
        echo '<strong class="buffBox white">2x Hit</strong>';
    }
    if ($_SESSION['eTripleHit'] >= 1) {
        echo '<strong class="buffBox white">3x Hit</strong>';
    }
    if ($_SESSION['ePureA'] >= 1) {
        echo '<strong class="buffBox eBox red">Pure A</strong>';
    }
    if ($_SESSION['ePureD'] >= 1) {
        echo '<strong class="buffBox eBox gold">Pure D</strong>';
    }
    if ($_SESSION['eStrImm'] >= 1) {
        echo '<strong class="buffBox eBox red">Str Imm</strong>';
    }
    if ($_SESSION['eDexImm'] >= 1) {
        echo '<strong class="buffBox eBox green">Dex Imm</strong>';
    }
    if ($_SESSION['eMagImm'] >= 1) {
        echo '<strong class="buffBox eBox blue">Mag Imm</strong>';
    }
    if ($_SESSION['eDodge'] >= 1) {
        echo '<strong class="buffBox eBox green">Dodge '.$_SESSION['eDodge'].'</strong>';
    }
    if ($_SESSION['ePoison'] >= 1) {
        echo '<strong class="buffBox eBox green">Poison '.$_SESSION['ePoison'].'</strong>';
    }
    echo '</strong>';

    echo '</div>';

    echo '</div>';     // END E BOX




    echo '<span class="vsBox">vs</span>';     // VS CIRCLE





    $activeAtt = "active";
    $activeMag ="";
    $tabType = "";
    if ($weapontype == 3) {
        $tabType = "dex";
    } elseif ($magmod >= $strmod) {
        $activeAtt = "";
        $activeMag ="active";
    }

    echo'
  <div class="battleBlock">

  <div class="battleTabs">';

    if ($weapontype == 3) {
        echo '<a href="/" class="btn '.$activeAtt.' '.$tabType.'" data-link="battle-actions"><i class="icon-bow-arrow"></i> Actions</a>';
    } else {
        echo '<a href="/" class="btn '.$activeAtt.'" data-link="battle-actions"><i class="icon-crossed-swords"></i> Actions</a>';
    }

    echo' <a href="/" class="btn '.$activeMag.'" data-link="battle-magic"><i class="icon-fireball"></i> Spells</a>
  	<a href="/" class="btn " data-link="battle-bag"><i class="icon-backpack"></i> Items</a>
  </div>
  <div class="battleTab '.$activeAtt.' '.$tabType.'" data-pop="battle-actions">';
    echo '<h5>Attacks</h5>';

    if ($weapontype == 3) {
        echo ' <div class="spellBtnBox">
					<input type="submit" class="spellBtn greenBG  " name="input1" value="attack">
					</div> ';
    } else {
        echo ' <div class="spellBtnBox">
					<input type="submit" class="spellBtn redBG  " name="input1" value="attack">
					</div> ';
    }
    if ($slice >= 1  && $weapontype==1) {
        echo ' <div class="spellBtnBox">
					<i class="spellLvl lightred"> '.$slice.' </i>
					<input type="submit" class="spellBtn redBG " name="input1" value="slice">
					<i class="spellCost">'.$slice_cost_cast.'<em>m</em></i>
					</div> ';
    }
    if ($smash >= 1 && $weapontype==2) {
        echo ' <div class="spellBtnBox">
					<i class="spellLvl"> '.$smash.' </i>
					<input type="submit" class="spellBtn redBG " name="input1" value="smash">
					<i class="spellCost">'.$smash_cost_cast.'<em>m</em></i>
					</div> ';
    }
    if ($aim >= 1 && $weapontype==3) {
        echo ' <div class="spellBtnBox">
					<i class="spellLvl"> '.$aim.' </i>
					<input type="submit" class="spellBtn greenBG" name="input1" value="aim">
					<i class="spellCost">'.$aim_cost_cast.'<em>m</em></i>
					</div> ';
    }
    if ($magicstrike >= 1) {
        echo ' <div class="spellBtnBox">
					<i class="spellLvl"> '.$magicstrike.' </i>
					<input type="submit" class="spellBtn blueBG  " name="input1" value="magic strike">
					<i class="spellCost">'.$magicstrike_cost_cast.'<em>m</em></i>
					</div> ';
    }








    echo '</div>
  <div class="battleTab '.$activeMag.'" data-pop="battle-magic">';
    echo '<h5>Offense</h5>';

    if ($fireball >= 1) {
        echo '<div class="spellBtnBox">
			<i class="spellLvl">  '.$fireball.' </i>
			<input type="submit" class="spellBtn  redBG" name="input1" value="fireball" />
			<i class="spellCost"> '.$fireball_cost_cast.'<em>m</em></i>
			</div> ';
    }
    if ($frostball >= 1) {
        $spell_cost_cast = 5 + ($row['frostball']*2); // was *1
        echo ' <div class="spellBtnBox">
			<i class="spellLvl"> '.$frostball.' </i>
			<input type="submit" class="spellBtn blueBG" name="input1" value="frostball" />
			<i class="spellCost"> '.$frostball_cost_cast.'<em>m</em></i>
			</div> ';
    }
    if ($poisondart >= 1) {
        echo ' <div class="spellBtnBox">
			<i class="spellLvl"> '.$poisondart.' </i>
			<input type="submit" class="spellBtn greenBG" name="input1" value="poison dart" />
			<i class="spellCost"> '.$poisondart_cost_cast.'<em>m</em></i>
			</div> ';
    }
    if ($atomicblast >= 1) {
        echo ' <div class="spellBtnBox">
			<i class="spellLvl"> '.$atomicblast.' </i>
			<input type="submit" class="spellBtn blackBG" name="input1" value="atomic blast" />
			<i class="spellCost"> '.$atomicblast_cost_cast.'<em>m</em></i>
			</div> ';
    }


    echo '<h5>Support</h5>';

    if ($heal >= 1) {
        echo ' <div class="spellBtnBox">
			<i class="spellLvl"> '.$heal.' </i>
			<input type="submit" class="spellBtn  redBG" name="input1" value="heal" />
			<i class="spellCost"> '.$heal_cost_cast.'<em>m</em></i>
			</div> ';
    }
    if ($regenerate >= 1) {
        echo '
			<div class="spellBtnBox">
			<i class="spellLvl"> '.$regenerate.' </i>
			<input type="submit" class="spellBtn  greenBG" name="input1" value="regenerate" />
			<i class="spellCost"> '.$regenerate_cost_cast.'<em>m</em></i>
			</div> ';
    }
    if ($magicarmor >= 1) {
        echo '
			<div class="spellBtnBox">
			<i class="spellLvl"> '.$magicarmor.' </i>
			<input type="submit" class="spellBtn goldBG" name="input1" value="magic armor" />
			<i class="spellCost"> '.$magicarmor_cost_cast.'<em>m</em></i>
			</div> ';
    }
    if ($ironskin >= 1) {
        echo '
			<div class="spellBtnBox">
			<i class="spellLvl"> '.$ironskin.' </i>
			<input type="submit" class="spellBtn brownBG" name="input1" value="iron skin" />
			<i class="spellCost"> '.$ironskin_cost_cast.'<em>m</em></i>
			</div> ';
    }
    echo '</div>


  <div class="battleTab" data-pop="battle-bag">

  <h5 class="padd">HEALING</h5>';




    if ($redberry <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
    <button class="itembox '.$disabled.'" type="submit" name="input1" value="redberry">
    <span class="icon red">'.file_get_contents("img/svg/redberry.svg").'</span>
    <p class="">Redberry </p>
    <strong class="red">+10 HP</strong>
    <p class=" qty">x'.$redberry.'</p>
    </button>';

    if ($blueberry <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
    <button class="itembox '.$disabled.'" type="submit" name="input1" value="blueberry">
    <span class="icon blue">'.file_get_contents("img/svg/blueberry.svg").'</span>
    <p class="">Blueberry </p>
    <strong class="blue">+10 MP</strong>
    <p class=" qty">x'.$blueberry.'</p>
    </button>';

    if ($rawmeat <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
      <button class="itembox '.$disabled.'" type="submit" name="input1" value="raw meat">
      <span class="icon red">'.file_get_contents("img/svg/steak.svg").'</span>
      <p class="">Raw Meat </p>
      <strong class="red">+25 HP</strong>
      <p class=" qty">x'.$rawmeat.'</p>
      </button>';

    if ($cookedmeat <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="cooked meat">
        <span class="icon red">'.file_get_contents("img/svg/steak.svg").'</span>
        <p class="">Cooked Meat </p>
        <strong class="red">+50 HP</strong>
        <p class=" qty">x'.$cookedmeat.'</p>
        </button>';

    if ($veggies <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    echo '
      <button class="itembox '.$disabled.'" type="submit" name="input1" value="veggies">
      <span class="icon purple">'.file_get_contents("img/svg/blueberry.svg").'</span>
      <p class="">Veggies </p>
      <strong class="purple">+50 HP/MP</strong>
      <p class=" qty">x'.$veggies.'</p>
      </button>';

    if ($redpotion <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($redpotion >= 1 || $chest1 >= 1) {
        echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="red potion">
        <span class="icon red">'.file_get_contents("img/svg/potion.svg").'</span>
        <p class="">Red Potion </p>
        <strong class="red">+100 HP</strong>
        <p class=" qty">x'.$redpotion.'</p>
        </button>';
    }
    if ($bluepotion <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($bluepotion >= 1 || $chest1 >= 1) {
        echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="blue potion">
        <span class="icon blue">'.file_get_contents("img/svg/potion.svg").'</span>
        <p class="">Blue Potion </p>
        <strong class="blue">+100 MP</strong>
        <p class=" qty">x'.$bluepotion.'</p>
        </button>';
    }

    if ($purplepotion <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($purplepotion >= 1 || $chest1 >= 1) {
        echo '
        <button class="itembox '.$disabled.'" type="submit" name="input1" value="purple potion">
        <span class="icon purple">'.file_get_contents("img/svg/potion.svg").'</span>
        <p class="">Purple Potion </p>
        <strong class="purple">+200 HP/MP</strong>
        <p class=" qty">x'.$purplepotion.'</p>
        </button>';
    }

    if ($meatball <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($meatball >= 1 || $hp >= 200) {
        echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="meatball">
            <span class="icon red">'.file_get_contents("img/svg/meatball.svg").'</span>
            <p class="">Meatball </p>
            <strong class="red">+400 HP</strong>
            <p class=" qty">x'.$meatball.'</p>
            </button>';
    }
    if ($bluefish <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($bluefish >= 1 || $mp >= 150) {
        echo '
            <button class="itembox '.$disabled.'" type="submit" name="input1" value="bluefish">
            <span class="icon blue">'.file_get_contents("img/svg/fish.svg").'</span>
            <p class="">Blue Fish </p>
            <strong class="blue">+400 MP</strong>
            <p class=" qty">x'.$bluefish.'</p>
            </button>';
    }


    if ($redbalm <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($redbalm >= 1 || $hp >= 400) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="red balm">
                <span class="icon red">'.file_get_contents("img/svg/balm.svg").'</span>
                <p class="">Red Balm </p>
                <strong class="red">+1000 HP</strong>
                <p class=" qty">x'.$redbalm.'</p>
                </button>';
    }
    if ($bluebalm <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($bluebalm >= 1 || $mp >= 350) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="blue balm">
                <span class="icon blue">'.file_get_contents("img/svg/balm.svg").'</span>
                <p class="">Blue Balm </p>
                <strong class="blue">+1000 MP</strong>
                <p class=" qty">x'.$bluebalm.'</p>
                </button>';
    }

    if ($purplebalm <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($purplebalm >= 1 || $hp >= 600) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="purple balm">
                <span class="icon purple">'.file_get_contents("img/svg/balm.svg").'</span>
                <p class="">Purple balm </p>
                <strong class="purple">+2000 HP/MP</strong>
                <p class=" qty">x'.$purplebalm.'</p>
                </button>';
    }

    if ($antidote <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($antidote >= 1 || $hp >= 600) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="antidote">
                <span class="icon green">'.file_get_contents("img/svg/potion2.svg").'</span>
                <p class="">Antidote</p>
                <strong class="green">Cure Poison</strong>
                <p class=" qty">x'.$antidote.'</p>
                </button>';
    }



    echo '<h5 class="padd">COLORS</h5>';
    echo '<p>Last 100 clicks</p>';


    $disabled="";
    if ($reds <= 0) {
        $disabled="disabled";
    }
    $actives="";
    if ($_SESSION['reds'] > 0){
      $disabled="disabled2";
      $actives="<p class='actives'>ACTIVE [<span class='blink'>".$_SESSION['reds']."</span>]</p>";
    }
    if ($reds >= 1 || $hp >= 400) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="reds">
                '.$actives.'
                <span class="icon red">'.file_get_contents("img/svg/herb1.svg").'</span>
                <p class="">Reds </p>
                <strong class="red">+20 STR</strong>
                <p class=" qty">x'.$reds.'</p>
                </button>';
    }
    if ($greens <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($greens >= 1 || $mp >= 350) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="greens">
                <span class="icon green">'.file_get_contents("img/svg/herb11.svg").'</span>
                <p class="">Greens </p>
                <strong class="green">+20 DEX</strong>
                <p class=" qty">x'.$greens.'</p>
                </button>';
    }
    if ($blues <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($blues >= 1 || $mp >= 350) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="blues">
                <span class="icon blue">'.file_get_contents("img/svg/herb3.svg").'</span>
                <p class="">Blues </p>
                <strong class="blue">+20 MAG</strong>
                <p class=" qty">x'.$blues.'</p>
                </button>';
    }
    if ($yellows <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($yellows >= 1 || $hp >= 400) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="yellows">
                <span class="icon gold">'.file_get_contents("img/svg/herb6.svg").'</span>
                <p class="">Yellows </p>
                <strong class="gold">+20 DEF</strong>
                <p class=" qty">x'.$yellows.'</p>
                </button>';
    }





        echo '<h5 class="padd">BEVERAGES</h5>';

    if ($coffee <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($coffee >= 0) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="coffee">
                <span class="icon brown">'.file_get_contents("img/svg/coffee.svg").'</span>
                <p class="">Coffee </p>
                <strong class="brown">+10 All Stats</strong>
                <p class=" qty">x'.$coffee.'</p>
                </button>';
    }

    if ($tea <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }
    if ($tea >= 0) {
        echo '
                <button class="itembox '.$disabled.'" type="submit" name="input1" value="tea">
                <span class="icon green">'.file_get_contents("img/svg/tea.svg").'</span>
                <p class="">Tea </p>
                <strong class="green">+5 Regen</strong>
                <p class=" qty">x'.$tea.'</p>
                </button>';
    }
    if ($wingspotion <= 0) {
        $disabled="disabled";
    } else {
        $disabled="";
    }

echo '<p class="padd">
<span class="btn" data-link2="bag">View all items</span>
</p>';

    echo '</div>';


    //if ($infight >=1) {
    echo '<input class="retreatBtn" type="submit" name="input1" value="retreat" />';
    //echo '<style>.battleBlock{display:block;}</style>';
    //}

    echo '</div>';
} // END in in battle
    echo '</div>'; 	// end HUD
}
