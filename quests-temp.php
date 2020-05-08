<?php

    // --------------------------------------- Jack Lumber QUEST CHAIN
    // --------------------------------------- Jack Lumber QUEST CHAIN
    // --------------------------------------- Jack Lumber QUEST CHAIN
    $questRoom = '024';
    echo '<div class="gbox';
    if ($row['room']==$questRoom) {
        echo ' tops';
    } elseif ($row['quest7']==2 && $row['quest8']==2 && $row['quest9']==2) {
        echo ' end';
    }
    echo '" >';
    //  echo '<div class="gslice">';
    echo '<h4 class="topright box blue">Professional Lumberjack</h4>';
    echo '<h2>Jack Lumber</h2>';
    echo '<span class="icon npc green">'.file_get_contents("img/svg/npc-jacklumber.svg").'</span>';
    if ($row['quest7']<'2' || $row['quest8']<'2' || $row['quest9']<'2') {
        echo '<p class="gray">Jack Lumber will prepare you for your next challenge. Find him east of the Grassy Field.</p>';
    } else {
        echo '<p class="gray">You now know the basics of combat. The Jack Lumber wishes you the best in your adventures. He says you should next make your way to Red Town and join a guild or two.</p>';
        echo '<h5 class="padd">'.$checkBox.' Join the Warriors or Wizards Guild.</h5>';
    }
    if ($row['quest7']=='0') { // ------------------------------------- end state
        echo '<h5 class="gslice">'.$checkBox.' Talk to the Jack Lumber.</h5>';
        if ($row['quest7']=='0' && $row['room']==$questRoom) {
            echo '<button class="greenBG" type="submit" name="input1" value="start quests"><h4>Talk to the Jack Lumber</h4></button>';
        }
    }
    // ----------------------------------------- IN PROGRESS - QUEST 7
    $questNumber = '7';
    if ($row['quest'.$questNumber.'']=='1') {
        $questTag = 'Equip Weapon';
        $questTitle = 'My First Sword and Shield';
        $questDesc = 'Pick up and equip a weapon. You can get one at the Jack Lumber\'s Training Area.';
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
            echo '<h5 class="padd green">'.$checkedBox.' Nice. You have equipped your first weapon! Return to the Jack Lumber for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 8
    $questNumber = '8';
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
            echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.$checkedBox.$checkedBox.' You have collected 5 Scorpion Tails! Return to the Jack Lumber for your reward.</h5>';

            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }




        echo '</div>';
    }
    // ----------------------------------------- IN PROGRESS - QUEST 9
    $questNumber = '9';
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
            echo '<h5 class="padd green">'.$checkedBox.$checkedBox.$checkedBox.$checkedBox.' You have collected all the pieces of the Training Armor set. Return to the Jack Lumber for your reward.</h5>';
            if ($row['room']==$questRoom) {
                echo '<button class="greenBG" type="submit" name="input1" value="complete '.$questNumber.'"><h4>Complete Quest</h4></button>';
            }
        }
        echo '</div>';
    }

    echo '</div>'; //-end gbox
