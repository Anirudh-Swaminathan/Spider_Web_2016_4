function chAccess(button) {
    var old = document.getElementById('p'+button.id);
    alert('You clicked button with username '+button.id);
    var n = document.getElementById('acce'+button.id).value;
    alert('The old access level was '+old.innerHTML);
    if(old.innerHTML === n){
        alert('The user '+button.id+' was already '+n+'.\nPlease choose another access level');
    }
    else{
        alert('The new access level will be '+n);
        var a = confirm('Do you want to proceed to change the access level of the user?');
        if(a){
        //alert('Confirmed');
            var but = document.getElementById(button.id);
            var xhttp = new XMLHttpRequest();
            var formdata = new FormData();
            formdata.append("user",button.id);
            formdata.append("accNew",n);
            xhttp.onreadystatechange = function () {
                if(xhttp.readyState == 4 && xhttp.status == 200){
                //alert(xhttp.responseText);
                    if(xhttp.responseText === "Success"){
                    //alert(par);
                    //alert(par.innerHTML);
                        old.innerHTML = n;
                        if(n === "Admin"){
                            var sel = document.getElementById('acce'+button.id);
                            var but = document.getElementById(button.id);
                            but.parentNode.removeChild(but);
                            sel.parentNode.removeChild(sel);
                        }
                    //di.parentNode.removeChild(di);
                    }
                    else{
                    //
                        var re = new RegExp("<title>[\n\r\s]*(.*)[\n\r\s]*</title>", "gmi");
                        var title = re.exec(xhttp.responseText);
                    //alert(title+";");
                        if(title!=="") location.reload();
                        else alert(xhttp.responseText);
                    }
                
                }
            };
        //alert('Opened connection');
            xhttp.open("POST","cAcc.php",true);
            xhttp.send(formdata);
        }
    }
}