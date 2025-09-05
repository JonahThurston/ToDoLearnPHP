<?php
// Database connection settings
$servername = "localhost";
$username = "root";     // default user in XAMPP
$password = "";         // default password is empty
$dbname = "todo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Run a query (fetch all todos)
$sql = "SELECT ID, Description, complete FROM tasks";
$result = $conn->query($sql);

echo "<h1>My Todo List</h1>";

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
