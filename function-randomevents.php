<?php
// --------- Random Events

// -------------------------DB CONNECT!
include ('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){

// -------------------------------------------------------------------------- BATTLE VARIABLES
	$infight = $row['infight'];
 	$endfight = $row['endfight'];
 	$enemy=$row['enemy'];
 	$level=$row['level'];

	$clicks = $row['clicks'];
	//$_SESSION['silverchest'] = $clicks;

$silverkey = $row['silverkey'];

//$randEvent = rand (1,50);		 // SUPER GENEROUS rate
$randEvent = rand (1,200);		 // regular rate

// echo 'Rand Event: '.$randEvent.'<br/>';


$room = $row['room'];



if ($infight == 0) {		// ONLY RUN IF NOT IN BATTLE



  // -- EXPERIMENTAL
  // -- EXPERIMENTAL
  // -- EXPERIMENTAL
  // -- EXPERIMENTAL
  // -- EXPERIMENTAL
  // -- EXPERIMENTAL

 // 1 out of 300 chance
  // LVL 1 - 10 - The ground rumbles below you [ You take 25% current HP Damage ]
  // LVL 1 - 30 - The ground shakes and you fall hard to the floor. [ You take 50% current HP Damage ]
  // LVL 1 - 50 - The earth shakes from a monstrous explosion in the mountains. [ You take 75% current HP Damage ]
  // LVL 1 - 70 - You are inturrupted by a full blown earthquake. You are thrown around violently for what seems like an eternity [ You take 90% current HP Damage ]







 // RANDOM 1 - Clay Pot
if (($randEvent == 1 && $infight == 0) || ($_SESSION['claypot'] == $room && $input != 'smash pot')) {  // RANDOM 1 - Clay Pot
// ----------------------------------------------- clay poy
echo 'There is a clay pot here.<br/>';
$message = "There is a clay pot here.<br/>
			<form id='mainForm' method='post' action='' name='formInput'>
			<input type='submit' class='auto goldBG' name='input1' value='smash pot' />
			</form>";
			include ('update_feed.php'); // --- update feed
			$_SESSION['claypot'] = $room;
}
if ($_SESSION['claypot'] == $room && $input == 'smash pot') {

		$rand = rand (1,7);

		if ($rand == 1) {
      //$qty = rand (1,30);
      $qty = rand (100*$level,1000*$level);
			echo 'You smash open the pot and find '.$qty.' '.$currency.'!<br/>';
			$message = "You smash open the pot and find $qty $currency!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $qty");
 			}
		if ($rand == 2) {
      //$qty = rand (2,4);
      $qty = rand (1*$level,5*$level);
			echo 'You smash open the pot and gain '.$qty.' XP!<br/>';
			$message = "You smash open the pot and gain $qty XP!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET xp = xp + $qty");
 			}
		if ($rand == 3) {
			echo 'You smash open the pot and find a string!<br/>';
			$message = "You smash open the pot and find a string!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET string = string + 1");
 			}
		if ($rand == 4) {
			echo 'You smash open the pot and find a dagger!<br/>';
			$message = "You smash open the pot and find a dagger!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET dagger = dagger + 1");
 			}
		if ($rand == 5) {
			$qty = rand (2,5);
			echo 'You smash open the pot and find '.$qty.' arrows!<br/>';
			$message = "You smash open the pot and find $qty arrows!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET arrows = arrows + $qty");
 			}
		if ($rand == 6) {
			$qty = rand (2,5);
			echo 'You smash open the pot and find '.$qty.' bolts!<br/>';
			$message = "You smash open the pot and find $qty bolts!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET bolts = bolts + $qty");
 			}
		if ($rand == 7) {
			$qty = rand (2,5);
			echo 'You smash open the pot and find '.$qty.' stone!<br/>';
			$message = "You smash open the pot and find $qty stone!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET stone = stone + $qty");
 			}

	$_SESSION['claypot'] = -1;
	$results = $link->query("UPDATE $user SET pots = pots + 1");

}
if (($randEvent == 2 && $infight == 0) || ($_SESSION['woodenchest'] == $room && $input != 'open wooden chest')) { // ----------------------------------------------- wooden chest

echo 'You come across a wooden chest<br/>';
$message = "You come across a wooden chest<br/>
			<form id='mainForm' method='post' action='' name='formInput'>
			<input type='submit' class='auto goldBG' name='input1' value='open wooden chest' />
			</form>";
			include ('update_feed.php'); // --- update feed
			$_SESSION['woodenchest'] = $room; $funflag=1;
}
if ($_SESSION['woodenchest'] == $room && $input == 'open wooden chest') {

		$rand = rand (1,6);

		if ($rand == 1) {
			$qty = rand (50,200);
			echo 'You open the wooden chest and find '.$qty.' '.$currency.'!<br/>';
			$message = "You open the wooden chest and find $qty $currency!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $qty");
 			}
		if ($rand == 2) {
			$qty = rand (10,20);
			echo 'You open the wooden chest and gain '.$qty.' XP!<br/>';
			$message = "You open the wooden chest and gain $qty XP!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET xp = xp + $qty");
 			}
		if ($rand == 3) {
			$qty = rand (2,5);
			echo 'You open the wooden chest and find '.$qty.' Red Potions!<br/>';
			$message = "You open the wooden chest and find $qty Red Potions!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
 			}
		if ($rand == 4) {
			echo 'You open the wooden chest and find a Samurai Sword!<br/>';
			$message = "You open the wooden chest and find a Samurai Sword!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET samuraisword = samuraisword + 1");
 			}
		if ($rand == 5) {
			echo 'You open the wooden chest and find a Pike!<br/>';
			$message = "You open the wooden chest and find a Pike!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET pike = pike + 1");
 			}
		if ($rand == 6) {

			$rand2 = rand(1,4);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Strength';
				$results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1"); }
			if ($rand2 == 2 ){
				$bonus = 'Ring of Dexterity';
				$results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1"); }
			if ($rand2 == 3 ){
				$bonus = 'Ring of Magic';
				$results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1"); }
			if ($rand2 == 4 ){
				$bonus = 'Ring of Defense';
				$results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1"); }

			echo 'You open the wooden chest and find a '.$bonus.'!<br/>';
			$message = "You open the wooden chest and find a $bonus!<br/>";
			include ('update_feed.php'); // --- update feed
 			}

	$_SESSION['woodenchest'] = -1;
	$results = $link->query("UPDATE $user SET woodenchests = woodenchests + 1");

}
//if ($_SESSION['silverchest'] ==0 ) {$_SESSION['silverchest']=-1;}
// ----------------------------------------------------------------------------------------------------------- silver chest
if (($randEvent == 3333 && $infight == 0 && $level>=2) || (($_SESSION['silverchest'] == ($room)) && $input != 'open silver chest')) {  // RANDOM 3
// ----------------------------------------------- clay poy
echo 'You come across a silver chest!<br/>';
$message = "You come across a silver chest!<br/>
			<form id='mainForm' method='post' action='' name='formInput'>
			<input type='submit' class='auto goldBG' name='input1' value='open silver chest' />
			</form>";
			include ('update_feed.php'); // --- update feed
			$_SESSION['silverchest'] = $room;
}
if ($_SESSION['silverchest'] == $room && $input == 'open silver chest') {

		$silverkeyleft = $silverkey - 1;
		if ($silverkey < 1) {
			echo $message = "You don't have a silver key to open this chest!<br/>";
			include ('update_feed.php'); // --- update feed
			}
		else{

		echo $message = "You use a silverkey. You have $silverkeyleft left.<br/>";
			include ('update_feed.php'); // --- update feed


		$rand = rand (1,6);

		if ($rand == 1) {
			$qty = rand (1000,2000);
			echo 'You open the silver chest and find '.$qty.' '.$currency.'!<br/>';
			$message = "You open the silver chest and find $qty $currency!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET currency = currency + $qty");
 			}
		if ($rand == 2) {
			$qty = rand (50,200);
			echo 'You open the silver chest and gain '.$qty.' XP!<br/>';
			$message = "You open the silver chest and gain $qty XP!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET xp = xp + $qty");
 			}
		if ($rand == 3) {
			$qty = rand (2,5);
			echo 'You open the silver chest and find '.$qty.' Purple Potions!<br/>';
			$message = "You open the silver chest and find $qty Purple Potions!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET purplepotion = purplepotion + $qty");
 			}
		if ($rand == 4) {
			echo 'You open the silver chest and find a Gladius!<br/>';
			$message = "You open the silver chest and find a Gladius!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET gladius = gladius + 1");
 			}
		if ($rand == 5) {
			echo 'You open the silver chest and find a Claymore!<br/>';
			$message = "You open the silver chest and find a claymore!<br/>";
			include ('update_feed.php'); // --- update feed
			$results = $link->query("UPDATE $user SET claymore = claymore + 1");
 			}
		if ($rand == 6) {

			$rand2 = rand(1,4);
			if ($rand2 == 1 ){
				$bonus = 'Ring of Strength V';
				$results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1"); }
			if ($rand2 == 2 ){
				$bonus = 'Ring of Dexterity V';
				$results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1"); }
			if ($rand2 == 3 ){
				$bonus = 'Ring of Magic V';
				$results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1"); }
			if ($rand2 == 4 ){
				$bonus = 'Ring of Defense V';
				$results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1"); }

			echo 'You open the silver chest and find a '.$bonus.'!<br/>';
			$message = "You open the silver chest and find a $bonus!<br/>";
			include ('update_feed.php'); // --- update feed
 			}
	$_SESSION['silverchest'] = -1;
	$results = $link->query("UPDATE $user SET silverkey = silverkey - 1");
	$results = $link->query("UPDATE $user SET silverchests = silverchests + 1");

}
}




if ($randEvent == 44444444 && $infight == 0 && $level >= 7) { // ----------------------------------------------- silver BEAST
echo 'You are attacked by a Silver Beast!<br/>';
$message = "You are attacked by a Silver Beast!<br/>
			<form id='mainForm' method='post' action='' name='formInput'>
			<input type='submit' class='auto goldBG' name='input1' value='attack' />
			</form>";
			$results = $link->query("UPDATE $user SET enemy = 'Silver Beast'");
			include ('update_feed.php'); // --- update feed
			include ('battle.php');
			$funflag=1;
}

$enemy=$row['enemy'];
// --------------------------------------------------------------------------
if(($input=='attack silver beast' || $input=='attack' ) && $infight==0 && $endfight==0 && $enemy =="Silver Beast")
	{	if ($input=='attack silver beast') { $input = 'attack'; }
		$results = $link->query("UPDATE $user SET enemy = 'Silver Beast'");
		include ('battle.php');	}
// -------------------------------------------------------------------------- IN BATTLE
else if ($infight >=1 &&  $enemy =="Silver Beast")
	{ 	if($input=='attack silver beast') { $input = 'attack'; }
		include ('battle.php');	}
// -------------------------------------------------------------------------- Battle TRAVEL
if (($input=='n' || $input=='north' || $input=='ne' || $input=='northeast' ||
		$input=='e' || $input=='north' || $input=='se' || $input=='southeast' ||
		$input=='s' || $input=='south' || $input=='sw' || $input=='southwest' ||
		$input=='w' || $input=='west' || $input=='nw' || $input=='northwest' ||
		$input=='u' || $input=='up' || $input=='d' || $input=='down' )  && $infight >= 1 && $enemy =='Silver Beast') {
	echo 'You cannot leave the room in the middle of battle!<br/>';
   	$message="<i>You cannot leave the room in the middle of battle!</i><br/>";
	include ('update_feed.php'); // --- update feed
	}

} // END BIG WHILE IN FIGHT!


} //-end while

?>
