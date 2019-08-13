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
3000c gladius ( +9 str, +2 mag, +2 def )		// kobold master, skel knight
5k three-chained flail ( +9 str, +9 def )		// sewer pest control reward
5k giant club ( +13 str, -3 mag )			// bigfoot, thief brute
15k great white sword ( +17 str, +7 mag, +7 def ) // shark hunter reward
*200k guardian blade ( +80 str ) 			// ocean guardian


2h
5000c claymore ( +13 str, +2 mag, +2 def )	// ogre lieutenant, scorpion queen
5k polearm ( +16 str, +20 def ) 			// omar the dead, colossal squid
8k bone cudgel ( +32 str, -10 mag, -10 def )	// omar the dead
25k hammerhead hammer ( +35 str, +10 mag, +10 def )	// shark hunter reward
*200k humongous battleaxe ( +150 str, -50 mag ) 	// giant mountain giant

 */
 
 
// ---------------------------------------------------------------------------------- // Michaels Shop LIST!!
echo '<article id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">Michael\'s Weapon Shop<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
echo '<li><span class="h3">One Handed Weapons</span></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy gladius" /> 
		<span class="yellow">3k</span> gladius <span>( <i class="lightred">+9</i> str, <i class="blue">+2</i> mag, <i class="gold">+2</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy three-chained flail" /> 
		<span class="yellow">5k</span> three-chained flail <span>( <i class="lightred">+9</i> str, <i class="gold">+9</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy giant club" /> 
		<span class="yellow">5k</span> giant club <span>( <i class="lightred">+13</i> str, <i class="black">-3</i> mag )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy great white sword " /> 
		<span class="yellow">15k</span> great white sword  <span>( <i class="lightred">+17</i> str, <i class="blue">+7</i> mag, <i class="gold">+7</i> def )</span></li>
		
	<li><input type="submit" class="buyBtn" name="input1" value="buy guardian blade" /> 
		<span class="yellow">200k</span> guardian blade <span>( <i class="lightred">+80</i> str )</span></li>';

echo '<li><span class="h3">Two Handed Weapons</span></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy claymore" /> 
		<span class="yellow">5k</span> claymore <span>( <i class="lightred">+13</i> str, <i class="blue">+2</i> mag, <i class="gold">+2</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy polearm" /> 
		<span class="yellow">5k</span> polearm <span>( <i class="lightred">+16</i> str, <i class="gold">+20</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy bone cudgel" /> 
		<span class="yellow">8k</span> bone cudgel <span>( <i class="lightred">+32</i> str, <i class="black">-10</i> mag, <i class="black">-10</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy hammerhead hammer" /> 
		<span class="yellow">25k</span> hammerhead hammer <span>( <i class="lightred">+35</i> str, <i class="blue">+10</i> mag, <i class="gold">+10</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy humongous battleaxe" /> 
		<span class="yellow">200k</span> humongous battleaxe <span>( <i class="lightred">+150</i> str, <i class="black">-50</i> mag )</span></li>';

echo '<li><span class="h3">Ranged Weapons</span></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy hand crossbow" /> 
		<span class="yellow">20k</span> hand crossbow <span>( <i class="green">+35</i> dex )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy compound crossbow" /> 
		<span class="yellow">20k</span> compound crossbow <span>( <i class="green">+40</i> dex, <i class="gold">+80</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy black crossbow" /> 
		<span class="yellow">200k</span> black crossbow <span>( <i class="green">+150</i> dex, <i class="gold">+50</i> def )</span></li>';
		
echo '<li><span class="h3">Off-Hand Weapons</span></li>';
echo '	
	<li><input type="submit" class="buyBtn" name="input1" value="buy off hand dagger" /> 
		<span class="yellow">3k</span> off hand dagger <span>( <i class="lightred">+5</i> str )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy off hand sword" /> 
		<span class="yellow">15k</span> off hand sword <span>( <i class="lightred">+10</i> str )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy off hand mace" /> 
		<span class="yellow">100k</span> off hand mace <span>( <i class="lightred">+25</i> str )</span>, <i class="blue">+5</i> mag</li>				
		
		';		

echo'</form></ul></article>';	

} //end while

/*
ranged
20k compound crossbow ( +40 dex, +80 def )  	// bowman, great white
20k hand crossbow ( +35??? dex )	 		// bowman
*200k black crossbow ( +150 dex, +50 def ) 	// lizard king

off hand
3k off hand dagger ( +5 str ) 			// master thief // scorpion queen
*15k off hand sword ( +10 str ) 			// troll champion
*100k off hand mace ( +25 str, +5 mag )		// fallen angel 
*/

?>