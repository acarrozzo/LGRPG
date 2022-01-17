<?php session_start(); ?>
<!--<!DOCTYPE html>--
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable = no">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="apple-mobile-web-app-capable" content="yes">

<link type="text/css" rel="stylesheet" href="css/lg.min.css" />
<link rel="stylesheet" type="text/css" href="css/rpg-awesome.css" >
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

</head>
-->
<?php include('head.php');?>

<?php
// -------------------------DB CONNECT!

include('db-connect.php');

echo '<div id="container">';
echo '<div id="title">';
//This code runs if the form has been submitted
if (isset($_POST['submit'])) {

 //This makes sure they did not leave any fields blank
    if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2']) {
        echo'<p class="red">You did not complete all of the required fields</p>';
        include('register-form.php');
        die('');
    }
    // checks if the username is in use
    $usercheck = $_POST['username'];
    //  echo '<br>USERCHECK: '.$usercheck;
    $query = "SELECT * FROM `$usercheck`";
    $GLOBALS['link'];
    //  $result = $conn->query($query);
    $result = mysqli_query($link, $query);
    //echo 'RRRR:'.$result;

    // this makes sure both passwords entered match
    if ($_POST['pass'] != $_POST['pass2']) {
        echo'<p class="red">Your passwords did not match. </p>';
        include('register-form.php');
        die('');
    }
    //if the name exists it gives an error
    else if ($result->num_rows > 0) {
        echo '<p class="red">Sorry, the username '.$_POST['username'].' is already in use.</p>';
        include('register-form.php');
        die('');
    }



    // here we encrypt the password and add slashes if needed
    $_POST['pass'] = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    if (!get_magic_quotes_gpc()) {
        $_POST['pass'] = addslashes($_POST['pass']);
        $_POST['username'] = addslashes($_POST['username']);
    }

    // now we insert it into the database
    //	 $insert = "INSERT INTO users (username, password)
    //		VALUES ('".$_POST['username']."', '".$_POST['pass']."')";

    $user = $username =	$_POST['username'];
    $pass = $_POST['pass'];
    global $username;

    // now we insert it into the database ------------------------------------ CREATE USER!!!!!
    $create = "CREATE TABLE $username (
username VARCHAR(60),
password VARCHAR(60),
room VARCHAR(15),
light VARCHAR(15),
recall VARCHAR(15),
feed LONGTEXT,
clicks int,
deaths int,

level int,
xp int,
bp int,
sp int,
currency int,
evolve int,

pots int,
woodenchests int,
graychests int,
silverchests int,

hp int,
hpmax int,
mp int,
mpmax int,

str int,
dex int,
mag int,
def int,
strmod int,
dexmod int,
magmod int,
defmod int,

onehanded int,
twohanded int,
ranged int,
onehandedpro int,
twohandedpro int,
rangedpro int,
warcraft int,
toughness int,
block int,
ddge int,
slice int,
smash int,
aim int,
magicstrike int,
multiarrow int,
boltupgrade int,
throwdagger int,
physicaltraining int,
mentaltraining int,
crafting int,
hardenweapon int,
hardenarmor int,

fireball int,
frostball int,
poisondart int,
magicarrow int,
atomicblast int,
meteor int,
heal int,
regenerate int,
antidote int,
unlck int,
ironskin int,
magicarmor int,
wings int,
gills int,

equipR VARCHAR(60),
equipL VARCHAR(60),
equipHead VARCHAR(60),
equipBody VARCHAR(60),
equipHands VARCHAR(60),
equipFeet VARCHAR(60),
equipRing1 VARCHAR(60),
equipRing2 VARCHAR(60),
equipNeck VARCHAR(60),
equipArtifact VARCHAR(60),
equipTech VARCHAR(60),
equipComp VARCHAR(60),
equipPet VARCHAR(60),
equipMount VARCHAR(60),
equipRobot VARCHAR(60),
equipAura VARCHAR(60),

