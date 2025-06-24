<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Counselors</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Link to your main CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome -->
    <style>
        /* Counselor Section Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .counselor-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #ffffff;
        }

        .counselor-section h2 {
            font-size: 2.5rem;
            color: #3c096c;
            margin-bottom: 30px;
        }

        .counselor-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .counselor-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 300px;
            text-align: left;
        }

        .counselor-card h3 {
            color: #240046;
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .counselor-card p {
            font-size: 1rem;
            color: #555;
            margin: 5px 0;
        }

        .counselor-card i {
            color: #ff6d00;
            margin-right: 10px;
        }

        .counselor-card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>
    <!-- Our Counselor Section -->
    <div id="our-counselor" class="counselor-section">
        <h2>Our Counselors</h2>
        <div class="counselor-container">
            <?php
            // Database connection
            $conn = new mysqli("localhost", "root", "", "edufusion");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch counselor information
            $sql = "SELECT name, phone, email, contact_info FROM counselors";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display each counselor's info
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='counselor-card'>";
                    echo "<h3>" . htmlspecialchars($row["name"]) . "</h3>";
                    echo "<p><strong>Contact Info:</strong> " . htmlspecialchars($row["contact_info"]) . "</p>";
                    echo "<p><i class='fas fa-phone-alt'></i> " . htmlspecialchars($row["phone"]) . "</p>";
                    echo "<p><i class='fas fa-envelope'></i> " . htmlspecialchars($row["email"]) . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No counselors available at the moment.</p>";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 EduFusion. All rights reserved.</p>
    </footer>

</body>
</html>
