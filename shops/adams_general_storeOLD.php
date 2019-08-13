<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	


$level = $row['level'];
$xp = $row['xp'];
$hp = $row['hpmax'];
$mp = $row['mpmax'];

$cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];

if($input=='shop' || $input=='buy' || $input=='list items' || $input=='list items again') 
{	
echo "YOU ENTER ADAM'S GENERAL STORE<br>";
$message = 'buy
		<div class="shop">
		<h4><span class="alt">adam\'s</span> general store
		</h4>
<form id="mainForm" method="post" action="" name="formInput">
			<h3>Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy dagger" /> 
			<span class="gold">50c</span> dagger <span>( +1 str )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy long sword" /> 
			<span class="gold">400c</span> long sword <span>( +4 str )</span><br />
			
			<h3>Ammo </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy 10 arrows" /> 
			<span class="gold">100c</span> arrows x10 <span></span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy 10 bolts" /> 
			<span class="gold">200c</span> bolts x10 <span></span><br />


				
			<h3>Misc</h3>
			<input type="submit" class="buyBtn" name="input1" value="buy bottle" /> 
			<span class="gold">50c</span> bottle <span>( mix with berries to create potions )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy redberry" /> 
			<span class="gold">10c</span> redberry <span>( restores 5 HP )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy blueberry" /> 
			<span class="gold">20c</span> blueberry <span>( restores 5 MP )</span><br />
			
<input type="submit" class="learnBtnn" name="input1" value="buy" />
<input type="submit" class="learnBtnn" name="input1" value="sell" />
<input type="submit" class="learnBtnn" name="input1" value="look" />
	</form></div>';
	include ('update_feed.php');
	$funflag=1; // --- update feed


}
if($input=='buy dagger') 
{	if($cash<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a dagger for 50 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50"); 
		} $funflag=1;
}



if($input=='buy long sword') 
{	if($cash<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a long sword for 400 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET longsword = longsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 400"); 
		} $funflag=1;
}


if($input=='buy 10 arrows') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 10 wooden arrows for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET arrows = arrows + 10"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
		} $funflag=1;
}
if($input=='buy 10 bolts') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 10 bolts for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bolts = bolts + 10"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); 
		} $funflag=1;
}

if($input=='buy bottle') 
{	if($cash<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a bottle for 50 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bottle = bottle + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50"); 
		} $funflag=1;
}
if($input=='buy redberry') 
{	if($cash<10) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 10 redberry for 10 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redberry = redberry + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10"); 
		} $funflag=1;
}
if($input=='buy blueberry') 
{	if($cash<20) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy 10 blueberry for 20 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET blueberry = blueberry + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 20"); 
		} $funflag=1;
 }
 
 
}



?>