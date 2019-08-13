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
$mentaltraining = $row['mentaltraining'];

$cash = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughbp = $_SESSION['notenoughbp'];
$notenoughsp = $_SESSION['notenoughsp'];

$fireball = $row['fireball'];
$fireball_new = $fireball_cost = ($fireball + 1) ;
if ($fireball_cost > 10) {$fireball_cost = 'max';}

$frostball = $row['frostball'];
$frostball_new = $frostball_cost = $frostball + 1 ;
if ($frostball_cost > 10) {$frostball_cost = 'max';}

$poisondart = $row['poisondart'];
$poisondart_new = $poisondart_cost = $poisondart + 1 ;
if ($poisondart_cost > 10) {$poisondart_cost = 'max';}

$atomicblast = $row['atomicblast'];
$atomicblast_new = $atomicblast_cost = $atomicblast + 1 ;
if ($atomicblast_cost > 5) {$atomicblast_cost = 'max';}

$heal = $row['heal'];
$heal_new = $heal_cost = ($heal + 1);
if ($heal_cost > 10) {$heal_cost = 'max';}

$regenerate = $row['regenerate'];
$regenerate_new = $regenerate_cost = ($regenerate + 1);
if ($regenerate_cost > 10) {$regenerate_cost = 'max';}

$magicarmor = $row['magicarmor'];
$magicarmor_new = $magicarmor_cost = ($magicarmor + 1);
if ($magicarmor_cost > 10) {$magicarmor_cost = 'max';}

$ironskin = $row['ironskin'];
$ironskin_new = $ironskin_cost = ($ironskin + 1);
if ($ironskin_cost > 10) {$ironskin_cost = 'max';}

$wings = $row['wings'];
$wings_new = $wings_cost = ($wings + 1);
if ($wings_cost > 5) {$wings_cost = 'max';}

$gills = $row['gills'];
$gills_new = $gills_cost = ($gills + 1);
if ($gills_cost > 5) {$gills_cost = 'max';}


if ($input=='SP'){		$query = $link->query("UPDATE $user SET sp = sp + 1000"); }

