<?php

$level = $row['level'];
$foreverswordsamage = $row['level']*2;

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx BUFF RIGHT!!!!


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ONE HANDED WEAPONS 

// -----------------------------------------------------------------dagger buff +1 STR
if ($row["equipR"] =="dagger"){ echo " <span>( <i class='red'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +1"); }
// -----------------------------------------------------------------stiletto buff +1 STR, +1 MAG
if ($row["equipR"] =="stiletto"){ echo " <span>( <i class='red'>+1</i>, <i class='blue'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +1");
$results = $link->query("UPDATE $user SET magmod = magmod +1"); }
// -----------------------------------------------------------------training sword buff +3 STR
if ($row["equipR"] =="training sword"){ echo " <span>( <i class='red'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +3"); }
// -----------------------------------------------------------------short sword buff +2 STR
if ($row["equipR"] =="short sword"){ echo " <span>( <i class='red'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +4"); }
// ----------------------------------------------------------------- FOREVER short sword buff +2 STR
if ($row["equipR"] =="short swordXXX"){ echo " <span>( <i class='cyan px14'>+lvl*2 </i><i class='red'>+$foreverswordsamage</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + $foreverswordsamage"); }




// -----------------------------------------------------------------broad sword buff +4 STR, +2 DEF
if ($row["equipR"] =="broad sword"){ echo " <span>( <i class='red'>+4</i>, <i class='gold'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +4"); 
$results = $link->query("UPDATE $user SET defmod = defmod +2"); }
// -----------------------------------------------------------------mace buff +4 STR, +2 MAG
if ($row["equipR"] =="mace"){ echo " <span>( <i class='red'>+4</i>, <i class='blue'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +4"); 
$results = $link->query("UPDATE $user SET magmod = magmod +2"); }
// -----------------------------------------------------------------long sword buff +5 STR
if ($row["equipR"] =="long sword"){ echo " <span>( <i class='red'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +5"); }
// -----------------------------------------------------------------club buff +6 STR, -2 DEF
if ($row["equipR"] =="club"){ echo " <span>( <i class='red'>+6</i>, <i class='black'>-2 def</i>  )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +6"); 
$results = $link->query("UPDATE $user SET defmod = defmod -2"); }



// -----------------------------------------------------------------flail buff +7 STR +3 DEF
if ($row["equipR"] =="flail"){ echo " <span>( <i class='red'>+7</i>, <i class='gold'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +7");
$results = $link->query("UPDATE $user SET defmod = defmod +3"); }
// -----------------------------------------------------------------morning star buff +7 STR +3 MAG
if ($row["equipR"] =="morning star"){ echo " <span>( <i class='red'>+7</i>, <i class='blue'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +7");
$results = $link->query("UPDATE $user SET magmod = magmod +3"); }
// -----------------------------------------------------------------samurai sword buff +8 STR
if ($row["equipR"] =="samurai sword"){ echo " <span>( <i class='red'>+8</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +8"); }
// -----------------------------------------------------------------gladius buff +9 STR, +2 DEF, +2 MAG
if ($row["equipR"] =="gladius"){ echo " <span>( <i class='red'>+9</i>, <i class='blue'>+2</i>, <i class='gold'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +9");
$results = $link->query("UPDATE $user SET defmod = defmod +2");
$results = $link->query("UPDATE $user SET magmod = magmod +2"); }



