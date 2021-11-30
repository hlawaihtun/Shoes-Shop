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
      <div id="content"

        <!-- Topbar -->
        <?php
          include('nav.php');
        ?>
        <!-- End of Topbar -->
        <?php
        $brand_name='';
        $brand_code='';
        $id='';
          if(isset($_REQUEST['id'])){
            $id=$_REQUEST['id'];
            include('connection.php');
            $query="SELECT * FROM product_brands WHERE id=:id";
            $stmt=$pdo->prepare($query);
            $data=['id'=>$id];
            $stmt->execute($data);
            $rows=$stmt->fetchAll();
            //var_dump($rows[0]['brand_name']);
            $id=$rows[0]['id'];
            $brand_name=$rows[0]['brand_name'];
            $brand_code=$rows[0]['brand_code'];
          };

        ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Update Product Brand</h1>
        <form action="update_product_brand.php" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>">
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label>Product Brand Name:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="text" name="product_brand_name" class="form-control" placeholder="Enter Product Brand Name" value="<?php echo $brand_name ?>" required="required">              
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label> Product Brand Code:</label>
              </div>
              <div class="col-12 col-lg-5">
                <input type="text" name="product_brand_code" class="form-control" placeholder="Enter Product Brand Code" value="<?php echo $brand_code ?>" required="required">              
              </div>
            </div>
          </div>
          <div class="row my-5"> 
              <div class="col-lg-4">
                <input type="submit" name="" class="btn btn-primary" value="Update">
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

</body>

</html>