dagger int,
stiletto int,
trainingsword int,
shortsword int,
broadsword int,
mace int,
club int,
longsword int,
flail int,
morningstar int,
samuraisword int,
gladius int,
masterblade int,
basicstaff int,
woodenstaff int,
wand int,
demondagger int,
wizardstaff int,
graywand int,
threechainedflail int,
bastardsword int,
giantclub int,
greatwhitesword int,
irondagger int,
ironsword int,
ironstaff int,
poisonsaber int,
ulfberht int,
waraxe int,
perfectsword int,
silversword int,
silverstaff int,
steeldagger int,
steelsword int,
steelstaff int,
silverwhip int,
sharpkatana int,
kingsscepter int,
forestsaber int,
blackblade int,
flamberg int,

mithrildagger int,
mithrilsword int,
mithrilstaff int,
vampiricdagger int,
guardianblade int,
goldfalcion int,
gmgclub int,
gkclub int,
kingblade int,
mithrilwand int,
mithrilflail int,
mithrilmace int,
mithrilcleaver int,

blacklongsword int,
gammaknife int,
draconicdagger int,
gladiusofvalor int,
earthelementalsword int,
waterelementalsword int,
airelementalsword int,
fireelementalsword int,


training2hsword int,
bo int,
battleaxe int,
warhammer int,
woodenbo int,
pike int,
claymore int,
greatsword int,
bostaff int,
battlestaff int,
dualtomahawk int,
nunchaku int,
brassknuckles int,
polearm int,
bonecudgel int,
hammerheadhammer int,
ironmaul int,
iron2hsword int,
ironbattlestaff int,
ironnunchaku int,
greataxe int,
trident int,
solomonsstaff int,
oakbattlestaff int,
jimbo int,
2hshield int,
silver2hsword int,
steel2hsword int,
steelbattlestaff int,
steelnunchaku int,
heavykatana int,
heavyspear int,
heavyhammer int,
oakwarhammer int,
bardiche int,
glaive int,
perfect2hsword int,
mithril2hsword int,
mithrilbattlestaff int,
mithrilnunchaku int,
humongousbattleaxe int,
gargantuanwarhammer int,
blessedspear int,
fortifiedfauchard int,
atomicwarhammer int,
blackbo int,
nuetronstaff int,
gravityhammer int,
obsidianbattlestaff int,
greatswordofearth int,
greatswordofwater int,
greatswordofair int,
greatswordoffire int,



boomerang int,
chakram int,
woodenbow int,
hunterbow int,
longbow int,
crossbow int,
arrows int,
bolts int,
harpoon int,
javelin int,
compoundcrossbow int,
handcrossbow int,
ironboomerang int,
ironbow int,
ironcrossbow int,
ironchakram int,
ironjavelin int,
jimbow int,
enchantedbow int,
silverboomerang int,
silverbow int,
silvercrossbow int,
steelboomerang int,
steelbow int,
steelcrossbow int,
steelchakram int,
steeljavelin int,
snowbow int,
rangerbow int,
keeperscrossbow int,
perfectbow int,

mithrilboomerang int,
mithrilbow int,
mithrilcrossbow int,
mithrilchakram int,
mithriljavelin int,
bladerang int,
blackboomerang int,
blackbow int,
blackcrossbow int,
rangercrossbow int,
galaxybow int,
chondrianbow int,


trainingshield int,
basicshield int,
kiteshield int,
buckler int,
woodenshield int,
huntershield int,
offhanddagger int,
towershield int,
glowingorb int,
enchantedorb int,
ironshield int,
ironkiteshield int,
redshield int,
deathorb int,
greenshield int,
silvershield int,
steelshield int,
steelkiteshield int,
vikingshield int,
greenorb int,
offhandsword int,
riotshield int,
mithrilshield int,
mithrilkiteshield int,
sphinxshield int,
rangershield int,
marksmanorb int,
cursedskull int,
offhandmace int,
offhandrubymace int,
heatershield int,
rangerorb int,
magictalisman int,
offhandboomerang int,
offhandchakram int,
offhandcrossbow int,
dragonshield int,
ultimashield int,
shieldoffools int,
forceshield int,



