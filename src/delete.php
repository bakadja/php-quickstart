<?php
// Include database connection file
require("config.php");

// Retrieve [id] value from querystring parameter
$id = $_GET['id'];

// Delete row for a specified id
$stmt = $conn->prepare("DELETE FROM contacts WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();

// Redirect to home page (index.php)
header("Location:index.php");
exit;
?>
