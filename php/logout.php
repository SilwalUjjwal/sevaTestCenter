<?php
	session_start();
	 session_unset();
	session_destroy();
	echo "<script>setTimeout(\"location.href = '../home.php';\",1000);</script>";
?>