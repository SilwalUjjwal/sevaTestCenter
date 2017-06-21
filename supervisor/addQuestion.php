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
	<title>Questions | Seva Test Center</title>
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
          <button onclick="QCreate()" class="small radius success button" style="float:right;">Add New Question</button>
          <h3><b><?php echo  $_SESSION['questionCategory'];?></b> Questions </h3>

          <p></p>
        </div>
 
        <table border='2'  width="100%" id="tableQuestion">
          <thead>
          <tr>
            <th width="1%">Ques. No.</th>
            <th width="20%">Description</th>
            <th width="15%">Option 1</th>
            <th width="15%">Option 2</th>   
            <th width="15%">Option 3</th>
            <th width="15%">Option 4</th>
            <th width="15%">Correct Answer</th>
            <th width="5%">Action</th>
          </tr>
          </thead>
          <tbody>
        <?php

          include "../php/connection.php";  
          $cat= $_SESSION['questionCategory'];
          $checkData = "SELECT * FROM $cat ORDER BY qId DESC";
          $result = $conn->query($checkData);
          $cnt=0;

          if ($result->num_rows > 0) {
                // output data of each row
          while($row = $result->fetch_assoc()) {
          echo "<form method=\"post\" action=\"../php/updateQuestion.php?e=".$row['qId']."\">"; 
          echo "<tr>";
            echo "<td>" . ++$cnt . "</td>";
            echo "<td><textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"qDes\" >".$row['qDescrip']."</textarea></td>";
            echo "<td><textarea rows=\"3\" wrap=\"soft\" coltype=\"text\" name=\"o1\" >" . $row['option1'] . "</textarea></td>";
            echo "<td><textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"o2\" >" . $row['option2'] . "</textarea></td>";
            echo "<td><textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"o3\" >" . $row['option3'] . "</textarea></td>";
            echo "<td><textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"o4\" >" . $row['option4'] . "</textarea></td>";
            echo "<td><textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"correctAns\" >" . $row['correctAns'] . "</textarea></td>";
            echo "<td><input type=\"submit\" value=\"Update\" class=\"small success radius button\"><input type=\"submit\" value=\"Delete\" class=\"small alert radius button\"></td>";
          echo "</tr>";
          echo "</form>";
          }
          }
          else{
            echo "<div class=\"card\">No Questions in this category!</div>";
          }
          
        ?>
        </tbody>
        </table>
        
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
function QCreate() {
    var table = document.getElementById("tableQuestion");
    var row = table.insertRow(1);

    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);

   
    cell2.innerHTML = "<textarea autofocus rows=\"3\" wrap=\"soft\" type=\"text\" name=\"qDes\" required></textarea>";
    cell3.innerHTML = "<textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"o1\" required></textarea>";
    cell4.innerHTML = "<textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"o2\" required></textarea>";
    cell5.innerHTML = "<textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"o3\" required></textarea>";
    cell6.innerHTML = "<textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"o4\" required></textarea>";
    cell7.innerHTML = "<textarea rows=\"3\" wrap=\"soft\" type=\"text\" name=\"correctAns\" required></textarea>";
    cell8.innerHTML = "<input type=\"submit\" value=\"Add\" class=\"small  radius button\"><button onclick=\"QDelete()\" class=\"small radius alert button\" style=\"float:right;\">Delete</button>";
}

function QDelete() {
    document.getElementById("myTable").deleteRow(1);
}
</script>

  </body>
</html>