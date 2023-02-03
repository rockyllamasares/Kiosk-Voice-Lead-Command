<?php
session_start();
unset($_SESSION['Role']);
header('Location: index.php?success=Account Logged out');

?>