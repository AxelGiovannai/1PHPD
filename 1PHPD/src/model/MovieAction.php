<?php
require_once '../../config/db.php';
require_once '../model/User.php';

$query = "SELECT id, image_url, title, price FROM movies WHERE category = 'Action'";
$stmt = $pdo->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();

$userId = getUserFromDatabase($pdo);

if (!$result) {
    echo "Error: " . $stmt->errorInfo()[2];
    exit();
}

echo '<div class="flex flex-wrap justify-center">';

foreach ($result as $row) {
    echo '<div class="max-w-sm rounded-lg bg-gray-900 overflow-hidden shadow-lg m-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4">';
    echo '<a href="./details.php?id=' . $row['id'] . '">';
    echo '<img class="w-full" src="' . $row['image_url'] . '" alt="' . $row['title'] . '">';
    echo '</a>';
    echo '<div class="px-6 py-4">';
    echo '<div class="font-bold text-bleu1 text-xl mb-2">' . $row['title'] . '</div>';
    echo '<div class="flex justify-between">';
    echo '<p class="text-bleu2 text-base">$' . $row['price'] . '</p>';
    if (isset($userId)) {
        echo '<form class="add-to-cart-form" method="POST" action="../model/User.php">';
        echo '<input type="hidden" name="movieId" value="' . $row['id'] . '">';
        echo '<input class="bg-bleu3 hover:bg-bleu2 text-white font-bold py-1 px-2 text-sm rounded" type="submit" value="Add to cart">';
        echo '</form>';
    } else {
        echo '<a href="./login.php"><button class="bg-bleu3 hover:bg-bleu2 text-white font-bold py-1 px-2 text-sm rounded">Login to add to cart</button></a>';
    }
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

echo '</div>';

?>

<script src="../../public/js/addToCart.js"></script>