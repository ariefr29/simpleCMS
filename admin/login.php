<?php
include('../includes/db.php');
include('../includes/auth.php');
include('../includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = cleanInput($_POST['username']);
    $password = cleanInput($_POST['password']);

    if (login($username, $password)) {
        header('Location: index.php');
        exit();
    } else {
        $error = 'Username atau password salah.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <h2 style="text-align: center;margin-top: 5rem;">Login Admin</h2>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
    <form class="loginform" action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>

        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>
</body>
</html>
