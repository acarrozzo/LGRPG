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
// --------------------------------------------------- ------------------------------- // START VARIABLES

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


// ---------------------------------------------------------------------------------- // Mining SHOP LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">MINING SUPPLY SHOP<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
						
//echo '<li><span class="h3">Pickaxes</span></li>';

echo '	
		<br><br><br>
		<li><input type="submit" class="buyBtn" name="input1" value="buy pickaxe" /> 
			<span class="yellow">5k</span> pickaxe <span>( mines stone )</span></li>
	  	<li><input type="submit" class="buyBtn" name="input1" value="buy hammer" /> 
			<span class="yellow">5k</span> hammer <span>( craft basic equipment )</span></li>
	  	<br>
		<li><input type="submit" class="buyBtn" name="input1" value="buy iron pickaxe" /> 
			<span class="yellow">15k</span> <span class="lightbrown">iron</span> pickaxe <span>( mines iron & stone )</span></li>
	  	<li><input type="submit" class="buyBtn" name="input1" value="buy iron hammer" /> 
			<span class="yellow">15k</span> <span class="lightbrown">iron</span> hammer <span>( craft w/ iron )</span></li>
	  	<br>
		<li><input type="submit" class="buyBtn" name="input1" value="buy steel pickaxe" /> 
			<span class="yellow">50k</span> <span class="gray">steel</span> pickaxe <span>( mines coal, iron & stone )</span></li>
	  	<li><input type="submit" class="buyBtn" name="input1" value="buy steel hammer" /> 
			<span class="yellow">50k</span> <span class="gray">steel</span> hammer <span>( craft w/ steel )</span></li>
	  	
		<br>
		<li><input type="submit" class="buyBtn" name="input1" value="buy mithril pickaxe" /> 
			<span class="yellow">250k</span> <span class="blue">mithril</span> pickaxe <span>( mines mithril )</span></li>						
		<li><input type="submit" class="buyBtn" name="input1" value="buy mithril hammer" /> 
			<span class="yellow">250k</span> <span class="blue">mithril</span> hammer <span>( craft w/ mithril )</span></li>						
	';	

echo'</form></ul></article>';	

} //end while
?>