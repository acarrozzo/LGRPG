<?php
						$roomname = "The Forest Teleport";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc121'];
//$dangerLVL = $_SESSION['dangerLVL'] = "5-13"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   
	
$teleport4 = $row['teleport4'];
	
// -------------------------------------------------------------------------- Activate Forest Teleport
if ($row['teleport4'] == 0) { 	
	$results = $link->query("UPDATE $user SET teleport4 = 1");
	echo $message="<i>You can now teleport to the Forest! Click 'Forest' in your teleport menu to teleport to this location at any time. </i><br/>";
	include ('update_feed.php'); // --- update feed	  
	}

include ('battle-sets/forest.php');
include ('function-choptree.php');



// -------------------------------------------------------------------------- READ SIGN!
if($input=='read sign') { 
   echo '<i>You read the Forest Directory</i> <br>  ';
   	$message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>Forest <i>Directory</i></h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
---------------------------------------------------<br>
<span class='direc'><input type='submit' name='input1' value='north' /></span> <span class='hilight'>Gold Chest</span> <i>Hunter Bill has the Key</i><br />
<span class='direc'><input type='submit' name='input1' value='west' /></span> <span class='hilight'>Large Clearing</span> <i>Not much else</i> <br />
<span class='direc'><input type='submit' name='input1' value='east' /></span> <span class='hilight'>Abandoned Campsite</span> <i>Bend in the River</i><br />
<span class='direc'><input type='submit' name='input1' value='south' /></span> <span class='hilight'>Forest Gnome</span> <i>Quests 14-16</i> <br />
---------------------------------------------------<br>
<span class='direc'><input type='submit' name='input1' value='northwest' /></span> <span class='hilight'>Hunter Bill</span> <i>Quests 17-18 & Skills</i><br />
<span class='direc'><input type='submit' name='input1' value='southwest' /></span> <span class='hilight'>Forest EXIT</span> <i>Stone Path</i><br />
<span class='direc'><input type='submit' name='input1' value='southeast' /></span> <span class='hilight'>Forest Lake</span> <i>Path to Dark Forest Gate</i><br />
---------------------------------------------------<br>
</form>
</div>";
	include ('update_feed.php'); // --- update feed	
}

if($input=='read signOLD') {  //read sign OLDDDDDDDDD
   	echo	$message="<i>you read the sign:</i> <br />
-------------------------------------------<br />
FOREST DIRECTORY<br/>
N - Gold Chest<br/>
E - Abandoned Campsite<br/>
SE - Forest Lake<br/>
S- South Forest<br/>
SW - Forest EXIT<br/>
W- Large Clearing<br/>
NW - Hunter Bill - Quests and Skills<br/>
-------------------------------------------</p>";
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
   $message="<i>You travel west</i></br>".$_SESSION['desc117'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 117"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='nw' || $input=='northwest') 
{	echo 'You travel northwest<br/>';
   $message="<i>You travel northwest</i></br>".$_SESSION['desc118'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 118"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='n' || $input=='north') 
{	echo 'You travel north<br/>';
   $message="<i>You travel north</i></br>".$_SESSION['desc120'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 120"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='e' || $input=='east') 
{	echo 'You travel east<br/>';
   $message="<i>You travel east</i></br>".$_SESSION['desc130'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 130"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='se' || $input=='southeast') 
{	echo 'You travel southeast<br/>';
   $message="<i>You travel southeast</i></br>".$_SESSION['desc131'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 131"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
   $message="<i>You travel south</i></br>".$_SESSION['desc122'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 122"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
   $message="<i>You travel southwest</i></br>".$_SESSION['desc116'];
	 include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 116"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
// ----------------------------------- end of room function
include ('function-end.php');
}
?>