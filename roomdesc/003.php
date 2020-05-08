
<?php

    // ---------------------------------------------------- 003 - Old Man | Log Cabin

    $_SESSION['dangerLVL'] = "000";
    $dirN='active greenfield';
    $dirNE='active greenfield';
    $dirE='active greenfield';
    $dirSW='active swamp';
    $dirW='active dgray';
    $dirD='active dirtx gold';
    $icon = file_get_contents("img/svg/cabin.svg");
    $icon = file_get_contents("img/svg/cabin2.svg");

        echo '<div class="roomBox">
        <span class="icon brown">'.$icon.'</span>
  	<h2 class="brown">Old Man</h2>
    <h4 class="gray">Wood Cabin</h4>
  	<p>The cabin is warm and cozy. A cooking fire burns here and the Old Man is rocking in his chair. He insists you make yourself at home and stay as long as you like. Start and complete your first quests here.</p>
    <form id="mainForm" method="post" action="" name="formInput">
  	<a href data-link="quests" class="btn goldBG">Open Quests </a>
    <input class="redBG" type="submit" name="input1" value="cook meat" />
    <input class="" type="submit" name="input1" value="west" />
  	<input class="brownBG" type="submit" name="input1" value="down" />
  	</form></div>';
//  	<input class="brownBG" type="submit" name="input1" value="ex cabin" />
