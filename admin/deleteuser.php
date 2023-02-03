<?php 
include_once("../connection/conn.php");
$conn = connection();

if(isset($_POST['delete'])){

	$id = $_POST['id'];

	$sql = "DELETE FROM user WHERE id = '$id'";
	$conn->query($sql) or die ($conn->error);

	header('Location: user.php?success=User record deleted successfully');

}

 ?>