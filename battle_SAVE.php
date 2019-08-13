<?php
// -- ---------------------------------  BATTLE !!!!!!!!!!!!!!!!!!!!!

	// ---------------------------------------------------------------BATTLE BOX
	// ---------------------------------------------------------------BATTLE BOX
	// ---------------------------------------------------------------BATTLE BOX
	//if ($enemyhp >= 0){
	$message="<div class='battleBox'>";
	include ('update_feed_alt.php'); // --- update feed
//	}
	

// -------------------------DB CONNECT!
include ('db-connect.php'); 
	// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc())
{ 	  
	$enemy=$row['enemy'];     // enemy Stats 
	if ( $infight == 0 )     
		{  include ('battle-initialize.php');
		}
}
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc())
{ 	  
		$currency = $_SESSION['currency'];
		$xp=$row['xp'];   
		
		$hp=$row['hp'];      // User Stats
		$hpmax=$row['hpmax'];   
		$mp=$row['mp'];   
		$mpmax=$row['mpmax'];  
		$str=$row['str']; $strmod=$row['strmod'];   
		$dex=$row['dex']; $dexmod=$row['dexmod'];   
		$mag=$row['mag']; $magmod=$row['magmod'];    
		$def=$row['def']; $defmod=$row['defmod'];     

		$onehanded=$row['onehanded'];   
		$twohanded=$row['twohanded'];   
		$ranged=$row['ranged'];   
		$toughness=$row['toughness'];   
		$blockSkill=$row['block'];   
		$ddge=$row['ddge'];   
	
		$equipR=$row['equipR'];   
		$equipL=$row['equipL'];   
		$pet = $row['equipPet'];		
			
		$arrows=$row['arrows'];   
		$bolts=$row['bolts'];   
		$javelin=$row['javelin'];   
							
		$enemy=$row['enemy'];     // enemy Stats 
		$enemyhp=$row['enemyhp']; 
		$enemyhpmax=$row['enemyhpmax']; 
		$enemyatt=$row['enemyatt'];  
		$enemydef=$row['enemydef']; 
		
		$infight = $row['infight'];
		$endfight = $row['endfight'];
		$weapontype = $row['weapontype'];
		
			$flyingenemycheck = 0;		// rest flying enemy check
			$dodgeCheck = 0;			// reset enemy dodge check
			$magResist = 0;			// reset enemy magic resist check	
			$otherAttackCheck = 0;		// enemy OTHER attack check - so doesn't do regular attack
			$otherEAttackCheck = 0;	// enemy OTHER defend check 
}
if ($endfight !=1)  // ---------------------------- SET ATTACK NUMBERS
{	
	if ($_SESSION['magiccast'] == 1 && $input == 'attack') {	 // magic ATTACK
		$damage = $magic_amount;    
		$block = rand (0, $enemydef);
		$damagetotal = $damage - $block;
	}
	else if ($weapontype == 1) {			 // 1h ATTACK
		$damage = rand ( 0 , $strmod);       
		$damageskill = rand (0, $onehanded);
		$block = rand (0, $enemydef);
		$damagetotal = ($damage + $damageskill) - $block;
	}
	else if ($weapontype == 2) {			 // 2h ATTACK
		$damage = rand ( 0 , $strmod);       
		$damageskill = rand (0, $twohanded);
		$block = rand (0, $enemydef);
		$damagetotal = ($damage + $damageskill) - $block;
	}
	else if ($weapontype == 3) {	 // ranged ATTACK
		$damage = rand ( 0 , $dexmod);       
		$damageskill = rand (0, $ranged);
		$block = rand (0, $enemydef);
		$damagetotal = ($damage + $damageskill) - $block;
	}
	else if ($weapontype == 0) {			 // none equipped
		$damage = rand ( 0 , $strmod);       
		$block = rand (0, $enemydef);
		$damagetotal = $damage - $block;
	}
	else {$damagetotal=0;$_SESSION['magiccast'] = 0;echo '!!!last ditch attack! check battle.php<br/>';}
	
	if ($equipL == 'training shield' || $equipL == 'basic shield' 
				|| $equipL == 'kite shield' || $equipL == 'buckler' || $equipL == 'wooden shield'
				|| $equipL == 'hunter shield' || $equipL == 'iron shield' || $equipL == 'iron kite shield'
				|| $equipL == 'silver shield' || $equipL == 'steel shield' || $equipL == 'steel kite shield') 
				{$blockAmt = rand (1,$blockSkill);}
				else {$blockAmt = 0;}
	
	
	if ($_SESSION['ironskin_amount']>0){	 // ironskin rand
		$ironskin_rand = rand (1,$_SESSION['ironskin_amount']);
		} else {$ironskin_rand = 0;}

	
	$edamage = rand ( 0 , $enemyatt); 	 // ENEMY ATTACK
	$eblock = rand ( 0 , $defmod) + rand ( 0 , $toughness) + $blockAmt + $ironskin_rand;
	$edamagetotal = $edamage - $eblock;
	
	//echo 'eblock: '.$eblock;
	
	if ($damagetotal <= 0) { $damagetotal = 0; }   // if negative damage make 0
	if ($edamagetotal <= 0) { $edamagetotal = 0; } // if negative damage make 0
	
	
	
	// -------------------------------------------------------------------------------------------------------------------------- YOU ATTACK
	// -------------------------------------------------------------------------------------------------------------------------- YOU ATTACK
	// -------------------------------------------------------------------------------------------------------------------------- YOU ATTACK
	 
	if (($input == 'attack' || $input == 'a') && $endfight != 1 )
	{	
	// -------------------------DB QUERY!
	$sql = "SELECT * FROM $username";
	if(!$result = $link->query($sql)){
	die('There was an error running the query [' . $link->error . ']');}
	// -------------------------recalculate variables
	
	while($row = $result->fetch_assoc())	
		{
		$enemyhp=$row['enemyhp'];   
		$hp=$row['hp'];   
		$infight=$row['infight'];   
		}	
		
		
	// -------------------------------------------------------------------- Flying Enemy Check	
	if (($enemy == "Bat" || $enemy == "Golden Bat" || $enemy == "Flying Kobold" || $enemy == "Flying Dung Beetle" || $enemy == "Hawk" || $enemy == "Albatross" || $enemy == "Bleeding Dartwing" || $enemy == "Demon Wing" || $enemy == "Phoenix"  || $enemy == "Falcon") 
	  		&& ($weapontype != 3 || $_SESSION['magiccast'] == 1)) 
		{
		echo "You need to use a ranged weapon to hit the $enemy!!!<br/>";
		$message="You need to use a ranged weapon to hit the $enemy!!!<br/>";	
		$flyingenemycheck = 1;
		$_SESSION['poison_amt'] = 0;
		include ('update_feed_alt.php'); // --- update feed
		}
	// --------------------------------------------------------------------------- NO AMMO check	
	else if ($arrows <= 0 && ($equipR == "wooden bow" || $equipR == "hunter bow" || $equipR == "long bow")) {  
			echo $message = '<i>You ran out of arrows! Equip another weapon.</i><br/>'; include ('update_feed_alt.php'); } // ----- arrow shot
	else if ($bolts <= 0 && ($equipR == "crossbow" || $equipR == "hunter crossbow" || $equipR == "compound crossbow")) {  
			echo $message = '<i>You ran out of bolts! Equip another weapon.</i><br/>'; include ('update_feed_alt.php'); } // ----- bolt shot	
	else if ($javelin <= 0 && $equipR == "javelin") {  
			echo $message = '<i>You ran out of javelins! Equip another weapon.</i><br/>'; include ('update_feed_alt.php'); } // ----- no javelins				

	
	
	// -------------------------------------------------------------------------------------------- MAGIC ATTACK
	// -------------------------------------------------------------------------------------------- MAGIC ATTACK
	else if ($_SESSION['magiccast'] == 1 && $input == 'attack') 
	{
		if ($mp < $spell_cost)
		{
			echo $message="<i>You don't have enough MP to cast $spell</i><br/>";
			include ('update_feed_alt.php'); // --- update feed
			$otherEAttackCheck = 1;	

		}
		else if ($enemy == "Stag" || $enemy == "Victoria the Dead") { 	// ----------------------------------------------- MAG RESIST ENEMY 
			echo $message = "The $enemy is immune to magic!<br/>";
				include ('update_feed_alt.php'); // --- update feed	
				$magResist = 1;	
				$otherEAttackCheck = 1;
		}
		   	// ----------------------------------------------- SPELL DODGE CHECK
		
		else if ($enemy == "Imp") { // ------------  50% dodge enemies
			$randDodge = rand(1,2);
			if ($randDodge == 1){
				echo "The $enemy DODGES your spell!<br/>";
				$message = "The <span class='blue'>$enemy DODGES</span> your spell!<br/>";
				include ('update_feed_alt.php'); // --- update feed		
				$otherEAttackCheck = 1;	
				$dodgeCheck = 0;
			}
		}
		else if ($spell == 'magic strike' && $otherEAttackCheck == 0) { // ----------------------------------------------- MAGIC STRIKE!
			echo "You attack with a magic imbued $equipR for $spell_cost MP and hit the $enemy for $damagetotal damage.<br/>";
			$message="You attack with a magic imbued $equipR<span class='total red blueborder'> $damagetotal </span>  <br/>
			<span class='alt2 attack blue'> $damage - $block = $damagetotal </span><br/> ";
			include ('update_feed_alt.php'); // --- update feed
			$results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp 
		 	$results = $link->query("UPDATE $user SET mp = mp - $spell_cost"); // -- mp change
		}
		else if ($otherEAttackCheck == 0) { // ----------------------------------------------- MAGIC HIT!
			echo "You cast $spell for $spell_cost MP and hit the $enemy for $damagetotal damage<br/>";
			$message="You cast $spell for $spell_cost mp<span class='total blue blueborder'> $damagetotal </span>  <br/>
			<span class='alt2 attack blue'> $damage - $block = $damagetotal </span><br/> ";
			include ('update_feed_alt.php'); // --- update feed
			$results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp 
		 	$results = $link->query("UPDATE $user SET mp = mp - $spell_cost"); // -- mp change
		}
	}
	// -------------------------------------------------------------------------------------------- WEAPON ATTACK
	// -------------------------------------------------------------------------------------------- WEAPON ATTACK
	else { 	
		if ($enemy == "Imp") { // ---------------------------------------------  50% dodge enemies
			$randDodge = rand(1,2);
			if ($randDodge == 1){
				echo "The $enemy DODGES your attack!<br/>";
				$message = "The <span class='blue'>$enemy DODGES</span> your attack!<br/>";
				include ('update_feed_alt.php'); // --- update feed		
				$dodgeCheck = 1;	
			}
			
		}
		if ($dodgeCheck !=1) { // ----------------------------------------------- WEAPON HIT!
		$results = $link->query("UPDATE $user SET enemyhp = enemyhp - $damagetotal"); // subtract enemy hp 
		echo "You attack the $enemy  with your $equipR for $damagetotal<br/>";
		
		$weapondrop = rand (1,500); // weapon drop 1/500
		if ($weapontype==3){  // DISPLAY FOR PROJECTILE
			$message="You attack with your $equipR <span class='total greenborder green'> $damagetotal </span><br/>  
			<span class='alt2 attack red'>( $damage + $damageskill ) - $block = $damagetotal</span><br/>"; 
			include ('update_feed_alt.php'); // --- update feed
				if ($weapondrop == 1) {  // weapon drop
			echo $message="<i>O NO! As you attack with your $equipR it becomes unequipped!! Grab another weapon!</i><br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET equipR = 'fists'");	
			}
			}
			
		else {	// DISPLAY FOR ONE or TWO HANDED WEAPONS				
		$message="You attack with your $equipR <span class='total red redborder'> $damagetotal </span><br/>  
			<span class='alt2 attack red'>( $damage + $damageskill ) - $block = $damagetotal</span><br/>"; 
			include ('update_feed_alt.php'); // --- update feed
				if ($weapondrop == 1) { // weapon drop
			echo $message="<i>O NO! As you attack with your $equipR it becomes unequipped!! Grab another weapon!</i><br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET equipR = 'fists'");	
			if ($equipR == $equipL) { $results = $link->query("UPDATE $user SET equipL = '- - -'"); } // Drop for Double handed check
			}
		}														// -------------------------------------------- AMMO USE
		if ($equipR == "wooden bow" || $equipR == "hunter bow" || $equipR == "long bow" || $equipR == "iron bow" || $equipR == "enchanted bow" 
				|| $equipR == "steel bow" || $equipR == "silver bow" || $equipR == "ranger bow" || $equipR == "mithril bow") 
				{ $results = $link->query("UPDATE $user SET arrows = arrows - 1");	} //minus arrow
		if ($equipR == "crossbow" || $equipR == "hunter crossbow" || $equipR == "compound crossbow" || $equipR == "iron crossbow" 
				|| $equipR == "steel crossbow" || $equipR == "silver crossbow" || $equipR == "mithril crossbow")
				{ $results = $link->query("UPDATE $user SET bolts = bolts - 1");	} //minus bolt
		if ($equipR == "javelin") 
				{ $results = $link->query("UPDATE $user SET javelin = javelin - 1");	} //minus spear

			}			
		} // --- end attack		
	}
		
	// -------------------------------------------------------------------------------------------------------------------------- PETS
	// -------------------------------------------------------------------------------------------------------------------------- PETS
	// -------------------------------------------------------------------------------------------------------------------------- PETS
	// -------------------------DB QUERY! // -------------------------------------------- PET Recalculate enemy HP
			$sql = "SELECT * FROM $username";
			if(!$result = $link->query($sql)){
			die('There was an error running the query [' . $link->error . ']');}
			// -------------------------recalculate variables for pet
			while($row = $result->fetch_assoc())	{ $enemyhp=$row['enemyhp']; }	
			
	if ($pet == 'pet hampster' && $enemyhp > 0 ) {	// -------------------------------------------------------------- HAMPSTER ATTACK
		$bite = rand (0,2);				
		$message="Your pet hampster bites for <span class='red'>$bite</span> damage!<span class='total petAtt red redborder'> $bite </span><br/>";
		include ('update_feed_alt.php'); // --- update feed
		$results = $link->query("UPDATE $user SET enemyhp = enemyhp - $bite"); // subtract enemy hp 				
		}
			
			
			
			
	// -------------------------------------------------------------------------------------------------------------------------- POISON
	// -------------------------------------------------------------------------------------------------------------------------- POISON
	// -------------------------------------------------------------------------------------------------------------------------- POISON
			
			// -------------------------DB QUERY! // -------------------------------------------- Poison Recalculate enemy HP
			$sql = "SELECT * FROM $username";
			if(!$result = $link->query($sql)){
			die('There was an error running the query [' . $link->error . ']');}
			// -------------------------recalculate variables for poison
			while($row = $result->fetch_assoc())	{ $enemyhp=$row['enemyhp']; }	
		
		if ($_SESSION['poison_amt']>0 && $enemyhp > 0 && $magResist != 1 && $flyingenemycheck != 1) // ------- Poison on Enemy
			{	$poison_amt = $_SESSION['poison_amt'] = $_SESSION['poison_amt'] - 1;
				if ($poison_amt > 0){
					echo "The $enemy is poisoned for $poison_amt<br/>";
					$message="The $enemy is poisoned <span class='total petAtt darkgreen darkgreenborder'> ".$_SESSION['poison_amt']." </span><br/>"; 
					include ('update_feed_alt.php'); // --- update feed
					$results = $link->query("UPDATE $user SET enemyhp = enemyhp - $poison_amt"); // subtract enemy hp w/ poison
				}
			}
			
			
	
			
			

}	
	
