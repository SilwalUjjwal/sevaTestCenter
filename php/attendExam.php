<?php 
  session_start();
  include 'connection.php';

  if(!isset($_SESSION['exm'])){
     header("location:../category.php");
     die;
  }
   
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Exam Center | Seva Test Center</title>
  	<link rel="stylesheet" href="../css/foundation.css">
  	<link rel="stylesheet" href="../css/app.css">
	<link rel="stylesheet" href="../css/header.css">
  	<link rel="stylesheet" href="../css/round.css">
  	<link rel="stylesheet" href="../css/clock.css">
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
        <li class=""><a class="signup" href="logout.php">Log out</a></li>
      </ul>
    <a class="account hide-for-medium-up" href="logout.php" data-reveal-id="firstModal"><i class="fi-unlock"> </i></a>
  </nav>

<div class="callout card" id="wrap">
<hr>
    <div class="small-12 columns">
      <a class="small radius button" href="examBack.php" style="float:left;">Go Back</a>
      	
      	<div class="search">
			<div id="clockdiv">
			  <div id="days">
			    <span class="days"></span>
			    <div class="smalltext">Days</div>
			  </div>
			  <div>
			    <span class="hours"></span>
			    <div class="smalltext">Hours</div>
			  </div>
			  <div>
			    <span class="minutes"></span>
			    <div class="smalltext">Minutes</div>
			  </div>
			  <div>
			    <span class="seconds"></span>
			    <div class="smalltext">Seconds</div>
			  </div>
			</div>
		</div>
		

      <h4 style="display: inline-block;"><b><?php echo $_SESSION['sessionCategoryName'];?></b> Category </h4>
    </div>
<hr>
<form  method="post" id="questionform" >
<table border="2px" role="grid" width="100%" cellspacing="0" cellpadding="0">
  <thead>
  <tr>
    <th width="1%">Ques. No.</th>
    <th width="30%">Description</th>
    <th width="10%">Option 1</th>
    <th width="10%">Option 2</th>   
    <th width="10%">Option 3</th>
    <th width="10%">Option 4</th>
    
  </tr>
  </thead>
  <tbody>

  <?php
/*
  $selCat=$_SESSION['sessionCategoryName'];
  $checkData = "SELECT * FROM $selCat";

  $result = $conn->query($checkData);
  $cnt=0; 
  

  if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {

	  echo "<form method=\"post\" action=\"../php/updateQuestion.php?e=".$row['qId']."\">"; 
	  echo "<tr>";
	  	echo "<td>" . ++$cnt . "</td>";
	    echo "<td>" . $row['qDescrip'] . "</td>";
	    echo "<td><input required type=\"radio\" class=\"onlyread\" name=\"options\" value=\"". $row['option1'] . "\"> ". $row['option1'] ." </td>";
		echo "<td><input required type=\"radio\" class=\"onlyread\" name=\"options\" value=\"". $row['option2'] . "\"> ".$row['option2'] ." </td>";
	  	echo "<td><input required type=\"radio\" class=\"onlyread\" name=\"options\" value=\"". $row['option3'] . "\"> ".$row['option3'] ." </td>";
	  	echo "<td><input required type=\"radio\" class=\"onlyread\" name=\"option\" value=\"". $row['option4'] . "\"> ".$row['option4'] ." </td>";
	  echo "</tr>";
	  echo "</form>";
  	}
  }
  else{
    echo "<div class=\"card\">No question in this Category!</div>";
  }*/

  			$categoryValue=$_SESSION['sessionCategoryName'];
			$questionArray = array();
			$answerArray = array();
			$_SESSION['answerCollection']=array();
			$questionNumbers=$_SESSION['sessionCategoryQuestion'];
			
    		$getTotalQuestions = "SELECT * FROM $categoryValue";
			$result = $conn->query($getTotalQuestions);
			$totalQuestions= $result->num_rows;
		  				
		    function questionFetch()
				{
					global $totalQuestions;
						questionLoop:
						$questionFetcher = rand(1,$totalQuestions);
						if (randomVerify($questionFetcher) == false)
						{
						 $currentQuestion=$questionFetcher;
						 //echo $currentQuestion;	echo "<br>";
						}
						else 
						{
							goto questionLoop;
						}
				}
				
			function randomVerify($input)
			
				{
					global $questionArray;
						if(in_array($input,$questionArray))
						{
							return true;
						}
						array_push($questionArray,$input);
						return false;
				}
		    
	    for($x=0; $x<$questionNumbers; $x++)
	    {
			
			questionFetch();
				
		}
		for($x=0; $x<$questionNumbers; $x++)
	    {
			global $serial;
			$serial=$x;
			$display=$serial+1;
			global $questionArray;
			global $categoryValue;
			global $answerArray;
			$counter = array_pop($questionArray);
			
			$checkData = "SELECT * FROM $categoryValue WHERE qId= $counter";
			$result = $conn->query($checkData);
	        if ($result->num_rows > 0) {
				// output data of each row
			while($row = $result->fetch_assoc()) {
				
			echo "<tr>";
				echo "<td>" . $display. "</td>";
				echo "<td>" . $row['qDescrip']. "</td>";

				echo "<td><input type=\"radio\" class=\"onlyread\" name=\"".$serial."\" value=\"". $row['option1'] . "\">".$row['option1'] ."</td>";
				echo "<td><input type=\"radio\" class=\"onlyread\" name=\"".$serial."\" value=\"". $row['option2'] . "\">".$row['option2'] ."</td>";
				echo "<td><input type=\"radio\" class=\"onlyread\" name=\"".$serial."\" value=\"". $row['option3'] . "\">".$row['option3'] ."</td>";
				echo "<td><input type=\"radio\" class=\"onlyread\" name=\"".$serial."\" value=\"". $row['option4'] . "\">".$row['option4'] ."</td>";	
				echo "</tr>";
				array_push($answerArray,$row['correctAns']);
			    $serial++;	
			    
			}
			} 
			else
			{
   			 echo "<div class=\"card\">No question in this Category!</div>";
  			}
				
		}

		$_SESSION['answerCollection']=$answerArray;
		$_SESSION['serialValue']=$serial;
		         //echo $_SESSION['serialValue'];
?>
<tr><td></td><td>
<input type="text" id="kbox" style="display: none;">
<input type="submit" id="submit_answer" class="small radius success button" value="Submit Answer"></td><td></td><td></td><td></td><td></td></tr>
</tbody>
</table>
</form>

</div>
 
<!-- modal content -->

	<!-- end of modal-->

	<!-- start of scripts-->
  
<script src="../js/vendor/jquery.js"></script>
<script src="../js/vendor/fastclick.js"></script>
<script src="../js/foundation.min.js"></script>

<script type="text/javascript">
  $(document).foundation();
</script>

<script type="text/javascript">
	var wrap = $("#wrap");

	wrap.on("scroll", function(e) {

		if (this.scrollTop > 125) {
			wrap.addClass("fix-search");
		} else {
			wrap.removeClass("fix-search");
		}

	});
</script>

<script type="text/javascript">
  
   
  function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);
  	document.getElementById("kbox").value = t.total;
   	
   	document.getElementById('submit_answer').onclick = function() {
  		document.getElementById("questionform").action="examComplete.php";
      };


    daysSpan.innerHTML = t.days;
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
      document.getElementById("submit_answer").click();
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + "<?php echo $_SESSION['categoryTime'];?>" * 60 * 1000);
initializeClock('clockdiv', deadline);
</script>

</body>
</html>