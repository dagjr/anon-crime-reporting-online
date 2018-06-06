<?php
include_once 'functions/browserchecker.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>MACRO PH</title>
  <?php require ("indexheader.html");?>
</head>
<body>
  <?php
  session_start();
  $_SESSION['loggedIn']=false;
  if (isset($_SESSION['reportID'])){
    if ($_SESSION['reportID'] != 0 || $_SESSION['reportID'] != NULL){
      $_SESSION['loggedIn'] = true;
    }
  }
  ?>
  <div class="container" id="main">
    <div class="row" id="welcome">
      <div  class="col-md-8 col-sm-8 leftside animated fadeInLeft" id="macro00">
        <br><br><br><br>
        <div class="leftside jumbotron well" id="chatbox">
          <?php if ($_SESSION['loggedIn']) {
            require_once ("chat/chat.php");
          } else{ ?>
            <h2>Welcome to <b>Macro</b>.</h2>
            <p>Or <b>Manila's Anonymous Crime Reporting Online.</b> Connect with us — get to know all crime-related issues in your community. Get in-the-moment updates of the reports you submitted. And learn how crimes unfold, in real time, from every angle.</p>
          <?php } ?>
        </div>
      </div>
      <?php require 'login/login.php'; ?>
    </div>
    <!-- end row -->
  </div>
  <!-- end container -->
</div><!-- end container -->
<footer>
  <div class="container-fluid hidden-sm  ">
    <div id="footer-chenes">

      <div class="text-center animated fadeInUp unselectable" id="box2" >


        <div href="#myModal1" data-toggle="modal">
          <img src="images/type.png" class="img-responsive animated fadeInUpBig" id="imgthief1">
          <div id="reportContainer">
            <h3><strong style="color: white; "><br>TELL</strong></h3>
            <p>Tell us anything, anonymously.</p>
          </div>
        </div>
      </div>
      <!-- end of col 6 -->
    </div>
    <!-- end of row footer-chenes -->
  </div>
  <!-- end of container -->
  <div id="or-separator" class="unselectable wow fadeInUpBig animated hidden-sm">
    OR
  </div>
  <div class="container-fluid hidden-sm" >
    <div id="footer-chenes1">

      <div class="text-center animated fadeInUp unselectable" id="box1">


        <div href="#myModal" data-toggle="modal">
          <img src="images/thief.png" class="animated fadeInUpBig" id="imgthief">
          <div id="crimeContainer">
            <h3><strong style="color: white;"><br>LISTEN</strong></h3>
            <p>Hear from our records and learn from us, for free.</p>
          </div>
        </div>
      </div>
      <!-- end of col 6 -->
    </div>
    <!-- end of row footer-chenes -->
  </div>
  <!-- end of container -->
  <div class="modal fade text-center" id="myModal">
    <div class="modal-dialog" id="modaldialoglisten">
      <div class="modal-content" id="modalchenes">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
          <br>
          <h2><strong>Hear from our records.</strong></h2>
          <br>
          <div class="container" id="modallisten">
            <div class="row">
              <div class="col-sm-4 animated ">
                <a href="most-wanted-list.php">
                  <button type="button" class="btn btn-default mbtn"><img src="images/mostwanted.png"><br>Most Wanted</button>
                </a>
              </div>
              <div class="col-sm-4 animated ">
                <a href="featured-crimes.php">
                  <button type="button"  class="btn btn-default mbtn"><img src="images/gun.png"><br>Featured Crime</button>
                </a>
              </div>
              <div class="col-sm-4 animated ">
                <a href="keep-safe.php">
                  <button type="button"  class="btn btn-default mbtn"><img src="images/safe.png"><br>Keeping Safe</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- end modal-body -->
      </div>
      <!-- end modal-content -->
    </div>
    <!-- end modal-dialog -->
  </div>
  <!-- end myModal -->
  <div class="modal text-center fade" id="myModal1">
    <div class="modal-dialog">
      <div class="modal-content" id="modalchenes">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
          <i class="fa fa-exclamation-triangle fa-5x" style="color: white;"></i>
          <br>
          <h2><strong>Is the crime happening right now?</strong></h2>
          <div class="container">
            <div class="row">
              <div class="col-sm-6 animated fadeIn">
                <!--<a href="#myModal3" data-toggle="modal">-->
                <a href="multistep.php">
                  <button type="button" id="m1btn1"  class="btn btn-default">No, show me the report menu.</button>
                </a>
              </div>
              <div class="col-sm-6 animated fadeIn">
                <a href="#myModal2" data-toggle="modal">
                  <button type="button" id="m2btn2"   class="btn btn-default">Yes, show me emergency numbers.</button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- end modal-body -->
      </div>
      <!-- end modal-content -->
    </div>
    <!-- end modal-dialog -->
  </div>
  <!-- end myModal -->
  <div class="modal text-center fade" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content" id="modalchenes">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
          <br>
          <h2><strong>Tell us your story, we will listen.</strong></h2>
          <br>
          <div class="row">
            <div class="col-sm-3" >
              <a href="multistep.php" id="hiddenindesktop">
                <button type="button" class="btn btn-default mbtn"><img src="images/createreport.png"><br>Create Report</button>
              </a>
            </div>
            <div class="col-sm-3 animated ">
              <a href="#">
                <button type="button"  class="btn btn-default mbtn"><img src="images/wanted.png"><br>Blank Space</button>
              </a>
            </div>
            <div class="col-sm-3 animated ">
              <a href="#">
                <button type="button" class="btn btn-default mbtn"><img src="images/wanted.png"><br>Blank Space</button>
              </a>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <center><button data-dismiss="modal" type="button" class="btn btn-danger">Back</button></center>
        </div><!-- end modal-footer -->
      </div>
      <!-- end modal-body -->
    </div>
  </div>
