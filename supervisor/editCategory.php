<?php 
  session_start();
  if(!$_SESSION['login']){
     header("location:../home.php");
     die;
  }
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Edit Category | Seva Test Center</title>
  <link rel="stylesheet" href="../css/foundation.css">
  <link rel="stylesheet" href="../css/app.css">
	<link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/round.css">
	<link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/fonts/foundation-icons.css" />
	<script src="../js/vendor/modernizr.js"></script>
  </head>

  <body>
    <nav class="menu">
    <h1 class="name">Seva Test Center</h1>
      <ul class="inline-list">
      <li class="active"><a href="supervisor.php">Home</a></li>
      <li><a href="../category.php">Exam Center</a></li>
      <li><a href="https://www.sevadevelopment.com" target="_blank">Seva Development</a></li>
    </ul>

      <ul class="inline-list hide-for-small-only account-action">
        <li><a href="#"><?php echo $_SESSION['userName'];?></a></li>
        <li class=""><a class="signup" href="../php/logout.php">Log out</a></li>
      </ul>
    <a class="account hide-for-medium-up" href="../php/logout.php" data-reveal-id="firstModal"><i class="fi-unlock"></i></a>
  </nav>


<div class="callout card">
<hr>
    <div class="small-12 columns">
      <a class="small radius button" href="supervisor.php" style="float:left;">Go Back</a>
      <h3>Edit Categories</h3>
    </div>
<hr>
<table border='2' width="100%">
  <thead>
  <tr>
    <th width="5%">Serial Number</th>
    <th width="45%">Category Name</th>
    <th width="20%">Exam Time</th>   
    <th width="20%">Displayed Questions</th>
    <th width="5%">Action</th>
  </tr>
  </thead>
  <tbody>
  
<?php

  include "../php/connection.php";
  
  $checkData = "SELECT * FROM category ORDER BY catName ASC";
  $result = $conn->query($checkData);
  $cnt=0;
  
  if ($result->num_rows > 0) {
        // output data of each row
  while($row = $result->fetch_assoc()) {
   echo "<form method=\"post\" action=\"../php/updateCategory.php?e=".$row['catId']."\">"; 
    echo "<tr>";
    echo "<td>" . ++$cnt . "</td>";
    echo "<td><input type=\"text\" name=\"cName\" value='" . $row['catName'] . "'></td>";
    echo "<td><input type=\"text\" name=\"cTime\" value='" . $row['catTime'] . "'></td>";
    echo "<td><input type=\"text\" name=\"cQues\" value='" . $row['catQuestions'] . "'></td>";
    echo "<td><input type=\"submit\" value=\"Update\" class=\"small alert radius button\"></td>";
  echo "</tr>";
  echo "</form>";
  }
  }
  else{
    echo "<div class=\"card\">No Category Available !</div>";
  }
  
?>

</tbody>
</table>
</div>
 
<!-- modal content -->

	<!-- end of modal-->

	<!-- start of scripts-->
  
<script src="../js/vendor/jquery.js"></script>
<script src="../js/vendor/fastclick.js"></script>
<script src="../js/foundation.min.js"></script>
<script type="text/javascript" src="../js/round.js"></script>
<script type="text/javascript">
  $(document).foundation();
</script>
 <script>
    // Wait for window load
    $(window).load(function() {
      // Animate loader off screen
      $("#loader").animate({
        top: -200
      }, 1500);
    });
  </script> 

  </body>
</html>