// -----------------------------------------------------------------basic staff buff +3 MAG
if ($row["equipR"] =="basic staff"){ echo " <span>( <i class='blue'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +3"); }
// -----------------------------------------------------------------wooden staff buff +5 MAG, +1 STR
if ($row["equipR"] =="wooden staff"){ echo " <span>( <i class='blue'>+5</i>, <i class='red'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +5"); 
$results = $link->query("UPDATE $user SET strmod = strmod +1"); }
// -----------------------------------------------------------------wand buff +7 MAG, -2 STR
if ($row["equipR"] =="wand"){ echo " <span>( <i class='blue'>+9</i>, <i class='black'>-2 str</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +9"); 
$results = $link->query("UPDATE $user SET strmod = strmod -2"); }
// ----------------------------------------------------------------- wizard staff 
if ($row["equipR"] =="wizard staff"){ echo " <span>( <i class='blue'>+8</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +8"); }
// -----------------------------------------------------------------demon dagger buff +7 MAG, +5 STR
if ($row["equipR"] =="demon dagger"){ echo " <span>( <i class='blue'>+10</i>, <i class='red'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +10"); 
$results = $link->query("UPDATE $user SET strmod = strmod +5"); }
// -----------------------------------------------------------------gray wand buff +15 MAG, -5 STR, -5 DEF
if ($row["equipR"] =="gray wand"){ echo " <span>( <i class='blue'>+15</i>, <i class='black'>-5 str</i>, <i class='black'>-5 def</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +15"); 
$results = $link->query("UPDATE $user SET strmod = strmod -5"); 
$results = $link->query("UPDATE $user SET defmod = defmod -5"); }


// ----------------------------------------------------------------- three-chained flail
if ($row["equipR"] =="three-chained flail"){ echo " <span>( <i class='red'>+9</i>, <i class='gold'>+9</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +9");
$results = $link->query("UPDATE $user SET defmod = defmod +9"); }
// ----------------------------------------------------------------- bastard sword 
if ($row["equipR"] =="bastard sword"){ echo " <span>( <i class='red'>+11</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +11"); }

// ----------------------------------------------------------------- giant club
if ($row["equipR"] =="giant club"){ echo " <span>( <i class='red'>+13</i>, <i class='black'>-3 mag</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +13");
$results = $link->query("UPDATE $user SET magmod = magmod -3"); }
// ----------------------------------------------------------------- great white sword
if ($row["equipR"] =="great white sword"){ echo " <span>( <i class='red'>+17</i>, <i class='blue'>+7</i>, <i class='gold'>+7</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +17");
$results = $link->query("UPDATE $user SET magmod = magmod +7");
$results = $link->query("UPDATE $user SET defmod = defmod +7");  }


// -----------------------------------------------------------------master blade buff +200 STR, +100 DEF
if ($row["equipR"] =="master blade"){ echo " <span>( <i class='red'>+200</i>, <i class='gold'>+100</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +200");
$results = $link->query("UPDATE $user SET defmod = defmod +100");}



// ----------------------------------------------------------------- iron dagger 
if ($row["equipR"] =="iron dagger"){ echo " <span>( <i class='red'>+7</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +7"); }
// ----------------------------------------------------------------- iron sword 
if ($row["equipR"] =="iron sword"){ echo " <span>( <i class='red'>+18</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +18"); }
// ----------------------------------------------------------------- iron staff 
if ($row["equipR"] =="iron staff"){ echo " <span>( <i class='blue'>+10</i>, <i class='red'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +10");
$results = $link->query("UPDATE $user SET strmod = strmod +3"); } 

// -----------------------------------------------------------------poison saber
if ($row["equipR"] =="poison saber"){ echo " <span>( <i class='red'>+18</i>, <i class='blue'>+3</i>, <i class='green px10'>poison<i class='px12'>5</i></i> )</span>"; 
$results = $link->query("UPDATE $user SET magmod = magmod +3"); 
$results = $link->query("UPDATE $user SET strmod = strmod +18"); }
// ----------------------------------------------------------------- war axe 
if ($row["equipR"] =="war axe"){ echo " <span>( <i class='red'>+30</i>, <i class='black'>-5 mag</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +30"); 
$results = $link->query("UPDATE $user SET magmod = magmod -5"); }

