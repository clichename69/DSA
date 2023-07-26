<?php
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

// Retrieve all usernames and passwords from the table
$query = "SELECT username, password FROM users";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query executed successfully
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Update the passwords
while ($row = mysqli_fetch_assoc($result)) {
    $username = $row['username'];
    $password = $row['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Update the hashed password in the table
    $updateQuery = "UPDATE users SET password = '$hashedPassword' WHERE username = '$username'";
    $updateResult = mysqli_query($conn, $updateQuery);

    // Check if the update query executed successfully
    if (!$updateResult) {
        die("Update failed: " . mysqli_error($conn));
    }
}

// Close the database connection
mysqli_close($conn);

echo "Passwords have been updated successfully.";
?>
