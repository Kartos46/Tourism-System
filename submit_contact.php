<?php
// Database configuration
$servername = "localhost:3306";
$username = "root"; // From your customer table setup
$password = ""; // From your customer table setup
$dbname = "travel"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Validate and sanitize input
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$subject = isset($_POST['subject']) ? $conn->real_escape_string($_POST['subject']) : null;
$message = $conn->real_escape_string($_POST['message']);

// Validate required fields
if (empty($name) || empty($email) || empty($message)) {
    die("Please fill all required fields");
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Execute
if ($stmt->execute()) {
    header("Location: thank_you.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>