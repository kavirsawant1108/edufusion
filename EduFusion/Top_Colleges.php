<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduFusion - College Search Platform</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Link to your CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">
            <img src="assets/images/logo2.png" alt="EduFusion Logo"> <!-- Replace with your logo path -->
        </div>
        <div class="nav-links"> 
            <a href="index.php" class="nav-link">Home</a>
            <a href="about.html" class="nav-link">About Us</a>
            <a href="Contact Us.html" class="nav-link">Contact</a>
        </div>
       
    </header>

    <?php
    // Include database connection file
    include 'includes/db_connect.php';

    // Query to fetch the top 10 colleges
    $query = "SELECT * FROM colleges ORDER BY rating DESC LIMIT 10";
    $result = mysqli_query($conn, $query);
    ?>

        <!-- Top 10 College Section -->
        <section class="top-colleges">
        <h2>Top Colleges</h2>
        <div class="college-categories">
            <button class="category" onclick="filterColleges('all')">All Colleges</button>
            <button class="category" onclick="filterColleges('engineering')">Engineering</button>
            <button class="category" onclick="filterColleges('management')">Management</button>
            <button class="category" onclick="filterColleges('commerce')">Commerce</button>
            <button class="category" onclick="filterColleges('arts')">Arts</button>
            <button class="category" onclick="filterColleges('medical')">Medical</button>
            <button class="category" onclick="filterColleges('design')">Design</button>
        </div>
        <div class="college-list">
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>College</th>
                        <th>Ranking</th>
                        <th>Cutoff</th>
                        <th>Application Deadline</th>
                        <th>Fees</th>
                    </tr>
                </thead>
                <tbody id="collegeTable">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        $rank = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Check if fields exist, otherwise provide a default value
                            $cutoff = isset($row['cutoff']) ? $row['cutoff'] : 'N/A';
                            $application_deadline = isset($row['application_deadline']) ? $row['application_deadline'] : 'N/A';
                            $fees = isset($row['fees']) && !empty($row['fees']) ? number_format($row['fees']) : 'N/A';

                            // Assign a class for filtering
                            $collegeTypeClass = strtolower($row['study_goal']); // Assuming study_goal matches the filter button names

                            echo '<tr class="' . $collegeTypeClass . '">'; // Add class for filtering
                            echo '<td>#' . $rank++ . '</td>';
                            echo '<td>';
                            echo '<img src="assets/images/college-logos/' . $row['logo'] . '" alt="' . $row['college_name'] . ' Logo" class="college-logo">'; // Ensure logo is fetched
                            echo '<div class="college-details">';
                            echo '<span>' . $row['college_name'] . '</span>';
                            echo '<p>' . $row['location'] . '</p>';
                            echo '<div class="star-rating">';
                            for ($i = 0; $i < 5; $i++) {
                                echo '<span class="star' . ($i < $row['rating'] ? ' filled' : ' empty') . '">&#9733;</span>'; // Unicode star character
                            }
                            echo '</div>';
                            echo '</div>';
                            echo '</td>';
                            echo '<td>#' . $rank . ' in India 2024</td>'; // Adjust as per ranking field
                            echo '<td>' . $cutoff . '</td>'; // Cutoff or N/A
                            echo '<td>' . $application_deadline . '</td>'; // Deadline or N/A
                            echo '<td>₹' . $fees . '<br>1st Year Fees</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No Colleges Available</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php
    // Close database connection
    mysqli_close($conn);
    ?>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 EduFusion. All Rights Reserved.</p>
        <p><a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms of Service</a></p>
    </footer>

    <!-- JavaScript for Slideshow and Filtering -->
    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let slides = document.querySelectorAll(".slideshow img");
            slides.forEach(slide => slide.style.display = "none"); // Hide all slides
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1; } // Loop back to first slide
            slides[slideIndex - 1].style.display = "block"; // Show the current slide
            setTimeout(showSlides, 2000); // Change image every 2 seconds
        }

        function filterColleges(type) {
            let rows = document.querySelectorAll("#collegeTable tr");
            rows.forEach(row => {
                if (type === 'all' || row.classList.contains(type)) {
                    row.style.display = ""; // Show matched rows
                } else {
                    row.style.display = "none"; // Hide unmatched rows
                }
            });
        }
    </script>
</body>
</html>
