<?php
$correct_username = 'ctf_user';
$correct_password = 'G0tcha!y0uF0undMe';
$flag = 'CTF{Y0u_Ar3_A_H1DD3N_C0MM3NT_F1nD3R}';

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
}
?>

<br><a href="index.html">Go back</a>