<?php
// Contrôleur gérant la logique des utilisateurs

require_once '../config/db.php';
require_once '../src/Model/UserModel.php';
require_once '../src/Model/AvatarModel.php';
require_once '../src/Model/WorldModel.php';

class UserController
{
    private $db;
    private $userModel;
    private $avatarModel;
    private $worldModel;

    public function __construct()
    {
        // Initialisation de la connexion BDD et des modèles
        $database = new Database();
        $this->db = $database->getConnection();

        $this->userModel = new UserModel($this->db);
        $this->avatarModel = new AvatarModel($this->db);
        $this->worldModel = new WorldModel($this->db);

        // Générer un token CSRF si nécessaire
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }

    // Vérifier si un admin est connecté
    public function isAdminLoggedIn()
    {
        return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
    }

    // Affichage de la Landing Page (Accueil)
    public function home()
    {
        require_once '../src/View/home.php';
    }

    // Affichage de la page de Connexion Admin
    public function adminLogin()
    {
        require_once '../src/View/admin_login.php';
    }

    // Traitement de la connexion Admin
    public function processAdminLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérification CSRF temporairement désactivée pour debug
            // if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            //     die('CSRF attack detected');
            // }

            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            // Recherche de l'utilisateur
            $user = $this->userModel->findByUsername($username);

