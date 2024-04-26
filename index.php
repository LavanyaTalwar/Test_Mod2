<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoodReads App</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body><?php
session_start();

?>

    <div class="container">
        <form id="loginForm" action="auth.php" method="post">
            <h2>Login</h2>
            <div class="input-group">
                <label for="username" name="uname">Username:</label>
                <input type="text" name="uname" required>
            </div>
            <div class="input-group">
                <label for="password" name="pass">Password:</label>
                <input type="password" name="pass" required>
            </div>
            <button type="submit" name="login_submit">Login</button>
        </form>
    </div>
    <?php

?>
    <script src="script.js"></script>
</body>
</html>
