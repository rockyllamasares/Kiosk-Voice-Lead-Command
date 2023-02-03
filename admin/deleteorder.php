<?php 
include_once("../connection/conn.php");
$conn = connection();

if(isset($_POST['delete'])){

	$id = $_POST['id'];

	$sql = "DELETE FROM orderlist WHERE order_number = '$id'";
	$conn->query($sql) or die ($conn->error);

	header('Location: orders.php?success=Record deleted successfully');

}

 ?>