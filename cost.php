<?php 
/*
// -----------------------------------------------------1H WEAPONS TIER 1
50c dagger ( +1 str ) 				// rat, scorpion, goblin, thief...
50c stiletto ( +1 str, +1 mag ) 			// sand crab
50c training sword ( +3 str )			// pick up at young soldier
50c short sword ( +4 str )			// sand crab
400c broad sword ( +4 str, +2 def )		// alpha scorpion
400c mace ( +4 str, +2 mag )			// giant spider
400c long sword ( +5 str )			// alpha scorp, bat, orc, kobold...
400c club ( +6 str, -2 def )			// scorpion guard
1200c flail ( +7 str, +3 def)			// goblin chief, ogre
1200c morning star ( +7 str, +3 mag)		// goblin chief, fire ogress
1200c samurai sword ( +8 str )			// kobold ninja
3000c gladius ( +9 str, +2 mag, +2 def )		// kobold master, skel knight
200c basic staff ( +3 mag )			// scorpion
400c wooden staff ( +5 mag, +1 str )		// fire ogress, craft
800c wand ( +9 mag, -2 str )			// kobold warlock
3k wizard staff ( +8 mag )			// wizards guild reward
5k demon dagger ( +10 mag, +5 str )		// imp, ogre priest
5k gray wand ( +15 mag, -5 str, -5 def )		// gray matter reward
5k three-chained flail ( +9 str, +9 def )		// sewer pest control reward
5k bastard sword ( +11 str )			// warriors guild reward
5k giant club ( +13 str, -3 mag )			// bigfoot, thief brute
15k great white sword ( +17 str, +7 mag, +7 def ) // shark hunter reward
?*1b forever sword ( +lvl*2 str ) 			// forever sword?*/


// --------------------------------------------------------- ONE HANDED WEAPONS - TIER 1
$_SESSION['COSTdagger'] 			= 50;
$_SESSION['COSTstiletto'] 		= 50;
$_SESSION['COSTtrainingsword'] 	= 50;
$_SESSION['COSTshortsword'] 		= 50;
$_SESSION['COSTbroadsword'] 		= 400;
$_SESSION['COSTmace'] 			= 400;
$_SESSION['COSTlongsword'] 		= 400;
$_SESSION['COSTclub']				= 400;

$_SESSION['COSTflail'] 			= 1200;
$_SESSION['COSTmorningstar'] 		= 1200;
$_SESSION['COSTsamuraisword'] 	= 1200;
$_SESSION['COSTgladius'] 			= 3000;
$_SESSION['COSTbasicstaff'] 		= 200;
$_SESSION['COSTwoodenstaff'] 		= 400;
$_SESSION['COSTwand'] 			= 800;
$_SESSION['COSTwizardstaff'] 		= 10000;
$_SESSION['COSTdemondagger'] 		= 10000;
$_SESSION['COSTgraywand'] 		= 10000;

$_SESSION['COSTthreechainedflail']= 10000;
$_SESSION['COSTbastardsword'] 	= 10000;
$_SESSION['COSTgiantclub'] 		= 5000;
$_SESSION['COSTgreatwhitesword']	= 50000;
$_SESSION['COSTforeversword'] 	= 1000000000;

// 1h - TIER 2
$_SESSION['COSTirondagger'] 			= 1000;
$_SESSION['COSTironsword'] 			= 3000;
$_SESSION['COSTironstaff'] 			= 3000;
$_SESSION['COSTpoisonsaber'] 			= 50000;
$_SESSION['COSTulfberht'] 			= 30000;
$_SESSION['COSTwaraxe'] 				= 50000;
$_SESSION['COSTperfectsword'] 		= 200000;

// 1h - TIER 3
$_SESSION['COSTsilversword'] 			= 50000;
$_SESSION['COSTsilverstaff'] 			= 50000;
$_SESSION['COSTsteeldagger'] 			= 5000;
$_SESSION['COSTsteelsword'] 			= 20000;
$_SESSION['COSTsteelstaff'] 			= 20000;
$_SESSION['COSTsilverwhip'] 			= 100000;
$_SESSION['COSTsharpkatana'] 			= 100000;
$_SESSION['COSTkingsscepter'] 		= 100000;
$_SESSION['COSTforestsaber'] 			= 100000;
$_SESSION['COSTblackblade'] 			= 100000;
$_SESSION['COSTflamberg'] 			= 100000;

