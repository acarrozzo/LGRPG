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

    //<article data-pop="kl" id="kl" class="">


    echo '<h3 class="spCount">TOTAL<span class="red">'. $row['KLtotalkill'].'</h5>';
    echo '<div class="gbox">';

    echo '<h1>Kill List</h1>';


    //---------------------------------------------------------------------------- KL


    //  if ($row['KLtotalkill']>=1) {
    //      echo '<h3 class="topright spCount">TOTAL<div>'. $row['KLtotalkill'].'</div></h3>';
    //  }

    // echo '<div><span class="alt">KEY: </span></div>';
    //	 echo '<div><span class="alt"><i class="rare">R</i>Rare </span></div>';
    //	 echo '<div><span class="alt"><i class="rare">B</i>Boss </span></div>';
    //	 echo '<div><span class="alt"><i class="rare">D</i>Dragon </span></div>';
    echo '</div>';
    echo'<div class="gbox">';
    echo '<h3 class="yellowgreen">Grassy Field </h3><h5 class="ddgray">lvl 1-5</h5>';

    if ($row['KLrat']>=1) {
        echo '<h4 class="elvl">1: Rat <span class="right">'. $row['KLrat'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Rat </span></div>';
    }
    if ($row['KLsandcrab']>=1) {
        echo '<h4 class="elvl">2: Sand Crab <span class="right">'. $row['KLsandcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Sand Crab </span></div>';
    }
    if ($row['KLgiantrat']>=1) {
        echo '<h4 class="elvl">3: Giant Rat <span class="right">'. $row['KLgiantrat'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Giant Rat </span></div>';
    }
    if ($row['KLgator']>=1) {
        echo '<h4 class="elvl green">5: Gator <span class="right">'. $row['KLgator'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Gator </span></div>';
    }

    echo '</div><div class="gbox">';

    echo '<h3 class="gray">Spider Cave</h3><h5 class="ddgray">lvl 2-5</h5>';

    if ($row['KLspider']>=1) {
        echo '<h4 class="elvl">2: Spider <span class="right">'. $row['KLspider'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Spider </span></div>';
    }
    if ($row['KLscorpion']>=1) {
        echo '<h4 class="elvl">3: Scorpion <span class="right">'. $row['KLscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Scorpion </span></div>';
    }
    if ($row['KLgiantspider']>=1) {
        echo '<h4 class="elvl">4: Giant Spider <span class="right">'. $row['KLgiantspider'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Giant Spider </span></div>';
    }
    if ($row['KLalphascorpion']>=1) {
        echo '<h4 class="elvl">5: Alpha Scorpion <span class="right">'. $row['KLalphascorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Alpha Scorpion </span></div>';
    }





    echo '</div><div class="gbox">';

    echo '<h3 class="lightred">Scorpion Pit</h3><h5 class="ddgray">lvl 5-30</h5>';

    if ($row['KLscorpionguard']>=1) {
        echo '<h4 class="elvl">7: Scorpion Guard <span class="right">'. $row['KLscorpionguard'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Scorpion Guard </span></div>';
    }
    if ($row['KLmammothscorpion']>=1) {
        echo '<h4 class="elvl">10: Mammoth Scorpion <span class="right">'. $row['KLmammothscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mammoth Scorpion </span></div>';
    }
    if ($row['KLscorpionqueen']>=1) {
        echo '<h4 class="blue elvl">15: Scorpion Queen <span class="right">'. $row['KLscorpionqueen'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Scorpion Queen </span></div>';
    }
    if ($row['KLscorpionking']>=1) {
        echo '<h4 class="lightred elvl">30: Scorpion King <span class="right">'. $row['KLscorpionking'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Scorpion King </span></div>';
    }










    echo '</div><div class="gbox">';

    echo '<h3 class="darkblue">Bat Cave</h3><h5 class="ddgray">lvl 2-10</h5>';

    if ($row['KLbat']>=1) {
        echo '<h4 class="elvl">2: Bat <span class="right">'. $row['KLbat'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Bat </span></div>';
    }
    if ($row['KLgoldenbat']>=1) {
        echo '<h4 class="elvl">6:Golden Bat <span> '. $row['KLgoldenbat'].'</span><i>rare</i>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Golden Bat <i>rare</i> </span> </div>';
    }

    if ($row['KLsalamander']>=1) {
        echo '<h4 class="elvl">6: Salamander <span class="right">'. $row['KLsalamander'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Salamander </span></div>';
    }
    if ($row['KLgoblin']>=1) {
        echo '<h4 class="elvl">5: Goblin <span class="right">'. $row['KLgoblin'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Goblin </span></div>';
    }
    if ($row['KLgoblinbandit']>=1) {
        echo '<h4 class="elvl">7: Goblin Bandit <span class="right">'. $row['KLgoblinbandit'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Goblin Bandit </span></div>';
    }
    if ($row['KLgoblinchief']>=1) {
        echo '<h4 class="lightbrown elvl">10: Goblin Chief <span class="right">'. $row['KLgoblinchief'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Goblin Chief </span></div>';
    }


    echo '</div><div class="gbox">';


    echo '<h3 class="green">Forest Path</h3><h5 class="ddgray">lvl 1-10</h5>';

    if ($row['KLcow']>=1) {
        echo '<h4 class="elvl">4: Cow <span class="right">'. $row['KLcow'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Cow </span></div>';
    }
    if ($row['KLsnake']>=1) {
        echo '<h4 class="elvl">5: Snake <span class="right">'. $row['KLsnake'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Snake </span></div>';
    }
    if ($row['KLhillogre']>=1) {
        echo '<h4 class="lightbrown elvl">10: Hill Ogre <span class="right">'. $row['KLhillogre'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Hill Ogre</span></div>';
    }
    if ($row['KLimp']>=1) {
        echo '<h4 class="elvl">7: <i class="rare">R</i>Imp <span class="right">'. $row['KLimp'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Imp </span></div>';
    }

    echo '</div><div class="gbox">';

    echo '<h3 class="blue">Ogre Lair</h3><h5 class="ddgray">lvl 2-13</h5>';

    if ($row['KLhobgoblin']>=1) {
        echo '<h4 class="elvl">6: Hob Goblin <span class="right">'. $row['KLhobgoblin'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Hob Goblin </span></div>';
    }
    if ($row['KLorc']>=1) {
        echo '<h4 class="elvl">7: Orc <span class="right">'. $row['KLorc'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Orc </span></div>';
    }
    if ($row['KLogre']>=1) {
        echo '<h4 class="elvl">8: Ogre <span class="right">'. $row['KLogre'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Ogre </span></div>';
    }
    if ($row['KLogreguard']>=1) {
        echo '<h4 class="elvl">9: Ogre Guard <span class="right">'. $row['KLogreguard'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Ogre Guard</span></div>';
    }
    if ($row['KLfireogress']>=1) {
        echo '<h4 class="elvl">10: Fire Ogress <span class="right">'. $row['KLfireogress'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Fire Ogress </span></div>';
    }
    if ($row['KLogrelieutenant']>=1) {
        echo '<h4 class="blue elvl">13: Ogre Lieutenant <span class="right">'. $row['KLogrelieutenant'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Ogre Lieutenant</span></div>';
    }
    if ($row['KLogrepriest']>=1) {
        echo '<h4 class="elvl">11: <i class="rare">R</i>Ogre Priest <span class="right">'. $row['KLogrepriest'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Ogre Priest </span></div>';
    }




    echo '</div><div class="gbox">';
    echo '<h3 class="medpurple">Kobold Layer</h3><h5 class="ddgray">lvl 3-13</h5>';

    if ($row['KLkobold']>=1) {
        echo '<h4 class="elvl">7: Kobold <span class="right">'. $row['KLkobold'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Kobold </span></div>';
    }
    if ($row['KLflyingkobold']>=1) {
        echo '<h4 class="elvl">7: Flying Kobold <span class="right">'. $row['KLflyingkobold'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Flying Kobold </span></div>';
    }
    if ($row['KLkoboldshaman']>=1) {
        echo '<h4 class="elvl">8: Kobold Shaman <span class="right">'. $row['KLkoboldshaman'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Kobold Shaman </span></div>';
    }
    if ($row['KLkoboldninja']>=1) {
        echo '<h4 class="elvl">8: Kobold Ninja <span class="right">'. $row['KLkoboldninja'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Kobold Ninja </span></div>';
    }
    if ($row['KLkoboldwarlock']>=1) {
        echo '<h4 class="elvl">9: Kobold Warlock <span class="right">'. $row['KLkoboldwarlock'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Kobold Warlock </span></div>';
    }
    if ($row['KLkoboldchampion']>=1) {
        echo '<h4 class="elvl">10: Kobold Champion <span class="right">'. $row['KLkoboldchampion'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Kobold Champion </span></div>';
    }
    if ($row['KLkoboldmaster']>=1) {
        echo '<h4 class="medpurple elvl">13: Kobold Master <span class="right">'. $row['KLkoboldmaster'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Kobold Master</span></div>';
    }
    if ($row['KLkoboldmonk']>=1) {
        echo '<h4 class="elvl">11: <i class="rare">R</i>Kobold Monk <span class="right">'. $row['KLkoboldmonk'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Kobold Monk </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="green">Forest</h3><h5 class="ddgray">lvl 5-13</h5>';

    if ($row['KLwildboar']>=1) {
        echo '<h4 class="elvl">5: Wild Boar <span class="right">'. $row['KLwildboar'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Wild Boar </span></div>';
    }
    if ($row['KLwolf']>=1) {
        echo '<h4 class="elvl">5: Wolf <span class="right">'. $row['KLwolf'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Wolf </span></div>';
    }
    if ($row['KLcoyote']>=1) {
        echo '<h4 class="elvl">6: Coyote <span class="right">'. $row['KLcoyote'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Coyote </span></div>';
    }
    if ($row['KLbuck']>=1) {
        echo '<h4 class="elvl">6: Buck <span class="right">'. $row['KLbuck'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Buck </span></div>';
    }
    if ($row['KLbear']>=1) {
        echo '<h4 class="elvl">8: Bear <span class="right">'. $row['KLbear'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Bear </span></div>';
    }
    if ($row['KLstag']>=1) {
        echo '<h4 class="elvl">8: Stag <span class="right">'. $row['KLstag'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Stag </span></div>';
    }
    if ($row['KLbigfoot']>=1) {
        echo '<h4 class="elvl lightbrown">13: Bigfoot <span class="right">'. $row['KLbigfoot'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Bigfoot </span></div>';
    }
    if ($row['KLhawk']>=1) {
        echo '<h4 class="elvl">9: <i class="rare">R</i>Hawk <span class="right">'. $row['KLhawk'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Hawk </span></div>';
    }





    echo '</div><div class="gbox">';


    echo '<h3 class="lightred">Sewers</h3><h5 class="ddgray">lvl 1-10</h5>';

    if ($row['KLtarantula']>=1) {
        echo '<h4 class="elvl">7: Tarantula <span class="right">'. $row['KLtarantula'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Tarantula </span></div>';
    }
    if ($row['KLsewerrat']>=1) {
        echo '<h4 class="elvl">7: Sewer Rat <span class="right">'. $row['KLsewerrat'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Sewer Rat </span></div>';
    }
    if ($row['KLredgator']>=1) {
        echo '<h4 class="elvl ">10: Red Gator <span class="right">'. $row['KLredgator'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Red Gator </span></div>';
    }
    if ($row['KLflyingdungbeetle']>=1) {
        echo '<h4 class="elvl">8: <i class="rare">R</i>Flying Dung Beetle <span class="right">'. $row['KLflyingdungbeetle'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Flying Dung Beetle </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="gold">Thieves Den</h3><h5 class="ddgray">lvl 5-14</h5>';
    if ($row['KLthief']>=1) {
        echo '<h4 class="elvl">5: Thief <span class="right">'. $row['KLthief'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Thief </span></div>';
    }
    if ($row['KLthiefpickpocket']>=1) {
        echo '<h4 class="elvl">8: Thief Pickpocket <span class="right">'. $row['KLthiefpickpocket'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Thief Pickpocket </span></div>';
    }
    if ($row['KLthiefbrute']>=1) {
        echo '<h4 class="elvl">11: Thief Brute <span class="right">'. $row['KLthiefbrute'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Thief Brute </span></div>';
    }
    if ($row['KLmasterthief']>=1) {
        echo '<h4 class="gold elvl">14: Master Thief <span class="right">'. $row['KLmasterthief'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Master Thief </span></div>';
    }




    echo '</div><div class="gbox">';
    echo '<h3 class="white">Catacombs</h3><h5 class="ddgray">lvl 7-17</h5>';
    if ($row['KLskeleton']>=1) {
        echo '<h4 class="elvl">7: Skeleton <span class="right">'. $row['KLskeleton'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Skeleton </span></div>';
    }
    if ($row['KLskeletonarcher']>=1) {
        echo '<h4 class="elvl">8: Skeleton Archer <span class="right">'. $row['KLskeletonarcher'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Skeleton Archer </span></div>';
    }
    if ($row['KLskeletonknight']>=1) {
        echo '<h4 class="elvl">10: Skeleton Knight <span class="right">'. $row['KLskeletonknight'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Skeleton Knight</span></div>';
    }
    if ($row['KLskeletonsorcerer']>=1) {
        echo '<h4 class="elvl">11: Skeleton Sorcerer <span class="right">'. $row['KLskeletonsorcerer'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Skeleton Sorcerer </span></div>';
    }
    if ($row['KLancientskeleton']>=1) {
        echo '<h4 class="elvl">13: Ancient Skeleton <span class="right">'. $row['KLancientskeleton'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Ancient Skeleton </span></div>';
    }
    if ($row['KLvictoria']>=1) {
        echo '<h4 class="blue elvl">17: Victoria the Dead <span class="right">'. $row['KLvictoria'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Victoria the Dead </span></div>';
    }
    if ($row['KLomar']>=1) {
        echo '<<h4 class="lightred elvl">17: Omar the Dead <span class="right">'. $row['KLomar'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Omar the Dead </span></div>';
    }







    echo '</div><div class="gbox">';

    echo '<h3 class="green">Abandoned Mine</h3><h5 class="ddgray">lvl 15-23</h5>';
    if ($row['KLrabidskeever']>=1) {
        echo '<h4 class="elvl">15: Rabid Skeever <span class="right">'. $row['KLrabidskeever'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Rabid Skeever</span></div>';
    }
    if ($row['KLbleedingdartwing']>=1) {
        echo '<h4 class="elvl">20: Bleeding Dartwing <span class="right">'. $row['KLbleedingdartwing'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Bleeding Dartwing</span></div>';
    }
    if ($row['KLmongoliandeathworm']>=1) {
        echo '<h4 class="green elvl">23: Mongolian Death Worm <span class="right">'. $row['KLmongoliandeathworm'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mongolian Death Worm</span></div>';
    }




    echo '</div><div class="gbox">';
    echo '<h3 class="lightblue">Stone Grotto</h3><h5 class="ddgray">lvl 20-25</h5>';
    if ($row['KLdemonwing']>=1) {
        echo '<h4 class="elvl">20: Demon Wing <span class="right">'. $row['KLdemonwing'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Demon Wing </span></div>';
    }
    if ($row['KLpossessedaxeman']>=1) {
        echo '<h4 class="lightblue elvl">25: Possessed Axeman <span class="right">'. $row['KLpossessedaxeman'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Possessed Axeman </span></div>';
    }






    echo '</div><div class="gbox">';
    echo '<h3 class="lightred">Red Beard\'s Fort</h3><h5 class="ddgray">lvl 15-30</h5>';
    if ($row['KLredbandit']>=1) {
        echo '<h4 class="elvl">15: Red Bandit <span class="right">'. $row['KLredbandit'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Red Bandit </span></div>';
    }
    if ($row['KLbanditmarauder']>=1) {
        echo '<h4 class="elvl">18: Bandit Marauder <span class="right">'. $row['KLbanditmarauder'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Bandit Marauder </span></div>';
    }
    if ($row['KLbutcher']>=1) {
        echo '<h4 class="elvl">23: Butcher <span class="right">'. $row['KLbutcher'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Butcher </span></div>';
    }
    if ($row['KLredbeard']>=1) {
        echo '<h4 class="lightred elvl">30: Red Beard <span class="right">'. $row['KLredbeard'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Red Beard </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="blue">Blue Ocean</h3><h5 class="ddgray">lvl 10-40</h5>';
    if ($row['KLjellyfish']>=1) {
        echo '<h4 class="elvl">10: Jellyfish <span class="right">'. $row['KLjellyfish'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Jellyfish </span></div>';
    }
    if ($row['KLelectriceel']>=1) {
        echo '<h4 class="elvl">10: Electric Eel <span class="right">'. $row['KLelectriceel'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Electric Eel </span></div>';
    }
    if ($row['KLpiranha']>=1) {
        echo '<h4 class="elvl">11: Piranha <span class="right">'. $row['KLpiranha'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Piranha </span></div>';
    }
    if ($row['KLbarracuda']>=1) {
        echo '<h4 class="elvl">12: Barracuda <span class="right">'. $row['KLbarracuda'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Barracuda </span></div>';
    }
    if ($row['KLsquid']>=1) {
        echo '<h4 class="elvl">13: Squid <span class="right">'. $row['KLsquid'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Squid </span></div>';
    }
    if ($row['KLalbatross']>=1) {
        echo '<h4 class="elvl">13: Albatross <span class="right">'. $row['KLalbatross'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Albatross </span></div>';
    }
    if ($row['KLcrocodile']>=1) {
        echo '<h4 class="green elvl">20: Crocodile <span class="right">'. $row['KLcrocodile'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Crocodile </span></div>';
    }
    if ($row['KLkingsquid']>=1) {
        echo '<h4 class="blue elvl">35: King Squid <span class="right">'. $row['KLkingsquid'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">King Squid </span></div>';
    }
    if ($row['KLmudcrab']>=1) {
        echo '<h4 class="elvl">11: Mud Crab <span class="right">'. $row['KLmudcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mud Crab </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="darkblue">Under the Ocean</h3><h5 class="ddgray">lvl 15-25</h5>';
    if ($row['KLgiantseaturtle']>=1) {
        echo '<h4 class="elvl">15: Giant Sea Turtle <span class="right">'. $row['KLgiantseaturtle'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Giant Sea Turtle </span></div>';
    }
    if ($row['KLcolossalsquid']>=1) {
        echo '<h4 class="elvl">17: Colossal Squid <span class="right">'. $row['KLcolossalsquid'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Colossal Squid </span></div>';
    }
    if ($row['KLhammerhead']>=1) {
        echo '<h4 class="lightblue elvl">20:Hammerhead <span class="right">'. $row['KLhammerhead'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Hammerhead </span></div>';
    }
    if ($row['KLgreatwhite']>=1) {
        echo '<h4 class="lightblue elvl">20:Great White <span class="right">'. $row['KLgreatwhite'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Great White </span></div>';
    }
    if ($row['KLkraken']>=1) {
        echo '<h4 class="green elvl">25: Kraken <span class="right">'. $row['KLkraken'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Kraken </span></div>';
    }
    if ($row['KLglowingoctopus']>=1) {
        echo '<h4 class="elvl">20: <i class="rare">R</i>Glowing Octopus <span class="right">'. $row['KLglowingoctopus'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><h4 class="rare">R</i>Glowing Octopus </span></div>';
    }




    echo '</div><div class="gbox">';
    echo '<h3 class="lightblue">Water Temples</h3><h5 class="ddgray">lvl 35-50</h5>';
    if ($row['KLthunderbarbarian']>=1) {
        echo '<h4 class="lightred elvl">35: Thunder Barbarian <span class="right">'. $row['KLthunderbarbarian'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Thunder Barbarian</span></div>';
    }
    if ($row['KLsmoothranger']>=1) {
        echo '<h4 class="green elvl">35: Smooth Ranger <span class="right">'. $row['KLsmoothranger'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Smooth Ranger</span></div>';
    }
    if ($row['KLcoralwizard']>=1) {
        echo '<h4 class="blue elvl">35</i> Coral Wizard <span class="right">'. $row['KLcoralwizard'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Coral Wizard</span></div>';
    }
    if ($row['KLheavywalrus']>=1) {
        echo '<h4 class="gold elvl">35: Heavy Walrus <span class="right">'. $row['KLheavywalrus'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Heavy Walrus</span></div>';
    }
    if ($row['KLwatertempleguardian']>=1) {
        echo '<h4 class="lightblue elvl">50: Water Temple Guardian <span class="right">'. $row['KLwatertempleguardian'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Water Temple Guardian </span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="lightbrown">Iron Mine</h3><h5 class="ddgray">lvl 15-30</h5>';
    if ($row['KLironrat']>=1) {
        echo '<h4 class="elvl">15: Iron Rat <span class="right">'. $row['KLironrat'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Iron Rat</span></div>';
    }
    if ($row['KLironcrab']>=1) {
        echo '<h4 class="elvl">15: Iron Crab <span class="right">'. $row['KLironcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Iron Crab</span></div>';
    }
    if ($row['KLironscorpion']>=1) {
        echo '<h4 class="elvl">20: Iron Scorpion <span class="right">'. $row['KLironscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Iron Scorpion</span></div>';
    }
    if ($row['KLwarturtle']>=1) {
        echo '<h4 class="green elvl">25: War Turtle <span class="right">'. $row['KLwarturtle'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">War Turtle</span></div>';
    }

    if ($row['KLslagbeast']>=1) {
        echo '<h4 class="elvl">25: Slag Beast <span class="right">'. $row['KLslagbeast'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Slag Beast</span></div>';
    }
    if ($row['KLirongator']>=1) {
        echo '<h4 class="elvl">25: Iron Gator <span class="right">'. $row['KLirongator'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Iron Gator</span></div>';
    }
    if ($row['KLirongolem']>=1) {
        echo '<h4 class="elvl">25: Iron Golem <span class="right">'. $row['KLirongolem'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Iron Golem</span></div>';
    }
    if ($row['KLphoenix']>=1) {
        echo '<h4 class="lightred elvl">30: Phoenix <span class="right">'. $row['KLphoenix'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Phoenix</span></div>';
    }

    if ($row['KLironcobra']>=1) {
        echo '<h4 class="elvl">30: <i class="rare">R</i>Iron Cobra <span class="right">'. $row['KLironcobra'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Iron Cobra</span></div>';
    }
    if ($row['KLearthgolem']>=1) {
        echo '<h4 class="elvl">30: <i class="rare">R</i>Earth Golem <span class="right">'. $row['KLearthgolem'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Earth Golem</span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="gray">Steel Mine</h3><h5 class="ddgray">lvl 20-40</h5>';
    if ($row['KLsteelrat']>=1) {
        echo '<h4 class="elvl">20: Steel Rat <span class="right">'. $row['KLsteelrat'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Steel Rat</span></div>';
    }
    if ($row['KLsteelcrab']>=1) {
        echo '<h4 class="elvl">20: Steel Crab <span class="right">'. $row['KLsteelcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Steel Crab</span></div>';
    }
    if ($row['KLsteelscorpion']>=1) {
        echo '<h4 class="elvl">25: Steel Scorpion <span class="right">'. $row['KLsteelscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Steel Scorpion</span></div>';
    }
    if ($row['KLulfberht']>=1) {
        echo '<h4 class="blue elvl">35: Ulfberht <span class="right">'. $row['KLulfberht'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Ulfberht</span></div>';
    }

    if ($row['KLblackfrog']>=1) {
        echo '<h4 class="elvl">30: Black Frog <span class="right">'. $row['KLblackfrog'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Black Frog</span></div>';
    }
    if ($row['KLsteelgator']>=1) {
        echo '<h4 class="elvl">35: Steel Gator <span class="right">'. $row['KLsteelgator'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Steel Gator</span></div>';
    }
    if ($row['KLsteelgolem']>=1) {
        echo '<h4 class="elvl">35: Steel Golem <span class="right">'. $row['KLsteelgolem'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Steel Golem</span></div>';
    }
    if ($row['KLcyclops']>=1) {
        echo '<h4 class="lightblue elvl">40: Cyclops <span class="right">'. $row['KLcyclops'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Cyclops</span></div>';
    }

    if ($row['KLstoneassassin']>=1) {
        echo '<h4 class="elvl">40: <i class="rare">R</i>Stone Assassin <span class="right">'. $row['KLstoneassassin'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Stone Assassin</span></div>';
    }
    if ($row['KLgammamonk']>=1) {
        echo '<h4 class="elvl">40: <i class="rare">R</i>Gamma Monk <span class="right">'. $row['KLgammamonk'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Gamma Monk</span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="blue">Mithril Mine</h3><h5 class="ddgray">lvl 30-60</h5>';
    if ($row['KLmithrilrat']>=1) {
        echo '<h4 class="elvl">30: Mithril Rat <span class="right">'. $row['KLmithrilrat'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mithril Rat</span></div>';
    }
    if ($row['KLmithrilcrab']>=1) {
        echo '<h4 class="elvl">30: Mithril Crab <span class="right">'. $row['KLmithrilcrab'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mithril Crab</span></div>';
    }
    if ($row['KLmithrilscorpion']>=1) {
        echo '<h4 class="elvl">40: Mithril Scorpion <span class="right">'. $row['KLmithrilscorpion'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mithril Scorpion</span></div>';
    }
    if ($row['KLgriffin']>=1) {
        echo '<h4 class="blue elvl">50: Griffin <span class="right">'. $row['KLgriffin'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Griffin</span></div>';
    }

    if ($row['KLbluefrog']>=1) {
        echo '<h4 class="elvl">45: Blue Frog <span class="right">'. $row['KLbluefrog'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Blue Frog</span></div>';
    }
    if ($row['KLmithrilgator']>=1) {
        echo '<h4 class="elvl">45: Mithril Gator <span class="right">'. $row['KLmithrilgator'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mithril Gator</span></div>';
    }
    if ($row['KLmithrilgolem']>=1) {
        echo '<h4 class="elvl">45: Mithril Golem <span class="right">'. $row['KLmithrilgolem'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mithril Golem</span></div>';
    }
    if ($row['KLminotaur']>=1) {
        echo '<h4 class="lightred elvl">60: Minotaur <span class="right">'. $row['KLminotaur'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Minotaur</span></div>';
    }

    if ($row['KLcosmicmage']>=1) {
        echo '<h4 class="elvl">60: <i class="rare">R</i>Cosmic Mage <span class="right">'. $row['KLcosmicmage'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Cosmic Mage</span></div>';
    }
    if ($row['KLcarbonbeast']>=1) {
        echo '<h4 class="elvl">60: <i class="rare">R</i>Carbon Beast <span class="right">'. $row['KLcarbonbeast'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Carbon Beast</span></div>';
    }






    echo '</div><div class="gbox">';
    echo '<h3 class="dddgray">Sentinals</h3><h5 class="ddgray">lvl 20-100</h5>';

    if ($row['KLstonesentinel']>=1) {
        echo '<h4 class="elvl">20: Stone Sentinal <span class="right">'. $row['KLstonesentinel'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Stone Sentinal</span></div>';
    }

    if ($row['KLironsentinel']>=1) {
        echo '<h4 class="elvl">40: Iron Sentinal <span class="right">'. $row['KLironsentinel'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Iron Sentinal</span></div>';
    }

    if ($row['KLsteelsentinel']>=1) {
        echo '<h4 class="elvl">60: Steel Sentinal <span class="right">'. $row['KLsteelsentinel'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Steel Sentinal</span></div>';
    }

    if ($row['KLmithrilsentinel']>=1) {
        echo '<h4 class="elvl">80: Mithril Sentinal <span class="right">'. $row['KLmithrilsentinel'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mithril Sentinal</span></div>';
    }

    if ($row['KLsentineltitan']>=1) {
        echo '<h4 class="elvl">100: Sentinal Titan <span class="right">'. $row['KLsentineltitan'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Sentinal Titan</span></div>';
    }







    echo '</div><div class="gbox">';
    echo '<h3 class="gray">Mountain Path</h3><h5 class="ddgray">lvl 20-45</h5>';
    if ($row['KLbowman']>=1) {
        echo '<h4 class="elvl">23: Bowman <span class="right">'. $row['KLbowman'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Bowman</span></div>';
    }
    if ($row['KLhighwayman']>=1) {
        echo '<h4 class="elvl">25: Highwayman <span class="right">'. $row['KLhighwayman'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Highwayman</span></div>';
    }





    echo '</div><div class="gbox">';
    echo '<h3 class="darkgreen">Dark Forest</h3><h5 class="ddgray">lvl 20-45</h5>';
    if ($row['KLtroll']>=1) {
        echo '<h4 class="elvl">13: Troll <span class="right">'. $row['KLtroll'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Troll</span></div>';
    }
    if ($row['KLtrollshaman']>=1) {
        echo '<h4 class="elvl">20: Troll Shaman <span class="right">'. $row['KLtrollshaman'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Troll Shaman</span></div>';
    }
    if ($row['KLtrollsorcerer']>=1) {
        echo '<h4 class="elvl">25: Troll Sorcerer <span class="right">'. $row['KLtrollsorcerer'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Troll Sorcerer</span></div>';
    }
    if ($row['KLtrollelder']>=1) {
        echo '<h4 class="elvl">30: Troll Elder <span class="right">'. $row['KLtrollelder'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Troll Elder</span></div>';
    }
    if ($row['KLtrollchampion']>=1) {
        echo '<h4 class="elvl">35: Troll Champion <span class="right">'. $row['KLtrollchampion'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Troll Champion</span></div>';
    }

    if ($row['KLtrollqueen']>=1) {
        echo '<h4 class="blue elvl">40: Troll Queen <span class="right">'. $row['KLtrollqueen'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Troll Queen </span></div>';
    }
    if ($row['KLtrollking']>=1) {
        echo '<h4 class="green elvl">45: Troll King <span class="right">'. $row['KLtrollking'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Troll King </span></div>';
    }

    if ($row['KLfalcon']>=1) {
        echo '<h4 class="elvl">25: <i class="rare">R</i>Falcon <span class="right">'. $row['KLfalcon'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Falcon </span></div>';
    }

    if ($row['KLent']>=1) {
        echo '<h4 class="elvl">25: <i class="rare">R</i>Ent <span class="right">'. $row['KLent'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Ent </span></div>';
    }

    if ($row['KLdarkranger']>=1) {
        echo '<h4 class="elvl">25: <i class="rare">R</i>Dark Ranger <span class="right">'. $row['KLdarkranger'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Dark Ranger </span></div>';
    }

    if ($row['KLwisp']>=1) {
        echo '<h4 class="elvl">40: <i class="rare">R</i>Wisp <span class="right">'. $row['KLwisp'].'</span></h4>	';
    } else {
        echo '<div><span class="alt"><i class="rare">R</i>Wisp </span></div>';
    }








    echo '</div><div class="gbox">';
    echo '<h3 class="yellow">Demigods</h3><h5 class="ddgray">lvl 70</h5>';
    if ($row['KLdemigodofstrength']>=1) {
        echo '<h4 class="lightred elvl">70: Demigod of Strength <span class="right">'. $row['KLdemigodofstrength'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Demigod of Strength</span></div>';
    }
    if ($row['KLdemigodofdefense']>=1) {
        echo '<h4 class="gold elvl">70: Demigod of Defense <span class="right">'. $row['KLdemigodofdefense'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Demigod of Defense</span></div>';
    }
    if ($row['KLforestprincess']>=1) {
        echo '<h4 class="green elvl">80: Forest Princess <span class="right">'. $row['KLforestprincess'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Forest Princess</span></div>';
    }






    echo '</div><div class="gbox">';
    echo '<h3 class="dddgray">Dark Keep</h3><h5 class="ddgray">lvl 30-60</h5>';
    if ($row['KLlurker']>=1) {
        echo '<h4 class="elvl">30: Lurker <span class="right">'. $row['KLlurker'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Lurker</span></div>';
    }
    if ($row['KLwingeddemon']>=1) {
        echo '<h4 class="elvl">35: Winged Demon <span class="right">'. $row['KLwingeddemon'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Winged Demon</span></div>';
    }
    if ($row['KLundeadorc']>=1) {
        echo '<h4 class="elvl">45: Undead Orc <span class="right">'. $row['KLundeadorc'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Undead Orc</span></div>';
    }
    if ($row['KLstonesphinx']>=1) {
        echo '<h4 class="gold elvl">60: Stone Sphinx <span class="right">'. $row['KLstonesphinx'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Stone Sphinx</span></div>';
    }
    if ($row['KLwarpedpriest']>=1) {
        echo '<h4 class="elvl">55:<i class="rare">R</i> Warped Priest <span class="right">'. $row['KLwarpedpriest'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Warped Priest</span></div>';
    }
    if ($row['KLdarkpaladin']>=1) {
        echo '<h4 class="elvl">55: Dark Paladin <span class="right">'. $row['KLdarkpaladin'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Dark Paladin</span></div>';
    }
    if ($row['KLdarkprince']>=1) {
        echo '<h4 class="lightpurple elvl">60: Dark Prince <span class="right">'. $row['KLdarkprince'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Dark Prince</span></div>';
    }






    echo '</div><div class="gbox">';
    echo '
		   <h3 class="gray">Mountains</h3><h5 class="ddgray">lvl 30-60</h5>';
    if ($row['KLfriendlygiant']>=1) {
        echo '<h4 class="elvl">30: Friendly Giant <span class="right">'. $row['KLfriendlygiant'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Friendly Giant</span></div>';
    }
    if ($row['KLmountaingiant']>=1) {
        echo '<h4 class="elvl">30: Mountain Giant <span class="right">'. $row['KLmountaingiant'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Mountain Giant</span></div>';
    }
    if ($row['KLicetroll']>=1) {
        echo '<h4 class="elvl">30: Ice Troll <span class="right">'. $row['KLicetroll'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Ice Troll</span></div>';
    }

    if ($row['KLgiantbrute']>=1) {
        echo '<h4 class="elvl">35: Giant Brute <span class="right">'. $row['KLgiantbrute'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Giant Brute</span></div>';
    }

    if ($row['KLwyvern']>=1) {
        echo '<h4 class="elvl">35: Wyvern <span class="right">'. $row['KLwyvern'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Wyvern</span></div>';
    }

    if ($row['KLstonedwarf']>=1) {
        echo '<h4 class="elvl">40: Stone Dwarf <span class="right">'. $row['KLstonedwarf'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Stone Dwarf</span></div>';
    }

    if ($row['KLgiantmountaingiant']>=1) {
        echo '<h4 class="gold elvl">50: Giant Mountain Giant <span class="right">'. $row['KLgiantmountaingiant'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Giant Mountain Giant</span></div>';
    }

    if ($row['KLgatekeeper']>=1) {
        echo '<h4 class="black elvl">55: Gatekeeper <span class="right">'. $row['KLgatekeeper'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Gatekeeper</span></div>';
    }

    if ($row['KLyeti']>=1) {
        echo '<h4 class="elvl">45:<i class="rare">R</i> Yeti <span class="right">'. $row['KLyeti'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Yeti</span></div>';
    }

    if ($row['KLsnowogre']>=1) {
        echo '<h4 class="elvl">50:<i class="rare">R</i>Snow Ogre<span class="right">'. $row['KLsnowogre'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Snow Ogre</span></div>';
    }

    if ($row['KLsnowninja']>=1) {
        echo '<h4 class="elvl">50:<i class="rare">R</i> Snow Ninja <span class="right">'. $row['KLsnowninja'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Snow Ninja</span></div>';
    }

    if ($row['KLsnowowl']>=1) {
        echo '<h4 class="elvl">50:<i class="rare">R</i> Snow Owl <span class="right">'. $row['KLsnowowl'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Snow Owl</span></div>';
    }

    if ($row['KLgmg2']>=1) {
        echo '<h4 class="elvl">70:<i class="rare">R</i> GMG2 <span class="right">'. $row['KLgmg2'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">GMG2</span></div>';
    }

    if ($row['KLgk2']>=1) {
        echo '<h4 class="elvl">70:<i class="rare">R</i> GK2 <span class="right">'. $row['KLgk2'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">GK2</span></div>';
    }

    if ($row['KLkingblade']>=1) {
        echo '<h4 class="purple elvl">90:<i class="rare">R</i> King Blade <span class="right">'. $row['KLkingblade'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">King Blade</span></div>';
    }

    if ($row['KLdragon']>=1) {
        echo '<h4 class="red elvl">60:<i class="rare">R</i> Dragon <span class="right">'. $row['KLdragon'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Dragon</span></div>';
    }







    echo '</div><div class="gbox">';
    echo '<h3 class="lightpurple">Cathedral</h3><h5 class="ddgray">lvl 40-60</h5>';
    if ($row['KLgreygargoyle']>=1) {
        echo '<h4 class="elvl">40: Grey Gargoyle <span class="right">'. $row['KLgreygargoyle'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Grey Gargoyle</span></div>';
    }
    if ($row['KLwhitegargoyle']>=1) {
        echo '<h4 class="elvl">45: White Gargoyle <span class="right">'. $row['KLwhitegargoyle'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">White Gargoyle</span></div>';
    }
    if ($row['KLvampire']>=1) {
        echo '<h4 class="elvl">45: Vampire <span class="right">'. $row['KLvampire'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Vampire</span></div>';
    }

    if ($row['KLfallenpriest']>=1) {
        echo '<h4 class="elvl">50: Fallen Priest <span class="right">'. $row['KLfallenpriest'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Fallen Priest</span></div>';
    }
    if ($row['KLfallenangel']>=1) {
        echo '<h4 class="lightpurple elvl">60: Fallen Angel <span class="right">'. $row['KLfallenangel'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Fallen Angel</span></div>';
    }
    if ($row['KLrisenskeleton']>=1) {
        echo '<h4 class="elvl">30: Risen Skeleton <span class="right">'. $row['KLrisenskeleton'].'</span></h4>	';
    } else {
        echo '<div><span class="alt">Risen Skeleton</span></div>';
    }









    echo '</div><div class="gbox">';
    echo '<h3 class="lightblue">Silver Temple</h3><h5 class="ddgray">lvl 80-1000</h5>';
    //if ($row['KLsilverwarrior']>=1){echo '<div class="lightblue"><i class="elvl">80: Silver Warrior <span class="right">'. $row['KLsilverwarrior'].'</span></h4>	';}
    //else{ echo '<div><span class="alt">Silver Warrior</span></div>'; }

    echo '<div><span class="alt">Silver Warrior</span></div>';






    echo '</div>';
}
