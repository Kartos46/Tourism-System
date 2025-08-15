<?php 
include 'check_auth.php'; 
session_start();
require_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        $sql = "SELECT * FROM admin_users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $admin = $result->fetch_assoc();
            if (password_verify($password, $admin['password'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_id'] = $admin['id'];
                $_SESSION['admin_username'] = $admin['username'];
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Invalid password";
            }
        } else {
            $error = "Username not found";
        }
    }
    
    // Handle forgot password
    if (isset($_POST['forgot_password'])) {
        $email = trim($_POST['email']);
        // Verify email exists
        $sql = "SELECT * FROM admin_users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            // Generate OTP
            $otp = rand(100000, 999999);
            $_SESSION['reset_otp'] = $otp;
            $_SESSION['reset_email'] = $email;
            $_SESSION['otp_expire'] = time() + 300; // 5 minutes expiry
            
            // Send email (you'll need to configure your mail server)
            $subject = "Admin Password Reset OTP";
            $message = "Your OTP for password reset is: $otp";
            $headers = "From: noreply@yourdomain.com";
            
            if (mail($email, $subject, $message, $headers)) {
                $success = "OTP sent to your email";
            } else {
                $error = "Failed to send OTP";
            }
        } else {
            $error = "Email not found";
        }
    }
    
    // Handle OTP verification and password reset
    if (isset($_POST['reset_password'])) {
        if ($_SESSION['otp_expire'] > time()) {
            if ($_POST['otp'] == $_SESSION['reset_otp']) {
                $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                $email = $_SESSION['reset_email'];
                
                $sql = "UPDATE admin_users SET password = ? WHERE email = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $new_password, $email);
                if ($stmt->execute()) {
                    $success = "Password updated successfully";
                    unset($_SESSION['reset_otp'], $_SESSION['reset_email'], $_SESSION['otp_expire']);
                } else {
                    $error = "Failed to update password";
                }
            } else {
                $error = "Invalid OTP";
            }
        } else {
            $error = "OTP expired";
        }
    }
}
?>