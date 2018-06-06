<?php

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
require ('../includes/dbconnect.php');


/************ set values ***********/
$involvedPartyQuantity = mysqli_escape_string($conn,$_POST['involvedParty']);
$involvedVehicleQuantity = mysqli_escape_string($conn,$_POST['involvedVehicle']);
$evidenceUploadedQuantity = mysqli_escape_string($conn,$_POST['evidenceUploaded']);

$sql_str = "";

$generalInfo_fields = array("description", "typeOfOffense", "dateTimeOfOffense", "streetAddressOfOffense", "barangayOfOffense", "cityOfOffense","warrantID","caseID");
$involvedParties_fields = array("susFirstname", "susLastname", "susAlias", "susLastSeen", "susRace", "susGender", "susWeight", "susHeight", "susHairColor", "susFacialhair", "susEyecolor", "susNumber", "susAge", "susScars", "susClothing", "susFeatures");
$involvedVehicles_fields = array("carMake", "carModel", "carYear", "carColor", "carPlate", "carDesc");
$sender_fields = array("infLastname", "infFirstname", "infStreetAddress", "infBarangay", "infNumber", "infEmail");

$referenceID = "";


/************* general info ******************/
/*
foreach ($generalInfo_fields as $field) {
    if (isset($_POST[$field])) {
        $$field = $_POST[$field];
    }
}
*/

$sql_str .= processSqlString($generalInfo_fields, 0,"", 'reports');
if (!mysqli_query($conn, $sql_str)) {
    printf("Errormessage: %s\n", mysqli_error($conn));
} else {
	$sql_str = "";
}

$last_id = mysqli_insert_id($conn);

/************ involved parties ****************/

$sql_str .= processSqlString($involvedParties_fields, $involvedPartyQuantity,$last_id, 'involvedparty');

/*************** involved vehicle ***********/

$sql_str .= processSqlString($involvedVehicles_fields, $involvedVehicleQuantity,$last_id, 'involvedvehicle');

/*************** informant/sender info ***********/

$sql_str .= processSqlString($sender_fields, 0,$last_id, 'sender');

/**************reference id ************/
do{
$referenceID= generateRandomString(5);
$check_ref = "SELECT `referenceID` FROM `referencecodes` WHERE referenceID='$referenceID';";
$result = mysqli_query($conn,$check_ref);
	if (!$result) {
		die(mysqli_error($conn));
	}
}while ( mysqli_num_rows($result)>0);
$refpassword =  $_POST['password'];
$sql_str .= "INSERT INTO `referencecodes` (`referenceID`, `password`, `reportID`) VALUES ('$referenceID','$refpassword', $last_id);";



