<?php
require "connect.php";
require "login_checker.php";
if($_SESSION["access_level"]!="Admin"){
    echo "You are not an admin";
}
else{
    if(!isset($_POST["postid"])){
        echo "Could not receive form data";
    }
    else{
        $id = $_POST["postid"];
        //echo "The post ID is $id";
        $sql = $conn->prepare("DELETE FROM `t4_posts` WHERE `t4_posts`.`Post_ID` = ?");
        $sql->bind_param("i",$id);
        $bo = $sql->execute();
        if($bo){
            echo "Success";
        }
        else{
            echo "Could Not delete";
        }
    }
}
?>
