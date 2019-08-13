<?php
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
		
echo '


<div id="hud">
<h3 class="user">'.$row['username'].'</h3>
			
<div class="buffbound">';
		
// --------------------------------------------------------------------------- Poison Buff Box
		if ( $_SESSION['poisonyou'] >  0 ) 
		 { echo '<span class="darkgreen buffBox">poison -'.$_SESSION['poisonyou'].'</span>'; }			
// --------------------------------------------------------------------------- Breathing Water Buff Box
		if ( $_SESSION['flying'] >  0 ) 
		 { echo '<span class="blue buffBox">wings</span>'; }		
// --------------------------------------------------------------------------- FLying Buff Box
		if ( $_SESSION['breathingwater'] >  0 ) 
		 { echo '<span class="darkblue buffBox">gills</span>'; }	
// --------------------------------------------------------------------------- Iron Skin Buff Box
		if ( $_SESSION['ironskin_amount'] >  0 ) 
		 { echo '<span class="lightbrown buffBox">ironskin +'.$_SESSION['ironskin_amount'].'</span>'; }	
// --------------------------------------------------------------------------- Regenerate Buff Box
		if ( $_SESSION['regenerate_clicks'] >  0 ) 
		 { echo '<span class="red buffBox">regen +'.$row['regenerate'].'</span>'; }
// --------------------------------------------------------------------------- COLORS Box
		if ( $_SESSION['coffee'] >  0 ) { echo '<span class="lightbrown buffBox">java</span>'; }		 
		if ( $_SESSION['tea'] >  0 ) { echo '<span class="yellowgreen buffBox">tea</span>'; }		 
		if ( $_SESSION['reds'] >  0 ) { echo '<span class="red buffBox">str</span>'; }		 
		if ( $_SESSION['greens'] >  0 ) { echo '<span class="green darkgreen buffBox">dex</span>'; }		 
		if ( $_SESSION['blues'] >  0 ) { echo '<span class="blue buffBox">mag</span>'; }		 
		if ( $_SESSION['yellows'] >  0 ) { echo '<span class="gold darkestgray buffBox">def</span>'; }		 
		if ( $_SESSION['purples'] >  0 ) { echo '<span class="lightpurple buffBox">xp</span>'; }		 
		if ( $_SESSION['golds'] >  0 ) { echo '<span class="yellow darkgray buffBox">$</span>'; }
echo '</div>'; // end buffbound box

// --------------------------------------------------------------------------- Magic Armor Buff Box
		if ( $_SESSION['magicarmor_amount'] >  0 )
		 { echo '<span class="lightredBG magicarmorBox">+'.$_SESSION['magicarmor_amount'].'</span>'; }
		 
		 
		 
		 
///echo '<a id="figDisplay2" class="tabbb hov" href="#stats"><img src="img/fig/figFPO.png" alt=""/></a>';

		 
$extrahp = 0;
$extramp = 0;		

echo '<div class="statBars">'; 
// --------------------------------------------------------------------------- HP BAR
if ( $row['hp'] >  $row['hpmax'] ) // HP EXTRA
		 { 
		 $barBGcolor = 'yellowBG'; 
		 $barNUMcolor = 'darkgray';
		 $extrahp = $row['hp'] - $row['hpmax'];
		 
		 //echo '<li><span class="lightred">HP </span> <span class="yellow"> '. $hp ." </span> / ". $hpmax;
		  }
		 		 			
else //( $row['hp'] <=  $row['hpmax'] )   // HP NORMAL
		 { 
		 $barBGcolor = 'redBG'; 
		 $barNUMcolor = 'lightgray';
		// echo '<li><span class="lightred">HP </span>  '. $hp ." / ". $hpmax;
		 }
	
	//if ($hp>$hpmax) {$hp=$hpmax;} // show max hp if hp is more than max
	
	echo '
	<div class="bar hpBar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
    <div class="barStat '.$barNUMcolor.'">'.$hp.'
	</div></div></div>';
/*
if ( $row['hp'] >  $row['hpmax'] ) // HP EXTRA
{
echo '<span class="extrahpBox">'.$extrahp.'</span>';
}
*/
 //  echo'	</li>';
	
