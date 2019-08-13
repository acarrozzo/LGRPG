<?php
// -----------------------------------  RESET ENEMY FLAGS
		$_SESSION['eLvl'] = 0;			// enemy level
		$_SESSION['eFly'] = 0;			// enemy flies, need ranged weapon
		$_SESSION['eCrit'] = 0;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)
		$_SESSION['ePow'] = 0;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
		$_SESSION['eBite'] = 0;		// enemy bites you, 2x pure attack damage					(200% pure damage)
		$_SESSION['eRage'] = 0;		// enemy rage attack, 1/5 chance to do 2-4 pure hit combo	(200%, 300% or 400% pure damage)
		$_SESSION['eAssassinate'] = 0;		// NEW!!!! - 1/4 chance to do 50 times damage, first strike
		$_SESSION['eWhirlwind'] = 0;	// enemy whirlwind attack, 1/5 chance to do 8x damage 	(1-(att*8) damage)    // NEEED TO WRITE IN!!!!
		$_SESSION['eDex'] = 0;			// enemy dex att, uses your dex as def
		$_SESSION['eMag'] = 0;			// enemy mag att, uses your mag as def
		$_SESSION['eHeal'] = 0;		// enemy heals self
		$_SESSION['eSteal'] = 0;		// enemy steals 20% [ 1 - lvl*3 ] coin
		$_SESSION['ePoison'] = 0;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
		$_SESSION['eDrainMP'] = 0;		// enemy drains MP (1) 1 - lvl/2  (2) 1-lvl   // NEEED TO WRITE IN!!!!
		$_SESSION['eDrainHP'] = 0;		// enemy drains HP (1) 1 - lvl/2  (2) 1-lvl   // NEEED TO WRITE IN!!!!
		$_SESSION['eResurrect'] = 0;		// # percent chance to ressurect after enemy dies   // NEEED TO WRITE IN!!!!
		$_SESSION['eMulti'] = 0;		// enemy LVL * 10% chance attack again (1 - 10)
		$_SESSION['eDoubleHit'] = 0;	// enemy always hits 2 times
		$_SESSION['eTripleHit'] = 0;	// enemy always hits 3 times
		$_SESSION['eDragonFire'] = 0;	// dragon fire = pure attack (no def ) + pow attack (x3 dam) --- 1/4 chance // 50% chance to catch on fire. when on fire, burn forever for 10-20 dam. need to use water to cure on fire

		
		$_SESSION['ePureA'] = 0;		// enemy attacks pure, you have no def	
		$_SESSION['ePureD'] = 0;		// enemy has max defense	
		$_SESSION['eStrImm'] = 0;		// enemy str immune
		$_SESSION['eDexImm'] = 0;		// enemy dex immune
		$_SESSION['eMagImm'] = 0;		// enemy mag immune
		$_SESSION['eDodge'] = 0;		// enemy dodges LVL x 10%
		$_SESSION['eBlock'] = 0;		// block all damage, 1/5 chance
		$_SESSION['notthe'] = 0;		// make 1 when enemy doesn't have THE (ex. diablo)

// -----------------------------------  The Random - ATTACK IN SECRET BATTLE ARENA // currently titan
if ($enemy == 'The Random') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 50");
	$results = $link->query("UPDATE $user SET enemydef = 5");
			
		$_SESSION['eLvl'] = 15;			// enemy level
		
		$_SESSION['eFly'] = 0;			// enemy flies, need ranged weapon
		$_SESSION['eCrit'] = 0;		// enemy critical attack, 1/10 chance x10 attack
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
		$_SESSION['eBite'] = 0;		// enemy bites you, 2x pure attack damage
		$_SESSION['eDex'] = 0;			// enemy dex att, uses your dex as def
		$_SESSION['eMag'] = 0;			// enemy mag att, uses your mag as def
		$_SESSION['eHeal'] = 0;		// enemy heals self
		$_SESSION['eSteal'] = 0;		// enemy steals 20% [ 1 - lvl*3 ] coin
		$_SESSION['ePoison'] = 1;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
		$_SESSION['eMulti'] = 3;		// enemy LVL * 10% chance attack again (1 - 10)
		$_SESSION['eDoubleHit'] = 0;	// enemy always hits 2 times
		$_SESSION['eTripleHit'] = 0;	// enemy always hits 3 times
		
		$_SESSION['ePureA'] = 0;		// enemy attacks pure, you have no def	
		$_SESSION['ePureD'] = 0;		// enemy has max defense	
		$_SESSION['eStrImm'] = 0;		// enemy str immune
		$_SESSION['eDexImm'] = 0;		// enemy dex immune
		$_SESSION['eMagImm'] = 0;		// enemy mag immune
		$_SESSION['eDodge'] = 1;		// enemy dodges LVL x 10%
		$_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}
// -----------------------------------  BATTLE INITIALIZE


