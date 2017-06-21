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
	<title>Seva Test Center</title>
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


  <div class="callout">
      <div class="card">
        <div class="small-12 columns">
          <a class="small radius button" href="supervisor.php" style="float:left;">Go Back</a>
          <h4> Add New Exam Category </h4>
          <p>Choose a unique category name!</p>
        </div>

        <p>
        <?php
          $stat=@$_GET["nwcat"];
          if ($stat=='dub')
          {
            echo "<b>Duplicate category name ! Choose a different category name.</b>";
          }
          else if ($stat=='org')
          {
            echo "<b>New test category added successfully !</b>";
          }
        
        ?>
        </p>
          <form id="categoryAdder" method="post">
            <b>Category Name:</b>
          <input type="text" placeholder="Category Name" required="true" name="categoryName" style="text-transform: capitalize;">&nbsp &nbsp
          <b>Total Questions on test:</b>
          <input type="number" min="5" placeholder="Displayed Questions"  required="true" name="categoryQuestion" size ="20"> &nbsp &nbsp
          
          <b>Time:<br>
          Hours</b><select name="questionHour" id="timerHour" style="display:inline-block;">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                 </select><b>Minutes</b><select name="questionMinute" id="timerMinute" style="display:inline-block;">
              <?php
                for ($i=0;$i<60;$i++){ 
              ?>
              <option value="<?php echo $i;?>"><?php echo $i;?></option>
              <?php
                   }
              ?>
                </select> 
                <br><br>
          <input type="submit" value="Add Category" class="small radius button" onclick="timeValidator()" ></b>
        </form>
        
      </div>
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
    
  function timeValidator()
    {
      var timeHour=document.getElementById('timerHour').value;
      var timeMinute= document.getElementById('timerMinute').value;
      timeHour= timeHour*60;
      timeMinute=timeMinute+timeHour;
      if(timeMinute<1)
      {
        window.alert("Time should be more than a minute");
      }
      
      else 
      { 
        document.getElementById("categoryAdder").action= "../php/categoryForm.php"
      }
    }
    </script>   

  </body>
</html>