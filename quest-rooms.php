<?php


// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
// ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC




// --------------------------------------------------------------------------------- Quests TAB
//echo '<article data-pop="quests" id="quests">';
    // --------------------------------------------------------------------------------- QUEST ROOMS
    // ---------------------------------------------------------------- 1-3 - Old Man
    if ($row['room']=='003' && 99999999999999 == 8888888888888888888888) {
        echo '<div class="gbox">';
        echo '<span class="icon brown">'.file_get_contents("img/svg/cabin.svg").'</span>';
        echo '<p class="questLvlBox">Quests 1-3</p>';
        echo '<h2 class="">Old Man</h2>';
        echo '<h3 class="brown">Wood Cabin</h3>';
        echo '<p class="gray">The Old Man can\'t get around like he used to. Help him out with anything he might need.</h4>';

        if ($row['quest1']=='0') {
            //  echo '<input class="startall" type="submit" name="input1" value="start quests" />';
            echo '<button class="startallX greenBG" type="submit" name="input1" value="start quests"><h4>start The Old Man\'s Quests</h4></button>';
        } else {
            // ---------------------------------------------------------------- 1
            if ($row['quest1']==1) {
                $color='';
                if ($row['flower']>='1') {
                    $color='green';
                }
                echo '<div class="gslice">';
                echo '<p class="questLvlBox"><span class="'.$color.'">Quest 1 </span> lvl 1 item find</p>';
                echo '<h3 class="'.$color.'">A Flower for my Wife</h3>';
                //  echo '<h3>1) A Flower for my Wife</h3>';
                if ($row['flower']>=1) {
                    echo '<p class="">You have picked a flower. Return it to the Old Man.</p>';
                    echo '<button class="greenBG" type="submit" name="input1" value="complete 1">Complete Quest</button>';
                } else {
                    echo '<p class="gray">The Old Man would like you to bring him a flower. You can find one directly north of here.</p>';
                }
                echo '</div>';
            }
            // ---------------------------------------------------------------- 2
            if ($row['quest2']==1) {
                echo '<h3>2) Practice on the Dummy</h3>';
                if ($row['KLdummy']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 2" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 2" />';
                }
            }
            // ---------------------------------------------------------------- 3
            if ($row['quest3']==1) {
                echo '<h3>3) Rat Problem</h3>';
                if ($row['KLgiantrat']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 3" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 3" />';
                }
            }
        }
        echo '</div>';
    }
    // ---------------------------------------------------------------- 4-6 - Young Soldier
    elseif ($row['room']=='003c' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="green">Young Soldier</h2><h4>Quests 4-6</h4>
			';
        if ($row['quest4']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 4
            if ($row['quest4']==1 && (($equipR == 'training sword' && $equipL == 'training shield') || $equipR=='training 2h sword')) {
                echo '<h3> 4) My First Sword and Shield:</h3>
	<input type="submit" name="input1" value="info 4" />
	<input class="completeBtn" type="submit" name="input1" value="complete 4" /><br/> ';
            } elseif ($row['quest4']==1) {
                echo '<h3> 4) My First Sword and Shield:</h3>
	<input type="submit" name="input1" value="info 4" />
	<input type="submit" name="input1" value="complete 4" /><br/> ';
            }

            // ---------------------------------------------------------------- 5
            if ($row['quest5']==1) {
                echo '<h3>5) Collect 5 Scorpion Tails:</h3>
	<input type="submit" name="input1" value="info 5" />';
                if ($row['scorpiontail']>=5) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 5" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 5" />';
                }
            }


            // ---------------------------------------------------------------- 6
            if ($row['quest6']=='1') {
                echo'<h3> 6) Training Armor Pro:</h3>
	<input type="submit" name="input1" value="info 6" />';
                if ($row['traininghelmet'] >= '1'
    && $row['trainingarmor'] >= '1'
    && $row['traininggloves'] >= '1'
    && $row['trainingboots'] >= '1') {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 6" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 6" />';
                }
            }
        }
    }

    // ---------------------------------------------------------------- 7-9 - Jack Lumber
    elseif ($row['room']=='024' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="green">Jack Lumber</h2><h4>Quests 7-9</h4>
			';
        if ($row['quest7']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {

// ---------------------------------------------------------------- 7
            if ($row['quest7']==1) {
                echo '<h3>7) Boomerang Some Bats:</h3>
	<input type="submit" name="input1" value="info 7" />';
                if ($row['batwing']>=5) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 7" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 7" />';
                }
            }
            // ---------------------------------------------------------------- 8
            if ($row['quest8']==1) {
                echo '<h3>8) Chop some Wood, Craft a Table:</h3>
	<input type="submit" name="input1" value="info 8" />';
                if ($row['craftingtable']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 8" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 8" />';
                }
            }
            // ---------------------------------------------------------------- 9
            if ($row['quest9']==1) {
                echo '<h3>9) Goblin Chief Bounty:</h3>
	<input type="submit" name="input1" value="info 9" />';
                if ($row['KLgoblinchief']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 9" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 9" />';
                }
            }
        }
    }
    // ---------------------------------------------------------------- 10 - Freddie's Cow Farm
    elseif ($row['room']=='103' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="green">Freddie\'s Cow Farm <i class=" lightbrown">Quest 10</h4>
			';
        if ($row['quest10']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quest 10" />';
        } else {
            // ---------------------------------------------------------------- 10 - Freddie's Cow Farm
            if ($row['quest10']==1) {
                echo '<h3>10) Freddie\'s Leather Farm</h3>
	<input type="submit" name="input1" value="info 10" />';
                if (($row['leatherhood'] >= 1 ||
                $row['leatherhelmet'] >= 1 ||
                $row['leathervest'] >= 1 ||
                $row['leatherarmor'] >= 1 ||
                $row['leathergloves'] >= 1 ||
                $row['leatherboots'] >= 1) && $row['quest10'] == 1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 10" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 10" />';
                }
            } else {
                echo 'You have completed this Quest. Go explore and find more.';
            }
        }
    }

    // ---------------------------------------------------------------- 11-13 - Red Guard Captain
    elseif ($row['room']=='215' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="lightred">Red Guard Captain</h2><h4>Quests 11-13</h4>
			';
        if ($row['quest11']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {

// ---------------------------------------------------------------- 11
            if ($row['quest11']==1) {
                echo '<h3>11) Bring 3 Thieves to Justice:</h3>
	<input type="submit" name="input1" value="info 11" />';
                if ($row['KLthief']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 11" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 11" />';
                }
            }
            // ---------------------------------------------------------------- 12
            if ($row['quest12']==1) {
                echo '<h3>12) Swords for the Red Guard:</h3>
	<input type="submit" name="input1" value="info 12" />';
                if ($row['longsword']>=5) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 12" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 12" />';
                }
            }
            // ---------------------------------------------------------------- 13
            if ($row['quest13']==1) {
                echo '<h3>13) Sewer Pest Control:</h3>
	<input type="submit" name="input1" value="info 13" />';
                if ($row['KLtarantula']>=1 && $row['KLsewerrat']>=1 && $row['KLredgator']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 13" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 13" />';
                }
            }
        }
    }


    // ---------------------------------------------------------------- 14-16 - Forest Gnome
    elseif ($row['room']=='128' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="green">Forest Gnome</h2><h4>Quests 14-16</h4>
			';
        if ($row['quest14']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 14
            if ($row['quest14']==1) {
                echo '<h3>14) Gnome Needs Berries:</h3>
	<input type="submit" name="input1" value="info 14" />';
                if ($row['blueberry']>=20 && $row['redberry']>=20) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 14" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 14" />';
                }
            }
            // ---------------------------------------------------------------- 15
            if ($row['quest15']==1) {
                echo '<h3>15) New Tree Hut Door:</h3>
	<input type="submit" name="input1" value="info 15" />';
                if ($row['wood']>=20) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 15" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 15" />';
                }
            }
            // ---------------------------------------------------------------- 16
            if ($row['quest16']==1) {
                echo '<h3>16) Troll Base Camp:</h3>
	<input type="submit" name="input1" value="info 16" />';
                if ($row['KLtroll']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 16" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 16" />';
                }
            }
        }
    }


    // ---------------------------------------------------------------- 17-18 - Hunter Bill
    elseif ($row['room']=='118' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="lightrdd">Hunter Bill</h2><h4>Quests 17-18</h4>
			';
        if ($row['quest17']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {

// ---------------------------------------------------------------- 17
            if ($row['quest17']==1) {
                echo '<h3>17) Bigfoot Sighting:</h3>
	<input type="submit" name="input1" value="info 17" />';
                if ($row['KLbigfoot']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 17" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 17" />';
                }
            }
            // ---------------------------------------------------------------- 18
            if ($row['quest18']==1) {
                echo '<h3>18) Forest Hunter:</h3>
	<input type="submit" name="input1" value="info 18" />';
                if ($row['KLwildboar'] >= 1 &&
                $row['KLwolf'] >= 1 &&
                $row['KLcoyote'] >= 1 &&
                $row['KLbuck'] >= 1 &&
                $row['KLbear'] >= 1 &&
                $row['KLstag'] >= 1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 18" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 18" />';
                }
            }
        }
    }
    // ---------------------------------------------------------------- 19 - WARRIORS GUILD INITIATION
    elseif ($row['room']=='226' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="blue">Warrior\'s Initiation </h2><h4>Quest 19</h4>
			';
        if ($row['quest19']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quest 19" />';
        } else {
            // ---------------------------------------------------------------- 19
            if ($row['quest19']==1) {
                echo '<h3>19) Warrior\'s Guild Initiation </h3>
	<input type="submit" name="input1" value="info 19" />';
                if ($row['KLogrelieutenant'] >= 1 && $quest19 == 1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 19" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 19" />';
                }
            } else {
                echo 'You have completed this Quest. Go explore and find more.';
            }
        }
    }
    // ---------------------------------------------------------------- 20 - WIZARDS GUILD INITIATION
    elseif ($row['room']=='225' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="purple">Wizard\'s Guild </h2><h4>Quest 20</h4>
			';
        if ($row['quest20']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quest 20" />';
        } else {
            // ---------------------------------------------------------------- 20
            if ($row['quest20']==1) {
                echo '<h3>20) Wizard\'s Initiation</h3>
	<input type="submit" name="input1" value="info 20" />';
                if ($row['KLkoboldmaster'] >= 1 && $quest20 == 1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 20" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 20" />';
                }
            } else {
                echo 'You have completed this Quest. Go explore and find more.';
            }
        }
    }
    // ---------------------------------------------------------------- 21-23 - TOWN HALL PLAZA
    elseif ($row['room']=='221' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="red">Town Plaza</h2><h4>Quests 21-23</h4>
			';
        if ($row['quest21']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 21
            if ($row['quest21']==1) {
                echo '<h3>21) Twice as Nice:</h3>
	<input type="submit" name="input1" value="info 21" />';
                if ($row['flower']>=2) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 21" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 21" />';
                }
            }
            // ---------------------------------------------------------------- 22
            if ($row['quest22']==1) {
                echo '<h3>22) Cookin up some Meat-a-balls:</h3>
	<input type="submit" name="input1" value="info 22" />';
                if ($row['cookedmeat']>=5) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 22" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 22" />';
                }
            }
            // ---------------------------------------------------------------- 23
            if ($row['quest23']==1) {
                echo '<h3>23) Stolen Teddy Bear:</h3>
	<input type="submit" name="input1" value="info 23" />';
                if ($row['KLmasterthief']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 23" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 23" />';
                }
            }
        }
    }
    // ---------------------------------------------------------------- 24 - RED TOWN MAYOR
    elseif ($row['room']=='222z' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="red">Red Town Mayor </h2><h4>Quest 24</h4>
			';
        if ($row['quest24']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quest 24" />';
        } else {
            // ---------------------------------------------------------------- 24
            if ($row['quest24']==1) {
                echo '<h3>24) Scorpion King Bounty</h3>
	<input type="submit" name="input1" value="info 24" />';
                if ($row['KLscorpionking'] >= 1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 24" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 24" />';
                }
            } else {
                echo 'You have completed this Quest. Go explore and find more.';
            }
        }
    }
    // ---------------------------------------------------------------- 25-27 - WARRIOR PETE QUESTS
    elseif ($row['room']=='226e' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="blue">Warrior Pete</h2><h4>Quests 25-27</h4>
			';
        if ($row['quest25']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 25
            if ($row['quest25']==1) {
                echo '<h3>25) Banish the Skeleton Knights:</h3>
	<input type="submit" name="input1" value="info 25" />';
                if ($row['KLskeletonknight']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 25" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 25" />';
                }
            }
            // ---------------------------------------------------------------- 26
            if ($row['quest26']==1) {
                echo '<h3>26) Shark Hunter:</h3>
	<input type="submit" name="input1" value="info 26" />';
                if ($row['KLgreatwhite']>=1 && $row['KLhammerhead']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 26" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 26" />';
                }
            }
            // ---------------------------------------------------------------- 27
            if ($row['quest27']==1) {
                echo '<h3>27) True Troll Champion:</h3>
	<input type="submit" name="input1" value="info 27" />';
                if ($row['KLtrollchampion']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 27" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 27" />';
                }
            }
        }
    }

    // ---------------------------------------------------------------- 28-30 - WIZARD MORTY QUESTS
    elseif ($row['room']=='225g' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="purple">Wizard Morty</h2><h4>Quests 28-30</h4>
			';
        if ($row['quest28']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 28
            if ($row['quest28']==1) {
                echo '<h3>28) Rare Gray Matter:</h3>
	<input type="submit" name="input1" value="info 28" />';
                if ($row['graymatter']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 28" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 28" />';
                }
            }
            // ---------------------------------------------------------------- 29
            if ($row['quest29']==1) {
                echo '<h3>29) Omar & Victoria the Dead:</h3>
	<input type="submit" name="input1" value="info 29" />';
                if ($row['KLomar']>=1 || $row['KLvictoria']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 29" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 29" />';
                }
            }
            // ---------------------------------------------------------------- 30
            if ($row['quest30']==1) {
                echo '<h3>30) Magic and the Troll Queen:</h3>
	<input type="submit" name="input1" value="info 30" />';
                if ($row['KLtrollqueen']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 30" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 30" />';
                }
            }
        }
    }
    // ---------------------------------------------------------------- 31 - MINING GUILD INITIATION
    elseif ($row['room']=='308' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="brown">Mining Guild </h2><h4>Quest 31</h4>
			';
        if ($row['quest31']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quest 31" />';
        } else {
            // ---------------------------------------------------------------- 31
            if ($row['quest31']==1) {
                echo '<h3>31) Mining Guild Initiation</h3>
	<input type="submit" name="input1" value="info 31" />';
                if ($row['KLkraken'] >= 1 && $quest31 == 1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 31" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 31" />';
                }
            } else {
                echo 'You have completed this Quest. Go explore and find more.';
            }
        }
    }
    // ---------------------------------------------------------------- 32-34 - MINING GUILD HEADQUARTERS
    elseif ($row['room']=='308c' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="brown">Mining Guild Leader</h2><h4>Quests 32-34</h4>
			';
        if ($row['quest32']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 32
            if ($row['quest32']==1) {
                echo '<h3>32) Iron Boss: Phoenix</h3>
	<input type="submit" name="input1" value="info 32" />';
                if ($row['KLphoenix']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 32" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 32" />';
                }
            }
            // ---------------------------------------------------------------- 33
            if ($row['quest33']==1) {
                echo '<h3>33) Steel Boss: Cyclops</h3>
	<input type="submit" name="input1" value="info 33" />';
                if ($row['KLcyclops']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 33" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 33" />';
                }
            }
            // ---------------------------------------------------------------- 34
            if ($row['quest34']==1) {
                echo '<h3>34) Mithril Boss: Minotaur	</h3>
	<input type="submit" name="input1" value="info 34" />';
                if ($row['KLminotaur']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 34" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 34" />';
                }
            }
        }
    }
    // ---------------------------------------------------------------- 35-37 - DWARF CAPTAIN QUESTS
    elseif ($row['room']=='303' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="red">Dwarf Captain</h2><h4>Quests 35-37</h4>
			';
        if ($row['quest35']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 35
            if ($row['quest35']==1) {
                echo '<h3>35) Clear out the Abandoned Mine:</h3>
	<input type="submit" name="input1" value="info 35" />';
                if ($row['KLrabidskeever']>=1 && $row['KLbleedingdartwing']>=1 && $row['KLmongoliandeathworm']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 35" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 35" />';
                }
            }
            // ---------------------------------------------------------------- 36
            if ($row['quest36']==1) {
                echo '<h3>36) Glowing Sea Monster:</h3>
	<input type="submit" name="input1" value="info 36" />';
                if ($row['KLglowingoctopus']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 36" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 36" />';
                }
            }
            // ---------------------------------------------------------------- 37
            if ($row['quest37']==1) {
                echo '<h3>37) Missing Dwarf Axeman:</h3>
	<input type="submit" name="input1" value="info 37" />';
                if ($row['KLpossessedaxeman']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 37" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 37" />';
                }
            }
        }
    }


    // ---------------------------------------------------------------- 38-40 - DWARF GUARD BOUNTY BOARD
    elseif ($row['room']=='306' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="red">Dwarf Guard Bounty Board</h2><h4>Quests 38-40</h4>
			';
        if ($row['quest38']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 38
            if ($row['quest38']==1) {
                echo '<h3>38) Red Beard Bounty:</h3>
	<input type="submit" name="input1" value="info 38" />';
                if ($row['KLredbeard']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 38" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 38" />';
                }
            }
            // ---------------------------------------------------------------- 39
            if ($row['quest39']==1) {
                echo '<h3>39) Troll King Bounty:</h3>
	<input type="submit" name="input1" value="info 39" />';
                if ($row['KLtrollking']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 39" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 39" />';
                }
            }
            // ---------------------------------------------------------------- 40
            if ($row['quest40']==1) {
                echo '<h3>40) Gatekeeper Bounty:</h3>
	<input type="submit" name="input1" value="info 40" />';
                if ($row['KLgatekeeper']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 40" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 40" />';
                }
            }
        }
    }
    // ---------------------------------------------------------------- 41-43 - BLUE OASIS - FRIENDLY PIRATE
    elseif ($row['room']=='413' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="blue">Friendly Pirate</h2><h4>Quests 41-43</h4>
			';
        if ($row['quest41']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 41
            if ($row['quest41']==1) {
                echo '<h3>41) Like a Squid:</h3>
	<input type="submit" name="input1" value="info 41" />';
                if ($row['KLsquid']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 41" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 41" />';
                }
            }
            // ---------------------------------------------------------------- 42
            if ($row['quest42']==1) {
                echo '<h3>42) Mud Crab Population Control:</h3>
	<input type="submit" name="input1" value="info 42" />';
                if ($row['KLmudcrab']>=20) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 42" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 42" />';
                }
            }
            // ---------------------------------------------------------------- 43
            if ($row['quest43']==1) {
                echo '<h3>43) Ocean Hunter Pro:</h3>
	<input type="submit" name="input1" value="info 43" />';
                if ($row['KLjellyfish'] >= 1 && $row['KLelectriceel'] >= 1 && $row['KLpiranha'] >= 1 && $row['KLbarracuda'] >= 1 && $row['KLcrocodile'] >= 1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 43" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 43" />';
                }
            }
        }
    }

    // ---------------------------------------------------------------- 44-46 - Jungle Jim - Crocodile Island
    elseif ($row['room']=='424' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="green">Jungle Jim</h2><h4>Quests 44-46</h4>
			';
        if ($row['quest44']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 44
            if ($row['quest44']==1) {
                echo '<h3>44) Third Times a Charm:</h3>
	<input type="submit" name="input1" value="info 44" />';
                if ($row['flower']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 44" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 44" />';
                }
            }
            // ---------------------------------------------------------------- 45
            if ($row['quest45']==1) {
                echo '<h3>45) Angry Birds:</h3>
	<input type="submit" name="input1" value="info 45" />';
                if ($row['KLhawk'] >=1 && $row['KLalbatross'] >=1 && $row['KLfalcon'] >=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 45" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 45" />';
                }
            }
            // ---------------------------------------------------------------- 46
            if ($row['quest46']==1) {
                echo '<h3>46) Iron Warrior:</h3>
	<input type="submit" name="input1" value="info 46" />';
                if (
        ((($row['equipR']   == 'iron dagger' || $row['equipR']   == 'iron sword' || $row['equipR']   == 'iron staff')
            && ($row['equipL']   == 'iron shield' || $row['equipL']   == 'iron kite shield'))
        ||
        ($row['equipR']   == 'iron maul' || $row['equipR']   == 'iron 2h sword' || $row['equipR']   == 'iron battlestaff' || $row['equipR']   == 'iron nunchaku' ||
            $row['equipR']   == 'iron boomerang' || $row['equipR']   == 'iron chakram' || $row['equipR']   == 'iron bow' || $row['equipR']   == 'iron crossbow'))
        && ($row['equipHead']   == 'iron helmet' || $row['equipHead']   == 'iron hood')
        && ($row['equipBody']   == 'iron armor' || $row['equipBody']   == 'iron cape')
        && ($row['equipHands']   == 'iron gloves' || $row['equipHands']   == 'iron gauntlets')
        && ($row['equipFeet']   == 'iron boots')
) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 46" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 46" />';
                }
            }
        }
    }



    // ---------------------------------------------------------------- 47-50 - MASTER TEMPLE
    elseif ($row['room']=='425' && 99999999999999 == 8888888888888888888888) {
        echo '<h2 class="gold">Master Temple</h2><h4>Quests 47-50</h4>
			';
        if ($row['quest47']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 47
            if ($row['quest47']==1) {
                echo '<h3>47) Test of Strength:</h3>
	<input type="submit" name="input1" value="info 47" />';
                if ($row['KLthunderbarbarian']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 47" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 47" />';
                }
            }
            // ---------------------------------------------------------------- 48
            if ($row['quest48']==1) {
                echo '<h3>48) Test of Dexterity:</h3>
	<input type="submit" name="input1" value="info 48" />';
                if ($row['KLsmoothranger']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 48" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 48" />';
                }
            }
            // ---------------------------------------------------------------- 49
            if ($row['quest49']==1) {
                echo '<h3>49) Test of Magic:</h3>
	<input type="submit" name="input1" value="info 49" />';
                if ($row['KLcoralwizard']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 49" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 49" />';
                }
            }
            // ---------------------------------------------------------------- 50
            if ($row['quest50']==1) {
                echo '<h3>50) Test of Defense:</h3>
	<input type="submit" name="input1" value="info 50" />';
                if ($row['KLheavywalrus']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 50" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 50" />';
                }
            }
        }
    }

    // ---------------------------------------------------------------- 51-53 - DARK FOREST OUTPOST - RANGER GUARD
    elseif ($row['room']=='502') {
        echo '<h2 class="green">Ranger Guard</h2><h4>Quests 51-53</h4>
			';
        if ($row['quest51']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 51
            if ($row['quest51']==1) {
                echo '<h3>51) Protect the Mountain Path:</h3>
	<input type="submit" name="input1" value="info 51" />';
                if ($row['KLhighwayman']>=5 && $row['KLbowman']>=5) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 51" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 51" />';
                }
            }
            // ---------------------------------------------------------------- 52
            if ($row['quest52']==1) {
                echo '<h3>52) Elder Slayer:</h3>
	<input type="submit" name="input1" value="info 52" />';
                if ($row['KLtrollelder']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 52" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 52" />';
                }
            }
            // ---------------------------------------------------------------- 53
            if ($row['quest53']==1) {
                echo '<h3>53) Dark Keep First Floor:</h3>
	<input type="submit" name="input1" value="info 53" />';
                if ($row['KLlurker'] >=1 && $row['KLwingeddemon'] >=1 && $row['KLundeadorc'] >=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 53" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 53" />';
                }
            }
        }
    }



    // ---------------------------------------------------------------- 54-56 - DARK ELF - TREE HUT
    elseif ($row['room']=='506') {
        echo '<h2 class="green">Dark Elf</h2><h4>Quests 54-56</h4>
			';
        if ($row['quest54']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 54
            if ($row['quest54']==1) {
                echo '<h3>54) Dark Forest Lumberjack:</h3>
	<input type="submit" name="input1" value="info 54" />';
                if ($row['wood']>=50) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 54" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 54" />';
                }
            }
            // ---------------------------------------------------------------- 55
            if ($row['quest55']==1) {
                echo '<h3>55) Shaman & Sorcerer Slayer:</h3>
	<input type="submit" name="input1" value="info 55" />';
                if ($row['KLtrollshaman']>=1 && $row['KLtrollsorcerer']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 55" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 55" />';
                }
            }
            // ---------------------------------------------------------------- 56
            if ($row['quest56']==1) {
                echo '<h3>56) Ent Hunter:</h3>
	<input type="submit" name="input1" value="info 56" />';
                if ($row['KLent'] >=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 56" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 56" />';
                }
            }
        }
    }


    // ---------------------------------------------------------------- 57 - RANGERS GUILD INITIATION
    elseif ($row['room']=='515') {
        echo '<h2 class="green">Ranger\'s Guild </h2><h4>Quest 57</h4>
			';
        if ($row['quest57']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quest" />';
        } else {
            // ---------------------------------------------------------------- 57
            if ($row['quest57']==1) {
                echo '<h3>57) Ranger\'s Initiation </h3>
	<input type="submit" name="input1" value="info 57" />';
                if ($row['KLdarkranger'] >= 1 && $quest57 == 1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 57" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 57" />';
                }
            } else {
                echo 'You have completed this Quest. Go explore and find more.';
            }
        }
    }


    // ---------------------------------------------------------------- 58-60 - RANGER LEGO - RANGER QUESTS
    elseif ($row['room']=='515b') {
        echo '<h2 class="green">Lego\'s Quests</h2><h4>Quests 58-60</h4>
			';
        if ($row['quest58']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 58
            if ($row['quest58']==1) {
                echo '<h3>58) Stubborn War Turtle:</h3>
	<input type="submit" name="input1" value="info 58" />';
                if ($row['KLwarturtle']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 58" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 58" />';
                }
            }
            // ---------------------------------------------------------------- 59
            if ($row['quest59']==1) {
                echo '<h3>59) Gargoyle Hunter:</h3>
	<input type="submit" name="input1" value="info 59" />';
                if ($row['KLwhitegargoyle']>=1 && $row['KLgreygargoyle']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 59" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 59" />';
                }
            }
            // ---------------------------------------------------------------- 60
            if ($row['quest60']==1) {
                echo '<h3>60) The Griffin:</h3>
	<input type="submit" name="input1" value="info 60" />';
                if ($row['KLgriffin'] >=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 60" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 60" />';
                }
            }
        }
    }




    // ---------------------------------------------------------------- 61-63 - Stone Mountain Base Camp QUESTS
    elseif ($row['room']=='607') {
        echo '<h2 class="blue">Base Camp Quests</h2><h4>Quests 61-63</h4>
			';
        if ($row['quest61']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 61
            if ($row['quest61']==1) {
                echo '<h3>61) Frozen Fourth Flower:</h3>
	<input type="submit" name="input1" value="info 61" />';
                if ($row['flower']>=4) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 61" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 61" />';
                }
            }
            // ---------------------------------------------------------------- 62
            if ($row['quest62']==1) {
                echo '<h3>62) Balm Mixer:</h3>
	<input type="submit" name="input1" value="info 62" />';
                if ($row['redpotion']>=5 && $row['bluepotion']>=5 && $row['mud']>=10) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 62" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 62" />';
                }
            }
            // ---------------------------------------------------------------- 63
            if ($row['quest63']==1) {
                echo '<h3>63) Ulfberht the Viking:</h3>
	<input type="submit" name="input1" value="info 63" />';
                if ($row['KLulfberht'] >=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 63" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 63" />';
                }
            }
        }
    }


    // ---------------------------------------------------------------- 64-66 - BLUE GUARD | MOUNTAIN OUTPOST QUESTS
    elseif ($row['room']=='608') {
        echo '<h2 class="blue">Blue Guard - Mountain Outpost Quests</h2><h4>Quests 64-66</h4>
			';
        if ($row['quest64']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 64
            if ($row['quest64']==1) {
                echo '<h3>64) Steel Warrior:</h3>
	<input type="submit" name="input1" value="info 64" />';
                if (
        ((($row['equipR']   == 'steel dagger' || $row['equipR']   == 'steel sword' || $row['equipR']   == 'steel staff')
            && ($row['equipL']   == 'steel shield' || $row['equipL']   == 'steel kite shield'))
        ||
        ($row['equipR']   == 'steel maul' || $row['equipR']   == 'steel 2h sword' || $row['equipR']   == 'steel battlestaff' || $row['equipR']   == 'steel nunchaku' ||
            $row['equipR']   == 'steel boomerang' || $row['equipR']   == 'steel chakram' || $row['equipR']   == 'steel bow' || $row['equipR']   == 'steel crossbow'))
        && ($row['equipHead']   == 'steel helmet' || $row['equipHead']   == 'steel hood')
        && ($row['equipBody']   == 'steel armor' || $row['equipBody']   == 'steel cape')
        && ($row['equipHands']   == 'steel gloves' || $row['equipHands']   == 'steel gauntlets')
        && ($row['equipFeet']   == 'steel boots')
) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 64" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 64" />';
                }
            }
            // ---------------------------------------------------------------- 65
            if ($row['quest65']==1) {
                echo '<h3>65) Yeti Hunter:</h3>
	<input type="submit" name="input1" value="info 65" />';
                if ($row['KLyeti'] >=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 65" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 65" />';
                }
            }
            // ---------------------------------------------------------------- 66
            if ($row['quest66']==1) {
                echo '<h3>66) Dragon Slayer:</h3>
	<input type="submit" name="input1" value="info 66" />';
                if ($row['KLdragon'] >=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 66" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 66" />';
                }
            }
        }
    }


    // ---------------------------------------------------------------- 67-69 - Chilly Pete | Mountain Cabin
    elseif ($row['room']=='609') {
        echo '<h2 class="blue">Chilly Pete</h2><h4>Quests 67-69</h4>
			';
        if ($row['quest67']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quests" />';
        } else {
            // ---------------------------------------------------------------- 67
            if ($row['quest67']==1) {
                echo '<h3>67) Vampire Hunter:</h3>
	<input type="submit" name="input1" value="info 67" />';
                if ($row['KLvampire']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 67" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 67" />';
                }
            }
            // ---------------------------------------------------------------- 68
            if ($row['quest68']==1) {
                echo '<h3>68) Dark Paladin Cleanse:</h3>
	<input type="submit" name="input1" value="info 68" />';
                if ($row['KLdarkpaladin']>=3) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 68" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 68" />';
                }
            }
            // ---------------------------------------------------------------- 69
            if ($row['quest69']==1) {
                echo '<h3>69) The Super Rare Snowy Trio:</h3>
	<input type="submit" name="input1" value="info 69" />';
                if ($row['KLsnowogre'] >= 1 && $row['KLsnowninja'] >= 1 && $row['KLsnowowl']) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 69" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 69" />';
                }
            }
        }
    }



    // ---------------------------------------------------------------- 70 - STAR CITY | BLUE GATE
    elseif ($row['room']=='611') {
        echo '<h2 class="blue">Star City | Blue Gate</h2><h4>Quest 70</h4>
			';
        if ($row['quest70']=='0') {
            echo '<input class="startall" type="submit" name="input1" value="start quest" />';
        } else {
            // ---------------------------------------------------------------- 70
            if ($row['quest70']==1) {
                echo '<h3>70) Open the Gate:</h3>
	<input type="submit" name="input1" value="info 70" />';
                if ($row['KLbutcher']>=1 && $row['KLkingsquid']>=1 && $row['KLgiantmountaingiant']>=1) {
                    echo '<input class="completeBtn" type="submit" name="input1" value="complete 70" />';
                } else {
                    echo '<input type="submit" name="input1" value="complete 70" />';
                }
            }
        }
    }




    
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
    // ---------------------------------NOT IN USE ANYMORE - THIS STUFF IS NOW IN QUESTS.PHP - january 2021 - AC
