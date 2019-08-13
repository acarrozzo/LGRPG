<?php //session_start();?>
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
    // -- SPELL VARIABLES FOR DISPLAY
    $_SESSION['roomID']=$roomID=$row['room'];
    $weapontype = $row['weapontype'];
    $magicstrike = $row['magicstrike'];
    $slice = $row['slice'];
    $smash = $row['smash'];
    $aim = $row['aim'];

    $heal = $row['heal'];
    $regenerate = $row['regenerate'];
    $ironskin = $row['ironskin'];
    $fireball = $row['fireball'];
    $frostball = $row['frostball'];
    $poisondart = $row['poisondart'];
    $atomicblast = $row['atomicblast'];
    $magicarmor = $row['magicarmor'];

    // spell costs for buttons
    $slice_cost_cast = $row['slice'];
    $smash_cost_cast = $row['smash'];
    $aim_cost_cast = $row['aim'];
    $magicstrike_cost_cast = $row['magicstrike']*2;

    $fireball_cost_cast = 5 + ($row['fireball']*2);
    $frostball_cost_cast = 5 + ($row['frostball']*2);
    $poisondart_cost_cast = 5 + ($row['poisondart']*3); // was 10 + lvl*1
    $atomicblast_cost_cast = 100 * $row['atomicblast'];
    $wings_cost_cast = $row['wings']*10;
    $gills_cost_cast = $row['gills']*10;
    $heal_cost_cast = $row['heal']*2;
    $regenerate_cost_cast = 20 * $row['regenerate']; // cost
    $magicarmor_cost_cast = 10 * $row['magicarmor']; // cost
    $ironskin_cost_cast = 10 * $row['ironskin']; // cost
}



//echo'<div class="gameBox">';

if ($roomID=='999') {
    include('room999.php');
} //room when you die



//mountains
elseif ($roomID=='701') {
    include('r700/room701.php');
}

//mountains
if ($roomID=='601') {
    include('r600/room601.php');
} elseif ($roomID=='602') {
    include('r600/room602.php');
} elseif ($roomID=='603') {
    include('r600/room603.php');
} elseif ($roomID=='604') {
    include('r600/room604.php');
} elseif ($roomID=='605') {
    include('r600/room605.php');
} elseif ($roomID=='606') {
    include('r600/room606.php');
} elseif ($roomID=='607') {
    include('r600/room607.php');
} elseif ($roomID=='608') {
    include('r600/room608.php');
} elseif ($roomID=='609') {
    include('r600/room609.php');
} elseif ($roomID=='610') {
    include('r600/room610.php');
} elseif ($roomID=='611') {
    include('r600/room611.php');
} elseif ($roomID=='612') {
    include('r600/room612.php');
} elseif ($roomID=='613') {
    include('r600/room613.php');
} elseif ($roomID=='614') {
    include('r600/room614.php');
} elseif ($roomID=='615') {
    include('r600/room615.php');
} elseif ($roomID=='616') {
    include('r600/room616.php');
} elseif ($roomID=='617') {
    include('r600/room617.php');
} elseif ($roomID=='618') {
    include('r600/room618.php');
} elseif ($roomID=='619') {
    include('r600/room619.php');
} elseif ($roomID=='620') {
    include('r600/room620.php');
} elseif ($roomID=='621') {
    include('r600/room621.php');
} elseif ($roomID=='622') {
    include('r600/room622.php');
} elseif ($roomID=='623') {
    include('r600/room623.php');
} elseif ($roomID=='624') {
    include('r600/room624.php');
} elseif ($roomID=='625') {
    include('r600/room625.php');
}

