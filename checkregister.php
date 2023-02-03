	<?php 
session_start(); 
include "connection/conn.php";
$conn = connection();
if (isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['password2'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$name = validate($_POST['name']);
	$uname = validate($_POST['username']);
	$pass = validate($_POST['password']);
	$num = validate($_POST['number']);
	$re_pass = validate($_POST['password2']);
	$email = validate($_POST['email']);
	$role = validate($_POST['role']);
	$user_data = 'username='. $uname. '&email='. $email;


	if (empty($uname)) {
		header("Location: index.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: index.php?error=Password is required&$user_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: index.php?error=Email is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: index.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        //$pass = md5($pass);

	    $sql = "SELECT * FROM user WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			//header("Location: register.php?error=The username is taken try another&$user_data");
			header("Location: index.php?error=The email is already taken&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO `user`(`name`,`username`, `email`, `contact`, `password`, `role`) VALUES ('$name','$uname','$email','$num','$pass','$role')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: login.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: index.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}