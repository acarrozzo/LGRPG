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



// ---------------------------------------------------------------------------------- // PAJAMA SHAMAN SHOP LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">Pajama Shaman Shop<span class="spCount">You have <i class="px20 gold">'.$coin.'</i> coin</span></span>';
						
echo '<li><span class="h3">One Handed Weapons</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy flail" /> 
		<span class="gold">1200</span> flail <span>( <i class="lightred">+7</i> str, <i class="gold">+3</i> def )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy morning star" /> 
		<span class="gold">1200</span> morning star <span>( <i class="lightred">+7</i> str, <i class="blue">+3</i> mag )</span></li>
	<li><input type="submit" class="buyBtn" name="input1" value="buy gladius" /> 
		<span class="gold">3000</span> gladius <span>( <i class="lightred">+9</i> str, <i class="blue">+2</i> mag, <i class="gold">+2</i> def )</span></li>';
echo '<li><span class="h3">Two Handed Weapons</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy battle axe" /> 
		<span class="gold">800</span> battle axe <span>( <i class="lightred">+10</i> str, <i class="black">-2</i> def )</span></li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy warhammer" /> 
		<span class="gold">900</span> warhammer <span>( <i class="lightred">+12</i> str, <i class="black">-5</i> def )</span></li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy claymore" /> 
		<span class="gold">5000</span> claymore <span>( <i class="lightred">+13</i> str, <i class="blue">+2</i> mag, <i class="gold">+2</i> def )</span></li>';	 
echo '<li><span class="h3">Ranged Weapons</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy long bow" /> 
		<span class="gold">1500</span> long bow <span>( <i class="green">+11</i> dex )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy arrows" /> 
		<span class="gold">100</span> arrows <span class="gray">x<i>10</i></span></li>';
echo '<li><span class="h3">Armor Set</span> <span class=" px12">( set bonus: equip both and get an extra +2 boost to all stats )</span></li>';
echo '<li><input type="submit" class="buyBtn" name="input1" value="buy pajamas" /> 
		<span class="gold">700</span> pajamas <span>( <i class="cyan">+2</i> all stats )</li>
	 <li><input type="submit" class="buyBtn" name="input1" value="buy slippers" /> 
		<span class="gold">700</span> slippers <span>( <i class="cyan">+1</i> all stats )</li>	';	
	
echo'</form></ul></article>';	


		   
} // end while


    
	 

   