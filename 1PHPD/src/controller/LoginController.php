<?php

require '../../config/db.php';

$login_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM Users WHERE username = :username";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $result = $stmt->fetch();

    if ($result) {
        if (password_verify($password, $result['password'])) {
            $login_message = "<p class='p-2 text-center text-green-500'>Login successful!</p>";
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // Faire durer le cookie 30 jours
            } else {
                $_SESSION['username'] = $username;
                $_SESSION['userId'] = $result['id']; // Mettre le userId dans la session
            }
        } else {
            $login_message = "<p class='p-2 text-center text-red-500'>Invalid password.</p>";
        }
    } else {
        $login_message = "<p class='p-2 text-center text-red-500'>Email not found.</p>";
    }
}
