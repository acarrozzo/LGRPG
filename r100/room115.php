<?php
// -- 115 -- Kobold Lair
$roomname = "Kobold Lair";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc115'];
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
else if($input=='read signOLD') {  //read sign
   echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
Magical Kobolds Below!</br>
-------------------------------------------</p>";
	include ('update_feed.php'); // --- update feed	

}

// -------------------------------------------------------------------------- READ SIGN!
else if($input=='read sign') {  //read sign
   
   echo '   <i>You read the sign</i> <br>  ';

   
   	$message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Magical Kobold's Below! <i></i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
---------------------------------------------------</br>
<span class='direc'><input type='submit' name='input1' value='down' /></span> <span class='hilight'>Kobold Lair</span><br>
---------------------------------------------------<br>
<span class='hilight'>The enemies below generally drop MAGIC increasing equipment.</span><br/>
---------------------------------------------------<br>
<span class='hilight'>Defeat the Kobold Master to join the Wizard's Guild.</span><br>
---------------------------------------------------<br>
</form>
</div>
";
	include ('update_feed.php'); // --- update feed	

}
// -------------------------------------------------------------------------- TRAVEL


else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc114'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 114"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc112'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 112"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
else if($input=='d' || $input=='down') 
{	echo 'You travel down<br/>';
   $message="<i>You travel down</i></br>".$_SESSION['desc115a'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = '115a'"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>
