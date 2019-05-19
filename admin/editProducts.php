
<?php
	session_start();
	require "connect.php";
	include "header.php";
	if(!isset($_SESSION["username"])){ //if login in session is not set
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
		  <label for="sel1">Product Brand</label>
		  <select class="form-control" id="sel1" name="productBrand">
		    <?php
				$sql = "SELECT * FROM brands";
				$result = $conn->query($sql);
				while($productBrand = mysqli_fetch_assoc($result)) :
				if ($productBrand['id']==$product['brand']) {
					echo "<option value='".$productBrand['id']."' selected>".$productBrand['brand']."</option>";
				}else{
					echo "<option value='".$productBrand['id']."'>".$productBrand['brand']."</option>";

				}									
				
				endwhile;
																
			?>
		  </select>
		</div>

	    <div class="form-group">
	      <label for="Image">Product Image:</label>
	      <input type="file" class="form-control"  name="productImage"  required>
	    </div>

	    <div class="form-group">
	      <label for="description">Product Description:</label>
	      <textarea class="form-control" rows="5" name="productDesc" required> <?=$product['description']; ?> </textarea>
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

	    <div class="form-group">
	      <label for="colors">Colors:</label>
	      <input type="text" class="form-control"  placeholder="Use comma as separator (no spaces) ex:red,green,blue" name="productColors" value="<?=$product['color']; ?>" required>
	    </div>

	    <button type="submit" class="btn btn-default">Submit</button>
	  </form>
	<?php endwhile; ?>
</div>

<!--	Blank space		--> 
	<div class="col-md-10" style="margin: 100px;">
</body>
</html>