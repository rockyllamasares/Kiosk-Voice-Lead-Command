<?php
include_once("connection/conn.php");

$conn = connection();
$txt = 'Welcome customer, please choose your table number. Thank you.';
$txt = htmlspecialchars($txt);
$txt = rawurlencode($txt);
$html = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $txt . '&tl=en-US');
$player = "<audio hidden autoplay><source src='data:audio/mpeg;base64," . base64_encode($html) . "'></audio>";
echo $player;
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
  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/custom.css">
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
              Welcome customer.
            </div>
            <!-- /.card-body -->
          </div>
        </div>

        <br>
        <!-- Profile Image -->
        <section class="content">

          <!-- Default box -->



          <!-- /.col -->
      </div>
      <div class="col-md-8">
        <div class="card card-primary card-outline pr-2">
          <div class="card-header text-center">
            <h3><b>Please choose your table number below:</b></h3>
          </div>
          <div class="col-12">
            <div class="card-body">
              <div class="row">
                <?php
                $sql = "SELECT * FROM tablenums WHERE status = 'available'";
                $employees = $conn->query($sql) or die($conn->error);
                $row = $employees->fetch_assoc();
                if ($row['id'] == null): ?>

                <?php else: ?>
                              <?php do { ?>

                                            <div class="col-sm-2">
                                              <a href="step1.php?tblnum=<?php echo $row['table_number']; ?>">
                                                <div class="container mb-3">
                                                  <img src="img/1f7e6.png" alt="Snow" style="width:100%;">

                                                  <div class="centered" style="color: white;">
                                                    <h1><b>
                                                        <?php echo $row['table_number']; ?>
                                                      </b></h1>
                                                  </div>
                                                </div>
                                              </a>
                                            </div>

                              <?php } while ($row = $employees->fetch_assoc()) ?>
                <?php endif; ?>
              </div>
            </div>

          </div>

        </div>
        <!-- /.card -->
      </div>

    </div>
    <!-- /.card-body -->
    <style>
      .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    </style>
    </style>
  </div>
</section>
<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
</body>

</html>