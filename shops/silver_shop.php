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



// ---------------------------------------------------------------------------------- // SILVER SHOP LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">SILVER SHOP<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
						



echo '
			<li><span class="h3">Weapons </span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver sword" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> sword <span>( <i class="lightred">+25</i> str, <i class="blue">+5</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver staff" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> staff <span>( <i class="blue">+25</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver 2h sword" /> 
			<span class="yellow">60k </span> <span class="lightblue">silver </span> 2h sword <span>( <i class="lightred">+45</i> str, <i class="blue">+5</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver boomerang" /> 
			<span class="yellow">40k </span> <span class="lightblue">silver </span> boomerang <span>( <i class="green">+20</i> dex, <i class="blue">+5</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver bow" /> 
			<span class="yellow">50k </span> <span class="lightblue">silver </span> bow <span>( <i class="green">+30</i> dex, <i class="blue">+5</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver crossbow" /> 
			<span class="yellow">60k </span> <span class="lightblue">silver </span> crossbow <span>( <i class="green">+40</i> dex, <i class="blue">+5</i> mag )</span></li>
			<li><span class="h3">Armor</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver shield" /> 
			<span class="yellow">30k </span> <span class="lightblue">silver </span> shield <span>( <i class="gold">+50</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver helmet" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> helmet <span>( <i class="gold">+40</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver breastplate" /> 
			<span class="yellow">30k </span> <span class="lightblue">silver </span> breastplate <span>( <i class="gold">+50</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver gauntlets" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> gauntlets <span>( <i class="gold">+30</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver boots" /> 
			<span class="yellow">20k </span> <span class="lightblue">silver </span> boots <span>( <i class="gold">+30</i> def, <i class="blue">+1</i> mag )</span></li>
			<li><span class="h3">Accessories & Keys </span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver ring" /> 
			<span class="yellow">100k </span> <span class="lightblue">silver </span> ring <span>( <i class="cyan">+10</i> all stats )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver necklace" /> 
			<span class="yellow">200k </span> <span class="lightblue">silver </span> necklace <span>( <i class="cyan">+20</i> all stats )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy silver key" /> 
			<span class="yellow">10k </span> <span class="lightblue">silver </span> key <span></span></li>
			
';
		
		
		
echo'</form></ul></article>';	

} //end while
?>