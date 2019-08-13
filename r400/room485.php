<?php
						$roomname = "Underwater Gold Shrine";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc485'];

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$chest5 = $row['chest5'];
$goldkey = $row['goldkey']; 

include ('random-encounters/blueocean-underwater.php'); // blue ocean battle set
include ('battle-sets/blueocean-underwater.php'); // blue ocean battle set



if($input=='open chest' || $input=='unlock chest') 
{
	if ($chest5 >= 1) { 	 // --- already opened
	echo 'You already opened this gold chest.<br/>';
	$message="<i>You already opened this gold chest.</i>";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if (($chest5 == 0) &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a Gold Key to open this chest. You can get one from the Friendly Pirate at the Island Oasis.</i><br/>";
	include ('update_feed.php'); // --- update feed	
	}
	
	
	else if ($chest5 > 0 || $goldkey >= 1 ) {  // ---- open!
		$ringrand = rand(1,2);
			//echo 'SilVIIerRand: '.$silVIIerrand.'<br/>';
				if ($ringrand == 1) { $ringitem='Ring of Health Regen V';
				$results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1"); }
				if ($ringrand == 2) { $ringitem='Ring of Mana Regen V';
				$results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1"); }
							
			$silverrand = rand(1,12);
			//echo 'SilverRand: '.$silverrand.'<br/>';
				if ($silverrand == 1) { $silveritem='Silver Sword';
				$results = $link->query("UPDATE $user SET silversword = silversword + 1"); }
				if ($silverrand == 2) { $silveritem='Silver 2h Sword';
				$results = $link->query("UPDATE $user SET silver2hsword = silver2hsword + 1"); }
				if ($silverrand == 3) { $silveritem='Silver Boomerang';
				$results = $link->query("UPDATE $user SET silverboomerang = silverboomerang + 1"); }
				if ($silverrand == 4) { $silveritem='Silver Bow';
				$results = $link->query("UPDATE $user SET silverbow = silverbow + 1"); }
				if ($silverrand == 5) { $silveritem='Silver Crossbow';
				$results = $link->query("UPDATE $user SET silvercrossbow = silvercrossbow + 1"); }
				if ($silverrand == 6) { $silveritem='Silver Shield';
				$results = $link->query("UPDATE $user SET silvershield = silvershield + 1"); }
				if ($silverrand == 7) { $silveritem='Silver Helmet';
				$results = $link->query("UPDATE $user SET silverhelmet = silverhelmet + 1"); }
				if ($silverrand == 8) { $silveritem='Silver Breastplate';
				$results = $link->query("UPDATE $user SET silverbreastplate = silverbreastplate + 1"); }
				if ($silverrand == 9) { $silveritem='Silver Gauntlets';
				$results = $link->query("UPDATE $user SET silvergauntlets= silvergauntlets + 1"); }
				if ($silverrand == 10) { $silveritem='Silver Boots';
				$results = $link->query("UPDATE $user SET silverboots = silverboots + 1"); }
				if ($silverrand == 11) { $silveritem='Silver Ring';
				$results = $link->query("UPDATE $user SET silverring = silverring + 1"); }
				if ($silverrand == 12) { $silveritem='Silver Necklace';
				$results = $link->query("UPDATE $user SET silvernecklace = silvernecklace + 1"); }
	
	
	
	echo 'You use your golden key to open the chest!<br/>';
	$message="You use your golden key to open the chest!<br/>";
	include ('update_feed.php'); // --- update feed	
	$cash = 5000;
	$message = "   <i>the chest contains:</i>   
	<div class='goldchestopen'>
	<h3>Blue Ocean</h3>
	<h3>Gold Chest</h3>
	<p>+ 500 XP</p>
	<p>+ $cash $currency</p>
	<p>+ 5 Meatballs</p>
	<p>+ 5 Bluefish</p>
	<p>+ 5 Wings Potions</p>
	<p>+ 5 Gills Potions</p>
	<p class='px20'>+ $ringitem</p>
	<p class='px20'>+ $silveritem</p>
	<p class='px25'>+ Heavy Helmet! <span class='px16'>(+10 str, +10 def)</span></p>
	</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET xp = xp + 500");
	$results = $link->query("UPDATE $user SET currency = currency + $cash");
	$results = $link->query("UPDATE $user SET bluefish = bluefish + 5");
		$results = $link->query("UPDATE $user SET meatball = meatball + 5");
		$results = $link->query("UPDATE $user SET wingspotion = wingspotion + 5");
		$results = $link->query("UPDATE $user SET gillspotion = gillspotion + 5");
	$results = $link->query("UPDATE $user SET heavyhelmet = heavyhelmet + 1");
	$results = $link->query("UPDATE $user SET chest5 = 1");
	$results = $link->query("UPDATE $user SET goldkey = goldkey - 1");

}
}

else if ($input == 'reset chest')
{
	$results = $link->query("UPDATE $user SET chest5 = 0");
	$results = $link->query("UPDATE $user SET goldkey = 1");
}


// -------------------------------------------------------------------------- Battle TRAVEL
if ((	$input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1) {
	echo 'You cannot leave the room in the middle of battle!<br/>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
// -------------------------------------------------------------------------- TRAVEL
else if($input=='sw' || $input=='southwest') 
{	if ($_SESSION['breathingwater'] >= 1)
			  { echo 'You swim southwest<br/>';
   		$message="<i>You swim southwest</i></br>".$_SESSION['desc484'];
		include ('update_feed.php');   // --- update feed
   			   $results = $link->query("UPDATE $user SET room = '484'"); // -- room change
   			   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		} else{
 		echo $message="<i>You can't swim that way! You need to be breathing water!</i><br>";
		include ('update_feed.php');   // --- update feed
	}
}

// ----------------------------------- end of room function
include ('function-end.php');
}
?>