traininghelmet int,
basichelmet int,
basichood int,
redhood int,
greenhood int,
bluehood int,
leatherhood int,
leatherhelmet int,
hornedhelmet int,
barbarianhelmet int,
battlehelm int,
wizardhat int,
grayhood int,
scorpionhood int,
victoriashood int,
ironhood int,
ironhelmet int,
hauntedhelm int,
bandithood int,
calamaricap int,
heavyhelmet int,
earthhood int,
kettlehelm int,
perfecthelmet int,
silverhelmet int,
steelhood int,
steelhelmet int,
steelmasterhelm int,
trollcrown int,
rangerhood int,
gammahood int,
mithrilhelmet int,
mithrilhood int,
bansheemask int,
blackhood int,
magnificentcrown int,



trainingarmor int,
trainingarmorpro int,
paddedarmor int,
pajamas int,
greencloak int,
blackrobe int,
grayrobe int,
leathervest int,
leatherarmor int,
sasquatchcloak int,
turtleshell int,
ironarmor int,
ironcape int,
eartharmor int,
blackcape int,
forestcloak int,
warlockrobe int,
championarmor int,
perfectarmor int,
silverbreastplate int,
steelarmor int,
steelcape int,
rangercloak int,
yeticloak int,
demoncape int,
gammarobe int,
silverpajamas int,
mithrilarmor int,
mithrilcape int,
snowvest int,
blackcloak int,
terrarobe int,



traininggloves int,
wristbracers int,
glowingbrace int,
blackgloves int,
greengloves int,
graygloves int,
leathergloves int,
huntergloves int,
trollgloves int,
irongauntlets int,
irongloves int,
ironknuckles int,
gatorgloves int,
banditgloves int,
grottogloves int,
earthmittens int,
perfectgloves int,
silvergauntlets int,
steelgauntlets int,
steelgloves int,
silkbracers int,
rangergloves int,
gammahandwraps int,
mithrilgauntlets int,
mithrilgloves int,
vambraces int,
glowinggloves int,
perfectgauntlets int,


trainingboots int,
redboots int,
greenboots int,
blackboots int,
grayboots int,
slippers int,
leatherboots int,
trollboots int,
boneboots int,
ironboots int,
bigfootboots int,
banditboots int,
mudboots int,
warlockboots int,
earthboots int,
perfectboots int,
silverboots int,
steelboots int,
thunderboots int,
gammaboots int,
rangerboots int,
silverslippers int,
mithrilboots int,
crimsonmocassins int,
rangermocassins int,
silkmocassins int,
ultimaboots int,

ringofstrength int, ringofdexterity int, ringofmagic int, ringofdefense int,
ringofstrengthII int, ringofdexterityII int, ringofmagicII int, ringofdefenseII int,
ringofstrengthIII int, ringofdexterityIII int, ringofmagicIII int, ringofdefenseIII int,
ringofstrengthIV int, ringofdexterityIV int, ringofmagicIV int, ringofdefenseIV int,
ringofstrengthV int, ringofdexterityV int, ringofmagicV int, ringofdefenseV int,
ringofstrengthVI int, ringofdexterityVI int, ringofmagicVI int, ringofdefenseVI int,
ringofstrengthVII int, ringofdexterityVII int, ringofmagicVII int, ringofdefenseVII int,
ringofstrengthVIII int, ringofdexterityVIII int, ringofmagicVIII int, ringofdefenseVIII int,
ringofstrengthIX int, ringofdexterityIX int, ringofmagicIX int, ringofdefenseIX int,
ringofstrengthX int, ringofdexterityX int, ringofmagicX int, ringofdefenseX int,

