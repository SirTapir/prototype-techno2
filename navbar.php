
<!-- NavBar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">OnlineShop</a>
          <a class="navbar-brand" href="products.php">Products</a>
        </div>
        
        <form class="navbar-form navbar-left" action="search.php" style="width:850px; margin-left:100px;">
          <div class="input-group">
            <input type="text" class="form-control" name="searchProducts" placeholder="Search Online Shop" style="width:600px !important;"/>
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <button class="btn btn-success" type="button" data-target="#shopcart" data-toggle="modal" style="margin-top:5px; margin-right:5px;"><i class="fa fa-shopping-cart" style="font-size:24px; color: white;"></i></a>
          </li>
        </ul>
      </div>

    </nav>