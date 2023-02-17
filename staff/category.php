<?php
include_once("../connection/conn.php");
$conn = connection();
$sql  = "SELECT * FROM user";
$employees = $conn->query($sql) or die($conn->error);
$row = $employees->fetch_assoc();
if (isset($_POST['submit'])) {

  $name = $_POST['category_name'];

  $sql = "INSERT INTO `category`( `category_name`) VALUES ('$name')";
  $conn->query($sql) or die($conn->error);



  header('Location: category.php?success=Record added');

}

if (isset($_POST['delete'])) {

  $id = $_POST['id'];

  $sql = "DELETE FROM category WHERE id = '$id'";
  $conn->query($sql) or die($conn->error);

  header('Location: category.php?success=User record deleted successfully');

}

if (isset($_POST['update'])) {

  $cname = $_POST['cname'];
  $id    = $_POST['id'];

  $sql = "UPDATE category SET category_name ='$cname' WHERE id = '$id'";
  $conn->query($sql) or die($conn->error);

  header('Location: category.php?success=Record updated successfully');

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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
            <h1>Category List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>
              <li class="breadcrumb-item active">Category List</li>
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
          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
            + Add new Category
          </button> -->
          <div class="modal fade" id="add">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add new Category</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <!-- form start -->
                  <form method="post">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Category Name</label>
                        <input class="form-control" type="text" name="category_name" required="">
                      </div>
                      <div class="form-group">
                        <input class="form-control" type="hidden" name="role" value="staff">
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
                      <th>Category Name</th>
                      <th>Date Created</th>
                      <!-- <th>Action</th> -->
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $sql = "SELECT * FROM category ORDER BY date_created DESC";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();
                    if ($row['id'] == null): ?>

                    <?php else: ?>
                      <?php do { ?>
                        <tr>
                          <td><small>
                              <?php echo $row['category_name']; ?>
                            </small></td>
                          <td><small>
                              <?php echo $row['date_created']; ?>
                            </small></td>
                          <!-- <td>
                            <div class="row">
                              <form method="post">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="button" name="getid" class="btn btn-warning btn-sm pr-2" data-toggle="modal"
                                  data-target="#edit">
                                  Edit
                                </button>
                              </form>




                              <div>
                                <form method="post">
                                  <button name="delete" class="btn btn-danger btn-sm pl-2"><i class="fas fa-trash">
                                    </i><small> Delete</small></button>
                                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                </form>
                              </div>
                            </div>
                          </td> -->
                        </tr>
                      <?php } while ($row = $employees->fetch_assoc()) ?>
                    <?php endif; ?>
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

  <div class="modal fade" id="edit">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add new Category</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- form start -->
          <?php
          if (isset($_POST['getid'])) {
            $id  = $_POST['id'];
            $sql = "SELECT * FROM user WHERE id ='$id'";
            $data = $conn->query($sql) or die($conn->error);
            $row = $data->fetch_assoc();
          }
          ?>
          <form method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Category Name</label>
                <input class="form-control" type="text" name="cname" required=""
                  value="<?php echo $row['category_name']; ?>">
              </div>

              <div class="card-footer">
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
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