//dark forest
if ($roomID=='501') {
    include('r500/room501.php');
} elseif ($roomID=='502') {
    include('r500/room502.php');
} elseif ($roomID=='503') {
    include('r500/room503.php');
} elseif ($roomID=='504') {
    include('r500/room504.php');
} elseif ($roomID=='505') {
    include('r500/room505.php');
} elseif ($roomID=='506') {
    include('r500/room506.php');
} elseif ($roomID=='507') {
    include('r500/room507.php');
} elseif ($roomID=='508') {
    include('r500/room508.php');
} elseif ($roomID=='509') {
    include('r500/room509.php');
} elseif ($roomID=='510') {
    include('r500/room510.php');
} elseif ($roomID=='511') {
    include('r500/room511.php');
} elseif ($roomID=='512') {
    include('r500/room512.php');
} elseif ($roomID=='513') {
    include('r500/room513.php');
} elseif ($roomID=='514') {
    include('r500/room514.php');
} elseif ($roomID=='515') {
    include('r500/room515.php');
} elseif ($roomID=='515a') {
    include('r500/room515a.php');
} elseif ($roomID=='515b') {
    include('r500/room515b.php');
} elseif ($roomID=='515c') {
    include('r500/room515c.php');
} elseif ($roomID=='515d') {
    include('r500/room515d.php');
} elseif ($roomID=='515e') {
    include('r500/room515e.php');
} elseif ($roomID=='516') {
    include('r500/room516.php');
} elseif ($roomID=='516a') {
    include('r500/room516a.php');
} elseif ($roomID=='516b') {
    include('r500/room516b.php');
} elseif ($roomID=='516c') {
    include('r500/room516c.php');
} elseif ($roomID=='516d') {
    include('r500/room516d.php');
} elseif ($roomID=='516e') {
    include('r500/room516e.php');
} elseif ($roomID=='516f') {
    include('r500/room516f.php');
} elseif ($roomID=='516g') {
    include('r500/room516g.php');
} elseif ($roomID=='516h') {
    include('r500/room516h.php');
} elseif ($roomID=='517') {
    include('r500/room517.php');
} elseif ($roomID=='518') {
    include('r500/room518.php');
} elseif ($roomID=='519') {
    include('r500/room519.php');
} elseif ($roomID=='520') {
    include('r500/room520.php');
} elseif ($roomID=='521') {
    include('r500/room521.php');
} elseif ($roomID=='522') {
    include('r500/room522.php');
} elseif ($roomID=='523') {
    include('r500/room523.php');
} elseif ($roomID=='524') {
    include('r500/room524.php');
} elseif ($roomID=='525') {
    include('r500/room525.php');
} elseif ($roomID=='526') {
    include('r500/room526.php');
} elseif ($roomID=='527') {
    include('r500/room527.php');
} elseif ($roomID=='528') {
    include('r500/room528.php');
} elseif ($roomID=='529') {
    include('r500/room529.php');
} elseif ($roomID=='530') {
    include('r500/room530.php');
}


//mining guild
elseif ($roomID=='m00') {
    include('r300/roomm00.php');
} elseif ($roomID=='m01') {
    include('r300/roomm01.php');
} elseif ($roomID=='m02') {
    include('r300/roomm02.php');
} elseif ($roomID=='m03') {
    include('r300/roomm03.php');
} elseif ($roomID=='m04') {
    include('r300/roomm04.php');
} elseif ($roomID=='m05') {
    include('r300/roomm05.php');
} elseif ($roomID=='m06') {
    include('r300/roomm06.php');
} elseif ($roomID=='m07') {
    include('r300/roomm07.php');
} elseif ($roomID=='m08') {
    include('r300/roomm08.php');
} elseif ($roomID=='m09') {
    include('r300/roomm09.php');
} elseif ($roomID=='m10') {
    include('r300/roomm10.php');
} elseif ($roomID=='m11') {
    include('r300/roomm11.php');
} elseif ($roomID=='m12') {
    include('r300/roomm12.php');
} elseif ($roomID=='m13') {
    include('r300/roomm13.php');
} elseif ($roomID=='m14') {
    include('r300/roomm14.php');
} elseif ($roomID=='m15') {
    include('r300/roomm15.php');
} elseif ($roomID=='m16') {
    include('r300/roomm16.php');
} elseif ($roomID=='m17') {
    include('r300/roomm17.php');
} elseif ($roomID=='m18') {
    include('r300/roomm18.php');
} elseif ($roomID=='m19') {
    include('r300/roomm19.php');
} elseif ($roomID=='m20') {
    include('r300/roomm20.php');
} elseif ($roomID=='m21') {
    include('r300/roomm21.php');
} elseif ($roomID=='m22') {
    include('r300/roomm22.php');
} elseif ($roomID=='m23') {
    include('r300/roomm23.php');
} elseif ($roomID=='m24') {
    include('r300/roomm24.php');
} elseif ($roomID=='m25') {
    include('r300/roomm25.php');
} elseif ($roomID=='m26') {
    include('r300/roomm26.php');
} elseif ($roomID=='m27') {
    include('r300/roomm27.php');
} elseif ($roomID=='m28') {
    include('r300/roomm28.php');
} elseif ($roomID=='m29') {
    include('r300/roomm29.php');
} elseif ($roomID=='m30') {
    include('r300/roomm30.php');
} elseif ($roomID=='m59') {
    include('r300/roomm59.php');
} elseif ($roomID=='m99') {
    include('r300/roomm99.php');
}

