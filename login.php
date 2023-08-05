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

// Retrieve user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Use prepared statement to avoid SQL injection
    $query = "SELECT * FROM game WHERE email=? AND password=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 1) {
      // User is authenticated; you can redirect to another page or display a success message.
      echo "Login successful!";
    } else {
      // Invalid credentials; you can redirect back to the login page or display an error message.
      echo "Invalid email or password.";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
  } else {
    // Some fields are missing; you can redirect back to the login page or display an error message.
    echo "Please enter both email and password.";
  }
}

// Close the database connection
mysqli_close($conn);
?>
