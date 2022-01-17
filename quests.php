

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
//    $results = $link->query("UPDATE $user SET KLscorpionking = 0"); // -- temp

    /*
      $results = $link->query("UPDATE $user SET quest10 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest11 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest12 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest13 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest14 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest15 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest16 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest17 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest18 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest19 = 0"); // -- temp
    $results = $link->query("UPDATE $user SET quest20 = 0"); // -- temp
    */



    //  $checkedBox = '<i class="fa fa-check-square-o green"></i>';
    //  $checkBox = '<i class="fa fa-square-o gold"></i>';

    $checkBox = '<span class="icon checkbox white">'.file_get_contents("img/svg/checkbox.svg").'</span>';
    $checkedBox = '<span class="icon checkbox green">'.file_get_contents("img/svg/checkedbox2.svg").'</span>';

    //echo '<article data-pop="quests" id="quests">' ;

    echo'<section data-pop2="quests" class="flex-contain">';

  //  include('quest-rooms.php'); // NOT IN USE ANYMORE


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
    } elseif ($row['quest1']==0) {
      echo ' notstarted';
    }
    echo '" >';
    //  echo '<div class="gslice">';
    echo '<span class="icon npc green">'.file_get_contents("img/svg/npc-oldman.svg").'</span>';
    echo '<h4 class="toprightX boxX brown">Wood Cabin</h4>';
    echo '<h2>Old Man</h2>';
    if ($row['quest1']<'2' || $row['quest2']<'2' || $row['quest3']<'2') {
        echo '<p class="gray">The Old Man hasn\'t been himself lately and could use the help of a Young Adventurer. Find him in his cabin southwest of the Grassy Field Crossroads.</p>';
    } else {
        echo '<p class="gray">The Old Man thanks you for helping in his basement. His wife loved the flower you picked as well. He tells you to make your way east along the Forest Path to get to Red Town. Talk to the Mayor there.</p>';
        //echo '<h5 class="padd">'.$checkBox.' Talk to the Mayor of Red Town</h5>';
    }
    if ($row['quest1']=='0') { // ------------------------------------- end state
        echo '<h5 class="gslice">'.$checkBox.' Talk to the Old Man in his cabin</h5>';
        if ($row['quest1']=='0' && $row['room']==$questRoom) {
            echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Talk to the Old Man</h4></button>';
        }
    }
    // ----------------------------------------- IN PROGRESS - QUEST 1
    $questNumber = '1';
    $questTag = 'Item Find';
    $questTitle = 'A Flower for my Wife';
    $questDesc = 'The Old Man sure is romantic. Help him pick a flower for his wife.';
    if ($row['quest'.$questNumber.'']=='1') {
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
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 2
    $questNumber = '2';
    $questTag = 'Attack Dummy';
    $questTitle = 'Practice on the Dummy';
    $questDesc = 'Think you can hit an immoble piece of wood? Practice your attacks on the dummy in the weapons training area west of the Old Man. When you attack you will do random damage between 1 and your STR stat.';
    if ($row['quest'.$questNumber.'']=='1') {
        $color='gold';
        if ($row['KLdummy']>='1') {
            $color='green';
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';

        if ($row['quest'.$questNumber.'']=='1' && $row['KLdummy']<'1') {
            echo '<h5 class="padd">'.$checkBox.' Attack the training dummy</h5>';
        }
        if ($row['quest'.$questNumber.'']=='1' && $row['KLdummy']>='1') {
            echo '<h5 class="padd green">'.$checkedBox.' You have successfully attacked the dummy. Return to the Old Man for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 3
    $questNumber = '3';
    $questTag = 'Lvl 3 Battle';
    $questTitle = 'Rat Problem';
    $questDesc = 'The Old Man has a Rat Problem. Go down into the Basement and exterminate a Giant Rat to help out his situation.';
    if ($row['quest'.$questNumber.'']=='1') {
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
            echo '<h5 class="">'.$checkBox.' Exterminate a Giant Rat</h5>';
        }
        if ($row['quest'.$questNumber.'']=='1' && $row['KLgiantrat']>='1') {
            echo '<h5 class="padd green">'.$checkedBox.' You have defeated a Giant Rat. Return to the Old Man for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
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
} elseif ($row['quest4']==0) {
echo ' notstarted';
    }
    echo '" >';
    echo '<span class="icon npc blue">'.file_get_contents("img/svg/npc-youngsoldier.svg").'</span>';
    echo '<h4 class="toprightX boxX blue">Weapons Training</h4>';
    echo '<h2>Young Soldier</h2>';
    if ($row['quest4']<'2' || $row['quest5']<'2' || $row['quest6']<'2') {
        echo '<p class="gray">This is a dangerous world. Visit the Young Soldier to get and equip your first weapon. You can find him west of the Old Man.</p>';
    } else {
        echo '<p class="gray">You now know the basics of combat. The Young Soldier wishes you the best in your adventures. He says you should next make your way to Red Town and join a guild or two.</p>';
        echo '<h5 class="padd">'.$checkBox.' Join the Warriors or Wizards Guild</h5>';
    }
    if ($row['quest4']=='0') { // ------------------------------------- end state
        echo '<h5 class="gslice">'.$checkBox.' Talk to the Young Soldier</h5>';
        if ($row['quest4']=='0' && $row['room']==$questRoom) {
            echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Talk to the Young Soldier</h4></button>';
        }
    }
    // ----------------------------------------- IN PROGRESS - QUEST 4
    $questNumber = '4';
    $questTag = 'Equip Weapon';
    $questTitle = 'My First Sword and Shield';
    $questDesc = 'Pick up and equip a weapon. You can get one at the Young Soldier\'s Training Area.';
    if ($row['quest'.$questNumber.'']=='1') {
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
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 5
    $questNumber = '5';
    $questTag = 'Item Collect lvl 2-5';
    $questTitle = 'Collect 5 Scorpion Tails';
    $questDesc = 'Take your shiny new sword and go slay some Scorpions in the Spider Cave east of here. Return with 5 tails and receive your first Gold Key!';
    if ($row['quest'.$questNumber.'']=='1') {
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
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 6
    $questNumber = '6';
    $questTag = 'Item Collect lvl 6';
    $questTitle = 'Training Armor Pro';
    $questDesc = 'Find the rest of the training equipment. The pieces are dropped by specific enemies. Collecting all four pieces will reward you with upgraded armor.';
    if ($row['quest'.$questNumber.'']=='1') {
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
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }

    echo '</div>'; //-end gbox

















    // --------------------- GOLD CHEST 1
    // --------------------- GOLD CHEST 1
    // --------------------- GOLD CHEST 1
    if ($row['chest1']=='0') {
        //  echo '<div class="gbox">';
        $questRoom = '001';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        }
        echo '" >';
        // ------------------------------------- FIND GOLD CHEST 1
        if ($row['goldkey']=='0') {
            echo '<span class="icon npc gold">'.file_get_contents("img/svg/chest2.svg").'</span>';
        }
        if ($row['goldkey']>='1') {
            echo '<span class="icon npc gold">'.file_get_contents("img/svg/key.svg").'</span>';
        }
        echo '<h4 class="green">Grassy Field</h4>';
        echo '<h3 class="">Gold Chest</h3>';

        echo '<p class="gray">Gold Chests hold the best loot. Unlock the chest at the Grassy Field Crossroads. You can get a key by completing the Young Soldier\'s quests.</p>';
        if ($row['goldkey']=='0') {
            echo '<h5 class="gslice">'.$checkBox.' Get a Gold Key from the Young Soldier</h5>';
        }
        if ($row['goldkey']>='1') {
            //  echo '<i class="icon gold checkbox">'.file_get_contents("img/svg/key.svg").'</i>';

            echo '<h5 class="gslice green">'.$checkedBox.' You have a Gold Key! Open the gold chest at the Grassy Field Crossroads.</h5>';
          //  echo '<span class="icon npc gold">'.file_get_contents("img/svg/chest2.svg").'</span>';


            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="open chest"><h4>Open Chest</h4></button>';
            }
//            echo '<h5 class="gslice green"><i class="icon gold checkbox">'.file_get_contents("img/svg/key.svg").'</i> You have a Gold Key! Open the gold chest at the Grassy Field Crossroads.</h5>';
        }
        echo '</div>'; //-end gbox
    }





















    // --------------------------------------- Jack Lumber Quests appear after 5 scorpion tails quest
    if ($row['quest5']>=2) {
        // --------------------------------------- Jack Lumber QUEST CHAIN
        // --------------------------------------- Jack Lumber QUEST CHAIN
        // --------------------------------------- Jack Lumber QUEST CHAIN
        $questRoom = '024';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest7']==2 && $row['quest8']==2 && $row['quest9']==2) {
            echo ' end';
} elseif ($row['quest7']==0) {
echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc green">'.file_get_contents("img/svg/npc-jacklumber.svg").'</span>';
        echo '<h4 class="toprightX boxX green">Professional Lumberjack</h4>';
        echo '<h2>Jack Lumber</h2>';
        if ($row['quest7']<'2' || $row['quest8']<'2' || $row['quest9']<'2') {
            echo '<p class="gray">Jack Lumber is quite talented. He will teach you how to chop down some wood, how to set up a crafting table, and how to use ranged weapons. Find him east of the Grassy Field.</p>';
        } else {
            echo '<p class="gray">You have proven yourself strong by defeating the Goblin Chief. You can now leave the Grassy Field and go to the Forest and Red Town.</p>';
            echo '<h5 class="padd">'.$checkBox.' Find Hunter Bill in the Forest</h5>';
        }
        if ($row['quest7']=='0') { // ------------------------------------- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to Jack Lumber</h5>';
            if ($row['quest7']=='0' && $row['room']==$questRoom) {
                echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Jack Lumber</h4></button>';
            }
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 7
        $questNumber = '7';
        $questTag = 'Lvl 2 Item Collect';
        $questTitle = 'Boomerang Some Bats';
        $questDesc = 'Use ranged weapons to attack flying enemies. Equip your Boomerang (or any other ranged weapon) and go to the Bat Cave to collect Bat Wings. When you use a ranged weapon the damage done is based in your dexterity (DEX) stat.';
        if ($row['quest'.$questNumber.'']=='1') {
              $color='gold';
            if ($row['batwing']>='5') {
                $color='green';
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['weapontype']!='3' && $row['batwing']<'5') {
                echo '<h5 class="padd">'.$checkBox.' Equip a RANGED weapon like a boomerang or a bow using your INV menu </h5>';
            }
            else if ($row['batwing']<'5'){
              echo '<h5 class="padd green">'.$checkedBox.' Equip a RANGED weapon</h5>';
            }
            // elseif ($row['weapontype']=='3') {
            //    echo '<h5 class="padd green">'.$checkedBox.' Equip a ranged weapon</h5>';
            //}
            if ($row['batwing']<='4') {
                echo '<h5 class="padd">';
                if ($row['batwing']>=1) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['batwing']>=2) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['batwing']>=3) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['batwing']>=4) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['batwing']>=5) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                echo ' Collect 5 Bat Wings</h5>';
                echo '<i> (Bat Wings can be found in the Bat Cave south of the Grassy Field)</i>';
            }

            if ($row['batwing']>='5') {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.$checkedBox.$checkedBox.' You have collected 5 Bat Wings. Return to Jack Lumber for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 8
        $questNumber = '8';
        $questTag = 'Item Collect lvl 2-5';
        $questTitle = 'Chop some Wood, Craft a Table';
        $questDesc = 'Chop down 3 wood and then use the ACTION > CRAFT menu to create a Crafting Table. You can use a Crafting Table to create many useful items.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            if ($row['craftingtable']>='1') {
                $color='green';
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['quest'.$questNumber.'']=='1' && $row['craftingtable']<='0') {
                if ($row['wood']<=2) {
                    echo '<h5 class="padd">';
                    if ($row['wood']>=1) {
                        echo $checkedBox.' ';
                    } else {
                        echo $checkBox.' ';
                    }
                    if ($row['wood']>=2) {
                        echo $checkedBox.' ';
                    } else {
                        echo $checkBox.' ';
                    }
                    echo $checkBox.' ';
                    echo ' Chop down 3 wood</h5>';
                } else {
                    echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.'Chop down 3 wood (have: '.$row['wood'].')</h5>';
                }

                echo '<h5 class="padd">'.$checkBox.' Create a Crafting Table. Use the CRAFT tab in your ACTION menu.</h5>';
            }
            if ($row['quest'.$questNumber.'']=='1' && $row['craftingtable']>='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have successfully created a Crafting Table from wood. Return to Jack Lumber for your reward.</h5>';

                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            } else if ($row['quest'.$questNumber.'']=='2') {
              echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
            }
            echo '</div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 9
        $questNumber = '9';
        $questTag = 'Lvl 10 Battle';
        $questTitle = 'Goblin Chief Bounty';
        $questDesc = 'The Goblin Chief has been sending out his goblins to terrorize the countryside. Find and eliminate him. He is hiding out in the Bat Cave.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLgoblinchief'] >= '1') {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['quest'.$questNumber.'']=='1' && $questflag=='0') {
                echo '<h5 class="padd">'.$checkBox.'Find and eliminate the Goblin Chief hiding out in the Bat Cave.</h5>';
            }
            if ($row['quest'.$questNumber.'']=='1' && $questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Goblin Chief! Return to Jack Lumber for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>'; //-end gbox
    }





    // --------------------------------------- QUEST 10: Freddie Quests appear after goblin chief quest
    if ($row['quest9']>=2) {
        // --------------------------------------- QUEST 10: Freddie's Cow Farm
        // --------------------------------------- QUEST 10: Freddie's Cow Farm
        // --------------------------------------- QUEST 10: Freddie's Cow Farm

        $questRoom = '103';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest10']>=2) {
            echo ' end';
} elseif ($row['quest10']==0) {
echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc brown">'.file_get_contents("img/svg/npc-freddie.svg").'</span>';
        echo '<h4 class="toprightX boxX brown">Freddie\'s Cow Farm</h4>';
        echo '<h2>Freddie</h2>';
        if ($row['quest10']<'2') {
            echo '<p class="gray">Freddie has a nice Cow Farm that you can access for 50 '.$_SESSION['currency'].'. Use the leather harvested from cows to make leather equipment.</p>';
        } else {
            echo '<p class="gray">Nice work making some leather armor. Feel free to come back to the Cow Farm if you need some more. You should visit Freddie\'s friend Jungle Jim.</p>';
            echo '<h5 class="padd">'.$checkBox.' Find Jungle Jim by traveling across the Ocean.</h5>';
        }
        if ($row['quest10']=='0') { // ------------------------------------- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to Freddie</h5>';
            if ($row['quest10']=='0' && $row['room']==$questRoom) {
                echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Freddie</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 7
        $questNumber = '10';
        $questTag = 'Lvl 4 Craft';
        $questTitle = 'Craft with Leather';
        $questDesc = 'Craft some leather equipment using the leather from Freddie\'s cows.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            if ($row['leatherhood'] >= 1 ||
                $row['leatherhelmet'] >= 1 ||
                $row['leathervest'] >= 1 ||
                $row['leatherarmor'] >= 1 ||
                $row['leathergloves'] >= 1 ||
                $row['leatherboots'] >= 1) {
                $color='green';
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            // elseif ($row['weapontype']=='3') {
            //    echo '<h5 class="padd green">'.$checkedBox.' Equip a ranged weapon</h5>';
            //}
            if ($row['leatherhood'] >= 1 ||
                $row['leatherhelmet'] >= 1 ||
                $row['leathervest'] >= 1 ||
                $row['leatherarmor'] >= 1 ||
                $row['leathergloves'] >= 1 ||
                $row['leatherboots'] >= 1) {
                echo '<h5 class="padd green">'.$checkedBox.' You have a piece of leather equipment. Return to Freddie for your reward.  </h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            } else {
                if ($row['leather']<'3') {
                    echo '<h5 class="padd">';
                    if ($row['leather']>=1) {
                        echo $checkedBox.' ';
                    } else {
                        echo $checkBox.' ';
                    }
                    if ($row['leather']>=2) {
                        echo $checkedBox.' ';
                    } else {
                        echo $checkBox.' ';
                    }
                    if ($row['leather']>=3) {
                        echo $checkedBox.' ';
                    } else {
                        echo $checkBox.' ';
                    }
                    echo 'Gather 3 or more leather from the Cow Farm.</h5>';
                } else {
                    echo '<h5 class="padd green">'.$checkedBox.'You have '.$row['leather'].' leather.</h5>';
                }
                echo '<h5 class="padd">'.$checkBox.' Create a piece of leather equipment using a crafting table.</h5>';
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>';
    }

    // ----------------------------------------- GRAND QUEST 1 - finished - GO TO GRAND PILLAR
    if ($row['quest1']=='2' && $row['quest2']=='2' && $row['quest3']=='2' && $row['quest4']=='2' && $row['quest5']=='2' && $row['quest6']=='2' && $row['quest7']=='2' && $row['quest8']=='2' && $row['quest9']=='2'  && $row['quest10']=='2' && $row['grandquest1']=='1') {
        $questRoom = '029';

        echo '<div class="questhead gbox">';
        echo '<h4 class="toprightX boxX white">Grand Pillar</h4>';

        echo '<i class="icon npc blue">'.file_get_contents("img/svg/ironskin.svg").'</i>';
        echo '<h2 class="white">My First 10 Quests!</h2>
        <p class="gray">Congrats! You have cleared the Grassy Field quests and then some. Go to the GRAND QUEST PILLAR for your reward.</p>';
        if ($row['room']==$questRoom) {
            echo '<button type="submit" name="input1" class="greenBG" value="grand quest 1"> Complete Grand Quest</button>';
        } else {
            echo '<h5 class="padd">'.$checkBox.' Go to the GRAND QUEST PILLAR which can be found north of the Grassy Field.</h5>';
        }
        echo '</div>';
    }
    // ----------------------------------------- GRAND QUEST 1 - END
















    // --------------------------------------- Red Guard Captain Quests appear after Visit the Forest Gate
    if ($row['teleport2']>=1) {
        // --------------------------------------- Red Guard Captain QUEST CHAIN
        // --------------------------------------- Red Guard Captain QUEST CHAIN
        // --------------------------------------- Red Guard Captain QUEST CHAIN
        $questRoom = '215';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest11']==2 && $row['quest12']==2 && $row['quest13']==2) {
            echo ' end';
} elseif ($row['quest11']==0) {
echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc red">'.file_get_contents("img/svg/npc-redguardcaptain.svg").'</span>';
        echo '<h4 class="toprightX boxX red"><span class="forestX">Forest</span> Lookout</h4>';
        echo '<h2>Red Guard Captain</h2>';
        if ($row['quest11']<'2' || $row['quest12']<'2' || $row['quest13']<'2') { // -- default description
            echo '<p class="gray">The Red Guard Captain is in charge of the town\'s security. Find him north of the Grand Square.</p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest11']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to the Red Guard Captain</h5>';
            if ($row['quest11']=='0' && $row['room']==$questRoom) {
                echo '<button class="redBG focus" type="submit" name="input1" value="start quests"><h4>Talk to the Red Guard Captain</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 11
        $questNumber = '11';
        $questTag = 'Lvl 5 Random Encounter';
        $questTitle = 'Bring 3 Thieves to Justice';
        $questDesc = 'You will encounter thieves as you travel about the towns and roads. Help out the Captain and take care of any that cross your path.';
        if ($row['quest'.$questNumber.'']=='1') {
          $color='gold';
            if ($row['KLthief']>=3) {
                $color='green';
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['KLthief']<3) {
                echo '<h5 class="padd">';
                if ($row['KLthief']>=1) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['KLthief']>=2) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                echo $checkBox;
                echo ' Bring 3 thieves to justice</h5>';
            }

            if ($row['KLthief']>=3) {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have brought 3 Thieves to justice! Return to the Red Guard Captain to collect your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 8
        $questNumber = '12';
        $questTag = 'Item Collect';
        $questTitle = 'Swords for the Red Guard';
        $questDesc = 'Buy or find 5 long swords for the Red Guard. Alpha Scorpions, Orcs, Kobolds & Tarantulas drop them. Adam and Michael sell them.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            if ($row['longsword']>=5) {
                $color='green';
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['quest'.$questNumber.'']=='1' && $row['longsword']<5) {
                echo '<h5 class="padd">';
                if ($row['longsword']>=1) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['longsword']>=2) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['longsword']>=3) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['longsword']>=4) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                echo $checkBox.' ';
                echo ' Collect 5 Long Swords</h5>';
            }
            if ($row['quest'.$questNumber.'']=='1' && $row['longsword']>='5') {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.$checkedBox.$checkedBox.' You have 5 Long Swords! Return to the Red Guard Captain to collect your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 9
        $questNumber = '13';
        $questTag = 'Lvl 10 Battle';
        $questTitle = 'Sewer Pest Control';
        $questDesc = 'The sewers under town are infested with all sorts of mutated vermin. Help out by exterminating a Tarantula, Sewer Rat and Red Gator.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLtarantula']>=1 && $row['KLsewerrat']>=1 && $row['KLredgator']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['quest'.$questNumber.'']=='1' && $questflag=='0') {
                if ($row['KLtarantula']>=1) {
                    echo '<h5 class="padd green">'. $checkedBox.' Tarantula</h5>';
                } else {
                    echo '<h5 class="padd">'. $checkBox.' Tarantula</h5>';
                }
                if ($row['KLsewerrat']>=1) {
                    echo '<h5 class="green">'. $checkedBox.' Sewer Rat</h5>';
                } else {
                    echo '<h5 class="">'. $checkBox.' Sewer Rat</h5>';
                }
                if ($row['KLredgator']>=1) {
                    echo '<h5 class="padd green">'. $checkedBox.' Red Gator</h5>';
                } else {
                    echo '<h5 class="padd">'. $checkBox.' Red Gator</h5>';
                }
            }
            if ($row['quest'.$questNumber.'']=='1' && $questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have defeated a Tarantula, a Sewer Rat and a Red Gator! Return to the Red Guard Captain to collect your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>'; //-end gbox
    }















    // --------------------------------------- Forest Gnome Quests appear after Visit the Forest Gate
    if ($row['teleport2']>=1) {
        // --------------------------------------- Forest Gnome QUEST CHAIN
        // --------------------------------------- Forest Gnome QUEST CHAIN
        // --------------------------------------- Forest Gnome QUEST CHAIN
        $questRoom = '128';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest14']==2 && $row['quest15']==2 && $row['quest16']==2) {
            echo ' end';
} elseif ($row['quest14']==0) {
echo ' notstarted';
        }
        echo '" >';
        //  echo '<div class="gslice">';
        echo '<span class="icon npc forest">'.file_get_contents("img/svg/npc-forestgnome.svg").'</span>';
        echo '<h4 class="forest">Tree Hut</h4>';
        echo '<h2>Forest Gnome</h2>';
        if ($row['quest14']<'2' || $row['quest15']<'2' || $row['quest16']<'2') { // -- default description
            echo '<p class="gray">The Forest Gnome has a really chill tree hut set up in the forest. Hunter Bill wishes he was this cool.</p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest14']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to the Forest Gnome</h5>';
            if ($row['quest14']=='0' && $row['room']==$questRoom) {
                echo '<button class="forestBG focus" type="submit" name="input1" value="start quests"><h4>Talk to the Forest Gnome</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 14
        $questNumber = '14';
        $questTag = 'Berry Collect';
        $questTitle = 'Gnome Needs Berries';
        $questDesc = 'The Tree Gnome needs some berries. Return with 20 red and 20 blue.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['blueberry']>=20 && $row['redberry']>=20) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['redberry']<20) {
                echo '<h5 class="padd">'.$checkBox.' <span class="red">Redberry</span> '.$row['redberry'].'/20</h5>';
            } else {
                echo '<h5 class="padd green">'.$checkedBox.' <span class="red">Redberry</span> '.$row['redberry'].'/20 </h5>';
            }
            if ($row['blueberry']<20) {
                echo '<h5 class="">'.$checkBox.' <span class="blue">Blueberry</span> '.$row['blueberry'].'/20 </h5>';
            } else {
                echo '<h5 class="green ">'.$checkedBox.' <span class="blue">Blueberry</span> '.$row['blueberry'].'/20 </h5>';
            }

            if ($questflag=='1') {
                //  echo '<h5 class="padd red">';
                //  echo $row['redberry'].'/20 Redberry</h5>';
                //  echo '<h5 class="blue">';
                //  echo $row['blueberry'].'/20 Blueberry</h5>';
                echo '<h5 class="padd green">'.$checkedBox.' You have 20 redberries and 20 blueberries! Return to the Forest Gnome for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 15
        $questNumber = '15';
        $questTag = 'Item Collect';
        $questTitle = 'New Tree Hut Door';
        $questDesc = 'The Tree Gnome needs a new door for his hut. Go collect 20 wood for him.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['wood']>=20) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            //if ($row['quest'.$questNumber.'']=='1') {
            if ($row['wood']<20) {
                echo '<h5 class="padd">'.$checkBox.' <span class="brown">Wood</span> '.$row['wood'].'/20</h5>';
            } else {
                echo '<h5 class="padd green">'.$checkedBox.' <span class="">Wood</span> '.$row['wood'].'/20 </h5>';
            }

            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have 20 pieces of wood! Return to the Forest Gnome for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 16
        $questNumber = '16';
        $questTag = 'Lvl 35 Battle';
        $questTitle = 'Troll Base Camp';
        $questDesc = 'Trolls guard the entrance to the Dark Forest up north. Go slay 3 of them and return for a reward.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLtroll']>=3) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['KLtroll']<3) {
                echo '<h5 class="padd">';
                if ($row['KLtroll']>=1) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['KLtroll']>=2) {
                    echo $checkedBox .' ';
                } else {
                    echo $checkBox.' ';
                }
                echo $checkBox.' ';
                echo ' Trolls</h5>';
            }
            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have defeated 3 Trolls! Return to the Forest Gnome for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>'; //-end gbox
    }










    // --------------------------------------- Hunter Bill Quests appear after Visit the Forest Gate
    if ($row['teleport2']>=1) {
        // --------------------------------------- Hunter Bill QUEST CHAIN
        // --------------------------------------- Hunter Bill QUEST CHAIN
        // --------------------------------------- Hunter Bill QUEST CHAIN
        $questRoom = '118';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest17']==2 && $row['quest18']==2) {
            echo ' end';
} elseif ($row['quest17']==0) {
echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc forest">'.file_get_contents("img/svg/npc-hunterbill.svg").'</span>';
        echo '<h4 class="forest">Hunter Skills</h4>';
        echo '<h2>Hunter Bill</h2>';
        if ($row['quest17']<2 || $row['quest18']<2) { // -- default description
            echo '<p class="gray">Hunter Bill is super chill, but not as chill as the gnome. Feel free to hang out and learn some hunting skills at Bill\'s cabin in the Forest. </p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest17']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to Hunter Bill</h5>';
            if ($row['quest17']=='0' && $row['room']==$questRoom) {
                echo '<button class="forestBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Hunter Bill</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 17
        $questNumber = '17';
        $questTag = 'Lvl 13 Rare Encounter';
        $questTitle = 'Bigfoot Sighting';
        $questDesc = 'Bigfoot is rarely seen, some say he doesn\'t exist at all. Explore the Forest or Dark Forest and I\'m sure he will eventually show up.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLbigfoot']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['KLbigfoot']<=0) {
                echo '<h5 class="padd">'.$checkBox.' Find Bigfoot</h5>';
            }

            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You\'ve found Bigfoot! Return to Hunter Bill for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 18
        $questNumber = '18';
        $questTag = 'Gold Key Quest';
        $questTitle = 'Forest Hunter';
        $questDesc = 'The forest animals are running rampant. Hunt down a Wild Boar, Wolf, Coyote, Buck, Bear & Stag.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLwildboar'] >= 1 &&
                        $row['KLwolf'] >= 1 &&
                        $row['KLcoyote'] >= 1 &&
                        $row['KLbuck'] >= 1 &&
                        $row['KLbear'] >= 1 &&
                        $row['KLstag'] >= 1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            //  if ($questflag=='0') {
            echo '<div class="grid2">';

            if ($row['KLwildboar']>=1) {
                echo '<h5 class="padd green">'. $checkedBox.' Wild Boar</h5>';
            } else {
                echo '<h5 class="padd">'. $checkBox.' Wild Boar</h5>';
            }
            if ($row['KLwolf']>=1) {
                echo '<h5 class="padd green">'. $checkedBox.' Wolf</h5>';
            } else {
                echo '<h5 class="padd">'. $checkBox.' Wolf</h5>';
            }
            if ($row['KLcoyote']>=1) {
                echo '<h5 class="green">'. $checkedBox.' Coyote</h5>';
            } else {
                echo '<h5 class="">'. $checkBox.' Coyote</h5>';
            }
            if ($row['KLbuck']>=1) {
                echo '<h5 class="green">'. $checkedBox.' Buck</h5>';
            } else {
                echo '<h5 class="">'. $checkBox.' Buck</h5>';
            }
            if ($row['KLbear']>=1) {
                echo '<h5 class="padd green">'. $checkedBox.' Bear</h5>';
            } else {
                echo '<h5 class="padd">'. $checkBox.' Bear</h5>';
            }
            if ($row['KLstag']>=1) {
                echo '<h5 class="padd green">'. $checkedBox.' Stag</h5>';
            } else {
                echo '<h5 class="padd">'. $checkBox.' Stag</h5>';
            }
            echo '</div>';
            //  }

            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have successfully hunted all the creatures in the Forest! Return to Hunter Bill for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>'; //-end gbox
    }











  /*  $query = $link->query("UPDATE $user SET chest2 = 0 "); // heyooo
    $query = $link->query("UPDATE $user SET chest3 = 0 "); // heyooo
    $query = $link->query("UPDATE $user SET chest4 = 0 "); // heyooo
    $query = $link->query("UPDATE $user SET chest5 = 0 "); // heyooo
    $query = $link->query("UPDATE $user SET chest6 = 0 "); // heyooo
//    $query = $link->query("UPDATE $user SET goldkey = 6 "); // heyooo
*/

