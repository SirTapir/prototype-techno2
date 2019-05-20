<?php
	session_start();
		$id = $_POST['index_array'];
		if(isset($_SESSION['cart'])){
			unset($_SESSION['cart_id'][$id]);
			unset($_SESSION['cart_quantity'][$id]);
			unset($_SESSION['cart_price'][$id]);
			$_SESSION['cart_id'] = array_values($_SESSION['cart_id']);
			$_SESSION['cart_quantity'] = array_values($_SESSION['cart_quantity']);
			$_SESSION['cart_price'] = array_values($_SESSION['cart_price']);
			print json_encode(array('message' => "Deleted" ));	
		}else{
			print json_encode(array('message' => "Failed to delete" ));	
		}
	
	die();
?>