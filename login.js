function btnClick(){
	return validate();
}
function validate(){
	var n = document.getElementById('user_name').value;
	var p = document.getElementById('password').value;

	//Test name
	if(n === ''){
		alert('username must not be empty');
		return false;
	}
	//Test password
	if(p === ''){
		alert('Password must not be empty');
		return false;
	}
	return true;
}