ringofstrengthXI int, ringofdexterityXI int, ringofmagicXI int, ringofdefenseXI int,
ringofstrengthXII int, ringofdexterityXII int, ringofmagicXII int, ringofdefenseXII int,
ringofstrengthXIII int, ringofdexterityXIII int, ringofmagicXIII int, ringofdefenseXIII int,
ringofstrengthXIV int, ringofdexterityXIV int, ringofmagicXIV int, ringofdefenseXIV int,
ringofstrengthXV int, ringofdexterityXV int, ringofmagicXV int, ringofdefenseXV int,
ringofstrengthXVI int, ringofdexterityXVI int, ringofmagicXVI int, ringofdefenseXVI int,
ringofstrengthXVII int, ringofdexterityXVII int, ringofmagicXVII int, ringofdefenseXVII int,
ringofstrengthXVIII int, ringofdexterityXVIII int, ringofmagicXVIII int, ringofdefenseXVIII int,
ringofstrengthXIX int, ringofdexterityXIX int, ringofmagicXIX int, ringofdefenseXIX int,
ringofstrengthXX int, ringofdexterityXX int, ringofmagicXX int, ringofdefenseXX int,

soldiersring int,
hunterring int,
coyotering int,
redwizardring int,
greenwizardring int,
yellowwizardring int,
rabidring int,
vaporring int,
silverring int,
warpedring int,
ringofthemagi int,

ironring int,
steelring int,
mithrilring int,



ringofhealthregen int, ringofmanaregen int,
ringofhealthregenII int, ringofmanaregenII int,
ringofhealthregenIII int, ringofmanaregenIII int,
ringofhealthregenIV int, ringofmanaregenIV int,
ringofhealthregenV int, ringofmanaregenV int,
ringofhealthregenVI int, ringofmanaregenVI int,
ringofhealthregenVII int, ringofmanaregenVII int,
ringofhealthregenVIII int, ringofmanaregenVIII int,
ringofhealthregenIX int, ringofmanaregenIX int,
ringofhealthregenX int, ringofmanaregenX int,

ringofhealthregenXI int, ringofmanaregenXI int,
ringofhealthregenXII int, ringofmanaregenXII int,
ringofhealthregenXIII int, ringofmanaregenXIII int,
ringofhealthregenXIV int, ringofmanaregenXIV int,
ringofhealthregenXV int, ringofmanaregenXV int,
ringofhealthregenXVI int, ringofmanaregenXVI int,
ringofhealthregenXVII int, ringofmanaregenXVII int,
ringofhealthregenXVIII int, ringofmanaregenXVIII int,
ringofhealthregenXIX int, ringofmanaregenXIX int,
ringofhealthregenXX int, ringofmanaregenXX int,


woodennecklace int,
bonenecklace int,
stonenecklace int,
bluependant int,
redtalisman int,
greenpendant int,
coralnecklace int,
vapornecklace int,

ironnecklace int,
shamannecklace int,
warriorpendant int,
rangeramulet int,
royalnecklace int,
steelnecklace int,
silvernecklace int,
mithrilnecklace int,
owleyependant int,

coralcoin int,
squidtooth int,
pearlofwisdom int,
onyxcross int,
luckybone int,

flower int,
rawmeat int,
cookedmeat int,
redberry int,
blueberry int,
silverkey int,
goldkey int,
redpotion int,
bluepotion int,
purplepotion int,
veggies int,
meatball int,
bluefish int,
redbalm int,
redbar int,
redpill int,
bluebalm int,
bluebar int,
bluepill int,
purplebalm int,
olive int,
purplepill int,
graypill int,
wingspotion int,
gillspotion int,
antidotepotion int,
whitepotion int,
ressurectionphial int,
elixirofhealth int,
elixirofmagic int,


coffee int,
tea int,
reds int,
greens int,
blues int,
yellows int,
golds int,
purples int,


scorpiontail int,
batwing int,
bone int,
dung int,
teddybear int,
ironcharm int,
steelcharm int,
mithrilcharm int,
graymatter int,
bigfoot int,

