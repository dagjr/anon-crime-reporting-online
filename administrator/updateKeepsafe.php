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
    <form action="functions/updateKeepsafeFunc.php" method="POST" enctype="multipart/form-data">
    <div class="container">
      <div class="row"><br>
      <div class="col-xs-12">
            <select class="form-control" name="id">
      <?php
              $sql = "SELECT * FROM keepsafe ORDER BY id DESC";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  ?>
            <option  value="<?php echo $row["id"]; ?>">ID: <?php echo $row["id"]; ?> →  Title: <b><?php echo strtoupper($row["sidebarName"]); ?></b></option>
            <?php
          }}?>
          </select><br></div>
        <div class="col-xs-12"><input type="text" class="form-control"  name="sidebarName" placeholder="SIDEBAR NAME......" required><br></div>
        <div class="col-xs-12"><textarea name="content" class="form-control"  rows="5" placeholder="ENTER YOUR CONTENT........"></textarea><br></div>
        <div class="col-xs-12">  <input type="file" class="form-control" name="file" ><br></div>
        <div class="col-xs-12"><button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">SAVE</button></div>
      </div>
    </div>
    </form>








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
