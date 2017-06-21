<?php 
  session_start();
  include 'php/connection.php';
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Exam Category | Seva Test Center</title>
    <link rel="stylesheet" href="css/foundation.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/fonts/foundation-icons.css" />
	<script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <nav class="menu">
		<h1 class="name">Seva Test Center</h1>
  		<ul class="inline-list">
			<li><a href="<?php
        if(!isset($_SESSION['sup']))
        { echo 'home.php';
        }
        else
        {
          echo 'supervisor/supervisor.php';
        }
        ?>">Home</a></li>
			<li class="active"><a href="#">Exam Center</a></li>
			<li><a href="https://www.sevadevelopment.com" target="_blank">Seva Development</a></li>
		</ul>

	    <ul class="inline-list hide-for-small-only account-action">
			
			<?php
        if(!isset($_SESSION['userName']))
        {
      ?>  
        <li><a href="#" data-reveal-id="firstModal">Login</a></li>
        <li class=""><a class="signup" href="#" data-reveal-id="stdModal">Sign Up</a></li>
      <?php
        }
        else
        {
      ?>
        <li><a href="#"><?php echo $_SESSION['userName'];?></a></li>
        <li class=""><a class="signup" href="php/logout.php">Log out</a></li>
      <?php
        }
      ?>

	    </ul>
		<a class="account hide-for-medium-up" href="#" data-reveal-id="firstModal"><i class="fi-unlock"></i></a>
	</nav>

<hr>
<div class="row">
  <div class="small-10 columns">
    <span data-tooltip aria-haspopup="true" class="has-tip" title="Click on one of the exam Category, go for it! All the best!">Choose Category</span>
  </div>
  <?php
        $checkData = "SELECT * FROM category ORDER BY catName ASC";
        $result = $conn->query($checkData);
        if ($result->num_rows > 0)
        {
          while($row = $result->fetch_assoc()) 
          {
 ?>
            <div class="small-3 columns">
              <div class="service card">
                <div class="service-icon-box">
                  <img src="img/seva.png" alt="" class="service-icon">
                </div>
                <h4 class="service-heading"><a href="#"><?php echo $row['catName'];?></a></h4>
                <p class="service-description"><b><?php echo $row['catQuestions'] ." Questions <br>". $row['catTime']." Minutes";?></b><br>
                 
                  <?php
                   if(!isset($_SESSION['userName']))
                   {
                    
                   echo "<a href=\"#\" class=\"small radius button\" data-reveal-id=\"logAlert\">Try Now</a>";
                  }
                  else{
                     echo "<a href=\"php/sessionSet.php?id=".$row['catId']."\" class=\"small radius button\">Start</a>";
                  
                    } ?>


                </p>
              </div>
            </div>
<?php
        }
      }  
?>

</div>
<hr>
<!-- modal content -->

<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
  <h2 id="firstModalTitle">Identify Yourself</h2>
    <div class="button-group" data-grouptype="OR">
      <button href="#" data-reveal-id="supModal" class="small radius button primary ">SUPERVISOR</button>
      <button href="#" data-reveal-id="stdModal" class="small radius button success ">STUDENT</button>
    </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>


<div id="logAlert" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
  <h3 id="firstModalTitle">Opps..Some issue detected.</h3>
  <h4>You need to be logged in to appear for exam.</h4>
    <div class="button-group" data-grouptype="OR">
      <button href="#" data-reveal-id="supModal" class="small radius button primary ">SUPERVISOR</button>
      <button href="#" data-reveal-id="stdModal" class="small radius button success ">STUDENT</button>
    </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<!-- first student modal content -->

<div id="stdModal" class="reveal-modal" data-reveal aria-labelledby="login or sign up" aria-hidden="true" role="dialog">
  <div class="row">
    <div class="large-6 columns auth-plain">
      <div class="signup-panel left-solid">
        <p class="welcome">Registered Student</p>
        <form action="php/studentLogin.php" method="post">
          <div class="row collapse">
            <div class="small-2 columns">
              <span class="prefix"><i class="fi-torso-female"></i></span>
            </div>
            <div class="small-10  columns">
              <input type="text" name="studnetEmail" placeholder="Student Email Address" required="true">
            </div>
          </div>
          
          <div class="row collapse">
            <div class="small-10 columns ">
              <input type="submit" value="Login" class="small radius button">
            </div>
          </div>
        </form>
       </div>
    </div>

    <div class="large-6 columns auth-plain">
      <div class="signup-panel newusers">
        <p class="welcome"> New Student?</p>
        <p>By creating an account with STC, you will be able to appear for exam, view and track your results, and more.</p><br>
        <a href="#" data-reveal-id="signupModal" class="small radius button ">Sign Up</a></br>
      </div>
    </div>
  </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>


<!-- supervisor modal content -->
<div id="supModal" class="reveal-modal small-6 columns" data-reveal aria-labelledby="secondModalTitle" aria-hidden="true" role="dialog">
  <div class="large-6 columns auth-plain">
      <div class="signup-panel left-solid">
        <p class="welcome">Registered Supervisor</p>
        <form id="login_form" action="php/loginForm.php" method="post">
          <div class="row collapse">
            <div class="small-2  columns">
              <span class="prefix"><i class="fi-torso-female"></i></span>
            </div>
            <div class="small-10  columns">
              <input type="text" name="userName" placeholder="Username" required="true">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2 columns ">
              <span class="prefix"><i class="fi-lock"></i></span>
            </div>
            <div class="small-10 columns ">
              <input type="password" name="password" placeholder="Password" required="true">
            </div>
          </div>
      <div class="row collapse">
            
            <div class="small-10 columns ">
              <input name="submit" type="submit" value="Login" class="small radius button">
            </div>
          </div>
        </form>
       </div>
    </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<!-- signup modal content -->
<div id="signupModal" class="reveal-modal small-6 columns" data-reveal aria-labelledby="secondModalTitle" aria-hidden="true" role="dialog">
  <div class="large-6 columns auth-plain">
      <div class="signup-panel left-solid">
        <p class="welcome">New Registration</p>
        <form method="post" action="php/userRegistration.php">
          <div class="row collapse">
            <div class="small-2  columns">
              <span class="prefix"><i class="fi-torso-female"></i></span>
            </div>
            <div class="small-10  columns">
              <input type="text" name="fullName" placeholder="Full Name" required="true">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2  columns">
              <span class="prefix"><i class="fi-mail"></i></span>
            </div>
            <div class="small-10  columns">
               <input type="email" name="email" placeholder="Email Address" required="true">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2  columns">
              <span class="prefix"><i class="fi-torso-business"></i></span>
            </div>
            <div class="small-10  columns">
               <input type="text" name="position" placeholder="Applied position" required="true">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2  columns">
              <span class="prefix"><i class="fi-book"></i></span>
            </div>
            <div class="small-10  columns">
               <input type="text" name="education" placeholder="Education" required="true">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-2 columns">
              <span class="prefix"><i class="fi-trophy"></i></span>
            </div>
            <div class="small-10 columns">
              <input type="text" name="experience" placeholder="Experience in years" required="true">
            </div>
          </div>
          <div class="row collapse">
            <div class="small-10 columns ">
              <input type="submit" value="Register" class="small radius button">
            </div>
          </div>
        </form>
       </div>
    </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

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