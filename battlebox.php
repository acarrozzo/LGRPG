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
echo '	<form id="mainForm" method="post" action="" name="formInput">';





  echo'
  <div class="battleBlock lightgrayBG">
  <div class="vc">';
		if ($weapontype == 3) { 
			echo ' <div class="spellBtnBox">
					<input type="submit" class="spellBtn greenBG  " name="input1" value="attack">
					</div> '; 				
		}
		else { 
			echo ' <div class="spellBtnBox">
					<input type="submit" class="spellBtn redBG  " name="input1" value="attack">
					</div> '; 				
		}
		if ($slice >= 1  && $weapontype==1) { 
			echo ' <div class="spellBtnBox">
					<i class="spellLvl lightred"> '.$slice.' </i>
					<input type="submit" class="spellBtn redBG " name="input1" value="slice">
					<i class="spellCost">'.$slice_cost_cast.'<em>m</em></i>
					</div> '; 
		}
		if ($smash >= 1 && $weapontype==2) { 
			echo ' <div class="spellBtnBox">
					<i class="spellLvl"> '.$smash.' </i>
					<input type="submit" class="spellBtn redBG " name="input1" value="smash">
					<i class="spellCost">'.$smash_cost_cast.'<em>m</em></i>
					</div> '; 							
		}
		if ($aim >= 1 && $weapontype==3) { 
			echo ' <div class="spellBtnBox">
					<i class="spellLvl"> '.$aim.' </i>
					<input type="submit" class="spellBtn greenBG" name="input1" value="aim">
					<i class="spellCost">'.$aim_cost_cast.'<em>m</em></i>
					</div> '; 							
		}
		if ($magicstrike >= 1) { 
			echo ' <div class="spellBtnBox">
					<i class="spellLvl"> '.$magicstrike.' </i>
					<input type="submit" class="spellBtn blueBG  " name="input1" value="magic strike">
					<i class="spellCost">'.$magicstrike_cost_cast.'<em>m</em></i>
					</div> '; 				
		}
			


		if ($fireball >= 1) {
			echo '<div class="spellBtnBox">
			<i class="spellLvl">  '.$fireball.' </i>
			<input type="submit" class="spellBtn  redBG" name="input1" value="fireball" />
			<i class="spellCost"> '.$fireball_cost_cast.'<em>m</em></i>
			</div> ';
		}
		if ($frostball >= 1) {  
			$spell_cost_cast = 5 + ($row['frostball']*2); // was *1		
			echo ' <div class="spellBtnBox">
			<i class="spellLvl"> '.$frostball.' </i>
			<input type="submit" class="spellBtn blueBG" name="input1" value="frostball" />
			<i class="spellCost"> '.$frostball_cost_cast.'<em>m</em></i>
			</div> '; 
		}
	
	
		if ($poisondart >= 1) {  
			echo ' <div class="spellBtnBox">
			<i class="spellLvl"> '.$poisondart.' </i>
			<input type="submit" class="spellBtn greenBG" name="input1" value="poison dart" /> 
			<i class="spellCost"> '.$poisondart_cost_cast.'<em>m</em></i>
			</div> '; 
			}
		if ($atomicblast >= 1) {  
			echo ' <div class="spellBtnBox">
			<i class="spellLvl"> '.$atomicblast.' </i>
			<input type="submit" class="spellBtn blackBG" name="input1" value="atomic blast" /> 
			<i class="spellCost"> '.$atomicblast_cost_cast.'<em>m</em></i>
			</div> '; 
			}



		if ($heal >= 1) {  
			echo ' <div class="spellBtnBox">
			<i class="spellLvl"> '.$heal.' </i>
			<input type="submit" class="spellBtn  redBG" name="input1" value="heal" /> 
			<i class="spellCost"> '.$heal_cost_cast.'<em>m</em></i>
			</div> '; 
			}
		if ($regenerate >= 1) {
			echo ' 
			<div class="spellBtnBox">
			<i class="spellLvl"> '.$regenerate.' </i>
			<input type="submit" class="spellBtn  greenBG" name="input1" value="regenerate" /> 
			<i class="spellCost"> '.$regenerate_cost_cast.'<em>m</em></i>
			</div> '; 
			}
		if ($magicarmor >= 1) {  
			echo ' 
			<div class="spellBtnBox">
			<i class="spellLvl"> '.$magicarmor.' </i>
			<input type="submit" class="spellBtn goldBG" name="input1" value="magic armor" /> 
			<i class="spellCost"> '.$magicarmor_cost_cast.'<em>m</em></i>
			</div> '; 
			}
		if ($ironskin >= 1)  { 
			echo ' 
			<div class="spellBtnBox">
			<i class="spellLvl"> '.$ironskin.' </i>
			<input type="submit" class="spellBtn brownBG" name="input1" value="iron skin" /> 
			<i class="spellCost"> '.$ironskin_cost_cast.'<em>m</em></i>
			</div> '; 
		}
	
	if ($infight >=1) {
	echo '<input class="retreatBtn" type="submit" name="input1" value="retreat" />';
	//echo '<style>.battleBlock{display:block;}</style>';
}	
	
	echo '</div></div></form>';	
  
}
