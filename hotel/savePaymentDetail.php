<?php
session_start();
include 'connect.php';

$sql = "INSERT INTO transaction VALUES(default, ".$_SESSION['user-hotel'].", ".$_SESSION['total_amount'].", 'pending', now())";
$res = mysqli_query($conn, $sql);

$sql = "SELECT id FROM transaction ORDER BY id DESC LIMIT 1";
$res = mysqli_query($conn, $sql);
$transaction_id = mysqli_fetch_assoc($res);

for($i = 0; $i < $_SESSION['transaction_count']; $i++){

	$sql = "SELECT supplier_id FROM products WHERE id=".$_SESSION['cart_id'][$i];
	$res = mysqli_query($conn, $sql);
	$supplier_id = mysqli_fetch_assoc($res);

	$sql = "INSERT INTO detail_transaction VALUES(default, ".$transaction_id['id'].", ".$_SESSION['cart_id'][$i].", ".$_SESSION['user-hotel'].", ".$supplier_id['supplier_id'].", ".$_SESSION['cart_quantity'][$i].", ".$_SESSION['cart_price'][$i].", 'pending')";
	$res = mysqli_query($conn, $sql);
}

//hapus semua $_SESSION 
//redirect
$_SESSION['cart']='empty';
$_SESSION['cart_id']=array();
$_SESSION['cart_quantity']=array();
$_SESSION['cart_price']=array();

header('Location:index.php');

?>
