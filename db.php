<?php
$servername = "localhost";
$username = "root";     // default user in XAMPP
$password = "";         // default password is empty
$dbname = "todo";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$db_exists = $conn->query("SHOW DATABASES LIKE '$dbname'")->num_rows > 0;

if (!$db_exists) {
  if ($conn->query("CREATE DATABASE $dbname") === TRUE) {
    echo "<script>console.log('Database $dbname created successfully.');</script>";
  } else {
    die("Error creating database: " . $conn->error);
  }
}

$conn->select_db($dbname);

if ($conn->query("CREATE TABLE IF NOT EXISTS tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  details VARCHAR(255),
  complete BOOLEAN NOT NULL DEFAULT FALSE
)") === TRUE) {
  echo "<script>console.log('tasks table created successfully.');</script>";
} else {
  echo "Error creating task table: " . $conn->error;
}
?>