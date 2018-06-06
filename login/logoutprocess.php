<?php

 /*if(session_destroy())
 {
  header("Location: ../index.php");
 }*/

?>

<?php
	session_start();
	echo "<script>Logout success!</script>";
	unset($_SESSION['reportID']);
	session_destroy();
	header("Location: ../index.php");
	//exit;	
?>