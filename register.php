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
    <form action="user_registration.php" method="post" onsubmit="return check()" name="user_registration_form">
      <div class="alert alert-danger alert-dismissible fade show my-3 error_message" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
    <h1>User Registeration Form</h1>

    <div class="row my-5">
      
      <div class="col-12 col-md-2">
        <label>User Name:</label>
      </div>
      <div class="col-12 col-md-4">
        <input type="text" name="user_name" class="form-control" required="required">
      </div>
    </div>
    <div class="row my-4">
      
      <div class="col-12 col-md-2">
        <label>User Email:</label>
      </div>
      <div class="col-12 col-md-4">
        <input type="email" name="user_email" class="form-control" required="required">
      </div>
    </div>
    <div class="row my-4">
      
      <div class="col-md-2">
        <label>User Phone:</label>
      </div>
      <div class="col-md-4">
        <input type="text" name="user_phone" class="form-control" minlength="11" required="required">
      </div>
    </div>
    <div class="row my-4">
      
      <div class="col-md-2">
        <label>User Address:</label>
      </div>
      <div class="col-md-4">
        <textarea name="user_address" class="form-control" rows="4" required="required"></textarea>
      </div>
    </div>
    <div class="row my-4">
      
      <div class="col-md-2">
        <label>User Password:</label>
      </div>
      <div class="col-md-4">
        <input type="password" name="user_password" class="form-control" minlength="8" required="required">
      </div>
    </div>
    <div class="row my-4">
      
      <div class="col-md-2">
        <label>User Confirm Password:</label>
      </div>
      <div class="col-md-4">
        <input type="password" name="user_confirm_password" class="form-control" minlength="8" required="required">
      </div>
    </div>
    <div class="row my-4">
      
      <div class="col-md-2">
        
      </div>
      <div class="col-md-4">
        <input type="submit" name="" value="Register" class="btn btn-outline-danger">
       
      </div>
    </div>
  </form>
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
