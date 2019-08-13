<?php
// --------------------------------------------------------------------------------- Skills TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	  


// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES
$level = $row['level'];
$xp = $row['xp'];
$hp = $row['hpmax'];
$mp = $row['mpmax'];
$bp = $row['bp'];
$sp = $row['sp'];

$cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughbp = $_SESSION['notenoughbp'];
$notenoughsp = $_SESSION['notenoughsp'];

$quest4 = $row['quest4']; // 1h, 2h, LVL 5
$teleport2 = $row['teleport2']; // 1h, 2h, LVL 10
$quest19 = $row['quest19']; // Warriors Guild Initiation
$quest20 = $row['quest20']; // Wizards Guild Initiation

$pajamashamanFlag = $row['pajamashamanFlag'];
$youngsoldierFlag = $row['youngsoldierFlag'];
$jacklumberFlag = $row['jacklumberFlag'];
$hunterbillFlag = $row['hunterbillFlag'];
$travelingwarriorFlag = $row['travelingwarriorFlag'];
$travelingwizardFlag = $row['travelingwizardFlag'];
$warriorskillFlag = $row['warriorskillFlag'];
$wizardskillFlag = $row['wizardskillFlag'];
$miningskillFlag = $row['miningskillFlag'];
$rangerskillFlag = $row['rangerskillFlag'];
$mastertrainerFlag = $row['mastertrainerFlag'];
$starcitysskillsFlag = $row['starcitysskillsFlag'];
$starcityspellsFlag = $row['starcityspellsFlag'];

// ----------------------------------------------------------------------------------Fireball MATH
$fireball = $row['fireball'];
$fireball_cost = $fireball_new = $fireball + 1;
if ($row['starcityspellsFlag'] >= 1) { $fireball_max = 20; }		
else if ($row['wizardskillFlag'] >= 1) { $fireball_max = 10; }	
else if ($row['travelingwizardFlag'] >= 1) { $fireball_max = 5; }			
else if ($row['pajamashamanFlag'] >= 1) { $fireball_max = 3; }			
else { $fireball_max = 0; }
if ($fireball_cost > $fireball_max) {$fireball_cost = 'max';}
// ----------------------------------------------------------------------------------Frostball MATH
$frostball = $row['frostball'];
$frostball_cost = $frostball_new = $frostball + 1;
if ($row['starcityspellsFlag'] >= 1) { $frostball_max = 20; }		
else if ($row['wizardskillFlag'] >= 1) { $frostball_max = 10; }	
else if ($row['travelingwizardFlag'] >= 1) { $frostball_max = 5; }			
else { $frostball_max = 0; }
if ($frostball_cost > $frostball_max) {$frostball_cost = 'max';}
// ----------------------------------------------------------------------------------Poison Dart MATH
$poisondart = $row['poisondart'];
$poisondart_cost = $poisondart_new = $poisondart + 1;
if ($row['wizardskillFlag'] >= 1) { $poisondart_max = 10; }	
else { $poisondart_max = 0; }
if ($poisondart_cost > $poisondart_max) {$poisondart_cost = 'max';}
// ----------------------------------------------------------------------------------Atomic Blast MATH
$atomicblast = $row['atomicblast'];
$atomicblast_new = $atomicblast + 1;
$atomicblast_cost = $atomicblast + 11;		// --- PRO Spell
if ($row['wizardskillFlag'] >= 1) { $atomicblast_max = 5; }	
else { $atomicblast_max = 0; }
if (($atomicblast_cost-10) > $atomicblast_max) {$atomicblast_cost = 'max';}

