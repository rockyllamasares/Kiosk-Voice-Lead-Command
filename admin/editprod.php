<?php
include_once("../connection/conn.php");

$conn = connection();
$id = $_GET['id'];
$sql = "SELECT * FROM product WHERE id ='$id'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
if(isset($_POST['update'])){

  $name = $_POST['name'];
  $price = $_POST['price'];
  $type = $_POST['type'];
   $pic = $_FILES['pic']['name'];
    if(!empty($pic)){
      move_uploaded_file($_FILES['pic']['tmp_name'], 'img/'.$pic); 
    }

  $sql = "UPDATE product SET product_name ='$name',product_price ='$price',product_type ='$type',product_pic = '$pic' WHERE id = '$id'";
  $conn->query($sql) or die ($conn->error);

  header('Location: products.php?success=Record updated successfully');

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
                <h3 class="card-title">Edit Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input class="form-control" type="text" name="name" required value="<?php echo $row['product_name']; ?>">
                  </div>
                   <div class="form-group">
                    <label>Product Price</label>
                    <input class="form-control" type="text" required name="price" value="<?php echo $row['product_price']; ?>">
                  </div>
                   <div class="form-group">
                    <label>Product Type</label>
                    <select class="form-control" required="" name="type">
                      <option><?php echo $row['product_type']; ?></option>
                      <option>Breakfast</option>
                      <option>Lunch</option>
                      <option>Dinner</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label>Product Picture</label><br>
                    <img name="pic" src="<?php echo (!empty($row['product_pic']))? 'img/'.$row['product_pic']:'img/admin.png'; ?>" width="270px" height="150px">
                    <input type="file" name="pic" class="form-control" required>
                  </div>
                   <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-primary">Update</button>
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