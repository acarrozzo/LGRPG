<?php  
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){   
	
	//<article data-pop="kl" id="kl" class="">
echo '<h2>kill list</h2>';

	
 //---------------------------------------------------------------------------- KL	

	echo '<h2>TOTAL<i></i></h2>';	
    		
	if ($row['KLtotalkill']>=1){echo '<div class="hilite"><span class="px50">'. $row['KLtotalkill'].'</span></div>	';}
	else{ echo '<div><span class="px20">No Kills Yet!</span></div>'; }
	
// echo '<div><span class="alt">KEY: </span></div>'; 
//	 echo '<div><span class="alt"><i class="rare">R</i>Rare </span></div>'; 
//	 echo '<div><span class="alt"><i class="rare">B</i>Boss </span></div>'; 
//	 echo '<div><span class="alt"><i class="rare">D</i>Dragon </span></div>'; 
	
	echo '<h2 class="yellowgreen">Grassy Field<i>lvl 1-5</i></h2>';	
    		
	if ($row['KLrat']>=1){echo '<div class="hilite"><i class="elvl">1:</i> Rat <span>'. $row['KLrat'].'</span></div>	';}
	else{ echo '<div><span class="alt">Rat </span></div>'; }
	if ($row['KLsandcrab']>=1){echo '<div class="hilite"><i class="elvl">2:</i> Sand Crab <span>'. $row['KLsandcrab'].'</span></div>	';}
	else{ echo '<div><span class="alt">Sand Crab </span></div>'; }
	if ($row['KLgiantrat']>=1){echo '<div class="hilite"><i class="elvl">3:</i> Giant Rat <span>'. $row['KLgiantrat'].'</span></div>	';}
	else{ echo '<div><span class="alt">Giant Rat </span></div>'; }
	if ($row['KLgator']>=1){echo '<div class="hilite green"><i class="elvl">5:</i> Gator <span>'. $row['KLgator'].'</span></div>	';}
	else{ echo '<div><span class="alt">Gator </span></div>'; }
	

	echo '<h2 class="gray">Spider Cave<i>lvl 2-5</i></h2>';	
	
	if ($row['KLspider']>=1){echo '<div class="hilite"><i class="elvl">2:</i> Spider <span>'. $row['KLspider'].'</span></div>	';}
	else{ echo '<div><span class="alt">Spider </span></div>'; }
	if ($row['KLscorpion']>=1){echo '<div class="hilite"><i class="elvl">3:</i> Scorpion <span>'. $row['KLscorpion'].'</span></div>	';}
	else{ echo '<div><span class="alt">Scorpion </span></div>'; }
	if ($row['KLgiantspider']>=1){echo '<div class="hilite"><i class="elvl">4:</i> Giant Spider <span>'. $row['KLgiantspider'].'</span></div>	';}
	else{ echo '<div><span class="alt">Giant Spider </span></div>'; }
	if ($row['KLalphascorpion']>=1){echo '<div class="hilite"><i class="elvl">5:</i> Alpha Scorpion <span>'. $row['KLalphascorpion'].'</span></div>	';}
	else{ echo '<div><span class="alt">Alpha Scorpion </span></div>'; }
	
	echo '<h2 class="darkblue">Bat Cave<i>lvl 2-10</i></h2>';	
		   
	if ($row['KLbat']>=1){echo '<div class="hilite"><i class="elvl">2:</i> Bat <span>'. $row['KLbat'].'</span></div>	';}
	else{ echo '<div><span class="alt">Bat </span></div>'; }
	if ($row['KLgoldenbat']>=1){echo '<div class="hilite"><i class="elvl">6:</i>Golden Bat <span> '. $row['KLgoldenbat'].'</span><i>rare</i></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Golden Bat <i>rare</i> </span> </div>'; }
	
	if ($row['KLsalamander']>=1){echo '<div class="hilite"><i class="elvl">6:</i> Salamander <span>'. $row['KLsalamander'].'</span></div>	';}
	else{ echo '<div><span class="alt">Salamander </span></div>'; }
	if ($row['KLgoblin']>=1){echo '<div class="hilite"><i class="elvl">5:</i> Goblin <span>'. $row['KLgoblin'].'</span></div>	';}
	else{ echo '<div><span class="alt">Goblin </span></div>'; }
	if ($row['KLgoblinbandit']>=1){echo '<div class="hilite"><i class="elvl">7:</i> Goblin Bandit <span>'. $row['KLgoblinbandit'].'</span></div>	';}
	else{ echo '<div><span class="alt">Goblin Bandit </span></div>'; }
	if ($row['KLgoblinchief']>=1){echo '<div class="hilite lightbrown"><i class="elvl">10:</i> Goblin Chief <span>'. $row['KLgoblinchief'].'</span></div>	';}
	else{ echo '<div><span class="alt">Goblin Chief </span></div>'; }
	
	
	echo '<h2 class="lightred">Scorpion Pit<i>lvl 5-30</i></h2>';	

	if ($row['KLscorpionguard']>=1){echo '<div class="hilite"><i class="elvl">7:</i> Scorpion Guard <span>'. $row['KLscorpionguard'].'</span></div>	';}
	else{ echo '<div><span class="alt">Scorpion Guard </span></div>'; }
	if ($row['KLmammothscorpion']>=1){echo '<div class="hilite"><i class="elvl">10:</i> Mammoth Scorpion <span>'. $row['KLmammothscorpion'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mammoth Scorpion </span></div>'; }
	if ($row['KLscorpionqueen']>=1){echo '<div class="hilite blue"><i class="elvl">15:</i> Scorpion Queen <span>'. $row['KLscorpionqueen'].'</span></div>	';}
	else{ echo '<div><span class="alt">Scorpion Queen </span></div>'; }
	if ($row['KLscorpionking']>=1){echo '<div class="hilite lightred"><i class="elvl">30:</i> Scorpion King <span>'. $row['KLscorpionking'].'</span></div>	';}
	else{ echo '<div><span class="alt">Scorpion King </span></div>'; }
	
	
	

	
	
	echo '<h2 class="green">Forest Path<i>lvl 1-10</i></h2>';	

	if ($row['KLcow']>=1){echo '<div class="hilite"><i class="elvl">4:</i> Cow <span>'. $row['KLcow'].'</span></div>	';}
	else{ echo '<div><span class="alt">Cow </span></div>'; }
	if ($row['KLsnake']>=1){echo '<div class="hilite"><i class="elvl">5:</i> Snake <span>'. $row['KLsnake'].'</span></div>	';}
	else{ echo '<div><span class="alt">Snake </span></div>'; }		
	if ($row['KLhillogre']>=1){echo '<div class="hilite lightbrown"><i class="elvl">10:</i> Hill Ogre <span>'. $row['KLhillogre'].'</span></div>	';}
	else{ echo '<div><span class="alt">Hill Ogre</span></div>'; }   
	if ($row['KLimp']>=1){echo '<div class="hilite"><i class="elvl">7:</i> <i class="rare">R</i>Imp <span>'. $row['KLimp'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Imp </span></div>'; }
	
		   
	echo '<h2 class="blue">Ogre Lair<i>lvl 2-13</i></h2>';	
		
	if ($row['KLhobgoblin']>=1){echo '<div class="hilite"><i class="elvl">6:</i> Hob Goblin <span>'. $row['KLhobgoblin'].'</span></div>	';}
	else{ echo '<div><span class="alt">Hob Goblin </span></div>'; }   
	if ($row['KLorc']>=1){echo '<div class="hilite"><i class="elvl">7:</i> Orc <span>'. $row['KLorc'].'</span></div>	';}
	else{ echo '<div><span class="alt">Orc </span></div>'; }   
	if ($row['KLogre']>=1){echo '<div class="hilite"><i class="elvl">8:</i> Ogre <span>'. $row['KLogre'].'</span></div>	';}
	else{ echo '<div><span class="alt">Ogre </span></div>'; }   
	if ($row['KLogreguard']>=1){echo '<div class="hilite"><i class="elvl">9:</i> Ogre Guard <span>'. $row['KLogreguard'].'</span></div>	';}
	else{ echo '<div><span class="alt">Ogre Guard</span></div>'; }   
	if ($row['KLfireogress']>=1){echo '<div class="hilite"><i class="elvl">10:</i> Fire Ogress <span>'. $row['KLfireogress'].'</span></div>	';}
	else{ echo '<div><span class="alt">Fire Ogress </span></div>'; }   
	if ($row['KLogrelieutenant']>=1){echo '<div class="hilite blue"><i class="elvl">13:</i> Ogre Lieutenant <span>'. $row['KLogrelieutenant'].'</span></div>	';}
	else{ echo '<div><span class="alt">Ogre Lieutenant</span></div>'; }   
	if ($row['KLogrepriest']>=1){echo '<div class="hilite"><i class="elvl">11:</i> <i class="rare">R</i>Ogre Priest <span>'. $row['KLogrepriest'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Ogre Priest </span></div>'; }
	
	echo '<h2 class="medpurple">Kobold Layer<i>lvl 3-13</i></h2>';	

	if ($row['KLkobold']>=1){echo '<div class="hilite"><i class="elvl">7:</i> Kobold <span>'. $row['KLkobold'].'</span></div>	';}
	else{ echo '<div><span class="alt">Kobold </span></div>'; }   
	if ($row['KLflyingkobold']>=1){echo '<div class="hilite"><i class="elvl">7:</i> Flying Kobold <span>'. $row['KLflyingkobold'].'</span></div>	';}
	else{ echo '<div><span class="alt">Flying Kobold </span></div>'; }   
	if ($row['KLkoboldshaman']>=1){echo '<div class="hilite"><i class="elvl">8:</i> Kobold Shaman <span>'. $row['KLkoboldshaman'].'</span></div>	';}
	else{ echo '<div><span class="alt">Kobold Shaman </span></div>'; }   
	if ($row['KLkoboldninja']>=1){echo '<div class="hilite"><i class="elvl">8:</i> Kobold Ninja <span>'. $row['KLkoboldninja'].'</span></div>	';}
	else{ echo '<div><span class="alt">Kobold Ninja </span></div>'; }   
	if ($row['KLkoboldwarlock']>=1){echo '<div class="hilite"><i class="elvl">9:</i> Kobold Warlock <span>'. $row['KLkoboldwarlock'].'</span></div>	';}
	else{ echo '<div><span class="alt">Kobold Warlock </span></div>'; }   
	if ($row['KLkoboldchampion']>=1){echo '<div class="hilite"><i class="elvl">10:</i> Kobold Champion <span>'. $row['KLkoboldchampion'].'</span></div>	';}
	else{ echo '<div><span class="alt">Kobold Champion </span></div>'; }   
	if ($row['KLkoboldmaster']>=1){echo '<div class="hilite medpurple"><i class="elvl">13:</i> Kobold Master <span>'. $row['KLkoboldmaster'].'</span></div>	';}
	else{ echo '<div><span class="alt">Kobold Master</span></div>'; }  
	if ($row['KLkoboldmonk']>=1){echo '<div class="hilite"><i class="elvl">11:</i> <i class="rare">R</i>Kobold Monk <span>'. $row['KLkoboldmonk'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Kobold Monk </span></div>'; }
				
	
	echo '<h2 class="green">Forest<i>lvl 5-13</i></h2>';	

	if ($row['KLwildboar']>=1){echo '<div class="hilite"><i class="elvl">5:</i> Wild Boar <span>'. $row['KLwildboar'].'</span></div>	';}
	else{ echo '<div><span class="alt">Wild Boar </span></div>'; }
	if ($row['KLwolf']>=1){echo '<div class="hilite"><i class="elvl">5:</i> Wolf <span>'. $row['KLwolf'].'</span></div>	';}
	else{ echo '<div><span class="alt">Wolf </span></div>'; } 
	if ($row['KLcoyote']>=1){echo '<div class="hilite"><i class="elvl">6:</i> Coyote <span>'. $row['KLcoyote'].'</span></div>	';}
	else{ echo '<div><span class="alt">Coyote </span></div>'; } 
	if ($row['KLbuck']>=1){echo '<div class="hilite"><i class="elvl">6:</i> Buck <span>'. $row['KLbuck'].'</span></div>	';}
	else{ echo '<div><span class="alt">Buck </span></div>'; } 
	if ($row['KLbear']>=1){echo '<div class="hilite"><i class="elvl">8:</i> Bear <span>'. $row['KLbear'].'</span></div>	';}
	else{ echo '<div><span class="alt">Bear </span></div>'; } 
	if ($row['KLstag']>=1){echo '<div class="hilite"><i class="elvl">8:</i> Stag <span>'. $row['KLstag'].'</span></div>	';}
	else{ echo '<div><span class="alt">Stag </span></div>'; } 
	if ($row['KLbigfoot']>=1){echo '<div class="hilite lightbrown"><i class="elvl">13:</i> Bigfoot <span>'. $row['KLbigfoot'].'</span></div>	';}
	else{ echo '<div><span class="alt">Bigfoot </span></div>'; } 
	if ($row['KLhawk']>=1){echo '<div class="hilite"><i class="elvl">9:</i> <i class="rare">R</i>Hawk <span>'. $row['KLhawk'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Hawk </span></div>'; } 


	
	
	echo '<h2 class="lightred">Sewers<i>lvl 1-10</i></h2>';	
		   
	if ($row['KLtarantula']>=1){echo '<div class="hilite"><i class="elvl">7:</i> Tarantula <span>'. $row['KLtarantula'].'</span></div>	';}
	else{ echo '<div><span class="alt">Tarantula </span></div>'; } 
	if ($row['KLsewerrat']>=1){echo '<div class="hilite"><i class="elvl">7:</i> Sewer Rat <span>'. $row['KLsewerrat'].'</span></div>	';}
	else{ echo '<div><span class="alt">Sewer Rat </span></div>'; } 
	if ($row['KLredgator']>=1){echo '<div class="hilite lightred"><i class="elvl">10:</i> Red Gator <span>'. $row['KLredgator'].'</span></div>	';}
	else{ echo '<div><span class="alt">Red Gator </span></div>'; } 
	if ($row['KLflyingdungbeetle']>=1){echo '<div class="hilite"><i class="elvl">8:</i> <i class="rare">R</i>Flying Dung Beetle <span>'. $row['KLflyingdungbeetle'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Flying Dung Beetle </span></div>'; } 
	
	
	echo '<h2 class="gold">Thieves Den<i>lvl 5-14</i></h2>';	
	if ($row['KLthief']>=1){echo '<div class="hilite"><i class="elvl">5:</i> Thief <span>'. $row['KLthief'].'</span></div>	';}
	else{ echo '<div><span class="alt">Thief </span></div>'; }
	if ($row['KLthiefpickpocket']>=1){echo '<div class="hilite"><i class="elvl">8:</i> Thief Pickpocket <span>'. $row['KLthiefpickpocket'].'</span></div>	';}
	else{ echo '<div><span class="alt">Thief Pickpocket </span></div>'; } 
	if ($row['KLthiefbrute']>=1){echo '<div class="hilite"><i class="elvl">11:</i> Thief Brute <span>'. $row['KLthiefbrute'].'</span></div>	';}
	else{ echo '<div><span class="alt">Thief Brute </span></div>'; } 
	if ($row['KLmasterthief']>=1){echo '<div class="hilite gold"><i class="elvl">14:</i> Master Thief <span>'. $row['KLmasterthief'].'</span></div>	';}
	else{ echo '<div><span class="alt">Master Thief </span></div>'; }  
	  
	echo '<h2 class="white">Catacombs<i>lvl 7-17</i></h2>';	
	if ($row['KLskeleton']>=1){echo '<div class="hilite"><i class="elvl">7:</i> Skeleton <span>'. $row['KLskeleton'].'</span></div>	';}
	else{ echo '<div><span class="alt">Skeleton </span></div>'; }
	if ($row['KLskeletonarcher']>=1){echo '<div class="hilite"><i class="elvl">8:</i> Skeleton Archer <span>'. $row['KLskeletonarcher'].'</span></div>	';}
	else{ echo '<div><span class="alt">Skeleton Archer </span></div>'; }
	if ($row['KLskeletonknight']>=1){echo '<div class="hilite"><i class="elvl">10:</i> Skeleton Knight <span>'. $row['KLskeletonknight'].'</span></div>	';}
	else{ echo '<div><span class="alt">Skeleton Knight</span></div>'; }
	if ($row['KLskeletonsorcerer']>=1){echo '<div class="hilite"><i class="elvl">11:</i> Skeleton Sorcerer <span>'. $row['KLskeletonsorcerer'].'</span></div>	';}
	else{ echo '<div><span class="alt">Skeleton Sorcerer </span></div>'; }
	if ($row['KLancientskeleton']>=1){echo '<div class="hilite"><i class="elvl">13:</i> Ancient Skeleton <span>'. $row['KLancientskeleton'].'</span></div>	';}
	else{ echo '<div><span class="alt">Ancient Skeleton </span></div>'; }
	if ($row['KLvictoria']>=1){echo '<div class="hilite blue"><i class="elvl">17:</i> Victoria the Dead <span>'. $row['KLvictoria'].'</span></div>	';}
	else{ echo '<div><span class="alt">Victoria the Dead </span></div>'; }
	if ($row['KLomar']>=1){echo '<div class="hilite lightred"><i class="elvl">17:</i> Omar the Dead <span>'. $row['KLomar'].'</span></div>	';}
	else{ echo '<div><span class="alt">Omar the Dead </span></div>'; }
	
	
	
	
	
	
	
	
	
	
	
	
	echo '<h2 class="green">Abandoned Mine<i>lvl 15-23</i></h2>';	
	if ($row['KLrabidskeever']>=1){echo '<div class="hilite"><i class="elvl">15:</i> Rabid Skeever <span>'. $row['KLrabidskeever'].'</span></div>	';}
	else{ echo '<div><span class="alt">Rabid Skeever</span></div>'; }
	if ($row['KLbleedingdartwing']>=1){echo '<div class="hilite"><i class="elvl">20:</i> Bleeding Dartwing <span>'. $row['KLbleedingdartwing'].'</span></div>	';}
	else{ echo '<div><span class="alt">Bleeding Dartwing</span></div>'; }
	if ($row['KLmongoliandeathworm']>=1){echo '<div class="hilite green"><i class="elvl">23:</i> Mongolian Death Worm <span>'. $row['KLmongoliandeathworm'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mongolian Death Worm</span></div>'; }
	
	echo '<h2 class="lightblue">Stone Grotto<i>lvl 20-25</i></h2>';
	if ($row['KLdemonwing']>=1){echo '<div class="hilite"><i class="elvl">20:</i> Demon Wing <span>'. $row['KLdemonwing'].'</span></div>	';}
	else{ echo '<div><span class="alt">Demon Wing </span></div>'; }
	if ($row['KLpossessedaxeman']>=1){echo '<div class="hilite lightblue"><i class="elvl">25:</i> Possessed Axeman <span>'. $row['KLpossessedaxeman'].'</span></div>	';}
	else{ echo '<div><span class="alt">Possessed Axeman </span></div>'; }
	
	

echo '<h2 class="lightred">Red Beard\'s Fort<i>lvl 15-30</i></h2>';
	if ($row['KLredbandit']>=1){echo '<div class="hilite"><i class="elvl">15:</i> Red Bandit <span>'. $row['KLredbandit'].'</span></div>	';}
	else{ echo '<div><span class="alt">Red Bandit </span></div>'; }
	if ($row['KLbanditmarauder']>=1){echo '<div class="hilite"><i class="elvl">18:</i> Bandit Marauder <span>'. $row['KLbanditmarauder'].'</span></div>	';}
	else{ echo '<div><span class="alt">Bandit Marauder </span></div>'; }
	if ($row['KLbutcher']>=1){echo '<div class="hilite"><i class="elvl">23:</i> Butcher <span>'. $row['KLbutcher'].'</span></div>	';}
	else{ echo '<div><span class="alt">Butcher </span></div>'; }
	if ($row['KLredbeard']>=1){echo '<div class="hilite lightred"><i class="elvl">30:</i> Red Beard <span>'. $row['KLredbeard'].'</span></div>	';}
	else{ echo '<div><span class="alt">Red Beard </span></div>'; }
	
	
echo '<h2 class="blue">Blue Ocean<i>lvl 10-40</i></h2>';
	if ($row['KLjellyfish']>=1){echo '<div class="hilite"><i class="elvl">10:</i> Jellyfish <span>'. $row['KLjellyfish'].'</span></div>	';}
	else{ echo '<div><span class="alt">Jellyfish </span></div>'; }
	if ($row['KLelectriceel']>=1){echo '<div class="hilite"><i class="elvl">10:</i> Electric Eel <span>'. $row['KLelectriceel'].'</span></div>	';}
	else{ echo '<div><span class="alt">Electric Eel </span></div>'; }
	if ($row['KLpiranha']>=1){echo '<div class="hilite"><i class="elvl">11:</i> Piranha <span>'. $row['KLpiranha'].'</span></div>	';}
	else{ echo '<div><span class="alt">Piranha </span></div>'; }
	if ($row['KLbarracuda']>=1){echo '<div class="hilite"><i class="elvl">12:</i> Barracuda <span>'. $row['KLbarracuda'].'</span></div>	';}
	else{ echo '<div><span class="alt">Barracuda </span></div>'; }
	if ($row['KLsquid']>=1){echo '<div class="hilite"><i class="elvl">13:</i> Squid <span>'. $row['KLsquid'].'</span></div>	';}
	else{ echo '<div><span class="alt">Squid </span></div>'; }
	if ($row['KLalbatross']>=1){echo '<div class="hilite"><i class="elvl">13:</i> Albatross <span>'. $row['KLalbatross'].'</span></div>	';}
	else{ echo '<div><span class="alt">Albatross </span></div>'; }
	if ($row['KLcrocodile']>=1){echo '<div class="hilite green"><i class="elvl">20:</i> Crocodile <span>'. $row['KLcrocodile'].'</span></div>	';}
	else{ echo '<div><span class="alt">Crocodile </span></div>'; }
	if ($row['KLkingsquid']>=1){echo '<div class="hilite blue"><i class="elvl">35:</i> King Squid <span>'. $row['KLkingsquid'].'</span></div>	';}
	else{ echo '<div><span class="alt">King Squid </span></div>'; }	
	if ($row['KLmudcrab']>=1){echo '<div class="hilite"><i class="elvl">11:</i> Mud Crab <span>'. $row['KLmudcrab'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mud Crab </span></div>'; }
	
	
echo '<h2 class="darkblue">Under the Ocean<i>lvl 15-25</i></h2>';
	if ($row['KLgiantseaturtle']>=1){echo '<div class="hilite"><i class="elvl">15:</i> Giant Sea Turtle <span>'. $row['KLgiantseaturtle'].'</span></div>	';}
	else{ echo '<div><span class="alt">Giant Sea Turtle </span></div>'; }
	if ($row['KLcolossalsquid']>=1){echo '<div class="hilite"><i class="elvl">17:</i> Colossal Squid <span>'. $row['KLcolossalsquid'].'</span></div>	';}
	else{ echo '<div><span class="alt">Colossal Squid </span></div>'; }
	if ($row['KLhammerhead']>=1){echo '<div class="hilite lightblue"><i class="elvl">20:</i>Hammerhead <span>'. $row['KLhammerhead'].'</span></div>	';}
	else{ echo '<div><span class="alt">Hammerhead </span></div>'; }
	if ($row['KLgreatwhite']>=1){echo '<div class="hilite lightblue"><i class="elvl">20:</i>Great White <span>'. $row['KLgreatwhite'].'</span></div>	';}
	else{ echo '<div><span class="alt">Great White </span></div>'; }
	if ($row['KLkraken']>=1){echo '<div class="hilite green"><i class="elvl">25:</i> Kraken <span>'. $row['KLkraken'].'</span></div>	';}
	else{ echo '<div><span class="alt">Kraken </span></div>'; }
	if ($row['KLglowingoctopus']>=1){echo '<div class="hilite"><i class="elvl">20:</i> <i class="rare">R</i>Glowing Octopus <span>'. $row['KLglowingoctopus'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Glowing Octopus </span></div>'; }
	
echo '<h2 class="lightblue">Water Temples<i>lvl 35-50</i></h2>';	
	if ($row['KLthunderbarbarian']>=1){echo '<div class="hilite lightred"><i class="elvl">35:</i> Thunder Barbarian <span>'. $row['KLthunderbarbarian'].'</span></div>	';}
	else{ echo '<div><span class="alt">Thunder Barbarian</span></div>'; }
	if ($row['KLsmoothranger']>=1){echo '<div class="hilite green"><i class="elvl">35:</i> Smooth Ranger <span>'. $row['KLsmoothranger'].'</span></div>	';}
	else{ echo '<div><span class="alt">Smooth Ranger</span></div>'; }
	if ($row['KLcoralwizard']>=1){echo '<div class="hilite blue"><i class="elvl">35</i> Coral Wizard <span>'. $row['KLcoralwizard'].'</span></div>	';}
	else{ echo '<div><span class="alt">Coral Wizard</span></div>'; }
	if ($row['KLheavywalrus']>=1){echo '<div class="hilite gold"><i class="elvl">35:</i> Heavy Walrus <span>'. $row['KLheavywalrus'].'</span></div>	';}
	else{ echo '<div><span class="alt">Heavy Walrus</span></div>'; }
	if ($row['KLwatertempleguardian']>=1){echo '<div class="hilite lightblue"><i class="elvl">50:</i> Water Temple Guardian <span>'. $row['KLwatertempleguardian'].'</span></div>	';}
	else{ echo '<div><span class="alt">Water Temple Guardian </span></div>'; }	
	
	
echo '<h2 class="lightbrown">Iron Mine<i>lvl 15-30</i></h2>';
		if ($row['KLironrat']>=1){echo '<div class="hilite"><i class="elvl">15:</i> Iron Rat <span>'. $row['KLironrat'].'</span></div>	';}
	else{ echo '<div><span class="alt">Iron Rat</span></div>'; }
		if ($row['KLironcrab']>=1){echo '<div class="hilite"><i class="elvl">15:</i> Iron Crab <span>'. $row['KLironcrab'].'</span></div>	';}
	else{ echo '<div><span class="alt">Iron Crab</span></div>'; }
		if ($row['KLironscorpion']>=1){echo '<div class="hilite"><i class="elvl">20:</i> Iron Scorpion <span>'. $row['KLironscorpion'].'</span></div>	';}
	else{ echo '<div><span class="alt">Iron Scorpion</span></div>'; }
		if ($row['KLwarturtle']>=1){echo '<div class="hilite green"><i class="elvl">25:</i> War Turtle <span>'. $row['KLwarturtle'].'</span></div>	';}
	else{ echo '<div><span class="alt">War Turtle</span></div>'; }
	
		if ($row['KLslagbeast']>=1){echo '<div class="hilite"><i class="elvl">25:</i> Slag Beast <span>'. $row['KLslagbeast'].'</span></div>	';}
	else{ echo '<div><span class="alt">Slag Beast</span></div>'; }
		if ($row['KLirongator']>=1){echo '<div class="hilite"><i class="elvl">25:</i> Iron Gator <span>'. $row['KLirongator'].'</span></div>	';}
	else{ echo '<div><span class="alt">Iron Gator</span></div>'; }
		if ($row['KLirongolem']>=1){echo '<div class="hilite"><i class="elvl">25:</i> Iron Golem <span>'. $row['KLirongolem'].'</span></div>	';}
	else{ echo '<div><span class="alt">Iron Golem</span></div>'; }
		if ($row['KLphoenix']>=1){echo '<div class="hilite lightred"><i class="elvl">30:</i> Phoenix <span>'. $row['KLphoenix'].'</span></div>	';}
	else{ echo '<div><span class="alt">Phoenix</span></div>'; }
	
		if ($row['KLironcobra']>=1){echo '<div class="hilite"><i class="elvl">30:</i> <i class="rare">R</i>Iron Cobra <span>'. $row['KLironcobra'].'</span></div>	';}
	else{ echo '<div><span class="alt">Iron Cobra</span></div>'; }
		if ($row['KLearthgolem']>=1){echo '<div class="hilite"><i class="elvl">30:</i> <i class="rare">R</i>Earth Golem <span>'. $row['KLearthgolem'].'</span></div>	';}
	else{ echo '<div><span class="alt">Earth Golem</span></div>'; }
	
	
echo '<h2 class="gray">Steel Mine<i>lvl 20-40</i></h2>';
		if ($row['KLsteelrat']>=1){echo '<div class="hilite"><i class="elvl">20:</i> Steel Rat <span>'. $row['KLsteelrat'].'</span></div>	';}
	else{ echo '<div><span class="alt">Steel Rat</span></div>'; }
		if ($row['KLsteelcrab']>=1){echo '<div class="hilite"><i class="elvl">20:</i> Steel Crab <span>'. $row['KLsteelcrab'].'</span></div>	';}
	else{ echo '<div><span class="alt">Steel Crab</span></div>'; }
		if ($row['KLsteelscorpion']>=1){echo '<div class="hilite"><i class="elvl">25:</i> Steel Scorpion <span>'. $row['KLsteelscorpion'].'</span></div>	';}
	else{ echo '<div><span class="alt">Steel Scorpion</span></div>'; }
		if ($row['KLulfberht']>=1){echo '<div class="hilite blue"><i class="elvl">35:</i> Ulfberht <span>'. $row['KLulfberht'].'</span></div>	';}
	else{ echo '<div><span class="alt">Ulfberht</span></div>'; }
	
		if ($row['KLblackfrog']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Black Frog <span>'. $row['KLblackfrog'].'</span></div>	';}
	else{ echo '<div><span class="alt">Black Frog</span></div>'; }
		if ($row['KLsteelgator']>=1){echo '<div class="hilite"><i class="elvl">35:</i> Steel Gator <span>'. $row['KLsteelgator'].'</span></div>	';}
	else{ echo '<div><span class="alt">Steel Gator</span></div>'; }
		if ($row['KLsteelgolem']>=1){echo '<div class="hilite"><i class="elvl">35:</i> Steel Golem <span>'. $row['KLsteelgolem'].'</span></div>	';}
	else{ echo '<div><span class="alt">Steel Golem</span></div>'; }
		if ($row['KLcyclops']>=1){echo '<div class="hilite lightblue"><i class="elvl">40:</i> Cyclops <span>'. $row['KLcyclops'].'</span></div>	';}
	else{ echo '<div><span class="alt">Cyclops</span></div>'; }
	
		if ($row['KLstoneassassin']>=1){echo '<div class="hilite"><i class="elvl">40:</i> <i class="rare">R</i>Stone Assassin <span>'. $row['KLstoneassassin'].'</span></div>	';}
	else{ echo '<div><span class="alt">Stone Assassin</span></div>'; }
		if ($row['KLgammamonk']>=1){echo '<div class="hilite"><i class="elvl">40:</i> <i class="rare">R</i>Gamma Monk <span>'. $row['KLgammamonk'].'</span></div>	';}
	else{ echo '<div><span class="alt">Gamma Monk</span></div>'; }	
	
	
	echo '<h2 class="blue">Mithril Mine<i>lvl 30-60</i></h2>';
		if ($row['KLmithrilrat']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Mithril Rat <span>'. $row['KLmithrilrat'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mithril Rat</span></div>'; }
		if ($row['KLmithrilcrab']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Mithril Crab <span>'. $row['KLmithrilcrab'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mithril Crab</span></div>'; }
		if ($row['KLmithrilscorpion']>=1){echo '<div class="hilite"><i class="elvl">40:</i> Mithril Scorpion <span>'. $row['KLmithrilscorpion'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mithril Scorpion</span></div>'; }
		if ($row['KLgriffin']>=1){echo '<div class="hilite blue"><i class="elvl">50:</i> Griffin <span>'. $row['KLgriffin'].'</span></div>	';}
	else{ echo '<div><span class="alt">Griffin</span></div>'; }
	
		if ($row['KLbluefrog']>=1){echo '<div class="hilite"><i class="elvl">45:</i> Blue Frog <span>'. $row['KLbluefrog'].'</span></div>	';}
	else{ echo '<div><span class="alt">Blue Frog</span></div>'; }
		if ($row['KLmithrilgator']>=1){echo '<div class="hilite"><i class="elvl">45:</i> Mithril Gator <span>'. $row['KLmithrilgator'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mithril Gator</span></div>'; }
		if ($row['KLmithrilgolem']>=1){echo '<div class="hilite"><i class="elvl">45:</i> Mithril Golem <span>'. $row['KLmithrilgolem'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mithril Golem</span></div>'; }
		if ($row['KLminotaur']>=1){echo '<div class="hilite lightred"><i class="elvl">60:</i> Minotaur <span>'. $row['KLminotaur'].'</span></div>	';}
	else{ echo '<div><span class="alt">Minotaur</span></div>'; }
	
		if ($row['KLcosmicmage']>=1){echo '<div class="hilite"><i class="elvl">60:</i> <i class="rare">R</i>Cosmic Mage <span>'. $row['KLcosmicmage'].'</span></div>	';}
	else{ echo '<div><span class="alt">Cosmic Mage</span></div>'; }
		if ($row['KLcarbonbeast']>=1){echo '<div class="hilite"><i class="elvl">60:</i> <i class="rare">R</i>Carbon Beast <span>'. $row['KLcarbonbeast'].'</span></div>	';}
	else{ echo '<div><span class="alt">Carbon Beast</span></div>'; }	
	
	
	
	echo '<h2 class="black">Sentinals<i>lvl 20-100</i></h2>';
		   	
		if ($row['KLstonesentinel']>=1){echo '<div class="hilite"><i class="elvl">20:</i> Stone Sentinal <span>'. $row['KLstonesentinel'].'</span></div>	';}
	else{ echo '<div><span class="alt">Stone Sentinal</span></div>'; }
	
		if ($row['KLironsentinel']>=1){echo '<div class="hilite"><i class="elvl">40:</i> Iron Sentinal <span>'. $row['KLironsentinel'].'</span></div>	';}
	else{ echo '<div><span class="alt">Iron Sentinal</span></div>'; }
	
		if ($row['KLsteelsentinel']>=1){echo '<div class="hilite"><i class="elvl">60:</i> Steel Sentinal <span>'. $row['KLsteelsentinel'].'</span></div>	';}
	else{ echo '<div><span class="alt">Steel Sentinal</span></div>'; }
	
		if ($row['KLmithrilsentinel']>=1){echo '<div class="hilite"><i class="elvl">80:</i> Mithril Sentinal <span>'. $row['KLmithrilsentinel'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mithril Sentinal</span></div>'; }
	
		if ($row['KLsentineltitan']>=1){echo '<div class="hilite"><i class="elvl">100:</i> Sentinal Titan <span>'. $row['KLsentineltitan'].'</span></div>	';}
	else{ echo '<div><span class="alt">Sentinal Titan</span></div>'; }
	

	
	
echo '<h2 class="gray">Mountain Path<i>lvl 20-45</i></h2>';
		if ($row['KLbowman']>=1){echo '<div class="hilite"><i class="elvl">23:</i> Bowman <span>'. $row['KLbowman'].'</span></div>	';}
	else{ echo '<div><span class="alt">Bowman</span></div>'; }	
		if ($row['KLhighwayman']>=1){echo '<div class="hilite"><i class="elvl">25:</i> Highwayman <span>'. $row['KLhighwayman'].'</span></div>	';}
	else{ echo '<div><span class="alt">Highwayman</span></div>'; }		
	
	
echo '<h2 class="darkgreen">Dark Forest<i>lvl 20-45</i></h2>';
		if ($row['KLtroll']>=1){echo '<div class="hilite"><i class="elvl">13:</i> Troll <span>'. $row['KLtroll'].'</span></div>	';}
	else{ echo '<div><span class="alt">Troll</span></div>'; }	
		if ($row['KLtrollshaman']>=1){echo '<div class="hilite"><i class="elvl">20:</i> Troll Shaman <span>'. $row['KLtrollshaman'].'</span></div>	';}
	else{ echo '<div><span class="alt">Troll Shaman</span></div>'; }	
		if ($row['KLtrollsorcerer']>=1){echo '<div class="hilite"><i class="elvl">25:</i> Troll Sorcerer <span>'. $row['KLtrollsorcerer'].'</span></div>	';}
	else{ echo '<div><span class="alt">Troll Sorcerer</span></div>'; }	
		if ($row['KLtrollelder']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Troll Elder <span>'. $row['KLtrollelder'].'</span></div>	';}
	else{ echo '<div><span class="alt">Troll Elder</span></div>'; }				
		if ($row['KLtrollchampion']>=1){echo '<div class="hilite"><i class="elvl">35:</i> Troll Champion <span>'. $row['KLtrollchampion'].'</span></div>	';}
	else{ echo '<div><span class="alt">Troll Champion</span></div>'; }	
	
		if ($row['KLtrollqueen']>=1){echo '<div class="hilite blue"><i class="elvl">40:</i> Troll Queen <span>'. $row['KLtrollqueen'].'</span></div>	';}
	else{ echo '<div><span class="alt">Troll Queen </span></div>'; }
		if ($row['KLtrollking']>=1){echo '<div class="hilite green"><i class="elvl">45:</i> Troll King <span>'. $row['KLtrollking'].'</span></div>	';}
	else{ echo '<div><span class="alt">Troll King </span></div>'; }	
	
		if ($row['KLfalcon']>=1){echo '<div class="hilite"><i class="elvl">25:</i> <i class="rare">R</i>Falcon <span>'. $row['KLfalcon'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Falcon </span></div>'; } 	
	
		if ($row['KLent']>=1){echo '<div class="hilite"><i class="elvl">25:</i> <i class="rare">R</i>Ent <span>'. $row['KLent'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Ent </span></div>'; } 		

		if ($row['KLdarkranger']>=1){echo '<div class="hilite"><i class="elvl">25:</i> <i class="rare">R</i>Dark Ranger <span>'. $row['KLdarkranger'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Dark Ranger </span></div>'; } 	
			
			if ($row['KLwisp']>=1){echo '<div class="hilite"><i class="elvl">40:</i> <i class="rare">R</i>Wisp <span>'. $row['KLwisp'].'</span></div>	';}
	else{ echo '<div><span class="alt"><i class="rare">R</i>Wisp </span></div>'; } 		
		
		
		
		
		
echo '<h2 class="yellow">Demigods<i>lvl 70</i></h2>';
	if ($row['KLdemigodofstrength']>=1){echo '<div class="hilite lightred"><i class="elvl">70:</i> Demigod of Strength <span>'. $row['KLdemigodofstrength'].'</span></div>	';}
	else{ echo '<div><span class="alt">Demigod of Strength</span></div>'; }	
	if ($row['KLdemigodofdefense']>=1){echo '<div class="hilite gold"><i class="elvl">70:</i> Demigod of Defense <span>'. $row['KLdemigodofdefense'].'</span></div>	';}
	else{ echo '<div><span class="alt">Demigod of Defense</span></div>'; }	
	if ($row['KLforestprincess']>=1){echo '<div class="hilite green"><i class="elvl">80:</i> Forest Princess <span>'. $row['KLforestprincess'].'</span></div>	';}
	else{ echo '<div><span class="alt">Forest Princess</span></div>'; }		
	
	
	
	echo '<h2 class="darkgray">Dark Keep<i>lvl 30-60</i></h2>';
		if ($row['KLlurker']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Lurker <span>'. $row['KLlurker'].'</span></div>	';}
	else{ echo '<div><span class="alt">Lurker</span></div>'; }	
			if ($row['KLwingeddemon']>=1){echo '<div class="hilite"><i class="elvl">35:</i> Winged Demon <span>'. $row['KLwingeddemon'].'</span></div>	';}
	else{ echo '<div><span class="alt">Winged Demon</span></div>'; }	
			if ($row['KLundeadorc']>=1){echo '<div class="hilite"><i class="elvl">45:</i> Undead Orc <span>'. $row['KLundeadorc'].'</span></div>	';}
	else{ echo '<div><span class="alt">Undead Orc</span></div>'; }	
			if ($row['KLstonesphinx']>=1){echo '<div class="hilite gold"><i class="elvl">60:</i> Stone Sphinx <span>'. $row['KLstonesphinx'].'</span></div>	';}
	else{ echo '<div><span class="alt">Stone Sphinx</span></div>'; }	
			if ($row['KLwarpedpriest']>=1){echo '<div class="hilite"><i class="elvl">55:</i><i class="rare">R</i> Warped Priest <span>'. $row['KLwarpedpriest'].'</span></div>	';}
	else{ echo '<div><span class="alt">Warped Priest</span></div>'; }	
			if ($row['KLdarkpaladin']>=1){echo '<div class="hilite"><i class="elvl">55:</i> Dark Paladin <span>'. $row['KLdarkpaladin'].'</span></div>	';}
	else{ echo '<div><span class="alt">Dark Paladin</span></div>'; }	
			if ($row['KLdarkprince']>=1){echo '<div class="hilite lightpurple"><i class="elvl">60:</i> Dark Prince <span>'. $row['KLdarkprince'].'</span></div>	';}
	else{ echo '<div><span class="alt">Dark Prince</span></div>'; }	
	
	
	
		echo '
		   <h2 class="gray">Mountain Path<i>lvl 30</i></h2>';
		if ($row['KLfriendlygiant']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Friendly Giant <span>'. $row['KLfriendlygiant'].'</span></div>	';}
	else{ echo '<div><span class="alt">Friendly Giant</span></div>'; }	
		echo '
		   <h2 class="gray">Mountains<i>lvl 30-60</i></h2>';
		if ($row['KLmountaingiant']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Mountain Giant <span>'. $row['KLmountaingiant'].'</span></div>	';}
	else{ echo '<div><span class="alt">Mountain Giant</span></div>'; }	
		if ($row['KLicetroll']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Ice Troll <span>'. $row['KLicetroll'].'</span></div>	';}
	else{ echo '<div><span class="alt">Ice Troll</span></div>'; }		
	
		if ($row['KLgiantbrute']>=1){echo '<div class="hilite"><i class="elvl">35:</i> Giant Brute <span>'. $row['KLgiantbrute'].'</span></div>	';}
	else{ echo '<div><span class="alt">Giant Brute</span></div>'; }		
	
		if ($row['KLwyvern']>=1){echo '<div class="hilite"><i class="elvl">35:</i> Wyvern <span>'. $row['KLwyvern'].'</span></div>	';}
	else{ echo '<div><span class="alt">Wyvern</span></div>'; }		
	
		if ($row['KLstonedwarf']>=1){echo '<div class="hilite"><i class="elvl">40:</i> Stone Dwarf <span>'. $row['KLstonedwarf'].'</span></div>	';}
	else{ echo '<div><span class="alt">Stone Dwarf</span></div>'; }		
	
		if ($row['KLgiantmountaingiant']>=1){echo '<div class="hilite gold"><i class="elvl">50:</i> Giant Mountain Giant <span>'. $row['KLgiantmountaingiant'].'</span></div>	';}
	else{ echo '<div><span class="alt">Giant Mountain Giant</span></div>'; }		
	
		if ($row['KLgatekeeper']>=1){echo '<div class="hilite black"><i class="elvl">55:</i> Gatekeeper <span>'. $row['KLgatekeeper'].'</span></div>	';}
	else{ echo '<div><span class="alt">Gatekeeper</span></div>'; }		
	
		if ($row['KLyeti']>=1){echo '<div class="hilite"><i class="elvl">45:</i><i class="rare">R</i> Yeti <span>'. $row['KLyeti'].'</span></div>	';}
	else{ echo '<div><span class="alt">Yeti</span></div>'; }		
	
		if ($row['KLsnowowl']>=1){echo '<div class="hilite"><i class="elvl">50:</i><i class="rare">R</i> Snow Owl <span>'. $row['KLsnowowl'].'</span></div>	';}
	else{ echo '<div><span class="alt">Snow Owl</span></div>'; }		
	
		if ($row['KLsnowninja']>=1){echo '<div class="hilite"><i class="elvl">50:</i><i class="rare">R</i> Snow Ninja <span>'. $row['KLsnowninja'].'</span></div>	';}
	else{ echo '<div><span class="alt">Snow Ninja</span></div>'; }		
	
		if ($row['KLsnowogre']>=1){echo '<div class="hilite"><i class="elvl">50:</i><i class="rare">R</i>Snow Ogre<span>'. $row['KLsnowogre'].'</span></div>	';}
	else{ echo '<div><span class="alt">Snow Ogre</span></div>'; }		
	
		if ($row['KLgmg2']>=1){echo '<div class="hilite"><i class="elvl">70:</i><i class="rare">R</i> GMG2 <span>'. $row['KLgmg2'].'</span></div>	';}
	else{ echo '<div><span class="alt">GMG2</span></div>'; }		
	
		if ($row['KLgk2']>=1){echo '<div class="hilite"><i class="elvl">70:</i><i class="rare">R</i> GK2 <span>'. $row['KLgk2'].'</span></div>	';}
	else{ echo '<div><span class="alt">GK2</span></div>'; }	
		
		if ($row['KLdragon']>=1){echo '<div class="hilite red"><i class="elvl">60:</i><i class="rare">R</i> Dragon <span>'. $row['KLdragon'].'</span></div>	';}
	else{ echo '<div><span class="alt">Dragon</span></div>'; }		
	
	

	
		echo '<h2 class="lightpurple">Cathedral<i>lvl 40-60</i></h2>';
		if ($row['KLgreygargoyle']>=1){echo '<div class="hilite"><i class="elvl">40:</i> Grey Gargoyle <span>'. $row['KLgreygargoyle'].'</span></div>	';}
	else{ echo '<div><span class="alt">Grey Gargoyle</span></div>'; }	
		if ($row['KLwhitegargoyle']>=1){echo '<div class="hilite"><i class="elvl">45:</i> White Gargoyle <span>'. $row['KLwhitegargoyle'].'</span></div>	';}
	else{ echo '<div><span class="alt">White Gargoyle</span></div>'; }	
		if ($row['KLvampire']>=1){echo '<div class="hilite"><i class="elvl">45:</i> Vampire <span>'. $row['KLvampire'].'</span></div>	';}
	else{ echo '<div><span class="alt">Vampire</span></div>'; }	
	
		if ($row['KLfallenpriest']>=1){echo '<div class="hilite"><i class="elvl">50:</i> Fallen Priest <span>'. $row['KLfallenpriest'].'</span></div>	';}
	else{ echo '<div><span class="alt">Fallen Priest</span></div>'; }	
		if ($row['KLfallenangel']>=1){echo '<div class="hilite lightpurple"><i class="elvl">60:</i> Fallen Angel <span>'. $row['KLfallenangel'].'</span></div>	';}
	else{ echo '<div><span class="alt">Fallen Angel</span></div>'; }	
		if ($row['KLrisenskeleton']>=1){echo '<div class="hilite"><i class="elvl">30:</i> Risen Skeleton <span>'. $row['KLrisenskeleton'].'</span></div>	';}
	else{ echo '<div><span class="alt">Risen Skeleton</span></div>'; }	
	
	
	
	
	
	
	echo '<h2 class="lightblue">Silver Temple<i>lvl 80-1000</i></h2>';
		//if ($row['KLsilverwarrior']>=1){echo '<div class="hilite lightblue"><i class="elvl">80:</i> Silver Warrior <span>'. $row['KLsilverwarrior'].'</span></div>	';}
	//else{ echo '<div><span class="alt">Silver Warrior</span></div>'; }	
	
		echo '<div><span class="alt">Silver Warrior</span></div>'; 
	
}

    
	 

   