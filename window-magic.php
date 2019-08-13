<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	


		$heal=$row['heal'];
		$fireball=$row['fireball'];
		
		


echo '<input type="submit" class="long" name="input1" value="recall" />  <span class="darkblue"> ( teleport home ) </span><br/>';

	
	
	$fireballmaxhit = 12;
	
	
if ($fireball>=1){
echo '
	<input type="submit" class="long" name="input1" value="cast fireball" /> 
		lvl: '.$fireball.' <span class="red"> ( max hit: $fireballmaxhit ) </span><br/>';}

if ($heal>=1){
echo '
	<input type="submit" class="long" name="input1" value="cast heal" /> 
		lvl: '.$heal.' <span class="red"> ( heal with magic ) </span><br/>';}


}
 




?>