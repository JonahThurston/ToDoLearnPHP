<?php
$servername = "localhost";
$username = "root";     // default user in XAMPP
$password = "";         // default password is empty
$dbname = "todo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

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
  // Run a query (fetch all todos)
  $sql = "SELECT ID, Description, complete FROM tasks";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      echo "<ul>";
      while($row = $result->fetch_assoc()) {
          $status = $row["complete"] ? "✅" : "❌";
          echo "<li>{$row['Description']} $status</li>";
      }
      echo "</ul>";
  } else {
      echo "No todos yet!";
  }

  $conn->close();
  ?>
</div>

</body>
</html>