// ----------------------------------------------------------------- silver sword 
if ($row["equipR"] =="silver sword"){ echo " <span>( <i class='red'>+25</i>, <i class='blue'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +25");
$results = $link->query("UPDATE $user SET magmod = magmod +5"); }
// ----------------------------------------------------------------- silver staff 
if ($row["equipR"] =="silver staff"){ echo " <span>( <i class='blue'>+25</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +25"); }
// ----------------------------------------------------------------- steel dagger 
if ($row["equipR"] =="steel dagger"){ echo " <span>( <i class='red'>+18</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +18"); }
// ----------------------------------------------------------------- steel sword 
if ($row["equipR"] =="steel sword"){ echo " <span>( <i class='red'>+27</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +27"); }
// ----------------------------------------------------------------- steel staff 
if ($row["equipR"] =="steel staff"){ echo " <span>( <i class='blue'>+22</i>, <i class='red'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +22");
$results = $link->query("UPDATE $user SET strmod = strmod +5"); }

// ----------------------------------------------------------------- silver whip 
if ($row["equipR"] =="silver whip"){ echo " <span>( <i class='red'>+25</i>, <i class='blue'>+25</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +25");
$results = $link->query("UPDATE $user SET magmod = magmod +25"); }

// ----------------------------------------------------------------- kings scepter 
if ($row["equipR"] =="kings scepter"){ echo " <span>( <i class='blue'>+35</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +35"); }

// ----------------------------------------------------------------- forest saber
if ($row["equipR"] =="forest saber"){ echo " <span>( <i class='red'>+30</i>, <i class='blue'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +30");
$results = $link->query("UPDATE $user SET magmod = magmod +10"); }
// ----------------------------------------------------------------- sharp katana
if ($row["equipR"] =="sharp katana"){ echo " <span>( <i class='red'>+45</i>, <i class='black'>-10 def</i>  )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +45");
$results = $link->query("UPDATE $user SET defmod = defmod -10"); }
// ----------------------------------------------------------------- black blade 
if ($row["equipR"] =="black blade"){ echo " <span>( <i class='red'>+55</i>, <i class='black'>-10 mag</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +55");
$results = $link->query("UPDATE $user SET magmod = magmod -10"); }
// ----------------------------------------------------------------- flamberg
if ($row["equipR"] =="flamberg"){ echo " <span>( <i class='red'>+50</i>, <i class='blue'>+10</i>, <i class='gold'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +50");
$results = $link->query("UPDATE $user SET defmod = defmod +10");
$results = $link->query("UPDATE $user SET magmod = magmod +10"); }

// ----------------------------------------------------------------- guardian blade 
if ($row["equipR"] =="guardian blade"){ echo " <span>( <i class='red'>+80</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +80"); }
// ----------------------------------------------------------------- gamma knife
if ($row["equipR"] =="gamma knife"){ echo " <span>( <i class='red'>+30</i>, <i class='blue'>+30</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +30");
$results = $link->query("UPDATE $user SET magmod = magmod +30"); }





// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx TWO HANDED WEAPONS

// -----------------------------------------------------------------training 2h sword buff +6 STR
if ($row["equipR"] =="training 2h sword"){ echo " <span>( <i class='red'>+6</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +6"); }
// -----------------------------------------------------------------bo buff +7 STR
if ($row["equipR"] =="bo"){ echo " <span>( <i class='red'>+7</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +7"); }
// ----------------------------------------------------------------- battle axe buff +10 STR -2 DEF
if ($row["equipR"] =="battle axe"){ echo " <span>( <i class='red'>+10</i>, <i class='black'>-2 def</i>  )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +10");
$results = $link->query("UPDATE $user SET defmod = defmod -2"); }
// -----------------------------------------------------------------warhammer buff +12 STR -5 DEF
if ($row["equipR"] =="warhammer"){ echo " <span>( <i class='red'>+12</i>, <i class='black'>-5 def</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +12");
$results = $link->query("UPDATE $user SET defmod = defmod -5"); }


// -----------------------------------------------------------------wooden bo buff 
if ($row["equipR"] =="wooden bo"){ echo " <span>( <i class='red'>+9</i>, <i class='blue'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +9");
$results = $link->query("UPDATE $user SET magmod = magmod +1"); }
// -----------------------------------------------------------------pike buff +11 STR
if ($row["equipR"] =="pike"){ echo " <span>( <i class='red'>+11</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +11"); }

