<div class="modal fade" id="shopcart" role="dialog">
	<div class="modal-dialog"> 

	<!-- Modal content -->
	<div class="modal-content">
		<!-- Modal Header -->
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Shopping cart</h4>
		</div>

		<!-- Modal Body -->
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-1">
					</div>
					<div class="col-sm-3">
						Item
					</div>
					<div class="col-sm-4">
						Item-name
					</div>
					<div class="col-sm-2">
						Quantity
					</div>
					<div class="col-sm-2">
						Notes
					</div>
				</div>
				<?php
					if(isset($_SESSION['cart'])){

						if($_SESSION['cart']!="filled"){


							echo "<p> Your shopping cart is empty</p>";
						}else{
							$index=0;
							foreach($_SESSION['cart_id'] as $productID){
								$sql_getName="SELECT title, image FROM products WHERE id=$productID";
								$result=mysqli_query($conn, $sql_getName);
								$name=mysqli_fetch_assoc($result);
								echo "<div class='row'>
											<div class='col-sm-1' style='padding-top:25px;'><button class='btn btn-danger' id='btn-".$index."' style='vertical-align: middle;' onclick='deleteArray($index)'><i class='fa fa-times' style='font-size:18px; font-color:white;'></i></div>
											<div class='col-sm-3'><img src='".$name['image']."' style='margin:auto; height:auto; width:135px;'/></div>
											<div class='col-sm-4' style='padding-top:30px;'>".$name['title']."</div>
											<div class='col-sm-2' style='padding-top:30px;'>".$_SESSION['cart_quantity'][$index]."</div>
											<div class='col-sm-2' style='padding-top:30px;'>".$_SESSION['cart_color'][$index]."</div>
										</div>";
								$index++;

							}		
							echo "</div>";	
							
						}
					}
				?>
			</div>
			<!-- Modal Footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-deafault" data-dismiss="modal">Back to shopping</button>
				<a class="btn btn-success" href="payment-page.php" style="font-size:18px;"><span class="fa fa-shopping-cart"></span> Proceed to Payment </a>
			</div>

		</div>
	</div>
</div>