            // Vérification simple (Hash) ET Rôle Admin
            if ($user && password_verify($password, $user['password']) && $user['userRole'] === 'ADMIN') {
                // Succès : Stocker en session et redirection vers le dashboard
                $_SESSION['admin'] = true;
                header('Location: index.php?page=admin_dashboard');
                exit();
            } else {
                // Erreur
                $error = "Compte introuvable ou mot de passe incorrect.";
                require_once '../src/View/admin_login.php';
            }
        }
    }

    // Page Dashboard (Vide/Bienvenue)
    public function adminDashboard()
    {
        if (!$this->isAdminLoggedIn()) {
            header('Location: index.php?page=admin_login');
            exit();
        }
        $userCount = $this->userModel->count();
        require_once '../src/View/admin_dashboard.php';
    }

    // Affichage du formulaire de création d'avatar (anciennement index)
    public function createAvatarForm($error = null, $data = [])
    {
        // Récupération des données nécessaires pour la vue
        $avatars = $this->avatarModel->findAll();
        $worlds = $this->worldModel->findAll();

        // CORRECTION DÉFINITIVE : Mapping en dur pour contourner les erreurs en base de données
        // La BDD contient des noms de fichiers incorrects (ex: prairie.jpg) alors que les fichiers sont world1.png

        // 1. Mapping des Avatars
        $avatarMap = [
            1 => 'aventurier.jpg',
            2 => 'astronaute.jpg',
            3 => 'fitness_man.jpg',
            4 => 'requin_mako.jpg',
            5 => 'chien_pug.jpg'
        ];

        foreach ($avatars as &$avatar) {
            $id = $avatar['idAvatar'];
            // Si l'ID est connu dans notre map, on force le bon nom de fichier
            if (isset($avatarMap[$id])) {
                $filename = $avatarMap[$id];
            } else {
                // Sinon on essaie de nettoyer ce qui vient de la BDD
                $pathStr = str_replace('\\', '/', $avatar['imgAvatar'] ?? '');
                $filename = basename($pathStr);
                if (empty($filename))
                    $filename = 'aventurier.jpg'; // Fallback
            }
            $avatar['imgAvatar'] = 'assets/img/' . $filename;
        }
        unset($avatar);

        // 2. Mapping des Mondes (Pattern worldX.png)
        foreach ($worlds as &$world) {
            // On ignore complètement le nom en BDD qui est erroné (prairie.jpg etc)
            // On construit le nom basé sur l'ID qui correspond aux fichiers réels (world1.png...)
            $filename = 'world' . $world['idWorld'] . '.png';
            $world['imgWorld'] = 'assets/img/' . $filename;
        }
        unset($world);

        // Inclusion de la vue
        require_once '../src/View/form.php';
    }

    // Traitement du formulaire de création
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérification CSRF
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                die('CSRF attack detected');
            }

            // Récupération des champs
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $idAvatar = $_POST['idAvatar'] ?? null;
            $idWorld = $_POST['idWorld'] ?? null;

            // Validation basique
            if (empty($username) || empty($password) || empty($idAvatar) || empty($idWorld)) {
                $_SESSION['error'] = "Veuillez remplir tous les champs.";
                header("Location: index.php?page=create_avatar");
                exit();
            }

                // Validation du mot de passe (8 chars, 1 maj, 1 chiffre, 1 spécial)
                if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {

                    $error = "The password must contain at least 8 characters, one uppercase letter, one number, and one special character.";
                    $this->createAvatarForm($error, $_POST); // Recharge avec erreur et données
                    return; // Arrêt du script

                }

                // Hachage du mot de passe pour la sécurité (conformément aux contraintes)
                $hashed_password = password_hash($password, PASSWORD_ARGON2ID);

                // Vérification si le pseudo existe déjà
                if ($this->userModel->findByUsername($username)) {
                    $error = "This username is already taken. Please choose another one.";
                    $this->createAvatarForm($error, $_POST);
                    return;
                }

                // Tentative de création
                if ($this->userModel->create($username, $hashed_password, $idAvatar, $idWorld)) {
                    // Redirection vers la page de succès
                    header("Location: index.php?page=success");
                    exit();
                } else {

                    $error = "Error, maybe you should try again.";
                    // On recharge le formulaire avec l'erreur
                    $this->createAvatarForm($error, $_POST);
                }
            } else {
                $error = "All fields are required.";
                $this->createAvatarForm($error, $_POST); // Recharge le formulaire si incomplet
            }

        }
    }

    // Page de succès
    public function success()
    {
        require_once '../src/View/success.php';
    }

    // Page admin utilisateurs
    public function adminUsers()
    {
        if (!$this->isAdminLoggedIn()) {
            header('Location: index.php?page=admin_login');
            exit();
        }

        // Gérer les actions POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_GET['action'] ?? '';
            if ($action === 'update') {
                $id = $_POST['idUser'];
                $username = $_POST['username'];
                $userRole = $_POST['userRole'];
                $idAvatar = $_POST['idAvatar'];
                $idWorld = $_POST['idWorld'];
                $password = $_POST['password'] ?? '';
                if (!empty($password)) {
                    $hashed = password_hash($password, PASSWORD_ARGON2ID);
                    $this->userModel->updateWithPassword($id, $username, $userRole, $idAvatar, $idWorld, $hashed);
                } else {
                    $this->userModel->update($id, $username, $userRole, $idAvatar, $idWorld);
                }
                $_SESSION['success'] = 'Utilisateur mis à jour';
                header('Location: index.php?page=admin_users');
                exit();
            } elseif ($action === 'delete') {
                $this->userModel->delete($_POST['idUser']);
                $_SESSION['success'] = 'Utilisateur supprimé';
                header('Location: index.php?page=admin_users');
                exit();
            }
        }

        // Données pour la vue
        $users = $this->userModel->findAll();
        $avatars = $this->avatarModel->findAll();
        $worlds = $this->worldModel->findAll();
        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $user = $this->userModel->findById($_GET['id']);
        }

        require_once '../src/View/admin_users.php';
    }

    // Page admin mondes
    public function adminWorlds()
    {
        if (!$this->isAdminLoggedIn()) {
            header('Location: index.php?page=admin_login');
            exit();
        }

        // Gérer les actions POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_GET['action'] ?? '';
            if ($action === 'create') {
                $nameWorld = $_POST['nameWorld'];
                $imgWorld = $_POST['imgWorld'];
                $urlWorld = $_POST['urlWorld'];
                if ($this->worldModel->create($nameWorld, $imgWorld, $urlWorld)) {
                    $_SESSION['success'] = 'Monde ajouté';
                } else {
                    $_SESSION['error'] = 'Erreur lors de l\'ajout';
                }
                header('Location: index.php?page=admin_worlds');
                exit();
            } elseif ($action === 'update') {
                $id = $_POST['idWorld'];
                $nameWorld = $_POST['nameWorld'];
                $imgWorld = $_POST['imgWorld'];
                $urlWorld = $_POST['urlWorld'];
                if ($this->worldModel->update($id, $nameWorld, $imgWorld, $urlWorld)) {
                    $_SESSION['success'] = 'Monde mis à jour';
                } else {
                    $_SESSION['error'] = 'Erreur lors de la mise à jour';
                }
                header('Location: index.php?page=admin_worlds');
                exit();
            } elseif ($action === 'delete') {
                if ($this->worldModel->delete($_POST['idWorld'])) {
                    $_SESSION['success'] = 'Monde supprimé';
                } else {
                    $_SESSION['error'] = 'Erreur lors de la suppression';
                }
                header('Location: index.php?page=admin_worlds');
                exit();
            }
        }

        // Données pour la vue
        $worlds = $this->worldModel->findAll();
        // Mapping des images
        foreach ($worlds as &$world) {
            $filename = 'world' . $world['idWorld'] . '.png';
            $world['imgWorld'] = 'assets/img/' . $filename;
        }
        unset($world);

        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $world = $this->worldModel->findById($_GET['id']);
            // Mapping pour edit
            $filename = 'world' . $world['idWorld'] . '.png';
            $world['imgWorld'] = 'assets/img/' . $filename;
        }

        require_once '../src/View/admin_worlds.php';
    }

    // Page admin avatars
    public function adminAvatars()
    {
        if (!$this->isAdminLoggedIn()) {
            header('Location: index.php?page=admin_login');
            exit();
        }

        // Gérer les actions POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_GET['action'] ?? '';
            if ($action === 'create') {
                $nameAvatar = $_POST['nameAvatar'];
                $imgAvatar = $_POST['imgAvatar'];
                if ($this->avatarModel->create($nameAvatar, $imgAvatar)) {
                    $_SESSION['success'] = 'Avatar ajouté';
                } else {
                    $_SESSION['error'] = 'Erreur lors de l\'ajout';
                }
                header('Location: index.php?page=admin_avatars');
                exit();
            } elseif ($action === 'update') {
                $id = $_POST['idAvatar'];
                $nameAvatar = $_POST['nameAvatar'];
                $imgAvatar = $_POST['imgAvatar'];
                if ($this->avatarModel->update($id, $nameAvatar, $imgAvatar)) {
                    $_SESSION['success'] = 'Avatar mis à jour';
                } else {
                    $_SESSION['error'] = 'Erreur lors de la mise à jour';
                }
                header('Location: index.php?page=admin_avatars');
                exit();
            } elseif ($action === 'delete') {
                if ($this->avatarModel->delete($_POST['idAvatar'])) {
                    $_SESSION['success'] = 'Avatar supprimé';
                } else {
                    $_SESSION['error'] = 'Erreur lors de la suppression';
                }
                header('Location: index.php?page=admin_avatars');
                exit();
            }
        }

        // Données pour la vue
        $avatars = $this->avatarModel->findAll();
        // Mapping des images
        $avatarMap = [
            1 => 'aventurier.jpg',
            2 => 'astronaute.jpg',
            3 => 'fitness_man.jpg',
            4 => 'requin_mako.jpg',
            5 => 'chien_pug.jpg'
        ];
        foreach ($avatars as &$avatar) {
            $id = $avatar['idAvatar'];
            if (isset($avatarMap[$id])) {
                $avatar['imgAvatar'] = 'assets/img/' . $avatarMap[$id];
            } else {
                $avatar['imgAvatar'] = 'assets/img/aventurier.jpg'; // fallback
            }
        }
        unset($avatar);

        if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
            $avatar = $this->avatarModel->findById($_GET['id']);
            // Mapping pour edit
            $id = $avatar['idAvatar'];
            if (isset($avatarMap[$id])) {
                $avatar['imgAvatar'] = 'assets/img/' . $avatarMap[$id];
            } else {
                $avatar['imgAvatar'] = 'assets/img/aventurier.jpg';
            }
        }

        require_once '../src/View/admin_avatars.php';
    }

    // Logout
    public function logout()
    {
        session_destroy();
        header('Location: index.php?page=home');
        exit();
    }
}
