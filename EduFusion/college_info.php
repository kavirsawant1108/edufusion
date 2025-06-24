<?php
// Include database configuration
include 'db/config.php';

// Check if college ID is set in the URL
if (isset($_GET['id'])) {
    $college_id = $_GET['id'];

    // Validate college ID
    if (!is_numeric($college_id)) {
        echo "Invalid college ID!";
        exit;
    }

    // Fetch college details from the database
    $query = "SELECT * FROM colleges WHERE college_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $college_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if college exists
    if ($result->num_rows > 0) {
        $college = $result->fetch_assoc();
    } else {
        echo "College not found!";
        exit;
    }
} else {
    echo "Invalid college ID!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($college['college_name']); ?> - College Info</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 40px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #3c096c;
        }
        .description {
            margin: 20px 0;
        }
        .college-image {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .btn-back {
            background-color: #ff9e00;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
        }
        .btn-back:hover {
            background-color: #ff7900;
        }
        .student-access {
            margin-top: 20px;
        }
        .student-access button {
            padding: 10px 20px;
            background-color: #3c096c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .student-access button:hover {
            background-color: #5a189a;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <h1><?php echo htmlspecialchars($college['college_name']); ?></h1>
    
    <!-- College Logo -->
    <?php if (!empty($college['logo'])): ?>
        <img src="assets/images/college-logos/<?php echo htmlspecialchars($college['logo']); ?>" alt="<?php echo htmlspecialchars($college['college_name']); ?> Logo" class="college-image">
    <?php else: ?>
        <img src="assets/images/placeholder-logo.png" alt="No Logo Available" class="college-image">
    <?php endif; ?>

    <div class="description">
        <p><strong>Location:</strong> <?php echo htmlspecialchars($college['location']); ?></p>
        <p><strong>Short Description:</strong> <?php echo nl2br(htmlspecialchars($college['short_description'])); ?></p>
        <p><strong>Courses Offered:</strong> <?php echo htmlspecialchars($college['courses']); ?></p>
        <p><strong>Rating:</strong> <?php echo htmlspecialchars($college['rating']); ?>/5</p>
        <p><strong>Study Goal:</strong> <?php echo htmlspecialchars($college['study_goal']); ?></p>
        <p><strong>Cutoff:</strong> <?php echo htmlspecialchars($college['cutoff']); ?></p>
        <p><strong>Application Deadline:</strong> <?php echo $college['application_deadline'] ? date('d M Y', strtotime($college['application_deadline'])) : 'N/A'; ?></p>
        <p><strong>Fees:</strong> ₹<?php echo number_format($college['fees']); ?></p>
    </div>

    <!-- Back to Colleges Button -->
    <a href="index.php" class="btn-back">Back to Colleges</a>

    <!-- Student Access Button -->
    <div class="student-access">
        <button onclick="window.location.href='authentication.php'">IF YOU ARE A STUDENT OF COLLEGE CLICK HERE</button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

</body>
</html>
