<?php
session_start();
// -- --------------------------------- SPIDER BATTLE 

$infight = $_SESSION['infight']	=  1;

$equipR = "Training Sword";

// -------------------------DB CONNECT!
include ('db-connect.php'); 

	
	$result = mysql_query("SELECT * FROM $username");    // Retreive variables for battle
   
	if ($load != 2)
	{
	$e1 = "UPDATE $user SET enemy = Spiderrr"; // Reset Enemy HP
   mysql_query($e1);
	$e2 = "UPDATE $user SET enemyhp = enemyhpmax"; // Reset Enemy HP
   mysql_query($e2);	
		
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
		//$equipR=$row['equipR'];   
		$equipL=$row['equipL'];   
					
					
		$enemy=$row['enemy'];     // Spider Stats
		$enemyhpmax=$row['enemyhpmax'];
		$enemyhp=$row['enemyhp'];
		$enemyatt=$row['enemyatt']; 
		$enemydef=$row['enemydef']; 
	}
			$load=2; 			
			
			
	}
	
	
	$damage = rand ( 0 , $att);        // USER ATTACK
		$block = rand (0, $enemydef);
		$damagetotal = $damage - $block;
		 		 
		$edamage = rand ( 0 , $enemyatt); // SPIDER ATTACK
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
		 
		 $sqlhp1 = "UPDATE $user SET hp = hp - $edamagetotal"; // SUBTRACT YOUR HP 
	mysql_query($sqlhp1);
	$message2="<p>The $enemy attacks you for $edamage damage. You absorb $eblock damage for a total of $edamagetotal <br>[ $edamage - $eblock = $edamagetotal ]</p>
				<p> spider [ $edamage - $eblock = <span class='red'><strong>$edamagetotal</strong></span> ] $username <br>";
					
	file_put_contents("feed-log.html",$message2, FILE_APPEND); //writes last command to feed-log.html

if ($input == 'attack spider' || $input == 'a spider' || $input == 'a' || $input == 'attack')
{
	if ($infight !=2)
	{
    echo "Spider Fight!!!!<br>";
		// $hp = $hp - $edamagetotal;            // remove hp 
		//$enemyhp = $enemyhp - $damagetotal; // remove hp
	$sqlhp2 = "UPDATE $user SET enemyhp = enemyhp - $damagetotal"; // SUBTRACT SPIDER HP 
	mysql_query($sqlhp2);
	
	$result = mysql_query("SELECT * FROM $username");    // Retreive spider1HP
	while($row = mysql_fetch_array($result))
    {	  
		$enemyhp=$row['enemyhp'];   
		$hp=$row['hp'];   
	 }
									 
		echo "You attack the Spider for $damagetotal damage";
		$message="<p>You attack the Spider with your $equipR for $damage damage. The Spider absorbs $block damage for a total of $damagetotal <br><br />
      
						<p> $username [ $damage - $block = <span class='red'><strong>$damagetotal</strong></span> ] $enemy<br>
								$username HP: $hp / $hpmax<br>
					Spider HP: $enemyhp / $enemymaxsp </p>";
					
	file_put_contents("feed-log.html",$message, FILE_APPEND); //writes last command to feed-log.html
	   
	 
	 if ($input == 're' || $input == 'retreat')
	 {
		$retreat = 2; // Flag if you retreat
		echo 'You run away';
		$endfight = $_SESSION['endfight']	=  2;
	 }
	 
	
	}
	               
	if ($hp <= 0)          // ------------------------ YOU DIE
	 {
	echo "You have died!";
	$died="<i>You Have Died!</i></br>";
	file_put_contents("feed-log.html", $command.$died, FILE_APPEND); //writes last command to feed-log.html
   $sql = "UPDATE $user SET room = 0"; // ROOM CHANGE - to 999
   mysql_query($sql);	
	$sql = "UPDATE $user SET hp = hpmax"; // ROOM CHANGE - to 999
   mysql_query($sql);	
	$endfight = $_SESSION['endfight'] =  2;  // flag if battle is over
	$infight = $_SESSION['infight']	=  2;  // flag if battle is over
	 }
	else if ($enemyhp <= 0)            // ------------------------ ENEMY DIES
	{
	$currencyadd = rand ( 1 , 6 );	 // RANDOM GOLD 1-6
	$win="<i>You have defeated the $enemy!</i></br>	
		[ $currency + $currencyadd ]<br />
      [ xp + 1 ]</p>";
	file_put_contents("feed-log.html", $command.$win, FILE_APPEND); //writes last command to feed-log.html
	
	$sql1 = "UPDATE $user SET xp = xp + 1"; // xp + 1 
	mysql_query($sql1);
	$sql2 = "UPDATE $user SET gold = gold + $currencyadd"; // gold + ( 1 - 6 )
   mysql_query($sql2);
	$sql3 = "UPDATE $user SET spiderkill = spiderkill + 1"; // spider kill + 1
   mysql_query($sql3);
	$sql3 = "UPDATE $user SET enemyhp = enemyhpmax"; // Reset Enemy HP
   mysql_query($sql3);
	
	$endfight = $_SESSION['endfight']	=  2;  // flag if battle is over
	$infight = $_SESSION['infight']	=  2;  // flag if battle is over
   }
	
	 
	if ($infight ==1)    //  ---- Battle Commands
	 {
	 $attackcom = $_SESSION['desc000'] = <<<HTML
   <html>	
	<p>
	<a href="#" onclick="document.forms[0].input1.value='attack';document.forms[mainForm].submit();">attack</a>
	<a href="#" onclick="document.forms[0].input1.value='retreat';document.forms[mainForm].submit();">retreat</a>
	</p>
   </html>
HTML;
		file_put_contents("feed-log.html",$attackcom, FILE_APPEND); //writes last command to feed-log.html
	}
	
	
	$funflag=1;
		

	}
	 
    ?>