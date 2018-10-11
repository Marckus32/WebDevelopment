<?php 
	require "mysql_connection.php";	
	$transactionID = $_POST['transactionID'];
	$totalPrice = 0;

	$sql = "SELECT * FROM `tblorder` WHERE `transactionID` = $transactionID";
	$result = mysqli_query($con,$sql);

	while($row=mysqli_fetch_array($result)){
		$totalPrice = $totalPrice + $row['price'];
	}
	echo $totalPrice;
?>