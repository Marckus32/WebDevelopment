<?php 
	require "mysql_connection.php";

	$transactionID = $_POST['transactionID'];
	$name = $_POST['name'];
	$number = $_POST['mobile'];

	$sql = "INSERT INTO `tblcheckout`( `transactionID`, `name`, `mobilenumber`) VALUES ($transactionID,'$name',$number)";
	$result = mysqli_query($con,$sql);

	if($result){
		echo '<script language="javascript">';
		echo 'alert("PIZZA ORDER SUCCESSFULLY");';
		echo 'window.location="index.php";';
		echo '</script>';
	}

?>