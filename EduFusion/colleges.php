<?php
// Include database configuration
include 'db/config.php';

// Get the study goal and course from the URL (with default values)
$study_goal = isset($_GET['goal']) ? $_GET['goal'] : '';
$course = isset($_GET['course']) ? $_GET['course'] : '';

// Prepare the SQL query
if (!empty($study_goal)) {
    if (!empty($course)) {
        // Query for both study goal and course
        $query = "SELECT * FROM colleges WHERE study_goal = ? AND courses LIKE ?";
        $stmt = $conn->prepare($query);
        $course = '%' . $course . '%'; // Add wildcards for partial matching
        $stmt->bind_param("ss", $study_goal, $course);
    } else {
        // Query for only study goal
        $query = "SELECT * FROM colleges WHERE study_goal = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $study_goal);
    }
} else {
    // Default query if no goal is provided (show all colleges)
    $query = "SELECT * FROM colleges";
    $stmt = $conn->prepare($query);
}

// Execute the statement and get the result
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colleges - <?php echo ucfirst($study_goal); ?></title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Colleges for <?php echo !empty($study_goal) ? ucfirst($study_goal) : 'All Goals'; ?></h2>
    
    <div class="college-list">
        <table>
            <thead>
                <tr>
                    <th>College Name</th>
                    <th>Location</th>
                    <th>Rating</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if any colleges are found
                if ($result->num_rows > 0) {
                    while ($college = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$college['college_name']}</td>
                                <td>{$college['location']}</td>
                                <td>{$college['rating']}</td>
                                <td><a href='college_info.php?id={$college['college_id']}'>View Info</a></td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No colleges found for this study goal or course.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>

<?php
// Close the statement and database connection
$stmt->close();
$conn->close();
?>
