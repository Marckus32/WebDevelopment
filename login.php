<?php 
	require "mysql_connection.php";


?>

<!DOCTYPE html>
<html>
<head>
	<title>Order | Pizza Ordering</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.js"></script>
</head>
<body>
	<div class="topnav1">
	    <a href="login.php">Login</a>
	    <a href="index.php">Home</a>
	</div>

	<div class="container" style="margin-top: 10%;">
		<form action="verify.php" method="post">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Username</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
		    
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
		  </div>		  
		  <button type="submit" class="btn btn-primary">Login</button>
		</form>

	</div>

	
	
</body>

</html>