<?php 
	require "mysql_connection.php";
	$randNumber = rand(1,10000000);
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

	<div class="container" style="margin-top: 10px;">
		<h2 style="text-align: center;">Customize your Pizza</h2>
		<div class="row">
			<div class="col-md-3 card" style="border:1px solid gray;">
				<div class="container">
					<h2>Classic Pizza:</h2>
					<?php 
						$sql = "SELECT * FROM `tblitems` WHERE `item_type` = 'Classic Pizza'";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)){
							echo '<input type="radio" name="pizza" value="'.$row['item_name'].'">'.$row['item_name'].'<br>';
						}
					 ?>
				</div>				
				<div class="container">
					<h2>Specialty Pizza:</h2>
					<?php 
						$sql = "SELECT * FROM `tblitems` WHERE `item_type` = 'Specialty Pizza'";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)){
							echo '<input type="radio" name="pizza" value="'.$row['item_name'].'">'.$row['item_name'].'<br>';
						}
					 ?>
				</div>
			</div> <!-- COL--> 
			<div class="col-md-3">
				<div class="container" style="border:1px solid gray; border-radius:5px;">
					<h2>Size:</h2>
					<input type="radio" name="size" value="small" checked="" > Small - 10" <br>
					<input type="radio" name="size" value="medium" > Medium - 14"<br>
					<input type="radio" name="size" value="large" > Large - 18"<br>
				</div> <br>
				<div class="container" style="border:1px solid gray;  border-radius:5px;">
					<h2>Toppings:</h2>
					<?php 
						$sql = "SELECT * FROM `tblitems` WHERE `item_type` = 'Toppings'";
						$result = mysqli_query($con,$sql);
						while($row = mysqli_fetch_array($result)){
							echo '<input type="checkbox" name="toppings" class="toppings" value="'.$row['item_name'].'">'.$row['item_name'].'<br>';
						}
					 ?>
				</div>
			</div> <!--COL-->
			<div class="col-md-3">
				<div class="container" style="border:1px solid gray;  border-radius:5px;">
					<h2>Quantity:</h2>
					<input type="text" name="quantity" placeholder="No. of Pizza" value="1" id="quantity" ><br><br>
					<input type="text" name="quantity" placeholder="No. of Pizza" value="<?php echo $randNumber; ?>" id="transactionID" style="display:none;" >
					<label>Price: PHP <b id="price">0.00</b> </label>
					<br><br>
					<button id="btnAddOrder" class="btn btn-primary" disabled="" style="margin-bottom: 10px;">Add Order</button>
					
				</div>	<br>
				<div class="container" style="border:1px solid gray; border-radius:5px;">
					<h2>Total Price:</h2>
					<input type="text" name="totalPrice" id="totalPrice" disabled=""><br><br>					
					<button id="btnCheckout" class="btn btn-success" style="margin-bottom: 10px;" disabled>Checkout</button>					
				</div>			
			</div>
			<div id="modal" class="modal" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Customer Information</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<form action="place-order.php" method="post">
			      		<div class="form-group">
			      			<input class="form-control" placeholder="Customer Name" type="text" name="name">
			      		</div>
			      		<div class="form-group">
			      			<input class="form-control" id="contact" placeholder="Mobile Number" onkeyup="contactNumber(this.value);" type="text" name="mobile">
			      		</div>
				        <input type="text" name="transactionID" value="<?php echo $randNumber; ?>" id="transactionID2" style="display:none;" >	
					    <input type="submit" class="btn btn-primary" value="Checkout"></button>
				    </form>		      	
			        			        
			      </div>
			    </div>
			  </div>
			</div>
			<div class="col-md-3">
				<div class="container" style="border:1px solid gray;  border-radius:5px;" id="orderList">
					<h2>Orders</h2>
					<div class="row">
						
						
					</div>

					<hr>
				</div>
			</div>

		</div>
		
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$("input[name=pizza]").click(function(){
				getAllData();	
				$("#btnAddOrder").prop("disabled",false);			
			});
			$("input[name=size]").click(function(){
				getAllData();				
			});
			$("input[name=toppings]").click(function(){
				getAllData();				
			});
			$("#quantity").keyup(function(){
				getAllData();
			});

			$("#btnAddOrder").click(function(){
				addOrder();
			});
			$("#btnCheckout").click(function(){
				$("#modal").modal();
			});

			function getAllData(){
				var pizza = $("input[name=pizza]:checked").val();
				var size = $("input[name=size]:checked").val();
				var quantity = $("#quantity").val();
				var chkArray = [];							
				$(".toppings:checked").each(function() {
					chkArray.push($(this).val());
				});
				var toppings;
				toppings = chkArray.join(',') ;				

				if(pizza==null){
					pizza = "";
				}
				if(size==null){
					size = "";
				}
				if(toppings==null){
					toppings = "";
				}
				if(quantity==null){
					quantity =0;
				}

							
				$.post("price.php",{pizza:pizza,size:size,toppings:toppings,quantity:quantity},function(data,status){
					$("#price").text(data);

				});
				
			}

			function addOrder(){
				var pizza = $("input[name=pizza]:checked").val();
				var size = $("input[name=size]:checked").val();
				var quantity = $("#quantity").val();
				var price = $("#price").text();
				var transactionID=$("#transactionID").val();
				var chkArray = [];							
				$(".toppings:checked").each(function() {
					chkArray.push($(this).val());
				});
				var toppings;
				toppings = chkArray.join(',') ;				

				if(pizza==null){
					pizza = "";
				}
				if(size==null){
					size = "";
				}
				if(toppings==null){
					toppings = "";
				}
				if(quantity==null){
					quantity =0;
				}							
				$.post("addorder.php",{pizza:pizza,size:size,toppings:toppings,quantity:quantity,price:price,transactionID:transactionID},function(data,status){
					
					if(data=="Done"){
						$.post("fetch-order.php",{transactionID:transactionID},function(data,status){
							$("#orderList").empty();
							$("#orderList").append("<h2>Orders</h2>");
							$("#orderList").append(data);
							$("#btnCheckout").prop("disabled",false);
						});
						$.post("total-price.php",{transactionID:transactionID},function(data,status){							
							$("#totalPrice").val(data);
						});
					}
				});
				
			}

			
			
		});

		function contactNumber(value){ 
				var code= value;
				var regex = /[^0-9]/gi   
				var result = code.replace(regex,'');				
				var numberLength = code.length;
				document.getElementById('contact').value =result;

				var number = value;
				if(number.length>11){
					number=number.substr(0,11);
					document.getElementById('contact').value =number;
				}
			}
	</script>


</body>
</html>