<?php
// Modèle pour gérer les données liées aux Avatars

class AvatarModel {
    private $conn;
    private $table_name = "avatar";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Récupérer tous les avatars disponibles (pour le carrousel)
    public function findAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
