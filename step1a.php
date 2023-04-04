<?php
include_once("connection/conn.php");
session_start();
$conn     = connection();
$tblnum   = $_POST['tblnum'];
$ordernum = $_POST['ordernum'];
$sql      = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
if (isset($_POST['back'])) {
  $txt    = 'Please finalise your order.';
  $txt    = htmlspecialchars($txt);
  $txt    = rawurlencode($txt);
  $html   = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $txt . '&tl=en-US');
  $player = "<audio hidden autoplay><source src='data:audio/mpeg;base64," . base64_encode($html) . "'></audio>";
  echo $player;
}
if (isset($_POST['delete'])) {

  $id  = $_POST['id'];
  $sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
  $data = $conn->query($sql) or die($conn->error);
  $row = $data->fetch_assoc();
  if ($row['order_details'] == null) {
    //header("Location: register.php?error=The username is taken try another&$user_data");
    header("Location: step1.php");
    exit();
  } else {
    $sql = "DELETE FROM orderlist WHERE id = '$id'";
    $conn->query($sql) or die($conn->error);

    $txt    = 'order canceled.';
    $txt    = htmlspecialchars($txt);
    $txt    = rawurlencode($txt);
    $html   = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $txt . '&tl=en-US');
    $player = "<audio hidden autoplay><source src='data:audio/mpeg;base64," . base64_encode($html) . "'></audio>";
    echo $player;
  }
}
if (isset($_POST['add'])) {
  $tblnum     = $_POST['tblnum'];
  $name       = $_POST['name'];
  $qty        = $_POST['qty'];
  $price      = $_POST['price'];
  $totalprice = $price * $qty;

  $sql = "INSERT INTO `orderlist`( `table_number`,`order_number`, `order_details`, `order_quantity`, `total_price`) VALUES ('$tblnum','$ordernum','$name','$qty','$totalprice')";
  $conn->query($sql) or die($conn->error);

  $txt    = 'You add' . $name . 'with a quantity of' . $qty . 'and a total price of' . $totalprice . 'pesos';
  $txt    = htmlspecialchars($txt);
  $txt    = rawurlencode($txt);
  $html   = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $txt . '&tl=en-US');
  $player = "<audio hidden autoplay><source src='data:audio/mpeg;base64," . base64_encode($html) . "'></audio>";
  echo $player;
}
if (isset($_POST['update'])) {
  $price      = $_POST['price'];
  $name       = $_POST['name'];
  $qty        = $_POST['qty'];
  $totalprice = $price * $qty;

  $sql = "UPDATE orderlist SET order_details ='$name',order_quantity ='$qty',total_price ='$totalprice' WHERE order_number = '$ordernum'";
  $conn->query($sql) or die($conn->error);

  $txt    = 'You add' . $name . 'with a quantity of' . $qty . 'and a total price of' . $totalprice;
  $txt    = htmlspecialchars($txt);
  $txt    = rawurlencode($txt);
  $html   = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $txt . '&tl=en-US');
  $player = "<audio hidden autoplay><source src='data:audio/mpeg;base64," . base64_encode($html) . "'></audio>";
  echo $player;
}
//$voice->Speak($word);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
              <img class="profile-user-img img-fluid img-square" src="admin/img/admin.png" height="50" width="50"
                class="pl-2" style="opacity: .8"><br>
              <hr>

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

                <div class="col-12 d-flex align-items-left justify-content-left">
                  <div class="">
                    <?php
                    $ordernum = $_POST['ordernum'];
                    ?>


                    <?php
                    $sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();
                    if ($row['order_details'] == null): ?>
                      <span class="text-danger">Please add order.</span>
                    <?php else: ?>
                      <h6><strong>Table Number:
                          <?php echo $row['table_number']; ?>
                        </strong></h6>
                      <h6><strong>Order Number:
                          <?php echo $row['order_number']; ?>
                        </strong></h6>
                      <h6><strong>Order Details: </strong></h6>

                      <?php do { ?>

                        <b>
                          <?php echo $row['order_details']; ?>
                        </b>
                        (
                        <?php echo $row['order_quantity'] . ' order/s'; ?>)-----&#8369;
                        <?php echo $row['total_price'] . '.00'; ?><br>
                        <form method="post">
                          <button name="delete" class="btn btn-danger btn-sm"><i class="fas fa-trash">
                            </i><small> Cancel</small></button>
                          <input type="hidden" name="tblnum" value="<?php echo $row['table_number']; ?>">
                          <input type="hidden" name="ordernum" value="<?php echo $row['order_number']; ?>">
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        </form>
                      <?php } while ($row = $employees->fetch_assoc()) ?>
                    <?php endif; ?>

                    <?php
                    $sql = "SELECT * FROM orderlist WHERE order_number = '$ordernum'";
                    $employees = $conn->query($sql) or die($conn->error);
                    $row = $employees->fetch_assoc();

                    if ($row['id'] == null): ?>

                    <?php else: ?>
                      <?php do { ?>

                        <?php $total = $total + $row['total_price']; ?>

                      <?php } while ($row = $employees->fetch_assoc()) ?>
                    <?php endif; ?>
                    <br>
                    <?php echo 'Total Price is: ----- &#8369;' . $total . '.00'; ?>
                    <p class="lead mb-5"><br>

                    </p>
                  </div>
                </div>
                <div>
                  <form method="post" action="step2.php">
                    <input type="hidden" name="ordernum" value="<?php echo $ordernum; ?>">
                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    <button type="submit" name="process" class="btn btn-success btn-block">Check-out Order</button>
                  </form>
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
                <?php do { ?>

                  <a class="btn btn-info" href="javascript:void(0)" data-filter="<?php echo $row['category_name']; ?>">
                    <?php echo $row['category_name']; ?> </a>


                <?php } while ($row = $cat->fetch_assoc()) ?>

              </div>
            </div>
            <div>
              <div class="filter-container p-0 row">
                <?php

                $sql = "SELECT * FROM category";
                $cat = $conn->query($sql) or die($conn->error);
                $row = $cat->fetch_assoc(); ?>
                <?php do {
                  $prod = $row['category_name'];
                  $sql = "SELECT * FROM product WHERE product_type LIKE '$prod' AND status = 'enabled'";
                  $employees = $conn->query($sql) or die($conn->error);
                  $row = $employees->fetch_assoc();
                  ?>
                  <?php do { ?>

                    <form method="post" action="step1a.php">
                      <div class="filtr-item col-sm- pt-3 pl-4" data-category="<?php echo $row['product_type']; ?>" data-sort="black sample">
                    
                        <img src="<?php echo (!empty($row['product_pic']))? 'admin/img/'.$row['product_pic']:'img/admin.png'; ?>" width="270px" height="150px" alt="white sample"/><br>
                        <label><?php echo $row['product_name']; ?></label><br>
                        <label><?php echo '&#8369;'.$row['product_price']; ?></label>
                        <input type="hidden" name="price" value="<?php echo $row['product_price']; ?>">
                        <input type="hidden" name="name" value="<?php echo $row['product_name']; ?>">
                         
                    
                      <div class="row">
                        <div class="pl-2">
                          <input type="number" min="1" value=" " required class="w-25 default-1" name="qty" placeholder="0"><br>
                          Quantity
                        </div>
                         <div class="pl-3">
                          <input type="hidden" name="tblnum" value="<?php echo $tblnum; ?>">
                          <input type="hidden" name="ordernum" value="<?php echo $ordernum; ?>">
                          <button type="submit" name="add" class="btn btn-primary btn-sm">Add</button>
                        </div>
                      </div>
                      
                    </div>
            
                    </form>
                  
                  <?php } while ($row = $employees->fetch_assoc()) ?>
                <?php } while ($row = $cat->fetch_assoc()) ?>





              </div>
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
<!--<script src="template/dist/js/demo.js"></script> AdminLTE for demo purposes -->

<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({ gutterPixels: 3 });
    $('.btn[data-filter]').on('click', function () {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>

</html>