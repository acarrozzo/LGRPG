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
echo "YOU ENTER THE WIZARDS SHOP<br>";
$message = 'buy
		<div class="shop">
		<h4><span class="alt">wizards\'s</span> general store
		</h4>
<form id="mainForm" method="post" action="" name="formInput">
			<h3>1h Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy iron staff" /> 
			<span class="yellow">3k </span> <span class="lightbrown">iron </span> staff <span>( +10 mag, +3 str )</span><br />
			
			<h3>2h Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy iron battle staff" /> 
			<span class="yellow">5k </span> <span class="lightbrown">iron </span> battle staff <span>( +12 mag, +12 str )</span><br />
			
			<h3>Accessories </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy ring of magic V" /> 
			<span class="yellow">16k </span> ring of magic V <span>( +5 mag )</span><br />
			
			<input type="submit" class="buyBtn" name="input1" value="buy ring of mana regen V" /> 
			<span class="yellow">32k </span> ring of mana regen V <span>( +5 mp / click )</span><br />
			
			<h3>Misc </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
			<span class="gold">200 </span> blue potion <span>( +100 mp )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy blue balm" /> 
			<span class="yellow">2k </span> blue balm <span>( +1000 mp )</span><br />			
		
			
<br/><input type="submit" class="learnBtnn" name="input1" value="buy" />
<input type="submit" class="learnBtnn" name="input1" value="sell" />
<input type="submit" class="learnBtnn" name="input1" value="look" />
	</form></div>';
	include ('update_feed.php'); // --- update feed
// one handed
//3k - iron staff (+10 mag, +3 str)

// two handed
//5k - iron battle staff ( +12 mag, +12 str)

// acc
//16k ring of magic V (+5 mag)
//32k ring of mana regen V (+5 mp/click)

// misc
//200c - blue potion
//2k - blue balm
}
if($input=='buy iron staff') 
{	if($cash<3000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron staff for 3000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironstaff = ironstaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 3000"); } 
}
if($input=='buy iron battle staff') 
{	if($cash<5000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy an iron battle staff for 5000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 5000"); } 
}
if($input=='buy ring of magic V') 
{	if($cash<16000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of magic V for 16000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 16000"); } 
}
if($input=='buy ring of mana regen V') 
{	if($cash<32000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a ring of mana regen V for 32000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 32000"); } 
}
if($input=='buy blue potion') 
{	if($cash<200) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue potion for 200 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200"); } 
}
if($input=='buy blue balm') 
{	if($cash<2000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a blue balm for 2000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bluebalm = bluebalm + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 2000"); } 
}

 
}



?>