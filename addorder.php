<?php
include_once("connection/conn.php");

$conn = connection();
$ordernum = $_POST['ordernum'];
$sql = "SELECT * FROM orderlist WHERE order_number ='$ordernum'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
if(isset($_POST['update'])){
  $price = $_POST['price'];
  $name = $_POST['name'];
  $qty = $_POST['qty'];
  $totalprice = $price * $qty;
  
  $sql = "UPDATE orderlist SET order_details ='$name',order_quantity ='$qty',total_price ='$totalprice' WHERE order_number = '$ordernum'";
  $conn->query($sql) or die ($conn->error);

  
  header('Location: step1a.php?ordernum='.$ordernum);

}
?>