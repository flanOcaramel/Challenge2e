<?php
// Configuration de la connexion à la base de données
// À adapter selon tes identifiants XAMPP (par défaut root sans mot de passe)

class Database
{
    private $host = "127.0.0.1";
    private $db_name = "zymsfdnmse_chopin_vr";
    // Use local XAMPP defaults: user 'root' with empty password (or adapt if you set one)
    private $username = "root";
    private $password = "";
    public $conn;

    // Méthode pour obtenir la connexion à la base de données
    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password,
            );
            // Définir l'encodage par défaut en UTF-8
            $this->conn->exec("set names utf8");
            // Activer le mode d'exception pour les erreurs SQL
            $this->conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION,
            );
        } catch (PDOException $exception) {
            echo "Erreur de connexion : " . $exception->getMessage();
        }

        return $this->conn;
    }
}
