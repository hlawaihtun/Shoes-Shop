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
          <h1 class="h3 mb-4 text-gray-800">Product Categories Registration</h1>
        <form action="product_list.php" method="post">
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label>Select Product Category Name:</label>
              </div>
              <div class="col-12 col-lg-5">
                <?php include('get_categories_list.php') ?>             
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-12 col-lg-3">
                <label>Select Product Brand Name:</label>
              </div>
              <div class="col-12 col-lg-5">
                  <?php include('get_brands_list.php') ?>          
              </div>
            </div>
          </div>
          <div class="row my-5"> 
              <div class="col-lg-4">
                <input type="submit" name="" class="btn btn-primary" value="Search">
              </div>
            </div>
        </form>

        <div class="container my-5">
          <h1>Product List</h1>
          <div class="row">
          <div class="col-12 col-md-9">
          <table class="table table-responsive table-bordered d-inline">
              <thead>
                <th>No</th>
                <th>Name</th>
                <th>Code</th>
                <th>Photo</th>
                <th>Detail</th>
                <th>Edit/Delete</th>
              </thead>
              <tbody>
                <?php
                  include('connection.php');

                  if(isset($_POST['product_category_id'])&& isset($_POST['product_brand_id'])){
                    $product_category_id=$_POST['product_category_id'];
                    $product_brand_id=$_POST['product_brand_id'];

                    $query="SELECT * FROM products where product_category_id=$product_category_id and product_brand_id=$product_brand_id ORDER BY product_category_id";
                  }else{

                  $query="SELECT * FROM products order by id desc LIMIT 10";
                  }
                  $stmt=$pdo->query($query,PDO::FETCH_ASSOC);
                  $rows=$stmt->fetchAll();
                  //var_dump($rows);
                  $i=1;
                  foreach ($rows as $key => $product) {
                    $id=$product['id'];
                    $product_code=$product['product_code'];
                    $product_name=$product['product_name'];
                    $product_photo=$product['product_photo'];
                    echo "<tr>
                            <td>$i</td>
                            <td>$product_name</td>
                            <td>$product_code</td>
                            <td><img src='$product_photo' width=100 height=100></td>
                            <td><button class='btn btn-primary detail_btn' data-id='$id'><i class='fa fa-eye'></i></button></td>
                            <td>
                        <a href='edit_product.php?id=$id' target='_blank'>
                          <button class='btn btn-outline-warning'><i class='fas fa-edit'></button></i>
                        </a>
                        <form action='delete_product_list.php' method='post' class='d-inline' onsubmit='return confirm(\" Are you sure to delete?\")'>
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
        <div class="modal-body"><h1>Product Info</h1>
            <table class="table-bordered">
              <tbody id="product_data">
                
              </tbody>
            </table>
        </div>
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
      $('.detail_btn').click(function(){
        var id=$(this).data('id');
        //console.log(id);
        $.ajax({
          method:"POST",
          url:"get_product_info.php",
          data:{id:id}
        }).done(function(data){
          //console.log(data);
           //Json  string to obj type
          
          if(data){            
            var product_json=JSON.parse(data);
            console.log(product_json);
            var html=`<tr><td>Product Name:</td><td>${product_json.product_name}</td><td></tr>`;
            html=html+`<tr><td>Product Category:</td><td>${product_json.category_name}</td><td></tr>`;
            html=html+`<tr><td>Product Photo :</td><td><img src='${product_json.product_photo}' width='100' height='100'></td><td></tr>`;
            html=html+`<tr><td>Product Price:</td><td>${product_json.product_price}</td><td></tr>`;

            $('#product_data').html(html);
            $('#logoutModal').modal('show');
          }
        });
      })
    })
  </script>

</body>

</html>
