<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	


		$heal=$row['heal'];
		$purplepotion=$row['purplepotion'];
		$redpotion=$row['redpotion'];
		$bluepotion=$row['bluepotion'];
		$cookedmeat=$row['cookedmeat'];
		$rawmeat=$row['rawmeat'];
		$redberry=$row['redberry'];
		$blueberry=$row['blueberry'];

		$veggies=$row['veggies'];
		$meatball=$row['meatball'];

		
	
if ($heal>=1){
echo '<input type="submit" class="long" name="input1" value="cast heal" /> 
		lvl: '.$heal.' <span class="red"> ( heal with magic ) </span><br/>';}

if ($purplepotion>=1){
echo '<input type="submit" class="long" name="input1" value="drink purple potion" /> 
		<span>x</span>'.$purplepotion.' <span class="purple"> ( +200 HP / MP ) </span><br/>';}

if ($meatball>=1){
echo '<input type="submit" class="long" name="input1" value="eat meatball" /> 
		<span>x</span>'.$meatball.' <span class="red"> ( +400 HP ) </span><br/>';}
				
if ($veggies>=1){
echo '<input type="submit" class="long" name="input1" value="eat veggies" /> 
		<span>x</span>'.$veggies.' <span class="purple"> ( +50 HP / MP ) </span><br/>';}
		
if ($redpotion>=1){
echo '<input type="submit" class="long" name="input1" value="drink red potion" /> 
		<span>x</span>'.$redpotion.' <span class="red"> ( +100 HP ) </span><br/>';}

if ($bluepotion>=1){

echo '<input type="submit" class="long" name="input1" value="drink blue potion" /> 
		<span>x</span>'.$bluepotion.' <span class="darkblue"> ( +100 MP ) </span><br/>';}

if ($cookedmeat>=1){

echo '<input type="submit" class="long" name="input1" value="eat cooked meat" /> 
		<span>x</span>'.$cookedmeat.' <span class="red"> ( +50 HP ) </span><br/>	';}

if ($rawmeat>=1){

echo '<input type="submit" class="long" name="input1" value="eat raw meat" /> 
		<span>x</span>'.$rawmeat.' <span class="red"> ( +25 HP ) </span><br/>';}

if ($redberry>=1){

echo '	<input type="submit" class="long" name="input1" value="eat redberry" /> 
		<span>x</span>'.$redberry.' <span class="red"> ( +5 HP ) </span><br/>';}

if ($blueberry>=1){

echo '	<input type="submit" class="long" name="input1" value="eat blueberry" /> 
		<span>x</span>'.$blueberry.' <span class="darkblue"> ( +5 MP ) </span><br/>';	}		
	
	

}
 




?>