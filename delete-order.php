<?php 
	require "mysql_connection.php";

	$transactionID = $_POST['transactionID'];
	$stringPizza="";
	$totalPrice = 0;


	$sql = "DELETE FROM `tblcheckout` WHERE `transactionID` = $transactionID";
	$result = mysqli_query($con,$sql);

	if($result){
		echo "Done";
	}


?>