// --------------------- GOLD CHEST 2
// --------------------- GOLD CHEST 2
// --------------------- GOLD CHEST 2
        if ($row['chest2']=='0' && $row['chest1']=='1') {
            //  echo '<div class="gbox">';
            $questRoom = '119';
            echo '<div class="gbox';
            if ($row['room']==$questRoom) {
                echo ' tops';
            }
            echo '" >';
            // ------------------------------------- FIND GOLD CHEST 2
            if ($row['goldkey']=='0') {
                echo '<span class="icon npc gold">'.file_get_contents("img/svg/chest2.svg").'</span>';
            }
            if ($row['goldkey']>='1') {
                echo '<span class="icon npc gold">'.file_get_contents("img/svg/key.svg").'</span>';
            }
            echo '<h4 class="forest">Forest</h4>';
            echo '<h3 class="">Gold Chest</h3>';

            echo '<p class="gray padd">Gold Chests hold the best loot. Unlock the gold chest northeast of Hunter Bill. You can get a gold key by completing his hunting quest.</p>';
            echo '<p class="gray">Unlocking this gold chest also opens up the way to the dark forest.</p>';
            if ($row['goldkey']=='0') {
                echo '<h5 class="gslice">'.$checkBox.' Get a Gold Key</h5>';
            }
            if ($row['goldkey']>='1') {
                //  echo '<i class="icon gold checkbox">'.file_get_contents("img/svg/key.svg").'</i>';

                echo '<h5 class="gslice green">'.$checkedBox.' You have a Gold Key! Open the gold chest in the Forest.</h5>';
                //echo '<span class="icon npc gold">'.file_get_contents("img/svg/chest2.svg").'</span>';


                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="open chest"><h4>Open Chest</h4></button>';
                }
    //            echo '<h5 class="gslice green"><i class="icon gold checkbox">'.file_get_contents("img/svg/key.svg").'</i> You have a Gold Key! Open the gold chest at the Grassy Field Crossroads.</h5>';
            }
            echo '</div>'; //-end gbox
        }

















    // --------------------------------------- Warrior's Guild Initiation Quests appear after Visit the Forest Gate
    if ($row['teleport2']>=1) {
        // --------------------------------------- Warrior's Guild Initiation QUEST CHAIN
        // --------------------------------------- Warrior's Guild Initiation QUEST CHAIN
        // --------------------------------------- Warrior's Guild Initiation QUEST CHAIN
        $questRoom = '226';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest19']==2) {
            echo ' end';
        } elseif ($row['quest19']==0) {
        echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc darkblue">'.file_get_contents("img/svg/npc-warrior.svg").'</span>';
        echo '<h4 class="darkblue">Warrior\'s Guild</h4>';
        echo '<h2>Warrior\'s Guild Initiation</h2>';
        if ($row['quest19']<2) { // -- default description
            echo '<p class="gray">The Warrior\'s Guild offers skills and equipment to help you excel in battle. As a member you will learn new attacks and can increase your physical training skill to 20.</p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest19']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to Warrior\'s Guild Recruiter</h5>';
            if ($row['quest19']=='0' && $row['room']==$questRoom) {
                echo '<button class="darkblueBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Warrior\'s Guild Recruiter</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 19
        $questNumber = '19';
        $questTag = 'Lvl 13 Boss Battle';
        $questTitle = 'Trial of the Warrior';
        $questDesc = 'Do you have what it takes to become a Warrior? Defeat the Ogre Lair Boss and you will be able to call the Warrior\'s Guild your home.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLogrelieutenant']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['KLogrelieutenant']<=0) {
                echo '<h5 class="padd">'.$checkBox.' Defeat the Ogre Lieutenant.</h5>';
                echo '<p>The Ogre Lair is found in the southwest part of the Forest Map. Follow the path out of town to the north and then go west when you reach the Forest Map.</p>';
            }

            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Ogre Lieutenant. Return to the Warrior\'s Guild to become a member!</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }


        echo '</div>'; //-end gbox
    }








    // --------------------------------------- Wizard's Guild Initiation Quests appear after Visit the Forest Gate
    if ($row['teleport2']>=1) {
        // --------------------------------------- Wizard's Guild Initiation QUEST CHAIN
        // --------------------------------------- Wizard's Guild Initiation QUEST CHAIN
        // --------------------------------------- Wizard's Guild Initiation QUEST CHAIN
        $questRoom = '225';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest20']==2) {
            echo ' end';
} elseif ($row['quest20']==0) {
echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc purple">'.file_get_contents("img/svg/npc-wizard.svg").'</span>';
        echo '<h4 class="purple">Wizard\'s Guild</h4>';
        echo '<h2>Wizard\'s Guild Initiation</h2>';
        if ($row['quest20']<2) { // -- default description
            echo '<p class="gray">Do you like hurling great balls of fire at your enemies? Do you want to regenerate health using powerful magic? Do you dream about flying through the sky like a dragon? Well then you want to join the Wizard\'s Guild!</p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest20']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to Wizard\'s Guild Recruiter</h5>';
            if ($row['quest20']=='0' && $row['room']==$questRoom) {
                echo '<button class="purpleBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Wizard\'s Guild Recruiter</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 20
        $questNumber = '20';
        $questTag = 'Lvl 13 Boss Battle';
        $questTitle = 'Trial of the Wizard';
        $questDesc = 'Do you even wizard? Defeating the Kobold Lair Boss is the only way to join the Wizard\'s Guild and be able to truly call yourself a wizard.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLkoboldmaster']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['KLkoboldmaster']<=0) {
                echo '<h5 class="padd">'.$checkBox.' Defeat the Kobold Master.</h5>';
                echo '<p>The Kobold Lair is found in the northwest part of the Forest Map. Follow the path out of town all the way north and then go SW when you can\'t go north any further.</p>';
            }

            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Kobold Master. Return to the Wizard\'s Guild to become a member!</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            } else if ($row['quest'.$questNumber.'']=='2') {
              echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
            }
            echo '</div>';
        }


        echo '</div>'; //-end gbox
    }






















    // --------------------------------------- Town Hall Plaza Quests appear after Visit Red Town Square
    if ($row['teleport3']>=1) {
        // --------------------------------------- Town Hall Plaza QUEST CHAIN
        // --------------------------------------- Town Hall Plaza QUEST CHAIN
        // --------------------------------------- Town Hall Plaza QUEST CHAIN
        $questRoom = '221';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest21']==2 && $row['quest22']==2 && $row['quest23']==2) {
            echo ' end';
        } elseif ($row['quest21']==0) {
            echo ' notstarted';
        }

        echo '" >';
        echo '<span class="icon npc red">'.file_get_contents("img/svg/npc-townhallplaza.svg").'</span>';
        echo '<h4 class="red">Red Town</h4>';
        echo '<h2>Town Hall Plaza</h2>';
        if ($row['quest21']<'2' || $row['quest22']<'2' || $row['quest23']<'2') { // -- default description
            echo '<p class="gray">The spacious plaza is busy with people trading and passing through. Some are looking for help.</p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest21']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to the people at the Plaza</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="redBG focus" type="submit" name="input1" value="start quests"><h4>Talk to the people</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 21
        $questNumber = '21';
        $questTag = 'Flower Collect';
        $questTitle = 'Twice as Nice';
        $questDesc = 'The nice lady would like you to bring her 2 flowers. You can pick one from the Grassy Field and one from the Babylon Gardens.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['flower']>=2) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['flower']>=1) {
                echo '<h5 class="padd green">'.$checkedBox.'  Pick Flower - Grassy Field</h5>';
            } else {
                echo '<h5 class="padd">'.$checkBox.'Pick Flower - Grassy Field</h5>';
            }
            if ($row['flower']>=2) {
                echo '<h5 class="green">'.$checkedBox.'Pick Flower - Babylon Gardens</h5>';
            } else {
                echo '<h5 class="">'.$checkBox.'Pick Flower - Babylon Gardens </h5>';
            }


            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have 2 flowers! Return to Red Town Plaza for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 22
        $questNumber = '22';
        $questTag = 'Item Collect';
        $questTitle = 'Cookin up some Meat-a-balls ';
        $questDesc = 'Bring the Chef 5 pieces of cooked meat and he will teach you how to cook up some tasty meatballs.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['cookedmeat']>=5) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            //if ($row['quest'.$questNumber.'']=='1') {
            if ($row['cookedmeat']<5) {
                echo '<h5 class="padd">';
                if ($row['cookedmeat']>=1) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['cookedmeat']>=2) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['cookedmeat']>=3) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['cookedmeat']>=4) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                echo $checkBox.' ';
                echo ' Cooked Meat</h5>';
            }

            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.$checkedBox.$checkedBox.' You have 5 pieces of cooked meat! Return to the Chef at Red Town Plaza for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 23
        $questNumber = '23';
        $questTag = 'Lvl 14 Mini-Boss';
        $questTitle = 'Stolen Teddy Bear';
        $questDesc = 'Little Suzie\'s stuffed animal has been stolen. No doubt the thieves have it. Find and defeat their leader in the Thieve\'s Den down in the Sewers.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLmasterthief']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['KLmasterthief']>=1) {
                echo '<h5 class="padd green">'.$checkedBox.' Defeat the Master Thief. </h5> ';
            } else {
                echo '<h5 class="padd">'.$checkBox.' Defeat the Master Thief and bring back Suzie\'s Teddy Bear. </h5>';
            }
            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have retrieved the stolen Teddy Bear. Return to Red Town Plaza for your reward. </h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>'; //-end gbox
    }



















    // --------------------------------------- Red Town Mayor Quests appear after gold chest 1 open
    if ($row['chest1']>=1) {
        // --------------------------------------- Red Town Mayor QUEST CHAIN
        // --------------------------------------- Red Town Mayor QUEST CHAIN
        // --------------------------------------- Red Town Mayor QUEST CHAIN
        $questRoom = '222z';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest24']==2) {
            echo ' end';
} elseif ($row['quest24']==0) {
echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc red">'.file_get_contents("img/svg/npc-mayor.svg").'</span>';
        echo '<h4 class="red">Town Hall</h4>';
        echo '<h2>Red Town Mayor</h2>';
        if ($row['quest24']<2) { // -- default description
            echo '<p class="gray">Mayor Rudolf runs the town out of his office. You can find him on the top floor of Town Hall.</p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest24']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to the Red Town Mayor</h5>';
            if ($row['quest24']=='0' && $row['room']==$questRoom) {
                echo '<button class="redBG focus" type="submit" name="input1" value="start quests"><h4>Talk to the Mayor</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 24
        $questNumber = '24';
        $questTag = 'Lvl 30 Boss';
        $questTitle = 'Scorpion King Bounty';
        $questDesc = 'Defeat the ferocious Scorpion King in the Scorpion Pit below the Spider Cave. Completing this quest will reward you with a <span class="gold">Gold Key</span>.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLscorpionking']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['KLscorpionking']<=0) {
                echo '<h5 class="padd">'.$checkBox.' Defeat the Scorpion King</h5>';
            }

            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Scorpion King. Return to the Red Town Mayor for your reward!</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>'; //-end gbox
    }











    // --------------------- GOLD CHEST 3
    // --------------------- GOLD CHEST 3
    // --------------------- GOLD CHEST 3
            if ($row['chest3']=='0' && $row['chest1']=='1') {
                //  echo '<div class="gbox">';
                $questRoom = '224';
                echo '<div class="gbox';
                if ($row['room']==$questRoom) {
                    echo ' tops';
                }
                echo '" >';
                // ------------------------------------- FIND GOLD CHEST 3
                if ($row['goldkey']=='0') {
                    echo '<span class="icon npc gold">'.file_get_contents("img/svg/chest2.svg").'</span>';
                }
                if ($row['goldkey']>='1') {
                    echo '<span class="icon npc gold">'.file_get_contents("img/svg/key.svg").'</span>';
                }
                echo '<h4 class="red">Red Town</h4>';
                echo '<h3 class="">Gold Chest</h3>';
                echo '<p class="gray padd">Gold Chests hold the best loot. Unlock the gold chest in the Babylon Gardens. You can get a gold key by completing the Mayor\'s quest.</p>';
                if ($row['goldkey']=='0') {
                    echo '<h5 class="gslice">'.$checkBox.' Get a Gold Key</h5>';
                }
                if ($row['goldkey']>='1') {
                    echo '<h5 class="gslice green">'.$checkedBox.' You have a Gold Key! Open the Red Town gold chest.</h5>';
                    if ($row['room']==$questRoom) {
                        echo '<button class="greenBG" type="submit" name="input1" value="open chest"><h4>Open Chest</h4></button>';
                    }
                }
                echo '</div>'; //-end gbox
            }















    // --------------------------------------- Warrior Pete Quests appear after member of warriors guild
    if ($row['quest19']>=2) {
        // --------------------------------------- Warrior Pete QUEST CHAIN
        // --------------------------------------- Warrior Pete QUEST CHAIN
        // --------------------------------------- Warrior Pete QUEST CHAIN
        $questRoom = '226e';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest25']==2 && $row['quest26']==2 && $row['quest27']==2) {
            echo ' end';
} elseif ($row['quest25']==0) {
echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc blue">'.file_get_contents("img/svg/npc-warrior2.svg").'</span>';
        echo '<h4 class="blue">Warrior\'s Guild</h4>';
        echo '<h2>Warrior Pete</h2>';
        if ($row['quest25']<'2' || $row['quest26']<'2' || $row['quest27']<'2') { // -- default description
            echo '<p class="gray">Warrior Pete is somewhat small for a Warrior, but he\'s no slouch. Complete his 3 quests to become one of the strongest Warriors in the guild.</p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest25']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to Warrior Pete</h5>';
            if ($row['quest25']=='0' && $row['room']==$questRoom) {
                echo '<button class="blueBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Warrior Pete</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 25
        $questNumber = '25';
        $questTag = 'Lvl 10 Battle';
        $questTitle = 'Banish the Skeleton Knights';
        $questDesc = 'Send 3 Skeleton Knights back to Hell. Find them down in the Sewer Catacombs. ';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLskeletonknight']>=3) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['KLskeletonknight']<3) {
                echo '<h5 class="padd">';
                if ($row['KLskeletonknight']>=1) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['KLskeletonknight']>=2) {
                    echo $checkedBox .' ';
                } else {
                    echo $checkBox.' ';
                }
                echo $checkBox.' ';
                echo ' Skeleton Knights</h5>';
            }
            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have sent 3 Skeleton Knights back to hell! Return to Warrior Pete for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 26
        $questNumber = '26';
        $questTag = 'Lvl 20 Battle';
        $questTitle = 'Shark Hunter';
        $questDesc = 'Travel under the Ocean and hunt down a Great White and Hammerhead Shark. ';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLgreatwhite']>=1 && $row['KLhammerhead']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['KLgreatwhite']>=1) {
                echo '<h5 class="padd green">'.$checkedBox.' Great White </h5> ';
            } else {
                echo '<h5 class="padd">'.$checkBox.' Great White</h5>';
            }
            if ($row['KLhammerhead']>=1) {
                echo '<h5 class="green">'.$checkedBox.' Hammerhead </h5> ';
            } else {
                echo '<h5 class="">'.$checkBox.' Hammerhead</h5>';
            }
            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have defeated a Great White and Hammerhead! Return to Warrior Pete for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 27
        $questNumber = '27';
        $questTag = 'Lvl 35 Battle';
        $questTitle = 'True Troll Champion';
        $questDesc = 'Become a legend warrior by defeating 3 Troll Champions. They can be found in the Dark Forest.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLtrollchampion']>=3) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['KLtrollchampion']<3) {
                echo '<h5 class="padd">';
                if ($row['KLtrollchampion']>=1) {
                    echo $checkedBox.' ';
                } else {
                    echo $checkBox.' ';
                }
                if ($row['KLtrollchampion']>=2) {
                    echo $checkedBox .' ';
                } else {
                    echo $checkBox.' ';
                }
                echo $checkBox.' ';
                echo ' Troll Champions</h5>';
            }
            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have defeated 3 Troll Champions! Return to Warrior Pete for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>'; //-end gbox
    }











    // --------------------------------------- Wizard Morty Quests appear after member wizards guild
    if ($row['quest20']>=2) {
        // --------------------------------------- Wizard Morty QUEST CHAIN
        // --------------------------------------- Wizard Morty QUEST CHAIN
        // --------------------------------------- Wizard Morty QUEST CHAIN
        $questRoom = '225g';
        echo '<div class="gbox';
        if ($row['room']==$questRoom) {
            echo ' tops';
        } elseif ($row['quest28']==2 && $row['quest29']==2 && $row['quest30']==2) {
            echo ' end';
} elseif ($row['quest28']==0) {
echo ' notstarted';
        }
        echo '" >';
        echo '<span class="icon npc purple">'.file_get_contents("img/svg/npc-wizard2.svg").'</span>';
        echo '<h4 class="purple">Wizards\'s Guild</h4>';
        echo '<h2>Wizard Morty</h2>';
        if ($row['quest28']<'2' || $row['quest29']<'2' || $row['quest30']<'2') { // -- default description
            echo '<p class="gray">Wizard Morty is such a prankster. Complete his 3 quests to become one of the strongest Wizards in the guild.</p>';
        } else { // --- all quests done
            echo '<p class="gray">ALL Quests done!</p>';
                    }
        if ($row['quest28']=='0') { // ---- end state
            echo '<h5 class="gslice">'.$checkBox.' Talk to Wizard Morty</h5>';
            if ($row['quest28']=='0' && $row['room']==$questRoom) {
                echo '<button class="purpleBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Wizard Morty</h4></button>';
            }
        }
        // ----------------------------------------- IN PROGRESS - QUEST 28
        $questNumber = '28';
        $questTag = 'Lvl 7 Random Encounter';
        $questTitle = 'Rare Gray Matter';
        $questDesc = 'Find a piece of gray matter and show it to Morty. Gray Matter is dropped by rare creatures.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['graymatter']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['graymatter']<1) {
                echo '<h5 class="padd">';
                echo $checkBox.' ';
                echo ' Gray Matter</h5>';
            }
            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have a piece of Gray Matter! Return to Morty for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 29
        $questNumber = '29';
        $questTag = 'Lvl 17 Double Boss';
        $questTitle = 'Omar & Victoria the Dead';
        $questDesc = 'Defeat the undead duo down in the Catacombs.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLvictoria']>=1 && $row['KLomar']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';
            if ($row['KLomar']>=1) {
                echo '<h5 class="padd green">'.$checkedBox.' Omar the Dead </h5> ';
            } else {
                echo '<h5 class="padd">'.$checkBox.' Omar the Dead</h5>';
            }
            if ($row['KLvictoria']>=1) {
                echo '<h5 class="green">'.$checkedBox.' Victoria the Dead </h5> ';
            } else {
                echo '<h5 class="">'.$checkBox.' Victoria the Dead</h5>';
            }
            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have defeated Omar & Victoria! Return to Morty for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        // ----------------------------------------- IN PROGRESS - QUEST 30
        $questNumber = '30';
        $questTag = 'Lvl 40 Battle';
        $questTitle = 'Magic and the Troll Queen';
        $questDesc = 'Slay the Troll Queen with magic. She can be found all the way north in the Dark Forest.';
        if ($row['quest'.$questNumber.'']=='1') {
            $color='gold';
            $questflag='0';
            if ($row['KLtrollqueen']>=1) {
                $color='green';
                $questflag = "1";
            }
            echo '<div class="gslice">';
            echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
            echo '<h3>'.$questTitle.'</h3>';
            echo '<p class="gray">'.$questDesc.'</p>';

            if ($row['KLtrollqueen']<1) {
                echo '<h5 class="padd">';
                echo $checkBox.' ';
                echo ' Troll Queen</h5>';
            }
            if ($questflag=='1') {
                echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Troll Queen! Return to Morty for your reward.</h5>';
                if ($row['room']==$questRoom) {
                    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                }
            }
            echo '</div>';
        } else if ($row['quest'.$questNumber.'']=='2') {
          echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
        }
        echo '</div>'; //-end gbox
    }





        // --------------------------------------- Mining Guild Initiation Quests appear after warriors guild member
        if ($row['quest19']>=2) {
            // --------------------------------------- Mining Guild Initiation QUEST CHAIN
            // --------------------------------------- Mining Guild Initiation QUEST CHAIN
            // --------------------------------------- Mining Guild Initiation QUEST CHAIN

            $questRoom = '308';
            echo '<div class="gbox';
            if ($row['room']==$questRoom) {
                echo ' tops';
            } elseif ($row['quest31']==2) {
                echo ' end';
    } elseif ($row['quest31']==0) {
    echo ' notstarted';
            }
            echo '" >';
            echo '<span class="icon npc gold">'.file_get_contents("img/svg/npc-miner2.svg").'</span>';
            echo '<h4 class="gold">Mining Guild</h4>';
            echo '<h2>Mining Guild Initiation</h2>';
            if ($row['quest31']<2) { // -- default description
                echo '<p class="gray">You can find the Mining Guild in the Dwarf Village. The guild gives access to the neverending mine, the deepest mine in all of Vega.</p>';
            } else { // --- all quests done
                echo '<p class="gray">ALL Quests done!</p>';
                            }
            if ($row['quest31']=='0') { // ---- end state
              if ($row['quest31']=='0' && $row['room']==$questRoom) {
                  echo '<h5 class="gslice green">'.$checkedBox.' Find the Mining Guild Recruiter</h5>';
                  echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Recruiter</h4></button>';
              } else if ($row['quest31']=='0') {
                  echo '<h5 class="gslice">'.$checkBox.' Find the Mining Guild Recruiter</h5>';
              }
// Our members do more than just mine all day. The Mining Guild is made up of top notch Warriors and Wizards. Rangers and Knights too. Only the most adept actually, can become members, and gain priviledged access to <em>the</em> premier mine in all of Vega. All of Terros for that matter.
//If you want to become a member you must bring us the eye of the Kraken.
//Make your way underwater, deep into its cavern, slay it and remove its eye.


            }
            // ----------------------------------------- IN PROGRESS - QUEST 31
            $questNumber = '31';
            $questTag = 'Lvl 25 Underwater Boss';
            $questTitle = 'Eye of the Kraken';
            $questDesc = 'To join the Mining Guild you must defeat the mighty Kraken found under the Ocean and return with its eye.';
            if ($row['quest'.$questNumber.'']=='1') {
                $color='gold';
                $questflag='0';
                if ($row['KLkraken']>=1) {
                    $color='green';
                    $questflag = "1";
                }
                echo '<div class="gslice">';
                echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
                echo '<h3>'.$questTitle.'</h3>';
                echo '<p class="gray">'.$questDesc.'</p>';

                if ($row['KLkraken']<=0) {
                    echo '<h5 class="padd">'.$checkBox.' Defeat the Kraken</h5>';
                }

                if ($questflag=='1') {
                    echo '<h5 class="padd green">'.$checkedBox.' You have the Kraken\'s eye. Return to the Mining Guild to become a member!</h5>';
                    if ($row['room']==$questRoom) {
                        echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
                    }
                }
                echo '</div>';
            } else if ($row['quest'.$questNumber.'']=='2') {
              echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
            }
            echo '</div>'; //-end gbox
        }











  // --------------------------------------- Mining Guild Appear after Joining
  if ($row['quest31']>=2) {
      // --------------------------------------- Mining Guild QUEST CHAIN
      // --------------------------------------- Mining Guild QUEST CHAIN
      // --------------------------------------- Mining Guild QUEST CHAIN
      $questRoom = '308c';
      echo '<div class="gbox';
      if ($row['room']==$questRoom) {
          echo ' tops';
      } elseif ($row['quest32']==2 && $row['quest33']==2 && $row['quest34']==2) {
          echo ' end';
      } elseif ($row['quest32']==0) {
      echo ' notstarted';
      }
      echo '" >';
      echo '<span class="icon npc gold">'.file_get_contents("img/svg/npc-miner.svg").'</span>';
      echo '<h4 class="gold">Mining Guild</h4>';
      echo '<h2>Guild Leader</h2>';
      if ($row['quest32']<'2' || $row['quest33']<'2' || $row['quest34']<'2') { // -- default description
          echo '<p class="gray">The Guild Leader demonstrates perfect mining form. He instructs you to make your way down into the neverending mine and defeat any aggressive bosses you might encounter.  </p>';
      } else { // --- all quests done
          echo '<p class="gray">ALL Quests done!</p>';
                  }
      if ($row['quest32']=='0') { // ---- end state
          echo '<h5 class="gslice">'.$checkBox.' Find the Leader of the Mining Guild</h5>';
          if ($row['quest32']=='0' && $row['room']==$questRoom) {
              echo '<button class="goldBG focus" type="submit" name="input1" value="start quests"><h4>Talk to Guild Leader</h4></button>';
          }
      }
      // ----------------------------------------- IN PROGRESS - QUEST 32
      $questNumber = '32';
      $questTag = 'Lvl 30 Battle';
      $questTitle = 'Iron Boss';
      $questDesc = 'Defeat the Phoenix to learn how to craft with Iron. Find the Phoenix on level 10 in the neverending mine.';
      if ($row['quest'.$questNumber.'']=='1') {
          $color='gold';
          $questflag='0';
          if ($row['KLphoenix']>=1) {
              $color='green';
              $questflag = "1";
          }
          echo '<div class="gslice">';
          echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
          echo '<h3>'.$questTitle.'</h3>';
          echo '<p class="gray">'.$questDesc.'</p>';
          if ($row['KLphoenix']<1) {
              echo '<h5 class="padd">';
              echo $checkBox.' ';
              echo 'Defeat the Phoenix</h5>';
          }
          if ($questflag=='1') {
              echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Phoenix! Return to the Mining Guild for your reward.</h5>';
              if ($row['room']==$questRoom) {
                  echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
              }
          }
          echo '</div>';
      } else if ($row['quest'.$questNumber.'']=='2') {
        echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
      }
      // ----------------------------------------- IN PROGRESS - QUEST 33
      $questNumber = '33';
      $questTag = 'Lvl 40 Battle';
      $questTitle = 'Steel Boss';
      $questDesc = 'Defeat the Cyclops to learn how to craft with Steel. Find the Cyclops on level 20 in the neverending mine.';
      if ($row['quest'.$questNumber.'']=='1') {
          $color='gold';
          $questflag='0';
          if ($row['KLcyclops']>=1) {
              $color='green';
              $questflag = "1";
          }
          echo '<div class="gslice">';
          echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
          echo '<h3>'.$questTitle.'</h3>';
          echo '<p class="gray">'.$questDesc.'</p>';
          if ($row['KLcyclops']<1) {
              echo '<h5 class="padd">';
              echo $checkBox.' ';
              echo 'Defeat the Cyclops</h5>';
          }
          if ($questflag=='1') {
              echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Cyclops! Return to the Mining Guild for your reward.</h5>';
              if ($row['room']==$questRoom) {
                  echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
              }
          }
          echo '</div>';
      } else if ($row['quest'.$questNumber.'']=='2') {
        echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
      }
      // ----------------------------------------- IN PROGRESS - QUEST 34
      $questNumber = '34';
      $questTag = 'Lvl 60 Battle';
      $questTitle = 'Mithril Boss';
      $questDesc = 'Defeat the Minotaur to learn how to craft with Mithril. Find the Minotaur on level 30 in the neverending mine.';
      if ($row['quest'.$questNumber.'']=='1') {
          $color='gold';
          $questflag='0';
          if ($row['KLminotaur']>=1) {
              $color='green';
              $questflag = "1";
          }
          echo '<div class="gslice">';
          echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
          echo '<h3>'.$questTitle.'</h3>';
          echo '<p class="gray">'.$questDesc.'</p>';
          if ($row['KLminotaur']<1) {
              echo '<h5 class="padd">';
              echo $checkBox.' ';
              echo 'Defeat the Minotaur</h5>';
          }
          if ($questflag=='1') {
              echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Minotaur! Return to the Mining Guild for your reward.</h5>';
              if ($row['room']==$questRoom) {
                  echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
              }
          }
          echo '</div>';
      } else if ($row['quest'.$questNumber.'']=='2') {
        echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
      }
      echo '</div>'; //-end gbox
  }




  // --------------------------------------- Dwarf Captain quests after joining the warrior's guild
  if ($row['quest19']>=2) {
      // --------------------------------------- Dwarf Captain QUEST CHAIN
      // --------------------------------------- Dwarf Captain QUEST CHAIN
      // --------------------------------------- Dwarf Captain QUEST CHAIN
      $questRoom = '303';
      echo '<div class="gbox';
      if ($row['room']==$questRoom) {
          echo ' tops';
      } elseif ($row['quest35']==2 && $row['quest36']==2 && $row['quest37']==2) {
          echo ' end';
      } elseif ($row['quest35']==0) {
      echo ' notstarted';
      }
      echo '" >';
      echo '<span class="icon npc gold">'.file_get_contents("img/svg/npc-dwarfcaptain.svg").'</span>';
      echo '<h4 class="gold">Stone Mine Crossroads</h4>';
      echo '<h2>Dwarf Captain</h2>';
      if ($row['quest35']<'2' || $row['quest36']<'2' || $row['quest37']<'2') { // -- default description
          echo '<p class="gray">The war-scarred Captain is quite big for a Dwarf. You can find him standing guard at the Stone Mine Crossroads.  </p>';
      } else { // --- all quests done
          echo '<p class="gray">ALL Quests done!</p>';
                  }
      if ($row['quest35']=='0') { // ---- end state
          echo '<h5 class="gslice">'.$checkBox.' Find the Dwarf Captain</h5>';
          if ($row['quest35']=='0' && $row['room']==$questRoom) {
              echo '<button class="goldBG focus" type="submit" name="input1" value="start quests"><h4>Talk to the Captain</h4></button>';
          }
      }
      // ----------------------------------------- IN PROGRESS - QUEST 35
      $questNumber = '35';
      $questTag = 'Lvl 15 - 23 Battle [Gold Key Quest]';
      $questTitle = 'Clear out the Abandoned Mine';
      $questDesc = 'Eliminate the mutated creatures that have overrun the Abandoned Mine.';
      if ($row['quest'.$questNumber.'']=='1') {
          $color='gold';
          $questflag='0';
          if ($row['KLrabidskeever'] >= 1 &&
              $row['KLbleedingdartwing'] >= 1 &&
              $row['KLmongoliandeathworm'] >= 1) {
              $color='green';
              $questflag = "1";
          }
          echo '<div class="gslice">';
          echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
          echo '<h3>'.$questTitle.'</h3>';
          echo '<p class="gray">'.$questDesc.'</p>';
          //  if ($questflag=='0') {
          echo '<div class="grid2X">';

          if ($row['KLrabidskeever']>=1) {
              echo '<h5 class="padd green">'. $checkedBox.' Rabid Skeever</h5>';
          } else {
              echo '<h5 class="padd">'. $checkBox.' Rabid Skeever</h5>';
          }
          if ($row['KLbleedingdartwing']>=1) {
              echo '<h5 class="padd green">'. $checkedBox.' Bleeding Dartwing</h5>';
          } else {
              echo '<h5 class="padd">'. $checkBox.' Bleeding Dartwing</h5>';
          }
          if ($row['KLmongoliandeathworm']>=1) {
              echo '<h5 class="padd green">'. $checkedBox.' Mongolian Death Worm</h5>';
          } else {
              echo '<h5 class="padd">'. $checkBox.' Mongolian Death Worm</h5>';
          }
          echo '</div>';
          //  }

          if ($questflag=='1') {
              echo '<h5 class="padd green">'.$checkedBox.' You have cleared out the Abandoned Mine! Return to the Dwarf Captain for your reward.</h5>';
              if ($row['room']==$questRoom) {
                  echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
              }
          }
          echo '</div>';
      } else if ($row['quest'.$questNumber.'']=='2') {
        echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
      }


      // ----------------------------------------- IN PROGRESS - QUEST 36
      $questNumber = '36';
      $questTag = 'Lvl 20 Random Underwater Encounter';
      $questTitle = 'Glowing Sea Monster';
      $questDesc = 'Find the rare fabled glowing monster under the Ocean.';
      if ($row['quest'.$questNumber.'']=='1') {
          $color='gold';
          $questflag='0';
          if ($row['KLglowingoctopus']>=1) {
              $color='green';
              $questflag = "1";
          }
          echo '<div class="gslice">';
          echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
          echo '<h3>'.$questTitle.'</h3>';
          echo '<p class="gray">'.$questDesc.'</p>';
          if ($row['KLglowingoctopus']<1) {
              echo '<h5 class="padd">';
              echo $checkBox.' ';
              echo 'Defeat the Glowing Monster under the Ocean.</h5>';
          }
          if ($questflag=='1') {
              echo '<h5 class="padd green">'.$checkedBox.' You have defeated the rare Glowing Octopus! Return to the Dwarf Captain for your reward.</h5>';
              if ($row['room']==$questRoom) {
                  echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
              }
          }
          echo '</div>';
      } else if ($row['quest'.$questNumber.'']=='2') {
        echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
      }
      // ----------------------------------------- IN PROGRESS - QUEST 37
      $questNumber = '37';
      $questTag = 'Lvl 25 Battle';
      $questTitle = 'Missing Dwarf Axeman';
      $questDesc = 'A dwarf guard axeman is missing from town. He was last seen patrolling around the Stone Grotto. Go see if you can find him.';
      if ($row['quest'.$questNumber.'']=='1') {
          $color='gold';
          $questflag='0';
          if ($row['KLpossessedaxeman']>=1) {
              $color='green';
              $questflag = "1";
          }
          echo '<div class="gslice">';
          echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
          echo '<h3>'.$questTitle.'</h3>';
          echo '<p class="gray">'.$questDesc.'</p>';
          if ($row['KLpossessedaxeman']<1) {
              echo '<h5 class="padd">';
              echo $checkBox.' ';
              echo 'Find the Dwarf Axeman</h5>';
          }
          if ($questflag=='1') {
              echo '<h5 class="padd green">'.$checkedBox.' You have found the location of the missing Axeman! Return to the Dwarf Captain for your reward.</h5>';
              if ($row['room']==$questRoom) {
                  echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
              }
          }
          echo '</div>';
      } else if ($row['quest'.$questNumber.'']=='2') {
        echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
      }
      echo '</div>'; //-end gbox
  }




                      // --------------------------------------- Dwarf Guard quests after joining the warrior's guild
                      if ($row['quest19']>=2) {
                          // --------------------------------------- Dwarf Guard QUEST CHAIN
                          // --------------------------------------- Dwarf Guard QUEST CHAIN
                          // --------------------------------------- Dwarf Guard QUEST CHAIN
                          $questRoom = '306';
                          echo '<div class="gbox';
                          if ($row['room']==$questRoom) {
                              echo ' tops';
                          } elseif ($row['quest35']==2 && $row['quest36']==2 && $row['quest37']==2) {
                              echo ' end';
                          } elseif ($row['quest35']==0) {
                          echo ' notstarted';
                          }
                          echo '" >';
                          echo '<span class="icon npc gold">'.file_get_contents("img/svg/npc-bountyboard.svg").'</span>';
                          echo '<h4 class="gold">Dwarf Guard</h4>';
                          echo '<h2>Bounty Board</h2>';
                          if ($row['quest38']<'2' || $row['quest39']<'2' || $row['quest40']<'2') { // -- default description
                              echo '<p class="gray">The bounty board, built by the Dwarven Guard, is covered in wanted posters. Locate and bring to justice the wanted wrongdoers and receive a handsome reward.</p>';
                          } else { // --- all quests done
                              echo '<p class="gray">ALL Quests done!</p>';
                                      }
                          if ($row['quest38']=='0') { // ---- end state
                              if ($row['room']==$questRoom) {
                                echo '<h5 class="gslice green">'.$checkedBox.' Find the Dwarf Guard Bounty Board</h5>';
                                  echo '<button class="goldBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                              }
                              else {
                                echo '<h5 class="gslice">'.$checkBox.' Find the Dwarf Guard Bounty Board</h5>';
                              }
                          }
  // ----------------------------------------- IN PROGRESS - QUEST 38
  $questNumber = '38';
  $questTag = 'lvl 30 Battle';
  $questTitle = 'Red Beard Bounty';
  $questDesc = 'Defeat the treacherous Captain Red Beard. Find him hiding away in the Red Fort.';
  if ($row['quest'.$questNumber.'']=='1') {
      $color='gold';
      $questflag='0';
      if ($row['KLredbeard'] >= 1) {
          $color='green';
          $questflag = "1";
      }
      echo '<div class="gslice">';
      echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
      echo '<h3>'.$questTitle.'</h3>';
      echo '<p class="gray">'.$questDesc.'</p>';
      //  if ($questflag=='0') {
      echo '<div class="">';

      if ($row['KLredbeard']<1) {
          echo '<h5 class="padd">'. $checkBox.' Red Beard</h5>';
      }
      echo '</div>';
      //  }

      if ($questflag=='1') {
          echo '<h5 class="padd green">'.$checkedBox.' You have defeated Red Beard! Return to the Dwarf Guard Bounty Board for your reward.</h5>';
          if ($row['room']==$questRoom) {
              echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
          }
      }
      echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
    echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }
  // ----------------------------------------- IN PROGRESS - QUEST 39
  $questNumber = '39';
  $questTag = 'lvl 45 Battle';
  $questTitle = 'Troll King Bounty';
  $questDesc = 'Defeat the murderous Troll King found deep in the Dark Forest.';
  if ($row['quest'.$questNumber.'']=='1') {
      $color='gold';
      $questflag='0';
      if ($row['KLtrollking'] >= 1) {
          $color='green';
          $questflag = "1";
      }
      echo '<div class="gslice">';
      echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
      echo '<h3>'.$questTitle.'</h3>';
      echo '<p class="gray">'.$questDesc.'</p>';
      //  if ($questflag=='0') {
      echo '<div class="">';

      if ($row['KLtrollking']<1) {
          echo '<h5 class="padd">'. $checkBox.' Troll King</h5>';
      }
      echo '</div>';
      //  }

      if ($questflag=='1') {
          echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Troll King! Return to the Dwarf Guard Bounty Board for your reward.</h5>';
          if ($row['room']==$questRoom) {
              echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
          }
      }
      echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
    echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }
  // ----------------------------------------- IN PROGRESS - QUEST 40
  $questNumber = '40';
  $questTag = 'lvl 55 Battle';
  $questTitle = 'Gatekeeper Bounty';
  $questDesc = 'Defeat the demonic Gatekeeper guarding the Stone Bridge in the Mountains.';
  if ($row['quest'.$questNumber.'']=='1') {
      $color='gold';
      $questflag='0';
      if ($row['KLgatekeeper'] >= 1) {
          $color='green';
          $questflag = "1";
      }
      echo '<div class="gslice">';
      echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
      echo '<h3>'.$questTitle.'</h3>';
      echo '<p class="gray">'.$questDesc.'</p>';
      //  if ($questflag=='0') {
      echo '<div class="">';

      if ($row['KLgatekeeper']<1) {
          echo '<h5 class="padd">'. $checkBox.' Gatekeeper</h5>';
      }
      echo '</div>';
      //  }

      if ($questflag=='1') {
          echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Gatekeeper! Return to the Dwarf Guard Bounty Board for your reward.</h5>';
          if ($row['room']==$questRoom) {
              echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
          }
      }
      echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
    echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }
    echo '</div>'; //-end gbox
  }



                        // --------------------------------------- Friendly Pirate quests after defeating Goblin Chief
                        if ($row['quest9']>=2) {
                            // --------------------------------------- Friendly Pirate QUEST CHAIN
                            // --------------------------------------- Friendly Pirate QUEST CHAIN
                            // --------------------------------------- Friendly Pirate QUEST CHAIN
                            $questRoom = '413';
                            echo '<div class="gbox';
                            if ($row['room']==$questRoom) {
                                echo ' tops';
                            } elseif ($row['quest41']==2 && $row['quest42']==2 && $row['quest43']==2) {
                                echo ' end';
                            } elseif ($row['quest41']==0) {
                            echo ' notstarted';
                            }
                            echo '" >';
                            echo '<span class="icon npc ocean">'.file_get_contents("img/svg/npc-pirate.svg").'</span>';
                            echo '<h4 class="ocean">Blue Oasis</h4>';
                            echo '<h2>Friendly Pirate</h2>';
                            if ($row['quest41']<'2' || $row['quest42']<'2' || $row['quest43']<'2') { // -- default description
                                echo '<p class="gray">The Friendly Pirate can be found relaxing at the Blue Oasis. Go hang with him and pick some fresh berries on his beautiful island.</p>';
                            } else { // --- all quests done
                                echo '<p class="gray">ALL Quests done!</p>';
                                        }
                            if ($row['quest41']=='0') { // ---- end state
                                if ($row['room']==$questRoom) {
                                  echo '<h5 class="gslice green">'.$checkedBox.' Find the Friendly Pirate</h5>';
                                    echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                                }
                                else {
                                  echo '<h5 class="gslice">'.$checkBox.' Find the Friendly Pirate</h5>';
                                }
                            }
    // ----------------------------------------- IN PROGRESS - QUEST 41
    $questNumber = '41';
    $questTag = 'Lvl 13 Battle';
    $questTitle = 'Like a Squid';
    $questDesc = 'Aggressive squid have inundated the Ocean. Hunt down 3 of them.';
    if ($row['quest'.$questNumber.'']=='1') {
      $color='gold';
        if ($row['KLsquid']>=3) {
            $color='green';
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';

        if ($row['KLsquid']<3) {
            echo '<h5 class="padd">';
            if ($row['KLsquid']>=1) {
                echo $checkedBox.' ';
            } else {
                echo $checkBox.' ';
            }
            if ($row['KLsquid']>=2) {
                echo $checkedBox.' ';
            } else {
                echo $checkBox.' ';
            }
            echo $checkBox;
            echo ' Squid</h5>';
        }

        if ($row['KLsquid']>=3) {
            echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have hunted down 3 Squid! Return to the Friendly Pirate for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 42
    $questNumber = '42';
    $questTag = 'Lvl 6 Extermination';
    $questTitle = 'Mud Crab Extermination';
    $questDesc = 'Mud Island has been overrun by Crabs! Exterminate 20 of them.';
    if ($row['quest'.$questNumber.'']=='1') {
      $color='gold';
        if ($row['KLmudcrab']>=20) {
            $color='green';
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';

        if ($row['KLmudcrab']<20) {
            echo '<h5 class="padd">';
            if ($row['KLmudcrab']>=1) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=2) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=3) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=4) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=5) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=6) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=7) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=8) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=9) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=10) {echo $checkedBox.'</h5><h5 class="padd">  ';
            } else { echo $checkBox.'</h5><h5 class="padd"> ';}
            if ($row['KLmudcrab']>=11) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=12) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=13) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=14) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=15) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=16) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=17) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=18) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            if ($row['KLmudcrab']>=19) {echo $checkedBox.' ';
            } else { echo $checkBox.' ';}
            echo $checkBox;
            echo ' </h5><h5 class="padd"> Exterminate 20 Mud Crabs</h5>';
        }

        if ($row['KLmudcrab']>=20) {
            echo '<h5 class="padd green">'.$checkedBox.' You have hunted down 20 mud crabs! Return to the Friendly Pirate for your mud reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 43
    $questNumber = '43';
    $questTag = 'lvl 10-25 Hunt - Gold Key Quest';
    $questTitle = 'Ocean Hunter Pro';
    $questDesc = 'Hunt down a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile. All found in the Ocean.';
    if ($row['quest'.$questNumber.'']=='1') {
        $color='gold';
        $questflag='0';
        if ($row['KLjellyfish'] >= 1 &&
                    $row['KLelectriceel'] >= 1 &&
                    $row['KLpiranha'] >= 1 &&
                    $row['KLbarracuda'] >= 1 &&
                    $row['KLcrocodile'] >= 1) {
            $color='green';
            $questflag = "1";
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';
        //  if ($questflag=='0') {
        echo '<div class="grid2">';

        if ($row['KLjellyfish']>=1) {
            echo '<h5 class="padd green">'. $checkedBox.' Jellyfish</h5>';
        } else {
            echo '<h5 class="padd">'. $checkBox.' Jellyfish</h5>';
        }
        if ($row['KLelectriceel']>=1) {
            echo '<h5 class="padd green">'. $checkedBox.' Electric Eel</h5>';
        } else {
            echo '<h5 class="padd">'. $checkBox.' Electric Eel</h5>';
        }
        if ($row['KLpiranha']>=1) {
            echo '<h5 class="green">'. $checkedBox.' Piranha</h5>';
        } else {
            echo '<h5 class="">'. $checkBox.' Piranha</h5>';
        }
        if ($row['KLbarracuda']>=1) {
            echo '<h5 class="green">'. $checkedBox.' Barracuda</h5>';
        } else {
            echo '<h5 class="">'. $checkBox.' Barracuda</h5>';
        }
        if ($row['KLcrocodile']>=1) {
            echo '<h5 class="padd green">'. $checkedBox.' Crocodile</h5>';
        } else {
            echo '<h5 class="padd">'. $checkBox.' Crocodile</h5>';
        }
        echo '</div>';
        //  }

        if ($questflag=='1') {
            echo '<h5 class="padd green">'.$checkedBox.' You have defeated a Jellyfish, Electric Eel, Piranha, Barracuda & Crocodile! Return to the Friendly Pirate for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }
      echo '</div>'; //-end gbox
    }






                    // --------------------------------------- Jungle Jim quests after defeating Goblin Chief
                    if ($row['quest9']>=2) {
                        // --------------------------------------- Friendly Pirate QUEST CHAIN
                        // --------------------------------------- Friendly Pirate QUEST CHAIN
                        // --------------------------------------- Friendly Pirate QUEST CHAIN
                        $questRoom = '424';
                        echo '<div class="gbox';
                        if ($row['room']==$questRoom) {
                            echo ' tops';
                        } elseif ($row['quest44']==2 && $row['quest45']==2 && $row['quest46']==2) {
                            echo ' end';
                        } elseif ($row['quest44']==0) {
                        echo ' notstarted';
                        }
                        echo '" >';
                        echo '<span class="icon npc ocean">'.file_get_contents("img/svg/npc-surfer.svg").'</span>';
                        echo '<h4 class="ocean">Crocodile Island</h4>';
                        echo '<h2>Jungle Jim</h2>';
                        if ($row['quest44']<'2' || $row['quest45']<'2' || $row['quest46']<'2') { // -- default description
                            echo '<p class="gray">Jungle Jim likes to get away from it all and do some surfing on Crocodile Island.</p>';
                        } else { // --- all quests done
                            echo '<p class="gray">ALL Quests done!</p>';
                                    }
                        if ($row['quest44']=='0') { // ---- end state
                            if ($row['room']==$questRoom) {
                              echo '<h5 class="gslice green">'.$checkedBox.' Find Jungle Jim</h5>';
                                echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                            }
                            else {
                              echo '<h5 class="gslice">'.$checkBox.' Find the Friendly Pirate</h5>';
                            }
                        }
// ----------------------------------------- IN PROGRESS - QUEST 44
$questNumber = '44';
$questTag = 'Underwater item collect';
$questTitle = 'Third Times a Charm';
$questDesc = 'Find a 3rd flower in a secret compartment under the ocean. REMEMBER! collect the first 2 flowers before you attempt to collect the 3rd! or you will waste a trip underwater.';
if ($row['quest'.$questNumber.'']=='1') {
  $color='gold';
    if ($row['flower']>=3) {
        $color='green';
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';

    //if ($row['flower']>=1) {
    if ($row['flower']>=1) {
        echo '<h5 class="padd green">'.$checkedBox.' Flower 1 ( Grassy Field )</h5>';
    } else {
        echo '<h5 class="padd">'.$checkBox.' Flower 1 ( Grassy Field )</h5>';
    }
    if ($row['flower']>=2) {
        echo '<h5 class=" green">'.$checkedBox.' Flower 2 ( Red Town Gardens )</h5>';
    } else {
        echo '<h5 class="">'.$checkBox.' Flower 2 ( Red Town Gardens )</h5>';
    }
    if ($row['flower']>=3) {
        echo '<h5 class="padd green">'.$checkedBox.' Flower 3 ( Under the Ocean )</h5>';
    } else {
        echo '<h5 class="padd">'.$checkBox.' Flower 3 ( Under the Ocean )</h5>';
    }

    //}

    if ($row['flower']>=3) {
        echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have collected 3 flowers! Return to Jungle Jim for your reward.</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 45
$questNumber = '45';
$questTag = 'Lvl 9, 13, and 25 Rare Encounter';
$questTitle = 'Angry Birds';
$questDesc = 'These birds are so angry. Hunt down a Hawk, Albatross and Falcon.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold';
    $questflag='0';
    if ($row['KLhawk'] >= 1 &&
        $row['KLalbatross'] >= 1 &&
        $row['KLfalcon'] >= 1) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    //  if ($questflag=='0') {
    echo '<div class="">';

    if ($row['KLhawk']>=1) {
        echo '<h5 class="padd green">'. $checkedBox.' Hawk (Forest)</h5>';
    } else {
        echo '<h5 class="padd">'. $checkBox.' Hawk (Forest)</h5>';
    }
    if ($row['KLalbatross']>=1) {
        echo '<h5 class=" green">'. $checkedBox.' Albatross ( Ocean )</h5>';
    } else {
        echo '<h5 class="">'. $checkBox.' Albatross ( Ocean )</h5>';
    }
    if ($row['KLfalcon']>=1) {
        echo '<h5 class="padd green">'. $checkedBox.' Falcon ( Dark Forest )</h5>';
    } else {
        echo '<h5 class="padd">'. $checkBox.' Falcon ( Dark Forest )</h5>';
    }
    echo '</div>';
    //  }

    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have hunted down the angry birds! Return to Jungle Jim for your reward.</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 46
$questNumber = '46';
$questTag = 'Armor set collect';
$questTitle = 'Iron Warrior';
$questDesc = 'Impress Jungle Jim by equipping a full set of Iron Armor.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold';
    $questflag='0';
    if   (
          ((($row['equipR'] == 'iron chakram' || $row['equipR'] == 'iron boomerang' || $row['equipR'] == 'iron dagger' || $row['equipR'] == 'iron sword' || $row['equipR'] == 'iron staff')
          && ($row['equipL'] == 'iron shield' || $row['equipL'] == 'iron kite shield'))
          ||
          ($row['equipR'] == 'iron maul' || $row['equipR'] == 'iron 2h sword' || $row['equipR'] == 'iron battlestaff' || $row['equipR'] == 'iron nunchaku' || $row['equipR'] == 'iron bow' || $row['equipR'] == 'iron crossbow'))
          && ($row['equipHead'] == 'iron helmet' || $row['equipHead'] == 'iron hood')
          && ($row['equipBody'] == 'iron armor' || $row['equipBody'] == 'iron cape')
          && ($row['equipHands'] == 'iron gloves' || $row['equipHands'] == 'iron gauntlets')
          && ($row['equipFeet'] == 'iron boots')
        ) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    //  if ($questflag=='0') {
    echo '<div class="grid2">';

    if ($row['equipR']=='iron dagger' || $row['equipR'] == 'iron sword' || $row['equipR'] == 'iron staff' || $row['equipR'] == 'iron maul' || $row['equipR'] == 'iron 2h sword' || $row['equipR'] == 'iron battlestaff' || $row['equipR'] == 'iron nunchaku' || $row['equipR'] == 'iron boomerang' || $row['equipR'] == 'iron chakram' || $row['equipR'] == 'iron bow' || $row['equipR'] == 'iron crossbow') {
        echo '<h5 class="padd green">'. $checkedBox.' Right Hand</h5>';
    } else {
        echo '<h5 class="padd">'. $checkBox.' Right Hand</h5>';
    }
    if ($row['equipR']   == 'iron maul' || $row['equipR']   == 'iron 2h sword' || $row['equipR']   == 'iron battlestaff' || $row['equipR']   == 'iron nunchaku' || $row['equipR']   == 'iron bow' || $row['equipR']   == 'iron crossbow' || $row['equipL']   == 'iron shield' || $row['equipL']   == 'iron kite shield') {
      echo '<h5 class="padd green">'. $checkedBox.' Left Hand</h5>';
  } else {
      echo '<h5 class="padd">'. $checkBox.' Left Hand</h5>';
  }

    if ($row['equipHead']== 'iron helmet' || $row['equipHead'] == 'iron hood') {
        echo '<h5 class=" green">'. $checkedBox.' Iron Helmet</h5>';
    } else {
        echo '<h5 class="">'. $checkBox.' Iron Helmet</h5>';
    }

    if ($row['equipBody'] == 'iron armor' || $row['equipBody'] == 'iron cape') {
        echo '<h5 class=" green">'. $checkedBox.' Iron Armor</h5>';
    } else {
        echo '<h5 class="">'. $checkBox.' Iron Armor</h5>';
    }

    if ($row['equipHands'] == 'iron gloves' || $row['equipHands'] == 'iron gauntlets') {
        echo '<h5 class="padd green">'. $checkedBox.' Iron Gloves</h5>';
    } else {
        echo '<h5 class="padd">'. $checkBox.' Iron Gloves</h5>';
    }

    if ($row['equipFeet'] == 'iron boots') {
        echo '<h5 class="padd green">'. $checkedBox.' Iron Boots</h5>';
    } else {
        echo '<h5 class="padd">'. $checkBox.' Iron Boots</h5>';
    }
    echo '</div>';
    //  }

    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You are a true Iron Warrior! Boss. Return to Jungle Jim for your reward.</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
  echo '</div>'; //-end gbox
}




                      // --------------------------------------- Water Temple quests after joining the warrior's guild
                      if ($row['quest19']>=2) {
                          // --------------------------------------- Water Temple Guardian QUEST CHAIN
                          // --------------------------------------- Water Temple Guardian QUEST CHAIN
                          // --------------------------------------- Water Temple Guardian QUEST CHAIN
                          $questRoom = '425';
                          echo '<div class="gbox';
                          if ($row['room']==$questRoom) {
                              echo ' tops';
                          } elseif ($row['quest47']==2 && $row['quest48']==2 && $row['quest49']==2 && $row['quest50']==2) {
                              echo ' end';
                          } elseif ($row['quest35']==0) {
                          echo ' notstarted';
                          }
                          echo '" >';
                          echo '<span class="icon npc ocean">'.file_get_contents("img/svg/npc-guardian.svg").'</span>';
                          echo '<h4 class="ocean">Master Temple</h4>';
                          echo '<h2>Water Temple Guardian</h2>';
                          if ($row['quest47']<2 || $row['quest48']<2 || $row['quest49']<2 || $row['quest50']<2) { // -- default description
                              echo '<p class="gray">The Master Temple shimmers with light. The pillars appear like ice but are warm to the touch. Waterfalls flow down the temple sides and green vines twist their way up.</p>';
                          } else { // --- all quests done
                              echo '<p class="gray">ALL Quests done!</p>';
                                      }
                          if ($row['quest47']=='0') { // ---- end state
                              if ($row['room']==$questRoom) {
                                echo '<h5 class="gslice green">'.$checkedBox.' Find the Water Temple Guardian</h5>';
                                  echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                              }
                              else {
                                echo '<h5 class="gslice">'.$checkBox.' Find the Water Temple Guardian</h5>';
                              }
                          }
  // ----------------------------------------- IN PROGRESS - QUEST 47
  $questNumber = '47';
  $questTag = 'lvl 35 Battle';
  $questTitle = 'Test of Strength';
  $questDesc = 'Defeat the Thunder Barbarian at the Red Water Temple. Be careful though, the Barbarian hits hard with Power and Critical strikes.';
  if ($row['quest'.$questNumber.'']=='1') {
      $color='gold'; $questflag='0';
      if ($row['KLthunderbarbarian'] >= 1) {
          $color='green';$questflag = "1";
      }
      echo '<div class="gslice">';
      echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
      echo '<h3>'.$questTitle.'</h3>';
      echo '<p class="gray">'.$questDesc.'</p>';
      if ($questflag=='0') {
          echo '<h5 class="padd">'. $checkBox.' Thunder Barbarian</h5>';
      }
      if ($questflag=='1') {
          echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Thunder Barbarian. Return to the Master Temple for your reward!</h5>';
          if ($row['room']==$questRoom) {
              echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
          }
      }
      echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
    echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }
  // ----------------------------------------- IN PROGRESS - QUEST 48
  $questNumber = '48';
  $questTag = 'lvl 35 Battle';
  $questTitle = 'Test of Dexterity';
  $questDesc = 'Defeat the Smooth Ranger at the Green Water Temple. Be prepared for a long fight as the Ranger can heal itself.';
  if ($row['quest'.$questNumber.'']=='1') {
      $color='gold'; $questflag='0';
      if ($row['KLsmoothranger'] >= 1) {
          $color='green';$questflag = "1";
      }
      echo '<div class="gslice">';
      echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
      echo '<h3>'.$questTitle.'</h3>';
      echo '<p class="gray">'.$questDesc.'</p>';
      if ($questflag=='0') {
          echo '<h5 class="padd">'. $checkBox.' Smooth Ranger</h5>';
      }
      if ($questflag=='1') {
          echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Smooth Ranger. Return to the Master Temple for your reward!</h5>';
          if ($row['room']==$questRoom) {
              echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
          }
      }
      echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
    echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }
  // ----------------------------------------- IN PROGRESS - QUEST 49
  $questNumber = '49';
  $questTag = 'lvl 35 Battle';
  $questTitle = 'Test of Magic';
  $questDesc = 'Defeat the Coral Wizard at the Blue Water Temple. Don\'t expect to use magic to defeat him though, the Wizard is immune.';
  if ($row['quest'.$questNumber.'']=='1') {
      $color='gold'; $questflag='0';
      if ($row['KLcoralwizard'] >= 1) {
          $color='green';$questflag = "1";
      }
      echo '<div class="gslice">';
      echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
      echo '<h3>'.$questTitle.'</h3>';
      echo '<p class="gray">'.$questDesc.'</p>';
      if ($questflag=='0') {
          echo '<h5 class="padd">'. $checkBox.' Coral Wizard</h5>';
      }
      if ($questflag=='1') {
          echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Coral Wizard. Return to the Master Temple for your reward!</h5>';
          if ($row['room']==$questRoom) {
              echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
          }
      }
      echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
    echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }
  // ----------------------------------------- IN PROGRESS - QUEST 50
  $questNumber = '50';
  $questTag = 'lvl 35 Battle';
  $questTitle = 'Test of Defense';
  $questDesc = 'Defeat the Heavy Walrus at the Yellow Water Temple. You have to hit him hard though, he has very high pure defense.';
  if ($row['quest'.$questNumber.'']=='1') {
      $color='gold'; $questflag='0';
      if ($row['KLheavywalrus'] >= 1) {
          $color='green';$questflag = "1";
      }
      echo '<div class="gslice">';
      echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
      echo '<h3>'.$questTitle.'</h3>';
      echo '<p class="gray">'.$questDesc.'</p>';
      if ($questflag=='0') {
          echo '<h5 class="padd">'. $checkBox.' Heavy Walrus</h5>';
      }
      if ($questflag=='1') {
          echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Heavy Walrus. Return to the Master Temple for your reward!</h5>';
          if ($row['room']==$questRoom) {
              echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
          }
      }
      echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
    echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }
    echo '</div>'; //-end gbox
  }





                // --------------------------------------- Dark Forest Outpost Ranger Guard appear after joining wizards guild
                if ($row['quest20']>=2) {
                    // --------------------------------------- Dark Forest Outpost Ranger Guard QUEST CHAIN
                    // --------------------------------------- Dark Forest Outpost Ranger Guard QUEST CHAIN
                    // --------------------------------------- Dark Forest Outpost Ranger Guard QUEST CHAIN
                    $questRoom = '502';
                    echo '<div class="gbox';
                    if ($row['room']==$questRoom) {
                        echo ' tops';
                    } elseif ($row['quest51']==2 && $row['quest52']==2 && $row['quest53']==2) {
                        echo ' end';
              } elseif ($row['quest51']==0) {
              echo ' notstarted';
                    }
                    echo '" >';
                    echo '<span class="icon npc forest">'.file_get_contents("img/svg/npc-ranger.svg").'</span>';
                    echo '<h4 class="forest">Dark Forest Outpost</h4>';
                    echo '<h2>Ranger Guard</h2>';
                    if ($row['quest51']<'2' || $row['quest52']<'2' || $row['quest53']<'2') { // -- default description
                        echo '<p class="gray">A sturdy guard outpost is manned by members of the Ranger\'s Guild, protecting everyone in town from all the danger in the mountains.</p>';
                    } else { // --- all quests done
                        echo '<p class="gray">ALL Quests done!</p>';
                                }
                      if ($row['quest51']=='0') { // ---- end state
                          if ($row['room']==$questRoom) {
                            echo '<h5 class="gslice green">'.$checkedBox.' You found the Dark Forest Outpost</h5>';
                              echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                          }
                          else {
                            echo '<h5 class="gslice">'.$checkBox.' Find the Dark Forest Outpost</h5>';
                          }
                      }
// ----------------------------------------- IN PROGRESS - QUEST 51
$questNumber = '51';
$questTag = 'Lvl 25 Battle';
$questTitle = 'Protect the Mountain Path';
$questDesc = 'The Bowmen and Highwaymen are thieves who prey on those who travel the Mountain Path! Protect the path by removing these outlaws.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold';
    $questflag='0';
    if ($row['KLbowman'] >= 5 &&
        $row['KLhighwayman'] >= 5) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($questflag=='0') {
  //  echo '<div class="">';

  //  if ($row['KLbowman']<=5) {
        echo '<h5 class="padd">';
        if ($row['KLbowman']>=1) {echo $checkedBox.' ';
        } else {echo $checkBox.' ';}
        if ($row['KLbowman']>=2) {echo $checkedBox.' ';
        } else {echo $checkBox.' ';}
        if ($row['KLbowman']>=3) {echo $checkedBox.' ';
        } else {echo $checkBox.' ';}
        if ($row['KLbowman']>=4) {echo $checkedBox.' ';
        } else {echo $checkBox.' ';}
        if ($row['KLbowman']>=5) {echo $checkedBox.' <span class="green">Bowman</span></h5>';
        } else {echo $checkBox.' Bowman</h5>';}
  //  }
  //  if ($row['KLhighwayman']<=5) {
        echo '<h5 class="padd">';
        if ($row['KLhighwayman']>=1) {echo $checkedBox.' ';
        } else {echo $checkBox.' ';}
        if ($row['KLhighwayman']>=2) {echo $checkedBox.' ';
        } else {echo $checkBox.' ';}
        if ($row['KLhighwayman']>=3) {echo $checkedBox.' ';
        } else {echo $checkBox.' ';}
        if ($row['KLhighwayman']>=4) {echo $checkedBox.' ';
        } else {echo $checkBox.' ';}
        if ($row['KLhighwayman']>=5) {echo $checkedBox.' <span class="green">Highwayman</span></h5> ';
        } else {echo $checkBox.' Highwayman</h5>';}
    }

    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have defeated 5 Highwaymen and 5 Bowmen! Return to the Dark Forest Outpost for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 52
$questNumber = '52';
$questTag = 'Lvl 30 Battle';
$questTitle = 'Elder Slayer';
$questDesc = 'Make the Dark Forest a safer place by defeating vicious Troll Elders.';
if ($row['quest'.$questNumber.'']=='1') {
  $color='gold';
  $questflag = "0";
    if ($row['KLtrollelder']>=3) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';

    if ($questflag == 0) {
        echo '<h5 class="padd">';
        if ($row['KLtrollelder']>=1) {
            echo $checkedBox.' ';
        } else {
            echo $checkBox.' ';
        }
        if ($row['KLtrollelder']>=2) {
            echo $checkedBox.' ';
        } else {
            echo $checkBox.' ';
        }
        echo $checkBox;
        echo ' Troll Elder</h5>';
    }

    if ($questflag == 1) {
        echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have slain 3 Troll Elders! Return to the Dark Forest Outpost for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 53
$questNumber = '53';
$questTag = 'Lvl 30,35,45 Battle';
$questTitle = 'Dark Keep First Floor ';
$questDesc = 'Clear out the First Floor of the Dark Keep. The evil creatures in the Keep are a serious threat that should be taken care of.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold';
    $questflag='0';
    if ($row['KLlurker']>=1 && $row['KLwingeddemon']>=1 && $row['KLundeadorc']>=1) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($row['quest'.$questNumber.'']=='1' && $questflag=='0') {
        if ($row['KLlurker']>=1) {
            echo '<h5 class="padd green">'. $checkedBox.' Lurker</h5>';
        } else {
            echo '<h5 class="padd">'. $checkBox.' Lurker</h5>';
        }
        if ($row['KLwingeddemon']>=1) {
            echo '<h5 class="green">'. $checkedBox.' Winged Demon</h5>';
        } else {
            echo '<h5 class="">'. $checkBox.' Winged Demon</h5>';
        }
        if ($row['KLundeadorc']>=1) {
            echo '<h5 class="padd green">'. $checkedBox.' Undead Orc</h5>';
        } else {
            echo '<h5 class="padd">'. $checkBox.' Undead Orc</h5>';
        }
    }
    if ($row['quest'.$questNumber.'']=='1' && $questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have cleared out the first floor of the Dark Keep! Return to the Dark Forest Outpost for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
    echo '</div>'; //-end gbox
}



                  // --------------------------------------- Dark Elf Tree Hut appear after joining wizards guild
                  if ($row['quest20']>=2) {
                      // --------------------------------------- Dark Elf Tree Hut QUEST CHAIN
                      // --------------------------------------- Dark Elf Tree Hut QUEST CHAIN
                      // --------------------------------------- Dark Elf Tree Hut QUEST CHAIN
                      $questRoom = '506';
                      echo '<div class="gbox';
                      if ($row['room']==$questRoom) {
                          echo ' tops';
                      } elseif ($row['quest54']==2 && $row['quest55']==2 && $row['quest56']==2) {
                          echo ' end';
                  } elseif ($row['quest55']==0) {
                  echo ' notstarted';
                      }
                      echo '" >';
                      echo '<span class="icon npc forest">'.file_get_contents("img/svg/npc-darkelf.svg").'</span>';
                      echo '<h4 class="forest">Tree Hut</h4>';
                      echo '<h2>Dark Elf</h2>';
                      if ($row['quest54']<'2' || $row['quest55']<'2' || $row['quest56']<'2') { // -- default description
                          echo '<p class="gray">Come relax and have some special tea with the Dark Elf in his cozy tree hut.</p>';
                      } else { // --- all quests done
                          echo '<p class="gray">ALL Quests done!</p>';
                                  }
                        if ($row['quest54']=='0') { // ---- end state
                            if ($row['room']==$questRoom) {
                              echo '<h5 class="gslice green">'.$checkedBox.' You found the Dark Elf\'s Tree Hut</h5>';
                                echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                            }
                            else {
                              echo '<h5 class="gslice">'.$checkBox.' Find the Dark Elf\'s Tree Hut</h5>';
                            }
                        }
// ----------------------------------------- IN PROGRESS - QUEST 54
$questNumber = '54';
$questTag = 'Collect Wood';
$questTitle = 'Dark Forest Lumberjack';
$questDesc = 'The Dark Elf could always use more wood for his toasty fire. Collect and bring him 50 wood.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold';
    $questflag='0';
  if ($row['wood'] >= 50) {
    $color='green';
    $questflag = "1";
  }
  echo '<div class="gslice">';
  echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
  echo '<h3>'.$questTitle.'</h3>';
  echo '<p class="gray">'.$questDesc.'</p>';
  if ($questflag=='0') {
  if ($row['wood']>=50) {
    echo '<h5 class="padd green">'.$checkedBox.' '.$row['wood'].'/50 Wood</h5>';
    }
    else
    {echo '<h5 class="padd">'.$checkBox.' '.$row['wood'].'/50 Wood</h5>';}
  }
  if ($questflag=='1') {
    echo '<h5 class="padd green">'.$checkedBox.' You have gathered 50 wood! Return to the Dark Elf at his Tree Hut for your reward!</h5>';
    if ($row['room']==$questRoom) {
    echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
    }
  }
  echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }
// ----------------------------------------- IN PROGRESS - QUEST 55
$questNumber = '55';
$questTag = 'Lvl 20, 25 Battle - Gold Key Quest';
$questTitle = 'Shaman & Sorcerer Slayer';
$questDesc = 'Defeat a Troll Shaman and a Troll Sorcerer in the Dark Forest before they corrupt it even more with their dark magic.';
if ($row['quest'.$questNumber.'']=='1') {
  $color='gold';
  $questflag = "0";
  if ($row['KLtrollshaman']>=1 && $row['KLtrollsorcerer']>=1) {
    $color='green';
    $questflag = "1";
  }
  echo '<div class="gslice">';
  echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
  echo '<h3>'.$questTitle.'</h3>';
  echo '<p class="gray">'.$questDesc.'</p>';

if ($questflag == 0) {
  if ($row['KLtrollshaman']>=1) {
      echo '<h5 class="padd green">'.$checkedBox.' Troll Shaman </h5> ';
  } else {
      echo '<h5 class="padd">'.$checkBox.' Troll Shaman</h5>';
  }
  if ($row['KLtrollsorcerer']>=1) {
      echo '<h5 class="green">'.$checkedBox.' Troll Sorcerer </h5> ';
  } else {
      echo '<h5 class="">'.$checkBox.' Troll Sorcerer</h5>';
  }
}

if ($questflag == 1) {
echo '<h5 class="padd green">'.$checkedBox.' You have slain a Troll Shaman & Troll Sorcerer! Return to the Dark Elf at his Tree Hut for your reward!</h5>';
if ($row['room']==$questRoom) {
echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
}
}
echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 56
$questNumber = '56';
$questTag = 'Lvl 30 Rare Battle';
$questTitle = 'Ent Hunter ';
$questDesc = 'Find and Slay a Magical Ent in the Dark Forest. Be prepared, for they are both strong and immune to all form of magical attacks.';
if ($row['quest'.$questNumber.'']=='1') {
  $color='gold';
  $questflag='0';
  if ($row['KLent']>=1) {
    $color='green';
    $questflag = "1";
  }
  echo '<div class="gslice">';
  echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
  echo '<h3>'.$questTitle.'</h3>';
  echo '<p class="gray">'.$questDesc.'</p>';
  if ($row['quest'.$questNumber.'']=='1' && $questflag=='0') {
      if ($row['KLent']>=1) {
      echo '<h5 class="padd green">'. $checkedBox.' Ent</h5>';
      } else {
      echo '<h5 class="padd">'. $checkBox.' Ent</h5>';
      }
    }
  if ($row['quest'.$questNumber.'']=='1' && $questflag=='1') {
    echo '<h5 class="padd green">'.$checkedBox.' You have defeated the elusive Ent! Return to the Dark Elf at his Tree Hut for your reward!</h5>';
    if ($row['room']==$questRoom) {
      echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
    }
  }
echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
echo '</div>'; //-end gbox
}




// --------------------------------------- Rangers Guild Initiation Quests appear after wizards guild member
if ($row['quest20']>=2) {
    // --------------------------------------- Rangers Guild Initiation QUEST CHAIN
    // --------------------------------------- Rangers Guild Initiation QUEST CHAIN
    // --------------------------------------- Rangers Guild Initiation QUEST CHAIN

    $questRoom = '515';
    echo '<div class="gbox';
    if ($row['room']==$questRoom) {
        echo ' tops';
    } elseif ($row['quest57']==2) {
        echo ' end';
    } elseif ($row['quest57']==0) {
    echo ' notstarted';
    }
    echo '" >';
    echo '<span class="icon npc forest">'.file_get_contents("img/svg/npc-ranger.svg").'</span>';
    echo '<h4 class="forest">Ranger\'s Guild</h4>';
    echo '<h2>Ranger\'s Guild Initiation</h2>';
    if ($row['quest57']<2) { // -- default description
        echo '<p class="gray">The Ranger\'s Guild is hidden somewhere in the Dark Forest. You must search and be clever to find your way.</p>';
    } else { // --- all quests done
        echo '<p class="gray">ALL Quests done!</p>';
                    }
    if ($row['quest57']=='0') { // ---- end state
      if ($row['quest57']=='0' && $row['room']==$questRoom) {
          echo '<h5 class="gslice green">'.$checkedBox.' Find the Ranger\'s Guild Entrance</h5>';
          echo '<button class="greenBG focus" type="submit" name="input1" value="start quest"><h4>Start Quest</h4></button>';
      } else if ($row['quest57']=='0') {
          echo '<h5 class="gslice">'.$checkBox.' Find the Ranger\'s Guild Entrance</h5>';
      }
    }
    // ----------------------------------------- IN PROGRESS - QUEST 57
    $questNumber = '57';
    $questTag = 'Lvl 30 Rare Battle';
    $questTitle = 'Ranger\'s Initiation';
    $questDesc = 'Dark Ranger\'s are increasingly becoming a nuisance in the Dark Forest.  To join the Ranger\'s Guild you must locate and defeat one of these Dark Rangers.';
    if ($row['quest'.$questNumber.'']=='1') {
        $color='gold';
        $questflag='0';
        if ($row['KLdarkranger']>=1) {
            $color='green';
            $questflag = "1";
        }
        echo '<div class="gslice">';
        echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
        echo '<h3>'.$questTitle.'</h3>';
        echo '<p class="gray">'.$questDesc.'</p>';

        if ($row['KLdarkranger']<=0) {
            echo '<h5 class="padd">'.$checkBox.' Defeat a Dark Ranger</h5>';
        }

        if ($questflag=='1') {
            echo '<h5 class="padd green">'.$checkedBox.' You have defeated a Dark Ranger. Return to the Ranger\'s Guild to Join!</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    } else if ($row['quest'.$questNumber.'']=='2') {
      echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
    }
    echo '</div>'; //-end gbox
}








                  // --------------------------------------- Rangers Guild Quests open after joining Rangers Guild
                  if ($row['quest57']>=2) {
                      // --------------------------------------- Ranger Lego's QUEST CHAIN
                      // --------------------------------------- Ranger Lego's QUEST CHAIN
                      // --------------------------------------- Ranger Lego's QUEST CHAIN
                      $questRoom = '515b';
                      echo '<div class="gbox';
                      if ($row['room']==$questRoom) {
                          echo ' tops';
                      } elseif ($row['quest58']==2 && $row['quest59']==2 && $row['quest60']==2) {
                          echo ' end';
                      } elseif ($row['quest58']==0) {
                      echo ' notstarted';
                      }
                      echo '" >';
                      echo '<span class="icon npc forest">'.file_get_contents("img/svg/npc-ranger2.svg").'</span>';
                      echo '<h4 class="forest">Ranger\'s Guild</h4>';
                      echo '<h2>Ranger Lego</h2>';
                      if ($row['quest58']<'2' || $row['quest59']<'2' || $row['quest60']<'2') { // -- default description
                          echo '<p class="gray">Ranger Lego is a pro archer. You can learn a lot from him.</p>';
                      } else { // --- all quests done
                          echo '<p class="gray">ALL Quests done!</p>';
                                  }
                        if ($row['quest58']=='0') { // ---- end state
                            if ($row['room']==$questRoom) {
                              echo '<h5 class="gslice green">'.$checkedBox.' You found Ranger Lego</h5>';
                                echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                            }
                            else {
                              echo '<h5 class="gslice">'.$checkBox.' Find Ranger Lego in the Ranger\'s Guild</h5>';
                            }
                        }
// ----------------------------------------- IN PROGRESS - QUEST 58
$questNumber = '58';
$questTag = 'Lvl 25 Battle';
$questTitle = 'Stubborn War Turtle';
$questDesc = 'Defeat the stubborn War Turtle in the Neverending Mine. You\'re going to have to get crafty though, the War Turtle\'s shell blocks ranged attacks.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold'; $questflag='0';
    if ($row['KLwarturtle'] >= 1) {
        $color='green';$questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($questflag=='0') {
        echo '<h5 class="padd">'. $checkBox.' War Turtle</h5>';
    }
    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have defeated the War Turtle! Return to Ranger Lego at the Ranger\'s Guild for your reward.</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 59
$questNumber = '59';
$questTag = 'Lvl 35, 40 Battle';
$questTitle = 'Gargoyle Hunter';
$questDesc = 'Gargoyle’s are so cool, and evil! Hunt down a White one and a Grey one in the Dark Cathedral.';
if ($row['quest'.$questNumber.'']=='1') {
  $color='gold';
  $questflag = "0";
  if ($row['KLwhitegargoyle']>=1 && $row['KLgreygargoyle']>=1) {
    $color='green';
    $questflag = "1";
  }
  echo '<div class="gslice">';
  echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
  echo '<h3>'.$questTitle.'</h3>';
  echo '<p class="gray">'.$questDesc.'</p>';

if ($questflag == 0) {
  if ($row['KLwhitegargoyle']>=1) {
      echo '<h5 class="padd green">'.$checkedBox.' White Gargoyle </h5> ';
  } else {
      echo '<h5 class="padd">'.$checkBox.' White Gargoyle</h5>';
  }
  if ($row['KLgreygargoyle']>=1) {
      echo '<h5 class="green">'.$checkedBox.' Grey Gargoyle </h5> ';
  } else {
      echo '<h5 class="">'.$checkBox.' Grey Gargoyle</h5>';
  }
}

if ($questflag == 1) {
echo '<h5 class="padd green">'.$checkedBox.' You have slain a White Gargoyle and a Grey Gargoyle! Return to Ranger Lego at the Ranger\'s Guild for your reward.</h5>';
if ($row['room']==$questRoom) {
echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
}
}
echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 60
$questNumber = '60';
$questTag = 'Lvl 50 Battle';
$questTitle = 'The Griffin';
$questDesc = 'Slay the magical flying Griffin in the Neverending Mine.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold'; $questflag='0';
    if ($row['KLgriffin'] >= 1) {
        $color='green';$questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($questflag=='0') {
        echo '<h5 class="padd">'. $checkBox.' Griffin</h5>';
    }
    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have defeated the Griffin! Return to Ranger Lego at the Ranger\'s Guild for your reward.</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
echo '</div>'; //-end gbox
}









                  // --------------------------------------- Stone Mountain Base Camp Quests open after joining wizards Guild
                  if ($row['quest20']>=2) {
                      // --------------------------------------- Stone Mountain Base Camp QUEST CHAIN
                      // --------------------------------------- Stone Mountain Base Camp QUEST CHAIN
                      // --------------------------------------- Stone Mountain Base Camp QUEST CHAIN
                      $questRoom = '607';
                      echo '<div class="gbox';
                      if ($row['room']==$questRoom) {
                          echo ' tops';
                      } elseif ($row['quest61']==2 && $row['quest62']==2 && $row['quest63']==2) {
                          echo ' end';
                      } elseif ($row['quest61']==0) {
                      echo ' notstarted';
                      }
                      echo '" >';
                      echo '<span class="icon npc gray">'.file_get_contents("img/svg/npc-basecamp.svg").'</span>';
                      echo '<h4 class="gray">Stone Mountain</h4>';
                      echo '<h2>Base Camp</h2>';
                      if ($row['quest61']<'2' || $row['quest62']<'2' || $row['quest63']<'2') { // -- default description
                          echo '<p class="gray">The base camp has all sorts of adventurers resting, eating and staying warm by the fire. They are quite the chatty bunch.</p>';
                      } else { // --- all quests done
                          echo '<p class="gray">ALL Quests done!</p>';
                                  }
                        if ($row['quest61']=='0') { // ---- end state
                            if ($row['room']==$questRoom) {
                              echo '<h5 class="gslice green">'.$checkedBox.' You have found the Base Camp</h5>';
                                echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                            }
                            else {
                              echo '<h5 class="gslice">'.$checkBox.' Find the Stone Mountain Base Camp</h5>';
                            }
                        }
// ----------------------------------------- IN PROGRESS - QUEST 61
$questNumber = '61';
$questTag = 'Item Collect';
$questTitle = 'Frozen Fourth Flower';
$questDesc = 'An elderly woman at the camp is looking for flowers. One for each of her children she lost. You can find a fourth flower on dragon\'s ledge across the mountain bridge.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold'; $questflag='0';
    if ($row['flower'] >= 4) {
        $color='green';$questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($row['flower']>=1) {
        echo '<h5 class="padd green">'.$checkedBox.' Flower 1 ( Grassy Field )</h5>';
    } else {
        echo '<h5 class="padd">'.$checkBox.' Flower 1 ( Grassy Field )</h5>';
    }
    if ($row['flower']>=2) {
        echo '<h5 class=" green">'.$checkedBox.' Flower 2 ( Red Town Gardens )</h5>';
    } else {
        echo '<h5 class="">'.$checkBox.' Flower 2 ( Red Town Gardens )</h5>';
    }
    if ($row['flower']>=3) {
        echo '<h5 class="padd green">'.$checkedBox.' Flower 3 ( Under the Ocean )</h5>';
    } else {
        echo '<h5 class="padd">'.$checkBox.' Flower 3 ( Under the Ocean )</h5>';
    }
    if ($row['flower']>=4) {
        echo '<h5 class=" green">'.$checkedBox.' Flower 4 ( Dragon\'s Ledge )</h5>';
    } else {
        echo '<h5 class="">'.$checkBox.' Flower 4 ( Dragon\'s Ledge )</h5>';
    }


    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have 4 flowers! Return to the elderly woman at the base camp for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 62
$questNumber = '62';
$questTag = 'Item Collect';
$questTitle = 'Balm Mixer';
$questDesc = 'A snow covered shaman sits near the edge of camp mixing  potions with mud. He will teach you how make potent balms if you bring the correct ingredients. Bring the snowy shaman 5 red potions, 5 blue potions, and 10 mud.';
if ($row['quest'.$questNumber.'']=='1') {
  $color='gold';
  $questflag = "0";
  if ($row['redpotion']>=5 && $row['bluepotion']>=5 && $row['mud']>=10) {
    $color='green';
    $questflag = "1";
  }
  echo '<div class="gslice">';
  echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
  echo '<h3>'.$questTitle.'</h3>';
  echo '<p class="gray">'.$questDesc.'</p>';

if ($questflag == 0) {
  }
if ($row['redpotion']>=5) {
    echo '<h5 class="padd green">'.$checkedBox.' '.$row['redpotion'].'/5 Red Potions </h5> ';
} else {
    echo '<h5 class="padd">'.$checkBox.' '.$row['redpotion'].'/5 Red Potions </h5>';
}
if ($row['bluepotion']>=5) {
    echo '<h5 class=" green">'.$checkedBox.' '.$row['bluepotion'].'/5 Blue Potions </h5> ';
} else {
    echo '<h5 class="">'.$checkBox.' '.$row['bluepotion'].'/5 Blue Potions </h5>';
}
if ($row['mud']>=10) {
    echo '<h5 class="padd green">'.$checkedBox.' '.$row['mud'].'/10 Mud </h5> ';
} else {
    echo '<h5 class="padd">'.$checkBox.' '.$row['mud'].'/10 Mud </h5>';
}


if ($questflag == 1) {
echo '<h5 class="padd green">'.$checkedBox.' You have the ingredients needed to make Balms! Return to the snowy shaman at the base camp for your reward!</h5>';
if ($row['room']==$questRoom) {
echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
}
}
echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 63
$questNumber = '63';
$questTag = 'Lvl 35 Battle';
$questTitle = 'Ulfberht the Viking';
$questDesc = 'Ulfberht the undead viking warrior has been a menace for centuries. The Base Camp leader has a bounty out for his defeat. Find him in the Neverending mine, but be wary of his powerful ancient sword.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold'; $questflag='0';
    if ($row['KLulfberht'] >= 1) {
        $color='green';$questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($questflag=='0') {
        echo '<h5 class="padd">'. $checkBox.' Defeat Ulfberht</h5>';
    }
    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have defeated Ulfberht the Viking! Return to the base camp leader for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
echo '</div>'; //-end gbox
}







                  // --------------------------------------- Blue Guard Mountain Outpost Quests open after joining wizards Guild
                  if ($row['quest20']>=2) {
                      // --------------------------------------- Blue Guard Mountain Outpost QUEST CHAIN
                      // --------------------------------------- Blue Guard Mountain Outpost QUEST CHAIN
                      // --------------------------------------- Blue Guard Mountain Outpost QUEST CHAIN
                      $questRoom = '608';
                      echo '<div class="gbox';
                      if ($row['room']==$questRoom) {
                          echo ' tops';
                      } elseif ($row['quest64']==2 && $row['quest65']==2 && $row['quest66']==2) {
                          echo ' end';
                      } elseif ($row['quest64']==0) {
                      echo ' notstarted';
                      }
                      echo '" >';
                      echo '<span class="icon npc blue">'.file_get_contents("img/svg/npc-hector.svg").'</span>';
                      echo '<h4 class="blue">Blue Guard</h4>';
                      echo '<h2>Mountain Outpost</h2>';
                      if ($row['quest64']<'2' || $row['quest65']<'2' || $row['quest66']<'2') { // -- default description
                          echo '<p class="gray">Find Hector the Blue Guard Captain at the Mountain Outpost. </p>';
                      } else { // --- all quests done
                          echo '<p class="gray">ALL Quests done!</p>';
                                  }
                        if ($row['quest64']=='0') { // ---- end state
                            if ($row['room']==$questRoom) {
                              echo '<h5 class="gslice green">'.$checkedBox.' You have found the Mountain Outpost</h5>';
                                echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                            }
                            else {
                              echo '<h5 class="gslice">'.$checkBox.' Find the Mountain Outpost</h5>';
                            }
                        }
// ----------------------------------------- IN PROGRESS - QUEST 64
$questNumber = '64';
$questTag = 'Armor set collect';
$questTitle = 'Steel Warrior';
$questDesc = 'Impress Hector by donning a full set of Steel Armor. Collect, buy or craft the armor and return here with it equipped.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold';
    $questflag='0';
    if   (
          ((($row['equipR'] == 'steel chakram' || $row['equipR'] == 'steel boomerang' || $row['equipR'] == 'steel dagger' || $row['equipR'] == 'steel sword' || $row['equipR'] == 'steel staff')
          && ($row['equipL'] == 'steel shield' || $row['equipL'] == 'steel kite shield'))
          ||
          ($row['equipR'] == 'steel maul' || $row['equipR'] == 'steel 2h sword' || $row['equipR'] == 'steel battlestaff' || $row['equipR'] == 'steel nunchaku' || $row['equipR'] == 'steel bow' || $row['equipR'] == 'steel crossbow'))
          && ($row['equipHead'] == 'steel helmet' || $row['equipHead'] == 'steel hood')
          && ($row['equipBody'] == 'steel armor' || $row['equipBody'] == 'steel cape')
          && ($row['equipHands'] == 'steel gloves' || $row['equipHands'] == 'steel gauntlets')
          && ($row['equipFeet'] == 'steel boots')
        ) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    //  if ($questflag=='0') {
    echo '<div class="grid2">';

    if ($row['equipR']=='steel dagger' || $row['equipR'] == 'steel sword' || $row['equipR'] == 'steel staff' || $row['equipR'] == 'steel maul' || $row['equipR'] == 'steel 2h sword' || $row['equipR'] == 'steel battlestaff' || $row['equipR'] == 'steel nunchaku' || $row['equipR'] == 'steel boomerang' || $row['equipR'] == 'steel chakram' || $row['equipR'] == 'steel bow' || $row['equipR'] == 'steel crossbow') {
        echo '<h5 class="padd green">'. $checkedBox.' Right Hand</h5>';
    } else {
        echo '<h5 class="padd">'. $checkBox.' Right Hand</h5>';
    }
    if ($row['equipR']   == 'steel maul' || $row['equipR']   == 'steel 2h sword' || $row['equipR']   == 'steel battlestaff' || $row['equipR']   == 'steel nunchaku' || $row['equipR']   == 'steel bow' || $row['equipR']   == 'steel crossbow' || $row['equipL']   == 'steel shield' || $row['equipL']   == 'steel kite shield') {
      echo '<h5 class="padd green">'. $checkedBox.' Left Hand</h5>';
  } else {
      echo '<h5 class="padd">'. $checkBox.' Left Hand</h5>';
  }

    if ($row['equipHead']== 'steel helmet' || $row['equipHead'] == 'steel hood') {
        echo '<h5 class=" green">'. $checkedBox.' Steel Helmet</h5>';
    } else {
        echo '<h5 class="">'. $checkBox.' Steel Helmet</h5>';
    }

    if ($row['equipBody'] == 'steel armor' || $row['equipBody'] == 'steel cape') {
        echo '<h5 class=" green">'. $checkedBox.' Steel Armor</h5>';
    } else {
        echo '<h5 class="">'. $checkBox.' Steel Armor</h5>';
    }

    if ($row['equipHands'] == 'steel gloves' || $row['equipHands'] == 'steel gauntlets') {
        echo '<h5 class="padd green">'. $checkedBox.' Steel Gloves</h5>';
    } else {
        echo '<h5 class="padd">'. $checkBox.' Steel Gloves</h5>';
    }

    if ($row['equipFeet'] == 'steel boots') {
        echo '<h5 class="padd green">'. $checkedBox.' Steel Boots</h5>';
    } else {
        echo '<h5 class="padd">'. $checkBox.' Steel Boots</h5>';
    }
    echo '</div>';
    //  }

    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You are a true Steel Warrior! You Beast. Return to Hector the Blue Guard Captain for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 65
$questNumber = '65';
$questTag = 'Lvl 45 Rare Battle';
$questTitle = 'Yeti Hunter';
$questDesc = 'The illusive Yeti has been terrorizing the mountain side. Hector wants you to find and defeat this beast.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold'; $questflag='0';
    if ($row['KLyeti'] >= 1) {
        $color='green';$questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($questflag=='0') {
        echo '<h5 class="padd">'. $checkBox.' Find and slay a Yeti</h5>';
    }
    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have slain a Yeti! Return to Hector the Blue Guard Captain for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 66
$questNumber = '66';
$questTag = 'Lvl 60 Battle';
$questTitle = 'Dragon Slayer';
$questDesc = 'Ferocious dragons have been seen spotted soaring among the mountains. There is a big reward for taking one down. Find and slay a Dragon.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold'; $questflag='0';
    if ($row['KLdragon'] >= 1) {
        $color='green';$questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($questflag=='0') {
        echo '<h5 class="padd">'. $checkBox.' Slay a Dragon</h5>';
    }
    if ($questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You have slain a Dragon! Return to Hector the Blue Guard Captain for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
echo '</div>'; //-end gbox
}


                  // --------------------------------------- Chilly Pete Mountain Cabin Quests open after joining wizards Guild
                  if ($row['quest20']>=2) {
                      // --------------------------------------- Chilly Pete Mountain Cabin QUEST CHAIN
                      // --------------------------------------- Chilly Pete Mountain Cabin QUEST CHAIN
                      // --------------------------------------- Chilly Pete Mountain Cabin QUEST CHAIN
                      $questRoom = '609';
                      echo '<div class="gbox';
                      if ($row['room']==$questRoom) {
                          echo ' tops';
                      } elseif ($row['quest67']==2 && $row['quest68']==2 && $row['quest69']==2) {
                          echo ' end';
                      } elseif ($row['quest67']==0) {
                      echo ' notstarted';
                      }
                      echo '" >';
                      echo '<span class="icon npc purple">'.file_get_contents("img/svg/npc-chillypete.svg").'</span>';
                      echo '<h4 class="purple">Chilly Pete</h4>';
                      echo '<h2>Mountain Cabin</h2>';
                      if ($row['quest67']<'2' || $row['quest68']<'2' || $row['quest69']<'2') { // -- default description
                          echo '<p class="gray">Chilly Pete has the chillest cabin up in the mountains. Visit, relax by the fire, and grab some tea.</p>';
                      } else { // --- all quests done
                          echo '<p class="gray">ALL Quests done!</p>';
                                  }
                        if ($row['quest67']=='0') { // ---- end state
                            if ($row['room']==$questRoom) {
                              echo '<h5 class="gslice green">'.$checkedBox.' You have found Chilly Pete at his Mountain Cabin.</h5>';
                                echo '<button class="greenBG focus" type="submit" name="input1" value="start quests"><h4>Start Quests</h4></button>';
                            }
                            else {
                              echo '<h5 class="gslice">'.$checkBox.' Find Chilly Pete in his Mountain Cabin</h5>';
                            }
                        }
// ----------------------------------------- IN PROGRESS - QUEST 67
$questNumber = '67';
$questTag = 'Lvl 45 Battle';
$questTitle = 'Vampire Hunter';
$questDesc = 'Chilly Pete has a bloody good reward for anyone who can slay 3 Vampires. You can find vampires in the Mountain Cathedral.';
if ($row['quest'.$questNumber.'']=='1') {
  $color='gold';
  $questflag = "0";
    if ($row['KLvampire']>=3) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';

    if ($questflag == 0) {
        echo '<h5 class="padd">';
        if ($row['KLvampire']>=1) {
            echo $checkedBox.' ';
        } else {
            echo $checkBox.' ';
        }
        if ($row['KLvampire']>=2) {
            echo $checkedBox.' ';
        } else {
            echo $checkBox.' ';
        }
        echo $checkBox;
        echo ' Slay 3 Vampires</h5>';
    }

    if ($questflag == 1) {
        echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have slain 3 Vampires! Return to Chilly Pete for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 68
$questNumber = '68';
$questTag = 'Lvl 55 Battle';
$questTitle = 'Dark Paladin Cleanse';
$questDesc = 'Chilly Pete wants you to remove some evil from this world. Visit the Dark Keep and defeat 3 Dark Paladins.';
if ($row['quest'.$questNumber.'']=='1') {
  $color='gold';
  $questflag = "0";
    if ($row['KLdarkpaladin']>=3) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';

    if ($questflag == 0) {
        echo '<h5 class="padd">';
        if ($row['KLdarkpaladin']>=1) {
            echo $checkedBox.' ';
        } else {
            echo $checkBox.' ';
        }
        if ($row['KLdarkpaladin']>=2) {
            echo $checkedBox.' ';
        } else {
            echo $checkBox.' ';
        }
        echo $checkBox;
        echo ' Defeat 3 Dark Paladins</h5>';
    }

    if ($questflag == 1) {
        echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.' You have defeated 3 Dark Paladins. Return to Chilly Pete for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}
// ----------------------------------------- IN PROGRESS - QUEST 69
$questNumber = '69';
$questTag = 'Lvl 50 Rare Battle';
$questTitle = 'The Super Rare Snowy Trio';
$questDesc = 'Chilly Pete has a most difficult quest for you. You must find the super rare snowy trio in the mountains.';
if ($row['quest'.$questNumber.'']=='1') {
    $color='gold';
    $questflag='0';
    if ($row['KLsnowogre']>=1 && $row['KLsnowninja']>=1 && $row['KLsnowowl']>=1) {
        $color='green';
        $questflag = "1";
    }
    echo '<div class="gslice">';
    echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
    echo '<h3>'.$questTitle.'</h3>';
    echo '<p class="gray">'.$questDesc.'</p>';
    if ($row['quest'.$questNumber.'']=='1' && $questflag=='0') {
        if ($row['KLsnowogre']>=1) {
            echo '<h5 class="padd green">'. $checkedBox.' Snow Ogre</h5>';
        } else {
            echo '<h5 class="padd">'. $checkBox.' Snow Ogre</h5>';
        }
        if ($row['KLsnowninja']>=1) {
            echo '<h5 class="green">'. $checkedBox.' Snow Ninja</h5>';
        } else {
            echo '<h5 class="">'. $checkBox.' Snow Ninja</h5>';
        }
        if ($row['KLsnowowl']>=1) {
            echo '<h5 class="padd green">'. $checkedBox.' Snow Owl</h5>';
        } else {
            echo '<h5 class="padd">'. $checkBox.' Snow Owl</h5>';
        }
    }
    if ($row['quest'.$questNumber.'']=='1' && $questflag=='1') {
        echo '<h5 class="padd green">'.$checkedBox.' You defeated the super rare trio! Return to Chilly Pete for your reward!</h5>';
        if ($row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
        }
    }
    echo '</div>';
} else if ($row['quest'.$questNumber.'']=='2') {
  echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
}

echo '</div>'; //-end gbox
}


// --------------------------------------- Open the Gate appear after wizards guild member
if ($row['quest20']>=2) {
  // --------------------------------------- Open the Gate QUEST CHAIN
  // --------------------------------------- Open the Gate QUEST CHAIN
  // --------------------------------------- Open the Gate QUEST CHAIN
    $questRoom = '611';
    echo '<div class="gbox';
    if ($row['room']==$questRoom) {
        echo ' tops';
    } elseif ($row['quest70']==2) {
        echo ' end';
} elseif ($row['quest70']==0) {
echo ' notstarted';
    }
    echo '" >';
    echo '<span class="icon npc blue">'.file_get_contents("img/svg/npc-rigel.svg").'</span>';
    echo '<h4 class="blue">Blue Gate</h4>';
    echo '<h2>Rigel the Brave</h2>';
    if ($row['quest70']<2) { // -- default description
        echo '<p class="gray">Rigel stands tall in front of the exquisite Blue Gate.</p>';
    } else { // --- all quests done
        echo '<p class="gray">ALL Quests done!</p>';
                    }
    if ($row['quest70']=='0') { // ---- end state
      if ($row['quest70']=='0' && $row['room']==$questRoom) {
          echo '<h5 class="gslice green">'.$checkedBox.' Find Rigel at the Blue Gate</h5>';
          echo '<button class="greenBG focus" type="submit" name="input1" value="start quest"><h4>Start Quest</h4></button>';
      } else if ($row['quest70']=='0') {
          echo '<h5 class="gslice">'.$checkBox.' Find Rigel at the Blue Gate</h5>';
      }
  }
  // ----------------------------------------- IN PROGRESS - QUEST 70
  $questNumber = '70';
  $questTag = 'Lvl 23, 40, 50';
  $questTitle = 'Open the Gate';
  $questDesc = 'To complete this quest and open the city gates you must collect the 3 required keys. Read the sign at the gate for clues where to look.';
  if ($row['quest'.$questNumber.'']=='1') {
      $color='gold';
      $questflag='0';
      if ($row['KLbutcher']>=1 && $row['KLkingsquid']>=1 && $row['KLgiantmountaingiant']>=1) {
          $color='green';
          $questflag = "1";
      }
      echo '<div class="gslice">';
      echo '<p class="questLvlBox"><span class="'.$color.'">Quest '.$questNumber.' </span> '.$questTag.'</p>';
      echo '<h3>'.$questTitle.'</h3>';
      echo '<p class="gray">'.$questDesc.'</p>';
      if ($row['quest'.$questNumber.'']=='1' && $questflag=='0') {
          if ($row['KLbutcher']>=1) {
              echo '<h5 class="padd green">'. $checkedBox.' Key of Wrath</h5>';
          } else {
              echo '<h5 class="padd">'. $checkBox.' Key of Wrath</h5>';
          }
          if ($row['KLkingsquid']>=1) {
              echo '<h5 class="green">'. $checkedBox.' Key of Greed</h5>';
          } else {
              echo '<h5 class="">'. $checkBox.' Key of Greed</h5>';
          }
          if ($row['KLgiantmountaingiant']>=1) {
              echo '<h5 class="padd green">'. $checkedBox.' Key of Pride</h5>';
          } else {
              echo '<h5 class="padd">'. $checkBox.' Key of Pride</h5>';
          }
      }
      if ($row['quest'.$questNumber.'']=='1' && $questflag=='1') {
          echo '<h5 class="padd green">'.$checkedBox.' You have collected the 3 keys! Return to Rigel for your reward!</h5>';
          if ($row['room']==$questRoom) {
              echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
          }
      }
      echo '</div>';
  } else if ($row['quest'.$questNumber.'']=='2') {
    echo '<div class="padd"><p class="green">Quest '.$questNumber.' Completed</p><p> '.$questTitle.'</p></div>';
  }

  echo '</div>'; //-end gbox
}
//You hand Rigel the Key of Wrath, Greed, and Pride. He lifts them up and the gate pulls them right from his hand. The 3 keys all click in unison and the gate opens for you. Welcome to Star City!

//$query = $link->query("UPDATE $user SET quest70 = 0 "); // heyooo
//$query = $link->query("UPDATE $user SET quest65 = 0 "); // heyooo
//$query = $link->query("UPDATE $user SET KLdragon = 0 "); // heyooo



//$query = $link->query("UPDATE $user SET KLdarkranger = 1 "); // reset variables




    // -----------------------

    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    /////
    // -----------------------


    echo '<h2 class="padd green notstartedX">Not Started Yet</h1>';


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
      echo '<div class="gbox">';
      echo '<h2 class="">Grand Quest </h2>';
      echo '<p>The Big Kahuna</p>';
      echo '</div>';

    }

    if ($row['grandquest1']=='0') {
      echo '<div class="gbox">';
      echo'<h4>Start your Grand Quest by visiting the pillar north of the grassy field. </h4>';
      echo '</div>';

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
