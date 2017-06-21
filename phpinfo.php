<html>
<head>
	<link rel="stylesheet" href="aa.css">
	<link rel="stylesheet" href="css/clock.css">
  	
</head>
<body>
<?php
	include 'php/connection.php';
	$sql1= "SELECT * FROM category";
	$result = $conn->query($sql1);
	
	if ($result->num_rows > 0) {
                // output data of each row
          while($row = $result->fetch_assoc()) {
          	$catt=$row['catName'];
          	$cci=$row['catId'];
    

	$sql=  "RENAME TABLE `" . $cci . "` TO `" . $catt . "`" ;
	$conn->query($sql);

	}
	}


?>  
<script src="js/vendor/jquery.js"></script>

<script type="text/javascript">
	var wrap = $("#wrap");

wrap.on("scroll", function(e) {
    
  if (this.scrollTop > 147) {
    wrap.addClass("fix-search");
  } else {
    wrap.removeClass("fix-search");
  }
  
});
</script>

</body>
</html>