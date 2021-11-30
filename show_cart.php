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

  

  <div class="container cart_container">
    <!-- Example row of columns -->
    <div class="row my-2 product_table_row">
      <h3 class="my-3"> Your Shopping Cart</h3>
    <div class="col-lg-10 table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody class="product_list">
          
        </tbody>

      </table>
    </div>
    </div>
    
    <?php 

    if(isset($_SESSION['user_loggedin'])){
      if($_SESSION['user_loggedin']==true){
        echo "<a href='#' class='btn btn-outline-danger btn_order'>Order</a>";
      }
    }else{
        echo "Please <a href='login.php'>Login</a> to check out Order. If you are not a member, please <a href='register.php'>Register</a>";
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
    <script type="text/javascript" src="admin/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){


        $(".btn_order").click(function() {
          //console.log('order');
          //call my_cart from localStorage;
          my_cart=localStorage.getItem('my_cart');
          $.ajax({
            method:"POST",
            url:"order_product.php",
            data:{my_cart:my_cart}
          }).done(function(data){
            //console.log(data);
            if(data){
                //localStorage.clear();
                localStorage.removeItem('my_cart');
                $(".cart_container").html('<h1>Order Processed Successfully!</h1>');
            }
          });
            
        });

        showTable();

        $(".product_list").on('click','.btn_plus',function(){
          //alert('plus');
          var id=$(this).data('id');
          //console.log(id);
          change_product_quantity(1,id);
        })


        $(".product_list").on('click','.btn_minus',function(){
          //alert('minus');
          var id=$(this).data('id');
          change_product_quantity(2,id);
        })


        function change_product_quantity(type,id){
          var my_cart=localStorage.getItem('my_cart');
          var my_cart_obj=JSON.parse(my_cart);
          $(my_cart_obj.product_list).each(function(i,v){
            if(v.id==id){
              if(type==1){
                v.quantity++;
              }else{
                if(v.quantity==1){
                  var ans=confirm('Are you sure to delete');
                  if(ans){
                  my_cart_obj.product_list.splice(i,1);
                  }
                }
                else{
                   v.quantity--;   
                }
               
              }
            }
          })
          localStorage.setItem('my_cart', JSON.stringify(my_cart_obj));
          showTable();
          
        }

        function showTable(){
          var my_cart=localStorage.getItem('my_cart');
          if(my_cart){
            var my_cart_obj=JSON.parse(my_cart);
            if(my_cart_obj.product_list){
              if(my_cart_obj.product_list.length){
                var html=''; var j=1; var total=0;
                $(my_cart_obj.product_list).each(function(i,v){
                  var id=v.id;
                  var name=v.name;
                  var photo=v.photo;
                  var price=v.price;
                  var quantity=v.quantity;
                  var subtotal = quantity*price;
                  total+=subtotal;
                  html=html+`<tr>
                                <td>${j}</td>
                                <td><img src="admin/${photo}" width=100 height=100></td>
                                <td>${name}</td>
                                <td>${price}</td>
                                <td>
                                <i class='fa fa-minus-circle btn_minus' style='font-size:23px;color:red' data-id=${id}></i>
                                ${quantity}
                                <i class='fa fa-plus-circle btn_plus' style='font-size:23px;color:green' data-id=${id}></i>
                                </td>
                                <td>${subtotal}</td>
                                </tr>`;
                                j++;
                })

                html=html+`<tr><td colspan=5>Total</td><td>${total}</td></tr>`;
                $(".product_list").html(html);

              }else{
                $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
                $(".btn_order").hide();
              }
            }else{
                $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
                $(".btn_order").hide();
              }
          }else{
                $(".product_table_row").html('<h3>Your Cart is Empty</h3>');
                $(".btn_order").hide();
              }
        }
      })
    </script>
  </body>
</html>
