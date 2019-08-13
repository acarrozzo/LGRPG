<?php
						$roomname = "Michael's Weapon Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc227'];
//$dangerLVL = $_SESSION['dangerLVL'] = "1"; // danger level

include ('function-start.php'); 

// -------------------------DB CONNECT!
include ('db-connect.php');  
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   

include ('battle-sets/thief.php');



if($input=='buy gladius') 
{	
	$tempCOST = $_SESSION['COSTgladius'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a gladius for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gladius = gladius + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy three-chained flail') 
{	
	$tempCOST = $_SESSION['COSTthreechainedflail'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a three-chained flail for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET threechainedflail = threechainedflail + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy giant club') 
{	
	$tempCOST = $_SESSION['COSTgiantclub'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a giant club for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET giantclub = giantclub + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy great white sword') 
{	
	$tempCOST = $_SESSION['COSTgreatwhitesword'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a great white sword for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greatwhitesword = greatwhitesword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy guardian blade') 
{	
	$tempCOST = $_SESSION['COSTguardianblade'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a guardian blade for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET guardianblade = guardianblade + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}

if($input=='buy claymore') 
{	
	$tempCOST = $_SESSION['COSTclaymore'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a claymore for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET claymore = claymore + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy polearm') 
{	
	$tempCOST = $_SESSION['COSTpolearm'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a polearm for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET polearm = polearm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy bone cudgel') 
{	
	$tempCOST = $_SESSION['COSTbonecudgel'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a bone cudgel for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bonecudgel = bonecudgel + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy hammer headhammer') 
{	
	$tempCOST = $_SESSION['COSThammerheadhammer'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a hammer headhammer for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET hammerheadhammer = hammerheadhammer + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy humongous battleaxe') 
{	
	$tempCOST = $_SESSION['COSThumongousbattleaxe'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a humongous battleaxe for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET humongousbattleaxe = humongousbattleaxe + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}



if($input=='buy hand crossbow') 
{	
	$tempCOST = $_SESSION['COSThandcrossbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a hand crossbow for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET handcrossbow = handcrossbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy compound crossbow') 
{	
	$tempCOST = $_SESSION['COSTcompoundcrossbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a compound crossbow for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET compoundcrossbow = compoundcrossbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy black crossbow') 
{	
	$tempCOST = $_SESSION['COSTblackcrossbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a black crossbow for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackcrossbow = blackcrossbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}

if($input=='buy off-hand dagger') 
{	
	$tempCOST = $_SESSION['COSToffhanddagger'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a off-hand dagger for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET offhanddagger = offhanddagger + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy off-hand sword') 
{	
	$tempCOST = $_SESSION['COSToffhandsword'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a off-hand sword for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET offhandsword = offhandsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy off hand mace') 
{	
	$tempCOST = $_SESSION['COSToffhandmace'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a off-hand mace for '.$tempCOST.' '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET offhandmace = offhandmace + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
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
else if($input=='ne' || $input=='northeast') 
{	echo 'You travel northeast<br/>';
   $message="<i>You travel northeast</i></br>".$_SESSION['desc210'];
	include ('update_feed.php'); // --- update feed
   $results = $link->query("UPDATE $user SET room = 210"); // -- room change
   $results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}






// ----------------------------------- end of room function
include ('function-end.php');
}
?>
