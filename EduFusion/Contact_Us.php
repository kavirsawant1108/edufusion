<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - EduFusion</title>
    <style>
        /* Basic Reset and Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        a {
            text-decoration: none;
            color: inherit;
        }
        h1, h2, h3 {
            font-family: 'Roboto', sans-serif;
            color: #3c096c;
        }
        p {
            line-height: 1.6;
            color: #666;
        }

        /* Header Design */
        header {
            background-color: #240046;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }
        header .logo img {
            height: 50px;
        }
        header .nav-links {
            display: flex;
            gap: 20px;
        }
        header .nav-links a {
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        header .nav-links a:hover {
            background-color: #5a189a;
        }
        header .login-btn {
            background-color: #ff8500;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        header .login-btn:hover {
            background-color: #ff9e00;
        }

        /* Main Section */
        main {
            padding: 60px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .section-heading {
            text-align: center;
            margin-bottom: 40px;
        }
        .section-heading h1 {
            font-size: 36px;
            margin-bottom: 10px;
        }
        .section-heading p {
            font-size: 18px;
            color: #777;
        }

        /* Contact Form Section */
        .contact-form-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 40px;
            margin-bottom: 50px;
        }
        .contact-form {
            flex: 1;
            min-width: 300px;
        }
        .contact-form h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .contact-form label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            color: #333;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .contact-form button {
            background-color: #ff8500;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .contact-form button:hover {
            background-color: #ff9e00;
        }

        /* Contact Details Section */
        .contact-details {
            flex: 1;
            min-width: 300px;
            text-align: center;
        }
        .contact-details h2 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .contact-details ul {
            list-style: none;
            padding: 0;
            color: #555;
        }
        .contact-details ul li {
            margin-bottom: 15px;
            font-size: 18px;
        }
        .contact-details ul li i {
            color: #ff8500;
            margin-right: 10px;
        }

        /* Google Map */
        .map {
            width: 100%;
            height: 400px;
            margin-top: 50px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Footer Design */
        footer {
            background-color: #240046;
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        footer .footer-container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        footer .footer-section {
            flex: 1;
            padding: 20px;
            min-width: 250px;
        }
        footer .footer-section h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        footer .footer-section ul {
            list-style: none;
            padding: 0;
        }
        footer .footer-section ul li {
            margin-bottom: 10px;
        }
        footer .footer-section ul li a {
            color: white;
            transition: color 0.3s;
        }
        footer .footer-section ul li a:hover {
            color: #ff8500;
        }
        footer .social-icons {
            margin-top: 20px;
        }
        footer .social-icons a {
            color: white;
            margin: 0 10px;
            font-size: 20px;
        }
        footer .footer-bottom {
            margin-top: 20px;
            border-top: 1px solid #444;
            padding-top: 10px;
            font-size: 14px;
        }
        .counselor-section {
    margin-top: 60px;
    text-align: center;
    padding: 40px;
    background-color: #f0f0f5;
    border-radius: 10px;
}
.counselor-section h2 {
    font-size: 28px;
    color: #3c096c;
    margin-bottom: 20px;
}
.counselor-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}
.counselor-card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    width: 280px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}
.counselor-card:hover {
    transform: scale(1.05);
}
.counselor-card h3 {
    color: #240046;
    margin-bottom: 10px;
}
.counselor-card p {
    color: #555;
    margin-bottom: 8px;
}
.counselor-card i {
    color: #ff8500;
    margin-right: 5px;
}
</style>
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="assets/images/logo2.png" alt="EduFusion Logo"> <!-- Replace with your logo path -->
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="Top_Colleges.php">Top Colleges</a>
            <a href="Courses.php">Courses</a>
            <a href="about.html">About Us</a>
        </div>
    </header>

    <!-- Main Section -->
    <main>
        <div class="section-heading">
            <h1>Contact Us</h1>
            <p>We are here to help you. Get in touch with us!</p>
        </div>

        <!-- Contact Form Section -->
        <div class="contact-form-section">
        <div class="contact-form">
    <h2>Give Your Feedback</h2>
    <form action="process/save_feedback.php" method="POST">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" placeholder="Your name..." required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email..." required>

        <label for="message">Feedback</label>
        <textarea id="message" name="message" rows="5" placeholder="Your feedback..." required></textarea>

        <button type="submit">Submit</button>
    </form>
</div>

            <!-- Contact Details -->
            <div class="contact-details">
                <h2>Our Contact Details</h2>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> 123 EduFusion St, Learning City, India</li>
                    <li><i class="fas fa-phone-alt"></i> +91 12345 67890</li>
                    <li><i class="fas fa-envelope"></i> info@edufusion.com</li>
                </ul>
            </div>
        </div>

        <!-- Google Map -->
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=YOUR_GOOGLE_MAP_EMBED_CODE"
                    width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h3>Company</h3>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="top-colleges.html">Top Colleges</a></li>
                    <li><a href="courses.html">Courses</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            © 2024 EduFusion. All rights reserved. Terms of Service | Privacy Policy
        </div>
    </footer>

    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
