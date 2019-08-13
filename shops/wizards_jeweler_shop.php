<?php
// --------------------------------------------------------------------------------- SHOP TAB
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

$coin = $currency = $row['currency'];
$toopoor = $_SESSION['toopoor'];



// ---------------------------------------------------------------------------------- // Wizard SHOP LIST!!
echo '<article data-pop="shop" id="shop">
		 <ul class="col tall wide left"> 
			<form id="mainForm" method="post" action="" name="formInput">
			<span class="h2">WIZARD JEWELER<span class="spCount">You have <i class="px40 gold">'.$coin.'</i> coin</span></span>';
						
echo '<li><span class="h3">Rings </span></li> 
			<br>
			<li><input type="submit" class="buyBtn" name="input1" value="buy red wizard ring" /> 
			<span class="yellow">10k </span> <span class="lightred"> red </span> wizard ring 
					<span>( <i class="blue">+5</i> mag, <i class="lightred">+5</i> str )</span></li>
			<br>
			<li><input type="submit" class="buyBtn" name="input1" value="buy green wizard ring" /> 
			<span class="yellow">10k </span> <span class="green"> green </span> wizard ring 
					<span>( <i class="blue">+5</i> mag, <i class="green">+5</i> dex )</span></li>
			<br>
			<li><input type="submit" class="buyBtn" name="input1" value="buy yellow wizard ring" /> 
			<span class="yellow">10k </span> <span class="gold"> yellow </span> wizard ring 
					<span>( <i class="blue">+5</i> mag, <i class="gold">+5</i> def )</span></li>';

		
echo'</form></ul></article>';	

} //end while
?>