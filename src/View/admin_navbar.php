<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Chopin VR</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Police Premium mais sobre : Outfit (Titres) & Inter (Corps) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Outfit:wght@500;700&display=swap" rel="stylesheet">
    <style>
        /* --- ADMIN THEME : BALANCED & CLEAN --- */
        
        :root {
            --bg-deep: #0f172a; /* Slate 900 */
            --bg-card: rgba(30, 41, 59, 0.7); /* Slate 800 semi-transparent */
            --border-light: rgba(255, 255, 255, 0.1);
            --accent-color: #6366f1; /* Indigo */
            --text-white: #f8fafc;
            --text-gray: #cbd5e1;
            
            --font-title: 'Outfit', sans-serif;
            --font-text: 'Inter', sans-serif;
        }

        body {
            /* Retour à un fond sombre élégant mais pas "noir total" */
            background: linear-gradient(to bottom right, #0f172a, #1e293b);
            background-attachment: fixed;
            font-family: var(--font-text);
            color: var(--text-white);
            display: block; /* Important pour structure admin */
        }

        /* Navbar - Simple et Efficace */
        .admin-navbar {
            background: rgba(15, 23, 42, 0.9); /* Plus opaque pour la lisibilité */
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border-light);
            padding: 1rem 0;
            margin-bottom: 3rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .admin-nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .admin-nav-brand {
            font-family: var(--font-title);
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
            letter-spacing: 0.5px;
        }
        
        .admin-nav-menu {
            display: flex;
            list-style: none;
            gap: 1rem;
            margin: 0;
            padding: 0;
            background: rgba(255,255,255,0.03);
            padding: 5px;
            border-radius: 50px;
            border: 1px solid var(--border-light);
        }
        
        .admin-nav-item a {
            text-decoration: none;
            color: var(--text-gray);
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1.2rem;
            border-radius: 25px;
            transition: all 0.2s ease;
            display: block;
        }
        
        .admin-nav-item a:hover,
        .admin-nav-item a.active {
            background: rgba(255, 255, 255, 0.1);
            color: white;
        }
        
        .admin-logout {
            font-family: var(--font-title);
            background: #ef4444; /* Rouge uni plus lisible */
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: background 0.2s;
        }
        
        .admin-logout:hover {
            background: #dc2626;
        }

        /* Structure */
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
        }
        
        /* Cartes Contenu - Plus lisibles */
        .admin-section {
            background: var(--bg-card); /* Fond unifié */
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-light);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-light);
            padding-bottom: 1.5rem;
        }
        
        .admin-title {
            font-family: var(--font-title);
            font-size: 2rem;
            font-weight: 700;
            color: white;
        }

        /* --- Éléments du Dashboard (Simple) --- */
        .dashboard-content {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .welcome-msg {
            font-size: 1.1rem;
            color: var(--text-gray);
        }

        .info-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border-light);
            padding: 1.5rem;
            border-radius: 12px;
            display: inline-flex;
            flex-direction: column;
            width: fit-content;
            min-width: 200px;
        }

        .info-card .label {
            font-size: 0.9rem;
            color: var(--text-gray);
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .info-card .value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent-color);
            line-height: 1;
        }

        /* --- Tableaux (Lisible & Propre) --- */
        .data-table {
            width: 100%;
            border-collapse: collapse; /* Retour au standard pour lisibilité */
            margin-top: 1rem;
        }
        
        .data-table th {
            text-align: left;
            padding: 1rem;
            color: var(--text-gray);
            font-size: 0.85rem;
            text-transform: uppercase;
            font-weight: 600;
            border-bottom: 1px solid var(--border-light);
        }
        
        .data-table td {
            padding: 1.2rem 1rem;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
        }
        
        .data-table tr:last-child td {
            border-bottom: none;
        }
        
        .data-table tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        /* --- Boutons Standardisés --- */
        .btn-primary {
            background: var(--accent-color);
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            border: none;
            transition: background 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-primary:hover {
            background: #4f46e5;
        }
        
        .btn-secondary {
            background: #334155; /* Slate 700 Filled */
            border: 1px solid #334155;
            color: white; /* Texte blanc pour visibilité */
            padding: 0.5rem 1rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-secondary:hover {
            background: #475569; /* Lighter Slate */
            border-color: #475569;
            color: white;
            transform: translateY(-1px);
        }

        .btn-danger {
            background: #ef4444; /* Red Filled */
            border: 1px solid #ef4444;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }
        
        .btn-danger:hover {
            background: #dc2626; /* Darker Red */
            border-color: #dc2626;
            color: white;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        /* --- Formulaires --- */
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--text-gray);
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem;
            background: rgba(15, 23, 42, 0.8);
            border: 1px solid var(--border-light);
            border-radius: 8px;
            color: white;
            font-family: var(--font-text);
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--accent-color);
        }

        /* Images */
        .img-thumbnail {
            width: 50px;
            height: 50px;
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid var(--border-light);
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }
        .alert-success { background: rgba(16, 185, 129, 0.15); color: #34d399; }
        .alert-error { background: rgba(239, 68, 68, 0.15); color: #fca5a5; }

        .actions {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body style="background: linear-gradient(to bottom right, #0f172a, #1e293b); min-height: 100vh; display: block;">
    <nav class="admin-navbar">
        <div class="admin-nav-container">
            <div class="admin-nav-brand">Admin Chopin VR</div>
            <ul class="admin-nav-menu">
                <li class="admin-nav-item">
                    <a href="index.php?page=admin_dashboard">Dashboard</a>
                </li>
                <li class="admin-nav-item">
                    <a href="index.php?page=admin_worlds">Mondes</a>
                </li>
                <li class="admin-nav-item">
                    <a href="index.php?page=admin_avatars">Avatars</a>
                </li>
                <li class="admin-nav-item">
                    <a href="index.php?page=admin_users">Utilisateurs</a>
                </li>
            </ul>
            <a href="index.php?page=logout" class="admin-logout">Déconnexion</a>
        </div>
    </nav>