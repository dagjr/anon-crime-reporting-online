<?php

 session_start();
 require_once '../includes/dbconnect.php';

 if(isset($_POST['btn-login']))
 {
  $user_email = trim($_POST['user_email']);
  $user_password = trim($_POST['password']);

  //$password = md5($user_password);
  $password = $user_password;

  try
  {
	$sql = "SELECT * FROM `referencecodes` WHERE `referenceID`='$user_email'";
	if ($result = mysqli_query($conn, $sql)) {
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['password']==$password){
					$_SESSION['reportID'] = $row['reportID'];
          $_SESSION['isAdmin'] = false;
					//echo $row['referenceID'];
          echo 'ok';
				}
				else{
					echo "ID or password does not exist"; // wrong details
				}
			}
		}
		else{
			echo "ID or password does not exist"; // wrong details
		}
	}

  /*  $stmt = $db_con->prepare("SELECT * FROM ref WHERE user_email=:email");
   $stmt->execute(array(":email"=>$user_email));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();

   if($row['user_password']==$password){

    echo "ok"; // log in
    $_SESSION['user_session'] = $row['user_id'];
   }
   else{

    echo "email or password does not exist."; // wrong details
   } */

  }
  catch(PDOException $e){
   echo $e->getMessage();
  }
 }

?>
