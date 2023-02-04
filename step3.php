<?php
include_once("connection/conn.php");
session_start();
$conn = connection();
$ordernum = $_POST['ordernum'];
if(isset($_POST['process'])){
	
  $txt='Order receipt printing.';
  $txt=htmlspecialchars($txt);
  $txt=rawurlencode($txt);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-US');
  $player="<audio hidden autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
  echo $player;

  //$sql = "UPDATE orderlist SET order_stat = 1, order_option = 'locked' WHERE order_number = '$ordernum'";
  //$conn->query($sql) or die ($conn->error);
}
//$voice->Speak($word);
 echo "Printing...";
 echo $ordernum;
 $sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();
                    $tablenum = $row['table_number'];
/* Call this file 'hello-world.php' */
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/**
 * Install the printer using USB printing support, and the "Generic / Text Only" driver,
 * then share it (you can use a firewall so that it can only be seen locally).
 *
 * Use a WindowsPrintConnector with the share name to print.
 *
 * Troubleshooting: Fire up a command prompt, and ensure that (if your printer is shared as
 * "Receipt Printer), the following commands work:
 *
 *  echo "Hello World" > testfile
 *  copy testfile "\\%COMPUTERNAME%\Receipt Printer"
 *  del testfile
 */
try {
    // Enter the share name for your USB printer here
    //$connector = null;
    $connector = new WindowsPrintConnector("POS58 Printer");

    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    $printer -> text("ORDER SYSTEM\n\nOrder Number: ".$ordernum."\nTable Number: ".$tablenum."\n\n--------------------------------");
    $printer -> cut();
    
    /* Close printer */
    $printer -> close();
} catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}

?>
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
$tablenum = $row['table_number'];
  }
$sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
/*if(isset($_POST['process'])){
  $txt='Your order are listed with a total price of'.$total.'pesos';
  $txt=htmlspecialchars($txt);
  $txt=rawurlencode($txt);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-US');
  $player="<audio hidden autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
  echo $player;
}*/

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
          <?php 
                    $sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();

                   if($row['id'] == null): ?>
                                      
                  <?php else: ?>
          <h3 class="card-title">Table Number: <?php echo $row['table_number']; ?><br>Order Number: <?php echo $row['order_number']; ?></h3>

          <div class="card-tools">
           
          </div>
        </div>
        <div class="card-body">
          <section class="content">

      <!-- Default box -->
     
                 <div class="col-12 d-flex align-items-left justify-content-left">
            <div class="">
                <h6><strong>Order Details: </strong></h6>
                  <?php do{ ?>
                
                  <b><?php echo $row['order_details']; ?></b>
                    (<?php echo $row['order_quantity'].' order/s'; ?>)
                  <?php echo $row['total_price'].'.00'; ?><br>
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
                    <?php echo 'Total Price is: '.$totalp.'.00'; ?>
              <p class="lead mb-5"><br>
               
              </p>
            <form method="get" action="step1.php">
                        <input type="hidden" name="tblnum" value="<?php echo $tablenum; ?>">
                      <button type="submit" class="btn btn-success"><i class="fas fa-plus">
                              </i><small> Add Order</small></button>
                      
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
