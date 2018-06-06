<?php
include_once 'functions/browserchecker.php';
?>
<?php include 'includes/dbconnect.php'?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="images/macrofavico.ico">
  <title>MARCO | KEEP SAFE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/keep-safe.css">
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
  <link href="css/animate.css" rel="stylesheet">
</head>
<body>
  <?php include 'navbar.html'?><br><br>
  <h1 id="ks1">KEEP SAFE</h1>

  <div id="mySidenav" class="sidenav" style="align:left">
        <a href="#" onclick="myFunction()" id="about"><i class="fa fa-mouse-pointer" style="font-size:28px"></i></a>
  </div>



  <div class="tab" id="tabID">
    <button type="button" name="close" id="close" onclick="myFunction1()" style="background:white;font-weight:bold;"><i class="fa fa-close" style="font-size:20px">   SKIP</i></button>
    <?php
    $sql = "SELECT * from keepSafe";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
        <button class="tablinks" onclick="openCity(event, '<?php echo $row["sidebarName"]; ?>')" id="<?php echo $row["defaultOpened"]; ?>"><?php echo strtoupper($row["sidebarName"]); ?></button>
        <?php
      }}?>

    </div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
    <?php
    $sql = "SELECT * from keepSafe";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        ?>
        <div id="<?php echo $row["sidebarName"]; ?>" class="tabcontent">
          <h3><?php echo ucfirst($row["sidebarName"]); ?></h3>
          <h4>Posted Date: <?php echo $row["created_at"]; ?></h4>
          <img height="400px" width="100%" src="keepsafeImages/<?php echo $row["imageName"]; ?>" alt="" style="border-radius:10px;">
          <p><?php echo $row["content"]; ?></p>
        </div>
        <?php
      }}?>
    </div>
  </div>
</div>
      <script>
      function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
      }

      // Get the element with id="defaultOpen" and click on it
      document.getElementById("defaultOpen").click();

      function myFunction(){
        document.getElementById("tabID").style.display="block";
      }
      function myFunction1(){
        document.getElementById("tabID").style.display="none";
      }
    </script>
    <script src="https://unpkg.com/lazysizes@4.0.1/lazysizes.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </body>
  </html>
