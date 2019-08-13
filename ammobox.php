<?php  
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

  

// echo '<a data-link="all-actions" class="actionIcon"><i class="fa fa-caret-left"></i></a>';	
//echo '<div data-pop="all-actions" class="actionBox">';


$magicstrike=$row['magicstrike'];
$fireball=$row['fireball'];
$frostball=$row['frostball'];
$poisondart=$row['poisondart'];
$atomicblast=$row['atomicblast'];
$recall=$row['recall'];


$heal=$row['heal'];
$regenerate=$row['regenerate'];
$ironskin=$row['ironskin'];
$wings=$row['wings'];
$gills=$row['gills'];

$purplepotion=$row['purplepotion'];
$redpotion=$row['redpotion'];
$bluepotion=$row['bluepotion'];
$cookedmeat=$row['cookedmeat'];
$rawmeat=$row['rawmeat'];
$redberry=$row['redberry'];
$blueberry=$row['blueberry'];

$veggies=$row['veggies'];
$meatball=$row['meatball'];
$bluefish=$row['bluefish'];

$redbalm=$row['redbalm'];
$bluebalm=$row['bluebalm'];
$purplebalm=$row['purplebalm'];

$wingspotion=$row['wingspotion'];
$gillspotion=$row['gillspotion'];
$antidotepotion=$row['antidotepotion'];
$coffee=$row['coffee'];
$tea=$row['tea'];
$reds=$row['reds'];
$greens=$row['greens'];
$blues=$row['blues'];
$yellows=$row['yellows'];
$golds=$row['golds'];
$purples=$row['purples'];


$currency = $row['currency'];
	
	//<section class="panel" data-pop2="ammobox" id="moreActions">
//<form id="mainForm" class="actionFrame" method="post" action="" name="formInput">


	
	



	
	
	
//$row['hp'] >  $row['hpmax']	
echo '<h2>Health & Mana:</h2>';
	echo '<p>You have <span class="red">'.$row['hp'].'</span> / '.$row['hpmax'].' HP</p>';	
	echo '<p>You have <span class="blue">'.$row['mp'].'</span> / '.$row['mpmax'].' MP</p>';	

