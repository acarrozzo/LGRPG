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

 
/*

FOODS

50c cooked meat (+50 hp)

250c meatball (+400 hp) (combine 5 cooked meats)

500c blue fish (+400 mp)

100c veggies (+50 hp, +50 mp)


*/
 
 
// ---------------------------------------------------------------------------------- // vincenzos_shop LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">Vincenzo\'s Meat & Produce Shop<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
echo '<li><span class="h3">Food Stuffs</span></li>';
echo '	

<li><input type="submit" class="buyBtn" name="input1" value="buy cooked meat" /> 
		<span class="gold">50c</span> cooked meat <span>( <i class="lightred">+50</i> HP )</li>
<li><input type="submit" class="buyBtn" name="input1" value="buy meatball" /> 
		<span class="gold">250c</span> meatball <span>( <i class="lightred">+400</i> HP )</li>		
<li><input type="submit" class="buyBtn" name="input1" value="buy bluefish" /> 
		<span class="gold">500c</span> bluefish <span>( <i class="blue">+400</i> MP )</li>		
		
<li><input type="submit" class="buyBtn" name="input1" value="buy veggies" /> 
		<span class="gold">100c</span> veggies <span>( <i class="lightpurple">+50</i> HP, <i class="lightpurple">+50</i> MP )</li>		
		
		
		';


echo'</form></ul></article>';	

} //end while
?>