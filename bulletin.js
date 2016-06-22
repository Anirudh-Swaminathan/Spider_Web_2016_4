function delPost(button) {
    var dele = confirm("Do you want to delete this post?");
    if(dele){
        var id = button.id;
        //alert('ID of the button is '+id);
        var di = document.getElementById("post"+id);
        
        var xhttp = new XMLHttpRequest();
        var formdata = new FormData();
        formdata.append("postid",id);
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                //document.getElementById("demo").innerHTML = xhttp.responseText;
                //alert(xhttp.responseText);
                if(xhttp.responseText === "Success"){
                    di.parentNode.removeChild(di);
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
        xhttp.open("POST", "delPost.php", true);
        xhttp.send(formdata);
    }
}