//mining guild
elseif ($roomID=='308a') {
    include('r300/room308a.php');
} elseif ($roomID=='308b') {
    include('r300/room308b.php');
} elseif ($roomID=='308c') {
    include('r300/room308c.php');
} elseif ($roomID=='308d') {
    include('r300/room308d.php');
} elseif ($roomID=='308e') {
    include('r300/room308e.php');
}


//under the ocean
elseif ($roomID=='499') {
    include('r400/room499.php');
} elseif ($roomID=='498') {
    include('r400/room498.php');
} elseif ($roomID=='497') {
    include('r400/room497.php');
} elseif ($roomID=='496') {
    include('r400/room496.php');
} elseif ($roomID=='495') {
    include('r400/room495.php');
} elseif ($roomID=='494') {
    include('r400/room494.php');
} elseif ($roomID=='493') {
    include('r400/room493.php');
} elseif ($roomID=='492') {
    include('r400/room492.php');
} elseif ($roomID=='491') {
    include('r400/room491.php');
} elseif ($roomID=='490') {
    include('r400/room490.php');
} elseif ($roomID=='489') {
    include('r400/room489.php');
} elseif ($roomID=='488') {
    include('r400/room488.php');
} elseif ($roomID=='487') {
    include('r400/room487.php');
} elseif ($roomID=='486') {
    include('r400/room486.php');
} elseif ($roomID=='485') {
    include('r400/room485.php');
} elseif ($roomID=='484') {
    include('r400/room484.php');
} elseif ($roomID=='483') {
    include('r400/room483.php');
} elseif ($roomID=='482') {
    include('r400/room482.php');
} elseif ($roomID=='481') {
    include('r400/room481.php');
} elseif ($roomID=='480') {
    include('r400/room480.php');
}

