<?php
include_once("../connection/conn.php");

$conn = connection();
$id = $_GET['id'];
$sql = "SELECT * FROM user WHERE id ='$id'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
if(isset($_POST['update'])){

  $name = $_POST['name'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $pass = $_POST['password'];
  $role = $_POST['role'];

  $sql = "UPDATE user SET name ='$name',username ='$uname',email = '$email',contact = '$contact',password ='$pass',role ='$role' WHERE id = '$id'";
  $conn->query($sql) or die ($conn->error);

  header('Location: user.php?success=Record updated successfully');

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
                <h3 class="card-title">Add new user</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" value="<?php echo $row['name']; ?>">
                  </div>
                   <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="uname" value="<?php echo $row['username']; ?>">
                  </div>
                   <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="email" value="<?php echo $row['email']; ?>">
                  </div>
                   <div class="form-group">
                    <label>Contact Number</label>
                    <input class="form-control" type="phone" name="contact" value="<?php echo $row['contact']; ?>">
                  </div>
                   <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="text" name="password" value="<?php echo $row['password']; ?>">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="hidden" name="role" value="staff">
                  </div>
                   <div class="card-footer">
                  <button type="submit" name="update" class="btn btn-success">Update</button>
              <a class="btn btn-warning" href="user.php" role="button">Cancel</a>

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