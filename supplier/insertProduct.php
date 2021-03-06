<?php
	require "connect.php";
	include "header.php";
	if(isset($_GET['error'])){
		$error=$_GET['error'];
		if($error=='no'){
			echo "<script> alert('Success!') </script>";
		}else{
			echo "<script> alert('Sorry, there was an error uploading your file.') </script>";
		}
	}
  if(!isset($_SESSION["username"])){ //if login in session is not set
      header("Location: login.php");
  }
?>

<!DOCTYPE html>
<body>

<div class="container">
  <h2>Insert Product</h2>
  <form action="data_insertProduct.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="productName">Product Name:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter product name" name="productName">
    </div>

    <div class="form-group">
      <label for="price">Product Price:</label>
      <input type="number" class="form-control"  placeholder="Enter price" name="productPrice">
    </div>

    <div class="form-group">
  <label for="sel1">Product Brand</label>
  <select class="form-control" id="sel1" name="productBrand">
    <?php
		$sql = "SELECT * FROM brands";
		$result = $conn->query($sql);
		while($product = mysqli_fetch_assoc($result)) :											
		echo "<option value='".$product['id']."'>".$product['brand']."</option>";
		endwhile;
														
	?>
  </select>
</div>

    <div class="form-group">
      <label for="Image">Product Image:</label>
      <input type="file" class="form-control"  name="productImage" required>
    </div>

    <div class="form-group">
      <label for="description">Product Description:</label>
      <textarea class="form-control" rows="5" name="productDesc" required> </textarea>
    </div>

    <div class="checkbox-inline">
    	<label for="isFeatured">Is Featured?</label><br>
      <label><input type="radio" value="1" name="productFeatured">Yes</label>
    </div>
    <div class="checkbox-inline">
      <label><input type="radio" value="0" name="productFeatured" checked>No</label>
    </div>

    <div class="form-group">
      <label for="colors">Colors:</label>
      <input type="text" class="form-control"  placeholder="Use comma as separator (no spaces) ex:red,green,blue" name="productColors" required>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<!--  Blank space   --> 
  <div class="col-md-10" style="margin: 100px;">

</body>
</html>