//blue ocean
if ($roomID=='425p') {
    include('r400/room425p.php');
} elseif ($roomID=='425') {
    include('r400/room425.php');
} elseif ($roomID=='424') {
    include('r400/room424.php');
} elseif ($roomID=='423') {
    include('r400/room423.php');
} elseif ($roomID=='422') {
    include('r400/room422.php');
} elseif ($roomID=='421') {
    include('r400/room421.php');
} elseif ($roomID=='420') {
    include('r400/room420.php');
} elseif ($roomID=='419') {
    include('r400/room419.php');
} elseif ($roomID=='418') {
    include('r400/room418.php');
} elseif ($roomID=='417') {
    include('r400/room417.php');
} elseif ($roomID=='416') {
    include('r400/room416.php');
} elseif ($roomID=='415') {
    include('r400/room415.php');
} elseif ($roomID=='414') {
    include('r400/room414.php');
} elseif ($roomID=='413') {
    include('r400/room413.php');
} elseif ($roomID=='412') {
    include('r400/room412.php');
} elseif ($roomID=='411') {
    include('r400/room411.php');
} elseif ($roomID=='410') {
    include('r400/room410.php');
} elseif ($roomID=='409') {
    include('r400/room409.php');
} elseif ($roomID=='408') {
    include('r400/room408.php');
} elseif ($roomID=='407') {
    include('r400/room407.php');
} elseif ($roomID=='406') {
    include('r400/room406.php');
} elseif ($roomID=='405') {
    include('r400/room405.php');
} elseif ($roomID=='404') {
    include('r400/room404.php');
} elseif ($roomID=='403') {
    include('r400/room403.php');
} elseif ($roomID=='402') {
    include('r400/room402.php');
} elseif ($roomID=='401') {
    include('r400/room401.php');
}
//stone mine
elseif ($roomID=='330') {
    include('r300/room330.php');
} elseif ($roomID=='329') {
    include('r300/room329.php');
} elseif ($roomID=='328') {
    include('r300/room328.php');
} elseif ($roomID=='327') {
    include('r300/room327.php');
} elseif ($roomID=='326') {
    include('r300/room326.php');
} elseif ($roomID=='325') {
    include('r300/room325.php');
} elseif ($roomID=='324') {
    include('r300/room324.php');
} elseif ($roomID=='323') {
    include('r300/room323.php');
} elseif ($roomID=='322') {
    include('r300/room322.php');
} elseif ($roomID=='321b') {
    include('r300/room321b.php');
} elseif ($roomID=='321') {
    include('r300/room321.php');
} elseif ($roomID=='320') {
    include('r300/room320.php');
} elseif ($roomID=='319') {
    include('r300/room319.php');
} elseif ($roomID=='318') {
    include('r300/room318.php');
} elseif ($roomID=='317') {
    include('r300/room317.php');
} elseif ($roomID=='316') {
    include('r300/room316.php');
} elseif ($roomID=='315d') {
    include('r300/room315d.php');
} elseif ($roomID=='315c') {
    include('r300/room315c.php');
} elseif ($roomID=='315b') {
    include('r300/room315b.php');
} elseif ($roomID=='315a') {
    include('r300/room315a.php');
} elseif ($roomID=='315') {
    include('r300/room315.php');
} elseif ($roomID=='314') {
    include('r300/room314.php');
} elseif ($roomID=='313') {
    include('r300/room313.php');
} elseif ($roomID=='312') {
    include('r300/room312.php');
} elseif ($roomID=='311') {
    include('r300/room311.php');
} elseif ($roomID=='310') {
    include('r300/room310.php');
} elseif ($roomID=='309') {
    include('r300/room309.php');
} elseif ($roomID=='308') {
    include('r300/room308.php');
} elseif ($roomID=='307') {
    include('r300/room307.php');
} elseif ($roomID=='306') {
    include('r300/room306.php');
} elseif ($roomID=='305') {
    include('r300/room305.php');
} elseif ($roomID=='304') {
    include('r300/room304.php');
} elseif ($roomID=='303') {
    include('r300/room303.php');
} elseif ($roomID=='302') {
    include('r300/room302.php');
} elseif ($roomID=='301') {
    include('r300/room301.php');
}
//sewer
if ($roomID=='232z') {
    include('r200/room232z.php');
} elseif ($roomID=='232y') {
    include('r200/room232y.php');
} elseif ($roomID=='232x') {
    include('r200/room232x.php');
} elseif ($roomID=='232w') {
    include('r200/room232w.php');
} elseif ($roomID=='232v') {
    include('r200/room232v.php');
} elseif ($roomID=='232u') {
    include('r200/room232u.php');
} elseif ($roomID=='232t') {
    include('r200/room232t.php');
} elseif ($roomID=='232s') {
    include('r200/room232s.php');
} elseif ($roomID=='232r') {
    include('r200/room232r.php');
} elseif ($roomID=='232q') {
    include('r200/room232q.php');
} elseif ($roomID=='232p') {
    include('r200/room232p.php');
} elseif ($roomID=='232o') {
    include('r200/room232o.php');
} elseif ($roomID=='232n') {
    include('r200/room232n.php');
} elseif ($roomID=='232m') {
    include('r200/room232m.php');
} elseif ($roomID=='232mm') {
    include('r200/room232mm.php');
} elseif ($roomID=='232l') {
    include('r200/room232l.php');
} elseif ($roomID=='232k') {
    include('r200/room232k.php');
} elseif ($roomID=='232j') {
    include('r200/room232j.php');
} elseif ($roomID=='232i') {
    include('r200/room232i.php');
} elseif ($roomID=='232h') {
    include('r200/room232h.php');
} elseif ($roomID=='232g') {
    include('r200/room232g.php');
} elseif ($roomID=='232f') {
    include('r200/room232f.php');
} elseif ($roomID=='232e') {
    include('r200/room232e.php');
} elseif ($roomID=='232d') {
    include('r200/room232d.php');
} elseif ($roomID=='232c') {
    include('r200/room232c.php');
} elseif ($roomID=='232b') {
    include('r200/room232b.php');
} elseif ($roomID=='232a') {
    include('r200/room232a.php');
}

