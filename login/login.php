<html>
<head>

</head>
<body>
	<div class="col-md-4 col-sm-4 animated fadeInRight">
		<div class="panel panel-default well" id="reportpanel" >
			<div class="report-form">
				<div class="container">
					<form method="GET">
						<h4 class="form-signin-heading">Get started!</h4>Make a new report, tell us your story or hear from us. <p></p>

						<div class="row col-sm-12" id="hbtnrow">
						</div>


					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4 col-sm-4 animated fadeInRight">

		<div class="panel panel-default well" id="loginpanel" >




			<div class="signin-form">
				<div class="container ">
					<div id="login-area">
						<?php if ($_SESSION['loggedIn']) {
							require_once ("login/logout.php");
						} else{ ?>
							<form class="form-signin" id='login-form' method="POST">
								<p><h4 class="form-signin-heading">Update your report,</h4>check its status and talk with us.</p>
								<div id="error">
									<!-- error will be shown here ! -->
								</div>

								<div class="form-group">
									<input type="text" class="form-control" id="user_email"  id="username_input" name="user_email" placeholder="Reference ID" autofocus="" />
								</div>

								<div class="form-group">
									<input type="password" class="form-control" id="password"  name="password" placeholder="Password" />
									<i id="closeeye" style="float: right;margin-left: -23px;padding-right: 8px;margin-top: -25px; position: relative;z-index: 2;" class="glyphicon glyphicon-eye-close"></i>
									<i id="openeye" style="display:none;float: right;margin-left: -23px;padding-right: 8px; margin-top: -25px; position: relative;z-index: 2;" class="glyphicon glyphicon-eye-open"></i>
								</div>

								<div class="form-group">
									<button  name="btn-login" class="btn btn-log btn-lg btn-success btn-block" id="btn-login" type="submit"><span class="fa fa-sign-in"></span> &nbsp;Check Report</button>
								</div>
							</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script type="text/javascript" src="login/script.js"> </script>
