<?php
// --------------------------------------------------------------------------------- SHOP TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	  


// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES 
// ---------------------------------------------------------------------------------- // START VARIABLES

$level = $row['level'];
$room = $row['room'];
$xp = $row['xp'];
$hp = $row['hpmax'];
$mp = $row['mpmax'];
$bp = $row['bp'];
$sp = $row['sp'];

$coin = $currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];
$notenoughbp = $_SESSION['notenoughbp'];
$notenoughsp = $_SESSION['notenoughsp'];

$quest4 = $row['quest4']; // 1h, 2h, LVL 5
$teleport2 = $row['teleport2']; // 1h, 2h, LVL 10
$quest19 = $row['quest19']; // Warriors Guild Initiation
$quest20 = $row['quest20']; // Wizards Guild Initiation

// ---------------------------------------------------------------------------------- // BASIC SHOP LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">BASIC SHOP<span class="spCount">You have <i class="px20 gold">'.$coin.'</i> coin</span></span>';
						
echo '<li><span class="h3">One Handed Weapons</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy dagger" /> 
		<span class="gold">50</span> dagger <span>( <i class="lightred">+1</i> str )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy mace" /> 
		<span class="gold">400</span> mace <span>( <i class="lightred">+4</i> str, <i class="blue">+2</i> mag )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy broad sword" /> 
		<span class="gold">400</span> broad sword <span>( <i class="lightred">+4</i> str, <i class="gold">+2</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy long sword" /> 
		<span class="gold">400</span> long sword <span>( <i class="lightred">+5</i> str )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy basic staff" /> 
		<span class="gold">200</span> basic staff <span>( <i class="blue">+3</i> mag )</span></li>';

echo '<li><span class="h3">Shields</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy buckler" /> 
		<span class="gold">200</span> buckler <span>( <i class="gold">+5</i> def, <i class="lightred">+2</i> str )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy kite shield" /> 
		<span class="gold">400</span> kite shield <span>( <i class="gold">+20</i> def, <i class="black">-5</i> mag )</li>';	


echo '<li><span class="h3">Armor</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy basic hood" /> 
		<span class="gold">500</span> basic hood <span>( <i class="lightred">+1</i> str, <i class="green">+1</i> dex, <i class="blue">+1</i> mag )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy padded armor" /> 
		<span class="gold">500</span> padded armor <span>( <i class="gold">+13</i> def )</span></li>
		
	<li><input type="submit" class="buyBtn" name="input1" value="buy black gloves" /> 
		<span class="gold">500</span> black gloves <span>( <i class="lightred">+1</i> str, <i class="gold">+2</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy black boots" /> 
		<span class="gold">500</span> black boots <span>( <i class="lightred">+1</i> str, <i class="blue">+1</i> mag )</span></li>';			



echo '<li><span class="h3">Potions</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy red potion" /> 
		<span class="gold">100</span> red potion <span>( restore <i class="lightred">100</i> HP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
		<span class="gold">200</span> blue potion <span>( restore <i class="blue">100</i> MP )</li>';				
		
echo'</form></ul></article>';	

} //end while
?>