// ---------------------------------- END BATTLE CHECKS
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){die('There was an error running the query [' . $link->error . ']');}	
// -------------------------recalculate variables
while($row = $result->fetch_assoc())
	{ $enemyhp=$row['enemyhp'];   
	  $hp=$row['hp'];   
	  $infight=$row['infight'];
   }
// ------------------------ ENEMY DIES
if ($enemyhp <= 0 && $infight >=1)            
	{ $_SESSION['poison_amt']=0; // reset poison on enemy death
	include ('battle-win.php'); }	

$enemyrand4 = rand (1,4); // random spell chance 25%
$enemyrandpickpocket = rand (1,5); // random pickpocket chance 20%
$enemyrandmagattack = 1; //rand (1,2); //random magic attack
$enemypowerattack = rand (1,3); //random POWER attack
$ddgecheck = rand (1,100); // Dodge Chance LVL/100

//echo 'DDGE!: '.$ddgecheck.'<br/>';

// ------------------------ YOU DIE
if ($hp <= 0)   
	{ //include ('function-die.php');
	 }
// -------------------------------------------------------------- ENEMY ATTACK
// -------------------------------------------------------------- ENEMY ATTACK
// -------------------------------------------------------------- ENEMY ATTACK
// -------------------------------------------------------------- ENEMY ATTACK
// -------------------------------------------------------------- ENEMY ATTACK
// -------------------------------------------------------------- ENEMY ATTACK

