<?php
	session_start();
					
	include 'connection.php';
	$_SESSION['counter']=rand(1,4);
	$_SESSION['score']=0;
	$_SESSION['sessionCategoryId']=@$_GET['id'];
	
	$checkData = "SELECT * FROM category WHERE catId = '{$_SESSION['sessionCategoryId']}'";
	$result = $conn->query($checkData);
	
	while($row = $result->fetch_assoc()) 
	{
		$_SESSION['categoryTime']=$row["catTime"];
		$_SESSION['sessionCategoryName']=$row["catName"];
		$_SESSION['sessionCategoryQuestion']=$row["catQuestions"];
		
	}	
	
	/*$_SESSION['questionCount']=1;
	$_SESSION['timeStartHour']=floor($time/60);
	$_SESSION['timeStartMinute']=($time%60)-1;
    $_SESSION['timeStartSecond']=59;
	$_SESSION['questionArray']=array();
	$_SESSION['questionHistory']=array();
	
	array_push($_SESSION['questionArray'],$_SESSION['counter']);
	array_push($_SESSION['questionHistory'],$_SESSION['counter']);
	
	$_SESSION['finalizer']=1;*/
	$_SESSION['exm']="on";
	header("location: attendExam.php");
			
?>          
