<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>My Shoes Shop</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/jumbotron/">
     <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <?php
    include('nav.php');
    ?>

<main role="main">

 

  <div class="container mly-5">
    <h1>Product Detail</h1>
    <!-- Example row of columns -->
    <?php
        $query="SELECT * FROM products order by id desc LIMIT 8";
        if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];
            $query="SELECT * FROM products where id=$id";
    }

      include('admin/connection.php');
          $stmt=$pdo->query($query,PDO::FETCH_ASSOC);
          $rows=$stmt->fetchAll();
          //var_dump($rows);
          $i=1;
          foreach($rows as $key => $product){
            $id=$product['id'];
            $product_code=$product['product_code'];
            $product_name=$product['product_name'];
            $product_price=$product['product_price'];
            $product_photo=$product['product_photo'];
            $product_detail=$product['product_detail'];
            
            if($i%4==1){
              echo '<div class="row">';
            }
            echo "
            <div class='col-md-4'>
            <p><img src='admin/$product_photo' class='img-fluid'></p>
            </div>
            <div class='col-md-7'>
                <table class='table table-bordered'>
                <tr><th colspan='2'>$product_name</th></tr>
                <tr><td>Price :</td><td>$product_price</td></tr>
                <tr><td>Product Code :</td><td> $product_code</td></tr>
                <tr><td>Product Detail: </td><td>$product_detail</td></tr>
                </table>
                  <a class='btn btn-outline-danger add_to_cart' href='#' role='button' data-id=$id data-name='$product_name' data-price=$product_price data-photo=$product_photo>Add to Cart<i class='fas fa-shopping-cart'></i></a>
                </div>";
            if($i%4==0){
              echo '</div>';
            }
            $i++;

          }

    ?>

    <hr>

  </div> <!-- /container -->

</main>

<footer class="container">
  <!-- <p>&copy; Company 2017-2020</p> -->
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.js"></script>
      <script type="text/javascript" src="js/add_to_cart.js"></script>

    </body>
</html>
