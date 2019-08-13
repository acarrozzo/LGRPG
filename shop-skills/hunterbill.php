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

$cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughbp = $_SESSION['notenoughbp'];
$notenoughsp = $_SESSION['notenoughsp'];

$ranged = $row['ranged'];$ranged_cost = $ranged_new = $ranged + 1;
if ($ranged_cost > 15) {$ranged_cost = 'max';}

$ddge = $row['ddge'];$ddge_cost = $ddge_new = $ddge + 1;
if ($ddge_cost > 5) {$ddge_cost = 'max';}



if($input=='list skills' || $input=='list skills again') 
{	
echo 'YOU OPEN THE SKILL MENU<br>';
$message = "list skills
		<div class='shop'>
		<h4><span class='alt'>hunter bill</span> skill shop
		</h4>
<form id='mainForm' method='post' action='' name='formInput'>		
			<h3>Offense</h3>
			
			<span>lvl $ranged </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn ranged' /> 
			 ranged <span class='gold'>cost: $ranged_cost </span>
			<input type='submit' class='helpBtn alt' name='input1' value='help ranged' /> 
			<br />
			
			<h3>Defense</h3>
			<span>lvl $ddge </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn dodge' /> 
			 dodge <span class='gold'>cost: $ddge_cost </span>
			<input type='submit' class='helpBtn alt' name='input1' value='help dodge' /> 
			<br />
			<br/>
<input type='submit' name='input1' value='list skills' />
<input type='submit' name='input1' value='look' />
</form>
		
	</form></div>";
	include ('update_feed.php'); // --- update feed
	$funflag=1;
}

if($input=='learn dodge' || $input=='learn dodge again') 
{	if ($ddge >= 5) {
		echo $message="You have learned all the dodge Skill Hunter Bill can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ddge_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$ddge_cost.' sp and increase dodge to '.$ddge_new.'<br/>';
		$message = "You spend $ddge_cost sp and increase dodge to $ddge_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn dodge' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ddge = ddge + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $ddge_cost"); 
		$funflag=1; }
}
if($input=='learn ranged' || $input=='learn ranged again') 
{	if ($ranged >= 15) {
		echo $message="You have learned all the Ranged Weapons Skill Hunter Bill can teach you. Search for more advanced teachers.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$ranged_cost) {echo $message=$notenoughsp;include ('update_feed.php');$funflag=1;}
	else { 
		echo 'You spend '.$ranged_cost.' sp and increase ranged to '.$ranged_new.'<br/>';
		$message = "You spend $ranged_cost sp and increase ranged to $ranged_new
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn ranged' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form> ";	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ranged = ranged + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $ranged_cost"); 
		$funflag=1; }
} 

}
 
 




?>