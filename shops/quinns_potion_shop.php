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

$coin = $currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];


// ---------------------------------------------------------------------------------- // Quinns potions shop LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">Quinn\'s Potion Shop<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';

echo '<li><span class="h3">Potions</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy red potion" /> 
		<span class="gold">100</span> red potion <span>( restore <i class="lightred">100</i> HP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
		<span class="gold">200</span> blue potion <span>( restore <i class="blue">100</i> MP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy purple potion" /> 
		<span class="gold">400</span> purple potion <span>( restore <i class="lightpurple">200</i> HP & MP )</li><br>';	
		
		echo '<li><input type="submit" class="buyBtn" name="input1" value="buy red balm" /> 
		<span class="gold">1000</span> red balm <span>( restore <i class="lightred">1000</i> HP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy blue balm" /> 
		<span class="gold">2000</span> blue balm <span>( restore <i class="blue">1000</i> MP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy purple balm" /> 
		<span class="gold">4000</span> purple balm <span>( restore <i class="lightpurple">2000</i> HP & MP )</li><br>';	
		
	
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy wings potion" /> 
		<span class="gold">500</span> wings potion <span>( <i class="lightblue">fly</i> for 100 clicks )</li>';		
		
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy gills potion" /> 
		<span class="gold">500</span> gills potion <span>( <i class="blue">breath water</i> for 100 clicks )</li>';		
		
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy antidote potion" /> 
		<span class="gold">500</span> antidote potion <span>( <i class="green">cure poison</i> & immune for 10 clicks )</li>';		
		
				
		
echo'</form></ul></article>';	

} //end while
?>