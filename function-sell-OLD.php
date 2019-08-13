<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	
/*
one handed:
50c dagger ( +1 str ) 
50c stiletto ( +1 str, +2 mag ) 
50c stiletto ( +2 str, + 1 mag )
50c training sword ( +3 str )
400c broad sword ( +3 str, +2 def )
400c mace ( +3 str, +1 mag )
400c club ( +5 str, -2 def )
400c long sword ( +4 str )
1200c flail ( +5 str, + 3 def)
1200c morning star ( +5 str, +1 mag)
1200c samurai sword ( +6 str )
2000c gladius ( +7 str, +2 mag, +2 def )
200c basic staff ( +3 mag )
400c wooden staff ( +5 mag, +1 str )
800c wand ( +7 mag, -2 str )
2000c demon dagger ( +7 mag, +5 str )
3000c wizard staff ( +8 mag )
3k three-chained flail ( +7 str, +3 def )
3k bastard sword ( +8 str )
3k giant club ( +9 str, -2 def )
4k great white sword ( +11 str, ***+4 mag )
*/
$dagger = $row['dagger'];
$stiletto = $row['stiletto'];
$shortsword = $row['shortsword'];
$trainingsword = $row['trainingsword'];

$longsword = $row['longsword'];
$broadsword = $row['broadsword'];
$mace = $row['mace'];
$club = $row['club'];

$flail = $row['flail'];
$morningstar = $row['morningstar'];
$samuraisword = $row['samuraisword'];
$gladius = $row['gladius'];
$masterblade = $row['masterblade'];

$basicstaff = $row['basicstaff'];
$woodenstaff = $row['woodenstaff'];
$wand = $row['wand'];
$demondagger = $row['demondagger'];
$wizardstaff = $row['wizardstaff'];

$threechainedflail = $row['threechainedflail'];
$bastardsword = $row['bastardsword'];
$giantclub = $row['giantclub'];
$greatwhitesword = $row['greatwhitesword'];

$training2hsword = $row['training2hsword'];
$bo = $row['bo'];
$battleaxe = $row['battleaxe'];
$warhammer = $row['warhammer'];
$woodenbo = $row['woodenbo'];
$pike = $row['pike'];
$claymore = $row['claymore'];
$greatsword = $row['greatsword'];
$bostaff = $row['bostaff'];
$battlestaff = $row['battlestaff'];
$dualtomahawk = $row['dualtomahawk'];
$brassknuckles = $row['brassknuckles'];
$polearm = $row['polearm'];
$hammerheadhammer = $row['hammerheadhammer'];
$trident = $row['trident'];


$boomerang = $row['boomerang'];

$trainingshield = $row['trainingshield'];
$basicshield = $row['basicshield'];
$woodenshield = $row['woodenshield'];

$trainingarmor = $row['trainingarmor'];


