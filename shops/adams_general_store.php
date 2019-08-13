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

Weapons
 50c dagger ( +1 str )
 400c long sword ( +4 str )
Ammo
 100c arrows x10 
 200c bolts x10 
Misc
 10c redberry ( restores 5 HP )
 20c blueberry ( restores 5 MP )
 
 */
 
 
// ---------------------------------------------------------------------------------- // ADAMS GENERAL STORE LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">Adam\'s General Store<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
						
echo '<li><span class="h3">Weapons</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy dagger" /> 
		<span class="gold">50</span> dagger <span>( <i class="lightred">+1</i> str )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy long sword" /> 
		<span class="gold">400</span> long sword <span>( <i class="lightred">+5</i> str )</span></li>';

echo '<li><span class="h3">Ammo</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy 10 arrows" /> 
			<span class="gold">100</span> arrows <span class="gray">x<i>10</i></span> <span></span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy 10 bolts" /> 
			<span class="gold">200</span> bolts <span class="gray">x<i>10</i></span> <span></span></li>';

echo '<li><span class="h3">Berries</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy redberry" /> 
			<span class="gold">10</span> redberry <span>( restore <i class="lightred">10</i> HP )</span><br /></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy blueberry" /> 
			<span class="gold">20</span> blueberry <span>( restore <i class="blue">10</i> MP )</span><br /></li>';

echo '<li><span class="h3">Potions</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy red potion" /> 
		<span class="gold">100</span> red potion <span>( restore <i class="lightred">100</i> HP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
		<span class="gold">200</span> blue potion <span>( restore <i class="blue">100</i> MP )</li>';	
		
echo '<li><span class="h3">Food</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy meatball" /> 
		<span class="gold">250</span> meatball <span>( restore <i class="lightred">400</i> HP )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy bluefish" /> 
		<span class="gold">500</span> bluefish <span>( restore <i class="blue">400</i> MP )</li>';				
		
echo'</form></ul></article>';	

} //end while
?>