// 1h - TIER 4 ...
$_SESSION['COSTmithrildagger'] 			= 50000;
$_SESSION['COSTmithrilsword'] 			= 100000;
$_SESSION['COSTmithrilstaff'] 			= 100000;
$_SESSION['COSTvampiricdagger'] 			= 200000;
$_SESSION['COSTguardianblade'] 			= 200000;
$_SESSION['COSTgoldfalcion'] 				= 500000;
$_SESSION['COSTgmgclub'] 					= 500000;
$_SESSION['COSTgkclub'] 					= 500000;
$_SESSION['COSTmithrilwand'] 				= 500000;
$_SESSION['COSTmithrilflail'] 			= 500000;
$_SESSION['COSTmithrilmace'] 				= 500000;
$_SESSION['COSTmithrilcleaver'] 			= 500000;
$_SESSION['COSTblacklongsword'] 			= 500000;
$_SESSION['COSTgammaknife'] 				= 500000;

$_SESSION['COSTdraconicdagger'] 			= 500000;
$_SESSION['COSTgladiusofvalor'] 			= 500000;

$_SESSION['COSTearthelementalsword'] 	= 100000;
$_SESSION['COSTwaterelementalsword'] 	= 100000;
$_SESSION['COSTairelementalsword'] 		= 100000;
$_SESSION['COSTfireelementalsword'] 		= 100000;

// CHEAT / GOD WEAPONS
$_SESSION['COSTmasterblade'] 			= 1000000;


// --------------------------------------------------------- TWO HANDED WEAPONS - TIER 1
$_SESSION['COSTtraining2hsword'] 	= 100;
$_SESSION['COSTbo'] 					= 400;
$_SESSION['COSTbattleaxe'] 			= 800;
$_SESSION['COSTwarhammer'] 			= 900;
$_SESSION['COSTwoodenbo'] 			= 1000;
$_SESSION['COSTpike'] 				= 2500;
$_SESSION['COSTclaymore'] 			= 5000;
$_SESSION['COSTgreatsword'] 			= 10000;
$_SESSION['COSTbostaff'] 				= 2000;
$_SESSION['COSTbattlestaff'] 			= 2000;
$_SESSION['COSTdualtomahawk'] 		= 5000;
$_SESSION['COSTnunchaku'] 			= 20000;
$_SESSION['COSTbrassknuckles'] 		= 15000;
$_SESSION['COSTpolearm'] 				= 5000;
$_SESSION['COSTbonecudgel'] 			= 8000;
$_SESSION['COSThammerheadhammer'] 	= 50000;
$_SESSION['COSTforever2hsword'] 		= 2000000000;

// 2h - TIER 2
$_SESSION['COSTironmaul'] 			= 5000;
$_SESSION['COSTiron2hsword'] 			= 5000;
$_SESSION['COSTironbattlestaff'] 	= 7000;
$_SESSION['COSTironnunchaku'] 		= 50000;
$_SESSION['COSTgreataxe'] 			= 20000;
$_SESSION['COSTtrident'] 				= 45000;
$_SESSION['COSTsolomonsstaff'] 		= 200000;
$_SESSION['COSToakbattlestaff'] 		= 200000;
$_SESSION['COSTjimbo'] 				= 50000;
$_SESSION['COSTriotshield'] 			= 50000;

// 2h - TIER 3
$_SESSION['COSTsilver2hsword'] 		= 60000;
$_SESSION['COSTsteel2hsword'] 		= 20000;
$_SESSION['COSTsteelbattlestaff'] 	= 20000;
$_SESSION['COSTsteelnunchaku'] 		= 100000;
$_SESSION['COSTheavykatana'] 			= 100000;
$_SESSION['COSTheavyspear'] 			= 100000;
$_SESSION['COSTheavyhammer'] 			= 100000;
$_SESSION['COSToakwarhammer'] 		= 65000;
$_SESSION['COSTbardiche'] 			= 50000;
$_SESSION['COSTglaive'] 				= 50000;
$_SESSION['COSTperfect2hsword'] 		= 750000;

// 2h - TIER 4

$_SESSION['COSTmithril2hsword'] 			= 100000;
$_SESSION['COSTmithrilbattlestaff'] 		= 100000;
$_SESSION['COSTmithrilnunchaku'] 		= 400000;
$_SESSION['COSThumongousbattleaxe'] 		= 200000;
$_SESSION['COSTgargantuanwarhammer'] 	= 300000;
$_SESSION['COSTblessedspear'] 			= 500000;
$_SESSION['COSTfortifiedfauchard'] 		= 500000;
$_SESSION['COSTblackbo'] 					= 500000;
$_SESSION['COSTneutronstaff'] 			= 500000;
$_SESSION['COSTgravityhammer'] 			= 1000000;
$_SESSION['COSTobsidionbattlestaff'] 	= 1000000;
$_SESSION['COSTgreatswordofearth'] 		= 300000;
$_SESSION['COSTgreatswordofwater'] 		= 300000;
$_SESSION['COSTgreatswordofair'] 		= 300000;
$_SESSION['COSTgreatswordoffire'] 		= 300000;

