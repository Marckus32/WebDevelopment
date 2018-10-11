<?php 
	require "mysql_connection.php";	
	$transactionID = $_POST['transactionID'];
	

	$sql = "SELECT * FROM `tblorder` WHERE `transactionID` = $transactionID";
	$result = mysqli_query($con,$sql);

	while($row=mysqli_fetch_array($result)){
		if($row['toppings']==""){
			$stringTopping = '<h6></h6>	';
		}
		else{
			$stringTopping = '<h6>('.$row['toppings'].')</h6>	';
		}
		echo '<div class="row">
						<div class="col-md-8">
							<h6>'.$row['quantity'].' '.$row['itemsize'].'</h6>
							<h6> '.$row['itemname'].'  </h6>
							'.$stringTopping.'
						</div>
						<div class="col-md-4">
							<h6>PHP '.$row['price'].'</h6>
						</div>
						
					</div> <br> <hr>';
	}
?>