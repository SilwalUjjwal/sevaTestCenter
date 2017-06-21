	<?php

		session_start();
		
		$_SESSION['questionCategory']=$_POST["categorySelection"];
		
		header("location: ../supervisor/addQuestion.php");
	?>