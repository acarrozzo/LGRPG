<?php
// -- 003 -- Wood Cabin - OLD MAN
$roomname = "Wood Cabin";
$lookdesc = $_SESSION[ 'lookdesc' ] = $_SESSION[ 'desc003' ];
//$dangerLVL = $_SESSION['dangerLVL'] = "0"; // danger level



include( 'function-start.php' );


// -------------------------DB CONNECT!
include( 'db-connect.php' );
// -------------------------DB QUERY!
$sql = "SELECT * FROM $username";
if ( !$result = $link->query( $sql ) ) {
	die( 'There was an error running the query [' . $link->error . ']' );
}
// -------------------------DB OUTPUT!
while ( $row = $result->fetch_assoc() ) {
	$gold = $row[ 'currency' ];
	$xp = $row[ 'xp' ];
	$flower = $row[ 'flower' ];
	$quest1 = $row[ 'quest1' ];
	$quest2 = $row[ 'quest2' ];
	$quest3 = $row[ 'quest3' ];
	$rawmeat = $row[ 'rawmeat' ];

	$KLdummy = $row[ 'KLdummy' ];
	$KLgiantrat = $row[ 'KLgiantrat' ];


	$quest4 = $row[ 'quest4' ];
}



if ( $input == 'attack' || $input == 'a' || $input == 'attack dummy' || $input == 'attack dummy again' ) {
	include( 'battle-dummy.php' );
	$results = $link->query( "UPDATE $user SET KLdummy = 1" ); // -- update KLdummy
}
// -------------------------------------------------------------------------- ROOM ACTIONS
else if ( ( $input == 'cook all meat' || $input == 'cook meat' || $input == 'cook raw meat' ) && $rawmeat >= 1 ) {
	$times = $rawmeat;
	echo $message = "<i>You COOK $times meat at the cabin fireplace. Tasty!</i><br/>";
	$results = $link->query( "UPDATE $user SET rawmeat = rawmeat - $times" );
	$results = $link->query( "UPDATE $user SET cookedmeat = cookedmeat + $times" );
	include( 'update_feed.php' ); // --- update feed
} else if ( ( $input == 'cook all meat' || $input == 'cook meat' || $input == 'cook raw meat' ) && $quest3 <= 1 ) {
	echo $message = "<i>You need to complete Quest 3 to gain access to the cooking fire.</i><br/>";
	include( 'update_feed.php' ); // --- update feed

} else if ( ( $input == 'cook all meat' || $input == 'cook meat' || $input == 'cook raw meat' ) && $rawmeat <= 0 ) {
	echo $message = "<i>You have no raw meat left to cook.</i><br/>";
	include( 'update_feed.php' ); // --- update feed

}
/*
else if($input=='ex old man') {  //ex old man
   echo $message ="The old man is just sitting here, smiling, rocking in his chair and staring out the window.<br/>";
	include ('update_feed.php'); // --- update feed	
}
else if($input=='ex chair') {  //ex rocking chair
   echo $message ="The rocking chair is old. Just like the man.<br/>";
	include ('update_feed.php'); // --- update feed	
}

else if($input=='ex cabin') {  //ex cabin
   echo $message ="The cabin is warm and cozy. A cooking fire burns here and the old man is rocking in his chair.<br/>";
	include ('update_feed.php'); // --- update feed	
}

else if($input=='ex dummy') {  //ex dummy
   echo $message ="The dummy is made out of wood and can be used to practice attacks.<br/>";
	include ('update_feed.php'); // --- update feed	
}
*/
else if ( $input == 'ex cabin' ) { //ex cabin
	echo $message = "The cabin is warm and cozy. A cooking fire burns here and the old man is rocking in his chair. A wooden dummy is set up in the corner of the cabin for you to practice attacking.";
	include( 'update_feed.php' ); // --- update feed	
}





// ---------------------- START ALL QUESTS ---------------------- //
else if ( $input == 'start quests' ) {
	if ( $quest1 < 1 || $quest2 < 1 || $quest3 < 1 ) {
		echo $message = "<div class='menuAction'>
	<strong class='green px30'>You start the Old Man's Quests (1 - 3)</strong>
	<p>Check your Quests tab to review what needs to be done.</p></div> ";
		include( 'update_feed.php' ); // --- update feed
		$results = $link->query( "UPDATE $user SET quest1 = 1" );
		$results = $link->query( "UPDATE $user SET quest2 = 1" );
		$results = $link->query( "UPDATE $user SET quest3 = 1" );
	}
}