// ----------------------------------------------------------------------------------Heal MATH
$heal = $row['heal'];
$heal_cost = $heal_new = $heal + 1;
if ($row['starcityspellsFlag'] >= 1) { $heal_max = 20; }		
else if ($row['wizardskillFlag'] >= 1) { $heal_max = 10; }	
else if ($row['travelingwizardFlag'] >= 1) { $heal_max = 5; }	
else if ($row['pajamashamanFlag'] >= 1) { $heal_max = 3; }			
else { $heal_max = 0; }
if ($heal_cost > $heal_max) {$heal_cost = 'max';}
// ----------------------------------------------------------------------------------regenerate MATH
$regenerate = $row['regenerate'];
$regenerate_cost = $regenerate_new = $regenerate + 1;
if ($row['wizardskillFlag'] >= 1) { $regenerate_max = 10; }	
else { $regenerate_max = 0; }
if ($regenerate_cost > $regenerate_max) {$regenerate_cost = 'max';}
// ----------------------------------------------------------------------------------antidote MATH
$antidote = $row['antidote'];
$antidote_cost = $antidote_new = $antidote + 1;
if ($row['wizardskillFlag'] >= 1) { $antidote_max = 10; }	
else { $antidote_max = 0; }
if ($antidote_cost > $antidote_max) {$antidote_cost = 'max';}


// ----------------------------------------------------------------------------------magicarmor MATH
$magicarmor = $row['magicarmor'];
$magicarmor_cost = $magicarmor_new = $magicarmor + 1;
if ($row['wizardskillFlag'] >= 1) { $magicarmor_max = 10; }	
else { $magicarmor_max = 0; }
if ($magicarmor_cost > $magicarmor_max) {$magicarmor_cost = 'max';}
// ----------------------------------------------------------------------------------ironskin MATH
$ironskin = $row['ironskin'];
$ironskin_cost = $ironskin_new = $ironskin + 1;
if ($row['wizardskillFlag'] >= 1) { $ironskin_max = 10; }	
else { $ironskin_max = 0; }
if ($ironskin_cost > $ironskin_max) {$ironskin_cost = 'max';}
// ----------------------------------------------------------------------------------wings MATH
$wings = $row['wings'];
$wings_cost = $wings_new = $wings + 1;
if ($row['wizardskillFlag'] >= 1) { $wings_max = 5; }	
else { $wings_max = 0; }
if ($wings_cost > $wings_max) {$wings_cost = 'max';}
// ----------------------------------------------------------------------------------gills MATH
$gills = $row['gills'];
$gills_cost = $gills_new = $gills + 1;
if ($row['wizardskillFlag'] >= 1) { $gills_max = 5; }	
else { $gills_max = 0; }
if ($gills_cost > $gills_max) {$gills_cost = 'max';}




// ---------------------------------------------------------------------------------- // END VARIABLES
// ---------------------------------------------------------------------------------- // END VARIABLES
// ---------------------------------------------------------------------------------- // END VARIABLES





// ---------------------------------------------------------------------------------- // START SKILL MENU <article data-pop="spells" id="spells">
	//	<form id="mainForm" method="post" action="" name="formInput">
echo '
	
			<h2>Spells<span class="spCount white">You have <span class="px50 gold">'.$sp.'</span> sp</span></h2>';
	 echo '<h2>Destruction</h2>';
	 

