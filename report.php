
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; iso-8859-1" />
<meta http-equiv="X-FRAME-Options" content="Deny" />
<meta http-equiv="CACHE-CONTROL" content="no-cache, must-revalidate, proxy-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="EXPIRES" content="0" />
<link href="css/report.css" rel="stylesheet" type="text/css" />
    <title>PNP Sumbong a Crime</title>

</head>
<body>
    <!-- tab 1 -->
    <div class="Tab">
        <div class="TabHeading">
            <h1>MAKE A REPORT</h1>
        </div>
        
        <div class="TabExplanationText" style="font-size:18px">
        You can help make your community safer by anonymously reporting crimes or suspicious behaviour in this online report form. Remember, every piece of information helps – you could hold the missing piece that helps solve a crime!<br><br>

Join the thousands of Western Australians who’ve contacted Crime Stoppers to report valuable information that helps the WA Police to investigate crime. <br> <br> Alternatively, you can also call our toll-free hotline, 1800 333 000, to make reports.    
        </div>
        </div>
    <!-- number 2 -->
	<form action = "functions/processreport.php" method="post">
    <div class="Tab" id="tab3">
        <div class="TabHeading">
            <h2>1. Who Is Involved?</h2>
        </div>
        <div class="TabHeading2">
            Involved Parties
        </div>
        <div class="TabExplanationText">
            <p>
                Provide a description of who is involved. If you know the person(s) please provide
                their name and contact details, if not, please describe them. If you know where
                they work, then add this information.</p>
        </div>
        <div class="SectionHeading">
            Who is committing the crime?
        </div>
        <div class="SectionForm">
            <div class="Textblock">
                <div>
                    <span class="FormQuestion">Lastname:</span>
                    <input name="lastname" type="text" maxlength="40" id="lastname" />
                </div>
                <div>
                    <span class="FormQuestion">Firstname:</span>
                    <input name="firstname" type="text" maxlength="40" id="firstname" />
                </div>
                <div>
                    <span class="FormQuestion">Other names:</span>
                    <input name="oname" type="text" maxlength="40" id="oname" />
                </div>
                <div>
                    <span class="FormQuestion">Nickname(s):</span>
                    <input name="nickname" type="text" maxlength="40" id="nickname" />
                </div>
                <div>
                    <div class="FormQuestionLarge">
                        <img src="Images/bluesquare.png" alt=" />
                        Street Address:<br>
                        <span class="FormQuestionLine2">(If address is unknown, describe the building/premises)</span>
                    </div>
                    <textarea style="border-radius: 15px;" name="streetadd" rows="4" cols="90" required></textarea><br><br>
                </div>
                <div>
                    <span class="FormQuestion">City/Town:</span>
                    <input name="citytown" type="text" maxlength="40" id="citytown" />
                </div>
                            <div>
                    <span class="FormQuestion">Postcode:</span>
                    <input name="postcode" type="text" maxlength="40" id="postcode" />
                </div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png" alt='' />
                    If you don't know the person's name, please describe them here: <br>
                    <textarea style="border-radius: 15px;" name="describeperson" rows="4" cols="90" id="describeperson" required>
</textarea>
                </div>
                <div>
                    <div class="FormQuestionLarge">
                        <img src="Images/bluesquare.png"/>
                        Where do they work?
                        <br />
                        <span class="FormQuestionLine2">(If address where the person works is unknown, describe the building/premises)</span>
                    </div>
                    <textarea required style="border-radius: 15px;" name="placework" rows="4" cols="90" id="placework"></textarea>
                </div><br>
                <div>
                    <span class="FormQuestion">Telephone number 1:</span>
                    <input name="WhoPhone1" type="text" maxlength="40" id="WhoPhone1" />
                </div>
                <div>
                    <span class="FormQuestion">Telephone number 2:</span>
                    <input name="WhoPhone2" type="text" maxlength="40" id="WhoPhone2" />
                </div>
                <div>
                    <span class="FormQuestion">Mobile number:</span>
                    <input name="WhoMobile" type="text" maxlength="40" id="WhoMobile" />
                </div>
                <div>
                    <span class="FormQuestion">Email address:</span>
                    <input name="WhoEmail" type="text" maxlength="100" id="WhoEmail" />
                </div>
            </div>
        </div>
        <div class="SectionHeading">
            What do they look like?
        </div>
        <div class="SectionForm">
            <div class="Textblock">
                <div>
                    <span class="FormQuestion">Gender:</span>
                    <select name="WhoGender3" id="WhoGender3">
	<option value="Female">Female</option>
	<option value="Male">Male</option>
	<option selected="selected" value="n/a">n/a</option>

