function btnClick(){
	return validate();
}
function validate(){
	var n = document.getElementById('user_name').value;
	var p = document.getElementById('password').value;
	var c = document.getElementById('confirm').value;
	if(n === ''){
		alert('username must not be empty');
		return false;
	}
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
	return true;
}