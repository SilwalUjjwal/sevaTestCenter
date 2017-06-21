<?php
	session_start();
	$targetId = @$_GET["e"];

	include "connection.php";

	$qDes= $_POST["qDes"];
	$o1= $_POST["o1"];
	$o2= $_POST["o2"];
	$o3= $_POST["o3"];
	$o4= $_POST["o4"];
	$ca=$_POST["correctAns"];
	$ca=$_SESSION['questionCategory'];

	$sql="UPDATE $ca SET qDescrip='$qDes', option1='$o1', option2='$o2', option3='$o3', option4='$o4', correctAns='$ca' WHERE qId='$targetId'";
	
	//$delsql ="DELETE FROM student WHERE email='{$targetEmail}'";
	
		if($conn->query($sql) === TRUE){
		
		//echo "<script>setTimeout(\"location.href = '../supervisor/viewStudents.php';\",1200);</script>";
        header("location: ../supervisor/addQuestion.php");
        }
        else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
?>