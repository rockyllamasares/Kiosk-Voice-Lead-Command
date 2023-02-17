<?php
include_once("../connection/conn.php");

$conn = connection();
if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['type'];
  $pic = $_FILES['pic']['name'];
    if(!empty($pic)){
      move_uploaded_file($_FILES['pic']['tmp_name'], 'img/'.$pic); 
    }

  $sql = "INSERT INTO `product`( `product_name`, `product_price`, `product_type`, `product_pic`) VALUES ('$name','$price','$type','$pic')";
  $conn->query($sql) or die ($conn->error);

  

  header('Location: products.php?success=Record added');

}
?>
<?php include_once("header.php"); ?>
    <section class="content-header">
        <div class="row mb-2 mt-5">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input class="form-control" type="text" name="name" required="">
                  </div>
                   <div class="form-group">
                    <label>Product Price</label>
                    <input class="form-control" type="text" name="price" required="">
                  </div>
                  <div class="form-group">
                    <label>Product Type</label>
                    <select class="form-control" required="" name="type">
                      <option></option>
                      <?php 
                    $sql = "SELECT * FROM category";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc(); 
                    ?>
                  <?php do{ ?>
                    <option>
                      <?php echo $row['category_name']; ?> 
                    </option>
                    <?php }while($row = $employees->fetch_assoc()) ?>
                    </select>
                  </div>
                   <div class="form-group">
                    <label>Product Picture</label>
                    <input type="file" name="pic" class="form-control">
                  </div>
                   <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-warning" href="products.php" role="button">Cancel</a>

                </div>
                    </div>

                  </div>
                </div>
              </form>
               
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php
include("footer.php");

?>