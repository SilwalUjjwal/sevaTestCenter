<?php

	$targetId = @$_GET["e"];

	include "connection.php";

	$cname= $_POST["cName"];
	$ctime= $_POST["cTime"];
	$cques= $_POST["cQues"];

	/*$find="SELECT * FROM category WHERE catId= '$targetId'";
	$findresult = $conn->query($find);
	
	if ($findresult->num_rows > 0) {
                // output data of each row
          while($row = $findresult->fetch_assoc()) {
       		$renamesql = "RENAME TABLE $row['catName'] TO '$cname'";
                $conn->query($renamesql);
          }
    }

    */

	$sql="UPDATE category SET catName=LOWER('$cname'), catTime='$ctime', catQuestions='$cques' WHERE catId='$targetId'";
	
	
	
	//$delsql ="DELETE FROM student WHERE email='{$targetEmail}'";
	
		if($conn->query($sql) === TRUE){
		
		//echo "<script>setTimeout(\"location.href = '../supervisor/viewStudents.php';\",1200);</script>";
        header("location: ../supervisor/editCategory.php");
        }
        else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	
?>