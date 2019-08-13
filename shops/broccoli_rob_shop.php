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



// ---------------------------------------------------------------------------------- // Broccoli Rob Shop LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">BROCCOLI ROB SHOP<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
						


echo '<li><span class="h3">Consumables</span></li>';

echo '<br>
<li><input type="submit" class="buyBtn" name="input1" value="buy redberry" /> 
		<span class="gold">10</span> redberry <span>( <i class="lightred">+10</i> HP )</li>';
echo '<br>
<li><input type="submit" class="buyBtn" name="input1" value="buy blueberry" /> 
		<span class="gold">20</span> blueberry <span>( <i class="blue">+10</i> MP )</li>';
	
echo '<br>
<li><input type="submit" class="buyBtn" name="input1" value="buy veggies" /> 
		<span class="gold">100</span> veggies <span>( <i class="lightpurple">+50</i> HP, <i class="lightpurple">+50</i> MP )</li>';
	
echo'</form></ul></article>';	

} //end while
?>