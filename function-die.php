<?php
// --------- Die Function

// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	   
		$hp=$row['hp'];      // User Stats
		$hpmax=$row['hpmax'];   
		$room=$row['room'];
		}

if ($hp <= 0 && $room != '0')
{
echo 'HP < 0 = DEAD!';
$message="<h3 class='dead'>HP < 0 = DEAD!</h3><p>Well it happens to the best of us.</p>
<p> When your health gets low make sure to heal yourself by drinking a red potion, eating some cooked meat, casting a heal spell, etc.</p>
<p>Your health has been replenished and you have been teleported back to the Grassy Field. </p>
<p>Godspeed.</p>";//.$_SESSION['desc001'];
include ('update_feed_alt.php'); // --- update feed
$results = $link->query("UPDATE $user SET room = '001'"); // ROOM CHANGE
$results = $link->query("UPDATE $user SET hp = $hpmax");
$results = $link->query("UPDATE $user SET mp = $mpmax");
$results = $link->query("UPDATE $user SET deaths = deaths + 1");
$results = $link->query("UPDATE $user SET endfight = 0"); // End fight 
$results = $link->query("UPDATE $user SET infight = 0"); // End Fight



$_SESSION['magicarmor_amount'] = 0;   		// reset most buffs
$_SESSION['ironskin_amount'] = 0;
$_SESSION['ironskin_clicks'] = 0;

$_SESSION['flying'] = 0;
$_SESSION['breathingwater'] = 0;

$_SESSION['reds'] = 0;
$_SESSION['greens'] = 0;
$_SESSION['blues'] = 0;
$_SESSION['yellows'] = 0;
$_SESSION['golds'] = 0;
$_SESSION['purples'] = 0;

$_SESSION['coffee'] = 0;
$_SESSION['tea'] = 0;


$_SESSION['poison'] = 0;
$_SESSION['poisonyou'] = 0;
$_SESSION['bleeding'] = 0;

$_SESSION['magicarmor'] = 0;
$_SESSION['regenerate_clicks'] =0;



}

?>