// MP Percent
$percent = (($mp / $mpmax)* 100);
if ( $percent > 100 ) { $percent = 100; } 
//$percent = $percent * $scale;	

$extramp = $row['mp'] - $row['mpmax'];

if ( $mp >  $mpmax )
		 { 
		 $barBGcolor = 'yellowBG'; 
		 $barNUMcolor = 'darkgray';
		 //echo '<li><span class="blue">MP </span> <span class="yellow">'.$mp.' </span> / '.$mpmax; 
		 }
else	 {
		 $barBGcolor = 'blueBG'; 
		 $barNUMcolor = 'lightgray';
		 //echo '<li><span class="blue">MP</span> '.$mp.' / '.$mpmax;
		  }
	
//if ($mp>$mpmax) {$mp=$mpmax;} // show max mp if mp is more than max
	
	echo '
	<div class="bar mpBar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
    <div class="barStat '.$barNUMcolor.'">'.$mp.'
	</div></div></div>';
	
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
if ( $percent > 100 ) { $percent = 100; } 
if ( $percent < 0 ) { $percent = 0; } 
//$percent = $percent * $scale;		 

$barBGcolor = 'greenBG'; 
$barNUMcolor = 'lightgray';
		 	//<li><span class="green">XP</span> '.$xp.' //  </li>
			
			// <div class="barStat '.$barNUMcolor.'">'.$levelxp.'</div>
			
	echo '
	<div class="bar xpBar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
   </div></div>
	';
echo '</div>'; 
		 
	 
		
	//	echo '<h4>Equipped</h4>';
		
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Resets all BUFFS **


$query = "UPDATE $user SET strmod = str"; mysqli_query($link,$query);
$query = "UPDATE $user SET defmod = def"; mysqli_query($link,$query);
$query = "UPDATE $user SET dexmod = dex"; mysqli_query($link,$query); 
$query = "UPDATE $user SET magmod = mag"; mysqli_query($link,$query); 

$_SESSION["healthregen"]= 0; 
$_SESSION["manaregen"]= 0;



echo '<div>
<div><span class="eqpcat">Right</span> '. $row['equipR'].'<span class="iStat">'; include ('buff-right.php');'</span>';


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

echo 'SE:'.$row['strmod'].' D:'.$row['dexmod'].' M:'.$row['magmod'].' D:'.$row['defmod'].'<br>';


if ($row['equipAura'] != '<span> - - - </span>'){ 
	echo '<div><span class="eqpcat "></span> '. $row['equipAura'].'<span class="iStat">'; include ('buff-aura.php');'</span>'; echo '</div>'; }	

if ($row['equipComp'] != '<span> - - - </span>') {
	echo '<div><span class="eqpcat ">Comp</span> '. $row['equipComp'].'<span class="iStat">'; include ('buff-comp.php');'</span>'; echo '</div>'; }
if ($row['equipPet'] != '<span> - - - </span>') {
	echo '<div><span class="eqpcat ">Pet</span> '. $row['equipPet'].'<span class="iStat">'; include ('buff-pet.php');'</span>';echo '</div>'; }
if ($row['equipMount'] != '<span> - - - </span>') {
	echo '<div><span class="eqpcat ">Mount</span> '. $row['equipMount'].'<span class="iStat">'; include ('buff-mount.php');'</span>'; echo '</div>'; }
if ($row['equipArtifact'] != '<span> - - - </span>'){ 
	echo '<div><span class="eqpcat darkestgray">Artifact</span> '. $row['equipArtifact'].'<span class="iStat">'.'</span>'; include ('buff-artifact.php');'</span>'; echo '</div>';}

echo '</div>';

