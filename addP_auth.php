<?php
require "login_checker.php";
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Member Login Status</title>
</head>
<body>
<?php
	require "connect.php";
	
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	$message = "Hello";

	function validateInp($ti){
		global $message;
        //echo "(validateInp)The post given is $ti <br/>";
        //$pq = strlen($ti);
        //echo "(validateInp)The length of the post is $pq<br/>";
        //echo "(validateInp)The value of strcmp is ".strcmp($ti,"")."<br/>";
		if(empty($ti)){
			$message = 'Post must not be empty';
            //echo "(validateInp)The text is empty<br/>";
			return false;
		}
        if(strlen(trim($ti)) == 0){
            $message = 'Post must contain atleast 1 non-whitespace character';
            return false;
        }
        //echo "(validateInp)The text is not empty<br/>";
		return true;
	}

	if(!isset($_POST["posts"])){
		$message = "Please fill the add posts page";
		echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/addPost.php';</script>";
	}

    $postHere = $_POST["posts"];
    
    //echo "The post was $postHere";
    //$pqr = strlen($postHere);
    //echo "The length of the post is $pqr <br/>";
    $user = $_SESSION["username"];
    $acces = $_SESSION["access_level"];

	if(validateInp($postHere)){
        //echo "It was a valid post<br/>";
		$sql = $conn->prepare("INSERT INTO t4_posts(Post,Username,Access) VALUES(?,?,?) ");
		$sql->bind_param("sss",$postHere,$user,$acces);
		$bo = $sql->execute();
		if($bo){
            echo "The Post was successful<br/>";
            header("Location: /../Spider_2016_4/bulletin.php");
            ob_end_clean();
        }
        else{
            echo "The post could not be posted!!<br/>";
            $message = "The post could not be posted!!";
            echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/addPost.php';</script>";
            ob_end_flush();
        }

		$sql->close();
		$conn->close();
	}

	else{
		echo "<script type='text/javascript'>alert('$message');window.location.href='/Spider_2016_4/addPost.php';</script>";
		ob_end_flush();
	}
?>
</body>
</html>