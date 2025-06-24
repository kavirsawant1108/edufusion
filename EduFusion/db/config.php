<?php
// Database configuration
$host = 'localhost'; // Your database host
$username = 'root';  // Your database username
$password = '';      // Your database password (default for XAMPP is usually empty)
$dbname = 'edufusion'; // Your database name (replace with your actual database name)

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
