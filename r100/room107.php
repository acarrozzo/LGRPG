<?php
// -- 107 -- Red Town Gate
$roomname = "Gate to Red Town";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc107'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

	$KLogre=$row['KLogre']; 
	$KLorc=$row['KLorc']; 


include ('battle-sets/forest-path.php'); 

	
// -------------------------------------------------------------------------- ROOM ACTIONS

// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') {  //read sign
   
   echo '   <i>You read the Sign by the Gate to Red Town</i> <br>  ';

   
   	$message="
   <i>you read the sign:</i>   
   <div class='sign'>
   	<form id='mainForm' method='post' action='' name='formInput'>
<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight px18'>Red Town</span><br>
Lots o' Quests, Guilds, Shops, Skills, Spells & more.<br>
---------------------------------------------------<br>
<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='hilight px18'>Ogre Lair</span><br>
You need to defeat the Ogre Lieutenant to join the Warrior's Guild.<br>
---------------------------------------------------<br>
</form>
</div>
";
	include ('update_feed.php'); // --- update feed	

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

else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc108'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 108"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}

else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc106'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 106"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='s' || $input=='south') 
{	
	//if ($KLogre >= 1 || $KLorc >= 1)
	if (1==1)
	{

	echo 'You travel south<br/>';
 	$message="<i>You travel south</i><br/>".$_SESSION['desc201'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = 201"); // -- room change
	}
	else
	{
	echo 'As you attempt to pass the Red Gate you are stopped by a Guard. Kill an Orc or Ogre first he says.<br/>';
 	$message="<i>A Red Guard stops you from entering. You need to prove your worth by killing an Orc or Ogre in the cave west of here. </i><br/>";
	include ('update_feed.php'); // --- update feed	
		
	}
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