// ------------------------------------------------------------------------ GRASSY FIELD
// --------------------------------------------------------------  rat
if ($enemy == 'Rat') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 3");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 1");
	$results = $link->query("UPDATE $user SET enemydef = 1");
			$_SESSION['eLvl'] = 1;			// enemy level
}
// --------------------------------------------------------------  Sand Crab
if ($enemy == 'Sand Crab') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 3");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 2");
	$results = $link->query("UPDATE $user SET enemydef = 2");
			$_SESSION['eLvl'] = 2;			// enemy level
}
// --------------------------------------------------------------  giant rat
if ($enemy == 'Giant Rat') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 6");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 3");
	$results = $link->query("UPDATE $user SET enemydef = 1");
			$_SESSION['eLvl'] = 3;			// enemy level
}

// --------------------------------------------------------------  SUPER Gator
if ($enemy == 'GatorX') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000000");	// poseidon
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100000");
	$results = $link->query("UPDATE $user SET enemydef = 100000");
			$_SESSION['eLvl'] = 500;			// enemy level
	
		$_SESSION['eFly'] = 0;		//1	// enemy flies, need ranged weapon
		$_SESSION['eCrit'] = 0;		// enemy critical attack, 1/10 chance x10 attack
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
		$_SESSION['eBite'] = 0;		// enemy bites you, 2x pure attack damage
		$_SESSION['eDex'] = 0;			// enemy dex att, uses your dex as def
		$_SESSION['eMag'] = 0;			// enemy mag att, uses your mag as def
		$_SESSION['eHeal'] = 0;		// enemy heals self
		$_SESSION['eSteal'] = 0;		// enemy steals 20% [ 1 - lvl*3 ] coin
		$_SESSION['ePoison'] = 0;	//2	// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
		$_SESSION['eMulti'] = 0;		// enemy LVL * 10% chance attack again (1 - 10)
		$_SESSION['eDoubleHit'] = 0;	// enemy always hits 2 times
		$_SESSION['eTripleHit'] = 0;	// enemy always hits 3 times
		
		$_SESSION['ePureA'] = 0;		// enemy attacks pure, max, and you have no def	
		$_SESSION['ePureD'] = 0;		// enemy has max defense	
		$_SESSION['eStrImm'] = 0;		// enemy str immune
		$_SESSION['eDexImm'] = 0;		// enemy dex immune
		$_SESSION['eMagImm'] = 0;		// enemy mag immune
		$_SESSION['eDodge'] = 0;		// enemy dodges LVL x 10%
		$_SESSION['notthe'] = 0;		// make 1 when enemy doesn't have THE (ex. diablo)

	}
// --------------------------------------------------------------  Gator (real Gator)
if ($enemy == 'Gator') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 100");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 8");
	$results = $link->query("UPDATE $user SET enemydef = 0");
			$_SESSION['eLvl'] = 5;			// enemy level
}	
// --------------------------------------------------------------  Silver Beast - NOT IN USE
if ($enemy == 'Silver Beast') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 50");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 30");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 99;			// enemy level
}		
// ------------------------------------------------------------------------ SPIDER CAVE
// --------------------------------------------------------------  spider
if ($enemy == 'Spider') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 5");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 3");
	$results = $link->query("UPDATE $user SET enemydef = 1");
				$_SESSION['eLvl'] = 2;			// enemy level
}	
	
// --------------------------------------------------------------  scorpion
if ($enemy == 'Scorpion') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 8");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 5");
	$results = $link->query("UPDATE $user SET enemydef = 2");
				$_SESSION['eLvl'] = 3;			// enemy level
}	
// --------------------------------------------------------------  giant spider
if ($enemy == 'Giant Spider') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 10");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 6");
	$results = $link->query("UPDATE $user SET enemydef = 3");
				$_SESSION['eLvl'] = 4;			// enemy level
}	
	
// --------------------------------------------------------------  alpha scorpion
if ($enemy == 'Alpha Scorpion') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 20");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 8");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 5;			// enemy level
}	
	
// --------------------------------------------------------------  scorpion guard
if ($enemy == 'Scorpion Guard') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 30");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 10");
	$results = $link->query("UPDATE $user SET enemydef = 8");
				$_SESSION['eLvl'] = 7;			// enemy level
	}
// --------------------------------------------------------------  mammoth scorpion
if ($enemy == 'Mammoth Scorpion') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 70");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 16");
				$_SESSION['eLvl'] = 10;			// enemy level
	}		
// --------------------------------------------------------------  scorpion queen
if ($enemy == 'Scorpion Queen') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 50");
	$results = $link->query("UPDATE $user SET enemydef = 40");
				$_SESSION['eLvl'] = 15;			// enemy level
	}		
// --------------------------------------------------------------  scorpion king
if ($enemy == 'Scorpion King') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 80");
				$_SESSION['eLvl'] = 30;			// enemy level
	}	
// ------------------------------------------------------------------------ BAT CAVE
// --------------------------------------------------------------  bat
if ($enemy == 'Bat') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 3");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 2");
	$results = $link->query("UPDATE $user SET enemydef = 2");
				$_SESSION['eLvl'] = 2;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies
	}	
