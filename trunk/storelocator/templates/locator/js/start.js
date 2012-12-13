/**
 * @description:  Call functions of website
 * @version: 1.0 
 **/
 
/****************************
 ***** Global variables *****
 ****************************/
var gProject = {};	

/*************************************
 ***** Main functions start here *****
 *************************************/
$(document).ready(function(){	
	gProject.initForm.initFormRegister();
	gProject.initElements.initCalendar();
});

/******************************
 ***** Show error if have *****
 ******************************/
window.onerror = errorHandler;
function errorHandler(msg, url, l){
	if (window.console){
		console.log(msg + " : " + url + " : " + l);
	}
	return true;
}

/******************************
 ***** Functions built in *****
 ******************************/ 
gProject.initForm = { 
	initFormRegister: function(){
		var strId = 'frmRegister';
		var elements = [{
			field: 'txtFullName',
			valid: 'required',
			messages: 'Please input your name!'
		},{
			field: 'radSex',
			valid: 'required',
			messages: 'Please select sex!'
		},{
			field: 'txtPhone',
			valid: 'required|number',
			messages: 'Please input your phone!' + '|' + 'Your phone is not valid with format!'
		},{
			field: 'txtEmail',
			valid: 'required|email',
			messages: 'Please input your email!' + '|' + 'Your email is not valid!'
		},{
			field: 'selectCountry',
			valid: 'required',
			messages: 'Please select your country'
		},{
			field: 'chkAgree',
			valid: 'required',
			messages: 'Please select agreement'
		}];
		jValidateForm(strId, elements);
	}
};

gProject.initElements = {
	initCalendar: function(){
		var dp = $('.date-pick');		
		if(dp.length > 0){
			$('.date-pick').datePicker({
				startDate: '1/1/1950',
				closeOnSelect  : true,
				clickInput: true
			});
		}
	}
}