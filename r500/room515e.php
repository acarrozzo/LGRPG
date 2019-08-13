<?php
						$roomname = "Ranger Shop";
$lookdesc = $_SESSION['lookdesc'] = $_SESSION['desc515e'];

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
	
	$hpmax=$row['hpmax'];   
	$mpmax=$row['mpmax'];   
	$hp=$row['hp'];  	
	$mp=$row['mp'];

 
$reds=$row['reds']; 
$greens=$row['greens']; 
$blues=$row['blues']; 
$yellows=$row['yellows']; 
$redbalm=$row['redbalm']; 
$bluebalm=$row['bluebalm']; 

// ---------------------- SKILL FLAG! ---------------------- // -- move to other room (shop)

$rangerskillFlag = $row['rangerskillFlag'];
// ---------------------- SKILL FLAG! ---------------------- //
if ($rangerskillFlag==0) {
echo  $message = "<div class='menuAction'><i span class='fa fa-check-square-o'></i>
You can now learn new SKILLS from the RANGER'S GUILD!!</div> ";
include ('update_feed.php'); // --- update feed
$results = $link->query("UPDATE $user SET rangerskillFlag = 1");
}



 
 
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
 


 

// --------------------------------------------------------------------------- REST HEAL
if ($input=="rest"){
		$query = $link->query("UPDATE $user SET hp = $hpmax + 75 "); 
		$query = $link->query("UPDATE $user SET mp = $mpmax + 75 "); 
		echo $message = "You rest at the Ranger's Guild! (+75 HP, +75 MP)<br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
}



// ------------------------------  MASTER PACK

