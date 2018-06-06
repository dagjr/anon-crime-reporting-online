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
  <link rel="stylesheet" type="text/css" href="css/most-wanted-list.css">
  <link rel="stylesheet" type="text/css" href="css/most-wanted-details.css">
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
  <h1 id="uc1top" class="animated rubberBand">Most Wanted Details</h1>
<?php

$wantedID = mysqli_real_escape_string($conn,$_GET['wantedID']);
 $sql = "SELECT * FROM wanted WHERE wantedID='$wantedID'";
 $result = mysqli_query($conn,$sql);
 $queryResults = mysqli_num_rows($result);
 $wd = 'warrantDate';
?>
<ol class="breadcrumb">
  <li><a href="index.php">MACRO</a></li>
  <li><a href="most-wanted-list.php">LIST WANTED</a></li>
  <li class="active">WANTED DETAILS</li>
</ol>
<?php
 if ($queryResults > 0) {
 	while ($row = mysqli_fetch_assoc($result)) {
 		?>
<!-- start of output and loop it -->
 	<div class="container">
    	<div class="row">
        	<div class="col-xs-12 col-sm-5 "><img style="width: 350px; height: 500px;border-radius: 5px;" class="img-responsive" src="wantedImages/<?php echo $row["imgName"];?>" /></div>
        	<div class="col-xs-12 col-sm-7" style="background-color:#EEEDEB;border-radius: 7px;">
        		<h3 id="mwd1"><?php echo strtoupper($row["firstName"]);?> <?php echo strtoupper($row["lastName"]);?> wanted for <?php echo strtoupper($row["CriminalCase"]);?></h3>
				<dl>
  					<dd>Crime Location: <?php echo $row["crimeLocation"];?>, Manila </dd>
  					<dd>Suspect Name: <?php echo ucfirst($row["firstName"]);?> <?php echo ucfirst($row["lastName"]);?> </dd>
  					<dd>Warrant Date: <?php  echo $row[$wd];?></dd>
				</dl>
				<dl>
					<dt>Crime Descriptions
						<dd>
							<?php echo $row['crimeDesc'] ?><br><br>
						</dd>
						<dd>Event Date/Time: <?php echo $row['time'] ?></dd>
					</dt>
				</dl>
				<dl>
					<dt>Suspect description
						<dd>
							Sex: <?php echo ucfirst($row['gender']) ?>
						</dd>
						<dd>
							Age Range: <?php echo $row['age'] ?>
						</dd>
						<dd>
							Height: <?php echo $row['height'] ?>
						</dd>
						<dd>
							Build: <?php echo ucfirst($row['build']) ?>
						</dd>
						<dd>
							Hair color: <?php echo ucfirst($row['hairColor']) ?>
						</dd>
						<dd>
							Hair type: <?php echo ucfirst($row['hairStyle']) ?>
						</dd>
						<dd>
							Hair length: <?php echo ucfirst($row['hairLength']) ?>
						</dd>
						<dd>
							Facial Hair: <?php echo ucfirst($row['facialHair']) ?>
						</dd>
						<dd>
							Ethnic appearance: <?php echo ucfirst($row['ethnicApp']) ?>
						</dd><br>
						<dd>
							Additional Infomation: <?php echo ucfirst($row['addInfo']) ?>
						</dd>
					</dt>
				</dl>
        	</div>
    	</div>
	</div><br><br>
<!-- end of output and loop it -->
 		<?php
 	}
 }
 ?>
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
