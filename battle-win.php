<?php
// -----------------------------------  BATTLE WINNINGS
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {
    $trainingarmor = $row['trainingarmor'];
    $traininghelmet = $row['traininghelmet'];
    $trainingboots = $row['trainingboots'];
    $traininggloves = $row['traininggloves'];
    $leather = $row['leather'];
    $guardianblade = $row['guardianblade'];
    $squidtooth = $row['squidtooth'];

    $equipR=$row['equipR'];
    $equipL=$row['equipL'];
    $equipHead=$row['equipHead'];
    $equipBody=$row['equipBody'];
    $equipHands=$row['equipHands'];
    $equipFeet=$row['equipFeet'];


    // --------------------------------------------------------------  The Random
    if ($enemy =='The Random') {
        $exp = 1000;
        $currencyadd = rand(1, 1000000);
        $rand=rand(1, 4);
        $KLname= 'KLtherandom';
        if ($rand>=1) { // 25%
            $bonus = '+ Nothing Fool!<br> ';
        }

        echo $message="<div class='battlewin'>
<i class='icon-skull px60'></i>
You have defeated $the <span>$enemy!</span>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  rat
    if ($enemy =='Rat') {
        $currencyadd = rand(1, 3);	 // rand gold
        $bonus = '';


        $bonusalways = '+ Raw Meat<br> ';
        $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 1");

        $rand=rand(1, 4);				// rand bonus
        if ($rand == 1) {
            $bonus = '+ String<br> ';
            $results = $link->query("UPDATE $user SET string = string + 1");
        }
        if ($rand == 2) {
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand == 3) {
            $bonus = '+ Dagger<br> ';
            $results = $link->query("UPDATE $user SET dagger = dagger + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $currencyadd $currency<br>
  + 1 xp<br>
$bonusalways$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 1"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLrat = KLrat + 1");
    }


    // --------------------------------------------------------------  giant rat
    if ($enemy =='Giant Rat') {
        $currencyadd = rand(3, 8);	 // rand gold
        $bonus = '';

        $randmeat = rand(1, 3);
        $bonusalways = '+ '.$randmeat.' Raw Meat<br> ';
        $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $randmeat");

        $rand=rand(1, 4);				// rand bonus
        if ($rand == 1) {
            $bonus = '+ Ring of Defense<br> ';
            $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
        }
        if ($rand == 2) {
            $qty = rand(1, 3);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand == 3) {
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $currencyadd $currency<br>
  + 3 xp<br>
$bonusalways$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 3"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLgiantrat = KLgiantrat + 1");
    }
    // --------------------------------------------------------------  Sand Crab
    if ($enemy =='Sand Crab') {
        $bonusbest = '';
        if ($traininghelmet<1) {
            $bonusbest = '+ Training Helmet!<br> ';
            $results = $link->query("UPDATE $user SET traininghelmet = traininghelmet + 1");
            if ($equipHead == '<span> - - - </span>') {
                $results = $link->query("UPDATE $user SET equipHead = 'training helmet'");
            }
        }

        $sand = rand(1, 5);
        $bonusalways = '+ '.$sand.' Sand<br> ';
        $results = $link->query("UPDATE $user SET sand = sand + $sand");

        $rand=rand(1, 8);				// rand bonus
        if ($rand == 1) {
            $red = rand(1, 3);
            $bonus = '+ '.$red.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $red");
        }
        if ($rand == 2) {
            $blue = rand(1, 3);
            $bonus = '+ '.$blue.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $blue");
        }
        if ($rand == 3) {
            $stone = rand(1, 3);
            $bonus = '+ '.$stone.' Stone<br> ';
            $results = $link->query("UPDATE $user SET stone = stone + $stone");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Defense<br> ';
            $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
        }
        if ($rand == 5) {
            $bonus = '+ Short Sword<br> ';
            $results = $link->query("UPDATE $user SET shortsword = shortsword + 1");
        }
        if ($rand == 6) {
            $bonus = '+ Bo<br> ';
            $results = $link->query("UPDATE $user SET bo = bo + 1");
        }
        if ($rand == 7) {
            $bonus = '+ Stiletto<br> ';
            $results = $link->query("UPDATE $user SET stiletto = stiletto + 1");
        }
        if ($rand == 8) {
            $randwater = rand(5, 20);
            $bonus = '+ '.$randwater.' Water<br> ';
            $results = $link->query("UPDATE $user SET water = water + $randwater");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 2 xp<br>
+ $currencyadd $currency<br>
  $bonusbest
  $bonusalways
  $bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 2"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLsandcrab = KLsandcrab + 1");
    }

    // --------------------------------------------------------------  gator
    if ($enemy =='Gator') {
        $currencyadd = rand(10, 100);// rand gold
$rand=rand(1, 4);				// rand bonus

//$bonusbest = '';
        //if ($trainingarmor<1) { // 25%
        //	$bonusbest = '+ Training Armor!<br> ';
        //	$results = $link->query("UPDATE $user SET trainingarmor = trainingarmor + 1");
        //	if ($equipBody == '<span> - - - </span>'){ $results = $link->query("UPDATE $user SET equipBody = 'training armor'"); }
        //	}

        $bonusbest = '';
        if ($trainingarmor<1) {
            $bonusbest = '+ Training Armor! [auto-equipped]<br> ';
            $results = $link->query("UPDATE $user SET trainingarmor = trainingarmor + 1");
            if ($equipHead != '<span> XXX </span>') {
                $results = $link->query("UPDATE $user SET equipBody = 'training armor'");
            }
        }

        $randstone = rand(2, 5);
        $bonusalways = '+ '.$randstone.' Stone<br> ';
        $results = $link->query("UPDATE $user SET stone = stone + $randstone");

        if ($rand == 1) {
            $bonus = '+ Padded Armor<br> ';
            $results = $link->query("UPDATE $user SET paddedarmor = paddedarmor + 1");
        }
        if ($rand == 2) { // 25%
            $bonus = '+ Club<br> ';
            $results = $link->query("UPDATE $user SET club = club + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Ring of Strength<br> ';
            $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 20 xp<br>
  + $currencyadd $currency<br>
  $bonusalways$bonus$bonusbest</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 20"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLgator = KLgator + 1");
    }
    // --------------------------------------------------------------  silver beast
    if ($enemy =='Silver Beast') {
        $currencyadd = rand(10, 200);// rand gold
        $bonus = '+ Silver Key<br> ';
        $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 20 xp<br>
  + $currencyadd $currency<br>
  $bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 20"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLsilverbeast = KLsilverbeast + 1");

        $enemy=$row['enemy'] =="other";  // -- can't fight silver beast again
    }




    // --------------------------------------------------------------  spider
    if ($enemy =='Spider') {
        $currencyadd = rand(1, 5);	 // rand gold
$rand=rand(1, 4);				// rand bonus
$bonusbest = '';
        if ($traininggloves<1) {
            $bonusbest = '+ Training Gloves<br> ';
            $results = $link->query("UPDATE $user SET traininggloves = traininggloves + 1");
            if ($equipHands == '<span> - - - </span>') {
                $results = $link->query("UPDATE $user SET equipHands = 'training gloves'");
            }
        }
        $bonus = '';
        $alwaysdrop = '+ 1 Scorpion Tail<br> ';
        $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 1");

        if ($rand == 1) { //25%
            $bonus = '+ 2 Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 2");
        } elseif ($rand == 2) { //25%
            $bonus = '+ 1 Basic Shield<br> ';
            $results = $link->query("UPDATE $user SET basicshield = basicshield + 1");
        } elseif ($rand == 3) { //25%
            $bonus = '+ 2 Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + 2");
        } elseif ($rand == 4) { //25%
            $bonus = '+ 2 Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + 2");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 2 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonusbest$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 2"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLspider = KLspider + 1");
    }


    // --------------------------------------------------------------  scorpion
    if ($enemy =='Scorpion') {
        $currencyadd = rand(2, 10);	 // rand gold
$rand=rand(1, 4);				// rand bonus
$bonusbest = '';
        if ($trainingboots<1) {
            $bonusbest = '+ Training Boots<br> ';
            $results = $link->query("UPDATE $user SET trainingboots = trainingboots + 1");
            if ($equipFeet == '<span> - - - </span>') {
                $results = $link->query("UPDATE $user SET equipFeet = 'training boots'");
            }
        }
        $bonus = '';
        $alwaysdrop = '+ 1 Scorpion Tail<br> ';
        $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 1");
        if ($rand == 3) { // 25%
            $bonus = '+ Dagger<br> ';
            $results = $link->query("UPDATE $user SET dagger = dagger + 1");
        } elseif ($rand == 1) { // 25%
            $bonus = '+ 2 Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + 2");
        } elseif ($rand == 2) { // 25%
            $bonus = '+ Basic Staff<br> ';
            $results = $link->query("UPDATE $user SET basicstaff = basicstaff + 1");
        } elseif ($rand == 4) { // 25%
            $bonus = '+ Basic Hood<br> ';
            $results = $link->query("UPDATE $user SET basichood = basichood + 1");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 4 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonusbest$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 4"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLscorpion = KLscorpion + 1");
    }

    // --------------------------------------------------------------  giant spider
    if ($enemy =='Giant Spider') {
        $currencyadd = rand(5, 10);	 // rand gold
$rand=rand(1, 4);				// rand bonus
$bonus = '';
        $alwaysdrop = '+ 1 Scorpion Tail<br> ';
        $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 1");

        if ($rand == 1) { //25%
            $bonus = '+ Red Boots<br> ';
            $results = $link->query("UPDATE $user SET redboots = redboots + 1");
        } elseif ($rand == 2) { //25%
            $bonus = '+ Mace<br> ';
            $results = $link->query("UPDATE $user SET mace = mace + 1");
        } elseif ($rand == 3) { //25%
            $qty=rand(2, 6);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        } elseif ($rand == 4) { //25%
            $bonus = '+ Dagger<br> ';
            $results = $link->query("UPDATE $user SET dagger = dagger + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
  + 6 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 6"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLgiantspider = KLgiantspider + 1");
    }


    // --------------------------------------------------------------  alpha scorpion
    if ($enemy =='Alpha Scorpion') {
        $currencyadd = rand(10, 20);	 // rand gold
        $alwaysdrop = '+ 2 Scorpion Tail<br> ';
        $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 2");
        $rand=rand(1, 2);				// rand bonus
        $bonus = '';


        $rand2 = rand(1, 4);
        if ($rand2 == 1) {
            $alwaysdrop = '+ Red Hood<br> ';
            $results = $link->query("UPDATE $user SET redhood = redhood + 1");
        }
        if ($rand2 == 2) {
            $alwaysdrop = '+ Blue Hood<br> ';
            $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
        }
        if ($rand2 == 3) {
            $alwaysdrop = '+ Green Hood<br> ';
            $results = $link->query("UPDATE $user SET greenhood = greenhood + 1");
        }
        if ($rand2 == 4) {
            $alwaysdrop = '+ Basic Hood<br> ';
            $results = $link->query("UPDATE $user SET basichood = basichood + 1");
        }

        if ($rand == 1) { // 25%
            $bonus = '+ Broad Sword<br> ';
            $results = $link->query("UPDATE $user SET broadsword = broadsword + 1");
        }
        if ($rand == 2) { // 25%
            $bonus = '+ Long Sword<br> ';
            $results = $link->query("UPDATE $user SET longsword = longsword + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 8 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 8"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLalphascorpion = KLalphascorpion + 1");
    }

    // --------------------------------------------------------------  scorpion guard
    if ($enemy =='Scorpion Guard') {
        $currencyadd = rand(20, 30);// rand gold
        $alwaysdrop = '+ 3 Scorpion Tail<br> ';
        $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 3");
        $rand=rand(1, 4);				// rand bonus
        $bonus = '';
        if ($rand == 1) { // 25%
            $qty=rand(2, 4);
            $bonus = '+ '.$qty.' Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        if ($rand == 2) { // 25%
            $bonus = '+ Club<br> ';
            $results = $link->query("UPDATE $user SET club = club + 1");
        }
        if ($rand == 3) { // 25%
            $bonus = '+ Kite Shield<br> ';
            $results = $link->query("UPDATE $user SET kiteshield = kiteshield + 1");
        }
        if ($rand == 4) { // 25%
            $bonus = '+ Basic Helmet<br> ';
            $results = $link->query("UPDATE $user SET basichelmet = basichelmet + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 10 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 10"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLscorpionguard = KLscorpionguard + 1");
    }

    // --------------------------------------------------------------  mammoth scorpion
    if ($enemy =='Mammoth Scorpion') {
        $currencyadd = rand(10, 20);	 // rand gold
        $alwaysdrop = '+ 4 Scorpion Tail<br> ';
        $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 4");
        $rand=rand(1, 4);				// rand bonus
        $bonus = '';
        if ($rand == 1) { // 50%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Red Hood<br> ';
                $results = $link->query("UPDATE $user SET redhood = redhood + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Blue Hood<br> ';
                $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Green Hood<br> ';
                $results = $link->query("UPDATE $user SET greenhood = greenhood + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Leather Hood<br> ';
                $results = $link->query("UPDATE $user SET leatherhood = leatherhood + 1");
            }
        }
        if ($rand == 2) { // 25%
            $qty=rand(2, 4);
            $bonus = '+ '.$qty.' Blue Potion<br> ';
            $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
        }
        if ($rand == 3) { // 25%
            $bonus = '+ Tower Shield<br> ';
            $results = $link->query("UPDATE $user SET towershield = towershield + 1");
        }
        if ($rand == 4) { // 25%
            $bonus = '+ Padded Armor<br> ';
            $results = $link->query("UPDATE $user SET paddedarmor = paddedarmor + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 25 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 25"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLmammothscorpion = KLmammothscorpion + 1");
    }


    // --------------------------------------------------------------  scorpion queen
    if ($enemy =='Scorpion Queen') {
        $currencyadd = rand(200, 500);// rand gold
        $alwaysdrop = '+ 5 Scorpion Tail<br> ';
        $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 5");
        $rand=rand(1, 4);				// rand bonus
        $bonus = '';
        if ($rand == 1) { // 25%
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength II<br> ';
                $bonus = '+ Ring of Defense II<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
                $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity II<br> ';
                $bonus = '+ Ring of Magic II<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
                $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            }
        } elseif ($rand == 2) { // 25%
            $bonus = '+ Off Hand Dagger<br> ';
            $results = $link->query("UPDATE $user SET offhanddagger = offhanddagger + 1");
        } elseif ($rand == 3) { // 25%
            $bonus = '+ Claymore<br> ';
            $results = $link->query("UPDATE $user SET claymore = claymore + 1");
        } elseif ($rand == 4) { // 25%
            $bonus = '+ Iron Sword<br> ';
            $results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 150 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 150"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLscorpionqueen = KLscorpionqueen + 1");
    }


    // --------------------------------------------------------------  scorpion king
    if ($enemy =='Scorpion King') {
        $currencyadd = rand(500, 1000);// rand gold
        $alwaysdrop = '+ 10 Scorpion Tail<br> ';
        $results = $link->query("UPDATE $user SET scorpiontail = scorpiontail + 10");
        $rand=rand(1, 4);				// rand bonus
        $bonus = '';
        if ($rand == 1) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength V<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity V<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic V<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense V<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
            }
        } elseif ($rand == 2) { // 25%
            $bonus = '+ Scorpion Hood<br> ';
            $results = $link->query("UPDATE $user SET scorpionhood = scorpionhood + 1");
        } elseif ($rand == 3) { // 25%
            $qty=rand(1, 4);
            $bonus = '+ '.$qty.' Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        } elseif ($rand == 4) { // 25%
            $bonus = '+ Iron 2h Sword<br> ';
            $results = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 300 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 300"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLscorpionking = KLscorpionking + 1");
    }
    // --------------------------------------------------------------  bat
    if ($enemy =='Bat') {
        $currencyadd = rand(5, 20);// rand gold
$rand=rand(1, 4);				// rand bonus

$alwaysdrop = '+ 1 Bat Wing<br> ';
        $results = $link->query("UPDATE $user SET batwing = batwing + 1");
        if ($rand == 1) {
            $blueberry = rand(1, 3);
            $bonus = '+ '.$blueberry.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $blueberry");
        }
        if ($rand == 2) { // 25%
            $bonus = '+ Long Sword<br> ';
            $results = $link->query("UPDATE $user SET longsword = longsword + 1");
        }
        if ($rand == 3) {
            $arrows = rand(2, 5);
            $bonus = '+ '.$arrows.' arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $arrows");
        }
        if ($rand == 4) {
            $bolts = rand(2, 5);
            $bonus = '+ '.$bolts.' bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $bolts");
        }


        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 3 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 3"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLbat = KLbat + 1");
    }




    // --------------------------------------------------------------  golden bat
    if ($enemy =='Golden Bat') {
        $currencyadd = rand(100, 300);// rand gold
$rand=rand(1, 4);				// rand bonus

$alwaysdrop = '+ 2 Bat Wing<br> ';
        $results = $link->query("UPDATE $user SET batwing = batwing + 2");
        if ($rand == 1) {
            $redpotion = rand(1, 3);
            $bonus = '+ '.$redpotion.' Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $redpotion");
        }
        if ($rand == 2) { // 25%
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        $arrows = rand(5, 10);
        if ($rand == 3) {
            $bluepotion = rand(1, 3);
            $bonus = '+ '.$bluepotion.' Blue Potion<br> ';
            $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $bluepotion");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Dexterity II<br> ';
            $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 10 xp<br>
  + $currencyadd $currency<br>
  $alwaysdrop$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 10"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLgoldenbat = KLgoldenbat + 1");
    }


    // --------------------------------------------------------------  salamander
    if ($enemy =='Salamander') {
        $currencyadd = rand(5, 30);// rand gold
$rand=rand(1, 4);				// rand bonus

$bonusalways = '+ Raw Meat<br> ';
        $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 1");
        if ($rand == 1) {
            $blueberry = rand(5, 15);
            $bonus = '+ '.$blueberry.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $blueberry");
        }
        if ($rand == 2) { // 25%
            $bonus = '+ bo staff<br> ';
            $results = $link->query("UPDATE $user SET bostaff = bostaff + 1");
        }
        if ($rand == 3) {
            $arrows = rand(5, 15);
            $bonus = '+ '.$arrows.' arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $arrows");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Magic<br> ';
            $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 9 xp<br>
  + $currencyadd $currency<br>
  $bonusalways$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 9"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLsalamander = KLsalamander + 1");
    }

    // --------------------------------------------------------------  goblin
    if ($enemy =='Goblin') {
        $currencyadd = rand(5, 10);// rand gold
$rand=rand(1, 4);				// rand bonus
if ($rand == 1) { // 25%
    $qty=rand(5, 15);
    $bonus = '+ '.$qty.' Redberry<br> ';
    $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
}
        if ($rand == 2) { // 25%
            $bonus = '+ Dagger<br> ';
            $results = $link->query("UPDATE $user SET dagger = dagger + 1");
        }
        if ($rand == 3) { // 25%
            $bonus = '+ Basic Helmet<br> ';
            $results = $link->query("UPDATE $user SET basichelmet = basichelmet + 1");
        }
        if ($rand == 4) { // 25%
            $bonus = '+ Black Gloves<br> ';
            $results = $link->query("UPDATE $user SET blackgloves = blackgloves + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 7 xp<br>
  + $currencyadd $currency<br>
  $bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 7"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLgoblin = KLgoblin + 1");
    }

    // --------------------------------------------------------------  goblin bandit
    if ($enemy =='Goblin Bandit') {
        $currencyadd = rand(20, 40);// rand gold
$rand=rand(1, 4);				// rand bonus
if ($rand == 1) { // 25%
    $bonus = '+ Buckler<br> ';
    $results = $link->query("UPDATE $user SET buckler = buckler + 1");
}
        if ($rand == 2) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Red Hood<br> ';
                $results = $link->query("UPDATE $user SET redhood = redhood + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Blue Hood<br> ';
                $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Green Hood<br> ';
                $results = $link->query("UPDATE $user SET greenhood = greenhood + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Basic Hood<br> ';
                $results = $link->query("UPDATE $user SET basichood = basichood + 1");
            }
        }
        if ($rand == 3) { // 25%
            $bonus = '+ Wrist Bracers<br> ';
            $results = $link->query("UPDATE $user SET wristbracers = wristbracers + 1");
        }
        if ($rand == 4) { // 25%
            $bonus = '+ Black Boots<br> ';
            $results = $link->query("UPDATE $user SET blackboots = blackboots + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
  + 12 xp<br>
  + $currencyadd $currency<br>
  $bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 12"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLgoblinbandit = KLgoblinbandit + 1");
    }

    // --------------------------------------------------------------  goblin chief
    if ($enemy =='Goblin Chief') {
        $currencyadd = rand(100, 200);// rand gold
$rand=rand(1, 4);				// rand bonus
if ($rand == 1) { // 25%
    $bonus = '+ Green Cloak<br> ';
    $results = $link->query("UPDATE $user SET greencloak = greencloak + 1");
}
        if ($rand == 2) { // 25%
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        if ($rand == 3) { // 25%
            $bonus = '+ Flail<br> ';
            $results = $link->query("UPDATE $user SET flail = flail + 1");
        }
        if ($rand == 4) { // 25%
            $bonus = '+ Morning Star<br> ';
            $results = $link->query("UPDATE $user SET morningstar = morningstar + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 30 xp<br>
  + $currencyadd $currency<br>
  $bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 30"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLgoblinchief = KLgoblinchief + 1");
    }

    // --------------------------------------------------------------  cow
    if ($enemy =='Cow') {
        $rand=rand(1, 4);				// rand bonus
        $currencyadd = rand(2, 5);
        $bonus = '';
        if ($leather<5) {
            $randleather = rand(1, 3);
            $bonusalways = '+ '.$randleather.' Leather<br> ';
            $results = $link->query("UPDATE $user SET leather = leather + $randleather");
        } else {
            $bonusalways = '+ NO MORE Leather. Craft with it.<br> ';
        }
        if ($rand == 1) {
            $bonus = '+ Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 1");
        }
        if ($rand == 2 || $rand == 3) {
            $bonus = '+ 2 redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + 1");
        }
        if ($rand == 4) {
            $bonus = '+ 1 blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
  + 5 xp<br>
$bonus
$bonusalways</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 5"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLcow = KLcow + 1");
    }
    // --------------------------------------------------------------  thief
    if ($enemy =='Thief') {
        $currencyadd = rand(10, 20);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(1, 3);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand == 2) {
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Dagger<br> ';
            $results = $link->query("UPDATE $user SET dagger = dagger + 1");
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 8 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 8"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLthief = KLthief + 1");
    }
    // --------------------------------------------------------------  wild boar
    if ($enemy =='Wild Boar') {
        $currencyadd = rand(10, 20);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '+ Leather<br> ';
            $results = $link->query("UPDATE $user SET leather = leather + 1");
        }
        if ($rand == 2) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand == 3) {
            $bonus = '+ Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 1");
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 8 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 8"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLwildboar = KLwildboar + 1");
    }
    // --------------------------------------------------------------  snake
    if ($enemy =='Snake') {
        $currencyadd = rand(10, 20);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '+ 3 Leather<br> ';
            $results = $link->query("UPDATE $user SET leather = leather + 3");
        }
        if ($rand == 2) {
            $bonus = '+ 3 Antidote Potions<br> ';
            $results = $link->query("UPDATE $user SET antidotepotion = antidotepotion + 3");
        }
        if ($rand == 3) {
            $bonus = '+ 3 Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + 3");
        }
        if ($rand == 4) {
            $qty = rand(10, 20);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 8 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 8"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLsnake = KLsnake + 1");
    }
    // -------------------------------------------------------------- hill ogre
    if ($enemy =='Hill Ogre') {
        $currencyadd = rand(10, 100);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '+ Claymore<br> ';
            $results = $link->query("UPDATE $user SET claymore = claymore + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Gladius<br> ';
            $results = $link->query("UPDATE $user SET gladius  = gladius  + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Ring of Strength II<br> ';
            $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Health Regen<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 30 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 30"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLhillogre = KLhillogre + 1");
    }



    // ---------------------------------------------------------------------------  OGRE CAVE
    // --------------------------------------------------------------  hob goblin
    if ($enemy =='Hob Goblin') {
        $currencyadd = rand(10, 20);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $qty = rand(1, 3);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand == 2) {
            $bonus = '+ Green Gloves<br> ';
            $results = $link->query("UPDATE $user SET greengloves = greengloves + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Wooden Bow<br> ';
            $results = $link->query("UPDATE $user SET woodenbow = woodenbow + 1");
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 9 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 9"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLhobgoblin = KLhobgoblin + 1");
    }
    // --------------------------------------------------------------  orc
    if ($enemy =='Orc') {
        $currencyadd = rand(15, 25);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '+ Long Sword<br> ';
            $results = $link->query("UPDATE $user SET longsword = longsword + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Black Gloves<br> ';
            $results = $link->query("UPDATE $user SET blackgloves = blackgloves + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Crossbow<br> ';
            $results = $link->query("UPDATE $user SET crossbow = crossbow + 1");
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 12 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 12"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLorc = KLorc + 1");
    }
    // --------------------------------------------------------------  ogre
    if ($enemy =='Ogre') {
        $currencyadd = rand(20, 30);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '+ Warhammer<br> ';
            $results = $link->query("UPDATE $user SET warhammer = warhammer + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Flail<br> ';
            $results = $link->query("UPDATE $user SET flail = flail + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Wrist Bracers<br> ';
            $results = $link->query("UPDATE $user SET wristbracers = wristbracers + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Leather Helmet<br> ';
            $results = $link->query("UPDATE $user SET leatherhelmet = leatherhelmet + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 20 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 20"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLogre = KLogre + 1");
    }
    // --------------------------------------------------------------  ogre guard
    if ($enemy =='Ogre Guard') {
        $currencyadd = rand(30, 40);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '+ Pike<br> ';
            $results = $link->query("UPDATE $user SET pike = pike + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Horned Helmet <br> ';
            $results = $link->query("UPDATE $user SET hornedhelmet  = hornedhelmet  + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Iron Helmet<br> ';
            $results = $link->query("UPDATE $user SET ironhelmet = ironhelmet + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 25 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 25"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLogreguard = KLogreguard + 1");
    }
    // --------------------------------------------------------------  fire ogress
    if ($enemy =='Fire Ogress') {
        $currencyadd = rand(40, 50);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '+ Wooden Staff<br> ';
            $results = $link->query("UPDATE $user SET woodenstaff = woodenstaff + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Morning Star <br> ';
            $results = $link->query("UPDATE $user SET morningstar  = morningstar  + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength<br> ';
                $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic<br> ';
                $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense<br> ';
                $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 30 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 30"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLfireogress = KLfireogress + 1");
    }
    // --------------------------------------------------------------  ogre lieutenant
    if ($enemy =='Ogre Lieutenant') {
        $currencyadd = rand(100, 300);
        $rand=rand(1, 4);
        if ($rand == 1) {
            $bonus = '+ Claymore<br> ';
            $results = $link->query("UPDATE $user SET claymore = claymore + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Barbarian Helmet <br> ';
            $results = $link->query("UPDATE $user SET barbarianhelmet  = barbarianhelmet  + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Buckler<br> ';
            $results = $link->query("UPDATE $user SET buckler = buckler + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Iron Shield<br> ';
            $results = $link->query("UPDATE $user SET ironshield = ironshield + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ 50 xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + 50"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET KLogrelieutenant = KLogrelieutenant + 1");
    }
    // --------------------------------------------------------------  ogre priest
    if ($enemy =='Ogre Priest') {
        $exp = 50;
        $currencyadd = rand(200, 400);
        $rand=rand(1, 4);
        $KLname= 'KLogrepriest';
        if ($rand == 1) {
            $bonus = '+ Nunchaku<br> ';
            $results = $link->query("UPDATE $user SET nunchaku = nunchaku + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Chakram<br> ';
            $results = $link->query("UPDATE $user SET chakram = chakram + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Demon Dagger<br> ';
            $results = $link->query("UPDATE $user SET demondagger = demondagger + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Gray Matter<br> ';
            $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  kobold
    if ($enemy =='Kobold') {
        $exp = 10;
        $currencyadd = rand(15, 25);
        $rand=rand(1, 4);
        $KLname= 'KLkobold';
        if ($rand == 1) {
            $qty = rand(2, 6);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand == 2) {
            $qty = rand(2, 6);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand == 3) {
            $bonus = '+ Long Sword<br> ';
            $results = $link->query("UPDATE $user SET longsword = longsword + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Kite Shield<br> ';
            $results = $link->query("UPDATE $user SET kiteshield = kiteshield + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  flying kobold
    if ($enemy =='Flying Kobold') {
        $exp = 15;
        $currencyadd = rand(15, 25);
        $rand=rand(1, 4);
        $KLname= 'KLflyingkobold';
        if ($rand == 1) {
            $bonus = '+ Wooden Bow<br> ';
            $results = $link->query("UPDATE $user SET woodenbow = woodenbow + 1");
        }
        if ($rand == 2) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        if ($rand == 3) {
            $bonus = '+ Crossbow<br> ';
            $results = $link->query("UPDATE $user SET crossbow = crossbow + 1");
        }
        if ($rand == 4) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  kobold shaman
    if ($enemy =='Kobold Shaman') {
        $exp = 20;
        $currencyadd = rand(30, 60);
        $rand=rand(1, 4);
        $KLname= 'KLkoboldshaman';
        if ($rand == 1) { // 25%
            $bonus = '+ Gray Boots<br> ';
            $results = $link->query("UPDATE $user SET grayboots = grayboots + 1");
        }
        if ($rand == 2) { // 25%
            $bonus = '+ Bo Staff<br> ';
            $results = $link->query("UPDATE $user SET bostaff = bostaff + 1");
        }
        if ($rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength<br> ';
                $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic<br> ';
                $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense<br> ';
                $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
            }
        }
        if ($rand == 4) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Red Hood<br> ';
                $results = $link->query("UPDATE $user SET redhood = redhood + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Blue Hood<br> ';
                $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Green Hood<br> ';
                $results = $link->query("UPDATE $user SET greenhood = greenhood + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Leather Hood<br> ';
                $results = $link->query("UPDATE $user SET leatherhood = leatherhood + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  kobold ninja
    if ($enemy =='Kobold Ninja') {
        $exp = 20;
        $currencyadd = rand(40, 80);
        $rand=rand(1, 4);
        $KLname= 'KLkoboldninja';
        if ($rand == 1) {
            $bonus = '+ Wooden Bo<br> ';
            $results = $link->query("UPDATE $user SET woodenbo = woodenbo + 1");
        }
        if ($rand == 2) {
            $qty = rand(2, 3);
            $bonus = '+ '.$qty.' Javelins<br> ';
            $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
        }
        if ($rand == 3) {
            $bonus = '+ Samurai Sword<br> ';
            $results = $link->query("UPDATE $user SET samuraisword = samuraisword + 1");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength<br> ';
                $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic<br> ';
                $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense<br> ';
                $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  kobold warlock
    if ($enemy =='Kobold Warlock') {
        $exp = 25;
        $currencyadd = rand(30, 80);
        $rand=rand(1, 4);
        $KLname= 'KLkoboldwarlock';
        if ($rand == 1) {
            $bonus = '+ Gray Gloves<br> ';
            $results = $link->query("UPDATE $user SET graygloves = graygloves + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Black Robe<br> ';
            $results = $link->query("UPDATE $user SET blackrobe = blackrobe + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Battle Staff<br> ';
            $results = $link->query("UPDATE $user SET battlestaff = battlestaff + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Wand<br> ';
            $results = $link->query("UPDATE $user SET wand = wand + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  END FIGHT!!!!
    $results = $link->query("UPDATE $user SET endfight = 1");
    $results = $link->query("UPDATE $user SET infight = 0");

    // --------------------------------------------------------------  kobold champion
    if ($enemy =='Kobold Champion') {
        $exp = 30;
        $currencyadd = rand(20, 100);
        $rand=rand(1, 4);
        $KLname= 'KLkoboldchampion';
        if ($rand == 1) {
            $bonus = '+ Pike<br> ';
            $results = $link->query("UPDATE $user SET pike = pike + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Green Cloak<br> ';
            $results = $link->query("UPDATE $user SET greencloak = greencloak + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Horned Helmet<br> ';
            $results = $link->query("UPDATE $user SET hornedhelmet = hornedhelmet + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  END FIGHT!!!!
    $results = $link->query("UPDATE $user SET endfight = 1");
    $results = $link->query("UPDATE $user SET infight = 0");


    // --------------------------------------------------------------  kobold master
    if ($enemy =='Kobold Master') {
        $exp = 50;
        $currencyadd = rand(50, 200);
        $rand=rand(1, 4);
        $KLname= 'KLkoboldmaster';
        if ($rand == 1) {
            $bonus = '+ Gladius<br> ';
            $results = $link->query("UPDATE $user SET gladius = gladius + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Gray Robe<br> ';
            $results = $link->query("UPDATE $user SET grayrobe = grayrobe + 1");
        }
        if ($rand == 3) {
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Blue Potion<br> ';
            $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Dual Tomahawk<br> ';
            $results = $link->query("UPDATE $user SET dualtomahawk = dualtomahawk + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  kobold monk
    if ($enemy =='Kobold Monk') {
        $exp = 50;
        $currencyadd = rand(200, 400);
        $rand=rand(1, 4);
        $KLname= 'KLkoboldmonk';
        if ($rand == 1) {
            $bonus = '+ Nunchaku<br> ';
            $results = $link->query("UPDATE $user SET nunchaku = nunchaku + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Chakram<br> ';
            $results = $link->query("UPDATE $user SET chakram = chakram + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Demon Dagger<br> ';
            $results = $link->query("UPDATE $user SET demondagger = demondagger + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Gray Matter<br> ';
            $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }



    // --------------------------------------------------------------  Tarantula
    if ($enemy =='Tarantula') {
        $exp = 25;
        $currencyadd = rand(2, 3);
        $rand=rand(1, 4);
        $KLname= 'KLtarantula';
        if ($rand == 1) {
            $bonus = '+ Long Sword<br> ';
            $results = $link->query("UPDATE $user SET longsword = longsword + 1");
        }
        if ($rand == 2) {
            $bolts = rand(5, 10);
            $bonus = '+ '.$bolts.' bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $bolts");
        }
        if ($rand == 3) {
            $bonus = '+ Iron Boots<br> ';
            $results = $link->query("UPDATE $user SET ironboots = ironboots + 1");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength<br> ';
                $results = $link->query("UPDATE $user SET ringofstrength = ringofstrength + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterity = ringofdexterity + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic<br> ';
                $results = $link->query("UPDATE $user SET ringofmagic = ringofmagic + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense<br> ';
                $results = $link->query("UPDATE $user SET ringofdefense = ringofdefense + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Sewer Rat
    if ($enemy =='Sewer Rat') {
        $exp = 25;
        $currencyadd = rand(2, 3);
        $rand=rand(1, 4);
        $KLname= 'KLsewerrat';
        if ($rand == 1) {
            $qty = rand(4, 8);
            $bonus = '+ '.$qty.' Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        if ($rand == 2) {
            $bonus = '+ 2 Meatball<br> ';
            $results = $link->query("UPDATE $user SET meatball = meatball + 2");
        }
        if ($rand == 3) {
            $bonus = '+ Gills Potions<br> ';
            $results = $link->query("UPDATE $user SET gillspotions = gillspotions + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Reds<br> ';
            $results = $link->query("UPDATE $user SET reds = reds + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Red Gator
    if ($enemy =='Red Gator') {
        $exp = 50;
        $currencyadd = rand(2, 3);
        $rand=rand(1, 4);
        $KLname= 'KLredgator';
        if ($rand == 1) {
            $qty = rand(2, 4);
            $bonus = '+ '.$qty.' Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        if ($rand == 2) {
            $bonus = '+ Iron Shield<br> ';
            $results = $link->query("UPDATE $user SET ironshield = ironshield + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Long Bow<br> ';
            $results = $link->query("UPDATE $user SET longbow = longbow + 1");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength II<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity II<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic II<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense II<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Flying Dung Beetle
    if ($enemy =='Flying Dung Beetle') {
        $exp = 50;
        $currencyadd = rand(100, 300);
        $rand=rand(1, 4);
        $KLname= 'KLflyingdungbeetle';
        if ($rand == 1) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Dung<br> ';
            $results = $link->query("UPDATE $user SET dung = dung + $qty");
        }
        if ($rand == 2) {
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Health Regen II<br> ';
                $results = $link->query("UPDATE $user SET ringofhealthregenII = ringofhealthregenII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Mana Regen II<br> ';
                $results = $link->query("UPDATE $user SET ringofmanaregenII = ringofmanaregenII + 1");
            }
        }
        if ($rand == 3) {
            $bonus = '+ Iron Chakram<br> ';
            $results = $link->query("UPDATE $user SET ironchakram = ironchakram + 1");
        }
        if ($rand == 4) {
            $qty = rand(5, 15);
            $bonus = '+ '.$qty.' Javelins<br> ';
            $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Imp
    if ($enemy =='Imp') {
        $exp = 30;
        $currencyadd = rand(20, 50);
        $rand=rand(1, 4);
        $KLname= 'KLimp';
        if ($rand == 1) {
            $bonus = '+ Gray Matter<br> ';
            $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Demon Dagger<br> ';
            $results = $link->query("UPDATE $user SET demondagger = demondagger + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }


        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Thief Pickpocket
    if ($enemy =='Thief Pickpocket') {
        $exp = 30;
        $currencyadd = rand(50, 100);
        $rand=rand(1, 4);
        $KLname= 'KLthiefpickpocket';
        if ($rand == 1) {
            $bonus = '+ Crossbow<br> ';
            $results = $link->query("UPDATE $user SET crossbow = crossbow + 1");
        }
        if ($rand == 2) {
            $bolts = rand(5, 10);
            $bonus = '+ '.$bolts.' bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $bolts");
        }
        if ($rand == 3) {
            $bonus = '+ Veggies<br> ';
            $results = $link->query("UPDATE $user SET veggies = veggies + 1");
        }
        if ($rand == 4) {
            $qty = rand(2, 4);
            $bonus = '+ '.$qty.' Javelins<br> ';
            $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Thief Brute
    if ($enemy =='Thief Brute') {
        $exp = 50;
        $currencyadd = rand(50, 100);
        $rand=rand(1, 4);
        $KLname= 'KLthiefbrute';
        if ($rand == 1) {
            $bonus = '+ Giant Club<br> ';
            $results = $link->query("UPDATE $user SET giantclub = giantclub + 1");
        }
        if ($rand == 2) {
            $bolts = rand(10, 20);
            $bonus = '+ '.$bolts.' bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $bolts");
        }
        if ($rand == 3) {
            $bonus = '+ Yellows<br> ';
            $results = $link->query("UPDATE $user SET yellows = yellows + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Leather Vest<br> ';
            $results = $link->query("UPDATE $user SET leathervest = leathervest + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Master Thief
    if ($enemy =='Master Thief') {
        $exp = 80;
        $currencyadd = rand(100, 1000);
        $rand=rand(1, 4);
        $KLname= 'KLmasterthief';
        if ($rand == 1) {
            $bonus = '+ Off Hand Dagger<br> ';
            $results = $link->query("UPDATE $user SET offhanddagger = offhanddagger + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey+ 1");
        }
        if ($rand == 3) {
            $bonus = '+ Purples<br> ';
            $results = $link->query("UPDATE $user SET purples = purples + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Golds<br> ';
            $results = $link->query("UPDATE $user SET golds = golds + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------------------------------  CATACOMBS
    // --------------------------------------------------------------------------------------  CATACOMBS

    // --------------------------------------------------------------  skeleton
    if ($enemy =='Skeleton') {
        $exp = 20;
        $currencyadd = rand(5, 20);
        $rand=rand(1, 4);
        $KLname= 'KLskeleton';
        if ($rand == 1) {
            $bonus = '+ 2 Bone<br> ';
            $results = $link->query("UPDATE $user SET bone = bone + 2");
        }
        if ($rand == 2) {
            $qty = rand(5, 8);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand == 3) {
            $qty = rand(5, 8);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Long Sword<br> ';
            $results = $link->query("UPDATE $user SET longsword = longsword + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  skeleton archer
    if ($enemy =='Skeleton Archer') {
        $exp = 30;
        $currencyadd = rand(5, 20);
        $rand=rand(1, 4);
        $KLname= 'KLskeletonarcher';
        if ($rand == 1) {
            $bonus = '+ 2 Bone<br> ';
            $results = $link->query("UPDATE $user SET bone = bone + 2");
        }
        if ($rand == 2) {
            $qty = rand(5, 15);
            $bonus = '+ '.$qty.' Arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        if ($rand == 3) {
            $bonus = '+ Ring of Dexterity II<br> ';
            $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Hunter Shield<br> ';
            $results = $link->query("UPDATE $user SET huntershield = huntershield + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  skeleton knight
    if ($enemy =='Skeleton Knight') {
        $exp = 45;
        $currencyadd = rand(5, 20);
        $rand=rand(1, 4);
        $KLname= 'KLskeletonknight';
        if ($rand == 1) {
            $bonus = '+ 3 Bone<br> ';
            $results = $link->query("UPDATE $user SET bone = bone + 3");
        }
        if ($rand == 2) {
            $bonus = '+ Gladius<br> ';
            $results = $link->query("UPDATE $user SET gladius = gladius + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Ring of Strength II<br> ';
            $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Iron Kite Shield<br> ';
            $results = $link->query("UPDATE $user SET ironkiteshield = ironkiteshield + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  skeleton sorcerer
    if ($enemy =='Skeleton Sorcerer') {
        $exp = 50;
        $currencyadd = rand(5, 20);
        $rand=rand(1, 4);
        $KLname= 'KLskeletonsorcerer';
        if ($rand == 1) {
            $bonus = '+ 3 Bone<br> ';
            $results = $link->query("UPDATE $user SET bone = bone + 3");
        }
        if ($rand == 2) {
            $bonus = '+2 Blue Potion<br> ';
            $results = $link->query("UPDATE $user SET bluepotion = bluepotion + 2");
        }
        if ($rand == 3) {
            $bonus = '+ Glowing Orb<br> ';
            $results = $link->query("UPDATE $user SET glowingorb = glowingorb + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Gray Robe<br> ';
            $results = $link->query("UPDATE $user SET grayrobe = grayrobe + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  ancient skeleton
    if ($enemy =='Ancient Skeleton') {
        $exp = 80;
        $currencyadd = rand(10, 50);
        $rand=rand(1, 4);
        $KLname= 'KLancientskeleton';
        if ($rand == 1) {
            $bonus = '+ 5 Bone<br> ';
            $results = $link->query("UPDATE $user SET bone = bone + 5");
        }
        if ($rand == 2) {
            $bonus = '+ Bone Necklace<br> ';
            $results = $link->query("UPDATE $user SET bonenecklace = bonenecklace + 1");
        }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '+ '.$qty.' Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Iron Gauntlets<br> ';
            $results = $link->query("UPDATE $user SET irongauntlets = irongauntlets + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Victoria the Dead
    if ($enemy =='Victoria the Dead') {
        $exp = 150;
        $currencyadd = rand(20, 50);
        $rand=rand(1, 4);
        $KLname= 'KLvictoria';
        if ($rand == 1) {
            $bonus = '+ 10 Bone<br> ';
            $results = $link->query("UPDATE $user SET bone = bone + 10");
        }
        if ($rand == 2) {
            $bonus = '+ Victoria\'s Hood<br> ';
            $results = $link->query("UPDATE $user SET victoriashood = victoriashood + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Ring of Magic II<br> ';
            $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Mana Regen<br> ';
            $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated <span>$enemy</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Omar the Dead
    if ($enemy =='Omar the Dead') {
        $exp = 150;
        $currencyadd = rand(20, 50);
        $rand=rand(1, 4);
        $KLname= 'KLomar';
        if ($rand == 1) {
            $bonus = '+ 10 Bone<br> ';
            $results = $link->query("UPDATE $user SET bone = bone + 10");
        }
        if ($rand == 2) {
            $bonus = '+ Bone Cudgel<br> ';
            $results = $link->query("UPDATE $user SET bonecudgel = bonecudgel + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Polearm<br> ';
            $results = $link->query("UPDATE $user SET polearm = polearm + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Health Regen<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated <span>$enemy</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }















    // --------------------------------------------------------------  Wolf
    if ($enemy =='Wolf') {
        $exp = 15;
        $currencyadd = rand(5, 10);
        $rand=rand(1, 4);
        $KLname= 'KLwolf';
        if ($rand==1) { // 25%
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand==2) {
            $bonus = '+ Leather<br> ';
            $results = $link->query("UPDATE $user SET leather = leather + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + 1");
        }
        if ($rand==4) {
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Coyote
    if ($enemy =='Coyote') {
        $exp = 20;
        $currencyadd = rand(5, 15);
        $rand=rand(1, 4);
        $KLname= 'KLcoyote';
        if ($rand==1) { // 25%
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand==2) {
            $bonus = '+ Leather<br> ';
            $results = $link->query("UPDATE $user SET leather = leather + 1");
        }
        if ($rand == 3) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Red Hood<br> ';
                $results = $link->query("UPDATE $user SET redhood = redhood + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Gray Hood<br> ';
                $results = $link->query("UPDATE $user SET grayhood = grayhood + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Blue Hood<br> ';
                $results = $link->query("UPDATE $user SET bluehood = bluehood + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Leather Hood<br> ';
                $results = $link->query("UPDATE $user SET leatherhood = leatherhood + 1");
            }
        }
        if ($rand==4) {
            $bonus = '+ Coyote Ring<br> ';
            $results = $link->query("UPDATE $user SET coyotering = coyotering + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Buck
    if ($enemy =='Buck') {
        $exp = 25;
        $currencyadd = rand(10, 20);
        $rand=rand(1, 4);
        $KLname= 'KLbuck';
        if ($rand==1) { // 25%
            $qty=rand(10, 20);
            $bonus = '+ '.$qty.' Arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        if ($rand==2) {
            $bonus = '+ Meatball<br> ';
            $results = $link->query("UPDATE $user SET meatball = meatball + 1");
        }
        if ($rand == 3) {
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        if ($rand==4) {
            $bonus = '+ Leather Armor<br> ';
            $results = $link->query("UPDATE $user SET leatherarmor = leatherarmor + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Bear
    if ($enemy =='Bear') {
        $exp = 30;
        $currencyadd = rand(30, 50);
        $rand=rand(1, 4);
        $KLname= 'KLbear';
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
        }
        if ($rand==2) {
            $bonus = '+ Ring of Strength II<br> ';
            $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
        }
        if ($rand == 3) {
            $qty = rand(2, 4);
            $bonus = '+ '.$qty.' Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        if ($rand==4) {
            $bonus = '+ Ring of Health Regen<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Stag
    if ($enemy =='Stag') {
        $exp = 30;
        $currencyadd = rand(20, 40);
        $rand=rand(1, 4);
        $KLname= 'KLstag';
        if ($rand==1) { // 25%
            $qty=rand(2, 4);
            $bonus = '+ '.$qty.' Javelins<br> ';
            $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
        }
        if ($rand==2) {
            $bonus = '+ Gray Hood<br> ';
            $results = $link->query("UPDATE $user SET grayhood = grayhood + 1");
        }
        if ($rand==3) {
            $bonus = '+ 2 Leather<br> ';
            $results = $link->query("UPDATE $user SET leather = leather + 2");
        }
        if ($rand==4) {
            $bonus = '+ Ring of Mana Regen<br> ';
            $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Bigfoot
    if ($enemy =='Bigfoot') {
        $exp = 100;
        $currencyadd = rand(200, 300);
        $rand=rand(1, 4);
        $KLname= 'KLbigfoot';
        $alwaysbonus = '+ Big Foot<br> ';
        $results = $link->query("UPDATE $user SET bigfoot = bigfoot + 1");
        if ($rand==1) { // 25%
            $qty=rand(1, 3);
            $bonus = '+ '.$qty.' Iron<br> ';
            $results = $link->query("UPDATE $user SET iron = iron + $qty");
        }
        if ($rand==2) {
            $bonus = '+ Giant Club<br> ';
            $results = $link->query("UPDATE $user SET giantclub = giantclub + 1");
        }
        if ($rand==3) {
            $bonus = '+ Bigfoot Boots<br> ';
            $results = $link->query("UPDATE $user SET bigfootboots = bigfootboots + 1");
        }
        if ($rand==4) {
            $bonus = '+ Hunter Bow<br> ';
            $results = $link->query("UPDATE $user SET hunterbow = hunterbow + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Hawk
    if ($enemy =='Hawk') {
        $exp = 50;
        $currencyadd = rand(50, 70);
        $rand=rand(1, 4);
        $KLname= 'KLhawk';
        if ($rand == 1) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength III<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity III<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic III<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense III<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
            }
        }
        if ($rand==2) {
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Javelins<br> ';
            $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
        }
        if ($rand == 3) {
            $bonus = '+ Iron Hatchet<br> ';
            $results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + 1");
        }
        if ($rand == 4) {
            $qty = rand(50, 100);
            $bonus = '+ '.$qty.' Bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Rabid Skeever
    if ($enemy =='Rabid Skeever') {
        $exp = 100;
        $currencyadd = rand(1, 100);
        $rand=rand(1, 4);
        $KLname= 'KLrabidskeever';
        if ($rand==1) { // 25%
            $qty=rand(10, 20);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand==2) { // 25%
            $qty=rand(1, 2);
            $bonus = '+ '.$qty.' Meatball<br> ';
            $results = $link->query("UPDATE $user SET meatball = meatball + $qty");
        }
        if ($rand==3) { // 25%
            $qty=rand(2, 4);
            $bonus = '+ '.$qty.' Javelin<br> ';
            $results = $link->query("UPDATE $user SET javelin = javelin + $qty");
        }
        if ($rand==4) {
            $bonus = '+ Rabid Ring<br> ';
            $results = $link->query("UPDATE $user SET rabidring = rabidring + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Bleeding Dartwing
    if ($enemy =='Bleeding Dartwing') {
        $exp = 150;
        $currencyadd = rand(1, 200);
        $rand=rand(1, 4);
        $KLname= 'KLbleedingdartwing';
        if ($rand==1) { // 25%
            $qty=rand(10, 20);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand==2) { // 25%
            $qty=rand(10, 20);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand==3) { // 25%
            $qty=rand(10, 20);
            $bonus = '+ '.$qty.' Arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength II<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity II<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic II<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense II<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Mongolian Death Worm
    if ($enemy =='Mongolian Death Worm') {
        $exp = 300;
        $currencyadd = rand(1, 300);
        $rand=rand(1, 4);
        $KLname= 'KLmongoliandeathworm';
        if ($rand==1) { // 25%
            $bonus = '+ Poison Saber<br> ';
            $results = $link->query("UPDATE $user SET poisonsaber = poisonsaber + 1");
        }
        if ($rand==2) { // 25%
            $qty=rand(3, 6);
            $bonus = '+ '.$qty.' Purple Potion<br> ';
            $results = $link->query("UPDATE $user SET purplepotion = purplepotion + $qty");
        }
        if ($rand==3) { // 25%
            $qty=rand(1, 2);
            $bonus = '+ '.$qty.' Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        }
        if ($rand==4) {
            $bonus = '+ Death Orb<br> ';
            $results = $link->query("UPDATE $user SET deathorb = deathorb + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Demon Wing
    if ($enemy =='Demon Wing') {
        $exp = 150;
        $currencyadd = rand(50, 100);
        $rand=rand(1, 4);
        $KLname= 'KLdemonwing';
        if ($rand==1) { // 25%
            $qty=rand(2, 3);
            $bonus = '+ '.$qty.' Purple Potion<br> ';
            $results = $link->query("UPDATE $user SET purplepotion = purplepotion + $qty");
        }
        if ($rand==2) { // 25%
            $bonus = '+ 4 Bat Wing<br> ';
            $results = $link->query("UPDATE $user SET batwing = batwing + 4");
        }
        if ($rand==3) { // 25%
            $qty=rand(10, 20);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Health Regen<br> ';
                $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Mana Regen<br> ';
                $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Possessed Axeman
    if ($enemy =='Possessed Axeman') {
        $exp = 400;
        $currencyadd = rand(50, 100);
        $rand=rand(1, 4);
        $KLname= 'KLpossessedaxeman';
        if ($rand==1) { // 25%
            $bonus = '+ Great Axe<br> ';
            $results = $link->query("UPDATE $user SET greataxe = greataxe + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Red Wizard Ring<br> ';
            $results = $link->query("UPDATE $user SET redwizardring = redwizardring + 1");
        }
        if ($rand==3) { // 25%
            $qty=rand(1, 2);
            $bonus = '+ '.$qty.' Iron Hatchet<br> ';
            $results = $link->query("UPDATE $user SET ironhatchet = ironhatchet + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Haunted Helm<br> ';
            $results = $link->query("UPDATE $user SET hauntedhelm = hauntedhelm + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Red Bandit
    if ($enemy =='Red Bandit') {
        $exp = 120;
        $currencyadd = rand(60, 120);
        $rand=rand(1, 4);
        $KLname= 'KLredbandit';
        if ($rand==1) { // 25%
            $bonus = '+ Iron Dagger<br> ';
            $results = $link->query("UPDATE $user SET irondagger = irondagger + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Iron Bow<br> ';
            $results = $link->query("UPDATE $user SET ironbow = ironbow + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Bandit Boots<br> ';
            $results = $link->query("UPDATE $user SET banditboots = banditboots + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Steel Dagger<br> ';
            $results = $link->query("UPDATE $user SET steeldagger = steeldagger + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Bandit Marauder
    if ($enemy =='Bandit Marauder') {
        $exp = 180;
        $currencyadd = rand(60, 120);
        $rand=rand(1, 4);
        $KLname= 'KLbanditmarauder';
        if ($rand==1) { // 25%
            $bonus = '+ Stone Necklace<br> ';
            $results = $link->query("UPDATE $user SET stonenecklace = stonenecklace + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Iron Crossbow<br> ';
            $results = $link->query("UPDATE $user SET ironcrossbow = ironcrossbow + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Bandit Gloves<br> ';
            $results = $link->query("UPDATE $user SET banditgloves = banditgloves + 1");
        }
        if ($rand == 4) {
            $qty = rand(10, 20);
            $bonus = '+ '.$qty.' Bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Butcher
    if ($enemy =='Butcher') {
        $exp = 250;
        $currencyadd = rand(60, 120);
        $rand=rand(1, 4);
        $KLname= 'KLbutcher';
        if ($rand==1) { // 25%
            $bonus = '+ Iron Maul<br> ';
            $results = $link->query("UPDATE $user SET ironmaul = ironmaul + 1");
        }
        if ($rand==2) { // 25%
            $qty=rand(3, 6);
            $bonus = '+ '.$qty.' Meatball<br> ';
            $results = $link->query("UPDATE $user SET meatball = meatball + $qty");
        }
        if ($rand==3) { // 25%
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength II<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity II<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic II<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense II<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
            }
        }
        if ($rand == 4) {
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Blue Balm<br> ';
            $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Red Beard
    if ($enemy =='Red Beard') {
        $exp = 400;
        $currencyadd = rand(60, 120);
        $rand=rand(1, 4);
        $KLname= 'KLredbeard';
        if ($rand==1) { // 25%
            $bonus = '+ Great Axe<br> ';
            $results = $link->query("UPDATE $user SET greataxe = greataxe + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Yellow Wizard Ring<br> ';
            $results = $link->query("UPDATE $user SET yellowwizardring = yellowwizardring + 1");
        }
        if ($rand==3) { // 25%
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Red Shield<br> ';
            $results = $link->query("UPDATE $user SET redshield = redshield + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }




    // -------------------------------------------------------------------------------------- OCEAN


    // --------------------------------------------------------------  Jellyfish
    if ($enemy =='Jellyfish') {
        $exp = 50;
        $currencyadd = rand(1, 100);
        $rand=rand(1, 4);
        $KLname= 'KLjellyfish';
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand==2) { // 25%
            $qty = rand(5, 15);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand==3) { // 25%
            $qty=rand(2, 3);
            $bonus = '+ '.$qty.' Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        if ($rand==4) {
            $bonus = '+ Gills Potion<br> ';
            $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Electric Eel
    if ($enemy =='Electric Eel') {
        $exp = 60;
        $currencyadd = rand(1, 100);
        $rand=rand(1, 4);
        $KLname= 'KLelectriceel';
        if ($rand==1) { // 25%
            $qty=rand(2, 3);
            $bonus = '+ '.$qty.' Daggers<br> ';
            $results = $link->query("UPDATE $user SET dagger = dagger + $qty");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Ring of Mana Regen<br> ';
            $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Blues<br> ';
            $results = $link->query("UPDATE $user SET blues = blues + 1");
        }
        if ($rand==4) {
            $bonus = '+ Gills Potion<br> ';
            $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Piranha
    if ($enemy =='Piranha') {
        $exp = 70;
        $currencyadd = rand(1, 100);
        $rand=rand(1, 4);
        $KLname= 'KLpiranha';
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        if ($rand==2) { // 25%
            $qty = rand(5, 15);
            $bonus = '+ '.$qty.' Bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
        }
        if ($rand==3) { // 25%
            $qty=rand(1, 2);
            $bonus = '+ '.$qty.' Bluefish<br> ';
            $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
        }
        if ($rand==4) {
            $bonus = '+ Purples<br> ';
            $results = $link->query("UPDATE $user SET purples = purples + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Barracuda
    if ($enemy =='Barracuda') {
        $exp = 80;
        $currencyadd = rand(1, 100);
        $rand=rand(1, 4);
        $KLname= 'KLbarracuda';
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        if ($rand==2) { // 25%
            $qty=rand(2, 3);
            $bonus = '+ '.$qty.' Bluefish<br> ';
            $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Defense III<br> ';
            $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
        }
        if ($rand==4) {
            $bonus = '+ Iron Hood<br> ';
            $results = $link->query("UPDATE $user SET ironhood = ironhood + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Squid
    if ($enemy =='Squid') {
        $exp = 100;
        $currencyadd = rand(1, 100);
        $rand=rand(1, 4);
        $KLname= 'KLsquid';
        if ($rand==1) { // 25%
            $qty=rand(2, 3);
            $bonus = '+ '.$qty.' Meatball<br> ';
            $results = $link->query("UPDATE $user SET meatball = meatball + $qty");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Harpoon<br> ';
            $results = $link->query("UPDATE $user SET harpoon = harpoon + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Strength II<br> ';
            $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
        }
        if ($rand==4) {
            $bonus = '+ Iron Dagger<br> ';
            $results = $link->query("UPDATE $user SET irondagger = irondagger + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Albatross
    if ($enemy =='Albatross') {
        $exp = 100;
        $currencyadd = rand(100, 200);
        $rand=rand(1, 4);
        $KLname= 'KLalbatross';
        if ($rand==1) { // 25%
            $bonus = '+ 3 Purples<br> ';
            $results = $link->query("UPDATE $user SET purples = purples + 3");
        }
        if ($rand==2) { // 25%
            $bonus = '+ 3 Greens<br> ';
            $results = $link->query("UPDATE $user SET greens = greens + 3");
        }
        if ($rand==3) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Iron Javelins<br> ';
            $results = $link->query("UPDATE $user SET ironjavelin = ironjavelin + $qty");
        }
        if ($rand==4) {
            $bonus = '+ Iron Boomerang<br> ';
            $results = $link->query("UPDATE $user SET ironboomerang = ironboomerang + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Crocodile
    if ($enemy =='Crocodile') {
        $exp = 300;
        $currencyadd = rand(1, 400);
        $rand=rand(1, 4);
        $KLname= 'KLcrocodile';
        if ($rand==1) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Leather<br> ';
            $results = $link->query("UPDATE $user SET leather = leather + $qty");
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Red Potions<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        if ($rand==3) { // 25%
            $qty=rand(2, 4);
            $bonus = '+ '.$qty.' Bluefish<br> ';
            $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
        }
        if ($rand==4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength III<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity III<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic III<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense III<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  King Squid
    if ($enemy =='King Squid') {
        $exp = 600;
        $currencyadd = rand(1, 600);
        $rand=rand(1, 4);
        $KLname= 'KLkingsquid';
        if ($rand==1) { // 25%
            $bonus = '+ Ring of Dexterity VII<br> ';
            $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1");
        }
        if ($rand==2) { // 25%
        if ($squidtooth>=1) { // 25%
            $bonus = '+ Boomerang<br> ';
            $results = $link->query("UPDATE $user SET boomerang = boomerang + 1");
        } else {
            $bonus = '+ Squid Tooth [ARTIFACT]<br> ';
            $results = $link->query("UPDATE $user SET squidtooth = squidtooth + 1");
        }
        }
        if ($rand==3) { // 25%
            $qty=rand(2, 4);
            $bonus = '+ '.$qty.' Bluefish<br> ';
            $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
        }
        if ($rand==4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength III<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity III<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic III<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense III<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Mud Crab
    if ($enemy =='Mud Crab') {
        $exp = 20;
        $currencyadd = rand(1, 10);
        $KLname= 'KLmudcrab';

        $randmud = rand(2, 10);
        $bonusalways = '+ '.$randmud.' Mud<br> ';
        $results = $link->query("UPDATE $user SET mud = mud + $randmud");

        $rand=rand(1, 8);				// rand bonus
        if ($rand == 1) {
            $qty = rand(2, 3);
            $bonus = '+ '.$qty.' Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        if ($rand == 2) {
            $qty = rand(2, 3);
            $bonus = '+ '.$qty.' Red Potions<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '+ '.$qty.' Daggers<br> ';
            $results = $link->query("UPDATE $user SET dagger = dagger + $qty");
        }
        if ($rand == 4) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Sand<br> ';
            $results = $link->query("UPDATE $user SET sand = sand + $qty");
        }
        if ($rand == 5) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Water<br> ';
            $results = $link->query("UPDATE $user SET water = water + $qty");
        }
        if ($rand == 6) {
            $bonus = '+ Coal<br> ';
            $results = $link->query("UPDATE $user SET coal = coal + 1");
        }
        if ($rand == 7) {
            $bonus = '+ Iron<br> ';
            $results = $link->query("UPDATE $user SET iron = iron + 1");
        }
        if ($rand == 8) {
            $bonus = '+ Reds<br> ';
            $results = $link->query("UPDATE $user SET reds = reds + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br>
  $bonusalways
  $bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }




    // --------------------------------------------------------------  Giant Sea Turtle
    if ($enemy =='Giant Sea Turtle') {
        $exp = 110;
        $currencyadd = rand(1, 100);
        $rand=rand(1, 4);
        $KLname= 'KLgiantseaturtle';
        if ($rand==1) { // 25%
            $qty=rand(200, 500);
            $bonus = '+ '.$qty.' BONUS '.$currency.'<br> ';
            $results = $link->query("UPDATE $user SET currency = currency + $qty");
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Sand<br> ';
            $results = $link->query("UPDATE $user SET sand = sand + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Wings Potion<br> ';
            $results = $link->query("UPDATE $user SET wingspotion = wingspotion + 1");
        }
        if ($rand==4) {
            $bonus = '+ Turtle Shell<br> ';
            $results = $link->query("UPDATE $user SET turtleshell = turtleshell + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Colossal Squid
    if ($enemy =='Colossal Squid') {
        $exp = 130;
        $currencyadd = rand(1, 100);
        $rand=rand(1, 4);
        $KLname= 'KLcolossalsquid';
        if ($rand==1) { // 25%
            $qty=rand(200, 300);
            $bonus = '+ '.$qty.' BONUS XP<br> ';
            $results = $link->query("UPDATE $user SET xp = xp + $qty");
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Gills Potion<br> ';
            $results = $link->query("UPDATE $user SET gillspotion = gillspotion + 1");
        }
        if ($rand==4) {
            $bonus = '+ Polearm<br> ';
            $results = $link->query("UPDATE $user SET polearm = polearm + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Hammerhead
    if ($enemy =='Hammerhead') {
        $exp = 150;
        $currencyadd = rand(20, 200);
        $rand=rand(1, 4);
        $KLname= 'KLhammerhead';
        if ($rand==1) { // 25%
            $qty = rand(2, 4);
            $bonus = '+ '.$qty.' Iron Javelins<br> ';
            $results = $link->query("UPDATE $user SET ironjavelin = ironjavelin + $qty");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Ring of Magic II<br> ';
            $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Yellows<br> ';
            $results = $link->query("UPDATE $user SET yellows = yellows + 1");
        }
        if ($rand==4) {
            $bonus = '+ Steel Shield<br> ';
            $results = $link->query("UPDATE $user SET steelshield = steelshield + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Great White
    if ($enemy =='Great White') {
        $exp = 150;
        $currencyadd = rand(20, 200);
        $rand=rand(1, 4);
        $KLname= 'KLgreatwhite';
        if ($rand==1) { // 25%
            $bonus = '+ Ring of Health Regen<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Ring of Strength II<br> ';
            $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Reds<br> ';
            $results = $link->query("UPDATE $user SET reds = reds + 1");
        }
        if ($rand==4) {
            $bonus = '+ Compound Crossbow<br> ';
            $results = $link->query("UPDATE $user SET compoundcrossbow = compoundcrossbow + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Kraken
    if ($enemy =='Kraken') {
        $exp = 400;
        $currencyadd = rand(50, 300);
        $rand=rand(1, 4);
        $KLname= 'KLkraken';
        if ($rand==1) { // 25%
            $bonus = '+ Trident<br> ';
            $results = $link->query("UPDATE $user SET trident = trident + 1");
        }
        if ($rand==2) { // 25%
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Health Regen<br> ';
                $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Mana Regen<br> ';
                $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
            }
        }
        if ($rand==3) { // 25%
            $bonus = '+ Enchanted Orb<br> ';
            $results = $link->query("UPDATE $user SET enchantedorb = enchantedorb + 1");
        }
        if ($rand==4) {
            $bonus = '+ Blue Pendant<br> ';
            $results = $link->query("UPDATE $user SET bluependant = bluependant + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Glowing Octopus
    if ($enemy =='Glowing Octopus') {
        $exp = 200;
        $currencyadd = rand(50, 300);
        $rand=rand(1, 4);
        $KLname= 'KLglowingoctopus';
        if ($rand==1) { // 25%
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Blue Balm<br> ';
            $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
        }
        if ($rand==2) { // 25%
            $rand2 = rand(1, 2);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Health Regen<br> ';
                $results = $link->query("UPDATE $user SET ringofhealthregen = ringofhealthregen + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Mana Regen<br> ';
                $results = $link->query("UPDATE $user SET ringofmanaregen = ringofmanaregen + 1");
            }
        }
        if ($rand==3) { // 25%
            $bonus = '+ Gray Matter<br> ';
            $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        }
        if ($rand==4) {
            $bonus = '+ Green Wizard Ring<br> ';
            $results = $link->query("UPDATE $user SET greenwizardring = greenwizardring + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Thunder Barbarian
    if ($enemy =='Thunder Barbarian') {
        $exp = 400;
        $currencyadd = rand(50, 200);
        $rand=rand(1, 2);
        $KLname= 'KLthunderbarbarian';
        $alwaysbonus = '+ Reds<br> ';
        $results = $link->query("UPDATE $user SET reds = reds + 1");
        if ($rand==1) { // 50%
            $bonus = '+ Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
        }
        if ($rand==2) { // 50%
            $qty=rand(5, 10);
            $bonus = '+ '.$qty.' Red Potions<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Smooth Ranger
    if ($enemy =='Smooth Ranger') {
        $exp = 400;
        $currencyadd = rand(50, 200);
        $rand=rand(1, 2);
        $KLname= 'KLsmoothranger';
        $alwaysbonus = '+ Greens<br> ';
        $results = $link->query("UPDATE $user SET greens = greens + 1");
        if ($rand==1) { // 50%
            $qty=rand(10, 50);
            $bonus = '+ '.$qty.' Bolts<br> ';
            $results = $link->query("UPDATE $user SET bolts = bolts + $qty");
        }
        if ($rand==2) { // 50%
            $qty=rand(20, 100);
            $bonus = '+ '.$qty.' Arrows<br> ';
            $results = $link->query("UPDATE $user SET arrows = arrows + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Coral Wizard
    if ($enemy =='Coral Wizard') {
        $exp = 400;
        $currencyadd = rand(50, 200);
        $rand=rand(1, 2);
        $KLname= 'KLcoralwizard';
        $alwaysbonus = '+ Blues<br> ';
        $results = $link->query("UPDATE $user SET blues = blues + 1");
        if ($rand==1) { // 50%
            $bonus = '+ Blue Balm<br> ';
            $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
        }
        if ($rand==2) { // 50%
            $qty=rand(5, 10);
            $bonus = '+ '.$qty.' Red Potions<br> ';
            $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Heavy Walrus
    if ($enemy =='Heavy Walrus') {
        $exp = 400;
        $currencyadd = rand(50, 200);
        $rand=rand(1, 2);
        $KLname= 'KLheavywalrus';
        $alwaysbonus = '+ Yellows<br> ';
        $results = $link->query("UPDATE $user SET yellows = yellows + 1");
        if ($rand==1) { // 50%
            $bonus = '+ 5 Meatballs<br> ';
            $results = $link->query("UPDATE $user SET meatball = meatball + 5");
        }
        if ($rand==2) { // 50%
            $qty=rand(15, 25);
            $bonus = '+ '.$qty.' Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Water Temple Guardian
    if ($enemy =='Water Temple Guardian') {
        $exp = 2000;
        $currencyadd = rand(1000, 3000);
        $rand=rand(1, 5);
        $KLname= 'KLwatertempleguardian';

        if ($guardianblade == 0) {
            $alwaysbonus = '+ Guardian Blade!!!<br> ';
            $results = $link->query("UPDATE $user SET guardianblade = guardianblade + 1");
        } else {
            $alwaysbonus = '';
        }
        if ($rand==1) { // 20% RARE
            $bonus = '+ Pearl of Wisdom! [RARE ARTIFACT]<br> ';
            $results = $link->query("UPDATE $user SET pearlofwisdom = pearlofwisdom + 1");
        } else {
            $bonus = '';
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }



    // -------------------------------------------------------------------------------------- NEVERENDING MINE


    // --------------------------------------------------------------  Iron Rat
    if ($enemy =='Iron Rat') {
        $exp = 100;
        $currencyadd = rand(10, 20);
        $rand=rand(1, 4);
        $KLname= 'KLironrat';
        if ($rand == 1) {
            $qty = rand(10, 20);
            $bonus = '+ '.$qty.' Redberry<br> ';
            $results = $link->query("UPDATE $user SET redberry = redberry + $qty");
        }
        if ($rand == 2) {
            $qty = rand(10, 20);
            $bonus = '+ '.$qty.' Blueberry<br> ';
            $results = $link->query("UPDATE $user SET blueberry = blueberry + $qty");
        }
        if ($rand == 3) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Raw Meat<br> ';
            $results = $link->query("UPDATE $user SET rawmeat = rawmeat + $qty");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength II<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity II<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic II<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense II<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Iron Crab
    if ($enemy =='Iron Crab') {
        $exp = 100;
        $currencyadd = rand(10, 20);
        $KLname= 'KLironcrab';

        $bonusalways = '+ Iron<br> ';
        $results = $link->query("UPDATE $user SET iron = iron + 1");

        $rand=rand(1, 6);				// rand bonus
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Sand<br> ';
            $results = $link->query("UPDATE $user SET sand = sand + $qty");
        }
        if ($rand == 2) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Water<br> ';
            $results = $link->query("UPDATE $user SET water = water + $qty");
        }
        if ($rand == 3) {
            $qty = rand(2, 3);
            $bonus = '+ '.$qty.' Iron Daggers<br> ';
            $results = $link->query("UPDATE $user SET irondagger = irondagger + $qty");
        }
        if ($rand == 4) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Stone<br> ';
            $results = $link->query("UPDATE $user SET stone = stone + $qty");
        }
        if ($rand == 5) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Mud<br> ';
            $results = $link->query("UPDATE $user SET mud = mud + $qty");
        }
        if ($rand == 6) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength II<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity II<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic II<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense II<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br>
  $bonusalways
  $bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Iron Scorpion
    if ($enemy =='Iron Scorpion') {
        $exp = 150;
        $currencyadd = rand(20, 40);
        $rand=rand(1, 4);
        $KLname= 'KLironscorpion';
        if ($rand == 1) {
            $qty=rand(2, 5);
            $bonus = '+ '.$qty.' Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        if ($rand == 2) {
            $bonus = '+ Barbarian Helmet<br> ';
            $results = $link->query("UPDATE $user SET barbarianhelmet = barbarianhelmet + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Blues<br> ';
            $results = $link->query("UPDATE $user SET blues = blues + 1");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength II<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity II<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic II<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense II<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  War Turtle
    if ($enemy =='War Turtle') {
        $exp = 300;
        $currencyadd = rand(50, 100);
        $rand=rand(1, 4);
        $KLname= 'KLwarturtle';
        if ($rand == 1) {
            $bonus = '+ Turtle Shell<br> ';
            $results = $link->query("UPDATE $user SET turtleshell = turtleshell + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Green Pendant<br> ';
            $results = $link->query("UPDATE $user SET greenpendant = greenpendant + 1");
        }
        if ($rand == 3) {
            $qty=rand(3, 6);
            $bonus = '+ '.$qty.' Steel Javelins<br> ';
            $results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Defense X<br> ';
            $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Slag Beast
    if ($enemy =='Slag Beast') {
        $exp = 250;
        $currencyadd = rand(10, 20);
        $rand=rand(1, 4);
        $KLname= 'KLslagbeast';
        if ($rand == 1) {
            $bonus = '+ Reds<br> ';
            $results = $link->query("UPDATE $user SET reds = reds + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Stone Necklace<br> ';
            $results = $link->query("UPDATE $user SET stonenecklace = stonenecklace + 1");
        }
        if ($rand == 3) {
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Iron Javelins<br> ';
            $results = $link->query("UPDATE $user SET ironjavelin = ironjavelin + $qty");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength III<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthIII = ringofstrengthIII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity III<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityIII = ringofdexterityIII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic III<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicIII = ringofmagicIII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense III<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseIII = ringofdefenseIII + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Iron Gator
    if ($enemy =='Iron Gator') {
        $exp = 250;
        $currencyadd = rand(20, 40);
        $rand=rand(1, 4);
        $KLname= 'KLirongator';
        if ($rand == 1) {
            $bonus = '+ Iron Hammer<br> ';
            $results = $link->query("UPDATE $user SET ironhammer = ironhammer + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Yellows<br> ';
            $results = $link->query("UPDATE $user SET yellows = yellows + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Kettle Helm<br> ';
            $results = $link->query("UPDATE $user SET kettlehelm = kettlehelm + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Defense V<br>';
            $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Iron Golem
    if ($enemy =='Iron Golem') {
        $exp = 300;
        $currencyadd = rand(50, 200);
        $rand=rand(1, 4);
        $KLname= 'KLirongolem';
        $alwaysbonus = '+ Iron Pickaxe<br>';
        $results = $link->query("UPDATE $user SET ironpickaxe = ironpickaxe + 1");
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Iron<br>';
            $results = $link->query("UPDATE $user SET iron = iron + $qty");
        }
        if ($rand == 2) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Stone<br>';
            $results = $link->query("UPDATE $user SET stone = stone + $qty");
        }
        if ($rand == 3) {
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Coal<br>';
            $results = $link->query("UPDATE $user SET coal = coal + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Iron Maul<br>';
            $results = $link->query("UPDATE $user SET ironmaul = ironmaul + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Phoenix
    if ($enemy =='Phoenix') {
        $exp = 400;
        $currencyadd = rand(50, 200);
        $rand=rand(1, 4);
        $KLname= 'KLphoenix';
        if ($rand == 1) {
            $bonus = '+ Iron Cape<br> ';
            $results = $link->query("UPDATE $user SET ironcape = ironcape + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Iron Ring<br> ';
            $results = $link->query("UPDATE $user SET ironring = ironring + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Iron Necklace<br> ';
            $results = $link->query("UPDATE $user SET ironnecklace = ironnecklace + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Hand Crossbow<br>';
            $results = $link->query("UPDATE $user SET handcrossbow = handcrossbow + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Iron Cobra
    if ($enemy =='Iron Cobra') {
        $exp = 400;
        $currencyadd = rand(1000, 2000);
        $rand=rand(1, 4);
        $KLname= 'KLironcobra';
        if ($rand == 1) {
            $bonus = '+ POISON TOMB! [Artifact: +1 Poison Dart!<br> ';
            $results = $link->query("UPDATE $user SET poisondart = poisondart + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Iron Nunchaku<br> ';
            $results = $link->query("UPDATE $user SET ironnunchaku = ironnunchaku + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Iron Chakram<br> ';
            $results = $link->query("UPDATE $user SET ironchakram = ironchakram + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Poison Saber<br>';
            $results = $link->query("UPDATE $user SET poisonsaber = poisonsaber + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Earth Golem
    if ($enemy =='Earth Golem') {
        $exp = 400;
        $currencyadd = rand(1000, 2000);
        $rand=rand(1, 4);
        $KLname= 'KLearthgolem';
        if ($rand == 1) {
            $bonus = '+ Earth Hood<br> ';
            $results = $link->query("UPDATE $user SET earthhood = earthhood + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Earth Armor<br> ';
            $results = $link->query("UPDATE $user SET eartharmor = eartharmor + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Earth Mittens<br> ';
            $results = $link->query("UPDATE $user SET earthmittens = earthmittens + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Earth Boots<br>';
            $results = $link->query("UPDATE $user SET earthboots = earthboots + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }




    // --------------------------------------------------------------  Steel Rat
    if ($enemy =='Steel Rat') {
        $exp = 200;
        $currencyadd = rand(20, 40);
        $rand=rand(1, 4);
        $KLname= 'KLsteelrat';
        if ($rand == 1) {
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Coal<br> ';
            $results = $link->query("UPDATE $user SET coal = coal + $qty");
        }
        if ($rand == 2) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Meatballs<br> ';
            $results = $link->query("UPDATE $user SET meatballs = meatballs + $qty");
        }
        if ($rand == 3) {
            $bonus = '+ 3 String<br> ';
            $results = $link->query("UPDATE $user SET string = string + 3");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength V<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity V<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic V<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense V<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Steel Crab
    if ($enemy =='Steel Crab') {
        $exp = 200;
        $currencyadd = rand(20, 40);
        $rand=rand(1, 4);
        $KLname= 'KLsteelcrab';
        if ($rand == 1) {
            $qty = rand(1, 2);
            $bonus = '+ '.$qty.' Coal<br> ';
            $results = $link->query("UPDATE $user SET coal = coal + $qty");
        }
        if ($rand == 2) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Water<br> ';
            $results = $link->query("UPDATE $user SET water = water + $qty");
        }
        if ($rand == 3) {
            $qty = rand(1, 3);
            $bonus = '+ '.$qty.' Steel Dagger<br> ';
            $results = $link->query("UPDATE $user SET steeldagger = steeldagger + $qty");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength V<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity V<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic V<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense V<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Steel Scorpion
    if ($enemy =='Steel Scorpion') {
        $exp = 250;
        $currencyadd = rand(40, 80);
        $rand=rand(1, 4);
        $KLname= 'KLsteelscorpion';
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Bluefish<br> ';
            $results = $link->query("UPDATE $user SET bluefish = bluefish + $qty");
        }
        if ($rand == 2) {
            $bonus = '+ 2 Yellows<br> ';
            $results = $link->query("UPDATE $user SET yellows = yellows + 2");
        }
        if ($rand == 3) {
            $bonus = '+ Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + 1");
        }
        if ($rand == 4) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength V<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity V<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic V<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense V<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
            }
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Ulfberht
    if ($enemy =='Ulfberht') {
        $exp = 500;
        $currencyadd = rand(50, 200);
        $rand=rand(1, 4);
        $KLname= 'KLulfberht';
        if ($rand == 1) {
            $bonus = '+ Ulfberht<br> ';
            $results = $link->query("UPDATE $user SET ulfberht = ulfberht + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Warrior Pendant<br> ';
            $results = $link->query("UPDATE $user SET warriorpendant = warriorpendant + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Ring of Defense XX<br> ';
            $results = $link->query("UPDATE $user SET ringofdefenseXX = ringofdefenseXX + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Viking Shield<br>';
            $results = $link->query("UPDATE $user SET vikingshield = vikingshield + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Black Frog
    if ($enemy =='Black Frog') {
        $exp = 300;
        $currencyadd = rand(40, 80);
        $rand=rand(1, 1);
        $KLname= 'KLblackfrog';
        if ($rand == 1) {
            $bonus = '+ Reds<br> + Greens<br> + Blues<br> + Yellows<br> ';
            $results = $link->query("UPDATE $user SET reds = reds + 1");
            $results = $link->query("UPDATE $user SET greens = greens + 1");
            $results = $link->query("UPDATE $user SET blues = blues + 1");
            $results = $link->query("UPDATE $user SET yellows = yellows + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Steel Gator
    if ($enemy =='Steel Gator') {
        $exp = 400;
        $currencyadd = rand(40, 80);
        $rand=rand(1, 4);
        $KLname= 'KLsteelgator';
        if ($rand == 1) {
            $bonus = '+ Steel Hammer<br> ';
            $results = $link->query("UPDATE $user SET steelhammer = steelhammer + 1");
        }
        if ($rand == 2) {
            $bonus = '+ 30 Wood<br> ';
            $results = $link->query("UPDATE $user SET wood = wood + 30");
        }
        if ($rand == 3) {
            $bonus = '+ Gator Gloves<br> ';
            $results = $link->query("UPDATE $user SET gatorgloves = gatorgloves + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Defense X<br>';
            $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Steel Golem
    if ($enemy =='Steel Golem') {
        $exp = 500;
        $currencyadd = rand(100, 200);
        $rand=rand(1, 4);
        $KLname= 'KLsteelgolem';
        $alwaysbonus = '+ Steel Pickaxe<br>';
        $results = $link->query("UPDATE $user SET steelpickaxe = steelpickaxe + 1");
        if ($rand == 1) {
            $qty = rand(2, 5);
            $bonus = '+ '.$qty.' Iron<br>';
            $results = $link->query("UPDATE $user SET iron = iron + $qty");
        }
        if ($rand == 2) {
            $qty = rand(2, 3);
            $bonus = '+ '.$qty.' Mithril<br>';
            $results = $link->query("UPDATE $user SET mithril = mithril + $qty");
        }
        if ($rand == 3) {
            $qty = rand(5, 10);
            $bonus = '+ '.$qty.' Coal<br>';
            $results = $link->query("UPDATE $user SET coal = coal + $qty");
        }
        if ($rand == 4) {
            $bonus = '+ Ring of Dexterity VII<br>';
            $results = $link->query("UPDATE $user SET ringofdexterityVII = ringofdexterityVII + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Cyclops
    if ($enemy =='Cyclops') {
        $exp = 700;
        $currencyadd = rand(200, 300);
        $rand=rand(1, 4);
        $KLname= 'KLcyclops';
        if ($rand == 1) {
            $bonus = '+ Steel Cape<br> ';
            $results = $link->query("UPDATE $user SET steelcape = steelcape + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Steel Ring<br> ';
            $results = $link->query("UPDATE $user SET steelring = steelring + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Steel Necklace<br> ';
            $results = $link->query("UPDATE $user SET steelnecklace = steelnecklace + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Heavy Hammer<br>';
            $results = $link->query("UPDATE $user SET heavyhammer = heavyhammer + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Stone Assassin
    if ($enemy =='Stone Assassin') {
        $exp = 1000;
        $currencyadd = rand(2000, 4000);
        $rand=rand(1, 4);
        $KLname= 'KLstoneassassin';
        if ($rand == 1) {
            $bonus = '+ ASSASSINS TOMB! [Artifact: Learn Assassinate Skill!<br> ';
            $results = $link->query("UPDATE $user SET assassinate = assassinate + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Steel Nunchaku<br> ';
            $results = $link->query("UPDATE $user SET steelnunchaku = steelnunchaku + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Steel Chakram<br> ';
            $results = $link->query("UPDATE $user SET steelchakram = steelchakram + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Glaive<br>';
            $results = $link->query("UPDATE $user SET glaive = glaive + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Gamma Monk
    if ($enemy =='Gamma Monk') {
        $exp = 1000;
        $currencyadd = rand(2000, 4000);
        $rand=rand(1, 4);
        $KLname= 'KLgammamonk';
        if ($rand == 1) {
            $bonus = '+ Gamma Hood<br> ';
            $results = $link->query("UPDATE $user SET gammahood = gammahood + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Gamma Robe<br> ';
            $results = $link->query("UPDATE $user SET gammarobe = gammarobe + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Gamma Gloves<br> ';
            $results = $link->query("UPDATE $user SET gammagloves = gammagloves + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Gamma Boots<br>';
            $results = $link->query("UPDATE $user SET gammaboots = gammaboots + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }







    // --------------------------------------------------------------  Bowman
    if ($enemy =='Bowman') {
        $exp = 300;
        $currencyadd = rand(500, 5000);
        $rand=rand(1, 4);
        $KLname= 'KLbowman';



        $randArrow = rand(10, 20);
        $randBolt = rand(10, 20);
        $bonusalways = '+ '.$randArrow.' Arrows, + '.$randBolt.' Bolts<br> ';
        $results = $link->query("UPDATE $user SET arrows = arrows + $randArrow");
        $results = $link->query("UPDATE $user SET bolts = bolts + $randBolt");


        if ($rand==1) { // 25%
            $bonus = '+ Hand Crossbow<br> ';
            $results = $link->query("UPDATE $user SET handcrossbow = handcrossbow + 1");
        }
        if ($rand==2) {
            $bonus = '+ Compound Crossbow<br> ';
            $results = $link->query("UPDATE $user SET compoundcrossbow = compoundcrossbow + 1");
        }
        if ($rand==3) {
            $bonus = '+ Hunter Bow<br> ';
            $results = $link->query("UPDATE $user SET hunterbow = hunterbow + 1");
        }
        if ($rand==4) {
            $bonus = '+ Green Orb<br> ';
            $results = $link->query("UPDATE $user SET greenorb = greenorb + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonusalways$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Highwayman
    if ($enemy =='Highwayman') {
        $exp = 400;
        $currencyadd = rand(2000, 5000);
        $rand=rand(1, 4);
        $KLname= 'KLhighwayman';
        $rand2 = rand(1, 4);
        if ($rand2 == 1) {
            $bonusalways = '+ Ring of Strength V<br> ';
            $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
        }
        if ($rand2 == 2) {
            $bonusalways = '+ Ring of Dexterity V<br> ';
            $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
        }
        if ($rand2 == 3) {
            $bonusalways = '+ Ring of Magic V<br> ';
            $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
        }
        if ($rand2 == 4) {
            $bonusalways = '+ Ring of Defense V<br> ';
            $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
        }
        if ($rand==1) { // 25%
            $bonus = '+ Black Cape<br> ';
            $results = $link->query("UPDATE $user SET blackcape = blackcape + 1");
        }
        if ($rand==2) {
            $bonus = '+ Kettle Helm<br> ';
            $results = $link->query("UPDATE $user SET kettlehelm = kettlehelm + 1");
        }
        if ($rand==3) {
            $bonus = '+ Iron Sword<br> ';
            $results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
        }
        if ($rand==4) {
            $bonus = '+ Iron Gloves<br> ';
            $results = $link->query("UPDATE $user SET irongloves = irongloves + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonusalways$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }



    // ------------------------------------------------------------------------------  DARK FOREST
    // --------------------------------------------------------------  Troll
    if ($enemy =='Troll') {
        $exp = 50;
        $currencyadd = rand(40, 80);
        $rand=rand(1, 4);
        $KLname= 'KLtroll';

        if ($rand==1) { // 25%
            $qty=rand(1, 2);
            $bonus = '+ '.$qty.' Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        if ($rand==2) {
            $bonus = '+ Troll Boots<br> ';
            $results = $link->query("UPDATE $user SET trollboots = trollboots + 1");
        }
        if ($rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength II<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthII = ringofstrengthII + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity II<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityII = ringofdexterityII + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic II<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicII = ringofmagicII + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense II<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseII = ringofdefenseII + 1");
            }
        }
        if ($rand==4) {
            $bonus = '+ Hunter Bow<br> ';
            $results = $link->query("UPDATE $user SET hunterbow = hunterbow + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Troll Shaman
    if ($enemy =='Troll Shaman') {
        $exp = 200;
        $currencyadd = rand(20, 200);
        $rand=rand(1, 4);
        $KLname= 'KLtrollshaman';
        if ($rand==1) { // 25%
            $bonus = '+ Warlock Boots<br> ';
            $results = $link->query("UPDATE $user SET warlockboots = warlockboots + 1");
        }
        if ($rand==2) {
            $bonus = '+ Shaman Necklace<br> ';
            $results = $link->query("UPDATE $user SET shamannecklace = shamannecklace + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Iron Staff<br> ';
            $results = $link->query("UPDATE $user SET ironstaff = ironstaff + 1");
        }
        if ($rand==4) {
            $bonus = '+ Iron Dagger<br> ';
            $results = $link->query("UPDATE $user SET irondagger = irondagger + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }
    // --------------------------------------------------------------  Troll Sorcerer
    if ($enemy =='Troll Sorcerer') {
        $exp = 300;
        $currencyadd = rand(20, 200);
        $rand=rand(1, 4);
        $KLname= 'KLtrollsorcerer';
        if ($rand==1) { // 25%
            $bonus = '+ Warlock Robe<br> ';
            $results = $link->query("UPDATE $user SET warlockrobe = warlockrobe + 1");
        }
        if ($rand==2) {
            $bonus = '+ Ring of Mana Regen III<br> ';
            $results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Iron Battle Staff<br> ';
            $results = $link->query("UPDATE $user SET ironbattlestaff = ironbattlestaff + 1");
        }
        if ($rand==4) {
            $bonus = '+ Blue Balm<br> ';
            $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Troll Elder
    if ($enemy =='Troll Elder') {
        $exp = 400;
        $currencyadd = rand(30, 300);
        $rand=rand(1, 4);
        $KLname= 'KLtrollelder';
        if ($rand==1) { // 25%
            $bonus = '+ Forest Cloak<br> ';
            $results = $link->query("UPDATE $user SET forestcloak = forestcloak + 1");
        }
        if ($rand==2) {
            $bonus = '+ Ring of Health Regen III<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Iron Sword<br> ';
            $results = $link->query("UPDATE $user SET ironsword = ironsword + 1");
        }
        if ($rand==4) {
            $bonus = '+ Steel Dagger<br> ';
            $results = $link->query("UPDATE $user SET steeldagger = steeldagger + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Troll Champion
    if ($enemy =='Troll Champion') {
        $exp = 500;
        $currencyadd = rand(30, 300);
        $rand=rand(1, 4);
        $KLname= 'KLtrollchampion';
        if ($rand==1) { // 25%
            $bonus = '+ Iron 2h Sword<br> ';
            $results = $link->query("UPDATE $user SET iron2hsword = iron2hsword + 1");
        }
        if ($rand==2) {
            $bonus = '+ Iron Necklace<br> ';
            $results = $link->query("UPDATE $user SET ironnecklace = ironnecklace + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Iron Armor<br> ';
            $results = $link->query("UPDATE $user SET ironarmor = ironarmor + 1");
        }
        if ($rand==4) {
            $bonus = '+ Off Hand Sword<br> ';
            $results = $link->query("UPDATE $user SET offhandsword = offhandsword + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }




    // --------------------------------------------------------------  Troll Queen
    if ($enemy =='Troll Queen') {
        $exp = 600;
        $currencyadd = rand(40, 400);
        $rand=rand(1, 4);
        $KLname= 'KLtrollqueen';
        if ($rand==1) { // 25%
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        if ($rand==2) {
            $bonus = '+ Steel Bow<br> ';
            $results = $link->query("UPDATE $user SET steelbow = steelbow + 1");
        }
        if ($rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength V<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity V<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic V<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense V<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
            }
        }
        if ($rand==4) {
            $bonus = '+ Steel Boomerang<br> ';
            $results = $link->query("UPDATE $user SET steelboomerang = steelboomerang + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Troll King
    if ($enemy =='Troll King') {
        $exp = 800;
        $currencyadd = rand(50, 500);
        $rand=rand(1, 4);
        $KLname= 'KLtrollking';
        if ($rand==1) { // 25%
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        if ($rand==2) {
            $bonus = '+ Troll Crown<br> ';
            $results = $link->query("UPDATE $user SET trollcrown = trollcrown + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Steel Kite Shield<br> ';
            $results = $link->query("UPDATE $user SET steelkiteshield = steelkiteshield + 1");
        }
        if ($rand==4) {
            $bonus = '+ Steel Sword<br> ';
            $results = $link->query("UPDATE $user SET steelsword = steelsword + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Falcon
    if ($enemy =='Falcon') {
        $exp = 400;
        $currencyadd = rand(30, 300);
        $rand=rand(1, 4);
        $KLname= 'KLfalcon';
        if ($rand==1) { // 25%
            $bonus = '+ Steel Crossbow<br> ';
            $results = $link->query("UPDATE $user SET steelcrossbow = steelcrossbow + 1");
        }
        if ($rand==2) {
            $qty=rand(5, 15);
            $bonus = '+ '.$qty.' Steel Javelins<br> ';
            $results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + $qty");
        }
        if ($rand == 3) {
            $rand2 = rand(1, 4);
            if ($rand2 == 1) {
                $bonus = '+ Ring of Strength V<br> ';
                $results = $link->query("UPDATE $user SET ringofstrengthV = ringofstrengthV + 1");
            }
            if ($rand2 == 2) {
                $bonus = '+ Ring of Dexterity V<br> ';
                $results = $link->query("UPDATE $user SET ringofdexterityV = ringofdexterityV + 1");
            }
            if ($rand2 == 3) {
                $bonus = '+ Ring of Magic V<br> ';
                $results = $link->query("UPDATE $user SET ringofmagicV = ringofmagicV + 1");
            }
            if ($rand2 == 4) {
                $bonus = '+ Ring of Defense V<br> ';
                $results = $link->query("UPDATE $user SET ringofdefenseV = ringofdefenseV + 1");
            }
        }
        if ($rand==4) {
            $bonus = '+ Steel Nunchaku<br> ';
            $results = $link->query("UPDATE $user SET steelnunchaku = steelnunchaku + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Ent
    if ($enemy =='Ent') {
        $exp = 600;
        $currencyadd = rand(30, 300);
        $rand=rand(1, 4);
        $KLname= 'KLent';
        $alwaysbonus = '+ 10 Wood<br>';
        $results = $link->query("UPDATE $user SET wood = wood + 10");
        if ($rand == 1) {
            $bonus = '+ Gray Matter<br>';
            $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Steel Chakram<br>';
            $results = $link->query("UPDATE $user SET steelchakram = steelchakram + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Flamberg<br>';
            $results = $link->query("UPDATE $user SET flamberg = flamberg + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Oak Warhammer<br>';
            $results = $link->query("UPDATE $user SET oakwarhammer = oakwarhammer + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Dark Ranger
    if ($enemy =='Dark Ranger') {
        $exp = 600;
        $currencyadd = rand(30, 300);
        $rand=rand(1, 4);
        $KLname= 'KLdarkranger';
        $alwaysbonus = '+ 50 Arrows<br>';
        $results = $link->query("UPDATE $user SET arrows = arrows + 50");
        if ($rand == 1) {
            $bonus = '+ Ranger Boots<br>';
            $results = $link->query("UPDATE $user SET rangerboots = rangerboots + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Ranger Hood<br>';
            $results = $link->query("UPDATE $user SET rangerhood = rangerhood + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Ranger Gloves<br>';
            $results = $link->query("UPDATE $user SET rangergloves = rangergloves + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Ranger Cloak<br>';
            $results = $link->query("UPDATE $user SET rangercloak = rangercloak + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Wisp
    if ($enemy =='Wisp') {
        $exp = 1000;
        $currencyadd = 10000;
        $rand=rand(1, 4);
        $KLname= 'KLwisp';
        $alwaysbonus = '+ gray matter<br>';
        $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        if ($rand == 1) {
            $bonus = '+ Gamma Knife<br>';
            $results = $link->query("UPDATE $user SET gammaknife = gammaknife + 1");
        }
        if ($rand == 2) {
            $bonus = '+ Gamma Knife<br>';
            $results = $link->query("UPDATE $user SET gammaknife = gammaknife + 1");
        }
        if ($rand == 3) {
            $bonus = '+ Gamma Knife<br>';
            $results = $link->query("UPDATE $user SET gammaknife = gammaknife + 1");
        }
        if ($rand == 4) {
            $bonus = '+ Gamma Knife<br>';
            $results = $link->query("UPDATE $user SET gammaknife = gammaknife + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$alwaysbonus$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }




    // ------------------------------------------------------------------------------  DARK KEEP
    // --------------------------------------------------------------  Lurker
    if ($enemy =='Lurker') {
        $exp = 500;
        $currencyadd = rand(100, 300);
        $rand=rand(1, 4);
        $KLname= 'KLlurker';

        if ($rand==1) { // 25%
            $qty=rand(5, 10);
            $bonus = '+ '.$qty.' Red Potion<br> ';
            $results = $link->query("UPDATE $user SET redpotion = redpotion + $qty");
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 10);
            $bonus = '+ '.$qty.' Blue Potion<br> ';
            $results = $link->query("UPDATE $user SET bluepotion = bluepotion + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Steel Gloves<br> ';
            $results = $link->query("UPDATE $user SET steelgloves = steelgloves + 1");
        }
        if ($rand==4) { // 25%
            $bonus = '+ Ring of Health Regen III<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Winged Demon
    if ($enemy =='Winged Demon') {
        $exp = 700;
        $currencyadd = rand(100, 500);
        $rand=rand(1, 4);
        $KLname= 'KLwingeddemon';

        if ($rand==1) { // 25%
            $qty=rand(1, 2);
            $bonus = '+ '.$qty.' Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        }
        if ($rand==2) { // 25%
            $qty=rand(1, 2);
            $bonus = '+ '.$qty.' Blue Balm<br> ';
            $results = $link->query("UPDATE $user SET bluebalm = bluebalm + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Steel Boomerang<br> ';
            $results = $link->query("UPDATE $user SET steelboomerang = steelboomerang + 1");
        }
        if ($rand==4) { // 25%
            $bonus = '+ Steel Hood<br> ';
            $results = $link->query("UPDATE $user SET steelhood = steelhood + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Undead Orc
    if ($enemy =='Undead Orc') {
        $exp = 1000;
        $currencyadd = rand(100, 700);
        $rand=rand(1, 4);
        $KLname= 'KLundeadorc';

        if ($rand==1) { // 25%
            $bonus = '+ Steel Bow<br> ';
            $results = $link->query("UPDATE $user SET steelbow = steelbow + 1");
        }
        if ($rand==2) { // 25%
            $qty=rand(2, 4);
            $bonus = '+ '.$qty.' Steel Javelins<br> ';
            $results = $link->query("UPDATE $user SET steeljavelin = steeljavelin + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Steel Crossbow<br> ';
            $results = $link->query("UPDATE $user SET steelcrossbow = steelcrossbow + 1");
        }
        if ($rand==4) { // 25%
            $bonus = '+ Ring of Dexterity X<br> ';
            $results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Stone Sphinx
    if ($enemy =='Stone Sphinx') {
        $exp = 3000;
        $currencyadd = rand(1000, 5000);
        $rand=rand(1, 4);
        $KLname= 'KLstonesphinx';

        if ($rand==1) { // 25%
            $bonus = '+ Mithril Bow<br> ';
            $results = $link->query("UPDATE $user SET mithrilbow = mithrilbow + 1");
        }
        if ($rand==2) { // 25%
            $qty=rand(20, 50);
            $bonus = '+ '.$qty.' Stone<br> ';
            $results = $link->query("UPDATE $user SET stone = stone + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Defense XX<br> ';
            $results = $link->query("UPDATE $user SET ringofdefenseXX = ringofdefenseXX + 1");
        }
        if ($rand==4) { // 25%
            $bonus = '+ Sphinx Shield<br> ';
            $results = $link->query("UPDATE $user SET sphinxshield = sphinxshield + 1");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }



    // --------------------------------------------------------------  Warped Priest
    if ($enemy =='Warped Priest') {
        $exp = 2500;
        $currencyadd = rand(1000, 1500);
        $rand=rand(1, 4);
        $KLname= 'KLwarpedpriest';

        if ($rand==1) { // 25%
            $bonus = '+ Warped Ring<br> ';
            $results = $link->query("UPDATE $user SET warpedring = warpedring + 1");
        }
        if ($rand==2) { // 25%
            $qty=rand(3, 3);
            $bonus = '+ '.$qty.' Blues<br> ';
            $results = $link->query("UPDATE $user SET blues = blues + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Onyx Cross<br> ';
            $results = $link->query("UPDATE $user SET onyxcross = onyxcross + 1");
        }
        if ($rand==4) { // 25%
            $bonus = '+ Crimson Moccasins<br> ';
            $results = $link->query("UPDATE $user SET crimsonmoccasins = crimsonmoccasins + 1");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Dark Paladin
    if ($enemy =='Dark Paladin') {
        $exp = 2000;
        $currencyadd = rand(1000, 1500);
        $rand=rand(1, 4);
        $KLname= 'KLdarkpaladin';

        if ($rand==1) { // 25%
            $qty=rand(2, 5);
            $bonus = '+ '.$qty.' Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Mithril Armor<br> ';
            $results = $link->query("UPDATE $user SET mithrilarmor = mithrilarmor + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Mithril Gloves<br> ';
            $results = $link->query("UPDATE $user SET mithrilgloves = mithrilgloves + 1");
        }
        if ($rand==4) { // 25%
            $bonus = '+ Mithril Boots<br> ';
            $results = $link->query("UPDATE $user SET mithrilboots = mithrilboots + 1");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }



    // --------------------------------------------------------------  Dark Prince
    if ($enemy =='Dark Prince') {
        $exp = 3000;
        $currencyadd = rand(1000, 3000);
        $rand=rand(1, 4);
        $KLname= 'KLdarkprince';

        if ($rand==1) { // 25%
            $bonus = '+ Mithril Sword<br> ';
            $results = $link->query("UPDATE $user SET mithrilsword = mithrilsword + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Mithril Shield<br> ';
            $results = $link->query("UPDATE $user SET mithrilshield = mithrilshield + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Mithril Helmet<br> ';
            $results = $link->query("UPDATE $user SET mithrilhelmet = mithrilhelmet + 1");
        }
        if ($rand==4) { // 25%
            $bonus = '+ Royal Pendant<br> ';
            $results = $link->query("UPDATE $user SET royalpendant = royalpendant + 1");
        }

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }



    // ------------------------------------------------------------------------------  MOUNTAIN SHORTCUT
    // --------------------------------------------------------------  Friendly Giant
    if ($enemy =='Friendly Giant') {
        $exp = 0;
        $KLname= 'KLfriendlygiant';

        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
You can now use the mountain shortcut.</div>";
        include('update_feed_alt.php'); // --- update feed
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // ------------------------------------------------------------------------------  MOUNTAINS

    // --------------------------------------------------------------  Mountain Giant
    if ($enemy =='Mountain Giant') {
        $exp = 500;
        $currencyadd = rand(50, 300);
        $rand=rand(1, 4);
        $KLname= 'KLmountaingiant';
        if ($rand==1) { // 25%
            $bonus = '+ Steel Helmet<br> ';
            $results = $link->query("UPDATE $user SET steelhelmet = steelhelmet + 1");
        }
        if ($rand==2) { // 25%
            $qty=rand(3, 6);
            $bonus = '+ '.$qty.' Meatballs<br> ';
            $results = $link->query("UPDATE $user SET meatball = meatball + $qty");
        }
        if ($rand==3) { // 25%
            $qty=rand(1, 2);
            $bonus = '+ '.$qty.' Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + $qty");
        }
        if ($rand==4) {
            $bonus = '+ Bardiche<br> ';
            $results = $link->query("UPDATE $user SET bardiche = bardiche + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Ice Troll
    if ($enemy =='Ice Troll') {
        $exp = 600;
        $currencyadd = rand(50, 500);
        $rand=rand(1, 4);
        $KLname= 'KLicetroll';
        if ($rand==1) { // 25%
            $bonus = '+ 3 Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + 3");
        }
        if ($rand==2) { // 25%
            $bonus = '+ 3 Blue Balm<br> ';
            $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 3");
        }
        if ($rand==3) { // 25%
            $bonus = '+ 2 Blues<br> ';
            $results = $link->query("UPDATE $user SET blues = blues + 2");
        }
        if ($rand==4) {
            $bonus = '+ 2 Mithril Javelins<br> ';
            $results = $link->query("UPDATE $user SET mithriljavelin = mithriljavelin + 2");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }




    // --------------------------------------------------------------  Giant Brute
    if ($enemy =='Giant Brute') {
        $exp = 600;
        $currencyadd = rand(50, 800);
        $rand=rand(1, 4);
        $KLname= 'KLgiantbrute';
        if ($rand==1) { // 25%
            $qty=rand(1000, 5000);
            $bonus = '+ '.$qty.' Bonus $currency!<br> ';
            $results = $link->query("UPDATE $user SET currency = currency + $qty");
        }
        if ($rand==2) { // 25%
            $bonus = '+ 2 Reds<br> ';
            $results = $link->query("UPDATE $user SET reds = reds + 2");
        }
        if ($rand==3) { // 25%
            $bonus = '+ 2 Yellows<br> ';
            $results = $link->query("UPDATE $user SET yellows = yellows + 2");
        }
        if ($rand==4) {
            $bonus = '+ 2 Blues<br> ';
            $results = $link->query("UPDATE $user SET greens = greens + 2");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Wyvern
    if ($enemy =='Wyvern') {
        $exp = 600;
        $currencyadd = rand(50, 500);
        $rand=rand(1, 4);
        $KLname= 'KLwyvern';
        if ($rand==1) { // 25%
            $bonus = '+ Steel Staff<br> ';
            $results = $link->query("UPDATE $user SET steelstaff = steelstaff + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Ring of Defense X<br> ';
            $results = $link->query("UPDATE $user SET ringofdefenseX = ringofdefenseX + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Dexterity X<br> ';
            $results = $link->query("UPDATE $user SET ringofdexterityX = ringofdexterityX + 1");
        }
        if ($rand==4) {
            $bonus = '+ 5 Iron Javelins<br> ';
            $results = $link->query("UPDATE $user SET ironjavelin = ironjavelin + 5");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Stone Dwarf
    if ($enemy =='Stone Dwarf') {
        $exp = 800;
        $currencyadd = rand(50, 500);
        $rand=rand(1, 4);
        $KLname= 'KLstonedwarf';
        if ($rand==1) { // 25%
            $bonus = '+ Steel 2h Sword<br> ';
            $results = $link->query("UPDATE $user SET steel2hsword = steel2hsword + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Steel Gauntlets<br> ';
            $results = $link->query("UPDATE $user SET steelgauntlets = steelgauntlets + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Steel Boots<br> ';
            $results = $link->query("UPDATE $user SET steelboots = steelboots + 1");
        }
        if ($rand==4) {
            $bonus = '+ Steel Armor<br> ';
            $results = $link->query("UPDATE $user SET steelarmor = steelarmor + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Giant Mountain Giant
    if ($enemy =='Giant Mountain Giant') {
        $exp = 2000;
        $currencyadd = rand(50, 1500);
        $rand=rand(1, 4);
        $KLname= 'KLgiantmountaingiant';
        if ($rand==1) { // 25%
            $bonus = '+ Humoungous Battleaxe<br> ';
            $results = $link->query("UPDATE $user SET humoungousbattleaxe = humoungousbattleaxe + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Mithril Kite Shield<br> ';
            $results = $link->query("UPDATE $user SET mithrilkiteshield = mithrilkiteshield + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Health Regen V<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregenV = ringofhealthregenV + 1");
        }
        if ($rand==4) {
            $bonus = '+ Ring of Strength X<br> ';
            $results = $link->query("UPDATE $user SET ringofstrengthX = ringofstrengthX + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Gatekeeper
    if ($enemy =='Gatekeeper') {
        $exp = 2500;
        $currencyadd = rand(50, 1500);
        $rand=rand(1, 4);
        $KLname= 'KLgatekeeper';
        if ($rand==1) { // 25%
            $bonus = '+ Mithril Battle Staff<br> ';
            $results = $link->query("UPDATE $user SET mithrilbattlestaff = mithrilbattlestaff + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Black Hood<br> ';
            $results = $link->query("UPDATE $user SET blackhood = blackhood + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Black Cloak<br> ';
            $results = $link->query("UPDATE $user SET blackcloak = blackcloak + 1");
        }
        if ($rand==4) {
            $bonus = '+ Keeper\'s Crossbow<br> ';
            $results = $link->query("UPDATE $user SET keeperscrossbow = keeperscrossbow + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Yeti
    if ($enemy =='Yeti') {
        $exp = 1500;
        $currencyadd = rand(800);
        $rand=rand(1, 4);
        $KLname= 'KLyeti';
        if ($rand==1) { // 25%
            $bonus = '+ Gray Matter<br> ';
            $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Strength X<br> ';
            $results = $link->query("UPDATE $user SET ringofstrengthX = ringofstrengthX + 1");
        }
        if ($rand==4) {
            $bonus = '+ Magic Talisman<br> ';
            $results = $link->query("UPDATE $user SET magictalisman = magictalisman + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }




    // --------------------------------------------------------------  Snow Ogre
    if ($enemy =='Snow Ogre') {
        $exp = 2500;
        $currencyadd = rand(2500);
        $rand=rand(1, 4);
        $KLname= 'KLsnowogre';
        if ($rand==1) { // 25%
            $bonus = '+ Heater Shield<br> ';
            $results = $link->query("UPDATE $user SET heatershield = heatershield + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Ranger Orb<br> ';
            $results = $link->query("UPDATE $user SET rangerorb = rangerorb + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ranger Moccasins<br> ';
            $results = $link->query("UPDATE $user SET rangermoccasins = rangermoccasins + 1");
        }
        if ($rand==4) {
            $bonus = '+ Banshee Hood<br> ';
            $results = $link->query("UPDATE $user SET bansheehood = bansheehood + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Snow Ninja
    if ($enemy =='Snow Ninja') {
        $exp = 2500;
        $currencyadd = rand(2500);
        $rand=rand(1, 4);
        $KLname= 'KLsnowninja';
        if ($rand==1) { // 25%
            $bonus = '+ Mithril Chakram<br> ';
            $results = $link->query("UPDATE $user SET mithrilchakram = mithrilchakram + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Mithril Nunchaku<br> ';
            $results = $link->query("UPDATE $user SET mithrilnunchaku = mithrilnunchaku + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Fortified Fauchard<br> ';
            $results = $link->query("UPDATE $user SET fortifiedfauchard = fortifiedfauchard + 1");
        }
        if ($rand==4) {
            $bonus = '+ Silk Moccasins<br> ';
            $results = $link->query("UPDATE $user SET silkmoccasins = silkmoccasins + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  Snow Owl
    if ($enemy =='Snow Owl') {
        $exp = 2500;
        $currencyadd = rand(2500);
        $rand=rand(1, 4);
        $KLname= 'KLsnowowl';
        if ($rand==1) { // 25%
            $bonus = '+ Gray Matter<br> ';
            $results = $link->query("UPDATE $user SET graymatter = graymatter + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Owl Eye Pendant<br> ';
            $results = $link->query("UPDATE $user SET owleyependant = owleyependant + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Snow Vest<br> ';
            $results = $link->query("UPDATE $user SET snowvest = snowvest + 1");
        }
        if ($rand==4) {
            $bonus = '+ Baby Owl<br> ';
            $results = $link->query("UPDATE $user SET babyowl = babyowl + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Dragon
    if ($enemy =='Dragon') {
        $exp = 3000;
        $currencyadd = rand(5000, 10000);
        $rand=rand(1, 4);
        $KLname= 'KLdragon';
        if ($rand==1) { // 25%
            $bonus = '+ Mithril Staff<br> ';
            $results = $link->query("UPDATE $user SET mithrilstaff = mithrilstaff + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Mithril Necklace<br> ';
            $results = $link->query("UPDATE $user SET mithrilnecklace = mithrilnecklace + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Magic X<br> ';
            $results = $link->query("UPDATE $user SET ringofmagicX = ringofmagicX + 1");
        }
        if ($rand==4) {
            $bonus = '+ Dragon Shield<br> ';
            $results = $link->query("UPDATE $user SET dragonshield = dragonshield + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // ------------------------------------------------------------------------------  MOUNTAIN CATHEDRAL

    // --------------------------------------------------------------  Grey Gargoyle
    if ($enemy =='Grey Gargoyle') {
        $exp = 700;
        $currencyadd = rand(200, 600);
        $rand=rand(1, 4);
        $KLname= 'KLgreygargoyle';
        if ($rand==1) { // 25%
            $bonus = '+ Steel Battle Staff<br> ';
            $results = $link->query("UPDATE $user SET steelbattlestaff = steelbattlestaff + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Steel Gloves<br> ';
            $results = $link->query("UPDATE $user SET steelgloves = steelgloves + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Mithril Boomerang<br> ';
            $results = $link->query("UPDATE $user SET mithrilboomerang = mithrilboomerang + 1");
        }
        if ($rand==4) {
            $bonus = '+ Ring of Health Regen III<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }

    // --------------------------------------------------------------  White Gargoyle
    if ($enemy =='White Gargoyle') {
        $exp = 800;
        $currencyadd = rand(200, 700);
        $rand=rand(1, 4);
        $KLname= 'KLwhitegargoyle';
        if ($rand==1) { // 25%
            $bonus = '+ Steel Necklace<br> ';
            $results = $link->query("UPDATE $user SET steelnecklace = steelnecklace + 1");
        }
        if ($rand==2) { // 25%
            $qty=rand(5, 10);
            $bonus = '+ '.$qty.' Mithril Javelins<br> ';
            $results = $link->query("UPDATE $user SET mithriljavelin = mithriljavelin + $qty");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Glaive<br> ';
            $results = $link->query("UPDATE $user SET glaive = glaive + 1");
        }
        if ($rand==4) {
            $bonus = '+ Ring of Health Regen III<br> ';
            $results = $link->query("UPDATE $user SET ringofhealthregenIII = ringofhealthregenIII + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  Vampire
    if ($enemy =='Vampire') {
        $exp = 900;
        $currencyadd = rand(300, 700);
        $rand=rand(1, 4);
        $KLname= 'KLvampire';
        if ($rand==1) { // 25%
            $bonus = '+ Mithril Dagger<br> ';
            $results = $link->query("UPDATE $user SET mithrildagger = mithrildagger + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Ring of Mana Regen III<br> ';
            $results = $link->query("UPDATE $user SET ringofmanaregenIII = ringofmanaregenIII + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ 2 Red Balm<br> ';
            $results = $link->query("UPDATE $user SET redbalm = redbalm + 2");
        }
        if ($rand==4) {
            $bonus = '+ Blue Balm<br> ';
            $results = $link->query("UPDATE $user SET bluebalm = bluebalm + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }



    // --------------------------------------------------------------  Fallen Priest
    if ($enemy =='Fallen Priest') {
        $exp = 1500;
        $currencyadd = rand(200, 700);
        $rand=rand(1, 4);
        $KLname= 'KLfallenpriest';
        if ($rand==1) { // 25%
            $bonus = '+ Mithril Dagger<br> ';
            $results = $link->query("UPDATE $user SET mithrildagger = mithrildagger + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Mithril Hood<br> ';
            $results = $link->query("UPDATE $user SET mithrilhood = mithrilhood + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Magic VII<br> ';
            $results = $link->query("UPDATE $user SET ringofmagicVII = ringofmagicVII + 1");
        }
        if ($rand==4) {
            $bonus = '+ Silver Key<br> ';
            $results = $link->query("UPDATE $user SET silverkey = silverkey + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }



    // --------------------------------------------------------------  Fallen Angel
    if ($enemy =='Fallen Angel') {
        $exp = 3000;
        $currencyadd = rand(1000, 3000);
        $rand=rand(1, 4);
        $KLname= 'KLfallenangel';
        if ($rand==1) { // 25%
            $bonus = '+ Mithril 2h Sword<br> ';
            $results = $link->query("UPDATE $user SET mithril2hsword = mithril2hsword + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Mithril Crossbow<br> ';
            $results = $link->query("UPDATE $user SET mithrilcrossbow = mithrilcrossbow + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Ring of Mana Regen V<br> ';
            $results = $link->query("UPDATE $user SET ringofmanaregenV = ringofmanaregenV + 1");
        }
        if ($rand==4) {
            $bonus = '+ Off Hand Mace<br> ';
            $results = $link->query("UPDATE $user SET offhandmace = offhandmace + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }




    // --------------------------------------------------------------  Risen Skeleton
    if ($enemy =='Risen Skeleton') {
        $exp = 500;
        $currencyadd = rand(50, 150);
        $rand=rand(1, 4);
        $KLname= 'KLrisenskeleton';
        if ($rand==1) { // 25%
            $bonus = '+ 20 Bones<br> ';
            $results = $link->query("UPDATE $user SET bone = bone + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Mithril Gauntlets<br> ';
            $results = $link->query("UPDATE $user SET mithrilgauntlets = mithrilgauntlets + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Cursed Skull<br> ';
            $results = $link->query("UPDATE $user SET cursedskull = cursedskull + 1");
        }
        if ($rand==4) {
            $bonus = '+ Lucky Bone<br> ';
            $results = $link->query("UPDATE $user SET luckybone = luckybone + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }







    // ------------------------------------------------------------------------------  MOUNTAIN XTRA

    // --------------------------------------------------------------  GMG2
    if ($enemy =='GMG2') {
        $exp = 8000;
        $currencyadd = rand(20000);
        $rand=rand(1, 4);
        $KLname= 'KLgmg2';
        if ($rand==1) { // 25%
            $bonus = '+ GMG Club<br> ';
            $results = $link->query("UPDATE $user SET gmgclub = gmgclub + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ GMG Club<br> ';
            $results = $link->query("UPDATE $user SET gmgclub = gmgclub + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ GMG Club<br> ';
            $results = $link->query("UPDATE $user SET gmgclub = gmgclub + 1");
        }
        if ($rand==4) {
            $bonus = '+ GMG Club<br> ';
            $results = $link->query("UPDATE $user SET gmgclub = gmgclub + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  GK2
    if ($enemy =='GK2') {
        $exp = 8000;
        $currencyadd = rand(20000);
        $rand=rand(1, 4);
        $KLname= 'KLgk2';
        if ($rand==1) { // 25%
            $bonus = '+ GK Club<br>';
            $results = $link->query("UPDATE $user SET gkclub = gkclub + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ GK Club<br>';
            $results = $link->query("UPDATE $user SET gkclub = gkclub + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ GK Club<br>';
            $results = $link->query("UPDATE $user SET gkclub = gkclub + 1");
        }
        if ($rand==4) {
            $bonus = '+ GK Club<br>';
            $results = $link->query("UPDATE $user SET gkclub = gkclub + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }


    // --------------------------------------------------------------  KING BLADE
    if ($enemy =='King Blade') {
        $exp = 15000;
        $currencyadd = rand(50000);
        $rand=rand(1, 4);
        $KLname= 'KLkingblade';
        if ($rand==1) { // 25%
            $bonus = '+ King Blade<br>';
            $results = $link->query("UPDATE $user SET kingblade = kingblade + 1");
        }
        if ($rand==2) { // 25%
            $bonus = '+ Atomic Warhammer<br>';
            $results = $link->query("UPDATE $user SET atomicwarhammer = atomicwarhammer + 1");
        }
        if ($rand==3) { // 25%
            $bonus = '+ Bladerang<br>';
            $results = $link->query("UPDATE $user SET bladerang = bladerang + 1");
        }
        if ($rand==4) {
            $bonus = '+ Shield of Fools<br>';
            $results = $link->query("UPDATE $user SET shieldoffools = shieldoffools + 1");
        }
        echo $message="<div class='battlewin'><h3>You have defeated $the <span>$enemy!</span></h3>
+ $exp xp<br>
+ $currencyadd $currency<br/>
$bonus</div>";
        include('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET xp = xp + $exp"); // xp
$results = $link->query("UPDATE $user SET currency = currency + $currencyadd");
        $results = $link->query("UPDATE $user SET $KLname = $KLname + 1");
    }









    // --------------------------------------------------------------  END FIGHT!!!!
    $results = $link->query("UPDATE $user SET endfight = 1");
    $results = $link->query("UPDATE $user SET infight = 0");
    $results = $link->query("UPDATE $user SET KLtotalkill = KLtotalkill + 1");
}