/**************** evidence start **************************************/
$target_dir = "../uploads/";
$fileStr = "evidence";
for ($i=0 ; $i<=$evidenceUploadedQuantity ; $i++){
	$target_file = $target_dir . basename($_FILES[$fileStr]["name"][$i]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"]) && $_FILES[$fileStr]["error"][$i] == 0) {
		$check = getimagesize($_FILES[$fileStr]["tmp_name"][$i]);
		if($check != false) {?>
			<!-- start of design -->

			<?php
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
			continue;
		}
	}
	// Check if file already exists
	/*if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}*/
	// Check file names
	do {
	$new_file_name = generateRandomString(20) . "." .$imageFileType;
	$new_target_file = $target_dir . $new_file_name;
	}while (file_exists($new_target_file));
	// Check file size
	if ($_FILES[$fileStr]["size"][$i] > 20000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
		continue;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" && $imageFileType != "mp3" && $imageFileType != "mp4") {
		echo "Sorry, only MP3, MP4, JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
		continue;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES[$fileStr]["tmp_name"][$i], $new_target_file)) {
			$sql_str .= "INSERT INTO `attachments` (`fileName`, `reportID`) VALUES ('$new_file_name', '$last_id');";
			echo "The file ". basename( $_FILES[$fileStr]["name"][$i]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}


/************************ update log ***********************************/
/*$ip= get_client_ip(); */
?>
<!--<script>
alert ('<?php echo "success! your ip is " .  $ip;?>');
</script>-->

<?php
/*$sql_str.= "INSERT INTO `updatelog`
	(`reportID`,`reason`,`loggedIP`)
	VALUES ($last_id,'New Report','$ip');";
*/
/************************ process query ***********************************/
if (mysqli_multi_query($conn, $sql_str)) {
    echo "New report created successfully<br>";
?>
<div>
<?php
echo "Your reference ID : $referenceID<br>";
echo "And password: $refpassword<br>";
?>
<p>DO NOT LOSE THE ABOVE CODE NUMBER AND PASSWORD.
IT IS THE ONLY WAY TO CHECK THE STATUS OF YOUR TIP.
Be sure to login at www.xxx.com to provide any additional information to this tip. Also, login often to see if there are any follow up questions pending which you could possibly answer. </p>
<p>Thank you for submitting your tip with us online. Please log back in and use the online Follow-Up feature OR call us between 9a and 8p Mon-Thu to check the status of your tip or any time to provide additional information. Be sure and keep up with your assigned ID#. IF THIS IS AN URGENT MATTER DO NOT SUBMIT IT HERE ALONE. EITHER US DIRECTLY OR DIAL 911 IF IT IS AN EMERGENCY!</p>
</div>
<?php
} else {
    echo "Error: <br>" . mysqli_error($conn);
}



?>


<?php
/*
$ip=0;
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
?>
<script>
alert ('<?php echo "success! your ip is " .  $ip;?>');
</script>
<?php
/*


function generateRandomString($length = 5) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$referenceID= generateRandomString();
$refpassword =  generateRandomString();




$date = new DateTime();

/*
$fileupload1 = $_FILES['FileUpload1'];
$fileupload2 = $_FILES['FileUpload2'];
$fileupload3 = $_FILES['FileUpload3'];
$fileupload4 = $_FILES['FileUpload4'];
$fileupload5 = $_FILES['FileUpload5'];
$fileupload6 = $_FILES['FileUpload6'];
$fileupload7 = $_FILES['FileUpload7'];
$fileupload8 = $_FILES['FileUpload8'];
$fileupload9 = $_FILES['FileUpload9'];
$fileupload10 = $_FILES['FileUpload10'];
require '../includes/dbconnect.php';

$sql = "INSERT INTO reports (crime,whathappen,whenhappen,wherehappen,howhappen,whyhappen,otherInfo) VALUES ('$crime','$whathappen','$whenhappen','$wherehappen','$howhappen', '$whyhappen','$anyotherinfo')";
if (mysqli_query($conn, $sql)) {

    $last_id = mysqli_insert_id($conn);

	$sql1 = "
	INSERT INTO involvedparty (reportID, lastName, firstName,otherName,nickName,streetAddress,city,postCode,invDesc,work,tel1,tel2,mobile,email,gender,build,height,age,hairColor,hairLength,hairStyle,eyeColor,complexion,appearance,facialHair,features,otherPeople) VALUES ($last_id,'$lastname','$firstname','$oname','$nickname','$streetadd','$citytown','$postcode','$describeperson','$placework','$whophone1','$whophone2','$whomobile','$whoemail','$whogender3', '$whobuild2','$whoheight', '$whoage','$whohaircolour2','$whohairlength','$whohairstyle','$whoeyecolor', '$whocomplexion','$whoappearance','$whofacialhair','$whootherinfo','$whootherpeople');";

	$sql2 = "INSERT INTO involvedvehicle (reportID,registrationNo,make,model,color,year,features,otherVehicle)
	VALUES ($last_id,'$regnumber','$carmake','$carmodel','$carcolour','$caryear','$cardistinguish','$carother');";

	$sql3 = "INSERT INTO updatelog
	(reportID,reason,loggedIP)
	VALUES ($last_id,'New Report','$ip');";

	$sql4 = "INSERT INTO sender
	(reportID,firstName,surName,streetAdd,city,region,postCode,phone,email)
	VALUES ($last_id,'$confirstname','$conlastname','$constreetadd','$concity','$conregion','$conpostcode','$conphone','$conemail');";

	$sql5 = "INSERT INTO referencecodes (referenceID,password,reportID)
	VALUES ('$referenceID','$refpassword',$last_id);";
if (!mysqli_query($conn, $sql1)) {
    printf("Errormessage: %s\n", mysqli_error($conn));
}


if (!mysqli_query($conn, $sql2)) {
    printf("Errormessage: %s\n", mysqli_error($conn));
}


if (!mysqli_query($conn, $sql3)) {
    printf("Errormessage: %s\n", mysqli_error($conn));
}


if (!mysqli_query($conn, $sql4)) {
    printf("Errormessage: %s\n", mysqli_error($conn));
}


if (!mysqli_query($conn, $sql5)) {
    printf("Errormessage: %s\n", mysqli_error($conn));

}
}
*/

?>
 <link href="css/process.css" rel="stylesheet">
<div style="width=500px; height=500px;border=2px solid black;">

<?php
/*
echo "Reference ID: " .$referenceID . "<br>Password: " . $refpassword ;

*/
$_POST = array();
header("Location: reportsent.php?referenceID=$referenceID&referencePassword=$refpassword");
}
else {
	header('Location: /index.php');
}