// -------------------------------------------------------------------------- QUEST 1 - 
if ( $input == 'info 1' ) {
	echo $message = "<div class='menuAction'>
	<strong class='green px30'>Quest 1 Info</strong>
	<p>The Old Man will reward you if you bring him a flower. You can find a flower patch just north of here.</p></div>";
	include( 'update_feed.php' ); // --- update feed
} else if ( $input == 'complete 1' ) {
	if ( $quest1 == 1 && $flower != 1 ) {
		echo $message = "<div class='menuAction'>
		<strong class='green px30'>Quest 1 Not Complete</strong>
		<p>You need to have a flower to complete this Quest. You can find one in the patch north of here.</p></div>";
		include( 'update_feed.php' ); // --- update feed
	} else if ( $quest1 == 1 && $flower == 1 ) {
		echo $message = "
		<div class='questWin'><h3>Quest 1 Completed!</h3>
		<h4>A Flower for my Wife</h4>
		You give the flower to the old man. He smiles and thanks you. He informs you that his wife is buried in the swamp and he will be putting the flowers on her grave later tonight. He gives you some $currency and you also gain some xp.
		<h4>Rewards</h4>
		[ + 5 xp ]<br/>
		[ + 10 $currency ]</div>";

		include( 'update_feed.php' ); // --- update feed
		$results = $link->query( "UPDATE $user SET flower = flower - 1" );
		$results = $link->query( "UPDATE $user SET xp = xp + 5" );
		$results = $link->query( "UPDATE $user SET currency = currency + 10" );
		$results = $link->query( "UPDATE $user SET quest1 = 2" );
	}
}









// -------------------------------------------------------------------------- QUEST 2 - 
else if ( $input == 'info 2' ) {
	echo $message = "<div class='menuAction'>
	<strong class='green px30'>Quest 2 Info</strong>
	<p>There is a wooden practice dummy standing in the corner of the room. You can fight the dummy with no risk of getting hurt. ATTACK.</p></div>";
	include( 'update_feed.php' ); // --- update feed
} else if ( $input == 'complete 2' ) {
	if ( $quest2 == 1 && $KLdummy >= 1 ) {
		echo $message = "
		<div class='questWin'><h3>Quest 2 Completed!</h3>
		<h4>Practice on the Dummy</h4>
		You have proved to the old man that you can indeed attack a lifeless dummy. He gives you a dagger and some $currency. Before you take on the next quest, you should get a sword and shield west of here if you haven't already.
	  	<h4>Rewards</h4>
  	  	[ + 5 xp ]</br>
      	[ + 10 $currency ]</br>
	  	[ + dagger! ( +1 str ) ]</div>";
		include( 'update_feed.php' ); // --- update feed
		$results = $link->query( "UPDATE $user SET currency = currency + 10" );
		$results = $link->query( "UPDATE $user SET xp = xp + 5" );
		$results = $link->query( "UPDATE $user SET dagger = dagger + 1" );
		$results = $link->query( "UPDATE $user SET quest2 = 2" );
	} else if ( $quest2 == 1 && $KLdummy == 0 ) {
		echo $message = "<div class='menuAction'>
		<strong class='green px30'>Quest 2 Not Complete</strong>
		<p>Attack the dummy in this room as much as you like. Speak to the Old Man when you are done for a reward.</p></div>";
		include( 'update_feed.php' ); // --- update feed
	}
}