COMPdwarfaxeman int,
COMPelfranger int,
COMPogreshieldmate int,
COMPsnowberserker int,

pethampster int,
petbat int,
babyowl int,

MOUNTwoodenboat int,
MOUNTironboat int,
MOUNTsteelboat int,
MOUNTmithrilboat int,
MOUNTdirewolf int,
MOUNTbluefalcon int,
MOUNTgreengriffin int,
MOUNTpony int,
MOUNTstallion int,
MOUNTclydesdale int,
MOUNTthoroughbred int,
MOUNTdonkey int,
MOUNTmule int,
MOUNTmustang int,
MOUNTunicorn int,

AURAshamansblessing int,
AURAstoneaura int,
AURAsilveraura int,

hatchet int,
pickaxe int,
hammer int,
ironhatchet int,
ironpickaxe int,
ironhammer int,
steelhatchet int,
steelpickaxe int,
steelhammer int,
mithrilhatchet int,
mithrilpickaxe int,
mithrilhammer int,

craftingtable VARCHAR(15),
fire VARCHAR(15),
string int,
water int,
sand int,
mud int,
glass int,
bottle int,
leather int,
wood int,
stone int,
iron int,
coal int,
steel int,
mithril int,

quest1 int, quest2 int, quest3 int, quest4 int, quest5 int,
quest6 int, quest7 int, quest8 int, quest9 int, quest10 int,
quest11 int, quest12 int, quest13 int, quest14 int, quest15 int,
quest16 int, quest17 int, quest18 int, quest19 int, quest20 int,
quest21 int, quest22 int, quest23 int, quest24 int, quest25 int,
quest26 int, quest27 int, quest28 int, quest29 int, quest30 int,
quest31 int, quest32 int, quest33 int, quest34 int, quest35 int,
quest36 int, quest37 int, quest38 int, quest39 int, quest40 int,
quest41 int, quest42 int, quest43 int, quest44 int, quest45 int,
quest46 int, quest47 int, quest48 int, quest49 int, quest50 int,

quest51 int, quest52 int, quest53 int, quest54 int, quest55 int,
quest56 int, quest57 int, quest58 int, quest59 int, quest60 int,
quest61 int, quest62 int, quest63 int, quest64 int, quest65 int,
quest66 int, quest67 int, quest68 int, quest69 int, quest70 int,
quest71 int, quest72 int, quest73 int, quest74 int, quest75 int,
quest76 int, quest77 int, quest78 int, quest79 int, quest80 int,
quest81 int, quest82 int, quest83 int, quest84 int, quest85 int,
quest86 int, quest87 int, quest88 int, quest89 int, quest90 int,
quest91 int, quest92 int, quest93 int, quest94 int, quest95 int,
quest96 int, quest97 int, quest98 int, quest99 int, quest100 int,

grandquest1 int,
grandquest2 int,
grandquest3 int,
grandquest4 int,
grandquest5 int,

teleport1 int,
teleport2 int,
teleport3 int,
teleport4 int,
teleport5 int,
teleport6 int,
teleport7 int,
teleport8 int,
teleport9 int,
teleport10 int,

enemy varchar(60),
enemyhpmax int,
enemyhp int,
enemyatt int,
enemydef int,

