<?php
session_start();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_auth";

// Create a database connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare the SELECT statement
$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ?");

// Bind the username parameter to the statement
mysqli_stmt_bind_param($stmt, "s", $username);

// Execute the statement
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch the user data
$user = mysqli_fetch_assoc($result);

// Close the statement
mysqli_stmt_close($stmt);

// Check if the user exists and verify the password
if ($user && password_verify($password, $user['password'])) {
    // User is authenticated, proceed with further actions (e.g., redirect to another page)

    // Set session variablesx   
    $_SESSION["username"] = $username;
    $_SESSION["loggedin"] = true;

    // Redirect to the desired page
    header("Location: 2.html");
    exit();
} else {
    // Authentication failed, display an error message or redirect to a login failure page
    echo "Invalid username or password!";
}

// Close the database connection
mysqli_close($conn);
?>
