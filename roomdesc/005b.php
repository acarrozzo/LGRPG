<?php
// ---------------------------------------------------- 005b - Secret Arena
$_SESSION['dangerLVL'] = "X";
$dirU='active greenfield';
    $icon = file_get_contents("img/svg/monster1.svg");


echo '<div class="roomBox">
    <span class="icon black">'.$icon.'</span>
    <h3 class="gold">Secret Arena</h3>
    <h4 class="black"> Hope you\'re having a good time. </h4>
  	<p>In a top secret fighting area. Here the developer can conjure up any enemy he wishes for battle testing. And what does this place look like? Whatever you want, use your imagination.</p>
  	<form id="mainForm" method="post" action="" name="formInput">
	</form></div>';
