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

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron" style="background-image: url('img/banner.png');background-size: cover;background-repeat: no-repeat;height: 500px;">
      <!-- <h1 class="display-3">Hello, world!</h1>
      <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p> -->
      <p><a class="btn btn-primary btn-lg learn_more_btn" href="#" role="button">Learn more &raquo;</a></p>
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <?php
      include('admin/connection.php');
          $query="SELECT * FROM products order by id desc LIMIT 8";
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
            
            if($i%4==1){
              echo '<div class="row">';
            }
            echo "<div class='col-md-3'>
                  <h2>$product_name</h2>
                  <p>Price : $product_price</p>
                  <p>Product Code : $product_code</p>
                  <p><img src='admin/$product_photo' class='img-fluid'></p>
                  <p><a class='btn btn-outline-danger' href='product_detail.php?id=$id' role='button'>View Detail &raquo;</a></p>
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
    <script type="text/javascript" src="js/add_to_cart.js"></script></body>
</html>