KLtotalkill int,
KLdummy int,
KLrat int,
KLgiantrat int,
KLspider int,
KLscorpion int,
KLgiantspider int,
KLalphascorpion int,
KLscorpionguard int,
KLmammothscorpion int,
KLscorpionqueen int,
KLscorpionking int,
KLsquirrel int,
KLbutterfly int,
KLbat int,
KLgator int,
KLsandcrab int,
KLgoldenbat int,
KLsalamander int,
KLgoblin int,
KLgoblinbandit int,
KLgoblinchief int,
KLcow int,
KLsnake int,
KLhillogre int,
KLhobgoblin int,
KLorc int,
KLogre int,
KLogreguard int,
KLfireogress int,
KLogrelieutenant int,
KLogrepriest int,
KLkobold int,
KLflyingkobold int,
KLkoboldshaman int,
KLkoboldninja int,
KLkoboldwarlock int,
KLkoboldchampion int,
KLkoboldmaster int,
KLkoboldmonk int,
KLwildboar int,
KLwolf int,
KLcoyote int,
KLbuck int,
KLbear int,
KLstag int,
KLbigfoot int,
KLhawk int,
KLimp int,
KLtarantula int,
KLsewerrat int,
KLredgator int,
KLflyingdungbeetle int,
KLthief int,
KLthiefpickpocket int,
KLthiefbrute int,
KLmasterthief int,

KLskeleton int,
KLskeletonarcher int,
KLskeletonknight int,
KLskeletonsorcerer int,
KLancientskeleton int,
KLomar int,
KLvictoria int,

KLrabidskeever int,
KLbleedingdartwing int,
KLmongoliandeathworm int,
KLdemonwing int,
KLpossessedaxeman int,
KLredbandit int,
KLbanditmarauder int,
KLbutcher int,
KLredbeard int,

KLjellyfish int,
KLelectriceel int,
KLpiranha int,
KLbarracuda int,
KLsquid int,
KLalbatross int,
KLcrocodile int,
KLkingsquid int,
KLmudcrab int,
KLgiantseaturtle int,
KLcolossalsquid int,
KLhammerhead int,
KLgreatwhite int,
KLkraken int,
KLglowingoctopus int,

KLthunderbarbarian int,
KLsmoothranger int,
KLcoralwizard int,
KLheavywalrus int,
KLwatertempleguardian int,
KLposeidon int,

KLdaggerdemon int,

KLironrat int,
KLironcrab int,
KLironscorpion int,
KLwarturtle int,
KLslagbeast int,
KLirongator int,
KLirongolem int,
KLphoenix int,
KLironcobra int,
KLearthgolem int,

KLsteelrat int,
KLsteelcrab int,
KLsteelscorpion int,
KLulfberht int,
KLblackfrog int,
KLsteelgator int,
KLsteelgolem int,
KLcyclops int,
KLstoneassassin int,
KLgammamonk int,

KLmithrilrat int,
KLmithrilcrab int,
KLmithrilscorpion int,
KLgriffin int,
KLbluefrog int,
KLmithrilgator int,
KLmithrilgolem int,
KLminotaur int,
KLcosmicmage int,
KLcarbonbeast int,

KLstonesentinel int,
KLironsentinel int,
KLsteelsentinel int,
KLmithrilsentinel int,
KLsentineltitan int,

KLbowman int,
KLhighwayman int,

KLtroll int,
KLtrollshaman int,
KLtrollsorcerer int,
KLtrollelder int,
KLtrollchampion int,
KLtrollqueen int,
KLtrollking int,
KLfalcon int,
KLent int,
KLdarkranger int,
KLwisp int,

KLforestprincess int,
KLdemigodofstrength int,
KLdemigodofdefense int,

KLlurker int,
KLwingeddemon int,
KLundeadorc int,
KLstonesphinx int,
KLwarpedpriest int,
KLdarkpaladin int,
KLdarkprince int,


KLfriendlygiant int,
KLmountaingiant int,
KLicetroll int,
KLgiantbrute int,
KLwyvern int,
KLstonedwarf int,
KLgiantmountaingiant int,
KLgatekeeper int,
KLyeti int,
KLsnowogre int,
KLsnowninja int,
KLsnowowl int,
KLdragon int,

KLgreygargoyle int,
KLwhitegargoyle int,
KLvampire int,
KLfallenpriest int,
KLfallenangel int,
KLrisenskeleton int,

KLgmg2 int,
KLgk2 int,
KLkingblade int,


infight int,
endfight int,
weapontype int,