// -----------------------------------------------------------------claymore buff +13 STR, +2 MAG, +2 DEF
if ($row["equipR"] =="claymore"){ echo " <span>( <i class='red'>+13</i>, <i class='blue'>+2</i>, <i class='gold'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +13"); 
$results = $link->query("UPDATE $user SET magmod = magmod +2"); 
$results = $link->query("UPDATE $user SET defmod = defmod +2"); }
// -----------------------------------------------------------------great sword
if ($row["equipR"] =="great sword"){ echo " <span>( <i class='red'>+17</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +17"); }
// -----------------------------------------------------------------bo staff buff 
if ($row["equipR"] =="bo staff"){ echo " <span>( <i class='blue'>+4</i>, <i class='red'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +4");
$results = $link->query("UPDATE $user SET magmod = magmod +4"); }
// -----------------------------------------------------------------battle staff buff 
if ($row["equipR"] =="battle staff"){ echo " <span>( <i class='blue'>+6</i>, <i class='red'>+6</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +6");
$results = $link->query("UPDATE $user SET strmod = strmod +6"); }
// -----------------------------------------------------------------dual tomahawk buff 
if ($row["equipR"] =="dual tomahawk"){ echo " <span>( <i class='blue'>+9</i>, <i class='red'>+9</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +9");
$results = $link->query("UPDATE $user SET strmod = strmod +9"); }


// -----------------------------------------------------------------brass knuckles
if ($row["equipR"] =="brass knuckles"){ echo " <span>( <i class='red'>+16</i>, <i class='blue'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +16"); 
$results = $link->query("UPDATE $user SET magmod = magmod +3"); }
// -----------------------------------------------------------------polearm
if ($row["equipR"] =="polearm"){ echo " <span>( <i class='red'>+16</i>, <i class='gold'>+20</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +16"); 
$results = $link->query("UPDATE $user SET defmod = defmod +20"); }
// -----------------------------------------------------------------bone cudgel
if ($row["equipR"] =="bone cudgel"){ echo " <span>( <i class='red'>+32</i>, <i class='black'>-10 mag</i>, <i class='black'>-10 def</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +32"); 
$results = $link->query("UPDATE $user SET magmod = magmod -10"); 
$results = $link->query("UPDATE $user SET defmod = defmod -10"); }
// -----------------------------------------------------------------hammerhead hammer
if ($row["equipR"] =="hammerhead hammer"){ echo " <span>( <i class='red'>+35</i>, <i class='blue'>+10</i>, <i class='gold'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +35"); 
$results = $link->query("UPDATE $user SET magmod = magmod +10"); 
$results = $link->query("UPDATE $user SET defmod = defmod +10");  }

// -----------------------------------------------------------------iron maul
if ($row["equipR"] =="iron maul"){ echo " <span>( <i class='red'>+22</i>, <i class='gold'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +22"); 
$results = $link->query("UPDATE $user SET defmod = defmod +10"); }
// -----------------------------------------------------------------iron 2h sword
if ($row["equipR"] =="iron 2h sword"){ echo " <span>( <i class='red'>+25</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +25"); }
// -----------------------------------------------------------------iron battle staff buff +12 MAG +12 STR
if ($row["equipR"] =="iron battle staff"){ echo " <span>( <i class='blue'>+12</i>, <i class='red'>+12</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +12");
$results = $link->query("UPDATE $user SET strmod = strmod +12"); }
// ----------------------------------------------------------------- great axe
if ($row["equipR"] =="great axe"){ echo " <span>( <i class='red'>+50</i>, <i class='black'>-10 def</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +50");
$results = $link->query("UPDATE $user SET defmod = defmod -10"); }
// -----------------------------------------------------------------trident buff 
if ($row["equipR"] =="trident"){ echo " <span>( <i class='red'>+45</i>, <i class='blue'>+15</i>, <i class='gold'>+15</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +45"); 
$results = $link->query("UPDATE $user SET magmod = magmod +15"); 
$results = $link->query("UPDATE $user SET defmod = defmod +15"); }
// -----------------------------------------------------------------solomons staff
if ($row["equipR"] =="solomon's staff"){ echo " <span>( <i class='blue'>+45</i>, <i class='black'>-15 str</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +45"); 
$results = $link->query("UPDATE $user SET strmod = strmod -15");  }

