<?php include 'includes/header.php'; ?>

<head>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Arial', sans-serif;
        }
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        .form-box {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        label {
            font-size: 14px;
            color: #555;
            display: block;
            text-align: left;
            margin-bottom: 8px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 5px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
        }
        .btn {
            background-color: #7b2cbf;
            color: white;
            font-size: 16px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-bottom: 20px;
        }
        .btn:hover {
            background-color: #9d4edd;
        }
    </style>
</head>

<div class="form-container">
    <div class="form-box">
        <h2>Register</h2>
        <form action="process/register_process.php" method="post" onsubmit="return validateForm()">
            <!-- First Name -->
            <label for="first_name"><i class="fas fa-user"></i> First Name</label>
            <input type="text" name="first_name" id="first_name" required minlength="2" placeholder="Enter your first name" title="First name should be at least 2 characters long">

            <!-- Middle Name -->
            <label for="middle_name"><i class="fas fa-user"></i> Middle Name</label>
            <input type="text" name="middle_name" id="middle_name" minlength="2" placeholder="Enter your middle name" title="Middle name should be at least 2 characters long">

            <!-- Last Name -->
            <label for="last_name"><i class="fas fa-user"></i> Last Name</label>
            <input type="text" name="last_name" id="last_name" required placeholder="Enter your last name">

            <!-- Email -->
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" name="email" id="email" required placeholder="Enter your email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address">

            <!-- Password -->
            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input type="password" name="password" id="password" required placeholder="Enter your password">

            <button type="submit" class="btn">Register</button>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<script>
    function validateForm() {
        // Validate First Name
        const firstName = document.getElementById('first_name').value;
        if (firstName.length < 2) {
            alert('First name must be at least 2 characters long.');
            return false;
        }

        // Validate Middle Name (optional)
        const middleName = document.getElementById('middle_name').value;
        if (middleName && middleName.length < 2) {
            alert('Middle name must be at least 2 characters long if entered.');
            return false;
        }

        // Validate Email
        const email = document.getElementById('email').value;
        const emailPattern = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address.');
            return false;
        }

        return true;
    }
</script>


<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = isset($_POST['middle_name']) ? mysqli_real_escape_string($conn, $_POST['middle_name']) : null;
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // SQL Query to insert new user
    $sql = "INSERT INTO users (first_name, middle_name, last_name, email, password) VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        // Get the user_id of the new user
        $user_id = mysqli_insert_id($conn);

        // Store user_id in session and set aspiration_filled to 0
        $_SESSION['user_id'] = $user_id;
        $_SESSION['aspiration_filled'] = 0;

        // Redirect to the aspirations form
        header("Location: aspirations_form.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
