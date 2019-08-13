<?php
// ------------------- BUFF ACC!!!!

// ------------------------------------------------ NOT IN USE ANYMORE?


// -------------------------------------------------------------------------------------------------------------- RING 1
// -------------------------------------------------------------------------------------------------------------- RING 1
// -------------------------------------------------------------------------------------------------------------- RING 1
// -------------------------------------------------------------------------------------------------------------- RING 1
// -------------------------------------------------------------------------------------------------------------- RING 1

echo 'BUFF ACC!!!!!';


// ----------------------------------------------------------------- ring of str 1
if ($row['equipRing1'] =="ring of strength"){ echo " <span>( +1 str )<span>";
$results = $link->query("UPDATE $user SET strmod = strmod +1");}
// ----------------------------------------------------------------- ring of dex 1
if ($row['equipRing1'] =="ring of dexterity"){ echo " <span>( +1 dex )<span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +1");}
// ----------------------------------------------------------------- ring of mag 1
if ($row['equipRing1'] =="ring of magic"){ echo " <span>( +1 mag )<span>";
$results = $link->query("UPDATE $user SET magmod = magmod +1");}
// ----------------------------------------------------------------- ring of def 1
if ($row['equipRing1'] =="ring of defense"){ echo " <span>( +1 def )<span>";
$results = $link->query("UPDATE $user SET defmod = defmod +1");}


// ----------------------------------------------------------------- ring of str 2
if ($row['equipRing1'] =="ring of strength II"){ echo " <span>( +2 str )<span>";
$results = $link->query("UPDATE $user SET strmod = strmod +2");}
// ----------------------------------------------------------------- ring of dex 2
if ($row['equipRing1'] =="ring of dexterity II"){ echo " <span>( +2 dex )<span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +2");}
// ----------------------------------------------------------------- ring of mag 2
if ($row['equipRing1'] =="ring of magic II"){ echo " <span>( +2 mag )<span>";
$results = $link->query("UPDATE $user SET magmod = magmod +2");}
// ----------------------------------------------------------------- ring of def 2
if ($row['equipRing1'] =="ring of defense II"){ echo " <span>( +2 def )<span>";
$results = $link->query("UPDATE $user SET defmod = defmod +2");}

// ----------------------------------------------------------------- ring of str +3
if ($row['equipRing1'] =="ring of strength III"){ echo " <span>( +3 str )<span>";
$results = $link->query("UPDATE $user SET strmod = strmod +3");}
// ----------------------------------------------------------------- ring of dex +3
if ($row['equipRing1'] =="ring of dexterity III"){ echo " <span>( +3 dex )<span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +3");}
// ----------------------------------------------------------------- ring of mag +3
if ($row['equipRing1'] =="ring of magic III"){ echo " <span>( +3 mag )<span>";
$results = $link->query("UPDATE $user SET magmod = magmod +3");}
// ----------------------------------------------------------------- ring of def +3
if ($row['equipRing1'] =="ring of defense III"){ echo " <span>( +3 def )<span>";
$results = $link->query("UPDATE $user SET defmod = defmod +3");}


// ----------------------------------------------------------------- ring of str +4
if ($row['equipRing1'] =="ring of strength IV"){ echo " <span>( +4 str )<span>";
$results = $link->query("UPDATE $user SET strmod = strmod +4");}
// ----------------------------------------------------------------- ring of dex +4
if ($row['equipRing1'] =="ring of dexterity IV"){ echo " <span>( +4 dex )<span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +4");}
// ----------------------------------------------------------------- ring of mag +4
if ($row['equipRing1'] =="ring of magic IV"){ echo " <span>( +4 mag )<span>";
$results = $link->query("UPDATE $user SET magmod = magmod +4");}
// ----------------------------------------------------------------- ring of def +4
if ($row['equipRing1'] =="ring of defense IV"){ echo " <span>( +4 def )<span>";
$results = $link->query("UPDATE $user SET defmod = defmod +4");}


