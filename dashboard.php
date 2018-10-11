<?php 
	require "mysql_connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Order | Pizza Ordering</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.js"></script>
	<style type="text/css">
		th,td{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="topnav1">
	    <a href="index.php">Logout</a>	    
	</div>

	<div class="container" style="margin:5%;">
		<h2>Orders</h2>
		<table class="table" border="1">
			<th>Transaction ID</th>
			<th>Name</th>
			<th>Mobile</th>
			<th>Option</th>
			<?php 
				$sql = "SELECT * FROM `tblcheckout` WHERE 1 ORDER BY `orderID` DESC;";
				$result = mysqli_query($con,$sql);

				while($row=mysqli_fetch_array($result)){
					echo '<tr>';
					echo '<td>'.$row['transactionID'].'</td>';
					echo '<td>'.$row['name'].'</td>';
					echo '<td>'.$row['mobilenumber'].'</td>';
					echo '<td>
								<button class="btn btn-primary btnView" value="'.$row['transactionID'].'">View</button>
								<button class="btn btn-danger btnDelete" value="'.$row['transactionID'].'">Delete</button>
							</td>';
					echo '</tr>';
				}
			?>
		</table>

		<div id="modal" class="modal" tabindex="-1" role="dialog" >
		  <div class="modal-dialog" role="document" style="max-width: 900px;">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Order Information</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body" id="orderDetails">
		        
		        
		      </div>
		      <div class="modal-footer">
		        <!-- <button type="button" class="btn btn-primary"></button> -->
		        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>

		<div id="deleteModal" class="modal" tabindex="-1" role="dialog" >
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title">Delete Order?</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>		      
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary" id="btnConfirm">Yes</button>
		        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
		      </div>
		    </div>
		  </div>
		</div>

	</div>

	<script type="text/javascript">
		$(document).ready(function(){
			// $("#modal").modal();
			$(".btnView").click(function(){
				var transactionID = $(this).val();
				$.post("fetch-order2.php",{transactionID:transactionID},function(data,status){
					$("#orderDetails").empty();
					$("#orderDetails").append(data);
				});
				$("#modal").modal();
			});

			$(".btnDelete").click(function(){
				var transactionID = $(this).val();
				$("#deleteModal").modal();
				$("#btnConfirm").click(function(){
					$.post("delete-order.php",{transactionID:transactionID},function(data,status){
						if(data=="Done"){
							window.location= "dashboard.php";
						}
					});
				});
			});
		});
	</script>
	
</body>

</html>