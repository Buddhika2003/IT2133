<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}

$msg = '';
$msg_type = ''; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw = $_POST['new_email'] ?? '';
    $email = filter_var(trim($raw), FILTER_VALIDATE_EMAIL);

    if ($email === false) {
        $msg = 'Invalid email address.';
        $msg_type = 'error';
    } else {
        
        $_SESSION['email'] = $email;
        $msg = 'Email changed successfully: ' . htmlspecialchars($email, ENT_QUOTES | ENT_SUBSTITUTE);
        $msg_type = 'success';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Change email</title>
    <style>
        .msg-success { color: green; }
        .msg-error   { color: red; }
        form { margin: 1em 0; }
    </style>
</head>
<body>
    <h1>Change email</h1>

    <form method="POST" action="">
        <input type="email" name="new_email" placeholder="New Email" required>
        <button type="submit">Change Email</button>
    </form>

    <?php if (!empty($msg)): ?>
        <p class="<?php echo ($msg_type === 'success') ? 'msg-success' : 'msg-error'; ?>">
            <?php echo $msg; ?>
        </p>
    <?php endif; ?>

    <p><a href="index.php">Back to Dashboard</a></p>
</body>
</html>
