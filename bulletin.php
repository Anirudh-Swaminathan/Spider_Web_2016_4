<?php
require "login_checker.php";
require "connect.php";
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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bulletin Board</title>
	<link rel="stylesheet" href="bulletin.css" type="text/css"/>
</head>
<body>
	<ul id="drop-nav">

		<?php 
		global $access;
		if(!strcmp($access,"Admin")){
			echo "<li><a href = 'adminPanel.php'>Admin Panel</a></li>";
		}
		if(!( strcmp($access,"Editor") && strcmp($access,"Admin") )){
			echo "<li><a href='addPost.php'>Add Post</a></li>";
		}
		?>

  		<li><a href="logout.php">Logout</a></li>
		
		<!--
  		<li><a href="#">Web Design</a>
    		<ul>
    			<li><a href="#">HTML</a></li>
    			<li><a href="#">CSS</a></li>
      			<li><a href="#">JavaScript</a></li>
    		</ul>
  		</li>
  		<li><a href="#">Content Management</a>
    		<ul>
      			<li><a href="#">Joomla</a></li>
      			<li><a href="#">Drupal</a></li>
      			<li><a href="#">WordPress</a></li>
      			<li><a href="#">Concrete 5</a></li>
    		</ul>
  		</li>
  		<li><a href="#">Contact</a>
    		<ul>
     		 	<li><a href="#">General Inquiries</a></li>
      			<li><a href="#">Ask me a Question</a></li>
    		</ul>
  		</li>
		  -->
	</ul>
	<!-- End of menu -->
	<div id="posts">
			<?php
				$sql = $conn->prepare("SELECT Post_ID,Post,Username,Access,Time FROM t4_posts ORDER BY Time DESC");
				$sql->execute();
	
				$sql->bind_result($post_id,$post,$user,$acce,$tim);
				$sql->store_result();

				if($sql->num_rows == 0){
					echo "No Posts yet!!";
				} else {
					$i = 0;
					while($sql->fetch()){
						$i++;
						echo "<div id='post$post_id' class='post'>";
						echo "<h4>".$i.". ".$post."</h4>";
						echo "<p> Posted By ".$user." [".$acce."] "."</p>";
						echo "<p> At time ".$tim."</p>";
						if(!strcmp($access,"Admin")){
							echo "<button id = $post_id onclick = 'delPost(this)'>Delete Post</button></div>";
						}
						else echo "</div>";
					}
				}
				$sql->close();
				$conn->close();
			?>
	</div>
	<script src = "bulletin.js" type = 'text/javascript'>
	</script>
</body>
</html>