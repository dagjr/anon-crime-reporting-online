<?php
include_once 'functions/browserchecker.php';
?>
<?php
include_once 'functions/browserchecker.php';
?>
<?php
if (isset($_POST['wantedID']) && isset($_POST['wantedName'])){
	$wantedID = $_POST['wantedID'];
	$wantedName = $_POST['wantedName'];
	$title = "Report crime for our wanted: ";
	$caseID = "";
} else if (isset($_POST['caseID'])){
	$caseID = $_POST['caseID'];
	$title = "Report crime for our case: ";
	$wantedID = "";
	$wantedName= "";
} else {
	$wantedID = "";
	$wantedName= "";
	$title = "";
	$caseID = "";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>MACRO PH | REPORT FORMS</title>
<link href="css/multistep.css" rel="stylesheet">
<link rel="icon" href="images/macrofavico.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body style="background-color: pink;">
<!-- multistep form -->
<?php
include_once 'navbar.html';
?><br><br><br><br>
<div class="container" id="center1">
		<div class="row">
			<div class="col-md-12">
<form id="msform" name="msform" method="post" action="functions/processreport.php" enctype="multipart/form-data">
	<!-- progressbar -->
	<div class="progressbar noHighlight" id="progs" >
		<ul id="progressbar" class="hidden-xs">
			<li class="active">General</li>
			<li>Involved Party</li>
			<li>Involved Vehicle</li>
			<li>Evidence</li>
			<li>Your Information</li>
			<li>Agreement</li>
		</ul>
	</div>
	<h3 class="fs-subtitle"><?php echo htmlentities($title); ?><b><?php echo htmlentities($wantedName.$caseID); ?></b></h3>
	<!-- fieldsets -->
	<fieldset class="general-info">
		<h2 class="fs-title">General Information</h2>
		<h3 class="fs-subtitle">(Required)</h3>

		<select  id="typeOfOffense" name="typeOfOffense" class="col-xs-12 col-sm-6" required>
			<option value="" selected hidden>SELECT A CRIME</option>
			<option value="Arson">Arson</option>
			<option value="Assault/Harassment">Assault/Harassment</option>
			<option value="Burglary">Burglary</option>
			<option value="Business crime">Business crime</option>
			<option value="Criminal damage">Criminal damage</option>
			<option value="Cybercrime">Cybercrime</option>
			<option value="Disqualified/Uninsured drivers">Disqualified/Uninsured drivers</option>
			<option value="Drink-driving">Drink-driving</option>
			<option value="Drug manufacture">Drug manufacture</option>
			<option value="Drug trafficking/supply">Drug trafficking/supply</option>
			<option value="Environmental crime">Environmental crime</option>
			<option value="Fraud and forgery">Fraud and forgery</option>
			<option value="Fugitive campaigns">Fugitive campaigns</option>
			<option value="Handling stolen goods">Handling stolen goods</option>
			<option value="Human trafficking">Human trafficking</option>
			<option value="Illegal Tobacco">Illegal Tobacco</option>
			<option value="Immigration">Immigration</option>
			<option value="Most Wanted suspects">Most Wanted suspects</option>
			<option value="Murder">Murder</option>
			<option value="Possession of weapons">Possession of weapons</option>
			<option value="Proceeds of crime">Proceeds of crime</option>
			<option value="Rape/sexual offences">Rape/sexual offences</option>
			<option value="Robbery">Robbery</option>
			<option value="Smuggling">Smuggling</option>
			<option value="Tax evasion">Tax evasion</option>
			<option value="Terrorism">Terrorism</option>
			<option value="Theft">Theft</option>
			<option value="Vehicle crime">Vehicle crime</option>
		</select>
		<span class="tooltipContainer"><input id="dateTimeOfOffense" class ="col-xs-12 col-sm-6" type="text"  name="dateTimeOfOffense" placeholder="Date" required/><span class="tooltiptext">Or your approximate guess of the time and date of the crime.</span></span>
		<span class="tooltipContainer"><input id="cityOfOffense" class="col-xs-12 col-md-12" type="text" name="cityOfOffense" disabled="true" required value="Manila" /> <span class="tooltiptext">The city or district the crime took place.</span></span>
		<span class="tooltipContainer"><input id="barangayOfOffense" class="col-xs-12 col-md-6" type="text"  name="barangayOfOffense" placeholder="Barangay"/><span class="tooltiptext">Optional</span></span>
		<span class="tooltipContainer"><input id="streetAddressOfOffense" class="col-xs-12 col-md-6" name="streetAddressOfOffense" type="text"   placeholder="Street"/><span class="tooltiptext">Optional</span></span>
		<span class="tooltipContainer"><textarea rows="10" id="description" class="col-xs-12" type="text" name="description" placeholder="Description" required/></textarea><span class="tooltiptext">Describe as detailed as possible the crime you want to report about including <b>who, what, when, where and how do you know</b>.</span></span>
		<input type="button" name="next" id="genNext" class="btn btn-primary btn-block" value="Next"	/>
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Involved Parties</h2>
		<h3 class="fs-subtitle">(OPTIONAL)</h3><h3 class="fs-subtitle"><label for="quantityParty">Number of Involved Person/s: </label><input type="number" min='0' id="quantityParty" name="quantityParty" class="col-xs-12" value=0></h3>
		<div class="duplicates">
			<div id="party0" class="hidden" name ="party0">
			<hr>
				<input type="text" name="susFirstname[]" class="col-xs-12 col-sm-6 col-md-4" placeholder="First Name" />
				<input type="text" name="susLastname[]" class="col-xs-12 col-sm-6 col-md-4" placeholder="Last Name" />
				<input type="text" name="susAlias[]" class="col-xs-12 col-sm-6 col-md-4" placeholder="Alias" />

				<select class="col-xs-12 col-sm-6 col-md-4" name="susRace[]"><option value='' selected hidden>Race</option><option>Black</option><option>White</option><option>Hispanic</option><option>Asian</option><option>Native American</option><option>First Nations</option><option>Puerto Rican</option><option>Japanese</option><option>Chinese</option><option>Korean</option><option>Filipino</option><option>Micronesian</option><option>Samoan</option><option>Hawaiian</option><option>Pacific Islander</option><option>Other</option>
				</select>

				<select class="col-xs-12 col-sm-6 col-md-4" name="susGender[]"><option value='' selected hidden>Gender</option><option value="Unknown">Unknown</option><option value="Male">Male</option><option value="Female">Female</option>
				</select>


				<select class="col-xs-12 col-sm-6 col-md-4" name="susWeight[]"><option value='' selected hidden>Weight/Build</option><option value="Thin">Thin</option><option value="Average">Average</option><option value="Athletic">Athletic</option><option value="Large">Large</option><option value="Obese">Obese</option>
				</select>
				<input type="text" name="susHeight[]" class="col-xs-12 col-sm-6 col-md-3" placeholder="Height (Approx.)" />
				<select class="col-xs-12 col-sm-6 col-md-3" name="susHairColor[]">
				  <option selected hidden>Hair Color</option>
					<option select disabled>SELECT HAIR COLOR</option>
				  <option value="Black">Black</option>
				  <option value="Brown">Brown</option>
				  <option value="Blond">Blond</option>
				  <option value="Red">Red</option>
				  <option value="Gray">Gray</option>
				  <option value="White">White</option>
				  <option value="Others">Others</option>
				</select>
				<input type="text" class="col-xs-12 col-sm-6 col-md-3" name="susFacialhair[]" placeholder="Facial Hair" />
				<input type="text" class="col-xs-12 col-sm-6 col-md-3" name="susEyecolor[]" placeholder="Eye Color" />
				<input type="number" class="col-xs-12 col-sm-6 col-md-12" name="susNumber[]" placeholder="Suspect's Phone #" />
				<input type="number" class="col-xs-12 col-sm-6 col-md-6" name="susAge[]" placeholder="Age (Approx.)" />
				<input type="text" class="col-xs-12  col-md-6" name="susLastSeen[]" placeholder="Last Seen Area" />
				<input type="text" class="col-xs-12 col-sm-12" name="susScars[]" placeholder="Scars, Marks, etc.." />
				<input type="text" class="col-xs-12 col-sm-12" name="susClothing[]" placeholder="Clothing" />
				<textarea rows="5" class="col-xs-12" name="susFeatures[]" placeholder="Distinguishing Features (any other information about what the offender looks like)
				"></textarea>
				<input type = "text" class="col-xs-12" name="susAssoc[]" placeholder="Gangs, assosiates, hangouts or animals"><br><br><br>
			</div>
		</div>

		<input type="button" name="next" class="next btn-block" value="Next" id="genNext" />
				<input type="button" name="previous" class="previous btn-block" value="Previous" id="previous" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Vehicle</h2>
		<h3 class="fs-subtitle">(OPTIONAL)</h3>
		<h3 class="fs-subtitle"><label for="quantityVehicle">Number of Involved Vehicle/s: </label><input type="number" min='0' id="quantityVehicle" class="col-xs-12" name="quantityVehicle" value=0></h3>
		<div class="duplicates">
			<div id="vehicle0" class = "hidden" name="vehicle0">
				<hr>
				<input type="text" name="carMake[]" class="col-xs-12 col-sm-6 col-md-4" placeholder="Make/Brand" />
				<input type="text" name="carModel[]" class="col-xs-12 col-sm-6 col-md-4" placeholder="Model" />
				<input type="text"  id="datepicker" name="carYear[]" class="col-xs-12 col-sm-12 col-md-4" placeholder="Year"/>
				<input type="text" name="carColor[]" class="col-xs-12 col-sm-6 col-md-6" placeholder="Color" />
				<input type="text" name="carPlate[]" class="col-xs-12 col-sm-6 col-md-6" placeholder="Plate Number" />
				<textarea rows="5" name="carDesc[]" class="col-xs-12" placeholder="Description (any identifying marks, bumper stickers, company logos, etc.)"></textarea>
			</div>
		</div>
				<input type="button" name="next" class="next btn-block" value="Next" id="genNext" />
		<input type="button" name="previous" class="previous btn-block" value="Previous" id="previous" />

	</fieldset>
	<fieldset>
		<h2 class="fs-title">Evidence</h2>
		<h3 class="fs-subtitle">(OPTIONAL)</h3>
		<h3 class="fs-subtitle"><label for="quantityEvidence">Number of Evidence/s: </label><input type="number" min='0' id="quantityEvidence" class="col-xs-12" name="quantityEvidence" value=0 ></h3>
		<h3 class="fs-subtitle"><p>If you have a digital photograph that's relevant to this report (for example, a photo taken with your phone) you can upload it here. Please ensure the image is in .jpg or .jpeg format and that it’s no bigger than 2 MB in size.</p><br>
<p>Files must be less than <strong>20 MB</strong><br>Allowed file types: <strong>MP3, MP4, JPG, JPEG, PNG & GIF</strong></p></h3>
		<div class="duplicates">
			<div id="evidence0" class="hidden">
				<input name="evidence[]" accept=".jpg, .jpeg, .png, .gif, .mp3, .mp4" type="file" class="col-xs-12">
			</div>
		</div>

		<input type="button" name="next" class="next btn-block" value="Next" id="genNext" />
		<input type="button" name="previous" class="previous btn-block" value="Previous" id="previous" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">How to reach you?</h2>
		<h3 class="fs-subtitle">(OPTIONAL)</h3>
		<h3 class="fs-subtitle"><p class="notice">Confidential - For Police use only - Private details are protected by the Data Protection Act</p><p> <br>
The information you provide to us are anonymous. However, you must know that the investigation and ability to prosecute the offender(s) is severely limited if the police cannot contact you.</p>



<p>You may also specify how you are contacted and if contacting you would cause you any difficulties.</p>



<p>We will not pass on your details without your consent and would ask you to consider giving your details confidentially.</p></h3>

		<input type="text" name="infLastname[]" class="col-xs-12 col-sm-6 col-md-6" placeholder="Your Last Name" />
		<input type="text" name="infFirstname[]" class="col-xs-12 col-sm-6 col-md-6" placeholder="Your First Name" />
		<input type="text" name="infStreetAddress[]" class="col-xs-12 col-sm-6 col-md-6" placeholder="Street Address" />
		<input type="text" name="infBarangay[]" class="col-xs-12 col-sm-6 col-md-6" placeholder="Barangay" />
		<input type="number" name="infNumber[]" class="col-xs-12 col-sm-6 col-md-6" id="contactphone" placeholder="Contact Phone" />
        <input type="text" id="email" name="infEmail[]" class="col-xs-12 col-sm-6 col-md-6"  placeholder="E-mail Address" >
				<input type="button" name="next" class="next btn-block" value="Next" id="genNext" />
				<input type="button" name="previous" class="previous btn-block" value="Previous" id="previous" />

	</fieldset>
	<fieldset id="finalize">
		<h2 class="fs-title">Agreement</h2>
		<h3 class="fs-subtitle"> This tip submission system is provided to the public for the purpose of anonymously reporting known or suspected suspicious or criminal activity which has occurred, or may occur. Any misuse or abuse of this system is strictly prohibited. <span class='notice'>MAKING A FALSE REPORT TO LAW ENFORCEMENT IS A SERIOUS OFFENSE AND MAY BE PUNISHABLE BY LAW.</span> You acknowledge and confirm that the information you are providing is not urgent or requiring prompt or immediate attention, and you understand that you should call 911 or contact the appropriate authorities by phone if this is time sensitive information. Children must be 13 years or older or have parents’ permission to use this service.</h3>
		<center>	<script type="text/javascript">
		var RecaptchaOptions = {
			theme : 'clean',
			tabindex : 0
		};


</script>
<div class="g-recaptcha" data-theme="light" data-sitekey="6LenUk8UAAAAAPUaz52v3sn-mh0ALAz_H91Tjbvk" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
<!-- uncomment below is your in macroph.ml -->
<!-- <div class="g-recaptcha" data-callback="imNotARobot" data-sitekey="6LenUk8UAAAAAPUaz52v3sn-mh0ALAz_H91Tjbvk"></div></center><br> -->
<!-- uncomment below is your in localhost -->
<!-- </script><div class="g-recaptcha" data-callback="imNotARobot" data-sitekey="6LfphU8UAAAAAH8fDoAYvd8p3A0-CbHO3sTQ5aeY"></div></center><br> -->

		<p class="noHighlight">
		<input type="text" id="password" name="password" class="byTwo" placeholder="Password for your Report" required/></p>
		<p class="noHighlight">
		<input type="checkbox" name="agreement" id="agreement" required/>&nbsp;<label for="agreement" class="byThree">I agree to the terms and conditions.</label></p>
		<hr>
		<input type="hidden" id="involvedParty" name="involvedParty" value=0>
		<input type="hidden" id="involvedVehicle" name="involvedVehicle" value=0>
		<input type="hidden" id="evidenceUploaded" name="evidenceUploaded" value=0>
		<input type="hidden" id="wantedID" name="wantedID" value=<?php echo htmlentities($wantedID);?>>
<input type="submit" id="submitForm" name="submit" 	class="btn btn-block" value="Submit" />
		<input type="button" name="previous" class="previous btn-block" value="Previous" id="previous" />

	</fieldset>
</form>
</div>

		</div>
	</div>
</div>


<!-- jQuery -->
<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="js/jquery.easing.min.js" type="text/javascript"></script>
<script src="js/multistep.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