else if ($infight == 1 && $enemyhp > 0 && ($ddgecheck <= $ddge)) // YOU DODGE
{
	echo "You dodge the $enemy's attack!<br/>";
	$message="You dodge the $enemy's attack!</br>
	<span class='attack green'>DODGED $edamagetotal</span><br/>";
	include ('update_feed_alt.php'); // --- update feed
	$otherAttackCheck = 1;
	}
else if ($infight == 1 && $enemyhp > 0 && ($enemy=='Kobold Shaman') && ($enemyhp < 20 || $enemyrand4 == 1)) // ENEMY HEAL
{
	$results = $link->query("UPDATE $user SET enemyhp = enemyhp + $edamage"); 
	echo 'The '.$enemy.' heals itself with a spell for '.$edamage.' hp.<br/>';
	$message="The $enemy heals itself with a spell for <span class='green'>$edamage</span> hp.</br>";
	include ('update_feed_alt.php'); // --- update feed
	}
else if ($infight == 1 && $enemyhp > 0 && ($enemy=='Thief' || $enemy=='Thief Pickpocket' || $enemy=='Master Thief') && ($enemyrandpickpocket == 1)) // ENEMY PICKPOCKET
{
	$pickpocketAMT = rand (1,20);
	$results = $link->query("UPDATE $user SET currency = currency - $pickpocketAMT"); 
	echo 'The '.$enemy.' pickpockets '.$pickpocketAMT.' '.$currency.' from you!<br/>';
	$message="The $enemy pickpockets <span class='gold'>$pickpocketAMT</span> $currency from you!</br>";
	include ('update_feed_alt.php'); // --- update feed
	}
		
