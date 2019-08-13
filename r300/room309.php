<?php
						$roomname = "Dwarf Treasury";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc309'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


$chest4 = $row['chest4'];
	$goldkey = $row['goldkey'];
	
	if ( $_SESSION['silverchest']!='309'){
	$_SESSION['silverchest'] = '309';}


	// --------------------------------------------------------------------------- GOLD CHEST 4 - STONE MINE VILLAGE
	if($input=='open gold chest' || $input=='unlock chest') 
	{
		if ($chest4 >= 1) { 	 // --- already opened
		echo $message="<i>You already opened this gold chest. Remember you got that Pet Bat!</i><br>
";
		include ('update_feed.php'); // --- update feed	
		}
		
		else if ($chest4 == 0 &&  $goldkey <= 0) {  // ---- no key	
		echo $message="<i>You need a gold key to open this chest. You can get one by completing quest 35 from the Dwarf Captain. You can find him at the Stone Mine Crossroads.</i><br/>";
		include ('update_feed.php'); // --- update feed	
		}
		else if ($chest4 == 0 && $goldkey >= 1 ) {  // ---- open!
		
			$ringrand = rand(1,4);
			//echo 'SilVIIerRand: '.$silVIIerrand.'<br/>';
				if ($ringrand == 1) { $ringitem='Ring of Strength VII';
				$results = $link->query("UPDATE $user SET ringofstrengthVII = ringofstrengthVII + 1"); }
				if ($ringrand == 2) { $ringitem='Ring of Dexterity VII';
				$results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1"); }
				if ($ringrand == 3) { $ringitem='Ring of Magic VII';
				$results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII + 1"); }
				if ($ringrand == 4) { $ringitem='Ring of Defense VII';
				$results = $link->query("UPDATE $user SET ringofdefenseVII = ringofdefenseVII + 1"); }
				
				
		
			
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
		$cash = rand (1500,2000);
	
		$message = "<i>the chest contains:</i>   
		<div class='goldchestopen'>
		<h3>Stone Mine</h3>
		<h3>Gold Chest</h3>
		<p>+ 500 XP</p>
		<p>+ $cash $currency</p>
		<p>+ 5 Meatballs</p>
		<p>+ 3 Silver Keys</p>
		<p class='px25'>+ $ringitem</p>
		<p class='px25'>+ $silveritem</p>
		<p class='px25'>+ Pet Bat!</p>
		</div>";
	
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 500");
		$results = $link->query("UPDATE $user SET currency = currency + $cash");
		$results = $link->query("UPDATE $user SET meatball = meatball + 5");
		$results = $link->query("UPDATE $user SET silverkey = silverkey + 3");
		$results = $link->query("UPDATE $user SET petbat = 1");
		$results = $link->query("UPDATE $user SET chest4 = 1");
		$results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
	}
	}
	
if ($input == 'reset chest')
{
	$results = $link->query("UPDATE $user SET chest4 = 0");
	$results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
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

else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast<br/>';
   	$message="<i>You travel southeast</i></br>".$_SESSION['desc307'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = 307"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>