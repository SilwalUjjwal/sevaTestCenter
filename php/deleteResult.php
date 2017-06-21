<?php

	$targetEmail = @$_GET["e"];
	
	include "connection.php";

	
	$delsql ="DELETE FROM testresult WHERE testId='{$targetEmail}'";
	
		if($conn->query($delsql) === TRUE){
		
		//echo "<script>setTimeout(\"location.href = '../supervisor/viewStudents.php';\",1200);</script>";
        header("location: ../supervisor/viewResult.php");
        }
        
		else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
?>