<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	

	
	$wood=$row['wood']; 
	$woodtotal = $wood + 1;
	$woodtotal2 = $wood + 2;
	$woodtotal4 = $wood + 4;
	$woodtotal6 = $wood + 6;
	//$ironhatchet=$row['ironhatchet']; 

$_SESSION['emptytree']; // tree empty if 1


//chop tree		1/3 chance the tree doesn't have any more wood

//- you chop the tree [ +1 wood ]  (+2 w/ iron hatchet)  (1/100 chance of breaking)
//- you can't get any more wood from this tree. Move to a different part of the forest.

 		$hatchet=$row['hatchet']; 
	$ironhatchet=$row['ironhatchet']; 
	$steelhatchet=$row['steelhatchet']; 
	$mithrilhatchet=$row['mithrilhatchet']; 
	



// -------------------------------------------------------------------------- chop tree
if($input=='chop tree') 
{	
	

	if ($hatchet <=0 && $ironhatchet <=0) {
	echo "You don't have a hatchet to chop the tree with<br/>";
	$message="<i>You don't have a hatchet to chop the tree with. You can grab one from Jack Lumber or the Tree Gnome.</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
	else if ($_SESSION['emptytree'] == 1 || $_SESSION['emptytree'] == 99)
	{
	echo $message="<div class='menuAction'><i class='fa fa-times red'></i>This tree has no more wood!</div>";
	include ('update_feed.php'); // --- update feed
	//$_SESSION['emptytree'] = 99;
	}
	
	
	else if ($mithrilhatchet >= 1) { // ---------------------------------------------------- MITHRIL HATCHET
	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You chop down some wood with your mithril hatchet [ wood + 6 = $woodtotal6 ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET wood = wood + 6");
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		$hatchetbreak = rand (1,50); // hatchet break 1/50
		if ($hatchetbreak == 1) {
			echo "O NO! As you swing your mithril hatchet it breaks apart in your hands! [ -1 mithril hatchet ] ";
		$message="<i>O NO! As you swing your mithril hatchet it breaks apart in your hands! [ -1 mithril hatchet ] </i><br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET mithrilhatchet = mithrilhatchet - 1");	
		}
	$_SESSION['emptytree'] = rand (1,3); // exaust tree 1/3
	if ($_SESSION['emptytree'] == 1) // run out of wood message
	{
	echo $message="<div class='menuAction'><i class='fa fa-times red'></i>This tree has run out of wood!</div>";
	include ('update_feed_alt.php'); // --- update feed
	$_SESSION['emptytree'] = 99;
	}	
	}
	
		
	else if ($steelhatchet >= 1) { // ---------------------------------------------------- STEEL HATCHET
	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You chop down some wood with your steel hatchet [ wood + 4 = $woodtotal4 ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET wood = wood + 4");
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		$hatchetbreak = rand (1,50); // hatchet break 1/50
		if ($hatchetbreak == 1) {
			echo "O NO! As you swing your steel hatchet it breaks apart in your hands! [ -1 steel hatchet ] ";
		$message="<i>O NO! As you swing your steel hatchet it breaks apart in your hands! [ -1 steel hatchet ] </i><br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET steelhatchet = steelhatchet - 1");	
		}
	$_SESSION['emptytree'] = rand (1,3); // exaust tree 1/3
	if ($_SESSION['emptytree'] == 1) // run out of wood message
	{
	echo $message="<div class='menuAction'><i class='fa fa-times red'></i>This tree has run out of wood!</div>";
	include ('update_feed_alt.php'); // --- update feed
	$_SESSION['emptytree'] = 99;
	}	
	}
	
	
	
	else if ($ironhatchet >= 1) { // ---------------------------------------------------- IRON HATCHET
	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You chop down some wood with your iron hatchet [ wood + 2 = $woodtotal ]</div>";
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET wood = wood + 2");
   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		$hatchetbreak = rand (1,50); // hatchet break 1/50
		if ($hatchetbreak == 1) {
			echo "O NO! As you swing your iron hatchet it breaks apart in your hands! [ -1 iron hatchet ] ";
		$message="<i>O NO! As you swing your iron hatchet it breaks apart in your hands! [ -1 iron hatchet ] </i><br/>";
		include ('update_feed.php'); // --- update feed
		$results = $link->query("UPDATE $user SET ironhatchet = ironhatchet - 1");	
		}
	$_SESSION['emptytree'] = rand (1,3); // exaust tree 1/3
	if ($_SESSION['emptytree'] == 1) // run out of wood message
	{
	echo $message="<div class='menuAction'><i class='fa fa-times red'></i>This tree has run out of wood!</div>";
	include ('update_feed_alt.php'); // --- update feed
	$_SESSION['emptytree'] = 99;
	}	
	}
	
	
	
	else if ($hatchet >= 1) { // ---------------------------------------------------- HATCHET
	echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You chop down some wood with your hatchet [ wood + 1 = $woodtotal ]</div>";
	
	include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET wood = wood + 1");
	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight
		

	
		$hatchetbreak = rand (1,50); // hatchet break 1/50
		if ($hatchetbreak == 1) {
			if ($mithrilhatchet >= 1) {
				echo "O NO! As you swing your mithril hatchet it breaks apart in your hands! [ -1 mithril hatchet ] ";
				echo $message=  "<div class='menuAction'><i class='fa fa-times red'></i>O NO! As you swing your mithril hatchet it breaks apart in your hands! [ -1 mithril hatchet ] </div>";
				include ('update_feed.php'); // --- update feed
				$results = $link->query("UPDATE $user SET mithrilhatchet = mithrilhatchet - 1");	
			}
			if ($steelhatchet >= 1) {
				echo "O NO! As you swing your steel hatchet it breaks apart in your hands! [ -1 steel hatchet ] ";
				echo $message=  "<div class='menuAction'><i class='fa fa-times red'></i>O NO! As you swing your steel hatchet it breaks apart in your hands! [ -1 steel hatchet ] </div>";
				include ('update_feed.php'); // --- update feed
				$results = $link->query("UPDATE $user SET steelhatchet = steelhatchet - 1");	
			}
			if ($ironhatchet >= 1) {
				echo "O NO! As you swing your iron hatchet it breaks apart in your hands! [ -1 iron hatchet ] ";
				echo $message=  "<div class='menuAction'><i class='fa fa-times red'></i>O NO! As you swing your iron hatchet it breaks apart in your hands! [ -1 iron hatchet ] </div>";
				include ('update_feed.php'); // --- update feed
				$results = $link->query("UPDATE $user SET ironhatchet = ironhatchet - 1");	
			}
			if ($hatchet >= 1) {
				echo "O NO! As you swing your hatchet hatchet it breaks apart in your hands! [ -1 hatchet ] ";
				echo $message=  "<div class='menuAction'><i class='fa fa-times red'></i>O NO! As you swing your hatchet it breaks apart in your hands! [ -1 hatchet ] </div>";
				include ('update_feed.php'); // --- update feed
				$results = $link->query("UPDATE $user SET hatchet = hatchet - 1");	
			}
		
		}
		
		
	$_SESSION['emptytree'] = rand (1,3); // exaust tree 1/3
	if ($_SESSION['emptytree'] == 1) // run out of wood message
	{
	echo $message="<div class='menuAction'><i class='fa fa-times red'></i>This tree has run out of wood!</div>";
	include ('update_feed.php'); // --- update feed
	$_SESSION['emptytree'] = 99;
	}	
	}
	
	
	
	$funflag=1;			
	}
	
}
?>