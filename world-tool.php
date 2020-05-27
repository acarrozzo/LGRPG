
<style>
.worldtool {
  padding:2rem;
}
td.scroll {
  font-size: 10px;
	max-height: 70vh;
	max-width: 100vw;
	overflow: scroll;
	display: inline-block;
  text-align: center;
  position: relative;
	max-width: 20rem;
  max-height: 2.5rem;


}
.table {
	border-spacing: 0;
	font-size: 1.5rem;
  margin:2rem 0;
}
.table td {
	padding: .2rem 0.5rem;
	border: solid 1px #ccc;
}
.table th {
  position: sticky;
	top: 0;
	background: #fff;
	padding: 0.4rem 0.5rem;
	border: solid 1px #fff;
	z-index: 1;
}
</style>

<?php session_start();?>
<?php include('head.php');?>
<body>
<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

// -------------------------DB CONNECT!
require_once('db-connect.php');


echo '
<main class="worldtool">
<p>Light Gray</p>

<h3>World Tool</h3>

';
  //  $listdbtables = array_column(mysqli_fetch_all($link->query('SHOW TABLES')),0);
echo '<table class="table searchable sortable"><tr>
<th>Level</th>
<th><strong>Name</strong></th>
<th>HP</th>
<th>MP</th>
<th>Equipped</th>
<th>Kills</th>

<th>Room#</th>
<th>Quests</th>
<th>Chests</th>
<th>EXP</th>

<th>Feed</th>
<th>Clicks</th>

</tr>';
  if($stmt = $link->query("SHOW TABLES")){
    $numRecords = "Total characters : ".$stmt->num_rows."<br>";
    while ($row = $stmt->fetch_array()) {
      $temp = $row[0];
      $sql = "SELECT * FROM $temp;";
      $result = mysqli_query($link, $sql);
      $resultCheck = mysqli_num_rows($result); //optional
      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>'.$row['level'].'</td>';
          echo '<td><strong>'.$row['username'].'</strong></td>';
          echo '<td>'.$row['hpmax'].'</td>';
          echo '<td>'.$row['mpmax'].'</td>';
          echo '<td>'.$row['equipR'].'</td>';
          echo '<td>'.$row['KLtotalkill'].'</td>';
          echo '<td>'.$row['room'].'</td>';
          $i=01;
          $count=0;
          while ($i<=70) {
              if ($row['quest'.$i.'']>=2){
                $count++;
              }
              $i++;
          }
          echo '<td>'.$count.'</td>'; // completed quests
          $i=1;
          $count=0;
          while ($i<=10) {
              if ($row['chest'.$i.'']>=1){
                $count++;
              }
              $i++;
          }
          echo '<td>'.$count.'</td>'; // gold chests
          echo '<td>'.$row['xp'].'</td>';
          echo '<td class="scroll"><div class="inside">'.$row['feed'].'</div></td>'; // FEED SCROLL
          echo '<td>'.$row['clicks'].'</td>';
          echo '</tr>';
        }
      }
    }

  }
  else{
  echo $conn->error;
  }
  echo '</table>';
  echo $numRecords;
  echo '</main>'; //end world tool container


/*
// ---======== = = = = = = =
$sql = "SELECT * FROM Superior;";
$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE 'lg_db';";
//$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES ORDER BY level DESC LIMIT 1,15;";
//$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES;";

//$sql = "SELECT * FROM ?;";
    //  $sql = "SELECT * FROM sys.tables;";
    //  $sql = "SELECT * FROM information_schema;";
//$sql = "SELECT * FROM lg_db;";
$result = mysqli_query($link, $sql);
$resultCheck = mysqli_num_rows($result); //optional
if ($resultCheck > 0) {
  //while($row = $result->fetch_assoc()) {
  //  var_dump($row);
  //}
  while ($row = mysqli_fetch_assoc($result)) {
  //  while ($row = mysqli_fetch_array($result)) {
//  while($row = $result->fetch_assoc()) {

    echo '<p>'.$row['username'].'</p>';
    echo '<p>'.$row['level'].'</p>';
    echo '<p>'.$row['room'].'</p>';
    echo '<p>'.$row['xp'].'</p>';
    //var_dump($row);

  }

}
//======


    $result = mysqli_query('SHOW TABLES',$conn) or die('cannot show tables');
    while($tableName = mysql_fetch_row($result)) {

    	$table = $tableName[0];

    	echo '<h3>',$table,'</h3>';
    	$result2 = mysql_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
    	if(mysql_num_rows($result2)) {
    		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
    		echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
    		while($row2 = mysql_fetch_row($result2)) {
    			echo '<tr>';
    			foreach($row2 as $key=>$value) {
    				echo '<td>',$value,'</td>';
    			}
    			echo '</tr>';
    		}
    		echo '</table><br />';
    	}
    }


//====


function get_tables()
{
  $tableList = array();
  $res = mysqli_query($this->conn,"SHOW TABLES");
  while($cRow = mysqli_fetch_array($res))
  {
    $tableList[] = $cRow[0];
  }
  return $tableList;
}


/*
$query = "SELECT * FROM *";
$results=mysqli_query($link,$query);
$row_count=mysqli_num_rows($results);

echo "<table>";
while ($row = mysqli_fetch_array($results)) {
echo "<tr><td>".($row['id'])."</td></tr>";
}
echo "</table>";

mysqli_query($con,$query);
mysqli_close($con);
*/


//ini_set('display_errors', 'on');
//error_reporting(E_ALL);


?>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/app.min.js"></script>

</body>
</html>
