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
echo "YOU ENTER THE WIZARDS JEWELER SHOP<br>";
$message = 'buy
		<div class="shop">
		<h4><span class="alt">wizards\'s</span> jeweler
		</h4>
<form id="mainForm" method="post" action="" name="formInput">
			
			<h3>Rings </h3>
			<input type="submit" class="buyBtn" name="input1" value="buy red wizard ring" /> 
			<span class="yellow">10k </span> <span class="red"> red </span> wizard ring <span>( +5 mag, +5 str )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy green wizard ring" /> 
			<span class="yellow">10k </span> <span class="green"> green </span> wizard ring <span>( +5 mag, +5 dex )</span><br />
			<input type="submit" class="buyBtn" name="input1" value="buy yellow wizard ring" /> 
			<span class="yellow">10k </span> <span class="yellow"> yellow </span> wizard ring <span>( +5 mag, +5 def )</span><br />
						
<br/>
<input type="submit" class="learnBtnn" name="input1" value="buy" />
<input type="submit" class="learnBtnn" name="input1" value="sell" />
<input type="submit" class="learnBtnn" name="input1" value="look" />
	</form></div>';
	include ('update_feed.php'); // --- update feed

}
if($input=='buy red wizard ring') 
{	if($cash<10000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a red wizard ring for 10000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET redwizardring = redwizardring + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10000"); } 
}
if($input=='buy green wizard ring') 
{	if($cash<10000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a green wizard ring for 10000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greenwizardring = greenwizardring + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10000"); } 
}
if($input=='buy yellow wizard ring') 
{	if($cash<10000) {echo $message=$toopoor;include ('update_feed.php');}
	else { echo $message = 'You buy a yellow wizard ring for 10000 '.$currency.'<br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET yellowwizardring = yellowwizardring + 1"); 
		$query = $link->query("UPDATE $user SET currency = currency - 10000"); } 
}
 
}



?>