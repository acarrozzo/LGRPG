<?php  
// ---------------------------------------------------------------------------- INV TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){
	
	$whichmap = $_SESSION['selectmap'];

	   
echo '<article id="maps" class="teleport">
	<form id="mainForm" method="post" action="" name="formInput">
	<ul>
		  
<span class="col tall noBG">';

	
	if (1 == 1) {

echo '

<a href="#" class="flyout hov wide greenBG" data-target=".grassyfieldmap" data-toggle="droppp">grassy field</a>

<div class="grassyfieldmap"><img src="img/lightgray_map_grassyfield_main.jpg" /></div>

';



	}
else if ($whichmap == '0') {
	echo '<li><img src="img/lightgray_map_roomzero.jpg" /></li></li>';}
else if ($whichmap == 'grassyfield') { 
	echo '<li><img src="img/lightgray_map_grassyfield_main.jpg" /></li>';}	
else if ($whichmap == 'grassyfieldunderground') { 
	echo '<li><img src="img/lightgray_map_grassyfield_underground.jpg" /></li>';}	
else if ($whichmap == 'forest') { 
	echo '<li><img src="img/lightgray_map_forest_main.jpg" /></li>';}	
else if ($whichmap == 'forestunderground') { 
	echo '<li><img src="img/lightgray_map_forest_underground.jpg" /></li>';}		
else if ($whichmap == 'redtown') { 
	echo '<li><img src="img/lightgray_map_redtown_main.jpg" /></li>';}	
else if ($whichmap == 'redtownsewers') { 
	echo '<li><img src="img/lightgray_map_redtown_sewers.jpg" /></li>';}	
else if ($whichmap == 'redtownupperlevel') { 
	echo '<li><img src="img/lightgray_map_redtown_upperlevel.jpg" /></li>';}			
else if ($whichmap == 'stonemine') { 
	echo '<li><img src="img/lightgray_map_stonemine_main.jpg" /></li>';}	
else if ($whichmap == 'stonemineunderground') { 
	echo '<li><img src="img/lightgray_map_stonemine_underground.jpg" /></li>';}	
else if ($whichmap == 'blueocean') { 
	echo '<li><img src="img/lightgray_map_blueocean_main.jpg" /></li>';}	
else if ($whichmap == 'blueoceanunderwater') { 
	echo '<li><img src="img/lightgray_map_blueocean_underwater.jpg" /></li>';}	
	
	
		


	
	
	echo '</span></ul>	      

    </article> </form>
';	  
 
}

    
	 

   