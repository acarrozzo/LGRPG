

<?php
	if(file_exists("chat-log.html") && filesize("chat-log.html") > 0){
		$handle = fopen("chat-log.html", "r");
		$contents = fread($handle, filesize("chat-log.html"));
		fclose($handle);

		echo $contents;
	}
	?>

   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
// jQuery Document
$(document).ready(function(){
	//If user submits the form
	$("#submitmsg").click(function(){
		var clientmsg = $("#usermsg").val();
		$.post("post.php", {text: clientmsg});
		$("#usermsg").attr("value", "");
		return false;
	});

	//Load the file containing the chat log
	function loadLog(){
		var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
		$.ajax({
			url: "chat-log.html",
			cache: false,
			success: function(html){
				$("#chatbox").html(html); //Insert chat log into the #chatbox div
				var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					$("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}
		  	},
		});
	}
	//setInterval (loadLog, 1500);	//Reload file every 2.5 seconds (1500)
	setInterval (loadLog, 150000);	//Reload file every 250 seconds (150000)


});
</script>

<script>
//$('#chat-module').scrollTop($('#chat-module')[0].scrollHeight);
</script>
