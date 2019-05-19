<?php
session_start();
require "connect.php";
/*if(isset($_SESSION['user-hotel'])){
    header("Location: hotel/index.php");
}
else if(isset($_SESSION['user-supplier'])){
    header("Location: supplier/index.php");
}*/

if($_POST){
    if($_POST['email'] != ""){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        
        if($_POST['type'] == "hotel"){
            $_SESSION['user-hotel'] = $email;
            $query = "SELECT * from user_hotel where email = '$email' and password = '$pass'";
            $q = mysqli_query($conn,$query) or die (mysqli_error($conn));
            $res = mysqli_num_rows($q);
        }
        else if($_POST['type'] == "supplier"){
            $_SESSION['user-supplier'] = $email;
            $query = "SELECT * from user_supplier where email = '$email' and password = '$pass'";
            $q = mysqli_query($conn,$query) or die (mysqli_error($conn));
            $res = mysqli_num_rows($q);
        }

        if($res!=0 && isset($_SESSION['user-hotel'])){
            header("Location: hotel/index.php");
        }
        else if($res!=0 && isset($_SESSION['user-supplier'])){
            header("Location: supplier/viewProduct.php");
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
    <title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>

    .wrapper {
      display: flex;
      align-items: center;
      flex-direction: column; 
      justify-content: center;
      width: 100%;
      min-height: 100%;
      padding: 20px;
    }

    .login-container{
        margin-top: 5%;
        margin-bottom: 5%;
    }
    .login-form-1{
        padding: 5%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-1 h3{
        text-align: center;
        color: #333;
    }
    .login-form-2{
        padding: 5%;
        background: #0062cc;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }
    .login-form-2 h3{
        text-align: center;
        color: #fff;
    }
    .login-container form{
        padding: 10%;
    }
    .btnSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }
    .login-form-1 .btnSubmit{
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }
    .login-form-2 .btnSubmit{
        font-weight: 600;
        color: #0062cc;
        background-color: #fff;
    }
    .login-form-2 .ForgetPwd{
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }
    .login-form-1 .ForgetPwd{
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }

    </style>
    
</head>

<body>
<div class="container login-container">
            <div class="row wrapper">
                <div class="col-md-6 login-form-1">
                    <h3>Log In</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <h4>Company Type</h4>
                            <input type="radio" name="type" value="supplier"> Supplier<br>
                            <input type="radio" name="type" value="hotel"> Hotel<br>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Email *" name="email" />
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Your Password *" name="password" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <div class="form-group">
                            <a href="#" class="ForgetPwd">Forget Password?</a>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </body>
</html>