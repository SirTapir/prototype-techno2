<?php
require "connect.php";
include "header.php";

if(isset($_SESSION["username"]))
{
	header("location: viewProduct.php");
}
if($_POST)
{
	if($_POST["username"]!="")
	{
		$username = $_POST["username"];
		$pass = $_POST["pass"];
		$_SESSION["username"] = $username;
		
		$query = "SELECT * from admin where username = '$username' and pass = '$pass'";
		$q = mysqli_query($conn,$query) or die (mysqli_error($conn));
		$res = mysqli_num_rows($q);

		if($res!=0)
		{
			header("location:viewProduct.php");
		}
		else
		{
			echo "<div class = 'alert alert-warning' role = 'alert'>Wrong username or password!</div>";
		}
	}
}
?>
<html>
<head>
	<style type = "text/css">
	 .btn-custom
	 {
	 	background-color: #FF7F00;
	 }
	 .btn-custom:hover
	 {
	 	background-color: #E57507;
	 }
	</style>
</head>
<body>
	<div class="container">
    <br>
    <center style="font-size: 30px;"><b> Login </b></center>
    <br>
    <form action="" method="post">

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" required>
      </div>
      <div class="form-group">
        <label for="psw">Password</label>
        <input type="password" class="form-control" id="pass" placeholder="Enter Password" name="pass" required>
      </div>
    <input type="submit" class="btn btn-custom" name="submit" value="Login">
    </form>
	</body>
	</html>