
<?php
	require "connect.php";
	include "header.php";
	if(!isset($_SESSION["username"])){ //if login in session is not set
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
	<h1 style="margin-left:600px;margin-top: 25px;">Data Product</h1>
	<table class="table table-striped" style="margin-top: 25px;">
		<thead>
			<tr>
				<th scope="col">Id</th>
				<th scope="col">Title</th>
				<th scope="col">Price</th>
				<th scope="col">Brand</th>
				<th scope="col">Description</th>
				<th scope="col">Feature</th>
				<th scope="col">Color</th>
				<th scope="col">Image</th>
				<th scope="col">Edit</th>
				<th scope="col">Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
			#SQL get products
			$query = "SELECT * FROM products";
			$q = mysqli_query($conn,$query) or die (mysql_error($conn));




			while($row = mysqli_fetch_assoc($q))
			{
				$id = $row["id"];
				$title = $row["title"];
				$price = $row["price"];
				$brand = $row["brand"];
				$desc = $row["description"];
				$featured = $row["featured"];
				$color = $row["color"];
				$img =$row["image"];
				$imgShow = ".".$img;

				#SQL get brands name
				$sql2 = "SELECT * FROM brands WHERE id=".$brand;
				$brandArray = $conn->query($sql2);
				

			

				echo"<tr>";
					echo "<td>$id</td>";
					echo "<td>$title</td>";
					echo "<td>$price</td>";
					
					
					while($brandName = mysqli_fetch_assoc($brandArray)) :
							echo "<td>".$brandName['brand']."</td>";
					endwhile;
					echo "<td>$desc</td>";
					echo "<td>$featured</td>";
					echo "<td>$color</td>";
					echo "<td><a href = '$imgShow'>Click here</a></td>";
					echo "<td><a href='editProducts.php?id=$id' style='color: black;'><button type='button' class='btn btn-warning'><i class='fa fa-cog'></i></button></a></td>";
					echo "<td><button type='button' class='btn btn-danger' onclick='deleteItem($id)'><i class='fa fa-close'></i></button></td>";


			}
			?>
	</table>
	<script>
		function deleteItem(id_delete) {
			
			var isSure= confirm("Are you sure?");
			if(isSure==true){
				
				//header("Location: deleteProduct.php?id="+id_delete);
				window.location.href= "deleteProduct.php?id="+id_delete;
			}
		}

	</script>
</body>
</html>