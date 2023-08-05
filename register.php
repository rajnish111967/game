<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <form action="process_registraion.php" method="post">
      <h2>Create New Account</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="text" name="gameuid" placeholder="Game UID" required>
      <button type="submit">Register</button>
    </form>
  </div>
</body>
</html>
