
<?php
	session_start();
	require 'connect.php';
	$id=$_POST['productID'];
	$title = $_POST['productName'];
	$price = $_POST['productPrice'];
	#$supplier = $_POST['productSupplier'];
	#$image = $_POST['productName'];
	$desc = $_POST['productDesc'];
	#$featured = $_POST['productFeatured'];
	$isImagePresent= $_POST['changeProductImage'];

	$sql2 = "SELECT * FROM user_supplier WHERE id=".$_SESSION["user-supplier"];
	$supplierArray = $conn->query($sql2);
	while($supplierName = mysqli_fetch_assoc($supplierArray)) :
		$current_name = $supplierName['nama_supplier'];
	endwhile;
	

	if($isImagePresent==0){

		$sql = "SELECT * FROM products WHERE id=$id";
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result)){
			$data[]=$row;
		}
		
		$targetfileDB = $data[0]['image'];
		
		$sql = "UPDATE products SET title='$title',price='$price',description='$desc',image='$targetfileDB' WHERE id=$id";

		
		if (mysqli_query($conn, $sql)) {
			echo "Record updated successfully";
			header('location: editProducts.php?error=no&id='.$id);
		} else {
			echo "Error updating record: " . mysqli_error($conn);
			header('location: editProducts.php?error=yes&id='.$id);
		}
		
	}else{
		
		$target_dir = "../images/";
		$target_dirDB = "./images/";
		$newfilename = "product_".$title."_".$current_name.".jpg";
		$targetfile = $target_dir.$newfilename;
		$targetfileDB = $target_dirDB.$newfilename;
		$realfile = $target_dir.basename($_FILES["productImage"]["name"]);
		$uploadOk = 1;
		$FileType = strtolower(pathinfo($realfile,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if($FileType != "jpg" && $FileType !="jpeg" && $FileType != "png") {
			echo "Sorry, only JPG & PNG files are allowed.<br>";
			$uploadOk = 0;
		}


		if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			$idEditProducts=$_SESSION['idEditProducts'];
			$sql = "UPDATE products SET title='$title',price='$price',description='$desc',image='$targetfileDB' WHERE id=$idEditProducts";
			
	    	if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetfile)){
	    		if (mysqli_query($conn, $sql)) {
				    echo "Record updated successfully";
				} else {
				    echo "Error updating record: " . mysqli_error($conn);
				}
			    header('location: editProducts.php?error=no&id='.$id);
			    
			    
		    } else {
		        echo "<br>Sorry, there was an error uploading your file.";
		        header('location: editProducts.php?error=yes&id='.$id);
		    }
		}
		
	}

?>