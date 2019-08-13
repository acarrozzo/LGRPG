<?php session_start(); ?>
<?php include('head.php'); ?>
<body>
<?php

$link = mysqli_init(); // global declare for link

// -------------------------DB CONNECT!
include('db-connect.php');
//echo 'SESSION USRNAME: '.$_SESSION['username'];

if (!isset($_SESSION['username'])) {			// IF NO ONE IS LOGGED IN SHOW TITLE SCREEN
    echo '<div id="container">';

    echo '<div id="title">
	<h1>Light Gray RPG</h1>
  <h6>THE DEMO</h6>
	<h4>- PART 1: VEGA -</h4>

	<i class=" icon-dragon"></i>';
    include('login.php');
    echo '<h3>New to Light Gray?</h3>
	<a href="register.php" class="login btn">CREATE NEW CHARACTER</a>';
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





<form id="mainForm" method="post" action="<?php echo $_SERVER['PHP_SELF']  //index.php?>" name="formInput" class="TOPFORM">

<div id="action-module" class="module action">


<div  class="infoBlock panel" data-pop="action">
<div class="panel" data-pop2="custom">
	<section>
	<div class='closeMenu gold'><i class='fa fa-times-circle'></i></div>
	<div class="customInput">
		<h2>Custom Input</h2>
		<input class="field" type="string" name="input1" value="<?php $input ?>" />
		<input class="action btn" type="submit" name="submit" value="Submit" id="mainButton" />
	<!--</form>-->
	</div>
	</section>
	</div>

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
<div class="descBox">
	<h2>Location:</h2>

	<?php
    include('room-desc.php');

    //<h2> All Actions</h2>
    echo '
<div class="roomBox">
<input type="submit" class=" blueBG" name="input1" value="look">
<input type="submit" class=" greenBG" name="input1" value="rest">
<input type="submit" class=" goldBG" name="input1" value="search">
<input type="submit" class=" redBG" name="input1" value="attack">
</div>';

    include('coinbox.php');
    include('ammobox.php'); ?>
	</div>
	</section>

	<div class="panel" data-pop2="craft">
	<section>
	<?php include('craft.php'); ?>
	</section>
	</div>

	<div class="subMenu">
	<span class="menuIcon2 " data-link2="action"><span>Action</span></span>
	<span class="menuIcon2 " data-link2="craft"><span>Craft</span></span>
	<span class="menuIcon2 " data-link2="custom"><span>Custom</span></span>
	</div>

<!--</form>-->

</div>
<!-- STATS PANEL -->
<div class="panel" data-pop="stats">
<section> <?php include('stats.php'); ?> </section>
	<div class="panel" data-pop2="skills"><section><?php include('skills.php'); ?></section></div>
	<div class="panel" data-pop2="spells"><section><?php include('spells.php'); ?></section></div>
	<div class="panel" data-pop2="kl"><section><?php include('kl.php'); ?></section></div>
	<div class="panel" data-pop2="settings"><section><?php include('system.php'); ?></section></div>

	<div class="subMenu">
	<span class="menuIcon2 active" data-link2="stats"><span>Stats</span></span>
		<span class="menuIcon2 " data-link2="skills"><span>Skills</span></span>
		<span class="menuIcon2 " data-link2="spells"><span>Spells</span></span>
		<span class="menuIcon2 " data-link2="kl"><span>KL</span></span>
		<span class="menuIcon2 " data-link2="settings"><span>Settings</span></span>
	</div>
</div>

<!-- INV PANEL -->
<div class="panel" data-pop="inv">
	<?php // include ('futureEQUIPPED.php');?>
	<?php include('inv.php'); ?>
	<div class="subMenu">
		<span class="menuIcon2 active" data-link2="inv"><span>Weapons</span></span>
		<span class="menuIcon2 " data-link2="armor"><span>Armor</span></span>
		<span class="menuIcon2 " data-link2="acc"><span>Acc.</span></span>
		<span class="menuIcon2 " data-link2="comp"><span>Comp.</span></span>
		<span class="menuIcon2 " data-link2="bag"><span>Bag</span></span>
	</div>
</div>

<!-- QUESTS PANEL -->
<div class="panel" data-pop="quests" id="quests">
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
  <a href="" class="menuIcon" data-link="stats"><span>Stats</span><i class="purple fa fa-child"></i></a>
<a href="" class="menuIcon" data-link="inv"><span>Inv</span><i class="green icon-battle-gear"></i></a>
<a href="" class="menuIcon" data-link="quests"><span>Quests</span><i class="gold icon-trophy"></i></a>
<a href="" class="menuIcon" data-link="world"><span>World</span><i class="blue icon-world"></i></a>
<a href="" class="menuIcon" data-link="action"><span>Action</span><i class="red ra ra-hand"></i></a>
</div>




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
        $command = 	$_SESSION['command'] ="<span class='blue capX command'>  action  </span>";
    }

    include('hud.php');			// ----- HEADS UP DISPLAY
    include('nav.php'); 			// ----- DPAD + ACTIONS

?>



</div> <!-- END MODULE ACTION -->
</form>
    <!-- Displays Feed Module -->


<?php
    $feedClass="";
    if ($infight >= 1) {
        $feedClass="infight";
    }


    echo '<div class="module feed '.$feedClass.'">
      <div id="feed-module">';

    // -------------------------DB CONNECT!
    include('db-connect.php');
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

<!-- Tiny ScrollBar ---->
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#scrollbar1').tinyscrollbar();
    });
</script>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/app.min.js"></script>

</body>
</html>
