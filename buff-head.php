<?php

// ------------------- BUFF HEAD!!!!

// ----------------------------------------------------------------- training helmet buff + 2 DEF
if ($row['equipHead'] =="training helmet"){
echo " <span>( <i class='gold'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod + 2"); }
// ----------------------------------------------------------------- basic helmet buff + 5 DEF
if ($row['equipHead'] =="basic helmet"){
echo " <span>( <i class='gold'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod + 5"); }
// ----------------------------------------------------------------- basic hood + 1 STR + 1 DEX + 1 MAG
if ($row['equipHead'] =="basic hood"){
echo " <span>( <i class='red'>+1</i>, <i class='green'>+1</i>, <i class='blue'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 1");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 1");
$results = $link->query("UPDATE $user SET magmod = magmod + 1"); }
// ----------------------------------------------------------------- red hood + 2 STR
if ($row['equipHead'] =="red hood"){
echo " <span>( <i class='red'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2"); }
// ----------------------------------------------------------------- green hood + 2 DEX
if ($row['equipHead'] =="green hood"){
echo " <span>( <i class='green'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); }
// ----------------------------------------------------------------- blue hood + 2 MAG
if ($row['equipHead'] =="blue hood"){
echo " <span>( <i class='blue'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod + 2"); }
// ----------------------------------------------------------------- leather hood + 4 DEX, +4 DEF
if ($row['equipHead'] =="leather hood"){
echo " <span>( <i class='green'>+4</i>, <i class='gold'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 4");
$results = $link->query("UPDATE $user SET defmod = defmod + 4"); }
// ----------------------------------------------------------------- leather helmet +2 STR +10 DEF
if ($row['equipHead'] =="leather helmet"){
echo " <span>( <i class='red'>+2</i>, <i class='gold'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2");
$results = $link->query("UPDATE $user SET defmod = defmod + 10"); }
// ----------------------------------------------------------------- horned helmet +5 STR
if ($row['equipHead'] =="horned helmet"){
echo " <span>( <i class='red'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 5"); }
// ----------------------------------------------------------------- barbarian helmet +8 STR, -3 MAG
if ($row['equipHead'] =="barbarian helmet"){
echo " <span>( <i class='red'>+8</i>, <i class='black'>-3 mag</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 8");
$results = $link->query("UPDATE $user SET magmod = magmod - 3"); }
// ----------------------------------------------------------------- gray hood + 4 MAG
if ($row['equipHead'] =="gray hood"){
echo " <span>( <i class='blue'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod + 4"); }
// ----------------------------------------------------------------- wizard hat + 5 MAG - 2 DEF
if ($row['equipHead'] =="wizard hat"){
echo " <span>( <i class='blue'>+5</i>, <i class='black'>-2 def</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod + 5");
$results = $link->query("UPDATE $user SET defmod = defmod - 2"); }
// ----------------------------------------------------------------- battle helm + 4 STR + 4 DEF
if ($row['equipHead'] =="battle helm"){
echo " <span>( <i class='red'>+4</i>, <i class='gold'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 4"); 
$results = $link->query("UPDATE $user SET defmod = defmod + 4"); }
// ----------------------------------------------------------------- victoria's hood + 6 MAG
if ($row['equipHead'] =="victoria's hood"){
echo " <span>( <i class='blue'>+6</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod + 6"); }
// ----------------------------------------------------------------- scorpion hood 
if ($row['equipHead'] =="scorpion hood"){
echo " <span>( <i class='red'>+7</i>, <i class='blue'>+5</i>, <i class='gold'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 7"); 
$results = $link->query("UPDATE $user SET defmod = defmod + 5");
$results = $link->query("UPDATE $user SET magmod = magmod + 5"); }


// ----------------------------------------------------------------- iron hood
if ($row['equipHead'] =="iron hood"){
echo " <span>( <i class='red'>+3</i>, <i class='green'>+3</i>, <i class='gold'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 3"); 
$results = $link->query("UPDATE $user SET dexmod = dexmod + 3");
$results = $link->query("UPDATE $user SET defmod = defmod + 3");
}
// ----------------------------------------------------------------- iron helmet
if ($row['equipHead'] =="iron helmet"){
echo " <span>( <i class='gold'>+20</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod + 20"); }
// ----------------------------------------------------------------- haunted helm
if ($row['equipHead'] =="haunted helm"){
echo " <span>( <i class='blue'>+5</i>, <i class='gold'>+10</i> )</span>"; 
$results = $link->query("UPDATE $user SET defmod = defmod + 10");
$results = $link->query("UPDATE $user SET magmod = magmod + 5");  }