</select>
                </div>
                <div>
                    <span class="FormQuestion">Build:</span>
                    <select name="WhoBuild2" id="WhoBuild2">
	<option value="Thin">Thin</option>
	<option value="Average">Average</option>
	<option value="Athletic">Athletic</option>
	<option value="Large">Large</option>
	<option value="Obese">Obese</option>
	<option selected="selected" value="n/a">n/a</option>

</select>
                </div>
                <div>
                    <span class="FormQuestion">Height (estimate):</span>
                    <input name="WhoHeight" type="text" maxlength="40" id="WhoHeight" />
                </div>
                <div>
                    <span class="FormQuestion">Age (or estimate):</span>
                    <input name="WhoAge" type="text" maxlength="10" id="WhoAge" />
                </div>
                <div>
                    <span class="FormQuestion">Hair Colour:</span>
                    <select name="WhoHairColour2" id="WhoHairColour2">
	<option value="Blonde">Blonde</option>
	<option value="Ginger">Ginger</option>
	<option value="White">White</option>
	<option value="Grey">Grey</option>
	<option value="Brown">Brown</option>
	<option value="Black">Black</option>
	<option selected="selected" value="n/a">n/a</option>

</select>
                </div>
                <div>
                    <span class="FormQuestion">Hair Length:</span>
                    <select name="WhoHairLength" id="WhoHairLength">
	<option value="Short">Short</option>
	<option value="Medium">Medium</option>
	<option value="Long">Long</option>
	<option value="Shaved">Shaved</option>
	<option selected="selected" value="n/a">n/a</option>

</select>
                </div>
                <div>
                    <span class="FormQuestion">Hair Style:</span>
                    <select name="WhoHairStyle" id="WhoHairStyle">
	<option value="Straight">Straight</option>
	<option value="Wavy">Wavy</option>
	<option value="Curly">Curly</option>
	<option value="Spiky">Spiky</option>
	<option selected="selected" value="n/a">n/a</option>

</select>
                </div>
                <div>
                    <span class="FormQuestion">Eye Colour:</span>
                    <select name="WhoEyeColour" id="WhoEyeColour">
	<option value="Brown">Brown</option>
	<option value="Hazel">Hazel</option>
	<option value="Green">Green</option>
	<option value="Blue">Blue</option>
	<option value="Black">Black</option>
	<option selected="selected" value="n/a">n/a</option>

</select>
                </div>
                <div>
                    <span class="FormQuestion">Complexion:</span>
                    <select name="WhoComplexion" id="WhoComplexion">
	<option value="Fair">Fair</option>
	<option value="Pale">Pale</option>
	<option value="Olive">Olive</option>
	<option value="Tanned">Tanned</option>
	<option value="Dark">Dark</option>
	<option value="Freckled">Freckled</option>
	<option selected="selected" value="n/a">n/a</option>

</select>
                </div>
                <div>
                    <span class="FormQuestion">Appearance:</span>
                    <select name="WhoAppearance" id="WhoAppearance">
	<option value="White/European Appearance">White/European Appearance</option>
	<option value="Black/African Appearance">Black/African Appearance</option>
	<option value="Asian Appearance">Asian Appearance</option>
	<option value="Indian/Pakistani Appearance">Indian/Pakistani Appearance</option>
	<option value="Aboriginal Appearance">Aboriginal Appearance</option>
	<option value="Pacific Islander Appearance">Pacific Islander Appearance</option>
	<option value="Mediterranean/Middle Eastern Appearance">Mediterranean/Middle Eastern Appearance</option>
	<option value="South American Appearance">South American Appearance</option>
	<option value="other">other</option>
	<option selected="selected" value="unknown">unknown</option></select>
                </div>
                <div>
                    <span class="FormQuestion">Facial Hair:</span>
                    <select name="WhoFacialHair" id="WhoFacialHair">
    	<option value="Moustache">Moustache</option>
    	<option value="Full Beard">Full Beard</option>
    	<option value="Goatee">Goatee</option>
    	<option value="Sideburns">Sideburns</option>
     	<option value="None">None</option>
	      <option selected="selected" value="n/a">n/a</option></select>
                </div>
                <div>
                    <div class="FormQuestionLarge">
                        <img src="Images/bluesquare.png" alt='' />
                        Distinguishing Features
                        <br />
                        <span class="FormQuestionLine2">(any other information about what the offender looks
                            like)</span>
                    </div>
                    <textarea required style="border-radius: 15px;" name='whootherinfo' rows="4" cols="90"></textarea>
                </div>
                <div>
                    <div class="FormQuestionLarge">
                        <img src="Images/bluesquare.png" alt='' />
                        Are there any other people involved?
                        <br />
                        <span class="FormQuestionLine2">If so, who are they, what do they look like and where
                            do they live?</span>
                    </div>
                    <textarea required style="border-radius: 15px;" name='whootherpeople' rows="4" cols="90" ></textarea>
                </div>
            </div>
    </div></div>
        
