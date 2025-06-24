<?php
session_start(); // Start session to check login status
include 'includes/db_connect.php'; // Include database connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduFusion - College Search Platform</title>
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Link to CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome for icons -->
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="logo">
            <img src="assets/images/logo2.png" alt="EduFusion Logo"> <!-- Logo path -->
        </div>
        <div class="nav-links"> 
            <a href="about.html">About Us</a>
            <a href="Top_Colleges.php">Top Colleges</a>
            <a href="Courses.php">Courses</a>
            <a href="Contact_Us.php">Contact Us</a>
        </div>
        <div class="user-options">
            <?php if(isset($_SESSION['user_id'])): ?>
                <a href="profile.php" class="nav-link"><?php echo $_SESSION['first_name']; ?> <i class="fas fa-user"></i></a>
                <a href="logout.php" class="nav-link">Logout</a>
<!-- Need Counselor Button -->
    <a href="counselors.php" id="counselor-button" class="btn">Need Counselor</a>

<?php else: ?>
    <a href="login.php" class="nav-link">Login</a>
<?php endif; ?>

        </div>
    </header>

    <!-- Slideshow Section -->
    <div class="slideshow-container">
        <div class="slideshow">
            <img src="assets/images/clg1.jpeg" alt="College Image 1" class="active">
            <img src="assets/images/clg2.jpeg" alt="College Image 2">
            <img src="assets/images/clg3.jpeg" alt="College Image 3">
            <img src="assets/images/clg4.jpg" alt="College Image 4">
            <img src="assets/images/clg5.jpg" alt="College Image 5">
            <img src="assets/images/clg6.jpg" alt="College Image 6">
        </div>
    </div>

    <!-- Search Section Overlaid on Slideshow -->
    <div class="search-container">
        <h1>Find the Best Colleges for Your Future Education</h1>
        <form action="search.php" method="get">
            <div class="search-wrapper">
                <input type="text" placeholder="Search for Colleges or Location" name="query" required>
                <button type="submit" class="btn">Search</button>
            </div>
        </form>
        <p>Your journey to higher education starts here!</p>
    </div>

    <!-- Study Goal Section -->
    <section class="study-goal">
        <h2>Select Your Study Goal</h2>
        <div class="goals-container">
            <div class="goal-card">
                <a href="colleges.php?goal=engineering">
                    <div class="icon">
                        <i class="fas fa-hard-hat"></i>
                    </div>
                    <h3>Engineering</h3>
                    <p>6226 Colleges</p>
                    <ul>
                        <li>BE/B.Tech</li>
                        <li>Diploma in Engineering</li>
                        <li>ME/M.Tech</li>
                    </ul>
                </a>
            </div>
            <div class="goal-card">
                <a href="colleges.php?goal=management">
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Management</h3>
                    <p>7664 Colleges</p>
                    <ul>
                        <li>MBA/PGDM</li>
                        <li>BBA/BMS</li>
                        <li>Executive MBA</li>
                    </ul>
                </a>
            </div>
            <div class="goal-card">
                <a href="colleges.php?goal=commerce">
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Commerce</h3>
                    <p>4923 Colleges</p>
                    <ul>
                        <li>B.Com</li>
                        <li>M.Com</li>
                    </ul>
                </a>
            </div>
            <div class="goal-card">
                <a href="colleges.php?goal=arts">
                    <div class="icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    <h3>Arts</h3>
                    <p>5546 Colleges</p>
                    <ul>
                        <li>BA</li>
                        <li>MA</li>
                        <li>BFA</li>
                        <li>BSW</li>
                    </ul>
                </a>
            </div>
            <div class="goal-card">
                <a href="colleges.php?goal=medical">
                    <div class="icon">
                        <i class="fa-solid fa-dna"></i>
                    </div>
                    <h3>Medical</h3>
                    <p>7664 Colleges</p>
                    <ul>
                        <li>MBBS</li>
                        <li>PG Medical</li>
                    </ul>
                </a>
            </div>
            <div class="goal-card">
                <a href="colleges.php?goal=design">
                    <div class="icon">
                        <i class="fa-solid fa-shirt"></i>
                    </div>
                    <h3>Design</h3>
                    <p>7664 Colleges</p>
                    <ul>
                        <li>B.DES</li>
                        <li>M.DES</li>
                    </ul>
                </a>
            </div>
        </div>
    </section>

    <!-- Top 10 College Section -->
    <section class="top-colleges">
        <h2>Top Colleges</h2>
        <div class="college-categories">
            <button class="category" onclick="filterColleges('all')">All Colleges</button>
            <button class="category" onclick="filterColleges('engineering')">Engineering</button>
            <!-- More category buttons here -->
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
                    // Fetch top 10 colleges
                    $query = "SELECT * FROM colleges ORDER BY rating DESC LIMIT 10";
                    $result = mysqli_query($conn, $query);
                    $rank = 1;
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $cutoff = $row['cutoff'] ?? 'N/A';
                            $application_deadline = $row['application_deadline'] ?? 'N/A';
                            $fees = isset($row['fees']) ? number_format($row['fees']) : 'N/A';
                            echo '<tr class="' . strtolower($row['study_goal']) . '">';
                            echo '<td>#' . $rank++ . '</td>';
                            echo '<td><img src="assets/images/college-logos/' . $row['logo'] . '" alt="' . $row['college_name'] . ' Logo">';
                            echo '<div class="college-details"><span>' . $row['college_name'] . '</span><p>' . $row['location'] . '</p></div></td>';
                            echo '<td>' . $rank . '</td>';
                            echo '<td>' . $cutoff . '</td>';
                            echo '<td>' . $application_deadline . '</td>';
                            echo '<td>₹' . $fees . ' (1st Year)</td></tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No Colleges Available</td></tr>';
                    }
                    mysqli_close($conn); // Close database connection
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 EduFusion. All Rights Reserved.</p>
        <p><a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms of Service</a></p>
    </footer>

    <!-- JavaScript for Slideshow and Filtering -->
    <script>
        let slideIndex = 0;
        function showSlides() {
            let slides = document.querySelectorAll(".slideshow img");
            slides.forEach(slide => slide.style.display = "none");
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1; }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 2000);
        }
        showSlides();

        function filterColleges(type) {
            let rows = document.querySelectorAll("#collegeTable tr");
            rows.forEach(row => {
                row.style.display = (type === 'all' || row.classList.contains(type)) ? "" : "none";
            });
        }
    </script>

<script src="https://cdn.botpress.cloud/webchat/v2.2/inject.js"></script>
<script src="https://files.bpcontent.cloud/2024/10/21/13/20241021135733-YMSV27HA.js"></script>

</body>
</html>
