<?php
// --------------------------------------------------------------------------------- EVOLVE TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	  


// ---------------------------------------------------------------------------------- // START VARIABLES
// ---------------------------------------------------------------------------------- // START VARIABLES 
// ---------------------------------------------------------------------------------- // START VARIABLES

$level = $row['level'];

// ---------------------------------------------------------------------------------- // LOADING
echo '<article id="loading" class="darkestgrayBG gray">
			<div class="spinner">
				<div class="dot1 goldBG"></div>
		 		<div class="dot2 blueBG"></div>
			</div>
		 </article>';	

// ---------------------------------------------------------------------------------- // EVOLVE
	
	
//			<form id="mainForm" method="post" action="" name="formInput">
	
echo '<article data-pop="evolve" id="evolve">
		 <ul class="col tall wide left"> 



<span class="h2">EVOLVE</span>';
						
echo '<br><br>
		<li class="px20">Evolving will reset all your BP and SP, allowing you to re-allocate your skills & spells.</li><br><br>
		
<li>	<input type="submit" class="percent100 goldBG hov darkestgray px70" name="input1" value="evolve" /></li>

<li>	cost: <i class="yellow">1k</i></li>';


echo'</ul></article>';	

} 
//</form>
//end while
?>