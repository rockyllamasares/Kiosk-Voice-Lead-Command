<?php
include_once("../connection/conn.php");

$conn = connection();
if(isset($_POST['submit'])){

 $stat = 'available';
$begin = $_POST['begin'];
$end = $_POST['end'];
//$sql = "INSERT INTO tablenums (table_number) VALUES ";
//$vals = array();

for($i = $begin; $i <= $end; $i ++) { 
  $sql = "SELECT * FROM tablenums WHERE table_number = '$i'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
       header("Location: addtable.php?error=Table number already exist"); 
          exit();
    }else{
   $conn->query("INSERT INTO tablenums (table_number, status) VALUES (".$i.",'$stat')");
}
}
 
  header('Location: table.php?success=Records added');

}
?>
<?php include_once("header.php"); ?>
    <section class="content-header">
        <div class="row mb-2 mt-5">
          <div class="col-sm-4">
          </div>
          <div class="col-sm-6">
            <div class="card card-primary">
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
              <div class="card-header">
                <h3 class="card-title">Add new tables</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label>Table number from</label>
                    <input class="form-control" type="text" name="begin" required="">
                  </div>
                   <div class="form-group">
                    <label>Table number to</label>
                    <input class="form-control" type="text" name="end" required="">
                  </div>
                   <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              <a class="btn btn-warning" href="table.php" role="button">Cancel</a>

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