<?php 
include_once("../connection/conn.php");
$conn = connection();

// Check if the delete button was clicked
if (isset($_POST['delete'])) {
  // Get the order number from the hidden input
  // $order_number = $_POST['id'];
  $id = $_POST['id'];

  // Fetch the row from the orderlist table
  $sql = "SELECT * FROM orderlist WHERE id = '$id'";
  $result = $conn->query($sql);

  // If the row exists, insert it into the other table and delete it from the orderlist table
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $order_number = $row['order_number'];
    $table_number = $row['table_number'];
    $order_details = $row['order_details'];
    $order_quantity = $row['order_quantity'];
    $total_price = $row['total_price'];
    $date_ordered = $row['date_ordered'];

    $sql = "INSERT INTO reportlist (order_number,table_number, order_details, order_quantity, total_price, date_ordered) VALUES ('$order_number','$table_number', '$order_details', '$order_quantity', '$total_price', '$date_ordered')";
    $conn->query($sql);

    $sql = "DELETE FROM orderlist WHERE id = '$id'";
    $conn->query($sql);
	header('Location: orders.php?success=Record deleted successfully');

  }
}


// if(isset($_POST['delete'])){

// 	$id = $_POST['id'];

// 	$sql = "DELETE FROM orderlist WHERE order_number = '$id'";
// 	$conn->query($sql) or die ($conn->error);

// 	header('Location: orders.php?success=Record deleted successfully');

// }

 ?>