
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$reportID = $_SESSION['reportID'];
echo "<p class='text-center' style='display:inline-block'>You are logged in with</p>&ensp;<h4 class='form-signin-heading' style='display:inline-block;'>REPORT #$reportID</h4>";

?>
<form class="form-signout" action="login/logoutprocess.php" id='logout-form' method="POST">
<div class="form-group">
<button  name='btn-logout' class='btn btn-log btn-lg btn-success btn-block' id='btn-logout' type='submit'><span class='fa fa-sign-out'></span> &nbsp;Logout</button>
<!--<button type="button" class='btn btn-warning disabled btn-block' ><span class='fa fa-gavel'></span> &nbsp;Edit report</button>-->
</div>
</form>