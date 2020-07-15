// JavaScript Document

function validateContactForm(){
	if(document.getElementById('name').value == '' || document.getElementById('name').value == 'Your name'){
		document.getElementById('name').style.backgroundColor = '#FBC2C4';
		return false;
	}
	
	if(document.getElementById('email').value == '' || document.getElementById('email').value == 'Your email address'){
		document.getElementById('email').style.backgroundColor = '#FBC2C4';
		return false;
	}
	
	var emailAddress = document.getElementById('email').value;
	var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	if(reg.test(emailAddress) == false){
		
		document.getElementById('email').value = 'Invalid email address';
		document.getElementById('email').style.backgroundColor = '#FBC2C4';
		return false;
	}
	
	if(document.getElementById('phone').value == '' || document.getElementById('phone').value == 'Your phone number'){
		document.getElementById('phone').style.backgroundColor = '#FBC2C4';
		return false;
	}
	
	if(document.getElementById('message').value == '' || document.getElementById('message').value == 'Your Message'){
		document.getElementById('message').style.backgroundColor = '#FBC2C4';
		return false;
	}
}
function clearError(I__D){
	document.getElementById(I__D).style.backgroundColor = '#F8F8F7';
}