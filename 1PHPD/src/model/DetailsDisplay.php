<?php
require '../../config/db.php';
require_once '../model/User.php';

$userId = getUserFromDatabase($pdo);

$film_id = $_GET['id'];
$query = "SELECT * FROM movies WHERE id = :film_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['film_id' => $film_id]);
$film = $stmt->fetch();

$query_actors = "SELECT Actors.name FROM Actors JOIN MovieActors ON Actors.id = MovieActors.actor_id WHERE MovieActors.movie_id = :film_id";
$stmt_actors = $pdo->prepare($query_actors);
$stmt_actors->execute(['film_id' => $film_id]);
$actors = $stmt_actors->fetchAll(PDO::FETCH_COLUMN);

if ($film) {
    echo '<div class="flex flex-col md:flex-row">';
    echo '<img class="w-full md:w-1/6 object-cover object-center" src="' . $film['image_url'] . '" alt="' . $film['title'] . '">';
    echo '<div class="px-6 py-4">';
    echo '<div class="font-bold text-bleu1 text-3xl mb-2">' . $film['title'] . '</div>';
    echo '<p class="text-bleu1 text-base"><strong>Director:</strong> <a class="hover:text-cyan-600" href="search.php?search=' . urlencode($film['director']) . '">' . $film['director'] . '</a></p>';

    if ($actors) {
        echo '<p class="text-bleu1 text-base"><strong>Actors: </strong>' . implode(', ', $actors) . '.</p>';
    }

    echo '<p class="text-bleu1 text-base"><strong>Price:</strong> ' . $film['price'] . ' $</p>';
    if (isset($userId)) {
        echo '<form class="add-to-cart-form" method="POST" action="../model/User.php">';
        echo '<input type="hidden" name="movieId" value="' . $film['id'] . '">';
        echo '<input class="bg-bleu3 hover:bg-bleu2 text-bleu1 font-bold py-1 px-2 text-sm rounded" type="submit" value="Add to cart">';
        echo '</form>';
    } else {
        echo '<a href="./login.php"><button class="bg-bleu3 hover:bg-bleu2 text-white font-bold py-1 px-2 text-sm rounded">Login to add to cart</button></a>';
    }
    echo '</div>';

    echo '</div>';
    echo '<div class=" sm:ml-auto mt-10 md:ml-100 mt-4000 relative" style="padding-bottom: 56.25%;">';
    echo '<iframe class="w-full h-full absolute top-0 left-0" src="' . $film['video_url'] . '" frameborder="0" allowfullscreen></iframe>';
    echo '</div>';
} else {
    echo "No movie found";
}
?>

<script src="../../public/js/addToCart.js"></script>