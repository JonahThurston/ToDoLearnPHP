<?php
include '../db-connect.php'; //TODO: See note in toggle.php

if (isset($_POST['details'])) {
  $details = $conn->real_escape_string($_POST['details']);
  $sql = "INSERT INTO tasks (details) VALUES ('$details')";
  $conn->query($sql);
}

$conn->close();
header("Location: ../index.php");
exit;
?>