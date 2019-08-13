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


$mentaltraining = $row['mentaltraining'];$mentaltraining_cost = $mentaltraining_new = $mentaltraining + 1;
if ($mentaltraining_cost > 20) {$mentaltraining_cost = 'max';}


if($input=='list skills' || $input=='list skills again') 
{	
echo 'YOU OPEN THE SKILL MENU<br>';
$message = "list skills
		<div class='shop'>
		<h4><span class='alt'>Wizard's Guild</span> skill shop
		</h4>
<form id='mainForm' method='post' action='' name='formInput'>		
			

			<h3>Training</h3>
			<span class='alt2'>lvl $mentaltraining </span> 
			<input type='submit' class='learnBtn' name='input1' value='learn mental training' /> 
			<span class='gold'>cost: $mentaltraining_cost </span> mental training 
			<input type='submit' class='helpBtn alt' name='input1' value='help mental training' /> 
			<br />
			
		
			<br/>
<input type='submit' name='input1' value='list skills' />
<input type='submit' name='input1' value='look' /></form>
		
	</form></div>";
	include ('update_feed.php'); // --- update feed
	
}


if($input=='learn mental training' || $input=='learn mental training again') 
{	if ($mentaltraining == 'max') {
		echo $message="You have learned all the mental Training Skill the Guild can teach you.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if($sp<$mentaltraining_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$mentaltraining_cost.' sp and increase mental training to '.$mentaltraining_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $mentaltraining_cost sp and increase mental training to $mentaltraining_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn mental training' />
			<input type='submit' class='auto' name='input1' value='list skills' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mentaltraining = mentaltraining + 1"); 
	    $query = $link->query("UPDATE $user SET sp = sp - $mentaltraining_cost"); 
	 }
}



}
 
 




?>