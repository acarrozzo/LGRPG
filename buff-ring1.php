<?php

// -------------------------------------------------------------------------------------------------------------- RING 1

// ----------------------------------------------------------------- ring of str 1
if ($row['equipRing1'] =="ring of strength"){ echo " <span>( <i class='red'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +1");}
// ----------------------------------------------------------------- ring of dex 1
if ($row['equipRing1'] =="ring of dexterity"){ echo " <span>( <i class='green'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +1");}
// ----------------------------------------------------------------- ring of mag 1
if ($row['equipRing1'] =="ring of magic"){ echo " <span>( <i class='blue'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +1");}
// ----------------------------------------------------------------- ring of def 1
if ($row['equipRing1'] =="ring of defense"){ echo " <span>( <i class='gold'>+1</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +1");}


// ----------------------------------------------------------------- ring of str 2
if ($row['equipRing1'] =="ring of strength II"){ echo " <span>( <i class='red'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +2");}
// ----------------------------------------------------------------- ring of dex 2
if ($row['equipRing1'] =="ring of dexterity II"){ echo " <span>( <i class='green'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +2");}
// ----------------------------------------------------------------- ring of mag 2
if ($row['equipRing1'] =="ring of magic II"){ echo " <span>( <i class='blue'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +2");}
// ----------------------------------------------------------------- ring of def 2
if ($row['equipRing1'] =="ring of defense II"){ echo " <span>( <i class='gold'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +2");}

// ----------------------------------------------------------------- ring of str +3
if ($row['equipRing1'] =="ring of strength III"){ echo " <span>( <i class='red'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +3");}
// ----------------------------------------------------------------- ring of dex +3
if ($row['equipRing1'] =="ring of dexterity III"){ echo " <span>( <i class='green'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +3");}
// ----------------------------------------------------------------- ring of mag +3
if ($row['equipRing1'] =="ring of magic III"){ echo " <span>( <i class='blue'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +3");}
// ----------------------------------------------------------------- ring of def +3
if ($row['equipRing1'] =="ring of defense III"){ echo " <span>( <i class='gold'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +3");}


// ----------------------------------------------------------------- ring of str +4
if ($row['equipRing1'] =="ring of strength IV"){ echo " <span>( <i class='red'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +4");}
// ----------------------------------------------------------------- ring of dex +4
if ($row['equipRing1'] =="ring of dexterity IV"){ echo " <span>( <i class='green'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +4");}
// ----------------------------------------------------------------- ring of mag +4
if ($row['equipRing1'] =="ring of magic IV"){ echo " <span>( <i class='blue'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +4");}
// ----------------------------------------------------------------- ring of def +4
if ($row['equipRing1'] =="ring of defense IV"){ echo " <span>( <i class='gold'>+4</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +4");}


// ----------------------------------------------------------------- ring of str +5
if ($row['equipRing1'] =="ring of strength V"){ echo " <span>( <i class='red'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +5");}
// ----------------------------------------------------------------- ring of dex +5
if ($row['equipRing1'] =="ring of dexterity V"){ echo " <span>( <i class='green'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +5");}
// ----------------------------------------------------------------- ring of mag +5
if ($row['equipRing1'] =="ring of magic V"){ echo " <span>( <i class='blue'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +5");}
// ----------------------------------------------------------------- ring of def +5
if ($row['equipRing1'] =="ring of defense V"){ echo " <span>( <i class='gold'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +5");}



// ----------------------------------------------------------------- soldier's ring +3 str, +3 dex
if ($row['equipRing1'] =="soldier's ring"){ echo " <span>( <i class='red'>+2</i>, <i class='gold'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2");
$results = $link->query("UPDATE $user SET defmod = defmod + 2");}
// ----------------------------------------------------------------- hunter ring +3 str, +3 dex
if ($row['equipRing1'] =="hunter ring"){ echo " <span>( <i class='red'>+3</i>, <i class='green'>+3</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 3");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 3");}
// ----------------------------------------------------------------- coyote ring +2 str, +2 dex, + 2 mag
if ($row['equipRing1'] =="coyote ring"){ echo " <span>( <i class='red'>+2</i>, <i class='green'>+2</i>, <i class='blue'>+2</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 2");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 2");
$results = $link->query("UPDATE $user SET magmod = magmod + 2");}



