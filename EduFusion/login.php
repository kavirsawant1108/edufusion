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
        input[type="email"], input[type="password"] {
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
        .recover {
            text-align: right;
            margin-bottom: 20px;
        }
        .recover a {
            color: #7b2cbf;
            font-size: 12px;
            text-decoration: none;
        }
        .recover a:hover {
            text-decoration: underline;
        }
        .social-login p {
            color: #888;
            margin-bottom: 10px;
        }
        .social-login a {
            margin: 0 10px;
            font-size: 28px;
            color: #888;
        }
        .social-login a:hover {
            color: #555;
        }
        p a {
            color: #7b2cbf;
            text-decoration: none;
        }
        p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<div class="form-container">
    <div class="form-box">
        <h2>Sign In</h2>
        <form action="process/login_process.php" method="post">
            <label for="email"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" name="email" required placeholder="Enter your email">

            <label for="password"><i class="fas fa-lock"></i> Password</label>
            <input type="password" name="password" required placeholder="Enter your password">

            <div class="recover">
                <a href="recover_password.php">Recover Password</a>
            </div>

            <button type="submit" class="btn">Sign In</button>

            <div class="social-login">
                <p>--------- or ---------</p>
                <a href="#"><i class="fab fa-google"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>

            <p>Don't have an account yet? <a href="register.php">Sign Up</a></p>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
<?php
session_start();
include 'includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // Store the user info in the session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['aspiration_filled'] = $user['aspiration_filled'];

            // Redirect user to aspirations form if they haven't filled it out
            if ($user['aspiration_filled'] == 0) {
                header("Location: aspirations_form.php");
                exit();
            } else {
                // Otherwise, redirect to the top colleges or dashboard
                header("Location: top_colleges.php");
                exit();
            }
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>
