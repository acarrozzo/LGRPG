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
$bp = $row['bp'];
$sp = $row['sp'];
$physicaltraining = $row['physicaltraining'];
$mentaltraining = $row['mentaltraining'];

$cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];

if($input=='shop' || $input=='buy' || $input=='list items' || $input=='list items again') 
{
// ---------------------------------- PAJAMA SHAMAN SHOP - 21
if ($room == 21){
echo 'YOU ENTER THE PAJAMA SHAMAN\'S SHOP<br>';
$message = 'buy
		<div class="shop">
		<h4><span class="alt">pajama shaman</span> general storeXXXXXXXXXX
		</h4>
<form id="mainForm" method="post" action="" name="formInput">
			<h3> Weapons </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy dagger" /> 
			<span class="gold">50c</span> dagger <span>( +1 str )</span><br />

			<h3> Armor </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy basic shield" /> 
			<span class="gold">100c</span> basic shield <span>( +5 def )</span><br />
			
			<input type="submit" class="buyBtn" name="input1" value="buy basic hood" /> 
			<span class="gold">300c</span> basic hood <span>( +1 str, +1 def )</span><br />
			
			<input type="submit" class="buyBtn" name="input1" value="buy pajamas" /> 
			<span class="gold">700c</span> pajamas <span>( +2 all stats )</span><br />
			
			<input type="submit" class="buyBtn" name="input1" value="buy slippers" /> 
			<span class="gold">700c</span> slippers <span>( +1 all stats )</span><br />
			
			<h3>Potions</h3>

			<input type="submit" class="buyBtn" name="input1" value="buy red potion" /> 
			<span class="gold">100c</span> red potion <span>( restores 100 HP )</span><br />
			
			<input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
			<span class="gold">200c</span> blue potion <span>( restores 100 MP )</span><br />
			
<input type="submit" class="learnBtnn" name="input1" value="list items again" />
<input type="submit" class="learnBtnn" name="input1" value="look around" />
	</form></div>';
	include ('update_feed.php');
	$funflag=1; // --- update feed
}

}
if($input=='buy dagger') 
{	if($cash<50) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a dagger for 50 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 50"); 
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
if($input=='buy basic hood') 
{	if($cash<300) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a basic hood for 300 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basichood = basichood + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 300"); 
		} $funflag=1;
}
if($input=='buy pajamas') 
{	if($cash<700) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some pajamas for 700 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET pajamas = pajamas + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 700"); 
		} $funflag=1;
}
if($input=='buy slippers') 
{	if($cash<700) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy some slippers for 700 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET slippers = slippers + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 700"); 
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