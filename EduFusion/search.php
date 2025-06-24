<?php include 'includes/header.php'; ?>
<style>
    .college-list table {
        width: 100%;
        border-collapse: collapse;
    }

    .college-list th, .college-list td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .college-list th {
        background-color: #240046;
        color: white;
    }

    .college-list td {
        background-color: #f9f9f9;
    }

    .college-list tr:hover {
        background-color: #f1f1f1;
    }
</style>

<?php
// Include database connection
include 'includes/db_connect.php';

// Check if the search query is set and not empty
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $query = $_GET['query'];

    // Prepare the SQL query to search by college name or location
    $sql = "SELECT * FROM colleges WHERE college_name LIKE ? OR location LIKE ?";
    $stmt = $conn->prepare($sql);

    // Add wildcard characters to the query for partial matching
    $search_term = '%' . $query . '%';

    // Bind parameters and execute the query
    $stmt->bind_param('ss', $search_term, $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any colleges are found
    if ($result->num_rows > 0) {
        echo "<h2>Search Results for '$query':</h2>";
        echo "<div class='college-list'>";
        echo "<table>";
        echo "<thead><tr><th>College Name</th><th>Location</th><th>Courses</th><th>Rating</th><th>Action</th></tr></thead>";
        echo "<tbody>";

        // Loop through the results and display them with a "View Info" link
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['college_name'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['courses'] . "</td>";
            echo "<td>" . $row['rating'] . "/5</td>";

            // Add the "View Info" link to redirect to the specific college details page
            // Make sure it passes the correct college_id as id
            echo "<td><a href='college_info.php?id=" . $row['college_id'] . "'>View Info</a></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<p>No colleges found for '$query'.</p>";
    }

    // Close the statement
    $stmt->close();
} else {
    echo "<p>Please enter a search term.</p>";
}

// Close the database connection
$conn->close();
?>
<?php include 'includes/footer.php'; ?>