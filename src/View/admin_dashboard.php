<?php require_once 'admin_navbar.php'; ?>

<div class="admin-container">
    <div class="admin-section">
        <div class="admin-header">
            <h1 class="admin-title">Bienvenue Admin</h1>
        </div>
        <div class="dashboard-content">
            <p class="welcome-msg">Vous êtes connecté au tableau de bord.</p>
            
            <div class="info-card">
                <span class="label">Utilisateurs inscrits</span>
                <span class="value"><?php echo $userCount ?? 0; ?></span>
            </div>
            

        </div>
    </div>
</div>

</body>
</html>
