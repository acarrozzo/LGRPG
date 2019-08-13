<?
session_start();
if(isset($_SESSION['name'])){
	$text = $_SESSION['name']." say's : ".$_POST['text'];
	
	$fp = fopen("chat-log.html", 'a');
	fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."222<br></div>");
	fclose($fp);
}
?>