else if ($infight == 1 && $enemyhp > 0 && (	$enemy=='Kobold Warlock' || $enemy=='Fire Ogress' || $enemy=='Skeleton Sorceror'  || $enemy=='Victoria the Dead' || $enemy=='Demon Wing' ) && ( $enemyrandmagattack == 1)) // ENEMY MAG ATTACK // USES MAG AS DEF
{
	$eblock = rand (0,$magmod) + $blockAmt;
	$edamagetotal = $edamage - $eblock;	
	if ($edamagetotal <= 0) { $edamagetotal = 0; } // if negative damage make 0
	//$results = $link->query("UPDATE $user SET hp = hp - $edamagetotal"); // SUBTRACT YOUR HP 
	echo 'The '.$enemy.' casts a spell at you for '.$edamagetotal.' damage.<br/>';
	$message=" The $enemy casts a spell at you <span class='total blueBG'>$edamagetotal</span></br>
	<span class='attack blue'>$edamage - $eblock = $edamagetotal</span><br/>";
	include ('update_feed_alt.php'); // --- update feed
	$otherAttackCheck = 1;
	}	
else if ($infight == 1 && $enemyhp > 0 && ($enemy=='Orc' || $enemy=='Skeleton Archer')) // ENEMY PROJ ATTACK // USES DEX AS DEF
{
	$eblock = rand (0,$dexmod)+ $blockAmt;
	$edamagetotal = $edamage - $eblock;	 
	if ($edamagetotal <= 0) { $edamagetotal = 0; } // if negative damage make 0
	//$results = $link->query("UPDATE $user SET hp = hp - $edamagetotal"); // SUBTRACT YOUR HP 
	echo 'The '.$enemy.' attacks you for '.$edamagetotal.' damage.<br/>';
	$message=" The $enemy attacks you <span class='total greenBG'>$edamagetotal</span></br>
	<span class='attack green'>$edamage - $eblock = $edamagetotal</span><br/>";
	include ('update_feed_alt.php'); // --- update feed
	$otherAttackCheck = 1;
	}		
	// -----------------------------------------------------------------------------------------ENEMY POWER ATTACK - X3 ATTACK
