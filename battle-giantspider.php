<?php
session_start();
// -- --------------------------------- SPIDER BATTLE

// -------------------------DB CONNECT!
include ('db-connect.php'); 

	
	$result = mysql_query("SELECT * FROM $username");    // Retreive variables for battle
   
	if ($load != 2)
	{
	while($row = mysql_fetch_array($result))
   {	  
		$gold=$row['currency'];   
		$xp=$row['xp'];   
		
		$hp=$row['hp'];      // User Stats
		$hpmax=$row['hpmax'];   
		$sp=$row['sp'];   
		$maxsp=$row['maxsp'];  
		$att=$row['att'];   
		$def=$row['def'];   
		$mag=$row['mag'];   
		$equipR=$row['equipR'];   
		$equipL=$row['equipL'];   
		
		$spiderhpmax = 7 ;  // Spider Stats
		$spider1hp=$row['spider1hp'];   
		$spideratt = 2 ;
		$spiderdef = 1 ;
 
	}
			$load=2; 
	}
	

if ($input == 'attack giant spider' || $input == 'a giant spider')
{
	
	
	
	if ($spiderfight !=2)
	
	{
	
    echo "Giant Spider Fight!!!!<br>";

	
	
	

 if ($input == 'attack giant spider' || $input == 'a giant spider')
	 {
		$damage = rand ( 0 , $att);        // USER ATTACK
		$block = rand (0, $spiderdef);
		$damagetotal = $damage - $block;
		 		 
		$edamage = rand ( 0 , $spideratt); // SPIDER ATTACK
		$eblock = rand ( 0 , $def);
		$edamagetotal = $edamage - $eblock;	 
		
		if ($damagetotal <= 0)  // if negative damage make 0
		 {
			$damagetotal = 0; 
		 }
	 	if ($edamagetotal <= 0)
		 {
			$edamagetotal = 0; 
		 }

		// $hp = $hp - $edamagetotal;            // remove hp 
		//$spiderhp = $spiderhp - $damagetotal; // remove hp
		
	$sqlhp1 = "UPDATE $user SET hp = hp - $edamagetotal"; // SUBTRACT YOUR HP 
	mysql_query($sqlhp1);
	$sqlhp2 = "UPDATE $user SET spider1hp = spider1hp - $damagetotal"; // SUBTRACT SPIDER HP 
	mysql_query($sqlhp2);
	
	$result = mysql_query("SELECT * FROM $username");    // Retreive spider1HP
	while($row = mysql_fetch_array($result))
   {	  
		$spider1hp=$row['spider1hp'];   
		$hp=$row['hp'];   
	}
									 
		echo "You attack the Spider for $damagetotal damage";
		$message="<p>You attack the Spider with your $equipR for $damage damage. The Spider absorbs $block damage for a total of $damagetotal <br>[ $damage - $block = $damagetotal ]</p>";

		$message2="<p>The Spider attacks you for $edamage damage. You absorb $eblock damage for a total of $edamagetotal <br>[ $edamage - $eblock = $edamagetotal ]</p>
				<p>$username HP: $hp / $hpmax<br>
					Spider HP: $spider1hp / $spiderhpmax </p>";
					
	file_put_contents("feed-log.html", $command.$message.$message2, FILE_APPEND); //writes last command to feed-log.html
	
	if ($hp <= 0)
	{
	echo "You have died!";
	$died="<i>You Have Died!</i></br>";
	file_put_contents("feed-log.html", $command.$died, FILE_APPEND); //writes last command to feed-log.html
   $sql = "UPDATE $user SET room = 0"; // ROOM CHANGE - to 999
   mysql_query($sql);	
	$spiderfight = 2;  // flag if battle is over

	}
	if ($spider1hp <= 0)
	{
	$currencyadd = rand ( 1 , 6 );	 // RANDOM GOLD 1-6
	$win="<i>You have defeated the Spider!</i></br>	
		[ $currency + $currencyadd ]<br />
      [ xp + 1 ]</p>";
	file_put_contents("feed-log.html", $command.$win, FILE_APPEND); //writes last command to feed-log.html
	
	$sql1 = "UPDATE $user SET xp = xp + 1"; // xp + 1 
	mysql_query($sql1);
	$sql2 = "UPDATE $user SET gold = gold + $currencyadd"; // gold + ( 1 - 6 )
   mysql_query($sql2);
	$sql3 = "UPDATE $user SET spiderkill = spiderkill + 1"; // spider kill + 1
   mysql_query($sql3);
	$sql3 = "UPDATE $user SET spider1hp = 7"; // Reset Spider 1 HP
   mysql_query($sql3);
	
	
	$spiderfight = 2;  // flag if battle is over

	
	
	
		
	 } 
    
   }
	 
	 else if ($input == 're' || $input == 'retreat')
	 {
		$retreat = 2; // Flag if you retreat
		
		echo 'You run away';
	
	
	 }
	 
	 $attackcom = $_SESSION['desc000'] = <<<HTML
   <html>	
	<p><a href="#" onclick="document.forms[0].input1.value='attack spider';document.forms[mainForm].submit();">attack spider</a></p>
   </html>
HTML;
		file_put_contents("feed-log.html", $command.$attackcom, FILE_APPEND); //writes last command to feed-log.html

	 
	}
	$funflag=1;	

	}
	 
    ?>