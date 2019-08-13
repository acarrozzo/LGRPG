<?php
// --------------------------------------------------------------------------------- Quests TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   


echo '<article id="missions">
      <ul>
		<h4>In Progress</h4>';	// --------------------------------------- IN PROGRESS
	

if($row['grandquest1']=='1') { echo '<div class="questhead"><h7>Grand Quest - In Progress</h7><h4 class="">1) GRASSY FIELD SAVIOR </h4> (Complete Quests 1-9)</div>'; }



if($row['quest1']=='1' || $row['quest2']=='1' || $row['quest3']=='1') {echo '<h4><span class="green">Old Man | Old Cabin</span></h3>';}
	if($row['quest1']=='1') { echo '<span class="green">1) A Flower for my Wife:</span> 
	   Pick a flower north of the cabin and bring it to the old man.</br>';	}
	if($row['quest2']=='1') { echo '<span class="green">2) Practice on the Dummy:</span> 
	   Practice your attacks on the dummy in the cabin.</br>';	}
	if($row['quest3']=='1') { echo '<span class="green">3) Rat Problem:</span> 
	   Go down into the basement and exterminate a giant rat.</br>';}
	   
	   
if($row['quest4']=='1' || $row['quest5']=='1' || $row['quest6']=='1') {
				echo '<h4><span class="green">Young Soldier | Weapons Training</span></h3>';}
	if($row['quest4']=='1') { echo '<span class="green">4) My First Sword and Shield:</span> 
	   Get and equip a training sword and training shield.</br>'; }
	if($row['quest5']=='1') { echo '<span class="green">5) Collect 5 Scorpion Tails:</span> 
	   Scorpions can be found in the spider cave.</br>'; }
	if($row['quest6']=='1') { echo '<span class="green">6) Training Armor Pro:</span> Equip all training equipment.</br>
	   Training Helmet - Sand Crab Drop</br> Training Armor - Gator Drop</br> 
	   Training Gloves - Spider Drop</br> Training Boots - Scorpion Drop</br>'; }
	
if($row['quest7']=='1' || $row['quest8']=='1' || $row['quest9']=='1') {
				echo '<h4><span class="green">Jack Lumber | Professional Lumberjack</span></h3>';}
	if($row['quest7']=='1') { echo '<span class="green">7) Boomerang Some Bats:</span> 
	   Equip your boomerang, head to the bat cave and collect 5 bat wings.</br>'; }
	if($row['quest8']=='1') { echo '<span class="green">8) Chop some Wood, Craft a Table:</span> 
	   Chop 3 wood then craft a table.</br>'; }
	if($row['quest9']=='1') { echo '<span class="green">9) Goblin Chief Bounty:</span> 
	   Find and eliminate the Goblin Chief hiding out in the bat cave.</br>'; }



if($row['quest1']=='2' && $row['quest2']=='2' && $row['quest3']=='2' && $row['quest4']=='2' && $row['quest5']=='2' && $row['quest6']=='2' && $row['quest7']=='2' && $row['quest8']=='2' && $row['quest9']=='2' && $row['grandquest1']=='1' ){
	
	echo '<br>
<h4 class="yellow">MISSIONS 1-9 COMPLETED!</h4>
	   Return to the GRAND QUEST PILLAR for your reward. <br>
		( 2 spaces north of Grassy Field teleport )</br>';
}


	
	
if($row['grandquest2']=='1') { 	
		echo '<div class="questhead"><h7>Grand Quest - In Progress</h7><h4 class="">2) RED TOWN SAVIOR </h4> (Complete Quests 10-30)</div>'; }

if($row['quest10']=='1') {echo '<h4><span class="green">Freddie\'s Cow Farm</span></h3>';}
	if($row['quest10']=='1') { echo '<span class="green">10) Craft with Leather:</span> Craft some leather equipment using the hides from Freddie\'s cows.</br>'; }
	
	if($row['quest11']=='1' || $row['quest12']=='1' || $row['quest13']=='1') {
				echo '<h4><span class="green">Red Guard Captain</span></h3>';}
	if($row['quest11']=='1') { echo '<span class="green">11) Bring 3 Thieves to Justice:</span> 
	   You will encounter thieves as you travel about. Return when you have brought 3 to justice.</br>'; }
	if($row['quest12']=='1') { echo '<span class="green">12) Swords for the Red Guard:</span> 
	   Buy or find 5 long swords. Alpha Scorpions, Orcs, Kobolds & Tarantulas drop them.</br>'; }
	if($row['quest13']=='1') { echo '<span class="green">13) Sewer Pest Control:</span> 
	   Kill a Tarantula, a Sewer Rat and a Red Gator in the Sewers below Red Town.</br>'; }

if($row['quest14']=='1' || $row['quest15']=='1' || $row['quest16']=='1') {
				echo '<h4><span class="green">Forest Gnome - Tree Hut</span></h3>';}
	
if($row['quest14']=='1') { echo '<span class="green">14) Gnome Needs Berries:</span> 
	   The Tree Gnome needs some berries. Return with 20 red and 20 blue.</br>'; }
	if($row['quest15']=='1') { echo '<span class="green">15) New Tree Hut Door:</span> 
	   The Tree Gnome needs a new door for his hut. Go collect 20 wood for him.<br/>'; }
	if($row['quest16']=='1') { echo '<span class="green">16) Troll Base Camp:</span> 
		Trolls guard the gate to the Dark Forest up north. Go slay 3 of them and return for a reward.</br>'; }						
	
if($row['quest17']=='1' || $row['quest18']=='1') {echo '<h4><span class="green">Hunter Bill | Hunter Skills</span></h3>';}
	if($row['quest17']=='1') { echo '<span class="green">17) Bigfoot Sighting:</span> 
	   Prove you\'ve seen Bigfoot by bringing back his big foot.</br>'; }	
	if($row['quest18']=='1') { echo '<span class="green">18) Forest Hunter:</span> 
	   Hunt down a Wild Boar, Wolf, Coyote, Buck, Bear & Stag.</br>'; }			

if($row['quest19']=='1') {echo '<h4><span class="green">Warrior\'s Guild Initiation</span></h3>';}
	if($row['quest19']=='1') { echo '<span class="green">19) Warrior\'s Initiation:</span>
	   Defeat the Ogre Lieutenant in his Lair north of here.</br>'; }	

if($row['quest20']=='1') {echo '<h4><span class="green">Wizard\'s Guild Initiation</span></h3>';}
	if($row['quest20']=='1') { echo '<span class="green">20) Wizard\'s Initiation:</span> 
	   Defeat the Kobold Master in his Lair north of here.</br>'; }

if($row['quest21']=='1' || $row['quest22']=='1' || $row['quest23']=='1') { echo '<h4><span class="green">Red Town Lobby</span></h3>';}
	if($row['quest21']=='1') { echo '<span class="green">21) Twice as Nice:</span> 
	   Pick 2 flowers: One from the Grassy Field and one from the Babylon Gardens.</br>'; }
	if($row['quest22']=='1') { echo '<span class="green">22) Cookin up some Meat-a-balls:</span> 
	   Collect 5 pieces of cooked meat and the chef will teach you how to cook meatballs.</br>'; }
	if($row['quest23']=='1') { echo '<span class="green">23) Stolen Teddy Bear:</span> 
	   Retrieve little Suzie\'s stolen stuffed animal from the Master Thief.</br>'; }	
	
if($row['quest24']=='1') {echo '<h4><span class="green">Red Town Mayor</span></h3>';}
	if($row['quest24']=='1') { echo '<span class="green">24) Scorpion King Bounty:</span> 
	   Defeat the Scorpion King in his lair below the Spider Cave.</br>'; }	  
	
if($row['quest25']=='1' || $row['quest26']=='1' || $row['quest27']=='1') { echo '<h4><span class="green">Warrior\'s Guild | Pete\'s Quests</span></h3>';}
	if($row['quest25']=='1') { echo '<span class="green">25) Banish the Skeleton Knights:</span> 
	   Send 3 Skeleton Knights back to Hell.</br>'; }
	if($row['quest26']=='1') { echo '<span class="green">26) Shark Hunter:</span> 
	   Hunt down a Great White and Hammerhead Shark.</br>'; }
	if($row['quest27']=='1') { echo '<span class="green">27) True Troll Champion:</span> 
	   Defeat 3 Troll Champions.</br>'; }
   	
if($row['quest28']=='1' || $row['quest29']=='1' || $row['quest30']=='1') { echo '<h4><span class="green">Wizard\'s Guild | Morty\'s Quests</span></h3>';}			
	if($row['quest28']=='1') { echo '<span class="green">28) Rare Gray Matter:</span> 
	   Find a piece of gray matter and show it to Morty.</br>'; }
   	if($row['quest29']=='1') { echo '<span class="green">29) Omar & Victoria the Dead:</span> 
	   Defeat this undead duo in the Catacombs.</br>'; }
	if($row['quest30']=='1') { echo '<span class="green">30) Magic of the Troll Queen:</span> 
	   Slay the Troll Queen with magic.</br>'; }
	
if($row['grandquest3']=='1') { echo '<div class="questhead"><h7>Grand Quest - In Progress</h7><h4 class="">3) STONE MINE SAVIOR </h4> (Complete Quests 31-50)</div>'; }

if($row['quest31']=='1') { echo '<h4><span class="green">Mining Guild Initiation</span></h3>';}
	if($row['quest31']=='1') { echo '<span class="green">31) Stone Mine & Guild Access:</span> Defeat the Kraken.</br>'; }
	
if($row['quest35']=='1' || $row['quest36']=='1' || $row['quest37']=='1') { echo '<h4><span class="green">Dwarf Captain</span></h3>';}			
	if($row['quest35']=='1') { echo '<span class="green">35) Clear out the Abandoned Mines:</span> 
	   Eliminate the mutated creatures that have overrun the Abandoned Mine.</br>'; }
   	if($row['quest36']=='1') { echo '<span class="green">36) Glowing Sea Monster:</span> 
	   Find the fabled glowing monster under the Blue Ocean.</br>'; }
	if($row['quest37']=='1') { echo '<span class="green">37) Missing Dwarf Axeman:</span> 
	   A dwarf guard axeman is missing from town. He was last seen patrolling the Stone Grotto.</br>'; }
	
	
if($row['quest38']=='1' || $row['quest39']=='1' || $row['quest40']=='1') {echo '<h4><span class="green">Dwarf Guard | Bounty Board</span></h3>';}
	if($row['quest38']=='1') { echo '<span class="green">38) Red Beard Bounty:</span> 
	   Defeat Captain Red Beard in his Red Fort.</br>'; }
   	if($row['quest39']=='1') { echo '<span class="green">39) Troll King Bounty:</span> 
	   Defeat the Troll King in the Dark Forest.</br>'; }
	if($row['quest40']=='1') { echo '<span class="green">40) Gatekeeper Bounty:</span> 
	   Defeat the Gatekeeper guarding the Stone Bridge in the Mountains.</br>'; }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
echo '<br><br><h4>Not Started Yet</h4>'; 	// --------------------------------------- NOT STARTED
	
//if($row['grandquest1']=='0') { echo '<h4><span class="alt2">GQ1) GRASSY FIELD SAVIOR: Visit Grand Quest Pillar</span></h4>'; }	

if($row['quest1']=='0' || $row['quest2']=='0' || $row['quest3']=='0') {
	echo '<h4><span class="alt2">Find the Old Man in his Cabin</span><span class="alt2 num">1 - 3</span>
</h3>';}
	//if($row['quest1']=='0') { echo '<span class="alt2">1) A Flower for my Wife: Talk to the Old Man</span>'; }
	//if($row['quest2']=='0') { echo '<span class="alt2">2) Practice on the Dummy: Talk to the Old Man</span>'; }
	//if($row['quest3']=='0') { echo '<span class="alt2">3) Rat Problem: Talk to the Old Man</span>'; }
	
if($row['quest4']=='0' || $row['quest5']=='0' || $row['quest6']=='0') {
	echo '<h4><span class="alt2">Find the Young Soldier at the Training Camp</span><span class="alt2 num">4 - 6</span>
</h3>';}	
	//if($row['quest4']=='0') { echo '<span class="alt2">4) My First Sword and Shield: Talk to the Young Soldier</span>'; }
	//if($row['quest5']=='0') { echo '<span class="alt2">5) Collect 5 Scorpion Tails: Talk to the Young Soldier</span>'; }
	//if($row['quest6']=='0') { echo '<span class="alt2">6) Training Armor Pro: Talk to the Young Soldier</span>';} 
	
if($row['quest7']=='0' || $row['quest8']=='0' || $row['quest9']=='0') {
	echo '<h4><span class="alt2">Find Jack Lumber</span><span class="alt2 num">7 - 9</span>
</h3>';}
	//if($row['quest7']=='0') { echo '<span class="alt2">7) Boomerang Some Bats: Talk to Jack Lumber</span>'; }
	//if($row['quest8']=='0') { echo '<span class="alt2">8) Chop some Wood, Craft a Table: Talk to Jack Lumber</span>'; }
	//if($row['quest9']=='0') { echo '<span class="alt2">9) Goblin Chief Bounty: Talk to Jack Lumber</span>'; }

//if($row['grandquest2']=='0') { echo '<h4><span class="alt2">GQ2) RED TOWN SAVIOR: Visit Grand Quest Pillar</span></h4>'; }	
	
if($row['quest10']=='0') {
	echo '<h4><span class="alt2">Find Freddie\'s Cow Farm along the Forest Path</span><span class="alt2 num">10</span>
</h3>';}
	//if($row['quest10']=='0') { echo '<span class="alt2">10) Craft with Leather: Talk to Freddie</span>'; }
	
if($row['quest11']=='0' || $row['quest12']=='0' || $row['quest13']=='0') {
	echo '<h4><span class="alt2">Find the Red Guard Captain in Red Town</span><span class="alt2 num">11 - 13</span>
</h3>';}
	//if($row['quest11']=='0') { echo '<span class="alt2">11) Bring 3 Thieves to Justice: Talk to the Red Guard Captain</span>'; }
	//if($row['quest12']=='0') { echo '<span class="alt2">12) Swords for the Red Guard: Talk to the Red Guard Captain</span>'; }
	//if($row['quest13']=='0') { echo '<span class="alt2">13) Sewer Pest Control: Talk to the Red Guard Captain</span>'; }
	
	
if($row['quest14']=='0' || $row['quest15']=='0' || $row['quest16']=='0') {
	echo '<h4><span class="alt2">Find the Forest Gnome in his Tree Hut</span><span class="alt2 num">14 - 16</span>
</h3>';}
	//if($row['quest14']=='0') { echo '<span class="alt2">14) Gnome Needs Berries: Talk to the Tree Gnome</span>'; }
	//if($row['quest15']=='0') { echo '<span class="alt2">15) New Tree Hut Door: Talk to the Tree Gnome</span>'; }
	//if($row['quest16']=='0') { echo '<span class="alt2">16) Troll Base Camp: Talk to the Tree Gnome</span>'; }

if($row['quest17']=='0' || $row['quest18']=='0') {
	echo '<h4><span class="alt2">Find Hunter Bill in the Forest </span><span class="alt2 num">17,18</span>
</h3>';}
	//if($row['quest17']=='0') { echo '<span class="alt2">17) Bigfoot Sighting: Talk to Hunter Bill</span>'; }
	//if($row['quest18']=='0') { echo '<span class="alt2">18) Forest Hunter: Talk to Hunter Bill</span>'; }
	
if($row['quest19']=='0') {
	echo '<h4><span class="alt2">Find the Warrior\'s Guild Entrance</span><span class="alt2 num">19</span>
</h3>';}
	//if($row['quest19']=='0') { echo '<span class="alt2">19) Warrior\'s Guild Initiation: Defeat Ogre Lieutenant</span>'; }
	
if($row['quest20']=='0') {
	echo '<h4><span class="alt2">Find the Wizard\'s Guild Entrance</span><span class="alt2 num">20</span>
</h3>';}
	//if($row['quest20']=='0') { echo '<span class="alt2">20) Wizard\'s Guild Initiation: Defeat Kobold Master</span>'; }

if($row['quest21']=='0' || $row['quest22']=='0' || $row['quest23']=='0') {
	echo '<h4><span class="alt2">Help the People found at the Red Town Lobby</span><span class="alt2 num">21 - 23</span>
</h3>';}
	//if($row['quest21']=='0') { echo '<span class="alt2">21) Twice as Nice: Visit the Red Town Lobby</span>'; }
	//if($row['quest22']=='0') { echo '<span class="alt2">22) Cookin up some Meat-a-balls: Visit the Red Town Lobby</span>'; }
	//if($row['quest23']=='0') { echo '<span class="alt2">23) Stolen Teddy Bear: Visit the Red Town Lobby</span>'; }

if($row['quest24']=='0') {
	echo '<h4><span class="alt2">Visit the Red Town Mayor</span><span class="alt2 num">24</span>
</h3>';}
	//if($row['quest24']=='0') { echo '<span class="alt2">24) Scorpion King Bounty: Visit the Red Town Mayor</span>'; }
	
if($row['quest25']=='0' || $row['quest26']=='0' || $row['quest27']=='0') {
	echo '<h4><span class="alt2">Talk to Pete in the Warrior\'s Guild</span><span class="alt2 num">25 - 27</span>
</h3>';}
	//if($row['quest25']=='0') { echo '<span class="alt2">25) Banish the Skeleton Knights: Visit Warrior Pete</span>'; }
	//if($row['quest26']=='0') { echo '<span class="alt2">26) Shark Hunter: Visit Warrior Pete</span>'; }
	//if($row['quest27']=='0') { echo '<span class="alt2">27) True Troll Champion: Visit Warrior Pete</span>'; }

if($row['quest28']=='0' || $row['quest29']=='0' || $row['quest30']=='0') {
	echo '<h4><span class="alt2">Talk to Morty at the Wizard\'s Guild</span><span class="alt2 num">28 - 30</span>
</h3>';}
	//if($row['quest28']=='0') { echo '<span class="alt2">28) Rare Gray Matter: Visit Wizard Morty</span>'; }
	//if($row['quest29']=='0') { echo '<span class="alt2">29) Omar & Victoria the Dead: Visit Wizard Morty</span>'; }
	//if($row['quest30']=='0') { echo '<span class="alt2">30) Magic of the Troll Queen: Visit Wizard Morty</span>'; }


//if($row['grandquest3']=='0') { echo '<h4><span class="alt2">GQ3) STONE MINE SAVIOR: Visit Grand Quest Pillar</span></h4>'; }	
	

if($row['quest31']=='0') {echo '<h4><span class="alt2">Find the Mining Guild Entrance</span><span class="alt2 num">31</span>
</h3>';}
	 	//if($row['quest31']=='0') { echo '<span class="alt2">31) Stone Mine Access [Kraken]: Mining Guild</span>'; }
if($row['quest32']=='0') {echo '<h4><span class="alt2">Find the Mining Guild Headquarters</span><span class="alt2 num">32 - 34</span>
</h3>';}
	 	//if($row['quest32']=='0') { echo '<span class="alt2">32) Iron Boss [The Phoenix]: Mining Guild Headquarters</span>'; }
	 	//if($row['quest33']=='0') { echo '<span class="alt2">33) Steel Boss [Cyclops]: Mining Guild Headquarters</span>'; }
	 	//if($row['quest34']=='0') { echo '<span class="alt2">34) Mithril Boss [Minotaur]: Mining Guild Headquarters</span>'; }
if($row['quest35']=='0') {echo '<h4><span class="alt2">Find the Dwarf Captain</span><span class="alt2 num">35 - 37</span>
</h3>';}
	 	//if($row['quest35']=='0') { echo '<span class="alt2">35) Clear out the Abandoned Mines: Visit the Dwarf Captain</span>'; }
	 	//if($row['quest36']=='0') { echo '<span class="alt2">36) Glowing Sea Monster: Visit the Dwarf Captain</span>'; }
	 	//if($row['quest37']=='0') { echo '<span class="alt2">37) Missing Dwarf Axeman: Visit the Dwarf Captain </span>'; }
if($row['quest38']=='0') {echo '<h4><span class="alt2">Find the Dwarf Guard Bounty Board</span><span class="alt2 num">38 - 40</span>
</h3>';}
	 	//if($row['quest38']=='0') { echo '<span class="alt2">38) Red Beard Bounty: Visit the Dwarf Guard Bounty Board </span>'; }
	 	//if($row['quest39']=='0') { echo '<span class="alt2">39) Troll King Bounty: Visit the Dwarf Guard Bounty Board </span>'; }
	 	//if($row['quest40']=='0') { echo '<span class="alt2">40) Gatekeeper Bounty: Visit the Dwarf Guard Bounty Board</span>'; }




	
echo '<br>
<br>
<h4>Completed</h4>'; 	// --------------------------------------- COMPLETED
	
	
//if($row['grandquest1']=='2') { echo '<h4 class="completed">GQ1) Grassy Field Savior (quests 1-9)</h4>'; }
//else if($row['grandquest1']=='1'){ echo '<h4 class="gray">GQ1) Grassy Field Savior (quests 1-9)</h4>'; }
//if($row['grandquest1']=='1') { echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">1) GRASSY FIELD SAVIOR - IN PROGRESS</h4> (Complete Quests 1-9)</div>'; }	
if($row['grandquest1']=='2') { echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">1) GRASSY FIELD SAVIOR</h4> (Completed Quests 1-9)</div>'; }	
	
if($row['quest1']=='2' && $row['quest2']=='2' && $row['quest3']=='2') {echo '<h4><span class="completed">Old Man | Old Cabin</span></h3>';}
	if($row['quest1']=='2') { echo '<span class="completed">1) A Flower for my Wife</span>'; }
	if($row['quest2']=='2') { echo '<span class="completed">2) Practice on the Dummy</span>'; }
	if($row['quest3']=='2') { echo '<span class="completed">3) Rat Problem</span>'; }
	
if($row['quest4']=='2' || $row['quest5']=='2' || $row['quest6']=='2') { echo '<h4><span class="completed">Young Soldier | Weapons Training</span></h3>';}
	if($row['quest4']=='2') { echo '<span class="completed">4) My First Sword and Shield</span>'; }
	if($row['quest5']=='2') { echo '<span class="completed">5) Collect 5 Scorpion Tails</span>'; }
	if($row['quest6']=='2') { echo '<span class="completed">6) Training Armor Pro</span>';} 
	
if($row['quest7']=='2' || $row['quest8']=='2' || $row['quest9']=='2') { echo '<h4><span class="completed">Jack Lumber | Professional Lumberjack</span></h3>';}
	if($row['quest7']=='2') { echo '<span class="completed">7) Boomerang Some Bats</span>'; }
	if($row['quest8']=='2') { echo '<span class="completed">8) Chop some Wood, Craft a Table</span>'; }
	if($row['quest9']=='2') { echo '<span class="completed">9) Goblin Chief Bounty</span>'; }
	
//if($row['grandquest2']=='2') { echo '<h4 class="completed">GQ2) Red Town Savior (quests 10-30)</h4>'; }
//else if($row['grandquest2']=='1'){ echo '<h4 class="gray">GQ2) Red Town Savior (quests 10-30)</h4>'; }
//if($row['grandquest2']=='1') { echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">2) RED TOWN SAVIOR - IN PROGRESS</h4> (Complete Quests 10-30)</div>'; }	
if($row['grandquest2']=='2') { echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">2) RED TOWN SAVIOR - COMPLETED!</h4> (Completed Quests 10-30)</div>'; }	

if($row['quest10']=='2') {echo '<h4><span class="completed">Freddie\'s Cow Farm</span></h3>';}
	if($row['quest10']=='2') { echo '<span class="completed">10) Craft with Leather</span>'; }
	
if($row['quest11']=='2' || $row['quest12']=='2' || $row['quest13']=='2') { echo '<h4><span class="completed">Red Guard Captain</span></h3>';}
	if($row['quest11']=='2') { echo '<span class="completed">11) Bring 3 Thieves to Justice</span>'; }
	if($row['quest12']=='2') { echo '<span class="completed">12) Swords for the Red Guard</span>'; }
	if($row['quest13']=='2') { echo '<span class="completed">13) Sewer Pest Control</span>'; }
	
if($row['quest14']=='2' || $row['quest15']=='2' || $row['quest16']=='2') { echo '<h4><span class="completed">Forest Gnome - Tree Hut</span></h3>';}
	if($row['quest14']=='2') { echo '<span class="completed">14) Gnome Needs Berries</span>'; }
	if($row['quest15']=='2') { echo '<span class="completed">15) New Tree Hut Door</span>'; }
	if($row['quest16']=='2') { echo '<span class="completed">16) Troll Base Camp</span>'; }
	
if($row['quest17']=='2' || $row['quest18']=='2') {echo '<h4><span class="completed">Hunter Bill | Hunter Skills</span></h3>';}
	if($row['quest17']=='2') { echo '<span class="completed">17) Bigfoot Sighting</span>'; }
	if($row['quest18']=='2') { echo '<span class="completed">18) Forest Hunter</span>'; }
	
if($row['quest19']=='2') {echo '<h4><span class="completed">Warrior\'s Guild Initiation</span></h3>';}
	if($row['quest19']=='2') { echo '<span class="completed">19) Warrior\'s Guild Initiation</span>'; }
	
if($row['quest20']=='2') {echo '<h4><span class="completed">Wizard\'s Guild Initiation</span></h3>';}	
	if($row['quest20']=='2') { echo '<span class="completed">20) Wizard\'s Guild Initiation</span>'; }
	
if($row['quest21']=='2' || $row['quest22']=='2' || $row['quest23']=='2') { echo '<h4><span class="completed">Red Town Lobby</span></h3>';}
	if($row['quest21']=='2') { echo '<span class="completed">21) Twice as Nice</span>'; }
	if($row['quest22']=='2') { echo '<span class="completed">22) Cookin up some Meat-a-balls</span>'; }
	if($row['quest23']=='2') { echo '<span class="completed">23) Stolen Teddy Bear</span>'; }
	
if($row['quest24']=='2') {echo '<h4><span class="completed">Red Town Mayor</span></h3>';}
 	if($row['quest24']=='2') { echo '<span class="completed">24) Scorpion King Bounty</span>'; }
	
if($row['quest25']=='2' || $row['quest26']=='2' || $row['quest27']=='2') { echo '<h4><span class="completed">Warrior\'s Guild | Pete\'s Quests</span></h3>';}
	if($row['quest25']=='2') { echo '<span class="completed">25) Banish the Skeleton Knights</span>'; }
	if($row['quest26']=='2') { echo '<span class="completed">26) Shark Hunter</span>'; }
	if($row['quest27']=='2') { echo '<span class="completed">27) True Troll Champion</span>'; }
	
if($row['quest28']=='2' || $row['quest29']=='2' || $row['quest30']=='2') { echo '<h4><span class="completed">Wizard\'s Guild | Morty\'s Quests</span></h3>';}
	if($row['quest28']=='2') { echo '<span class="completed">28) Rare Gray Matter</span>'; }
	if($row['quest29']=='2') { echo '<span class="completed">29) Omar & Victoria the Dead</span>'; }
	if($row['quest30']=='2') { echo '<span class="completed">30) Magic of the Troll Queen</span>'; }
	
//if($row['grandquest3']=='2') { echo '<h4 class="completed">GQ3) Stone Mine Savior (quests 31-50)</h4>'; }
//else if($row['grandquest3']=='1'){ echo '<h4 class="gray">GQ3) Stone Mine Savior (quests 31-50)</h4>'; }

//if($row['grandquest3']=='1') { echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">3) STONE MINE SAVIOR - IN PROGRESS</h4> (Complete Quests 31-50)</div>'; }	
if($row['grandquest3']=='2') { echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">3) STONE MINE SAVIOR - COMPLETED</h4> (Completed Quests 31-50)</div>'; }	
	
if($row['quest31']=='2') { echo '<h4><span class="completed">Mining Guild Initiation</span></h3>';}
	if($row['quest31']=='2') { echo '<span class="completed">31) Stone Mine Access: Kraken</span>'; }
	
if($row['quest32']=='2' || $row['quest33']=='2' || $row['quest34']=='2') {	echo '<h4><span class="completed">Mining Guild Headquarters</span></h3>';}
	if($row['quest32']=='2') { echo '<span class="completed">32) Iron Boss: The Phoenix</span>'; }
	if($row['quest33']=='2') { echo '<span class="completed">33) Steel Boss: Cyclops</span>'; }
	if($row['quest34']=='2') { echo '<span class="completed">34) Mithril Boss: Minotaur</span>'; }
	
if($row['quest35']=='2' || $row['quest36']=='2' || $row['quest37']=='2') {	echo '<h4><span class="completed">Dwarf Captain</span></h3>';}
	if($row['quest35']=='2') { echo '<span class="completed">35) Clear out the Abandoned Mines</span>'; }
	if($row['quest36']=='2') { echo '<span class="completed">36) Glowing Sea Monster</span>'; }
	if($row['quest37']=='2') { echo '<span class="completed">37) Missing Dwarf Axeman</span>'; }

if($row['quest38']=='2' || $row['quest39']=='2' || $row['quest40']=='2') { echo '<h4><span class="completed">Dwarf Guard | Bounty Board</span></h3>';}
	if($row['quest38']=='2') { echo '<span class="completed">38) Red Beard Bounty</span>'; }
	if($row['quest39']=='2') { echo '<span class="completed">39) Troll King Bounty</span>'; }
	if($row['quest40']=='2') { echo '<span class="completed">40) Gatekeeper Bounty</span>'; }






echo '</ul></article>';	  
 
}

    
	 

   