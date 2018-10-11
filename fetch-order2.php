<?php 
	require "mysql_connection.php";

	$transactionID = $_POST['transactionID'];
	$stringPizza="";
	$totalPrice = 0;
	$sql = "SELECT * FROM `tblorder` WHERE `transactionID`=$transactionID";
	$result = mysqli_query($con,$sql);

	echo '<div class="row">';
	echo '<div class="col-md-12">';
	while($row=mysqli_fetch_array($result)){
		$totalPrice = $totalPrice + $row['price'];
		if($row['toppings']!==""){
			$stringPizza = '('.$row['toppings'].')';
		}
		echo '<h4>'.$row['quantity'].' '.$row['itemsize'].' '.$row['itemname'].' '.$stringPizza.'</h4>';
	}
	echo '</div>';
	echo '</div>';

	echo '<br>
		        <div class="row">
		        	<div class="col-md-12">
		        		<h4>Total:PHP '.$totalPrice.'</h4>
		        	</div>
		        </div>';


?>