<?php require_once 'admin_navbar.php'; ?>

<div class="admin-container">
    <div class="admin-section">
        <div class="admin-header">
            <h1 class="admin-title">Dashboard</h1>
        </div>
        <p>Bienvenue dans le panneau d'administration.</p>
        <p>Nombre d'utilisateurs: <?php echo $userCount ?? 0; ?></p>
    </div>
</div>
</body>
</html>
