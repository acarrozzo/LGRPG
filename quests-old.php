<?php
// ------------------------------------- Quests TAB
// -------------------------DB CONNECT!
include('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if (!$result = $link->query($sql)) {
    die('There was an error running the query [' . $link->error . ']');
}
// -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) {


//  $checkedBox = '<i class="fa fa-check-square-o green"></i>';
    //  $checkBox = '<i class="fa fa-square-o gold"></i>';

    $checkBox = '<span class="icon checkbox white">'.file_get_contents("img/svg/checkbox.svg").'</span>';
    $checkedBox = '<span class="icon checkbox green">'.file_get_contents("img/svg/checkedbox2.svg").'</span>';

    //echo '<article data-pop="quests" id="quests">';

    echo'<section data-pop2="quests" class="flex-contain">';

    //  include('quest-rooms.php');

    // ---------------------- Quest Main
    echo '<div class="gbox">';
    echo '<h1 class="gold">Quests</h1>';	// --------------------------------------- IN PROGRESS
    echo '<p>Quests give some of the best experience and rewards in the game. Complete the quests below.</p>';
    echo '</div>';

    // --------------------------------------- OLD MAN QUEST CHAIN
    // --------------------------------------- OLD MAN QUEST CHAIN
    // --------------------------------------- OLD MAN QUEST CHAIN
    $questRoom = '003';
    echo '<div class="gbox';
    if ($row['room']==$questRoom) {
        echo ' tops';
    } elseif ($row['quest1']==2 && $row['quest2']==2 && $row['quest3']==2) {
        echo ' end';
    }
    echo '" >';
    //  echo '<div class="gslice">';
    echo '<h4 class="topright box gold">Wood Cabin</h4>';
    echo '<h2>Old Man</h2>';
    echo '<span class="icon npc green">'.file_get_contents("img/svg/npc-oldman.svg").'</span>';
    if ($row['quest1']<'2' || $row['quest2']<'2' || $row['quest3']<'2') {
        echo '<p class="gray">The Old Man hasn\'t been himself lately and could use the help of a Young Adventurer. Find him in his cabin southwest of the Grassy Field Crossroads.</p>';
    } else {
        echo '<p class="gray">The Old Man thanks you for helping in his basement. His wife loved the flower you picked as well. He tells you to make your way east along the Forest Path to get to Red Town. Talk to the Mayor there.</p>';
        echo '<h5 class="padd">'.$checkBox.' Talk to the Mayor of Red Town.</h5>';
    }
    if ($row['quest1']=='0') { // ------------------------------------- end state
        echo '<h5 class="gslice">'.$checkBox.' Talk to the Old Man in his cabin.</h5>';
        if ($row['quest1']=='0' && $row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="start quests"><h4>Talk to the Old Man</h4></button>';
        }
    }
    // ----------------------------------------- IN PROGRESS - QUEST 1
    $questNumber = '1';
    if ($row['quest'.$questNumber.'']=='1') {
        $questTag = 'Item Find';
        $questTitle = 'A Flower for my Wife';
        $questDesc = 'The Old Man sure is romantic. Help him pick a flower for his wife.';
        $color='gold';
        if ($row['flower']>='1') {
            $color='green';
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';

        if ($row['quest'.$questNumber.'']=='1' && $row['flower']<'1') {
            echo '<h5 class="padd">'.$checkBox.' Pick a flower. You can find one north of the cabin.</h5>';
        }
        if ($row['quest'.$questNumber.'']=='1' && $row['flower']>='1') {
            echo '<h5 class="padd green">'.$checkedBox.' You have picked a flower. Return to the Old Man for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 2
    $questNumber = '2';
    if ($row['quest'.$questNumber.'']=='1') {
        $questTag = 'Attack Dummy';
        $questTitle = 'Practice on the Dummy';
        $questDesc = 'Practice your attacks on the wooden training dummy in the corner of the room. When you attack you will do random damage between 1 and your STR stat.';
        $color='gold';
        if ($row['KLdummy']>='1') {
            $color='green';
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';

        if ($row['quest'.$questNumber.'']=='1' && $row['KLdummy']<'1') {
            echo '<h5 class="padd">'.$checkBox.' Attack the dummy</h5>';
        }
        if ($row['quest'.$questNumber.'']=='1' && $row['KLdummy']>='1') {
            echo '<h5 class="padd green">'.$checkedBox.' You have successfully attacked the dummy. Return to the Old Man for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 3
    $questNumber = '3';
    if ($row['quest'.$questNumber.'']=='1') {
        $questTag = 'lvl 3 battle';
        $questTitle = 'Rat Problem';
        $questDesc = 'The Old Man has a Rat Problem. Go down into the Basement and exterminate a Giant Rat to help out his situation.';
        $color='gold';
        if ($row['KLgiantrat']>='1') {
            $color='green';
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';
        if ($row['quest'.$questNumber.'']=='1' && $row['equipR']=='fists') {
            echo '<h5 class="padd">'.$checkBox.' Equip a weapon. Visit the Young Soldier west of the Old Man if you don\'t have one.</h5>';
        } elseif ($row['KLgiantrat']<'1') {
            echo '<h5 class="padd green">'.$checkedBox.' Equip a weapon.</h5>';
        }
        if ($row['quest'.$questNumber.'']=='1' && $row['KLgiantrat']<'1') {
            echo '<h5 class="">'.$checkBox.' Exterminate a Giant Rat.</h5>';
        }
        if ($row['quest'.$questNumber.'']=='1' && $row['KLgiantrat']>='1') {
            echo '<h5 class="padd green">'.$checkedBox.' You have defeated a Giant Rat. Return to the Old Man for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    }

    echo '</div>'; //-end gbox






    // --------------------------------------- YOUNG SOLDIER QUEST CHAIN
    // --------------------------------------- YOUNG SOLDIER QUEST CHAIN
    // --------------------------------------- YOUNG SOLDIER QUEST CHAIN
    $questRoom = '003c';
    echo '<div class="gbox';
    if ($row['room']==$questRoom) {
        echo ' tops';
    } elseif ($row['quest4']==2 && $row['quest5']==2 && $row['quest6']==2) {
        echo ' end';
    }
    echo '" >';
    //  echo '<div class="gslice">';
    echo '<h4 class="topright box blue">Weapons Training</h4>';
    echo '<h2>Young Soldier</h2>';
    echo '<span class="icon npc blue">'.file_get_contents("img/svg/npc-youngsoldier.svg").'</span>';
    if ($row['quest4']<'2' || $row['quest5']<'2' || $row['quest6']<'2') {
        echo '<p class="gray">This is a dangerous world. Visit the Young Soldier to get and equip your first weapon. You can find him west of the Old Man.</p>';
    } else {
        echo '<p class="gray">You now know the basics of combat. The Young Soldier wishes you the best in your adventures. He says you should next make your way to Red Town and join a guild or two.</p>';
        echo '<h5 class="padd">'.$checkBox.' Join the Warriors or Wizards Guild.</h5>';
    }
    if ($row['quest4']=='0') { // ------------------------------------- end state
        echo '<h5 class="gslice">'.$checkBox.' Talk to the Young Soldier.</h5>';
        if ($row['quest4']=='0' && $row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="start quests"><h4>Talk to the Young Soldier</h4></button>';
        }
    }
    // ----------------------------------------- IN PROGRESS - QUEST 4
    $questNumber = '4';
    if ($row['quest'.$questNumber.'']=='1') {
        $questTag = 'Equip Weapon';
        $questTitle = 'My First Sword and Shield';
        $questDesc = 'Pick up and equip a weapon. You can get one at the Young Soldier\'s Training Area.';
        $color='gold';
        if ($row['equipR']!='fists') {
            $color='green';
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';

        if ($row['trainingsword']=='0' && $row['equipR']=='fists') {
            echo '<h5 class="padd">'.$checkBox.' Pick up a sword at the Training Area</h5>';
        } elseif ($row['equipR']=='fists') {
            echo '<h5 class="padd green">'.$checkedBox.' Pick up a sword at the Training Area</h5>';
            echo '<h5 class="">'.$checkBox.' Equip it using your inventory (INV) menu</h5>';
        }
        if ($row['equipR']!='fists') {
            echo '<h5 class="padd green">'.$checkedBox.' Nice. You have equipped your first weapon! Return to the Young Soldier for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 5
    $questNumber = '5';
    if ($row['quest'.$questNumber.'']=='1') {
        $questTag = 'Item Collect lvl 2-5';
        $questTitle = 'Collect 5 Scorpion Tails';
        $questDesc = 'Take your shiny new sword and go slay some Scorpions in the Spider Cave east of here. Return with 5 tails and receive your first Gold Key!';
        $color='gold';
        if ($row['scorpiontail']>='5') {
            $color='green';
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';

        if ($row['quest'.$questNumber.'']=='1' && $row['scorpiontail']<'5') {
            echo '<h5 class="padd">';
            if ($row['scorpiontail']>=1) {
                echo $checkedBox.' ';
            } else {
                echo $checkBox.' ';
            }
            if ($row['scorpiontail']>=2) {
                echo $checkedBox.' ';
            } else {
                echo $checkBox.' ';
            }
            if ($row['scorpiontail']>=3) {
                echo $checkedBox.' ';
            } else {
                echo $checkBox.' ';
            }
            if ($row['scorpiontail']>=4) {
                echo $checkedBox.' ';
            } else {
                echo $checkBox.' ';
            }
            if ($row['scorpiontail']>=5) {
                echo $checkedBox.' ';
            } else {
                echo $checkBox.' ';
            }
            echo ' Collect 5 Scorpion Tails</h5>';
            echo '<i> (Scorpions can be found in the Spider Cave)</i>';
        }
        if ($row['quest'.$questNumber.'']=='1' && $row['scorpiontail']>='5') {
            echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.$checkedBox.$checkedBox.' You have collected 5 Scorpion Tails! Return to the Young Soldier for your reward.</h5>';

            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }




        echo '</div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 6
    $questNumber = '6';
    if ($row['quest'.$questNumber.'']=='1') {
        $questTag = 'Item Collect lvl 6';
        $questTitle = 'Training Armor Pro';
        $questDesc = 'Find the rest of the training equipment. The 4 armor pieces are dropped by specific enemies. Collecting all 4 pieces will reward you with upgraded armor.';
        $color='gold';
        $questflag='0';
        if ($row['traininghelmet'] >= '1'
          && $row['trainingarmor'] >= '1'
          && $row['traininggloves'] >= '1'
          && $row['trainingboots'] >= '1') {
            $color='green';
            $questflag = "1";
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';
        if ($row['quest'.$questNumber.'']=='1' && $questflag=='0') {
            echo '<h5 class="padd">Find the rest of the training equipment:</h5>';

            echo '<h6>';
            if ($row['traininghelmet']>=1) {
                echo $checkedBox;
            } else {
                echo $checkBox;
            }
            echo ' Training Helmet - <span class="gray">Sand Crab Drop</span></h6>';
            echo '<h6>';
            if ($row['trainingarmor']>=1) {
                echo $checkedBox;
            } else {
                echo $checkBox;
            }
            echo ' Training Armor - <span class="gray">Gator Drop</span></h6>';
            echo '<h6>';
            if ($row['traininggloves']>=1) {
                echo $checkedBox;
            } else {
                echo $checkBox;
            }

            echo ' Training Gloves - <span class="gray">Spider Drop</span></h6>';
            echo '<h6>';
            if ($row['trainingboots']>=1) {
                echo $checkedBox;
            } else {
                echo $checkBox;
            }
            echo ' Training Boots - <span class="gray">Scorpion Drop</span></h6>';
        }
        if ($row['quest'.$questNumber.'']=='1' && $questflag=='1') {
            echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.$checkedBox.' You have collected all the pieces of the Training Armor set. Return to the Young Soldier for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    }

    echo '</div>'; //-end gbox


















    echo '<div class="gbox">';
    if ($row['chest1']=='0') {
        // ------------------------------------- FIND GOLD CHEST 1
        echo '<h3 class="gold">Open the Gold Chest</h3>';
        echo '<h4 class="">Grassy Field</h4>';
        if ($row['goldkey']=='0') {
            echo '<span class="icon npc gold">'.file_get_contents("img/svg/chest2.svg").'</span>';
        }
        if ($row['goldkey']>='1') {
            echo '<span class="icon npc gold">'.file_get_contents("img/svg/key.svg").'</span>';
        }
        echo '<p class="gray">Gold Chests hold the best loot. Unlock the chest at the Grassy Field Crossroads. You can get a key by completing the Young Soldier\'s quests.</p>';
        if ($row['goldkey']=='0') {
            echo '<h5 class="gslice">'.$checkBox.' Get a Gold Key from the Young Soldier</h5>';
        }
        if ($row['goldkey']>='1') {
            //  echo '<i class="icon gold checkbox">'.file_get_contents("img/svg/key.svg").'</i>';

            echo '<h5 class="gslice green">'.$checkedBox.' You have a Gold Key! Open the gold chest at the Grassy Field Crossroads.</h5>';

//            echo '<h5 class="gslice green"><i class="icon gold checkbox">'.file_get_contents("img/svg/key.svg").'</i> You have a Gold Key! Open the gold chest at the Grassy Field Crossroads.</h5>';
        }
    }
    echo '</div>'; //-end gbox







    /////
    /////
    /////
    /////
    /////


    // ----------------------------------------- 1-3
    if ($row['quest1']=='1' || $row['quest2']=='1' || $row['quest3']=='1') {
        echo '<h4 class="brown">Old Man</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 1

        $questTitle = '1) A Flower for my Wife';
        $questType = '<span class="questLvlBox">lvl 1 item find</span>';
        $questDesc = '<p>Pick a flower north of the cabin and bring it to the Old Man.</p>';
        $questComplete = '<p>You have a Flower! Return to the Old Man for your reward.</p>';
        if ($row['quest1']=='1' && $row['flower']>='1') {
            echo '<h3 class="green">'.$checkedBox.' '.$questTitle.' '.$questType.'</h3> '.$questComplete;
        } elseif ($row['quest1']=='1') {
            echo '<h3>'.$checkBox.' '.$questTitle.' '.$questType.' </h3> '.$questComplete;
            if ($row['flower']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Pick Flower<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 2
        if ($row['quest2']=='1' && $row['KLdummy']>='1') {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>2) Practice on the Dummy</h3>
	<p>You have attacked the Wooden Dummy! Return to the Old Man for your reward.</p>';
        } elseif ($row['quest2']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>2) Practice on the Dummy<span class="questLvlBox">lvl 1</span> </h3>

	  	<p>Attack the training dummy in the cabin. When you attack you will do random damage between 1 and your STR stat.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo 'Attack dummy in cabin<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 3
        if ($row['quest3']=='1' && $row['KLgiantrat']>='1') {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>3) Rat Problem</h3>
	<p>You have exterminated out a Giant Rat! Return to the Old Man for your reward.</p>';
        } elseif ($row['quest3']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>3) Rat Problem	<span class="questLvlBox">lvl 3</span></h3>
	  	<p>Go down into the basement and exterminate a Giant Rat. Visit the Young Soldier to the west to get a weapon first if you haven\'t yet.</p>';
            if ($row['KLgiantrat']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Giant Rat<br>';
        }
    }
    // ----------------------------------------- 4-6
    if ($row['quest4']=='1' || $row['quest5']=='1' || $row['quest6']=='1') {
        echo '<h4 class="brown">Young Soldier</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 4
        if ($row['quest4']=='1' && (($equipR == 'training sword' && $equipL == 'training shield') || $equipR=='training 2h sword')) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>4) My First Sword and Shield</h3>
	  <p>You have equipped your new training equipment! Return to the Young Soldier for your reward.</p>';
        } elseif ($row['quest4']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>4) My First Sword and Shield <span class="questLvlBox">item collect & equip</span> </h3>
	  		<p>Pick up the training equipment at the Young Soldier\'s Training Area. Equip them using WEAP menu above.</p>';

            if (($row['trainingsword']>=1 && $row['trainingshield']>=1) || $row['training2hsword']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Pick up Training Equipment<br>';
            if ($row['wood']>=10000) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Equip Training Sword/Shield or 2h Sword<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 5
        if ($row['quest5']=='1' && $row['scorpiontail']>='5') {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>5) Collect 5 Scorpion Tails</h3>
		<p>You have collected 5 Scorpion Tails! Return to the Young Soldier for your reward.</p>';
        } elseif ($row['quest5']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>5) Collect 5 Scorpion Tails<span class="questLvlBox">lvl 2-10 <span class="gold">Gold Key Quest</span></span></h3>
		   <p>Scorpions can be found in the Spider Cave. Defeat them to collect Scorpion Tails.</p>';
            echo 'Scorpion Tails:<br>';
            if ($row['scorpiontail']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['scorpiontail']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['scorpiontail']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['scorpiontail']>=4) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['scorpiontail']>=5) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 6
        if ($row['quest6']=='1' && (
            $row['traininghelmet'] >= '1'
    && $row['trainingarmor'] >= '1'
    && $row['traininggloves'] >= '1'
    && $row['trainingboots'] >= '1'
        )) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>6) Training Armor Pro</h3>
	<p>You have collected the rest of the Training Equipment! Return to the Young Soldier for your reward.</p>';
        } elseif ($row['quest6']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>6) Training Armor Pro <span class="questLvlBox">lvl 5 item collect</span> </h3>
	  	<p>Find the rest of the training equipment.</p>';
            if ($row['traininghelmet']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Training Helmet - Sand Crab Drop<br>';
            if ($row['trainingarmor']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Training Armor - Gator Drop<br>';
            if ($row['traininggloves']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Training Gloves - Spider Drop<br>';
            if ($row['trainingboots']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Training Boots - Scorpion Drop<br>';
        }
    }

    // ----------------------------------------- FIRST GOLD CHEST
    if ($row['goldkey']>='1' && $row['quest5']>='2' && $row['chest1']=='0') {
        echo '<div class="questhead"><i class="px60 fa fa-key "><br></i><h5 class="px30">Grassy Field Gold Chest </h5> <h5 class="lightgray">OPEN IT!</h5></div>';
    }

    // ----------------------------------------- 7-9
    if ($row['quest7']=='1' || $row['quest8']=='1' || $row['quest9']=='1') {
        echo '<h4 class="green"><i class="fa fa-user"></i> Jack Lumber</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 7
        if ($row['quest7']=='1' && $row['batwing']>='5') {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>7) Boomerang Some Bats</h3>
<p>You have 5 Bat Wings! Return to Jack for your reward.</p>';
        } elseif ($row['quest7']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>7) Boomerang Some Bats <span class="questLvlBox">lvl 6 item collect</span> </h3>
	  	<p>Equip your Boomerang (or any ranged weapon) and head to the Bat Cave to collect Bat Wings.</p>';
            echo 'Bat Wings:<br>';
            if ($row['batwing']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['batwing']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['batwing']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['batwing']>=4) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['batwing']>=5) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }

        // ----------------------------------------- IN PROGRESS - QUEST 8
        if ($row['quest8']=='1' && $row['craftingtable']>='1') {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>8) Chop some Wood, Craft a Table</h3>
	 <p>You crafted a Table! Return to Jack to get your reward.</p>';
        } elseif ($row['quest8']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>8) Chop some Wood, Craft a Table <span class="questLvlBox">craft</span> </h3>
	   	<p>Chop 3 wood and then use the CRAFT menu to create a table.</p>';
            if ($row['wood']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Chop Wood<br>';
            if ($row['wood']>=1000) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Craft a Table<br>';
        }

        // ----------------------------------------- IN PROGRESS - QUEST 9
        if ($row['quest9']=='1' && $row['KLgoblinchief']>='1') {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>9) Goblin Chief Bounty</h3>
	<p>You have defeated the Goblin Chief! Turn to Jack for your reward.</p>';
        } elseif ($row['quest9']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>9) Goblin Chief Bounty <span class="questLvlBox">lvl 10</span> </h3>
	   	<p>Find and eliminate the Goblin Chief hiding out in the Bat Cave.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="lightbrown">Goblin Chief</span> lvl 10 - 120 hp - 20 att - 10 def<br>';
        }
    }


    // ----------------------------------------- GRAND QUEST 1 - finished - GO TO GRAND PILLAR
    if ($row['quest1']=='2' && $row['quest2']=='2' && $row['quest3']=='2' && $row['quest4']=='2' && $row['quest5']=='2' && $row['quest6']=='2' && $row['quest7']=='2' && $row['quest8']=='2' && $row['quest9']=='2'  && $row['quest10']=='2' && $row['grandquest1']=='1') {
        echo '<div class="questhead"><i class="px60 fa fa-star-o "><br></i><h5>MISSIONS 1-10 COMPLETED!</h5><h5 class="px20 lightgray"> Return to the GRAND QUEST PILLAR for your reward.</h5>( 2 spaces north of Grassy Field Crossroad )</div>';
    }
    // ----------------------------------------- GRAND QUEST 1 - END


    // ----------------------------------------- 10
    if ($row['quest10']=='1') {
        echo '<h4 class="brown">Freddie\'s Cow Farm</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 10
        if ($row['quest10']=='1' && ($row['leatherhood'] >= 1 ||
                $row['leatherhelmet'] >= 1 ||
                $row['leathervest'] >= 1 ||
                $row['leatherarmor'] >= 1 ||
                $row['leathergloves'] >= 1 ||
                $row['leatherboots'] >= 1)) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>10) Craft with Leather</h3>
				<p>You have crafted a piece of Leather Equipment! Return to the Freddie\'s Farm to collect your reward.</p>';
        } elseif ($row['quest10']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>10) Craft with Leather <span class="questLvlBox">lvl 4 craft</span> </h3>

	  		<p>Craft some leather equipment using the leather from Freddie\'s cows.</p>';

            if ($row['leather']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Collect Leather from Cows</br>';
            if ($row['leather']>=1000) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Craft a Piece of Leather Equipment</br>';
        }
    }



    // ----------------------------------------- 11-13
    if ($row['quest11']=='1' || $row['quest12']=='1' || $row['quest13']=='1') {
        echo '<h4 class="red">Red Guard Captain</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 11
        if ($row['quest11']=='1' && $row['KLthief']>=3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>11) Bring 3 Thieves to Justice</h3>
	<p>You have brought 3 Thieves to justice! Return to the Red Guard Captain to collect your reward.</p>';
        } elseif ($row['quest11']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>11) Bring 3 Thieves to Justice <span class="questLvlBox">lvl 5, random encounter</span> </h3>
	   	<p>You will encounter thieves as you travel about. Return when you have brought 3 to justice.</p>';
            if ($row['KLthief']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Thieves - '.$row['KLthief'].'/3 <br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 12
        if ($row['quest12']=='1' && $row['longsword']>='5') {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>12) Swords for the Red Guard</h3>
	 <p>You have 5 Long Swords! Return to the Red Guard Captain to collect your reward.</p>';
        } elseif ($row['quest12']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>12) Swords for the Red Guard	<span class="questLvlBox">item collect</span> </h3>
	   	<p>Buy or find 5 long swords. Alpha Scorpions, Orcs, Kobolds & Tarantulas drop them. Adam and Michael sell them.</p>';
            if ($row['longsword']>=5) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Long Swords - '.$row['longsword'].'/5 <br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 13
        if ($row['quest13']=='1' && $row['KLtarantula']>=1 && $row['KLsewerrat']>=1 && $row['KLredgator']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>13) Sewer Pest Control</h3>
	<p>You have defeated a Tarantula, a Sewer Rat and a Red Gator! Return to the Red Guard Captain to collect your reward.</p>';
        } elseif ($row['quest13']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>13) Sewer Pest Control	<span class="questLvlBox">lvl 7-10</span> </h3>
	  	<p>Kill a Tarantula, a Sewer Rat and a Red Gator in the Sewers below Red Town.</p>';
            if ($row['KLtarantula']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Tarantula<br>';
            if ($row['KLsewerrat']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Sewer Rat<br>';
            if ($row['KLredgator']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Red Gator<br>';
        }
    }

    // ----------------------------------------- 14-16
    if ($row['quest14']=='1' || $row['quest16']=='1') {
        echo '<h4 class="green">Forest Gnome</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 14
        if ($row['quest14']=='1' && ($row['blueberry']>=20 && $row['redberry']>=20)) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>14) Gnome Needs Berries</h3>
	<p>You have 20 redberries and 20 blueberries! Return to the Forest Gnome for your reward.</p>';
        } elseif ($row['quest14']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>14) Gnome Needs Berries <span class="questLvlBox">item collect</span></h3>
	   	<p>The Tree Gnome needs some berries. Return with 20 red and 20 blue.</p>';
            if ($row['redberry']>=20) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="red">Redberry</span> - '.$row['redberry'].'/20 <br>';
            if ($row['blueberry']>=20) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="blue">Blueberry</span> - '.$row['blueberry'].'/20 <br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 15
        if ($row['quest15']=='1' && $row['wood']>=20) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>15) New Tree Hut Door</h3>
	<p>You have 20 pieces of wood! Return to the Forest Gnome for your reward.</p>';
        } elseif ($row['quest15']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>15) New Tree Hut Door <span class="questLvlBox">item collect</span> </h3>
	  	<p>The Tree Gnome needs a new door for his hut. Go collect 20 wood for him.</p>';
            if ($row['wood']>=20) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="lightbrown">Wood</span> - '.$row['wood'].'/20 <br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 16
        if ($row['quest16']=='1' && $row['KLtroll'] >= 3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>16) Troll Base Camp</h3>
	 <p>You have defeated 3 Trolls! Return to the Forest Gnome for your reward.</p>';
        } elseif ($row['quest16']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>16) Troll Base Camp <span class="questLvlBox">lvl 13</span> </h3>
	  	<p>Trolls guard the gate to the Dark Forest up north. Go slay 3 of them and return for a reward.</p>';
            if ($row['KLtroll']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="green">Trolls</span> - '.$row['KLtroll'].'/3 <br>';
        }
    }



    // ----------------------------------------- 17-18
    if ($row['quest17']=='1' || $row['quest18']=='1') {
        echo '<h4 class="green">Hunter Bill</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 17
        if ($row['quest17']=='1' && $row['KLbigfoot']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>17) Bigfoot Sighting</h3>
	<p>You\'ve found Bigfoot! Return to Hunter Bill for your reward.</p>';
        } elseif ($row['quest17']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>17) Bigfoot Sighting 	<span class="questLvlBox">lvl 13 rscoandom encounter</span> </h3>
	  	<p>Bigfoot is rarely seen. Explore the Forest and he will eventually show up.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="lightbrown">Bigfoot</span> lvl 13 - 200 hp - 40 att - 15 def<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 18
        if ($row['quest18']=='1' && ($row['KLwildboar'] >= 1 &&
                $row['KLwolf'] >= 1 &&
                $row['KLcoyote'] >= 1 &&
                $row['KLbuck'] >= 1 &&
                $row['KLbear'] >= 1 &&
                $row['KLstag'] >= 1)) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>18) Forest Hunter</h3>
				<p>You have successfully hunted all the creatures in the Forest! Return to Hunter Bill for your reward.</p>';
        } elseif ($row['quest18']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>18) Forest Hunter <span class="questLvlBox">lvl 5-9 <span class="gold">Gold Key Quest</span></span> </h3>
	  	<p>Hunt down a Wild Boar, Wolf, Coyote, Buck, Bear & Stag.</p>';
            if ($row['KLwildboar']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Wild Boar<br>';
            if ($row['KLwolf']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Wolf<br>';
            if ($row['KLcoyote']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Coyote<br>';
            if ($row['KLbuck']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Buck<br>';
            if ($row['KLbear']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Bear<br>';
            if ($row['KLstag']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Stag<br>';
        }
    }


    // ----------------------------------------- 19
    if ($row['quest19']=='1') {
        echo '<h4 class="blue">Warrior\'s Guild </h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 19
        if ($row['quest19']=='1' && $row['KLogrelieutenant'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>19) Warrior\'s Initiation</h3>
	 <p>You have defeated the Ogre Lieutenant. Return to the Warrior\'s Guild to Join!</p>';
        } elseif ($row['quest19']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>19) Warrior\'s  Initiation <span class="questLvlBox">lvl 13</span> </h3>
	   	<p>Defeat the Ogre Lair Boss to join.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="blue">Ogre Lieutenant</span> lvl 13 - 250 hp - 35 att - 20 def<br>';
        }
    }

    // ----------------------------------------- 20
    if ($row['quest20']=='1') {
        echo '<h4 class="purple">Wizard\'s Guild </h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 20
        if ($row['quest20']=='1' && $row['KLkoboldmaster'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>20) Wizard\'s Initiation</h3>
	 <p>You have defeated the Kobold Master. Return to the Wizard\'s Guild to Join!</p>';
        } elseif ($row['quest20']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>20) Wizard\'s  Initiation	<span class="questLvlBox">lvl 13</span> </h3>
	  	<p>Defeat the Kobold Lair boss to join.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="lightpurple">Kobold Master</span> lvl 13 - 80 hp - 40 att - 50 def<br>';
        }
    }


    // ----------------------------------------- 21-23
    if ($row['quest21']=='1' || $row['quest23']=='1') {
        echo '<h4 class="red">Town Hall Plaza</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 21
        if ($row['quest21']=='1' && $row['flower']>=2) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>21) Twice as Nice </h3>
	<p>You have 2 flowers! Return to Red Town Plaza for your reward.</p>';
        } elseif ($row['quest21']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>21) Twice as Nice <span class="questLvlBox">item collect</span></h3>
	  	<p>Pick 2 flowers: One from the Grassy Field and one from the Babylon Gardens.</p>';
            if ($row['flower']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Flower 1 ( Grassy Field )<br>';
            if ($row['flower']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Flower 2 ( Red Town Gardens )<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 22
        if ($row['quest22']=='1' && $row['cookedmeat']>=5) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>22) Cookin up some Meat-a-balls</h3>
	<p>You have 5 pieces of cooked meat! Return to Red Town Plaza for your reward.</p>';
        } elseif ($row['quest22']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>22) Cookin up some Meat-a-balls  <span class="questLvlBox">item collect</span> </h3>
	  	<p>Collect 5 pieces of cooked meat and the chef will teach you how to cook meatballs.</p>';
            if ($row['cookedmeat']>=5) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="red">Cooked Meat</span> - '.$row['cookedmeat'].'/5 <br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 23
        if ($row['quest23']=='1' && $row['KLmasterthief'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>23) Stolen Teddy Bear</h3>
	 <p>You have defeated the Master Thief! Return to Red Town Plaza for your reward.</p>';
        } elseif ($row['quest23']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>23) Stolen Teddy Bear <span class="questLvlBox">lvl 14</span> </h3>
		<p>Retrieve little Suzie\'s stolen stuffed animal by defeating the Master Thief. You can find him in the Thieve\'s Den down in the Sewers.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="yellow">Master Thief</span> lvl 14 - 200 hp - 45 att - 10 def<br>';
        }
    }


    // ----------------------------------------- 24
    if ($row['quest24']=='1') {
        echo '<h4 class="red">Red Town Mayor</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 24
        if ($row['quest24']=='1' && $row['KLscorpionking'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>24) Scorpion King Bounty</h3>
	 <p>You have defeated the Scorpion King. Return to the Red Town Mayor for your reward!</p>';
        } elseif ($row['quest24']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>24) Scorpion King Bounty  <span class="questLvlBox">lvl 30 <span class="gold">Gold Key Quest</span></span> </h3>
	  	<p>Defeat the Scorpion King in his lair below the Spider Cave.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="red">Scorpion King</span> lvl 30 - 500 hp - 100 att - 80 def<br>';
        }
    }




    // ----------------------------------------- 25-27
    if ($row['quest25']=='1' || $row['quest26']=='1' || $row['quest27']=='1') {
        echo '<h4 class="blue">Warrior Pete</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 25
        if ($row['quest25']=='1' && $row['KLskeletonknight']>=3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>25) Banish the Skeleton Knights </h3>
	<p>You have sent 3 Skeleton Knights back to hell! Return to Warrior Pete for your reward.</p>';
        } elseif ($row['quest25']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>25) Banish the Skeleton Knights <span class="questLvlBox">lvl 10</span> </h3>
	   <p>Send 3 Skeleton Knights back to Hell. Find them down in the Sewer Catacombs. </p>';
            echo 'Skeleton Knights: ';
            if ($row['KLskeletonknight']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLskeletonknight']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLskeletonknight']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 26
        if ($row['quest26']=='1' && $row['KLgreatwhite']>=1 && $row['KLhammerhead']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>26) Shark Hunter</h3>
	<p>You have defeated a Great White and Hammerhead! Return to Warrior Pete for your reward.</p>';
        } elseif ($row['quest26']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>26) Shark Hunter <span class="questLvlBox">lvl 20</span></h3>
	   	<p>Travel under the Blue Ocean and hunt down a Great White and Hammerhead Shark.</p>';
            if ($row['KLgreatwhite']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Great White<br>';
            if ($row['KLhammerhead']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Hammerhead<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 27
        if ($row['quest27']=='1' && $row['KLtrollchampion'] >= 3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>27) True Troll Champion</h3>
	 <p>You have defeated 3 Troll Champions! Return to Warrior Pete for your reward.</p>';
        } elseif ($row['quest27']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>27) True Troll Champion <span class="questLvlBox">lvl 35</span></h3>
		<p>Defeat 3 Troll Champions in the Dark Forest.</p>';
            echo 'Troll Champions: ';
            if ($row['KLtrollchampion']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLtrollchampion']>=2) {
                echo '<i cclass="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLtrollchampion']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }
    }



    // ----------------------------------------- 28-30
    if ($row['quest28']=='1' || $row['quest29']=='1' || $row['quest30']=='1') {
        echo '<h4 class="purple">Wizard Morty</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 28
        if ($row['quest28']=='1' && $row['graymatter']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>28) Rare Gray Matter </h3>
	<p>You have a piece of Gray Matter! Return to Wizard Morty for your reward.</p>';
        } elseif ($row['quest28']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>28) Rare Gray Matter <span class="questLvlBox">lvl 7+ random encounter</span> </h3>
	   <p>Find a piece of gray matter and show it to Morty. Gray Matter is dropped by rare creatures.</p>';
        }


        // ----------------------------------------- IN PROGRESS - QUEST 29
        if ($row['quest29']=='1' && $row['KLomar']>=1 && $row['KLvictoria']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>29) Omar & Victoria the Dead</h3>
	<p>You have defeated Omar & Victoria! Return to Wizard Morty for your reward.</p>';
        } elseif ($row['quest29']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>29) Omar & Victoria the Dead  <span class="questLvlBox">lvl 17 double boss</span> </h3>
	  <p>Defeat the undead duo down in the Catacombs.</p>';
            if ($row['KLvictoria']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="purple">Victoria the Dead</span> lvl 17 - 250 hp - 50 att - 15 def - (mage)<br>';
            if ($row['KLomar']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="white">Omar the Dead</span> lvl 17 - 250 hp - 60 att - 30 def<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 30
        if ($row['quest30']=='1' && $row['KLtrollqueen'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>30) Magic of the Troll Queen</h3>
	 <p>You have defeated the Troll Queen! Return to Wizard Morty for your reward.</p>';
        } elseif ($row['quest30']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>30) Magic of the Troll Queen <span class="questLvlBox">lvl 40</span> </h3>
	   	<p>Slay the Troll Queen with magic. She can be found all the way north in the Dark Forest.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="green">Troll Queen</span> lvl 40 - 600 hp - 120 att - 60 def<br>';
        }
    }



    // ----------------------------------------- 31
    if ($row['quest31']=='1') {
        echo '<h4 class="brown">Mining Guild </h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 31
        if ($row['quest31']=='1' && $row['KLkraken'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>31) Mining Guild Initiation</h3>
	 <p>You have defeated the Kraken. Return to the Mining Guild to Join!</p>';
        } elseif ($row['quest31']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>31) Mining Guild Initiation <span class="questLvlBox">lvl 25</span> </h3>
	   	<p>Defeat the mighty Kraken found under the Blue Ocean to join the Mining Guild.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="green">Kraken</span> lvl 25 - 400 hp - 80 att - 40 def<br>';
        }
    }


    // ----------------------------------------- 32-34
    if ($row['quest32']=='1' || $row['quest34']=='1') {
        echo '<h4 class="brown">Mining Guild Headquarters</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 32
        if ($row['quest32']=='1' && $row['KLphoenix']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>32) Iron Boss </h3>
	<p>You have defeated the Phoenix! Return to the Mining Guild to craft with Iron.</p>';
        } elseif ($row['quest32']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>32) Iron Boss <span class="questLvlBox">lvl 30</span> </h3>
	   		<p>Defeat the Phoenix to learn how to craft with Iron.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="red">Phoenix</span> lvl 30 - 500 hp - 100 att - 50 def - (flies, mage) <br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 33
        if ($row['quest33']=='1' && $row['KLcyclops']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>33) Steel Boss</h3>
	<p>You have defeated the Cyclops! Return to the Mining Guild to craft with Steel.</p>';
        } elseif ($row['quest33']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>33) Steel Boss <span class="questLvlBox">lvl 40</span> </h3>
	    	<p>Defeat the Cyclops to learn how to craft with Steel.</p>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 34
        if ($row['quest34']=='1' && $row['KLminotaur'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>34) Mithril Boss</h3>
	 <p>You have defeated the Minotaur! Return to the Mining Guild to craft with Mithril.</p>';
        } elseif ($row['quest34']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>34) Mithril Boss 	<span class="questLvlBox">lvl 60</span> </h3>
	   		<p>Defeat the Minotaur to learn how to craft with Mithril.</p>';
        }
    }



    // ----------------------------------------- 35-37
    if ($row['quest35']=='1' || $row['quest36']=='1' || $row['quest37']=='1') {
        echo '<h4 class="red">Dwarf Captain</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 35
        if ($row['quest35']=='1' && $row['KLrabidskeever']>=1 && $row['KLbleedingdartwing']>=1 && $row['KLmongoliandeathworm']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>35) Clear out the Abandoned Mine </h3>
	<p>You have cleared out the Abandoned Mine! Return to the Dwarf Captain for your reward.</p>';
        } elseif ($row['quest35']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>35) Clear out the Abandoned Mine <span class="questLvlBox">lvl 15-23 <span class="gold">Gold Key Quest</span></span> </h3>
	   <p>Eliminate the mutated creatures that have overrun the Abandoned Mine.</p>';
            if ($row['KLrabidskeever']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Rabid Skeever<br>';
            if ($row['KLbleedingdartwing']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Bleeding Dartwing<br>';
            if ($row['KLmongoliandeathworm']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="green">Mongolian Death Worm</span> lvl 23 - 600 hp - 70 att - 10 def<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 36
        if ($row['quest36']=='1' && $row['KLglowingoctopus']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>36) Glowing Sea Monster</h3>
	<p>You have defeated the rare Glowing Octopus! Return to the Dwarf Captain for your reward.</p>';
        } elseif ($row['quest36']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>36) Glowing Sea Monster <span class="questLvlBox">random underwater encounter</span></h3>
	   <p>Find the rare fabled glowing monster under the Blue Ocean.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '???<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 37
        if ($row['quest37']=='1' && $row['KLpossessedaxeman'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>37) Missing Dwarf Axeman</h3>
	 <p>You have found the missing Axeman! Return to the Dwarf Captain for your reward.</p>';
        } elseif ($row['quest37']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>37) Missing Dwarf Axeman <span class="questLvlBox">lvl 25</span> </h3>
	   		<p>A dwarf guard axeman is missing from town. He was last seen patrolling the Stone Grotto.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="lightblue">Possessed Axeman</span> lvl 25 - 600 hp - 70 att - 30 def<br>';
        }
    }



    // ----------------------------------------- 38-40
    if ($row['quest38']=='1' || $row['quest40']=='1') {
        echo '<h4 class="red">Dwarf Guard Bounty Board</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 38
        if ($row['quest38']=='1' && $row['KLredbeard']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>38) Red Beard Bounty </h3>
		<p>You have defeated Red Beard! Return to the Dwarf Guard for your reward.</p>';
        } elseif ($row['quest38']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>38) Red Beard Bounty <span class="questLvlBox">lvl 30</span> </h3>
	   	<p>Defeat Captain Red Beard. His Fort can be found in the Rocky Plains.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="red">Red Beard</span> lvl 30 - 600 hp - 90 att - 40 def<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 39
        if ($row['quest39']=='1' && $row['KLtrollking']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>39) Troll King Bounty</h3>
		<p>You have defeated the Troll King! Return to the Dwarf Guard for your reward.</p>';
        } elseif ($row['quest39']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>39) Troll King Bounty <span class="questLvlBox">lvl 45</span> </h3>
	    	<p>Defeat the Troll King in the Dark Forest.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="green">Troll King</span> lvl 45 - 800 hp - 160 att - 80 def<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 40
        if ($row['quest40']=='1' && $row['KLgatekeeper'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>40) Gatekeeper Bounty</h3>
		<p>You have defeated the Gatekeeper! Return to the Dwarf Guard for your reward.</p>';
        } elseif ($row['quest40']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>40) Gatekeeper Bounty	<span class="questLvlBox">lvl 55</span> </h3>
	   	 	<p>Defeat the Gatekeeper guarding the Stone Bridge in the Mountains.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="black">Gatekeeper</span> lvl 55 - 4000 hp - 200 att - 100 def<br>';
        }
    }



    // ----------------------------------------- 41-43
    if ($row['quest41']=='1' || $row['quest42']=='1' || $row['quest43']=='1') {
        echo '<h4 class="blue">Friendly Pirate</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 41
        if ($row['quest41']=='1' && $row['KLsquid']>=3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>41) Like a Squid</h3>
		<p>You have hunted down 3 Squid! Return to the Friendly Pirate for your reward.</p>';
        } elseif ($row['quest41']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>41) Like a Squid	<span class="questLvlBox">lvl 13</span> </h3>
	   <p>Squid have been seen swimming all over the Blue Ocean. Hunt down 3 of them.</p>';
            echo 'Squids:<br>';
            if ($row['KLsquid']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLsquid']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLsquid']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 42
        if ($row['quest42']=='1' && $row['KLmudcrab']>=20) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>42) Mud Crab Extermination</h3>
		<p>You have hunted down 20 mud crabs! Return to the Friendly Pirate for your mud reward.</p>';
        } elseif ($row['quest42']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>42) Mud Crab Extermination <span class="questLvlBox">lvl 6 exterminate</span> </h3>
	    	<p>Mud Island has been overrun by Crabs! Exterminate 20 of them.</p>';
            echo 'Mud Crabs:<br>';
            if ($row['KLmudcrab']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=4) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=5) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=6) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=7) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=8) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=9) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=10) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=11) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=12) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=13) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=14) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=15) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=16) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=17) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=18) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=19) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLmudcrab']>=20) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }

        // ----------------------------------------- IN PROGRESS - QUEST 43
        if ($row['quest43']=='1' &&
     ($row['KLjellyfish'] >= 1 && $row['KLelectriceel'] >= 1 && $row['KLpiranha'] >= 1 && $row['KLbarracuda'] >= 1 && $row['KLcrocodile'] >= 1)) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>43) Ocean Hunter Pro</h3> You have defeated a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile! Return to the Friendly Pirate for your reward.</br>