// --------------------------------------------------------------  golden bat
if ($enemy == 'Golden Bat') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 20");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 8");
	$results = $link->query("UPDATE $user SET enemydef = 2");
				$_SESSION['eLvl'] = 6;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies
	}	
// --------------------------------------------------------------  salamander
if ($enemy == 'Salamander') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 30");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 10");
	$results = $link->query("UPDATE $user SET enemydef = 6");
				$_SESSION['eLvl'] = 6;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def	
	}			
		
// --------------------------------------------------------------  goblin
if ($enemy == 'Goblin') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 20");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 8");
	$results = $link->query("UPDATE $user SET enemydef = 6");
				$_SESSION['eLvl'] = 5;			// enemy level
	}
// --------------------------------------------------------------  goblin bandit
if ($enemy == 'Goblin Bandit') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 12");
	$results = $link->query("UPDATE $user SET enemydef = 8");
				$_SESSION['eLvl'] = 7;			// enemy level
	}	
// --------------------------------------------------------------  goblin chief
if ($enemy == 'Goblin Chief') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 120");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 10;			// enemy level
	}
	
// --------------------------------------------------------------  cow
if ($enemy == 'Cow') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 20");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 5");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 4;			// enemy level
	}						
// --------------------------------------------------------------  wild boar
if ($enemy == 'Wild Boar') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 8");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 5;			// enemy level
	}						
// --------------------------------------------------------------  snake
if ($enemy == 'Snake') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 15");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 15");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 5;			// enemy level
	}
// --------------------------------------------------------------  hill ogre
if ($enemy == 'Hill Ogre') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 100");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 10;			// enemy level
			$_SESSION['ePow'] = 1;			// enemy power x3 att
	}							
// ------------------------------------------------------------------------ OGRE CAVE
// --------------------------------------------------------------  hob goblin
if ($enemy == 'Hob Goblin') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 30");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 9");
	$results = $link->query("UPDATE $user SET enemydef = 7");
				$_SESSION['eLvl'] = 6;			// enemy level
}
// --------------------------------------------------------------  orc
if ($enemy == 'Orc') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 11");
	$results = $link->query("UPDATE $user SET enemydef = 7");
				$_SESSION['eLvl'] = 7;			// enemy level
		$_SESSION['eDex'] = 1;			// enemy dex att, used your dex as def	
}
// --------------------------------------------------------------  ogre
if ($enemy == 'Ogre') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 50");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 15");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 8;			// enemy level
}
// --------------------------------------------------------------  ogre guard
if ($enemy == 'Ogre Guard') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 80");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 9;			// enemy level
}
// --------------------------------------------------------------  fire ogress
if ($enemy == 'Fire Ogress') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 70");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 10;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  ogre lieutenant
if ($enemy == 'Ogre Lieutenant') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 250");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 35");
	$results = $link->query("UPDATE $user SET enemydef = 20");
				$_SESSION['eLvl'] = 13;			// enemy level
}
// --------------------------------------------------------------  ogre priest
if ($enemy == 'Ogre Priest') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 80");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 30");
	$results = $link->query("UPDATE $user SET enemydef = 20");
				$_SESSION['eLvl'] = 11;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eHeal'] = 1;		// enemy heals self
}

// ------------------------------------------------------------------------ KOBOLD CAVE
// --------------------------------------------------------------  kobold
if ($enemy == 'Kobold') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 30");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 10");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 7;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  flying kobold
if ($enemy == 'Flying Kobold') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 30");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 10");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 7;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies
	}
// --------------------------------------------------------------  kobold shaman
if ($enemy == 'Kobold Shaman') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 15");
	$results = $link->query("UPDATE $user SET enemydef = 4");
				$_SESSION['eLvl'] = 8;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  kobold ninja
if ($enemy == 'Kobold Ninja') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 8");
				$_SESSION['eLvl'] = 8;			// enemy level
}
// --------------------------------------------------------------  kobold warlock
if ($enemy == 'Kobold Warlock') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 50");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 4");
				$_SESSION['eLvl'] = 9;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
// --------------------------------------------------------------  kobold champion
if ($enemy == 'Kobold Champion') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 100");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 8");
				$_SESSION['eLvl'] = 10;			// enemy level
}
// --------------------------------------------------------------  kobold master
if ($enemy == 'Kobold Master') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 80");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40");
	$results = $link->query("UPDATE $user SET enemydef = 50");
				$_SESSION['eLvl'] = 13;			// enemy level
}
// --------------------------------------------------------------  kobold monk
if ($enemy == 'Kobold Monk') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 60");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 30");
	$results = $link->query("UPDATE $user SET enemydef = 30");
				$_SESSION['eLvl'] = 11;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eHeal'] = 1;		// enemy heals self
		}




