<?php
include '../db-connect.php'; //TODO: See note in toggle.php

if (isset($_POST['id'])) {
  $id = (int)$_POST['id'];

  $deleteSQL = "DELETE FROM tasks WHERE id = $id";
  $result = $conn->query($deleteSQL);
  if ($conn->query($deleteSQL) === TRUE) {
    echo 'success';
  } else {
    echo 'error';
  }
}

$conn->close();
?>