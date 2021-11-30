<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <a class="navbar-brand" href="index.php">My Shoes Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- Category Dropdown list -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <?php
              include('admin/connection.php');
              $query="SELECT * from product_categories";
              $stmt=$pdo->query($query);
              $rows=$stmt->fetchAll();
              foreach ($rows as $key => $category) {
                $product_category_id=$category['id'];
                $product_category_name=$category['category_name'];
                echo "<a class='dropdown-item' href='search_product.php?
                type=1&id=$product_category_id'>$product_category_name</a>";
              }
          ?>
        </div>
      </li>
      <!-- Brand Dropdown List -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Brands</a>
        <div class="dropdown-menu" aria-labelledby="dropdown02">
          <?php
            session_start();
              include('admin/connection.php');
              $query="SELECT * from product_brands";
              $stmt=$pdo->query($query);
              $rows=$stmt->fetchAll();
              foreach ($rows as $key => $brand) {
                $product_brand_id=$brand['id'];
                $product_brand_name=$brand['brand_name'];
                echo "<a class='dropdown-item' href='search_product.php?type=2&id=$product_brand_id'>$product_brand_name</a>";
              }
          ?>
        </div>
      </li>
      <?php
        if(isset($_SESSION['user_loggedin'])){
          if($_SESSION['user_loggedin']==true){
            $user_name=$_SESSION['loggedin_user_name'];

      ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $user_name; ?></a>
        <div class="dropdown-menu" aria-labelledby="dropdown04">
          <a class="dropdown-item" href="logout.php">Logout</a>
          <a class="dropdown-item" href="Profile.php">Profile</a>
          <a class="dropdown-item" href="order_history.php">Order History</a>
          
        </div>
      </li>

      <?php
        }
      }else{
      ?>
      
      <li class="nav-item">
        <a class="nav-link" href="register.php">
          Register
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          Login
        </a>
      </li>
      <?php
      }

      ?>



      <li class="nav-item">
        <a class="nav-link" href="show_cart.php"><i class="fas fa-shopping-cart" aria-hiden="true"></i><span class="badge badge-light product_count">0</span></a>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search_product.php" method="post">
      <input type="hidden" name="type" value="3">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search_name">
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>