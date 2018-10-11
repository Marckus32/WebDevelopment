<?php 
	require "mysql_connection.php";

	$pizza = $_POST['pizza'];
	$size = ucfirst($_POST['size']);
	$toppings = $_POST['toppings'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$transactionID = $_POST['transactionID'];
	

	$sql = "INSERT INTO `tblorder`(`transactionID`, `itemname`, `itemsize`, `toppings`, `quantity`, `price`) VALUES ($transactionID,'$pizza','$size','$toppings',$quantity,$price)";
	$result = mysqli_query($con,$sql);

	if($result){
		echo "Done";
	}
	else{
		echo mysqli_error($con);
		// echo $sql;
	}
?>