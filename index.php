<?php session_start();?>
<?php include('head.php');?>
<title>Light Gray RPG</title>

<body>
  <?php //include '../inc/day-btn.php'; ?>

<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

// -------------------------DB CONNECT!
require_once('db-connect.php');

/*	<h1 class="hide">Light Gray RPG</h1>
  <h5>THE DEMO v0.5c</h5>
  <p class="gray">Last updated: 5/25/2020</p>
  */
if (!isset($_SESSION['username'])) {			// IF NO ONE IS LOGGED IN SHOW TITLE SCREEN
    echo '<div id="container">';
    echo '<div id="title">';

  //  echo '<span class="icon darkergray lg-logo">'.file_get_contents("img/svg/lg-logo.svg").'</span>';
  echo '<h1 class="gray">Light Gray <span class="hide">RPG</span></h1>';
  echo '<h2 class="blue">RPG</h2>';
    //echo '<h5 class="padd-top dgray">GAME ONE</h5>
    //<h1 class="purple">VEGAXXX</h1>';
    echo '<br/>';

echo '<p class="">DEMO v0.1 | Last updated: 4/5/2020 <a class="black hide" href="#">| View Changelog</a>
</p>';
echo '<br/>';
//    <a class="btn redBG" href="#info">LG Info</a>

    echo '<p>
    <a class="btn greenBG" href="#login">Login</a>
    <a class="btn blueBG" href="/register.php">New Character</a>
    </p>';
    echo '<span class="icon gold chest">'.file_get_contents("img/svg/chest.svg").'</span>';
    //echo '<span class="icon red chest">'.file_get_contents("img/svg/group1.svg").'</span>';

    include('login.php');
    echo '<h3>New to Light Gray?</h3>';
    echo '<form><a href="register.php" class="login btn blueBG create-new">CREATE NEW CHARACTER</a></form>';
    echo '
    <h4 id="info">- CHAPTER 1: VEGA -</h4>
    <p>Welcome to the Light Gray RPG demo where you take the role of a young adventurer with amazing potential. You find yourself in Vega, a distant land with countless opportunities...</p>';
    include('stickman.php');
    echo '</div>';
    echo '</div>';
} else {
    ?>
<div id="container" class="">
<!-- Displays Login Module -->
<div class="module login loginbox">
	<iframe src="login.php"></iframe>
</div>
<?php // Last Room (checks if room changed, so doesn't display no exit message)
if ($_SESSION['lastroom'] != $_SESSION['roomID']) {
    $_SESSION['retreatroom'] = $_SESSION['lastroom'];
}
    $lastroom = $_SESSION['lastroom'] = $_SESSION['roomID']; ?>




<!-- FORM ACTION -->
<form id="mainForm" method="post" action="<?php echo $_SERVER['PHP_SELF']  //index.php?>" name="formInput" class="TOPFORM">

<div class="all-sections">
  <div id="action-module" class="module action">

<?php
$infobar = '<div class="infobar">
<a href="" class="lgray" data-link="stats">
Light Gray RPG
</a>
<a href="" class="lgray" data-link="stats">
  <span class="">Maps</span>
</a>
<a href="" class="lgray" data-link="stats">

Enemy List
</a>
<a href="" class="lgray" data-link="stats">
Lore
</a>
</div>';

    $infobar = ''; ?>


<div  class="infoBlock panel" data-pop="action">
<?php echo $infobar; ?>


<div class="panel custom-input" data-pop2="custom">
	<section>
<!--	<div class='closeMenu gold'><i class='fa fa-times-circle'></i></div>-->
	<div class="customInput">
		<h3>Custom Input</h3>
		<input class="field" type="string" name="input1" value="<?php $input ?>" />
		<input class="action btn" type="submit" name="submit" value="Submit" id="mainButton" />
	<!--</form>-->


	</div>
	</section>
	</div>

<?php
$closeMenuBtn = '<span class="closeMenu icon white">'.file_get_contents("img/svg/chevron-down.svg").'</span>';
    echo $closeMenuBtn; ?>
<section id="action">
<!--<form id="mainForm" method="post" action="<?php //echo $_SERVER['PHP_SELF']  //index.php?>" name="formInput"> -->
<?php
    if (!isset($_POST['input1'])) {
        $_POST['input1']='';
    } // used to look on char creation
    $input = $_POST['input1']; ?>
	<!--<input class="field" type="string" name="input1" value="<?php //$input?>" />
	<input class="action btn" type="submit" name="submit" value="Submit" id="mainButton" /> --
</form>-->
<?php
// --  CALL GLOBAL VARIABES & SET GLOBAL LOCAL VARIABLES
$user = $username = $_SESSION['username'];
    $pass = $_SESSION['pass'];
    $command = $_SESSION['command'];
    $notcommand = $_SESSION['notcommand'];
    $currency = $_SESSION['currency'];
    $quest = $_SESSION['quest'];
    $toopoor = $_SESSION['toopoor'];
    $notenoughbp = 	$_SESSION['notenoughbp'] = 'You don\'t have enough BP to '.$input.'<br/>';
    $notenoughsp = 	$_SESSION['notenoughsp'] = 'You don\'t have enough SP to '.$input.'<br/>';

    //echo "<span class='lastaction'>last action:</span> ".$input."";   // ---- last input
    //echo "<span class='lastaction roomcolor'>+</span>";   // -- last input


    echo "<div class='lastActionBox'>";   // -- last input
    echo "<strong class='red'>Last Action:</strong>";   // -- last input
    echo'<div class="gameBox">';

    include('room-all.php');
    echo'</div>';   // END GAMEBOX
    echo '</div>'; //-- END lastActionBox

    ?>

    <!-- TIME BOX! -->
    <!-- TIME BOX! -->
    <!-- TIME BOX! -->
    <!-- TIME BOX! -->
    <!-- TIME BOX! -->
    <!-- TIME BOX! -->

<p>LAST ACTION: <span id="datetime"></span>
</p>
<script>
var dt = new Date();
document.getElementById("datetime").innerHTML = dt.toLocaleString();
</script>
<p>CURRENT TIME: <span id="MyClockDisplay" class="clock" onload="showTime()"></span></p>


<script>
    function showTime(){
    var date = new Date();
    var h = date.getHours(); // 0 - 23
    var m = date.getMinutes(); // 0 - 59
    var s = date.getSeconds(); // 0 - 59
    var session = "AM";
    if(h == 0){
        h = 12;
    }
    if(h > 12){
        h = h - 12;
        session = "PM";
    }
    h = (h < 10) ? "0" + h : h;
    m = (m < 10) ? "0" + m : m;
    s = (s < 10) ? "0" + s : s;
    var time = h + ":" + m + ":" + s + " " + session;
    document.getElementById("MyClockDisplay").innerText = time;
    document.getElementById("MyClockDisplay").textContent = time;
    setTimeout(showTime, 1000);
}
function refreshData()
{
    x = 5;  // 5 Seconds
  //  console.log('xxxxxxx');
    // Do your thing here
    setTimeout(refreshData, x*100);
}
refreshData(); // execute function
showTime();
</script>



<?
//echo 'BBBBBBBBBBBbBBBBBBBBBBBb<br/>';
//   	$message="<i>x</i></br>";
    //.$_SESSION['desc030'];
		//		include ('update_feed_alt.php'); // --- update feed
   		//	$results = $link->query("UPDATE $user SET bluebalm = '400'"); // -- room change
        ?>

        <!-- // END TIME BOX! -->
        <!-- // END TIME BOX! -->
        <!-- // END TIME BOX! -->
        <!-- // END TIME BOX! -->
        <!-- // END TIME BOX! -->






<div class="descBox">

  <div class="gbox">
	<h2>Location:</h2>

	<?php
    include('room-desc.php');

    //<h2> All Actions</h2>
    echo '
<div class="roomBox">
<button type="submit" class=" redBG" name="input1" value="attack">Attack</button>
<button type="submit" class=" goldBG" name="input1" value="search">Search</button>
<button type="submit" class=" greenBG" name="input1" value="rest">Rest</button>
<button type="submit" class=" blueBG" name="input1" value="look">Look</button>

</div>';

    include('coinbox.php');

    echo '</div>';

    include('ammobox.php'); ?>
	</div>
	</section>

	<div class="panel" data-pop2="craft">
	<section>
	<?php include('craft.php'); ?>
	</section>
	</div>

  <div class="panel" data-pop2="system">
    <section>
        <?php include('system.php'); ?>
    </section>
  </div>


	<div class="subMenu">
	<span class="menuIcon2 " data-link2="action"><span>Action</span></span>
	<span class="menuIcon2 " data-link2="craft"><span>Craft</span></span>
	<span class="menuIcon2 " data-link2="custom"><span>Custom</span></span>
  <span class="menuIcon2 " data-link2="system"><span>System</span></span>

	</div>

<!--</form>-->

</div>
<!-- STATS PANEL -->
<div class="panel stats" data-pop="stats">
  <?php echo $infobar;
    echo $closeMenuBtn; ?>
<section class="flex-contain"> <?php include('stats.php'); ?> </section>
	<div class="panel skills-spells" data-pop2="skills"><section><?php include('skills.php'); ?></section></div>
	<div class="panel skills-spells" data-pop2="spells"><section><?php include('spells.php'); ?></section></div>
	<div class="panel" data-pop2="kl"><section><?php include('kl.php'); ?></section></div>

	<div class="subMenu">
	<span class="menuIcon2 active" data-link2="stats"><span>Stats</span></span>
		<span class="menuIcon2 " data-link2="skills"><span>Skills</span></span>
		<span class="menuIcon2 " data-link2="spells"><span>Spells</span></span>
		<span class="menuIcon2 " data-link2="kl"><span>KL</span></span>
	</div>
</div>

<!-- INV PANEL -->
<div class="panel" data-pop="inv">
  <?php echo $infobar;
    echo $closeMenuBtn; ?>
	<?php // include ('futureEQUIPPED.php');?>
	<?php include('inv.php'); ?>
	<div class="subMenu">
		<span class="menuIcon2 active" data-link2="inv"><span>Weapons</span></span>
		<span class="menuIcon2 " data-link2="armor"><span>Armor</span></span>
		<span class="menuIcon2 " data-link2="acc"><span>Acc</span></span>
		<span class="menuIcon2 " data-link2="comp"><span>Comp</span></span>
		<span class="menuIcon2 " data-link2="bag"><span>Bag</span></span>
	</div>
</div>

<!-- QUESTS PANEL -->
<div class="panel" data-pop="quests" id="quests">
  <?php echo $infobar;
    echo $closeMenuBtn; ?>
	<?php include('quests.php'); ?>
	<div class="subMenu">
		<span class="menuIcon2 active" data-link2="quests"><span>Quests</span></span>
		<span class="menuIcon2" data-link2="notfound"><span>Not Found</span></span>
		<span class="menuIcon2 " data-link2="grand"><span>Grand</span></span>
		<span class="menuIcon2 " data-link2="completed"><span>Completed</span></span>
	</div>
 </div>
<!-- WORLD PANEL -->
<div class="panel" data-pop="world">
  <?php echo $infobar;
    echo $closeMenuBtn; ?>
    	<section data-pop="teleport" id="teleport" class="teleportXXX"> <?php include('teleport.php'); ?> </section>
	<div class="subMenu">
		<span class="menuIcon2 active" data-link2="world"><span>World</span></span>
		<span class="menuIcon2" data-link2="map"><span></span></span>
	</div>
</div>

<?php
include('shop.php');			// ----- MENU CONTENT
    include('evolve.php');

    if ($infight >= 1) {
        //	include ('battlebox.php'); 	// ----- POPS UP DURING BATTLE - TURN DPAD INTO ATTACK PAD
    } ?>

<!-- MENU TABS -->
<div class="menu">
  <a href="" class="menuIcon" data-link="stats"><span>Char</span>
    <i class="icon purple"><?php echo file_get_contents("img/svg/character.svg"); ?></i>
  </a>
<a href="" class="menuIcon" data-link="inv"><span>Inv</span>
  <i class="icon green"><?php echo file_get_contents("img/svg/inv.svg"); ?></i>
</a>
<a href="" class="menuIcon" data-link="quests"><span>Quests</span>
  <i class="icon gold"><?php echo file_get_contents("img/svg/trophy.svg"); ?></i>
</a>
<a href="" class="menuIcon" data-link="world"><span>World</span>
  <i class="icon blue"><?php echo file_get_contents("img/svg/world.svg"); ?></i>
</a>
<a href="" class="menuIcon" data-link="action"><span>Action</span>
  <i class="icon red"><?php echo file_get_contents("img/svg/hand.svg"); ?></i>
</a>
</div>




<?php
    // -------------------------DB QUERY!
    $sql = "SELECT * FROM $username";
    if (!$result = $link->query($sql)) {
        die('There was an error running the query [' . $link->error . ']');
    }
    // -------------------------DB OUTPUT!
    while ($row = $result->fetch_assoc()) {
    //  $command = 	$_SESSION['command'] ="<span class='blue capX command'>  action  [ <span class='dddgray'>$input</span> ]</span>";
      $command = 	$_SESSION['command'] ="<span class='blue capX command'> action </span>";
    }


    include('nav.php'); 			// ----- DPAD + ACTIONS

    include('hud.php');			// ----- HEADS UP DISPLAY?>

</div>

</div> <!-- END MODULE ACTION -->
</form>
    <!-- Displays Feed Module -->


<?php
    $feedClass="";
    if ($infight >= 1) {
        $feedClass="infight";
    }


    echo '<div class="module feed '.$feedClass.'">';
    echo '<div id="feed-module">';
    echo '<div class="feedinside">';

    // -------------------------DB CONNECT!

    // -------------------------DB QUERY!
    $sql = "SELECT * FROM $username";
    if (!$result = $link->query($sql)) {
        die('There was an error running the query [' . $link->error . ']');
    }
    // -------------------------DB OUTPUT!
    while ($row = $result->fetch_assoc()) {
        echo $row['feed'];
    } ?>
<script> // scroll to bottom
  $('#feed-module').scrollTop($('#feed-module')[0].scrollHeight);
</script>
</div> <!-- END FEED INSIDE -->
</div> <!-- END MODULE ACTION -->

<?php
}

//ini_set('display_errors', 'on');
//error_reporting(E_ALL);


?>
</div><!-- end CONTAINER #title -->


<script>
function pageScroll() {
    	window.scrollBy(0,0); // horizontal and vertical scroll increments
    	scrolldelay = setTimeout('pageScroll()',100); // scrolls every 100 milliseconds
}
</script>

<!-- Tiny ScrollBar
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#scrollbar1').tinyscrollbar();
    });
</script>
-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="../js/core.min.js"></script>

<script>
var date = new Date();
    var hours = date.getHours();

    if (hours > 18 || hours < 6) {
        $('body').addClass('night');
    }
    if (hours > 6 && hours < 8) {
        $('body').addClass('dawn');
    }
    if (hours > 18 && hours < 20) {
        $('body').addClass('twilight');
    }
</script>

</body>
</html>