// ---------------------------------------------------------------------------------- Fireball
if ($row['fireball']>=1 && $fireball_cost == 'max'){echo '<div class="hilite">
 Fireball <span class="blue">'. $row['fireball'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['fireball']>=1 && $sp<$fireball_cost){echo '<div class="hilite">
 Fireball <span>'. $row['fireball'].'</span> <span class="px14 gray"> / '.$fireball_max.'</span>
<span class="px12 darkestgray"> need '.$fireball_cost.' sp</span>
</div>	';}
else if ($row['fireball']==0 && $sp < 1 && $fireball_cost != 'max' ){echo '<div class="hilite">
Fireball <span class="gray px14"> '. $row['fireball'].' </span><span class="px14 gray"> / '.$fireball_max.'</span>
<span class="px12 darkestgray"> need '.$fireball_cost.' sp</span>
</div>	';}
else if ($row['fireball']==0 && $fireball_cost != 'max'){echo '<div class="hilite">
Fireball <span class="gray px14"> '. $row['fireball'].' </span><span class="px14 gray"> / '.$fireball_max.'</span>
<input type="submit" class="" name="input1" value="learn fireball" /> 
<input type="submit" class="max" name="input1" value="max fireball" /> 
<span class="px12 gold"> '.$fireball_cost.' sp</span>
</div>	';}
else if ($row['fireball']>=0 && $sp>=$fireball_cost){echo '<div class="hilite">
 Fireball <span>'. $row['fireball'].'</span> <span class="px14 gray"> / '.$fireball_max.'</span>
<input type="submit" class="" name="input1" value="learn fireball" /> 
<input type="submit" class="max" name="input1" value="max fireball" /> 
<span class="px12 gold"> '.$fireball_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Fireball </span></div>'; }
// ---------------------------------------------------------------------------------- Frostball
if ($row['frostball']>=1 && $frostball_cost == 'max'){echo '<div class="hilite">
 Frostball <span class="blue">'. $row['frostball'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['frostball']>=1 && $sp<$frostball_cost){echo '<div class="hilite">
 Frostball <span>'. $row['frostball'].'</span> <span class="px14 gray"> / '.$frostball_max.'</span>
<span class="px12 darkestgray"> need '.$frostball_cost.' sp</span>
</div>	';}
else if ($row['frostball']==0 && $sp < 1 && $frostball_cost != 'max' ){echo '<div class="hilite">
Frostball <span class="gray px14"> '. $row['frostball'].' </span><span class="px14 gray"> / '.$frostball_max.'</span>
<span class="px12 darkestgray"> need '.$frostball_cost.' sp</span>
</div>	';}
else if ($row['frostball']==0 && $frostball_cost != 'max'){echo '<div class="hilite">
Frostball <span class="gray px14"> '. $row['frostball'].' </span><span class="px14 gray"> / '.$frostball_max.'</span>
<input type="submit" class="" name="input1" value="learn frostball" /> 
<input type="submit" class="max" name="input1" value="max frostball" /> 
<span class="px12 gold"> '.$frostball_cost.' sp</span>
</div>	';}
else if ($row['frostball']>=0 && $sp>=$frostball_cost){echo '<div class="hilite">
 Frostball <span>'. $row['frostball'].'</span> <span class="px14 gray"> / '.$frostball_max.'</span>
<input type="submit" class="" name="input1" value="learn frostball" /> 
<input type="submit" class="max" name="input1" value="max frostball" /> 
<span class="px12 gold"> '.$frostball_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Frostball </span></div>'; }
// ---------------------------------------------------------------------------------- Poison Dart
if ($row['poisondart']>=1 && $poisondart_cost == 'max'){echo '<div class="hilite">
 Poison Dart <span class="blue">'. $row['poisondart'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['poisondart']>=1 && $sp<$poisondart_cost){echo '<div class="hilite">
 Poison Dart <span>'. $row['poisondart'].'</span> <span class="px14 gray"> / '.$poisondart_max.'</span>
<span class="px12 darkestgray"> need '.$poisondart_cost.' sp</span>
</div>	';}
else if ($row['poisondart']==0 && $sp < 1 && $poisondart_cost != 'max' ){echo '<div class="hilite">
Poison Dart <span class="gray px14"> '. $row['poisondart'].' </span><span class="px14 gray"> / '.$poisondart_max.'</span>
<span class="px12 darkestgray"> need '.$poisondart_cost.' sp</span>
</div>	';}
else if ($row['poisondart']==0 && $poisondart_cost != 'max'){echo '<div class="hilite">
Poison Dart <span class="gray px14"> '. $row['poisondart'].' </span><span class="px14 gray"> / '.$poisondart_max.'</span>
<input type="submit" class="" name="input1" value="learn poison dart" /> 
<input type="submit" class="max" name="input1" value="max poison dart" /> 
<span class="px12 gold"> '.$poisondart_cost.' sp</span>
</div>	';}
else if ($row['poisondart']>=0 && $sp>=$poisondart_cost){echo '<div class="hilite">
 Poison Dart <span>'. $row['poisondart'].'</span> <span class="px14 gray"> / '.$poisondart_max.'</span>
<input type="submit" class="" name="input1" value="learn poison dart" /> 
<input type="submit" class="max" name="input1" value="max poison dart" /> 
<span class="px12 gold"> '.$poisondart_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Poison Dart </span></div>'; }
// ---------------------------------------------------------------------------------- Atomic Blast
if ($row['atomicblast']>=1 && $atomicblast_cost == 'max'){echo '<div class="hilite">
 Atomic Blast <span class="blue">'. $row['atomicblast'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['atomicblast']>=1 && $sp<$atomicblast_cost){echo '<div class="hilite">
 Atomic Blast <span>'. $row['atomicblast'].'</span> <span class="px14 gray"> / '.$atomicblast_max.'</span>
<span class="px12 darkestgray"> need '.$atomicblast_cost.' sp</span>
</div>	';}
else if ($row['atomicblast']==0 && $sp < 1 && $atomicblast_cost != 'max' ){echo '<div class="hilite">
Atomic Blast <span class="gray px14"> '. $row['atomicblast'].' </span><span class="px14 gray"> / '.$atomicblast_max.'</span>
<span class="px12 darkestgray"> need '.$atomicblast_cost.' sp</span>
</div>	';}
else if ($row['atomicblast']==0 && $atomicblast_cost != 'max'){echo '<div class="hilite">
Atomic Blast <span class="gray px14"> '. $row['atomicblast'].' </span><span class="px14 gray"> / '.$atomicblast_max.'</span>
<input type="submit" class="" name="input1" value="learn atomic blast" /> 
<input type="submit" class="max" name="input1" value="max atomic blast" /> 
<span class="px12 gold"> '.$atomicblast_cost.' sp</span>
</div>	';}
else if ($row['atomicblast']>=0 && $sp>=$atomicblast_cost){echo '<div class="hilite">
 Atomic Blast <span>'. $row['atomicblast'].'</span> <span class="px14 gray"> / '.$atomicblast_max.'</span>
<input type="submit" class="" name="input1" value="learn atomic blast" /> 
<input type="submit" class="max" name="input1" value="max atomic blast" /> 
<span class="px12 gold"> '.$atomicblast_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Atomic Blast </span></div>'; }

echo '<h2>Restoration</h2>';
// ---------------------------------------------------------------------------------- Heal
if ($row['heal']>=1 && $heal_cost == 'max'){echo '<div class="hilite">
 Heal <span class="blue">'. $row['heal'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['heal']>=1 && $sp<$heal_cost){echo '<div class="hilite">
 Heal <span>'. $row['heal'].'</span> <span class="px14 gray"> / '.$heal_max.'</span>
<span class="px12 darkestgray"> need '.$heal_cost.' sp</span>
</div>	';}
else if ($row['heal']==0 && $sp < 1 && $heal_cost != 'max'){echo '<div class="hilite">
Heal <span class="gray px14"> '. $row['heal'].' </span><span class="px14 gray"> / '.$heal_max.'</span>
<span class="px12 darkestgray"> need '.$heal_cost.' sp</span>
</div>	';}
else if ($row['heal']==0 && $heal_cost != 'max'){echo '<div class="hilite">
Heal <span class="gray px14"> '. $row['heal'].' </span><span class="px14 gray"> / '.$heal_max.'</span>
<input type="submit" class="" name="input1" value="learn heal" /> 
<input type="submit" class="max" name="input1" value="max heal" /> 
<span class="px12 gold"> '.$heal_cost.' sp</span>
</div>	';}
else if ($row['heal']>=0 && $sp>=$heal_cost){echo '<div class="hilite">
 Heal <span>'. $row['heal'].'</span> <span class="px14 gray"> / '.$heal_max.'</span>
<input type="submit" class="" name="input1" value="learn heal" /> 
<input type="submit" class="max" name="input1" value="max heal" /> 
<span class="px12 gold"> '.$heal_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Heal </span></div>'; }

// ---------------------------------------------------------------------------------- Regenerate
if ($row['regenerate']>=1 && $regenerate_cost == 'max'){echo '<div class="hilite">
 Regenerate <span class="blue">'. $row['regenerate'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['regenerate']>=1 && $sp<$regenerate_cost){echo '<div class="hilite">
 Regenerate <span>'. $row['regenerate'].'</span> <span class="px14 gray"> / '.$regenerate_max.'</span>
<span class="px12 darkestgray"> need '.$regenerate_cost.' sp</span>
</div>	';}
else if ($row['regenerate']==0 && $sp < 1 && $regenerate_cost != 'max' ){echo '<div class="hilite">
Regenerate <span class="gray px14"> '. $row['regenerate'].' </span><span class="px14 gray"> / '.$regenerate_max.'</span>
<span class="px12 darkestgray"> need '.$regenerate_cost.' sp</span>
</div>	';}
else if ($row['regenerate']==0 && $regenerate_cost != 'max'){echo '<div class="hilite">
Regenerate <span class="gray px14"> '. $row['regenerate'].' </span><span class="px14 gray"> / '.$regenerate_max.'</span>
<input type="submit" class="" name="input1" value="learn regenerate" /> 
<input type="submit" class="max" name="input1" value="max regenerate" /> 
<span class="px12 gold"> '.$regenerate_cost.' sp</span>
</div>	';}
else if ($row['regenerate']>=0 && $sp>=$regenerate_cost){echo '<div class="hilite">
 Regenerate <span>'. $row['regenerate'].'</span> <span class="px14 gray"> / '.$regenerate_max.'</span>
<input type="submit" class="" name="input1" value="learn regenerate" /> 
<input type="submit" class="max" name="input1" value="max regenerate" /> 
<span class="px12 gold"> '.$regenerate_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Regenerate </span></div>'; }
	
// ---------------------------------------------------------------------------------- Antidote
if ($row['antidote']>=1 && $antidote_cost == 'max'){echo '<div class="hilite">
 Antidote <span class="blue">'. $row['antidote'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['antidote']>=1 && $sp<$antidote_cost){echo '<div class="hilite">
 Antidote <span>'. $row['antidote'].'</span> <span class="px14 gray"> / '.$antidote_max.'</span>
<span class="px12 darkestgray"> need '.$antidote_cost.' sp</span>
</div>	';}
else if ($row['antidote']==0 && $sp < 1 && $antidote_cost != 'max' ){echo '<div class="hilite">
Antidote <span class="gray px14"> '. $row['antidote'].' </span><span class="px14 gray"> / '.$antidote_max.'</span>
<span class="px12 darkestgray"> need '.$antidote_cost.' sp</span>
</div>	';}
else if ($row['antidote']==0 && $antidote_cost != 'max'){echo '<div class="hilite">
Antidote <span class="gray px14"> '. $row['antidote'].' </span><span class="px14 gray"> / '.$antidote_max.'</span>
<input type="submit" class="" name="input1" value="learn antidote" /> 
<input type="submit" class="max" name="input1" value="max antidote" /> 
<span class="px12 gold"> '.$antidote_cost.' sp</span>
</div>	';}
else if ($row['antidote']>=0 && $sp>=$antidote_cost){echo '<div class="hilite">
 Antidote <span>'. $row['antidote'].'</span> <span class="px14 gray"> / '.$antidote_max.'</span>
<input type="submit" class="" name="input1" value="learn antidote" /> 
<input type="submit" class="max" name="input1" value="max antidote" /> 
<span class="px12 gold"> '.$antidote_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Antidote </span></div>'; }
	
echo '<h2>Alteration</h2>';


// ---------------------------------------------------------------------------------- Magic Armor
if ($row['magicarmor']>=1 && $magicarmor_cost == 'max'){echo '<div class="hilite">
 Magic Armor <span class="blue">'. $row['magicarmor'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['magicarmor']>=1 && $sp<$magicarmor_cost){echo '<div class="hilite">
 Magic Armor <span>'. $row['magicarmor'].'</span> <span class="px14 gray"> / '.$magicarmor_max.'</span>
<span class="px12 darkestgray"> need '.$magicarmor_cost.' sp</span>
</div>	';}
else if ($row['magicarmor']==0 && $sp < 1 && $magicarmor_cost != 'max' ){echo '<div class="hilite">
Magic Armor <span class="gray px14"> '. $row['magicarmor'].' </span><span class="px14 gray"> / '.$magicarmor_max.'</span>
<span class="px12 darkestgray"> need '.$magicarmor_cost.' sp</span>
</div>	';}
else if ($row['magicarmor']==0 && $magicarmor_cost != 'max'){echo '<div class="hilite">
Magic Armor <span class="gray px14"> '. $row['magicarmor'].' </span><span class="px14 gray"> / '.$magicarmor_max.'</span>
<input type="submit" class="" name="input1" value="learn magic armor" /> 
<input type="submit" class="max" name="input1" value="max magic armor" /> 
<span class="px12 gold"> '.$magicarmor_cost.' sp</span>
</div>	';}
else if ($row['magicarmor']>=0 && $sp>=$magicarmor_cost){echo '<div class="hilite">
 Magic Armor <span>'. $row['magicarmor'].'</span> <span class="px14 gray"> / '.$magicarmor_max.'</span>
<input type="submit" class="" name="input1" value="learn magic armor" /> 
<input type="submit" class="max" name="input1" value="max magic armor" /> 
<span class="px12 gold"> '.$magicarmor_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Magic Armor </span></div>'; }

// ---------------------------------------------------------------------------------- Iron Skin
if ($row['ironskin']>=1 && $ironskin_cost == 'max'){echo '<div class="hilite">
 Iron Skin <span class="blue">'. $row['ironskin'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['ironskin']>=1 && $sp<$ironskin_cost){echo '<div class="hilite">
 Iron Skin <span>'. $row['ironskin'].'</span> <span class="px14 gray"> / '.$ironskin_max.'</span>
<span class="px12 darkestgray"> need '.$ironskin_cost.' sp</span>
</div>	';}
else if ($row['ironskin']==0 && $sp < 1 && $ironskin_cost != 'max' ){echo '<div class="hilite">
Iron Skin <span class="gray px14"> '. $row['ironskin'].' </span><span class="px14 gray"> / '.$ironskin_max.'</span>
<span class="px12 darkestgray"> need '.$ironskin_cost.' sp</span>
</div>	';}
else if ($row['ironskin']==0 && $ironskin_cost != 'max'){echo '<div class="hilite">
Iron Skin <span class="gray px14"> '. $row['ironskin'].' </span><span class="px14 gray"> / '.$ironskin_max.'</span>
<input type="submit" class="" name="input1" value="learn iron skin" /> 
<input type="submit" class="max" name="input1" value="max iron skin" /> 
<span class="px12 gold"> '.$ironskin_cost.' sp</span>
</div>	';}
else if ($row['ironskin']>=0 && $sp>=$ironskin_cost){echo '<div class="hilite">
 Iron Skin <span>'. $row['ironskin'].'</span> <span class="px14 gray"> / '.$ironskin_max.'</span>
<input type="submit" class="" name="input1" value="learn iron skin" />
<input type="submit" class="max" name="input1" value="max iron skin" /> 
<span class="px12 gold"> '.$ironskin_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Iron Skin </span></div>'; }


// ---------------------------------------------------------------------------------- Wings
if ($row['wings']>=1 && $wings_cost == 'max'){echo '<div class="hilite">
 Wings <span class="blue">'. $row['wings'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['wings']>=1 && $sp<$wings_cost){echo '<div class="hilite">
 Wings <span>'. $row['wings'].'</span> <span class="px14 gray"> / '.$wings_max.'</span>
<span class="px12 darkestgray"> need '.$wings_cost.' sp</span>
</div>	';}
else if ($row['wings']==0 && $sp < 1 && $wings_cost != 'max'){echo '<div class="hilite">
Wings <span class="gray px14"> '. $row['wings'].' </span><span class="px14 gray"> / '.$wings_max.'</span>
<span class="px12 darkestgray"> need '.$wings_cost.' sp</span>
</div>	';}
else if ($row['wings']==0 && $wings_cost != 'max'){echo '<div class="hilite">
Wings <span class="gray px14"> '. $row['wings'].' </span><span class="px14 gray"> / '.$wings_max.'</span>
<input type="submit" class="" name="input1" value="learn wings" /> 
<input type="submit" class="max" name="input1" value="max wings" /> 
<span class="px12 gold"> '.$wings_cost.' sp</span>
</div>	';}
else if ($row['wings']>=0 && $sp>=$wings_cost){echo '<div class="hilite">
 Wings <span>'. $row['wings'].'</span> <span class="px14 gray"> / '.$wings_max.'</span>
<input type="submit" class="" name="input1" value="learn wings" /> 
<input type="submit" class="max" name="input1" value="max wings" /> 
<span class="px12 gold"> '.$wings_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Wings </span></div>'; }


// ---------------------------------------------------------------------------------- Gills
if ($row['gills']>=1 && $gills_cost == 'max'){echo '<div class="hilite">
 Gills <span class="blue">'. $row['gills'].'</span><span class="maxed greenBG px14">MAX</span>
</div>	';}
else if ($row['gills']>=1 && $sp<$gills_cost){echo '<div class="hilite">
 Gills <span>'. $row['gills'].'</span> <span class="px14 gray"> / '.$gills_max.'</span>
<span class="px12 darkestgray"> need '.$gills_cost.' sp</span>
</div>	';}
else if ($row['gills']==0 && $sp < 1 && $gills_cost != 'max'){echo '<div class="hilite">
Gills <span class="gray px14"> '. $row['gills'].' </span><span class="px14 gray"> / '.$gills_max.'</span>
<span class="px12 darkestgray"> need '.$gills_cost.' sp</span>
</div>	';}
else if ($row['gills']==0 && $gills_cost != 'max'){echo '<div class="hilite">
Gills <span class="gray px14"> '. $row['gills'].' </span><span class="px14 gray"> / '.$gills_max.'</span>
<input type="submit" class="" name="input1" value="learn gills" /> 
<input type="submit" class="max" name="input1" value="max gills" /> 
<span class="px12 gold"> '.$gills_cost.' sp</span>
</div>	';}
else if ($row['gills']>=0 && $sp>=$gills_cost){echo '<div class="hilite">
 Gills <span>'. $row['gills'].'</span> <span class="px14 gray"> / '.$gills_max.'</span>
<input type="submit" class="" name="input1" value="learn gills" /> 
<input type="submit" class="max" name="input1" value="max gills" /> 
<span class="px12 gold"> '.$gills_cost.' sp</span>
</div>	';}
else{ echo '<div><span class="alt2"> Gills </span></div>'; }
	 
	
// ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
// ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
// ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
// ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
// ---------------------------------------------------------------------------------- SPELL DESCRIPTIONS
echo '	<br><br><br><br><br><br><br><br><br><br>
<h2 class="px30 darkestgray">SPELL DESCRIPTIONS</h2>	';
echo '<h2 class="px50 darkestgray clear">DESTRUCTION</h2>	';


echo'		
<div class="descrip">
<h6 class="red">Fireball</h6>
<p class="px16">Launch a destructive Fireball at your enemy.</p>
<p class="px14"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="px14"><span class="blue">Cost: </span> 5 + (2*lvl) mp </p>
<p><i class="gold">3</i> Pajama Shaman</p>
<p><i class="gold">5</i> Traveling Wizard</p>
<p><i class="gold">10</i> Wizard\'s Guild</p>
<p><i class="gold">20</i> Star City</p>
<p><i class="gold">30</i> Warlock\'s Guild</p>
</div>
';	
echo'		
<div class="descrip">
<h6 class="blue">Frostball</h6>
<p class="px16">Launch a destructive Frostball at your enemy.</p>
<p class="px14"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="px14"><span class="blue">Cost: </span> 5 + (2*lvl) mp </p>
<p><i class="gold">5</i> Traveling Wizard</p>
<p><i class="gold">10</i> Wizard\'s Guild</p>
<p><i class="gold">20</i> Star City</p>
<p><i class="gold">30</i> Warlock\'s Guild</p>
</div>
';	
echo'		
<div class="descrip">
<h6 class="green">Poison Dart</h6>
<p class="px16">Launch a Poisonous Dart at your enemy.</p>
<p class="px14"><span class="red">Damage: </span> lvl + (rand(1-mag) + (lvl*5%))  </p>
<p class="px14"><span class="green">Poison: </span> rand (lvl*2) </p>
<p class="px14"><span class="blue">Cost: </span> 5 + (3*lvl) mp </p>
<p><i class="gold">10</i> Wizard\'s Guild</p>
<p><i class="gold">20</i> Star City</p>
<p><i class="gold">30</i> Warlock\'s Guild</p>
</div>
';	
echo'		
<div class="descrip">
<h6 class="black">Atomic Blast</h6>
<p class="px16">Destroy your enemy with Atomic Power.</p>
<p class="px14"><span class="red">Damage: </span>  lvl*rand(mag)  </p>
<p class="px14"><span class="blue">Cost: </span> 100*lvl mp </p>
<p><i class="gold">5</i> Wizard\'s Guild</p>
<p><i class="gold">10</i> Star City</p>
<p><i class="gold">15</i> Warlock\'s Guild</p>
</div>
';	


echo '<h2 class="px50 darkestgray">RESTORATION</h2>	';


echo'		
<div class="descrip">
<h6 class="green">Heal</h6>
<p class="px16">Use Magic to Heal your Hit Points.</p>
<p class="px14"><span class="green">Heal Amount: </span> rand(1,mag) + (rand(1,mag)*lvl)  </p>
<p class="px14"><span class="blue">Cost: </span> 2*lvl mp </p>
<p><i class="gold">3</i> Pajama Shaman</p>
<p><i class="gold">5</i> Traveling Wizard</p>
<p><i class="gold">10</i> Wizard\'s Guild</p>
<p><i class="gold">20</i> Star City</p>
<p><i class="gold">30</i> Knight\'s Guild</p>
</div>
';
echo'		
<div class="descrip">
<h6 class="green">Regenerate</h6>
<p class="px16">Regenerate your HP for many clicks.</p>
<p class="px14"><span class="green">Regen Amount: </span> rand(lvl,lvl*2) hp  </p>
<p class="px14"><span class="gold">Clicks: </span> rand(magbase, magmod) clicks  </p>
<p class="px14"><span class="blue">Cost: </span> 20*lvl mp </p>
<p><i class="gold">10</i> Wizard\'s Guild</p>
<p><i class="gold">30</i> Knight\'s Guild</p>
</div>
';	


echo '<h2 class="px50 darkestgray">ALTERATION</h2>	';


echo'
</span>';
	//echo'</form></article>';	
		    
 

 
}

    
	 

   