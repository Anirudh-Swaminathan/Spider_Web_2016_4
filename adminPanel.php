<?php
require "connect.php";
require "login_checker.php";
if(isset($_SESSION["login_status"]) && isset($_SESSION["username"]) && isset($_SESSION["access_level"])){
	echo "Hello ".$_SESSION["username"]." [".$_SESSION["access_level"]."]";
	$access = $_SESSION["access_level"];
}
else{
	$redirect_pag = '/../Spider_2016_4/';
	session_unset();
	session_destroy();
	redirect($redirect_pag);
}
if(strcmp($access,"Admin")){
    $redirect_pag = '/../Spider_2016_4/bulletin.php';
    redirect($redirect_pag);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="bulletin.css" type="text/css"/>
</head>
<body>
    <ul id="drop-nav">
        <li><a href="bulletin.php">Bulletin Board</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <div id="posts">
        <?php
            $sql = $conn->prepare("SELECT Username,Access FROM spider_2016_4 ORDER BY Username ASC");
            $sql->execute();

            $sql->bind_result($user,$acce);
            $sql->store_result();

            if($sql->num_rows == 0){
                echo "No USERS yet";
            } else {
                $i = 0;
                while($sql->fetch()){
                    $i++;
                    echo "<div class = 'post' id='post$user'>";
                    echo "<h4>$i. $user</h4>";
                    echo "<p> Access level <span id='p$user'>$acce</span> </p>";
                    if(strcmp($acce,"Admin")){
                         echo "<select required name = 'acce' id='acce$user'>
				        <option value='Admin'>Admin</option>
				        <option value='Editor'>Editor</option>
				        <option value='Viewer'>Viewer</option>
			            </select>";
                        echo "<button id = '$user' onclick='chAccess(this)'>Change Access</buton>";
                       
                    }
                    echo "</div>";
                }
            }

        ?>
    </div>
    <script src="admp.js" type='text/javascript'>
    </script>
</body>
</html>