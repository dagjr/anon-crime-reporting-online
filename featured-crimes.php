<?php
include_once 'functions/browserchecker.php';
?>
<?php require "includes/dbconnect.php";?>
<!DOCTYPE html>
<html>
<title>MACRO | Wanted Details</title>
<head>
   <link rel="icon" href="images/macrofavico.ico">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" type="text/css" href="css/unsolved.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <link href="css/animate.css" rel="stylesheet">
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
  <?php require 'navbar.html' ?><br><br><br>
<h1 id="uc1top" class="animated rubberBand">Unsolved Crime</h1>
<?php
$sql = "SELECT * from unsolved";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>

<form method="POST" action="multistep.php">
<div class="container">
    <div class="row">
        <div class="col-xs-12" id="ucContainer">
            <h4 class="animated fadeIn">PUBLISHED DATE: <?php echo $row["created_at"]; ?></h4><br>
            <img id="unsolved-img" class="animated bounceIn" src="unsolvedImages/<?php echo $row["imagename"]; ?>">
            <h1 id="ctitle" style="text-transform: uppercase;" class="animated fadeIn"><?php echo $row["title"]; ?></h1>
            <h4 class="animated fadeIn">CASE# <?php echo $row["casenumber"]; ?></h4>
            <p class="animated fadeIn"><?php echo $row["description"] ?></p>
            <br>
            
            <center><input type="submit" value="GIVE US TIPS" class="btn btn-info" href="#"></center>
            <br><br>
        </div>
    </div>
</div>
</form>

<?php
}}
else {
    echo "NO CRIME HAPPENNED";
}?>
</div>
<script type="text/javascript">
var Start;
function myFunction(){
  Start = setTimeout(showpage,2500);
}
function showpage(){
  document.getElementById("loader").style.display="none";
    document.getElementById("content").style.display="block";
}
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
