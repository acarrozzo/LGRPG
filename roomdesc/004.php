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
    <span class="icon gold">'.$icon.'</span>
    <h2 class="greenfield">Grassy Field West</h2>
    <h4 class="gold">Flower Patch</h2>
    <p>A bright flower patch grows here. You see a cabin to the south and the beach to the west.</p>
    <form id="mainForm" method="post" action="" name="formInput">
    <input type="submit" name="input1" value="west" />
    <input type="submit" name="input1" value="north" />
    <input type="submit" name="input1" value="south" />
    <input type="submit" name="input1" value="east" />
    <input class="goldBG" type="submit" name="input1" value="pick flower" />
	</form></div>';
