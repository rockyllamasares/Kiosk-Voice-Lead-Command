
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kiosk Voice Lead Command</title>
  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">
  <!-- style for landing page -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <!-- style for landing page -->

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
                  <img class="profile-user-img img-fluid img-square" src="admin/img/admin.png" height="50" width="50" class="pl-2"  style="opacity: .8"><br><hr>      
                Welcome customer.
              </div>
              <!-- /.card-body -->
            </div>
          </div>
           
<br>
            <!-- Profile Image -->
<section class="content">

      <!-- Default box -->
    <form method="post" action="step0.php">
              <button type="submit" name="process" class="btn btn-success btn-block">Start Ordering</button>
            </form>
      <br>
      <?php
if(isset($_POST['submit'])){
  $txt=$_POST['txt'];
  $txt=htmlspecialchars($txt);
  $txt=rawurlencode($txt);
  $html=file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q='.$txt.'&tl=en-US');
  $player="<audio hidden autoplay><source src='data:audio/mpeg;base64,".base64_encode($html)."'></audio>";
  echo $player;
}
?>
      <form method="post">
        <div class="card"> 
          <input type="hidden" name="txt"  value="These are the steps for ordering. Step 1, Start Ordering. Step 2, Take Order. Step 3, Confirm Order. Step 4, Printing order receipt. Thank you.">
      <button type="submit" name="submit" class="btn btn-primary btn-block">Steps for Ordering</button>
      </div>
      </form>
       
          <!-- /.col -->
        </div>
        <div class="col-md-8">
            <div class="card card-primary card-outline pr-2">
              <div class="card-body">
              <main class="main">
  <section class="home-slider position-relative pt-50">
    <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
      <div class="single-hero-slider single-animation-wrap">
        <div class="container">
          <div class="row align-items-center slider-animated-1">
            <div class="col-lg-5 col-md-6">
              <div class="hero-slider-content-2">
                <h4 class="animated">Trade-in offer</h4>
                <h2 class="animated fw-900">Supper value deals</h2>
                <h1 class="animated fw-900 text-brand">On all products</h1>
                <p class="animated">Save more with coupons & up to 70% off</p>
                <!-- start ordering button -->
                <br>
                <?php
                if (isset($_POST['submit'])) {
                  $txt = $_POST['txt'];
                  $txt = htmlspecialchars($txt);
                  $txt = rawurlencode($txt);
                  $html = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $txt . '&tl=en-US');
                  $player = "<audio hidden autoplay><source src='data:audio/mpeg;base64," . base64_encode($html) . "'></audio>";
                  echo $player;
                }
                ?>
                <!-- start ordering button -->
                <!-- step for Ordering button -->
                <!-- <form method="post">
                  <div class="card">
                    <input type="hidden" name="txt"
                      value="These are the steps for ordering. Step 1, Start Ordering. Step 2, Take Order. Step 3, Confirm Order. Step 4, Printing order receipt. Thank you.">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Steps for Ordering</button>
                  </div>
                </form> -->
                <!-- step for Ordering button -->
              </div>
            </div>
            <div class="col-lg-7 col-md-6">
              <div class="single-slider-img single-slider-img-1">
                <img class="animated slider-1-1" src="assets/imgs/slider/slider-1.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="single-hero-slider single-animation-wrap">
        <div class="container">
          <div class="row align-items-center slider-animated-1">
            <div class="col-lg-5 col-md-6">
              <div class="hero-slider-content-2">
                <h4 class="animated">Hot promotions</h4>
                <h2 class="animated fw-900">Fashion Trending</h2>
                <h1 class="animated fw-900 text-7">Great Collection</h1>
                <p class="animated">Save more with coupons & up to 20% off</p>
                <!-- start ordering button -->
                <br>
                <?php
                if (isset($_POST['submit'])) {
                  $txt = $_POST['txt'];
                  $txt = htmlspecialchars($txt);
                  $txt = rawurlencode($txt);
                  $html = file_get_contents('https://translate.google.com/translate_tts?ie=UTF-8&client=gtx&q=' . $txt . '&tl=en-US');
                  $player = "<audio hidden autoplay><source src='data:audio/mpeg;base64," . base64_encode($html) . "'></audio>";
                  echo $player;
                }
                ?>
                <!-- start ordering button -->
                <!-- step for Ordering button -->
                <!-- <form method="post">
                  <div class="card">
                    <input type="hidden" name="txt"
                      value="These are the steps for ordering. Step 1, Start Ordering. Step 2, Take Order. Step 3, Confirm Order. Step 4, Printing order receipt. Thank you.">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Steps for Ordering</button>
                  </div>
                </form> -->
                <!-- step for Ordering button -->
              </div>
            </div>
            <div class="col-lg-7 col-md-6">
              <div class="single-slider-img single-slider-img-1">
                <img class="animated slider-1-2" src="assets/imgs/slider/slider-2.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="slider-arrow hero-slider-1-arrow"></div>
  </section>


</main>
              </div>
              
            </div>
            <!-- /.card -->
          </div>
  
        </div>
        <!-- /.card-body -->
       
      </div>
    </section>

<!-- ================================================ -->
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/plugins/slick.js"></script>
<script src="assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="assets/js/plugins/wow.js"></script>
<script src="assets/js/plugins/jquery-ui.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.js"></script>
<script src="assets/js/plugins/magnific-popup.js"></script>
<script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/plugins/waypoints.js"></script>
<script src="assets/js/plugins/counterup.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/images-loaded.js"></script>
<script src="assets/js/plugins/isotope.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/jquery.vticker-min.js"></script>
<script src="assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="assets/js/main.js?v=3.3"></script>
<script src="assets/js/shop.js?v=3.3"></script>
<!-- ====================================================== -->
<!-- jQuery -->
<script src="template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
</body>
</html>