/************* functions ********************************/

function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyz', ceil($length/strlen($x)) )),1,$length);
}


function processSqlString($fields,$quantity,$last_id_temp,$tableName){
  require ('../includes/dbconnect.php');
	$sql_str_temp = "";
	$columns_str = "";
	$values_str =  "";

	if ($tableName=='reports'){
		foreach ($fields as $field) {
			if (isset($_POST[$field]) && $_POST[$field]!="") {
				$$field = mysqli_escape_string($conn,$_POST[$field]);
				$values_str .= "'" . $$field. "',";
				$columns_str .= "$field,";
			}
		}
		$columns_str = substr($columns_str, 0, -1);
		$values_str = substr($values_str, 0, -1);
		$sql_str_temp .= " INSERT INTO " .  $tableName . " (" . $columns_str . ") VALUES (" . $values_str . "); ";
	} else {
		for ($i=0 ; $i<=$quantity ; $i++){
			foreach ($fields as $field) {
				if ((is_array($_POST[$field])) && isset($_POST[$field][$i])) {
					$$field = mysqli_escape_string($conn,$_POST[$field][$i]);
					$values_str .= " '". $$field. "' ,";
					$columns_str .= " `".$field."`,";
				} elseif (isset($_POST[$field])){
					$$field = mysqli_escape_string($conn,$_POST[$field]);
					$values_str .= " '". $$field. "' ,";
					$columns_str .= " `".$field."`,";
				}
			}
			$columns_str = substr($columns_str, 0, -1);
			$values_str = substr($values_str, 0, -1);
			$sql_str_temp .= " INSERT INTO `" .  $tableName . "` (`reportID`," . $columns_str . ") VALUES ( " . $last_id_temp . " ," . $values_str . ");";
			$columns_str = "";
			$values_str =  "";
		}
	}
	return $sql_str_temp;
}

function get_client_ip() {
    $ip = getenv('HTTP_CLIENT_IP')?:
getenv('HTTP_X_FORWARDED_FOR')?:
getenv('HTTP_X_FORWARDED')?:
getenv('HTTP_FORWARDED_FOR')?:
getenv('HTTP_FORWARDED')?:
getenv('REMOTE_ADDR');
    return $ip;
}


/**********************functions end *********************/

?>
</div>
