<?php

// -------------------------------------------------------------------------------------------------------------- NECKLACE

// ----------------------------------------------------------------- wooden necklace
if ($row['equipNeck'] =="wooden necklace"){ echo " <span>( <i class='gold'>+5</i> )</span>";
	$results = $link->query("UPDATE $user SET defmod = defmod + 5");} 
// ----------------------------------------------------------------- bone necklace
if ($row['equipNeck'] =="bone necklace"){ echo " <span>( <i class='gold'>+10</i> )</span>";
	$results = $link->query("UPDATE $user SET defmod = defmod + 10");}
// ----------------------------------------------------------------- stone necklace
if ($row['equipNeck'] =="stone necklace"){ echo " <span>( <i class='gold'>+15</i> )</span>";
	$results = $link->query("UPDATE $user SET defmod = defmod + 15");}	 
// ----------------------------------------------------------------- blue pendant
if ($row['equipNeck'] =="blue pendant"){ echo " <span>( <i class='red'>+10</i>, <i class='blue'>+5</i> )</span>";
	$results = $link->query("UPDATE $user SET strmod = strmod + 10");
	$results = $link->query("UPDATE $user SET magmod = magmod + 5");}
// ----------------------------------------------------------------- red talisman
if ($row['equipNeck'] =="red talisman"){ echo " <span>( <i class='red'>+10</i>, <i class='gold'>+10</i> )</span>";
	$results = $link->query("UPDATE $user SET strmod = strmod + 10");
	$results = $link->query("UPDATE $user SET defmod = defmod + 10");}
// ----------------------------------------------------------------- green pendant
if ($row['equipNeck'] =="green pendant"){ echo " <span>( <i class='green'>+10</i> )</span>";
	$results = $link->query("UPDATE $user SET dexmod = dexmod + 10");}
// ----------------------------------------------------------------- coral necklace
if ($row['equipNeck'] =="coral necklace"){ echo " <span>( <i class='blue'>+10</i> )</span>";
	$results = $link->query("UPDATE $user SET magmod = magmod + 10");}	 
// ----------------------------------------------------------------- vapor necklace
if ($row['equipNeck'] =="vapor necklace"){ echo " <span>( <i class='cyan'>+10</i> all stats )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 10");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 10");
$results = $link->query("UPDATE $user SET magmod = magmod + 10");
$results = $link->query("UPDATE $user SET defmod = defmod + 10");}	

// ----------------------------------------------------------------- silver necklace
if ($row['equipNeck'] =="silver necklace"){ echo " <span>( <i class='cyan'>+20</i> all stats )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 20");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 20");
$results = $link->query("UPDATE $user SET magmod = magmod + 20");
$results = $link->query("UPDATE $user SET defmod = defmod + 20");}	
// ----------------------------------------------------------------- iron necklace
if ($row['equipNeck'] =="iron necklace"){ echo " <span>( <i class='gold'>+25</i> )</span>";
	$results = $link->query("UPDATE $user SET defmod = defmod + 25");}	 		


// ----------------------------------------------------------------- shaman necklace
if ($row['equipNeck'] =="shaman necklace"){ echo " <span>( <i class='blue'>+5</i>, <i class='blue'>+5</i> mp regen )</span>";
	$results = $link->query("UPDATE $user SET magmod = magmod + 5");}
//	REGEN LINE

// ----------------------------------------------------------------- warrior pendant
if ($row['equipNeck'] =="warrior pendant"){ echo " <span>( <i class='red'>+25</i>, <i class='gold'>+25</i> )</span>";
	$results = $link->query("UPDATE $user SET strmod = strmod + 25");
	$results = $link->query("UPDATE $user SET defmod = defmod + 25");}

?>