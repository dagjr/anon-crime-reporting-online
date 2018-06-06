<?php
require 'includes/dbconnect.php'; ?>

<?php
if(isset($_POST['submit-search'])){
	$search = mysqli_real_escape_string($conn, $_POST['search-big']);
	$sql = "SELECT * FROM unsolved where description LIKE '%$search%' or created_at LIKE '%$search%' or title LIKE '%$search%' or casenumber LIKE '%$search%'";
	$result = mysqli_query($conn, $sql);
	$queryResult = mysqli_num_rows($result);
	$search1 = mysqli_real_escape_string($conn, $_POST['search-big']);
	$sql1 = "SELECT * FROM wanted where firstname LIKE '%$search%' or lastname LIKE '%$search%' or height LIKE '%$search%' or criminalcase LIKE '%$search%' or hairlength LIKE '%$search%' or age LIKE '%$search%' or hairstyle LIKE '%$search%'";
	$result1 = mysqli_query($conn, $sql1);
	$queryResult1 = mysqli_num_rows($result1);
	$fullResult = $queryResult + $queryResult1;
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<link rel="icon" href="images/macrofavico.ico">
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- FONTS -->
		<link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>
		<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway">
		<link href='https://fonts.googleapis.com/css?family=Antic Slab'>
		  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!-- END FONTS -->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext">
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/unsolved.css">
		<link rel="stylesheet" type="text/css" href="css/newwanted.css">
		<link rel="stylesheet" type="text/css" href="css/search.css">
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
	</head>
	<body>
		<?php require 'navbar.html' ?>
			<br><br><br>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h2 id="found"><?php echo $fullResult ?>  MACRO found for   <span class="glyphicon glyphicon-arrow-down"></span></h2>
						<form action="search.php" method="POST">
							<input id="inputSearch"placeholder="Search......" value="<?php echo $search ?>" name="search-big"  required>
							<input type="hidden" name="submit-search">
						</form>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div id="memahati"></div>
				</div>
			</div>
			<div class="container" id="fea1">
				<h2 id="found1"><?php if ($queryResult > 0) {
					?>
					<?php echo $queryResult; ?> FEATURED CRIMES FOUND
					<?php
				}
				?> </h2>
			</div>
			<div class="container" style="margin-bottom: 20px;">
				<div class="row">
					<?php

					if ($queryResult > 0) {
						while ($row = mysqli_fetch_assoc($result)) {
							?>
							<!-- FEATURED CRIMES OUTPUT HERE -->



							<div class="col-sm-6" id="ucContainer">
								<form method="POST" action="multistep.php">
									<h4 class="animated fadeIn">PUBLISHED DATE: <?php echo $row["created_at"]; ?></h4><br>
									<img id="unsolved-img" class="animated bounceIn" src="unsolvedImages/<?php echo $row["imagename"]; ?>">
									<h1 id="ctitle" style="text-transform: uppercase;" class="animated fadeIn"><?php echo $row["title"]; ?></h1>
									<h4 class="animated fadeIn">CASE# <?php echo $row["casenumber"]; ?></h4>
									<p class="animated fadeIn"><?php echo $row["description"] ?></p>
									<br>
									<input type="hidden" name="caseID" value="<?php echo $row["caseID"] ?>">
									<center><input type="submit" value="GIVE US TIPS" class="btn btn-info" href="#"></center>
									<br><br>
								</form>
							</div>

							<!-- ========END======== -->
							<?php
						} } }
						?>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<center><div class="col-xs-12">

						</div>
					</center>
				</div>
			</div>
			<?php
			if(isset($_POST['submit-search'])){

				?>
				<div class="container" id="fea1">
					<h2 id="found2">
						<?php if ($queryResult1 > 0) {
							echo $queryResult1." MACRO WANTED IN CITY FOUND<br><br>";

						} ?>
					</h2>
				</div>
				<div class="container">
					<div class="row">
				<?php
				if ($queryResult1 > 0) {
					while ($row = mysqli_fetch_assoc($result1)) {
						?>
						<!-- CRIME OUTPUT HERE -->
						<div class="col-xs-12 col-sm-6 col-md-3" id="lobo1">
							<form class="form" method="POST" action="multistep.php">
							<li>
							<a href="most-wanted-details.php?wantedID=<?php echo $row["wantedID"];?>"><img style="width: 200px; height: 100px;border-radius: 5px;" src="wantedImages/<?php echo $row["imgName"];?>" />
							<h4><?php echo ucfirst($row["firstName"]);?> <?php echo ucfirst($row["lastName"]);?></h4></a>
								<dl class="tags">
									<dt>Crime Location:</dt>
									<dd><?php echo $row["crimeLocation"];?>, Manila</dd>
									<dt>Crime:</dt>
									<dd><?php echo ucfirst($row["CriminalCase"]);?></dd>
									<a href="most-wanted-details.php?wantedID=<?php echo $row["wantedID"];?>"><dd>More info about <?php echo ucfirst($row["lastName"]);?></dd></a>
									<button type="submit" class="btn btn-info" style="margin-top: 5px;">Give tip about this criminal</button>
								</dl>
							</li>

							<input type="hidden" name="wantedID" value="<?php echo htmlentities($row["wantedID"]); ?>">
							<input type="hidden" name="wantedName" value="<?php echo htmlentities($row["firstName"]. " ". $row["lastName"]); ?>">
							</form>
						</div>

						<!-- ========END======== -->
						<?php
					} } else{
						?>
						<!-- NO RESULT OUTPUT -->
						<div class="container" id="noresult">
							<div class="row">
								<div class="col-sm-12">
									<h1 id="noresult"><span class="glyphicon glyphicon-eye-close"></span> MACRO NO RESULT CRIMINALS, TRY A NEW KEYWORD</h1>
									<script type="text/javascript">
									document.getElementById("found2").style.display = "none";
									document.getElementById("found1").style.display = "none";
									</script>
								</div>
							</div>
						</div>
						<!-- END -->
						<?php

					} }
					?>
				</div>
				</div>

					<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
					<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
					<script type="text/javascript" src="js/script.js"></script>
					<div id="searchbar" class="searchcontainer" style="display: none;">
						<div class="row">
							<div class="col-sm-6 col-sm-offset-3" style="display: none;">
								<div id="imaginary_container" style="display: none;"> <a href="#search">
									<div class="input-group stylish-input-group" style="display: none;">
										<input type="text" style="display: none;" name="search-small" class="form-control"  placeholder="Search" >
										<span class="input-group-addon" style="display: none;">
											<button type="submit" style="display: none;">
												<span class="glyphicon glyphicon-search" style="display: none;"></span>
											</button>
										</span>
									</div></a>
								</div>
							</div>
						</div>
					</div>

					<div id="search">
						<button type="button" class="close">×</button>
						<form action="search.php" method="POST">
							<input type="search" value="" name="search-big" placeholder="type keyword(s) here" id="searchplacehodertext" />
							<button type="submit" name="submit-search" class="btn btn-primary">Search</button>
						</form>
					</div>
				</body>
				</html>