else if ($infight == 1 && $enemyhp > 0 && ($enemy=='Rabid Skeever' || $enemy=='Possessed Axeman' || $enemy=='Red Beard' || $enemy=='Troll' || $enemy=='Troll Elder') && ( $enemypowerattack == 1)) 
{
	$edamage1 = rand ( 0 , $enemyatt); 	 // ENEMY ATTACK
	$edamage2 = rand ( 0 , $enemyatt); 	 // ENEMY ATTACK
	$edamage3 = rand ( 0 , $enemyatt); 	 // ENEMY ATTACK
	//$eblock = rand ( 0 , $defmod) + rand ( 0 , $toughness);
	$edamagetotal = ($edamage1 + $edamage2 + $edamage3) - $eblock;	 
	if ($edamagetotal <= 0) { $edamagetotal = 0; } // if negative damage make 0
	//$results = $link->query("UPDATE $user SET hp = hp - $edamagetotal"); // SUBTRACT YOUR HP 
	echo 'The '.$enemy.' unleashes a POWER ATTACK for '.$edamagetotal.' damage.<br/>';
	$message="<p>The $enemy unleashes a POWER ATTACK!</p> <span class='total redBG power'>$edamagetotal</span></br>
	<span class='attack red'>($edamage1 + $edamage2 + $edamage3) - $eblock = $edamagetotal</span><br/>";
	include ('update_feed_alt.php'); // --- update feed
	$otherAttackCheck = 1;
	}		
