<?php 
	require "mysql_connection.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM `tblusers` WHERE `user_username` = '$username'";
	$result = mysqli_query($con,$sql);

	while($row = mysqli_fetch_array($result)){
		if($password==$row['user_password']){
			echo '<script language="javascript">';
			echo 'alert("Welcome '.$row['user_username'].'");';
			echo 'window.location="dashboard.php";';
			echo '</script>';
		}
	}
?>