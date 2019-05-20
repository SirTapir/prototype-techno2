<?php
	session_start();
	require 'connect.php';
	$title = $_POST['productName'];
	$price = $_POST['productPrice'];
	$brand = $_SESSION['user-supplier'];
	#$image = $_POST['productName'];
	$desc = $_POST['productDesc'];
	#$featured = $_POST['productFeatured'];

	$sql2 = "SELECT * FROM user_supplier WHERE id=".$_SESSION["user-supplier"];
	$supplierArray = $conn->query($sql2);
	while($supplierName = mysqli_fetch_assoc($supplierArray)) :
		$current_name = $supplierName['nama_supplier'];
	endwhile;


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
		$sql = "INSERT INTO products VALUES (0, '$title', $price,$brand,'$targetfileDB','$desc', 0)";
		echo $sql;
    	if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetfile) && mysqli_query($conn, $sql)){
		    header('location: insertProduct.php?error=no');
		    
	    } else {
	        echo "<br>Sorry, there was an error uploading your file.";
	        header('location: insertProduct.php?error=yes');
	    }
	}

?>