';
        } elseif ($row['quest43']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>43) Ocean Hunter Pro <span class="questLvlBox">lvl 10-25 <span class="gold">Gold Key Quest</span></span> </h3>

	  		Defeat a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile. All found in the Ocean.<br>
';
            if ($row['KLjellyfish']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Jellyfish<br>';
            if ($row['KLelectriceel']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Electric Eel<br>';

            if ($row['KLpiranha']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Piranha<br>';
            if ($row['KLbarracuda']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Barracuda<br>';
            if ($row['KLcrocodile']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Crocodile<br>';
        }
    }


    // ----------------------------------------- 44-46
    if ($row['quest44']=='1' || $row['quest45']=='1' || $row['quest46']=='1') {
        echo '<h4 class="green">Jungle Jim</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 44
        if ($row['quest44']=='1' && $row['flower']>=3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>44) Third Times a Charm</h3>
		<p>You have collected 3 flowers! Return to Jungle Jim for your reward.</p>';
        } elseif ($row['quest44']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>44) Third Times a Charm  <span class="questLvlBox">underwater collect</span> </h3>
	   <p>Find a 3rd flower in a secret compartment under the ocean. REMEMBER! collect the first 2 flowers before you attempt to collect the 3rd! or you will waste a trip underwater.</p>';
            if ($row['flower']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Flower 1 ( Grassy Field )<br>';
            if ($row['flower']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Flower 2 ( Red Town Gardens )<br>';
            if ($row['flower']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Flower 3 ( Under the Ocean)<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 45
        if ($row['quest45']=='1' && $row['KLhawk']>=1 && $row['KLalbatross']>=1 && $row['KLfalcon']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>45) Angry Birds</h3>
		<p>You have hunted down the angry birds! Return to the Jungle Jim for your reward.</p>';
        } elseif ($row['quest45']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>45) Angry Birds <span class="questLvlBox">lvl 9, 13, 25</span> </h3>
	   <p>Hunt down a Hawk, Albatross and a Falcon.</p>';
            if ($row['KLhawk']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Hawk ( Forest )<br>';
            if ($row['KLalbatross']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Albatross ( Blue Ocean )<br>';

            if ($row['KLfalcon']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Falcon ( Dark Forest )<br>';
        }

        // ----------------------------------------- IN PROGRESS - QUEST 46
        if ($row['quest46']=='1' &&

        (
            ((($row['equipR'] == 'iron chakram' || $row['equipR'] == 'iron boomerang' || $row['equipR'] == 'iron dagger' || $row['equipR'] == 'iron sword' || $row['equipR'] == 'iron staff')
            && ($row['equipL'] == 'iron shield' || $row['equipL'] == 'iron kite shield'))
        ||
        ($row['equipR'] == 'iron maul' || $row['equipR'] == 'iron 2h sword' || $row['equipR'] == 'iron battlestaff' || $row['equipR'] == 'iron nunchaku' || $row['equipR'] == 'iron bow' || $row['equipR'] == 'iron crossbow'))
        && ($row['equipHead'] == 'iron helmet' || $row['equipHead'] == 'iron hood')
        && ($row['equipBody'] == 'iron armor' || $row['equipBody'] == 'iron cape')
        && ($row['equipHands'] == 'iron gloves' || $row['equipHands'] == 'iron gauntlets')
        && ($row['equipFeet'] == 'iron boots')
)

     ) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>46) Iron Warrior</h3>
		<p>You are a true Iron Warrior! Boss. Return to Jungle Jim for your reward.</p>';
        } elseif ($row['quest46']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>46) Iron Warrior <span class="questLvlBox">armor set collect</span> </h3>
	   		<p>Impress Jungle Jim in a full set of Iron Armor.</p>';
            if ($row['equipR']=='iron dagger' || $row['equipR'] == 'iron sword' || $row['equipR'] == 'iron staff' || $row['equipR'] == 'iron maul' || $row['equipR'] == 'iron 2h sword' || $row['equipR'] == 'iron battlestaff' || $row['equipR'] == 'iron nunchaku' || $row['equipR'] == 'iron boomerang' || $row['equipR'] == 'iron chakram' || $row['equipR'] == 'iron bow' || $row['equipR'] == 'iron crossbow') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Right<br>';

            if ($row['equipR']   == 'iron maul' || $row['equipR']   == 'iron 2h sword' || $row['equipR']   == 'iron battlestaff' || $row['equipR']   == 'iron nunchaku' || $row['equipR']   == 'iron bow' || $row['equipR']   == 'iron crossbow' || $row['equipL']   == 'iron shield' || $row['equipL']   == 'iron kite shield') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Left<br>';

            if ($row['equipHead']== 'iron helmet' || $row['equipHead'] == 'iron hood') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Head<br>';
            if ($row['equipBody'] == 'iron armor' || $row['equipBody'] == 'iron cape') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Body<br>';
            if ($row['equipHands'] == 'iron gloves' || $row['equipHands'] == 'iron gauntlets') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Hands<br>';
            if ($row['equipFeet'] == 'iron boots') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Feet<br>';
        }
    }


    // ----------------------------------------- 47-50
    if ($row['quest47']=='1' || $row['quest48']=='1' || $row['quest49']=='1' || $row['quest50']=='1') {
        echo '<h4 class="blue">Master Temple - Water Temple Guardian</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 47
        if ($row['quest47']=='1' && $row['KLthunderbarbarian']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>47) Test of Strength</h3>
		<p>You have defeated the Thunder Barbarian. Return to the Master Temple for your reward!</p>';
        } elseif ($row['quest47']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>47) Test of Strength <span class="questLvlBox">lvl 35</span> </h3>
	  	<p>Defeat the Thunder Barbarian at the Red Water Temple.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="red">Thunder Barbarian</span> lvl 35 - 500 hp - 100 att - 100 def - pureD, crit, pow<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 48
        if ($row['quest48']=='1' && $row['KLsmoothranger']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>48) Test of Dexterity</h3>
		<p>You have defeated the Smooth Ranger. Return to the Master Temple for your reward!</p>';
        } elseif ($row['quest48']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>48) Test of Dexterity <span class="questLvlBox">lvl 35</span> </h3>
	  	<p>Defeat the Smooth Ranger at the Green Water Temple.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="green">Smooth Ranger</span> lvl 35 - 500 hp - 150 att - 100 def - pureD, ranged, heal<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 49
        if ($row['quest49']=='1' && $row['KLcoralwizard']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>49) Test of Magic</h3>
		<p>You have defeated the Coral Wizard. Return to the Master Temple for your reward!</p>';
        } elseif ($row['quest49']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>49) Test of Magic	<span class="questLvlBox">lvl 35</span> </h3>
	  	<p>Defeat the Coral Wizard at the Blue Water Temple.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="blue">Coral Wizard</span> lvl 35 - 500 hp - 200 att - 100 def - pureD, mag, mag imm<br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 50
        if ($row['quest50']=='1' && $row['KLheavywalrus']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>50) Test of Defense</h3>
		<p>You have defeated the Heavy Walrus. Return to the Master Temple for your reward!</p>';
        } elseif ($row['quest50']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>50) Test of Defense <span class="questLvlBox">lvl 35</span> </h3>
	  	<p>Defeat the Heavy Walrus at the Yellow Water Temple.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="gold">Heavy Walrus</span> lvl 35 - 500 hp - 150 att - 150 def - pureD, bite<br>';
        }
    }

    // ----------------------------------------- 51-53
    if ($row['quest51']=='1' || $row['quest52']=='1' || $row['quest53']=='1') {
        echo '<h4 class="green">Dark Forest Outpost</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 51
        if ($row['quest51']=='1' && $row['KLbowman']>=5 && $row['KLhighwayman']>=5) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>51) Protect the Mountain Path</h3>
		<p>You have defeated 5 Highwaymen and 5 Bowmen! Return to the Ranger Guard at the Dark Forest Outpost for your reward!</p>';
        } elseif ($row['quest51']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>51) Protect the Mountain Path <span class="questLvlBox">lvl 23,25</span></h3>
	  	<p>Defeat 5 Highwaymen and 5 Bowmen. They can be found along the Mountain Path.</p>';
            echo 'Highwaymen:<br>';
            if ($row['KLhighwayman']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLhighwayman']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLhighwayman']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLhighwayman']>=4) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLhighwayman']>=5) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<br>Bowmen:<br>';
            if ($row['KLbowman']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLbowman']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLbowman']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLbowman']>=4) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLbowman']>=5) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 52
        if ($row['quest52']=='1' && $row['KLtrollelder']>=3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>52) Elder Slayer</h3>
		<p>You have slain 3 Troll Elders! Return to the Ranger Guard at the Dark Forest Outpost for your reward!</p>';
        } elseif ($row['quest52']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>52) Elder Slayer <span class="questLvlBox">lvl 30</span> </h3>
	   	<p>Defeat 3 Troll Elders in the Dark Forest</p>';
            echo 'Troll Elder: ';
            if ($row['KLtrollelder']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLtrollelder']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLtrollelder']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 53
        if ($row['quest53']=='1' && $row['KLlurker']>=1 && $row['KLwingeddemon']>=1 && $row['KLundeadorc']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>53) Dark Keep First Floor </h3>
	<p>You have cleared out first floor of the Dark Keep! Return to the Dwarf Captain for your reward!</p>';
        } elseif ($row['quest53']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>53) Dark Keep First Floor <span class="questLvlBox">lvl 30, 35, 45</span></h3>
		<p>Clear out the First Floor of the Dark Keep</p>';
            if ($row['KLlurker']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Lurker lvl 30<br>';
            if ($row['KLwingeddemon']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Winged Demon lvl 35<br>';
            if ($row['KLundeadorc']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Undead Orc lvl 45<br>';
        }
    }


    // ----------------------------------------- 54-56
    if ($row['quest54']=='1' || $row['quest55']=='1' || $row['quest56']=='1') {
        echo '<h4 class="green">Dark Elf - Tree Hut</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 54
        if ($row['quest54']=='1' && $row['wood']>=50) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>54) Dark Forest Lumberjack</h3>
		<p>You have gathered 50 wood! Return to the Dark Elf at his Tree Hut for your reward!</p>';
        } elseif ($row['quest54']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>54) Dark Forest Lumberjack	<span class="questLvlBox">collect wood</span> </h3>
		  <p>Collect 50 wood</p>';
            if ($row['wood']>=50) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<span class="lightbrown">Wood</span> - '.$row['wood'].'/50 <br>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 55
        if ($row['quest55']=='1' && $row['KLtrollshaman']>=1 && $row['KLtrollsorcerer']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>55) Shaman & Sorcerer Slayer</h3>
		<p>You have slain a Troll Shaman & Troll Sorcerer! Return to the Dark Elf at his Tree Hut for your reward!</p>';
        } elseif ($row['quest55']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>55)Shaman & Sorcerer Slayer  <span class="questLvlBox">lvl 20, 25 <span class="gold">Gold Key Quest</span></span> </h3>
		<p>Defeat a Troll Shaman and a Troll Sorcerer in the Dark Forest</p>';
            if ($row['KLtrollshaman']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Troll Shaman <br> ';
            if ($row['KLtrollsorcerer']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Troll Sorcerer ';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 56
        if ($row['quest56']=='1' && $row['KLent']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>56) Ent Hunter </h3>
	<p>You have defeated an elusive Ent! Return to the Dark Elf at his Tree Hut for your reward!</p>';
        } elseif ($row['quest56']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>56) Ent Hunter <span class="questLvlBox">lvl 30</span> </h3>
		<p>Find and Slay a Magical Ent in the Dark Forest</p>';
            if ($row['KLent']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Ent ';
        }
    }


    // ----------------------------------------- 57
    if ($row['quest57']=='1') {
        echo '<h4 class="green">Ranger\'s Guild </h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 57
        if ($row['quest57']=='1' && $row['KLdarkranger'] >= 1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>57) Ranger\'s Initiation</h3>
	 <p>You have defeated a Dark Ranger. Return to the Ranger\'s Guild to Join!</p>';
        } elseif ($row['quest57']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>57) Ranger\'s  Initiation <span class="questLvlBox">lvl 30</span> </h3>
	   	<p>Defeat a Dark Ranger to join.</p>';
            echo '<i class="gold px14 none fa fa-square-o "></i>';
            echo '<span class="green">Dark Ranger</span> lvl 30 - 400 hp - 100 att - 20 def<br>';
        }
    }


    // ----------------------------------------- 58-60
    if ($row['quest58']=='1' || $row['quest59']=='1' || $row['quest60']=='1') {
        echo '<h4 class="green">Ranger\'s Lego\'s Quests</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 58
        if ($row['quest58']=='1' && $row['KLwarturtle']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>58) Stubborn War Turtle</h3>
		<p>You have defeated the War Turtle! Return to Ranger Lego at the Ranger\'s Guild for your reward!</p>';
        } elseif ($row['quest58']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>58) Stubborn War Turtle <span class="questLvlBox">lvl 25</span> </h3>
	  <p>Defeat the stubborn War Turtle in the Neverending Mine. Blocks ranged attacks. </p>';
            if ($row['KLwarturtle']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'War Turtle ';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 59
        if ($row['quest59']=='1' && $row['KLwhitegargoyle']>=1 && $row['KLgreygargoyle']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>59) Gargoyle Hunter</h3>
		<p>You have slain a White Gargoyle and a Grey Gargoyle! Return to Ranger Lego at the Ranger\'s Guild for your reward!</p>';
        } elseif ($row['quest59']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>59) Gargoyle Hunter <span class="questLvlBox">lvl 35, 40</span></h3>
	   <p>Defeat a White Gargoyle and a Grey Gargoyle in the Dark Cathedral</p>';
            if ($row['KLwhitegargoyle']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'White Gargoyle <br> ';
            if ($row['KLgreygargoyle']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Grey Gargoyle ';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 60
        if ($row['quest60']=='1' && $row['KLgriffin']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>60) The Griffin </h3>
	<p>You have defeated the Griffin! Return to Ranger Lego at the Ranger\'s Guild for your reward!</p>';
        } elseif ($row['quest60']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>60) The Griffin <span class="questLvlBox">lvl 50</span></h3>
		<p>Slay the Griffin in the Neverending Mine</p>';
            if ($row['KLgriffin']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Griffin ';
        }
    }




    // ----------------------------------------- 61-63
    if ($row['quest61']=='1' || $row['quest62']=='1' || $row['quest63']=='1') {
        echo '<h4 class="white">Stone Mountain Base Camp </h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 61
        if ($row['quest61']=='1' && $row['flower']>=4) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>61) Frozen Fourth Flower</h3>
		<p>You have 4 flowers! Return to the elderly woman at the base camp for your reward!</p>';
        } elseif ($row['quest61']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>61) Frozen Fourth Flower <span class="questLvlBox">item collect</span> </h3>
	  	<p>An elderly woman at the camp wants you to bring her 4 flowers. After getting the first 3 you can find the final one past the stone bridge in the mountains. </p>';
            if ($row['flower']>=4) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Frozen Fourth Flower ';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 62
        if ($row['quest62']=='1' &&$row['redpotion']>=5 && $row['bluepotion']>=5 && $row['mud']>=10) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>62) Balm Mixer</h3>
		<p>You have the ingredients needed to make Balms! Return to the snowy shaman at the base camp for your reward!</p>';
        } elseif ($row['quest62']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>62) Balm Mixer <span class="questLvlBox">item collect</span> </h3>
	  <p>You need to bring the snowy shaman 5 red potions, 5 blue potions, and 10 mud.</p>';
            echo '<br>Red Potions: ';
            if ($row['redpotion']>=5) {
                echo ' - '.$row['redpotion'].'/5 <i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo ' - '.$row['redpotion'].'/5 <i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<br>Blue Potions: ';
            if ($row['bluepotion']>=5) {
                echo ' - '.$row['bluepotion'].'/5 <i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo ' - '.$row['bluepotion'].'/5 <i class="gold px14 none fa fa-square-o "></i>';
            }
            echo '<br>Mud: ';
            if ($row['mud']>=10) {
                echo ' - '.$row['mud'].'/10 <i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo ' - '.$row['mud'].'/10 <i class="gold px14 none fa fa-square-o "></i>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 63
        if ($row['quest63']=='1' && $row['KLulfberht']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>63) Ulfberht the Viking </h3>
	<p>You have defeated Ulfberht the Viking! Return to the base camp leader for your reward!</p>';
        } elseif ($row['quest63']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>63) Ulfberht the Viking <span class="questLvlBox">lvl 35</span> </h3>
		<p>Defeat the undead viking found in the Neverending mine</p>';
            if ($row['KLulfberht']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Ulfberht ';
        }
    }



    // ----------------------------------------- 64-66
    if ($row['quest64']=='1' || $row['quest65']=='1' || $row['quest66']=='1') {
        echo '<h4 class="blue">Blue Guard Mountain Outpost</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 64
        if ($row['quest64']=='1' && (
            ((($row['equipR'] == 'steel chakram' || $row['equipR'] == 'steel boomerang' || $row['equipR'] == 'steel dagger' || $row['equipR'] == 'steel sword' || $row['equipR'] == 'steel staff')
            && ($row['equipL'] == 'steel shield' || $row['equipL'] == 'steel kite shield'))
        ||
        ($row['equipR'] == 'steel maul' || $row['equipR'] == 'steel 2h sword' || $row['equipR'] == 'steel battlestaff' || $row['equipR'] == 'steel nunchaku' || $row['equipR'] == 'steel bow' || $row['equipR'] == 'steel crossbow'))
        && ($row['equipHead'] == 'steel helmet' || $row['equipHead'] == 'steel hood')
        && ($row['equipBody'] == 'steel armor' || $row['equipBody'] == 'steel cape')
        && ($row['equipHands'] == 'steel gloves' || $row['equipHands'] == 'steel gauntlets')
        && ($row['equipFeet'] == 'steel boots')
    )) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>64)  Steel Warrior</h3>
		<p>You are a true Steel Warrior! You Beast. Return to Hector the Blue Guard Captain for your reward!</p>';
        } elseif ($row['quest64']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>64)  Steel Warrior <span class="questLvlBox">armor set collect</span> </h3>

	  		<p>Impress the Blue Guard in a full set of Steel Armor.</p>';
            if ($row['equipR']=='steel dagger' || $row['equipR'] == 'steel sword' || $row['equipR'] == 'steel staff' || $row['equipR'] == 'steel maul' || $row['equipR'] == 'steel 2h sword' || $row['equipR'] == 'steel battlestaff' || $row['equipR'] == 'steel nunchaku' || $row['equipR'] == 'steel boomerang' || $row['equipR'] == 'steel chakram' || $row['equipR'] == 'steel bow' || $row['equipR'] == 'steel crossbow') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Right<br>';

            if ($row['equipR']   == 'steel maul' || $row['equipR']   == 'steel 2h sword' || $row['equipR']   == 'steel battlestaff' || $row['equipR']   == 'steel nunchaku' || $row['equipR']   == 'steel bow' || $row['equipR']   == 'steel crossbow' || $row['equipL']   == 'steel shield' || $row['equipL']   == 'steel kite shield') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Left<br>';

            if ($row['equipHead']== 'steel helmet' || $row['equipHead'] == 'steel hood') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Head<br>';
            if ($row['equipBody'] == 'steel armor' || $row['equipBody'] == 'steel cape') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Body<br>';
            if ($row['equipHands'] == 'steel gloves' || $row['equipHands'] == 'steel gauntlets') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Hands<br>';
            if ($row['equipFeet'] == 'steel boots') {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Feet<br>';
        }
    }

    // ----------------------------------------- IN PROGRESS - QUEST 65
    if ($row['quest65']=='1' && $row['KLyeti']>=1) {
        echo '<h3 class="green"><i class="fa fa-check-square-o"></i>65) Yeti Hunter</h3>
		<p>You have slain a Yeti! Return to Hector the Blue Guard Captain for your reward!</p>';
    } elseif ($row['quest65']=='1') {
        echo '<h3><i class="fa fa-square-o gold"></i>65)Yeti Hunter <span class="questLvlBox">lvl 20, 25</span></h3>
	    <p>Find and slay a Yeti in the Mountains</p>';

        if ($row['KLyeti']>=1) {
            echo '<i class="green px14 none fa fa-check-square-o"></i>';
        } else {
            echo '<i class="gold px14 none fa fa-square-o "></i>';
        }
        echo 'Yeti';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 66
    if ($row['quest66']=='1' && $row['KLdragon']>=1) {
        echo '<h3 class="green"><i class="fa fa-check-square-o"></i>66) Dragon Slayer</h3>
	<p>You have slain a Dragon! Return to Hector the Blue Guard Captain for your reward!</p>';
    } elseif ($row['quest66']=='1') {
        echo '<h3><i class="fa fa-square-o gold"></i>66) Dragon Slayer <span class="questLvlBox">lvl 30</span> </h3>
		<p>Find and slay a Dragon in the Mountains</p>';

        if ($row['KLdragon']>=1) {
            echo '<i class="green px14 none fa fa-check-square-o"></i>';
        } else {
            echo '<i class="gold px14 none fa fa-square-o "></i>';
        }
        echo 'Dragon';
    }



    // ----------------------------------------- 67-69
    if ($row['quest67']=='1' || $row['quest68']=='1' || $row['quest69']=='1') {
        echo '<h4 class="white">Chilly Pete</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 67
        if ($row['quest67']=='1' && $row['KLvampire']>=3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>67) Vampire Hunter</h3>
		<p>You have defeated 3 Vampires! Return to Chilly Pete for your reward!</p>';
        } elseif ($row['quest67']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>67) Vampire Hunter <span class="questLvlBox">lvl 45</span> </h3>
	  	<p>Defeat 3 Vampires in the Dark Keep. </p>';
            echo 'Vampire: ';
            if ($row['KLvampire']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLvampire']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLvampire']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 68
        if ($row['quest68']=='1' && $row['KLdarkpaladin']>=3) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>68) Dark Paladin Cleanse</h3>
		<p>You have defeated 3 Dark Paladins. Return to Chilly Pete for your reward!</p>';
        } elseif ($row['quest68']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>68) Dark Paladin Cleanse <span class="questLvlBox">lvl 55</span> </h3>
	   <p>Visit the Dark Keep and defeat 3 Dark Paladins there.</p>';
            echo 'Dark Paladin: ';
            if ($row['KLdarkpaladin']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLdarkpaladin']>=2) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            if ($row['KLdarkpaladin']>=3) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 69
        if ($row['quest69']=='1' && $row['KLsnowogre']>=1 && $row['KLsnowninja']>=1 && $row['KLsnowowl']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>69) The Super Rare Snowy Trio </h3>
	<p>You defeated the super rare trio! Return to Chilly Pete for your reward!</p>';
        } elseif ($row['quest69']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>69) The Super Rare Snowy Trio <span class="questLvlBox">lvl 50</span> </h3>
		<p>Find the super rare trio in the mountains.</p>';
            if ($row['KLsnowogre']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Snow Ogre <br>';
            if ($row['KLsnowninja']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Snow Ninja  <br>';

            if ($row['KLsnowowl']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Snow Owl ';
        }
    }



    // ----------------------------------------- 70
    if ($row['quest70']=='1') {
        echo '<h4 class="blue">Open the Gate</h4>';
        // ----------------------------------------- IN PROGRESS - QUEST 70
        if ($row['quest70']=='1' && $row['KLbutcher']>=1 && $row['KLkingsquid']>=1 && $row['KLgiantmountaingiant']>=1) {
            echo '<h3 class="green"><i class="fa fa-check-square-o"></i>70) Open the Gate</h3> You hand Rigel the Key of Wrath, Greed, and Pride. He lifts them up and the gate pulls them right from his hand. The 3 keys all click in unison and the gate opens for you. Welcome to Star City!</br>';
        } elseif ($row['quest70']=='1') {
            echo '<h3><i class="fa fa-square-o gold"></i>70) Open the Gate <span class="questLvlBox">lvl 50</span> </h3>
	  	<p>To complete this quest and open the city gates you must collect the 3 required keys. Read the sign at the gate for clues where to look. </p>';

            if ($row['KLbutcher']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Key of Wrath<br>';
            if ($row['KLkingsquid']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Key of Greed<br>';
            if ($row['KLgiantmountaingiant']>=1) {
                echo '<i class="green px14 none fa fa-check-square-o"></i>';
            } else {
                echo '<i class="gold px14 none fa fa-square-o "></i>';
            }
            echo 'Key of Pride';
        }
    }




    //}

    // ----------------------------------------- END IN PROGRESS







    echo '</section>';
    echo'<section data-pop2="notfound" class="panel">';




    // ------------------------------------- NOT STARTED YET
    if (1==1) {
        echo '<h2>Not Started Yet </h2><h4>Find these!</h4>';

        if ($row['quest1']=='0' || $row['quest2']=='0' || $row['quest3']=='0' ||
    $row['quest4']=='0' || $row['quest5']=='0' || $row['quest6']=='0' ||
    $row['quest7']=='0' || $row['quest8']=='0' || $row['quest9']=='0') {
            //echo '<span class="yellowgreen ">Grassy Field</span>';
        }
        if ($row['quest1']=='0' || $row['quest2']=='0' || $row['quest3']=='0') {
            echo '<div><span class="num">1 - 3</span><span>Old Man</span></div>';
        }
        if ($row['quest4']=='0' || $row['quest5']=='0' || $row['quest6']=='0') {
            echo '<div><span class="num">4 - 6</span><span>Young Soldier</span></div>';
        }
        if (($row['quest7']=='0' || $row['quest8']=='0' || $row['quest9']=='0') && $row['quest5']=='2') {
            echo '<div><span class="num">7 - 9</span><span class="gold px20">Find Jack Lumber</span></div>';
        }

        if (($row['quest10']=='0') && ($row['quest9']=='2')) {
            echo '<h3 class="green ">Forest Path</h3>';
            echo '<div><span class="num">10</span><span>Freddie\'s Cow Farm</span></div>';
        }

        if (($row['quest14']=='0' || $row['quest15']=='0' || $row['quest16']=='0' || $row['quest17']=='0' || $row['quest18']=='0') && ($row['quest11']>=1 || $row['quest12']>=1 || $row['quest13']>=1)) {
            echo '<h3 class="green ">Forest</h3>';
            if (($row['quest14']=='0' || $row['quest15']=='0' || $row['quest16']=='0') && ($row['quest11']>=1 || $row['quest12']>=1 || $row['quest13']>=1)) {
                echo '<div><span class="num">14 - 16</span><span>Forest Gnome</span></div>';
            }
            if (($row['quest17']=='0' || $row['quest18']=='0') && ($row['quest11']>=1 || $row['quest12']>=1 || $row['quest13']>=1)) {
                echo '<div><span class="num">17 - 18</span><span>Hunter Bill</span></div>';
            }
        }

        if (($row['quest11']=='0' || $row['quest12']=='0' || $row['quest13']=='0' || $row['quest21']=='0' || $row['quest22']=='0' || $row['quest23']=='0' || $row['quest24']=='0') && $row['quest9']=='2') {
            echo '<h3 class="red ">Red Town</h3>';

            if ($row['quest11']=='0' || $row['quest12']=='0' || $row['quest13']=='0') {
                echo '<div><span class="num">11 - 13</span><span>Red Guard Captain</span></div>';
            }
            if ($row['quest21']=='0' || $row['quest22']=='0' || $row['quest23']=='0') {
                echo '<div><span class="num">21 - 23</span><span>Red Town Plaza</span></div>';
            }
            if ($row['quest24']=='0') {
                echo '<div><span class="num">24</span><span>Red Town Mayor</span></div>';
            }
        }

        if (($row['quest19']=='0' || $row['quest25']=='0' || $row['quest26']=='0' || $row['quest27']=='0') && ($row['quest9']=='2')&& ($row['quest19']!='1')) {
            echo '<h3 class="darkblue ">Warrior\'s Guild</h3>';
            if ($row['quest19']=='0') {
                echo '<div><span class="num">19</span><span>Warrior\'s Guild Initiation</span></div>';
            }
            if ($row['quest19']=='2') {
                echo '<div><span class="num">25 - 27</span><span>Warrior Pete</span></div>';
            }
        }

        if (($row['quest20']=='0' || $row['quest28']=='0' || $row['quest29']=='0' || $row['quest30']=='0')&& ($row['quest9']=='2')&& ($row['quest20']!='1')) {
            echo '<h3 class="lightpurple ">Wizard\'s Guild</h3>';
            if ($row['quest20']=='0') {
                echo '<div><span class="num">20</span><span>Wizard\'s Guild Initiation</span></div>';
            }
            if ($row['quest20']=='2') {
                echo '<div><span class="num">28 - 30</span><span>Wizard Morty</span></div>';
            }
        }

        //if($row['grandquest3']=='0') { echo '<div><span>GQ3) STONE MINE SAVIOR: Visit Grand Quest Pillar</span></div>'; }

        if (($row['quest31']=='0') && ($row['quest19']=='2')) {
            echo '<h3 class="yellow ">Mining Guild</h3>';
            if ($row['quest31']=='0') {
                echo '<div><span class="num">31</span><span>Mining Guild Initiation</span></div>';
            }
        }
        if (($row['quest32']=='0' || $row['quest33']=='0' || $row['quest34']=='0') && ($row['quest31']=='2')) {
            echo '<h3 class="yellow ">Mining Guild</h3>';
            if ($row['quest32']=='0' || $row['quest33']=='0' || $row['quest34']=='0') {
                echo '<div><span class="num">32 - 34</span><span>Mining Guild Headquarters</span></div>';
            }
        }

        if (($row['quest35']=='0' || $row['quest36']=='0' || $row['quest37']=='0' || $row['quest38']=='0' || $row['quest39']=='0' || $row['quest40']=='0') && ($row['quest19']=='2')) {
            echo '<h3 class="lightgray ">Stone Mine</h3>';
            if ($row['quest35']=='0' || $row['quest36']=='0' || $row['quest37']=='0') {
                echo '<div><span class="num">35 - 37</span><span>Dwarf Captain</span></div>';
            }
            if ($row['quest38']=='0' || $row['quest39']=='0' || $row['quest40']=='0') {
                echo '<div><span class="num">38 - 40</span><span>Dwarf Guard Bounty Board</span></div>';
            }
        }

        if (($row['quest41']=='0' || $row['quest42']=='0' || $row['quest43']=='0' || $row['quest44']=='0' || $row['quest45']=='0' || $row['quest46']=='0') && ($row['quest9']=='2') ||
(($row['quest47']=='0' || $row['quest48']=='0' || $row['quest49']=='0' || $row['quest50']=='0') && $row['KLkraken']>='1')) {
            echo '<h3 class="blue ">Blue Ocean</h3>';
            if ($row['quest41']=='0' || $row['quest42']=='0' || $row['quest43']=='0') {
                echo '<div><span class="num">41 - 43</span><span>Friendly Pirate</span></div>';
            }
            if ($row['quest44']=='0' || $row['quest45']=='0' || $row['quest46']=='0') {
                echo '<div><span class="num">44 - 46</span><span>Jungle Jim</span></div>';
            }
            if (($row['quest47']=='0' || $row['quest48']=='0' || $row['quest49']=='0' || $row['quest50']=='0') && $row['KLkraken']>='1') {
                echo '<div><span class="num">47 - 50</span><span>Master Water Temple</span></div>';
            }
        }

        if (($row['quest51']=='0' || $row['quest54']=='0' || $row['quest57']=='0' || $row['quest58']=='0') && ($row['grandquest4']=='1')) {
            echo '<h3 class="green ">Dark Forest</h3>';
            if ($row['quest51']=='0') {
                echo '<div><span class="num">51 - 53</span><span class="green">Ranger Guard</span></div>';
            }
            if ($row['quest54']=='0') {
                echo '<div><span class="num">54 - 56</span><span class="green">Dark Elf</span></div>';
            }
            if ($row['quest57']=='0') {
                echo '<div><span class="num">57</span><span class="green">Ranger\'s Guild Entrance</span></div>';
            }
            if ($row['quest58']=='0' && $row['quest57']=='2') {
                echo '<div><span class="num">58 - 60</span><span class="green">Lego the Ranger</span></div>';
            }
        }


        if (($row['quest61']=='0' || $row['quest64']=='0' || $row['quest67']=='0' || $row['quest70']=='0') && ($row['grandquest4']=='1')) {
            echo '<h3 class="gray ">Mountains</h3>';
            if ($row['quest61']=='0') {
                echo '<div><span class="num">61 - 63</span><span class="gray">Stone Mountain Base Camp</span></div>';
            }
            if ($row['quest64']=='0') {
                echo '<div><span class="num">64 - 66</span><span class="gray">Blue Guard Mountain Outpost
</span></div>';
            }
            if ($row['quest67']=='0') {
                echo '<div><span class="num">67 - 69</span><span class="gray">Chilly Pete </span></div>';
            }
            if ($row['quest70']=='0') {
                echo '<div><span class="num">70</span><span class="gray">Star City | Blue Gate</span></div>';
            }
        }
    }







    echo '</section>';
    echo'<section data-pop2="grand" class="panel">';



    if (1==1) {
        echo '<h2 class="blue">Grand Quest </h2><h4>Progress</h4>';
    }


    // ----------------------------------------- GRAND QUEST 1
    if ($row['grandquest1']>='1') {
        echo '<div class="questhead"><i class="px30  fa ';
        if ($row['grandquest1']=='1') {
            echo' fa-square-o';
        } else {
            echo' fa-check-square-o green';
        }
        echo'"><br></i><h5>Grand Quest 1 <span class="white">Grass Age </span> </h5>';




        if ($row['quest1']=='0') {
            echo '<span class="qbox q0">1</span>';
        }
        if ($row['quest1']=='1') {
            echo '<span class="qbox q1">1</span>';
        }
        if ($row['quest1']=='2') {
            echo '<span class="qbox q2">1</span>';
        }

        if ($row['quest2']=='0') {
            echo '<span class="qbox q0">2</span>';
        }
        if ($row['quest2']=='1') {
            echo '<span class="qbox q1">2</span>';
        }
        if ($row['quest2']=='2') {
            echo '<span class="qbox q2">2</span>';
        }

        if ($row['quest3']=='0') {
            echo '<span class="qbox q0">3</span>';
        }
        if ($row['quest3']=='1') {
            echo '<span class="qbox q1">3</span>';
        }
        if ($row['quest3']=='2') {
            echo '<span class="qbox q2">3</span>';
        }

        if ($row['quest4']=='0') {
            echo '<span class="qbox q0">4</span>';
        }
        if ($row['quest4']=='1') {
            echo '<span class="qbox q1">4</span>';
        }
        if ($row['quest4']=='2') {
            echo '<span class="qbox q2">4</span>';
        }

        if ($row['quest5']=='0') {
            echo '<span class="qbox q0">5</span>';
        }
        if ($row['quest5']=='1') {
            echo '<span class="qbox q1">5</span>';
        }
        if ($row['quest5']=='2') {
            echo '<span class="qbox q2">5</span>';
        }

        if ($row['quest6']=='0') {
            echo '<span class="qbox q0">6</span>';
        }
        if ($row['quest6']=='1') {
            echo '<span class="qbox q1">6</span>';
        }
        if ($row['quest6']=='2') {
            echo '<span class="qbox q2">6</span>';
        }

        if ($row['quest7']=='0') {
            echo '<span class="qbox q0">7</span>';
        }
        if ($row['quest7']=='1') {
            echo '<span class="qbox q1">7</span>';
        }
        if ($row['quest7']=='2') {
            echo '<span class="qbox q2">7</span>';
        }

        if ($row['quest8']=='0') {
            echo '<span class="qbox q0">8</span>';
        }
        if ($row['quest8']=='1') {
            echo '<span class="qbox q1">8</span>';
        }
        if ($row['quest8']=='2') {
            echo '<span class="qbox q2">8</span>';
        }

        if ($row['quest9']=='0') {
            echo '<span class="qbox q0">9</span>';
        }
        if ($row['quest9']=='1') {
            echo '<span class="qbox q1">9</span>';
        }
        if ($row['quest9']=='2') {
            echo '<span class="qbox q2">9</span>';
        }

        if ($row['quest10']=='0') {
            echo '<span class="qbox q0">10</span>';
        }
        if ($row['quest10']=='1') {
            echo '<span class="qbox q1">10</span>';
        }
        if ($row['quest10']=='2') {
            echo '<span class="qbox q2">10</span>';
        }


        echo '</div>';
    }

    // ----------------------------------------- IN PROGRESS - GRAND QUEST 2

    if ($row['grandquest2']>='1') {
        echo '<div class="questhead"><i class="px30  fa ';
        if ($row['grandquest2']=='1') {
            echo' fa-square-o';
        } else {
            echo' fa-check-square-o green';
        }
        echo'"><br></i><h5>Grand Quest 2 <span class="white">Forest Age </span></h5>';


        if ($row['quest11']=='0') {
            echo '<span class="qbox q0">11</span>';
        }
        if ($row['quest11']=='1') {
            echo '<span class="qbox q1">11</span>';
        }
        if ($row['quest11']=='2') {
            echo '<span class="qbox q2">11</span>';
        }

        if ($row['quest12']=='0') {
            echo '<span class="qbox q0">12</span>';
        }
        if ($row['quest12']=='1') {
            echo '<span class="qbox q1">12</span>';
        }
        if ($row['quest12']=='2') {
            echo '<span class="qbox q2">12</span>';
        }

        if ($row['quest13']=='0') {
            echo '<span class="qbox q0">13</span>';
        }
        if ($row['quest13']=='1') {
            echo '<span class="qbox q1">13</span>';
        }
        if ($row['quest13']=='2') {
            echo '<span class="qbox q2">13</span>';
        }

        if ($row['quest14']=='0') {
            echo '<span class="qbox q0">14</span>';
        }
        if ($row['quest14']=='1') {
            echo '<span class="qbox q1">14</span>';
        }
        if ($row['quest14']=='2') {
            echo '<span class="qbox q2">14</span>';
        }

        if ($row['quest15']=='0') {
            echo '<span class="qbox q0">15</span>';
        }
        if ($row['quest15']=='1') {
            echo '<span class="qbox q1">15</span>';
        }
        if ($row['quest15']=='2') {
            echo '<span class="qbox q2">15</span>';
        }

        if ($row['quest16']=='0') {
            echo '<span class="qbox q0">16</span>';
        }
        if ($row['quest16']=='1') {
            echo '<span class="qbox q1">16</span>';
        }
        if ($row['quest16']=='2') {
            echo '<span class="qbox q2">16</span>';
        }

        if ($row['quest17']=='0') {
            echo '<span class="qbox q0">17</span>';
        }
        if ($row['quest17']=='1') {
            echo '<span class="qbox q1">17</span>';
        }
        if ($row['quest17']=='2') {
            echo '<span class="qbox q2">17</span>';
        }

        if ($row['quest18']=='0') {
            echo '<span class="qbox q0">18</span>';
        }
        if ($row['quest18']=='1') {
            echo '<span class="qbox q1">18</span>';
        }
        if ($row['quest18']=='2') {
            echo '<span class="qbox q2">18</span>';
        }

        if ($row['quest19']=='0') {
            echo '<span class="qbox q0">19</span>';
        }
        if ($row['quest19']=='1') {
            echo '<span class="qbox q1">19</span>';
        }
        if ($row['quest19']=='2') {
            echo '<span class="qbox q2">19</span>';
        }

        if ($row['quest20']=='0') {
            echo '<span class="qbox q0">20</span><br>';
        }
        if ($row['quest20']=='1') {
            echo '<span class="qbox q1">20</span><br>';
        }
        if ($row['quest20']=='2') {
            echo '<span class="qbox q2">20</span><br>';
        }

        if ($row['quest21']=='0') {
            echo '<span class="qbox q0">21</span>';
        }
        if ($row['quest21']=='1') {
            echo '<span class="qbox q1">21</span>';
        }
        if ($row['quest21']=='2') {
            echo '<span class="qbox q2">21</span>';
        }

        if ($row['quest22']=='0') {
            echo '<span class="qbox q0">22</span>';
        }
        if ($row['quest22']=='1') {
            echo '<span class="qbox q1">22</span>';
        }
        if ($row['quest22']=='2') {
            echo '<span class="qbox q2">22</span>';
        }

        if ($row['quest23']=='0') {
            echo '<span class="qbox q0">23</span>';
        }
        if ($row['quest23']=='1') {
            echo '<span class="qbox q1">23</span>';
        }
        if ($row['quest23']=='2') {
            echo '<span class="qbox q2">23</span>';
        }

        if ($row['quest24']=='0') {
            echo '<span class="qbox q0">24</span>';
        }
        if ($row['quest24']=='1') {
            echo '<span class="qbox q1">24</span>';
        }
        if ($row['quest24']=='2') {
            echo '<span class="qbox q2">24</span>';
        }

        if ($row['quest25']=='0') {
            echo '<span class="qbox q0">25</span>';
        }
        if ($row['quest25']=='1') {
            echo '<span class="qbox q1">25</span>';
        }
        if ($row['quest25']=='2') {
            echo '<span class="qbox q2">25</span>';
        }

        if ($row['quest26']=='0') {
            echo '<span class="qbox q0">26</span>';
        }
        if ($row['quest26']=='1') {
            echo '<span class="qbox q1">26</span>';
        }
        if ($row['quest26']=='2') {
            echo '<span class="qbox q2">26</span>';
        }

        if ($row['quest27']=='0') {
            echo '<span class="qbox q0">27</span>';
        }
        if ($row['quest27']=='1') {
            echo '<span class="qbox q1">27</span>';
        }
        if ($row['quest27']=='2') {
            echo '<span class="qbox q2">27</span>';
        }

        if ($row['quest28']=='0') {
            echo '<span class="qbox q0">28</span>';
        }
        if ($row['quest28']=='1') {
            echo '<span class="qbox q1">28</span>';
        }
        if ($row['quest28']=='2') {
            echo '<span class="qbox q2">28</span>';
        }

        if ($row['quest29']=='0') {
            echo '<span class="qbox q0">29</span>';
        }
        if ($row['quest29']=='1') {
            echo '<span class="qbox q1">29</span>';
        }
        if ($row['quest29']=='2') {
            echo '<span class="qbox q2">29</span>';
        }

        if ($row['quest30']=='0') {
            echo '<span class="qbox q0">30</span>';
        }
        if ($row['quest30']=='1') {
            echo '<span class="qbox q1">30</span>';
        }
        if ($row['quest30']=='2') {
            echo '<span class="qbox q2">30</span>';
        }
        echo '</div>';
    }

    // ----------------------------------------- END GRAND QUEST 2


    // ----------------------------------------- IN PROGRESS - GRAND QUEST 3
    if ($row['grandquest3']>='1') {
        echo '<div class="questhead"><i class="px30  fa ';
        if ($row['grandquest3']=='1') {
            echo' fa-square-o';
        } else {
            echo' fa-check-square-o green';
        }
        echo'"><br></i><h5>Grand Quest 3 <span class="white">Ocean Age </span></h5>';


        if ($row['quest31']=='0') {
            echo '<span class="qbox q0">31</span>';
        }
        if ($row['quest31']=='1') {
            echo '<span class="qbox q1">31</span>';
        }
        if ($row['quest31']=='2') {
            echo '<span class="qbox q2">31</span>';
        }

        if ($row['quest32']=='0') {
            echo '<span class="qbox q0">32</span>';
        }
        if ($row['quest32']=='1') {
            echo '<span class="qbox q1">32</span>';
        }
        if ($row['quest32']=='2') {
            echo '<span class="qbox q2">32</span>';
        }

        if ($row['quest33']=='0') {
            echo '<span class="qbox q0">33</span>';
        }
        if ($row['quest33']=='1') {
            echo '<span class="qbox q1">33</span>';
        }
        if ($row['quest33']=='2') {
            echo '<span class="qbox q2">33</span>';
        }

        if ($row['quest34']=='0') {
            echo '<span class="qbox q0">34</span>';
        }
        if ($row['quest34']=='1') {
            echo '<span class="qbox q1">34</span>';
        }
        if ($row['quest34']=='2') {
            echo '<span class="qbox q2">34</span>';
        }

        if ($row['quest35']=='0') {
            echo '<span class="qbox q0">35</span>';
        }
        if ($row['quest35']=='1') {
            echo '<span class="qbox q1">35</span>';
        }
        if ($row['quest35']=='2') {
            echo '<span class="qbox q2">35</span>';
        }

        if ($row['quest36']=='0') {
            echo '<span class="qbox q0">36</span>';
        }
        if ($row['quest36']=='1') {
            echo '<span class="qbox q1">36</span>';
        }
        if ($row['quest36']=='2') {
            echo '<span class="qbox q2">36</span>';
        }

        if ($row['quest37']=='0') {
            echo '<span class="qbox q0">37</span>';
        }
        if ($row['quest37']=='1') {
            echo '<span class="qbox q1">37</span>';
        }
        if ($row['quest37']=='2') {
            echo '<span class="qbox q2">37</span>';
        }

        if ($row['quest38']=='0') {
            echo '<span class="qbox q0">38</span>';
        }
        if ($row['quest38']=='1') {
            echo '<span class="qbox q1">38</span>';
        }
        if ($row['quest38']=='2') {
            echo '<span class="qbox q2">38</span>';
        }

        if ($row['quest39']=='0') {
            echo '<span class="qbox q0">39</span>';
        }
        if ($row['quest39']=='1') {
            echo '<span class="qbox q1">39</span>';
        }
        if ($row['quest39']=='2') {
            echo '<span class="qbox q2">39</span>';
        }

        if ($row['quest40']=='0') {
            echo '<span class="qbox q0">40</span><br>';
        }
        if ($row['quest40']=='1') {
            echo '<span class="qbox q1">40</span><br>';
        }
        if ($row['quest40']=='2') {
            echo '<span class="qbox q2">40</span><br>';
        }

        if ($row['quest41']=='0') {
            echo '<span class="qbox q0">41</span>';
        }
        if ($row['quest41']=='1') {
            echo '<span class="qbox q1">41</span>';
        }
        if ($row['quest41']=='2') {
            echo '<span class="qbox q2">41</span>';
        }

        if ($row['quest42']=='0') {
            echo '<span class="qbox q0">42</span>';
        }
        if ($row['quest42']=='1') {
            echo '<span class="qbox q1">42</span>';
        }
        if ($row['quest42']=='2') {
            echo '<span class="qbox q2">42</span>';
        }

        if ($row['quest43']=='0') {
            echo '<span class="qbox q0">43</span>';
        }
        if ($row['quest43']=='1') {
            echo '<span class="qbox q1">43</span>';
        }
        if ($row['quest43']=='2') {
            echo '<span class="qbox q2">43</span>';
        }

        if ($row['quest44']=='0') {
            echo '<span class="qbox q0">44</span>';
        }
        if ($row['quest44']=='1') {
            echo '<span class="qbox q1">44</span>';
        }
        if ($row['quest44']=='2') {
            echo '<span class="qbox q2">44</span>';
        }

        if ($row['quest45']=='0') {
            echo '<span class="qbox q0">45</span>';
        }
        if ($row['quest45']=='1') {
            echo '<span class="qbox q1">45</span>';
        }
        if ($row['quest45']=='2') {
            echo '<span class="qbox q2">45</span>';
        }

        if ($row['quest46']=='0') {
            echo '<span class="qbox q0">46</span>';
        }
        if ($row['quest46']=='1') {
            echo '<span class="qbox q1">46</span>';
        }
        if ($row['quest46']=='2') {
            echo '<span class="qbox q2">46</span>';
        }

        if ($row['quest47']=='0') {
            echo '<span class="qbox q0">47</span>';
        }
        if ($row['quest47']=='1') {
            echo '<span class="qbox q1">47</span>';
        }
        if ($row['quest47']=='2') {
            echo '<span class="qbox q2">47</span>';
        }

        if ($row['quest48']=='0') {
            echo '<span class="qbox q0">48</span>';
        }
        if ($row['quest48']=='1') {
            echo '<span class="qbox q1">48</span>';
        }
        if ($row['quest48']=='2') {
            echo '<span class="qbox q2">48</span>';
        }

        if ($row['quest49']=='0') {
            echo '<span class="qbox q0">49</span>';
        }
        if ($row['quest49']=='1') {
            echo '<span class="qbox q1">49</span>';
        }
        if ($row['quest49']=='2') {
            echo '<span class="qbox q2">49</span>';
        }

        if ($row['quest50']=='0') {
            echo '<span class="qbox q0">50</span>';
        }
        if ($row['quest50']=='1') {
            echo '<span class="qbox q1">50</span>';
        }
        if ($row['quest50']=='2') {
            echo '<span class="qbox q2">50</span>';
        }
        echo '</div>';
    }


    // ----------------------------------------- IN PROGRESS - GRAND QUEST 4
    if ($row['grandquest4']>='1') {
        echo '<div class="questhead"><i class="px30  fa ';
        if ($row['grandquest4']=='1') {
            echo' fa-square-o';
        } else {
            echo' fa-check-square-o green';
        }
        echo'"><br></i><h5>Grand Quest 4 <span class="white">Mountain Age </span></h5>';


        if ($row['quest51']=='0') {
            echo '<span class="qbox q0">51</span>';
        }
        if ($row['quest51']=='1') {
            echo '<span class="qbox q1">51</span>';
        }
        if ($row['quest51']=='2') {
            echo '<span class="qbox q2">51</span>';
        }

        if ($row['quest52']=='0') {
            echo '<span class="qbox q0">52</span>';
        }
        if ($row['quest52']=='1') {
            echo '<span class="qbox q1">52</span>';
        }
        if ($row['quest52']=='2') {
            echo '<span class="qbox q2">52</span>';
        }

        if ($row['quest53']=='0') {
            echo '<span class="qbox q0">53</span>';
        }
        if ($row['quest53']=='1') {
            echo '<span class="qbox q1">53</span>';
        }
        if ($row['quest53']=='2') {
            echo '<span class="qbox q2">53</span>';
        }

        if ($row['quest54']=='0') {
            echo '<span class="qbox q0">54</span>';
        }
        if ($row['quest54']=='1') {
            echo '<span class="qbox q1">54</span>';
        }
        if ($row['quest54']=='2') {
            echo '<span class="qbox q2">54</span>';
        }

        if ($row['quest55']=='0') {
            echo '<span class="qbox q0">55</span>';
        }
        if ($row['quest55']=='1') {
            echo '<span class="qbox q1">55</span>';
        }
        if ($row['quest55']=='2') {
            echo '<span class="qbox q2">55</span>';
        }

        if ($row['quest56']=='0') {
            echo '<span class="qbox q0">56</span>';
        }
        if ($row['quest56']=='1') {
            echo '<span class="qbox q1">56</span>';
        }
        if ($row['quest56']=='2') {
            echo '<span class="qbox q2">56</span>';
        }

        if ($row['quest57']=='0') {
            echo '<span class="qbox q0">57</span>';
        }
        if ($row['quest57']=='1') {
            echo '<span class="qbox q1">57</span>';
        }
        if ($row['quest57']=='2') {
            echo '<span class="qbox q2">57</span>';
        }

        if ($row['quest58']=='0') {
            echo '<span class="qbox q0">58</span>';
        }
        if ($row['quest58']=='1') {
            echo '<span class="qbox q1">58</span>';
        }
        if ($row['quest58']=='2') {
            echo '<span class="qbox q2">58</span>';
        }

        if ($row['quest59']=='0') {
            echo '<span class="qbox q0">59</span>';
        }
        if ($row['quest59']=='1') {
            echo '<span class="qbox q1">59</span>';
        }
        if ($row['quest59']=='2') {
            echo '<span class="qbox q2">59</span>';
        }

        if ($row['quest60']=='0') {
            echo '<span class="qbox q0">60</span><br>';
        }
        if ($row['quest60']=='1') {
            echo '<span class="qbox q1">60</span><br>';
        }
        if ($row['quest60']=='2') {
            echo '<span class="qbox q2">60</span><br>';
        }

        if ($row['quest61']=='0') {
            echo '<span class="qbox q0">61</span>';
        }
        if ($row['quest61']=='1') {
            echo '<span class="qbox q1">61</span>';
        }
        if ($row['quest61']=='2') {
            echo '<span class="qbox q2">61</span>';
        }

        if ($row['quest62']=='0') {
            echo '<span class="qbox q0">62</span>';
        }
        if ($row['quest62']=='1') {
            echo '<span class="qbox q1">62</span>';
        }
        if ($row['quest62']=='2') {
            echo '<span class="qbox q2">62</span>';
        }

        if ($row['quest63']=='0') {
            echo '<span class="qbox q0">63</span>';
        }
        if ($row['quest63']=='1') {
            echo '<span class="qbox q1">63</span>';
        }
        if ($row['quest63']=='2') {
            echo '<span class="qbox q2">63</span>';
        }

        if ($row['quest64']=='0') {
            echo '<span class="qbox q0">64</span>';
        }
        if ($row['quest64']=='1') {
            echo '<span class="qbox q1">64</span>';
        }
        if ($row['quest64']=='2') {
            echo '<span class="qbox q2">64</span>';
        }

        if ($row['quest65']=='0') {
            echo '<span class="qbox q0">65</span>';
        }
        if ($row['quest65']=='1') {
            echo '<span class="qbox q1">65</span>';
        }
        if ($row['quest65']=='2') {
            echo '<span class="qbox q2">65</span>';
        }

        if ($row['quest66']=='0') {
            echo '<span class="qbox q0">66</span>';
        }
        if ($row['quest66']=='1') {
            echo '<span class="qbox q1">66</span>';
        }
        if ($row['quest66']=='2') {
            echo '<span class="qbox q2">66</span>';
        }

        if ($row['quest67']=='0') {
            echo '<span class="qbox q0">67</span>';
        }
        if ($row['quest67']=='1') {
            echo '<span class="qbox q1">67</span>';
        }
        if ($row['quest67']=='2') {
            echo '<span class="qbox q2">67</span>';
        }

        if ($row['quest68']=='0') {
            echo '<span class="qbox q0">68</span>';
        }
        if ($row['quest68']=='1') {
            echo '<span class="qbox q1">68</span>';
        }
        if ($row['quest68']=='2') {
            echo '<span class="qbox q2">68</span>';
        }

        if ($row['quest69']=='0') {
            echo '<span class="qbox q0">69</span>';
        }
        if ($row['quest69']=='1') {
            echo '<span class="qbox q1">69</span>';
        }
        if ($row['quest69']=='2') {
            echo '<span class="qbox q2">69</span>';
        }

        if ($row['quest70']=='0') {
            echo '<span class="qbox q0">70</span>';
        }
        if ($row['quest70']=='1') {
            echo '<span class="qbox q1">70</span>';
        }
        if ($row['quest70']=='2') {
            echo '<span class="qbox q2">70</span>';
        }
        echo '</div>';
    }







    echo '</section>';
    echo'<section data-pop2="completed" class="panel">';


    echo '<h2 class="green">Completed Quests </h2><h4>Nice work!</h4><br>';



    //if($row['grandquest1']=='2') { echo '<h4 class="completed">GQ1) Grassy Field Savior (quests 1-9)</h4>'; }
    //else if($row['grandquest1']=='1'){ echo '<h4 class="gray">GQ1) Grassy Field Savior (quests 1-9)</h4>'; }
    //if($row['grandquest1']=='1') { echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">1) GRASSY FIELD SAVIOR - IN PROGRESS</h4> (Complete Quests 1-9)</div>'; }









    // ----------------------------------------- COMPLETED!! - GRAND QUEST 1

    if ($row['quest1']=='2' || $row['quest2']=='2' || $row['quest3']=='2') {
        echo '<span class="completed">Old Man | Old Cabin</span>';
    }
    if ($row['quest1']=='2') {
        echo '<span class="completed green">1) A Flower for my Wife</span>';
    }
    if ($row['quest2']=='2') {
        echo '<span class="completed green">2) Practice on the Dummy</span>';
    }
    if ($row['quest3']=='2') {
        echo '<span class="completed green">3) Rat Problem</span>';
    }

    if ($row['quest4']=='2' || $row['quest5']=='2' || $row['quest6']=='2') {
        echo '<span class="completed">Young Soldier | Weapons Training</span>';
    }
    if ($row['quest4']=='2') {
        echo '<span class="completed green">4) My First Sword and Shield</span>';
    }
    if ($row['quest5']=='2') {
        echo '<span class="completed green">5) Collect 5 Scorpion Tails</span>';
    }
    if ($row['quest6']=='2') {
        echo '<span class="completed green">6) Training Armor Pro</span>';
    }

    if ($row['quest7']=='2' || $row['quest8']=='2' || $row['quest9']=='2') {
        echo '<span class="completed">Jack Lumber | Professional Lumberjack</span>';
    }
    if ($row['quest7']=='2') {
        echo '<span class="completed green">7) Boomerang Some Bats</span>';
    }
    if ($row['quest8']=='2') {
        echo '<span class="completed green">8) Chop some Wood, Craft a Table</span>';
    }
    if ($row['quest9']=='2') {
        echo '<span class="completed green">9) Goblin Chief Bounty</span>';
    }


    if ($row['quest10']=='2') {
        echo '<span class="completed">Freddie\'s Cow Farm</span>';
    }
    if ($row['quest10']=='2') {
        echo '<span class="completed green">10) Craft with Leather</span>';
    }

    // ----------------------------------------- COMPLETED!!! - GRAND QUEST 2

    if ($row['grandquest2']=='2') {
        echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">2) RED TOWN SAVIOR - COMPLETED!</h4> (Completed Quests 10-30)</div>';
    }


    if ($row['quest11']=='2' || $row['quest12']=='2' || $row['quest13']=='2') {
        echo '<span class="completed">Red Guard Captain</span>';
    }
    if ($row['quest11']=='2') {
        echo '<span class="completed green">11) Bring 3 Thieves to Justice</span>';
    }
    if ($row['quest12']=='2') {
        echo '<span class="completed green">12) Swords for the Red Guard</span>';
    }
    if ($row['quest13']=='2') {
        echo '<span class="completed green">13) Sewer Pest Control</span>';
    }

    if ($row['quest14']=='2' || $row['quest15']=='2' || $row['quest16']=='2') {
        echo '<span class="completed">Forest Gnome - Tree Hut</span>';
    }
    if ($row['quest14']=='2') {
        echo '<span class="completed green">14) Gnome Needs Berries</span>';
    }
    if ($row['quest15']=='2') {
        echo '<span class="completed green">15) New Tree Hut Door</span>';
    }
    if ($row['quest16']=='2') {
        echo '<span class="completed green">16) Troll Base Camp</span>';
    }

    if ($row['quest17']=='2' || $row['quest18']=='2') {
        echo '<span class="completed">Hunter Bill | Hunter Skills</span>';
    }
    if ($row['quest17']=='2') {
        echo '<span class="completed green">17) Bigfoot Sighting</span>';
    }
    if ($row['quest18']=='2') {
        echo '<span class="completed green">18) Forest Hunter</span>';
    }

    if ($row['quest19']=='2') {
        echo '<span class="completed">Warrior\'s Guild Initiation</span>';
    }
    if ($row['quest19']=='2') {
        echo '<span class="completed green">19) Warrior\'s Guild Initiation</span>';
    }

    if ($row['quest20']=='2') {
        echo '<span class="completed">Wizard\'s Guild Initiation</span>';
    }
    if ($row['quest20']=='2') {
        echo '<span class="completed green">20) Wizard\'s Guild Initiation</span>';
    }

    if ($row['quest21']=='2' || $row['quest22']=='2' || $row['quest23']=='2') {
        echo '<span class="completed">Red Town Plaza</span>';
    }
    if ($row['quest21']=='2') {
        echo '<span class="completed green">21) Twice as Nice</span>';
    }
    if ($row['quest22']=='2') {
        echo '<span class="completed green">22) Cookin up some Meat-a-balls</span>';
    }
    if ($row['quest23']=='2') {
        echo '<span class="completed green">23) Stolen Teddy Bear</span>';
    }

    if ($row['quest24']=='2') {
        echo '<span class="completed">Red Town Mayor</span>';
    }
    if ($row['quest24']=='2') {
        echo '<span class="completed green">24) Scorpion King Bounty</span>';
    }

    if ($row['quest25']=='2' || $row['quest26']=='2' || $row['quest27']=='2') {
        echo '<span class="completed">Warrior\'s Guild | Pete\'s Quests</span>';
    }
    if ($row['quest25']=='2') {
        echo '<span class="completed green">25) Banish the Skeleton Knights</span>';
    }
    if ($row['quest26']=='2') {
        echo '<span class="completed green">26) Shark Hunter</span>';
    }
    if ($row['quest27']=='2') {
        echo '<span class="completed green">27) True Troll Champion</span>';
    }

    if ($row['quest28']=='2' || $row['quest29']=='2' || $row['quest30']=='2') {
        echo '<span class="completed">Wizard\'s Guild | Morty\'s Quests</span>';
    }
    if ($row['quest28']=='2') {
        echo '<span class="completed green">28) Rare Gray Matter</span>';
    }
    if ($row['quest29']=='2') {
        echo '<span class="completed green">29) Omar & Victoria the Dead</span>';
    }
    if ($row['quest30']=='2') {
        echo '<span class="completed green">30) Magic of the Troll Queen</span>';
    }




    // ----------------------------------------- COMPLETED!!! - GRAND QUEST 3


    if ($row['grandquest3']=='2') {
        echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">3) STONE MINE SAVIOR - COMPLETED</h4> (Completed Quests 31-50)</div>';
    }

    if ($row['quest31']=='2') {
        echo '<span class="completed">Mining Guild Initiation</span>';
    }
    if ($row['quest31']=='2') {
        echo '<span class="completed green">31) Stone Mine Access: Kraken</span>';
    }

    if ($row['quest32']=='2' || $row['quest33']=='2' || $row['quest34']=='2') {
        echo '<span class="completed">Mining Guild Headquarters</span>';
    }
    if ($row['quest32']=='2') {
        echo '<span class="completed green">32) Iron Boss: The Phoenix</span>';
    }
    if ($row['quest33']=='2') {
        echo '<span class="completed green">33) Steel Boss: Cyclops</span>';
    }
    if ($row['quest34']=='2') {
        echo '<span class="completed green">34) Mithril Boss: Minotaur</span>';
    }

    if ($row['quest35']=='2' || $row['quest36']=='2' || $row['quest37']=='2') {
        echo '<span class="completed">Dwarf Captain</span>';
    }
    if ($row['quest35']=='2') {
        echo '<span class="completed green">35) Clear out the Abandoned Mine</span>';
    }
    if ($row['quest36']=='2') {
        echo '<span class="completed green">36) Glowing Sea Monster</span>';
    }
    if ($row['quest37']=='2') {
        echo '<span class="completed green">37) Missing Dwarf Axeman</span>';
    }

    if ($row['quest38']=='2' || $row['quest39']=='2' || $row['quest40']=='2') {
        echo '<span class="completed">Dwarf Guard | Bounty Board</span>';
    }
    if ($row['quest38']=='2') {
        echo '<span class="completed green">38) Red Beard Bounty</span>';
    }
    if ($row['quest39']=='2') {
        echo '<span class="completed green">39) Troll King Bounty</span>';
    }
    if ($row['quest40']=='2') {
        echo '<span class="completed green">40) Gatekeeper Bounty</span>';
    }

    if ($row['quest41']=='2' || $row['quest42']=='2' || $row['quest43']=='2') {
        echo '<span class="completed">Friendly Pirate - Blue Oasis</span>';
    }
    if ($row['quest41']=='2') {
        echo '<span class="completed green">41) Like a Squid</span>';
    }
    if ($row['quest42']=='2') {
        echo '<span class="completed green">42) Mud Crab Population Control</span>';
    }
    if ($row['quest43']=='2') {
        echo '<span class="completed green">43) Ocean Hunter Pro</span>';
    }


    if ($row['quest44']=='2' || $row['quest45']=='2' || $row['quest46']=='2') {
        echo '<span class="completed">Jungle Jim - Crocodile Island</span>';
    }
    if ($row['quest44']=='2') {
        echo '<span class="completed green">44) Third Times a Charm</span>';
    }
    if ($row['quest45']=='2') {
        echo '<span class="completed green">45) Angry Birds</span>';
    }
    if ($row['quest46']=='2') {
        echo '<span class="completed green">46) Iron Warrior</span>';
    }

    if ($row['quest47']=='2' || $row['quest48']=='2' || $row['quest49']=='2' || $row['quest50']=='2') {
        echo '<span class="completed">Master Water Temple</span>';
    }
    if ($row['quest47']=='2') {
        echo '<span class="completed green">47) Test of Strength</span>';
    }
    if ($row['quest48']=='2') {
        echo '<span class="completed green">48) Test of Dexterity</span>';
    }
    if ($row['quest49']=='2') {
        echo '<span class="completed green">49) Test of Magic</span>';
    }
    if ($row['quest50']=='2') {
        echo '<span class="completed green">50) Test of Defense</span>';
    }

    // ----------------------------------------- COMPLETED!!! - GRAND QUEST 4
    if ($row['grandquest4']=='2') {
        echo '<div class="questhead completed"><h7>Grand Quest</h7><h4 class="completed">3) MOUNTAIN SAVIOR - COMPLETED</h4> (Completed Quests 51-70)</div>';
    }

    if ($row['quest51']=='2' || $row['quest52']=='2' || $row['quest53']=='2') {
        echo '<span class="completed">Dark Forest Outpost - Ranger Guard</span>';
    }
    if ($row['quest51']=='2') {
        echo '<span class="completed green">51) Protect the Mountain Path</span>';
    }
    if ($row['quest52']=='2') {
        echo '<span class="completed green">52) Elder Slayer</span>';
    }
    if ($row['quest53']=='2') {
        echo '<span class="completed green">53) Dark Keep First Floor</span>';
    }

    if ($row['quest54']=='2' || $row['quest55']=='2' || $row['quest56']=='2') {
        echo '<span class="completed">Dark Elf - Tree Hut</span>';
    }
    if ($row['quest54']=='2') {
        echo '<span class="completed green">54) Dark Forest Lumberjack</span>';
    }
    if ($row['quest55']=='2') {
        echo '<span class="completed green">55) Shaman & Sorcerer Slayer	</span>';
    }
    if ($row['quest56']=='2') {
        echo '<span class="completed green">56) Ent Hunter</span>';
    }

    if ($row['quest57']=='2') {
        echo '<span class="completed">Ranger\'s Guild Initiation</span>';
    }
    if ($row['quest57']=='2') {
        echo '<span class="completed green">57) Ranger\'s Guild Initiation</span>';
    }

    if ($row['quest58']=='2' || $row['quest59']=='2' || $row['quest60']=='2') {
        echo '<span class="completed">Ranger\'s Guild - Lego\'s Quests</span>';
    }
    if ($row['quest58']=='2') {
        echo '<span class="completed green">58) Stubborn War Turtle</span>';
    }
    if ($row['quest59']=='2') {
        echo '<span class="completed green">59) Gargoyle Hunter	</span>';
    }
    if ($row['quest60']=='2') {
        echo '<span class="completed green">60) The Griffin</span>';
    }


    if ($row['quest61']=='2' || $row['quest62']=='2' || $row['quest63']=='2') {
        echo '<span class="completed">Stone Mountain | Base Camp</span>';
    }
    if ($row['quest61']=='2') {
        echo '<span class="completed green">61) Frozen Fourth Flower</span>';
    }
    if ($row['quest62']=='2') {
        echo '<span class="completed green">62) Balm Mixer</span>';
    }
    if ($row['quest63']=='2') {
        echo '<span class="completed green">63) Ulfberht the Viking</span>';
    }

    if ($row['quest64']=='2' || $row['quest65']=='2' || $row['quest66']=='2') {
        echo '<span class="completed">Blue Guard | Mountain Outpost</span>';
    }
    if ($row['quest64']=='2') {
        echo '<span class="completed green">64) Steel Warrior</span>';
    }
    if ($row['quest65']=='2') {
        echo '<span class="completed green">65) Yeti Hunter</span>';
    }
    if ($row['quest66']=='2') {
        echo '<span class="completed green">66) Dragon Slayer</span>';
    }

    if ($row['quest67']=='2' || $row['quest68']=='2' || $row['quest69']=='2') {
        echo '<span class="completed">Chilly Pete | Mountain Cabin</span>';
    }
    if ($row['quest67']=='2') {
        echo '<span class="completed green">67) Vampire Hunter</span>';
    }
    if ($row['quest68']=='2') {
        echo '<span class="completed green">68) Dark Paladin Cleanse</span>';
    }
    if ($row['quest69']=='2') {
        echo '<span class="completed green">69) The Super Rare Snowy Trio</span>';
    }

    if ($row['quest70']=='2') {
        echo '<span class="completed">Star City | Blue Gate</span>';
    }
    if ($row['quest70']=='2') {
        echo '<span class="completed green">70) Open the Gate</span>';
    }
}



echo '</section>';
//echo '</div>';
