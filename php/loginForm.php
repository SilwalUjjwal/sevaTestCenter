 <?php
   session_start();
	$user = $_POST["userName"];
	$pass= $_POST["password"];
	
	//code for AES encryption
	
	include 'AES.php';
	//$imputText = "mypassword";
	$imputKey = "qwertyuiopasdfgh";
	$blockSize = 256;
	$aes = new AES($pass, $imputKey, $blockSize);

	$encPass = $aes->encrypt();
	//$aes->setData($enc);
	//$dec=$aes->decrypt();
	//echo "After encryption: ".$enc."<br/>";
	//echo "After decryption: ".$dec."<br/>";


	include 'connection.php';	
	$checkData = "SELECT * FROM supervisor";
	$result = $conn->query($checkData);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			if($user==$row['username'] && $encPass==$row['password'])
			{
			//echo "Login Sucessful";
			//echo "<script>setTimeout(\"location.href = '../supervisor/supervisor.php';\",1200);</script>";
				
				$_SESSION['userName']=$row['username'];
				$_SESSION['sup']=$row['username'];
				$_SESSION['login']=true;
				
				header("location: ../supervisor/supervisor.php");
			}
			else
			{
			//echo "Invalid Username or Password";
			//echo "<script>setTimeout(\"location.href = '../home.php?log=fail';\",1500);</script>";
				header("location: ../home.php?log=fail");
			}	
		}
	}	
	$conn->close();


	exit();
 ?>
 