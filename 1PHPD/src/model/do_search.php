<?php
require_once '../../config/db.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';

$stmt = $pdo->prepare("SELECT * FROM Movies WHERE title LIKE :searchTitle OR director LIKE :searchDirector");
$stmt->bindValue(':searchTitle', "%$search%");
$stmt->bindValue(':searchDirector', "%$search%");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
