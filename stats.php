<?php
// --------------------------------------------------------------------------------- Stats TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 
	  
$evolve = $row['evolve'];

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
echo '<h2 class="px40">'.$row['username'].'<i class="white"> lvl <span class="px30 gold">'. $row['level'].'</span></i></h2>';
echo '<div class="buffbound">';
//<span class="px12 cyan"> e</span><span class="px16 cyan">'. $row['evolve'].'</span>	

// --------------------------------------------------------------------------- Poison Buff Box
	if ( $_SESSION['poisonyou'] >  0 ) 
	 { echo '<span class="green buffBox">poison -'.$_SESSION['poisonyou'].'</span>'; }	
// --------------------------------------------------------------------------- COLORS Box
	if ( $_SESSION['reds'] >  0 ) { echo '<span class="red buffBox">str</span>'; }		 
	if ( $_SESSION['greens'] >  0 ) { echo '<span class="green buffBox">dex</span>'; }		 
	if ( $_SESSION['blues'] >  0 ) { echo '<span class="blue buffBox">mag</span>'; }		 
	if ( $_SESSION['yellows'] >  0 ) { echo '<span class="gold buffBox">def</span>'; }		 
	if ( $_SESSION['purples'] >  0 ) { echo '<span class="purple buffBox">xp</span>'; }		 
	if ( $_SESSION['golds'] >  0 ) { echo '<span class="yellow buffBox">$</span>'; }	
	if ( $_SESSION['coffee'] >  0 ) { echo '<span class="lightbrown buffBox">java</span>'; }		 
	if ( $_SESSION['tea'] >  0 ) { echo '<span class="yellowgreen buffBox">tea</span>'; }
// --------------------------------------------------------------------------- Iron Skin Buff Box
	if ( $_SESSION['ironskin_amount'] >  0 ) 
	 { echo '<span class="lightbrown buffBox">ironskin +'.$_SESSION['ironskin_amount'].'</span>'; }	
// --------------------------------------------------------------------------- Regenerate Buff Box
	if ( $_SESSION['regenerate_clicks'] >  0 ) 
	 { echo '<span class="red buffBox">regen +'.$row['regenerate'].'</span>'; }	 
// --------------------------------------------------------------------------- Flying Buff Box
	if ( $_SESSION['flying'] >  0 ) 
	 { echo '<span class="blue buffBox">wings</span>'; }		
// --------------------------------------------------------------------------- Breathing Water Buff Box
	if ( $_SESSION['breathingwater'] >  0 ) 
	 { echo '<span class="darkblue buffBox">gills</span>'; }	
		 			
echo '</div>'; // end buffbound box


$extrahp = 0;
$extramp = 0;	

	
// --------------------------------------------------------------------------- HP BAR
// HP Percent
$percent = (($hp / $hpmax)* 100);
if ( $percent > 100 ) { $percent = 100; } 

if ( $row['hp'] >  $row['hpmax'] ) // HP EXTRA
		 { 
		 $barBGcolor = 'redBG'; 
		 $barNUMcolor = 'yellow';
		 $extrahp = $row['hp'] - $row['hpmax'];
		 }
else // HP NORMALbr
		 { 
		 $barBGcolor = 'redBG'; 
		 $barNUMcolor = 'lightgray';
		 }	
	echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
     HP  
	</div>
	<strong class="maxxer "><span class="'.$barNUMcolor.'">'.$hp.'</span>/'.$hpmax.'</strong>
	';
	echo '</div>';

	// --------------------------------------------------------------------------- Magic Armor Buff Box
	if ( $_SESSION['magicarmor_amount'] >  0 )
	{ echo '<span class="red magicarmorBox">+'.$_SESSION['magicarmor_amount'].'</span>'; }
		
	
// --------------------------------------------------------------------------- MP BAR
// MP Percent
$percent = (($mp / $mpmax)* 100);
if ( $percent > 100 ) { $percent = 100; } 

$extramp = $row['mp'] - $row['mpmax'];

if ( $mp >  $mpmax )
		 { 
		 $barBGcolor = 'blueBG'; 
		 $barNUMcolor = 'yellow';
		 }
else	 {
		 $barBGcolor = 'blueBG'; 
		 $barNUMcolor = 'lightgray';
}
		
	echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
     MP  
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
$percent = $count2;
if ( $percent > 100 ) { $percent = 100; } 
if ( $percent < 0 ) { $percent = 0; } 
//$percent = $percent * $scale;		 

