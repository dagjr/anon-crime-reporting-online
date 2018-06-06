<?php
$servername = "35.196.47.99";
$serverusername = "macroadmin";
$serverpassword = "macrolife";
//$servername = "localhost";
//$serverusername = "root";
//$serverpassword = "";



$serverdb = "pnp2";


// Create connection
$conn = mysqli_connect($servername, $serverusername, $serverpassword,$serverdb);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
