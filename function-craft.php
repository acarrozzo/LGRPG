<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	


  	$crafting=$row['crafting']; 
	$craftingtable=$row['craftingtable']; 
	$string=$row['string']; 
	$wood=$row['wood']; 
	$leather=$row['leather']; 
	$fire=$row['fire']; 
	$room=$row['room']; 
	$sand=$row['sand']; 
	$glass=$row['glass']; 
	$bottle=$row['bottle']; 
	$stone=$row['stone']; 
	$iron=$row['iron']; 
	$coal=$row['coal']; 
	$steel=$row['steel']; 
	$mithril=$row['mithril'];  

	$graymatter=$row['graymatter'];  

	$dagger=$row['dagger']; 

	
	$redberry=$row['redberry']; 
	$blueberry=$row['blueberry']; 
	$rawmeat=$row['rawmeat']; 
	$cookedmeat=$row['cookedmeat']; 
	$meatball=$row['meatball']; 
	$quest22=$row['quest22']; 
	$redpotion=$row['redpotion']; 
	$bluepotion=$row['bluepotion']; 
	$purplepotion=$row['purplepotion']; 

	$hammer=$row['hammer']; 
	$ironhammer=$row['ironhammer']; 
	$steelhammer=$row['steelhammer']; 
	$mithrilhammer=$row['mithrilhammer']; 


	$ringofstrength=$row['ringofstrength'];
	$ringofdexterity=$row['ringofdexterity'];
	$ringofmagic=$row['ringofmagic'];
	$ringofdefense=$row['ringofdefense'];
	$ringofstrengthII=$row['ringofstrengthII'];
	$ringofdexterityII=$row['ringofdexterityII'];
	$ringofmagicII=$row['ringofmagicII'];
	$ringofdefenseII=$row['ringofdefenseII'];
	$ringofstrengthIII=$row['ringofstrengthIII'];
	$ringofdexterityIII=$row['ringofdexterityIII'];
	$ringofmagicIII=$row['ringofmagicIII'];
	$ringofdefenseIII=$row['ringofdefenseIII'];
	$ringofstrengthIV=$row['ringofstrengthIV'];
	$ringofdexterityIV=$row['ringofdexterityIV'];
	$ringofmagicIV=$row['ringofmagicIV'];
	$ringofdefenseIV=$row['ringofdefenseIV'];
	$ringofstrengthV=$row['ringofstrengthV'];
	$ringofdexterityV=$row['ringofdexterityV'];
	$ringofmagicV=$row['ringofmagicV'];
	$ringofdefenseV=$row['ringofdefenseV'];	


	$ringofhealthregen=$row['ringofhealthregen'];	
	$ringofmanaregen=$row['ringofmanaregen'];
	$ringofhealthregenII=$row['ringofhealthregenII'];	
	$ringofmanaregenII=$row['ringofmanaregenII'];
	$ringofhealthregenIII=$row['ringofhealthregenIII'];	
	$ringofmanaregenIII=$row['ringofmanaregenIII'];
	$ringofhealthregenIV=$row['ringofhealthregenIV'];	
	$ringofmanaregenIV=$row['ringofmanaregenIV'];	
	$ringofhealthregenV=$row['ringofhealthregenV'];	
	$ringofmanaregenV=$row['ringofmanaregenV'];	







// -------------------------------------------------------------------------- CRAFT - NO TABLE - BASIC
// -------------------------------------------------------------------------- CRAFT - NO TABLE - BASIC
// -------------------------------------------------------------------------- CRAFT - NO TABLE - BASIC
// -------------------------------------------------------------------------- CRAFT - NO TABLE - BASIC
// -------------------------------------------------------------------------- CRAFT - NO TABLE - BASIC


