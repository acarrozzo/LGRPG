<?php
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 
$query = "UPDATE $user SET strmod = str"; mysqli_query($link,$query);
$query = "UPDATE $user SET defmod = def"; mysqli_query($link,$query);
$query = "UPDATE $user SET dexmod = dex"; mysqli_query($link,$query); 
$query = "UPDATE $user SET magmod = mag"; mysqli_query($link,$query); 


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx FILE NOT IN USE ANYMORE xxx
// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx 


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ONE HANDED WEAPONS 

// ----------------------------------------------------------------- dagger buff + 1 STR
if ($row['equipR'] =="dagger"){ echo "BUFF: dagger + 1 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 1"); }
// ----------------------------------------------------------------- short sword buff + 2 STR, + 2 DEF
if ($row['equipR'] =="short sword"){ echo "BUFF: short sword + 2 str, + 2 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2");
$results = $link->query("UPDATE $user SET defmod = defmod + 2"); }
// ----------------------------------------------------------------- training sword buff + 3 STR
if ($row['equipR'] =="training sword"){ echo "BUFF: training sword + 3 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 3"); }
// ----------------------------------------------------------------- broad sword buff + 3 STR, + 2 DEF
if ($row['equipR'] =="broad sword"){ echo "BUFF: broad sword + 3 str, + 2 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 3"); 
$results = $link->query("UPDATE $user SET defmod = defmod + 2"); }
// ----------------------------------------------------------------- mace buff + 3 STR, + 1 MAG
if ($row['equipR'] =="mace"){ echo "BUFF: mace + 3 str, +1 mag<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 3"); 
$results = $link->query("UPDATE $user SET magmod = magmod + 1"); }
// ----------------------------------------------------------------- club buff + 5 STR, -2 DEF
if ($row['equipR'] =="club"){ echo "BUFF: club + 5 str, -2 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 5"); 
$results = $link->query("UPDATE $user SET defmod = defmod - 2"); }
// ----------------------------------------------------------------- long sword buff + 4 STR
if ($row['equipR'] =="long sword"){ echo "BUFF: long sword + 4 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 4"); }
// ----------------------------------------------------------------- flail buff + 5 STR + 3 DEF
if ($row['equipR'] =="flail"){ echo "BUFF: flail + 5 str, + 3 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 5");
$results = $link->query("UPDATE $user SET defmod = defmod + 3"); }
// ----------------------------------------------------------------- morning star buff + 5 STR + 1 MAG
if ($row['equipR'] =="morning star"){ echo "BUFF: morning star + 5 str, +1 mag<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 5");
$results = $link->query("UPDATE $user SET magmod = magmod + 1"); }
// ----------------------------------------------------------------- samurai sword buff + 6 STR
if ($row['equipR'] =="samurai sword"){ echo "BUFF: samurai sword + 6 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 6"); }
// ----------------------------------------------------------------- gladius buff + 7 STR, + 2 DEF, + 2 MAG
if ($row['equipR'] =="gladius"){ echo "BUFF: gladius +7 str, +2 def, +2 mag<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 7");
$results = $link->query("UPDATE $user SET defmod = defmod + 2");
$results = $link->query("UPDATE $user SET magmod = magmod + 2"); }
// ----------------------------------------------------------------- basic staff buff + 3 MAG
if ($row['equipR'] =="basic staff"){ echo "BUFF: basic staff + 3 mag<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 3"); }
// ----------------------------------------------------------------- wooden staff buff + 5 MAG, + 1 STR
if ($row['equipR'] =="wooden staff"){ echo "BUFF: wooden staff + 5 mag, + 1 str<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 5"); 
$results = $link->query("UPDATE $user SET strmod = strmod + 1"); }
// ----------------------------------------------------------------- master blade buff + 200 STR, + 100 DEF
if ($row['equipR'] =="master blade"){ echo "BUFF: masterblade + 200 str, + 100 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 200");
$results = $link->query("UPDATE $user SET defmod = defmod + 100");
}

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx TWO HANDED WEAPONS

// ----------------------------------------------------------------- training 2h sword buff + 6 STR
if ($row['equipR'] =="training 2h sword"){ echo "BUFF: training 2h sword + 6 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 6"); }
// ----------------------------------------------------------------- bo buff + 7 STR
if ($row['equipR'] =="bo"){ echo "BUFF: bo + 7 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 7"); }
// ----------------------------------------------------------------- battle axe buff + 8 STR - 2 DEF
if ($row['equipR'] =="battle axe"){ echo "BUFF: battle axe + 8 str, -2 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 8");
$results = $link->query("UPDATE $user SET defmod = defmod - 2"); }
// ----------------------------------------------------------------- warhammer buff + 10 STR - 5 DEF
if ($row['equipR'] =="warhammer"){ echo "BUFF: warhammer + 10 str, -5 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 10");
$results = $link->query("UPDATE $user SET defmod = defmod - 5"); }
// ----------------------------------------------------------------- claymore buff + 11 STR
if ($row['equipR'] =="claymore"){ echo "BUFF: claymore + 11 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 11"); }
// ----------------------------------------------------------------- bo staff buff + 7 STR + 2 MAG
if ($row['equipR'] =="bo staff"){ echo "BUFF: bo staff +7 str, +2 mag<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 7");
$results = $link->query("UPDATE $user SET magmod = magmod + 2"); }
// ----------------------------------------------------------------- battle staff buff + 4 MAG + 4 STR
if ($row['equipR'] =="battle staff"){ echo "BUFF: battle staff + 4 mag, +4 str<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 4");
$results = $link->query("UPDATE $user SET strmod = strmod + 4"); }




// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx PROJECTILE WEAPONS

// ----------------------------------------------------------------- boomerang buff +1 DEX 
if ($row['equipR'] =="boomerang"){
echo "BUFF: boomerang + 1 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 1"); }
// ----------------------------------------------------------------- wooden bow buff +6 DEX 
if ($row['equipR'] =="wooden bow"){
echo "BUFF: wooden bow + 6 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 6"); }
// ----------------------------------------------------------------- crossbow buff +8 DEX, -2 DEF 
if ($row['equipR'] =="crossbow"){
echo "BUFF: crossbow + 8 dex, - 2 def<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 8");
$results = $link->query("UPDATE $user SET defmod = defmod - 2"); }

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx SHIELDS

// ----------------------------------------------------------------- training shield buff + 3 DEF
if ($row['equipL'] =="training shield"){
echo "BUFF: training shield + 3 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 3"); }
// ----------------------------------------------------------------- basic shield buff + 5 DEF
if ($row['equipL'] =="basic shield"){
echo "BUFF: basic shield + 5 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 5"); }
// ----------------------------------------------------------------- kite shield buff + 7 DEF
if ($row['equipL'] =="kite shield"){
echo "BUFF: kite shield + 7 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 7"); }
// ----------------------------------------------------------------- buckler buff + 5 DEF, + 2 STR
if ($row['equipL'] =="buckler"){
echo "BUFF: buckler + 5 def, + 2 str<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 5");
$results = $link->query("UPDATE $user SET strmod = strmod + 2"); }
// ----------------------------------------------------------------- wooden shield buff + 10 DEF
if ($row['equipL'] =="wooden shield"){
echo "BUFF: wooden shield + 10 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 10"); }

// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx HEAD SLOT

// ----------------------------------------------------------------- training helmet buff + 2 DEF
if ($row['equipHead'] =="training helmet"){
echo "BUFF: training helmet + 2 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 2"); }
// ----------------------------------------------------------------- basic helmet buff + 3 DEF
if ($row['equipHead'] =="basic helmet"){
echo "BUFF: basic helmet + 3 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 3"); }
// ----------------------------------------------------------------- basic hood + 1 STR + 1 DEF
if ($row['equipHead'] =="basic hood"){
echo "BUFF: basic hood + 1 str<br>";
echo "BUFF: basic hood + 1 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 1");
$results = $link->query("UPDATE $user SET defmod = defmod + 1"); }
// ----------------------------------------------------------------- red hood + 2 STR
if ($row['equipHead'] =="red hood"){
echo "BUFF: red hood + 2 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2"); }
// ----------------------------------------------------------------- green hood + 2 DEX
if ($row['equipHead'] =="green hood"){
echo "BUFF: green hood + 2 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); }
// ----------------------------------------------------------------- blue hood + 2 MAG
if ($row['equipHead'] =="blue hood"){
echo "BUFF: blue hood + 2 mag<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 2"); }
// ----------------------------------------------------------------- leather hood + 2 DEX, + 2 DEF
if ($row['equipHead'] =="leather hood"){
echo "BUFF: leather hood + 2 dex, + 2 def<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2");
$results = $link->query("UPDATE $user SET defmod = defmod + 2"); }



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ARMOR SLOT

// ----------------------------------------------------------------- training armor buff + 3 DEF
if ($row['equipBody'] =="training armor"){
echo "BUFF: training armor + 3 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 3"); }
// ----------------------------------------------------------------- training armor pro buff  + 5 DEF, + 2 STR, + 2 DEX
if ($row['equipBody'] =="training armor pro"){
echo "BUFF: training armor pro + 5 def, + 2 str, + 2 dex<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 5");
$results = $link->query("UPDATE $user SET strmod = strmod + 2");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); }
// ----------------------------------------------------------------- padded armor buff + 7 DEF
if ($row['equipBody'] =="padded armor"){
echo "BUFF: padded armor +7 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 7"); }
// ----------------------------------------------------------------- pajamas buff + 1 ALL STATS
if ($row['equipBody'] =="pajamas"){
echo "BUFF: pajamas +1 all stats<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 1");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 1");
$results = $link->query("UPDATE $user SET magmod = magmod + 1");
$results = $link->query("UPDATE $user SET defmod = defmod + 1"); }
// ----------------------------------------------------------------- green cloak buff + 3 DEX + 2 DEF
if ($row['equipBody'] =="green cloak"){
echo "BUFF: green cloak +3 dex, +2 def<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 3");
$results = $link->query("UPDATE $user SET defmod = defmod + 2"); }
// ----------------------------------------------------------------- black robe buff + 3 MAG + 2 DEF
if ($row['equipBody'] =="black robe"){
echo "BUFF: black robe +3 mag, +2 def<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 3");
$results = $link->query("UPDATE $user SET defmod = defmod + 2"); }
// ----------------------------------------------------------------- gray robe buff + 4 MAG
if ($row['equipBody'] =="gray robe"){
echo "BUFF: gray robe +4 mag<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 4"); }
// ----------------------------------------------------------------- leather vest buff + 5 DEX
if ($row['equipBody'] =="leather vest"){
echo "BUFF: leather vest +5 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 5"); }
// ----------------------------------------------------------------- leather armor buff + 8 DEF + 3 DEX
if ($row['equipBody'] =="leather armor"){
echo "BUFF: leather armor +8 def, +3 dex<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 8");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 3"); }





// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx HAND SLOT

// ----------------------------------------------------------------- training gloves buff + 1 DEX
if ($row['equipHands'] =="training gloves"){
echo "BUFF: training gloves +1 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 1"); } 
// ----------------------------------------------------------------- wrist bracers buff + 2 STR
if ($row['equipHands'] =="wrist bracers"){
echo "BUFF: wrist bracers +2 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2"); } 
// ----------------------------------------------------------------- black gloves buff + 1 STR, + 2 DEF
if ($row['equipHands'] =="black gloves"){
echo "BUFF: black gloves +1 str, +2 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 1");
$results = $link->query("UPDATE $user SET defmod = defmod + 2"); } 
// ----------------------------------------------------------------- green gloves buff + 2 DEX
if ($row['equipHands'] =="green gloves"){
echo "BUFF: green gloves +2 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); } 
// ----------------------------------------------------------------- gray gloves buff + 2 MAG, + 1 DEX
if ($row['equipHands'] =="gray gloves"){
echo "BUFF: gray gloves +2 mag, +1 dex<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 2");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 1"); } 
// ----------------------------------------------------------------- leather gloves buff + 5 DEX
if ($row['equipHands'] =="leather gloves"){
echo "BUFF: leather gloves +5 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 5"); } 



// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx FOOT SLOT

// ----------------------------------------------------------------- training boots buff + 1 DEF
if ($row['equipFeet'] =="training boots"){
echo "BUFF: training boots +1 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 1"); }
// ----------------------------------------------------------------- green boots buff + 2 DEX
if ($row['equipFeet'] =="green boots"){
echo "BUFF: green boots +2 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); }
// ----------------------------------------------------------------- black boots buff + 2 STR, + 1 DEF
if ($row['equipFeet'] =="black boots"){
echo "BUFF: black boots +2 str, +1 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2");
$results = $link->query("UPDATE $user SET defmod = defmod + 1"); }
// ----------------------------------------------------------------- gray boots buff + 2 MAG + 1 DEF
if ($row['equipFeet'] =="gray boots"){
echo "BUFF: gray boots +2 mag, +1 def<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 2");
$results = $link->query("UPDATE $user SET defmod = defmod + 1"); }
// ----------------------------------------------------------------- slippers buff + 1 ALL STATS
if ($row['equipFeet'] =="slippers"){
echo "BUFF: slippers + 1 all stats<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 1");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 1");
$results = $link->query("UPDATE $user SET magmod = magmod + 1");
$results = $link->query("UPDATE $user SET defmod = defmod + 1"); }
// ----------------------------------------------------------------- leather boots buff + 2 DEX + 2 DEF
if ($row['equipFeet'] =="leather boots"){
echo "BUFF: leather boots +2 def, +2 dex<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 2");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2"); }




// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx ACCESSORIES
// ----------------------------------------------------------------- ring of str + 1 STR
if ($row['equipRing1'] =="ring of strength"){
echo "BUFF: ring of strength + 1 str<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 1");
}
// ----------------------------------------------------------------- ring of dex + 1 dex
if ($row['equipRing1'] =="ring of dexterity"){
echo "BUFF: ring of dexterity + 1 dex<br>";
$results = $link->query("UPDATE $user SET dexmod = dexmod + 1");
}
// ----------------------------------------------------------------- ring of mag + 1 mag
if ($row['equipRing1'] =="ring of magic"){
echo "BUFF: ring of magic + 1 mag<br>";
$results = $link->query("UPDATE $user SET magmod = magmod + 1");
}
// ----------------------------------------------------------------- ring of def + 1 def
if ($row['equipRing1'] =="ring of defense"){
echo "BUFF: ring of defense + 1 def<br>";
$results = $link->query("UPDATE $user SET defmod = defmod + 1");
}


// xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx TOOLS BUFF

// ----------------------------------------------------------------- hatchet buff + 3 STR, +3 DEF
if ($row['equipR'] =="hatchet"){ echo "BUFF: hatchet + 3 str, + 1 def<br>";
$results = $link->query("UPDATE $user SET strmod = strmod + 3"); 
$results = $link->query("UPDATE $user SET defmod = defmod + 1"); }


	


}
?>