<?php
	session_start();
		$id = $_POST['index_array'];
		if(isset($_SESSION['cart'])){
			unset($_SESSION['cart_id'][$id]);
			unset($_SESSION['cart_color'][$id]);
			unset($_SESSION['cart_quantity'][$id]);
			$_SESSION['cart_id'] = array_values($_SESSION['cart_id']);
			$_SESSION['cart_color'] = array_values($_SESSION['cart_color']);
			$_SESSION['cart_quantity'] = array_values($_SESSION['cart_quantity']);
			print json_encode(array('message' => "Deleted" ));	
		}else{
			print json_encode(array('message' => "Failed to delete" ));	
		}
	
	die();
?>