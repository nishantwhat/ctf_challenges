<?php
$correct_username = 'arjuna_karmayogi';
$correct_password = 'dharma-yajna-108';
$flag = 'cbc{Y0u_Ar3_A_H1DD3N_C0MM3NT_F1nD3R}';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted_username = $_POST['username'] ?? '';
    $submitted_password = $_POST['password'] ?? '';

    if ($submitted_username === $correct_username && $submitted_password === $correct_password) {
        echo '<h1 class="success">Authentication Successful!</h1>';
        echo '<p>Here is your flag: <strong>' . htmlspecialchars($flag) . '</strong></p>';
    } else {
        echo '<h1 class="error">Authentication Failed!</h1>';
        echo '<p>Invalid username or password.</p>';
    }
    echo '<br><a href="index.php">Go back</a>';
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Challenge</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* This is the style of the first verse of the first mantra.
           The name of the keeper is 'Saptarishi'.
        */
        body { /* ... */ }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Adventurer!</h1>
        <p>Your journey begins. Find the hidden path.</p>
        <form id="authForm" action="" method="POST">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" readonly><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" readonly><br><br>
            <input type="submit" value="Login">
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
<?php
} // This closes the 'else' block
?>