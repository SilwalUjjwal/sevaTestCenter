 <?php
   
   	include 'connection.php';
   	
	$categoryName = $_POST["categoryName"];
	$categoryQuestion= $_POST['categoryQuestion'];
	$categoryHour= $_POST['questionHour'];
	$categoryMinute=$_POST['questionMinute'];
	$categoryTime= $categoryHour*60+$categoryMinute;
	
	$checkData = "SELECT catId FROM category WHERE catName = '{$categoryName}'";
	
	$result = $conn->query($checkData);
	$value = $result->fetch_assoc();
	
	if ($result->num_rows > 0)
	{
		//echo "The Category is already in the system" . "<br>". "Its Category Id is:" . $value["catId"];
		header("location: ../supervisor/addCategory.php?nwcat=dub");
		//echo "<script>setTimeout(\"location.href = 'addcategory.php?nwcat=dub';\",1500);</script>";
	}   
	elseif ($result->num_rows === 0){
		$sql = "INSERT INTO category (CatName, catTime, catQuestions) VALUES ('$categoryName','$categoryTime', '$categoryQuestion')";
		
		$sql2 = "CREATE TABLE `".$categoryName."` (
				qId      INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				qDescrip TEXT NOT NULL,
				option1  TEXT NOT NULL,
				option2  TEXT NOT NULL,
				option3  TEXT NOT NULL,
				option4  TEXT NOT NULL,  
				correctAns TEXT NOT NULL
				)";
	
	    if (($conn->query($sql) === TRUE)&&($conn->query($sql2)=== TRUE)) {
		//echo "New Category" . $categoryName . "added successfully";
		//echo "<script>setTimeout(\"location.href = 'addcategory.php?nwcat=org';\",1500);</script>";
	    	header("location: ../supervisor/addCategory.php?nwcat=org");
		} 
		else {
		echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}		
	$conn->close();
	exit();
?>