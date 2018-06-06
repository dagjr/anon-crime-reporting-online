<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">

  <meta name="description" content="">

<link rel="icon" href="images/macrofavico.ico">


<!-- Mobile viewport optimized -->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no">

<!-- Bootstrap CSS -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

<link href="../css/bootstrap-glyphicons.css" rel="stylesheet">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/chat-admin.css">

<!-- Custom CSS -->
<link href="../css/styles.css" rel="stylesheet">
<link href="../css/animate.css" rel="stylesheet">
<link href="../css/normalize.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>

<script src="../js/jquery-3.2.1.min.js"></script>
<!-- Include Modernizr in the head, before any other Javascript -->
<script src="../js/modernizr-2.6.2.min.js"></script>

<!-- jQuery -->
<script src="../js/jquery.validate.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- GOOGLE FONT -->
<link href='https://fonts.googleapis.com/css?family=Vast Shadow' rel='stylesheet'>

  <meta name="generator"
  content="HTML Tidy for HTML5 (experimental) for Windows https://github.com/w3c/tidy-html5/tree/c63cc39" />

  <link href="../css/chat.css" rel="stylesheet">
  <title>chatbox</title>

</head>
<body style="overflow:hidden;">
  <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
  <script type="text/javascript">
    var id;
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

  </script>
  <div class="container" id="main">
   <div class="row" id="welcome">
    <div  id="chat123" class="col-md-4 col-sm-4 leftside animated fadeInLeft" style="padding-top:7%;max-height:620px;min-height: 350px;overflow:auto; margin:none;">

        <script type='text/javascript'>setInterval(function(){
          $('#chat-inbox').load('../chat/inbox.php');
        }, 2000);</script>
      <div id="chat-inbox">
      </div>
    </div>
    <div  class="col-md-8 col-sm-8 leftside animated fadeInLeft">
     <br><br><br><br>
     <div class="leftside jumbotron well" id="chatbox">
      <?php if (true) { ?>
      <div id="chatArea ">
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
               <?php   } ?>
             </div>
           </div>
         </div>
         <!-- end row -->
       </div>
       <!-- end container -->
     </div><!-- end container -->



     <script>window.jQuery || document.write('<script src="../js/jquery-1.8.2.min.js"><\/script>')</script>



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
//

<?php $_SESSION['isAdmin'] = true; ?>


//
xmlhttp.open("GET","../chat/insert.php?msg="+msg + "&id=" + id, true);
xmlhttp.send();
}
$(document).ready (function(){

  $.ajaxSetup({cache:false});





});
</script>
<script language="javascript" type="text/javascript">
  document.oncontextmenu=RightMouseDown;
  document.onmousedown = mouseDown;

  function mouseDown(e) {
      if (e.which==3) {//righClick
      alert("Disabled - do whatever you like here..");
   }
}
function RightMouseDown() { return false;}
</script>



</body>
</html>
