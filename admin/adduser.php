<?php
include_once("../connection/conn.php");

$conn = connection();
if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $uname = $_POST['uname'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $pass = $_POST['password'];
  $role = $_POST['role'];

  $sql = "INSERT INTO `user`( `name`, `username`, `email`, `contact`, `password`, `role`) VALUES ('$name','$uname','$email','$contact','$pass','$role')";
  $conn->query($sql) or die ($conn->error);

  

  header('Location: user.php?success=Record added');

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
                    <input class="form-control" type="text" name="name" required="">
                  </div>
                   <div class="form-group">
                    <label>Username</label>
                    <input class="form-control" type="text" name="uname" required="">
                  </div>
                   <div class="form-group">
                    <label>E-mail</label>
                    <input class="form-control" type="email" name="email" required="">
                  </div>
                   <div class="form-group">
                    <label>Contact Number</label>
                    <input class="form-control" type="phone" name="contact" required="">
                  </div>
                   <div class="form-group">
                    <label>Password</label>
                    <input class="form-control" type="text" name="password" required="">
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="hidden" name="role" value="admin">
                  </div>
                   <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-warning" href="user.php" role="button">Cancel</a>

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