//else
if ($infight == 1 && $enemyhp > 0 && $otherAttackCheck !=1)      // --- ENEMY STRIKE!!! 
	{
	//$results = $link->query("UPDATE $user SET hp = hp - $edamagetotal"); // SUBTRACT YOUR HP 
	echo 'The '.$enemy.' attacks you for '.$edamagetotal.'.<br/>';
	$message="The $enemy attacks you <span class='total redBG'>$edamagetotal</span><br/>
	<span class='attack red'>$edamage - $eblock = $edamagetotal</span> ";
	include ('update_feed_alt.php'); // --- update feed
	}

				// --------------------------------------------------------------------------------------------- POISON YOU
			// -------------------------DB QUERY! // ----------------------------- Poison Recalculate enemy HP
			$sql = "SELECT * FROM $username";
			if(!$result = $link->query($sql)){
			die('There was an error running the query [' . $link->error . ']');}
			// -------------------------recalculate variables for poison
			while($row = $result->fetch_assoc())	{ $enemyhp=$row['enemyhp']; }	
		
		
		
	if ($infight == 1 && $enemyhp > 0 && ($enemy=='Mongolian Death Worm') && $_SESSION['poisonyou'] < 1) // ENEMY POISONS YOU
	{
	$poisonyou = $_SESSION['poisonyou'] = rand (1,10);	
	//echo $message = 'The '.$enemy.' poisons you for '.$poisonyou.'<br/>';
	//include ('update_feed_alt.php'); // --- update feed
	}
	
	
	
		if ($_SESSION['poisonyou']>0 && $enemyhp > 0 ) // ------- Poison on YOU
			{	$poisonyou = $_SESSION['poisonyou'] = $_SESSION['poisonyou'] - 1;
				if ($poisonyou > 0){ 
					echo "You are poisoned for $poisonyou<br/>";
					$message="<br>You are <span class='darkgreen'>poisoned</span> for <span class='darkgreen'>$poisonyou </span> <span class='total petAtt darkgreenBG'> ".$_SESSION['poisonyou']." </span><br/>"; 
					include ('update_feed_alt.php'); // --- update feed
					$results = $link->query("UPDATE $user SET hp = hp - $poisonyou"); // subtract enemy hp w/ poison
				}
			}

// ---------------------------------------------------------------REMOVE HP FROM YOU!!!
if ($_SESSION['magicarmor_amount'] > 0) { // remove from magic armor
		$_SESSION['magicarmor_amount'] -= $edamagetotal;
			if ($_SESSION['magicarmor_amount'] <= 0) { // magic armor run out, set remainder
			$remainder = $_SESSION['magicarmor_amount'] - $_SESSION['magicarmor_amount'] - $_SESSION['magicarmor_amount'];
			$results = $link->query("UPDATE $user SET hp = hp - $remainder"); }
		} 
else	{
			$results = $link->query("UPDATE $user SET hp = hp - $edamagetotal");// SUBTRACT YOUR HP 
		}
// ---------------------------------------------------------------BATTLE BOX END
	$message="</div>";
	include ('update_feed_alt.php'); // --- update feed
	$message = "<h3>You have defeated the $enemy!!!</h3>"; // BATTLE HUD // so the close div doesnt mess up the HUD
//$funflag=1;
?>