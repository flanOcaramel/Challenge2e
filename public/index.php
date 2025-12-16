<?php
// Point d'entrée unique de l'application (Front Controller)

// Démarrage de session si nécessaire plus tard
session_start();

// Inclusion du contrôleur principal
// Note : Le chemin relatif dépend de l'emplacement de 'public/index.php'
require_once '../src/Controller/UserController.php';

// Instanciation du contrôleur
$controller = new UserController();

// Récupération de la page demandée dans l'URL (ex: index.php?page=create_avatar)
// Si aucune page, on met 'home' par défaut.
$page = $_GET['page'] ?? 'home';

// Routage simple (Switch Case)
switch ($page) {
    case 'create_avatar':
        // Affiche le formulaire de création
        $controller->createAvatarForm();
        break;

    case 'create_process':
        // Traite la soumission du formulaire
        $controller->create();
        break;
        
    case 'admin_login':
        // Page de connexion admin (Formulaire)
        $controller->adminLogin();
        break;

    case 'admin_auth':
        // Traitement du formulaire de connexion
        $controller->processAdminLogin();
        break;

    case 'admin_dashboard':
        // Page de succès après connexion
        $controller->adminDashboard();
        break;

    case 'success':
        // Page de confirmation
        $controller->success();
        break;
        
    case 'home':
    default:
        // Landing Page par défaut
        $controller->home();
        break;
}
