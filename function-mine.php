<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	

	$room = $row['room'];

	$pickaxe = $row['pickaxe'];
 	$ironpickaxe = $row['ironpickaxe'];
 	$steelpickaxe = $row['steelpickaxe'];
 	$mithrilpickaxe = $row['mithrilpickaxe'];
	
	$stone=$row['stone'];
	$iron=$row['iron'];
	$mud=$row['mud'];
	$sand=$row['sand'];
	 
	$woodtotal = $wood + 1;
	$woodtotal2 = $wood + 2;
	


// -------------------------------------------------------------------------- Determine best pickaxe
if ($mithrilpickaxe >=1) { $bestpickaxe = 'mithil'; }
else if ($steelpickaxe >=1) { $bestpickaxe = 'steel'; }
else if ($ironpickaxe >=1) { $bestpickaxe = 'iron'; }
else if ($pickaxe >=1) { $bestpickaxe = ''; }

// -------------------------------------------------------------------------- MINE FUNCTION
if (($input=='mine here' || $input=='mine' || $input=='mine down' || $input=='down' || $input=='d')  && $infight >= 1) {
	echo $message="<i class='redBG lightgray'>You cannot mine when you are in battle!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}
else if($input=='mine here' || $input=='mine' || $input=='mine down' || $input=='down' || $input=='d') 
{	
	if ($pickaxe <=0 && $ironpickaxe <=0 && $steelpickaxe <=0 && $mithrilpickaxe <=0) {
		echo $message="<i class='redBG lightgray'>You need a pickaxe to mine! Go get one!</i><br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if ($pickaxe >= 1 || $ironpickaxe >= 1 || $steelpickaxe >= 1 || $mithrilpickaxe >= 1) { // ------------------------- MINE
	$randOre = rand (1,10);
		


// ----------------------------------------------------------------------------------------------------- MITHRIL LEVELS 21-30
if ( $room == 'm20' || $room == 'm21' || $room == 'm22' || $room == 'm23' || $room == 'm24' || $room == 'm25' || $room == 'm26' || $room == 'm27' || $room == 'm28' || $room == 'm29') {
// ----------------------------------------------------------------------------------------------------- Coal 6/10
		if ($randOre <=6) { 					
				if ($steelpickaxe ==0 && $mithrilpickaxe ==0){ // ------------------------- if no good pickaxe
							echo $message="<i>You see some coal, but you will need a steel pickaxe or better to mine it.</i><br/>";
							include ('update_feed.php'); // --- update feed
							}
					else {
					$coal=$coal+1; // for display
				echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Coal! [ COAL + 1 = $coal ]</div>";			
		include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET coal = coal + 1");
					}
				}	
// ----------------------------------------------------------------------------------------------------- Mithril 2/10
		else if ($randOre == 7 || $randOre == 8) { 
					if ($mithrilpickaxe ==0){ // --------------------- if no good pickaxe
							echo $message="<i>You see some mithril, but you will need an mithril pickaxe or better to mine it.</i><br/>";
							include ('update_feed.php'); // --- update feed
							}
					else {
					$mithril=$mithril+1; // for display
				echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Mithril! [ MITHRIL + 1 = $mithril ]</div>";			
		include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET mithril = mithril + 1");
					}
				}
// ----------------------------------------------------------------------------------------------------- Stone 1/10
		else if ($randOre == 9) { 					
					$stone=$stone+1; // for display
				echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Stone! [ STONE + 1 = $stone ]</div>";			
		include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET stone = stone + 1");
				}					
} // end MITHRIL
// ----------------------------------------------------------------------------------------------------- STEEL LEVELS 11-20
if ($room == 'm10' || $room == 'm11' || $room == 'm12' || $room == 'm13' || $room == 'm14' || $room == 'm15' || $room == 'm16' || $room == 'm17' || $room == 'm18' || $room == 'm19') {// ----------------------------------------------------------------------------------------------------- Coal 5/10
		if ($randOre <=5) { 					
				if ($steelpickaxe ==0 && $mithrilpickaxe ==0){ // ------------------------- if no good pickaxe
							echo $message="<i>You see some coal, but you will need a steel pickaxe or better to mine it.</i><br/>";
							include ('update_feed.php'); // --- update feed
							}
					else {
					$coal=$coal+1; // for display
				echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Coal! [ COAL + 1 = $coal ]</div>";			
		include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET coal = coal + 1");
					}
				}	
// ----------------------------------------------------------------------------------------------------- Stone 2/10
		else if ($randOre == 6 || $randOre == 7) { 					
					$stone=$stone+1; // for display
				echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Stone! [ STONE + 1 = $stone ]</div>";			
		include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET stone = stone + 1");
				}	
				
// ----------------------------------------------------------------------------------------------------- Iron 2/10
		else if ($randOre == 8 || $randOre == 9) { 
					if ($ironpickaxe ==0 && $steelpickaxe ==0 && $mithrilpickaxe ==0){ // --------------------- if no good pickaxe
							echo $message="<i>You see some iron, but you will need an iron pickaxe or better to mine it.</i><br/>";
							include ('update_feed.php'); // --- update feed
							}
					else {
					$iron=$iron+1; // for display
				echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Iron! [ IRON + 1 = $iron ]</div>";			
		include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET iron = iron + 1");
					}
				}
} // end STEEL
else  { // else iron
// ----------------------------------------------------------------------------------------------------- IRON LEVELS 1-10
// ----------------------------------------------------------------------------------------------------- Stone 5/10
		if ($randOre <=5) { 					
					$stone=$stone+1; // for display
				echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Stone! [ STONE + 1 = $stone ]</div>";			
		include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET stone = stone + 1");
				}	
				
// ----------------------------------------------------------------------------------------------------- Iron 4/10
		if ($randOre > 5 && $randOre <= 9) { 
					if ($ironpickaxe ==0 && $steelpickaxe ==0 && $mithrilpickaxe ==0){ // ------------------------- if no good pickaxe
							echo $message="<i>You see some iron, but you will need an iron pickaxe or better to mine it.</i><br/>";
							include ('update_feed.php'); // --- update feed
							}
					else {
					$iron=$iron+1; // for display
				echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Iron! [ IRON + 1 = $iron ]</div>";			
		include ('update_feed.php'); // --- update feed
	$results = $link->query("UPDATE $user SET iron = iron + 1");
					}
				}

} // end IRON


// ----------------------------------------------------------------------------------------------------- SAND or MUD (1/20 each) - FINAL 5% for all
		if ($randOre == 10) { 
				$randOre2 = rand(1,2);
						if ($randOre2 == 1) { 		// ------------------ sand
							$sand=$sand+1; // for display
							echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Sand! [ SAND + 1 = $sand ]</div>";			
							include ('update_feed.php'); // --- update feed
							$results = $link->query("UPDATE $user SET sand = sand + 1");
							}
						else if ($randOre2 == 2) { 		// ------------------ mud
							$mud=$mud+1; // for display
							echo $message="<div class='menuAction'><i class='fa fa-arrow-circle-up green'></i>You use your $bestpickaxe pickaxe and mine some Mud! [ MUD + 1 = $mud ]</div>";			
							include ('update_feed.php'); // --- update feed
							$results = $link->query("UPDATE $user SET mud = mud + 1");
							}						
				}	

// ----------------------------------------------------------------------------------------------------- PickAxe Break
		$pickaxebreak = rand (1,50); // pickaxe break 1/50
		if ($pickaxebreak == 1) {
				if ($bestpickaxe == 'mithil')	{ $results = $link->query("UPDATE $user SET mithrilpickaxe = mithrilpickaxe - 1");	}
				if ($bestpickaxe == 'steel') 	{ $results = $link->query("UPDATE $user SET steelpickaxe = steelpickaxe - 1");	}
				if ($bestpickaxe == 'iron') 	{ $results = $link->query("UPDATE $user SET ironpickaxe = ironpickaxe - 1");	}
										else	{ $results = $link->query("UPDATE $user SET pickaxe = pickaxe - 1");	}
			
		echo "O NO! As you swing your $bestpickaxe pickaxe it breaks apart in your hands! [ -1 $bestpickaxe pickaxe!! ] ";
		$message="<i class='redBG'>O NO! As you swing your $bestpickaxe pickaxe it breaks apart in your hands! [ -1 $bestpickaxe pickaxe!! ] </i><br/>";
		include ('update_feed.php'); // --- update feed
				}


   	$results = $link->query("UPDATE $user SET endfight = 0"); // -- reset fight

	}
	
	

	
	
	}
	
}
?>