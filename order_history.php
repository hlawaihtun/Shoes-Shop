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

 

  <div class="container">
    <!-- Example row of columns -->
    <div class="row my-3">
      <div class="col-12 col-md-8">
          <h3>Order History Table</h3>
      </div>
    </div>
    <?php
      $loggedin_user_id=$_SESSION['loggedin_user_id'];
      include('admin/connection.php');
      $query='SELECT o.*,os.order_status_name FROM orders o inner join  order_status os ON o.status=os.id where o.user_id=:user_id';
      $data=[
            "user_id"=>$loggedin_user_id
          ];
          $stmt=$pdo->prepare($query);
          $stmt->execute($data);
          $rows=$stmt->fetchAll();
          //var_dump($rows);
          if(sizeof($rows)){
            echo "<table class='table table-bordered'>";
            echo "<thead><tr><th>No</th><th>Date</th><th>VoucherID</th><th>Status</th><th>Detail</th></tr></thead>";
            echo "<tbody>";
            $i=1;
              foreach ($rows as $key => $order) {
                $order_id = $order["id"];
                $order_voucher_id=$order["voucher_id"];
                $order_date=$order["order_date"];
                $order_status_name=$order["order_status_name"];
                echo "<tr><td>$i</td><td>$order_date</td><td>$order_voucher_id</td><td>$order_status_name</td><td><a class='btn btn-outline-danger btn_detail' href='#'>Detail</a></td></tr>";
                $i++;
              }
            echo "</tbody>";
            echo "</table>";
          }else{  
            echo "<br><h4>You have no order history</h4>";
          }
    ?>
  </div> <!-- /container -->

</main>

<footer class="container">
  <!-- <p>&copy; Company 2017-2020</p> -->
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.js"></script>
    <script type="text/javascript" src="js/add_to_cart.js"></script>
  <script type="text/javascript">
    var show_error_message;
    $(document).ready(function(){
      $(".error_message").hide();
      show_error_message=function(message){
          $(".error_message").html(message);
          $(".error_message").show();
      }

    });

    function check(){
        var user_password=user_registration_form.user_password.value; 
        var user_confirm_password=user_registration_form.user_confirm_password.value;
        //console.log(user_password,user_confirm_password);
        if(user_password==user_confirm_password){
          return true;
        }else{
          jQuery(show_error_message('Password and Confirm Password Doesn\'t Match!'));
          return false;
        }
         
      }  
    
  </script>

  </body>
</html>
