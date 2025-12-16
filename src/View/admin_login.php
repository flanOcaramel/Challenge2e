<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Chopin VR</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="glass-container login-container" style="padding: 60px; text-align: center; flex-direction: column;">
        <!-- Titre optionnel pour cohérence -->
        <h2 style="color: white; margin-bottom: 30px; font-weight: 300; letter-spacing: 2px;">Admin Access</h2>

        <?php if (!empty($error)): ?>
            <div class="error-msg-overlay" style="position: relative; bottom: auto; left: auto; transform: none; margin-bottom: 20px;">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form action="index.php?page=admin_auth" method="POST" class="login-form" style="display: flex; flex-direction: column; gap: 20px; align-items: center;">
            <div class="input-wrapper">
                <input type="text" name="username" placeholder="username" required class="glass-input shadow-input" autocomplete="off">
            </div>
            <div class="input-wrapper">
                <input type="password" name="password" placeholder="password" required class="glass-input shadow-input">
            </div>
            
            <button type="submit" class="glass-submit-btn" style="margin-top: 20px;">Valider</button>
        </form>
    </div>

</body>
</html>