// ----------------------------------------------------------------------------------------------------------- EQUIPPED!
/*
echo '<div class="comps">';
if ($row['equipAura'] != '<span> - - - </span>'){ 
	echo '<span class="eqpcat darkestgray"></span> '. $row['equipAura']; include ('buff-aura.php');  }	

if ($row['equipComp'] != '<span> - - - </span>') {
	echo '<span class="eqpcat darkestgray">Comp</span><br> '. $row['equipComp']; include ('buff-comp.php');  }
if ($row['equipPet'] != '<span> - - - </span>') {
	echo '<span class="eqpcat darkestgray">Pet</span><br> '. $row['equipPet']; include ('buff-pet.php'); }
if ($row['equipMount'] != '<span> - - - </span>') {
	echo '<span class="eqpcat darkestgray">Mount</span><br> '. $row['equipMount']; include ('buff-mount.php'); }
if ($row['equipArtifact'] != '<span> - - - </span>'){ 
	echo '<span class="eqpcat darkestgray">Artifact</span><br> '. $row['equipArtifact']; include ('buff-artifact.php'); }

echo '<span class="eqpcat">Right</span> '. $row['equipR']; include ('buff-right.php');


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

 
echo '<span class="eqpcat">Left</span> '. $row['equipL']; include ('buff-left.php');
echo '<span class="eqpcat">Head</span> '. $row['equipHead']; include ('buff-head.php');
echo '<span class="eqpcat">Body</span> '. $row['equipBody']; include ('buff-body.php');
echo '<span class="eqpcat">Hands</span> '. $row['equipHands']; include ('buff-hands.php');
echo '<span class="eqpcat">Feet</span> '. $row['equipFeet']; include ('buff-feet.php');
if ($row['equipRing1'] != '<span> - - - </span>'){ echo '<span class="eqpcat">Ring1</span> '. $row['equipRing1']; include ('buff-ring1.php');}
if ($row['equipRing2'] != '<span> - - - </span>'){ echo '<span class="eqpcat">Ring2</span> '. $row['equipRing2']; include ('buff-ring2.php');}

if ($row['equipNeck'] != '<span> - - - </span>'){ echo '<span class="eqpcat">Neck</span> '. $row['equipNeck']; include ('buff-neck.php'); }
// if ($row['equipAura'] != '<span> - - - </span>'){ echo '<span class="eqpcat">Aura</span> '. $row['equipAura']; include ('buff-aura.php'); }	

echo '</div>';





// ----------------------------------------------------------------------------------------------------------- HUD STATS!
// -------------------------DB CONNECT! - reconnect to display correct buffs
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 
		 
		 
if (	$row['equipNeck'] == '<span> - - - </span>' && $row['equipRing2'] == '<span> - - - </span>') {	 
echo '<h4>Stats</h4>';
}
echo'
<form id="mainForm" method="post" action="" name="formInput" class="maxBox">';


// ----------------------------------------------------------------------------------------------------------- STR

	 /*if ( $row['strmod'] ==  $row['str'] ) 
	 	{ echo '<span class="statcat lightred">STR</span> '. $row['str'].' '; }
	 if ( $row['strmod'] >  $row['str'] ) 
	 	{ echo '<span class="statcat lightred">STR</span> <span class="cross"> '. $row['str'].' </span> ( <span class="green">'.$row['strmod'].'</span> ) '; }
	 if ( $row['strmod'] <  $row['str'] ) 
	 	{ echo '<span class="statcat lightred">STR</span> <span class="cross"> '. $row['str'].' </span> ( <span class="lightred">'.$row['strmod'].'</span> ) '; }
		//$maxstr = 	$row['strmod'];
		
		 if ($weapontype==1){ 
		 			// 	echo '<span class=""> +'.$onehanded.' one handed </span>'; $row['strmod'] += $onehanded;
		 			 	$results = $link->query("UPDATE $user SET strmod = strmod + $onehanded"); }

		 if ($weapontype==2){ 
		 			//	echo '<span class=""> +'.$twohanded.' two handed </span>'; $row['strmod'] += $twohanded;
		 				$results = $link->query("UPDATE $user SET strmod = strmod + $twohanded"); }
		 
		 
		 if ($_SESSION['reds']>0){ 
		 		//echo ' <span class="lightred"> +20</span>'; $row['strmod'] += 20;
		 		$results = $link->query("UPDATE $user SET strmod = strmod +20"); }
		 
		 if ($_SESSION['coffee']>0){ 
		 	//	echo ' <span class="lightbrown"> +10</span>'; $row['strmod'] += 10;
		 		$results = $link->query("UPDATE $user SET strmod = strmod + 10"); }
		 
		 echo '<span class="maxstat">  <span class="lightred">'.$row['strmod'].'</span>';
		 	 if ($bp>0) { echo '<input type="submit" class="increaseBtn" name="input1" value="increase str" /> ';}
		echo '</span>';
	
// ----------------------------------------------------------------------------------------------------------- DEX
//echo '<br />';
	/* if ( $row['dexmod'] ==  $row['dex'] ) 
	 	{ echo '<span class="statcat green">DEX</span> '. $row['dex'].' '; }
	 if ( $row['dexmod'] >  $row['dex'] )
	 	{ echo '<span class="statcat green">DEX</span> <span class="cross"> '. $row['dex'].' </span> ( <span class="green">'.$row['dexmod'].'</span> ) '; }
	 if ( $row['dexmod'] <  $row['dex'] )
		 { echo '<span class="statcat green">DEX</span> <span class="cross"> '. $row['dex'].' </span> ( <span class="lightred">'.$row['dexmod'].'</span> ) '; }				
    	 
	if ($weapontype==3){ 
	//echo '<span class=""> +'.$ranged.' ranged </span>'; 
	$row['dexmod'] += $ranged;
		 $results = $link->query("UPDATE $user SET dexmod = dexmod + $ranged"); 
		 }
		
		 if ($_SESSION['greens']>0){ 
		 //echo ' <span class="green"> +20</span>'; 
		 $row['dexmod'] += 20;
		 $results = $link->query("UPDATE $user SET dexmod = dexmod +20"); 
		 }
		 
		 
		 if ($_SESSION['coffee']>0){ 
		// echo ' <span class="lightbrown"> +10</span>'; 
		$row['dexmod'] += 10;
		 		 $results = $link->query("UPDATE $user SET dexmod = dexmod +10"); 
				 }

		echo '<span class="maxstat">  <span class="green">'.$row['dexmod'].'</span>';
			 if ($bp>0) { echo '<input type="submit" class="increaseBtn" name="input1" value="increase dex" /> ';}
	echo'</span>';
		$maxdex = $row['dexmod'];
// ----------------------------------------------------------------------------------------------------------- MAG
//echo '<br />';
		 
		/* if ( $row['magmod'] ==  $row['mag'] ) 
	 	{ echo '<span class="statcat blue">MAG</span> '. $row['mag'].' '; }
		 if ( $row['magmod'] >  $row['mag'] )
		 { echo '<span class="statcat blue">MAG</span> <span class="cross"> '. $row['mag'].' </span> ( <span class="green">'.$row['magmod'].'</span> ) '; }
		 if ( $row['magmod'] <  $row['mag'] )
		 { echo '<span class="statcat blue">MAG</span>  <span class="cross"> '. $row['mag'].' </span> ( <span class="lightred">'.$row['magmod'].'</span> ) '; }
    	if ($weapontype==4){ echo '<span class=""> + null </span>'; }
		 
		 if ($_SESSION['blues']>0){ 
		 	//echo ' <span class="blue"> +20</span>'; $row['magmod'] += 20;		
		 $results = $link->query("UPDATE $user SET magmod = magmod + 20"); 	}
		 if ($_SESSION['coffee']>0){ 
		 	//echo ' <span class="lightbrown"> +10</span>'; $row['magmod'] += 10;
		 		 $results = $link->query("UPDATE $user SET magmod = magmod + 10"); 	}
		
		echo '<span class="maxstat">  <span class="blue">'.$row['magmod'].'</span>';
		
				if ($bp>0) { echo '<input type="submit" class="increaseBtn" name="input1" value="increase mag" /> ';}

	echo '</span>';
		$maxmag = $row['magmod'];

// ----------------------------------------------------------------------------------------------------------- DEF
//echo '<br />';
		 
	/*	 if ( $row['defmod'] ==  $row['def'] ) { 
		 echo '<span class="statcat gold">DEF</span> '. $row['def'].' '; }
		 
		 if ( $row['defmod'] >  $row['def'] ) { 
		 echo '<span class="statcat gold">DEF</span>  <span class="cross"> '. $row['def'].' </span> ( <span class="green">'.$row['defmod'].'</span> )'; }
		 if ( $row['defmod'] <  $row['def'] ) { 
		 echo '<span class="statcat gold">DEF</span>  <span class="cross"> '. $row['def'].' </span> ( <span class="lightred">'.$row['defmod'].'</span> )'; }

		
    	if ($row['toughness'] >=1) { 
		//echo ' <span class=""> +'.$row['toughness'].' toughness </span>';
													$row['defmod'] += $row['toughness']; }
		
				
		 if ($_SESSION['yellows']>0){ 
		 		//echo ' <span class="gold"> +20</span>'; 
		 		$row['defmod'] += 20;
		 			$results = $link->query("UPDATE $user SET defmod = defmod + 20"); }
		 if ($_SESSION['coffee']>0){ 
		 		//echo ' <span class="lightbrown"> +10</span>'; 
		 		$row['defmod'] += 10;
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
			//echo ' <span class=""> +'.$doubleBlock.' block </span>'; 
			}
		
		
		if ($_SESSION['ironskin_amount'] > 0) { 
					//echo ' <span class=""> +'.$_SESSION['ironskin_amount'].' iron skin </span>';
					$row['defmod'] += $_SESSION['ironskin_amount'];
 					}		
		
		echo '<span class="maxstat">  <span class="gold">'.$row['defmod'].'</span>';
		
				if ($bp>0) { echo '<input type="submit" class="increaseBtn" name="input1" value="increase def" /> ';}

		echo '</span>';
		$maxdef = $row['defmod'];
		
*/

