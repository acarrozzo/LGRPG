<?php
						$roomname = "Forest Gnome - Tree Hut";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc128'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   



	$quest14=$row['quest14']; 
	$quest15=$row['quest15'];
	$quest16=$row['quest16'];  

		$redberry=$row['redberry'];  
		$blueberry=$row['blueberry'];  

		$wood=$row['wood'];  

		$KLtroll=$row['KLtroll'];  
			$hatchet=$row['hatchet'];   


if (1==2){} //nada

else if($input=='get hatchetOLD') 
{
	if ($hatchet >= 1)
	 {
		echo 'You already have a hatchet. If you lose it come back here for another free one<br/>';
	   	$message="<i>You already have a hatchet. If you lose it come back here for another one.</i></br>";
		include ('update_feed.php'); // --- update feed
	 }
	else
	 {	 
   	echo 'You pick up a hatchet and put it in your inventory<br/>';
   	$message="You pick up a hatchet and put it in your inventory</br>";
	include ('update_feed.php'); // --- update feed
  	$results = $link->query("UPDATE $user SET hatchet = hatchet + 1");
	 }
}
if($input=='get hatchet')  // ---- get hatchet
{
	if ( $hatchet >= 1 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have a hatchet. If you lose it come back here for another free one.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You pick up a hatchet and put it in your inventory</div>";
	include ('update_feed.php'); // --- update feed
  	$results = $link->query("UPDATE $user SET hatchet = hatchet + 1");
	}
}


// ---------------------- START ALL QUESTS ---------------------- //
  if($input=='start quests') {
	 if ($quest14 <1 || $quest15 <1 || $quest16 <1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start The Tree Gnome's Quests! (14 - 16)</em><br>Check your Quests tab to review what needs to be done.</div> ";		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest14 = 1");
   		$results = $link->query("UPDATE $user SET quest15 = 1");
   		$results = $link->query("UPDATE $user SET quest16 = 1");
	  	}
}

// ---------------------- QUEST 14) Gnome Needs Berries	 ---------------------- //
if($input=='info 14') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 14 Info</strong><br>
		You need 20 redberries and 20 blueberries. You can pick up berries from bushes found scattered around the forest. They are also dropped by many enemies and sold at some shops.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 14') 
{	if ($quest14 == 1 && ($redberry >= 20 && $blueberry >= 20))
	{	$r = rand (1,3);
			if ($r == 1 ) {$p1 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p1 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p1 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }
		$r = rand (1,3);
			if ($r == 1 ) {$p2 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p2 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p2 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }
		$r = rand (1,3);
			if ($r == 1 ) {$p3 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p3 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p3 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }
		$r = rand (1,3);
			if ($r == 1 ) {$p4 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p4 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p4 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }
		$r = rand (1,3);
			if ($r == 1 ) {$p5 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p5 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p5 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }
		$r = rand (1,3);
			if ($r == 1 ) {$p6 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p6 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p6 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }
		$r = rand (1,3);
			if ($r == 1 ) {$p7 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p7 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p7 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }					
		$r = rand (1,3);
			if ($r == 1 ) {$p8 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p8 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p8 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }
		$r = rand (1,3);
			if ($r == 1 ) {$p9 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p9 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p9 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }	
		$r = rand (1,3);
			if ($r == 1 ) {$p10 = "[ +1 Red Potion ]<br />" ;$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); }
			if ($r == 2 ) {$p10 = "[ +1 Blue Potion ]<br />" ;$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); }
			if ($r == 3 ) {$p10 = "[ +1 Purple Potion ]<br />" ;$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); }
		echo $message="<div class='questWin'>
		<h3>Quest 14 Completed!</h3>
		<h4>Gnome Needs Berries</h4>
		Congrats! You hand the Forest Gnome 20 redberries and 20 blueberries. He thanks you for your hard work, immediately smashes the berries together and hands you 10 random potions.
	  	<h4>Rewards</h4>
  	  	[ + 300 xp  ]<br />
      	[ + 300 $currency ]<br />
		$p1$p2$p3$p4$p5$p6$p7$p8$p9$p10
		</div>";	
		include ('update_feed.php'); // --- update feed
	    $results = $link->query("UPDATE $user SET currency = currency + 300"); 
		$results = $link->query("UPDATE $user SET xp = xp + 300"); 
		$results = $link->query("UPDATE $user SET quest14 = 2");
	$results = $link->query("UPDATE $user SET redberry = redberry - 20"); 
	$results = $link->query("UPDATE $user SET blueberry = blueberry - 20"); 
	} 
	else if ($quest14 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 14 Not Complete</strong><br>
		To complete this quest you need to return with 20 redberries and 20 blueberries. You can pick them from bushes found scattered around the Forest. You can also get them from enemy drops.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 15) New Tree Hut Door ---------------------- //
