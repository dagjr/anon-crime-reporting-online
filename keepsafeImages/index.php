<?php
$user_ip = $_SERVER['REMOTE_ADDR']; // get user ip

// checking user ip address redirect
if ($user_ip == "8.5.25.3" || $user_ip == "35.198.236.232") {
    echo 'MEMBER';
}
else {
    echo 'THE YOUR '.$user_ip.'IP ADDRESS IS BEING TRACED BY NBI :D. ';
}
?>