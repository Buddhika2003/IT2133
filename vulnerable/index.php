<?php
session_start();
if (!isset($_SESSION['logged_in'])) { header('Location: login.php'); exit; }
?>
<!doctype html>
<html>
    <head>
        
    <title>Dashboard</title>
</head>
<body>
  <h2>Dashboard - Vulnerable </h2>
  <p>Signed in as: <?php echo htmlspecialchars($_SESSION['user_email']); ?></p>
  <p><a href="changeEmail.php">Change Email (Vulnerable)</a></p>
  <p><a href="logout.php">Logout</a></p>
</body></html>
