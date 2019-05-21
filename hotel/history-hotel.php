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
	$sql = "SELECT * FROM products WHERE featured=1";
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
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

</head>
<body id="page-top" style="background-color: white;">
  
  

  

  <?php
  	include "navbar.php";
  ?>

 </body>

 </html>