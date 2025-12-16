<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Chopin VR</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="home-body">

    <div class="center-content">
        <a href="index.php?page=create_avatar" class="big-button">
            Créer un Avatar
        </a>
    </div>

    <div class="center-content" style="margin-top: 1cm;">
        <button id="how-to-play-btn" class="big-button" style="width: auto; display: inline-block;">
            Comment jouer ?
        </button>
    </div>

    <div class="bottom-right-link" style="bottom: 20px; right: 20px;">
        <button id="credits-btn" class="admin-link-btn" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3);">Crédits</button>
    </div>

    <!-- Modal Comment jouer -->
    <div id="how-to-play-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: rgba(255,255,255,0.95); padding: 40px; border-radius: 12px; text-align: center; max-width: 600px; width: 90%; backdrop-filter: blur(10px);">
            <h2 style="color: #333; margin-bottom: 20px;">Comment jouer ?</h2>
            <p style="color: #666; margin-bottom: 10px;">Bienvenue dans Chopin VR ! Voici les étapes pour commencer :</p>
            <ol style="text-align: left; color: #333; margin-bottom: 20px;">
                <li>Créez votre avatar en choisissant un personnage et un monde.</li>
                <li>Entrez un nom d'utilisateur et un mot de passe sécurisé.</li>
                <li>Rendez-vous sur l'application () sur votre casque vr ou smartphone.</li>
                <li>Profitez de l'expérience immersive !</li>
            </ol>
            <button id="close-how-to-play-modal" style="margin-top: 20px; padding: 10px 20px; background: #6366f1; color: white; border: none; border-radius: 8px; cursor: pointer;">Fermer</button>
        </div>
    </div>

    <!-- Modal Crédits -->
    <div id="credits-modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: rgba(255,255,255,0.95); padding: 40px; border-radius: 12px; text-align: center; max-width: 400px; width: 90%; backdrop-filter: blur(10px);">
            <h2 style="color: #333; margin-bottom: 20px;">Crédits</h2>
            <p style="color: #666; margin-bottom: 20px;">Equipe porte-manteaux</p>
            <p style="color: #666; margin-bottom: 10px;">Développeurs:</p>
            <ul style="list-style: none; padding: 0; color: #333;">
                <li>Quentin</li>
                <li>Kamdine</li>
                <li>Sael</li>
            </ul>
            <button id="close-modal" style="margin-top: 20px; padding: 10px 20px; background: #6366f1; color: white; border: none; border-radius: 8px; cursor: pointer;">Fermer</button>
        </div>
    </div>

    <script>
        document.getElementById('how-to-play-btn').addEventListener('click', function() {
            document.getElementById('how-to-play-modal').style.display = 'flex';
        });
        document.getElementById('close-how-to-play-modal').addEventListener('click', function() {
            document.getElementById('how-to-play-modal').style.display = 'none';
        });
        document.getElementById('credits-btn').addEventListener('click', function() {
            document.getElementById('credits-modal').style.display = 'flex';
        });
        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('credits-modal').style.display = 'none';
        });
    </script>

</body>
</html>