// ------------------------------------------------------------------------------------------ SELL LIST
if($input=='sell' || $input=='sell list') 
{	
echo 'SELL LIST<br>';
$message = 'sell
		<div class="shop">
		<h4><span class="alt">'.$username.'</span> SELL LIST</h4>
		<form id="mainForm" method="post" action="" name="formInput">';
		include ('update_feed.php'); // --- update feed




if($dagger >= 1) {
	$message ='<span class="alt">'.$dagger.'x </span> dagger <span class="gold">2c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell dagger" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all dagger" />';
			include ('update_feed.php'); // --- update feed
			}
if($stiletto >= 1) {
	$message ='<span class="alt">'.$stiletto.'x </span> stiletto <span class="gold">5c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell stiletto" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all stiletto" />';
			include ('update_feed.php'); // --- update feed
			}
if($shortsword >= 1) {
	$message ='<span class="alt">'.$shortsword.'x </span> short sword <span class="gold">5c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell short sword" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all short sword" />';
			include ('update_feed.php'); // --- update feed
			}			
if($trainingsword >= 1) {
	$message ='<span class="alt">'.$trainingsword.'x </span> training sword <span class="gold">5c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell training sword" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all training sword" />';
			include ('update_feed.php'); // --- update feed
			}
if($longsword >= 1) {
	$message ='<span class="alt">'.$longsword.'x </span> long sword <span class="gold">40c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell long sword" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all long sword" />';
			include ('update_feed.php'); // --- update feed
			}
if($broadsword >= 1) {
	$message ='<span class="alt">'.$broadsword.'x </span> broad sword <span class="gold">40c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell broad sword" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all broad sword" />';
			include ('update_feed.php'); // --- update feed
			}
if($mace >= 1) {
	$message ='<span class="alt">'.$mace.'x </span> mace <span class="gold">40c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell mace" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all mace" />';
			include ('update_feed.php'); // --- update feed
			}
if($club >= 1) {
	$message ='<span class="alt">'.$club.'x </span> club <span class="gold">40c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell club" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all club" />';
			include ('update_feed.php'); // --- update feed
			}

if($flail >= 1) {
	$message ='<span class="alt">'.$flail.'x </span> flail <span class="gold">120c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell flail" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all flail" />';
			include ('update_feed.php'); // --- update feed
			}	
if($morningstar >= 1) {
	$message ='<span class="alt">'.$morningstar.'x </span> morning star <span class="gold">120c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell morning star" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all morning star" />';
			include ('update_feed.php'); // --- update feed
			}						
if($samuraisword >= 1) {
	$message ='<span class="alt">'.$samuraisword.'x </span> samurai sword <span class="gold">120c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell samurai sword" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all samurai sword" />';
			include ('update_feed.php'); // --- update feed
			}
if($gladius >= 1) {
	$message ='<span class="alt">'.$gladius.'x </span> gladius <span class="gold">200c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell gladius" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all gladius" />';
			include ('update_feed.php'); // --- update feed
			}
if($basicstaff >= 1) {
	$message ='<span class="alt">'.$basicstaff.'x </span> basic staff <span class="gold">20c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell basic staff" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all basic staff" />';
			include ('update_feed.php'); // --- update feed
			}
if($woodenstaff >= 1) {
	$message ='<span class="alt">'.$woodenstaff.'x </span> wooden staff <span class="gold">80c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell wooden staff" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all wooden staff" />';
			include ('update_feed.php'); // --- update feed
			}
if($wand >= 1) {
	$message ='<span class="alt">'.$wand.'x </span> wand <span class="gold">80c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell wand" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all wand" />';
			include ('update_feed.php'); // --- update feed
			}	
if($demondagger >= 1) {
	$message ='<span class="alt">'.$demondagger.'x </span> demon dagger <span class="gold">200c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell demon dagger" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all demon dagger" />';
			include ('update_feed.php'); // --- update feed
			}
if($wizardstaff >= 1) {
	$message ='<span class="alt">'.$wizardstaff.'x </span> wizard staff <span class="gold">300c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell wizard staff" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all wizard staff" />';
			include ('update_feed.php'); // --- update feed
			}	
if($threechainedflail >= 1) {
	$message ='<span class="alt">'.$threechainedflail.'x </span> three-chained flail <span class="gold">300c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell three-chained flail" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all three-chained flail" />';
			include ('update_feed.php'); // --- update feed
			}	
if($bastardsword >= 1) {
	$message ='<span class="alt">'.$bastardsword.'x </span> bastard sword <span class="gold">300c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell bastard sword" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all bastard sword" />';
			include ('update_feed.php'); // --- update feed
			}
if($giantclub >= 1) {
	$message ='<span class="alt">'.$giantclub.'x </span> giant club <span class="gold">300c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell giant club" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all giant club" />';
			include ('update_feed.php'); // --- update feed
			}																
if($greatwhitesword >= 1) {
	$message ='<span class="alt">'.$greatwhitesword.'x </span> great white sword <span class="gold">400c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell great white sword" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all great white sword" />';
			include ('update_feed.php'); // --- update feed
			}
	
	
if($masterblade >= 1) {
	$message ='<span class="alt">'.$masterblade.'x </span> master blade <span class="yellow darkestgrayBG">100k</span>
			<input type="submit" class="sellBtn" name="input1" value="sell master blade" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all master blade" />';
			include ('update_feed.php'); // --- update feed
			}
if($training2hsword >= 1) {
	$message ='<span class="alt">'.$training2hsword.'x </span> training 2h sword <span class="gold">10c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell training 2h sword" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all training 2h sword" />';
			include ('update_feed.php'); // --- update feed
			}
if($battleaxe >= 1) {
	$message ='<span class="alt">'.$battleaxe.'x </span> battle axe <span class="gold">80c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell battle axe" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all battle axe" />';
			include ('update_feed.php'); // --- update feed
			}
if($warhammer >= 1) {
	$message ='<span class="alt">'.$warhammer.'x </span> warhammer <span class="gold">90c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell warhammer" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all warhammer" />';
			include ('update_feed.php'); // --- update feed
			}
if($claymore >= 1) {
	$message ='<span class="alt">'.$claymore.'x </span> claymore <span class="gold">250c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell claymore" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all claymore" />';
			include ('update_feed.php'); // --- update feed
			}			
if($battlestaff >= 1) {
	$message ='<span class="alt">'.$battlestaff.'x </span> battle staff <span class="gold">200c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell battle staff" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all battle staff" />';
			include ('update_feed.php'); // --- update feed
			}			
if($trainingshield >= 1) {
	$message ='<span class="alt">'.$trainingshield.'x </span> training shield <span class="gold">5c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell training shield" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all training shield" />';
			include ('update_feed.php'); // --- update feed
			}

if($trainingarmor >= 1) {
	$message ='<span class="alt">'.$trainingarmor.'x </span> training armor <span class="gold">10c</span>
			<input type="submit" class="sellBtn" name="input1" value="sell training armor" /> 
			<input type="submit" class="sellallBtn" name="input1" value="sell all training armor" />';
			include ('update_feed.php'); // --- update feed
			}			
			

	$message = '<br>
<input type="submit" class="learnBtnn" name="input1" value="buy" />
<input type="submit" class="learnBtnn" name="input1" value="sell" />
<input type="submit" class="learnBtnn" name="input1" value="look" />
</form></div>';
	include ('update_feed.php'); // --- update feed
	//$funflag=1;
}
// ------------------------------------------------------------------------------------------ SELL ITEMS


