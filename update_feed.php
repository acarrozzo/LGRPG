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
    $feed_add=$command.$message;
    $feed_new = $row['feed'].$feed_add; // --------------------- UPDATE FEED
    //  $query = $link->prepare("UPDATE $user SET feed = ? ");
    $query = $link->prepare("UPDATE $username SET feed = ? ");
    $query->bind_param("s", $feed_new);
    $query->execute();


    $funflag = 1;
}
