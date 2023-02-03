
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
                       <img src="img/11.jpg" height="450" width="100%">
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
</body>
</html>
