
<?php
	session_start();
	//$_SESSION['counter']=rand(1,4);
	//$_SESSION['score']=0;
	$studentEmail=$_POST["studentEmail"];  
		
	include 'connection.php';
	$checkData = "SELECT * FROM student WHERE email = '{$studentEmail}'";

		$result = $conn->query($checkData);
		if ($result->num_rows > 0) {
				// output data of each row
			while($row = $result->fetch_assoc()) {
				$_SESSION['userEmail']=$row["email"];
				$_SESSION['userName']=$row["name"];
			}
			$_SESSION['user']="std";
			
			unset($_SESSION['sup']);
			
			header("location:../category.php");
		}
	
	else {
	
		header("location:../home.php?log=unreg");
	}	

	?>
