<?php
						$roomname = "Wizard's Guild Lobby";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc225b'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

$rawmeat=$row['rawmeat']; 
	$cookedmeat=$row['cookedmeat']; 
	$veggies=$row['veggies']; 
	$bluepotion=$row['bluepotion']; 
	
	$hpmax=$row['hpmax'];   
	$mpmax=$row['mpmax'];   
	$hp=$row['hp'];  	
	$mp=$row['mp'];

	
$wizardskillFlag = $row['wizardskillFlag'];


// ---------------------- SKILL FLAG! ---------------------- //
if ($wizardskillFlag==0) {
echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
You can now learn new SKILLS & SPELLS from the WIZARD'S GUILD!!</div> ";
include ('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET wizardskillFlag = 1");
}
//else {$results = $link->query("UPDATE $user SET travelingwizardFlag = 0");}




// -------------------------------------------------------------------------- ROOM ACTIONS
 
if($input=='cook all meat')  // ---- Cook Meat
{
	if ( $rawmeat == 0 )
	{	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You have no raw meat left to cook.</div>";
		include ('update_feed.php'); // --- update feed
	}
	else 
	{ 
		$times = $rawmeat;
		echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You COOK $times raw meat on the fire!</div>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET rawmeat = rawmeat - $times");
		$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + $times"); 	
	}
}
 
 
if($input=='grab veggies' )  // ---- GRAB veggies
{
	if ( $row['veggies'] >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You can't grab more than 5 veggies here. so greedy!</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab 5 veggies off the table.</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET veggies = 5");
	}
}

if($input=='grab blue potion' )  // ---- GRAB blue potion
{
	if ( $row['bluepotion'] >= 5 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You can't grab more than 5 blue potions here.</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab 5 blue potions off the table.</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET bluepotion = 5");
	}
}
// --------------------------------------------------------------------------- REST HEAL +50 MP
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax"); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 50"); 
		echo $message = "You rest at the wizard's fire and supercharge your MP!<br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
} 

	
// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   echo '   <i>You read the Wizard\'s Guild Directory</i> <br>  ';
   $message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Wizard's Guild<i>Directory</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>

<span class='direc'><input type='submit' name='input1' value='northwest' /></span> <span class='hilight'>Guild Exit</span> <i>Return to Red Town</i><br />
<span class='direc'><input type='submit' name='input1' value='northeast' /></span> <span class='hilight'>Wizard Store</span> <i>Basic Wizard Stuffs</i><br />
<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Quinn's Office</span> <i>Awesome Quest Pending</i><br />
<span class='direc'><input type='submit' name='input1' value='southeast' /></span> <span class='hilight'>Skills and Spells</span> <i>Really Awesome Spells!</i><br />
<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Morty</span> <i>Wizard Quests!!!</i><br />
<span class='direc'><input type='submit' name='input1' value='southwest' /></span> <span class='hilight'>Wizard Jeweler</span> <i>Excellent Rings for Sale.</i> <br />
---------------------------------------------------</br>
<span class='hilight'>WIZARD QUESTS</span> 
Go South to visit Morty and access his Magical Quest Set.<br/>
---------------------------------------------------
</form></div>"; include ('update_feed.php'); // --- update feed	
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
else if($input=='nw' || $input=='northwest') 
{	echo 'You travel northwest<br/>';
   $message="<i>You travel northwest</i></br>".$_SESSION['desc225a'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc225c'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225c'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc225e'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225e'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc225g'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225g'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
   $message="<i>You travel southwest</i></br>".$_SESSION['desc225f'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225f'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='e' || $input=='east')
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc225d'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '225d'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}


// ----------------------------------- end of room function
include ('function-end.php');
}
?>
