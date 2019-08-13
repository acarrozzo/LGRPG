<?php
// -- 0028 -- Bat Cave Entrance
$roomname = "Bat Cave Entrance";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc028'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level


include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 

if($input=='read signOLD') {  //read sign
   echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
The bats in this cave fly out of range of your normal weapons. You will need to equip a ranged weapon like a boomerang or bow to hit them. The damage you do is based on your dexterity [DEX], unlike swords where the damage is based on Strength [STR]. When you fight other creatures like salamanders or goblins you can equip any type of weapon including ranged. but 1h or 2h weapons will generally do more damage.<br/>  
-------------------------------------------</br>";
	include ('update_feed.php'); // --- update feed	
}


// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   
   echo '   <i>You read the Bat Cave Entrance sign.</i> <br>  ';

   
   	$message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Bat Cave <i>Entrance</i></h3>
---------------------------------------------------</br>
The bats in this cave fly out of range of your normal melee weapons.<br>
---------------------------------------------------</br>
 <span class='gold px25'>Equip a ranged weapon</span> like a boomerang or bow to hit them. <br>
---------------------------------------------------</br>
The damage you do with ranged weapons is based on your dexterity<span class='gold'> [DEX]</span><br>
---------------------------------------------------</br>
So get your boomerang in hand and head on down into the cave!
</div>
";
	include ('update_feed.php'); // --- update feed	

}












// -------------------------------------------------------------------------- TRAVEL
else if($input=='ne' || $input=='northeast') 
{
	echo 'You travel northeast<br/>';
	$message="<i>You travel northeast</i><br/>".$_SESSION['desc026'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '026'"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
	}
	
else if($input=='e' || $input=='east') 
{
	echo 'You travel east<br/>';
	$message="<i>You travel east</i><br/>".$_SESSION['desc027'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '027'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{
	echo 'You travel down<br/>';
	$message="<i>You travel down</i><br/>".$_SESSION['desc028b'];
	include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028b'"); // -- room change
  	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');

}

?>