if(($input=='craft' || $input=='CRAFT' || $input=='open crafting menu')|| ($input=='NO MORE!!!') ) 
{	
   
   

   
   if ($crafting== 0)
	{	echo $message="<i>What's craft? You should talk to Jack Lumber</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
   else if ($crafting>= 1 && ($craftingtable == 0 || $craftingtable !=$room))
	{	echo 'YOU OPEN THE BASIC CRAFTING MENU<br/>';
$message = "craft
		<div class='shop darkgreenBG'>
		<form id='mainForm' method='post' action='' name='formInput'>			
		<input type='submit' class='topright craftBtn' name='input1' value='full crafting list' />
		<input type='submit' class='topright craftBtn' name='input1' value='list my materials' />
		<h4><span>$username</span> basic crafting </h4>
			<input type='submit' class='craftBtn' name='input1' value='craft table' /> 
			3 wood</span> 
			<input type='submit' class='helpBtn' name='input1' value='help crafting table' />";
		include ('update_feed.php'); // --- update feed
		
		if ($fire != $room && $wood >= 1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft fire' />  
		wood <input type='submit' class='helpBtn' name='input1' value='help fire' />";
		include ('update_feed.php'); } // --- update feed
		
		$message = "</form></div>";
		include ('update_feed.php'); // --- update feed 
	}
	// -------------------------------------------------------------------------- CRAFT FULL WITH TABLE! - ADVANCED
	// -------------------------------------------------------------------------- CRAFT FULL WITH TABLE! - ADVANCED
	// -------------------------------------------------------------------------- CRAFT FULL WITH TABLE! - ADVANCED
	// -------------------------------------------------------------------------- CRAFT FULL WITH TABLE! - ADVANCED
	// -------------------------------------------------------------------------- CRAFT FULL WITH TABLE! - ADVANCED
   else if ($crafting>= 1 && $craftingtable==$room)
	{
		
				echo 'YOU OPEN THE ADVANCED CRAFTING MENU<br/>';
		$message = "craft w/ table<div class='shop darkgreenBG'> 
		<form id='mainForm' method='post' action='' name='formInput'>
		<input type='submit' class='topright craftBtn' name='input1' value='full crafting list' />
		<input type='submit' class='topright craftBtn' name='input1' value='list my materials' />
		<h4><span>$username</span> advanced crafting </h4>";
		include ('update_feed.php');  // --- update feed
		
		
		if ($fire != $room && $wood >= 1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft fire' />  
		wood <input type='submit' class='helpBtn' name='input1' value='help fire' />";
		include ('update_feed.php'); } // --- update feed
	
		if ($fire == $room && $rawmeat >= 1){ // -------------------------------------------------------------------------- cook meat
		$message = "<input type='submit' class='craftBtn' name='input1' value='cook meat' />
					<input type='submit' class='craftBtn' name='input1' value='cook all meat' />  
		raw meat <span>($rawmeat)</span>  + fire<input type='submit' class='helpBtn' name='input1' value='help cooking' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($fire == $room && $cookedmeat >= 5 && $quest22 >=2 ){ // -------------------------------------------------------------------------- meat a ball
		$message = "<input type='submit' class='craftBtn' name='input1' value='cook meatball' />
					<input type='submit' class='craftBtn' name='input1' value='cook all meatball' />
					5x cooked meat <span>($cookedmeat)</span> + fire<input type='submit' class='helpBtn' name='input1' value='help cooking' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($fire == $room && $sand >= 1){ // -------------------------------------------------------------------------- glass
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft glass' />
					<input type='submit' class='craftBtn' name='input1' value='craft all glass' />  
		sand <span>($sand)</span> + fire <input type='submit' class='helpBtn' name='input1' value='help glass' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($fire == $room && $glass >= 1){ // -------------------------------------------------------------------------- bottle
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft bottle' />  
					<input type='submit' class='craftBtn' name='input1' value='craft all bottle' />  
		glass <span>($glass)</span> + fire <input type='submit' class='helpBtn' name='input1' value='help bottle' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($redberry >= 5 && $bottle >= 1){ // -------------------------------------------------------------------------- red potion
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft red potion' />  
		5 redberry + bottle <input type='submit' class='helpBtn' name='input1' value='help potions' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($blueberry >= 5 && $bottle >= 1){ // -------------------------------------------------------------------------- blue potion
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft blue potion' />  
		5 blueberry + bottle <input type='submit' class='helpBtn' name='input1' value='help potions' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($bluepotion >= 1 && $redpotion >= 1){ // ------------------------------------------------------------ purple potion
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft purple potion' />  
		red potion + blue potion <input type='submit' class='helpBtn' name='input1' value='help potions' />";
		include ('update_feed.php'); } // --- update feed
		
	
if ($ringofstrength >=2 && $hammer >=1){ // ------------------------------------------------------------------------------- rings II
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of strength II' />  
		ring of strength + ring of strength <input type='submit' class='helpBtn' name='input1' value='help rings' />";
		include ('update_feed.php');}
	if ($ringofdexterity >=2 && $hammer >=1){ 
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of dexterity II' />  
		ring of dexterity + ring of dexterity <input type='submit' class='helpBtn' name='input1' value='help rings' />";
		include ('update_feed.php');}
	if ($ringofmagic >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of magic II' />  
		ring of magic + ring of magic <input type='submit' class='helpBtn' name='input1' value='help rings' />";
		include ('update_feed.php');}
	if ($ringofdefense >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of defense II' />  
		ring of defense + ring of defense <input type='submit' class='helpBtn' name='input1' value='help rings' />";
		include ('update_feed.php');}
if ($ringofstrengthII >=2 && $hammer >=1){ // ------------------------------------------------------------------------------- rings III
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of strength III' />  
		ring of strength II + ring of strength II";include ('update_feed.php');}
	if ($ringofdexterityII >=2 && $hammer >=1){ 
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of dexterity III' />  
		ring of dexterity II + ring of dexterity II";include ('update_feed.php');}
	if ($ringofmagicII >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of magic III' />  
		ring of magic II + ring of magic II";include ('update_feed.php');}
	if ($ringofdefenseII >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of defense III' />  
		ring of defense II + ring of defense II";include ('update_feed.php');}
if ($ringofstrengthIII >=2 && $hammer >=1){ // ------------------------------------------------------------------------------- rings IV
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of strength IV' />  
		ring of strength III + ring of strength III";include ('update_feed.php');}
	if ($ringofdexterityIII >=2 && $hammer >=1){ 
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of dexterity IV' />  
		ring of dexterity III + ring of dexterity III";include ('update_feed.php');}
	if ($ringofmagicIII >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of magic IV' />  
		ring of magic III + ring of magic III";include ('update_feed.php');}
	if ($ringofdefenseIII >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of defense IV' />  
		ring of defense III + ring of defense III";include ('update_feed.php');}
if ($ringofstrengthIV >=2 && $hammer >=1){ // ------------------------------------------------------------------------------- rings V
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of strength V' />  
		ring of strength IV + ring of strength IV";include ('update_feed.php');}
	if ($ringofdexterityIV >=2 && $hammer >=1){ 
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of dexterity V' />  
		ring of dexterity IV + ring of dexterity IV";include ('update_feed.php');}
	if ($ringofmagicIV >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of magic V' />  
		ring of magic IV + ring of magic IV";include ('update_feed.php');}
	if ($ringofdefenseIV >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of defense V' />  
		ring of defense IV + ring of defense IV";include ('update_feed.php');}
		
if ($ringofhealthregen >=2 && $hammer >=1){ // ------------------------------------------------------------------------------- regen rings II
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of health regen II' />  
		ring of health regen x 2";include ('update_feed.php');}
if ($ringofmanaregen >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of mana regen II' />  
		ring of mana regen x 2";include ('update_feed.php');}
if ($ringofhealthregenII >=2 && $hammer >=1){ // ------------------------------------------------------------------------------- regen rings III
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of health regen III' />  
		ring of health regen II x 2";include ('update_feed.php');}
if ($ringofmanaregenII >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of mana regen III' />  
		ring of mana regen II x 2";include ('update_feed.php');}	
if ($ringofhealthregenIII >=2 && $hammer >=1){ // ------------------------------------------------------------------------------- regen rings IV
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of health regen IV' />  
		ring of health regen III x 2";include ('update_feed.php');}
if ($ringofmanaregenIII >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of mana regen IV' />  
		ring of mana regen III x 2";include ('update_feed.php');}
if ($ringofhealthregenIV >=2 && $hammer >=1){ // ------------------------------------------------------------------------------- regen rings V
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of health regen V' />  
		ring of health regen IV x 2";include ('update_feed.php');}
if ($ringofmanaregenIV >=2 && $hammer >=1){
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft ring of mana regen V' />  
		ring of mana regen IV x 2";include ('update_feed.php');}
		
												

if ($leather >=3 && $hammer >=1){ // ------------------------------------------------------------------------------- craft w/ leather...
		$message = "<input type='submit' class='craftBtn brownBG' name='input1' value='craft w/ leather...' />  
		leather + hammer <input type='submit' class='helpBtn' name='input1' value='help leather' />";
		include ('update_feed.php');
		}
if ($wood >=1){ // ------------------------------------------------------------------------------- craft w/ wood...
		$message = "<input type='submit' class='craftBtn brownBG' name='input1' value='craft w/ wood...' />  
		wood + hammer <input type='submit' class='helpBtn' name='input1' value='help wood' />";
		include ('update_feed.php');
		}		

if ($iron >=1){ // ------------------------------------------------------------------------------- craft w/ iron...
		$message = "<input type='submit' class='craftBtn brownBG' name='input1' value='craft w/ iron...' />  
		iron + iron hammer <input type='submit' class='helpBtn' name='input1' value='help iron' />";
		include ('update_feed.php');
		}		
		
	$message = " </form></div>";
		include ('update_feed.php'); // --- update feed
	}
}		
	


 else if (($crafting>= 1 && $craftingtable==$room && $input == 'craft w/ wood...')&& ($input=='NO MORE!!!'))
	{
		echo 'YOU OPEN THE WOOD CRAFTING MENU<br/>';
		$message = "craft w/ wood<div class='shop darkgreenBG'> 
		<form id='mainForm' method='post' action='' name='formInput'>
		<input type='submit' class='topright craftBtn' name='input1' value='full crafting list' />
		<input type='submit' class='topright craftBtn' name='input1' value='list my materials' />
		<h4><span></span>wood crafting menu </h4>";
		include ('update_feed.php');  // --- update feed

		if ($stone >= 3 && $wood >= 1){ // -------------------------------------------------------------------------- hatchet
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft hatchet' />  
		3 stone + 1 wood <input type='submit' class='helpBtn' name='input1' value='help tools' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($stone >= 3 && $wood >= 1){ // -------------------------------------------------------------------------- pickaxe
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft pickaxe' />  
		3 stone + 1 wood <input type='submit' class='helpBtn' name='input1' value='help tools' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($stone >= 3 && $wood >= 1){ // -------------------------------------------------------------------------- hammer
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft hammer' />  
		3 stone + 1 wood <input type='submit' class='helpBtn' name='input1' value='help tools' />";
		include ('update_feed.php'); } // --- update feed
		
		if ($wood >= 7 && $hammer >=1){ // -------------------------------------------------------------------------- wooden staff
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft wooden staff' />  
		7 wood + hammer <input type='submit' class='helpBtn' name='input1' value='help craft' />";
		include ('update_feed.php'); } // --- update feed	
		if ($wood >= 7 && $hammer >=1){ // -------------------------------------------------------------------------- wooden bo
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft wooden bo' />  
		7 wood + hammer <input type='submit' class='helpBtn' name='input1' value='help craft' />";
		include ('update_feed.php'); } // --- update feed			
	if ($wood >= 5 && $stone >= 2 && $hammer >=1){ // ------------------------------------------------------------------ wooden shield
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft wooden shield' />  
		5 wood + 2 stone + hammer <input type='submit' class='helpBtn' name='input1' value='help craft' />";
		include ('update_feed.php'); } // --- update feed
	if ($wood >= 5 && $string >= 1 && $hammer >=1){ // ------------------------------------------------------------------ wooden bow
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft wooden bow' />  
		5 wood + 1 string + hammer <input type='submit' class='helpBtn' name='input1' value='help craft' />";
		include ('update_feed.php'); } // --- update feed	
	if ($wood >= 1 && $stone >= 1 && $hammer >=1){ // ------------------------------------------------------------------ 10 arrows
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft 10 arrows' />  
		1 wood + 1 stone + hammer <input type='submit' class='helpBtn' name='input1' value='help craft' />";
		include ('update_feed.php'); } // --- update feed	
	if ($dagger >= 1 && $wood >= 1 && $hammer >=1){ // ------------------------------------------------------------------ javelin
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft javelin' />  
		1 wood + 1 dagger + hammer <input type='submit' class='helpBtn' name='input1' value='help craft' />";
		include ('update_feed.php'); } // --- update feed
		
		$message = "<br>
		<input type='submit' class='craftBtn' name='input1' value='CRAFT' />		
		<input type='submit' class='craftBtn brownBG' name='input1' value='craft w/ wood...' />
		</form></div>";
		include ('update_feed.php'); // --- update feed
	
	}






 else if (($crafting>= 1 && $craftingtable==$room && $input == 'craft w/ leather...')&& ($input=='NO MORE!!!'))
	{
		echo 'YOU OPEN THE LEATHER CRAFTING MENU<br/>';
		$message = "craft w/ leather<div class='shop darkgreenBG'> 
		<form id='mainForm' method='post' action='' name='formInput'>
		<input type='submit' class='topright craftBtn' name='input1' value='full crafting list' />
		<input type='submit' class='topright craftBtn' name='input1' value='list my materials' />
		<h4><span></span>leather crafting menu </h4>";
		include ('update_feed.php');  // --- update feed
		
	if ($leather >=3 && $hammer >=1){ // ------------------------------------------------------------------------------- leather hood
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft leather hood' />  
		3 leather + hammer <input type='submit' class='helpBtn' name='input1' value='help leather' />";
		include ('update_feed.php');}
		if ($leather >=5 && $hammer >=1){ // ------------------------------------------------------------------------------- leather helmet
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft leather helmet' />  
		5 leather + hammer <input type='submit' class='helpBtn' name='input1' value='help leather' />";
		include ('update_feed.php');}
		if ($leather >=7 && $hammer >=1){ // ------------------------------------------------------------------------------- leather vest
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft leather vest' />  
		7 leather + hammer <input type='submit' class='helpBtn' name='input1' value='help leather' />";
		include ('update_feed.php');}
		if ($leather >=10 && $hammer >=1){ // ------------------------------------------------------------------------------- leather armor
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft leather armor' />  
		10 leather + hammer <input type='submit' class='helpBtn' name='input1' value='help leather' />";
		include ('update_feed.php');}
		if ($leather >=3 && $hammer >=1){ // ------------------------------------------------------------------------------- leather gloves
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft leather gloves' />  
		3 leather + hammer <input type='submit' class='helpBtn' name='input1' value='help leather' />";
		include ('update_feed.php');}
		if ($leather >=3 && $hammer >=1){ // ------------------------------------------------------------------------------- leather boots
		$message = "<input type='submit' class='craftBtn' name='input1' value='craft leather boots' />  
		3 leather + hammer <input type='submit' class='helpBtn' name='input1' value='help leather' />";
		include ('update_feed.php');}	
		
		$message = "<br>
		<input type='submit' class='craftBtn' name='input1' value='CRAFT' />		
		<input type='submit' class='craftBtn brownBG' name='input1' value='craft w/ leather...' />		
		</form></div>";
		include ('update_feed.php'); // --- update feed
	
	}
	
	
	
	
	
	
	
	

	
	
	
	
	



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ITEMS TO CRAFT!!!!!
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ITEMS TO CRAFT!!!!!
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ITEMS TO CRAFT!!!!!
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT TABLE
else if($input=='craft table') 
{	
   if ($crafting== 0)
	{
		echo $message="<i>What's craft? You should talk to Jack Lumber</i><br/>";
		include ('update_feed.php'); // --- update feed
	}
   else if ($crafting >= 1 && $wood < 3)
	{
		echo "<span class='gold'>You don't have enough wood to build a crafting table. Visit Jack's Tree Farm or the Forest to chop some down.</span><br/>";
		$message = "You don't have enough wood to build a crafting table. Visit Jack's Tree Farm or the Forest to chop some down.<br/>";
		include ('update_feed.php'); // --- update feed
	}
   	else if ($crafting >= 1 && $wood >= 3)
	{
		echo "<span class='gold'>You build a crafting table!</span><br/>";
		$message = "You build a crafting table! Use the CRAFT menu above to create and combine new items!<br/>";
		$results = $link->query("UPDATE $user SET craftingtable = room"); // -- crafting table set up
		$results = $link->query("UPDATE $user SET wood = wood - 3"); 
		include ('update_feed.php'); // --- update feed	
	}		
}


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT fire
else if($input=='craft fire' || $input=='build fire') 
{	
    if ($crafting >= 1 && $room == $fire)
	{	echo "<span class='gold'>You already have a fire burning here.</span><br/>";
		$message = "You already have a fire burning here.<br/>";
		include ('update_feed.php'); // --- update feed
	}
	else if ($crafting >= 1 && $wood >= 1)
	{	echo "<span class='gold'>You build a FIRE!</span><br/>";
		$message = "You build a FIRE!<br/>";
		$results = $link->query("UPDATE $user SET fire = room"); 
		$results = $link->query("UPDATE $user SET wood = wood - 1"); 
		include ('update_feed.php'); // --- update feed
	}
   	else
	{	echo "<span class='gold'>You don't have any wood to build a fire.</span><br/>";
		$message = "You don't have any wood to build a fire.<br/>";
		include ('update_feed.php'); // --- update feed
	}$input='craft';		
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx COOK meat
else if($input=='cook meat') 
{	
    if ($fire == $room && $crafting >= 1 && $rawmeat >= 1)
	{	echo "You COOK some raw meat on the fire<br/>";
		$message = "You COOK some raw meat on the fire<br/>";
		$results = $link->query("UPDATE $user SET rawmeat = rawmeat - 1");
		$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + 1"); 
		include ('update_feed.php'); // --- update feed
		}		
}
else if($input=='cook all meat') 
{	
	$times = $rawmeat;
	
    if ($fire == $room && $crafting >= 1 && $rawmeat >= 1)
	{	echo "<span class='gold'>You COOK $times raw meat on the fire!</span><br/>";
		$message = "You COOK $times raw meat on the fire!<br/>";
		$results = $link->query("UPDATE $user SET rawmeat = rawmeat - $times");
		$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat + $times"); 
		include ('update_feed.php'); // --- update feed
		}		
}
else if($input=='cook meatball') 
{	
    if ($fire == $room && $crafting >= 1 && $cookedmeat >= 5)
	{	echo "You COOK up a tasty meat-a-ball!<br/>";
		$message = "You COOK up a tasty meat-a-ball!<br/>";
		$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat - 5");
		$results = $link->query("UPDATE $user SET meatball = meatball + 1"); 
		include ('update_feed.php'); // --- update feed
		}		
}
else if($input=='cook all meatball') 
{	
	$times = $cookedmeat/5;
	$times = floor($times); // round down
	$qty = $times * 5;
	
    if ($fire == $room && $crafting >= 1 && $cookedmeat >= 5)
	{	echo $message ="You COOK $qty cooked meat into $times meatballs!<br/>";
		$results = $link->query("UPDATE $user SET cookedmeat = cookedmeat - $qty");
		$results = $link->query("UPDATE $user SET meatball = meatball + $times"); 
		include ('update_feed.php'); // --- update feed
		}		
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT glass
else if ($craftingtable==$room && $input=='craft glass') 
{	
    if ($fire == $room && $craftingtable==$room && $crafting >= 1 && $sand >= 1)
	{	echo "You craft some GLASS out of sand<br/>";
		$message = "You craft some GLASS out of sand<br/>";
		$results = $link->query("UPDATE $user SET glass = glass + 1");
		$results = $link->query("UPDATE $user SET sand = sand - 1"); 
		include ('update_feed.php'); // --- update feed
   		$input='craft';		
	}
}
else if($input=='craft all glass') 
{	
	$times = $sand;
	
    if ($fire == $room && $craftingtable==$room && $crafting >= 1 && $sand >= 1)
	{	echo "You CRAFT $times glass<br/>";
		$message = "You CRAFT $times glass<br/>";
		$results = $link->query("UPDATE $user SET sand = sand - $times");
		$results = $link->query("UPDATE $user SET glass = glass + $times"); 
		include ('update_feed.php'); // --- update feed
		}		
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT bottle
else if($craftingtable==$room && $fire == $room && $input=='craft bottle') 
{	
    if ($crafting >= 1 && $glass >= 1)
	{	echo "You craft a BOTTLE out of some glass<br/>";
		$message = "You craft a BOTTLE out of some glass<br/>";
		$results = $link->query("UPDATE $user SET bottle = bottle + 1");
		$results = $link->query("UPDATE $user SET glass = glass - 1"); 
		include ('update_feed.php'); // --- update feed
	}
}
else if($input=='craft all bottle') 
{	
	$times = $glass;
	
    if ($fire == $room && $craftingtable==$room && $crafting >= 1 && $glass >= 1)
	{	echo "You CRAFT $times bottles<br/>";
		$message = "You CRAFT $times bottles<br/>";
		$results = $link->query("UPDATE $user SET glass = glass - $times");
		$results = $link->query("UPDATE $user SET bottle = bottle + $times"); 
		include ('update_feed.php'); // --- update feed
		}		
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT red potion
else if($craftingtable==$room && $input=='craft red potion' && $crafting >= 1 && $bottle >= 1 && $redberry >=5) 
{	
	echo $message = "You craft a RED POTION out of 5 redberries and a bottle<br/>";
	$results = $link->query("UPDATE $user SET bottle = bottle - 1");
	$results = $link->query("UPDATE $user SET redberry = redberry - 5"); 
	$results = $link->query("UPDATE $user SET redpotion = redpotion + 1"); 
	include ('update_feed.php'); // --- update feed
}
else if($input=='craft all red potion') 
{	
	$times = $redberry/5;
	$times = floor($times); // round down
	$qty = $times * 5;
	
    if ($craftingtable == $room && $crafting >= 1 && $redberry >= 5)
	{	echo $message ="You craft $qty redberries into $times Red Potions!<br/>";
		$results = $link->query("UPDATE $user SET redberry = redberry - $qty");
		$results = $link->query("UPDATE $user SET redpotion = redpotion + $times"); 
		include ('update_feed.php'); // --- update feed
		}		
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT blue potion
else if($craftingtable==$room && $input=='craft blue potion' && $crafting >= 1 && $bottle >= 1 && $blueberry >=5) 
{	
	echo $message = "You craft a BLUE POTION out of 5 blueberries and a bottle<br/>";
	$results = $link->query("UPDATE $user SET bottle = bottle - 1");
	$results = $link->query("UPDATE $user SET blueberry = blueberry - 5");
	$results = $link->query("UPDATE $user SET bluepotion = bluepotion + 1"); 
	include ('update_feed.php'); // --- update feed
}
else if($input=='craft all blue potion') 
{	
	$times = $blueberry/5;
	$times = floor($times); // round down
	$qty = $times * 5;
	
    if ($craftingtable==$room && $crafting >= 1 && $blueberry >= 5)
	{	echo $message ="You craft $qty blueberries into $times Blue Potions!<br/>";
		$results = $link->query("UPDATE $user SET blueberry = blueberry - $qty");
		$results = $link->query("UPDATE $user SET bluepotion = bluepotion + $times"); 
		include ('update_feed.php'); // --- update feed
		}		
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT purple potion
else if($craftingtable==$room && $input=='craft purple potion' && $crafting >= 1 && $redpotion >=1 && $bluepotion >=1) 
{	
	echo $message = "You craft a PURPLE POTION out of a Red Potion and a Blue Potion<br/>";
	$results = $link->query("UPDATE $user SET redpotion = redpotion - 1");
	$results = $link->query("UPDATE $user SET bluepotion = bluepotion - 1");
	$results = $link->query("UPDATE $user SET purplepotion = purplepotion + 1"); 
	include ('update_feed.php'); // --- update feed
}
else if($input=='craft all purple potion') 
{	
	$times = $redpotion;
	if ($redpotion > $bluepotion ) {$times=$bluepotion;} 

    if ($craftingtable==$room && $crafting >= 1 && $redpotion >=1 && $bluepotion >=1)
	{	echo $message ="You combine your Red and Blue Potions into $times Purple Potions!<br/>";
		$results = $link->query("UPDATE $user SET redpotion = redpotion - $times");
		$results = $link->query("UPDATE $user SET bluepotion = bluepotion - $times");
		$results = $link->query("UPDATE $user SET purplepotion = purplepotion + $times"); 
		include ('update_feed.php'); // --- update feed
		}		
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx hatchet
else if($craftingtable==$room && $crafting >= 1 && $input=='craft hatchet' && $stone >=3 && $wood >=1) 
{	echo $message = "You craft a HATCHET out of 3 stone and 1 wood<br/>";
	$results = $link->query("UPDATE $user SET hatchet = hatchet + 1"); 
	$results = $link->query("UPDATE $user SET stone = stone - 3"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
	}
	
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx pickaxe
else if($craftingtable==$room && $crafting >= 1 && $input=='craft pickaxe' && $stone >=3 && $wood >=1) 
{	echo $message = "You craft a PICKAXE out of 3 stone and 1 wood<br/>";
	$results = $link->query("UPDATE $user SET pickaxe = pickaxe + 1"); 
	$results = $link->query("UPDATE $user SET stone = stone - 3"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
	}
	
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx hammer
else if($craftingtable==$room && $crafting >= 1 && $input=='craft hammer' && $stone >=3 && $wood >=1) 
{	echo $message = "You craft a HAMMER out of 3 stone and 1 wood<br/>";
	$results = $link->query("UPDATE $user SET hammer = hammer + 1"); 
	$results = $link->query("UPDATE $user SET stone = stone - 3"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
	}	
	

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT wooden items!!!
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden staff
else if($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden staff' && $wood >=7) 
{	echo $message = "You craft a WOODEN STAFF out of 7 wood<br/>";
	$results = $link->query("UPDATE $user SET woodenstaff = woodenstaff + 1"); 
	$results = $link->query("UPDATE $user SET wood = wood - 7"); 
	include ('update_feed.php'); // --- update feed
	}	
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden bo
else if($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden bo'  && $wood >=7) 
{	echo $message = "You craft a WOODEN BO out of 7 wood<br/>";
	$results = $link->query("UPDATE $user SET woodenbo = woodenbo + 1"); 
	$results = $link->query("UPDATE $user SET wood = wood - 7"); 
	include ('update_feed.php'); // --- update feed
	}	
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden shield
else if($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden shield' && $stone >=2 && $wood >=5) 
{	echo $message = "You craft a WOODEN SHIELD out of 5 wood and 2 stone<br/>";
	$results = $link->query("UPDATE $user SET woodenshield = woodenshield + 1"); 
	$results = $link->query("UPDATE $user SET stone = stone - 2"); 
	$results = $link->query("UPDATE $user SET wood = wood - 5"); 
	include ('update_feed.php'); // --- update feed
	}					
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden bow
else if($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden bow' && $string >=1 && $wood >=5) 
{	echo $message = "You craft a WOODEN BOW out of 5 wood and 1 string<br/>";
	$results = $link->query("UPDATE $user SET woodenbow = woodenbow + 1"); 
	$results = $link->query("UPDATE $user SET string = string - 1"); 
	$results = $link->query("UPDATE $user SET wood = wood - 5"); 
	include ('update_feed.php'); // --- update feed
	}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 10 arrows
else if($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft 10 arrows' && $stone >=1 && $wood >=1) 
{	echo $message = "You craft 10 ARROWS out of 1 wood and 1 stone<br/>";
	$results = $link->query("UPDATE $user SET arrows = arrows + 10"); 
	$results = $link->query("UPDATE $user SET stone = stone - 1"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
	}	
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx javelin
else if($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft javelin' && $dagger >=1 && $wood >=1) 
{	echo $message = "You craft a THROWING SPEAR out of 1 wood and 1 dagger<br/>";
	$results = $link->query("UPDATE $user SET javelin = javelin + 1"); 
	$results = $link->query("UPDATE $user SET dagger = dagger - 1"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
	}					
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx wooden boat
else if($craftingtable==$room && $crafting >= 1 && $hammer >=1 && $input=='craft wooden boat'  && $wood >=20) 
{	echo $message = "You craft a WOODEN BOAT out of 20 wood!<br/>";
	$results = $link->query("UPDATE $user SET MOUNTwoodenboat = MOUNTwoodenboat + 1"); 
	$results = $link->query("UPDATE $user SET wood = wood - 20"); 
	include ('update_feed.php'); // --- update feed
	}	
	
	
	

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT leather!!!
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather hood
else if($craftingtable==$room && $crafting >= 1 && $input=='craft leather hood' && $hammer >=1 && $leather >=3) 
{	echo $message = "You craft a LEATHER HOOD using 3 leather<br/>";
	$results = $link->query("UPDATE $user SET leatherhood = leatherhood + 1"); 
	$results = $link->query("UPDATE $user SET leather = leather - 3"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather helmet
else if($craftingtable==$room && $crafting >= 1 && $input=='craft leather helmet' && $hammer >=1 && $leather >=5) 
{	echo $message = "You craft a LEATHER HELMET using 5 leather<br/>";
	$results = $link->query("UPDATE $user SET leatherhelmet = leatherhelmet + 1"); 
	$results = $link->query("UPDATE $user SET leather = leather - 5"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather vest
else if($craftingtable==$room && $crafting >= 1 && $input=='craft leather vest' && $hammer >=1 && $leather >=7) 
{	echo $message = "You craft a LEATHER VEST using 7 leather<br/>";
	$results = $link->query("UPDATE $user SET leathervest = leathervest + 1"); 
	$results = $link->query("UPDATE $user SET leather = leather - 7"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather armor
else if($craftingtable==$room && $crafting >= 1 && $input=='craft leather armor' && $hammer >=1 && $leather >=10) 
{	echo $message = "You craft a LEATHER ARMOR using 10 leather<br/>";
	$results = $link->query("UPDATE $user SET leatherarmor = leatherarmor + 1"); 
	$results = $link->query("UPDATE $user SET leather = leather - 10"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather gloves
else if($craftingtable==$room && $crafting >= 1 && $input=='craft leather gloves' && $hammer >=1 && $leather >=3) 
{	echo $message = "You craft a LEATHER GLOVES using 3 leather<br/>";
	$results = $link->query("UPDATE $user SET leathergloves = leathergloves + 1"); 
	$results = $link->query("UPDATE $user SET leather = leather - 3"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx leather boots
else if($craftingtable==$room && $crafting >= 1 && $input=='craft leather boots' && $hammer >=1 && $leather >=3) 
{	echo $message = "You craft a LEATHER BOOTS using 3 leather<br/>";
	$results = $link->query("UPDATE $user SET leatherboots = leatherboots + 1"); 
	$results = $link->query("UPDATE $user SET leather = leather - 3"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT iron!!!
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron dagger
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron dagger' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=1 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON DAGGER</span> using 1 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET irondagger = irondagger + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 1"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
	}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron sword
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron sword' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON SWORD</span> using 7 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironsword = ironsword + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 7"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron staff
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron staff' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON STAFF</span> using 7 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironstaff = ironstaff + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 7"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron maul
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron maul' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON MAUL</span> using 10 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironmaul = ironmaul + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 10"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron 2hsword
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron 2h sword' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=15 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON 2H SWORD</span> using 15 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 15"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron battlestaff
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron battle staff' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=15 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON BATTLE STAFF</span> using 15 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 15"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron nunchaku
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron nunchaku' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10 && $graymatter >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON NUNCHAKU</span> using 10 iron & 1 gray matter!</div>";
	$results = $link->query("UPDATE $user SET ironnunchaku = ironnunchaku + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 10"); 
	$results = $link->query("UPDATE $user SET graymatter = graymatter - 1"); 
	include ('update_feed.php'); // --- update feed
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron boomerang
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron boomerang' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=5 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON BOOMERANG</span> using 5 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironboomerang = ironboomerang + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 5"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron bow
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron bow' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON BOW</span> using 7 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironbow = ironbow + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 7"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron crossbow
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron crossbow' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON CROSSBOW</span> using 10 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironcrossbow = ironcrossbow + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 10"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron chakram
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron chakram' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7 && $graymatter >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON CHAKRAM</span> using 7 iron & 1 gray matter!</div>";
	$results = $link->query("UPDATE $user SET ironchakram = ironchakram + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 7"); 
	$results = $link->query("UPDATE $user SET graymatter = graymatter - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron javelin
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron javelin' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $irondagger >=1 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON JAVELIN</span> using 1 iron dagger & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironjavelin = ironjavelin + 1"); 
	$results = $link->query("UPDATE $user SET irondagger = irondagger - 1"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
	}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron shield
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron shield' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON SHIELD</span> using 10 iron!</div>";
	$results = $link->query("UPDATE $user SET ironshield = ironshield + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 10"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron kite shield
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron kite shield' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=15) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON KITE SHIELD</span> using 15 iron!</div>";
	$results = $link->query("UPDATE $user SET ironkiteshield = ironkiteshield + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 15"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron helmet
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron helmet' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=5) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON HELMET</span> using 5 iron!</div>";
	$results = $link->query("UPDATE $user SET ironhelmet = ironhelmet + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 5"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron hood
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron hood' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON HOOD</span> using 3 iron!</div>";
	$results = $link->query("UPDATE $user SET ironhood = ironhood + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 3"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron armor
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron armor' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=10) 
{	echo $message = "<div class='menuAction'>You craft some <span class='brown'>IRON ARMOR</span> using 10 iron!</div>";
	$results = $link->query("UPDATE $user SET ironarmor = ironarmor + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 10"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron cape
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron cape' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=7) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON SHIELD</span> using 7 iron!</div>";
	$results = $link->query("UPDATE $user SET ironcape = ironcape + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 7"); 
	include ('update_feed.php'); // --- update feed
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron gauntlets
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron gauntlets' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=5) 
{	echo $message = "<div class='menuAction'>You craft a pair of <span class='brown'>IRON GAUNTLETS</span> using 5 iron!</div>";
	$results = $link->query("UPDATE $user SET irongauntlets = irongauntlets + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 5"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron gloves
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron gloves' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3) 
{	echo $message = "<div class='menuAction'>You craft a pair of <span class='brown'>IRON GLOVES</span> using 3 iron!</div>";
	$results = $link->query("UPDATE $user SET irongloves = irongloves + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 3"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron boots
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron boots' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3) 
{	echo $message = "<div class='menuAction'>You craft a pair of <span class='brown'>IRON BOOTS</span> using 3 iron!</div>";
	$results = $link->query("UPDATE $user SET ironboots = ironboots + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 3"); 
	include ('update_feed.php'); // --- update feed
}










// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron hatchet
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron hatchet' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON HATCHET</span> using 3 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 3"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron pickaxe
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron pickaxe' && ($ironhammer >=1 || $steelhammer >=1 || $mithrilhammer >=1) && $iron >=3 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON PICKAXE</span> using 3 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironpickaxe = ironpickaxe + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 3"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx iron hammer
else if($craftingtable==$room && $crafting >= 2 && $input=='craft iron hammer' && $iron >=3 && $wood >=1) 
{	echo $message = "<div class='menuAction'>You craft an <span class='brown'>IRON HAMMER</span> using 3 iron & 1 wood!</div>";
	$results = $link->query("UPDATE $user SET ironhammer = ironhammer + 1"); 
	$results = $link->query("UPDATE $user SET iron = iron - 3"); 
	$results = $link->query("UPDATE $user SET wood = wood - 1"); 
	include ('update_feed.php'); // --- update feed
}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx CRAFT rings!!!
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings II
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of strength II' ) && $hammer >=1 && $ringofstrength >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Strength II<br/>";
	$results = $link->query("UPDATE $user SET ringofstrength = ringofstrength - 2"); 
	$results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of dexterity II' ) && $hammer >=1 && $ringofdexterity >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Dexterity II<br/>";
	$results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity - 2"); 
	$results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of magic II' ) && $hammer >=1 && $ringofmagic >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Magic II<br/>";
	$results = $link->query("UPDATE $user SET ringofmagic = ringofmagic - 2"); 
	$results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of defense II' ) && $hammer >=1 && $ringofdefense >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Defense II<br/>";
	$results = $link->query("UPDATE $user SET ringofdefense = ringofdefense - 2"); 
	$results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings III
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of strength III' ) && $hammer >=1 && $ringofstrengthII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Strength III<br/>";
	$results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII - 2"); 
	$results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of dexterity III' ) && $hammer >=1 && $ringofdexterityII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Dexterity III<br/>";
	$results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII - 2"); 
	$results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of magic III' ) && $hammer >=1 && $ringofmagicII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Magic III<br/>";
	$results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII - 2"); 
	$results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of defense III' ) && $hammer >=1 && $ringofdefenseII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Defense III<br/>";
	$results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII - 2"); 
	$results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings IV
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of strength IV' ) && $hammer >=1 && $ringofstrengthIII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Strength IV<br/>";
	$results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII - 2"); 
	$results = $link->query("UPDATE $user SET ringofstrengthIV = ringofstrengthIV + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of dexterity IV' ) && $hammer >=1 && $ringofdexterityIII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Dexterity IV<br/>";
	$results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII - 2"); 
	$results = $link->query("UPDATE $user SET ringofdexterityIV = ringofdexterityIV + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of magic IV' ) && $hammer >=1 && $ringofmagicIII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Magic IV<br/>";
	$results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII - 2"); 
	$results = $link->query("UPDATE $user SET ringofmagicIV = ringofmagicIV + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of defense IV' ) && $hammer >=1 && $ringofdefenseIII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Defense IV<br/>";
	$results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII - 2"); 
	$results = $link->query("UPDATE $user SET ringofdefenseIV = ringofdefenseIV + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings V
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of strength V' ) && $hammer >=1 && $ringofstrengthIV >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Strength V<br/>";
	$results = $link->query("UPDATE $user SET ringofstrengthIV = ringofstrengthIV - 2"); 
	$results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of dexterity V' ) && $hammer >=1 && $ringofdexterityIV >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Dexterity V<br/>";
	$results = $link->query("UPDATE $user SET ringofdexterityIV = ringofdexterityIV - 2"); 
	$results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of magic V' ) && $hammer >=1 && $ringofmagicIV >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Magic V<br/>";
	$results = $link->query("UPDATE $user SET ringofmagicIV = ringofmagicIV - 2"); 
	$results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of defense V' ) && $hammer >=1 && $ringofdefenseIV >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Defense V<br/>";
	$results = $link->query("UPDATE $user SET ringofdefenseIV = ringofdefenseIV - 2"); 
	$results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1"); 
	include ('update_feed.php'); // --- update feed
	$input='craft';}
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx rings of regen
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of health regen II' ) && $hammer >=1 && $ringofhealthregen >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Health Regen II<br/>";
	$results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen - 2"); 
	$results = $link->query("UPDATE $user SET ringofhealthregenII = ringofhealthregenII + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of mana regen II' ) && $hammer >=1 && $ringofmanaregen >=2) 
{	echo $message = "You combine your 2 rings into a Ring of mana Regen II<br/>";
	$results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen - 2"); 
	$results = $link->query("UPDATE $user SET ringofmanaregenII = ringofmanaregenII + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}
	
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of health regen III' ) && $hammer >=1 && $ringofhealthregenII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Health Regen III<br/>";
	$results = $link->query("UPDATE $user SET ringofhealthregenII = ringofhealthregenII - 2"); 
	$results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of mana regen III' ) && $hammer >=1 && $ringofmanaregenII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of mana Regen III<br/>";
	$results = $link->query("UPDATE $user SET ringofmanaregenII = ringofmanaregenII - 2"); 
	$results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}

else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of health regen IV' ) && $hammer >=1 && $ringofhealthregenIII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Health Regen IV<br/>";
	$results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII - 2"); 
	$results = $link->query("UPDATE $user SET ringofhealthregenIV = ringofhealthregenIV + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of mana regen IV' ) && $hammer >=1 && $ringofmanaregenIII >=2) 
{	echo $message = "You combine your 2 rings into a Ring of mana Regen IV<br/>";
	$results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII - 2"); 
	$results = $link->query("UPDATE $user SET ringofmanaregenIV = ringofmanaregenIV + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}
	
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of health regen V' ) && $hammer >=1 && $ringofhealthregenIV >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Health Regen V<br/>";
	$results = $link->query("UPDATE $user SET ringofhealthregenIV = ringofhealthregenIV - 2"); 
	$results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of mana regen V' ) && $hammer >=1 && $ringofmanaregenIV >=2) 
{	echo $message = "You combine your 2 rings into a Ring of mana Regen V<br/>";
	$results = $link->query("UPDATE $user SET ringofmanaregenIV = ringofmanaregenIV - 2"); 
	$results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}	

	
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of health regen VI' ) && $hammer >=1 && $ringofhealthregenV >=2) 
{	echo $message = "You combine your 2 rings into a Ring of Health Regen VI<br/>";
	$results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV - 2"); 
	$results = $link->query("UPDATE $user SET ringofhealthregenVI = ringofhealthregenVI + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}
else if($craftingtable==$room && $crafting >= 1 && ( $input == 'auto combine' || $input=='craft ring of mana regen VI' ) && $hammer >=1 && $ringofmanaregenV >=2) 
{	echo $message = "You combine your 2 rings into a Ring of mana Regen VI<br/>";
	$results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV - 2"); 
	$results = $link->query("UPDATE $user SET ringofmanaregenVI = ringofmanaregenVI + 1"); 
	$input='craft'; include ('update_feed.php'); // --- update feed
	}	
		
	
		
			


} // END CRAFT FUNTIONS	


// m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m m  Materials List
if($input=='list materials' || $input=='list my materials') {
$message = '<h3>Materials List</h3>';	include ('update_feed.php');
	if ($rawmeat > 0) { 
		$message='<span>'.$rawmeat.'x </span> raw meat<br/>';include ('update_feed.php');}	
	if ($redberry > 0) { 
		$message='<span>'.$redberry.'x </span> redberry<br/>';include ('update_feed.php');}	
	if ($blueberry > 0) { 
		$message='<span>'.$blueberry.'x </span> blueberry<br/>';include ('update_feed.php');}	
	if ($sand > 0) { 
		$message='<span>'.$sand.'x </span> sand<br/>';include ('update_feed.php');}	
	if ($glass > 0) { 
		$message='<span>'.$glass.'x </span> glass<br/>';include ('update_feed.php');}		
	if ($bottle > 0) { 
		$message='<span>'.$bottle.'x </span> bottle<br/>';include ('update_feed.php');}		
	if ($string > 0) { 
		$message='<span>'.$string.'x </span> string<br/>';include ('update_feed.php');}
	if ($dagger > 0) { 
		$message='<span>'.$dagger.'x </span> dagger<br/>';include ('update_feed.php');}
	if ($leather > 0) { 
		$message='<span>'.$leather.'x </span> <span class="brown"> leather</span><br/>';include ('update_feed.php');}			
	if ($wood > 0) { 
		$message='<span>'.$wood.'x </span> <span class="brown"> wood</span><br/>';include ('update_feed.php');}			
	if ($stone > 0) { 
		$message='<span>'.$stone.'x </span> <span class="darkestgray"> stone</span><br/>';include ('update_feed.php');}
	if ($iron > 0) { 
		$message='<span>'.$iron.'x </span> <span class="brown"> iron</span><br/>';include ('update_feed.php');}
	
}
?>