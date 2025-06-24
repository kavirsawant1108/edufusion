<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if more than 3 users have the same name
    $nameCheck = "SELECT COUNT(*) AS count FROM users WHERE first_name='$first_name' AND last_name='$last_name'";
    $result = $conn->query($nameCheck);
    $row = $result->fetch_assoc();

    if ($row['count'] < 3) {
        $sql = "INSERT INTO users (first_name, middle_name, last_name, email, password) VALUES ('$first_name', '$middle_name', '$last_name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            header("Location: ../login.php");
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Sorry, only 3 accounts with the same name allowed!";
    }
}
?>
<?php
session_start();
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        // Get the user_id of the new user
        $user_id = mysqli_insert_id($conn);

        // Set session variables for the new user
        $_SESSION['user_id'] = $user_id;
        $_SESSION['aspiration_filled'] = 0;  // The form is not filled yet

        // Redirect to the aspirations form
        header("Location: ../aspirations_form.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

