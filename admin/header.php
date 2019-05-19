<?php
if(!isset($_SESSION)){ 
    session_start();
}

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Admin Control</title>
    <link rel="icon" href="icon/favicon.ico" type="image/x-icon">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <style type="text/css">
      .navbar-custom {
        background-color:#9999ff;
      }


      
    </style>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <a class="navbar-brand" href="#" style="color: #000000">Admin Control Panel </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    
    <?php
      if(!isset($_SESSION["username"]))
      {
        echo '<ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <a href="login.php" class="nav-link" style="color: #000000">Log In</a>
          </li>
        </ul>';
      } 
      else 
      {
        echo '<ul class="navbar-nav mr-auto">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text" style="color: #000000">Product <span class="caret"> </span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a class="nav-link" href="viewProduct.php" style="color: #000000">View All Products</a></li>
                    <li><a class="nav-link" href="insertProduct.php" style="color: #000000">Insert Product</a></li>
                    
                    
                    
                  </ul>
                </li>
        </ul>';
        echo '<ul class="navbar-nav ml-auto">';
        echo '
          <li class="nav-item ">
            <a href="logout.php" class="nav-link" style="color: #000000">Log Out</a>
          </li>';
       echo '</ul>';
      }
    ?>
  </div>
</nav>
  </body>
</html>