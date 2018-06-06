
/* validation */
$("#login-form").validate({
	rules:
	{
		password: {
			required: true,
		},
		user_email: {
			minlength:5,
			required: true,
		},
	},
	messages:
	{
		password:{
			required: "Please enter your Password"
		},
		user_email: {
			required:"Please enter your Reference ID",
			minlength: "Reference ID must be 5 or more characters"
		}
	},
	submitHandler: submitForm
});
/* validation */

/* login submit */
function submitForm()
{
	var data = $("#login-form").serialize();

	$.ajax({

		type : 'POST',
		url  : 'login/loginprocess.php',
		data : data,
		beforeSend: function()
		{
			$("#error").fadeOut();
			$("#btn-login").html('<span class="fa fa-cog fa-spin"></span> &nbsp; Processing. Please wait ...');
		},
		success :  function(response)
		{
			if(response=='ok'){
				$("#btn-login").html('<span class="fa fa-thumbs-o-up"></span> &nbsp; Signing In ...');
				//setTimeout(' window.location.href = "home.php"; ',4000);

				$("#login-area").load('login/logout.php');
				$("#chatbox").load("chat/chat.php");

			}
			else{
				$("#btn-login").fadeIn(1000, function(){
					$("#btn-login").html('<span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+'!');
				}).delay(3000).fadeIn(1000, function(){
					$("#btn-login").html('<span class="fa fa-sign-in"></span> &nbsp;Check Report');
				});




			}
		}
	});
	return false;
}
/* login submit */



/* login submit */
