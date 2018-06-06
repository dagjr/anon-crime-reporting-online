<?php
include_once 'functions/browserchecker.php';
?>
<?php require 'includes/dbconnect.php';

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
if ($page == '' || $page == 1) {
  $page1 = 0;
} else {
  $page1 = ($page*10)-10;
}

  $sql = 'SELECT * FROM wanted ORDER BY wantedID DESC LIMIT '.$page1.',12';
  $data = $conn->query($sql);

  //print_r($data->fetch_all());
?>

<!DOCTYPE html>
<html>
<head>
   <link rel="icon" href="images/macrofavico.ico">
  <title>MARCO | MOST WANTED</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/most-wanted-list.css">
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

<span class="loader"><span class="loader-inner"></span></span>
  <?php require 'navbar.html' ?>
  <br><br><br><br>
  <div class="container" >
    <div class="row">
        <div class="col-xs-12 "><h1 id="uc1top" class="animated bounceInDown">Most Wanted Criminals<br><br></h1></div>
          <?php
            while($row = $data->fetch_assoc()) {
              ?>
              <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 animated flipInX" id="lobo1">
                <form class="form" method="POST" action="multistep.php">

                <a href="most-wanted-details.php?wantedID=<?php echo $row["wantedID"];?>"><img class="lazyload" style="width: 200px; height: 100px;border-radius: 5px;" data-src="wantedImages/<?php echo $row["imgName"];?>" />
                <h4><?php echo ucfirst($row["firstName"]);?> <?php echo ucfirst($row["lastName"]);?></h4></a>
                  <dl class="tags">
                    <dt>Crime location:</dt>
                    <dd><?php echo strtoupper($row["crimeLocation"]);?>, Manila</dd>
                    <dt>Crime:</dt>
                    <dd><?php echo ucfirst($row["CriminalCase"]);?></dd>
                    <a href="most-wanted-details.php?wantedID=<?php echo $row["wantedID"];?>"><dd>More info about <?php echo ucfirst($row["lastName"]);?></dd></a>
                    <button type="submit" class="btn btn-info" style="margin-top: 5px;">Give tip about this criminal</button>
                  </dl>

                <input type="hidden" name="wantedID" value="<?php echo htmlentities($row["wantedID"]); ?>">
                <input type="hidden" name="wantedName" value="<?php echo htmlentities($row["firstName"]. " ". $row["lastName"]); ?>">
                </form>
              </div>
              <?php
          }?>

    </div>

  <?php
  //pagination napo!
  $sql = 'SELECT * FROM wanted';
  $data = $conn->query($sql);
  $records =  $data->num_rows;
  $records_pages = $records/10;
  $records_pages = ceil($records_pages);
  $prev = $page-1;
  $next = $page+1;

  echo '<center><ul class="pagination">';
//prev button
  if ($prev >= 1) {
    echo '<li> <a href="?page='.$prev.'">Prev</a></li>';
  }

//number of pages
  if ($records_pages >= 2) {
    for ($r=1; $r <= $records_pages; $r++) {
      $active = $r == $page ? 'class="active"' : '';
      echo '<li '.$active.' ><a href="?page='.$r.'">'.$r.'</a><li>';
    }
  }
  //next button
  if ($next <= $records_pages && $records_pages >= 2) {
    echo '<li> <a href="?page='.$next.'">Next</a></li>';
  }
  echo '</ul></center>';
  ?>
  </div>
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
<script src="https://unpkg.com/lazysizes@4.0.1/lazysizes.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>
