<?php
						$roomname = "Cathedral Courtyard"; 
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc621'];

include ('function-start.php'); 
 
// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


// -------------------------------------------------------------------------- BATTLE VARIABLES		
 	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];
	
	
// include ('battle-sets/mountains.php');


$chest6 = $row['chest6'];
$goldkey = $row['goldkey']; 
	

	


if($input=='open chest' || $input=='unlock chest' || $input=='open gold chest') 
{
	if ($chest6 >= 1) { 	 // --- already opened
	echo $message="<i>You already opened this gold chest, remember that awesome Snow Bow.</i>";
	include ('update_feed.php'); // --- update feed	
	}
	
	else if (($chest6 == 0) &&  $goldkey <= 0) {  // ---- no key	
	echo $message="<i>You need a Gold Key to open this chest. You can get one from the Dark Elf in this Forest.</i><br/>";
	include ('update_feed.php'); // --- update feed	
	}
	

	else if ($chest6 > 0 || $goldkey >= 1 ) {  // ---- open!

			$rand2 = rand(1,4);
				if ($rand2 == 1 ){
					$ringitem = 'Ring of Strength X';
					$results = $link->query("UPDATE $user SET ringofstrengthX = ringofstrengthX + 1"); }
				if ($rand2 == 2 ){
					$ringitem = 'Ring of Dexterity X';
					$results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX + 1"); }
				if ($rand2 == 3 ){
					$ringitem = 'Ring of Magic X';
					$results = $link->query("UPDATE $user SET ringofmagicX = ringofmagicX + 1"); }
				if ($rand2 == 4 ){
					$ringitem = 'Ring of Defense X';
					$results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1"); }	
							
			$silverrand = rand(1,13);
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
	$message = "<i>the chest contains:</i>   
	<div class='goldchestopen'>
	<h3>Dark Forest</h3>
	<h3>Gold Chest</h3>
	<p>+ 1000 XP</p>
	<p>+ 10000 $currency</p>
	<p>+ 10 Red Balms</p>
	<p>+ 10 Blue Balm</p>
	<p>+ 5 Silver Keys</p>
	<p class='px20'>+ $ringitem</p>
	<p class='px20'>+ $silveritem</p>
	<p class='px25'>+ Oak Battle Staff! <span class='px16'>( +30 mag, +30 str )</span></p>
	</div>";
	include ('update_feed.php'); // --- update feed
			
	$results = $link->query("UPDATE $user SET xp = xp + 1000");
	$results = $link->query("UPDATE $user SET currency = currency + 10000");
	$results = $link->query("UPDATE $user SET redbalm = redbalm + 10");
	$results = $link->query("UPDATE $user SET bluebalm = bluebalm + 10");
	$results = $link->query("UPDATE $user SET silverkey = silverkey + 5");
	$results = $link->query("UPDATE $user SET oakbattlestaff = oakbattlestaff + 1");
	$results = $link->query("UPDATE $user SET chest6 = 1");
	$results = $link->query("UPDATE $user SET goldkey = goldkey - 1");

}
}

else if ($input == 'reset chest')
{
	$results = $link->query("UPDATE $user SET chest6 = 0");
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

	else if($input=='e' || $input=='east') 
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc622'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '622'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


else if($input=='sw' || $input=='southwest') 
{			echo 'You travel southwest<br/>';
   	$message="<i>You travel southwest</i></br>".$_SESSION['desc618'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '618'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
	
	 



// ----------------------------------- end of room function
include ('function-end.php');
}
?>