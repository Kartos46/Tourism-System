<?php
session_start();

// Include database config (make sure config.php exists)
require_once 'config.php';

// Database connection (example using MySQLi)
$conn = new mysqli("localhost:3306","root","","name");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Admin Login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check admin credentials (replace with your actual admin table)
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_username'] = $admin['username'];
            header("Location: admin.php"); // Redirect to admin dashboard
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "Admin not found!";
    }
}

// Handle Forgot Password (Send OTP)
if (isset($_POST['forgot_password'])) {
    $email = $_POST['email'];
    // Check if email exists in the database
    // Generate OTP and send via email (or store in session)
    $otp = rand(100000, 999999);
    $_SESSION['reset_otp'] = $otp;
    $_SESSION['reset_email'] = $email;
    $success = "OTP sent to your email!";
    // In a real app, you would send an email here
}

// Handle Password Reset (Verify OTP)
if (isset($_POST['reset_password'])) {
    $otp = $_POST['otp'];
    $new_password = $_POST['new_password'];

    if ($otp == $_SESSION['reset_otp']) {
        $email = $_SESSION['reset_email'];
        // Update password in the database
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $sql = "UPDATE admin SET password = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();
        
        $success = "Password reset successfully!";
        unset($_SESSION['reset_otp']);
        unset($_SESSION['reset_email']);
    } else {
        $error = "Invalid OTP!";
    }
}
?>