// -----------------------------------------------------------------oak battle staff
if ($row["equipR"] =="oak battle staff"){ echo " <span>( <i class='blue'>+30</i>, <i class='red'>+30</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +30");
$results = $link->query("UPDATE $user SET magmod = magmod +30"); }
// ----------------------------------------------------------------- jim bo
if ($row["equipR"] =="jim bo"){ 
echo " <span>( <i class='red'>+45</i>, <i class='green px10'>poison<i class='px12'>5</i></i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +45"); }
// -----------------------------------------------------------------riot shield
if ($row["equipR"] =="riot shield"){ echo " <span>( +300 def, -300 str, dex, mag )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +300");
$results = $link->query("UPDATE $user SET strmod = strmod -300"); 
$results = $link->query("UPDATE $user SET dexmod = dexmod -300");
$results = $link->query("UPDATE $user SET magmod = magmod -300");   }
// -----------------------------------------------------------------2h shield
if ($row["equipR"] =="2h shield"){ echo " <span>( +300 def, -300 str, dex, mag )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +300");
$results = $link->query("UPDATE $user SET strmod = strmod -300"); 
$results = $link->query("UPDATE $user SET dexmod = dexmod -300");
$results = $link->query("UPDATE $user SET magmod = magmod -300");   }
// -----------------------------------------------------------------silver 2h sword
if ($row["equipR"] =="silver 2h sword"){ echo " <span>( <i class='red'>+45</i>, <i class='blue'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +45");
$results = $link->query("UPDATE $user SET magmod = magmod +5"); }
// -----------------------------------------------------------------steel 2h sword
if ($row["equipR"] =="steel 2h sword"){ echo " <span>( <i class='red'>+50</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +50"); }
// -----------------------------------------------------------------steel battle staff
if ($row["equipR"] =="steel battle staff"){ echo " <span>( <i class='blue'>+24</i>, <i class='red'>+24</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +24");
$results = $link->query("UPDATE $user SET magmod = magmod +24"); }
// -----------------------------------------------------------------steel nunchaku
if ($row["equipR"] =="steel nunchaku"){ echo " <span>( <i class='blue'>+40</i>, <i class='red'>+40</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +40");
$results = $link->query("UPDATE $user SET magmod = magmod +40"); }
// -----------------------------------------------------------------heavy katana
if ($row["equipR"] =="heavy katana"){ echo " <span>( <i class='red'>+90</i>, <i class='black'>-20 def</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +90");
$results = $link->query("UPDATE $user SET defmod = defmod -20"); }
// -----------------------------------------------------------------heavy spear
if ($row["equipR"] =="heavy spear"){ echo " <span>( <i class='red'>+40</i>, <i class='gold'>+60</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +40");
$results = $link->query("UPDATE $user SET defmod = defmod +60"); }
// -----------------------------------------------------------------heavy hammer
if ($row["equipR"] =="heavy hammer"){ echo " <span>( <i class='red'>+120</i>, <i class='black'>-40 mag</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +120");
$results = $link->query("UPDATE $user SET magmod = magmod -40"); }
// ----------------------------------------------------------------- oak warhammer
if ($row["equipR"] =="oak warhammer"){ echo " <span>( <i class='red'>+85</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +85");
}
// ----------------------------------------------------------------- bardiche
if ($row["equipR"] =="bardiche"){ echo " <span>( <i class='red'>+110</i>, <i class='black'>-30 mag</i>, <i class='black'>-30 def</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +110");
$results = $link->query("UPDATE $user SET magmod = magmod -30");
$results = $link->query("UPDATE $user SET defmod = defmod -30"); }
// ----------------------------------------------------------------- glaive
if ($row["equipR"] =="glaive"){ echo " <span>( <i class='red'>+80</i>, <i class='gold'>+80</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +80");
$results = $link->query("UPDATE $user SET defmod = defmod +80"); }
// ----------------------------------------------------------------- perfect 2h sword
if ($row["equipR"] =="perfect 2h sword"){ echo " <span>( <i class='cyan'>+75</i> all stats )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +75");
$results = $link->query("UPDATE $user SET dexmod = dexmod +75");
$results = $link->query("UPDATE $user SET magmod = magmod +75");
$results = $link->query("UPDATE $user SET defmod = defmod +75"); }

