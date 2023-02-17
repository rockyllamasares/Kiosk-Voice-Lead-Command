
<?php
include_once("../connection/conn.php");
session_start();
$conn = connection();
if(isset($_POST['submit'])){  
  $email = $_POST['email'];
  $password = $_POST['password'];
   
  $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

  $user = $conn->query($sql) or die ($conn->error);
  $row = $user->fetch_assoc();
  $total = $user->num_rows;

  
  $_SESSION['login'] = $row['id'];
  $_SESSION['Role'] = $row['role'];
  if(($_SESSION['login'] == 1) AND ($_SESSION['Role'] == 'Admin')){
    header('Location: home.php'); 

  }

  $_SESSION['Role'] = $row['role'];
  if(($_SESSION['Role'] == 'staff') OR ($_SESSION['Role'] == 'Staff')){
      $_SESSION['username'] = $email;
    header('Location: ../staff/index.php'); 

  }

  $_SESSION['Role'] = $row['role'];
  if(($_SESSION['Role'] == 'client') OR ($_SESSION['Role'] == 'Client')){
      $_SESSION['username'] = $email;
    header('Location: client/clientaccount.php'); 

  }

  $_SESSION['Role'] = $row['role'];
  if(($_SESSION['Role'] == 'user') OR ($_SESSION['Role'] == 'User')){
     $_SESSION['username'] = $email;
    header('Location: user/index.php'); 

  }else{
    echo '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
               Wrong email or password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <style>
    .error {color:#FF0000;}
  </style>
	<h2></h2>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
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
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">

      <a href="index.php" class="h1"><b>ORDER SYSTEM<br>Log-in</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post" id="quickForm">
         <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
         <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-sm">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form><br>
      <!--<p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>-->
     
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../template/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../template/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="../template/dist/js/adminlte.min.js"></script>
<script>
$(function () {
  $('#quickForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 0
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

</body>
</html>