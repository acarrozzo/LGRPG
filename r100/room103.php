<?php
// -- 103 -- Freddie's Cow Farm & Leather Factory
$roomname = "Freddie's Cow Farm";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc103'];
$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

	$cash = $row['currency'];
	$quest10=$row['quest10']; 

	$hammer=$row['hammer']; 

	$leatherhood=$row['leatherhood']; 
	$leatherhelmet=$row['leatherhelmet']; 
	$leathervest=$row['leathervest']; 
	$leatherarmor=$row['leatherarmor']; 
	$leathergloves =$row['leathergloves']; 
	$leatherboots=$row['leatherboots']; 



// -------------------------------------------------------------------------- START QUESTS - 10 
if($input=='start 10' || $input=='start quest 10') 
{
	if ($quest10 <=1) {	
		echo $message = "<div class='menuAction'><em class='gold'>You start Freddie's Quest (Quest 10)</em><br>Check your Quests tab to review what needs to be done.</div> ";
		
		include ('update_feed.php'); // --- update feed
   		$results = $link->query("UPDATE $user SET quest10 = 1"); // -- room change
	  	}  
}


// -------------------------------------------------------------------------- QUEST 10) Craft with Leather
if($input=='info 10') { 
echo $message="<div class='menuAction'><strong class='green px30'>Quest 10 Info</strong><br>You can craft leather equipment using the CRAFT interface with a Crafting Table built. Collect Leather from the cows to the north. You have to pay a 50 $currency toll each time you want to enter and can only collect a maximum of 5 leather here.</div>";
		include ('update_feed.php'); // --- update feed
		}
else if($input=='complete 10') 
{
	if ((	$leatherhood >= 1 ||
				$leatherhelmet >= 1 ||
				$leathervest >= 1 ||
				$leatherarmor >= 1 ||
				$leathergloves >= 1 ||
				$leatherboots >= 1) && $quest10 == 1)
	 {
		echo $message="
		<div class='questWin'><h3>Quest 10 Completed!</h3>
		<h4>Craft with Leather</h4>
		Congrats! You have crafted some leather equipment. Feel free to visit and collect more leather anytime you wish. To collect more than 5 leather head into the forest and hunt some animals.
		<h4>Rewards</h4>
  	  	[ + 100 xp  ]<br />
      	[ + 100 $currency ]<br />
      	[ + 50 Arrows ]<br />
      	[ + 10 Leather! ]<br />
      	[ + 3 Red Potions! ]</div>";
		
	   	include ('update_feed.php'); // --- update feed
		 $results = $link->query("UPDATE $user SET currency = currency + 100"); 
		$results = $link->query("UPDATE $user SET xp = xp + 100"); 
		$results = $link->query("UPDATE $user SET arrows = arrows + 50");
		$results = $link->query("UPDATE $user SET leather = leather + 10");
		$results = $link->query("UPDATE $user SET redpotions = redpotions + 3");
		$results = $link->query("UPDATE $user SET quest10 = 2");
	} 
	else if ($quest10 == 1)
	 {
		echo $message="<div class='menuAction'><strong class='green px30'>Quest 10 Not Complete</strong><br>You need to craft a single piece of Leather Equipment. Go north to harvest leather from Freddie's cows and then craft some equipment.</div>";
	   	include ('update_feed.php'); // --- update feed
	 } 	 
}





















// -------------------------------------------------------------------------- ROOM ACTIONS
else if($input=='get hammer') 
{
	if ($hammer >= 1)
	 {
		echo 'You already have a hammer. If you lose it come back here for another free one<br/>';
	   	$message="<i>You already have a hammer. If you lose it come back here for another one.</i></br>";
		include ('update_feed.php'); // --- update feed
	 }
	else
	 {	 
   	echo 'You pick up a hammer and put it in your inventory<br/>';
   	$message="You pick up a hammer and put it in your inventory</br>";
	include ('update_feed.php'); // --- update feed
  	$results = $link->query("UPDATE $user SET hammer = hammer + 1");
	 }
}  


else if ($input == 'pay toll')
{
	if ($cash < 50) {
		echo $message="<div class='menuAction'><i class='fa fa-times lightred'></i>You don't have 50 $currency to pay the toll.</div>";	
		include ('update_feed.php'); // --- update feed	
	}
	else if ($_SESSION['cowtoll'] == 1) {
		echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up''></i>You already paid the toll. Go north and get yourself some leather.</div>";	
		include ('update_feed.php'); // --- update feed	
	}
	else {echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up'></i>You give Freddie 50 $currency. You can now enter the Cow Farm!</div>";
	include ('update_feed.php'); // --- update feed
	$query = $link->query("UPDATE $user SET currency = currency - 50"); 
	$_SESSION['cowtoll'] = 1;
	}
}




// -------------------------------------------------------------------------- TRAVEL
else if($input=='n' || $input=='north') 
{
	if ($_SESSION['cowtoll'] != 1) 
	{ 
	echo "You need to pay the toll of 50 $currency to enter the cow farm<br/>";
	$message='<i>You need to pay the toll of 50 '.$currency.' to enter the cow farm.</i><br/>';
	include ('update_feed.php'); // --- update feed
   	
	}
	else {
	echo 'You travel north and enter the Cow Farm<br/>';
	$message="<i>You travel north and enter the Cow Farm</i><br/>".$_SESSION['desc103b'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '103b'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	$_SESSION['cowtoll'] = 0;
	}
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
 	$message="<i>You travel south</i><br/>".$_SESSION['desc102'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 102"); // -- room change
	$_SESSION['cowtoll'] = 0;
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