// -----------------------------------------------------------------mithril 2h sword
if ($row["equipR"] =="mithril 2h sword"){ echo " <span>( <i class='red'>+100/i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +100"); }
// -----------------------------------------------------------------mithril battle staff
if ($row["equipR"] =="mithril battle staff"){ echo " <span>( <i class='blue'>+45</i>, <i class='red'>+45/i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +45");
$results = $link->query("UPDATE $user SET magmod = magmod +45"); }
// -----------------------------------------------------------------mithril nunchaku
if ($row["equipR"] =="mithril nunchaku"){ echo " <span>( <i class='blue'>+60</i>, <i class='red'>+60</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +60");
$results = $link->query("UPDATE $user SET magmod = magmod +60"); }
// -----------------------------------------------------------------humongous battleaxe
if ($row["equipR"] =="humongous battleaxe"){ echo " <span>( <i class='red'>+150</i>, <i class='black'>-50 mag</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +150");
$results = $link->query("UPDATE $user SET magmod = magmod -50"); }
// -----------------------------------------------------------------gargantuan warhammer
if ($row["equipR"] =="gargantuan warhammer"){ echo " <span>( <i class='red'>+250</i>, <i class='black'>-100 mag</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +250");
$results = $link->query("UPDATE $user SET magmod = magmod -100"); }
// -----------------------------------------------------------------blessed spear
if ($row["equipR"] =="blessed spear"){ echo " <span>( <i class='red'>+80</i>, <i class='blue'>+40</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +80");
$results = $link->query("UPDATE $user SET magmod = magmod +40"); }
// -----------------------------------------------------------------fortified fauchard
if ($row["equipR"] =="fortified fauchard"){ echo " <span>( <i class='red'>+120</i>, <i class='gold'>+120</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +120");
$results = $link->query("UPDATE $user SET defmod = defmod +120"); }





// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx PROJECTILE WEAPONS

// -----------------------------------------------------------------boomerang buff +1 DEX 
if ($row["equipR"] =="boomerang"){
echo " <span>( <i class='green'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +1"); }
// -----------------------------------------------------------------wooden bow buff +8 DEX 
if ($row["equipR"] =="wooden bow"){
echo " <span>( <i class='green'>+8</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +8"); }
// -----------------------------------------------------------------hunter bow
if ($row["equipR"] =="hunter bow"){
echo " <span>( <i class='green'>+9</i>, <i class='gold'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +9");
$results = $link->query("UPDATE $user SET defmod = defmod +5"); }
// -----------------------------------------------------------------long bow
if ($row["equipR"] =="long bow"){
echo " <span>( <i class='green'>+11</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +11"); }

// -----------------------------------------------------------------crossbow buff +13 DEX
if ($row["equipR"] =="crossbow"){
echo " <span>( <i class='green'>+13</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +13"); }
// -----------------------------------------------------------------javelin buff +25 DEX
if ($row["equipR"] =="javelin"){
echo " <span>( <i class='green'>+25</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +25"); }


// -----------------------------------------------------------------iron 
if ($row["equipR"] =="iron boomerang"){
echo " <span>( <i class='green'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +10"); }

