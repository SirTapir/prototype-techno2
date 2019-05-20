<?php
session_start();
include 'connect.php';

$sql = "INSERT INTO transaction VALUES(default, ".$_SESSION['user-hotel'].", ".$_SESSION['total_amount'].", 'pending', now())";
$query = mysqli_query($conn, $sql);

?>
