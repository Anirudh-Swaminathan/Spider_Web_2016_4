function btnClick(){
	return validate();
}
function validate(){
	var n = document.getElementById('user_name').value;
	var p = document.getElementById('password').value;
	var c = document.getElementById('confirm').value;
	var cap = document.getElementById('captcha_code').value;
	
	//Check name
	if(n === ''){
		alert('username must not be empty');
		return false;
	}
	//Check password
	if(p === ''){
		alert('Password must not be empty');
		return false;
	}
	if(c === ''){
		alert('Confirm Password must not be empty');
		return false;
	}
	if(p!==c){
		alert('Please enter the same password again in the confirm password field');
		return false;
	}
	
	//Check captcha
	if(cap === ''){
		alert('Captcha must not be empty');
		return false;
	}
	if(!(/^\d{5}$/.test(cap))){
		alert('Please enter the CAPTCHA digits in the box provided');
		return false;
	}
	return true;
}