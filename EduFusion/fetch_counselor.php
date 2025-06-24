<?php
include 'includes/db_connect.php'; // Database connection

// Fetch a random counselor (or you can fetch based on specific logic)
$sql = "SELECT name, phone, email, contact_info FROM counselors ORDER BY RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
    echo "<p><strong>Phone:</strong> " . $row['phone'] . "</p>";
    echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
    
    if (!empty($row['contact_info'])) {
        echo "<p><strong>Additional Info:</strong> " . $row['contact_info'] . "</p>";
    }
} else {
    echo "<p>No counselor available at the moment.</p>";
}

mysqli_close($conn);
?>
