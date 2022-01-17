<?php session_start();?>

<style>
.worldtool {
  padding:2rem;
  text-align: center;
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
  margin:2rem auto;
  text-align: left;
  background:#111;
}
.table td {
	padding: .2rem 0.5rem;
	border: solid 1px #222;
}
.table th {
  position: sticky;
	top: 0;
	background: #000;
	padding: 0.4rem 1.5rem 0.4rem 0.5rem;
	border: solid 1px #222;
	z-index: 1;
  cursor:pointer;
}
.stick-left {
	position: sticky;
	left: 0;
	background: #000;
}
.fade {opacity:.3;}
#sorttable_sortfwdind, #sorttable_sortrevind {
	position: absolute;
}
</style>

<?php include('head.php');?>
<body>
<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);

// -------------------------DB CONNECT!
require_once('db-connect.php');

if (!empty(getenv("MYSQL_HOST"))) {

}
echo '<title>WORLD TOOL</title>';


echo '
<main class="worldtool">
<p>Light Gray</p>
<h3>World Tool</h3>
<p class="gray padd">click on the headers to sort.</p>

';
  //  $listdbtables = array_column(mysqli_fetch_all($link->query('SHOW TABLES')),0);
echo '<table class="table searchable sortable"><tr>
<th class="stick-right"><strong>Name</strong></th>
<th>Level</th>
<th>HP</th>
<th>MP</th>
<th>PT</th>
<th>MT</th>
<th>Weapon</th>
<th>Helm</th>
<th>Body</th>
<th>Kills</th>
<th>Last Enemy</th>
<th>Deaths</th>

<th>Room#</th>
<th>Quests</th>
<th>Chests</th>
<th>EXP</th>

<th>Clicks</th>

</tr>';
//<th>Feed</th>

  if($stmt = $link->query("SHOW TABLES")){
    $numRecords = "<p>Total characters : ".$stmt->num_rows."</p>";
    while ($row = $stmt->fetch_array()) {
      $temp = $row[0];
      $sql = "SELECT * FROM $temp;";
      $result = mysqli_query($link, $sql);
      $resultCheck = mysqli_num_rows($result); //optional
      if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          if ($row['clicks']==0) {
            $hider = "hide";
            $hider = "lgray";
            $hider = "fade";
          } else {$hider="";}
          $username = $row['username'];
          echo '<tr class="'.$hider.'">';
          echo '<td class="stick-left"><strong><a class="lgray" target="_blank" href="/profile.php?char='.$username.'">'.$username.'</a></strong></td>';
          echo '<td>'.$row['level'].'</td>';
          echo '<td class="red">'.$row['hpmax'].'</td>';
          echo '<td class="blue">'.$row['mpmax'].'</td>';
          echo '<td class="">'.$row['physicaltraining'].'</td>';
          echo '<td>'.$row['mentaltraining'].'</td>';
          echo '<td>'.$row['equipR'].'</td>';
          echo '<td>'.$row['equipHead'].'</td>';
          echo '<td>'.$row['equipBody'].'</td>';

          echo '<td class="darkred">'.$row['KLtotalkill'].'</td>';
          $enemy=$row['enemy'];
          if ($enemy=="eName") {
            $enemy="-";
          }
          echo '<td class="">'.$enemy.'</td>';
          echo '<td class="darkred">'.$row['deaths'].'</td>';
          echo '<td>'.$row['room'].'</td>';
          $i=01;
          $count=0;
          while ($i<=70) {
              if ($row['quest'.$i.'']>=2){
                $count++;
              }
              $i++;
          }
          echo '<td class="gold">'.$count.'</td>'; // completed quests
          $i=1;
          $count=0;
          while ($i<=10) {
              if ($row['chest'.$i.'']>=1){
                $count++;
              }
              $i++;
          }
          echo '<td class="gold">'.$count.'</td>'; // gold chests
          echo '<td class="green">'.$row['xp'].'</td>';
        //  echo '<td class="scroll"><div class="inside">'.$row['feed'].'</div></td>'; // FEED SCROLL
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

  echo '<p class="padd">Play now: <a class="blue underline" href="/index.php"> Light Gray RPG | Trials of Vega</a></p>';

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
