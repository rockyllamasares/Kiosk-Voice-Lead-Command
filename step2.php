<?php
include_once("connection/conn.php");
session_start();
$conn = connection();


$ordernum = $_GET['ordernum'];
$total = $_POST['total'];
if(isset($_POST['process'])){
$ordernum = $_POST['ordernum'];
$sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
  }
$sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
if(isset($_POST['process'])){
  $txt='Your order are listed with a total price of'.$total.'pesos';
  $txt=htmlspecialchars($txt);
  $txt=rawurlencode($txt);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-US');
  $player="<audio hidden autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
  echo $player;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
</head>
<style type="text/css">
  
</style>
<section class="content">

      <!-- Default box -->
  
          <div class="container-fluid pt-5 pl-5">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-header text-center">
                <h3><b>Order System</b></h3>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-square" src="admin/img/admin.png" height="50" width="50" class="pl-2"  style="opacity: .8"><br><hr>      
                
              </div>
              <!-- /.card-body -->
            </div>
          </div>
           

            <!-- Profile Image -->
<section class="content">

          <!-- /.col -->
        </div>
        <div class="col-md-8">

      <!-- Default box -->
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title">Your Order</h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
          <section class="content">

      <!-- Default box -->
     
                 <div class="col-12 d-flex align-items-left justify-content-left">
            <div class="">
                
               <?php 
                    $sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();

                   if($row['id'] == null): ?>
                                      
                  <?php else: ?>
                    <h6><strong>Table Number: <?php echo $row['table_number']; ?></strong></h6>
                    <h6><strong>Order Number: <?php echo $row['order_number']; ?></strong></h6>
                <h6><strong>Order Details: </strong></h6>
                  <?php do{ ?>
                
                  <b><?php echo $row['order_details']; ?></b>
                    (<?php echo $row['order_quantity'].' order/s '; ?>)-----&#8369;
                  <?php echo $row['total_price'].'.00'; ?><br>
                   <!--form action="deleteorder2.php" method="post">
                      <button name="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                              </i><small> Cancel</small></button>
                              <input type="hidden" name="ordernum" value="<?php //echo $row['order_number']; ?>">
                      <input type="hidden" name="id" value="<?php //echo $row['id']; ?>">
                    </form-->
                  <?php }while($row = $employees->fetch_assoc()) ?><?php endif; ?>

                   <?php 
                    $sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();

                   if($row['id'] == null): ?>
                                      
                  <?php else: ?>
                  <?php do{ ?>

                    <?php $totalp = $total; ?>

                    <?php }while($row = $employees->fetch_assoc()) ?><?php endif; ?>
                    <br>
                    <?php echo 'Total Price is:-----&#8369;'.$totalp.'.00'; ?>
              <p class="lead mb-5"><br>
               
              </p>
            </div>
          </div>
          <div class="row">
            <div>
              <form method="post" action="step3.php">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <input type="hidden" name="ordernum" value="<?php echo $ordernum; ?>">
              <button type="submit" name="process" class="btn btn-success btn-sm btn-block">Confirm Order</button>
            </form>
            </div>
            <div class="pl-3">
<form method="post" action="step1a.php">
  <input type="hidden" name="ordernum" value="<?php echo $ordernum; ?>">
              <button type="submit" name="back" class="btn btn-warning btn-sm btn-block">Back to Menu</button>
            </form>
            </div>
            
            
          </div>
          
     

    </section>
        </div>
        <!-- /.card-body -->
       
      </div>
          </div>
              </div>
              
            </div>
            <!-- /.card -->
          </div>
  
        </div>
        <!-- /.card-body -->
       
      </div>
    </section>
<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--script src="template/dist/js/demo.js"></script-->

<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ekko Lightbox -->
<script src="template/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- Filterizr-->
<script src="template/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!--script src="template/dist/js/demo.js"></script-->
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>
</html>
