	<?php
							$roomname = "Babylon Gardens";
	$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc224'];
	//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level
	
	include ('function-start.php'); 
	
	// -------------------------DB CONNECT!
	include ('db-connect.php');  
	// -------------------------DB QUERY!
	$sql = "SELECT * FROM $username";
	if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
	// -------------------------DB OUTPUT!
	while($row = $result->fetch_assoc()){   
	
	$chest3 = $row['chest3'];
	$goldkey = $row['goldkey'];
	
// ------------------------------------- -------------------------------------  GOLD CHEST 3 - Red Town - Babylon Gardens
if($input=='open chest') 
{
	if ($chest3 >= 1) { 	 // --- already opened
	echo $message="<i>You already opened this gold chest. Remember you got those regen rings and an amazing bonus silver item!</i><br>";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if ($chest3 == 0 &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a Gold Key to open this chest. You can get one by completing Quest 24 from the Red Town Mayor. You can find him to the east and then up.</i><br/>";
	include ('update_feed.php'); // --- update feed	
	}
else if ($chest3 == 0 || $goldkey >= 1 ) {  // ---- open!
	
	$silverrand = rand(1,12);
			echo 'SilverRand: '.$silverrand.'<br/>';
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
	$cash = rand (1000,1500);
	$message = "<i>the chest contains:</i>   
	<div class='goldchestopen'>
	<h3>Red Town</h3>
	<h3>Gold Chest</h3>
	<p>+ 300 XP</p>
	<p>+ $cash $currency</p>
	<p>+ 5 Reds, Greens, Blues & Yellows</p>
	<p>+ 2 Silver Keys</p>
	<p class='px20'>+ Ring of Health Regen III</p>
	<p class='px20'>+ Ring of Mana Regen III</p>
	<p class='px25'>+ $silveritem!</p>
	</div>";
	include ('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 300");
		$results = $link->query("UPDATE $user SET currency = currency + $cash");
		$results = $link->query("UPDATE $user SET reds = reds + 5");
		$results = $link->query("UPDATE $user SET greens = greens + 5");
		$results = $link->query("UPDATE $user SET blues = blues + 5");
		$results = $link->query("UPDATE $user SET yellows = yellows + 5");
		$results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
		$results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII + 1");
		$results = $link->query("UPDATE $user SET silverkey = silverkey + 2");
		$results = $link->query("UPDATE $user SET chest3 = 1");
		$results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
}
}
if ($input == 'reset chest')
{
	$results = $link->query("UPDATE $user SET chest3 = 0");
	$results = $link->query("UPDATE $user SET goldkey = goldkey + 1");
}

	// --------------------------------------------------------------------------- GOLD CHEST 3 - Red Town - Babylon Gardens OLD
	if($input=='open chestOLD') 
	{
		if ($chest3 >= 1) { 	 // --- already opened
		echo 'You already opened this gold chest. Remember you got those regen rings and a bonus silver item?!';
		$message="<i>You already opened this gold chest. Remember you got those colors, regen rings and a bonus silver item?!</i>";
		include ('update_feed.php'); // --- update feed	
		}
		
		else if ($chest3 == 0 &&  $goldkey <= 0) {  // ---- no key	
		echo $message="<i>You need a gold key to open this chest. You can get one by completing quest 24 from Mayor Rudolf. You can find him east of up from here.</i><br/>";
		include ('update_feed.php'); // --- update feed	
		}
		else if ($chest3 == 0 && $goldkey >= 1 ) {  // ---- open!
		
			$silverrand = rand(1,12);
			echo 'SilverRand: '.$silverrand.'<br/>';
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
		$cash = rand (1000,1500);
		$message = "<i>The Chest Contains!</i> <br />
	-------------------------------------------<br />
	+ 300 XP<br />
	+ $cash $currency<br />
	+ 5 reds, greens, blues & yellows<br />
	+ Ring of Health Regen III<br />
	+ Ring of Mana Regen III<br />
	+ 2 Silver Keys<br />
	+ $silveritem<br />
	-------------------------------------------</p>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET xp = xp + 300");
		$results = $link->query("UPDATE $user SET currency = currency + $cash");
		$results = $link->query("UPDATE $user SET reds = reds + 5");
		$results = $link->query("UPDATE $user SET greens = greens + 5");
		$results = $link->query("UPDATE $user SET blues = blues + 5");
		$results = $link->query("UPDATE $user SET yellows = yellows + 5");
		$results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
		$results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII + 1");
		$results = $link->query("UPDATE $user SET silverkey = silverkey + 2");
		$results = $link->query("UPDATE $user SET chest3 = 1");
		$results = $link->query("UPDATE $user SET goldkey = goldkey - 1");
	}
	}
	
	
	
	if($input=='get flower' || $input=='pick flower' || $input=='pick up flower')  // ---- PICK FLOWER
	{
		if ( $row['flower'] <= 0 )
		{
		echo $message="For some strange reason you can't pick a flower here unless you already have one in your inventory. Go to the grassy field to get one.<br/>";
		include ('update_feed.php'); // --- update feed
		}
		else if ( $row['flower'] >= 2 )
		{
		echo 'You already have 2 flowers in your inventory.<br/>';
		$message="<i>You already have 2 flowers in your inventory.</i></br>";
		include ('update_feed.php'); // --- update feed
		}
		else {
		echo 'You pick up a flower! [ 2 total ]<br/>';
		$message="<i>You pick up a flower! [ 2 total ]</i></br>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET flower = flower + 1");
		}
	}
	
	include ('battle-sets/thief.php');
	
	
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
	else if($input=='e' || $input=='east') 
	{	echo 'You travel east<br/>';
	   $message="<i>You travel east</i></br>".$_SESSION['desc222'];
		include ('update_feed.php'); // --- update feed
	   $results = $link->query("UPDATE $user SET room = 222"); // -- room change
	   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	
	
	
	
	
	
	
	// ----------------------------------- end of room function
	include ('function-end.php');
	}
	?>
