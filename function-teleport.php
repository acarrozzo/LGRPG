<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	
 

  	$magiccast = 0;
		
	$room = $row['room'];
	$recall = $row['recall'];

	$teleport1 = $row['teleport1'];
	$teleport2 = $row['teleport2'];
	$teleport3 = $row['teleport3'];
	$teleport4 = $row['teleport4'];
	$teleport5 = $row['teleport5'];
	$teleport6 = $row['teleport6'];
	$teleport7 = $row['teleport7'];
	$teleport8 = $row['teleport8'];
	$teleport9 = $row['teleport9'];
	$teleport10 = $row['teleport10'];
	
	$quest19 = $row['quest19'];
	$quest20 = $row['quest20'];
	$quest31 = $row['quest31'];
	$quest57 = $row['quest57'];

$bosstelecost = ($row['level'] * 3);


	
	//	echo ' ROOM:'.$room.'<br/>';
	//	echo ' REC:'.$recall.'<br/>';
  // 	echo ' DSC:'.$desc;
	

if($input=='set recall') 
{	
	 
	 //echo 'REC: '.$recall;
	 //  $desc = "desc$room";
	 //  	echo 'DSC: '.$desc;
	 
	 echo 'You set recall to this room!<br/>';
		$message="<i>You set recall to this room! </i><br/>";
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET recall = '$room'"); // -- room change

	//$message=""; //so doesn't display message in HUD battle status
}
// -------------------------------------------------------------------------- RECALL
if($input=='recall') 
{	
   if ($room == $recall)
	{
		echo $message="<i>You are already at your recall room</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == -1)
	{
		echo $message="<i>You can't cast recall from Room Zero.</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{
	//echo 'REC: '.$recall;
	   $desc = "desc$recall";
	 // echo 'DSC: '.$desc;
			
		echo 'You recall!<br/>';
		$message="<i>You recall! </i><br/>".$_SESSION["$desc"];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = recall"); // -- room change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
	

// -------------------------------------------------------------------------- Teleport MAIN
if($input=='teleport') 
{	
   	
		echo "<i>Where would you like to Teleport?</i><br/>";
		$message='
		
		<div class="shop teleport">
		<h4>Teleport Menu</h4>
		<form id="mainForm" method="post" action="" name="formInput">
		<input type="submit" class="teleportBtn" name="input1" value="recall" /> 
		<input type="submit" class="teleportBtn" name="input1" value="teleport forest path" /> 
		<input type="submit" class="teleportBtn" name="input1" value="teleport red town" /> 
		<input type="submit" class="teleportBtn" name="input1" value="teleport forest" />  
			
			</form>
			</div>
		';
		include ('update_feed.php'); // --- update feed
}

// -------------------------------------------------------------------------- Teleport Grassy Field
if(($input=='teleport grassy field' || $input=='grassy field') && $row['teleport1']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 1)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Grassy Field.<br/>';
		$message="<i>You teleport to the Grassy Field: </i><br/>".$_SESSION['desc001'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '001'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
// -------------------------------------------------------------------------- Teleport Forest Path
if(($input=='teleport forest path' || $input=='forest path') && $row['teleport2']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 104)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Forest<br/>';
		$message="<i>You teleport to the Forest: </i><br/>".$_SESSION['desc104'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 104"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}

// -------------------------------------------------------------------------- Teleport Red Town
if(($input=='teleport red town' || $input=='red town') && $row['teleport3']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 210)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Red Town Grand Square<br/>';
		$message="<i>You teleport to Red Town: </i><br/>".$_SESSION['desc210'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 210"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
// -------------------------------------------------------------------------- Teleport Forest
if(($input=='teleport forest' || $input=='forest') && $row['teleport4']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 121)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Forest<br/>';
		$message="<i>You teleport to the Forest: </i><br/>".$_SESSION['desc121'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 121"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
// -------------------------------------------------------------------------- Teleport Warrior's Guild
if(($input=='warrior\'s guild') && $row['quest19']>=2) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '226d')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Warrior\'s Guild<br/>';
		$message="<i>You teleport to the Warrior's Guild: </i><br/>".$_SESSION['desc226d'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '226d'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
// -------------------------------------------------------------------------- Teleport Wizard's Guild
if(($input=='wizard\'s guild') && $row['quest20']>=2) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '225b')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Wizard\'s Guild<br/>';
		$message="<i>You teleport to the Wizard's Guild: </i><br/>".$_SESSION['desc225b'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '225b'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
// -------------------------------------------------------------------------- Stone Mine / dwarf village
if(($input=='teleport stone mine' || $input=='stone mine' || $input=='teleport dwarf village' || $input=='dwarf village') && $row['teleport5']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 307)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Dwarf Village Square<br/>';
		$message="<i>You teleport to the Dwarf Village Square: </i><br/>".$_SESSION['desc307'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 307"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}

// -------------------------------------------------------------------------- Teleport Mining Guild
if(($input=='mining guild') && $row['quest31']>=2) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '308b')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Mining Guild FORGE<br/>';
		$message="<i>You teleport to the Mining Guild: </i><br/>".$_SESSION['desc308a'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '308a'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
// -------------------------------------------------------------------------- blue ocean
if(($input=='teleport blue ocean' || $input=='blue ocean') && $row['teleport6']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 413)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Blue Ocean Oasis!<br/>';
		$message="<i>You teleport to the Blue Ocean Oasis: </i><br/>".$_SESSION['desc413'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 413"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	}
}
// -------------------------------------------------------------------------- underwater
if(($input=='teleport underwater' || $input=='underwater') && $row['teleport7']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 484)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport Underwater!<br/>';
		$message="<i>You teleport Underwater: </i><br/>".$_SESSION['desc484'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 484"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	}
}

// -------------------------------------------------------------------------- master water temple
if(($input=='teleport master water temple' || $input=='master water temple') && ($row['KLthunderbarbarian']>=1 || $row['KLsmoothranger']>=1 || $row['KLcoralwizard']>=1 || $row['KLheavywalrus']>=1 )) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 425)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Master Water Temple!<br/>';
		$message="<i>You teleport to the Master Water Temple: </i><br/>".$_SESSION['desc425'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 425"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	}
}

// -------------------------------------------------------------------------- Teleport Dark Forest
if(($input=='teleport dark forest' || $input=='dark forest') && $row['teleport8']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 507)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Dark Forest<br/>';
		$message="<i>You teleport to the Dark Forest: </i><br/>".$_SESSION['desc507'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 507"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	$results = $link->query("UPDATE $user SET endfight = 0"); // End Fight

	}
}

// -------------------------------------------------------------------------- Teleport Ranger's Guild
if(($input=='ranger\'s guild') && $row['quest57']>=2) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '515a')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Ranger\'s Guild<br/>';
		$message="<i>You teleport to the Ranger's Guild: </i><br/>".$_SESSION['desc515a'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '515a'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}


// -------------------------------------------------------------------------- Teleport Mountains
if(($input=='teleport mountains' || $input=='mountains') && $row['teleport9']>=1) 
{	
   if ($row['mp'] < 1)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 605)
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Mountains<br/>';
		$message="<i>You teleport to the Mountains: </i><br/>".$_SESSION['desc605'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 605"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-1"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 1"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	$results = $link->query("UPDATE $user SET endfight = 0"); // End Fight

	}
}




// -------------------------------------------------------------------------------------------------- BOSS TELEPORT
// -------------------------------------------------------------------------------------------------- BOSS TELEPORT
// -------------------------------------------------------------------------------------------------- BOSS TELEPORT

// -------------------------------------------------------------------------- Teleport goblin chief
if(($input=='teleport goblin chief' || $input=='goblin chief') && $row['KLgoblinchief']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '028i')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Goblin Chief!<br/>';
		$message="<i>You teleport to the Goblin Chief! </i><br/>".$_SESSION['desc028i'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '028i'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	}
}
// -------------------------------------------------------------------------- Teleport gator
if(($input=='teleport gator' || $input=='gator') && $row['KLgator']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '013')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Gator!<br/>';
		$message="<i>You teleport to the Gator! </i><br/>".$_SESSION['desc013'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '013'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	}
}


// -------------------------------------------------------------------------- Teleport scorpion king
if(($input=='teleport scorpion king' || $input=='scorpion king') && $row['KLscorpionking']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '012h')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Scorpion King!<br/>';
		$message="<i>You teleport to the Scorpion King! </i><br/>".$_SESSION['desc012h'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '012h'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
// -------------------------------------------------------------------------- Teleport ogre lieutenant
if(($input=='teleport ogre lieutenant' || $input=='ogre lieutenant') && $row['KLogrelieutenant']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '111k')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Ogre Lieutenant!<br/>';
		$message="<i>You teleport to the Ogre Lieutenant! </i><br/>".$_SESSION['desc111k'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '111k'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}
// -------------------------------------------------------------------------- Teleport kobold master
if(($input=='teleport kobold master' || $input=='kobold master') && $row['KLkoboldmaster']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '115k')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Kobold Master!<br/>';
		$message="<i>You teleport to the Kobold Master! </i><br/>".$_SESSION['desc115k'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '115k'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}


// -------------------------------------------------------------------------- Teleport master thief
if(($input=='teleport master thief' || $input=='master thief') && $row['KLmasterthief']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '232o')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the master thief!<br/>';
		$message="<i>You teleport to the master thief! </i><br/>".$_SESSION['desc232o'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '232o'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}




// -------------------------------------------------------------------------- Teleport mongolian death worm
if(($input=='teleport mongolian death worm' || $input=='mongolian death worm') && $row['KLmongoliandeathworm']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '315d')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the mongolian death worm!<br/>';
		$message="<i>You teleport to the mongolian death worm! </i><br/>".$_SESSION['desc315d'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '315d'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}





// -------------------------------------------------------------------------- Teleport omar the dead
if(($input=='teleport omar the dead' || $input=='omar the dead') && $row['KLomar']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '232w')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Omar the Dead!<br/>';
		$message="<i>You teleport to the Omar the Dead! </i><br/>".$_SESSION['desc232w'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '232w'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}



// -------------------------------------------------------------------------- Teleport phoenix
if(($input=='teleport phoenix' || $input=='phoenix') && $row['KLphoenix']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 'm10')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Phoenix!<br/>';
		$message="<i>You teleport to the Phoenix! </i><br/>".$_SESSION['descm10'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 'm10'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	}
}
// -------------------------------------------------------------------------- Teleport cyclops
if(($input=='teleport cyclops' || $input=='cyclops') && $row['KLcyclops']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 'm20')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Cyclops!<br/>';
		$message="<i>You teleport to the Cyclops! </i><br/>".$_SESSION['descm20'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 'm20'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	}
}

// -------------------------------------------------------------------------- Teleport minotaur
if(($input=='teleport minotaur' || $input=='minotaur') && $row['KLminotaur']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == 'm30')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Minotaur!<br/>';
		$message="<i>You teleport to the Minotaur! </i><br/>".$_SESSION['descm30'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = 'm30'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	}
}

// -------------------------------------------------------------------------- Teleport troll king
if(($input=='teleport troll king' || $input=='troll king') && $row['KLtrollking']>=1) 
{	
   if ($row['mp'] < $bosstelecost)
	{	echo $message="<i>You don't have enough MP to cast Teleport</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($row['room'] == '523')
	{	echo $message="<i>You're already there!</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
	else
	{  echo 'You teleport to the Troll King!<br/>';
		$message="<i>You teleport to the Troll King! </i><br/>".$_SESSION['desc523'];
		include ('update_feed.php'); // --- update feed
   	$results = $link->query("UPDATE $user SET room = '523'"); // -- room change
   	$results = $link->query("UPDATE $user SET mp = mp-$bosstelecost"); // -- mp change
	$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
	$results = $link->query("UPDATE $user SET infight = 0"); // End Fight
	$message=""; //so doesn't display message in HUD battle status
	
	}
}


} // -end while

?>