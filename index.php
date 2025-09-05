<?php require 'db.php'?>

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
      echo "<li>{$row['details']} $status</li>";
    }
    echo "</ul>";
  } else {
    echo "No todos yet!";
  }
  ?>
</div>

</body>
</html>

<?php $conn->close(); ?>
