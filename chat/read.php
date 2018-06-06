<?php
require_once '../includes/dbconnect.php';
$val = $_POST['reportID'];
$result2 = mysqli_query($conn, "UPDATE chatlogs SET isRead=1 WHERE reportID=$val");
?>