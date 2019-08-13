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
 
 
// ---------------------------------------------------------------------------------- // Warriors Shop LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">Warrior\'s Shop<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
						

echo '
<li><span class="h3">1h Weapons </span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron dagger" /> 
			<span class="yellow">1k </span> <span class="lightbrown">iron </span> dagger <span>( <i class="lightred">+7</i> str )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron sword" /> 
			<span class="yellow">3k </span> <span class="lightbrown">iron </span> sword <span>( <i class="lightred">+18</i> str )</span></li>
			
			<li><span class="h3">2h Weapons </span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy polearm" /> 
			<span class="yellow">3k </span> polearm <span>( <i class="lightred">+12</i> str, <i class="gold">+20</i> def )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy iron 2h sword" /> 
			<span class="yellow">5k </span> <span class="lightbrown">iron </span> 2h sword <span>( <i class="lightred">+25</i> str )</span></li>
			
			<li><span class="h3">Accessories </span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy ring of strength V" /> 
			<span class="yellow">16k </span> ring of strength V <span>( <i class="lightred">+5</i> str )</span></li>
			
			<li><input type="submit" class="buyBtn" name="input1" value="buy ring of health regen V" /> 
			<span class="yellow">32k </span> ring of health regen V <span>( <i class="lightred">+5 hp</i> / click )</span></li>
			
			<li><span class="h3">Misc </span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy meatball" /> 
			<span class="gold">250 </span> <span class="lightbrown"></span> meatball <span>( restore <i class="lightred">400</i> hp )</span></li>
			<li><input type="submit" class="buyBtn" name="input1" value="buy red balm" /> 
			<span class="yellow">1k </span> <span class="lightbrown"></span> red balm <span>( restore <i class="lightred">1000</i> hp )</span></li>';			
		

		
		
echo'</form></ul></article>';	

} //end while
?>