chest1 int,
chest2 int,
chest3 int,
chest4 int,
chest5 int,
chest6 int,
chest7 int,
chest8 int,
chest9 int,
chest10 int,

roomzeromap int,
grassyfieldmap int,
grassyfieldundergroundmap int,
forestmap int,
forestundergroundmap int,
redtownmap int,
redtownsewersmap int,
stoneminemap int,
neverendingminemap int,
oceanmap int,
darkforestmap int,
worldmapv1 int,
worldmapv2 int,
worldmapv3 int,
worldmapv4 int,
worldmapv5 int,
worldmapfull int,

pajamashamanFlag int,
youngsoldierFlag int,
jacklumberFlag int,
hunterbillFlag int,
travelingwarriorFlag int,
travelingwizardFlag int,
warriorskillFlag int,
wizardskillFlag int,
miningskillFlag int,
rangerskillFlag int,
mastertrainerFlag int,
starcitysskillsFlag int,
starcityspellsFlag int




)";
    mysqli_query($link, $create);
    //8 core
    //21 stats
    //36 skills, spells
    //16 equip
    //165 weapons
    //156 armor
    //156 acc
    //48 misc
    // 4 comp
    // 3 pet
    //15 mount
    // 3 aura
    //12 tools

    //15 materials
    //100 quest
    //5 grand quest
    //10 teleport
    //5 enemy
    //175 kl
    //3 fight flag
    //10 chest flags
    //17 maps
    //13 skill/spell shop FLAGS


    $insert = ("INSERT INTO $username VALUES ('".$_POST['username']."', '".$_POST['pass']."','001',0,'001','FEEED!',0,0,
1,0,0,0,7,0,0,0,0,0,10,10,2,2,0,0,0,0,0,0,0,0,
0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
'fists', '<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>','<span> - - - </span>',
0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,

0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,

0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,

0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
0,0,0,0,
0,0,0,
0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
0,0,0,
0,0,0,0,0,0,0,0,0,0,0,0,

'-1','-1',0,0,0,0,0,0,0,0,0,0,0,0,0,
0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
0,0,0,0,0,
0,0,0,0,0,0,0,0,0,0,
'eName',7,7,2,2,
0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,

0,0,0,
0,0,0,0,0,0,0,0,0,0,
0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
0,0,0,0,0,0,0,0,0,0,0,0,0
)");
    mysqli_query($link, $insert); ?>
<?php
$feed_start = '

<span class="icon darkergray lg-logo">'.file_get_contents("img/svg/lg-logo.svg").'</span>
<br>
....................feed initialized<br>
+<br>
<h2>Welcome <span  class="blue">'.$username.'!</span></h2>
+<br>
<h4>Interactive with the world by clicking the buttons on screen.</h4>
<br><br>
<h4>When you interact with the world, the results will appear here, in this feed.</h4>
<br><br>
<h4>Use the tabs below to check Stats, Items, and Quests.</h4>
<br><br>
<h4>To explore you need to move around. Click the arrows below to navigate.</h4>
<br><br>
<h3>...Scroll up to see the past...</h3>';
    //<h3>When in doubt, LOOK around</h3>';

    //$query = $link->prepare("UPDATE $user SET feed = ? ");
    $query = $link->prepare("UPDATE $user SET feed = ? ");
    $query->bind_param("s", $feed_start);
    $query->execute();


    echo '<span class="icon gold key">'.file_get_contents("img/svg/character.svg").'</span>';

    echo '<h3 class="registerstart" >Thank you, you have registered: </h3>
    <h1 class="blue">'.$_POST['username'].' </h1>';
    //  echo 'USX: '.$_SESSION['username'] = $username;
    //  echo ' | USP: '.$_SESSION['pass'] = $pass;

    //include('members.php');

    echo '<a class="btn goldBG" href="index.php">Login Here</a></div> ';
} else {
    include('register-form.php');
    $input='look';
}

 ?>

</div>
</div>
