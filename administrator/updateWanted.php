<?php include_once '../includes/dbconnect.php' ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
<br>
    <div class="container" style="margin-left:50px!important;">
      <div class="row" style="margin-left:-70px!important;">
        <form action="functions/updateWantedFunc.php" method="POST" enctype="multipart/form-data">
            <div class="col-xs-12">
            <select class="form-control" name="wantedIdentity">
              <?php
              $sql = "SELECT * FROM wanted ORDER BY wantedID DESC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  ?>
            <option  value="<?php echo $row["wantedID"]; ?>">ID: <?php echo $row["wantedID"]; ?> →  Name: <?php echo strtoupper($row["firstName"]); ?> <?php echo strtoupper($row["lastName"]); ?></option>
            <?php
          }}?>
            </select></div>
        <div class="col-xs-6"><input type="text" class="form-control"  name="fname" placeholder="First Name" required></div>
        <div class="col-xs-6"><input type="text" class="form-control"  name="lname" placeholder="Last Name" required></div>
        <div class="col-xs-6"><input type="text" class="form-control"  name="criminalcase" placeholder="Criminal Case" required></div>
        <div class="col-xs-6"><input type="text" class="form-control"  name="crimelocation" placeholder="Crime Location" required></div>
        <div class="col-xs-12"><textarea type="text" class="form-control" name="crimeDesc" rows="2" placeholder="CRIME DESCRIPTION....."  required></textarea></div>
        <div class="col-xs-6"><input type="time" class="form-control"  name="time" placeholder=" Estimated Time of the crime " required></div>
        <div class="col-xs-6"><input type="number" class="form-control"  name="age" placeholder="Age " required></div>
        <div class="col-xs-6">
          <select class="form-control"  name="gender">
        <option value="Male" >Male</option>
        <option value="Female" >Female</option>
        <option value="Unknown" >Unknown</option>
        </select>
      </div>
      <div class="col-xs-6">
        <input type="date" class="form-control" data-toggle="tooltip" data-placement="bottom" title="Warrant Issued"  name="warrantDate" required></div>
      <div class="col-xs-12">
      <select class="form-control" name="ethnicApp">
      <option  value="White/European Appearance">White/European Appearance</option>
      <option  value="Black/African Appearance">Black/African Appearance</option>
      <option  value="Asian Appearance">Asian Appearance</option>
      <option  value="Indian/Pakistani Appearance">Indian/Pakistani Appearance</option>
      <option  value="Aboriginal Appearance">Aboriginal Appearance</option>
      <option  value="Pacific Islander Appearance">Pacific Islander Appearance</option>
      <option  value="Mediterranean/Middle Eastern Appearance">Mediterranean/Middle Eastern Appearance</option>
      <option  value="South American Appearance">South American Appearance</option>
      <option  value="other">other</option>
      </select></div>

      <div class="col-xs-6"><input type="text" class="form-control" name="height" placeholder="Height " required></div>
      <div class="col-xs-6"><input type="text" class="form-control" name="build" placeholder="Build" required></div>
      <div class="col-xs-6"><input type="text" class="form-control" name="hairColor" placeholder="Hair Color" required></div>
      <div class="col-xs-6"><input type="text" class="form-control" name="hairLength" placeholder="Hair Length " required></div>
      <div class="col-xs-6"><input type="text" class="form-control" name="hairStyle" placeholder="Hair Style " required></div>
      <div class="col-xs-6"><input type="text" class="form-control" name="facialHair" placeholder="Facial Hair " required></div>

      <div class="col-xs-12">
        <textarea type="text" class="form-control" name="addInfo" rows="2" placeholder="ADDITIONAL INFORMATION" required></textarea>
      </div>
      <div class="col-xs-12">  <input type="file" class="form-control" name="file" ></div>
      <div class="col-xs-12"><button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">UPDATE</button></div>
    </form>
      </div>

    </div>
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
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
