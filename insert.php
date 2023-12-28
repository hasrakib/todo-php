<?php  include 'database.php';

$task = $_POST['task'];

$sql = "INSERT INTO todov1 (id, status, task) VALUES (NULL, '0', '$task')";

$conn->query($sql);

$conn->close();

header('Location: index.php');
?>