<?php
// Replace these with your actual database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'database';

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Handle new account registration logic here, such as storing user data in the database.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gameuid = $_POST['gameuid'];

  // Perform user registration process and database insertion using prepared statements
  $query = "INSERT INTO game (username, email, password, gameuid) VALUES (?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $query);

  if ($stmt) {
    // Bind the parameters to the prepared statement as strings
    mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $password, $gameuid);

    // Hash the password before inserting it into the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Execute the prepared statement
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
      // Registration successful; you can redirect to another page or display a success message.
      echo "Go to login page!!!!";
    } else {
      // Registration failed; you can redirect back to the registration page or display an error message.
      echo "Registration failed: " . mysqli_error($conn);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  } else {
    // Handle the case where the prepared statement could not be created.
    // You can redirect back to the registration page or display an error message.
    echo "Registration failed: " . mysqli_error($conn);
  }
}

// Close the database connection
mysqli_close($conn);
?>