// --------------------------------------------------------- RANGED WEAPONS - TIER 1
$_SESSION['COSTboomerang'] 			= 10000;
$_SESSION['COSTchakram'] 				= 30000;
$_SESSION['COSTwoodenbow'] 			= 800;
$_SESSION['COSThunterbow'] 			= 1500;
$_SESSION['COSTlongbow'] 				= 1500;
$_SESSION['COSTcrossbow'] 			= 1200;
$_SESSION['COSTjavelin'] 				= 20;

// ranged - TIER 2
$_SESSION['COSTironboomerang'] 		= 2000;
$_SESSION['COSTharpoon'] 				= 8000;
$_SESSION['COSTironchakram'] 			= 50000;
$_SESSION['COSTironbow'] 				= 3000;
$_SESSION['COSTenchantedbow'] 		= 100000;
$_SESSION['COSTjimbow'] 				= 50000;
$_SESSION['COSTironcrossbow'] 		= 4000;
$_SESSION['COSTcompoundcrossbow'] 	= 20000;
$_SESSION['COSThandcrossbow'] 		= 20000;
$_SESSION['COSTironjavelin'] 			= 1000;

// ranged - TIER 3
$_SESSION['COSTsilverboomerang'] 	= 40000;
$_SESSION['COSTsilverbow'] 			= 50000;
$_SESSION['COSTsilvercrossbow'] 		= 60000;
$_SESSION['COSTsteelboomerang'] 		= 10000;
$_SESSION['COSTsteelbow'] 			= 15000;
$_SESSION['COSTsteelcrossbow'] 		= 20000;
$_SESSION['COSTsteelchakram'] 		= 100000;
$_SESSION['COSTsteeljavelin'] 		= 2000;
$_SESSION['COSTrangerbow'] 			= 100000;
$_SESSION['COSTsnowbow'] 				= 250000;
$_SESSION['COSTkeeperscrossbow'] 	= 100000;
$_SESSION['COSTperfectbow'] 			= 500000;

// ranged - TIER 4
$_SESSION['COSTmithrilboomerang'] 	= 50000;
$_SESSION['COSTmithrilbow'] 			= 75000;
$_SESSION['COSTmithrilcrossbow']		= 100000;
$_SESSION['COSTmithrilchakram'] 		= 200000;
$_SESSION['COSTmithriljavelin'] 		= 5000;
$_SESSION['COSTblackboomerang'] 		= 200000;
$_SESSION['COSTblackbow'] 			= 250000;
$_SESSION['COSTblackcrossbow'] 		= 300000;
$_SESSION['COSTrangercrossbow'] 		= 500000;
$_SESSION['COSTgalaxybow'] 			= 500000;
$_SESSION['COSTchondrianbow'] 		= 500000;


// --------------------------------------------------------- OFF HAND/SHIELDS - TIER 1
$_SESSION['COSTtrainingshield'] 		= 50;
$_SESSION['COSTbasicshield'] 			= 100;
$_SESSION['COSTbuckler'] 				= 200;
$_SESSION['COSTwoodenshield'] 		= 200;
$_SESSION['COSTkiteshield'] 			= 400;
$_SESSION['COSThuntershield'] 		= 1000;
$_SESSION['COSToffhanddagger'] 		= 3000;
$_SESSION['COSTtowershield'] 			= 3000;
$_SESSION['COSTglowingorb'] 			= 3000;
$_SESSION['COSTenchantedorb'] 		= 5000;

// shield - TIER 2
$_SESSION['COSTironshield'] 			= 3000;
$_SESSION['COSTironkiteshield'] 		= 4000;
$_SESSION['COSTredshield'] 			= 10000;
$_SESSION['COSTdeathorb'] 			= 10000;
$_SESSION['COSTgreenshield'] 			= 30000;


// shield - TIER 3
$_SESSION['COSTsilvershield'] 		= 30000;
$_SESSION['COSTsteelshield'] 			= 10000;
$_SESSION['COSTsteelkiteshield'] 	= 12000;
$_SESSION['COSTvikingshield'] 		= 30000;
$_SESSION['COSTgreenorb'] 			= 15000;
$_SESSION['COSToffhandsword'] 		= 15000;
$_SESSION['COSTriotshield'] 			= 50000;