// ----------------------------------------------------------------- Bandit Hood
if ($row['equipHead'] =="bandit hood"){
echo " <span>( <i class='green'>+8</i>, <i class='gold'>+8</i> )</span>"; 
$results = $link->query("UPDATE $user SET dexmod = dexmod + 8");
$results = $link->query("UPDATE $user SET defmod = defmod + 8");
}
// ----------------------------------------------------------------- Calamari Cap
if ($row['equipHead'] =="calamari cap"){
echo " <span>( <i class='cyan'>+4</i> all stats )</span>"; 
$results = $link->query("UPDATE $user SET strmod = strmod + 4"); 
$results = $link->query("UPDATE $user SET dexmod = dexmod + 4");
$results = $link->query("UPDATE $user SET magmod = magmod + 4");
$results = $link->query("UPDATE $user SET defmod = defmod + 4");
}
// ----------------------------------------------------------------- X
if ($row['equipHead'] =="heavy helmet"){
echo " <span>( <i class='red'>+10</i>, <i class='gold'>+10</i> )</span>"; 
$results = $link->query("UPDATE $user SET strmod = strmod + 10");
$results = $link->query("UPDATE $user SET defmod = defmod + 10");
}
// ----------------------------------------------------------------- X
if ($row['equipHead'] =="kettle helm"){
echo " <span>( <i class='gold'>+65</i> )</span>"; 
$results = $link->query("UPDATE $user SET defmod = defmod + 65");
}
// ----------------------------------------------------------------- X
if ($row['equipHead'] =="perfect helmet"){
echo " <span>( <i class='cyan'>+8</i> all stats )</span>"; 
$results = $link->query("UPDATE $user SET strmod = strmod + 8"); 
$results = $link->query("UPDATE $user SET dexmod = dexmod + 8");
$results = $link->query("UPDATE $user SET magmod = magmod + 8");
$results = $link->query("UPDATE $user SET defmod = defmod + 8");
}

// ----------------------------------------------------------------- silver helmet
if ($row['equipHead'] =="silver helmet"){
echo " <span>( <i class='gold'>+40</i>, <i class='blue'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod + 40");
$results = $link->query("UPDATE $user SET magmod = magmod + 1"); }
// ----------------------------------------------------------------- X
if ($row['equipHead'] =="steel hood"){
echo " <span>( <i class='red'>+7</i>, <i class='green'>+7</i>, <i class='gold'>+7</i> )</span>"; 
$results = $link->query("UPDATE $user SET strmod = strmod + 7"); 
$results = $link->query("UPDATE $user SET dexmod = dexmod + 7");
$results = $link->query("UPDATE $user SET defmod = defmod + 7");}
// ----------------------------------------------------------------- steel helmet
if ($row['equipHead'] =="steel helmet"){
echo " <span>( <i class='gold'>+45</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod + 45"); }

// ----------------------------------------------------------------- steel master helm
if ($row['equipHead'] =="steel master helm"){
echo " <span>( <i class='red'>+15</i>, <i class='green'>+15</i>, <i class='gold'>+60</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 15"); 
$results = $link->query("UPDATE $user SET dexmod = dexmod + 15");
$results = $link->query("UPDATE $user SET defmod = defmod + 60"); }
// ----------------------------------------------------------------- troll crown
if ($row['equipHead'] =="troll crown"){
echo " <span>( <i class='red'>+12</i>, <i class='blue'>+6</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 12");
$results = $link->query("UPDATE $user SET magmod = magmod + 6"); }
// ----------------------------------------------------------------- ranger hood
if ($row['equipHead'] =="ranger hood"){
echo " <span>( <i class='green'>+25</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 25"); }


/*
20k silver helmet ( +40 def, +1 mag )		// buy
10k steel hood ( +7 str +7 dex, +7 def ) 		// winged demon
10k steel helmet ( +45 def )			// mountain giant
50k steel master helm ( +15 str, +15 dex, +60 def ) // steel warrior quest
30k troll crown ( +12 str, +6 mag )		// troll king
30k ranger hood ( +25 dex ) */
	



?>