<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    
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

    radio {
    	float: right;
    }

    </style>
    
</head>

<body>
<div class="container login-container">
            <div class="row wrapper">
                <div class="col-md-6 login-form-1">
                    <h3>Sign Up</h3>
                    <form action="data_signup.php" method="post">
                    	<div class="form-group" >
                    		<h4>Company Type</h4>
                    		<input type="radio" name="type" value="supplier" required> Supplier<br>
							<input type="radio" name="type" value="hotel"> Hotel<br>
                    	</div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Your Email" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Your Password" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="companyName" class="form-control" placeholder="Your Company Name" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="companyAddr" class="form-control" placeholder="Your Company Address" value="" required/>
                        </div>
                        <div class="form-group">
                            <input type="tel" id="phone" name="phone" class="form-control" pattern="[0-9]+" placeholder="Your Company Phone Number" required>
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Register" />
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </body>
</html>