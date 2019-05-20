<?php
	require 'connect.php';
	$type = $_POST["type"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$companyName= $_POST["companyName"];
	$companyAddr= $_POST["companyAddr"];
	$phone = $_POST["phone"];

	if($type=='supplier'){
		$sql = "INSERT INTO user_supplier VALUES (0, '$email', '$password','$companyName','$companyAddr',$phone)";
		
	}else{
		$sql = "INSERT INTO user_hotel VALUES (0, '$email', '$password','$companyName','$companyAddr',$phone)";
		
	}

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully";
    	header("Location: index.php?signupErr=no");
	} else {
	    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	    header("Location: index.php?signupErr=yes");
	}
?>