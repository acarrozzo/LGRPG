<?php
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $right = $row['equipR'];
    $left = $row['equipL'];
    $mount = $row['equipMount'];
    $room = $row['room'];

/*
<form id="mainForm" method="post" action="" name="formInput">
<button type="submit" name="input1" class="redBG" value="max str">Max STR</button>
<button type="submit" name="input1" class="greenBG" value="max dex">Max DEX</button>
<button type="submit" name="input1" class="blueBG" value="max mag">Max MAG</button>
<button type="submit" name="input1" class="goldBG" value="max def">Max DEF</button>
</form>
*/

  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
  // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX STR
  if ($input=="max str") {
    // STR - hands
    if  ($row['gargantuanwarhammer'] > 0) {$equipR = 'gargantuan warhammer';}
    else if  ($row['humongousbattleaxe'] > 0) {$equipR = 'humongous battleaxe';}
    else if  ($row['fortifiedfauchard'] > 0) {$equipR = 'fortified fauchard';} // 120
    else if  ($row['heavyhammer'] > 0) {$equipR = 'heavy hammer';}
    else if  ($row['bardiche'] > 0) {$equipR = 'bardiche';}
    else if  ($row['mithril2hsword'] > 0) {$equipR = 'mithril 2h sword';}
    else if  ($row['heavykatana'] > 0) {$equipR = 'heavy katana';}
    else if  ($row['oakwarhammer'] > 0) {$equipR = 'oak warhammer';}
    else if  ($row['blessedspear'] > 0) {$equipR = 'blessed spear';}
    else if  ($row['glaive'] > 0) {$equipR = 'glaive';}
    else if  ($row['mithrilnunchaku'] > 0) {$equipR = 'mithril nunchaku';}
    else if  ($row['steel2hsword'] > 0) {$equipR = 'steel 2h sword';}
    else if  ($row['greataxe'] > 0) {$equipR = 'great axe';}
    else if  ($row['silver2hsword'] > 0) {$equipR = 'silver 2h sword';}
    else if  ($row['mithrilbattlestaff'] > 0) {$equipR = 'mithril battle staff';}
    else if  ($row['trident'] > 0) {$equipR = 'trident';}
    else if  ($row['jimbo'] > 0) {$equipR = 'jim bo';}
    else if  ($row['heavyspear'] > 0) {$equipR = 'heavy spear';}
    else if  ($row['steelnunchaku'] > 0) {$equipR = 'steel nunchaku';}
    else if  ($row['hammerheadhammer'] > 0) {$equipR = 'hammerhead hammer';}
    else if  ($row['bonecudgel'] > 0) {$equipR = 'bone cudgel';}
    else if  ($row['oakbattlestaff'] > 0) {$equipR = 'oak battle staff';}
    else if  ($row['ironnunchaku'] > 0) {$equipR = 'iron nunchaku';}
    else if  ($row['iron2hsword'] > 0) {$equipR = 'iron 2h sword';}
    else if  ($row['ironmaul'] > 0) {$equipR = 'iron maul';}
    else if  ($row['greatsword'] > 0) {$equipR = 'great sword';}
    else if  ($row['polearm'] > 0) {$equipR = 'polearm';}
    else if  ($row['brassknuckles'] > 0) {$equipR = 'brass knuckles';}
    else if  ($row['nunchaku'] > 0) {$equipR = 'nunchaku';}
    else if  ($row['claymore'] > 0) {$equipR = 'claymore';}
    else if  ($row['ironbattlestaff'] > 0) {$equipR = 'iron battle staff';}
    else if  ($row['warhammer'] > 0) {$equipR = 'warhammer';}
    else if  ($row['pike'] > 0) {$equipR = 'pike';}
    else if  ($row['battleaxe'] > 0) {$equipR = 'battle axe';}
    else if  ($row['dualtomahawk'] > 0) {$equipR = 'dual tomahawk';}
    else if  ($row['woodenbo'] > 0) {$equipR = 'wooden bo';}
    else if  ($row['bo'] > 0) {$equipR = 'bo';}
    else if  ($row['battlestaff'] > 0) {$equipR = 'battle staff';}
    else if  ($row['training2hsword'] > 0) {$equipR = 'training 2h sword';}
    else if  ($row['bostaff'] > 0) {$equipR = 'bo staff';}
    else {$equipR = 'fists';}
    // STR - head
    if  ($row['bansheemask'] > 0) {$equipHead = 'banshee mask';}
    else if  ($row['blackhood'] > 0) {$equipHead = 'black hood';}
    else if  ($row['earthhood'] > 0) {$equipHead = 'earth hood';}
    else if  ($row['steelmasterhelm'] > 0) {$equipHead = 'steel master helm';}
    else if  ($row['mithrilhood'] > 0) {$equipHead = 'mithril hood';}
    else if  ($row['trollcrown'] > 0) {$equipHead = 'troll crown';}
    else if  ($row['heavyhelmet'] > 0) {$equipHead = 'heavy helmet';}
    else if  ($row['barbarianhelmet'] > 0) {$equipHead = 'barbarian helmet';}
    else if  ($row['scorpionhood'] > 0) {$equipHead = 'scorpion hood';}
    else if  ($row['steelhood'] > 0) {$equipHead = 'steel hood';}
    else if  ($row['hornedhelmet'] > 0) {$equipHead = 'horned helmet';}
    else if  ($row['battlehelm'] > 0) {$equipHead = 'battle helm';}
    else if  ($row['ironhood'] > 0) {$equipHead = 'iron hood';}
    else if  ($row['leatherhelmet'] > 0) {$equipHead = 'leather helmet';}
    else if  ($row['redhood'] > 0) {$equipHead = 'red hood';}
    else if  ($row['basichood'] > 0) {$equipHead = 'basic hood';}
    else {$equipHead = '---';}
    // STR - body
    if  ($row['mithrilcape'] > 0) {$equipBody = 'mithril cape';}
    else if  ($row['blackcloak'] > 0) {$equipBody = 'black cloak';}
    else if  ($row['steelcape'] > 0) {$equipBody = 'steel cape';}
    else if  ($row['yeticloak'] > 0) {$equipBody = 'yeti cloak';}
    else if  ($row['silverpajamas'] > 0) {$equipBody = 'silver pajamas';}
    else if  ($row['ironcape'] > 0) {$equipBody = 'iron cape';}
    else if  ($row['blackcape'] > 0) {$equipBody = 'black cape';}
    else if  ($row['eartharmor'] > 0) {$equipBody = 'earth armor';}
    else if  ($row['sasquatchcloak'] > 0) {$equipBody = 'sasquatch cloak';}
    else if  ($row['championarmor'] > 0) {$equipBody = 'champion armor';}
    else if  ($row['turtleshell'] > 0) {$equipBody = 'turtle shell';}
    else if  ($row['leatherarmor'] > 0) {$equipBody = 'leather armor';}
    else if  ($row['blackrobe'] > 0) {$equipBody = 'black robe';}
    else if  ($row['pajamas'] > 0) {$equipBody = 'pajamas';}
    else if  ($row['trainingarmorpro'] > 0) {$equipBody = 'training armor pro';}
    else {$equipBody = '---';}
    // STR - hands
    if  ($row['ironknuckles'] > 0) {$equipHands = 'iron knuckles';}
    else if  ($row['mithrilgloves'] > 0) {$equipHands = 'mithril gloves';}
    else if  ($row['steelgloves'] > 0) {$equipHands = 'steel gloves';}
    else if  ($row['earthmittens'] > 0) {$equipHands = 'earth mittens';}
    else if  ($row['perfectgloves'] > 0) {$equipHands = 'perfect gloves';}
    else if  ($row['irongloves'] > 0) {$equipHands = 'iron gloves';}
    else if  ($row['trollgloves'] > 0) {$equipHands = 'troll gloves';}
    else if  ($row['huntergloves'] > 0) {$equipHands = 'hunter gloves';}
    else if  ($row['wristbracers'] > 0) {$equipHands = 'wrist bracers';}
    else if  ($row['blackgloves'] > 0) {$equipHands = 'black gloves';}
    else {$equipHands = '---';}
    // STR - feet
    if  ($row['crimsonmoccasins'] > 0) {$equipFeet = 'crimson moccasins';}
    else if  ($row['thunderboots'] > 0) {$equipFeet = 'thunder boots';}
    else if  ($row['silverslippers'] > 0) {$equipFeet = 'silver slippers';}
    else if  ($row['bigfootboots'] > 0) {$equipFeet = 'bigfoot boots';}
    else if  ($row['earthboots'] > 0) {$equipFeet = 'earth boots';}
    else if  ($row['mudboots'] > 0) {$equipFeet = 'mud boots';}
    else if  ($row['trollboots'] > 0) {$equipFeet = 'troll boots';}
    else if  ($row['redboots'] > 0) {$equipFeet = 'red boots';}
    else if  ($row['slippers'] > 0) {$equipFeet = 'slippers';}
    else if  ($row['blackboots'] > 0) {$equipFeet = 'black boots';}
    else {$equipFeet = '---';}
    // STR - ring1
    if  ($row['silverring'] > 0) {$equipRing1 = 'silver ring';}
    else if  ($row['ringofstrengthX'] > 0) {$equipRing1 = 'ring of strength X';}
    else if  ($row['ringofstrengthIX'] > 0) {$equipRing1 = 'ring of strength IX';}
    else if  ($row['ringofstrengthVII'] > 0) {$equipRing1 = 'ring of strength VII';}
    else if  ($row['ringofstrengthVI'] > 0) {$equipRing1 = 'ring of strength VI';}
    else if  ($row['ringofstrengthV'] > 0) {$equipRing1 = 'ring of strength V';}
    else if  ($row['ringofstrengthIV'] > 0) {$equipRing1 = 'ring of strength IV';}
    else if  ($row['ringofstrengthIII'] > 0) {$equipRing1 = 'ring of strength III';}
    else if  ($row['ringofstrengthII'] > 0) {$equipRing1 = 'ring of strength II';}
    else if  ($row['ringofstrength'] > 0) {$equipRing1 = 'ring of strength';}
    else {$equipRing1 = '---';}
    // STR - ring2
    if  ($row['ringofhealthregenX'] > 0) {$equipRing2 = 'ring of health regen X';}
    else if  ($row['ringofhealthregenIX'] > 0) {$equipRing2 = 'ring of health regen IX';}
    else if  ($row['ringofhealthregenVII'] > 0) {$equipRing2 = 'ring of health regen VII';}
    else if  ($row['ringofhealthregenVI'] > 0) {$equipRing2 = 'ring of health regen VI';}
    else if  ($row['ringofhealthregenV'] > 0) {$equipRing2 = 'ring of health regen V';}
    else if  ($row['ringofhealthregenIV'] > 0) {$equipRing2 = 'ring of health regen IV';}
    else if  ($row['ringofhealthregenIII'] > 0) {$equipRing2 = 'ring of health regen III';}
    else if  ($row['ringofhealthregenII'] > 0) {$equipRing2 = 'ring of health regen II';}
    else if  ($row['ringofhealthregenI'] > 0) {$equipRing2 = 'ring of health regen I';}
    else {$equipRing2 = '---';}
    // STR - necklace
    if  ($row['warriorpendant'] > 0) {$equipNeck = 'warrior pendant';}
    else if  ($row['silvernecklace'] > 0) {$equipNeck = 'silver necklace';}
    else if  ($row['vapornecklace'] > 0) {$equipNeck = 'vapor necklace';}
    else if  ($row['bluependant'] > 0) {$equipNeck = 'blue pendant';}
    else if  ($row['redtalisman'] > 0) {$equipNeck = 'red talisman';}
    else {$equipNeck = '---';}
    // STR - artifact
    if  ($row['onyxcross'] > 0) {$equipArtifact = 'onyx cross';}
    else if  ($row['luckybone'] > 0) {$equipArtifact = 'lucky bone';}
    else if  ($row['coralcoin'] > 0) {$equipArtifact = 'coral coin';}
    else if  ($row['pearlofwisdom'] > 0) {$equipArtifact = 'pearl of wisdom';}
    else {$equipArtifact = '---';}
    // STR - mount
    if  ($row['MOUNTdirewolf'] > 0) {$equipMount = 'dire wolf';}
    else if  ($row['MOUNTbluefalcon'] > 0) {$equipMount = 'blue falcon';}
    else if  ($row['MOUNTgreengriffin'] > 0) {$equipMount = 'green griffin';}
    else {$equipMount = '---';}


    echo $message = '<div class="menuAction">
    <h3 class="red">STR MAX EQUIP</h3>
    <p>You equip your <strong class="red">'.$equipR.'</strong></p>
    <p>You equip your <strong class="red">'.$equipHead.'</strong></p>
    <p>You equip your <strong class="red">'.$equipBody.'</strong></p>
    <p>You equip your <strong class="red">'.$equipHands.'</strong></p>
    <p>You equip your <strong class="red">'.$equipFeet.'</strong></p>
    <p>You equip your <strong class="red">'.$equipRing1.'</strong></p>
    <p>You equip your <strong class="red">'.$equipRing2.'</strong></p>
    <p>You equip your <strong class="red">'.$equipNeck.'</strong></p>
    <p>You equip your <strong class="red">'.$equipArtifact.'</strong></p>
    <p>You mount your <strong class="red">'.$equipMount.'</strong></p>
    <a href  class="btn purpleBG"  data-link="stats">STATS</a>
    <a href  class="btn greenBG"  data-link="inv">INV</a>
    </div>';
    include('update_feed.php'); // --- update feed
    $results = $link->query("UPDATE $user SET equipR = '$equipR'");
    $results = $link->query("UPDATE $user SET equipL = '$equipR'");
    $results = $link->query("UPDATE $user SET weapontype = 2");
    $results = $link->query("UPDATE $user SET equipHead = '$equipHead'");
    $results = $link->query("UPDATE $user SET equipBody = '$equipBody'");
    $results = $link->query("UPDATE $user SET equipHands = '$equipHands'");
    $results = $link->query("UPDATE $user SET equipFeet = '$equipFeet'");
    $results = $link->query("UPDATE $user SET equipRing1 = '$equipRing1'");
    $results = $link->query("UPDATE $user SET equipRing2 = '$equipRing2'");
    $results = $link->query("UPDATE $user SET equipNeck = '$equipNeck'");
    $results = $link->query("UPDATE $user SET equipArtifact = '$equipArtifact'");
    $results = $link->query("UPDATE $user SET equipMount = '$equipMount'");
  }







              // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
              // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
              // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX DEX
              if ($input=="max dex") {
                // DEX - hands
                if  ($row['chondrianbow'] > 0) {$equipR = 'chondrian bow';}
                else if  ($row['rangercrossbow'] > 0) {$equipR = 'ranger crossbow';}
                else if  ($row['galaxybow'] > 0) {$equipR = 'galaxy bow';}
                else if  ($row['blackcrossbow'] > 0) {$equipR = 'black crossbow';}
                else if  ($row['blackbow'] > 0) {$equipR = 'black bow';}
                else if  ($row['keeperscrossbow'] > 0) {$equipR = 'keepers crossbow';}
                else if  ($row['mithrilcrossbow'] > 0) {$equipR = 'mithril crossbow';}
                else if  ($row['blackboomerang'] > 0) {$equipR = 'black boomerang';}
                else if  ($row['mithrilbow'] > 0) {$equipR = 'mithril bow';}
                else if  ($row['rangerbow'] > 0) {$equipR = 'ranger bow';}
                else if  ($row['snowbow'] > 0) {$equipR = 'snow bow';}
                else if  ($row['steelcrossbow'] > 0) {$equipR = 'steel crossbow';}
                else if  ($row['silvercrossbow'] > 0) {$equipR = 'silver crossbow';}
                else if  ($row['mithrilchakram'] > 0) {$equipR = 'mithril chakram';}
                else if  ($row['mithrilboomerang'] > 0) {$equipR = 'mithril boomerang';}
                else if  ($row['compoundcrossbow'] > 0) {$equipR = 'compound crossbow';}
                else if  ($row['enchantedbow'] > 0) {$equipR = 'enchanted bow';}
                else if  ($row['handcrossbow'] > 0) {$equipR = 'hand crossbow';}
                else if  ($row['steelbow'] > 0) {$equipR = 'steel bow';}   //33
                else if  ($row['silverbow'] > 0) {$equipR = 'silver bow';}
                else if  ($row['ironcrossbow'] > 0) {$equipR = 'iron crossbow';}
                else if  ($row['steelchakram'] > 0) {$equipR = 'steel chakram';} //25
                else if  ($row['jimbow'] > 0) {$equipR = 'jim bow';}
                else if  ($row['steelboomerang'] > 0) {$equipR = 'steel boomerang';}
                else if  ($row['silverboomerang'] > 0) {$equipR = 'silver boomerang';}
                else if  ($row['ironbow'] > 0) {$equipR = 'iron bow';}
                else if  ($row['ironchakram'] > 0) {$equipR = 'iron chakram';}
                else if  ($row['crossbow'] > 0) {$equipR = 'crossbow';}
                else if  ($row['longbow'] > 0) {$equipR = 'long bow';}
                else if  ($row['ironboomerang'] > 0) {$equipR = 'iron boomerang';}
                else if  ($row['hunterbow'] > 0) {$equipR = 'hunter bow';}
                else if  ($row['harpoon'] > 0) {$equipR = 'har poon';}
                else if  ($row['woodenbow'] > 0) {$equipR = 'wooden bow';}
                else if  ($row['chakram'] > 0) {$equipR = 'chakram';}
                else if  ($row['boomerang'] > 0) {$equipR = 'boomerang';}
                else {$equipR = 'fists';}

                // DEX - head
                if  ($row['rangerhood'] > 0) {$equipHead = 'ranger hood';}
                else if  ($row['steelmasterhelm'] > 0) {$equipHead = 'steel master helm';}
                else if  ($row['mithrilhood'] > 0) {$equipHead = 'mithril hood';}
                else if  ($row['bandithood'] > 0) {$equipHead = 'bandit hood';}
                else if  ($row['steelhood'] > 0) {$equipHead = 'steel hood';}
                else if  ($row['calamaricap'] > 0) {$equipHead = 'calamari cap';}
                else if  ($row['leatherhood'] > 0) {$equipHead = 'leather hood';}
                else if  ($row['ironhood'] > 0) {$equipHead = 'iron hood';}
                else if  ($row['greenhood'] > 0) {$equipHead = 'green hood';}
                else if  ($row['basichood'] > 0) {$equipHead = 'basic hood';}
                else {$equipHead = '---';}

                // DEX - body
                if  ($row['rangercloak'] > 0) {$equipBody = 'ranger cloak';}
                else if  ($row['silverpajamas'] > 0) {$equipBody = 'silver pajamas';}
                else if  ($row['snowvest'] > 0) {$equipBody = 'snow vest';}
                else if  ($row['forestcloak'] > 0) {$equipBody = 'forest cloak';}
                else if  ($row['leathervest'] > 0) {$equipBody = 'leather vest';}
                else if  ($row['turtleshell'] > 0) {$equipBody = 'turtle shell';}
                else if  ($row['greencloak'] > 0) {$equipBody = 'green cloak';}
                else if  ($row['pajamas'] > 0) {$equipBody = 'pajamas';}
                else if  ($row['trainingarmorpro'] > 0) {$equipBody = 'training armor pro';}
                else {$equipBody = '---';}

                // DEX - hands
                if  ($row['rangergloves'] > 0) {$equipHands = 'ranger gloves';}
                else if  ($row['vambraces'] > 0) {$equipHands = 'vambraces';}
                else if  ($row['gatorgloves'] > 0) {$equipHands = 'gator gloves';}
                else if  ($row['silkbracers'] > 0) {$equipHands = 'silk bracers';}
                else if  ($row['banditgloves'] > 0) {$equipHands = 'bandit gloves';}
                else if  ($row['huntergloves'] > 0) {$equipHands = 'hunter gloves';}
                else if  ($row['leathergloves'] > 0) {$equipHands = 'leather gloves';}
                else if  ($row['greengloves'] > 0) {$equipHands = 'green gloves';}
                else if  ($row['traininggloves'] > 0) {$equipHands = 'training gloves';}
                else {$equipHands = '---';}

                // DEX - feet
                if  ($row['rangermoccasins'] > 0) {$equipFeet = 'ranger moccasins';}
                else if  ($row['rangerboots'] > 0) {$equipFeet = 'ranger boots';}
                else if  ($row['silverslippers'] > 0) {$equipFeet = 'silver slippers';}
                else if  ($row['banditboots'] > 0) {$equipFeet = 'bandit boots';}
                else if  ($row['leatherboots'] > 0) {$equipFeet = 'leather boots';}
                else if  ($row['greenboots'] > 0) {$equipFeet = 'green boots';}
                else if  ($row['slippers'] > 0) {$equipFeet = 'slippers';}
                else {$equipFeet = '---';}

                // DEX - ring1
                if  ($row['silverring'] > 0) {$equipRing1 = 'silver ring';}
                else if  ($row['ringofdexX'] > 0) {$equipRing1 = 'ring of dex X';}
                else if  ($row['ringofdexIX'] > 0) {$equipRing1 = 'ring of dex IX';}
                else if  ($row['ringofdexVII'] > 0) {$equipRing1 = 'ring of dex VII';}
                else if  ($row['ringofdexVI'] > 0) {$equipRing1 = 'ring of dex VI';}
                else if  ($row['ringofdexV'] > 0) {$equipRing1 = 'ring of dex V';}
                else if  ($row['ringofdexIV'] > 0) {$equipRing1 = 'ring of dex IV';}
                else if  ($row['ringofdexIII'] > 0) {$equipRing1 = 'ring of dex III';}
                else if  ($row['ringofdexII'] > 0) {$equipRing1 = 'ring of dex II';}
                else if  ($row['ringofdex'] > 0) {$equipRing1 = 'ring of dex';}
                else {$equipRing1 = '---';}

                // DEX - ring2
                if  ($row['ringofhealthregenX'] > 0) {$equipRing2 = 'ring of health regen X';}
                else if  ($row['ringofhealthregenIX'] > 0) {$equipRing2 = 'ring of health regen IX';}
                else if  ($row['ringofhealthregenVII'] > 0) {$equipRing2 = 'ring of health regen VII';}
                else if  ($row['ringofhealthregenVI'] > 0) {$equipRing2 = 'ring of health regen VI';}
                else if  ($row['ringofhealthregenV'] > 0) {$equipRing2 = 'ring of health regen V';}
                else if  ($row['ringofhealthregenIV'] > 0) {$equipRing2 = 'ring of health regen IV';}
                else if  ($row['ringofhealthregenIII'] > 0) {$equipRing2 = 'ring of health regen III';}
                else if  ($row['ringofhealthregenII'] > 0) {$equipRing2 = 'ring of health regen II';}
                else if  ($row['ringofhealthregenI'] > 0) {$equipRing2 = 'ring of health regen I';}
                else {$equipRing2 = '---';}

                // DEX - necklace
                if  ($row['owleyependant'] > 0) {$equipNeck = 'owl eye pendant';}
                else if  ($row['rangeramulet'] > 0) {$equipNeck = 'ranger amulet';}
                else if  ($row['silvernecklace'] > 0) {$equipNeck = 'silver necklace';}
                else if  ($row['vapornecklace'] > 0) {$equipNeck = 'vapor necklace';}
                else if  ($row['greenpendant'] > 0) {$equipNeck = 'green pendant';}
                else {$equipNeck = '---';}

                // DEX - artifact
                if  ($row['squidtooth'] > 0) {$equipArtifact = 'squid tooth';}
                else if  ($row['luckybone'] > 0) {$equipArtifact = 'lucky bone';}
                else if  ($row['coralcoin'] > 0) {$equipArtifact = 'coral coin';}
                else if  ($row['pearlofwisdom'] > 0) {$equipArtifact = 'pearl of wisdom';}
                else if  ($row['onyxcross'] > 0) {$equipArtifact = 'onyx cross';}
                else {$equipArtifact = '---';}

                // DEX - mount
                if  ($row['MOUNTgreengriffin'] > 0) {$equipMount = 'green griffin';}
                else if  ($row['MOUNTbluefalcon'] > 0) {$equipMount = 'blue falcon';}
                else if  ($row['MOUNTdirewolf'] > 0) {$equipMount = 'dire wolf';}
                else {$equipMount = '---';}

                  echo $message = '<div class="menuAction">
                  <h3 class="green">DEX MAX EQUIP</h3>
                  <p>You equip your <strong class="green">'.$equipR.'</strong></p>
                  <p>You equip your <strong class="green">'.$equipHead.'</strong></p>
                  <p>You equip your <strong class="green">'.$equipBody.'</strong></p>
                  <p>You equip your <strong class="green">'.$equipHands.'</strong></p>
                  <p>You equip your <strong class="green">'.$equipFeet.'</strong></p>
                  <p>You equip your <strong class="green">'.$equipRing1.'</strong></p>
                  <p>You equip your <strong class="green">'.$equipRing2.'</strong></p>
                  <p>You equip your <strong class="green">'.$equipNeck.'</strong></p>
                  <p>You equip your <strong class="green">'.$equipArtifact.'</strong></p>
                  <p>You mount your <strong class="green">'.$equipMount.'</strong></p>
                  <a href  class="btn purpleBG"  data-link="stats">STATS</a>
                  <a href  class="btn greenBG"  data-link="inv">INV</a>
                  </div>';
                  include('update_feed.php'); // --- update feed

                  $results = $link->query("UPDATE $user SET equipR = '$equipR'");
                  $results = $link->query("UPDATE $user SET equipL = '$equipR'");
                  $results = $link->query("UPDATE $user SET weapontype = 3");
                  $results = $link->query("UPDATE $user SET equipHead = '$equipHead'");
                  $results = $link->query("UPDATE $user SET equipBody = '$equipBody'");
                  $results = $link->query("UPDATE $user SET equipHands = '$equipHands'");
                  $results = $link->query("UPDATE $user SET equipFeet = '$equipFeet'");
                  $results = $link->query("UPDATE $user SET equipRing1 = '$equipRing1'");
                  $results = $link->query("UPDATE $user SET equipRing2 = '$equipRing2'");
                  $results = $link->query("UPDATE $user SET equipNeck = '$equipNeck'");
                  $results = $link->query("UPDATE $user SET equipArtifact = '$equipArtifact'");
                  $results = $link->query("UPDATE $user SET equipMount = '$equipMount'");
              }









                          // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
                          // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
                          // xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx MAX MAG
                          if ($input=="max mag") {
                            // MAG - hands
                            if  ($row['obsidianbattlestaff'] > 0) {$equipR = 'obsidian battle staff';}  // 200
                            else if  ($row['nuetronstaff'] > 0) {$equipR = 'nuetron staff';}  // 110
                            else if  ($row['gravityhammer'] > 0) {$equipR = 'gravity hammer';} // 100
                            else if  ($row['chondrianbow'] > 0) {$equipR = 'chondrian bow';}  // 100
                            else if  ($row['mithrilnunchaku'] > 0) {$equipR = 'mithril nunchaku';}     //  60
                            else if  ($row['mithrilwand'] > 0) {$equipR = 'mithril wand';}         //60
                            else if  ($row['kingblade'] > 0) {$equipR = 'king blade';}           //50
                            else if  ($row['galaxybow'] > 0) {$equipR = 'galaxy bow';}           //50
                            else if  ($row['mithrilbattlestaff'] > 0) {$equipR = 'mithril battle staff';}  // 45
                            else if  ($row['solomonsstaff'] > 0) {$equipR = "solomon\'s staff";}  // 45
                            else if  ($row['blessedspear'] > 0) {$equipR = 'blessed spear';}        // 40
                            else if  ($row['mithrilstaff'] > 0) {$equipR = 'mithril staff';}        // 40
                            else if  ($row['mithrilchakram'] > 0) {$equipR = 'mithril chakram';}       // 40
                            else if  ($row['blackbow'] > 0) {$equipR = 'black bow';}            // 40
                            else if  ($row['steelnunchaku'] > 0) {$equipR = 'steel nunchaku';}       // 40
                            else if  ($row['gammaknife'] > 0) {$equipR = 'gamma knife';}          //35
                            else if  ($row['kingsscepter'] > 0) {$equipR = 'kings scepter';}        //35
                            else if  ($row['oakbattlestaff'] > 0) {$equipR = 'oak battle staff';}      //30
                            else if  ($row['mithrilmace'] > 0) {$equipR = 'mithril mace';}         //30
                            else if  ($row['rangerbow'] > 0) {$equipR = 'ranger bow';}           //25
                            else if  ($row['steelchakram'] > 0) {$equipR = 'steel chakram';}        //25
                            else if  ($row['steelbattlestaff'] > 0) {$equipR = 'steel battle staff';}    //24
                            else if  ($row['steelstaff'] > 0) {$equipR = 'steel staff';}         //22
                            else if  ($row['goldfalcion'] > 0) {$equipR = 'gold falcion';}         //20
                            else if  ($row['trident'] > 0) {$equipR = 'trident';}         //15
                            else if  ($row['ironchakram'] > 0) {$equipR = 'iron chakram';}         //15
                            else if  ($row['snowbow'] > 0) {$equipR = 'snow bow';}         //15
                            else if  ($row['graywand'] > 0) {$equipR = 'gray wand';}         //15
                            else if  ($row['nunchaku'] > 0) {$equipR = 'nunchaku';}        //13
                            else if  ($row['ironbattlestaff'] > 0) {$equipR = 'iron battle staff';} //12
                            else if  ($row['hammerheadhammer'] > 0) {$equipR = 'hammerhead hammer';}  //10
                            else if  ($row['flamberg'] > 0) {$equipR = 'flamberg';}  //10
                            else if  ($row['forestsaber'] > 0) {$equipR = 'forest saber';}  //10
                            else if  ($row['demondagger'] > 0) {$equipR = 'demon dagger';}  //10
                            else if  ($row['ironstaff'] > 0) {$equipR = 'iron staff';}  //10
                            else if  ($row['blackboomerang'] > 0) {$equipR = 'black boomerang';}  //10
                            else if  ($row['enchantedbow'] > 0) {$equipR = 'enchanted bow';}  //10
                            else if  ($row['wand'] > 0) {$equipR = 'wand';}   //9
                            else if  ($row['dualtomahawk'] > 0) {$equipR = 'dual tomahawk';}   //9
                            else if  ($row['wizardstaff'] > 0) {$equipR = 'wizard staff';}   //7
                            else if  ($row['greatwhitesword'] > 0) {$equipR = 'great white sword';}   //7
                            else if  ($row['battlestaff'] > 0) {$equipR = 'battle staff';}   //6
                            else if  ($row['silver2hsword'] > 0) {$equipR = 'silver 2h sword';} // 5
                            else if  ($row['silversword'] > 0) {$equipR = 'silver sword';} // 5
                            else if  ($row['threechainedflail'] > 0) {$equipR = 'three chained flail';} // 5
                            else if  ($row['chakram'] > 0) {$equipR = 'chakram';}       // 5
                            else if  ($row['silverboomerang'] > 0) {$equipR = 'silver boomerang';}       // 5
                            else if  ($row['silverbow'] > 0) {$equipR = 'silver bow';}       // 5
                            else if  ($row['silvercrossbow'] > 0) {$equipR = 'silver crossbow';}       // 5
                            else if  ($row['bostaff'] > 0) {$equipR = 'bo staff';}       // 4
                            else if  ($row['harpoon'] > 0) {$equipR = 'harpoon';}       // 4
                            else if  ($row['brassknuckles'] > 0) {$equipR = 'brass knuckles';} // 3
                            else if  ($row['poisonsaber'] > 0) {$equipR = 'poison  saber';} // 3
                            else if  ($row['basicstaff'] > 0) {$equipR = 'basic staff';} // 3
                            else if  ($row['flail'] > 0) {$equipR = 'flail';} // 3
                            else if  ($row['claymore'] > 0) {$equipR = 'claymore';}      // 2
                            else if  ($row['gladius'] > 0) {$equipR = 'gladius';}      // 2
                            else if  ($row['woodenbo'] > 0) {$equipR = 'wooden bo';}      // 1
                            else if  ($row['stiletto'] > 0) {$equipR = 'stiletto';}    //1
                            else {$equipR = 'fists';}

                            // MAG - head
                            if  ($row['magnificentcrown'] > 0) {$equipHead = 'magnificent crown';}
                            else if  ($row['blackhood'] > 0) {$equipHead = 'black hood';}
                            else if  ($row['gammahood'] > 0) {$equipHead = 'gamma hood';}
                            else if  ($row['trollcrown'] > 0) {$equipHead = 'troll crown';}
                            else if  ($row['victoriashood'] > 0) {$equipHead = 'victoria\'s hood';}
                            else if  ($row['hauntedhelm'] > 0) {$equipHead = 'haunted helm';}
                            else if  ($row['scorpionhood'] > 0) {$equipHead = 'scorpion hood';}
                            else if  ($row['wizardhat'] > 0) {$equipHead = 'wizard hat';}
                            else if  ($row['calamaricap'] > 0) {$equipHead = 'calamari cap';}
                            else if  ($row['grayhood'] > 0) {$equipHead = 'gray hood';}
                            else if  ($row['bluehood'] > 0) {$equipHead = 'blue hood';}
                            else if  ($row['silverhelmet'] > 0) {$equipHead = 'silver helmet';}
                            else if  ($row['basichood'] > 0) {$equipHead = 'basic hood';}
                            else {$equipHead = '---';}

                            // MAG - body
                            if  ($row['terrarobe'] > 0) {$equipBody = 'terra robe';}
                            else if  ($row['silverpajamas'] > 0) {$equipBody = 'silver pajamas';}
                            else if  ($row['blackcloak'] > 0) {$equipBody = 'black cloak';}
                            else if  ($row['demoncape'] > 0) {$equipBody = 'demon cape';}
                            else if  ($row['gammarobe'] > 0) {$equipBody = 'gamma robe';}
                            else if  ($row['warlockrobe'] > 0) {$equipBody = 'warlock robe';}
                            else if  ($row['grayrobe'] > 0) {$equipBody = 'gray robe';}
                            else if  ($row['snowvest'] > 0) {$equipBody = 'snow vest';}
                            else if  ($row['championarmor'] > 0) {$equipBody = 'champion armor';}
                            else if  ($row['turtleshell'] > 0) {$equipBody = 'turtle shell';}
                            else if  ($row['forestcloak'] > 0) {$equipBody = 'forest cloak';}
                            else if  ($row['blackrobe'] > 0) {$equipBody = 'black robe';}
                            else if  ($row['pajamas'] > 0) {$equipBody = 'pajamas';}
                            else if  ($row['silverbreastplate'] > 0) {$equipBody = 'silver breastplate';}
                            else {$equipBody = '---';}

                            // MAG - hands
                            if  ($row['glowinggloves'] > 0) {$equipHands = 'glowing gloves';}
                            else if  ($row['gammahandwraps'] > 0) {$equipHands = 'gamma handwraps';}
                            else if  ($row['silkbracers'] > 0) {$equipHands = 'silk bracers';}
                            else if  ($row['grottogloves'] > 0) {$equipHands = 'grotto gloves';}
                            else if  ($row['banditgloves'] > 0) {$equipHands = 'bandit gloves';}
                            else if  ($row['trollgloves'] > 0) {$equipHands = 'troll gloves';}
                            else if  ($row['graygloves'] > 0) {$equipHands = 'gray gloves';}
                            else if  ($row['silvergauntlets'] > 0) {$equipHands = 'silver gauntlets';}
                            else if  ($row['traininggloves'] > 0) {$equipHands = 'training gloves';}
                            else {$equipHands = '---';}

                            // MAG - feet
                            if  ($row['ultimaboots'] > 0) {$equipFeet = 'ultima boots';}
                            else if  ($row['silkmocassins'] > 0) {$equipFeet = 'silk mocassins';}
                            else if  ($row['gammaboots'] > 0) {$equipFeet = 'gamma boots';}
                            else if  ($row['silverslippers'] > 0) {$equipFeet = 'silver slippers';}
                            else if  ($row['warlockboots'] > 0) {$equipFeet = 'warlock boots';}
                            else if  ($row['boneboots'] > 0) {$equipFeet = 'bone boots';}
                            else if  ($row['mudboots'] > 0) {$equipFeet = 'mud boots';}
                            else if  ($row['grayboots'] > 0) {$equipFeet = 'gray boots';}
                            else if  ($row['silverboots'] > 0) {$equipFeet = 'silver boots';}
                            else if  ($row['slippers'] > 0) {$equipFeet = 'slippers';}
                            else if  ($row['blackboots'] > 0) {$equipFeet = 'black boots';}
                            else {$equipFeet = '---';}

                            // MAG - ring1
                            if  ($row['silverring'] > 0) {$equipRing1 = 'silver ring';}
                            else if  ($row['ringofmagX'] > 0) {$equipRing1 = 'ring of mag X';}
                            else if  ($row['ringofmagIX'] > 0) {$equipRing1 = 'ring of mag IX';}
                            else if  ($row['ringofmagVII'] > 0) {$equipRing1 = 'ring of mag VII';}
                            else if  ($row['ringofmagVI'] > 0) {$equipRing1 = 'ring of mag VI';}
                            else if  ($row['ringofmagV'] > 0) {$equipRing1 = 'ring of mag V';}
                            else if  ($row['ringofmagIV'] > 0) {$equipRing1 = 'ring of mag IV';}
                            else if  ($row['ringofmagIII'] > 0) {$equipRing1 = 'ring of mag III';}
                            else if  ($row['ringofmagII'] > 0) {$equipRing1 = 'ring of mag II';}
                            else if  ($row['ringofmag'] > 0) {$equipRing1 = 'ring of mag';}
                            else {$equipRing1 = '---';}

                            // MAG - ring2
                            if  ($row['ringofmanaregenX'] > 0) {$equipRing2 = 'ring of mana regen X';}
                            else if  ($row['ringofmanaregenIX'] > 0) {$equipRing2 = 'ring of mana regen IX';}
                            else if  ($row['ringofmanaregenVII'] > 0) {$equipRing2 = 'ring of mana regen VII';}
                            else if  ($row['ringofmanaregenVI'] > 0) {$equipRing2 = 'ring of mana regen VI';}
                            else if  ($row['ringofmanaregenV'] > 0) {$equipRing2 = 'ring of mana regen V';}
                            else if  ($row['ringofmanaregenIV'] > 0) {$equipRing2 = 'ring of mana regen IV';}
                            else if  ($row['ringofmanaregenIII'] > 0) {$equipRing2 = 'ring of mana regen III';}
                            else if  ($row['ringofmanaregenII'] > 0) {$equipRing2 = 'ring of mana regen II';}
                            else if  ($row['ringofmanaregenI'] > 0) {$equipRing2 = 'ring of mana regen I';}
                            else {$equipRing2 = '---';}

                            // MAG - necklace
                            if  ($row['royalnecklace'] > 0) {$equipNeck = 'royal necklace';}
                            else if  ($row['silvernecklace'] > 0) {$equipNeck = 'silver necklace';}
                            else if  ($row['vapornecklace'] > 0) {$equipNeck = 'vapor necklace';}
                            else if  ($row['coralnecklace'] > 0) {$equipNeck = 'coral necklace';}
                            else if  ($row['shamannecklace'] > 0) {$equipNeck = 'shaman necklace';}
                            else if  ($row['rangeramulet'] > 0) {$equipNeck = 'ranger amulet';}
                            else if  ($row['bluependant'] > 0) {$equipNeck = 'blue pendant';}
                            else {$equipNeck = '---';}

                            // MAG - artifact
                            if  ($row['pearlofwisdom'] > 0) {$equipArtifact = 'pearl of wisdom';}
                            else if  ($row['coralcoin'] > 0) {$equipArtifact = 'coral coin';}
                            else if  ($row['luckybone'] > 0) {$equipArtifact = 'lucky bone';}
                            else if  ($row['onyxcross'] > 0) {$equipArtifact = 'onyx cross';}
                            else {$equipArtifact = '---';}

                            // MAG - mount
                            if  ($row['MOUNTbluefalcon'] > 0) {$equipMount = 'blue falcon';}
                            else if  ($row['MOUNTdirewolf'] > 0) {$equipMount = 'dire wolf';}
                            else if  ($row['MOUNTgreengriffin'] > 0) {$equipMount = 'green griffin';}
                            else {$equipMount = '---';}

                              echo $message = '<div class="menuAction">
                              <h3 class="blue">MAG MAX EQUIP</h3>
                              <p>You equip your <strong class="blue">'.$equipR.'</strong></p>
                              <p>You equip your <strong class="blue">'.$equipHead.'</strong></p>
                              <p>You equip your <strong class="blue">'.$equipBody.'</strong></p>
                              <p>You equip your <strong class="blue">'.$equipHands.'</strong></p>
                              <p>You equip your <strong class="blue">'.$equipFeet.'</strong></p>
                              <p>You equip your <strong class="blue">'.$equipRing1.'</strong></p>
                              <p>You equip your <strong class="blue">'.$equipRing2.'</strong></p>
                              <p>You equip your <strong class="blue">'.$equipNeck.'</strong></p>
                              <p>You equip your <strong class="blue">'.$equipArtifact.'</strong></p>
                              <p>You mount your <strong class="blue">'.$equipMount.'</strong></p>
                              <a href  class="btn purpleBG"  data-link="stats">STATS</a>
                              <a href  class="btn greenBG"  data-link="inv">INV</a>
                              </div>';
                              include('update_feed.php'); // --- update feed

                              $results = $link->query("UPDATE $user SET equipR = '$equipR'");
                              $results = $link->query("UPDATE $user SET equipL = '$equipR'");
                              $results = $link->query("UPDATE $user SET weapontype = 2");
                              $results = $link->query("UPDATE $user SET equipHead = '$equipHead'");
                              $results = $link->query("UPDATE $user SET equipBody = '$equipBody'");
                              $results = $link->query("UPDATE $user SET equipHands = '$equipHands'");
                              $results = $link->query("UPDATE $user SET equipFeet = '$equipFeet'");
                              $results = $link->query("UPDATE $user SET equipRing1 = '$equipRing1'");
                              $results = $link->query("UPDATE $user SET equipRing2 = '$equipRing2'");
                              $results = $link->query("UPDATE $user SET equipNeck = '$equipNeck'");
                              $results = $link->query("UPDATE $user SET equipArtifact = '$equipArtifact'");
                              $results = $link->query("UPDATE $user SET equipMount = '$equipMount'");
                          }




}
