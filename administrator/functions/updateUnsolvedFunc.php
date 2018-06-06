<?php
  include_once '../../includes/dbconnect.php';
  if (isset($_POST['submit'])) {
  //all the variables
  $caseID = $_POST['caseID'];
  $title = $_POST['title'];
  $casenumber = $_POST['casenumber'];
  $description1 = $_POST['description'];
  $description = addslashes($description1);
  $file = $_FILES['file'];


  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];


  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg','jpeg','png','pdf');

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if ($fileSize < 2000000) {
        $fileNameNew = uniqid('', true).".".$fileActualExt;
        $sql = "
        UPDATE `unsolved` SET `title` = '$title', `imagename` = '$fileNameNew', `casenumber` = '$casenumber', `description` = '$description' WHERE `unsolved`.`caseID` = '$caseID';
        ";
        mysqli_query($conn,$sql);
        $fileDestination = '../../unsolvedImages/'.$fileNameNew;
        move_uploaded_file($fileTmpName,$fileDestination);
        header("Location: ../functions/updateUnsolvedFuncSuccess.php");
      }else {
        echo "Your file is too big! ";
        ?>
        <br>
        <button onclick="goBack()">Go Back</button>
        <script>
        function goBack() {
        window.history.back();
        }
        </script>
        <?php
      }
    } else {
      echo "There was an error uploading your file!";
      ?>
      <br>
      <button onclick="goBack()">Go Back</button>
      <script>
      function goBack() {
      window.history.back();
      }
      </script>
      <?php
    }
  }else {
    echo "PLEASE UPLOAD ONLY IMAGES! THANKS YOU!";
    ?>
    <br>
    <button onclick="goBack()">Go Back</button>
    <script>
    function goBack() {
    window.history.back();
    }
    </script>
    <?php
  }
}
