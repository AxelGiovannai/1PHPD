<?php
require_once '../../config/db.php';



class MovieController
{
    private $db;
    private $table = 'Cart';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addToCart($movieId, $userId)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE user_id = :userId AND movie_id = :movieId';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':movieId', $movieId);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result) {
            // Si le film est déjà dans le panier, augmenter la quantité
            $query = 'UPDATE ' . $this->table . ' SET quantity = quantity + 1 WHERE user_id = :userId AND movie_id = :movieId';
        } else {
            // Sinon, ajouter le film au panier
            $query = 'INSERT INTO ' . $this->table . ' SET user_id = :userId, movie_id = :movieId, quantity = 1';
        }

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':movieId', $movieId);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function deleteFromCart($movieId, $userId)
    {
        // Vérifier si l'utilisateur est connecté et si l'id du film existe
        if (!isset($userId) || !isset($movieId)) {
            return false;
        }

        $query = 'DELETE FROM  ' . $this->table . ' WHERE user_id = :userId AND movie_id = :movieId';
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':movieId', $movieId);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }


    public function updateQuantity($movieId, $userId, $quantityChange)
    {
        $query = 'UPDATE ' . $this->table . ' SET quantity = quantity + :quantityChange WHERE user_id = :userId AND movie_id = :movieId';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':movieId', $movieId);
        $stmt->bindParam(':quantityChange', $quantityChange);

        if ($stmt->execute()) {
            // Vérifier si la quantité est inférieure ou égale à 0
            $query = 'SELECT quantity FROM ' . $this->table . ' WHERE user_id = :userId AND movie_id = :movieId';
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':userId', $userId);
            $stmt->bindParam(':movieId', $movieId);
            $stmt->execute();
            $result = $stmt->fetch();

            if ($result['quantity'] <= 0) {
                // Si la quantité est inférieure ou égale à 0, supprimer le film du panier
                return $this->deleteFromCart($movieId, $userId);
            }

            return true;
        }

        return false;
    }
}
