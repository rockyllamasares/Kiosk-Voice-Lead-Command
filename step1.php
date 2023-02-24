<?php
include_once("connection/conn.php");

$conn = connection();
$tblnum = $_GET['tblnum'];
 $sql = "UPDATE tablenums SET status ='taken' WHERE table_number = '$tblnum'";
  $conn->query($sql) or die ($conn->error);
 $txt='Table number'.$tblnum.' selected, Please choose your order.';
  $txt=htmlspecialchars($txt);
  $txt=rawurlencode($txt);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-US');
  $player="<audio hidden autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
  echo $player;
$letters = '';
    $numbers = '';
    foreach (range('A', 'Z') as $char) {
        $letters .= $char;
    }
    for($i = 0; $i < 5; $i++){
      $numbers .= $i;
    }
    $ordernum = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 3);
    $sql = "INSERT INTO `orderlist`( `table_number`,`order_number`) VALUES ('$tblnum','$ordernum')";
  $conn->query($sql) or die ($conn->error);
//$voice->Speak($word);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  
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
     
          <div class="col-12 text-center d-flex align-items-left justify-content-left">
            <div class="">
               <h5><strong>Table Number: <?php echo $tblnum; ?></strong></h5>
              <h5><strong>Order Number: <?php echo $ordernum; ?></strong></h5>
              <p class="lead mb-5"><br>
               
              </p>
            </div>
          </div>
       
    </section>
        </div>
        <!-- /.card-body -->
       
      </div>
          <!-- /.col -->
        </div>
        <div class="col-md-8">
            <div class="card card-primary card-outline pr-2">
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info" href="javascript:void(0)" data-filter="all"> All Meals </a>
                    <?php 
                    $sql = "SELECT * FROM category";
                    $cat = $conn->query($sql) or die($conn->error);
                    $row = $cat->fetch_assoc(); 
                    ?>
                  <?php do{ ?>

                    <a class="btn btn-info" href="javascript:void(0)" data-filter="<?php echo $row['category_name']; ?>"> <?php echo $row['category_name']; ?> </a>
                

                    <?php }while($row = $cat->fetch_assoc()) ?>

                  </div>
                </div>
               
                  <div class="filter-container p-0 row">
                     <?php

                    $sql = "SELECT * FROM category";
                    $cat = $conn->query($sql) or die($conn->error);
                    $row = $cat->fetch_assoc(); 
                     if($row['id'] == null): ?>
                                      
                  <?php else: ?>
                    <?php do{ 
                    $prod = $row['category_name'];
                    $sql = "SELECT * FROM product WHERE product_type LIKE '$prod'";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();
                   if($row['id'] == null): ?>
                                      
                  <?php else: ?>
                  <?php do{ ?>

                    
                    <form method="post" action="step1a.php">
                      <div class="filtr-item col-sm- pt-3 pl-4" data-category="<?php echo $row['product_type']; ?>" data-sort="black sample">
                    
                        <img src="<?php echo (!empty($row['product_pic']))? 'admin/img/'.$row['product_pic']:'img/admin.png'; ?>" width="270px" height="150px" alt="white sample"/><br>
                        <label><?php echo $row['product_name']; ?></label><br>
                        <label><?php echo '&#8369;'.$row['product_price']; ?></label>
                        <input type="hidden" name="price" value="<?php echo $row['product_price']; ?>">
                        <input type="hidden" name="name" value="<?php echo $row['product_name']; ?>">
                         
                    
                      <div class="row">
                        <div class="pl-2">
                          <input type="number" min="1" value="0" required class="w-25 default-1" name="qty">
                        </div>
                         <div class="pl-3">
                          <input type="hidden" name="tblnum" value="<?php echo $tblnum; ?>">
                          <input type="hidden" name="ordernum" value="<?php echo $ordernum; ?>">
                          <button type="submit" name="update" class="btn btn-primary btn-sm">Add</button>
                        </div>
                      </div>
                      
                    </div>
            
                    </form>
                   <?php }while($row = $employees->fetch_assoc()) ?><?php endif; ?>
                 <?php }while($row = $cat->fetch_assoc()) ?><?php endif; ?>
                 
                </div>

              </div>
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
