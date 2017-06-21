<?php

	$targetEmail = @$_GET["e"];
	
	include "connection.php";

	$sql="INSERT INTO student SELECT * FROM student WHERE email='{$targetEmail}'";
	
	$delsql ="DELETE FROM student WHERE email='{$targetEmail}'";
	
		if($conn->query($delsql) === TRUE){
		
		//echo "<script>setTimeout(\"location.href = '../supervisor/viewStudents.php';\",1200);</script>";
        header("location: ../supervisor/viewStudents.php");
        }
        
		else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
?>