$barBGcolor = 'greenBG'; 
$barNUMcolor = 'lightgray';
		 	 
	echo '
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
	XP <strong class="count '.$barBGcolor.'"> '.$levelxp.' </strong>
    </div></div>';
		 
// ----------------------------------------------------------------------------------------------------------- BP, SP, COIN, ROOM
	
echo'<div><span class="px14">BP</span> ';
	if ($row['bp']>0) {	
		echo '<span class="px20 gold"> '.$row['bp'].'</span> ';
		}
	else { echo'<span class="px12 gray"> '.$row['bp'].'</span> ';} 
	
echo '<span class="px14">SP </span> ';
	if ($row['sp']>=10) {	
		echo'<span class="px20 blue"> '.$row['sp'].'</span> ';
		}
	else if ($row['sp']>=1) {	echo'<span class="px14 gold"> '.$row['sp'].'</span> '; }
	else {echo'<span class="px12 gray"> '.$row['sp'].'</span> ';}
	
	echo'<span class="px14">'.$_SESSION['currency'].'</span> ';
	
	$currencyorig = $currency;
	if ($currency > 10000000) { 
		$currency = $currency / 1000000; $currency = floor($currency);
		echo '<span class="white px20">'.$currency.'m</span> <span class="gray"> ['.$currencyorig.']</span>' ; }
	
	else if ($currency > 10000) { 
		$currency = $currency / 1000; $currency = floor($currency);
		echo '<span class="yellow px16">'.$currency.'k </span> <span class="gray"> ['.$currencyorig.']</span>' ; }			 
			
    else {echo '<span class="gold px14">'.$currency.'</span> ' ; }	
	
	if ($row['goldkey']>0) { echo ' <span class="px12 yellow"> '.$row['goldkey'].' gold key!</span> ';	}		 
			
    // echo ' <span class="gold px12">r'.$room.'</span> </div></ul>' ; 		 
    echo '</div>' ; 		 
		
		
	
}		



// ----------------------------------------------------------------------------- HUD TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 


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
if ( $percent > 100 ) { $percent = 100; } 
////$percent = $percent * $scale;

//<article data-pop="hud" id="hud">
//<a href="" class="closePop"><i class="fa fa-times"></i></a>

//<h3 class="user">'.$row['username'].'</h3>
//<span class="lvl">'. $row['level'].'</span>

//echo '<div id="hud">';




	
	
	
	
	
		
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Resets all BUFFS **


$query = "UPDATE $user SET strmod = str"; mysqli_query($link,$query);
$query = "UPDATE $user SET defmod = def"; mysqli_query($link,$query);
$query = "UPDATE $user SET dexmod = dex"; mysqli_query($link,$query); 
$query = "UPDATE $user SET magmod = mag"; mysqli_query($link,$query); 

$_SESSION["healthregen"]= 0; 
$_SESSION["manaregen"]= 0;



//echo '<div>';
echo '<h2>Equipped</h2>';
echo '<div><span class="eqpcat">Right</span> '. $row['equipR'].'<span class="iStat">'; include ('buff-right.php');'</span>';


	$held = $row['equipR'];

	if ($held=='wooden bow' || $held=='hunter bow' || $held=='long bow' || $held=='iron bow' || $held=='enchanted bow' || $held=='venom bow' 
	|| $held=='silver bow' || $held=='steel bow' || $held=='ranger bow' 
	|| $held=='mithril bow' || $held=='black bow'){
			$_SESSION['bow_equipped'] = 1;
	 		echo '<span class="ammo"><span class="gold">arrows </span> x'.$row['arrows'].'</span> ';} else {$_SESSION['bow_equipped'] = 0;}
	
	
	if ($held=='crossbow' || $held=='iron crossbow' || $held=='compound crossbow' || $held=='hand crossbow' 
	|| $held=='silver crossbow' || $held=='steel crossbow' || $held=='keeper\'s crossbow' 
	|| $held=='mithril crossbow' || $held=='black crossbow'){
			$_SESSION['crossbow_equipped'] = 1;
		 echo '<span class="ammo"><span class="gold">bolts </span> x'.$row['bolts'].'</span> ';} else {$_SESSION['crossbow_equipped'] = 0;}
	
	if ($held=='javelin'){ echo '<span class="ammo"><span class="alt gold">qty </span> x'.$row['javelin'].'</span> ';}
	if ($held=='iron javelin'){ echo '<span class="ammo"><span class="alt gold">qty </span> x'.$row['ironjavelin'].'</span> ';}
	if ($held=='steel javelin'){ echo '<span class="ammo"><span class="alt gold">qty </span> x'.$row['steeljavelin'].'</span> ';}
	if ($held=='mithril javelin'){ echo '<span class="ammo"><span class="alt gold">qty </span> x'.$row['mithriljavelin'].'</span> ';}

 
