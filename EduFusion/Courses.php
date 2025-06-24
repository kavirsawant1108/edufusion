<?php
session_start(); // Start session to check login status
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduFusion - Courses</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css"> <!-- Link to your custom CSS file -->
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 40px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #240046;
            margin-bottom: 20px;
            text-align: center;
        }

        .category-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin: 15px 0;
            text-align: center;
            transition: transform 0.2s;
        }

        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-custom {
            background-color: #ff9e00;
            color: white;
            margin: 5px;
            transition: background-color 0.3s;
        }

        .btn-custom:hover {
            background-color: #ff7900;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<div class="container">
    <h2>Courses</h2>

    <!-- Engineering Section -->
    <div class="category-card">
        <h3>Engineering</h3>
        <p>Explore various engineering courses</p>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=engineering&course=BE/B.Tech'">BE/B.Tech</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=engineering&course=ME/M.Tech'">ME/M.Tech</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=engineering&course=Diploma in Engineering'">Diploma in Engineering</button>
    </div>

    <!-- Arts Section -->
    <div class="category-card">
        <h3>Arts</h3>
        <p>Explore various arts courses</p>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=arts&course=BA'">BA</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=arts&course=MA'">MA</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=arts&course=BFA'">BFA</button>
    </div>

    <!-- Medical Section -->
    <div class="category-card">
        <h3>Medical</h3>
        <p>Explore various medical courses</p>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=medical&course=MBBS'">MBBS</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=medical&course=MD'">MD</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=medical&course=PG Medical'">PG Medical</button>
    </div>

    <!-- Management Section -->
    <div class="category-card">
        <h3>Management</h3>
        <p>Explore various management courses</p>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=management&course=MBA'">MBA</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=management&course=PGDM'">PGDM</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=management&course=BBA'">BBA</button>
    </div>

    <!-- Commerce Section -->
    <div class="category-card">
        <h3>Commerce</h3>
        <p>Explore various commerce courses</p>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=commerce&course=B.Com'">B.Com</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=commerce&course=M.Com'">M.Com</button>
    </div>

    <!-- Design Section -->
    <div class="category-card">
        <h3>Design</h3>
        <p>Explore various design courses</p>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=design&course=B.DES'">B.DES</button>
        <button class="btn btn-custom" onclick="location.href='colleges.php?goal=design&course=M.DES'">M.DES</button>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
