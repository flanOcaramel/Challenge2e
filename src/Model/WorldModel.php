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

    // Trouver par ID
    public function findById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idWorld = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Créer
    public function create($nameWorld, $imgWorld, $urlWorld) {
        $query = "INSERT INTO " . $this->table_name . " SET nameWorld=:nameWorld, imgWorld=:imgWorld, urlWorld=:urlWorld";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nameWorld", $nameWorld);
        $stmt->bindParam(":imgWorld", $imgWorld);
        $stmt->bindParam(":urlWorld", $urlWorld);
        return $stmt->execute();
    }

    // Mettre à jour
    public function update($id, $nameWorld, $imgWorld, $urlWorld) {
        $query = "UPDATE " . $this->table_name . " SET nameWorld=:nameWorld, imgWorld=:imgWorld, urlWorld=:urlWorld WHERE idWorld=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nameWorld", $nameWorld);
        $stmt->bindParam(":imgWorld", $imgWorld);
        $stmt->bindParam(":urlWorld", $urlWorld);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Supprimer
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE idWorld=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
