<?php

require_once '../../config/db.php';
require_once '../controller/MovieController.php';
require_once '../controller/UserController.php';

$movieController = new MovieController($pdo);

if (isset($_COOKIE['username'])) {
    $username = $_COOKIE['username'];
    $userId = getUserFromDatabase($pdo, $username);
}


$movieId = isset($_POST['movieId']) ? $_POST['movieId'] : null;
$quantityChange = isset($_POST['quantityChange']) ? $_POST['quantityChange'] : null;

if (isset($userId) && isset($movieId)) {
    if (isset($quantityChange)) {
        if ($movieController->updateQuantity($movieId, $userId, $quantityChange)) {
            echo 'Quantity updated successfully';
        } else {
            echo 'Failed to update quantity';
        }
    } else {
        if ($movieController->addToCart($movieId, $userId)) {
            echo 'Movie added to cart successfully';
        } else {
            echo 'Failed to add movie to cart';
        }
    }
}


$deleteMovieId = isset($_POST['deleteMovieId']) ? $_POST['deleteMovieId'] : null;

if (isset($userId) && isset($deleteMovieId)) {
    if ($movieController->deleteFromCart($deleteMovieId, $userId)) {
        echo 'Movie deleted from cart successfully';
    } else {
        echo 'Failed to delete movie from cart';
    }
}
