<?php require_once 'admin_navbar.php'; ?>

<div class="admin-container">
    <div class="admin-section">
        <div class="admin-header">
            <h1 class="admin-title">Bienvenue Admin</h1>
        </div>
        <p>Vous êtes connecté au tableau de bord.</p>
        <p>Nombre d'utilisateurs: <?php echo $userCount ?? 0; ?></p>
        <a href="index.php?page=logout" class="btn-danger">Déconnexion</a>
    </div>
</div>

</body>
</html>