</div>
<div class="modal text-center fade" id="myModal2">
  <div class="modal-dialog">
    <div class="modal-content" id="modalchenes">
      <div class="modal-body">
        <i class="fa fa-info-circle fa-5x" style="color: white;"></i>
        <br>
        <h2><strong>Please dial 911 or any of these emergency numbers:
        </strong></h2>
        <div class="container">
          <div class="row">
            <p><b>Philippine National Police (PNP) hotline patrol</b><br>Hotline: 911 / (02)722-0650<br>Text hotline: 0917-847-5757<br><b>Bureau of Fire Protection (NCR)</b><br>Direct line: (02) 426-0219, (02) 426-3812, (02)426-0246
            </p>
          </a>
        </div>
      </div>
    </div><!-- end modal-body -->
    <div class="modal-footer">
      <center><button data-dismiss="modal" type="button" class="btn btn-danger">Back</button></center>
    </div><!-- end modal-footer -->
  </div><!-- end modal-content -->
</div><!-- end modal-dialog -->
</div><!-- end myModal -->

</footer>

<!-- If no online access, fallback to our hardcoded version of jQuery -->
<script>window.jQuery || document.write('<script src="js/jquery-1.8.2.min.js"><\/script>')</script>
<!-- Custom JS -->
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
var Start;
function myFunction(){
  Start = setTimeout(showpage,2500);
}
function showpage(){
  document.getElementById("loader").style.display="none";
  document.getElementById("preloader").style.display="none";
  document.getElementById("content").style.display="block";
}
</script>
<script type="text/javascript">
$(document).ready(function(){
  $("#closeeye").click(function(){
    $("#password").attr("type", "text");
    $(this).hide();
    $("#openeye").show();
  });
});
$(document).ready(function(){
  $("#openeye").click(function(){
    $("#password").attr("type", "password");
    $(this).hide();
    $("#closeeye").show();
  });
});
</script>

</body>
</html>
