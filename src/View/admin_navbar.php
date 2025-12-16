<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Chopin VR</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .admin-navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding: 1rem 2rem;
            margin-bottom: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .admin-nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .admin-nav-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }
        
        .admin-nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 2rem;
        }
        
        .admin-nav-item a {
            text-decoration: none;
            color: #666;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .admin-nav-item a:hover,
        .admin-nav-item a.active {
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
        }
        
        .admin-logout {
            background: #ef4444;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.3s ease;
        }
        
        .admin-logout:hover {
            background: #dc2626;
        }
        
        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .admin-section {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .admin-title {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
        }
        
        .btn-primary {
            background: #6366f1;
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
        }
        
        .btn-primary:hover {
            background: #4f46e5;
        }
        
        .btn-danger {
            background: #ef4444;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        
        .btn-danger:hover {
            background: #dc2626;
        }
        
        .btn-secondary {
            background: #6b7280;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-size: 0.875rem;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background 0.3s ease;
        }
        
        .btn-secondary:hover {
            background: #4b5563;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        
        .data-table th,
        .data-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .data-table th {
            background: #f9fafb;
            font-weight: 600;
            color: #374151;
        }
        
        .data-table tr:hover {
            background: #f9fafb;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }
        
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .alert-success {
            background: #10b981;
            color: white;
        }
        
        .alert-error {
            background: #ef4444;
            color: white;
        }
        
        .actions {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); min-height: 100vh;">
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