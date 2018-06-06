//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches
var involvedParty = -1; // number of involved parties
var involvedVehicle = -1; //number of involved vehicles
var evidenceUploaded = -1; // number of evidence uploaded

$("#genNext").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
$(".next").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	next_fs = $(this).parent().next();

	//activate next step on progressbar using the index of next_fs
	$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

	//show the next fieldset
	next_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;

	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	//de-activate current step on progressbar
	$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

	//show the previous fieldset
	previous_fs.show();
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		},
		duration: 800,
		complete: function(){
			current_fs.hide();
			animating = false;
		},
		//this comes from the custom easing plugin
		easing: 'easeInOutBack'
	});
});
/*
$(".submit").click(function(){
	return false;
})*/

//**** JS FOR SETTING THE NUMBER OF EVIDENCE / INVOLVED CARS / INVOLVED PARTIES *****//

jQuery('#quantityParty').on('input propertychange paste', function(){
	var type='party';
	var input = document.getElementById("quantityParty").value - 1;
	var totalNumber = involvedParty;
	involvedParty = processQuantity (input,totalNumber,type);
});


jQuery('#quantityVehicle').on('input propertychange paste', function(){
	var type='vehicle';
	var input = document.getElementById("quantityVehicle").value - 1;
	var totalNumber = involvedVehicle;
	involvedVehicle = processQuantity (input,totalNumber,type);
});

jQuery('#quantityEvidence').on('input propertychange paste', function(){
	var type='evidence';
	var input = document.getElementById("quantityEvidence").value - 1;
	var totalNumber = evidenceUploaded;
	evidenceUploaded = processQuantity (input,totalNumber,type);
});


function processQuantity(input, totalNumber, type){
	if (input > totalNumber){
		var i = input - totalNumber;
		for (;i>0;i--){
			if (totalNumber == -1){
				totalNumber = show(totalNumber,type);
				continue;
			}
			totalNumber = duplicate(totalNumber,type);
		}
	} else if (input < totalNumber && input>=-1) {

		var i = totalNumber - input;
		for (;i>0;i--){
			if (input==-1 && i==1){

				totalNumber=hide(i, type);
				continue;
			}
			totalNumber = remove (totalNumber,type);
		}
	}
	return totalNumber;
}

function duplicate(i,type) {

    var original = document.getElementById(type + i);
    var clone = original.cloneNode(true); // "deep" clone
	clone.name = type + ++i;
    clone.id = type + i;// there can only be one element with an ID
    original.parentNode.append(clone);
	return i;
}

function remove (i,type){
	var toRemove = '#' + type + i--;
	$(toRemove).remove();
	return i;
}

function hide (i,type){
	i--;
	var toHide = document.getElementById(type + i).id;
	$('#' + toHide).addClass('hidden');
	return i-1;
}

function show (i,type){
	i++;
	var toShow = document.getElementById(type + i).id;
	$('#' + toShow).removeClass('hidden');
	return i;
}


// submit js
/*
$("#submitForm").click(function(){
	sendQuantity()
});

function sendQuantity(){
	$.post('functions/processreport.php', {involvedParty: involvedParty}, function(){
    alert("data sent and received: ");
	});
	$.post('functions/processreport.php', {involvedVehicle: involvedVehicle}, function(data){
		alert("data sent and received: "+data);
	});
	$.post('functions/processreport.php', {evidenceUploaded: evidenceUploaded}, function(data){
		alert("data sent and received: "+data);
	});
}
*/

$("#submitForm").click(function () {
	$('#involvedParty').val(involvedParty);
	$('#involvedVehicle').val(involvedVehicle);
	$('#evidenceUploaded').val(evidenceUploaded);
});

/*

$("#genNextDiv").click(function () {
	var fields = [  'description', 'typeOfOffense', 'dateTimeOfOffense' , 'streetAddressOfOffense', 'barangayOfOffense', 'districtOfOffense'];
	var buttn = "genNext";
	if (checkFields(fields)==1){
		$("#"+buttn).addClass("next");
	}
});

function checkFields(fields){


	for (var i = 0, len = fields.length; i < len; i++) {
		var field = fields[i];
		fieldval =  document.getElementsByName(field).value;
		if (typeof fieldval == "undefined" || fieldval == null || fieldval==""){
			alert(field+ " " + fieldval);
			return 0;
		}
	}
	return 1;
}*/

function imNotARobot() {
    jQuery('#finalize').trigger('propertychange');
  	};

$(document).ready(function () {



	$('#genNext').attr('disabled','disabled');
	$('#submitForm').attr('disabled','disabled');


     jQuery('.general-info').on('input propertychange paste click', function(){
		 var fields = [ 'description', 'typeOfOffense', 'dateTimeOfOffense' ,'cityOfOffense'];
		 var bttn = "genNext";
		 checkFields(fields,bttn);
     });
     jQuery('#finalize').on('input propertychange paste', function(){
		 var responseCaptcha = grecaptcha.getResponse();
		 var fields = ['password','agreement'];
		 var bttn = "submitForm";
		 if (responseCaptcha != 0){
			//$('#submitForm').prop('disabled',false);
		 	checkFields(fields,bttn);
		}
     });


     $('#dateTimeOfOffense').on('focus', function(){
     	this.type='date';
     });




	 function checkFields(fields,buttnID){
		for (var i = 0, len=fields.length;i<len;i++){
			 fieldval = $("#"+fields[i]).val();
			if(fieldval == '' || fieldval==null) {
				$('#' + buttnID).attr('disabled','disabled');
				return;
			}
		 }
		 $('#'+ buttnID).removeAttr('disabled');
	 }
});

var validateEmail = function(elementValue) {
    var emailPattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return emailPattern.test(elementValue);
}



$('#email').keyup(function() {

    var value = $(this).val();
    var valid = validateEmail(value);

    if ( $("#email").val().length < 1 )
    {
        $('#infbutton1').prop('disabled', false);
    }
    else if (!valid) {


        $('#infbutton1').prop('disabled', true);

    } else {


        $('#infbutton1').prop('disabled', false);

    }}        );
$('#contactphone').keyup(function() {


    if ( $("#contactphone").val().length != 11 ) {
        $('#infbutton1').prop('disabled', true);

    } else{
        $('#infbutton1').prop('disabled', false);
	}
});
// $("#datepicker").datepicker({
//     format: "yyyy",
//     viewMode: "years",
//     minViewMode: "years"
// });
function agreement() {
		var x = document.getElementById("agreement").required;
		document.getElementById("agreement").innerHTML = x;
	}
