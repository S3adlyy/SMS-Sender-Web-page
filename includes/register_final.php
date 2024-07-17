<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_otp'])) {
    // Check if OTP matches
    $entered_otp = $_POST['otp'];
    $stored_otp = $_SESSION['temp_user_data']['otp'];

    if ($entered_otp == $stored_otp) {
        // OTP verification successful, save user data to database
        $email = $_SESSION['temp_user_data']['email'];
        $username = $_SESSION['temp_user_data']['username'];
        $password = $_SESSION['temp_user_data']['password'];

        // Save to database (ensure to hash passwords securely)
        // Example assuming you have a users table with columns email, username, password
        // Perform proper hashing and security checks in real implementation
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Example query to insert user into database
        // $sql = "INSERT INTO users (email, username, password) VALUES ('$email', '$username', '$hashed_password')";
        
        // Redirect user to login page or wherever appropriate
        header("Location: login.php");
        exit;
    } else {
        echo "Invalid OTP. Please try again.";
    }
}
?>
