<!--<link type="text/css" rel="stylesheet" href="style-login.css" />-->
<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

// -------------------------DB CONNECT!
include('db-connect.php');

$username = $_SESSION['username'];
$pass = $_SESSION['pass'];


//---------------------------------------------------------  GLOBAL VARIABLE SETT!!!
$user = $username = $_SESSION['username'];
$pass = 			$_SESSION['pass']	;
$command = 		$_SESSION['command']		="<span class='green command'>  member loaded  </span>";
$notcommand =  $_SESSION['notcommand']	='Command not recognized - ';
$currency = 	$_SESSION['currency']	='coin';
$quest = 		$_SESSION['quest']		='Quest';
$_SESSION['desc000'] = '';
$toopoor = 	$_SESSION['toopoor'] = 'You\'re too poor.';
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level

$_SESSION['roomID'] = 0;
$_SESSION['lastroom'] = 0;
$_SESSION['retreatroom'] = 0;
$_SESSION['selectmap'] = 0;
$_SESSION['eLvl'] = 0;

// -- ENEMY TYPES
//		$_SESSION['eFly'] = 0;			// enemy flies
//		$_SESSION['ePow'] = 0;			// enemy power x3 att
//		$_SESSION['eDex'] = 0;			// enemy dex att
//		$_SESSION['eMag'] = 0;			// enemy mag att
//		$_SESSION['eHeal'] = 0;		// enemy heals self
//		$_SESSION['ePoison'] = 0;		// enemy poisons you [ 1 - lvl/2 ]
//		$_SESSION['eMulti'] = 0;		// enemy 25% attack again

//		$_SESSION['eStrImm'] = 0;		// enemy str immune
//		$_SESSION['eDexImm'] = 0;		// enemy dex immune
//		$_SESSION['eMagImm'] = 0;		// enemy mag immune
//		$_SESSION['eDodge'] = 0;		// enemy dodges 50%
//		$_SESSION['eSteal'] = 0;		// enemy steals 20% [ 1 - lvl*3 ] coin
//		$_SESSION['ePureD'] = 0;		// enemy attacks pure, you have no def


// -- evolve flag
$_SESSION['evolveAlready'] = 0;

// -- TOGGLE FLAGS
$_SESSION['hints'] = 2;
$_SESSION['emptytree'] = 0;

// -- Weapon FLAGS
$_SESSION['bow_equipped'] = 0;
$_SESSION['crossbowbow_equipped'] = 0;
$_SESSION['multi_hit'] = 0;


// -- CURRENT STAT BUFFS
$_SESSION['healthregen'] = 0;
$_SESSION['manaregen'] = 0;

$_SESSION['flying'] = 0;
$_SESSION['breathingwater'] = 0;

$_SESSION['magiccast'] = 0;
$_SESSION['magicarmor_amount'] = 0;
$_SESSION['ironskin_amount'] = 0;
$_SESSION['ironskin_clicks'] = 0;
$_SESSION['magicarmor'] = 0;
$_SESSION['regenerate_clicks'] =0;

$_SESSION['coffee'] = 0;
$_SESSION['tea'] = 0;

$_SESSION['reds'] = 0;
$_SESSION['greens'] = 0;
$_SESSION['blues'] = 0;
$_SESSION['yellows'] = 0;
$_SESSION['golds'] = 0;
$_SESSION['purples'] = 0;


$_SESSION['poison'] = 0;
$_SESSION['poisonyou'] = 0;
$_SESSION['bleeding'] = 0;


// -- ROOM FLAGS
$_SESSION['graychest'] = 0;
$_SESSION['graychestcheck'] = 0;

$_SESSION['silverchest'] = 0;
$_SESSION['silverchestcheck'] = 0;

$_SESSION['scorpionswitch'] = 0;
$_SESSION['scorpiontreasure'] = 0;
//$_SESSION['scorpiontreasurecheck'] = 0;

$_SESSION['goblinsearch'] = 0;

$_SESSION['cowtoll'] = 0;

$_SESSION['ogresearch'] = 0;
$_SESSION['ogretreasure'] = 0;
//$_SESSION['ogretreasurecheck'] = 0;

$_SESSION['koboldswitch'] = 0;
$_SESSION['koboldtreasure'] = 0;
$_SESSION['forestsearch'] = 0;
$_SESSION['grottoswitch'] = 0;
$_SESSION['shadysearch'] = 0;
$_SESSION['underwaterswitch'] = 0;
$_SESSION['darkforestsearch'] = 0;


$_SESSION['thievesdensearch'] = 0;
$_SESSION['catacombssearch'] = 0;
$_SESSION['graychest'] = 0;
$_SESSION['catacombssearch'] = 0;
$_SESSION['catacombssilvervaultsearch'] = 0;

$_SESSION['darkforestsilverswitch'] = 0;
$_SESSION['darkkeepswitchA'] = 0;
$_SESSION['darkkeepswitchB'] = 0;
$_SESSION['enterdespair'] = 0;


// -- RANDOM EVENT FLAGS
$_SESSION['claypot'] = -1;
$_SESSION['woodenchest'] = -1;
$_SESSION['silverchest'] = -1;
$_SESSION['graycontainer'] = -1;
$_SESSION['dronescout'] = -1;


/*
$_SESSION['scorpionkingsilverchest'] = -1;
$_SESSION['ogresilverchest'] = -1;
$_SESSION['koboldsilverchest'] = -1;
$_SESSION['thievesdensilverchest'] = -1;
$_SESSION['catacombssilverchest'] = -1;
$_SESSION['dwarfsilverchest'] = -1;
$_SESSION['underwatersilverchest'] = -1;
$_SESSION['forestsilverchest'] = -1;
$_SESSION['darkforestsilverchest'] = -1;
$_SESSION['cathedralsilverchest'] = -1;
$_SESSION['silverchest'] = -1;
*/

//$toopoor = 	$_SESSION['toopoor'] = 'You\'re too poor.';
//$notenoughbp = 	$_SESSION['notenoughbp'] = 'You don\'t have enough BP (build points).';
//$notenoughsp = 	$_SESSION['notenoughsp'] = 'You don\'t have enough SP (skill points).';

//checks cookies to make sure they are logged in
if ($_SESSION['username'] == $username) {
    // -------------------------DB QUERY!
    $sql = "SELECT * FROM $username";
    if (!$result = $link->query($sql)) {
        die('There was an error running the query [' . $link->error . ']');
    }
    // -------------------------DB OUTPUT!
while ($row = $result->fetch_assoc()) { 	//if the cookie has the wrong password, they are taken to the login page
        if ($pass != $row['password']) {
            //header("Location: login.php");
        }
    //otherwise they are shown the admin area
    else {
        // Connects to your Database
        //$con = mysqli_connect("localhost","cmtconst_admin","1015alclg") or die(mysqli_error());
        //mysqli_select_db("cmtconst_lg") or die(mysqli_error());

        // Player Stat Display
        // -------------------------DB QUERY!
        $sql = "SELECT * FROM $username";
        if (!$result = $link->query($sql)) {
            die('There was an error running the query [' . $link->error . ']');
        }
        // -------------------------DB OUTPUT!
        while ($row = $result->fetch_assoc()) {
            $username = $_SESSION['username'];



            // include ('room-desc.php');


            echo '<h5>You are logged in as <strong class="px20 blue">'.$username.'</strong></h5>';
            die('<a class="btn gamestart" href="index.php">Click here to start the game</a>');
        }
    }
}
} else {
    //if the cookie does not exist, they are taken to the login screen
// echo '<br>bottom of members --- Login screen <br>';
// header("Location: login.php");
}

?>