echo '</div><div><span class="eqpcat">Left</span> '. $row['equipL'].'<span class="iStat">'; include ('buff-left.php');'</span>';
echo '</div><div><span class="eqpcat">Head</span> '. $row['equipHead'].'<span class="iStat">'; include ('buff-head.php');'</span>';
echo '</div><div><span class="eqpcat">Body</span> '. $row['equipBody'].'<span class="iStat">'; include ('buff-body.php');'</span>';
echo '</div><div><span class="eqpcat">Hands</span> '. $row['equipHands'].'<span class="iStat">'; include ('buff-hands.php');'</span>';
echo '</div><div><span class="eqpcat">Feet</span> '. $row['equipFeet'].'<span class="iStat">'; include ('buff-feet.php');'</span>';
if ($row['equipRing1'] != '<span> - - - </span>'){ echo '</div><div><span class="eqpcat">Ring1</span> '. $row['equipRing1'].'<span class="iStat">'; include ('buff-ring1.php');'</span>';}
if ($row['equipRing2'] != '<span> - - - </span>'){ echo '</div><div><span class="eqpcat">Ring2</span> '. $row['equipRing2'].'<span class="iStat">';include ('buff-ring2.php');'</span>';}

if ($row['equipNeck'] != '<span> - - - </span>'){ echo '</div><div><span class="eqpcat">Neck</span> '. $row['equipNeck'].'<span class="iStat">'; include ('buff-neck.php');'</span>'; }
// if ($row['equipAura'] != '<span> - - - </span>'){ echo '</div><div><span class="eqpcat">Aura</span> '. $row['equipAura']; include ('buff-aura.php'); }	

echo '</div>'; 


if ($row['equipAura'] != '<span> - - - </span>'){ 
	echo '<div><span class="eqpcat "></span> '. $row['equipAura'].'<span class="iStat">'; include ('buff-aura.php');'</span>'; echo '</div>'; }	

if ($row['equipComp'] != '<span> - - - </span>') {
	echo '<div><span class="eqpcat ">Comp</span> '. $row['equipComp'].'<span class="iStat">'; include ('buff-comp.php');'</span>'; echo '</div>'; }
if ($row['equipPet'] != '<span> - - - </span>') {
	echo '<div><span class="eqpcat ">Pet</span> '. $row['equipPet'].'<span class="iStat">'; include ('buff-pet.php');'</span>';echo '</div>'; }
if ($row['equipMount'] != '<span> - - - </span>') {
	echo '<div><span class="eqpcat ">Mount</span> '. $row['equipMount'].'<span class="iStat">'; include ('buff-mount.php');'</span>'; echo '</div>'; }
if ($row['equipArtifact'] != '<span> - - - </span>'){ 
	echo '<div><span class="eqpcat">Artifact</span> '. $row['equipArtifact'].'<span class="iStat">'; include ('buff-artifact.php');'</span>'; echo '</div>';}

//echo '</div>';


}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 


if ($bp==0) { echo '<h2>Main Stats </h2>'; }
	  else { echo '<h2>Main Stats <i class="yellow"><span class="px40 yellow">'.$row['bp'].' </span>BP to spend</i></h2>';}
