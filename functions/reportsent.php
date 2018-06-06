<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>MACRO | REPORT SUCCESS</title>
      <link rel="icon" href="../images/macrofavico.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anton">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Faster One">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Gothic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Didact Antic">
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <link href="../css/animate.css" rel="stylesheet">
  </head>
  <body onload="myFunction()">
    <div class="container" onload="myFunction()">
      <div class="row">
        <div id="preloader">
          <div id="loader"></div>
        </div>
      </div>
    </div>



    <div id="content">
<?php require '../navbarFunctions.html' ?>
    <div class='container-fluid'>
    <div class='row padding15'>
      <div class='col-xs-10 col-md-6  col-xs-offset-1 col-md-offset-3'>
        <div class='row text-center'><br><br><br><br>
          <hr/>
          <h1 style="font-family: 'Anton', serif;font-size: 48px;">MACRO PH</h1>
        </div>

        <div>
          <center>
          <h3 class='text-success' style="font-family: 'Faster One', serif;font-size: 30px;"> REPORT SUCCESS! </h3>
          </center>
          <br />
          <center>
          <p class='lead' style="font-family: 'Didact Gothic', serif;font-size: 25px;">
            REFERENCE ID: <b><?=$_GET['referenceID']?></b> <br>
            PASSWORD: <b><?=$_GET['referencePassword']?></b></center>
            <br/>
            <br/>
          <p style="font-family: 'Antic', serif;">DO NOT LOSE THE ABOVE REFERENCE ID AND PASSWORD.
          IT IS THE ONLY WAY TO CHECK THE STATUS OF YOUR REPORT.
          Be sure to login at <a href="../">MACRO PH</a> to provide any additional information to this report. Also, login often to see if there are any follow up questions pending which you could possibly answer.</p>
          <br></p>

        </div>

        <hr/>
        <div class='row text-center padding15'>
          <a href='../'>&copy; 2018 MACRO PH</a>
        </div>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
  var Start;
  function myFunction(){
    Start = setTimeout(showpage,2500);
  }
  function showpage(){
    document.getElementById("preloader").style.display="none";
    document.getElementById("loader").style.display="none";
      document.getElementById("content").style.display="block";
  }
  </script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
</html>