//red town
elseif ($roomID=='225h') {
    include('r200/room225h.php');
} elseif ($roomID=='225g') {
    include('r200/room225g.php');
} elseif ($roomID=='225f') {
    include('r200/room225f.php');
} elseif ($roomID=='225e') {
    include('r200/room225e.php');
} elseif ($roomID=='225d') {
    include('r200/room225d.php');
} elseif ($roomID=='225c') {
    include('r200/room225c.php');
} elseif ($roomID=='225b') {
    include('r200/room225b.php');
} elseif ($roomID=='225a') {
    include('r200/room225a.php');
} elseif ($roomID=='226f') {
    include('r200/room226f.php');
} elseif ($roomID=='226e') {
    include('r200/room226e.php');
} elseif ($roomID=='226d') {
    include('r200/room226d.php');
} elseif ($roomID=='226c') {
    include('r200/room226c.php');
} elseif ($roomID=='226b') {
    include('r200/room226b.php');
} elseif ($roomID=='226a') {
    include('r200/room226a.php');
} elseif ($roomID==237) {
    include('r200/room237.php');
} elseif ($roomID==236) {
    include('r200/room236.php');
} elseif ($roomID==235) {
    include('r200/room235.php');
} elseif ($roomID==234) {
    include('r200/room234.php');
} elseif ($roomID==233) {
    include('r200/room233.php');
} elseif ($roomID==232) {
    include('r200/room232.php');
} elseif ($roomID==231) {
    include('r200/room231.php');
} elseif ($roomID==230) {
    include('r200/room230.php');
} elseif ($roomID==229) {
    include('r200/room229.php');
} elseif ($roomID==228) {
    include('r200/room228.php');
} elseif ($roomID==227) {
    include('r200/room227.php');
} elseif ($roomID==226) {
    include('r200/room226.php');
} elseif ($roomID==225) {
    include('r200/room225.php');
} elseif ($roomID==224) {
    include('r200/room224.php');
} elseif ($roomID==223) {
    include('r200/room223.php');
} elseif ($roomID=='222z') {
    include('r200/room222z.php');
} elseif ($roomID==222) {
    include('r200/room222.php');
} elseif ($roomID==221) {
    include('r200/room221.php');
} elseif ($roomID==220) {
    include('r200/room220.php');
} elseif ($roomID==219) {
    include('r200/room219.php');
} elseif ($roomID==218) {
    include('r200/room218.php');
} elseif ($roomID==217) {
    include('r200/room217.php');
} elseif ($roomID==216) {
    include('r200/room216.php');
} elseif ($roomID==215) {
    include('r200/room215.php');
} elseif ($roomID==214) {
    include('r200/room214.php');
} elseif ($roomID==213) {
    include('r200/room213.php');
} elseif ($roomID==212) {
    include('r200/room212.php');
} elseif ($roomID==211) {
    include('r200/room211.php');
} elseif ($roomID==210) {
    include('r200/room210.php');
} elseif ($roomID==209) {
    include('r200/room209.php');
} elseif ($roomID==208) {
    include('r200/room208.php');
} elseif ($roomID==207) {
    include('r200/room207.php');
} elseif ($roomID==206) {
    include('r200/room206.php');
} elseif ($roomID==205) {
    include('r200/room205.php');
} elseif ($roomID==204) {
    include('r200/room204.php');
} elseif ($roomID==203) {
    include('r200/room203.php');
} elseif ($roomID==202) {
    include('r200/room202.php');
} elseif ($roomID==201) {
    include('r200/room201.php');
}

