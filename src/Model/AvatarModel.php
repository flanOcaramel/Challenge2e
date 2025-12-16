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

    // Trouver par ID
    public function findById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idAvatar = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Créer
    public function create($nameAvatar, $imgAvatar) {
        $query = "INSERT INTO " . $this->table_name . " SET nameAvatar=:nameAvatar, imgAvatar=:imgAvatar";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nameAvatar", $nameAvatar);
        $stmt->bindParam(":imgAvatar", $imgAvatar);
        return $stmt->execute();
    }

    // Mettre à jour
    public function update($id, $nameAvatar, $imgAvatar) {
        $query = "UPDATE " . $this->table_name . " SET nameAvatar=:nameAvatar, imgAvatar=:imgAvatar WHERE idAvatar=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nameAvatar", $nameAvatar);
        $stmt->bindParam(":imgAvatar", $imgAvatar);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Supprimer
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE idAvatar=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
