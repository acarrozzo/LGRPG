<?php
// --------------------------------------------------------------------------------- DUMMY BATTLE
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	

		
		
		$xp=$row['xp'];   
		
		$hp=$row['hp'];      // User Stats
		$hpmax=$row['hpmax'];   
		$mp=$row['mp'];   
		$mpmax=$row['mpmax'];  
		$str=$row['str']; $strmod=$row['strmod'];   
		$dex=$row['dex']; $dexmod=$row['dexmod'];   
		$mag=$row['mag']; $magmod=$row['magmod'];    
		$def=$row['def']; $defmod=$row['defmod']; 
		
		
		$onehanded=$row['onehanded'];   
		$twohanded=$row['twohanded'];   
		$ranged=$row['ranged'];   
		$toughness=$row['toughness'];   
		
		$equipR=$row['equipR'];  
		$level=$row['level'];  

 if ($input == 'attack' || $input == 'a' || $input == 'attack dummy' || $input == 'attack dummy again')
	 {
		 if ($row['weapontype']==3){
			 $damage = rand ( 0 , $row['dexmod']);      
			//$damageskill = rand (0, $ranged);
			//$damage = $damageraw + $damageskill ; 
			$colorDUM='green';		
		}		
		
		else {
		 $damage = rand ( 0 , $row['strmod']);
		 			$colorDUM='lightred';		

		}
		$block = 0;
		$damageTotal = $damage - $block;
		
		 
 		$smash=$level * ($level + 1); // for cheat XP - un-comment below:
		// $results = $link->query("UPDATE $user SET xp = xp + $smash");
		// $results = $link->query("UPDATE $user SET currency = currency + 10000");

		 		 		 
	echo "You attack the Dummy with your $equipR for $damageTotal damage.<br>";
	
			
	$message= <<<HTML
	You attack the Dummy with your <span class='blue'>$equipR</span> for <span class='px40 $colorDUM'>$damageTotal</span> damage.<br>
	
HTML;
		include ('update_feed.php'); // --- update feed
	} 
}
	
	//<form id="mainForm" method="post" action="" name="formInput">
   //<input type="submit" name="input1" class="auto" value="attack dummy again" />
   //</form>
   
   ?>