// ------------------------------------------------------------------------ FOREST
if ($enemy == 'Wolf') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 12");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 5;			// enemy level
}
if ($enemy == 'Coyote') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 15");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 6;			// enemy level
}
if ($enemy == 'Buck') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 60");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 15");
	$results = $link->query("UPDATE $user SET enemydef = 8");
				$_SESSION['eLvl'] = 6;			// enemy level
}
if ($enemy == 'Bear') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 100");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 8;			// enemy level
}
if ($enemy == 'Stag') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 80");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 8;			// enemy level
		$_SESSION['eMagImm'] = 1;		// enemy mag immune	
}
if ($enemy == 'Bigfoot') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40");
	$results = $link->query("UPDATE $user SET enemydef = 15");
				$_SESSION['eLvl'] = 13;			// enemy level
}
if ($enemy == 'Hawk') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 30");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 15");
				$_SESSION['eLvl'] = 9;			// enemy level
	$_SESSION['eFly'] = 1;			// enemy flies
}
// ------------------------------------------------------------------------ SEWER
if ($enemy == 'Tarantula') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 50");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 7;			// enemy level
}
if ($enemy == 'Sewer Rat') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 60");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 15");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 7;			// enemy level
}
if ($enemy == 'Red Gator') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 250");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 0");
				$_SESSION['eLvl'] = 10;			// enemy level
}
if ($enemy == 'Flying Dung Beetle') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 8;			// enemy level
	$_SESSION['eFly'] = 1;			// enemy flies
}
if ($enemy == 'Imp') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 10");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 25");
				$_SESSION['eLvl'] = 7;			// enemy level
		$_SESSION['eDodge'] = 5;		// enemy dodges LVL x 10%	
}
// ------------------------------------------------------------------------ THIEVE'S DEN
if ($enemy == 'Thief') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 20");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 10");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 5;			// enemy level
		$_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - lvl*3 ] coin	
}						
if ($enemy == 'Thief Pickpocket') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 70");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 8;			// enemy level
		$_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - lvl*3 ] coin
}
if ($enemy == 'Thief Brute') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 120");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 30");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 11;			// enemy level
}
if ($enemy == 'Master Thief') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 45");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 14;			// enemy level
		$_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - lvl*3 ] coin
}
// ------------------------------------------------------------------------ CATACOMBS
if ($enemy == 'Skeleton') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 15");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 7;			// enemy level
}
if ($enemy == 'Skeleton Archer') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 50");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 8;			// enemy level
		$_SESSION['eDex'] = 1;			// enemy dex att, used your dex as def		
}
if ($enemy == 'Skeleton Knight') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 80");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 35");
	$results = $link->query("UPDATE $user SET enemydef = 15");
				$_SESSION['eLvl'] = 10;			// enemy level
}
if ($enemy == 'Skeleton Sorcerer') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 80");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 11;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
if ($enemy == 'Ancient Skeleton') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 120");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40");
	$results = $link->query("UPDATE $user SET enemydef = 30");
				$_SESSION['eLvl'] = 13;			// enemy level
}
if ($enemy == 'Victoria the Dead') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 250");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 50");
	$results = $link->query("UPDATE $user SET enemydef = 15");
				$_SESSION['eLvl'] = 17;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def	
		$_SESSION['eMagImm'] = 1;		// enemy mag immune
		$_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)		
}
if ($enemy == 'Omar the Dead') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 250");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 30");	
				$_SESSION['eLvl'] = 17;			// enemy level
		$_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}
// ------------------------------------------------------------------------ Abandoned Mine
if ($enemy == 'Rabid Skeever') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 30");
	$results = $link->query("UPDATE $user SET enemydef = 20");
				$_SESSION['eLvl'] = 15;			// enemy level
		$_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'Bleeding Dartwing') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 50");
	$results = $link->query("UPDATE $user SET enemydef = 30");
				$_SESSION['eLvl'] = 20;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies
}
if ($enemy == 'Mongolian Death Worm') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 600");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 70");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 23;			// enemy level
		$_SESSION['ePoison'] = 2;		// enemy poisons you 1:[ 1 - lvl/2 ], 2:[ 1 - lvl ]
}
// ------------------------------------------------------------------------ Stone Grotto
if ($enemy == 'Demon Wing') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 150");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 50");
	$results = $link->query("UPDATE $user SET enemydef = 10");
				$_SESSION['eLvl'] = 20;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
}
if ($enemy == 'Possessed Axeman') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 600");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 70");
	$results = $link->query("UPDATE $user SET enemydef = 30");
				$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power x3 att
}
// ------------------------------------------------------------------------ RED FORT
if ($enemy == 'Red Bandit') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 250");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40");
	$results = $link->query("UPDATE $user SET enemydef = 30");
				$_SESSION['eLvl'] = 15;			// enemy level
		$_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - lvl*3 ] coin
}
if ($enemy == 'Bandit Marauder') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 50");
	$results = $link->query("UPDATE $user SET enemydef = 30");
				$_SESSION['eLvl'] = 18;			// enemy level
		$_SESSION['eDex'] = 1;			// enemy dex att
}
if ($enemy == 'Butcher') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 30");
				$_SESSION['eLvl'] = 23;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power x3 att
}
if ($enemy == 'Red Beard') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 600");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 90");
	$results = $link->query("UPDATE $user SET enemydef = 40");
				$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
		$_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
}
// ------------------------------------------------------------------------ DEMIGODS
if ($enemy == 'Demigod of Strength') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 1000");
	$results = $link->query("UPDATE $user SET enemydef = 250");
				$_SESSION['eLvl'] = 70;			// enemy level
		$_SESSION['ePureD'] = 1;		// enemy has pure defense	, always max block
}
if ($enemy == 'Demigod of Defense') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 250");
	$results = $link->query("UPDATE $user SET enemydef = 1000");
				$_SESSION['eLvl'] = 70;			// enemy level
		$_SESSION['ePureD'] = 1;		// enemy has pure defense	, always max block
}


