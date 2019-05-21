
<?php
	session_start();
	if(!isset($_SESSION["user-hotel"])){ //if login in session is not set
    	header("Location: ../login.php");
	}
	if(!isset($_SESSION['cart'])){
		$_SESSION['cart']='empty';
		$_SESSION['cart_id']=array();
		$_SESSION['cart_quantity']=array();
		$_SESSION['cart_price']=array();
	}
	require_once "connect.php";
	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
	$result2 = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- CSS -->
	<link rel="stylesheet" href="css/main.css">

	<!-- To make sure page is not broken on mobile phone !-->
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scaleable=no">

</head>
<body id="page-top" style="background-color: white;">
  
  
  <?php
  	include "navbar.php";
  ?>

		<!-- Centre -->
		<div class="col-md-1"></div>


	<!--main content of featured products-->
	<div class="col-md-10">
		<div class="row">
			<h2 class="text-center">Products</h2>
			<?php while($product = mysqli_fetch_assoc($result)) : ?>
			<div class="col-md-3">
				<h4><?=$product['title']; ?></h4>
				<img src=".<?=$product['image']; ?>" alt="<?=$product['title']; ?>" id="images">
				<p class="price">Price: Rp<?=$product['price']; ?></p>
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-<?=$product['id']; ?>">Details</button>
			</div>

		<?php endwhile; ?>

			
		</div>
	</div>

	

	<!--	Blank space		--> 
	<div class="col-md-10" style="margin: 100px;">
		
	</div>
	<!--	End Blank Space -->

	<!--details modal-->
	<?php
		include "detail-modal-products.php"
	?>
	<!--end detail modal-->
    
    <!-- Shopping cart -->
		<?php
			include "shoppingcart.php"
		?>
	<!-- Shopping cart ends -->
	
	<!-- Start script add to Cart -->
		<script>
			$(document).ready(function(){
				
			});
				
			function addtoCart(id_product,quantity_product,price_product) {
					
					if(!quantity_product==""){
						
						var subtotal = parseInt(price_product) * parseInt(quantity_product);

						$.ajax({

					            type: "POST",
					            url: "pass_value.php",
					            data: {
					            	id: id_product,
					            	quantity_product: quantity_product,
					            	price_product: subtotal
					            },
					            dataType: 'json',
					            cache: false,
					            success: function(response) {

					                    alert(response.message);

					            }

						});			
					}	
			}

			function deleteArray(index_array) {
				$.ajax({

					            type: "POST",
					            url: "delArray.php",
					            data: {
					            	index_array: index_array,
					            },
					            dataType: 'json',
					            cache: false,
					            success: function(response) {

					                    alert(response.message);
					                    window.location.reload();
					            }

				});		
			}

		</script>
    <!-- End script add to Cart -->
</body>
</html>

