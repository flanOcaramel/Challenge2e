<?php
// Modèle pour gérer les Utilisateurs (Création, Connexion)

class UserModel {
    private $conn;
    private $table_name = "user";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Créer un nouvel utilisateur avec son choix d'avatar et de monde
    public function create($username, $password, $idAvatar, $idWorld) {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET username=:username, password=:password, idAvatar=:idAvatar, idWorld=:idWorld, userRole='JOUEUR'";

        $stmt = $this->conn->prepare($query);

        // Nettoyage des données pour éviter les failles XSS simples
        $username = htmlspecialchars(strip_tags($username));
        // Note: Le mot de passe doit déjà être haché avant d'arriver ici

        // Liaison des paramètres
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":idAvatar", $idAvatar);
        $stmt->bindParam(":idWorld", $idWorld);

        try {
            if($stmt->execute()) {
                return true;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }
    // Trouver un utilisateur par son pseudo
    public function findByUsername($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Trouver tous les utilisateurs avec avatar et monde
    public function findAll() {
        $query = "SELECT u.*, a.nameAvatar, w.nameWorld FROM " . $this->table_name . " u LEFT JOIN avatar a ON u.idAvatar = a.idAvatar LEFT JOIN world w ON u.idWorld = w.idWorld";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Trouver par ID
    public function findById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE idUser = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Compter les utilisateurs
    public function count() {
        $query = "SELECT COUNT(*) as count FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }

    // Mettre à jour sans mot de passe
    public function update($id, $username, $userRole, $idAvatar, $idWorld) {
        $query = "UPDATE " . $this->table_name . " SET username=:username, userRole=:userRole, idAvatar=:idAvatar, idWorld=:idWorld WHERE idUser=:id";
        $stmt = $this->conn->prepare($query);
        $username = htmlspecialchars(strip_tags($username));
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":userRole", $userRole);
        $stmt->bindParam(":idAvatar", $idAvatar);
        $stmt->bindParam(":idWorld", $idWorld);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Mettre à jour avec mot de passe
    public function updateWithPassword($id, $username, $userRole, $idAvatar, $idWorld, $password) {
        $query = "UPDATE " . $this->table_name . " SET username=:username, password=:password, userRole=:userRole, idAvatar=:idAvatar, idWorld=:idWorld WHERE idUser=:id";
        $stmt = $this->conn->prepare($query);
        $username = htmlspecialchars(strip_tags($username));
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":userRole", $userRole);
        $stmt->bindParam(":idAvatar", $idAvatar);
        $stmt->bindParam(":idWorld", $idWorld);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Supprimer
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE idUser=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
