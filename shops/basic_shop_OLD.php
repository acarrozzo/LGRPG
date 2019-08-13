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
echo 'YOU ENTER THE BASIC SHOP<br>';
$message = 'buy
		<div class="shop">
		<h4><span class="alt">pajama shaman</span> general store
		</h4>
<form id="mainForm" method="post" action="" name="formInput">
			<h3> 1h Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy dagger" /> 
			<span class="gold">50c</span> dagger <span>( +1 str )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy broad sword" /> 
			<span class="gold">400c</span> broad sword <span>( +4 str, +2 def )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy flail" /> 
			<span class="gold">1200c</span> flail <span>( +7 str, +3 def )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy basic staff" /> 
			<span class="gold">200c</span> basic staff <span>( +3 mag )</span><br />

			<h3> 2h Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy battle axe" /> 
			<span class="gold">800c</span> battle axe <span>( +10 str, -2 def )</span><br />
			
			<h3> Ranged </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy wooden bow" /> 
			<span class="gold">800c</span> wooden bow <span>( +8 dex )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy 10 arrows" /> 
			<span class="gold">100c</span> arrows x10 <span></span><br />

			<h3> Armor </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy basic shield" /> 
			<span class="gold">100c</span> basic shield <span>( +5 def )</span><br />
			
			<h3>Misc</h3>
			<input type="submit" class="buyBtn" name="input1" value="buy bottle" /> 
			<span class="gold">50c</span> bottle <span>( mix with berries to create potions )</span><br />

			<input type="submit" class="buyBtn" name="input1" value="buy red potion" /> 
			<span class="gold">100c</span> red potion <span>( restores 100 HP )</span><br />
			
			<input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
			<span class="gold">200c</span> blue potion <span>( restores 100 MP )</span><br />
			
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



if($input=='buy broad sword') 
{	if($cash<400) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a broad sword for 400 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET broadsword = broadsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 400"); 
		} $funflag=1;
}
if($input=='buy flail') 
{	if($cash<1200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a flail for 1200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET flail = flail + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1200"); 
		} $funflag=1;
}
if($input=='buy basic staff') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a basic staff for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basicstaff = basicstaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); 
		} $funflag=1;
}
if($input=='buy battle axe') 
{	if($cash<800) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a battle axe for 800 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battleaxe = battleaxe + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 800"); 
		} $funflag=1;
}
if($input=='buy wooden bow') 
{	if($cash<800) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a wooden bow for 800 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenbow = woodenbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 800"); 
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

if($input=='buy basic shield') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a basic shield for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basicshield = basicshield + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
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
if($input=='buy red potion') 
{	if($cash<100) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red potion for 100 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redpotion = redpotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100"); 
		} $funflag=1;
}
if($input=='buy blue potion') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue potion for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); 
		} $funflag=1;
 }
 
 
}



?>