// ------------------------------------------------------------------------ BLUE OCEAN
if ($enemy == 'Jellyfish') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 50");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 15");
				$_SESSION['eLvl'] = 10;			// enemy level
}
if ($enemy == 'Electric Eel') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 60");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 20");
	$results = $link->query("UPDATE $user SET enemydef = 15");
				$_SESSION['eLvl'] = 10;			// enemy level
		$_SESSION['eDodge'] = 2;		// enemy dodges LVL x 10%
}
if ($enemy == 'Piranha') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 80");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 15");
				$_SESSION['eLvl'] = 11;			// enemy level
		$_SESSION['eMulti'] = 2;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Barracuda') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 100");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 25");
	$results = $link->query("UPDATE $user SET enemydef = 25");
				$_SESSION['eLvl'] = 12;			// enemy level
}
if ($enemy == 'Squid') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 120");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 35");
	$results = $link->query("UPDATE $user SET enemydef = 25");
				$_SESSION['eLvl'] = 13;			// enemy level
}
if ($enemy == 'Albatross') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 60");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40");
	$results = $link->query("UPDATE $user SET enemydef = 15");
				$_SESSION['eLvl'] = 13;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Crocodile') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 50");
				$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'King Squid') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 300");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 120");
	$results = $link->query("UPDATE $user SET enemydef = 120");
				$_SESSION['eLvl'] = 40;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
		$_SESSION['eTripleHit'] = 1;	// enemy always hits 3 times
}
if ($enemy == 'Mud Crab') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 50");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 30");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 11;			// enemy level
}
// ------------------------------------------------------------------------ UNDERWATER
if ($enemy == 'Giant Sea Turtle') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 35");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 15;			// enemy level
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
} 
if ($enemy == 'Colossal Squid') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 600");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 45");
	$results = $link->query("UPDATE $user SET enemydef = 5");
				$_SESSION['eLvl'] = 17;			// enemy level
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
} 
if ($enemy == 'Hammerhead') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 50");
	$results = $link->query("UPDATE $user SET enemydef = 50");
				$_SESSION['eLvl'] = 20;			// enemy level
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
} 
if ($enemy == 'Great White') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 250");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 40");
				$_SESSION['eLvl'] = 20;			// enemy level
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
} 
if ($enemy == 'Kraken') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 80");
	$results = $link->query("UPDATE $user SET enemydef = 40");
				$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
		$_SESSION['eDex'] = 1;			// enemy dex att, used your dex as def
		$_SESSION['eDodge'] = 1;		// enemy dodges LVL x 10%
		$_SESSION['eMulti'] = 6;		// enemy LVL * 10% chance attack again (1 - 10)
} 
if ($enemy == 'Glowing Octopus') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 150");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 50");
	$results = $link->query("UPDATE $user SET enemydef = 20");
				$_SESSION['eLvl'] = 20;			// enemy level
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
} 
		
if ($enemy == 'Thunder Barbarian') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 100");
				$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
		$_SESSION['ePureD'] = 1;		// enemy has max defense	
} 
if ($enemy == 'Smooth Ranger') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 150");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
		$_SESSION['eHeal'] = 1;		// enemy heals self
		$_SESSION['ePureD'] = 1;		// enemy has max defense	
} 
if ($enemy == 'Coral Wizard') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eMagImm'] = 1;		// enemy mag immune
		$_SESSION['ePureD'] = 1;		// enemy has max defense	
} 
if ($enemy == 'Heavy Walrus') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 150");
	$results = $link->query("UPDATE $user SET enemydef = 150");
				$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['eBite'] = 1;		// 
		$_SESSION['ePureD'] = 1;		// enemy has max defense	
} 
if ($enemy == 'Water Temple Guardian') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 2000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 200");
			$_SESSION['eLvl'] = 50;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
		$_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def	
		$_SESSION['ePureD'] = 1;		// enemy has max defense	
} 
if ($enemy == 'Poseidon') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100000");
	$results = $link->query("UPDATE $user SET enemydef = 100000");
			$_SESSION['eLvl'] = 500;			// enemy level

} 