// ----------------------------------------------------------------- ring of str +5
if ($row['equipRing1'] =="ring of strength V"){ echo " <span>( +5 str )<span>";
$results = $link->query("UPDATE $user SET strmod = strmod +5");}
// ----------------------------------------------------------------- ring of dex +5
if ($row['equipRing1'] =="ring of dexterity V"){ echo " <span>( +5 dex )<span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +5");}
// ----------------------------------------------------------------- ring of mag +5
if ($row['equipRing1'] =="ring of magic V"){ echo " <span>( +5 mag )<span>";
$results = $link->query("UPDATE $user SET magmod = magmod +5");}
// ----------------------------------------------------------------- ring of def +5
if ($row['equipRing1'] =="ring of defense V"){ echo " <span>( +5 def )<span>";
$results = $link->query("UPDATE $user SET defmod = defmod +5");}



// ----------------------------------------------------------------- coyote ring +2 str, +2 dex, + 2 mag
if ($row['equipRing1'] =="coyote ring"){ echo " <span>( +2 str, +2 dex, + 2 mag )<span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2");
$results = $link->query("UPDATE $user SET magmod = magmod + 2");}
// ----------------------------------------------------------------- hunter ring +3 str, +3 dex
if ($row['equipRing1'] =="hunter ring"){ echo " <span>( +3 str, +3 dex )<span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 3");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 3");}
	

// -------------------------------------------------------------------------------------------------------------- RING 2
// -------------------------------------------------------------------------------------------------------------- RING 2
// -------------------------------------------------------------------------------------------------------------- RING 2
// -------------------------------------------------------------------------------------------------------------- RING 2
// -------------------------------------------------------------------------------------------------------------- RING 2
// -------------------------------------------------------------------------------------------------------------- RING 2
// -------------------------------------------------------------------------------------------------------------- RING 2
// -------------------------------------------------------------------------------------------------------------- RING 2
// -------------------------------------------------------------------------------------------------------------- RING 2



// ----------------------------------------------------------------- ring of health regen
if ($row['equipRing2'] =="ring of health regen"){ echo " <span>( +1 hp / click )<span>";
$_SESSION['healthregen']+=1;}
// ----------------------------------------------------------------- ring of mana regen
if ($row['equipRing2'] =="ring of mana regen"){ echo " <span>( +1 mp / click )<span>";
$_SESSION['manaregen']+=1;}
// ----------------------------------------------------------------- ring of health regen II
if ($row['equipRing2'] =="ring of health regen II"){ echo " <span>( +2 hp / click )<span>";
$_SESSION['healthregen']+=2;}
// ----------------------------------------------------------------- ring of mana regen II
if ($row['equipRing2'] =="ring of mana regen II"){ echo " <span>( +2 mp / click )<span>";
$_SESSION['manaregen']+=2;}
// ----------------------------------------------------------------- ring of health regen III
if ($row['equipRing2'] =="ring of health regen III"){ echo " <span>( +3 hp / click )<span>";
$_SESSION['healthregen']+=3;}
// ----------------------------------------------------------------- ring of mana regen III
if ($row['equipRing2'] =="ring of mana regen III"){ echo " <span>( +3 mp / click )<span>";
$_SESSION['manaregen']+=3;}
// ----------------------------------------------------------------- ring of health regen IV
if ($row['equipRing2'] =="ring of health regen IV"){ echo " <span>( +4 hp / click )<span>";
$_SESSION['healthregen']+=4;}
// ----------------------------------------------------------------- ring of mana regen IV
if ($row['equipRing2'] =="ring of mana regen IV"){ echo " <span>( +4 mp / click )<span>";
$_SESSION['manaregen']+=4;}
// ----------------------------------------------------------------- ring of health regen V
if ($row['equipRing2'] =="ring of health regen V"){ echo " <span>( +5 hp / click )<span>";
$_SESSION['healthregen']+=5;}
// ----------------------------------------------------------------- ring of mana regen V
if ($row['equipRing2'] =="ring of mana regen V"){ echo " <span>( +5 mp / click )<span>";
$_SESSION['manaregen']+=5;}


// -------------------------------------------------------------------------------------------------------------- NECK
// -------------------------------------------------------------------------------------------------------------- NECK
// -------------------------------------------------------------------------------------------------------------- NECK
// -------------------------------------------------------------------------------------------------------------- NECK
// -------------------------------------------------------------------------------------------------------------- NECK
// -------------------------------------------------------------------------------------------------------------- NECK
// -------------------------------------------------------------------------------------------------------------- NECK
// -------------------------------------------------------------------------------------------------------------- NECK

?>