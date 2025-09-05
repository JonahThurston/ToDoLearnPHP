<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_HOST'];
$username   = $_ENV['DB_USER'];
$password   = $_ENV['DB_PASS'];
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
  //TODO: this isn't perfect. It logs this whether we really need to or not. Meh.
  //echo "<script>console.log('tasks table found successfully.');</script>";
} else {
  echo "Error creating task table: " . $conn->error;
}
?>