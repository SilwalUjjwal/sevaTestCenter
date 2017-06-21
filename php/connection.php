<?php
	$servername = "localhost";
	$username="id242702_sevatest";
	$password="sevatest";
	$dbname ="id242702_mocktestdb";
		/*
		$servername = "localhost";
		$username="id242702_sevatest";
		$password="sevatest";
		$dbname ="id242702_mocktestdb";
		*/
	$conn = new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		die("Connection failed:". $conn->connect_error);
	}
?>