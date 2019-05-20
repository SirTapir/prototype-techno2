
<?php
	session_start();
	require "connect.php";
	include "header.php";

	if(!isset($_SESSION["admin-username"])){ //if login in session is not set
    	header("Location: login.php");
	}

	if(isset($_GET['error'])){
		$error=$_GET['error'];
		if($error=='no'){
			echo "<script> alert('Success!') </script>";
			header("Location: viewProduct.php");
		}else{
			echo "<script> alert('Sorry, there was an error uploading your file.') </script>";
		}
	}

	

	$id = $_GET['id'];
	$_SESSION['idEditProducts']=$_GET['id'];
	$sql = "SELECT * FROM products WHERE id=$id";
	
	$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="container">
  <h2>Edit Product</h2>
  <?php while($product = mysqli_fetch_assoc($result)) : ?>
	  <form action="data_editProducts.php" method="post" enctype="multipart/form-data">
	    <div class="form-group">
	      <label for="productName">Product Name:</label>
	      <input type="text" class="form-control" id="title" placeholder="Enter product name" name="productName" value="<?=$product['title']; ?>">
	    </div>

	    <div class="form-group">
	      <label for="price">Product Price:</label>
	      <input type="number" class="form-control"  placeholder="Enter price" name="productPrice" value="<?=$product['price']; ?>">
	    </div>

	    <div class="form-group">
		  <label for="sel1">Product Supplier</label>
		  <select class="form-control" id="sel1" name="productSupplier">
		    <?php
				$sql = "SELECT * FROM user_supplier";
				$result = $conn->query($sql);
				while($productBrand = mysqli_fetch_assoc($result)) :
				if ($productBrand['id']==$product['nama_supplier']) {
					echo "<option value='".$productBrand['id']."' selected>".$productBrand['nama_supplier']."</option>";
				}else{
					echo "<option value='".$productBrand['id']."'>".$productBrand['nama_supplier']."</option>";

				}									
				
				endwhile;
																
			?>
		  </select>
		</div>



	    <div class="form-group">
	      <label for="Image">Edit Product Image?</label>
	      <label><input type="radio" value="1" name='changeProductImage' onclick="enableFileInsert()">Yes</label>
	      <label><input type="radio" value="0" name='changeProductImage' onclick="disableFileInsert()" checked>No</label>

	      <div id="fileInsert">
	      
	  	  </div>
	    </div>

	    <div class="form-group">
	      <label for="description">Product Description:</label>
	      <textarea class="form-control" rows="5" name="productDesc" required> <?=$product['description']; ?></textarea>
	    </div>

	    <div class="checkbox-inline">
	    	<label for="isFeatured">Is Featured?</label><br>
	    	<?php
	    		if($product['featured']==1){
	    			echo "<label><input type='radio' value='1' name='productFeatured' checked>Yes</label>";

	    		}else{
	    			echo "<label><input type='radio' value='1' name='productFeatured'>Yes</label>";

	    		}
	    		
	    	?>
	      
	    </div>
	    <div class="checkbox-inline">
	    	<?php
	    		if($product['featured']==0){
	    			echo "<label><input type='radio' value='0' name='productFeatured' checked>No</label>";

	    		}else{
	    			echo "<label><input type='radio' value='0' name='productFeatured'>No</label>";

	    		}
	    		
	    	?>
	      
	    </div>

	    

	    <input type="hidden" id="productID" name="productID" value="<?=$product['id']; ?>">

	    <button type="submit" class="btn btn-default">Submit</button>
	  </form>
	<?php endwhile; ?>
</div>

<script>
	function enableFileInsert() {
		document.getElementById("fileInsert").innerHTML='<label for="Image">Product Image:</label><input type="file" class="form-control"  name="productImage"  required>';
	}
	function disableFileInsert() {
		document.getElementById("fileInsert").innerHTML='';
	}	
</script>

<!--	Blank space		--> 
	<div class="col-md-10" style="margin: 100px;">
</body>
</html>