if($input=='list spells' || $input=='list spells again') 
{	
echo 'YOU OPEN THE SPELL MENU<br>';
$message = "list spells
		<div class='shop'>
		<h4><span class='alt'>Wizard's Guild</span> spell shop
		</h4>
<form id='mainForm' method='post' action='' name='formInput'>		
			<h3>Destruction</h3>
			<span class='alt2'>lvl $fireball</span>
			<input type='submit' class='learnBtn' name='input1' value='learn fireball' /> 
			<span class='gold'>cost: $fireball_cost</span> fireball <br />
			
			<span class='alt2'>lvl $frostball</span>
			<input type='submit' class='learnBtn' name='input1' value='learn frostball' /> 
			<span class='gold'>cost: $frostball_cost</span> frostball <br />
			
			<span class='alt2'>lvl $poisondart</span>
			<input type='submit' class='learnBtn' name='input1' value='learn poison dart' /> 
			<span class='gold'>cost: $poisondart_cost</span> poison dart <br />
			
			<span class='alt2'>lvl $atomicblast</span>
			<input type='submit' class='learnBtn' name='input1' value='learn atomic blast' /> 
			<span class='gold'>cost: $atomicblast_cost</span> atomic blast <br />
			
			<h3>Restoration</h3>
			 <span class='alt2'>lvl $heal</span>
			 <input type='submit' class='learnBtn' name='input1' value='learn heal' /> 
			<span class='gold'>cost: $heal_cost</span> heal<br />
			
			 <span class='alt2'>lvl $regenerate</span>
			 <input type='submit' class='learnBtn' name='input1' value='learn regenerate' /> 
			<span class='gold'>cost: $regenerate_cost</span> regenerate<br />
			
			<h3>Alteration</h3>
			 <span class='alt2'>lvl $magicarmor</span>
			 <input type='submit' class='learnBtn' name='input1' value='learn magic armor' /> 
			<span class='gold'>cost: $magicarmor_cost</span> magic armor<br />
			
			 <span class='alt2'>lvl $ironskin</span>
			 <input type='submit' class='learnBtn' name='input1' value='learn iron skin' /> 
			<span class='gold'>cost: $ironskin_cost</span> iron skin<br />
			
			 <span class='alt2'>lvl $wings</span>
			 <input type='submit' class='learnBtn' name='input1' value='learn wings' /> 
			<span class='gold'>cost: $wings_cost</span> wings<br />
			
			 <span class='alt2'>lvl $gills</span>
			 <input type='submit' class='learnBtn' name='input1' value='learn gills' /> 
			<span class='gold'>cost: $gills_cost</span> gills<br />
			
			<br/>
<input type='submit' name='input1' value='list spells' />
<input type='submit' name='input1' value='list skills' />
<input type='submit' name='input1' value='look' />
	</form></div>";
	include ('update_feed.php'); // --- update feed
	
}
if($input=='learn heal') 
{	if ($heal_cost == 'max') { 		
		echo 'You have learned heal as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned heal as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$heal_cost) {echo $message=$notenoughsp;include ('update_feed.php');}		
	else{
		echo 'You spend '.$heal_cost.' sp and increase your heal spell to '.$heal_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $heal_cost sp and increase your heal spell to $heal_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn heal' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";		
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET heal = heal + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $heal_cost"); 
		}
}
if($input=='learn fireball') 
{	if ($fireball_cost == 'max') { 		
		echo 'You have learned fireball as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned fireball as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$fireball_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$fireball_cost.' sp and increase your fireball spell to '.$fireball_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $fireball_cost sp and increase your fireball spell to $fireball_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn fireball' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET fireball = fireball + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $fireball_cost"); 
		 }
}
if($input=='learn frostball') 
{	if ($frostball_cost == 'max') { 		
		echo 'You have learned frostball as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned frostball as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$frostball_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$frostball_cost.' sp and increase your frostball spell to '.$frostball_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $frostball_cost sp and increase your frostball spell to $frostball_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn frostball' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET frostball = frostball + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $frostball_cost"); 
		 }
}
if($input=='learn poison dart') 
{	if ($poisondart_cost == 'max') { 		
		echo 'You have learned poison dart as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned poison dart as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$poisondart_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$poisondart_cost.' sp and increase your poison dart spell to '.$poisondart_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $poisondart_cost sp and increase your poison dart spell to $poisondart_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn poison dart' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET poisondart = poisondart + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $poisondart_cost"); 
		 }
}
if($input=='learn atomic blast') 
{	if ($atomicblast_cost == 'max') { 		
		echo 'You have learned atomic blast as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned atomic blast as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$atomicblast_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$atomicblast_cost.' sp and increase your atomic blast spell to '.$atomicblast_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $atomicblast_cost sp and increase your atomic blast spell to $atomicblast_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn atomic blast' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET atomicblast = atomicblast + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $atomicblast_cost"); 
		 }
}
if($input=='learn regenerate') 
{	if ($regenerate_cost == 'max') { 		
		echo 'You have learned regenerate as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned regenerate as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$regenerate_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$regenerate_cost.' sp and increase your regenerate spell to '.$regenerate_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $regenerate_cost sp and increase your regenerate spell to $regenerate_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn regenerate' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET regenerate = regenerate + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $regenerate_cost"); 
		 }
}
if($input=='learn magic armor') 
{	if ($magicarmor_cost == 'max') { 		
		echo 'You have learned magic armor as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned magic armor as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$magicarmor_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$magicarmor_cost.' sp and increase your magic armor spell to '.$magicarmor_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $magicarmor_cost sp and increase your magic armor spell to $magicarmor_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn magic armor' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET magicarmor = magicarmor + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $magicarmor_cost"); 
		 }
}
if($input=='learn iron skin') 
{	if ($ironskin_cost == 'max') { 		
		echo 'You have learned iron skin as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned iron skin as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$ironskin_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$ironskin_cost.' sp and increase your iron skin spell to '.$ironskin_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $ironskin_cost sp and increase your iron skin spell to $ironskin_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn iron skin' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET ironskin = ironskin + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $ironskin_cost"); 
		 }
}
if($input=='learn wings') 
{	if ($wings_cost == 'max') { 		
		echo 'You have learned wings as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned wings as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$wings_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$wings_cost.' sp and increase your wings spell to '.$wings_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $wings_cost sp and increase your wings spell to $wings_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn wings' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wings = wings + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $wings_cost"); 
		 }
}
if($input=='learn gills') 
{	if ($gills_cost == 'max') { 		
		echo 'You have learned gills as much as you can here. Search out better trainers.<br/>';
		$message = "You have learned gills as much as you can here. Search out better trainers.<br/>";
		include ('update_feed.php'); // --- update feed
		}
	else if($sp<$gills_cost) {echo $message=$notenoughsp;include ('update_feed.php');}
	else { 
		echo 'You spend '.$gills_cost.' sp and increase your gills spell to '.$gills_new.'<br/>';
		$message = "<div class='learnBox'>
		You spend $gills_cost sp and increase your gills spell to $gills_new</div>
		<form id='mainForm' method='post' action='' name='formInput'>		
			<input type='submit' class='auto' name='input1' value='learn gills' />
			<input type='submit' class='auto' name='input1' value='list spells' />
			<input type='submit' class='auto' name='input1' value='look' />
			</form>";	
		include ('update_feed_alt.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gills = gills + 1"); 
		$query = $link->query("UPDATE $user SET sp = sp - $gills_cost"); 
		 }
}


 }
 
 




?>