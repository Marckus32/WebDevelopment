<?php 
	require "mysql_connection.php";

	$pizza = $_POST['pizza'];
	$size = $_POST['size'];
	$toppings = $_POST['toppings'];
	$quantity = $_POST['quantity'];
	$pricePizza =0;
	$priceTopping =0;

	$sqlPizza = "SELECT * FROM `tblitems` WHERE `item_name` = '$pizza' AND `item_type` LIKE '%Pizza%'";
	$resultPizza = mysqli_query($con,$sqlPizza);
	while($row= mysqli_fetch_array($resultPizza)){
		if($size == "small"){
			$pricePizza = $row['item_small'];
		}
		else if($size=="medium"){
			$pricePizza = $row['item_medium'];	
		}
		else if($size=="large"){
			$pricePizza = $row['item_large'];	
		}
		
	}

	$toppingArray = explodeToppings($toppings);

	for($i=0;$i<=count($toppingArray)-1;$i++){
		$currentTopping = $toppingArray[$i];
		$sqlToppings = "SELECT * FROM `tblitems` WHERE `item_name` = '$currentTopping' AND `item_type` ='Toppings'";
		$resultToppings = mysqli_query($con,$sqlToppings);
		while($row= mysqli_fetch_array($resultToppings)){
			if($size == "small"){
				$priceTopping = $priceTopping + $row['item_small'];
			}
			else if($size=="medium"){
				$priceTopping = $priceTopping + $row['item_medium'];	
			}
			else if($size=="large"){
				$priceTopping = $priceTopping + $row['item_large'];	
			}
		}
	}


	$total = $pricePizza + $priceTopping;
	$total = $total * $quantity;
	echo $total;

function explodeToppings($topping){
	$toppingArray = explode(",", $topping);
	return $toppingArray;
}



?>