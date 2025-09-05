<?php
include '../db-connect.php'; //TODO: I dont like that this makes a whole new connection. Might mke this a singleton class later.

if (isset($_POST['id'])) {
  $id = (int)$_POST['id'];

  $currStatusSQL = "SELECT complete FROM tasks WHERE id = $id";
  $result = $conn->query($currStatusSQL);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $newStatus = $row['complete'] ? 0 : 1;

    $updateSQL = "UPDATE tasks SET complete = $newStatus WHERE id = $id";
    $conn->query($updateSQL);

    echo $newStatus ? "✅" : "❌";
  }
}

$conn->close();
?>