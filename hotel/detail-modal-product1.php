<div class="modal fade details-1" id="details-1" tableindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title text-center">Generic Keyboard</h4>
			</div>
			<div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6">
							<div class="center-block">
								<img src="./images/product1.png" alt="product1" class="details img-responsive">
							</div>
						</div>
						<div class="col-sm-6">
							<h4>Details</h4>
							<p>These Keyboard Details</p>
							<hr />
							<p>Price : Rp 150.000,00</p>
							<p>Brand : Idontknow </p>
							<form action="add_cart.php" method="post">
								<div class="form-group">
									<div class="col-xs-3">
										<label for="quantity" id="quantity-label">Quantity</label>
										<input type="number" class="form-control" id="quantity" name="quantity">
									</div><br><br>
									<div class="form-group">
										<label for="LED Color">Color</label>
										<select name="ledColor" id="ledColor" class="form-control">
											<option value="Red">Red</option>
											<option value="Green">Green</option>
											<option value="Blue">Blue</option>
										</select>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-default" data-dismiss="modal">Close</button>
					<button class="btn btn-warning" type="submit"> <span class='glyphicon glyphicon-shopping-cart'> Add To Cart</span></button>
				</div>
			</div>
		</div>
	</div>
</div>
