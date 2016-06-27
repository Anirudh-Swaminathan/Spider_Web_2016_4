<?php
require "connect.php";
require "login_checker.php";
if($_SESSION["access_level"]!="Admin"){
    echo "You are not an admin";
}
else{
    if(!isset($_POST["user"]) || !isset($_POST["accNew"])){
        echo "Could not receive form data";
    }
    else{
        $user = $_POST["user"];
        $accN = $_POST["accNew"];
        $sql = $conn->prepare("UPDATE `spider_2016_4` SET `Access` = ? WHERE `spider_2016_4`.`Username` = ?");
        $sql->bind_param("ss",$accN,$user);
        $bo = $sql->execute();
        if($bo){
            echo "Success";
        }
        else{
            echo "Could Not update";
        }
        $sql->close();
        $sql = $conn->prepare("INSERT INTO t4_posts(Post,Username,Access) VALUES(?,?,?)");
        $poster = $_SESSION["username"];
        $acPoster = $_SESSION["access_level"];
        $post = "$user was made $accN by $poster";
        $sql->bind_param("sss",$post,$poster,$acPoster);
        $bo = $sql->execute();
        
        if(!($bo)){
            echo "Could not enter post of the change";
        }
        $sql->close();
        $conn->close();
        
    }
}
?>
