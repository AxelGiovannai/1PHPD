<?php


function getUserFromDatabase($pdo)
{
    if (!isset($_COOKIE['username'])) {
        return null;
    }
    $username = $_COOKIE['username'];

    $sql = "SELECT id FROM Users WHERE username = :username";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $result = $stmt->fetch();

    return $result['id'];
}
