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
    $level = $row['level'];
    $nxlevel = $level + 1;
    $xp = $row['xp'];

    $nextlevel = ($level+1) * ($level+1) * ($level+1);
    //$nextlevel = ($level+1) * ($level+1) * ($level+1) * ($level+1);
    $prevlevel = $level * $level * $level;
    //$prevlevel = $level * $level * $level * $level;
    $num_total = $nextlevel - $prevlevel;
    $num_xp = $xp - $prevlevel;
    $need = $nextlevel - $xp;

    $count1 = $num_xp / $num_total;
    $count2 = $count1 * 100;
    $count = number_format($count2, 0);


    $enemy=$row['enemy']; // if enemy hasent been established yet



    if ($input == "test") {
        echo "This is for test styling...<br/>";
        $message = '	<div class="levelWin">
    <h3>LEVEL UP!</h3>
    <h3 class="ddgray">You are now level '.$level.'</h3>
    <h3>+'.$hp.' HP
    +'.$mp.' MP<br/>
    +'.$bp.' BP
    +'.$sp.' SP
    </h3></div>';
        include('update_feed.php'); // --- update feed
        $funflag=1;
    }

    if ($input == "test2") {
        echo "This is for test styling evolve box...<br/>";
        $message = '
				<div class="evolveBox"><br>
				<span class="px80 cyan">YOU EVOLVE!!!</span><br>
				<span class="px40">You are now evolve level '.$level.'</span>
				+'.$hp.' HP<br/>
				+'.$mp.' MP<br/>
				+'.$bp.' BP<br/>
				+'.$sp.' SP</div>';
        include('update_feed.php'); // --- update feed
        $funflag=1;
    }

    // --------------------------------------------------------------------------- STATS!
    if ($input=='stats' || $input=='xp') {
        $message = $username.'<span class="alt"> Stats</span>
				Level '.$level.'<br />
				You are '.$count.'% to the next level<br />
				You have '.$xp.' xp.<br />
				Next level at '.$nextlevel.' xp<br />
				You need '.$need.' xp to get to level '.$nxlevel.'<br />';
        echo 'You check your stats<br/>';
        include('update_feed.php'); // --- update feed
        $funflag=1;
    }




    // --------------------------------------------------------------------------- LEVEL!
    if ($xp >= $nextlevel) {
        $query = $link->query("UPDATE $user SET level = level + 1 ");
        // -------------------------DB QUERY!
        $sql = "SELECT * FROM $username";
        if (!$result = $link->query($sql)) {
            die('There was an error running the query [' . $link->error . ']');
        }
        // -------------------------DB OUTPUT!
        while ($row = $result->fetch_assoc()) {
            $level = $row['level'];
            $xp = $row['xp'];
            $hp = $row['hpmax'];
            $mp = $row['mpmax'];
            $bp = $row['bp'];
            $sp = $row['sp'];
            $physicaltraining = $row['physicaltraining'];
            $mentaltraining = $row['mentaltraining'];

            $rand = rand(0, $physicaltraining);
            $rand2 = rand(0, $physicaltraining);
            $hp = $physicaltraining + $rand + $rand2;
            $rand = rand(0, $mentaltraining);
            $rand2 = rand(0, $physicaltraining);
            $mp = $mentaltraining + $rand + $rand2;
            $bp =  1;

            // -------------------- SUPER GENEROUS SP
            //$rand = rand(10,20);
            //$sp =  $level + $rand;
            //if ($sp < 15) {$sp = rand (15,20);} // for low level SP, min 15

            // -------------------- BASE / REGULAR SP

            $sp = 25; // 25 base SP each level - BASE 25 SP

            // -------------------- LOW SP
            // $sp = 10; // 25 base SP each level - BASE 25 SP

            $nextlevel = ($level+1) * ($level+1) * ($level+1);
            $prevlevel = $level * $level * $level;
            $num_total = $nextlevel - $prevlevel;
            $num_xp = $xp - $prevlevel;
            $count1 = $num_xp / $num_total;
            $count2 = $count1 * 100;
            $count = number_format($count2, 0);


            $message = '	<div class="levelWin">
            <h3>LEVEL UP!</h3>
            <h3 class="ddgray">You are now level '.$level.'</h3>
            <h3>+'.$hp.' HP
            +'.$mp.' MP<br/>
            +'.$bp.' BP
            +'.$sp.' SP
            </h3></div>';
            echo 'YOU ARE NOW LEVEL '.$level.'<br/>';

            echo "<div class='menuAction'><i class='fa fa-arrow-up green'> LEVEL UP!</i> <span class='px40 goldbox greenBG'>$level</span></div>";

            include('update_feed.php'); // --- update feed

            $query = $link->query("UPDATE $user SET hpmax = hpmax + $hp ");
            $query = $link->query("UPDATE $user SET mpmax = mpmax + $mp ");
            $query = $link->query("UPDATE $user SET bp = bp + $bp ");
            $query = $link->query("UPDATE $user SET sp = sp + $sp ");

            $query = $link->query("UPDATE $user SET hp = hpmax");
            $query = $link->query("UPDATE $user SET mp = mpmax");



            $_SESSION['evolveAlready'] = 0; // so you can evolve again


            $message = '<div class="battlestatus">You have defeated the '.$enemy.'!<br/> YOU ARE NOW LEVEL '.$level.'!</div>';
        }
    }




    // --------------------------------------------------------------------------- SPEND BP FOR STATS!
    $bp = $row['bp'];

    $str = $row['str'];
    $strincrease = $str + 1;
    $dex = $row['dex'];
    $dexincrease = $dex + 1;
    $mag = $row['mag'];
    $magincrease = $mag + 1;
    $def = $row['def'];
    $defincrease = $def + 1;


    //  $strincrease10 = $str + 10;
    //  $dexincrease10 = $dex + 10;
    //  $magincrease10 = $mag + 10;
    //  $defincrease10 = $def + 10;

    $strincreasemax = $str + $bp;
    $dexincreasemax = $dex + $bp;
    $magincreasemax = $mag + $bp;
    $defincreasemax = $def + $bp;

    // --------------------------------------------------------------------------- SPEND BP FOR STATS!
    if ($input=='increase str' || $input=='+1 str') {
        if ($bp<1) {
            echo $message=$notenoughbp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend 1 BP and increase your STR to '.$strincrease.'</br>';
            $query = $link->query("UPDATE $user SET str = str + 1");
            $query = $link->query("UPDATE $user SET bp = bp - 1");
            include('update_feed.php');
            $funflag=1;
        }
    }
    if ($input=='all str') {
        if ($bp<1) {
            echo $message=$notenoughbp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend '.$bp.' BP and increase your STR to '.$strincreasemax.'</br>';
            $query = $link->query("UPDATE $user SET str = str + $bp");
            $query = $link->query("UPDATE $user SET bp = bp - $bp");
            include('update_feed.php');
            $funflag=1;
        }
    } elseif ($input=='increase dex' || $input=='+1 dex') {
        if ($bp<1) {
            echo $message=$notenoughbp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend 1 BP and increase your DEX to '.$dexincrease.'</br>';
            $query = $link->query("UPDATE $user SET dex = dex + 1");
            $query = $link->query("UPDATE $user SET bp = bp - 1");
            include('update_feed.php');
            $funflag=1;
        }
    }

    if ($input=='all dex') {
        if ($bp<1) {
            echo $message=$notenoughbp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend '.$bp.' BP and increase your dex to '.$dexincreasemax.'</br>';
            $query = $link->query("UPDATE $user SET dex = dex + $bp");
            $query = $link->query("UPDATE $user SET bp = bp - $bp");
            include('update_feed.php');
            $funflag=1;
        }
    } elseif ($input=='increase mag' || $input=='+1 mag') {
        if ($bp<1) {
            echo $message=$notenoughbp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend 1 BP and increase your MAG to '.$magincrease.'</br>';
            $query = $link->query("UPDATE $user SET mag = mag + 1");
            $query = $link->query("UPDATE $user SET bp = bp - 1");
            include('update_feed.php');
            $funflag=1;
        }
    }

    if ($input=='all mag') {
        if ($bp<1) {
            echo $message=$notenoughbp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend '.$bp.' BP and increase your mag to '.$magincreasemax.'</br>';
            $query = $link->query("UPDATE $user SET mag = mag + $bp");
            $query = $link->query("UPDATE $user SET bp = bp - $bp");
            include('update_feed.php');
            $funflag=1;
        }
    } elseif ($input=='increase def' || $input=='+1 def') {
        if ($bp<1) {
            echo $message=$notenoughbp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend 1 BP and increase your DEF to '.$defincrease.'</br>';
            $query = $link->query("UPDATE $user SET def = def + 1");
            $query = $link->query("UPDATE $user SET bp = bp - 1");
            include('update_feed.php');
            $funflag=1;
        }
    }

    if ($input=='all def') {
        if ($bp<1) {
            echo $message=$notenoughbp;
            include('update_feed.php');
            $funflag=1;
        } else {
            echo $message = 'You spend '.$bp.' BP and increase your def to '.$defincreasemax.'</br>';
            $query = $link->query("UPDATE $user SET def = def + $bp");
            $query = $link->query("UPDATE $user SET bp = bp - $bp");
            include('update_feed.php');
            $funflag=1;
        }
    }
}
