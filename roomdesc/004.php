<?php
// ---------------------------------------------------- 003 - Old Man | Log Cabin
//if ($roomID=='003') {
$_SESSION['dangerLVL'] = "000";
$dirN='active greenfield';
$dirE='active greenfield';
$dirS='active greenfield';
$dirW='active dirt';
    $icon = file_get_contents("img/svg/flower.svg");
//}
echo '<div class="roomBox">
    <span class="icon gold small">'.$icon.'</span>
    <h3 class="greenfield">Grassy Field West</h3>
    <h4 class="gold">Flower Patch</h3>
    <p>A bright flower patch grows here. You see a cabin to the south and the beach to the west.</p>
    <form id="mainForm" method="post" action="" name="formInput">
    <button type="submit" name="input1" value="west">West</button>
    <button type="submit" name="input1" value="north">North</button>
    <button type="submit" name="input1" value="south">South</button>
    <button type="submit" name="input1" value="east">East</button>
    <button class="goldBG" type="submit" name="input1" value="pick flower">Pick Flower</button>
	</form></div>';
