
<?php
	session_start();

	require "connect.php";
	include "header2.php";

	if(!isset($_SESSION["user-supplier"])){ //if login in session is not set
    	header("Location: ../login.php");
	}


	$sql2 = "SELECT * FROM user_supplier WHERE id=".$_SESSION["user-supplier"];
	$supplierArray = $conn->query($sql2);
	while($supplierName = mysqli_fetch_assoc($supplierArray)) :
		$current_name = $supplierName['nama_supplier'];
	endwhile;

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
	<?php
		echo '<h1 style="margin-top: 25px; align-content:center; text-align:center;">History Transaksi '.$current_name.'</h1>';
	?>
	
	<table class="table table-striped" style="margin-top: 25px;">
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Product</th>
				<th scope="col">Customer</th>
				<th scope="col">Quantity</th>
				<th scope="col">Status</th>
				<th scope="col">Custom Logo</th>
			</tr>
		</thead>
		<tbody>
			<?php
			#SQL get products
			$query = "SELECT * FROM detail_transaction WHERE supplier_id=".$_SESSION["user-supplier"];
			$q = mysqli_query($conn,$query) or die (mysql_error($conn));

			while($row = mysqli_fetch_assoc($q))
			{
				echo"<tr>";
					echo "<td>".$row['id']."</td>";

				//get product info
				$query = "SELECT * FROM products WHERE id=".$row['product_id'];
				$q2 = mysqli_query($conn, $query);
				$product = mysqli_fetch_assoc($q2);

				//get hotel info
				$query = "SELECT * FROM user_hotel WHERE id=".$row['hotel_id'];
				$q3 = mysqli_query($conn, $query);
				$hotel = mysqli_fetch_assoc($q3);

					echo "<td>".$product['title']."</td>";
					echo "<td>".$hotel['nama_hotel']."</td>";
					echo "<td>".$row['qty']."</td>";
					echo "<td>".$row['status']."</td>";
					echo "<td> <a href='.".$row['logo']."'> Click Here </a> </td></tr>";
			}
			?>
	</table>
	
</body>
</html>