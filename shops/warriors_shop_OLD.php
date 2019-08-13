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
echo "YOU ENTER THE WARRIORS SHOP<br>";
$message = 'buy
		<div class="shop">
		<h4><span class="alt">warrior\'s</span> weapon & armor shop
		</h4>
<form id="mainForm" method="post" action="" name="formInput">
			<h3>1h Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy iron dagger" /> 
			<span class="yellow">1k </span> <span class="lightbrown">iron </span> dagger <span>( +7 str )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy iron sword" /> 
			<span class="yellow">3k </span> <span class="lightbrown">iron </span> sword <span>( +13 str )</span><br />
			
			<h3>2h Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy polearm" /> 
			<span class="yellow">3k </span> polearm <span>( +12 str, + 20 def )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy iron 2h sword" /> 
			<span class="yellow">5k </span> <span class="lightbrown">iron </span> 2h sword <span>( +25 str )</span><br />
			
			<h3>Accessories </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy ring of strength V" /> 
			<span class="yellow">16k </span> ring of strength V <span>( +5 str )</span><br />
			
			<input type="submit" class="buyBtn" name="input1" value="buy ring of health regen V" /> 
			<span class="yellow">32k </span> ring of health regen V <span>( +5 hp / click )</span><br />
			
			<h3>Misc </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy meatball" /> 
			<span class="gold">250 </span> <span class="lightbrown"></span> meatball <span>( +400 hp )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy red balm" /> 
			<span class="yellow">1k </span> <span class="lightbrown"></span> red balm <span>( +1000 hp )</span><br />			
		
			<br/>
<input type="submit" class="learnBtnn" name="input1" value="buy" />
<input type="submit" class="learnBtnn" name="input1" value="sell" />
<input type="submit" class="learnBtnn" name="input1" value="look" />
	</form></div>';
	include ('update_feed.php');
	$funflag=1; // --- update feed
//armor
// 4k iron kite shield ( +25 def , -5 mag) 
// 2k iron helmet ( +10 def ) 
// 3k iron platemail ( +15 def, +3 str, -3 mag )
// 1k iron gauntlets ( +8 def )
// 1k iron boots ( +8 def )
// 16k ring of strength V ( +5 str )
// 32k ring of health regen V ( +5 mp/click )

// other
// 250c meatball (+400 hp) (combine 5 cooked meats)
// 100c red potion (+100 hp)
// 1k red balm (+1000 hp) (combine 10 red potions with 1 mud)
// 500c reds (increase strength 10 pts for 100 clicks)

}
if($input=='buy iron dagger') 
{	if($cash<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron dagger for 1000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET irondagger = irondagger + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1000"); } 
}
if($input=='buy iron sword') 
{	if($cash<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron sword for 3000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironsword = ironsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 3000"); } 
}
if($input=='buy polearm') 
{	if($cash<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a polearm for 3000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET polearm = polearm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 3000"); } 
}
if($input=='buy iron 2h sword') 
{	if($cash<5000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron 2h sword for 5000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 5000"); } 
}
if($input=='buy ring of strength V') 
{	if($cash<16000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of strength V for 16000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 16000"); } 
}
if($input=='buy ring of health regen V') 
{	if($cash<32000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of health regen V for 32000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 32000"); } 
}
if($input=='buy meatball') 
{	if($cash<250) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a meatball for 250 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET meatball = meatball + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 250"); } 
}
if($input=='buy red balm') 
{	if($cash<1000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red balm for 1000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redbalm = redbalm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 1000"); } 
}

 
}



?>