<!-- number 2 -->
       <div class="Tab" id="tab2">
        <div class="TabHeading">
            <h2>2. Your Contact Details</h2>
        </div>
        <div class="TabHeading2">
            Pass on Information Confidentially
        </div>
        <div class="TabExplanationText">
            <p>
                The information you provide to Sumbong11 can be anonymous. However, if you
                are willing to speak to Police, please include your details here.</p>
        </div>
        <div class="SectionHeading">
            Contact Details
        </div>
        <div class="SectionForm">
            <div>
                <span class="FormQuestion">Your Lastname:</span>
                <input name="conlastname" type="text" maxlength="40" id="conlastname" />
            </div>
            <div>
                <span class="FormQuestion">Your First Names:</span>
                <input name="conFirstname" type="text" maxlength="40" id="conFirstname" />
            </div>
            <div>
                <span class="FormQuestion">Street Address:</span>
                <input name="conStreetAdd" type="text" maxlength="40" id="conStreetAdd" />
            </div>
            <div>
                <span class="FormQuestion">City:</span>
                <input name="conCity" type="text" maxlength="40" id="conCity" />
            </div>
            <div>
                <span class="FormQuestion">Region:</span>
                <input name="conRegion" type="text" maxlength="40" id="conRegion" />
            </div>
            <div>
                <span class="FormQuestion">Post Code:</span>
                <input name="conPostcode" type="text" maxlength="10" id="conPostcode" />
            </div>
            <div>
                <span class="FormQuestion">Contact Phone:</span>
                <input name="conPhone" type="text" maxlength="40" id="conPhone" required/>
 
            </div>
            <div>
                <span class="FormQuestion">Contact Email:</span>
                <input name="conEmail" type="Email" maxlength="100" id="conEmail" required/>
            <p style="margin-left: 200px;">
                Contact information will be treated with the strictest confidence.</p>
        </div></div>
        </div>
    <!-- /tab2 -->
    <!-- tab 4 -->
    <div class="Tab" id="tab4">
        <div class="TabHeading">
            <h2>4. Vehicles Involved</h2>
        </div>
        <div class="SectionHeading" style="margin-top: 20px;">
            What sort of vehicle(s) is/are involved
        </div>
        <div class="SectionForm">
            <div>
                <span class="FormQuestion">Registration Number:</span>
                <input name = 'regnumber' type="text" maxlength="40"/>
            </div>
            <div>
                <span class="FormQuestion">Make:<span class="FormQuestionLine2">(eg: Toyota)</span></span>
                <input name = "carmake" type="text" maxlength="40"/>
            </div>
            <div>
                <span class="FormQuestion">Model:</span>
                <input  name = 'carmodel' type="text" maxlength="40"/>
            </div>
            <div>
                <span class="FormQuestion">Colour:</span>
              <input  name = 'carcolour' type="text" maxlength="40"/>
            </div>
            <div>
                <span class="FormQuestion">Year:</span>
               <input name='caryear' type="text" maxlength="40"/>
            </div>
            <div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png" alt='' />
                    Distinguishing Features
                    <br />
                    <span class="FormQuestionLine2">(eg: damaged panels)</span>
                </div>
                <textarea required style="border-radius: 15px;" name='cardistinguish' rows="4" cols="90"></textarea>
            </div>
            <div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png" alt='' />
                    Are there other vehicles involved?
                    <br />
                    <span class="FormQuestionLine2">If so, what are the details?</span>
                </div>
                <textarea required style="border-radius: 15px;" name='carother' rows="4" cols="90"></textarea>
            </div>  
        </div></div>
        
    <!-- /tab4 -->
    <!-- tab 5 -->
    <div class="Tab" id="tab5">
        <div class="TabHeading">
            <h2>4. Your Information</h2>
        </div>
        <div class="SectionHeading" style="margin-top: 20px;">
            Type of Crime Description
        </div>
        <div class="SectionForm" style="margin-bottom: 0px;">
            <div>
                <span class="FormQuestion">What crime type does your information relate to?</span>
                <select name="crime" id="crime"  >
	<option value="Animal Cruelty">Animal Cruelty</option>
	<option value="Arson">Arson</option>
	<option value="Assault">Assault</option>
	<option value="Breach of bail">Breach of bail</option>
	<option value="Break and Enter - Commercial">Break and Enter - Commercial</option>
	<option value="Break and Enter - Residential">Break and Enter - Residential</option>
	<option value="Child non-sexual abuse">Child non-sexual abuse</option>
	<option value="Child sexual abuse">Child sexual abuse</option>
	<option value="Computer crime">Computer crime</option>
	<option value="Drugs - Administer of drug use location">Drugs - Administer of drug use location</option>
	<option value="Drugs - Courier">Drugs - Courier</option>
	<option value="Drugs - Drug house">Drugs - Drug house</option>
	<option value="Drugs - Laboratory">Drugs - Laboratory</option>
	<option value="Drugs - Amphetamine/Ecstasy">Drugs - Amphetamine/Ecstasy</option>
	<option value="Drugs - Cannabis">Drugs - Cannabis</option>
	<option value="Drugs - Cocaine">Drugs - Cocaine</option>
	<option value="Drugs - Heroin">Drugs - Heroin</option>
	<option value="Drugs - Other">Drugs - Other</option>
	<option value="Escapee">Escapee</option>
	<option value="Firearms - Possession/Use">Firearms - Possession/Use</option>
	<option value="Fraud">Fraud</option>
	<option value="Gang - Criminal Gang">Gang - Criminal Gang</option>
	<option value="Graffiti">Graffiti</option>
	<option value="Homicide">Homicide</option>
	<option value="Malicious Damage">Malicious Damage</option>
	<option value="Missing Person">Missing Person</option>
	<option value="Paedophiles">Paedophiles</option>
	<option value="Pornography">Pornography</option>
	<option value="Terrorists">Terrorists</option>
	<option value="Traffic Offences">Traffic Offences</option>
	<option value="Vehicle Theft">Vehicle Theft</option>
	<option value="Vehicle/Vessel Rebirthing">Vehicle/Vessel Rebirthing</option>
	<option value="Violence/Threats to Public">Violence/Threats to Public</option>
	<option value="Violents/Threats to Police">Violents/Threats to Police</option>
	<option selected="selected" value="OTHER">OTHER</option>

