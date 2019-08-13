<?php
$roomname = "Pajama Shaman";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc021'];

include ('function-start.php'); 
//include ('function-buy.php'); 
//include ('shop-skills/pajamashaman.php'); 
//include ('shop-spells/pajamashaman.php'); 


// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 


$pajamashamanFlag = $row['pajamashamanFlag'];


// ---------------------- SPELL FLAG! ---------------------- 
if ($pajamashamanFlag==0) {
echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
The Pajama Shaman gives you a crash course in Magic! You can now learn the <em class='red'>FIREBALL</em> and <em class='green'>HEAL</em> spell!</span></div> ";
include ('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET pajamashamanFlag = 1");
}
//else {$results = $link->query("UPDATE $user SET pajamashamanFlag = 0");}




// -------------------------------------------------------------------------- READ SKILL SIGN!
if($input=='read sign') {  //read sign
   
   echo '   <i>You read the Pajama Shaman Sign</i> <br>  ';

   
   	$message="
   <i>you read the sign:</i>   
   <div class='sign'>
   <h3>SKILLS</h3>
   	<form id='mainForm' method='post' action='' name='formInput'>
<span class='hilight'>You gain SP every time you level.</span> <br>
Use SP to learn skills and spells.<br>
---------------------------------------------------</br>
<span class='hilight'>Physical Training and Mental Training are important.</span><br>
Physical Training increases the amount of Hit Points you gain when you level. The same goes for Mental Training and Mana Points. For this reason it is advised to learn as early as possible.<br/>
---------------------------------------------------<br/>
<span class='hilight'>Rest up $username!</span> <br>
When you rest you will restore lost HP and MP. The amount you restore is determined by your Physical Training and Mental Training skill.<br>
</form>
</div>
";
	include ('update_feed.php'); // --- update feed	

}



// -------------------------------------------------------------------------- TRAVEL
if($input=='w' || $input=='west') 
{	echo 'You travel west<br/>';
 	$message="<i>You travel west</i><br/>".$_SESSION['desc005'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '005'"); // -- room change
}
else if($input=='sw' || $input=='southwest') 
{	echo 'You travel southwest<br/>';
 	$message="<i>You travel southwest</i><br/>".$_SESSION['desc001'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
}
else if($input=='s' || $input=='south') 
{	echo 'You travel south<br/>';
 	$message="<i>You travel south</i><br/>".$_SESSION['desc006'];
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET room = '006'"); // -- room change
}



// ----------------------------------- end of room function
include ('function-end.php');
}
?>
