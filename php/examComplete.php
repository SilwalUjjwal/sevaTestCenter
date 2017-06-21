<?php 
  session_start();
  
  include 'connection.php';

  if(!$_SESSION['sessionCategoryName']){
     header("location:../home.php");
     die;
	}

	unset($_SESSION['exm']);

	$correctAnswerArray = $_SESSION['answerCollection'];
	$serial = $_SESSION['serialValue'];
	$receivedAnswerArray = array();
	$score = 0;
	//echo $serial;
		for ($x=0; $x<$serial; $x++)
			{
				global $receivedAnswerArray;
				$value=@$_POST[$x];
				array_push($receivedAnswerArray,$value);
			}
		for ($x=0; $x<$serial; $x++)
		{
			global $score;
			global $correctAnswerArray;
			global $receivedAnswerArray;
			
			if ($correctAnswerArray[$x]==$receivedAnswerArray[$x])
			{
				++$score;
			}
			
		}

		$uE=@$_SESSION['userEmail'];
		if ($uE=="")
		{
			$uE=$_SESSION['userName'];
		}
		$ca=$_SESSION['sessionCategoryName'];
		//$ct=@$_POST['kbox'];
		$ct= $_SESSION['categoryTime'];
		$insertData = "INSERT INTO testresult (emailAddr,category,attQuestion,testTime,score,testDate) VALUES ('$uE','$ca','$serial','$ct','$score',NOW())";
        $conn->query($insertData);
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Test Result | Seva Test Center</title>
    <link rel="stylesheet" href="../css/foundation.css">
	<link rel="stylesheet" href="../css/header.css">
	<link rel="stylesheet" href="../css/normalize.css">
 	<link rel="stylesheet" href="../css/fonts/foundation-icons.css" />
	<script src="../js/vendor/modernizr.js"></script>
  </head>
  <body>
    <nav class="menu">
		<h1 class="name">Seva Test Center</h1>
  		<ul class="inline-list">
			<li><a href="../home.php">Home</a></li>
			<li class="active"><a href="../category.php">Exam Center</a></li>
			<li><a href="https://www.sevadevelopment.com" target="_blank">Seva Development</a></li>
		</ul>

	    <ul class="inline-list hide-for-small-only account-action">
		  	<li><a href="#"><?php echo $_SESSION['userName'];?></a></li>
        	<li class=""><a class="signup" href="../php/logout.php">Log out</a></li>
        </ul>
		<a class="account hide-for-medium-up" href="#" data-reveal-id="firstModal"><i class="fi-unlock"></i></a>
	</nav>

<hr>
<div class="row">
  <div class="small-10 columns">
    <span data-tooltip aria-haspopup="true" class="has-tip" title="The result of the test you recently appeared!">Test Result</span>
  </div>
  
            <div class="small-12 columns">
              
                <h4 class="service-heading"><a href="#"></a></h4>
                <p class="service-description"><b></b><br>
                 
                <?php 	echo "You attempted : <b>".$serial. " questions </b><br>";
	        			echo "You received  : <b>".$score.  " points </b><br>";


						$to = $_SESSION['userEmail'];
						$subject = "Test Result of ".$_SESSION['userName'];
						$txt = "Hey ".$_SESSION['userName']."!

						You attended ".$serial." questions.

						Your Score is ".$score." 


						Thank You
						Seva Test Center";

						$headers = "From: SevaTestCenter@stc.com" . "\r\n" .
						"CC: supervisor@sevadev.com";

						mail($to,$subject,$txt,$headers);
						mail("nkayastha@sevadev.com",$subject,$txt,$headers);

			     ?>
                </p>
              
            </div>
</div>
<hr>

<!-- modal content -->
<!-- end of modal-->
<!-- start of scripts-->
  
<script src="js/vendor/jquery.js"></script>
<script src="js/vendor/fastclick.js"></script>
<script src="js/foundation.min.js"></script>

<script type="text/javascript">
  $(document).foundation();
</script>

</body>
</html>