// shield - TIER 4
$_SESSION['COSTmithrilshield'] 		= 50000;
$_SESSION['COSTmithrilkiteshield'] 	= 60000;
$_SESSION['COSTsphinxshield'] 		= 100000;
$_SESSION['COSTrangershield'] 		= 100000;
$_SESSION['COSTmarksmanorb'] 			= 100000;
$_SESSION['COSTcursedskull'] 			= 100000;
$_SESSION['COSToffhandmace'] 			= 100000;
$_SESSION['COSToffhandrubymace'] 	= 100000;
$_SESSION['COSTheatershield'] 		= 200000;
$_SESSION['COSTrangerorb'] 			= 200000;
$_SESSION['COSTmagictalisman'] 		= 200000;
$_SESSION['COSTdragonshield'] 		= 200000;
$_SESSION['COSTultimashield'] 		= 200000;
$_SESSION['COSTforceshield'] 			= 500000;

// --------------------------------------------------------- HEAD - TIER 1
$_SESSION['COSTtraininghelmet'] 		= 50;
$_SESSION['COSTbasichelmet'] 			= 300;
$_SESSION['COSTbasichood'] 			= 500;
$_SESSION['COSTredhood'] 				= 700;
$_SESSION['COSTgreenhood'] 			= 700;
$_SESSION['COSTbluehood'] 			= 700;
$_SESSION['COSTleatherhood'] 			= 1000;
$_SESSION['COSTleatherhelmet'] 		= 1500;
$_SESSION['COSThornedhelmet'] 		= 1500;
$_SESSION['COSTbarbarianhelmet'] 	= 1500;
$_SESSION['COSTgrayhood'] 			= 1500;
$_SESSION['COSTwizardhat'] 			= 10000;
$_SESSION['COSTbattlehelm'] 			= 10000;
$_SESSION['COSTvictoriashood'] 		= 10000;
$_SESSION['COSTscorpionhood'] 		= 20000;


// head - TIER 2
$_SESSION['COSTironhood'] 			= 2000;
$_SESSION['COSTironhelmet'] 			= 2000;
$_SESSION['COSThauntedhelm'] 			= 20000;
$_SESSION['COSTbandithood'] 			= 30000;
$_SESSION['COSTcalamaricap'] 			= 30000;
$_SESSION['COSTheavyhelmet'] 			= 50000;
$_SESSION['COSTearthhood'] 			= 80000;
$_SESSION['COSTkettlehelm'] 			= 50000;
$_SESSION['COSTperfecthelmet'] 		= 80000;


// head - TIER 3
$_SESSION['COSTsilverhelmet'] 		= 20000;
$_SESSION['COSTsteelhood'] 			= 10000;
$_SESSION['COSTsteelhelmet'] 			= 10000;
$_SESSION['COSTsteelmasterhelm'] 	= 100000;
$_SESSION['COSTtrollcrown'] 			= 30000;
$_SESSION['COSTrangerhood'] 			= 30000;
$_SESSION['COSTgammahood'] 			= 200000;

// head - TIER 4
$_SESSION['COSTmithrilhelmet'] 		= 30000;
$_SESSION['COSTmithrilhood'] 			= 30000;
$_SESSION['COSTbansheemask'] 			= 50000;
$_SESSION['COSTblackhood'] 			= 100000;
$_SESSION['COSTmagnificentcrown'] 	= 500000;


// --------------------------------------------------------- BODY - TIER 1
$_SESSION['COSTtrainingarmor'] 		= 100;
$_SESSION['COSTtrainingarmorpro'] 	= 1000;
$_SESSION['COSTpaddedarmor'] 			= 500;
$_SESSION['COSTpajamas'] 				= 700;
$_SESSION['COSTgreencloak'] 			= 900;
$_SESSION['COSTblackrobe'] 			= 900;
$_SESSION['COSTgrayrobe'] 			= 1100;
$_SESSION['COSTleathervest'] 			= 1500;
$_SESSION['COSTleatherarmor'] 		= 2000;
$_SESSION['COSTsasquatchcloak'] 		= 10000;
$_SESSION['COSTturtleshell'] 			= 5000;


// body - TIER 2
$_SESSION['COSTironarmor'] 			= 3000;
$_SESSION['COSTironcape'] 			= 3000;
$_SESSION['COSTeartharmor'] 			= 180000;
$_SESSION['COSTblackcape'] 			= 10000;
$_SESSION['COSTforestcloak'] 			= 10000;
$_SESSION['COSTwarlockrobe'] 			= 10000;
$_SESSION['COSTchampionarmor'] 		= 200000;
$_SESSION['COSTperfectarmor'] 		= 130000;


