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



// ---------------------------------------------------------------------------------- // Wizard SHOP LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">WIZARD SHOP<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
						



echo '

<li><span class="h3">1h Weapons </span></li> 
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron staff" /> 
			<span class="yellow">3k </span> <span class="lightbrown">iron </span> staff <span>( <i class="blue">+10</i> mag, <i class="lightred">+3</i> str )</span></li>
			
			<li><span class="h3">2h Weapons </span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron battle staff" /> 
			<span class="yellow">5k </span> <span class="lightbrown">iron </span> battle staff <span>( <i class="blue">+12</i> mag, <i class="lightred">+12</i> str )</span></li>
			
			<li><span class="h3">Accessories </span>
			<li><input type="submit" class="buyBtn" name="input1" value="buy ring of magic V" /> 
			<span class="yellow">16k </span> ring of magic V <span>( <i class="blue">+5</i> mag )</span></li>
			
			<li><input type="submit" class="buyBtn" name="input1" value="buy ring of mana regen V" /> 
			<span class="yellow">32k </span> ring of mana regen V <span>( <i class="blue">+5</i> mp / click )</span></li>
			
			<li><span class="h3">Misc </span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy blue potion" /> 
			<span class="gold">200 </span> blue potion <span>(  restore <i class="blue">100</i> MP  )</span></li>
		<li><input type="submit" class="buyBtn" name="input1" value="buy blue balm" /> 
			<span class="yellow">2k </span> blue balm <span>(  restore <i class="blue">1000</i> MP  )</span></li>';

		
		
echo'</form></ul></article>';	

} //end while
?>