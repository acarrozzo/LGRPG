<?php
// --------------------------------------------------------------------------------- STABLES - SHOP TAB
// -------------------------DB CONNECT!
include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){
    die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	  


// ---------------------------------------------------------------------------------- // START VARIABLES

$coin = $currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];



// ---------------------------------------------------------------------------------- // Broccoli Rob Shop LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">RED TOWN STABLES<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
						


echo '<li><span class="h3">Mounts</span></li>';


echo '<br><br>
// ----------------------------------------------------- Red Town Stables - COMING SOON!<br>
*100k  donkey ( +20 all stats ) 			<br>
*100k  stallion ( +100 str, +100 def ) 	<br>
*200k  clydesdale ( +200 str ) 			<br>
*200k  thoroughbred ( +200 dex ) 		<br>
*200k  pony ( +50 mag ) 					<br>
*200k  mule ( +400 def ) 					<br>
*500k  mustang ( +100 all stats ) 		<br>
*2m  unicorn ( +200 all stats ) 			<br>
';

// echo '<br>
//<li><input type="submit" class="buyBtn" name="input1" value="buy donkey" /> 
//		<span class="gold">10</span> donkey <span>( <i class="lightred">+10</i> HP )</li>';

echo'</form></ul></article>';	

} //end while
?>