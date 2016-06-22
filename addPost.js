//alert('Hi');
function btnClick() {
    return validate();
}
function validate() {
    var t = document.getElementByid("posts").value;
    if(t === ''){
        alert('The post must not be empty');
        return false;
    }
    return true;
}