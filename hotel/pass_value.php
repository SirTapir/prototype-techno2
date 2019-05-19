<?php
	session_start();

		if(isset($_SESSION['cart'])){
			$_SESSION['cart']= "filled";
			array_push($_SESSION['cart_id'], $_POST['id']);
			array_push($_SESSION['cart_color'], $_POST['color_product']);
			array_push($_SESSION['cart_quantity'], $_POST['quantity_product']);
			print json_encode(array('message' => "Success" ));	
		}else{
			print json_encode(array('message' => "Failed" ));	
		}
	
	die();
?>