// -------------------------------------------------------------------------- QUEST 3
if ( $input == 'info 3' ) {
	echo $message = "<div class='menuAction'>
	<strong class='green px30'>Quest 3 Info</strong>
	<p>The Old Man has a Rat Problem. Go down into the Basement and exterminate a Giant Rat.</p></div>";
	include( 'update_feed.php' ); // --- update feed
} else if ( $input == 'complete 3' ) {
	if ( $KLgiantrat >= 1 && $quest3 == 1 ) {
		echo $message = "
		<div class='questWin'><h3>Quest 3 Completed!</h3>
		<h4>Rat Problem</h4>
		You have killed a Giant Rat! The Old Man will now allow you to use his fire. Cook the raw meat you get from rats and other animals to make some delicious steaks that heal 50 HP when eaten. Go ahead and COOK MEAT.
	  	<h4>Rewards</h4>
  	  	[ + 10 xp  ]<br />
      	[ + 30 $currency ]<br/>
		[ + 5 raw meat ( heals 50 hp each ) ]<br/>
		[ can cook meat here! ]</div>";
		include( 'update_feed.php' ); // --- update feed
		$results = $link->query( "UPDATE $user SET currency = currency + 30" );
		$results = $link->query( "UPDATE $user SET rawmeat = rawmeat + 5" );
		$results = $link->query( "UPDATE $user SET xp = xp + 10" );
		$results = $link->query( "UPDATE $user SET quest3 = 2" );
	} else if ( $quest3 == 1 ) {
		echo $message = "<div class='menuAction'>
		<strong class='green px30'>Quest 3 Not Complete</strong>
		<p>Go down into the basement and exterminate a Giant Rat.</p></div>";
		include( 'update_feed.php' ); // --- update feed
	}
}








// -------------------------------------------------------------------------- TRAVEL
else if ( $input == 'n' || $input == 'north' ) {
	echo 'You travel north<br/>';
	$message = "<i>You travel north</i><br/>" . $_SESSION[ 'desc004' ];
	include( 'update_feed.php' ); // --- update feed
	$results = $link->query( "UPDATE $user SET room = '004'" ); // -- room change
} else if ( $input == 'e' || $input == 'east' ) {
	echo 'You travel east<br/>';
	$message = "<i>You travel east</i><br/>" . $_SESSION[ 'desc002' ];
	include( 'update_feed.php' ); // --- update feed
	$results = $link->query( "UPDATE $user SET room = '002'" ); // -- room change
} else if ( $input == 'w' || $input == 'west' ) {
	echo 'You travel west<br/>';
	$message = "<i>You travel west</i><br/>" . $_SESSION[ 'desc003c' ];
	include( 'update_feed.php' ); // --- update feed
	$results = $link->query( "UPDATE $user SET room = '003c'" ); // -- room change
} else if ( $input == 'ne' || $input == 'northeast' ) {
	echo 'You travel northeast<br/>';
	$message = "<i>You travel northeast</i><br/>" . $_SESSION[ 'desc001' ];
	include( 'update_feed.php' ); // --- update feed
	$results = $link->query( "UPDATE $user SET room = '001'" ); // -- room change
} else if ( $input == 'sw' || $input == 'southwest' ) {
	if ( $quest1 < 2 || $quest2 < 2 || $quest3 < 2 ) {
		echo $message = "<div class='menuAction'><i class='fa fa-times-circle px25 red'></i>Whoa there! There's a dangerous Gator to the southwest! Complete these 3 Quests first and then you can enter.</div>";
		include( 'update_feed.php' ); // --- update feed
	} else {
		echo 'You travel southwest<br/>';
		$message = "<i>You travel southwest</i><br/>" . $_SESSION[ 'desc013' ];
		include( 'update_feed.php' ); // --- update feed
		$results = $link->query( "UPDATE $user SET room = '013'" ); // -- room change
		$results = $link->query( "UPDATE $user SET endfight = 0" ); // -- reset fight
	}
} else if ( $input == 'd' || $input == 'down' ) {


	if ( $quest4 < 2 ) {
		echo $message = "<div class='menuAction'><i class='fa fa-times-circle px25 red'></i>Whoa Whoa Whoa! you'll need to equip a weapon  before you can enter the basement! Go west of here and talk to the Young Soldier to get one. You can enter once you complete his first quest.</div>";
		include( 'update_feed.php' ); // --- update feed
	} else {
		echo 'You travel down into the basement<br/>';
		$message = "<i>You travel down into the basement</i><br/>" . $_SESSION[ 'desc003b' ];
		include( 'update_feed.php' ); // --- update feed
		$results = $link->query( "UPDATE $user SET room = '003b'" ); // -- room change
		$results = $link->query( "UPDATE $user SET endfight = 0" ); // -- reset fight
	}
}



// ----------------------------------- end of room function
include( 'function-end.php' );

?>