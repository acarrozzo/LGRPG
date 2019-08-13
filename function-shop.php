<?php
// --------------------------------------------------------------------------------- SHOP TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	  


// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES AGAIN
// ---------------------------------------------------------------------------------- // START VARIABLES
$room = $row['room'];
$coin = $cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughbp = $_SESSION['notenoughbp'];
$notenoughsp = $_SESSION['notenoughsp'];

// ---------------------------------------------------------------------------------- // BASIC SHOP BUY FUNCTION

if ($room == '006'){ 

if($input=='buy dagger') 
{	if($cash<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a dagger for 50 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50"); 
		}
}
if($input=='buy mace') 
{	if($cash<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a mace for 400 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mace = mace + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 400"); 
		}
}
if($input=='buy broad sword') 
{	if($cash<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a broad sword for 400 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET broadsword = broadsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 400"); 
		}
}
if($input=='buy long sword') 
{	if($cash<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a long sword for 400 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET longsword = longsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 400"); 
		}
}
if($input=='buy basic staff') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a basic staff for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basicstaff = basicstaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); 
		}
}


if($input=='buy buckler') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a buckler for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET buckler = buckler + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); 
		}
}
if($input=='buy kite shield') 
{	if($cash<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a kite shield for 400 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET kiteshield = kiteshield + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 400"); 
		}
}
if($input=='buy basic hood') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a basic hood for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basichood = basichood + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy padded armor') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some padded armor for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET paddedarmor = paddedarmor + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy black gloves') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy black gloves for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackgloves = blackgloves + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}
if($input=='buy black boots') 
{	if($cash<500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy black boots for 500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blackboots = blackboots + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 500"); 
		}
}

if($input=='buy red potion') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red potion for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redpotion = redpotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
		}
}
if($input=='buy blue potion') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue potion for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); 
		}
}

} // --- END BASIC SHOP


// ---------------------------------------------------------------------------------- // PAJAMA SHAMAN BUY FUNCTION
if ($room == '021'){ 
if($input=='buy flail') 
{	if($cash<1200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a flail for 1200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET flail = flail + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1200"); 
		}
}
if($input=='buy morning star') 
{	if($cash<1200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a morning star for 1200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET morningstar = morningstar + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1200"); 
		}
}
if($input=='buy gladius') 
{	if($cash<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a gladius for 3000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gladius = gladius + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 3000"); 
		}
}
if($input=='buy battle axe') 
{	if($cash<800) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a battle axe for 800 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battleaxe = battleaxe + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 800"); 
		}
}
if($input=='buy warhammer') 
{	if($cash<900) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a warhammer for 900 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET warhammer = warhammer + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 900"); 
		}
}
if($input=='buy claymore') 
{	if($cash<5000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a claymore for 5000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET claymore = claymore + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 5000"); 
		}
}
if($input=='buy long bow') 
{	if($cash<1500) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a long bow for 1500 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET longbow = longbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1500"); 
		}
}
if($input=='buy arrows') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 10 arrows for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET arrows = arrows + 10"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
		}
}

if($input=='buy pajamas') 
{	if($cash<700) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy pajamas for 700 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET pajamas = pajamas + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 700"); 
		}
}
if($input=='buy slippers') 
{	if($cash<700) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy slippers for 700 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET slippers = slippers + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 700"); 
		}
}
} // END 021 - PAJAMA SHAMAN

// ---------------------------------------------------------------------------------- // BROCCOLI ROB SHOP - IN 207

//








} // end while
    
	 

   