// ------------------------------------------------------------------------ NEVERENDING MINE
if ($enemy == 'Iron Rat') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 100");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40");
	$results = $link->query("UPDATE $user SET enemydef = 40");
	$_SESSION['eLvl'] = 15;			// enemy level
		$_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'Iron Crab') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 100");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 20");
	$_SESSION['eLvl'] = 15;			// enemy level
}
if ($enemy == 'Iron Scorpion') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40");
	$results = $link->query("UPDATE $user SET enemydef = 40");
	$_SESSION['eLvl'] = 20;			// enemy level
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
}
if ($enemy == 'War Turtle') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 80");
	$results = $link->query("UPDATE $user SET enemydef = 60");
	$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
} 
if ($enemy == 'Slag Beast') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 250");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 20");
	$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['eMulti'] = 4;		// enemy LVL * 10% chance attack again (1 - 10)
} 
if ($enemy == 'Iron Gator') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 90");
	$results = $link->query("UPDATE $user SET enemydef = 0");
	$_SESSION['eLvl'] = 25;			// enemy level
}
if ($enemy == 'Iron Golem') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 250");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 90");
	$results = $link->query("UPDATE $user SET enemydef = 80");
	$_SESSION['eLvl'] = 25;			// enemy level
}
if ($enemy == 'Phoenix') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 50");
	$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eMulti'] = 3;		// enemy LVL * 10% chance attack again (1 - 10)
} 
if ($enemy == 'Iron Cobra') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 80");
	$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
		$_SESSION['ePoison'] = 2;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
} 
if ($enemy == 'Earth Golem') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 120");
	$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
}


if ($enemy == 'Steel Rat') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 60");
	$_SESSION['eLvl'] = 20;			// enemy level
		$_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
}
if ($enemy == 'Steel Crab') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 80");
	$results = $link->query("UPDATE $user SET enemydef = 40");
	$_SESSION['eLvl'] = 20;			// enemy level
}
if ($enemy == 'Steel Scorpion') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 60");
	$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
}
if ($enemy == 'Ulfberht') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 120");
	$results = $link->query("UPDATE $user SET enemydef = 120");
	$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['notthe'] = 1;		// make 1 when enemy doesn't have THE (ex. diablo)
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
		$_SESSION['eBlock'] = 1;		// block all damage, 1/5 chance
} 
if ($enemy == 'Black Frog') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 600");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 40");
	$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['eStrImm'] = 0;		// enemy str immune
} 
if ($enemy == 'Steel Gator') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 120");
	$results = $link->query("UPDATE $user SET enemydef = 0");
	$_SESSION['eLvl'] = 35;			// enemy level
}
if ($enemy == 'Steel Golem') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 600");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 140");
	$results = $link->query("UPDATE $user SET enemydef = 140");
	$_SESSION['eLvl'] = 35;			// enemy level
}
if ($enemy == 'Cyclops') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 150");
	$results = $link->query("UPDATE $user SET enemydef = 100");
	$_SESSION['eLvl'] = 40;			// enemy level
		$_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def	
} 
if ($enemy == 'Stone Assassin') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 100");
	$_SESSION['eLvl'] = 40;			// enemy level
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
}
if ($enemy == 'Gamma Monk') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 200");
	$_SESSION['eLvl'] = 40;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
		$_SESSION['eHeal'] = 1;		// enemy heals self
}


// --
// --
// --
// --

// ------------------------------------------------------------------------ NEVERENDING MINE / END
if ($enemy == 'Earth Giant') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 40000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 40000");
	$results = $link->query("UPDATE $user SET enemydef = 20000");
	$_SESSION['eLvl'] = 150;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power x3 att	
}
// ------------------------------------------------------------------------ 
if ($enemy == 'God of Earth') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 120000");
	$results = $link->query("UPDATE $user SET enemydef = 100000");
	$_SESSION['eLvl'] = 500;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power x3 att	
}

// --
// --
// --
// --

// ------------------------------------------------------------------------ DF Mountain Path
if ($enemy == 'Bowman') {
	$results = $link->query("UPDATE $user SET enemyhpmax = 300");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 40");
			$_SESSION['eLvl'] = 23;			// enemy level
		$_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
		$_SESSION['eMulti'] = 2;		// enemy LVL * 10% chance attack again (1 - 10)}
}
if ($enemy == 'Highwayman') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 60");
	$results = $link->query("UPDATE $user SET enemydef = 40");
			$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def	
		$_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - lvl*3 ] coin
}
 

