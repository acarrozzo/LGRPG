<?php
// --------------------------------------------------------------------------------- Stats TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	

	  $hp = $row['hp'];
	  $hpmax = $row['hpmax'];
	  $mp = $row['sp'];
	  $mpmax = $row['mpmax'];
	  $str = $row['str'];
	  $def = $row['def'];
	
	  $enemy = $row['enemy'];
	  $enemyhpmax = $row['enemyhpmax'];
	  $enemyhp = $row['enemyhp'];
	  $enemyatt = $row['enemyatt'];
  	  $enemydef = $row['enemydef'];
	  
	  $infight = $row['infight'];
	  $endfight = $row['endfight'];
	  $weapontype = $row['weapontype'];
  }
  

  if ($infight >= 1)
  {
  echo
  		 '<h3>'.$username.' vs. '.$enemy.'</h3>
	     <ul class="battle"> 
       <li> HP: '.$hp.' / '.$hpmax.' - HP: '.$enemyhp.' / '.$enemyhpmax.'</li>
	   <li><span="battlestatuscell> STR: '.$str.'</span> DEF: '.$def.'</li>
	   <li><span="battlestatuscell> ATT: '.$enemyatt.'</span> DEF: '.$enemydef.'</li>
		</ul>';
		
		
		
		echo '<br>'.$user.': ['.$damage.' - '.$block.' = '.$damagetotal.' ] '.$enemy.'<br>
		'.$enemy.': ['.$edamage.' - '.$eblock.' - '.$toughnessblock.' = '.$edamagetotal.' ] '.$user;
		
	
  }
  
 	
  else if ($endfight==1 ) { 
  
  		echo 'You have defeated the '.$enemy.'!';
		
		}
		
		
  else {
	echo '<p>not in battle</p>';  
		echo "<br><span class='alt'>infight: ".$infight."
								endfight: ".$endfight."
								weap type: ".$weapontype."<br></span>";
	
  }
    
	 

   