</select>

            </div>
            <div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png" alt='' />
                    If "OTHER", what type of crime?
                    <br />
                </div>
                <textarea style="border-radius: 15px;" name="othercrimes" rows="4" cols="90" required ></textarea>
            </div>
        </div>
        <div class="SectionHeading" style="margin-top: 20px;">
            What Information do you have?
        </div>
        <div class="SectionForm" style="margin-bottom: 0px;">
            <div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png" alt='' />
                    What is happening?
                    <br />
					</div>
                <textarea style="border-radius: 15px;" name="whathappen" rows="4" cols="90" required></textarea>
            </div>
            <div>
                <div class="FormQuestionLarge">
                    When is it happening / did it happen?
                    <br />
                </div>
                <textarea  required style="border-radius: 15px;" name="whenhappen" rows="4" cols="90"></textarea>
            </div>
            <div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png" alt='' />
                    Where is it happening?
                    <br />
                </div>
                <textarea style="border-radius: 15px;" name="wherehappen" rows="4" cols="90" required></textarea>
            </div>
            <div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png"  />
                    How is it happening?
                    <br />
                </div>
                <textarea style="border-radius: 15px;" name="howhappen" rows="4" cols="90" required></textarea>
            </div>
            <div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png" alt=''>
                    Why is it happening?
             </div>
                <textarea style="border-radius: 15px;" name="whyhappen" rows="4" cols="90" required></textarea>
			</div>
            <div>
                <div class="FormQuestionLarge">
                    <img src="Images/bluesquare.png" alt='' />
                    Any other information
                    <br />
                </div>
                <textarea style="border-radius: 15px;" name="anyotherinfo" rows="4" cols="90" required></textarea>
			</div>
		</div>
        <div class="SectionHeading" style="margin-top: 20px;">
            Do you have supporting evidence such as photos, videos etc.?
        </div>
        <div class="SectionForm" style="margin-bottom: 0px;">
