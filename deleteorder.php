<?php 
include_once("connection/conn.php");
$conn = connection();
$ordernum = $_POST['ordernum'];
$sql = "SELECT * FROM orderlist WHERE order_number ='$ordernum'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
if(isset($_POST['delete'])){

	$id = $_POST['id'];

	$sql = "DELETE FROM orderlist WHERE id = '$id'";
	$conn->query($sql) or die ($conn->error);

	header('Location: step1a.php?ordernum='.$ordernum);

}

 ?>