echo '<div>';
// ----------------------------------------------------------------------------------------------------------- STR

	 if ($bp>0) { echo '<input type="submit" class="increaseBtn" name="input1" value="+1 str" /> ';}
	 if ($bp>9) { echo '<input type="submit" class="increaseBtn10" name="input1" value="+10 str" /> ';}
	 if ( $row['strmod'] ==  $row['str'] ) 
	 	{ echo '<span class="statcat red">STR</span> '. $row['str'].' '; }
	 if ( $row['strmod'] >  $row['str'] ) 
	 	{ echo '<span class="statcat red">STR</span> <span class="cross"> '. $row['str'].' </span> ( <span class="green">'.$row['strmod'].'</span> ) '; }
	 if ( $row['strmod'] <  $row['str'] ) 
	 	{ echo '<span class="statcat red">STR</span> <span class="cross"> '. $row['str'].' </span> ( <span class="red">'.$row['strmod'].'</span> ) '; }
		//$maxstr = 	$row['strmod'];
		
		 if ($weapontype==1){ 
		 			 	echo '<span class=""> +'.$onehanded.'<span class="red">1h</span></span>'; $row['strmod'] += $onehanded;
		 			 	$results = $link->query("UPDATE $user SET strmod = strmod + $onehanded"); }

		 if ($weapontype==2){ 
		 				echo '<span class=""> +'.$twohanded.'<span class="red">2h </span></span>'; $row['strmod'] += $twohanded;
		 				$results = $link->query("UPDATE $user SET strmod = strmod + $twohanded"); }
		 
		 
		 if ($_SESSION['reds']>0){ 
		 		echo ' <span class="red"> +20</span>'; $row['strmod'] += 20;
		 		$results = $link->query("UPDATE $user SET strmod = strmod +20"); }
		 
		 if ($_SESSION['coffee']>0){ 
		 		echo ' <span class="lightbrown"> +10</span>'; $row['strmod'] += 10;
		 		$results = $link->query("UPDATE $user SET strmod = strmod + 10"); }
		 
		 echo '<span class="maxstat">  <span class="red">'.$row['strmod'].'</span></span>';
	echo '</div>';
// ----------------------------------------------------------------------------------------------------------- DEX
echo '<div>';
	 if ($bp>0) { echo '<input type="submit" class="increaseBtn" name="input1" value="+1 dex" /> ';}
	 if ($bp>9) { echo '<input type="submit" class="increaseBtn10" name="input1" value="+10 dex" /> ';}
	 if ( $row['dexmod'] ==  $row['dex'] ) 
	 	{ echo '<span class="statcat green">DEX</span> '. $row['dex'].' '; }
	 if ( $row['dexmod'] >  $row['dex'] )
	 	{ echo '<span class="statcat green">DEX</span> <span class="cross"> '. $row['dex'].' </span> ( <span class="green">'.$row['dexmod'].'</span> ) '; }
	 if ( $row['dexmod'] <  $row['dex'] )
		 { echo '<span class="statcat green">DEX</span> <span class="cross"> '. $row['dex'].' </span> ( <span class="red">'.$row['dexmod'].'</span> ) '; }				
    	if ($weapontype==3){ echo '<span class=""> +'.$ranged.' ranged </span>'; $row['dexmod'] += $ranged;
		 $results = $link->query("UPDATE $user SET dexmod = dexmod + $ranged"); }
		
		 if ($_SESSION['greens']>0){ 
		 echo ' <span class="green"> +20</span>'; $row['dexmod'] += 20;
		 $results = $link->query("UPDATE $user SET dexmod = dexmod +20"); }
		 
		 
		 if ($_SESSION['coffee']>0){ 
		 echo ' <span class="lightbrown"> +10</span>'; $row['dexmod'] += 10;
		 		 $results = $link->query("UPDATE $user SET dexmod = dexmod +10"); }

		echo '<span class="maxstat">  <span class="green">'.$row['dexmod'].'</span></span>';
		$maxdex = $row['dexmod'];
echo '</div>';
// ----------------------------------------------------------------------------------------------------------- MAG
echo '<div>';
	 if ($bp>0) { echo '<input type="submit" class="increaseBtn" name="input1" value="+1 mag" /> ';}
	 if ($bp>9) { echo '<input type="submit" class="increaseBtn10" name="input1" value="+10 mag" /> ';}
		 
		 if ( $row['magmod'] ==  $row['mag'] ) 
	 	{ echo '<span class="statcat blue">MAG</span> '. $row['mag'].' '; }
		 if ( $row['magmod'] >  $row['mag'] )
		 { echo '<span class="statcat blue">MAG</span> <span class="cross"> '. $row['mag'].' </span> ( <span class="green">'.$row['magmod'].'</span> ) '; }
		 if ( $row['magmod'] <  $row['mag'] )
		 { echo '<span class="statcat blue">MAG</span>  <span class="cross"> '. $row['mag'].' </span> ( <span class="red">'.$row['magmod'].'</span> ) '; }
    	if ($weapontype==4){ echo '<span class=""> + null </span>'; }
		
		 if ($_SESSION['blues']>0){ echo ' <span class="blue"> +20</span>'; $row['magmod'] += 20;		
		 $results = $link->query("UPDATE $user SET magmod = magmod + 20"); 	}
		 if ($_SESSION['coffee']>0){ echo ' <span class="lightbrown"> +10</span>'; $row['magmod'] += 10;
		 		 $results = $link->query("UPDATE $user SET magmod = magmod + 10"); 	}
		
		echo '<span class="maxstat">  <span class="blue">'.$row['magmod'].'</span></span>';
		$maxmag = $row['magmod'];
