
<?php

	include ('connection.php');

	$fullName= $_POST["fullName"];
	$email=$_POST["email"];
	$position=$_POST["position"];
	$education=$_POST["education"];
	$experience=$_POST["experience"];
	
	$checkData = "SELECT email FROM student WHERE email = '{$email}'";
	
	$result = $conn->query($checkData);
	
		if (($result->num_rows > 0))
	{
		 // echo "Student already registered";
		  header("location:../home.php?log=alreg");
	} 
		elseif ($result->num_rows == 0)
		
	{
		$sql = "INSERT INTO temp(email,name,position,education,experience) VALUES ('$email','$fullName','$position','$education','$experience')";
	
	     if ($conn->query($sql) === TRUE) {
			 
		//echo "New student " . $name . " added successfully";
       // echo "Student added sucessfully";
			header("location:../home.php?log=success");
		} 
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}	

?>