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

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
    // Trouver un utilisateur par son pseudo
    public function findByUsername($username) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