// ----------------------------------------------------------------- red wizard ring
if ($row['equipRing1'] =="red wizard ring"){ echo " <span>( <i class='blue'>+5</i>, <i class='red'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod + 5");
$results = $link->query("UPDATE $user SET strmod = strmod + 5");}
// ----------------------------------------------------------------- green wizard ring
if ($row['equipRing1'] =="green wizard ring"){ echo " <span>( <i class='blue'>+5</i>, <i class='green'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod + 5");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 5");}
// ----------------------------------------------------------------- yellow wizard ring
if ($row['equipRing1'] =="yellow wizard ring"){ echo " <span>( <i class='blue'>+5</i>, <i class='gold'>+5</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod + 5");
$results = $link->query("UPDATE $user SET defmod = defmod + 5");}



// ----------------------------------------------------------------- ring of str +6
if ($row['equipRing1'] =="ring of strength VI"){ echo " <span>( <i class='red'>+6</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +6");}
// ----------------------------------------------------------------- ring of dex +6
if ($row['equipRing1'] =="ring of dexterity VI"){ echo " <span>( <i class='green'>+6</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +6");}
// ----------------------------------------------------------------- ring of mag +6
if ($row['equipRing1'] =="ring of magic VI"){ echo " <span>( <i class='blue'>+6</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +6");}
// ----------------------------------------------------------------- ring of def +6
if ($row['equipRing1'] =="ring of defense VI"){ echo " <span>( <i class='gold'>+6</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +6");}

// ----------------------------------------------------------------- ring of str +7
if ($row['equipRing1'] =="ring of strength VII"){ echo " <span>( <i class='red'>+7</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +7");}
// ----------------------------------------------------------------- ring of dex +7
if ($row['equipRing1'] =="ring of dexterity VII"){ echo " <span>( <i class='green'>+7</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +7");}
// ----------------------------------------------------------------- ring of mag +7
if ($row['equipRing1'] =="ring of magic VII"){ echo " <span>( <i class='blue'>+7</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +7");}
// ----------------------------------------------------------------- ring of def +7
if ($row['equipRing1'] =="ring of defense VII"){ echo " <span>( <i class='gold'>+7</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +7");}

// ----------------------------------------------------------------- ring of str +8
if ($row['equipRing1'] =="ring of strength VIII"){ echo " <span>( <i class='red'>+8</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +8");}
// ----------------------------------------------------------------- ring of dex +8
if ($row['equipRing1'] =="ring of dexterity VIII"){ echo " <span>( <i class='green'>+8</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +8");}
// ----------------------------------------------------------------- ring of mag +8
if ($row['equipRing1'] =="ring of magic VIII"){ echo " <span>( <i class='blue'>+8</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +8");}
// ----------------------------------------------------------------- ring of def +8
if ($row['equipRing1'] =="ring of defense VIII"){ echo " <span>( <i class='gold'>+8</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +8");}

// ----------------------------------------------------------------- ring of str +9
if ($row['equipRing1'] =="ring of strength IX"){ echo " <span>( <i class='red'>+9</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +9");}
// ----------------------------------------------------------------- ring of dex +9
if ($row['equipRing1'] =="ring of dexterity IX"){ echo " <span>( <i class='green'>+9</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +9");}
// ----------------------------------------------------------------- ring of mag +9
if ($row['equipRing1'] =="ring of magic IX"){ echo " <span>( <i class='blue'>+9</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +9");}
// ----------------------------------------------------------------- ring of def +9
if ($row['equipRing1'] =="ring of defense IX"){ echo " <span>( <i class='gold'>+9</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +9");}

// ----------------------------------------------------------------- ring of str +10
if ($row['equipRing1'] =="ring of strength X"){ echo " <span>( <i class='red'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod +10");}
// ----------------------------------------------------------------- ring of dex +10
if ($row['equipRing1'] =="ring of dexterity X"){ echo " <span>( <i class='green'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET dexmod = dexmod +10");}
// ----------------------------------------------------------------- ring of mag +10
if ($row['equipRing1'] =="ring of magic X"){ echo " <span>( <i class='blue'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET magmod = magmod +10");}
// ----------------------------------------------------------------- ring of def +10
if ($row['equipRing1'] =="ring of defense X"){ echo " <span>( <i class='gold'>+10</i> )</span>";
$results = $link->query("UPDATE $user SET defmod = defmod +10");}




	
// ----------------------------------------------------------------- silver ring
if ($row['equipRing1'] =="silver ring"){ echo " <span>( <i class='cyan'>+10</i> all stats )</span>";
$results = $link->query("UPDATE $user SET strmod = strmod + 10");
$results = $link->query("UPDATE $user SET dexmod = dexmod + 10");
$results = $link->query("UPDATE $user SET magmod = magmod + 10");
$results = $link->query("UPDATE $user SET defmod = defmod + 10");}
?>