$sellall = 2 * $dagger; // -------------------------------------------------- sell dagger
if($input=='sell dagger' && $row['dagger'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your dagger for 2 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 2");}
		if($input=='sell all dagger' && $row['dagger'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$dagger.' of your daggers for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dagger = dagger - $dagger"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}

$sellone = 5; // -------------------------------------------------- sell stiletto
$sellall = $sellone * $stiletto; 
if($input=='sell stiletto' && $row['stiletto'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your stiletto for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET stiletto = stiletto - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all stiletto' && $row['stiletto'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$stiletto.' of your stilettos for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET stiletto = stiletto - $stiletto"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 5; // -------------------------------------------------- sell shortsword
$sellall = $sellone * $shortsword; 
if($input=='sell short sword' && $row['shortsword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your short sword for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET shortsword = shortsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all short sword' && $row['shortsword'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$shortsword.' of your short swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET shortsword = shortsword - $shortsword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 5 * $trainingsword; // -------------------------------------------------- sell trainingsword
if($input=='sell training sword' && $row['trainingsword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your training sword for 5 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingsword = trainingsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 5"); $funflag=1;}
		if($input=='sell all training sword' && $row['trainingsword'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$trainingsword.' of your training swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingsword = trainingsword - $trainingsword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 40 * $longsword; // -------------------------------------------------- sell longsword
if($input=='sell long sword' && $row['longsword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your long sword for 40 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET longsword = longsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 40"); $funflag=1;}
		if($input=='sell all long sword' && $row['longsword'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$longsword.' of your long swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET longsword = longsword - $longsword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 40 * $broadsword; // -------------------------------------------------- sell broadsword
if($input=='sell broad sword' && $row['broadsword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your broad sword for 40 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET broadsword = broadsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 40"); $funflag=1;}
		if($input=='sell all broad sword' && $row['broadsword'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$broadsword.' of your broad swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET broadsword = broadsword - $broadsword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 40 * $mace; // -------------------------------------------------- sell mace
if($input=='sell mace' && $row['mace'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your mace for 40 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mace = mace - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 40"); $funflag=1;}
		if($input=='sell all mace' && $row['mace'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$mace.' of your maces for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET mace = mace - $mace"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 40 * $club; // -------------------------------------------------- sell club
if($input=='sell club' && $row['club'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your club for 40 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET club = club - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 40"); $funflag=1;}
		if($input=='sell all club' && $row['club'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$club.' of your clubs for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET club = club - $club"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}

$sellone = 120; // -------------------------------------------------- sell flail
$sellall = $sellone * $flail; 
if($input=='sell flail' && $row['flail'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your flail for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET flail = flail - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all flail' && $row['flail'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$flail.' of your flails for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET flail = flail - $flail"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 120; // -------------------------------------------------- sell morning star
$sellall = $sellone * $morningstar; 
if($input=='sell morning star' && $row['morningstar'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your morning star for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET morningstar = morningstar - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all morning star' && $row['morningstar'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$morningstar.' of your morning stars for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET morningstar = morningstar - $morningstar"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}

$sellall = 120 * $samuraisword; // -------------------------------------------------- sell samurai sword
if($input=='sell samurai sword' && $row['samuraisword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your samurai sword for 120 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET samuraisword = samuraisword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 120"); $funflag=1;}
		if($input=='sell all samurai sword' && $row['samuraisword'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$samuraisword.' of your samurai swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET samuraisword = samuraisword - $samuraisword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 200 * $gladius; // -------------------------------------------------- sell gladius
if($input=='sell gladius' && $row['gladius'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your gladius for 200 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gladius = gladius - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 200");$funflag=1; }
		if($input=='sell all gladius' && $row['gladius'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$gladius.' of your gladius\'s for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET gladius = gladius - $gladius"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 20 * $basicstaff; // -------------------------------------------------- sell basic staff
if($input=='sell basic staff' && $row['basicstaff'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your basic staff for 20 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basicstaff = basicstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 20"); $funflag=1;}
		if($input=='sell all basic staff' && $row['basicstaff'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$basicstaff.' of your basic staff\'s for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET basicstaff = basicstaff - $basicstaff"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 80 * $woodenstaff; // -------------------------------------------------- sell wooden staff
if($input=='sell wooden staff' && $row['woodenstaff'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your wooden staff for 80 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenstaff = woodenstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 80"); $funflag=1;}
		if($input=='sell all wooden staff' && $row['woodenstaff'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$woodenstaff.' of your wooden staff\'s for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenstaff = woodenstaff - $woodenstaff"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 80; // -------------------------------------------------- sell wand
$sellall = $sellone * $wand; 
if($input=='sell wand' && $row['wand'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your wand for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wand = wand - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all wand' && $row['wand'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$wand.' of your wands for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wand = wand - $wand"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 200; // -------------------------------------------------- sell demon dagger
$sellall = $sellone * $demondagger; 
if($input=='sell demon dagger' && $row['demondagger'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your demon dagger for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET demondagger = demondagger - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all demon dagger' && $row['demondagger'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$demondagger.' of your demon daggers for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET demondagger = demondagger - $demondagger"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 300; // -------------------------------------------------- sell wizard staff
$sellall = $sellone * $wizardstaff; 
if($input=='sell wizard staff' && $row['wizardstaff'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your wizard staff for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wizardstaff = wizardstaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all wizard staff' && $row['wizardstaff'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$wizardstaff.' of your wizard staffs for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET wizardstaff = wizardstaff - $wizardstaff"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 300; // -------------------------------------------------- sell three-chained flail
$sellall = $sellone * $threechainedflail; 
if($input=='sell three-chained flail' && $row['threechainedflail'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your three-chained flail for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET threechainedflail = threechainedflail - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all three-chained flail' && $row['threechainedflail'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$threechainedflail.' of your three-chained flails for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET threechainedflail = threechainedflail - $threechainedflail"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 300; // -------------------------------------------------- sell bastard sword
$sellall = $sellone * $bastardsword; 
if($input=='sell bastard sword' && $row['bastardsword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your bastard sword for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bastardsword = bastardsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all bastard sword' && $row['bastardsword'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$bastardsword.' of your bastard swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bastardsword = bastardsword - $bastardsword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 300; // -------------------------------------------------- sell giant club
$sellall = $sellone * $giantclub; 
if($input=='sell giant club' && $row['giantclub'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your giant club for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET giantclub = giantclub - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all giant club' && $row['giantclub'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$giantclub.' of your giant clubs for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET giantclub = giantclub - $giantclub"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 400; // -------------------------------------------------- sell great white sword
$sellall = $sellone * $greatwhitesword; 
if($input=='sell great white sword' && $row['greatwhitesword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your great white sword for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greatwhitesword = greatwhitesword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all great white sword' && $row['greatwhitesword'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$greatwhitesword.' of your great white swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greatwhitesword = greatwhitesword - $greatwhitesword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 100000 * $masterblade; // -------------------------------------------------- sell master blade
if($input=='sell master blade' && $row['masterblade'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your master blade for 100000 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET masterblade = masterblade - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 100000"); }
		if($input=='sell all master blade' && $row['masterblade'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$masterblade.' of your master blade\'s for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET masterblade = masterblade - $masterblade"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall");
}

$sellall = 10 * $training2hsword; // -------------------------------------------------- sell training2hsword
if($input=='sell training 2h sword' && $row['training2hsword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your training 2h sword for 10 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET training2hsword = training2hsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 10");$funflag=1; }
		if($input=='sell all training 2h sword' && $row['training2hsword'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$training2hsword.' of your training 2h swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET training2hsword = training2hsword - $training2hsword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 40; // -------------------------------------------------- sell bo
$sellall = $sellone * $bo; 
if($input=='sell bo' && $row['bo'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your bo for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bo = bo - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all bo' && $row['bo'] >= 1)  
		{ echo $message = '<span class="yellow darkestgrayBG">You sell all '.$bo.' of your bos for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bo = bo - $bo"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 80 * $battleaxe; // -------------------------------------------------- sell battleaxe
if($input=='sell battle axe' && $row['battleaxe'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your battle axe for 80 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battleaxe = battleaxe - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 80"); $funflag=1; }
		if($input=='sell all battle axe' && $row['battleaxe'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$battleaxe.' of your battle axe for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battleaxe = battleaxe - $battleaxe"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 90 * $warhammer; // -------------------------------------------------- sell warhammer
if($input=='sell warhammer' && $row['warhammer'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your warhammer for 90 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET warhammer = warhammer - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 90"); $funflag=1;}
		if($input=='sell all warhammer' && $row['warhammer'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$warhammer.' of your warhammer\'s for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET warhammer = warhammer - $warhammer"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 100; // -------------------------------------------------- sell wooden bo
$sellall = $sellone * $woodenbo; 
if($input=='sell wooden bo' && $row['woodenbo'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your wooden bo for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenbo = woodenbo - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all wooden bo' && $row['woodenbo'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$woodenbo.' of your wooden bos for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET woodenbo = woodenbo - $woodenbo"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 250; // -------------------------------------------------- sell pike
$sellall = $sellone * $pike; 
if($input=='sell pike' && $row['pike'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your pike for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET pike = pike - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all pike' && $row['pike'] >= 1)  
		{ echo $message = '<span class="yellow darkestgrayBG">You sell all '.$pike.' of your pikes for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET pike = pike - $pike"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 250 * $claymore; // -------------------------------------------------- sell claymore
if($input=='sell claymore' && $row['claymore'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your claymore for 250 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET claymore = claymore - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 250"); $funflag=1;}
		if($input=='sell all claymore' && $row['claymore'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$claymore.' of your claymore\'s for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET claymore = claymore - $claymore"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 350; // -------------------------------------------------- sell great sword
$sellall = $sellone * $greatsword; 
if($input=='sell great sword' && $row['greatsword'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your great sword for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greatsword = greatsword - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all great sword' && $row['greatsword'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$greatsword.' of your great swords for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET greatsword = greatsword - $greatsword"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 200; // -------------------------------------------------- sell bo staff
$sellall = $sellone * $bostaff; 
if($input=='sell bo staff' && $row['bostaff'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your bo staff for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bostaff = bostaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all bo staff' && $row['bostaff'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$bostaff.' of your bo staffs for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET bostaff = bostaff - $bostaff"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 200 * $battlestaff; // -------------------------------------------------- sell battlestaff
if($input=='sell battle staff' && $row['battlestaff'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your battle staff for 200 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battlestaff = battlestaff - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 200");$funflag=1; }
		if($input=='sell all battle staff' && $row['battlestaff'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$battlestaff.' of your battle staff for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET battlestaff = battlestaff - $battlestaff"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
} 
$sellone = 300; // -------------------------------------------------- sell dual tomahawk
$sellall = $sellone * $dualtomahawk; 
if($input=='sell dual tomahawk' && $row['dualtomahawk'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your dual tomahawk for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dualtomahawk = dualtomahawk - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all dual tomahawk' && $row['dualtomahawk'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$dualtomahawk.' of your dual tomahawks for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET dualtomahawk = dualtomahawk - $dualtomahawk"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellone = 300; // -------------------------------------------------- sell brass knuckles
$sellall = $sellone * $brassknuckles; 
if($input=='sell brass knuckles' && $row['brassknuckles'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your brass knuckles for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET brassknuckles = brassknuckles - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all brass knuckles' && $row['brassknuckles'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$brassknuckles.' of your brass knuckless for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET brassknuckles = brassknuckles - $brassknuckles"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}

$sellone = 400; // -------------------------------------------------- sell polearm
$sellall = $sellone * $polearm; 
if($input=='sell polearm' && $row['polearm'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your polearm for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET polearm = polearm - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all polearm' && $row['polearm'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$polearm.' of your polearms for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET polearm = polearm - $polearm"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}


$sellone = 400; // -------------------------------------------------- sell hammerhead hammer
$sellall = $sellone * $hammerheadhammer; 
if($input=='sell hammerhead hammer' && $row['hammerheadhammer'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your hammerhead hammer for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET hammerheadhammer = hammerheadhammer - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all hammerhead hammer' && $row['hammerheadhammer'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$hammerheadhammer.' of your hammerhead hammers for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET hammerheadhammer = hammerheadhammer - $hammerheadhammer"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}

$sellone = 800; // -------------------------------------------------- sell trident
$sellall = $sellone * $trident; 
if($input=='sell trident' && $row['trident'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your trident for '.$sellone.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trident = trident - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellone"); $funflag=1;}
		if($input=='sell all trident' && $row['trident'] >= 1)  
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$trident.' of your tridents for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trident = trident - $trident"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}


















$sellall = 5 * $trainingshield; // -------------------------------------------------- sell training shield
if($input=='sell training shield' && $row['trainingshield'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your training shield for 5 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingshield = trainingshield - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 5");$funflag=1; }
		if($input=='sell all training shield' && $row['trainingshield'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$trainingshield.' of your training shield\'s for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingshield = trainingshield - $trainingshield"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}
$sellall = 10 * $trainingarmor; // -------------------------------------------------- sell training armor
if($input=='sell training armor' && $row['trainingarmor'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your training armor for 10 '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingarmor = trainingarmor - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + 10");$funflag=1; }
		if($input=='sell all training armor' && $row['trainingarmor'] >= 1) 
		{
		echo $message = '<span class="yellow darkestgrayBG">You sell all '.$trainingarmor.' of your training armors for '.$sellall.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET trainingarmor = trainingarmor - $trainingarmor"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sellall"); $funflag=1;
}



$sell = 5;		// -------------------------------------------------- sell training helmet
if($input=='sell training helmet' && $row['traininghelmet'] >= 1) 
{		echo $message = '<span class="yellow darkestgrayBG">You sell your training helmet for '.$sell.' '.$currency.'</span><br>';	
		include ('update_feed.php'); // --- update feed
		$query = $link->query("UPDATE $user SET traininghelmet = traininghelmet - 1"); 
		$query = $link->query("UPDATE $user SET currency = currency + $sell");
		//$funflag=1; 
}
		





 }
 
 




?>