if($input=='grab master pack')  // ---- GRAB Master Pack
{
	if ( $arrows >= 25 )
	{
	echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have more than 100 arrows!</div>";
	include ('update_feed.php'); // --- update feed
	}
	else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You grab a bundle of arrows! [ +100 arrows ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET arrows = 25");
	}
			
			if ( $reds== 3 )	// ------------------------------  reds
	{ echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have some reds.</div>";
	include ('update_feed.php'); // --- update feed
	} else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>[ +3 reds ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET reds = 3");
	}
			if ( $greens== 3 )	// ------------------------------  greens
	{ echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have some greens.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>[ +3 greens ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	$results = $link->query("UPDATE $user SET greens = 3");
	}
			if ( $blues== 3 )	// ------------------------------  blues
	{ echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have some blues.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>[ +3 blues ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	$results = $link->query("UPDATE $user SET blues = 3");
	}
			if ( $yellows== 3 )	// ------------------------------  yellows
	{ echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have some yellows.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>[ +3 yellows ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	$results = $link->query("UPDATE $user SET yellows = 3");
	}
			if ( $redbalm== 3 )	// ------------------------------  red balm
	{ echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have red balms.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>[ +3 red balms ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	$results = $link->query("UPDATE $user SET redbalm = 3");
	}
			if ( $bluebalm== 3 )	// ------------------------------  blue balm
	{ echo $message="<div class='menuAction'><i class='fa fa-times-circle lightred'></i>You already have blue balms.</div>";
	include ('update_feed_alt.php'); // --- update feed
	} else { echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>[ +3 blue balms ]</div>";
	include ('update_feed_alt.php'); // --- update feed
	$results = $link->query("UPDATE $user SET bluebalm = 3");
	}
}
 
 


// --------------------------------------------------------------------------- RANGER SHOP - BUY FUNCTIONS
if($input=='buy mithril boomerang') 
{	$tempCOST = $_SESSION['COSTmithrilboomerang'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a mithril boomerang for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mithrilboomerang = mithrilboomerang + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy mithril bow') 
{	$tempCOST = $_SESSION['COSTmithrilbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a mithril bow for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mithrilbow = mithrilbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy mithril crossbow') 
{	$tempCOST = $_SESSION['COSTmithrilcrossbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a mithril crossbow for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mithrilcrossbow = mithrilcrossbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}

if($input=='buy black boomerang') 
{	$tempCOST = $_SESSION['COSTblackboomerang'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a black boomerang for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackboomerang = blackboomerang + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy black bow') 
{	$tempCOST = $_SESSION['COSTblackbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a black bow for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackbow = blackbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy black crossbow') 
{	$tempCOST = $_SESSION['COSTblackcrossbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a black crossbow for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackcrossbow = blackcrossbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}

if($input=='buy ranger bow') 
{	$tempCOST = $_SESSION['COSTrangerbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a ranger bow for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangerbow = rangerbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy ranger crossbow') 
{	$tempCOST = $_SESSION['COSTrangercrossbow'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a ranger crossbow for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangercrossbow = rangercrossbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}

if($input=='buy ranger hood') 
{	$tempCOST = $_SESSION['COSTrangerhood'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a ranger hood for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangerhood = rangerhood + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy ranger cloak') 
{	$tempCOST = $_SESSION['COSTrangercloak'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a ranger cloak for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangercloak = rangercloak + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy ranger gloves') 
{	$tempCOST = $_SESSION['COSTrangergloves'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a pair of ranger gloves for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangergloves = rangergloves + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy ranger boots') 
{	$tempCOST = $_SESSION['COSTrangerboots'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a pair of ranger boots for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangerboots = rangerboots + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}
if($input=='buy ranger amulet') 
{	$tempCOST = $_SESSION['COSTrangeramulet'] ;
	if($cash<$tempCOST) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy a ranger amulet for '.$tempCOST.' '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET rangeramulet = rangeramulet + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - $tempCOST"); 
		}
}

if($input=='buy 100 arrows') 
{	if($cash<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy 100 arrows for 1000 '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET arrows = arrows + 100"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1000"); 
		}
}
if($input=='buy 100 bolts') 
{	if($cash<2000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = '<div class="buybox">You buy 100 bolts for 2000 '.$currency.'!</div>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bolts = bolts + 100"); 
		$query = $link->query("UPDATE $user SET currency = currency - 2000"); 
		}
}

/*
armor
30k ranger hood ( +25 dex )		// dark ranger
30k ranger cloak ( +25 dex )		// dark ranger
20k ranger gloves ( +15 dex )		// dark ranger
20k ranger boots ( +15 dex )		// dark ranger
50k ranger amulet ( +25 dex, +5 mag )	// griffin, buy

ammo 
1k arrows x100
2k bolts x100


weapons
50k mithril boomerang ( +40 dex )		// grey gargoyle
75k mithril bow ( +60 dex  )			// stone sphinx
100k mithril crossbow ( +80 dex )		// fallen angel
200k black boomerang ( +60 dex, +10 mag )   	// black bear 
250k black bow ( +120 dex, +40 mag )  		// mage ultima
300k black crossbow ( +150 dex, +50 def ) 	// lizard king
100k ranger bow ( +50 dex, +25 mag ) 		// guild reward
500k ranger crossbow ( +250 dex  )		// buy 

*/





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
{			echo 'You travel northeast<br/>';
   	$message="<i>You travel northeast</i></br>".$_SESSION['desc515b'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '515b'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='e' || $input=='east') 
{			echo 'You travel east<br/>';
   	$message="<i>You travel east</i></br>".$_SESSION['desc515a'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '515a'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='se' || $input=='southeast') 
{			echo 'You travel southeast<br/>';
   	$message="<i>You travel southeast</i></br>".$_SESSION['desc515d'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '515d'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}
else if($input=='d' || $input=='down') 
{			echo 'You exit the Ranger\'s Guild<br/>';
   	$message="<i>You exit the Ranger's Guild</i></br>".$_SESSION['desc515'];
				include ('update_feed.php'); // --- update feed
   			$results = $link->query("UPDATE $user SET room = '515'"); // -- room change
   			$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
   $_SESSION['emptytree'] = 0; // reset tree
}




// ----------------------------------- end of room function
include ('function-end.php');
}
?>