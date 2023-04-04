
<?php 
// include_once("../connection/conn.php");
// $conn = connection();
// if (!$conn) {
//   die("Database connection failed: " . mysqli_connect_error());
// }

// // Get the selected status from the form
// $status = $_POST['status'];

// // Get the IDs of the selected products
// $ids = $_POST['ids'];
// $ids_arr = explode(',', $ids);
// $ids_arr = array_map('intval', $ids_arr);
// $ids_str = implode(',', $ids_arr);

// // Update the status of the selected products in the database
// $sql = "UPDATE product SET status = '$status' WHERE id IN ($ids_str)";
// $result = $conn->query($sql);

// if ($result === true) {
//   echo "Status updated successfully!";
// } else {
//   echo "Error updating status: " . $conn->error;

//   header('Location: products.php?success=Record updated successfully');
// }
// if ($result === false) {
//     echo "Error updating status: " . $conn->error;
// }


?>
<?php 
include_once("../connection/conn.php");
$conn = connection();
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Get the selected status and product ID from the form
$status = $_POST['status'];
$id = $_POST['id'];

// Update the status of the selected product in the database
$sql = "UPDATE product SET status = '$status' WHERE id = $id";
$result = $conn->query($sql);

if ($result === true) {
    header('Location: products.php?success=Record updated successfully');
} else {
  echo "Error updating status: " . $conn->error;

  
}

?>

