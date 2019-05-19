<?php while($product = mysqli_fetch_assoc($result2)) : ?>
		<div class="modal fade details-1" id="details-<?=$product['id']; ?>" tableindex="-1" role="dialog" >
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title text-center"><?=$product['title']; ?></h4>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="row">
								<div class="col-sm-6">
									<div class="center-block">
										<img src="<?=$product['image']; ?>" alt="<?=$product['title']; ?>" class="details img-responsive">
									</div>
								</div>
								<div class="col-sm-6">
									<h4>Details</h4>
									<p><?=$product['description']; ?></p>
									<hr />
									<p>Price : Rp <?=$product['price']; ?></p>
									<p>Brand : <?php 
													$sql2 = "SELECT * FROM brands WHERE id=".$product['brand'];
													$brandArray = $conn->query($sql2);
													while($brandName = mysqli_fetch_assoc($brandArray)) :
														echo $brandName['brand'];
													endwhile;
												 ?> </p>
									<form method="post">
										<div class="form-group">
											<div class="col-xs-3">
												<label for="quantity" id="quantity-label">Quantity</label>

												<input type="text" class="form-control" id="quantity-<?=$product['id']; ?>" name="quantity" style="margin-left: -15px;">
											</div><br><br><br>
											<div class="form-group">
												<label for="LED Color">Color</label>
												<select name="ledColor" id="ledColor-<?=$product['id']; ?>" class="form-control">
													<option value=""></option>
													<?php
														$color=explode(',', $product['color']);
														foreach ($color as $eachColor) {
															echo "<option value=' ".$eachColor."'>".$eachColor."</option>";
														}
													?>
													
												</select>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="modal-footer">
								<button class="btn btn-default" data-dismiss="modal">Close</button>
								<button class="btn btn-warning" type="submit" onclick="addtoCart(<?=$product['id']; ?>,document.getElementById('quantity-<?=$product['id']; ?>').value,document.getElementById('ledColor-<?=$product['id']; ?>').value)"> <span class='glyphicon glyphicon-shopping-cart'>Add To Cart</span></button>
							</div>
						</div>
						
						
					</div>
				</div>
			</div>
		</div>
		<script>
			$('#details-<?=$product['id']; ?>').on('hidden.bs.modal', function () {
			 	location.reload();
			})
		</script>
	<?php endwhile; ?>	