<div class="file-upload-container ">
<label for="file_upload" class="left">File Upload</label>
<div class="gfield_description">
<p>If you have a digital photograph that's relevant to this report (for example, a photo taken with your phone) you can upload it here. Please ensure the image is in .jpg or .jpeg format and that it’s no bigger than 2 MB in size.</p>
<p>Files must be less than <strong>2 MB</strong><br>Allowed file types: <strong>jpg jpeg</strong></p></div>
<div class="ginput_container">
<input name="fileupload" type="file" class="">
</div>
</div>
            </div>
        </div></div>
        
    <!-- /tab5 -->
    <!-- tab 6 -->
    <div class="Tab" id="tab6">
        <div class="TabHeading">
           <h2> 6. Submit</h2>
        </div>
        <div class="TabExplanationText">
            <p>
                Thank you for completing this form. The information you have provided will be sent
                to Sumbong11. If you would like to review or update any of the information,
                please click the appropriate section icon above and make your changes before submitting.
            </p>
            <p class="BlueText" style="display: none;">
                <a class="TextLink" onclick="DisplayTab(1)">Your contact details</a>&nbsp;<img style="display: none"
                    id="ContactDetailsImage" src="Images/false.png" alt=" " /><br />
                <a class="TextLink" onclick="DisplayTab(2)">Incident details</a>&nbsp;<img style="display: none"
                    id="IncidentDetailsImage" src="Images/false.png" alt=" " />
            </p>
            <p class="BlueTextItalics" style="display: none;">
                Can you see green ticks here? If not you need to complete more information on other
                parts of the form. Click any of the links to go back and compelte the details.
            </p>
        </div>
        <div class="SectionHeading">
            Please enter the security key below in the field provided to confirm your report
        </div>
        <div class="SectionForm">
              <!-- recaptcha here -->
		<script type="text/javascript">
		var RecaptchaOptions = {
			theme : 'clean',
			tabindex : 0
		};

</script><script type="text/javascript" src="https://www.google.com/recaptcha/api/challenge?k=6LdvkbwSAAAAAJhwP-Yy6SpaNY0Q4RUS4o-KQP-I">

</script><noscript>
		<iframe src="https://www.google.com/recaptcha/api/noscript?k=6LdvkbwSAAAAAJhwP-Yy6SpaNY0Q4RUS4o-KQP-I" width="500" height="300" frameborder="0">

		</iframe><br /><textarea style="border-radius: 15px;" name="recaptcha_challenge_field" rows="3" cols="40"></textarea><input name="recaptcha_response_field" value="manual_challenge" type="hidden" />
</noscript>
            
            
            <br />
            <br />
            <br />
        </div>
        <!--<div style="height: 30px; margin-left:20px; margin-bottom:20px;" >-->
        <div class="TabExplanationText">
            <p class="BlueText">
                Thank you. Please click the 'submit' button to send your report.</p>
            <p>
                <span class="validation" id="EmptyFormError" style="display: none;">Cannot submit an
                    empty form</span></p>
            <span  class="validation"></span>
        </div>
        <div class="SubmitButton">
            <input type="hidden" name="IsMobile"  value="False" />
            <input type="image" name="ImageButton1" src="Images/blueSubmitButton.png"/>
			
        </div>
        <div class="TabExplanationText">
            <p>
                Please note - once the upload has been completed you will receive a reference number.
                If you do not receive this number please contact PNP Sumbong 11
            </p>
        </div>
    </div>

    <div class="spacer" />
    <br />

<!-- footer -->
<!-- footer -->

</form>
</body>
</html>
