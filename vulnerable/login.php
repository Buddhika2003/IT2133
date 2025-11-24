<?php
session_start();
$err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $pass  = $_POST['password'] ?? '';

    $correct_email = 'ab@cd.com';
    $correct_pass  = 'abcd1234';

    if ($email === $correct_email && $pass === $correct_pass) {
        $_SESSION['logged_in'] = true;
        $_SESSION['user_email'] = $email;
        header('Location: index.php'); exit;
    } else {
        $err = "Invalid credentials.";
    }
}
?>
<!doctype html>
<html>
    <head>
    <title>Login (Vulnerable)</title>
</head>
<body>
  <h2>Login - Vulnerable</h2>
  <form method="post" action="">
    <input name="email" placeholder="Email" required><br><br>
    <input name="password" type="password" placeholder="Password" required><br><br>
    <button type="submit">Login</button>
  </form>
  <p style="color:red;"><?php echo htmlspecialchars($err); ?></p>
  <p>Use: <b>ab@cd.com</b> / <b>abcd1234</b></p>
</body></html>
