<?php
require "login_checker.php";
require_once "connect.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Post</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <div id="login">
    <form action="addP_auth.php" method="POST">
        <header>Add Post</header>
        <label>POST</label>
        <br/>
        <br/>
        <textarea required name="posts" id="posts" rows="5" cols="20"></textarea>
        <br/>
        <br/>
        <button id="postBtn" onclick = "return btnClick()">Add Post</button>
    </form>
    </div>
    <script src="addPost.js" type = 'text/javascript'>
    </script>
</body>
</html>