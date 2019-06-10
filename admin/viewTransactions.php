
<?php
	require "connect.php";
	include "header.php";
	if(!isset($_SESSION["admin-username"])){ //if login in session is not set
    	header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
	<h1 style="margin-left:600px;margin-top: 25px;"></h1>
	<table class="table table-striped" style="margin-top: 25px;">
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Details</th>
				<th scope="col">Total</th>
				<th scope="col">Status</th>
				<th scope="col">Date</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			#SQL get products
			$query = "SELECT * FROM transaction";
			$q = mysqli_query($conn,$query) or die (mysql_error($conn));

			while($row = mysqli_fetch_assoc($q))
			{
				echo"<tr>";
					echo "<td>".$row['id']."</td>";

				$query = "SELECT * FROM detail_transaction WHERE transaction_id=".$row['id'];
				$q2 = mysqli_query($conn, $query);


					echo "<td>";
					echo "<table class='table'><tbody>";
				while($row2 = mysqli_fetch_assoc($q2)){
					//get product info
					$query = "SELECT * FROM products WHERE id=".$row2['product_id'];
					$qprod = mysqli_query($conn, $query);
					$productname = mysqli_fetch_assoc($qprod);

					echo "<tr><td>".$productname['title']."</td>";

					//get supplier info
					$query = "SELECT * FROM user_supplier WHERE id=".$row2['supplier_id'];
					$qsup = mysqli_query($conn, $query);
					$suppliername = mysqli_fetch_assoc($qsup);

					echo "<td>".$suppliername['nama_supplier']."</td>";
					echo "<td>".$row2['qty']."</td>";
					echo "<td>".$row2['subtotal']."</td>";
					echo "<td>".$row2['status']."</td></tr>";
					echo "<td>New Status: <select> 
											<option value='processing'>processing</option>
											<option value='in shipping'>in shipping</option>
											<option value='arrived'>arrived</option>
										  </select>
						</td></tr>";
				}

					echo "</table>";
					echo "</td>";
					echo "<td>".$row['total_amount']."</td>";
					echo "<td>".$row['status']."</td>";
					echo "<td>".$row['date']."</td>";
					echo "<td><button type='button'>Apply</button></td>";
			}
			?>
	</table>
</body>
</html>