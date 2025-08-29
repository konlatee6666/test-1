<?php
include 'config.php';
$id = intval($_GET['id']); // ป้องกัน SQL Injection
$conn->query("DELETE FROM users WHERE id=$id");
header("Location: users.php");
?>

