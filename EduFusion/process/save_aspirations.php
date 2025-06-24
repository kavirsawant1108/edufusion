<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];  // Get the logged-in user's ID
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $education_level = $_POST['education_level'];
    $program = $_POST['program'];
    $interest_area = $_POST['interest_area'];
    $short_term = $_POST['short_term'];
    $long_term = $_POST['long_term'];

    // Insert aspirations data into the table
    $sql = "INSERT INTO aspirations (user_id, name, email, phone, education_level, program, interest_area, short_term, long_term)
            VALUES ('$user_id', '$name', '$email', '$phone', '$education_level', '$program', '$interest_area', '$short_term', '$long_term')";

    if (mysqli_query($conn, $sql)) {
        // Update aspiration_filled flag in users table
        $update_sql = "UPDATE users SET aspiration_filled = 1 WHERE id = '$user_id'";
        mysqli_query($conn, $update_sql);

        // Update session variable
        $_SESSION['aspiration_filled'] = 1;
        $_SESSION['interest_area'] = $interest_area;  // Store user's area of interest in session

        // Redirect to the homepage after form submission
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