// body - TIER 3
$_SESSION['COSTsilverbreastplate'] 	= 30000;
$_SESSION['COSTsteelarmor'] 			= 15000;
$_SESSION['COSTsteelcape'] 			= 15000;
$_SESSION['COSTrangercloak'] 			= 30000;
$_SESSION['COSTyeticloak'] 			= 50000;
$_SESSION['COSTdemoncape'] 			= 500000;
$_SESSION['COSTgammarobe'] 			= 500000;
$_SESSION['COSTsilverpajamas'] 		= 100000;

// body - TIER 4
$_SESSION['COST'] 			= 999999;
$_SESSION['COST'] 			= 999999;
$_SESSION['COST'] 			= 999999;
$_SESSION['COST'] 			= 999999;
$_SESSION['COST'] 			= 999999;
$_SESSION['COST'] 			= 999999;
$_SESSION['COST'] 			= 999999;
$_SESSION['COST'] 			= 999999;
$_SESSION['COST'] 			= 999999;


// --------------------------------------------------------- HANDS - TIER 1
$_SESSION['COSTtraininggloves'] 		= 50;
$_SESSION['COSTwristbracers'] 		= 300;
$_SESSION['COSTglowingbrace'] 		= 300;
$_SESSION['COSTblackgloves'] 		= 500;
$_SESSION['COSTgreengloves'] 		= 500;
$_SESSION['COSTgraygloves'] 			= 700;
$_SESSION['COSTleathergloves'] 		= 1000;
$_SESSION['COSThuntergloves'] 		= 5000;
$_SESSION['COSTtrollgloves'] 		= 5000;


// hands - TIER 2
$_SESSION['COSTirongauntlets'] 		= 1000;
$_SESSION['COSTirongloves'] 			= 1000;
$_SESSION['COSTironknuckles'] 		= 50000;
$_SESSION['COSTgatorgloves'] 		= 3000;
$_SESSION['COSTbanditgloves'] 		= 3000;
$_SESSION['COSTgrottogloves'] 		= 3000;
$_SESSION['COSTearthmittens'] 		= 80000;
$_SESSION['COSTperfectgloves'] 		= 50000;


// hands - TIER 3
$_SESSION['COSTsilvergauntlets'] 	= 20000;
$_SESSION['COSTsteelgauntlets'] 		= 10000;
$_SESSION['COSTsteelgloves'] 		= 10000;
$_SESSION['COSTsilkbracers'] 		= 20000;
$_SESSION['COSTgammahandwraps'] 		= 100000;


// hands - TIER 4
$_SESSION['COSTmithrilgauntlets'] 	= 40000;
$_SESSION['COSTmithrilgloves'] 		= 40000;
$_SESSION['COSTvambraces'] 			= 20000;
$_SESSION['COSTrangergloves'] 		= 20000;
$_SESSION['COSTglowinggloves'] 		= 100000;



// --------------------------------------------------------- FEET - TIER 1
$_SESSION['COSTtrainingboots'] 		= 50;
$_SESSION['COSTredboots'] 			= 400;
$_SESSION['COSTgreenboots'] 			= 400;
$_SESSION['COSTblackboots'] 			= 500;
$_SESSION['COSTgrayboots'] 			= 500;
$_SESSION['COSTslippers'] 			= 700;
$_SESSION['COSTleatherboots'] 		= 1000;
$_SESSION['COSTtrollboots'] 			= 2000;
$_SESSION['COSTboneboots'] 			= 10000;


// feet - TIER 2
$_SESSION['COSTironboots'] 			= 1000;
$_SESSION['COSTbigfootboots'] 		= 5000;
$_SESSION['COSTbanditboots'] 		= 5000;
$_SESSION['COSTmudboots'] 			= 15000;
$_SESSION['COSTwarlockboots'] 		= 5000;
$_SESSION['COSTearthboots'] 			= 80000;
$_SESSION['COSTperfectboots'] 		= 50000;


// feet - TIER 3
$_SESSION['COSTsilverboots'] 		= 20000;
$_SESSION['COSTsteelboots'] 			= 10000;
$_SESSION['COSTthunderboots'] 		= 10000;
$_SESSION['COSTgammaboots'] 			= 100000;
$_SESSION['COSTrangerboots'] 		= 20000;
$_SESSION['COSTsilverslippers'] 		= 50000;


// feet - TIER 4
$_SESSION['COSTmithrilboots'] 		= 40000;
$_SESSION['COSTcrimsonmocassins'] 	= 50000;
$_SESSION['COSTrangermocassins'] 	= 50000;
$_SESSION['COSTsilkmocassins'] 		= 50000;


















 ?> 