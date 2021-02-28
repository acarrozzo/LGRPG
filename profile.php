<?php session_start();?>

<style>


#profile-feed {
	max-width: 900px;
	border: solid 1px #ccc;
	margin: 0 auto;
	max-height: 60vh;
	overflow: auto;
}



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
}
.table td {
	padding: .2rem 0.5rem;
	border: solid 1px #ccc;
}
.table th {
  position: sticky;
	top: 0;
	background: #fff;
	padding: 0.4rem 1.5rem 0.4rem 0.5rem;
	border: solid 1px #ccc;
	z-index: 1;
}
.stick-left {
	position: sticky;
	left: 0;
	background: #fff;
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

echo '<title>'.$_GET["char"].'</title>';

echo '
<main class="worldtool">
<p>Light Gray</p>
<h3>World Tool</h3>';
echo '<h5 class="gold">CHARACTER SHEET</h5>';
echo '<h1 class="blue">'.$_GET["char"].'</h1>';
  //  $listdbtables = array_column(mysqli_fetch_all($link->query('SHOW TABLES')),0);

//<th>Feed</th>

//  if($stmt = $link->query("SHOW TABLES")){
  //  $numRecords = "<p>Total characters : ".$stmt->num_rows."</p>";
//    while ($row = $stmt->fetch_array()) {
//      $temp = $row[0];
      $char=$temp=$_GET["char"];
      $sql = "SELECT * FROM $temp;";
      $result = mysqli_query($link, $sql);
      $resultCheck = mysqli_num_rows($result); //optional
      if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<h3>Level '.$row['level'].'</h3>';
              echo '<p>Hit Points: <span class="red">'.$row['hp'].'/'.$row['hpmax'].'</span></p>';
              echo '<p>Mana Points: <span class="blue">'.$row['mp'].'/'.$row['mpmax'].'</span></p>';

              echo '</div>';
              echo '<div>';


              echo '<span class="gold">BP: '.$row['bp'].' </span>';
              echo '<span class="purple">SP: '.$row['sp'].' </span>';
              echo '<span class="red">PT: '.$row['physicaltraining'].'  </span>';
              echo '<span class="blue">MT: '.$row['mentaltraining'].'  </span>';
              echo '<span class="gold">Coin: '.$row['currency'].'  </span>';
              echo '<span class="">Evolve: '.$row['evolve'].'  </span>';
              echo '</div>';
              echo '<div>';
              echo '<span class="red">STR: '.$row['str'].'('.$row['strmod'].')  </span>';
              echo '<span class="green">DEX: '.$row['dex'].'('.$row['dexmod'].')  </span>';
              echo '<span class="blue">MAG: '.$row['mag'].'('.$row['magmod'].')  </span>';
              echo '<span class="gold">DEF: '.$row['def'].'('.$row['defmod'].')  </span>';
              echo '</div>';
              echo '<div>';
              echo '<span>'.$row['equipR'].'</span> • ';
              echo '<span>'.$row['equipL'].'</span> ';
              echo '</div>';
              echo '<div>';
							echo '<span>'.$row['equipHead'].'</span> • ';
              echo '<span>'.$row['equipBody'].'</span> • ';
              echo '<span>'.$row['equipHands'].'</span> • ';
              echo '<span>'.$row['equipFeet'].'</span> ';
							echo '</div>';
							echo '<div>';
							echo '<span>'.$row['equipRing1'].'</span> • ';
							echo '<span>'.$row['equipRing2'].'</span> • ';
							echo '<span>'.$row['equipNeck'].'</span> • ';
							echo '<span>'.$row['equipArtifact'].'</span> ';
							echo '</div>';
							echo '<div>';
							echo '<span>'.$row['equipComp'].'</span> • ';
              echo '<span>'.$row['equipPet'].'</span> • ';
              echo '<span>'.$row['equipMount'].'</span>';
							echo '</div>';
							echo '<p class="darkred">Kills: '.$row['KLtotalkill'].'</p>';
							echo '<p class="darkred">Deaths: '.$row['deaths'].'</p>';
              echo '<p class="">Last Enemy: '.$row['enemy'].'</p>';
              echo '<p>Room ID:'.$row['room'].'</p>';
              $i=01;
              $count=0;
              while ($i<=70) {
                  if ($row['quest'.$i.'']>=2) {
                      $count++;
                  }
                  $i++;
              }
              echo '<p class="gold">Quests: '.$count.'</p>'; // completed quests
              $i=1;
              $count=0;
              while ($i<=10) {
                  if ($row['chest'.$i.'']>=1) {
                      $count++;
                  }
                  $i++;
              }
              echo '<p class="gold">Chests: '.$count.'</p>'; // gold chests
              echo '<p class="green">XP: '.$row['xp'].'</p>';
              //  echo '<p class="scroll"><div class="inside">'.$row['feed'].'</div></p>'; // FEED SCROLL
              echo '<p>Clicks: '.$row['clicks'].'</p>';

              echo '<h4 class="gray">'.$char.'\'s Feed</h4><br/>';
              echo '<section id="profile-feed">'.$row['feed'].'<br/><br/><br/><p>AT BOTTOM | SCROLL UP TO SEE HISTORY</p></section>';
          }

          //  }

//  }
//  else{
//  echo $conn->error;
//  }
      }
//  echo $numRecords;

  echo '<p class="padd">Play now: <a class="blue underline" href="/index.php"> Light Gray RPG | Trials of Vega</a></p>';

  echo '</main>'; //end world tool container





?>
<script> // scroll to bottom
  $('#profile-feed').scrollTop($('#profile-feed')[0].scrollHeight);
</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/app.min.js"></script>
<script>
var element = document.getElementById("profile-feed");
element.scrollTop = element.scrollHeight;
</script>
</body>
</html>
