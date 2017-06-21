<?php

	$targetEmail = @$_GET["e"];
	
	include "connection.php";

	$sql="INSERT INTO student SELECT * FROM temp WHERE email='{$targetEmail}'";
	
	$delsql ="DELETE FROM temp WHERE email='{$targetEmail}'";
	
	if ($conn->query($sql) === TRUE) {
		if($conn->query($delsql) === TRUE){
		
		//echo "<script>setTimeout(\"location.href = '../supervisor/reviewRegistration.php';\",200);</script>";
		header("location: ../supervisor/reviewRegistration.php");
        
        }
		else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
		else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
?>