if($input=='info 15') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 15 Info</strong><br>
		You can chop down wood from trees in this forest using your hatchet. Return here once you have accumulated 20 pieces.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 15') 
{	if ($quest15 == 1 && $wood >= 20)
	{	echo $message="<div class='questWin'>
		<h3>Quest 15 Completed!</h3>
		<h4>New Tree Hut Door</h4>
		Congrats! You hand 20 wood over to the Tree Gnome. He can now build a new door. He rewards you with some leather and an iron hatchet! This hatchet is stronger than your current one and you can now chop down trees more efficiently! 
	  	<h4>Rewards</h4>
  	  	[ + 300 xp  ]<br />
      	[ + 300 $currency ]<br />
      	[ + 5 Leather ]<br />
      	[ + Iron Hatchet ]</div>";	
		include ('update_feed.php'); // --- update feed
	    $results = $link->query("UPDATE $user SET currency = currency + 300"); 
		$results = $link->query("UPDATE $user SET xp = xp + 300"); 
		$results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + 1"); 
		$results = $link->query("UPDATE $user SET leather = leather + 5"); 
		$results = $link->query("UPDATE $user SET quest15 = 2");
		$results = $link->query("UPDATE $user SET wood = wood-20");
	} 
	else if ($quest15 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 15 Not Complete</strong><br>
	To complete this quest you need to return here with 20 wood. Chop some down in this forest using your hatchet.</div>";
		include ('update_feed.php'); // --- update feed
	}  
}

// ---------------------- QUEST 16) Troll Base Camp ---------------------- //
if($input=='info 16') { 
		echo $message="<div class='menuAction'><strong class='green'>Quest 16 Info</strong><br>
		You can find Trolls guarding the gate found all the way to the north of this forest. Go defeat 3 of them.</div>";
		include ('update_feed.php'); // --- update feed
}
else if($input=='complete 16') 
{	if ($quest16 == 1 && $KLtroll >= 3)
	{	echo $message="<div class='questWin'>
		<h3>Quest 16 Completed!</h3>
		<h4>Troll Base Camp</h4>
		Congrats! You have defeated 3 Trolls! The Gnome hands you a fresh pair of Troll Gloves as a reward!
	  	<h4>Rewards</h4>
  	  	[ + 600 xp  ]<br />
      	[ + 300 $currency ]<br />
      	[ + Troll Gloves ]
		</div>";	
		include ('update_feed.php'); // --- update feed
	    $results = $link->query("UPDATE $user SET currency = currency + 300"); 
		$results = $link->query("UPDATE $user SET xp = xp + 600"); 
		$results = $link->query("UPDATE $user SET trollgloves = trollgloves + 1"); 
		$results = $link->query("UPDATE $user SET quest16 = 2");
	} 
	else if ($quest16 == 1)
	{	echo $message="<div class='menuAction'><strong class='green'>Quest 16 Not Complete</strong><br>
		To complete this quest you need to slay 3 Trolls. The guard the entrance to the Dark Forest. Go north of here to find them.</div>";
		include ('update_feed.php'); // --- update feed
	}  
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
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc127'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 127"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc126'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 126"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc132'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 132"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
