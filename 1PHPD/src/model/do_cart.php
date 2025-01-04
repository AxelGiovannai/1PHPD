<?php

require_once '../../config/db.php';
require_once '../model/User.php';




$userId = getUserFromDatabase($pdo);

$sql = "SELECT Movies.id, Movies.title, Movies.image_url, Movies.price, Cart.quantity FROM Cart JOIN Movies ON Cart.movie_id = Movies.id WHERE Cart.user_id = :userId";
$stmt = $pdo->prepare($sql);
$stmt->execute(['userId' => $userId]);
$result = $stmt->fetchAll();

$total = 0;
?>

<body>
  <div class="flex flex-col md:flex-row md:items-start md:justify-center">
    <div class="md:w-2/3 md:pr-4">
      <?php
      if ($result) {
        foreach ($result as $row) {
          $total += $row["price"];
          echo '<div class="flex flex-col justify-between my-6 rounded-lg bg-gray-800 p-6 shadow-md sm:flex-row sm:items-start">';
          echo '<img src="' . $row["image_url"] . '" alt="product-image" class="w-full rounded-lg sm:w-40 mb-4 sm:mb-0" />';
          echo '<div class="flex flex-col justify-between flex-grow ml-0 sm:ml-4">';
          echo '<div>';
          echo '<h2 class="text-lg font-bold text-gray-100">' . $row["title"] . '</h2>';
          echo '<p class="mt-1 text-xs text-gray-200">' . $row["price"] . ' $</p>';
          echo '</div>';
          echo '<div class="flex justify-between items-center mt-4">';
          echo '<div class="flex items-center space-x-4">';
          echo '<button type="button" class="bg-bleu3 hover:bg-bleu2 text-white font-bold py-1 px-2 text-sm rounded" onclick="updateQuantity(' . $row["id"] . ', -1)">-</button>';
          echo '<span class="text-sm text-gray-100 font-bold">' . $row["quantity"] . '</span>';
          echo '<button type="button" class="bg-bleu3 hover:bg-bleu2 text-white font-bold py-1 px-2 text-sm rounded" onclick="updateQuantity(' . $row["id"] . ', 1)">+</button>';
          echo '</div>';
          echo '</div>';
          echo '<form class="delete-from-cart-form mt-24" method="POST" action="../model/User.php">';
          echo '<input type="hidden" name="deleteMovieId" value="' . $row["id"] . '">';
          echo '<input class="bg-gradient-to-r from-pink-500 to-yellow-500 hover:from-green-400 hover:to-blue-500 text-white font-bold py-1 px-2 text-sm rounded" type="submit" value="Delete">';
          echo '</form>';
          echo '</div>';
          echo '</div>';
        }
      } else {
        echo '<div class="text-center mb-6 rounded-lg bg-gray-800 p-6 shadow-md sm:flex-row sm:items-start">';
        echo '<p class="text-xl text-gray-700/100">Empty Cart...</p>';
        echo '<p class="text-xl text-gray-700/75">Empty Cart...</p>';
        echo '<p class="text-xl text-gray-700/50">Empty Cart...</p>';
        echo '<p class="text-xl text-gray-700/25">Empty Cart...</p>';
        echo '</div>';
      }
      ?>