<?php
// -- 111 -- Ogre Cave
$roomname = "Ogre Cave";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc111'];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   




if (1!=1) {} //nada

// -------------------------------------------------------------------------- ROOM ACTIONS

// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   echo '<i>You read the sign</i> <br>  ';
   	$message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Ogre's Below! <i></i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
---------------------------------------------------</br>
<span class='direc'><input type='submit' name='input1' value='down' /></span> <span class='hilight'>Ogre Lair</span><br>
---------------------------------------------------<br>
<span class='hilight'>The enemies below generally drop STR & DEF increasing equipment.</span><br/>
---------------------------------------------------<br>
<span class='hilight'>Defeat the Ogre Lieutenant to join the Warrior's Guild.</span><br>
---------------------------------------------------<br>
</form>
</div>
";
	include ('update_feed.php'); // --- update feed	

}

// -------------------------------------------------------------------------- TRAVEL


else if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
   $message="<i>You travel west</i></br>".$_SESSION['desc109'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 109"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc107'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 107"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{	echo 'You travel down<br/>';
   $message="<i>You travel down</i></br>".$_SESSION['desc111a'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '111a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
