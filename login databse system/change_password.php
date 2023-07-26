<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  // User is not logged in, redirect to the login page
  header("Location: 1.html");
  exit();
}

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

// Retrieve the logged-in user's username
$username = $_SESSION['username'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Retrieve the new password from the form
  $newPassword = $_POST['new_password'];

  // Hash the new password
  $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

  // Update the password in the database
  $updateQuery = "UPDATE users SET password = '$hashedPassword' WHERE username = '$username'";
  $updateResult = mysqli_query($conn, $updateQuery);

  // Check if the update query executed successfully
  if ($updateResult) {
    echo "Password updated successfully!";
  } else {
    echo "Failed to update the password.";
  }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <style>
    /* CSS styles... */
  </style>
</head>
<body>
  <!-- HTML markup... -->
  <h1>Change Password</h1>
  <form action="change_password.php" method="POST">
    <input type="password" name="new_password" placeholder="New Password" required>
    <button type="submit">Change Password</button>
  </form>
</body>
</html>