//forest
elseif ($roomID==137) {
    include('r100/room137.php');
} elseif ($roomID==136) {
    include('r100/room136.php');
} elseif ($roomID==135) {
    include('r100/room135.php');
} elseif ($roomID==134) {
    include('r100/room134.php');
} elseif ($roomID==133) {
    include('r100/room133.php');
} elseif ($roomID==132) {
    include('r100/room132.php');
} elseif ($roomID==131) {
    include('r100/room131.php');
} elseif ($roomID==130) {
    include('r100/room130.php');
} elseif ($roomID==129) {
    include('r100/room129.php');
} elseif ($roomID==128) {
    include('r100/room128.php');
} elseif ($roomID==127) {
    include('r100/room127.php');
} elseif ($roomID==126) {
    include('r100/room126.php');
} elseif ($roomID==125) {
    include('r100/room125.php');
} elseif ($roomID==124) {
    include('r100/room124.php');
} elseif ($roomID==123) {
    include('r100/room123.php');
} elseif ($roomID==122) {
    include('r100/room122.php');
} elseif ($roomID==121) {
    include('r100/room121.php');
} elseif ($roomID==120) {
    include('r100/room120.php');
} elseif ($roomID==119) {
    include('r100/room119.php');
} elseif ($roomID==118) {
    include('r100/room118.php');
} elseif ($roomID==117) {
    include('r100/room117.php');
} elseif ($roomID==116) {
    include('r100/room116.php');
}
if ($roomID=='115k') {
    include('r100/room115k.php');
} elseif ($roomID=='115j') {
    include('r100/room115j.php');
} elseif ($roomID=='115i') {
    include('r100/room115i.php');
} elseif ($roomID=='115h') {
    include('r100/room115h.php');
} elseif ($roomID=='115g') {
    include('r100/room115g.php');
} elseif ($roomID=='115f') {
    include('r100/room115f.php');
} elseif ($roomID=='115e') {
    include('r100/room115e.php');
} elseif ($roomID=='115d') {
    include('r100/room115d.php');
} elseif ($roomID=='115c') {
    include('r100/room115c.php');
} elseif ($roomID=='115b') {
    include('r100/room115b.php');
} elseif ($roomID=='115a') {
    include('r100/room115a.php');
} elseif ($roomID==115) {
    include('r100/room115.php');
} elseif ($roomID==114) {
    include('r100/room114.php');
} elseif ($roomID==113) {
    include('r100/room113.php');
} elseif ($roomID==112) {
    include('r100/room112.php');
} elseif ($roomID=='111k') {
    include('r100/room111k.php');
} elseif ($roomID=='111j') {
    include('r100/room111j.php');
} elseif ($roomID=='111i') {
    include('r100/room111i.php');
} elseif ($roomID=='111h') {
    include('r100/room111h.php');
} elseif ($roomID=='111g') {
    include('r100/room111g.php');
} elseif ($roomID=='111f') {
    include('r100/room111f.php');
} elseif ($roomID=='111e') {
    include('r100/room111e.php');
} elseif ($roomID=='111d') {
    include('r100/room111d.php');
} elseif ($roomID=='111c') {
    include('r100/room111c.php');
} elseif ($roomID=='111b') {
    include('r100/room111b.php');
} elseif ($roomID=='111a') {
    include('r100/room111a.php');
} elseif ($roomID==111) {
    include('r100/room111.php');
} elseif ($roomID==110) {
    include('r100/room110.php');
} elseif ($roomID==109) {
    include('r100/room109.php');
} elseif ($roomID==108) {
    include('r100/room108.php');
} elseif ($roomID==107) {
    include('r100/room107.php');
} elseif ($roomID==106) {
    include('r100/room106.php');
} elseif ($roomID==105) {
    include('r100/room105.php');
} elseif ($roomID==104) {
    include('r100/room104.php');
} elseif ($roomID=='103c') {
    include('r100/room103c.php');
} elseif ($roomID=='103b') {
    include('r100/room103b.php');
} elseif ($roomID==103) {
    include('r100/room103.php');
} elseif ($roomID==102) {
    include('r100/room102.php');
} elseif ($roomID==101) {
    include('r100/room101.php');
}

