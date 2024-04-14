<?php
include '../config.php';

$id = $_GET['id'];
$query = "DELETE FROM roombook WHERE id = ?";

//$sql = $conn->query($query);
$delete = $conn->prepare($query);
$result = $delete->execute(array($id));

header("Location: roombook.php");

?>