echo '</div>';
// ----------------------------------------------------------------------------------------------------------- DEF
echo '<div>';
	 if ($bp>0) { echo '<input type="submit" class="increaseBtn" name="input1" value="+1 def" /> ';}
	 if ($bp>9) { echo '<input type="submit" class="increaseBtn10" name="input1" value="+10 def" /> ';}
		 
		 if ( $row['defmod'] ==  $row['def'] ) 
	 	{ echo '<span class="statcat gold">DEF</span> '. $row['def'].' '; }
		 
		 if ( $row['defmod'] >  $row['def'] )
		 { echo '<span class="statcat gold">DEF</span>  <span class="cross"> '. $row['def'].' </span> ( <span class="green">'.$row['defmod'].'</span> )'; }
		 if ( $row['defmod'] <  $row['def'] )
		 { echo '<span class="statcat gold">DEF</span>  <span class="cross"> '. $row['def'].' </span> ( <span class="red">'.$row['defmod'].'</span> )'; }

		
    	if ($row['toughness'] >=1) { echo ' <span class=""> +'.$row['toughness'].'<span class="gold">T</span> </span>';
													$row['defmod'] += $row['toughness']; }
		
				
		 if ($_SESSION['yellows']>0){ echo ' <span class="gold"> +20</span>'; $row['defmod'] += 20;
		 			$results = $link->query("UPDATE $user SET defmod = defmod + 20"); }
		 if ($_SESSION['coffee']>0){ echo ' <span class="lightbrown"> +10</span>'; $row['defmod'] += 10;
		 		 	$results = $link->query("UPDATE $user SET defmod = defmod + 10"); 	}
		
		// shield check for block
		if (($row['block'] >=1) && ($row['equipL'] == 'training shield' || $row['equipL'] == 'basic shield' 
							|| $row['equipL'] == 'kite shield' || $row['equipL'] == 'buckler' || $row['equipL'] == 'wooden shield'
							|| $row['equipL'] == 'hunter shield' || $row['equipL'] == 'iron shield' || $row['equipL'] == 'iron kite shield'
							|| $row['equipL'] == 'silver shield' || $row['equipL'] == 'steel shield' || $row['equipL'] == 'steel kite shield'
							|| $row['equipL'] == 'red shield') || $row['equipL'] == 'mithril shield' || $row['equipL'] == 'mithril kite shield'
							|| $row['equipL'] == 'sphinx shield' || $row['equipL'] == 'ranger shield' || $row['equipL'] == 'ultima shield') { 
			$doubleBlock = ($row['block']*2);
			$row['defmod'] += $doubleBlock;
			echo ' <span class=""> +'.$doubleBlock.' block </span>'; 
			}
		
		
		if ($_SESSION['ironskin_amount'] > 0) { 
					echo ' <span class=""> +'.$_SESSION['ironskin_amount'].'<span class="lightbrown">is</span> </span>';
					$row['defmod'] += $_SESSION['ironskin_amount'];
 					}		
		
		echo '<span class="maxstat">  <span class="gold">'.$row['defmod'].'</span></span>';
		$maxdef = $row['defmod'];
		
echo '</div>';

$statTotal = $row['strmod'] + $row['dexmod'] + $row['magmod'] + $row['defmod'];

// echo '<div><span class="px30 white">Stat Total </span> <span class="px30 white maxstat">'. $statTotal .'</span></div>';




// ----------------------------------------------------------------------------------------------------------- END HUD STATS!