// ----------------------------------------------------------------------------------------------------------- END HUD STATS!

// ----------------------------------------------------------------------------- HUD TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

//------------------------------------ BATTLE STATUS

  $hp = $row['hp'];
	  $hpmax = $row['hpmax'];
	  $mp = $row['sp'];
	  $mpmax = $row['mpmax'];
	  $str = $row['str'];
	  $def = $row['def'];
	
	  $enemy = $row['enemy'];
	  $enemyhpmax = $row['enemyhpmax'];
	  $enemyhp = $row['enemyhp'];
	  $enemyatt = $row['enemyatt'];
  	  $enemydef = $row['enemydef'];
	  
	  $infight = $row['infight'];
	  $endfight = $row['endfight'];
	  $weapontype = $row['weapontype'];
  
  
  
  
  
  
	   // Enemy HP Percent
$percent = (($enemyhp / $enemyhpmax)* 100);
if ( $percent > 100 ) { $percent = 100; } 
//$percent = $percent * $scale;

		 $barBGcolor = 'blackBG'; 
		 $barNUMcolor = 'lightgray';  
		 
		 
  
  $enemyLVL = $_SESSION['eLvl'];			// enemy level

 
 
 
 
  if ($infight >= 1) {
  echo '<div id="eBox">';     // ENEMY BATTLE BOX

 
  //echo '<div class="inbattle redBG">IN BATTLE</div>';
	
			
//echo'	<span class="">You are hit for</span><div class="attacknumber redBG">'.$edamagetotal.'</div>
		//	HP<span class="black">'.$enemyhp.' / '.$enemyhpmax.'</span>

echo'	
    <span class="black px16">'.$enemy.'</span>
	
	<div class="bar">
	<div style="width: '.$percent.'%" class="barMid '.$barBGcolor.'">
    <div class="barStat '.$barNUMcolor.'">'.$enemyhp.'
	</div>
	</div>
	<span class="maxhpdisplay">'.$enemyhpmax.'</span>
	</div>
	   
	   	lvl<span class="black px14">'.$enemyLVL.'</span>
		att<span class="black px16">'.$enemyatt.'</span> 
		def<span class="black px16">'.$enemydef.' </span>
	   
	   <span class="battle">';
	
	  if ($_SESSION['eFly'] >= 1) { echo '<span class=" blueBG white">Flying</span>'; }
	  if ($_SESSION['eCrit'] >= 1) { echo '<span class=" blackBG">Crit</span>'; }
	  if ($_SESSION['eRage'] >= 1) { echo '<span class=" redBG white">Rage</span>'; }
	  if ($_SESSION['ePow'] >= 1) { echo '<span class=" redBG white">Pow</span>'; }
	  if ($_SESSION['eBite'] >= 1) { echo '<span class=" redBG white">Bite</span>'; }
	  if ($_SESSION['eDex'] >= 1) { echo '<span class=" dgreenBG white">Range</span>'; }
	  if ($_SESSION['eMag'] >= 1) { echo '<span class=" blueBG white">Mag</span>'; }
	  if ($_SESSION['eHeal'] >= 1) { echo '<span class=" greenBG">Heal</span>'; }
	  if ($_SESSION['eSteal'] >= 1) { echo '<span class=" goldBG darkestgray">Steal lvl'.$_SESSION['eSteal'].'</span>'; }
	  if ($_SESSION['eMulti'] >= 1) { echo '<span class=" blackBG">Multi Hit '.$_SESSION['eMulti'].'0%</span>'; }
	  if ($_SESSION['eDoubleHit'] >= 1) { echo '<span class=" blackBG">Double Hit</span>'; }
	  if ($_SESSION['eTripleHit'] >= 1) { echo '<span class=" blackBG">Triple Hit</span>'; }
	  
	  if ($_SESSION['ePureA'] >= 1) { echo '<span class="eBox redBG white">Pure A</span>'; }
	  if ($_SESSION['ePureD'] >= 1) { echo '<span class="eBox goldBG darkestgray">Pure D</span>'; }
	  if ($_SESSION['eStrImm'] >= 1) { echo '<span class="eBox redBG white">Str Imm</span>'; }
	  if ($_SESSION['eDexImm'] >= 1) { echo '<span class="eBox dgreenBG white">Dex Imm</span>'; }
	  if ($_SESSION['eMagImm'] >= 1) { echo '<span class="eBox blueBG white">Mag Imm</span>'; }
	  if ($_SESSION['eDodge'] >= 1) { echo '<span class="eBox blueBG white">Dodge '.$_SESSION['eDodge'].'0%</span>'; }

	echo'</span> ';
	   
	    echo '</div>';     // END ENEMY BATTLE BOX
 
  }
  
 	
  else if ($endfight==1 ) { 
  
  		//echo '<div class="battlewin">You have defeated the '.$enemy.'!</div>';
		echo $message;
		$query = $link->query("UPDATE $user SET endfight = 2 "); 
		
		}
		
		
  else if ($_SESSION['dangerLVL'] == 0) {
	echo '	<div class="battlestatus darkgrayBG green">no danger</div>';
  }
  else if ($endfight>=1) {
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="blue">'.$_SESSION['dangerLVL'].'</span> <span class="green">SAFE</span></div>';  
  }
  else if ($_SESSION['dangerLVL'] >= ($level*3) ) { 		//10 			/30
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="black">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="black">SUICIDE!!! </span></div>';  
  }
  else if ($_SESSION['dangerLVL'] >= ($level*2) ) { 		//10 			/20
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="black">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="black">INSANE!! </span></div>';  
  }
 else if ($_SESSION['dangerLVL'] >= ($level*(1.5)) ) { 		//10 			/15
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="darkred">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="darkred">VERY HIGH! </span></div>';  
  } 
  else if ($_SESSION['dangerLVL'] > $level ) {		//10  // 10
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="red">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="red">HIGH </span></div>';  
  }
  else if ($_SESSION['dangerLVL'] == $level ) {		//10  // 10
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="red">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="gold">EVEN MATCH! </span></div>';  
  }
  else if ($_SESSION['dangerLVL'] >= ($level/(1.25))) { //10  // 8
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="orange">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="orange">AVG</span></div>';  
  }
  else if ($_SESSION['dangerLVL'] >= ($level/(1.5)) ) { //10  // 6.666
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="gold">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="gold">AVG </span></div>';  
  }
  else if ($_SESSION['dangerLVL'] >= ($level/2)  ) { //10  // 5
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="yellow">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="yellow">LOW</span></div>';  
  }
   else if ($_SESSION['dangerLVL'] >= ($level/3)   ) { //10  // 3.333
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="yellowgreen">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="yellowgreen">VERY LOW</span></div>';  
  }
  else if ($_SESSION['dangerLVL'] < ($level/3)   ) { //10  // 3.333
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="green">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="green">SUPER EZ</span></div>';  
  }
  else {
	echo '	<div class="battlestatus darkgrayBG">danger LVL <span class="gold">'.$_SESSION['dangerLVL'].'</span> Danger Level <span class="gold"> LAST? check hud</span></div>';  
  }



echo '</div>';	 // end HUD
	   

}
}