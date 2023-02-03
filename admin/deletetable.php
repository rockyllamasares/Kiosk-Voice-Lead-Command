<?php 
include_once("../connection/conn.php");
$conn = connection();

if(isset($_POST['delete'])){

	$id = $_POST['id'];

	$sql = "DELETE FROM tablenums WHERE id = '$id'";
	$conn->query($sql) or die ($conn->error);

	header('Location: table.php?success=User record deleted successfully');

}

 ?>