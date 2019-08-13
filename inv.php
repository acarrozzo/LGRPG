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
	
	//	<form id="mainForm" method="post" action="" name="formInput">

echo '<section  data-pop="inv" class="panelXXX" id="weap">
<h2>1h Weapons<i>R</i></h2>
';
	//-<span class="h2">1h Weapons<i>R</i></span>

	if ($row["dagger"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "dagger" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip dagger' /> ";}
		echo "<span>".$row["dagger"]."x </span> dagger <span>( <i class='lightred'>+1</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTdagger']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell dagger' />
		</div>";}	
	
	
	if ($row["stiletto"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "stiletto" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip stiletto' /> ";}
		echo "<span>".$row["stiletto"]."x </span> stiletto <span>( <i class='lightred'>+1</i> str, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTstiletto']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell stiletto' />
		</div>";}			
	
	
	if ($row["trainingsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "training sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip training sword' /> ";}
		echo "<span>".$row["trainingsword"]."x </span> training sword <span>( <i class='lightred'>+3</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell training sword' />
					</div>";}	
	if ($row["shortsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "short sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip short sword' /> ";}
		echo "<span>".$row["shortsword"]."x </span> short sword <span>( <i class='lightred'>+4</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTshortsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell short sword' />
					</div>";}		

	if ($row["mace"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mace' /> ";}
		echo "<span>".$row["mace"]."x </span> mace <span>( <i class='lightred'>+4</i> str, <i class='blue'>+2</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmace']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mace' />
					</div>";}
		
	if ($row["broadsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "broad sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip broad sword' /> ";}
		echo "<span>".$row["broadsword"]."x </span> broad sword <span>( <i class='lightred'>+4</i> str, <i class='gold'>+2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbroadsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell broad sword' />
	</div>";}		
	if ($row["longsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "long sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip long sword' /> ";}
		echo "<span>".$row["longsword"]."x </span> long sword <span>( <i class='lightred'>+5</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTlongsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell long sword' />
			</div>";}	
	if ($row["club"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "club" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip club' /> ";}
		echo "<span>".$row["club"]."x </span> club <span>( <i class='lightred'>+6</i> str, <i class='black'>-2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTclub']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell club' />
			</div>";}		


	
	if ($row["flail"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "flail" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip flail' /> ";}
		echo "<span>".$row["flail"]."x </span> flail <span>( <i class='lightred'>+7</i> str, <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTflail']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell flail' />
			</div>";}	
	if ($row["morningstar"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "morning star" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip morning star' /> ";}
		echo "<span>".$row["morningstar"]."x </span> morning star <span>( <i class='lightred'>+7</i> str, <i class='blue'>+3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmorningstar']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell morning star' />
			</div>";}			
	if ($row["samuraisword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "samurai sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip samurai sword' /> ";}
		echo "<span>".$row["samuraisword"]."x </span> samurai sword <span>( <i class='lightred'>+8</i> str )</span>
 			<span class='sellPrice'>".$_SESSION['COSTsamuraisword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell samurai sword' />
			</div>";}		
	if ($row["gladius"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "gladius" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gladius' /> ";}
		echo "<span>".$row["gladius"]."x </span> gladius <span>( <i class='lightred'>+9</i> str, <i class='blue'>+2</i> mag, <i class='gold'>+2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgladius']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gladius' />
			</div>";}	
	
	
	if ($row["basicstaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "basic staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip basic staff' /> ";}
		echo "<span>".$row["basicstaff"]."x </span> basic staff <span>( <i class='blue'>+3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbasicstaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell basic staff' />
		</div>";}	
	if ($row["woodenstaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "wooden staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wooden staff' /> ";}
		echo "<span>".$row["woodenstaff"]."x </span> <span class='lightbrown'>wooden </span> staff <span>( <i class='blue'>+5</i> mag, <i class='lightred'>+1</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTwoodenstaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell wooden staff' />
		</div>";}
	if ($row["wand"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "wand" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wand' /> ";}
		echo "<span>".$row["wand"]."x </span> wand <span>( <i class='blue'>+9</i> mag, <i class='black'>-2</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTwand']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell wand' />
		</div>";}	
	if ($row["wizardstaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "wizard staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wizard staff' /> ";}
		echo "<span>".$row["wizardstaff"]."x </span> wizard staff <span>( <i class='blue'>+8</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTwizardstaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell wizard staff' />
		</div>";}	
	if ($row["demondagger"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "demon dagger" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip demon dagger' /> ";}
		echo "<span>".$row["demondagger"]."x </span> demon dagger <span>( <i class='blue'>+10</i> mag, <i class='lightred'>+5</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTdemondagger']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell demon dagger' />
		</div>";}										
	if ($row["graywand"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "gray wand" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gray wand' /> ";}
		echo "<span>".$row["graywand"]."x </span> <span class='lightergray'> gray </span> wand <span>( <i class='blue'>+15</i> mag, <i class='black'>-5</i> str, <i class='black'>-5</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgraywand']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gray wand' /> 
		</div>";}	
	
	
	if ($row["threechainedflail"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "three-chained flail" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip three-chained flail' /> ";}
		echo "<span>".$row["threechainedflail"]."x </span> three-chained flail <span>( <i class='lightred'>+9</i> str, <i class='gold'>+9</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTthreechainedflail']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell three-chained flail' /> </div>";}	
	if ($row["bastardsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "bastard sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bastard sword' /> ";}
		echo "<span>".$row["bastardsword"]."x </span> bastard sword <span>( <i class='lightred'>+11</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbastardsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bastard sword' /> </div>";}	
	if ($row["giantclub"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "giant club" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip giant club' /> ";}
		echo "<span>".$row["giantclub"]."x </span> giant club <span>( <i class='lightred'>+13</i> str, <i class='black'>-3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgiantclub']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell giant club' /> </div>";}	
	if ($row["greatwhitesword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "great white sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip great white sword' /> ";}
		echo "<span>".$row["greatwhitesword"]."x </span> <span class='lightblue'> great white </span> sword <span>( <i class='lightred'>+17</i> str, <i class='blue'>+7</i> mag, <i class='gold'>+7</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreatwhitesword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell great white sword' /> </div>";}	
		
		
		

if ($row["masterblade"] > 0) {
		echo "<div>";
		if ($row["equipR"] == "master blade" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip master blade' /> ";}
		echo "<span>".$row["masterblade"]."x </span> <span class='gold'>master blade</span> <span>( <i class='lightred'>+200</i> str, <i class='gold'>+100</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTmasterblade']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell master blade' /> </div>";}			

		
	echo '-';
// ------------------------------------------------------------------------------------------------- 1H iron Tier
					
	
	if ($row["irondagger"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron dagger" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron dagger' /> ";}
		echo "<span>".$row["irondagger"]."x </span> <span class='lightbrown'> iron </span> dagger <span>( <i class='lightred'>+7</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTirondagger']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron dagger' /> </div>";}
	if ($row["ironsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron sword' /> ";}
		echo "<span>".$row["ironsword"]."x </span> <span class='lightbrown'> iron </span> sword <span>( <i class='lightred'>+18</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron sword' /> </div>";}
	if ($row["ironstaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron staff' /> ";}
		echo "<span>".$row["ironstaff"]."x </span> <span class='lightbrown'> iron </span> staff <span>( <i class='blue'>+10</i> mag, <i class='lightred'>+3</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironstaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron staff' /> </div>";}				
	if ($row["poisonsaber"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "poison saber" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip poison saber' /> ";}
		echo "<span>".$row["poisonsaber"]."x </span> <span class='green'> poison </span> saber <span>( <i class='lightred'>+18</i> str, <i class='blue'>+3</i> mag,  <i class='green px10'>poison<i class='px12 green'>5</i></i> )</span>
			<span class='sellPrice'>".$_SESSION['COSTpoisonsaber']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell poison saber' /> </div>";}				
if ($row["ulfberht"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "ulfberht" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ulfberht' /> ";}
		echo "<span>".$row["ulfberht"]."x </span> <span class='blue'> ulfberht </span> <span>( <i class='lightred'>+26</i> str, <i class='gold'>+26</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTulfberht']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell ulfberht' /> </div>";}				
if ($row["waraxe"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "war axe" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip war axe' /> ";}
		echo "<span>".$row["waraxe"]."x </span> <span class='lightred'> war </span> axe <span>( <i class='lightred'>+30</i> str, <i class='black'>-5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTwaraxe']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell war axe' /> </div>";}				
if ($row["perfectsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "perfect sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip perfect sword' /> ";}
		echo "<span>".$row["perfectsword"]."x </span> <span class='cyan'> perfect </span> sword <span>( <i class='cyan'>+25</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTperfectsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell perfect sword' /> </div>";}				
	
echo '-';
	
	if ($row["silversword"] > 0) {  
		echo "<div>";
		if ($row["equipR"] == "silver sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver sword' /> ";}
		echo "<span>".$row["silversword"]."x </span> <span class='lightblue'> silver </span> sword <span>( <i class='lightred'>+25</i> str, <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilversword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver sword' /> </div>";}
	if ($row["silverstaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "silver staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver staff' /> ";}
		echo "<span>".$row["silverstaff"]."x </span> <span class='lightblue'> silver </span> staff <span>( <i class='blue'>+25</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverstaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver staff' /> </div>";}	

	if ($row["steeldagger"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel dagger" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel dagger' /> ";}
		echo "<span>".$row["steeldagger"]."x </span> <span class='lightergray'> steel </span> dagger <span>( <i class='lightred'>+18</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteeldagger']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel dagger' /> </div>";}
	if ($row["steelsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel sword' /> ";}
		echo "<span>".$row["steelsword"]."x </span> <span class='lightergray'> steel </span> sword <span>( <i class='lightred'>+27</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel sword' /> </div>";}
	if ($row["steelstaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel staff' /> ";}
		echo "<span>".$row["steelstaff"]."x </span> <span class='lightergray'> steel </span> staff <span>( <i class='blue'>+22</i> mag, <i class='lightred'>+5</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelstaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel staff' /> </div>";}				

if ($row["silverwhip"] > 0) {
		echo "<div>";
		if ($row["equipR"] == "silver whip" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver whip' /> ";}
		echo "<span>".$row["silverwhip"]."x </span> <span class='lightblue'> silver </span> whip <span>( <i class='lightred'>+25</i> str, <i class='blue'>+25</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverwhip']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver whip' /> </div>";}

if ($row["kingsscepter"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "kings scepter" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip kings scepter' /> ";}
		echo "<span>".$row["kingsscepter"]."x </span> <span class='lightblue'> kings </span> scepter <span>( <i class='blue'>+35</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTkingsscepter']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell kings scepter' /> </div>";}





/*
*100k silver whip ( +25 str, +25 mag )		// only found in silver chest
25k sharp katana ( +45 str, -10 def )  		// jungle jim
50k kings scepter ( +35 mag )  		// troll king reward
50k forest saber ( +30 str, +10 mag ) 		// secret - find in dark forest
50k black blade ( +55 str, -10 mag ) 		// quest: bowman,highwayman*/







if ($row["sharpkatana"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "sharp katana" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip sharp katana' /> ";}
		echo "<span>".$row["sharpkatana"]."x </span> <span class='lightblue'> sharp </span> katana <span>( <i class='lightred'>+45</i> str, <i class='black'>-10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsharpkatana']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell sharp katana' /> </div>";}			


if ($row["blackblade"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "black blade" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip black blade' /> ";}
		echo "<span>".$row["blackblade"]."x </span> <span class='black'> black </span> blade <span>( <i class='lightred'>+55</i> str, <i class='black'>-10</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackblade']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell black blade' /> </div>";}		
			
			
if ($row["forestsaber"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "forest saber" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip forest saber' /> ";}
		echo "<span>".$row["forestsaber"]."x </span> <span class='green'> forest  saber </span><span>( <i class='lightred'>+30</i> str, <i class='blue'>+10</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTforestsaber']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell forest saber' /> </div>";}							
			
if ($row["flamberg"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "flamberg" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip flamberg' /> ";}
		echo "<span>".$row["flamberg"]."x </span>  flamberg <span>( <i class='lightred'>+50</i> str, <i class='blue'>+10</i> mag, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTflamberg']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell flamberg' /> </div>";}				
						
			
			
if ($row["guardianblade"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "guardian blade" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip guardian blade' /> ";}
		echo "<span>".$row["guardianblade"]."x </span> <span class='lightblue'> guardian </span> blade <span>( <i class='lightred'>+80</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTguardianblade']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell guardian blade' /> </div>";}				
			
				
echo '-';
	
	if ($row["gammaknife"] > 0) {  
		echo "<div>";
		if ($row["equipR"] == "gamma knife" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gamma knife' /> ";}
		echo "<span>".$row["gammaknife"]."x </span> <span class='pink'> gamma </span> knife <span>( <i class='lightred'>+30</i> str, <i class='blue'>+30</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgammaknife']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gamma knife' /> </div>";}			
				

				
				


		
echo "<h2>Shields<i>L</i></h2>";	


// ------------------------------------------------------------------------------------------------- SHIELDS

	if ($row["trainingshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "training shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip training shield' /> ";}
		echo "<span>".$row["trainingshield"]."x </span> training shield <span>( <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell training shield' />  </div>";}
	if ($row["basicshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "basic shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip basic shield' /> ";}
		echo "<span>".$row["basicshield"]."x </span> basic shield <span>( <i class='gold'>+7</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbasicshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell basic shield' />  </div>";}
	if ($row["kiteshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "kite shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip kite shield' /> ";}
		echo "<span>".$row["kiteshield"]."x </span> kite shield <span>( <i class='gold'>+20</i> def, <i class='black'>-5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTkiteshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell kite shield' />  </div>";}	
	if ($row["buckler"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "buckler" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip buckler' /> ";}
		echo "<span>".$row["buckler"]."x </span> buckler <span>( <i class='gold'>+5</i> def, <i class='lightred'>+2</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbuckler']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell buckler' />  </div>";}	
	if ($row["woodenshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "wooden shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wooden shield' /> ";}
		echo "<span>".$row["woodenshield"]."x </span> <span class='lightbrown'> wooden </span> shield <span>( <i class='gold'>+13</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTwoodenshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell wooden shield' />  </div>";}	
	if ($row["huntershield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "hunter shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip hunter shield' /> ";}
		echo "<span>".$row["huntershield"]."x </span> <span class='lightblue'> hunter </span> shield <span>( <i class='gold'>+10</i> def, <i class='lightred'>+3</i> str, <i class='green'>+3</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSThuntershield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell hunter shield' />  </div>";}	
	if ($row["offhanddagger"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "off hand dagger" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip off hand dagger' /> ";}
		echo "<span>".$row["offhanddagger"]."x </span> off hand dagger <span>( <i class='lightred'>+5</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSToffhanddagger']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell off hand dagger' />  </div>";}	
	if ($row["towershield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "tower shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip tower shield' /> ";}
		echo "<span>".$row["towershield"]."x </span> tower shield <span>( <i class='gold'>+12</i> def, <i class='blue'>+2</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTtowershield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell tower shield' />  </div>";}	
	if ($row["glowingorb"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "glowing orb" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip glowing orb' /> ";}
		echo "<span>".$row["glowingorb"]."x </span> glowing orb <span>( <i class='blue'>+3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTglowingorb']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell glowing orb' />  </div>";}
	if ($row["enchantedorb"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "enchanted orb" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip enchanted orb' /> ";}
		echo "<span>".$row["enchantedorb"]."x </span> enchanted orb <span>( <i class='blue'>+7</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTenchantedorb']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell enchanted orb' />  </div>";}	

echo '-';

	if ($row["ironshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "iron shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron shield' /> ";}
		echo "<span>".$row["ironshield"]."x </span> <span class='lightbrown'> iron </span> shield <span>( <i class='gold'>+25</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron shield' />  </div>";}	
	if ($row["ironkiteshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "iron kite shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron kite shield' /> ";}
		echo "<span>".$row["ironkiteshield"]."x </span> <span class='lightbrown'> iron </span> kite shield <span>( <i class='gold'>+40</i> def, <i class='black'>-10</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTironkiteshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron kite shield' />  </div>";}					
	if ($row["redshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "red shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip red shield' /> ";}
		echo "<span>".$row["redshield"]."x </span> <span class='lightred'> red </span> shield <span>( <i class='gold'>+25</i> def, <i class='lightred'>+5</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTredshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell red shield' />  </div>";}	
	if ($row["deathorb"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "death orb" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip death orb' /> ";}
		echo "<span>".$row["deathorb"]."x </span> <span class='black'>death </span> orb <span>( <i class='blue'>+10</i> mag, <i class='black'>-10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTdeathorb']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell death orb' />  </div>";}	
	if ($row["greenshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "green shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip green shield' /> ";}
		echo "<span>".$row["greenshield"]."x </span> <span class='green'> green </span> shield <span>( <i class='green'>+7</i> dex, <i class='gold'>+7</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell green shield' />  </div>";}	
	
echo '-';
	
	if ($row["silvershield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "silver shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver shield' /> ";}
		echo "<span>".$row["silvershield"]."x </span> <span class='lightblue'> silver </span> shield <span>( <i class='gold'>+50</i> def, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilvershield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver shield' />  </div>";}	
	if ($row["steelshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "steel shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel shield' /> ";}
		echo "<span>".$row["steelshield"]."x </span> <span class='lightblue'> steel </span> shield <span>( <i class='gold'>+55</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel shield' />  </div>";}	
	if ($row["steelkiteshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "steel kite shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel kite shield' /> ";}
		echo "<span>".$row["steelkiteshield"]."x </span> <span class='lightblue'> steel </span> kite shield <span>( <i class='gold'>+80</i> def, <i class='black'>-20</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelkiteshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel kite shield' />  </div>";}	
	if ($row["vikingshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "viking shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip viking shield' /> ";}
		echo "<span>".$row["vikingshield"]."x </span> <span class='lightblue'> viking </span> shield <span>( <i class='gold'>+50</i> def, <i class='lightred'>+8</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTvikingshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell viking shield' />  </div>";}	
	if ($row["greenorb"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "green orb" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip green orb' /> ";}
		echo "<span>".$row["greenorb"]."x </span> <span class='green'>green </span> orb <span>( <i class='green'>+15</i> dex, <i class='black'>-15</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenorb']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell green orb' />  </div>";}	
	if ($row["offhandsword"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "off hand sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip off hand sword' /> ";}
		echo "<span>".$row["offhandsword"]."x </span> off hand sword <span>( <i class='lightred'>+10</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSToffhandsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell off hand sword' />  </div>";}	
if ($row["riotshield"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "riot shield" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip riot shield' /> ";}
		echo "<span>".$row["riotshield"]."x </span> <span class='black'>riot</span> shield <span>( <i class='gold'>+1000</i> def, <i class='black'>-1000</i> str,dex, mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTriotshield']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell riot shield' />  </div>";}	
	
echo '-';

	
if ($row["offhandmace"] > 0) { 
		echo "<div>";
		if ($row["equipL"] == "off hand mace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip off hand mace' /> ";}
		echo "<span>".$row["offhandmace"]."x </span> off hand mace <span>( <i class='lightred'>+25</i> str, <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSToffhandmace']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell off hand mace' />  </div>";}		

echo '-';

	



// ------------------------------------------------------------------------------------------------- 2h 


echo "<h2>2h Weapons<i>R+L</i></h2>";	
	
		if ($row["training2hsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "training 2h sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip training 2h sword' /> ";}
		echo "<span>".$row["training2hsword"]."x </span> training 2h sword <span>( <i class='lightred'>+6</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTtraining2hsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell training 2h sword' />  </div>";}
	if ($row["bo"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "bo" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bo' /> ";}
		echo "<span>".$row["bo"]."x </span> bo <span>( <i class='lightred'>+7</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbo']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bo' /></div>";}	
	if ($row["battleaxe"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "battle axe" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip battle axe' /> ";}
		echo "<span>".$row["battleaxe"]."x </span> battle axe <span>( <i class='lightred'>+10</i> str, <i class='black'>-2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbattleaxe']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell battle axe' /></div>";}
	if ($row["warhammer"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "warhammer" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip warhammer' /> ";}
		echo "<span>".$row["warhammer"]."x </span> warhammer <span>( <i class='lightred'>+12</i> str, <i class='black'>-5</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTwarhammer']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell warhammer' /></div>";}	
	
	
	
	if ($row["woodenbo"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "wooden bo" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wooden bo' /> ";}
		echo "<span>".$row["woodenbo"]."x </span> <span class='lightbrown'> wooden </span> bo <span>( <i class='lightred'>+9</i> str, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTwoodenbo']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell wooden bo' /></div>";}	
	if ($row["pike"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "pike" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip pike' /> ";}
		echo "<span>".$row["pike"]."x </span> pike <span>( <i class='lightred'>+11</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTpike']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell pike' /></div>";}	
	if ($row["claymore"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "claymore" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip claymore' /> ";}
		echo "<span>".$row["claymore"]."x </span> claymore <span>( <i class='lightred'>+13</i> str, <i class='blue'>+2</i> mag, <i class='gold'>+2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTclaymore']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell claymore' /></div>";}	
	
	if ($row["greatsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "great sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip great sword' /> ";}
		echo "<span>".$row["greatsword"]."x </span> great sword <span>( <i class='lightred'>+17</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreatsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell great sword' /></div>";}	
	
	
	
	
	if ($row["bostaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "bo staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bo staff' /> ";}
		echo "<span>".$row["bostaff"]."x </span> bo staff <span>( <i class='blue'>+4</i> mag, <i class='lightred'>+4</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbostaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bo staff' /></div>";}	
	if ($row["battlestaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "battle staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip battle staff' /> ";}
		echo "<span>".$row["battlestaff"]."x </span> battle staff <span>( <i class='blue'>+6</i> mag, <i class='lightred'>+6</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTbattlestaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell battle staff' /></div>";}	
	if ($row["dualtomahawk"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "dual tomahawk" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip dual tomahawk' /> ";}
		echo "<span>".$row["dualtomahawk"]."x </span> dual tomahawk <span>( <i class='blue'>+9</i> mag, <i class='lightred'>+9</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTdualtomahawk']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell dual tomahawk' /></div>";}			
	
if ($row["nunchaku"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "nunchaku" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip nunchaku' /> ";}
		echo "<span>".$row["nunchaku"]."x </span> nunchaku <span>( <i class='blue'>+13</i> mag, <i class='lightred'>+13</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTnunchaku']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell nunchaku' /></div>";}	
		
	if ($row["brassknuckles"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "brass knuckles" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip brass knuckles' /> ";}
		echo "<span>".$row["brassknuckles"]."x </span> brass knuckles <span>( <i class='lightred'>+16</i> str, <i class='blue'>+3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbrassknuckles']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell brass knuckles' /></div>";}					
	if ($row["polearm"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "polearm" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip polearm' /> ";}
		echo "<span>".$row["polearm"]."x </span> polearm <span>( <i class='lightred'>+16</i> str, <i class='gold'>+20</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTpolearm']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell polearm' /></div>";}			
	if ($row["bonecudgel"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "bone cudgel" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bone cudgel' /> ";}
		echo "<span>".$row["bonecudgel"]."x </span> bone cudgel <span>( <i class='lightred'>+32</i> str, <i class='black'>-10</i> mag, <i class='black'>-10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbonecudgel']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bone cudgel' /></div>";}			
	if ($row["hammerheadhammer"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "hammerhead hammer" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip hammerhead hammer' /> ";}
		echo "<span>".$row["hammerheadhammer"]."x </span> <span class='lightblue'> hammerhead </span> hammer 
				<span>( <i class='lightred'>+35</i> str, <i class='blue'>+10</i> mag, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSThammerheadhammer']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell hammerhead hammer' /></div>";}	
	
	echo '-';

	
	
	
	if ($row["ironmaul"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron maul" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron maul' /> ";}
		echo "<span>".$row["ironmaul"]."x </span> <span class='lightbrown'> iron </span> maul <span>( 
		<i class='lightred'>+22</i> str, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironmaul']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron maul' /></div>";}	
	if ($row["iron2hsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron 2h sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron 2h sword' /> ";}
		echo "<span>".$row["iron2hsword"]."x </span> <span class='lightbrown'> iron </span> 2h sword <span>( 
		<i class='lightred'>+25</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTiron2hsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron 2h sword' /></div>";}				
	if ($row["ironbattlestaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron battle staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron battle staff' /> ";}
		echo "<span>".$row["ironbattlestaff"]."x </span>  <span class='lightbrown'> iron </span> battle staff <span>( 
		<i class='blue'>+12</i> mag, <i class='lightred'>+12</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironbattlestaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron battle staff' /></div>";}	
	
	if ($row["ironnunchaku"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron nunchaku" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron nunchaku' /> ";}
		echo "<span>".$row["ironnunchaku"]."x </span> <span class='lightbrown'> iron </span> nunchaku <span>( 
		<i class='blue'>+25</i> mag, <i class='lightred'>+25</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironnunchaku']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron nunchaku' /></div>";}	
	
	if ($row["greataxe"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "great axe" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip great axe' /> ";}
		echo "<span>".$row["greataxe"]."x </span> <span class='lightblue'>great </span> axe <span>( 
		<i class='lightred'>+50</i> str, <i class='black'>-10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreataxe']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell great axe' /></div>";}

	if ($row["trident"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "trident" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip trident' /> ";}
		echo "<span>".$row["trident"]."x </span> <span class='gold'>trident</span> <span>( <i class='lightred'>+45</i> str, <i class='blue'>+15</i> mag, <i class='gold'>+15</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrident']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell trident' /></div>";}				
	if ($row["solomonsstaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "solomon's staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip solomons staff' /> ";}
		echo "<span>".$row["solomonsstaff"]."x </span> <span class='lightblue'>solomon's</span> staff <span>( <i class='blue'>+45</i> mag, <i class='black'>-15</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsolomonsstaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell solomons staff' /></div>";}	
	
		if ($row["oakbattlestaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "oak battle staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip oak battle staff' /> ";}
		echo "<span>".$row["oakbattlestaff"]."x </span> <span class='lightbrown'> oak </span> battle staff <span>( <i class='blue'>+30</i> mag, <i class='lightred'>+30</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSToakbattlestaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell oak battle staff' /></div>";}				
	
	if ($row["jimbo"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "jim bo" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip jim bo' /> ";}
		echo "<span>".$row["jimbo"]."x </span> <span class='green'> jim </span> bo <span>( <i class='lightred'>+45</i> str, <i class='green px10'>poison<i class='px12 green'>5</i></i> )</span>
			<span class='sellPrice'>".$_SESSION['COSTjimbo']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell jim bo' />  </div>";}
		
		
	echo '-';
				
	if ($row["silver2hsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "silver 2h sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver 2h sword' /> ";}
		echo "<span>".$row["silver2hsword"]."x </span> <span class='lightblue'> silver </span> 2h sword <span>( <i class='lightred'>+45</i> str, <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilver2hsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver 2h sword' /></div>";}				
	
	if ($row["steel2hsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel 2h sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel 2h sword' /> ";}
		echo "<span>".$row["steel2hsword"]."x </span> <span class='gray'> steel </span> 2h sword <span>( <i class='lightred'>+50</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteel2hsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel 2h sword' /></div>";}				
	
	if ($row["steelbattlestaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel battle staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel battle staff' /> ";}
		echo "<span>".$row["steelbattlestaff"]."x </span> <span class='gray'> steel </span> battle staff <span>( <i class='blue'>+24</i> mag, <i class='lightred'>+24</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelbattlestaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel battle staff' /></div>";}				
	
	if ($row["steelnunchaku"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel nunchaku" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel nunchaku' /> ";}
		echo "<span>".$row["steelnunchaku"]."x </span> <span class='gray'> steel </span> nunchaku <span>( 
		<i class='blue'>+40</i> mag, <i class='lightred'>+40</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelnunchaku']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel nunchaku' /></div>";}	
	

	if ($row["heavykatana"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "heavy katana" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip heavy katana' /> ";}
		echo "<span>".$row["heavykatana"]."x </span> <span class='lightblue'>heavy </span> katana <span>( 
		<i class='lightred'>+90</i> str, <i class='black'>-20</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTheavykatana']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell heavy katana' /></div>";}

	if ($row["heavyspear"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "heavy spear" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip heavy spear' /> ";}
		echo "<span>".$row["heavyspear"]."x </span> <span class='lightblue'>heavy </span> spear <span>( 
		<i class='lightred'>+40</i> str, <i class='gold'>+60</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTheavyspear']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell heavy spear' /></div>";}

	if ($row["heavyhammer"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "heavy hammer" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip heavy hammer' /> ";}
		echo "<span>".$row["heavyhammer"]."x </span> <span class='lightblue'>heavy </span> hammer <span>( 
		<i class='lightred'>+120</i> str, <i class='black'>-40</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTheavyhammer']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell heavy hammer' /></div>";}

	if ($row["oakwarhammer"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "oak warhammer" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip oak warhammer' /> ";}
		echo "<span>".$row["oakwarhammer"]."x </span> <span class='lightbrown'>oak </span> warhammer <span>( 
		<i class='lightred'>+85</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSToakwarhammer']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell oak warhammer' /></div>";}

if ($row["bardiche"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "bardiche" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bardiche' /> ";}
		echo "<span>".$row["bardiche"]."x </span> bardiche <span>( <i class='lightred'>+110</i> str, <i class='black'>-30</i> mag, <i class='black'>-30</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbardiche']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bardiche' /></div>";}				
	
if ($row["glaive"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "glaive" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip glaive' /> ";}
		echo "<span>".$row["glaive"]."x </span> glaive <span>( <i class='lightred'>+80</i> str, <i class='gold'>+80</i> def  )</span>
			<span class='sellPrice'>".$_SESSION['COSTglaive']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell glaive' /></div>";}				
	
if ($row["perfect2hsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "perfect 2h sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip perfect 2h sword' /> ";}
		echo "<span>".$row["perfect2hsword"]."x </span> <span class='cyan'>perfect </span> 2h sword <span>( 
		<i class='cyan'>+75</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTperfect2hsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell perfect 2h sword' /></div>";}
	
	echo '-';
	
if ($row["mithril2hsword"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mithril 2h sword" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mithril 2h sword' /> ";}
		echo "<span>".$row["mithril2hsword"]."x </span> <span class='blue'> mithril </span> 2h sword <span>( <i class='lightred'>+100</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithril2hsword']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mithril 2h sword' /></div>";}				
	
	if ($row["mithrilbattlestaff"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mithril battle staff" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mithril battle staff' /> ";}
		echo "<span>".$row["mithrilbattlestaff"]."x </span> <span class='blue'> mithril </span> battle staff <span>( <i class='blue'>+45</i> mag, <i class='lightred'>+45</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilbattlestaff']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mithril battle staff' /></div>";}				
	
	if ($row["mithrilnunchaku"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mithril nunchaku" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mithril nunchaku' /> ";}
		echo "<span>".$row["mithrilnunchaku"]."x </span> <span class='blue'> mithril </span> nunchaku <span>( 
		<i class='blue'>+60</i> mag, <i class='lightred'>+60</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilnunchaku']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mithril nunchaku' /></div>";}		
	
if ($row["humongousbattleaxe"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "humongous battleaxe" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip humongous battleaxe' /> ";}
		echo "<span>".$row["humongousbattleaxe"]."x </span> <span class='lightblue'>humongous </span> battleaxe <span>( 
		<i class='lightred'>+150</i> str, <i class='black'>-50</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSThumongousbattleaxe']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell humongous battleaxe' /></div>";}


if ($row["gargantuanwarhammer"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "gargantuan warhammer" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gargantuan warhammer' /> ";}
		echo "<span>".$row["gargantuanwarhammer"]."x </span> <span class='lightblue'>gargantuan </span> warhammer <span>( 
		<i class='lightred'>+250</i> str, <i class='black'>-100</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgargantuanwarhammer']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gargantuan warhammer' /></div>";}


	if ($row["blessedspear"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "blessed spear" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip blessed spear' /> ";}
		echo "<span>".$row["blessedspear"]."x </span> <span class='lightblue'>blessed </span> spear <span>( 
		<i class='lightred'>+80</i> str, <i class='blue'>+40</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblessedspear']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell blessed spear' /></div>";}
	
	
if ($row["fortifiedfauchard"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "fortified fauchard" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip fortified fauchard' /> ";}
		echo "<span>".$row["fortifiedfauchard"]."x </span> <span class='gold'>fortified </span> fauchard <span>( 
		<i class='lightred'>+120</i> str, <i class='gold'>+120</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTfortifiedfauchard']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell fortified fauchard' /></div>";}	
	
	
	echo '-';
	
	
	// ------------------------------------------------------------------------------------------------- RANGED
	
echo "<h2>Ranged <span class='gold px10'>";
if ($row["arrows"] > 0) { echo " <span class='px12 gray'> ".$row["arrows"]."x </span> arrows  ";}	if ($row["bolts"] > 0) { echo " <span class='px12 gray'> ".$row["bolts"]."x </span> bolts ";}	
echo " </span>
<i>R / R+L</i></h2>";	

	if ($row["boomerang"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "boomerang" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip boomerang' /> ";}
		echo "<span>".$row["boomerang"]."x </span> boomerang <span>( <i class='green'>+1</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTboomerang']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell boomerang' />  </div>";}
	if ($row["woodenbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "wooden bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wooden bow' /> ";}
		echo "<span>".$row["woodenbow"]."x </span> <span class='lightbrown'> wooden </span> bow <span>( <i class='green'>+8</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTwoodenbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell wooden bow' />  </div>";}
	
	if ($row["hunterbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "hunter bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip hunter bow' /> ";}
		echo "<span>".$row["hunterbow"]."x </span> hunter bow <span>( <i class='green'>+9</i> dex, <i class='gold'>+5</i> def )</span>
					<span class='sellPrice'>".$_SESSION['COSThunterbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell hunter bow' />  </div>";}
	if ($row["longbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "long bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip long bow' /> ";}
		echo "<span>".$row["longbow"]."x </span> long bow <span>( <i class='green'>+11</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTlongbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell long bow' />  </div>";}
	
	
	
	if ($row["crossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip crossbow' /> ";}
		echo "<span>".$row["crossbow"]."x </span> crossbow <span>( <i class='green'>+13</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTcrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell crossbow' />  </div>";}			
	if ($row["javelin"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "javelin" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip javelin' /> ";}
		echo "<span>".$row["javelin"]."x </span> javelin <span>( <i class='green'>+25</i> dex )</span>  </div>";}
	
	
echo '-';
	
	if ($row["ironboomerang"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron boomerang" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron boomerang' /> ";}
		echo "<span>".$row["ironboomerang"]."x </span> <span class='lightbrown'> iron </span> boomerang <span>( <i class='green'>+10</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTironboomerang']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron boomerang' />  </div>";}
	if ($row["harpoon"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "harpoon" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip harpoon' /> ";}
		echo "<span>".$row["harpoon"]."x </span> harpoon <span>( <i class='green'>+8</i> dex, <i class='blue'>+4</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTharpoon']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell harpoon' />  </div>";}
	if ($row["ironchakram"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron chakram" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron chakram' /> ";}
		echo "<span>".$row["ironchakram"]."x </span> <span class='lightbrown'> iron </span> chakram <span>( <i class='green'>+15</i> dex, <i class='blue'>+15</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTironchakram']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron chakram' />  </div>";}
	
	if ($row["ironbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron bow' /> ";}
		echo "<span>".$row["ironbow"]."x </span> <span class='lightbrown'> iron </span> bow <span>( <i class='green'>+20</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTironbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron bow' />  </div>";}
	
	
	if ($row["enchantedbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "enchanted bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip enchanted bow' /> ";}
		echo "<span>".$row["enchantedbow"]."x </span> <span class='pink'> enchanted </span> bow <span>( <i class='green'>+25</i> dex, <i class='blue'>+10</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTenchantedbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell enchanted bow' />  </div>";}
	
	
	if ($row["jimbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "jim bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip jim bow' /> ";}
		echo "<span>".$row["jimbow"]."x </span> <span class='green'> jim </span> bow <span>( <i class='green'>+25</i> dex, <i class='green px10'>poison<i class='px12 green'>5</i></i> )</span>
			<span class='sellPrice'>".$_SESSION['COSTjimbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell jim bow' />  </div>";}
	
	
	
	if ($row["ironcrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron crossbow' /> ";}
		echo "<span>".$row["ironcrossbow"]."x </span> <span class='lightbrown'> iron </span> crossbow <span>( <i class='green'>+30</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTironcrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron crossbow' />  </div>";}
	if ($row["handcrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "hand crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip hand crossbow' /> ";}
		echo "<span>".$row["handcrossbow"]."x </span> <span class='lightblue'>hand </span> crossbow <span>( <i class='green'>+35</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSThandcrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell hand crossbow' />  </div>";}		
	if ($row["compoundcrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "compound crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip compound crossbow' /> ";}
		echo "<span>".$row["compoundcrossbow"]."x </span> <span class='black'>compound </span> crossbow <span>( <i class='green'>+40</i> dex, <i class='gold'>+80</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTcompoundcrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell compound crossbow' />  </div>";}	
	if ($row["ironjavelin"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "iron javelin" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron javelin' /> ";}
		echo "<span>".$row["ironjavelin"]."x </span> <span class='lightbrown'> iron </span> javelin <span>( <i class='green'>+50</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTironjavelin']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron javelin' />  </div>";}
					

echo '-';

	if ($row["silverboomerang"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "silver boomerang" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver boomerang' /> ";}
		echo "<span>".$row["silverboomerang"]."x </span> <span class='lightblue'> silver </span> boomerang <span>( <i class='green'>+20</i> dex, <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverboomerang']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver boomerang' />  </div>";}
	if ($row["silverbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "silver bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver bow' /> ";}
		echo "<span>".$row["silverbow"]."x </span> <span class='lightblue'> silver </span> bow <span>( <i class='green'>+30</i> dex, <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver bow' />  </div>";}
	if ($row["silvercrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "silver crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver crossbow' /> ";}
		echo "<span>".$row["silvercrossbow"]."x </span> <span class='lightblue'> silver </span> crossbow <span>( <i class='green'>+40</i> dex, <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilvercrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver crossbow' />  </div>";}			
	
	if ($row["steelboomerang"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel boomerang" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel boomerang' /> ";}
		echo "<span>".$row["steelboomerang"]."x </span> <span class='gray'> steel </span> boomerang <span>( <i class='green'>+22</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelboomerang']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel boomerang' />  </div>";}
	if ($row["steelbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel bow' /> ";}
		echo "<span>".$row["steelbow"]."x </span> <span class='gray'> steel </span> bow <span>( <i class='green'>+33</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel bow' />  </div>";}
	if ($row["steelcrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel crossbow' /> ";}
		echo "<span>".$row["steelcrossbow"]."x </span> <span class='gray'> steel </span> crossbow <span>( <i class='green'>+44</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelcrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel crossbow' />  </div>";}			
	if ($row["steeljavelin"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel javelin" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel javelin' /> ";}
		echo "<span>".$row["steeljavelin"]."x </span> <span class='gray'> steel </span> javelin <span>( <i class='green'>+100</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteeljavelin']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel javelin' />  </div>";}			
	
	if ($row["steelchakram"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "steel chakram" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel chakram' /> ";}
		echo "<span>".$row["steelchakram"]."x </span> <span class='gray'> steel </span> chakram <span>( <i class='green'>+25</i> dex, <i class='blue'>+25</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelchakram']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel chakram' />  </div>";}			
	
	if ($row["snowbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "snow bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip snow bow' /> ";}
		echo "<span>".$row["snowbow"]."x </span> <span class='white'> snow </span> bow <span>( <i class='green'>+45</i> dex, <i class='blue'>+15</i> mag, <i class='gold'>+15</i> def</span>
			<span class='sellPrice'>".$_SESSION['COSTsnowbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell snow bow' />  </div>";}			
	
	if ($row["rangerbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "ranger bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ranger bow' /> ";}
		echo "<span>".$row["rangerbow"]."x </span> <span class='green'> ranger </span> bow <span>( <i class='green'>+50</i> dex, <i class='blue'>+25</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangerbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell ranger bow' />  </div>";}
	if ($row["keeperscrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "keeper's crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip keepers crossbow' /> ";}
		echo "<span>".$row["keeperscrossbow"]."x </span> <span class='black'> keeper's </span> crossbow <span>( <i class='green'>+90</i> dex, <i class='black'>-50</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTkeeperscrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell keepers crossbow' />  </div>";}			
	
	
echo '-';
	
	

	if ($row["mithrilboomerang"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mithril boomerang" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mithril boomerang' /> ";}
		echo "<span>".$row["mithrilboomerang"]."x </span> <span class='blue'> mithril </span> boomerang <span>( <i class='green'>+40</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilboomerang']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mithril boomerang' />  </div>";}
	if ($row["mithrilbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mithril bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mithril bow' /> ";}
		echo "<span>".$row["mithrilbow"]."x </span> <span class='blue'> mithril </span> bow <span>( <i class='green'>+60</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mithril bow' />  </div>";}
	if ($row["mithrilcrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mithril crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mithril crossbow' /> ";}
		echo "<span>".$row["mithrilcrossbow"]."x </span> <span class='blue'> mithril </span> crossbow <span>( <i class='green'>+80</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilcrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mithril crossbow' />  </div>";}			
	if ($row["mithriljavelin"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mithril javelin" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mithril javelin' /> ";}
		echo "<span>".$row["mithriljavelin"]."x </span> <span class='blue'> mithril </span> javelin <span>( <i class='green'>+200</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithriljavelin']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mithril javelin' />  </div>";}			
	
	if ($row["mithrilchakram"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "mithril chakram" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mithril chakram' /> ";}
		echo "<span>".$row["mithrilchakram"]."x </span> <span class='blue'> mithril </span> chakram <span>( <i class='green'>+40</i> dex, <i class='blue'>+40</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmithrilchakram']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mithril chakram' />  </div>";}		
	
echo '-';

	

	if ($row["blackboomerang"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "black boomerang" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip black boomerang' /> ";}
		echo "<span>".$row["blackboomerang"]."x </span> <span class='black'> black </span> boomerang <span>( <i class='green'>+60</i> dex, <i class='blue'>+10</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackboomerang']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell black boomerang' />  </div>";}
	if ($row["blackbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "black bow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip black bow' /> ";}
		echo "<span>".$row["blackbow"]."x </span> <span class='black'> black </span> bow <span>( <i class='green'>+120</i> dex, <i class='blue'>+40</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell black bow' />  </div>";}
	if ($row["blackcrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "black crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip black crossbow' /> ";}
		echo "<span>".$row["blackcrossbow"]."x </span> <span class='black'> black </span> crossbow <span>( <i class='green'>+150</i> dex, <i class='gold'>+50</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackcrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell black crossbow' />  </div>";}	
	if ($row["rangercrossbow"] > 0) { 
		echo "<div>";
		if ($row["equipR"] == "ranger crossbow" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ranger crossbow' /> ";}
		echo "<span>".$row["rangercrossbow"]."x </span> <span class='green'> ranger </span> crossbow <span>( <i class='green'>+250</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangercrossbow']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell ranger crossbow' />  </div>";}	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	echo '<div><input type="submit" name="input1" value="unequip all" /></div><br>';
	
	echo "</section>";
	
	
	  
	echo "<section data-pop2='armor'  class='panel' id='armor'>";
	

	
	
	
	echo "
	<h2>Head</h2>";	


	if ($row["traininghelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "training helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip training helmet' /> ";}
		echo "<span>".$row["traininghelmet"]."x </span> training helmet <span>( <i class='gold'>+2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtraininghelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell training helmet' />  </div>";}
	if ($row["basichelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "basic helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip basic helmet' /> ";}
		echo "<span>".$row["basichelmet"]."x </span> basic helmet <span>( <i class='gold'>+5</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbasichelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell basic helmet' />  </div>";}
	if ($row["basichood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "basic hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip basic hood' /> ";}
		echo "<span>".$row["basichood"]."x </span> basic hood <span>( <i class='lightred'>+1</i> str, <i class='green'>+1</i> dex, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbasichood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell basic hood' />  </div>";}
	if ($row["redhood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "red hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip red hood' /> ";}
		echo "<span>".$row["redhood"]."x </span> red hood <span>( <i class='lightred'>+2</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTredhood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell red hood' />  </div>";}
	if ($row["greenhood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "green hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip green hood' /> ";}
		echo "<span>".$row["greenhood"]."x </span> green hood <span>( <i class='green'>+2</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenhood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell green hood' />  </div>";}
	if ($row["bluehood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "blue hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip blue hood' /> ";}
		echo "<span>".$row["bluehood"]."x </span> blue hood <span>( <i class='blue'>+2</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbluehood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell blue hood' />  </div>";}
	if ($row["leatherhood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "leather hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip leather hood' /> ";}
		echo "<span>".$row["leatherhood"]."x </span> <span class='lightbrown'> leather </span> hood <span>( <i class='green'>+4</i> dex, <i class='gold'>+4</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleatherhood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell leather hood' />  </div>";}
	if ($row["leatherhelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "leather helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip leather helmet' /> ";}
		echo "<span>".$row["leatherhelmet"]."x </span> <span class='lightbrown'> leather </span> helmet <span>( <i class='lightred'>+2</i> str, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleatherhelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell leather helmet' />  </div>";}	
	if ($row["hornedhelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "horned helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip horned helmet' /> ";}
		echo "<span>".$row["hornedhelmet"]."x </span> horned helmet <span>( <i class='lightred'>+5</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSThornedhelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell horned helmet' />  </div>";}	
	if ($row["barbarianhelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "barbarian helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip barbarian helmet' /> ";}
		echo "<span>".$row["barbarianhelmet"]."x </span> barbarian helmet <span>( <i class='lightred'>+8</i> str, <i class='black'>-3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbarbarianhelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell barbarian helmet' />  </div>";}	
	
	if ($row["grayhood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "gray hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gray hood' /> ";}
		echo "<span>".$row["grayhood"]."x </span> <span class='gray'>gray</span> hood <span>( <i class='blue'>+4</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgrayhood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gray hood' />  </div>";}
	if ($row["wizardhat"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "wizard hat" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wizard hat' /> ";}
		echo "<span>".$row["wizardhat"]."x </span> <span class='lightpurple'>wizard</span> hat <span>( <i class='blue'>+5</i> mag, <i class='black'>-2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTwizardhat']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell wizard hat' />  </div>";}	
	if ($row["battlehelm"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "battle helm" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip battle helm' /> ";}
		echo "<span>".$row["battlehelm"]."x </span> <span class='lightbrown'>battle </span> helm <span>( <i class='lightred'>+4</i> str, <i class='gold'>+4</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbattlehelm']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell battle helm' /></div>";}	
	if ($row["victoriashood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "victoria's hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip victorias hood' /> ";}
		echo "<span>".$row["victoriashood"]."x </span> <span class='lightblue'> victoria's </span> hood <span>( <i class='blue'>+6</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTvictoriashood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell victorias hood' />  </div>";}
	if ($row["scorpionhood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "scorpion hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip scorpion hood' /> ";}
		echo "<span>".$row["scorpionhood"]."x </span> <span class='lightred'> scorpion </span> hood <span>( <i class='lightred'>+7</i> str, <i class='blue'>+5</i> mag, <i class='gold'>+5</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTscorpionhood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell scorpion hood' />  </div>";}
	
echo '-';
	if ($row["ironhood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "iron hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron hood' /> ";}
		echo "<sp2an>".$row["ironhood"]."x </span> <span class='lightbrown'>iron </span> hood  <span>( <i class='lightred'>+3</i> str, <i class='green'>+3</i> dex, <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironhood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron hood' />  </div>";}		
	if ($row["ironhelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "iron helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron helmet' /> ";}
		echo "<span>".$row["ironhelmet"]."x </span> <span class='lightbrown'>iron </span> helmet  <span>( <i class='gold'>+20</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironhelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron helmet' />  </div>";}		
	if ($row["hauntedhelm"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "haunted helm" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip haunted helm' /> ";}
		echo "<span>".$row["hauntedhelm"]."x </span> <span class='lightblue'>haunted </span> helm <span>( <i class='blue'>+5</i> mag, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSThauntedhelm']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell haunted helm' />  </div>";}		
	
	if ($row["bandithood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "bandit hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bandit hood' /> ";}
		echo "<span>".$row["bandithood"]."x </span> <span class='black'>bandit </span> hood <span>(  <i class='green'>+8</i> dex, <i class='gold'>+8</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbandithood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bandit hood' />  </div>";}		
	if ($row["calamaricap"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "calamari cap" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip calamari cap' /> ";}
		echo "<span>".$row["calamaricap"]."x </span> <span class='green'>calamari </span> cap <span>( <i class='cyan'>+4</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTcalamaricap']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell calamari cap' />  </div>";}		
	if ($row["heavyhelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "heavy helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip heavy helmet' /> ";}
		echo "<span>".$row["heavyhelmet"]."x </span> <span class='lightblue'>heavy </span> helmet <span>( <i class='lightred'>+10</i> str, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTheavyhelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell heavy helmet' />  </div>";}		
	if ($row["kettlehelm"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "kettle helm" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip kettle helm' /> ";}
		echo "<span>".$row["kettlehelm"]."x </span> <span class='gold'>kettle </span> helm <span>( <i class='gold'>+65</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTkettlehelm']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell kettle helm' />  </div>";}		
	if ($row["perfecthelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "perfect helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip perfect helmet' /> ";}
		echo "<span>".$row["perfecthelmet"]."x </span> <span class='cyan'>perfect </span> helmet <span>( <i class='cyan'>+8</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTperfecthelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell perfect helmet' />  </div>";}		
	echo '-';
	
	
	if ($row["silverhelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "silver helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver helmet' /> ";}
		echo "<span>".$row["silverhelmet"]."x </span> <span class='lightblue'>silver </span> helmet  <span>( <i class='gold'>+40</i> def, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverhelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver helmet' />  </div>";}		
	if ($row["steelhood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "steel hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel hood' /> ";}
		echo "<span>".$row["steelhood"]."x </span> <span class='lgray'>steel </span> hood  <span>( <i class='lightred'>+7</i> str, <i class='green'>+7</i> dex, <i class='gold'>+7</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelhood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel hood' />  </div>";}		
	if ($row["steelhelmet"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "steel helmet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel helmet' /> ";}
		echo "<span>".$row["steelhelmet"]."x </span> <span class='lgray'>steel </span> helmet  <span>( <i class='gold'>+45</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelhelmet']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel helmet' />  </div>";}		
	if ($row["steelmasterhelm"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "steel master helm" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel master helm' /> ";}
		echo "<span>".$row["steelmasterhelm"]."x </span> <span class='lgray'>steel </span> master helm  <span>( <i class='lightred'>+15</i> str, <i class='green'>+15</i> dex, <i class='gold'>+60</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelmasterhelm']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel master helm' />  </div>";}		
	if ($row["trollcrown"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "troll crown" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip troll crown' /> ";}
		echo "<span>".$row["trollcrown"]."x </span> <span class='green'>troll </span> crown  <span>( <i class='lightred'>+12</i> str, <i class='blue'>+6</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrollcrown']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell troll crown' />  </div>";}		
	if ($row["rangerhood"] > 0) { 
		echo "<div>";
		if ($row["equipHead"] == "ranger hood" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ranger hood' /> ";}
		echo "<span>".$row["rangerhood"]."x </span> <span class='green'>ranger </span> hood  <span>( <i class='green'>+25</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangerhood']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell ranger hood' />  </div>";}		
	echo '-';
	
	
	echo "<h2>Body</h2>";	



	if ($row["trainingarmor"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "training armor" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip training armor' /> ";}
		echo "<span>".$row["trainingarmor"]."x </span> training armor <span>( <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingarmor']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell training armor' />  </div>";}
	if ($row["trainingarmorpro"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "training armor pro" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip training armor pro' /> ";}
		echo "<span>".$row["trainingarmorpro"]."x </span> training armor pro <span>
					( <i class='gold'>+5</i> def, <i class='lightred'>+1</i> str, <i class='green'>+1</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingarmorpro']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell training armor pro' />  </div>";}	
	if ($row["paddedarmor"] > 0) {
		echo "<div>";
		if ($row["equipBody"] == "padded armor" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip padded armor' /> ";}
		echo "<span>".$row["paddedarmor"]."x </span> padded armor <span>( <i class='gold'>+13</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTpaddedarmor']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell padded armor' />  </div>";}
	if ($row["pajamas"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "pajamas" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip pajamas' /> ";}
		echo "<span>".$row["pajamas"]."x </span> pajamas <span>( <i class='cyan'>+2</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTpajamas']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell pajamas' />  </div>";}
	if ($row["greencloak"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "green cloak" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip green cloak' /> ";}
		echo "<span>".$row["greencloak"]."x </span> green cloak <span>( <i class='green'>+3</i> dex, <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreencloak']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell green cloak' />  </div>";}	
	if ($row["blackrobe"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "black robe" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip black robe' /> ";}
		echo "<span>".$row["blackrobe"]."x </span> black robe <span>( <i class='lightred'>+3</i> str, <i class='blue'>+3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackrobe']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell black robe' />  </div>";}	
	if ($row["grayrobe"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "gray robe" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gray robe' /> ";}
		echo "<span>".$row["grayrobe"]."x </span> gray robe <span>( <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgrayrobe']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gray robe' />  </div>";}		
	if ($row["leathervest"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "leather vest" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip leather vest' /> ";}
		echo "<span>".$row["leathervest"]."x </span> <span class='lightbrown'> leather </span> vest <span>( <i class='green'>+6</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTleathervest']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell leather vest' />  </div>";}	
	if ($row["leatherarmor"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "leather armor" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip leather armor' /> ";}
		echo "<span>".$row["leatherarmor"]."x </span> <span class='lightbrown'> leather </span> armor <span>( <i class='lightred'>+4</i> str, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleatherarmor']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell leather armor' />  </div>";}	
	if ($row["sasquatchcloak"] > 0) {  
		echo "<div>";
		if ($row["equipBody"] == "sasquatch cloak" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip sasquatch cloak' /> ";}
		echo "<span>".$row["sasquatchcloak"]."x </span> <span class='lightblue'> sasquatch </span> cloak <span>( <i class='lightred'>+8</i> str, <i class='gold'>+8</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsasquatchcloak']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell sasquatch cloak' />  </div>";}							
	if ($row["turtleshell"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "turtle shell" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip turtle shell' /> ";}
		echo "<span>".$row["turtleshell"]."x </span> <span class='green'> turtle </span> shell <span>( <i class='cyan'>+5</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTturtleshell']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell turtle shell' />  </div>";}	

echo '-';
	if ($row["ironarmor"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "iron armor" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron armor' /> ";}
		echo "<span>".$row["ironarmor"]."x </span> <span class='lightbrown'> iron </span> armor <span>( <i class='gold'>+30</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironarmor']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron armor' />  </div>";}	
	if ($row["ironcape"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "iron cape" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron cape' /> ";}
		echo "<span>".$row["ironcape"]."x </span> <span class='lightbrown'> iron </span> cape <span>( <i class='lightred'>+15</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironcape']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron cape' />  </div>";}	
	if ($row["blackcape"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "black cape" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip black cape' /> ";}
		echo "<span>".$row["blackcape"]."x </span> <span class='black'> black </span> cape <span>( <i class='lightred'>+10</i> str, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackcape']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell black cape' />  </div>";}	
	if ($row["forestcloak"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "forest cloak" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip forest cloak' /> ";}
		echo "<span>".$row["forestcloak"]."x </span> <span class='green'> forest </span> cloak <span>( <i class='green'>+10</i> dex, <i class='blue'>+4</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTforestcloak']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell forest cloak' />  </div>";}	
	if ($row["warlockrobe"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "warlock robe" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip warlock robe' /> ";}
		echo "<span>".$row["warlockrobe"]."x </span> <span class='lightblue'> warlock </span> robe <span>( <i class='blue'>+10</i> mag, <i class='black'>-10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTwarlockrobe']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell warlock robe' />  </div>";}	
	if ($row["championarmor"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "champion armor" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip champion armor' /> ";}
		echo "<span>".$row["championarmor"]."x </span> <span class='green'> champion </span> armor <span>( <i class='gold'>+45</i> def, <i class='lightred'>+5</i> str, <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTchampionarmor']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell champion armor' />  </div>";}
	if ($row["perfectarmor"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "perfect armor" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip perfect armor' /> ";}
		echo "<span>".$row["perfectarmor"]."x </span> <span class='cyan'> perfect </span> armor <span>( <i class='cyan'>+13</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTperfectarmor']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell perfect armor' />  </div>";}

echo '-';
	if ($row["silverbreastplate"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "silver breastplate" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver breastplate' /> ";}
		echo "<span>".$row["silverbreastplate"]."x </span> <span class='lightblue'> silver </span> breastplate <span>( <i class='gold'>+50</i> def, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverbreastplate']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver breastplate' />  </div>";}	
	if ($row["steelarmor"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "steel armor" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel armor' /> ";}
		echo "<span>".$row["steelarmor"]."x </span> <span class='gray'> steel </span> armor <span>( <i class='gold'>+60</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelarmor']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel armor' />  </div>";}		
	if ($row["steelcape"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "steel cape" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel cape' /> ";}
		echo "<span>".$row["steelcape"]."x </span> <span class='gray'> steel </span> cape <span>( <i class='lightred'>+30</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelcape']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel cape' />  </div>";}		
	if ($row["rangercloak"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "ranger cloak" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ranger cloak' /> ";}
		echo "<span>".$row["rangercloak"]."x </span> <span class='green'> ranger </span> cloak <span>( <i class='green'>+25</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangercloak']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell ranger cloak' />  </div>";}
	if ($row["yeticloak"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "yeti cloak" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip yeti cloak' /> ";}
		echo "<span>".$row["yeticloak"]."x </span> <span class='white'> yeti </span> cloak <span>( <i class='lightred'>+25</i> str, <i class='gold'>+25</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTyeticloak']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell yeti cloak' />  </div>";}	
	if ($row["demoncape"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "demon cape" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip demon cape' /> ";}
		echo "<span>".$row["demoncape"]."x </span> <span class='black'> demon </span> cape <span>( <i class='blue'>+20</i> mag, <i class='black'>-20</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTdemoncape']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell demon cape' />  </div>";}	
	if ($row["silverpajamas"] > 0) { 
		echo "<div>";
		if ($row["equipBody"] == "silver pajamas" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver pajamas' /> ";}
		echo "<span>".$row["silverpajamas"]."x </span> <span class='lightblue'> silver </span> pajamas <span>( <i class='cyan'>+20</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverpajamas']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver pajamas' />  </div>";}		
echo '-';
	
	
	
	

	echo "<h2>Hands</h2>";	
	
	
		
	if ($row["traininggloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "training gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip training gloves' /> ";}
		echo "<span>".$row["traininggloves"]."x </span> training gloves <span>( <i class='green'>+1</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTtraininggloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell training gloves' /> </div>";}	
	if ($row["wristbracers"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "wrist bracers" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wrist bracers' /> ";}
		echo "<span>".$row["wristbracers"]."x </span> wrist bracers <span>( <i class='lightred'>+2</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTwristbracers']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell wrist bracers' /> </div>";}
	if ($row["glowingbrace"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "glowing brace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip glowing brace' /> ";}
		echo "<span>".$row["glowingbrace"]."x </span> glowing brace <span>( <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTglowingbrace']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell glowing brace' /> </div>";}			
	if ($row["blackgloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "black gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip black gloves' /> ";}
		echo "<span>".$row["blackgloves"]."x </span> black gloves <span>( <i class='lightred'>+1</i> str, <i class='gold'>+2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackgloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell black gloves' /> </div>";}
	if ($row["greengloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "green gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip green gloves' /> ";}
		echo "<span>".$row["greengloves"]."x </span> green gloves <span>( <i class='green'>+2</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreengloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell green gloves' /> </div>";}	
	if ($row["graygloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "gray gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gray gloves' /> ";}
		echo "<span>".$row["graygloves"]."x </span> gray gloves <span>( <i class='blue'>+2</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgraygloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gray gloves' /> </div>";}	
	if ($row["leathergloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "leather gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip leather gloves' /> ";}
		echo "<span>".$row["leathergloves"]."x </span> <span class='lightbrown'> leather </span> gloves <span>( <i class='green'>+3</i> dex, <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleathergloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell leather gloves' /> </div>";}	
	if ($row["huntergloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "hunter gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip hunter gloves' /> ";}
		echo "<span>".$row["huntergloves"]."x </span> <span class='lightblue'> hunter </span> gloves <span>( <i class='lightred'>+3</i> str, <i class='green'>+3</i> dex, <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSThuntergloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell hunter gloves' /></div>";}	
	if ($row["trollgloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "troll gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip troll gloves' /> ";}
		echo "<span>".$row["trollgloves"]."x </span> <span class='green'> troll </span> gloves <span>( <i class='lightred'>+3</i> str, <i class='blue'>+3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrollgloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell troll gloves' /> </div>";}									
echo '-';
	if ($row["irongauntlets"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "iron gauntlets" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron gauntlets' /> ";}
		echo "<span>".$row["irongauntlets"]."x </span> <span class='lightbrown'> iron </span> gauntlets <span>( <i class='gold'>+20</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTirongauntlets']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron gauntlets' /> </div>";}					
	if ($row["irongloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "iron gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron gloves' /> ";}
		echo "<span>".$row["irongloves"]."x </span> <span class='lightbrown'> iron </span> gloves <span>( <i class='lightred'>+5</i> str, <i class='gold'>+10</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTirongloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron gloves' /> </div>";}	
	if ($row["ironknuckles"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "iron knuckles" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron knuckles' /> ";}
		echo "<span>".$row["ironknuckles"]."x </span> <span class='lightbrown'> iron </span> knuckles <span>( <i class='lightred'>+20</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTironknuckles']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron knuckles' /> </div>";}	
	if ($row["banditgloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "bandit gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bandit gloves' /> ";}
		echo "<span>".$row["banditgloves"]."x </span> <span class='black'> bandit </span> gloves <span>( <i class='green'>+5</i> dex, <i class='blue'>+3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTbanditgloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bandit gloves' /> </div>";}	
	if ($row["gatorgloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "gator gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gator gloves' /> ";}
		echo "<span>".$row["gatorgloves"]."x </span> <span class='green'> gator </span> gloves <span>( <i class='green'>+9</i> dex, <i class='gold'>+9</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgatorgloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gator gloves' /> </div>";}	
	if ($row["grottogloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "grotto gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip grotto gloves' /> ";}
		echo "<span>".$row["grottogloves"]."x </span> <span class='lightblue'> grotto gloves </span> <span> ( <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTgrottogloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell grotto gloves' /> </div>";}	
	if ($row["perfectgloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "perfect gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip perfect gloves' /> ";}
		echo "<span>".$row["perfectgloves"]."x </span> <span class='cyan'> perfect </span> gloves <span> ( <i class='cyan'>+5</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTperfectgloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell perfect gloves' /> </div>";}	
echo '-';
	if ($row["silvergauntlets"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "silver gauntlets" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver gauntlets' /> ";}
		echo "<span>".$row["silvergauntlets"]."x </span> <span class='lightblue'> silver </span> gauntlets <span>( <i class='gold'>+30</i> def, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilvergauntlets']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver gauntlets' /> </div>";}	
	if ($row["steelgauntlets"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "steel gauntlets" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel gauntlets' /> ";}
		echo "<span>".$row["steelgauntlets"]."x </span> <span class='gray'> steel </span> gauntlets <span>( <i class='gold'>+35</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelgauntlets']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel gauntlets' /> </div>";}			
	if ($row["steelgloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "steel gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel gloves' /> ";}
		echo "<span>".$row["steelgloves"]."x </span> <span class='gray'> steel </span> gloves <span>( <i class='lightred'>+10</i> str, <i class='gold'>+20</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelgloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel gloves' /> </div>";}			
	if ($row["silkbracers"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "silk bracers" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silk bracers' /> ";}
		echo "<span>".$row["silkbracers"]."x </span> <span class='lightblue'> silk </span> bracers <span>( <i class='green'>+8</i> dex, <i class='blue'>+5</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilkbracers']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silk bracers' /> </div>";}
	if ($row["rangergloves"] > 0) { 
		echo "<div>";
		if ($row["equipHands"] == "ranger gloves" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ranger gloves' /> ";}
		echo "<span>".$row["rangergloves"]."x </span> <span class='green'> ranger </span> gloves <span>( <i class='green'>+15</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangergloves']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell ranger gloves' /> </div>";}			
echo '-';
	
	
	
	
	
	

	echo "<h2>Feet</h2>";	
	
	
	if ($row["trainingboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "training boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip training boots' /> ";}
		echo "<span>".$row["trainingboots"]."x </span> training boots <span>( <i class='gold'>+1</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrainingboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell training boots' /> </div>";}	
	if ($row["redboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "red boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip red boots' /> ";}
		echo "<span>".$row["redboots"]."x </span> red boots <span>( <i class='lightred'>+2</i> str )</span>
			<span class='sellPrice'>".$_SESSION['COSTredboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell red boots' /> </div>";}
	if ($row["greenboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "green boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip green boots' /> ";}
		echo "<span>".$row["greenboots"]."x </span> green boots <span>( <i class='green'>+2</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTgreenboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell green boots' /> </div>";}
	
	if ($row["blackboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "black boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip black boots' /> ";}
		echo "<span>".$row["blackboots"]."x </span> black boots <span>( <i class='lightred'>+1</i> str, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTblackboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell black boots' /> </div>";}
	if ($row["grayboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "gray boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip gray boots' /> ";}
		echo "<span>".$row["grayboots"]."x </span> gray boots <span>( <i class='blue'>+2</i> mag, <i class='gold'>+1</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTgrayboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell gray boots' /> </div>";}			
	if ($row["slippers"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "slippers" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip slippers' /> ";}
		echo "<span>".$row["slippers"]."x </span> slippers <span>( <i class='cyan'>+1</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTslippers']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell slippers' /> </div>";}		
	if ($row["leatherboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "leather boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip leather boots' /> ";}
		echo "<span>".$row["leatherboots"]."x </span> <span class='lightbrown'> leather </span> boots <span>( <i class='green'>+3</i> dex, <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTleatherboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell leather boots' /> </div>";}
	if ($row["trollboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "troll boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip troll boots' /> ";}
		echo "<span>".$row["trollboots"]."x </span> <span class='green'> troll </span> boots <span>( <i class='lightred'>+3</i> str, <i class='gold'>+3</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTtrollboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell troll boots' /> </div>";}		
	if ($row["boneboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "bone boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bone boots' /> ";}
		echo "<span>".$row["boneboots"]."x </span> <span class='white'> bone </span> boots <span>( <i class='blue'>+4</i> mag, <i class='gold'>+4</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTboneboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bone boots' /> </div>";}		

echo '-';
	if ($row["ironboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "iron boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron boots' /> ";}
		echo "<span>".$row["ironboots"]."x </span> <span class='lightbrown'> iron </span> boots <span>( <i class='gold'>+20</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTironboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell iron boots' /> </div>";}		
	if ($row["bigfootboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "bigfoot boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bigfoot boots' /> ";}
		echo "<span>".$row["bigfootboots"]."x </span> <span class='lightbrown'> bigfoot </span> boots <span>( <i class='lightred'>+10</i> str, <i class='gold'>+20</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbigfootboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bigfoot boot' /> </div>";}				
	if ($row["banditboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "bandit boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bandit boots' /> ";}
		echo "<span>".$row["banditboots"]."x </span> <span class='black'> bandit </span> boots <span>( <i class='green'>+6</i> dex, <i class='gold'>+2</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTbanditboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell bandit boots' /> </div>";}				
	if ($row["mudboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "mud boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip mud boots' /> ";}
		echo "<span>".$row["mudboots"]."x </span> <span class='lightbrown'> mud </span> boots <span>( <i class='lightred'>+6</i> str, <i class='blue'>+3</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTmudboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell mud boots' /> </div>";}				
	if ($row["warlockboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "warlock boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip warlock boots' /> ";}
		echo "<span>".$row["warlockboots"]."x </span> <span class='lightblue'> warlock </span> boots <span>( <i class='blue'>+7</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTwarlockboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell warlock boots' /> </div>";}
	if ($row["perfectboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "perfect boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip perfect boots' /> ";}
		echo "<span>".$row["perfectboots"]."x </span> <span class='cyan'> perfect </span> boots <span>( <i class='cyan'>+5</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTperfectboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell perfect boots' /> </div>";}

echo '-';
	if ($row["silverboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "silver boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver boots' /> ";}
		echo "<span>".$row["silverboots"]."x </span> <span class='lightblue'> silver </span> boots <span>( <i class='gold'>+30</i> def, <i class='blue'>+1</i> mag )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver boots' /> </div>";}
	if ($row["steelboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "steel boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel boots' /> ";}
		echo "<span>".$row["steelboots"]."x </span> <span class='gray'> steel </span> boots <span>( <i class='gold'>+35</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTsteelboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell steel boots' /> </div>";}
	if ($row["thunderboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "thunder boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip thunder boots' /> ";}
		echo "<span>".$row["thunderboots"]."x </span> <span class='gold'> thunder </span> boots <span>( <i class='lightred'>+12</i> str, <i class='gold'>+12</i> def )</span>
			<span class='sellPrice'>".$_SESSION['COSTthunderboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell thunder boots' /> </div>";}
	if ($row["rangerboots"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "ranger boots" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ranger boots' /> ";}
		echo "<span>".$row["rangerboots"]."x </span> <span class='green'> ranger </span> boots <span>( <i class='green'>+15</i> dex )</span>
			<span class='sellPrice'>".$_SESSION['COSTrangerboots']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell ranger boots' /> </div>";}	
	if ($row["silverslippers"] > 0) { 
		echo "<div>";
		if ($row["equipFeet"] == "silver slippers" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver slippers' /> ";}
		echo "<span>".$row["silverslippers"]."x </span> <span class='lightblue'> silver </span> slippers <span>( <i class='cyan'>+10</i> all stats )</span>
			<span class='sellPrice'>".$_SESSION['COSTsilverslippers']."</span>
			<input type='submit' class='sellBtn' name='input1' value='sell silver slippers' /> </div>";}	
						
echo '-';
	
	echo "</section>
	<section data-pop2='acc'  class='panel' id='acc'>
	<h2>Ring1</h2>";	


	if ($row["ringofstrength"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength' /> ";}
		echo "<span>".$row["ringofstrength"]."x </span> ring of strength <span>( <i class='lightred'>+1</i> str )</span> </div>";}	
	if ($row["ringofdexterity"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity' /> ";}
		echo "<span>".$row["ringofdexterity"]."x </span> ring of dexterity <span>( <i class='green'>+1</i> dex )</span> </div>";}	
	if ($row["ringofmagic"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic' /> ";}
		echo "<span>".$row["ringofmagic"]."x </span> ring of magic <span>( <i class='blue'>+1</i> mag )</span> </div>";}	
	if ($row["ringofdefense"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense' /> ";}
		echo "<span>".$row["ringofdefense"]."x </span> ring of defense <span>( <i class='gold'>+1</i> def )</span> </div>";}
	
	if ($row["ringofstrengthII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength II" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength II' /> ";}
		echo "<span>".$row["ringofstrengthII"]."x </span> ring of strength II <span>( <i class='lightred'>+2</i> str )</span> </div>";}	
	if ($row["ringofdexterityII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity II" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity II' /> ";}
		echo "<span>".$row["ringofdexterityII"]."x </span> ring of dexterity II <span>( <i class='green'>+2</i> dex )</span> </div>";}	
	if ($row["ringofmagicII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic II" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic II' /> ";}
		echo "<span>".$row["ringofmagicII"]."x </span> ring of magic II <span>( <i class='blue'>+2</i> mag )</span> </div>";}	
	if ($row["ringofdefenseII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense II" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense II' /> ";}
		echo "<span>".$row["ringofdefenseII"]."x </span> ring of defense II <span>( <i class='gold'>+2</i> def )</span> </div>";}
		
	if ($row["ringofstrengthIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength III" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength III' /> ";}
		echo "<span>".$row["ringofstrengthIII"]."x </span> ring of strength III <span>( <i class='lightred'>+3</i> str )</span> </div>";}	
	if ($row["ringofdexterityIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity III" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity III' /> ";}
		echo "<span>".$row["ringofdexterityIII"]."x </span> ring of dexterity III <span>( <i class='green'>+3</i> dex )</span> </div>";}	
	if ($row["ringofmagicIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic III" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic III' /> ";}
		echo "<span>".$row["ringofmagicIII"]."x </span> ring of magic III <span>( <i class='blue'>+3</i> mag )</span> </div>";}	
	if ($row["ringofdefenseIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense III" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense III' /> ";}
		echo "<span>".$row["ringofdefenseIII"]."x </span> ring of defense III <span>( <i class='gold'>+3</i> def )</span> </div>";}	
	
	if ($row["ringofstrengthIV"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength IV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength IV' /> ";}
		echo "<span>".$row["ringofstrengthIV"]."x </span> ring of strength IV <span>( <i class='lightred'>+4</i> str )</span> </div>";}	
	if ($row["ringofdexterityIV"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity IV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity IV' /> ";}
		echo "<span>".$row["ringofdexterityIV"]."x </span> ring of dexterity IV <span>( <i class='green'>+4</i> dex )</span> </div>";}	
	if ($row["ringofmagicIV"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic IV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic IV' /> ";}
		echo "<span>".$row["ringofmagicIV"]."x </span> ring of magic IV <span>( <i class='blue'>+4</i> mag )</span> </div>";}	
	if ($row["ringofdefenseIV"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense IV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense IV' /> ";}
		echo "<span>".$row["ringofdefenseIV"]."x </span> ring of defense IV <span>( <i class='gold'>+4</i> def )</span> </div>";}				

	if ($row["ringofstrengthV"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength V" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength V' /> ";}
		echo "<span>".$row["ringofstrengthV"]."x </span> ring of strength V <span>( <i class='lightred'>+5</i> str )</span> </div>";}	
	if ($row["ringofdexterityV"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity V" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity V' /> ";}
		echo "<span>".$row["ringofdexterityV"]."x </span> ring of dexterity V  <span>( <i class='green'>+5</i> dex )</span> </div>";}	
	if ($row["ringofmagicV"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic V" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic V' /> ";}
		echo "<span>".$row["ringofmagicV"]."x </span> ring of magic V  <span>( <i class='blue'>+5</i> mag )</span> </div>";}	
	if ($row["ringofdefenseV"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense V" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense V' /> ";}
		echo "<span>".$row["ringofdefenseV"]."x </span> ring of defense V <span>( <i class='gold'>+5</i> def )</span> </div>";}
		
		
	if ($row["soldiersring"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "soldier's ring" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip soldiers ring' /> ";}
		echo "<span>".$row["soldiersring"]."x </span> <span class='gold'> soldier's </span> ring <span>( <i class='lightred'>+2</i> str, <i class='gold'>+2</i> def )</span> </div>";}
	if ($row["hunterring"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "hunter ring" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip hunter ring' /> ";}
		echo "<span>".$row["hunterring"]."x </span> <span class='green'> hunter </span> ring <span>( <i class='lightred'>+3</i> str, <i class='green'>+3</i> dex )</span> </div>";}
	if ($row["coyotering"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "coyote ring" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip coyote ring' /> ";}
		echo "<span>".$row["coyotering"]."x </span> <span class='lightblue'> coyote </span> ring <span>( <i class='lightred'>+2</i> str, <i class='green'>+2</i> dex, <i class='blue'>+2</i> mag )</span> </div>";}
		
		if ($row["redwizardring"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "red wizard ring" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip red wizard ring' /> ";}
		echo "<span>".$row["redwizardring"]."x </span> <span class='lightred'> red </span> wizard ring <span>( <i class='blue'>+5</i> mag, <i class='lightred'>+5</i> str )</span> </div>";}
		if ($row["greenwizardring"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "green wizard ring" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip green wizard ring' /> ";}
		echo "<span>".$row["greenwizardring"]."x </span> <span class='green'> green </span> wizard ring <span>( <i class='blue'>+5</i> mag, <i class='green'>+5</i> dex )</span> </div>";}
		if ($row["yellowwizardring"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "yellow wizard ring" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip yellow wizard ring' /> ";}
		echo "<span>".$row["yellowwizardring"]."x </span> <span class='yellow'> yellow </span> wizard ring <span>( <i class='blue'>+5</i> mag, <i class='gold'>+5</i> def )</span> </div>";}
			
		if ($row["silverring"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "silver ring" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver ring' /> ";}
		echo "<span>".$row["silverring"]."x </span> <span class='lightblue'> silver </span> ring <span>( <i class='cyan'>+10</i> all stats )</span> </div>";}
		
		
		
	if ($row["ringofstrengthVI"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength VI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength VI' /> ";}
		echo "<span>".$row["ringofstrengthVI"]."x </span> ring of strength VI <span>( <i class='lightred'>+6</i> str )</span> </div>";}	
	if ($row["ringofdexterityVI"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity VI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity VI' /> ";}
		echo "<span>".$row["ringofdexterityVI"]."x </span> ring of dexterity VI  <span>( <i class='green'>+6</i> dex )</span> </div>";}	
	if ($row["ringofmagicVI"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic VI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic VI' /> ";}
		echo "<span>".$row["ringofmagicVI"]."x </span> ring of magic VI  <span>( <i class='blue'>+6</i> mag )</span> </div>";}	
	if ($row["ringofdefenseVI"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense VI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense VI' /> ";}
		echo "<span>".$row["ringofdefenseVI"]."x </span> ring of defense VI <span>( <i class='gold'>+6</i> def )</span> </div>";}
		
		
	if ($row["ringofstrengthVII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength VII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength VII' /> ";}
		echo "<span>".$row["ringofstrengthVII"]."x </span> ring of strength VII <span>( <i class='lightred'>+7</i> str )</span> </div>";}	
	if ($row["ringofdexterityVII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity VII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity VII' /> ";}
		echo "<span>".$row["ringofdexterityVII"]."x </span> ring of dexterity VII  <span>( <i class='green'>+7</i> dex )</span> </div>";}	
	if ($row["ringofmagicVII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic VII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic VII' /> ";}
		echo "<span>".$row["ringofmagicVII"]."x </span> ring of magic VII  <span>( <i class='blue'>+7</i> mag )</span> </div>";}	
	if ($row["ringofdefenseVII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense VII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense VII' /> ";}
		echo "<span>".$row["ringofdefenseVII"]."x </span> ring of defense VII <span>( <i class='gold'>+7</i> def )</span> </div>";}
		
		
			
	if ($row["ringofstrengthVIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength VIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength VIII' /> ";}
		echo "<span>".$row["ringofstrengthVIII"]."x </span> ring of strength VIII <span>( <i class='lightred'>+8</i> str )</span> </div>";}	
	if ($row["ringofdexterityVIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity VIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity VIII' /> ";}
		echo "<span>".$row["ringofdexterityVIII"]."x </span> ring of dexterity VIII  <span>( <i class='green'>+8</i> dex )</span> </div>";}	
	if ($row["ringofmagicVIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic VIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic VIII' /> ";}
		echo "<span>".$row["ringofmagicVIII"]."x </span> ring of magic VIII  <span>( <i class='blue'>+8</i> mag )</span> </div>";}	
	if ($row["ringofdefenseVIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense VIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense VIII' /> ";}
		echo "<span>".$row["ringofdefenseVIII"]."x </span> ring of defense VIII <span>( <i class='gold'>+8</i> def )</span> </div>";}
		
	if ($row["ringofstrengthIX"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength IX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength IX' /> ";}
		echo "<span>".$row["ringofstrengthIX"]."x </span> ring of strength IX <span>( <i class='lightred'>+9</i> str )</span> </div>";}	
	if ($row["ringofdexterityIX"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity IX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity IX' /> ";}
		echo "<span>".$row["ringofdexterityIX"]."x </span> ring of dexterity IX  <span>( <i class='green'>+9</i> dex )</span> </div>";}	
	if ($row["ringofmagicIX"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic IX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic IX' /> ";}
		echo "<span>".$row["ringofmagicIX"]."x </span> ring of magic IX  <span>( <i class='blue'>+9</i> mag )</span> </div>";}	
	if ($row["ringofdefenseIX"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense IX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense IX' /> ";}
		echo "<span>".$row["ringofdefenseIX"]."x </span> ring of defense IX <span>( <i class='gold'>+9</i> def )</span> </div>";}
		
			
	if ($row["ringofstrengthX"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of strength X" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of strength X' /> ";}
		echo "<span>".$row["ringofstrengthX"]."x </span> ring of strength X <span>( <i class='lightred'>+10</i> str )</span> </div>";}	
	if ($row["ringofdexterityX"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of dexterity X" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of dexterity X' /> ";}
		echo "<span>".$row["ringofdexterityX"]."x </span> ring of dexterity X  <span>( <i class='green'>+10</i> dex )</span> </div>";}	
	if ($row["ringofmagicX"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of magic X" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of magic X' /> ";}
		echo "<span>".$row["ringofmagicX"]."x </span> ring of magic X  <span>( <i class='blue'>+10</i> mag )</span> </div>";}	
	if ($row["ringofdefenseX"] > 0) { 
		echo "<div>";
		if ($row["equipRing1"] == "ring of defense X" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of defense X' /> ";}
		echo "<span>".$row["ringofdefenseX"]."x </span> ring of defense X <span>( <i class='gold'>+10</i> def )</span> </div>";}
		
	
		
		
			
		
		
		
		
		
		
		
		

	echo "<h2>Ring2</h2>";	
		
		
	if ($row["ringofhealthregen"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen' /> ";}
		echo "<span>".$row["ringofhealthregen"]."x </span> ring of health regen <span>( <i class='lightred'>+1 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregen"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen' /> ";}
		echo "<span>".$row["ringofmanaregen"]."x </span> ring of mana regen <span>( <i class='blue'>+1 mp</i> / click )</span> </div>";}	
	
	if ($row["ringofhealthregenII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen II" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen II' /> ";}
		echo "<span>".$row["ringofhealthregenII"]."x </span> ring of health regen II <span>( <i class='lightred'>+2 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen II" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen II' /> ";}
		echo "<span>".$row["ringofmanaregenII"]."x </span> ring of mana regen II <span>( <i class='blue'>+2 mp</i> / click )</span> </div>";}
	
	if ($row["ringofhealthregenIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen III" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen III' /> ";}
		echo "<span>".$row["ringofhealthregenIII"]."x </span> ring of health regen III <span>( <i class='lightred'>+3 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen III" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen III' /> ";}
		echo "<span>".$row["ringofmanaregenIII"]."x </span> ring of mana regen III <span>( <i class='blue'>+3 mp</i> / click )</span> </div>";}	
	
	if ($row["ringofhealthregenIV"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen IV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen IV' /> ";}
		echo "<span>".$row["ringofhealthregenIV"]."x </span> ring of health regen IV <span>( <i class='lightred'>+4 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenIV"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen IV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen IV' /> ";}
		echo "<span>".$row["ringofmanaregenIV"]."x </span> ring of mana regen IV <span>( <i class='blue'>+4 mp</i> / click )</span> </div>";}				

	if ($row["ringofhealthregenV"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen V" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen V' /> ";}
		echo "<span>".$row["ringofhealthregenV"]."x </span> ring of health regen V <span>( <i class='lightred'>+5 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenV"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen V" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen V' /> ";}
		echo "<span>".$row["ringofmanaregenV"]."x </span> ring of mana regen V <span>( <i class='blue'>+5 mp</i> / click )</span> </div>";}	

	if ($row["ringofhealthregenVI"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen VI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen VI' /> ";}
		echo "<span>".$row["ringofhealthregenVI"]."x </span> ring of health regen VI <span>( <i class='lightred'>+6 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenVI"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen VI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen VI' /> ";}
		echo "<span>".$row["ringofmanaregenVI"]."x </span> ring of mana regen VI <span>( <i class='blue'>+6 mp</i> / click )</span> </div>";}	
		
	if ($row["ringofhealthregenVII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen VII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen VII' /> ";}
		echo "<span>".$row["ringofhealthregenVII"]."x </span> ring of health regen VII <span>( <i class='lightred'>+7 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenVII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen VII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen VII' /> ";}
		echo "<span>".$row["ringofmanaregenVII"]."x </span> ring of mana regen VII <span>( <i class='blue'>+7 mp</i> / click )</span> </div>";}	
		
	if ($row["ringofhealthregenVIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen VIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen VIII' /> ";}
		echo "<span>".$row["ringofhealthregenVIII"]."x </span> ring of health regen VIII <span>( <i class='lightred'>+8 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenVIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen VIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen VIII' /> ";}
		echo "<span>".$row["ringofmanaregenVIII"]."x </span> ring of mana regen VIII <span>( <i class='blue'>+8 mp</i> / click )</span> </div>";}		
		
	if ($row["ringofhealthregenIX"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen IX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen IX' /> ";}
		echo "<span>".$row["ringofhealthregenIX"]."x </span> ring of health regen IX <span>( <i class='lightred'>+9 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenIX"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen IX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen IX' /> ";}
		echo "<span>".$row["ringofmanaregenIX"]."x </span> ring of mana regen IX <span>( <i class='blue'>+9 mp</i> / click )</span> </div>";}		
		
	if ($row["ringofhealthregenX"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen X" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen X' /> ";}
		echo "<span>".$row["ringofhealthregenX"]."x </span> ring of health regen X <span>( <i class='lightred'>+10 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenX"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen X" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen X' /> ";}
		echo "<span>".$row["ringofmanaregenX"]."x </span> ring of mana regen X <span>( <i class='blue'>+10 mp</i> / click )</span> </div>";}		
		
		
	
	if ($row["ringofhealthregenXI"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XI' /> ";}
		echo "<span>".$row["ringofhealthregenXI"]."x </span> ring of health regen XI <span>( <i class='lightred'>+11 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXI"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XI' /> ";}
		echo "<span>".$row["ringofmanaregenXI"]."x </span> ring of mana regen XI <span>( <i class='blue'>+11 mp</i> / click )</span> </div>";}	
		

	if ($row["ringofhealthregenXII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XII' /> ";}
		echo "<span>".$row["ringofhealthregenXII"]."x </span> ring of health regen XII <span>( <i class='lightred'>+12 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XII' /> ";}
		echo "<span>".$row["ringofmanaregenXII"]."x </span> ring of mana regen XII <span>( <i class='blue'>+12 mp</i> / click )</span> </div>";}		
		
	
	if ($row["ringofhealthregenXIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XIII' /> ";}
		echo "<span>".$row["ringofhealthregenXIII"]."x </span> ring of health regen XIII <span>( <i class='lightred'>+13 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XIII' /> ";}
		echo "<span>".$row["ringofmanaregenXIII"]."x </span> ring of mana regen XIII <span>( <i class='blue'>+13 mp</i> / click )</span> </div>";}								
		

	if ($row["ringofhealthregenXIV"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XIV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XIV' /> ";}
		echo "<span>".$row["ringofhealthregenXIV"]."x </span> ring of health regen XIV <span>( <i class='lightred'>+14 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXIV"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XIV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XIV' /> ";}
		echo "<span>".$row["ringofmanaregenXIV"]."x </span> ring of mana regen XIV <span>( <i class='blue'>+14 mp</i> / click )</span> </div>";}								
		
	if ($row["ringofhealthregenXV"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XV' /> ";}
		echo "<span>".$row["ringofhealthregenXV"]."x </span> ring of health regen XV <span>( <i class='lightred'>+15 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXV"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XV" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XV' /> ";}
		echo "<span>".$row["ringofmanaregenXV"]."x </span> ring of mana regen XV <span>( <i class='blue'>+15 mp</i> / click )</span> </div>";}								
		

	if ($row["ringofhealthregenXVI"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XVI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XVI' /> ";}
		echo "<span>".$row["ringofhealthregenXVI"]."x </span> ring of health regen XVI <span>( <i class='lightred'>+16 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXVI"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XVI" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XVI' /> ";}
		echo "<span>".$row["ringofmanaregenXVI"]."x </span> ring of mana regen XVI <span>( <i class='blue'>+16 mp</i> / click )</span> </div>";}	
		

	if ($row["ringofhealthregenXVII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XVII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XVII' /> ";}
		echo "<span>".$row["ringofhealthregenXVII"]."x </span> ring of health regen XVII <span>( <i class='lightred'>+17 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXVII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XVII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XVII' /> ";}
		echo "<span>".$row["ringofmanaregenXVII"]."x </span> ring of mana regen XVII <span>( <i class='blue'>+17 mp</i> / click )</span> </div>";}										
					
		
	if ($row["ringofhealthregenXVIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XVIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XVIII' /> ";}
		echo "<span>".$row["ringofhealthregenXVIII"]."x </span> ring of health regen XVIII <span>( <i class='lightred'>+18 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXVIII"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XVIII" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XVIII' /> ";}
		echo "<span>".$row["ringofmanaregenXVIII"]."x </span> ring of mana regen XVIII <span>( <i class='blue'>+18 mp</i> / click )</span> </div>";}										
		
	
	if ($row["ringofhealthregenXIX"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XIX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XIX' /> ";}
		echo "<span>".$row["ringofhealthregenXIX"]."x </span> ring of health regen XIX <span>( <i class='lightred'>+19 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXIX"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XIX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XIX' /> ";}
		echo "<span>".$row["ringofmanaregenXIX"]."x </span> ring of mana regen XIX <span>( <i class='blue'>+19 mp</i> / click )</span> </div>";}										
		

	if ($row["ringofhealthregenXX"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of health regen XX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of health regen XX' /> ";}
		echo "<span>".$row["ringofhealthregenXX"]."x </span> ring of health regen XX <span>( <i class='lightred'>+20 hp</i> / click )</span> </div>";}
	if ($row["ringofmanaregenXX"] > 0) { 
		echo "<div>";
		if ($row["equipRing2"] == "ring of mana regen XX" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ring of mana regen XX' /> ";}
		echo "<span>".$row["ringofmanaregenXX"]."x </span> ring of mana regen XX <span>( <i class='blue'>+20 mp</i> / click )</span> </div>";}										
		

					
				
		
	
					
		
		

	echo "<h2>Neck</h2>";	
			
	if ($row["woodennecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "wooden necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip wooden necklace' /> ";}
		echo "<span>".$row["woodennecklace"]."x </span> <span class='white'> wooden </span> necklace <span>( <i class='gold'>+5</i> def )</span> <input type='submit' class='sellBtn' name='input1' value='sell wooden necklace' /></div>";}
	if ($row["bonenecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "bone necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bone necklace' /> ";}
		echo "<span>".$row["bonenecklace"]."x </span> <span class='white'> bone </span> necklace <span>( <i class='gold'>+10</i> def )</span> <input type='submit' class='sellBtn' name='input1' value='sell bone necklace' /></div>";}
	if ($row["stonenecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "stone necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip stone necklace' /> ";}
		echo "<span>".$row["stonenecklace"]."x </span> <span class='gray'> stone </span> necklace <span>( <i class='gold'>+15</i> def )</span> <input type='submit' class='sellBtn' name='input1' value='sell stone necklace' /></div>";}	
	if ($row["bluependant"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "blue pendant" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip blue pendant' /> ";} 
		echo "<span>".$row["bluependant"]."x </span> <span class='blue'> blue </span> pendant <span>( <i class='lightred'>+10</i> str, <i class='blue'>+5</i> mag )</span> <input type='submit' class='sellBtn' name='input1' value='sell blue pendant' /></div>";}
	if ($row["redtalisman"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "red talisman" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip red talisman' /> ";}
		echo "<span>".$row["redtalisman"]."x </span> <span class='lightred'> red </span> talisman <span>( <i class='lightred'>+10</i> str, <i class='gold'>+10</i> def )</span> <input type='submit' class='sellBtn' name='input1' value='sell red talisman' /></div>";}
	if ($row["greenpendant"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "green pendant" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip green pendant' /> ";} 
		echo "<span>".$row["greenpendant"]."x </span> <span class='green'> green </span> pendant <span>( <i class='green'>+10</i> dex )</span> <input type='submit' class='sellBtn' name='input1' value='sell green pendant' /></div>";}
	if ($row["coralnecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "coral necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip coral necklace' /> ";} 
		echo "<span>".$row["coralnecklace"]."x </span> <span class='lightblue'> coral </span> necklace <span>( <i class='blue'>+10</i> mag )</span> <input type='submit' class='sellBtn' name='input1' value='sell coral necklace' /></div>";}
if ($row["vapornecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "vapor necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip vapor necklace' /> ";} 
		echo "<span>".$row["vapornecklace"]."x </span> <span class='lightpurple'> vapor </span> necklace <span>( <i class='cyan'>+10</i> all stats )</span> <input type='submit' class='sellBtn' name='input1' value='sell vapor necklace' /></div>";}
	if ($row["silvernecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "silver necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip silver necklace' /> ";}
		echo "<span>".$row["silvernecklace"]."x </span> <span class='lightblue'> silver </span> necklace <span>( <i class='cyan'>+20</i> all stats )</span> <input type='submit' class='sellBtn' name='input1' value='sell silver necklace' /></div>";}
	if ($row["ironnecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "iron necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip iron necklace' /> ";}
		echo "<span>".$row["ironnecklace"]."x </span> <span class='lightbrown'> iron </span> necklace <span>( <i class='gold'>+25</i> def )</span> <input type='submit' class='sellBtn' name='input1' value='sell iron necklace' /></div>";}
		
	if ($row["shamannecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "shaman necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip shaman necklace' /> ";} 
		echo "<span>".$row["shamannecklace"]."x </span> <span class='green'> shaman </span> necklace <span>( <i class='blue'>+5</i> mag, <i class='blue'>+5</i> mp regen )</span> <input type='submit' class='sellBtn' name='input1' value='sell shaman necklace' /></div>";}

if ($row["warriorpendant"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "warrior pendant" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip warrior pendant' /> ";}
		echo "<span>".$row["warriorpendant"]."x </span> <span class='lightred'> warrior </span> pendant <span>( <i class='lightred'>+25</i> str, <i class='gold'>+25</i> def )</span> <input type='submit' class='sellBtn' name='input1' value='sell warrior pendant' /></div>";}

if ($row["rangeramulet"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "ranger amulet" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip ranger amulet' /> ";} 
		echo "<span>".$row["rangeramulet"]."x </span> <span class='green'> ranger </span> amulet <span>( <i class='green'>+25</i> dex, <i class='blue'>+5</i> mag )</span> <input type='submit' class='sellBtn' name='input1' value='sell ranger amulet' /></div>";}
	
	
	
	if ($row["steelnecklace"] > 0) { 
		echo "<div>";
		if ($row["equipNeck"] == "steel necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip steel necklace' /> ";}
		echo "<span>".$row["steelnecklace"]."x </span> <span class='gray'> steel </span> necklace <span>( <i class='gold'>+50</i> def )</span> <input type='submit' class='sellBtn' name='input1' value='sell steel necklace' /></div>";}
	
	
					
		
					
	
	echo "<h2>Artifact</h2>";	
			
	if ($row["coralcoin"] > 0) { 
		echo "<div>";
		if ($row["equipArtifact"] == "coral coin" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip coral coin' /> ";}
		echo "<span>".$row["coralcoin"]."x </span> <span class='lightpurple'> coral coin</span> <span>( <i class='cyan'>+5</i> all stats )</span> <input type='submit' class='sellBtn' name='input1' value='sell coral coin' /></div>";}
	if ($row["squidtooth"] > 0) { 
		echo "<div>";
		if ($row["equipArtifact"] == "squid tooth" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip squid tooth' /> ";}
		echo "<span>".$row["squidtooth"]."x </span> <span class='blue'> squid tooth</span> <span>( <i class='green'>+25</i> dex )</span> <input type='submit' class='sellBtn' name='input1' value='sell squid tooth' /></div>";}		
		
	if ($row["pearlofwisdom"] > 0) { 
		echo "<div>";
		if ($row["equipArtifact"] == "pearl of wisdom" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip pearl of wisdom' /> ";}
		echo "<span>".$row["pearlofwisdom"]."x </span> <span class='lightblue'> pearl of wisdom</span> <span>( <i class='blue'>+50</i> mag, <i class='gold'>+50</i> def )</span> <input type='submit' class='sellBtn' name='input1' value='sell pearl of wisdom' /></div>";}		
		
		
		
		
		
		
			
	echo "<h2>Tech</h2>";	
			
	if ($row["bonenecklace"] > 100) { 
		echo "<div>";
		if ($row["equipNeck"] == "bone necklace" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='equipBtn' name='input1' value='equip bone necklace' /> ";}
		echo "<span>".$row["bonenecklace"]."x </span> <span class='white'> bone </span> necklace <span>( +5 def )</span> <input type='submit' class='sellBtn' name='input1' value='sell bone necklace' /></div>";}
	
									
					
					

	echo "</section>
	<section data-pop2='comp' class='panel' id='comp'>
	<h2>Companion</h2>";	
	
	if ($row["COMPdwarfaxeman"] > 0) { 
		echo "<div>";
		if ($row["equipComp"] == "dwarf axeman" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='activateBtn' name='input1' value='activate dwarf axeman' />"; }
		echo " dwarf axeman <span> ( attacks for 1-5 damage )</span></div>";}
		
	if ($row["COMPelfranger"] > 0) { 
		echo "<div>";
		if ($row["equipComp"] == "elf ranger" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='activateBtn' name='input1' value='activate elf ranger' />"; }
		echo " elf ranger <span> ( attacks for 1-10 ranged damage )</span></div>";}		
		


	echo "<h2>Pet</h2>";	
	
	if ($row["pethampster"] > 0) { 
		echo "<div>";
		if ($row["equipPet"] == "pet hampster" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='activateBtn' name='input1' value='activate pet hampster' /> "; }
		echo " pet hampster <span> ( bites for 0-2 damage )</span></div>";}	
	if ($row["petbat"] > 0) { 
		echo "<div>";
		if ($row["equipPet"] == "pet bat" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='activateBtn' name='input1' value='activate pet bat' /> "; }
		echo " pet bat <span> ( bites for 0-3 damage, flies )</span></div>";}			
	
	echo "<h2>Mount/Vehicle</h2>";	
	
	
	if ($row["MOUNTwoodenboat"] > 0) { 
		echo "<div>";
		if ($row["equipMount"] == "wooden boat" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='eatBtn' name='input1' value='use wooden boat' />"; }
		echo " <span>".$row["MOUNTwoodenboat"]."x </span> <span class='lightbrown'>wooden </span> boat <span> ( <i class='gold'>+25</i> def )</span></div>";}
	if ($row["MOUNTironboat"] > 0) { 
		echo "<div>";
		if ($row["equipMount"] == "iron boat" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='eatBtn' name='input1' value='use iron boat' />"; }
		echo " <span>".$row["MOUNTironboat"]."x </span> <i class='lightbrown'>iron </i> boat <span> ( <i class='gold'>+50</i> def )</span></div>";}
	
	if ($row["MOUNTsteelboat"] > 0) { 
		echo "<div>";
		if ($row["equipMount"] == "steel boat" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='eatBtn' name='input1' value='use steel boat' />"; }
		echo " <span>".$row["MOUNTsteelboat"]."x </span> <i class='gray'>steel </i> boat <span> ( <i class='gold'>+100</i> def )</span></div>";}
	
	if ($row["MOUNTmithrilboat"] > 0) { 
		echo "<div>";
		if ($row["equipMount"] == "mithril boat" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='eatBtn' name='input1' value='use mithril boat' />"; }
		echo " <span>".$row["MOUNTmithrilboat"]."x </span> <i class='blue'>mithril </i> boat <span> ( <i class='gold'>+200</i> def )</span></div>";}
	
	
	if ($row["MOUNTdirewolf"] > 0) { 
		echo "<div>";
		if ($row["equipMount"] == "dire wolf" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='mountBtn' name='input1' value='mount dire wolf' />"; }
		echo " <span>".$row["MOUNTdirewolf"]."x </span> <i class='lightred'>dire</i> wolf <span> ( <i class='lightred'>+50</i> str, <i class='gold'>+50</i> def )</span></div>";}	
		
	if ($row["MOUNTbluefalcon"] > 0) { 
		echo "<div>";
		if ($row["equipMount"] == "blue falcon" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='mountBtn' name='input1' value='mount blue falcon' />"; }
		echo " <span>".$row["MOUNTbluefalcon"]."x </span> <span class='blue'>blue</span> falcon <span> ( can fly <i class='blue'>+25</i> mag, <i class='blue'>+5 mp</i> regen )</span></div>";}	
		
	if ($row["MOUNTgreengriffin"] > 0) { 
		echo "<div>";
		if ($row["equipMount"] == "green griffin" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<input type='submit' class='mountBtn' name='input1' value='mount green griffin' />"; }
		echo " <span>".$row["MOUNTgreengriffin"]."x </span> <span class='lightred'>green</span> griffin <span> ( <i class='green'>+50</i> dex, can fly )</span></div>";}				
		
		
		
		
		
		
		
	echo "<h2>Robot</h2>";	
	
	if ($row["MOUNTgreengriffin"] > 0) { 
		if ($row["equipMount"] == "direwolf" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<div><input type='submit' class='equipBtn' name='input1' value='mount dire wolf' />"; }
		echo " dire wolf <span> ( +50 str, +50 def )</span></div>";}	
		
		
	echo "<h2>Aura</h2>";

	if ($row["AURAshamansblessing"] > 0) { 
		if ($row["equipAura"] == "shaman's blessing" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<div><input type='submit' class='activateBtn' name='input1' value='activate shamans blessing' />"; }
		echo " <i class='green'>shaman's blessing</i> <span> ( <i class='green'>+1</i> regen )</span></div>";}						
	
	if ($row["AURAstoneaura"] > 0) { 
		if ($row["equipAura"] == "stone aura" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<div><input type='submit' class='activateBtn' name='input1' value='activate stone aura' />"; }
		echo " <i class='gray'>stone</i> aura <span> ( <i class='gold'>+40</i> def )</span></div>";}						
	
	if ($row["AURAsilveraura"] > 0) { 
		if ($row["equipAura"] == "silver aura" ) { echo "<span class='equipped'>active</span> ";}
		else { echo "<div><input type='submit' class='activateBtn' name='input1' value='activate silver aura' />"; }
		echo " <i class='lightblue'>silver</i> aura <span> ( <i class='cyan'>+20</i> all stats )</span></div>";}						
	
	
		
	echo "</section>
	<section data-pop2='bag' class='panel' id='bag'>
	<h2>Heal</h2>";	
	
echo "<div class='px16 lightred'>+HP</span></div>";
	if ($row["redberry"] > 0) { 
		echo "<div><input type='submit' class='eatBtn' name='input1' value='eat redberry' /> 
		<span>".$row["redberry"]."x </span> redberry <span>( <i class='lightred'>+10</i> hp )</span></div>";}
	if ($row["rawmeat"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='eat raw meat' /> 
		<span>".$row["rawmeat"]."x </span> raw meat <span>( <i class='lightred'>+25</i> hp )</span></div>";}		
	if ($row["cookedmeat"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='eat cooked meat' /> 
		<span>".$row["cookedmeat"]."x </span> cooked meat <span>( <i class='lightred'>+50</i> hp )</span></div>";}			
	if ($row["redpotion"] > 0) { 
		echo "<div><input type='submit' class='drinkBtn' name='input1' value='drink red potion' /> 
		<span>".$row["redpotion"]."x </span> red potion <span>( <i class='lightred'>+100</i> hp )</span></div>";}		
if ($row["meatball"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='eat meatball' /> 
		<span>".$row["meatball"]."x </span> meatball <span>( <i class='lightred'>+400</i> hp )</span></div>";}	
if ($row["redbalm"] > 0) { 
		echo "<div> <input type='submit' class='drinkBtn' name='input1' value='apply red balm' /> 
		<span>".$row["redbalm"]."x </span> red balm <span>( <i class='lightred'>+1000</i> hp )</span></div>";}		
		
echo "<br><div class='px16 blue'>+MP</span></div>";
	if ($row["blueberry"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='eat blueberry' /> 
		<span>".$row["blueberry"]."x </span> blueberry <span>( <i class='blue'>+10</i> mp )</span></div>";}	
	if ($row["bluepotion"] > 0) { 
		echo "<div> <input type='submit' class='drinkBtn' name='input1' value='drink blue potion' /> 
		<span>".$row["bluepotion"]."x </span> blue potion <span>( <i class='blue'>+100</i> mp )</span></div>";}		
	if ($row["bluefish"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='eat bluefish' /> 
		<span>".$row["bluefish"]."x </span> bluefish <span>( <i class='blue'>+400</i> mp )</span></div>";}	
	if ($row["bluebalm"] > 0) { 
		echo "<div> <input type='submit' class='drinkBtn' name='input1' value='apply blue balm' /> 
		<span>".$row["bluebalm"]."x </span> blue balm <span>( <i class='blue'>+1000</i> mp )</span></div>";}
		
		
echo "<br><div class='px16 lightpurple'>+HP/MP</span></div>";
	if ($row["veggies"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='eat veggies' /> 
		<span>".$row["veggies"]."x </span> veggies <span>( <i class='lightred'>+50</i> hp, <i class='blue'>+50</i> mp )</span></div>";}	
	if ($row["purplepotion"] > 0) { 
		echo "<div> <input type='submit' class='drinkBtn' name='input1' value='drink purple potion' /> 
		<span>".$row["purplepotion"]."x </span> purple potion <span>( <i class='lightred'>+200</i> hp, <i class='blue'>+200</i> mp )</span></div>";}
	if ($row["purplebalm"] > 0) { 
		echo "<div> <input type='submit' class='drinkBtn' name='input1' value='apply purple balm' /> 
		<span>".$row["purplebalm"]."x </span> purple balm <span>( <i class='lightred'>+2000</i> hp, <i class='blue'>+2000</i> mp )</span></div>";}
			
	
	
echo "<h2>Buffs</h2>";	
			
				
	if ($row["wingspotion"] > 0) { 
		echo "<div><input type='submit' class='drinkBtn' name='input1' value='drink wings potion' /> 
		<span>".$row["wingspotion"]."x </span> <span class='lightblue'> wings </span> potion <span>( can <i class='lightblue'>fly</i> for 100 clicks )</span></div>";}	
	if ($row["gillspotion"] > 0) { 
		echo "<div><input type='submit' class='drinkBtn' name='input1' value='drink gills potion' /> 
		<span>".$row["gillspotion"]."x </span> <span class='blue'> gills </span> potion <span>( <i class='blue'>breathe water</i> for 100 clicks )</span></div>";}	
	if ($row["antidotepotion"] > 0) { 
		echo "<div><input type='submit' class='drinkBtn' name='input1' value='drink antidote potion' /> 
		<span>".$row["antidotepotion"]."x </span> <span class='green'> antidote </span> potion <span>( <i class='green'>cure poison</i>, immune/10 clicks )</span></div>";}	

	if ($row["coffee"] > 0) { 
		echo "<div> <input type='submit' class='drinkBtn' name='input1' value='drink coffee' /> 
		<span>".$row["coffee"]."x </span> <span class='lightbrown'>coffee</span> <span>( <i class='cyan'>+10</i> all stats / 10 clicks )</span></div>";}
	if ($row["tea"] > 0) { 
		echo "<div> <input type='submit' class='drinkBtn' name='input1' value='drink tea' /> 
		<span>".$row["tea"]."x </span> <span class='yellowgreen'>tea</span> <span>( <i class='yellowgreen'>+5</i> hp/mp regen / 10 clicks )</span></div>";}
	
	
	if ($row["reds"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='use reds' /> 
		<span>".$row["reds"]."x </span> <span class='lightred'>reds</span> <span>( <i class='lightred'>+20</i> str / 100 clicks )</span></div>";}
	if ($row["greens"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='use greens' /> 
		<span>".$row["greens"]."x </span> <span class='green'>greens </span> <span>( <i class='green'>+20</i> dex / 100 clicks )</span></div>";}
	if ($row["blues"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='use blues' /> 
		<span>".$row["blues"]."x </span> <span class='blue'>blues </span> <span>( <i class='blue'>+20</i> mag / 100 clicks )</span></div>";}
	if ($row["yellows"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='use yellows' /> 
		<span>".$row["yellows"]."x </span> <span class='gold'>yellows </span> <span>( <i class='gold'>+20</i> def / 100 clicks )</span></div>";}
	if ($row["purples"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='use purples' /> 
		<span>".$row["purples"]."x </span> <span class='lightpurple'>purples </span> <span>( <i class='lightpurple'>+20%</i> exp / 100 clicks )</span></div>";}
	if ($row["golds"] > 0) { 
		echo "<div> <input type='submit' class='eatBtn' name='input1' value='use golds' /> 
		<span>".$row["golds"]."x </span> <span class='yellow'>golds </span> <span>( <i class='yellow'>+20%</i> coin / 100 clicks )</span></div>";}
			
	
	
	
	
	
		echo "<h2>Misc</h2>";	
	
			
	
	if ($row["flower"] > 0) { 
		echo "<div><span>".$row["flower"]."x </span> <span class='yellow'>flower</span></div>";}		
	if ($row["scorpiontail"] > 0) { 
		echo "<div><span>".$row["scorpiontail"]."x </span> scorpion tail</div>";}	
	if ($row["batwing"] > 0) { 
		echo "<div><span>".$row["batwing"]."x </span> bat wing</div>";}
	if ($row["bone"] > 0) { 
		echo "<div><span>".$row["bone"]."x </span> bone</div>";}	
	if ($row["bigfoot"] > 0) { 
		echo "<div><span>".$row["bigfoot"]."x </span> big foot</div>";}

//echo "<br><li class='px16 gold'>Keys</span></div>";
if ($row["silverkey"] > 0) { 
		echo "<div><span>".$row["silverkey"]."x </span> <span class='lightblue'>silver </span> key</div>";}										
	if ($row["goldkey"] > 0) { 
		echo "<div><span>".$row["goldkey"]."x </span> <span class='gold'>gold</span> key</div>";}	

	
	
	echo "<h2>Maps</h2>";	
	
	if ($row["roomzeromap"] > 0) { 
		echo "<div><input type='submit' class='viewBtn' name='input1' value='view room zero map' /> room zero map</div>";}
	if ($row["grassyfieldmap"] > 0) { 
		echo "<div><input type='submit' class='viewBtn' name='input1' value='view grassy field map' /> grassy field map</div>";}
	if ($row["grassyfieldundergroundmap"] > 0) { 
		echo "<div><input type='submit' class='viewBtn' name='input1' value='view grassy field underground map' /> grassy field underground map</div>";}		
	if ($row["forestmap"] > 0) { 
		echo "<div><input type='submit' class='viewBtn' name='input1' value='view forest map' /> forest map</div>";}						
	
	
	if ($row["forestundergroundmap"] > 0) { 
			echo "<div><input type='submit' class='viewBtn' name='input1' value='view forest underground map' /> forest underground map</div>";}						
		
	

			
	
	
	echo "</section>";	  
 
}//</form>

    
	 

   