 <?php
include_once("../connection/conn.php");
$conn = connection();
$sql = "SELECT * FROM user";
$employees = $conn->query($sql) or die($conn->error);
$row = $employees->fetch_assoc();
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
<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">User List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
         <?php if (isset($_GET['success'])) { ?>  
               <div class="alert alert-success alert-dismissible fade show" role="alert">
               <?php echo $_GET['success']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php } ?>
          <?php if (isset($_GET['error'])) { ?>  
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <?php echo $_GET['error']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php } ?>
        <div class="row">
           <!--a href="adduser.php"><button class="btn btn-primary">+ Add new user</button></a-->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  + Add new User
                </button>
                 <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add new User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
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
                    <input class="form-control" type="hidden" name="role" value="Admin">
                  </div>
                   <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>

                </div>
                    </div>

                  
              </form>
              
            </div>
            <!--div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="index.php"><button type="button" class="btn btn-primary">Save changes</button></a>
              
            </div-->
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
          <div class="col-12">
            <div class="card">
             
              <!-- /.card-header -->
            
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped pl-1">
                  <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Contact Number</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Date Registered</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sql = "SELECT * FROM user ORDER BY name DESC";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();
                   if($row['id'] == null): ?>
                                      
                  <?php else: ?>
                  <?php do{ ?>
                  <tr>
                    <td><small><?php echo $row['name']; ?></small></td>
                    <td><small><?php echo $row['username']; ?></small></td>
                    <td><small><?php echo $row['email']; ?></small></td>
                    <td><small><?php echo $row['contact']; ?></small></td>
                    <td><small><?php echo $row['password']; ?></small></td>
                    <td><small><?php echo $row['role']; ?></small></td>
                    <td><small><?php echo $row['date_register']; ?></small></td>
                    <td class="text-center"><div class="row"><div><a href="edituser.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i><small> Edit</small></button></a></div>
                    
                      <div><form action="deleteuser.php" method="post">
                      <button name="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                              </i><small> Delete</small></button>
                  
                      <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    </form></div> </div>
                    </td>
                  </tr>
                  <?php }while($row = $employees->fetch_assoc()) ?><?php endif; ?>
                  </tbody>
                 
                </table>
              </div>
              <!-- /.card-body -->
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
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 6.9.0
    </div>
    <strong>Copyright &copy; 2022 <a href="">Order System</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../template/plugins/jszip/jszip.min.js"></script>
<script src="../template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="../template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="../template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../template/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