if ($redberry>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+10 HP" /> <span>x</span>'.$redberry.'  <span class="red">redberry</span> </div>';}
if ($rawmeat>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+25 HP" /> <span>x</span>'.$rawmeat.' <span class="red">raw meat</span> </div>';}
if ($cookedmeat>=1){ echo '<div><input class="redBG" type="submit"name="input1" value="+50 HP" /> <span>x</span>'.$cookedmeat.' <span class="red">cooked meat</span> </div>';}
if ($redpotion>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+100 HP" /> <span>x</span>'.$redpotion.' <span class="red">red potion</span> </div>';}
if ($meatball>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+400 HP" /> <span>x</span>'.$meatball.' <span class="red">meatball</span> </div>';}
if ($redbalm>=1){echo '<div><input class="redBG" type="submit"name="input1" value="+1000 HP" /> <span>x</span>'.$redbalm.' <span class="red">red balm</span> </div>';}
if ($blueberry>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="+10 MP" /> <span>x</span>'.$blueberry.' <span class="darkblue">blueberry</span> </div>';}	
if ($bluepotion>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="+100 MP" /> <span>x</span>'.$bluepotion.' <span class="darkblue">blue potion</span> </div>';}
if ($bluefish>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="+400 MP" /> <span>x</span>'.$bluefish.' <span class="darkblue">bluefish</span> </div>';}	
if ($bluebalm>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="+1000 MP" /> <span>x</span>'.$bluebalm.' <span class="darkblue">blue balm</span> </div>';}
if ($veggies>=1){echo '<div><input class="purpleBG" type="submit"name="input1" value="+50 HP/MP" /> <span>x</span>'.$veggies.' <span class="purple">veggies</span>   </div>';}
if ($purplepotion>=1){echo '<div><input class="purpleBG" type="submit"name="input1" value="+200 HP/MP" /> <span>x</span>'.$purplepotion.' <span class="purple">purple potion</span> </div>';}
if ($purplebalm>=1){echo '<div><input class="purpleBG" type="submit"name="input1" value="+2000 HP/MP" /> <span>x</span>'.$purplebalm.' <span class="purple">purple balm</span> </div>';}
	


	
echo '<h2>Buffs</h2>';

if ($reds>=1){echo '<div><input class="redBG" type="submit"name="input1" value="reds" /> <span>x</span>'.$reds.'</div>';}
if ($greens>=1){echo '<div><input class="greenBG" type="submit"name="input1" value="greens" /> <span>x</span>'.$greens.'</div>';}
if ($blues>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="blues" /> <span>x</span>'.$blues.'</div>';}
if ($yellows>=1){echo '<div><input class="goldBG" type="submit"name="input1" value="yellows" /> <span>x</span>'.$yellows.'</div>';}


if ($coffee>=1){echo '<div><input class="lightbrownBG" type="submit"name="input1" value="coffee" /> <span>x</span>'.$coffee.'</div>';}
if ($tea>=1){echo '<div><input class="greenBG" type="submit"name="input1" value="tea" /> <span>x</span>'.$tea.'</div>';}	
	

if ($wings>=1){echo '<div><input class="blueBG" type="submit" name="input1" value="cast wings" /> lvl '.$wings.'</div>';}
if ($wingspotion>=1){echo '<div><input class="blueBG" type="submit"name="input1" value="wings potion" /> <span>x</span>'.$wingspotion.' <span class="blueBG"></span> </div>';}
if ($gills>=1){echo '<div><input class="darkblueBG" type="submit" name="input1" value="cast gills" /> lvl '.$gills.'</div>';}
if ($gillspotion>=1){echo '<div><input class="darkblueBG" type="submit"name="input1" value="gills potion" /> <span>x</span>'.$gillspotion.' <span class="blueBG"></span> </div>';}
if ($antidotepotion>=1){echo '<div><input class="greenBG" type="submit"name="input1" value="antidote potion" /> <span>x</span>'.$antidotepotion.' <span class="blueBG"></span> </div>';}	
	/*
echo '<div class="head">materials</div>';
if ($row['string'] > 0) { echo '<div>'.$row['string'].' string</div>';}	
if ($row['dagger'] > 0) { echo '<div>'.$row['dagger'].' dagger</div>';}	
if ($row['water'] > 0) { echo '<div>'.$row['water'].' water</div>';}	
if ($row['sand'] > 0) { echo '<div>'.$row['sand'].' sand</div>';}	
if ($row['mud'] > 0) { echo '<div>'.$row['mud'].' mud</div>';}	
if ($row['glass'] > 0) { echo '<div>'.$row['glass'].' glass</div>';}	
if ($row['bottle'] > 0) { echo '<div>'.$row['bottle'].' bottle</div>';}	
if ($row['wood'] > 0) { echo '<div>'.$row['wood'].' wood</div>';}	
if ($row['leather'] > 0) { echo '<div>'.$row['leather'].' leather</div>';}	
if ($row['stone'] > 0) { echo '<div>'.$row['stone'].' stone</div>';}	
if ($row['iron'] > 0) { echo '<div>'.$row['iron'].' iron</div>';}	
if ($row['coal'] > 0) { echo '<div>'.$row['coal'].' coal</div>';}	
if ($row['steel'] > 0) { echo '<div>'.$row['steel'].' steel</div>';}	
if ($row['mithril'] > 0) { echo '<div>'.$row['mithril'].' mithril</div>';}	

 

echo '<div class="head">misc</div>';
if ($row['flower'] > 0) { echo '<div>'.$row['flower'].' flower</div>';}	
if ($row['scorpiontail'] > 0) { echo '<div>'.$row['scorpiontail'].' scorpion tail</div>';}
if ($row['batwing'] > 0) { echo '<div>'.$row['batwing'].' bat wing</div>';}	
if ($row['bone'] > 0) { echo '<div>'.$row['bone'].' bone</div>';}	
if ($row['bigfoot'] > 0) { echo '<div>'.$row['bigfoot'].' bigfoot</div>';}	
if ($row['graymatter'] > 0) { echo '<div>'.$row['graymatter'].' gray matter</div>';}	

echo '<div class="head">keys</div>';
if ($row['silverkey'] > 0) { echo '<div>'.$row['silverkey'].' silver key</div>';}	
if ($row['goldkey'] > 0) { echo '<div>'.$row['goldkey'].' gold key</div>';}	
*/
	
	
echo '<h2>Attacks & Magic</h2>';
if ($weapontype == 3) { 
echo ' <div>
		<input type="submit" class="greenBG" name="input1" value="attack">
		</div> '; 				
}
else { 
echo ' <div>
		<input type="submit" class="lightredBG" name="input1" value="attack">
		</div> '; 				
}
if ($slice >= 1  && $weapontype==1) { 
echo ' <div>
		<i class="spellLVLxxx lightred"> '.$slice.' </i>
		<input type="submit" class="lightredBG" name="input1" value="slice">
		<i class="spellCostXXX">'.$slice_cost_cast.'<em>m</em></i>
		</div> '; 
}
if ($smash >= 1 && $weapontype==2) { 
echo ' <div>
		<i class="spellLVLxxx"> '.$smash.' </i>
		<input type="submit" class="lightredBG" name="input1" value="smash">
		<i class="spellCostXXX">'.$smash_cost_cast.'<em>m</em></i>
		</div> '; 							
}
if ($aim >= 1 && $weapontype==3) { 
echo ' <div>
		<i class="spellLVLxxx"> '.$aim.' </i>
		<input type="submit" class="greenBG" name="input1" value="aim">
		<i class="spellCostXXX">'.$aim_cost_cast.'<em>m</em></i>
		</div> '; 							
}
if ($magicstrike >= 1) { 
echo ' <div>
		<i class="spellLVLxxx"> '.$magicstrike.' </i>
		<input type="submit" class="blueBG" name="input1" value="magic strike">
		<i class="spellCostXXX">'.$magicstrike_cost_cast.'<em>m</em></i>
		</div> '; 				
}


if ($fireball >= 1) {
	echo '<div>
	<i class="spellLVLxxx">  '.$fireball.' </i>
	<input type="submit" class="lightredBG" name="input1" value="fireball" />
	<i class="spellCostXXX"> '.$fireball_cost_cast.'<em>m</em></i>
	</div> ';
}
if ($frostball >= 1) {  
	$spell_cost_cast = 5 + ($row['frostball']*2); // was *1		
	echo ' <div>
	<i class="spellLVLxxx"> '.$frostball.' </i>
	<input type="submit" class="darkblueBG" name="input1" value="frostball" />
	<i class="spellCostXXX"> '.$frostball_cost_cast.'<em>m</em></i>
	</div> '; 
}
if ($poisondart >= 1) {  
	echo ' <div>
	<i class="spellLVLxxx"> '.$poisondart.' </i>
	<input type="submit" class="greenBG" name="input1" value="poison dart" /> 
	<i class="spellCostXXX"> '.$poisondart_cost_cast.'<em>m</em></i>
	</div> '; 
	}
if ($atomicblast >= 1) {  
	echo ' <div>
	<i class="spellLVLxxx"> '.$atomicblast.' </i>
	<input type="submit" class="darkgrayBG" name="input1" value="atomic blast" /> 
	<i class="spellCostXXX"> '.$atomicblast_cost_cast.'<em>m</em></i>
	</div> '; 
	}
if ($heal >= 1) {  
	echo ' <div>
	<i class="spellLVLxxx"> '.$heal.' </i>
	<input type="submit" class="lightredBG" name="input1" value="heal" /> 
	<i class="spellCostXXX"> '.$heal_cost_cast.'<em>m</em></i>
	</div> '; 
	}
if ($regenerate >= 1) {
	echo ' 
	<div>
	<i class="spellLVLxxx"> '.$regenerate.' </i>
	<input type="submit" class="greenBG" name="input1" value="regenerate" /> 
	<i class="spellCostXXX"> '.$regenerate_cost_cast.'<em>m</em></i>
	</div> '; 
	}
if ($magicarmor >= 1) {  
	echo ' 
	<div>
	<i class="spellLVLxxx"> '.$magicarmor.' </i>
	<input type="submit" class="goldBG" name="input1" value="magic armor" /> 
	<i class="spellCostXXX"> '.$magicarmor_cost_cast.'<em>m</em></i>
	</div> '; 
	}
if ($ironskin >= 1)  { 
	echo ' 
	<div>
	<i class="spellLVLxxx"> '.$ironskin.' </i>
	<input type="submit" class="lightbrownBG" name="input1" value="iron skin" /> 
	<i class="spellCostXXX"> '.$ironskin_cost_cast.'<em>m</em></i>
	</div> '; 
}
  
	
	
	
	
	
	
	
	
	
	
	

echo '<h2>Quick Teleport</h2>';
echo '<input class="grayBG" type="submit" name="input1" value="set recall" /> ';
echo '<input class="blackBG" type="submit" name="input1" value="recall" /> ';
if ($row['teleport1']>=1){echo '<input class="greenBG" type="submit" name="input1" value="grassy field" /> ';}
if ($row['teleport2']>=1){echo '<input class="greenBG" type="submit" name="input1" value="forest path" /> ';}
if ($row['teleport4']>=1){echo '<input class="darkgreenBG" type="submit" name="input1" value="forest" /> ';}
if ($row['teleport3']>=1){echo '<input class="lightredBG" type="submit" name="input1" value="red town" /> ';}
if ($row['quest19']==2){echo '<input class="darkblueBG" type="submit" name="input1" value="warrior\'s guild" /> ';}
if ($row['quest20']==2){echo '<input class="purpleBG" type="submit" name="input1" value="wizard\'s guild" /> ';}
if ($row['teleport5']>=1){echo '<input class="darkgrayBG" type="submit" name="input1" value="stone mine" /> ';}
if ($row['teleport6']>=1){echo '<input class="blueBG" type="submit" name="input1" value="blue ocean" /> ';}
if ($row['teleport7']>=1){echo '<input class="darkblueBG" type="submit" name="input1" value="underwater" /> ';}
if ($row['teleport8']>=1){echo '<input class="darkgreenBG" type="submit" name="input1" value="dark forest" /> ';}
if ($row['teleport9']>=1){echo '<input class="grayBG" type="submit" name="input1" value="mountains" /> ';}
	
	
	
	
	
	
	
	
	
	
	/*

echo '<h2 class="head">Current Weapon: <span class="lightgray">'.$row['equipR'].'</span></h2>';
echo '';	

echo '<span>One Handed: </span>';
	if ($row['gladius'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="gladius" />';}	
	
echo '<br><span>Two Handed: </span>';
	if ($row['claymore'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="claymore" />';}	

	
echo '<br><span>Magic: </span>';
	if ($row['wand'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="wand" />';}	
	
	
echo '<br><span>Ranged:</span>';
//if ($row['mithrilboomerang'] > 0) { echo '<input class="darkgray" type="submit" name="input1" value="mithril boomerang" /> ';}	
if ($row['silverboomerang'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="silver boomerang" /> ';}	
else if ($row['steelboomerang'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="steel boomerang" /> ';}	
else if ($row['ironboomerang'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="iron boomerang" /> ';}	
else if ($row['boomerang'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="boomerang" /> ';}	

//if ($row['mithrilbow'] > 0) { echo '<input class="darkgray" type="submit" name="input1" value="mithril bow" />';}	
if ($row['silverbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="silver bow" />';}	
else if ($row['steelbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="steel bow" />';}	
else if ($row['ironbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="iron bow" />';}	
else if ($row['longbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="long bow" />';}	
else if ($row['hunterbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="hunter bow" />';}	
else if ($row['woodenbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="wooden bow" />';}	
//echo ' '.$row['arrows'].' arrows';



//if ($row['mithrilcrossbow'] > 0) { echo '<input class="darkgray" type="submit" name="input1" value="equip silver crossbow" /> ';}	
 if ($row['handcrossbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="hand crossbow" /> ';}	
else if ($row['compoundcrossbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="compound crossbow" /> ';}	
else if ($row['silvercrossbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="silver crossbow" /> ';}	
else if ($row['steelcrossbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="steel crossbow" /> ';}	
else if ($row['ironcrossbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="iron crossbow" /> ';}	
else if ($row['crossbow'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="crossbow" />';}	
//if ($row['bolts'] > 0) { echo ''.$row['bolts'].' bolts'; }
//echo ' '.$row['bolts'].' bolts';

	if ($row['arrows'] >= 0 || $row['bolts'] >= 0) { echo '<div class="smaller">'.$row['arrows'].' arrows, '.$row['bolts'].' bolts</div>';	}	  



//if ($row['mithriljavelin'] > 0) { echo '<input class="darkgray" type="submit" name="input1" value="mithril javelin" />  x'.$row['mithriljavelin'].'';}
/*
	if ($row['steeljavelin'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="steel javelin " /> x'.$row['steeljavelin'].'';}
else if ($row['ironjavelin'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="iron javelin" /> x'.$row['ironjavelin'].'';}
else if ($row['javelin'] > 0) { echo '<input class="darkgrayBG" type="submit" name="input1" value="javelin" /> x'.$row['javelin'].'';}	
*/
	


  
 

} // END WHILE

    
	 

   