// ------------------------------------------------------------------------ DARK FOREST
if ($enemy == 'Troll') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 120");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 30");
	$results = $link->query("UPDATE $user SET enemydef = 15");
			$_SESSION['eLvl'] = 13;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power x3 att	
}
if ($enemy == 'Troll Shaman') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 150");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 70");
	$results = $link->query("UPDATE $user SET enemydef = 30");
			$_SESSION['eLvl'] = 20;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eHeal'] = 1;		// enemy heals self
}
if ($enemy == 'Troll Sorcerer') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 300");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 70");
	$results = $link->query("UPDATE $user SET enemydef = 30");
			$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['ePoison'] = 1;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
		$_SESSION['eMulti'] = 4;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Troll Elder') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 90");
	$results = $link->query("UPDATE $user SET enemydef = 30");
			$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power x3 att	
}
if ($enemy == 'Troll Champion') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 10");
			$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['eRage'] = 1;		// enemy rage attack, 1/5 chance to do 2-4 pure hit combo (200% - 400% damage)
}
if ($enemy == 'Troll Queen') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 600");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 120");
	$results = $link->query("UPDATE $user SET enemydef = 60");
			$_SESSION['eLvl'] = 40;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eStrImm'] = 1;		// enemy str immune
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
		$_SESSION['eMulti'] = 4;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Troll King') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 160");
	$results = $link->query("UPDATE $user SET enemydef = 80");
			$_SESSION['eLvl'] = 45;			// enemy level
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att
		$_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage
		$_SESSION['eDoubleHit'] = 1;	// enemy always hits 2 times
}

if ($enemy == 'Falcon') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 20");
			$_SESSION['eLvl'] = 25;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Ent') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 70");
			$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eMagImm'] = 1;		// enemy mag immune
}
if ($enemy == 'Dark Ranger') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 400");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 20");
			$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
}
if ($enemy == 'Wisp') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 150");
	$results = $link->query("UPDATE $user SET enemydef = 50");
			$_SESSION['eLvl'] = 40;			// enemy level
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eDodge'] = 5;		// enemy dodges LVL x 10%
}



// ------------------------------------------------------------------------ DARK KEEP
if ($enemy == 'Lurker') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 80");
			$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['ePoison'] = 1;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
}
if ($enemy == 'Winged Demon') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 120");
			$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Undead Orc') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 150");
	$results = $link->query("UPDATE $user SET enemydef = 150");
			$_SESSION['eLvl'] = 45;			// enemy level
		$_SESSION['eDex'] = 1;			// enemy dex att, uses your dex as def
		$_SESSION['eMulti'] = 3;		// enemy LVL * 10% chance attack again (1 - 10)
}
if ($enemy == 'Stone Sphinx') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 2000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 400");
			$_SESSION['eLvl'] = 60;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
		$_SESSION['eDexImm'] = 1;		// enemy dex immune
		$_SESSION['eMagImm'] = 1;		// enemy mag immune
}
if ($enemy == 'Warped Priest') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 150");
			$_SESSION['eLvl'] = 55;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)
}
if ($enemy == 'Dark Paladin') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 250");
	$results = $link->query("UPDATE $user SET enemydef = 200");
			$_SESSION['eLvl'] = 55;			// enemy level
		$_SESSION['eHeal'] = 1;		// enemy heals self

}
if ($enemy == 'Dark Prince') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 3000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 300");
	$results = $link->query("UPDATE $user SET enemydef = 300");
			$_SESSION['eLvl'] = 60;			// enemy level
		$_SESSION['eMulti'] = 5;		// enemy LVL * 10% chance attack again (1 - 10)
		$_SESSION['eDrainMP'] = 1;		// enemy drains MP (1) 1 - lvl/2  (2) 1-lvl

}


if ($enemy == 'Forest Princess') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 10000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 300");
	$results = $link->query("UPDATE $user SET enemydef = 300");
			$_SESSION['eLvl'] = 80;			// enemy level
		$_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def	
		$_SESSION['ePureD'] = 1;		// enemy has max defense
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)

}


