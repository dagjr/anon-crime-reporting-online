<?php
  include_once '../../includes/dbconnect.php';
  if (isset($_POST['submit'])) {
  //all the variables
  $wantedIdentity = $_POST['wantedIdentity'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $criminalcase = $_POST['criminalcase'];
  $crimelocation = $_POST['crimelocation'];
  $crimeDesc1 = $_POST['crimeDesc'];
  $crimeDesc = $_POST['crimeDesc1'];
  $time = $_POST['time'];
  $warrantDate = $_POST['warrantDate'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $height1 = $_POST['height'];
  $height = addslashes($height1);
  $build = $_POST['build'];
  $hairColor = $_POST['hairColor'];
  $hairLength = $_POST['hairLength'];
  $hairStyle = $_POST['hairStyle'];
  $facialHair = $_POST['facialHair'];
  $ethnicApp = $_POST['ethnicApp'];
  $addInfo1 = $_POST['addInfo'];
  $addInfo= addslashes($addInfo1);
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
        $sql = "UPDATE wanted SET firstName = '$fname', lastName = '$lname', CriminalCase = '$criminalcase', crimeLocation = '$crimelocation', crimeDesc = '$crimeDesc', time = '$time', warrantDate = '$warrantDate', age = '$age', gender = '$gender', height = '$height', build = '$build', hairColor = '$hairColor', hairLength = '$hairLength', hairStyle = '$hairStyle', facialHair = '$facialHair', ethnicApp = '$ethnicApp', addInfo = '$addInfo', imgName = '$fileNameNew' WHERE wanted.wantedID = '$wantedIdentity'";
        mysqli_query($conn,$sql);
        $fileDestination = '../../wantedImages/'.$fileNameNew;
        move_uploaded_file($fileTmpName,$fileDestination);
        header("Location: ../functions/updateWantedFuncSuccess.php");
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
