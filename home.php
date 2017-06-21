<?php session_start();
  if(isset($_SESSION['login'])){
     header("location: supervisor/supervisor.php");
     die;
  }
 ?>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Home | Seva Test Center</title>
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
  			<li class="active"><a href="home.php">Home</a></li>
  			<li><a href="category.php">Exam Center</a></li>
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
        <li class=""><a class="signup" href="php/logout.php" >Log out</a></li>
      <?php
        }
      ?>
	    </ul>
		<a class="account hide-for-medium-up" href="#" data-reveal-id="firstModal"><i class="fi-unlock"></i></a>
	 </nav>
      <?php 
      $log=@$_GET["log"];
      if ($log=='fail')
            {
      ?>
      <div class="row">
        <div class="small-centered small-10 columns">
          <h4><p>Login failed! Please enter valid supervisor Username and Password and try again!</p></h4>
        </div>
      </div>

      <?php
          }
      else if ($log=='unreg') 
      {
      ?>
        <div class="row">
          <div class="small-centered small-10 columns">
            <h4><p>The student is not registered ! Please register first and try to sign in again!</p></h4>
          </div>
        </div>
      <?php
      }
      else if ($log=='alreg') 
      {
      ?>
      <div class="row">
          <div class="small-centered small-10 columns">
            <h4><p>Email already registered! Register with new email address.</p></h4>
          </div>
        </div>
      <?php
      }
      else if ($log=='success') 
      {
      ?>
      <div class="row">
          <div class="small-centered small-10 columns">
            <h4><p>New Registration successful. Please wait for your supervisor to verify your email before appearing for exam.</p></h4>
          </div>
        </div 
      <?php
      }
      ?>



<div  class="row">
  <div class="small-6 small-centered columns">
    <div class="service">
      <div class="service-icon-box">
        <img src="img/seva.png" alt="" class="service-icon">
      </div>
      <h4 class="service-heading"><a href="http://www.sevadevelopment.com">Seva Development</a></h4>
      <p class="service-description">Seva Development’s mission is to provide high quality high paying jobs to Nepali graduates and economic development for their villages by providing economical, best-in-class software testing services to companies the United States.</p>

    </div>
  </div>
</div>

<!-- modal content -->

<div id="firstModal" class="reveal-modal" data-reveal aria-labelledby="firstModalTitle" aria-hidden="true" role="dialog">
  <h2 id="firstModalTitle">Identify Yourself</h2>
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
              <input type="text" name="studentEmail" placeholder="Student Email Address" required="true">
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