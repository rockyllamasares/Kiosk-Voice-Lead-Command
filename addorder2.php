<?php
include_once("connection/conn.php");

$conn = connection();
$ordernum = $_POST['ordernum'];
$sql = "SELECT * FROM orderlist WHERE order_number ='$ordernum'";
$data = $conn->query($sql) or die($conn->error);
$row = $data->fetch_assoc();
if(isset($_POST['update'])){

  $name = $_POST['name'];
  $qty = $_POST['qty'];
  $price = $_POST['price'];
  $totalprice = $price * $qty;
  
  $sql = "INSERT INTO `orderlist`( `order_number`, `order_details`, `order_quantity`, `total_price`) VALUES ('$ordernum','$name','$qty','$totalprice')";
  $conn->query($sql) or die ($conn->error);

  header('Location: step1a.php?ordernum='.$ordernum);

}
?>