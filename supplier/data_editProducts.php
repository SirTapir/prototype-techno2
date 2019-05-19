
<?php
	session_start();
	require 'connect.php';
	$title = $_POST['productName'];
	$price = $_POST['productPrice'];
	$brand = $_POST['productBrand'];
	#$image = $_POST['productName'];
	$desc = $_POST['productDesc'];
	$featured = $_POST['productFeatured'];
	$colors = $_POST['productColors'];


	$target_dir = "../images/";
	$target_dirDB = "./images/";
	$newfilename = "product_".$title."_".$brand.".jpg";
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
		$sql = "UPDATE products SET title='$title', price='$price', brand='$brand', description='$desc', featured='$featured', color='$colors', image='$targetfileDB' WHERE id=$idEditProducts";
		
    	if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetfile)){
    		if (mysqli_query($conn, $sql)) {
			    echo "Record updated successfully";
			} else {
			    echo "Error updating record: " . mysqli_error($conn);
			}
		    header('location: editProducts.php?error=no');
		    
		    
	    } else {
	        echo "<br>Sorry, there was an error uploading your file.";
	        #header('location: editProducts.php?error=yes,id='.$idEditProducts);
	    }
	}
?>