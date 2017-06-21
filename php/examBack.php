<?php
	session_start();
	$name=$_SESSION['userName'];
	$email=$_SESSION['userEmail'];
	$user=$_SESSION['user'];
	session_unset();
	session_destroy();
	
	session_start();
	$_SESSION['userName']=$name;
	$_SESSION['userEmail']=$email;
	$_SESSION['user']=$user;
	if ($user!="std")
	{
		$_SESSION['login']=true;
	}
	
	echo "<script>setTimeout(\"location.href = '../category.php';\",1000);</script>";
?>