// grassy field
elseif ($roomID=='30') {
    include('r000/room030.php');
} elseif ($roomID=='29') {
    include('r000/room029.php');
} elseif ($roomID=='028i') {
    include('r000/room028i.php');
} elseif ($roomID=='028h') {
    include('r000/room028h.php');
} elseif ($roomID=='028g') {
    include('r000/room028g.php');
} elseif ($roomID=='028f') {
    include('r000/room028f.php');
} elseif ($roomID=='028e') {
    include('r000/room028e.php');
} elseif ($roomID=='028d') {
    include('r000/room028d.php');
} elseif ($roomID=='028c') {
    include('r000/room028c.php');
} elseif ($roomID=='028b') {
    include('r000/room028b.php');
} elseif ($roomID=='28') {
    include('r000/room028.php');
} elseif ($roomID=='27') {
    include('r000/room027.php');
} elseif ($roomID=='26') {
    include('r000/room026.php');
} elseif ($roomID=='25') {
    include('r000/room025.php');
} elseif ($roomID=='24') {
    include('r000/room024.php');
} elseif ($roomID=='23') {
    include('r000/room023.php');
} elseif ($roomID=='22') {
    include('r000/room022.php');
} elseif ($roomID=='21') {
    include('r000/room021.php');
} elseif ($roomID=='20') {
    include('r000/room020.php');
} elseif ($roomID=='19') {
    include('r000/room019.php');
} elseif ($roomID=='18') {
    include('r000/room018.php');
} elseif ($roomID=='17') {
    include('r000/room017.php');
} elseif ($roomID=='16') {
    include('r000/room016.php');
} elseif ($roomID=='15') {
    include('r000/room015.php');
} elseif ($roomID=='14') {
    include('r000/room014.php');
} elseif ($roomID=='13') {
    include('r000/room013.php');
} elseif ($roomID=='012h') {
    include('r000/room012h.php');
} elseif ($roomID=='012g') {
    include('r000/room012g.php');
} elseif ($roomID=='012f') {
    include('r000/room012f.php');
} elseif ($roomID=='012e') {
    include('r000/room012e.php');
} elseif ($roomID=='012d') {
    include('r000/room012d.php');
} elseif ($roomID=='012c') {
    include('r000/room012c.php');
} elseif ($roomID=='012b') {
    include('r000/room012b.php');
} elseif ($roomID=='12') {
    include('r000/room012.php');
} elseif ($roomID=='11') {
    include('r000/room011.php');
} elseif ($roomID=='10') {
    include('r000/room010.php');
} elseif ($roomID=='9') {
    include('r000/room009.php');
} elseif ($roomID=='8') {
    include('r000/room008.php');
} elseif ($roomID=='7') {
    include('r000/room007.php');
} elseif ($roomID=='6') {
    include('r000/room006.php');
} elseif ($roomID=='005b') {
    include('r000/room005b.php');
} elseif ($roomID=='5') {
    include('r000/room005.php');
} elseif ($roomID=='4') {
    include('r000/room004.php');
} elseif ($roomID=='003c') {
    include('r000/room003c.php');
} elseif ($roomID=='003b') {
    include('r000/room003b.php');
} elseif ($roomID=='003bb') {
    include('r000/room003bb.php');
} elseif ($roomID=='3') {
    include('r000/room003.php');
} elseif ($roomID=='2') {
    include('r000/room002.php');
} elseif ($roomID=='1') {
    include('r000/room001.php');
}
// room zero
elseif ($roomID=='0') {
    include('r000/room000.php');
}
//else
//  {
//	   echo 'ROOM REBOOT! - '."$roomID";
//	 $sql = "UPDATE $username SET room = 0 "; // ROOM reboot
//   mysqli_query($link,$sql);
//	 }


//echo'</div>';   // END GAMEBOX
