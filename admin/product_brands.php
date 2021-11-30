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
          <?php
            if(isset($_REQUEST['status'])){
              $status=$_REQUEST['status'];
              if($status==1){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Delete</strong> success!.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
              }else if($status==2){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Register</strong> success!.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
              }else if($status==3){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Update</strong> success!.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
              }

            }
          ?>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Product Brands Registration</h1>
        <form action="register_product_brand.php" method="post">
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label>Product Brand Name:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="text" name="product_brand_name" class="form-control" placeholder="Enter Product Brand Name">              
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Brand Code:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="text" name="product_brand_code" class="form-control" placeholder="Enter Product Brand Code">              
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
        <!-- Table -->
        <h1 align="center">Product Brand Table</h1>
        <div class="container my-5">
          <div class="table-responsive">
          <table class="table table-bordered" >
            <thead>
              <th>No</th>
              <th>Name</th>
              <th>Code</th>
              <th>Edit/Delete</th>
            </thead>
            <tbody>
              <?php

              include('connection.php');
              $query="select * from product_brands order by brand_code ASC";
              $stmt = $pdo->query($query,PDO::FETCH_ASSOC);
              $rows=$stmt->fetchAll();
              $i=1;
              foreach($rows as $key => $value){
                //print_r($value);
                $id=$value['id'];
                $brand_name =$value['brand_name'];
                $brand_code=$value['brand_code'];
                echo "<tr>
                        <td>$i</td>
                        <td>$brand_name</td>
                        <td>$brand_code</td>
                        <td>
                        <a href='edit_product_brand.php?id=$id' target='_blank'>
                          <button class='btn btn-outline-warning'><i class='fas fa-edit'></button></i>
                        </a>
                        <form action='delete_product_brand.php' method='post' class='d-inline' onsubmit='return confirm(\" Are you sure to delete?\")'>
                        <input type='hidden' value='$id' name='id'>
                        <button class='btn btn-outline-danger' type='submit'><i class='fas fa-trash-alt'></button></i>
                        </form>
                        </td>
                      </tr>";
                      $i++;
              }
              ?>
            </tbody>
          </table>
          </div>
        </div>

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

</body>

</html>