// ------------------------------------------------------------------------ MOUNTAINS
if ($enemy == 'Friendly Giant') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 30;			// enemy level
}
if ($enemy == 'Mountain Giant') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 100");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 30;			// enemy level
}
if ($enemy == 'Ice Troll') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 80");
	$results = $link->query("UPDATE $user SET enemydef = 80");
			$_SESSION['eLvl'] = 30;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
		$_SESSION['eBite'] = 1;		// enemy bites you, 2x pure attack damage					(200% pure damage)
}
if ($enemy == 'Giant Brute') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 150");
	$results = $link->query("UPDATE $user SET enemydef = 20");
			$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['eSteal'] = 1;		// enemy steals 20% [ 1 - lvl*3 ] coin
}
if ($enemy == 'Wyvern') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 120");
	$results = $link->query("UPDATE $user SET enemydef = 80");
			$_SESSION['eLvl'] = 35;			// enemy level
		$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Stone Dwarf') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 120");
	$results = $link->query("UPDATE $user SET enemydef = 200");
			$_SESSION['eLvl'] = 40;			// enemy level
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
		$_SESSION['eBlock'] = 1;			// block all damage, 1/5 chance
}
if ($enemy == 'Giant Mountain Giant') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 6000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 300");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 50;			// enemy level
}
if ($enemy == 'Gatekeeper') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 4000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 55;			// enemy level
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
		$_SESSION['eAssassinate'] = 1;		// NEW!!!! - 1/4 chance to do 50 times damage, first strike
}
if ($enemy == 'Yeti') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 2000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 80");
			$_SESSION['eLvl'] = 45;			// enemy level
			$_SESSION['eMagImm'] = 0;		// enemy mag immune
}
if ($enemy == 'Snow Orge') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 50;			// enemy level
			$_SESSION['eRage'] = 1;		// enemy rage attack, 1/5 chance to do 2-4 pure hit combo	(200%, 300% or 400% pure damage)
}
if ($enemy == 'Snow Ninja') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1200");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 150");
			$_SESSION['eLvl'] = 50;			// enemy level
			$_SESSION['eAssassinate'] = 1;		// NEW!!!! - 1/4 chance to do 50 times damage, first strike
			$_SESSION['ePoison'] = 2;		// enemy poisons you (1) 1 - lvl/2  (2) 1-lvl
}
if ($enemy == 'Snow Owl') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 1000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 250");
	$results = $link->query("UPDATE $user SET enemydef = 50");
			$_SESSION['eLvl'] = 50;			// enemy level
			$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		$_SESSION['eHeal'] = 1;		// enemy heals self		
}
if ($enemy == 'Dragon') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 2500");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 250");
	$results = $link->query("UPDATE $user SET enemydef = 250");
			$_SESSION['eLvl'] = 60;			// enemy level
			$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
			$_SESSION['eDragonFire'] = 1;	// dragon fire = pure attack (no def ) + pow attack (x3 dam) --- 1/4 chance // 50% chance to catch on fire. when on fire, burn forever for 10-20 dam. need to use water to cure on fire	
}

// ------------------------------------------------------------------------ MOUNTAIN CATHEDRAL
if ($enemy == 'Grey Gargoyle') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 40;			// enemy level
			$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'White Gargoyle') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 600");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 250");
	$results = $link->query("UPDATE $user SET enemydef = 150");
			$_SESSION['eLvl'] = 45;			// enemy level
			$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
			$_SESSION['eHeal'] = 1;			// enemy heals self
}
if ($enemy == 'Vampire') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 800");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 250");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 45;			// enemy level
			$_SESSION['eDrainHP'] = 2;		// enemy drains HP (1) 1 - lvl/2  (2) 1-lvl 
}
if ($enemy == 'Fallen Priest') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 2000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 250");
	$results = $link->query("UPDATE $user SET enemydef = 150");
			$_SESSION['eLvl'] = 50;			// enemy level
			$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
			$_SESSION['eHeal'] = 1;			// enemy heals self
}
if ($enemy == 'Fallen Priest') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 4000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 400");
	$results = $link->query("UPDATE $user SET enemydef = 200");
			$_SESSION['eLvl'] = 60;			// enemy level
			$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
			$_SESSION['eFly'] = 1;			// enemy flies, need ranged weapon
}
if ($enemy == 'Risen Skeleton') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 700");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 150");
	$results = $link->query("UPDATE $user SET enemydef = 80");
			$_SESSION['eLvl'] = 30;			// enemy level
			$_SESSION['eResurrect'] = 20;		// # percent chance to ressurect after enemy dies 
}

// ------------------------------------------------------------------------ MOUNTAIN XTRA
if ($enemy == 'GMG2') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 6000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 300");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 70;			// enemy level
		$_SESSION['eCrit'] = 1;		// enemy critical attack, 1/10 chance x10 attack			((1-att)*10)
		$_SESSION['ePow'] = 1;			// enemy power attack, 1/3 chance x3 att					((1-att)*3)
		$_SESSION['eMag'] = 1;			// enemy mag att, uses your mag as def
		}
if ($enemy == 'GK2') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 4000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 200");
	$results = $link->query("UPDATE $user SET enemydef = 100");
			$_SESSION['eLvl'] = 70;			// enemy level
		$_SESSION['eMulti'] = 7;		// enemy LVL * 10% chance attack again (1 - 10)
		$_SESSION['ePureA'] = 1;		// enemy attacks pure, you have no def	
		}
if ($enemy == 'King Blade') {	
	$results = $link->query("UPDATE $user SET enemyhpmax = 5000");
	$results = $link->query("UPDATE $user SET enemyhp = enemyhpmax");
	$results = $link->query("UPDATE $user SET enemyatt = 1200");
	$results = $link->query("UPDATE $user SET enemydef = 600");
			$_SESSION['eLvl'] = 90;			// enemy level
		$_SESSION['eMulti'] = 2;		// enemy LVL * 10% chance attack again (1 - 10)
		$_SESSION['eWhirlwind'] = 1;	// enemy whirlwind attack, 1/5 chance to do 8x damage 	(1-(att*8) damage)
		}










$results = $link->query("UPDATE $user SET infight = 1"); 	// INFIGHT!!!!!
?>