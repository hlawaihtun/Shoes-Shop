<!DOCTYPE html>
<html lang="en">

<?php
  include('head.php');
?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php 
      include('sidebar.php');
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
          include('nav.php');
        ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Product Registration</h1>
        <form action="add_product.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label>Product Category Name:</label>
                
              </div>
              <div class="col-12 col-lg-5">
               <?php
                  require('get_categories_list.php');
                ?>              
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Brand Name:</label>
              </div>
              <div class="col-12 col-lg-5">
                <?php
                  require('get_brands_list.php');
                ?>           
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Code:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="text" name="product_code" class="form-control product_code bg-white"  readonly="" placeholder="Drop Cursor To Get Product Code">           
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Photo:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="file" name="product_photo" class="form-control-file">           
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Name:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">           
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Size:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="text" name="product_size" class="form-control" placeholder="Enter Product Size">           
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Gender</label>
              </div>
              <div class="col-12 col-lg-5">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="1" checked>
                  <label class="form-check-label" for="male">
                    Male
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="2">
                  <label class="form-check-label" for="female">
                  Female
                  </label>
                </div>           
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Price:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="text" name="product_price" class="form-control" placeholder="Enter Product Price">           
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Detail:</label>
              </div>
              <div class="col-12 col-lg-5">
                <textarea class="form-control" rows="5" name="product_detail"></textarea>           
              </div>
            </div>
          </div>

          <div class="row my-5"> 
              <div class="col-lg-4">
                <input type="submit" name="" class="btn btn-primary" value="Register">
              </div>
            </div>
        </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; HWH 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>



  <script type="text/javascript">
      $(document).ready(function(){
        $(".product_code").click(function(){
          get_product_code();
        });

        function get_product_code(){
            //console.log('hi');
            var selected_category_code=$('.category_id').find(":selected").data('code');
            var selected_brand_code=$(".brand_id").find(":selected").data('code');
            console.log(selected_category_code,selected_brand_code);
            var mycode_first_part=selected_category_code+'-'+selected_brand_code+'-';
            console.log(mycode_first_part);
            //console.log(selected_category.data('code'));
            $.ajax({
              method:"POST",
              url:"get_latest_product_code.php",
              data:{first_part:mycode_first_part}
            }).done(function(data){
              console.log(data);
              $('.product_code').val(data);
            });
        }
      })

  </script>

</body>

</html>
