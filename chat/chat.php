<?php ?>
<html>
  <head>
    <meta name="generator"
    content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />

	<link href="css/chat.css" rel="stylesheet">
    <title>chatbox</title>
    <script>
	
 function submitChat() {
	if ( form1.msg.value == "")
		{ 
			return;
		}
	//$('#loading').show();
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() { 
	if (this.readyState == 4 && this.status == 200) { 
		var chatlogs = document.getElementById("chatlogs"); 
		chatlogs.innerHTML = xmlhttp.responseText;
		form1.msg.value="";
		$("#chatlogs").scrollTop(function() { return this.scrollHeight; });
		//$('#loading').hide();
		} 
	} 
	xmlhttp.open("GET","chat/insert.php?msg="+msg, true);
	xmlhttp.send(); 
} 
$(document).ready (function(){
	$.ajaxSetup({cache:false});
	setInterval(function(){
		$("#chatlogs").load('chat/logs.php');
		updateScroll();
		}, 2000);

	
	var scrolled = false;
	function updateScroll(){
		if(!scrolled){
			var element = document.getElementById("chatlogs");
			element.scrollTop = element.scrollHeight;
		}
	}
	$("#chatlogs").scroll (function(){
		scrolled=true;
	});
	});
	</script>
  </head>
  <body>
  <div id="chatArea">
		<div class="container">
			<div class="row">
				<div class = " well">
					<div class="well" id="chatlogs">Retrieving.. <span class="fa fa-circle-o-notch fa-spin fa-fw"></span>
					</div><div id="loading" style="display:none;"><span class="fa fa-circle-o-notch fa-spin fa-fw"></span></div>
					<form name="form1">
						<div class="form-group">
							<div class="textarea-container">
								<textarea class="form-control" 
								name="msg" 
								placeholder="Type your message here"
								onkeydown = "if (event.keyCode == 13)
									document.getElementById('chat-send').click()"
								></textarea>
							  <a href="#" id="chat-send" onclick="submitChat()"><span class="fa fa-paper-plane"></span></a>
							</div>
							<!--
							<textarea rows="1" style="resize:none;" class="form-control" name="msg"></textarea>
							<br />
							<a href="#" class="btn btn-primary" onclick="submitChat()">send</a>
							<br />
							<br />
							-->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
  </body>
</html>
