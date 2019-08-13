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
echo "YOU ENTER THE SILVER SHOP<br>";
$message = 'buy
		<div class="shop">
		<h4><span class="alt">SILVER</span> SHOP
		</h4> 
<form id="mainForm" method="post" action="" name="formInput">
			<h3>Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy silver sword" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> sword <span>( +25 str, +1 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver staff" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> staff <span>( +25 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver 2h sword" /> 
			<span class="yellow">60k </span> <span class="lightblue">silver </span> 2h sword <span>( +45 str, +1 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver boomerang" /> 
			<span class="yellow">40k </span> <span class="lightblue">silver </span> boomerang <span>( +20 dex, +1 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver bow" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> bow <span>( +30 dex, +1 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver crossbow" /> 
			<span class="yellow">60k </span> <span class="lightblue">silver </span> crossbow <span>( +40 dex, +1 mag )</span><br />
			<h3>Armor </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy silver shield" /> 
			<span class="yellow">30k </span> <span class="lightblue">silver </span> shield <span>( +50 def, +1 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver helmet" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> helmet <span>( +40 def, +1 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver breastplate" /> 
			<span class="yellow">30k </span> <span class="lightblue">silver </span> breastplate <span>( +50 def, +1 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver gauntlets" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> gauntlets <span>( +30 def, +1 mag )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver boots" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> boots <span>( +30 def, +1 mag )</span><br />
			<h3>Accessories & Keys </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy silver ring" /> 
			<span class="yellow">100k </span> <span class="lightblue">silver </span> ring <span>( +10 all stats )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver necklace" /> 
			<span class="yellow">200k </span> <span class="lightblue">silver </span> necklace <span>( +20 all stats )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy silver key" /> 
			<span class="yellow">10k </span> <span class="lightblue">silver </span> key <span></span><br />
			
					
		
			
<br/><input type="submit" class="learnBtnn" name="input1" value="buy" />
<input type="submit" class="learnBtnn" name="input1" value="sell" />
<input type="submit" class="learnBtnn" name="input1" value="look" />
	</form></div>';
	include ('update_feed.php'); // --- update feed
}






if($input=='buy silver sword') 
{	if($cash<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver sword for 50k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silversword = silversword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50000"); } 
}
if($input=='buy silver staff') 
{	if($cash<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver staff for 50k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverstaff = silverstaff + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50000"); } 
}
if($input=='buy silver 2h sword') 
{	if($cash<60000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver 2h sword for 60k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silver2hsword = silver2hsword + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 60000"); } 
}
if($input=='buy silver boomerang') 
{	if($cash<40000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver boomerang for 40k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverboomerang = silverboomerang + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 40000"); } 
}
if($input=='buy silver bow') 
{	if($cash<50000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver bow for 50k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverbow = silverbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50000"); } 
}
if($input=='buy silver crossbow') 
{	if($cash<60000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver crossbow for 60k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvercrossbow = silvercrossbow + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 60000"); } 
}



if($input=='buy silver shield') 
{	if($cash<30000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver shield for 30k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvershield = silvershield + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 30000"); } 
}
if($input=='buy silver helmet') 
{	if($cash<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver helmet for 20k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverhelmet = silverhelmet + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 20000"); } 
}
if($input=='buy silver breastplate') 
{	if($cash<30000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver breastplate for 30k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverbreastplate = silverbreastplate + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 30000"); } 
}
if($input=='buy silver gauntlets') 
{	if($cash<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver gauntlets for 20k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvergauntlets = silvergauntlets + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 20000"); } 
}
if($input=='buy silver boots') 
{	if($cash<20000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver boots for 20k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverboots = silverboots + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 20000"); } 
}



if($input=='buy silver ring') 
{	if($cash<100000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver ring for 100k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverring = silverring + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 100000"); } 
}
if($input=='buy silver necklace') 
{	if($cash<200000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver necklace for 200k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silvernecklace = silvernecklace + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 200000"); } 
}
if($input=='buy silver key') 
{	if($cash<10000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a silver key for 10k '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET silverkey = silverkey + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10000"); } 
}





}



?>