<?php 
	require 'mysql_connection.php';
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
	    <a href="order-page.php">Order</a>
	</div>

	<div class="container" style="margin-top: 2%;">
		<h2 style="text-align:center;">Classic Pizza:</h2>
		<div class="row">
			<?php 
				$sql = "SELECT * FROM `tblitems` WHERE `item_type` LIKE '%Classic%'";
				$result = mysqli_query($con,$sql);

				while($row=mysqli_fetch_array($result)){
					echo '<div class="col-md-4" style="margin-top:10px;">
							<div class="card" >				  
							  <div class="card-body">
							    <h5 class="card-title">'.$row['item_name'].'</h5>				    
							    <a href="order-page.php" class="btn btn-primary">Order Now</a>
							  </div>
							</div>
						</div>';
				}
			?>

						
		</div>

	</div>
	<!-- <button id="btnOrder">Order Now!</button> -->
	<script type="text/javascript">
		$(document).ready(function(){
			$("#btnOrder").click(function(){
				window.location = "order-page.php";
			});
		});
	</script>
	
</body>

</html>