<?php

	$targetEmail = @$_GET["e"];
	
	include "connection.php";

	   $delsql ="DELETE FROM temp WHERE email='{$targetEmail}'";
	
		if($conn->query($delsql) === TRUE){
		
		//echo "<script>setTimeout(\"location.href = '../supervisor/reviewRegistration.php';\",200);</script>";
		header("location: ../supervisor/reviewRegistration.php");
        }
		
		else 
		{
		echo "Error: " . $sql . "<br>" . $conn->error;
	    }	
?>