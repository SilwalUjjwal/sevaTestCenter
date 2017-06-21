<?php session_start();
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
	<title>Supervisor | Seva Test Center</title>
  <link rel="stylesheet" href="../css/foundation.css">
  <link rel="stylesheet" href="../css/app.css">
	<link rel="stylesheet" href="../css/header.css">
  <link rel="stylesheet" href="../css/round.css">
	<link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/fonts/foundation-icons.css" />
	<script src="../js/vendor/modernizr.js"></script>
  </head>
  <body onload="roundClick()">
    <nav  class="menu">
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
<hr>
  <nav id="roundnav" class="ss-icon closed small-6 columns small-centered" tabindex="0">
    <span id="center-bar"></span>
    <a href="viewStudents.php"><span data-tooltip aria-haspopup="true" title="View Users Details" class="has-tip"><i class="fi-results-demographics"></i></span></a><a href="viewResult.php"><span data-tooltip aria-haspopup="true" title="User Test Results" class="has-tip"><i class="fi-trophy"></i></span></a>   
    <a href="addCategory.php"><span data-tooltip aria-haspopup="true" title="Add New Category!" class="has-tip"><i class="fi-burst-new"></i></span></a>
    <a href="editCategory.php"><span data-tooltip aria-haspopup="true" title="Edit Category!" class="has-tip"><i class="fi-wrench"></i></span></a>
    <a href="#" data-reveal-id="firstModal"><span data-tooltip aria-haspopup="true" title="Add New Questions!" class="has-tip"><i class="fi-plus"></i></span></a>
    <a href="#" data-reveal-id="firstModal"><span data-tooltip aria-haspopup="true" title="Edit Questions!" class="has-tip"><i class="fi-page-edit"></i></span></a>
    <a href="reviewRegistration.php"><span data-tooltip aria-haspopup="true" title="Review Users Registration" class="has-tip"><i class="fi-check"></i></span></a>
  
  </nav>

<hr>
<!-- modal content -->
<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
  <h3 id="firstModalTitle">Choose category to add question</h3>
    <div class="small-12 columns">
    
      <form id="categoryAdder" action="../php/questionCategorySet.php" method="post">
      <select name="categorySelection" style="margin:5px;">
    <?php
  
       include "../php/connection.php";
        $checkData = "SELECT * FROM category";
        
        $result = $conn->query($checkData);
        
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
    ?>
        <option value="<?php echo $row['catName'];?>"><?php echo $row['catName'];?></option>
        
        <?php 
        }
      }  
          $conn->close();
              ?>
        
        <input type="submit" value="Let's Go" class="small radius success button">
      </form>


    </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
	<!-- end of modal-->

	<!-- start of scripts-->
  
<script src="../js/vendor/jquery.js"></script>
<script src="../js/vendor/fastclick.js"></script>
<script src="../js/foundation.min.js"></script>
<script type="text/javascript" src="../js/round.js"></script>
<script type="text/javascript">
  $(document).foundation();

    function roundClick()
    {
        document.getElementById("roundnav").click(); // Simulates roundnav click
       
    }
</script>

  </body>
</html>