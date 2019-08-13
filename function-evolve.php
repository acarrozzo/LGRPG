<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	


$level = $row['level'];
$room = $row['room'];
$bp = $row['bp'];
$sp = $row['sp'];
$physicaltraining = $row['physicaltraining'];
$mentaltraining = $row['mentaltraining'];
$evolve = $row['evolve'];

$coin = $currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];

// --------------------------------------------------------------------------- EVOLVE!
if (($input == 'evolve' && $_SESSION['evolveAlready'] == 0 && $currency >= 10000 && ($room == '425')) || ($input == 'cheat evolve'))
	{	
		$bp = $level; 
		$sp = $level * 25;
		$evolve = $evolve + 1;
 
		echo $message = '	<div class="levelWin blackBG">
				<span class="px50 white">YOU EVOLVE!</span><br>
				<span class="px25 white">You are now evolve level '.$evolve.'</span><br>
			<span class="px20 yellow">-10,000 '.$_SESSION['currency'].'</span></span><br>
			<span class="px20 cyan">ZERO OUT STATS...</span><br>
			<span class="px20 cyan">ZERO OUT SKILLS...</span><br>
			<span class="px20 cyan">ZERO OUT SPELLS...</span><br>
			<span class="px50 blue">+ '.$sp.' SP!</span></span><br>
			<span class="px50 gold">+ '.$bp.' BP!</span></span><br>
</div>';
		include ('update_feed.php'); // --- update feed

		$results = $link->query("UPDATE $user SET bp = $bp"); 
		$results = $link->query("UPDATE $user SET sp = $sp"); 
	   	$results = $link->query("UPDATE $user SET currency = currency - 10000"); 
	   	$results = $link->query("UPDATE $user SET evolve = evolve + 1"); 
		$_SESSION['evolveAlready'] = 1;
		// --------------------------------------------------------------------------- ZERO STATS!
	   	$results = $link->query("UPDATE $user SET str = 0"); 
	   	$results = $link->query("UPDATE $user SET dex = 0"); 
	   	$results = $link->query("UPDATE $user SET mag = 0"); 
	   	$results = $link->query("UPDATE $user SET def = 0"); 
	   	$results = $link->query("UPDATE $user SET strmod = 0"); 
	   	$results = $link->query("UPDATE $user SET dexmod = 0"); 
	   	$results = $link->query("UPDATE $user SET magmod = 0"); 
	   	$results = $link->query("UPDATE $user SET defmod = 0"); 
		// --------------------------------------------------------------------------- ZERO SKILLS!
	   	$results = $link->query("UPDATE $user SET onehanded = 0"); 
	   	$results = $link->query("UPDATE $user SET twohanded = 0"); 
	   	$results = $link->query("UPDATE $user SET ranged = 0"); 
	   	$results = $link->query("UPDATE $user SET warcraft = 0"); 
	   	$results = $link->query("UPDATE $user SET toughness = 0"); 
	   	$results = $link->query("UPDATE $user SET block = 0"); 
	   	$results = $link->query("UPDATE $user SET ddge = 0"); 
	   	$results = $link->query("UPDATE $user SET slice = 0"); 
	   	$results = $link->query("UPDATE $user SET smash = 0"); 
	   	$results = $link->query("UPDATE $user SET aim = 0"); 
	   	$results = $link->query("UPDATE $user SET multiarrow = 0"); 
	   	$results = $link->query("UPDATE $user SET boltupgrade = 0"); 
	   	$results = $link->query("UPDATE $user SET magicstrike = 0"); 
		// --------------------------------------------------------------------------- ZERO SPELLS!
	   	$results = $link->query("UPDATE $user SET fireball = 0"); 
	   	$results = $link->query("UPDATE $user SET frostball = 0"); 
	   	$results = $link->query("UPDATE $user SET poisondart = 0"); 
	   	$results = $link->query("UPDATE $user SET atomicblast = 0"); 
	   	$results = $link->query("UPDATE $user SET heal = 0"); 
	   	$results = $link->query("UPDATE $user SET regenerate = 0"); 
	   	$results = $link->query("UPDATE $user SET antidote = 0"); 
	   	$results = $link->query("UPDATE $user SET unlck = 0"); 
	   	$results = $link->query("UPDATE $user SET ironskin = 0"); 
	   	$results = $link->query("UPDATE $user SET magicarmor = 0"); 
	   	$results = $link->query("UPDATE $user SET wings = 0"); 
	   	$results = $link->query("UPDATE $user SET gills = 0"); 
		$results = $link->query("UPDATE $user SET equipR = 'fists'");
		// --------------------------------------------------------------------------- ZERO EQUIP!
$results = $link->query("UPDATE $user SET equipL = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipHead = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipBody = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipHands = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipFeet = '<span> - - - </span>'");

$results = $link->query("UPDATE $user SET equipRing1 = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipRing2 = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipNeck = '<span> - - - </span>'");

$results = $link->query("UPDATE $user SET equipPet = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipComp = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipMount = '<span> - - - </span>'");
$results = $link->query("UPDATE $user SET equipArtifact = '<span> - - - </span>'");

$results = $link->query("UPDATE $user SET weapontype = 0");

}
else if ( $input == 'evolve' && $currency < 10000) {echo $message=$toopoor;include ('update_feed.php');}

else if ( $input == 'evolve' && $_SESSION['evolveAlready'] >= 1 )
{
	echo $message= "<span class='px20'>You can't evolve again until you Level up. Come back later.</span>";
 	include ('update_feed.php'); // --- update feed
	}

else { 
	echo $message='You no evolve.';
 	include ('update_feed.php'); // --- update feed
	}
 

 
// --------------------------------------------------------------------------- BP RESET !




// --------------------------------------------------------------------------- SP RESET !


}



?>