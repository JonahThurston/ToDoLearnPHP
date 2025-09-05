<?php require 'db-connect.php'?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="main.css">
</head>
<body>

<div class="top-bar">
  <h1 class="title">TODO!!!</h1>
</div>

<div class="task-list">
  <?php
  $sql = "SELECT id, details, complete FROM tasks";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
      $status = $row["complete"] ? "✅" : "❌";
      echo "<li>
        {$row['details']} <span class='status'>$status</span>
        <button class='toggle-btn' data-id='{$row['id']}'>Toggle Completion</button>
        <button class='delete-btn' data-id='{$row['id']}'>Delete Task</button>
        </li>";
    }
    echo "</ul>";
  } else {
    echo "No tasks yet!";
  }
  ?>
</div>

<script src="main.js"></script>
</body>
</html>

<?php $conn->close(); ?>
