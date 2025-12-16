<?php
// Modèle pour gérer les données liées aux Mondes

class WorldModel {
    private $conn;
    private $table_name = "world";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Récupérer tous les mondes disponibles (pour la liste de sélection)
    public function findAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