/*

	echo'<div><h4>Stats EXTENDED</h4>';	

	 	echo '<div><span class="px20 gold w50">STR</span> <span class="gray px10">base</span>
				<span class="red px14">'. $row['str'].' </span> / 
				<span class="gray px10">max</span>
				<span class="px40 w100 red">'.$row['strmod'].'</span> 
				<span class="dgray"> ( melee damage )</span></div>';
		
		echo '<div><span class="px20 gold w50">DEX</span> <span class="gray px10">base</span>
				<span class="green"> '. $row['dex'].' </span> / 
				<span class="gray px10">max</span>
				<span class="px40 w100 green"> '.$maxdex.'</span> 
				<span class="dgray"> ( ranged damage )</span></div>';
	 	
		echo '<div><span class="px20 gold w50"`>MAG</span> <span class="gray px10">base</span>
				<span class="blue"> '. $row['mag'].' </span> / 
				<span class="gray px10">max</span>
				<span class="px40 w100 blue"> '.$maxmag.'</span> 
				<span class="dgray"> ( magic power )</span></div>';						
	 	
		echo '<div><span class="px20 gold w50">DEF</span> <span class="gray px10">base</span>
				<span class="gold"> '. $row['def'].' </span> / 
				<span class="gray px10">max</span>
				<span class="px40 w100 gold"> '.$maxdef.'</span> 
				<span class="dgray"> ( defensive power )</span></div>';		
		
		echo '</div>';
		echo '<div><span class="px30 gold">Stat Total </span> <span class="px60 white">'. $statTotal .'</span></div>
 ';
		
		
		
	*/
	



 
echo '<h2>Battle Stats</h2>
	  	<div>kills <span class="px25 green">'. $row['KLtotalkill'].'</span></div>
	   	<div>deaths <span class="px25 red"> '. $row['deaths'].'</span></div>
	  	<div>clicks <span class="px20 blue">'. $row['clicks'].'</span></div>';
		
		
		
		echo '<h2>Experience</h2>
	   		<div>You have <span class="px25 green">'.$xp.'</span> xp</div>
			<div>You are <span class="px25 green">'.$count.'%</span> to the next level</div>
			<div>Next level at <span class="px25 green">'.$nextlevel.'</span> xp</div>
			<div>You need <span class="px25 green">'.$need.'</span> xp to reach level '.$nxlevel.'</div>
		
		<h2>Gold Chests</h2>';	
		
		echo '<div><span class="yellowgreen">Grassy Field </span>';
		if ($row['chest1'] >=1){ echo '<span class="green right">OPENED!</span></div>';}
						 else { echo '<span class="black right"> Locked</span></div> ';}
		
		echo '<div><span class="green">Forest</span> ';
		if ($row['chest2'] >=1){echo '<span class="green right">OPENED!</span></div>';}
						 else { echo '<span class="black right"> Locked</span></div> ';}
		
		echo '<div><span class="red">Red Town</span> ';	
		if ($row['chest3'] >=1){echo '<span class="green right">OPENED!</span></div>';}
						 else { echo '<span class="black right"> Locked</span></div> ';}
		
		echo '<div><span class="gray">Stone Mine</span> ';	
		if ($row['chest4'] >=1){echo '<span class="green right">OPENED!</span></div>';}
						 else { echo '<span class="black right"> Locked</span></div>';}
		
		echo '<div><span class="blue">Blue Ocean</span> ';
		if ($row['chest5'] >=1){echo '<span class="green right">OPENED!</span></div>';}
						 else { echo '<span class="black right"> Locked </span></div>';}
		
		echo '<div><span class="dgreen">Dark Forest</span> ';
		if ($row['chest6'] >=1){echo '<span class="green right">OPENED!</span></div>';}
						 else { echo '<span class="black right"> Locked </span></div>';}
		
		echo '<div><span class="dgray">Stone Mountain</span> ';
		if ($row['chest7'] >=1){echo '<span class="green right">OPENED!</span></div>';}
						 else { echo '<span class="black right"> Locked </span></div>';}				 				 
				
		echo '<div><span class="blue">Star City</span> ';
		if ($row['chest8'] >=1){echo '<span class="green right">OPENED!</span></div>';}
						 else { echo '<span class="black right"> Locked </span></div>';}				 				 
								
		
		
		
		echo '<h2>Other Containers</h2>';	
		echo '<div><span class="lightgray">Silver Chests:  '.$row['silverchests'].'</span></div>';
		echo '<div><span class="gray">Gray Chests: '.$row['graychests'].'</span></div>';
		echo '<div><span class="brown">Wooden Chests: '.$row['woodenchests'].'</span></div>';	
		echo '<div><span class="lightbrown">Pots Smashed:  '.$row['pots'].'</span></div>';
	
	
	
	
	//include ('stickman.php');

//echo '</form>';	  
//echo '</article>';	  
 

}

    
	 

   