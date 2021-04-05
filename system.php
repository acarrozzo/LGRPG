<?php
// --------------------------------------------------------------------------------- Quests TAB
// -------------------------DB CONNECT!
include ('db-connect.php');
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){

$whichmap = $_SESSION['selectmap'];
//echo 'WM: '.$whichmap;
//article blank ID is the


/*
<div class="globalChat">
<p class="expand-one3"><a href="#">Current Map <span class="alt2 right"> Click to collapse/expand window </span></a></p> ';

if ($whichmap == '0') {
	echo '<p class="content-one3"><img src="img/lightgray_map_roomzero.jpg" width="800" height="800" />';}
else if ($whichmap == 'grassyfield') {
	echo '<p class="content-one3"><img src="img/lightgray_map_grassyfield_main.jpg" width="800" height="800" />';}
else if ($whichmap == 'grassyfieldunderground') {
	echo '<p class="content-one3"><img src="img/lightgray_map_grassyfield_underground.jpg" width="800" height="800" />';}
else if ($whichmap == 'forest') {
	echo '<p class="content-one3"><img src="img/lightgray_map_forest_main.jpg" width="800" height="800" />';}
else if ($whichmap == 'forestunderground') {
	echo '<p class="content-one3"><img src="img/lightgray_map_forest_underground.jpg" width="800" height="800" />';}
else if ($whichmap == 'redtown') {
	echo '<p class="content-one3"><img src="img/lightgray_map_redtown_main.jpg" width="800" height="800" />';}
else if ($whichmap == 'redtownsewers') {
	echo '<p class="content-one3"><img src="img/lightgray_map_redtown_sewers.jpg" width="800" height="800" />';}
else if ($whichmap == 'redtownupperlevel') {
	echo '<p class="content-one3"><img src="img/lightgray_map_redtown_upperlevel.jpg" width="800" height="800" />';}
else if ($whichmap == 'stonemine') {
	echo '<p class="content-one3"><img src="img/lightgray_map_stonemine_main.jpg" width="800" height="800" />';}
else if ($whichmap == 'stonemineunderground') {
	echo '<p class="content-one3"><img src="img/lightgray_map_stonemine_underground.jpg" width="800" height="800" />';}
else if ($whichmap == 'blueocean') {
	echo '<p class="content-one3"><img src="img/lightgray_map_blueocean_main.jpg" width="800" height="800" />';}
else if ($whichmap == 'blueoceanunderwater') {
	echo '<p class="content-one3"><img src="img/lightgray_map_blueocean_underwater.jpg" width="800" height="800" />';}
else {
	echo '<p class="content-one3"><img src="img/lightgray_worldmap_v1.jpg" width="800" height="800" />';}
<article id="# "></article>

*/
	//<article data-pop="system" id="system">

?>

<?php
//if ($_SESSION['hints'] == 2){echo '<input type="submit" name="input1" value="turn hints on" />';}
//if ($_SESSION['hints'] == 1){echo '<input type="submit" name="input1" value="turn hints off" />';}

	//<form id="mainForm" method="post" action="" name="formInput">
echo '<div class="gbox">';
  echo '<h2>System</h2>	';
echo '
<br/>
<a class="btn" href="/">refresh page</a>
<input type="submit" name="input1" value="unequip all" />
<input type="submit" name="input1" value="clear feed" />
</div>
';//</form>
echo '<div class="gbox">';
echo '<a class="btn" href=logout.php>Logout</a>';
echo '</div>';

echo '<div class="globalChat">
<p class="expand-one4">
<a href="#">Global Chat</a>
</p>
<p class="alt2X rightX"> type "chat <message>" and your message in the CUSTOM input.</p>
<p class="content-one4" style="display: block;">
<br/>';
include ('chat-module.php');
echo '</p></div>';

}
//</article>
/* EXTRA SYSTEM SETTINGS
<p>font change</p>
<a class="btn ralewayBtn" />raleway</a>
<a class="btn titilliumBtn" />titillium</a>

<p>corners</p>
<a class="btn squaredBtn" />squared</a>
<a class="btn roundedBtn" />rounded</a>

<p>style</p>
<a class="btn boldBtn" />bold</a>
<a class="btn bigTextBtn" />big text</a>
*/

?>
<script>
$('.expand-one3').click(function(){
$('.content-one3').slideToggle('slow');});
</script>

<script>
$('.expand-one4').click(function(){
$('.content-one4').slideToggle('slow');});
</script>
