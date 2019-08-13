<?php
// -------------------------HINTS & TIPS


include ('db-connect.php'); 
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if(!$result = $link->query($sql)){ die('There was an error running the query [' . $link->error . ']');}
// -------------------------DB OUTPUT!
while($row = $result->fetch_assoc()){ 	

$rand = rand(1,2);




if ($rand==1) { echo "Hint 1";}
if ($rand==2) { echo "Hint 2";}


//$funflag=1;		

} // -end while


?>