if ($row["equipR"] =="harpoon"){
echo " <span>( <i class='green'>+8</i>, <i class='blue'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +8");
$results = $link->query("UPDATE $user SET magmod = magmod +4"); }

if ($row["equipR"] =="iron chakram"){
echo " <span>( <i class='green'>+15</i>, <i class='blue'>+15</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +15");
$results = $link->query("UPDATE $user SET magmod = magmod +15"); }

if ($row["equipR"] =="iron bow"){
echo " <span>( <i class='green'>+20</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +20"); }

if ($row["equipR"] =="enchanted bow"){
echo " <span>( <i class='green'>+25</i>, <i class='blue'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +25");
$results = $link->query("UPDATE $user SET magmod = magmod +10"); }

if ($row["equipR"] =="jim bow"){
echo " <span>( <i class='green'>+25</i>, <i class='green px10'>poison<i class='px12'>5</i></i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +25"); }






if ($row["equipR"] =="iron crossbow"){
echo " <span>( <i class='green'>+30</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +30"); }


if ($row["equipR"] =="compound crossbow"){
echo " <span>( <i class='green'>+40</i>, <i class='gold'>+80</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +40");
$results = $link->query("UPDATE $user SET defmod = defmod +80");  }


if ($row["equipR"] =="hand crossbow"){
echo " <span>( <i class='green'>+35</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +35");}


if ($row["equipR"] =="iron javelin"){
echo " <span>( <i class='green'>+50</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +50"); }
// -----------------------------------------------------------------silver 
if ($row["equipR"] =="silver boomerang"){
echo " <span>( <i class='green'>+20</i>, <i class='blue'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +20");
$results = $link->query("UPDATE $user SET magmod = magmod +5"); }

if ($row["equipR"] =="silver bow"){
echo " <span>( <i class='green'>+30</i>, <i class='blue'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +30");
$results = $link->query("UPDATE $user SET magmod = magmod +5"); }

if ($row["equipR"] =="silver crossbow"){
echo " <span>( <i class='green'>+40</i>, <i class='blue'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +40");
$results = $link->query("UPDATE $user SET magmod = magmod +5"); }

// -----------------------------------------------------------------steel 
if ($row["equipR"] =="steel boomerang"){
echo " <span>( <i class='green'>+22</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +22"); }

if ($row["equipR"] =="steel bow"){
echo " <span>( <i class='green'>+33</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +33"); }

if ($row["equipR"] =="steel crossbow"){
echo " <span>( <i class='green'>+44</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +44"); }


if ($row["equipR"] =="steel javelin"){
echo " <span>( <i class='green'>+100</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +100"); }

if ($row["equipR"] =="ranger bow"){
echo " <span>( <i class='green'>+50</i>, <i class='blue'>+25</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +50");
$results = $link->query("UPDATE $user SET magmod = magmod +25"); }


if ($row["equipR"] =="keeper's crossbow"){
echo " <span>( <i class='green'>+90</i>, <i class='black'>-50 def</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +90");
$results = $link->query("UPDATE $user SET defmod = defmod -50"); }

if ($row["equipR"] =="ranger crossbow"){
echo " <span>( <i class='green'>+250</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +250"); }


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx TOOLS BUFF
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx TOOLS BUFF

// -----------------------------------------------------------------hatchet buff +3 STR, +1 DEF
if ($row["equipR"] =="hatchet"){ echo " <span>( +3 str, +1 def )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +3"); 
$results = $link->query("UPDATE $user SET defmod = defmod +1"); }

// -----------------------------------------------------------------pickaxe buff +3 STR, +3 DEF
if ($row["equipR"] =="pickaxe"){ echo " <span>( +1 str, +3 def )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +3"); 
$results = $link->query("UPDATE $user SET defmod = defmod +3"); }

// -----------------------------------------------------------------hammer buff +5 STR
if ($row["equipR"] =="hammer"){ echo " <span>( +5 str )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +5"); }
	
?>