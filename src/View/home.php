<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Chopin VR' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-black text-white">
    <!-- Contenu principal -->
    <main class="flex items-center justify-center min-h-screen">
        <div class="glitch-container">
            <!-- This button relies on whatever 'radio-wrapper' was before, or just unstyled div if it didn't exist. My CSS rename un-breaks this. -->
            <div class="radio-wrapper">
                <a href="index.php?page=create_avatar" class="glitch-btn">
                    <span aria-hidden="true">_</span>Create your avatar
                    <span aria-hidden="true" class="btn__glitch">Create your avatar </span>
                    <label class="btn_number">r1</label>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer Buttons (Fixed Bottom Right) -->
    <!-- Position changed to RIGHT: 20px in CSS (.container-footer) -->
    <div class="container-footer">

        <!-- Button 1: Comment jouer ? (Green/Yellow R2 style) -->
        <div class="footer-radio-wrapper small" id="how-to-play-trigger">
            <input class="input" name="btn" id="value-2" type="radio">
            <div class="footer-btn footer-btn-r2">
                Play<span aria-hidden="">?</span>
                <span class="footer-btn__glitch" aria-hidden="">How_to_play?_</span>
                <label class="number">r1</label>
            </div>
        </div>

        <!-- Button 2: Crédits (Blue/Pink R3 style) -->
        <div class="footer-radio-wrapper small" id="credits-trigger">
            <input class="input" name="btn" id="value-3" type="radio">
            <div class="footer-btn footer-btn-r3">
                Credits<span aria-hidden=""></span>
                <span class="footer-btn__glitch" aria-hidden="">_Credits_</span>
                <label class="number">r2</label>
            </div>
        </div>

    </div>

    <!-- Modal Comment jouer -->
    <div id="how-to-play-modal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div
            style="background: rgba(255,255,255,0.95); padding: 40px; border-radius: 12px; text-align: center; max-width: 600px; width: 90%; backdrop-filter: blur(10px);">
            <h2 style="color: #333; margin-bottom: 20px;">Comment jouer ?</h2>
            <p style="color: #666; margin-bottom: 10px;">Bienvenue dans Chopin VR ! Voici les étapes pour commencer :
            </p>
            <ol style="text-align: left; color: #333; margin-bottom: 20px;">
                <li>Créez votre avatar en choisissant un personnage et un monde.</li>
                <li>Entrez un nom d'utilisateur et un mot de passe sécurisé.</li>
                <li>Rendez-vous sur l'application () sur votre casque vr ou smartphone.</li>
                <li>Profitez de l'expérience immersive !</li>
            </ol>
            <button id="close-how-to-play-modal"
                style="margin-top: 20px; padding: 10px 20px; background: #6366f1; color: white; border: none; border-radius: 8px; cursor: pointer;">Fermer</button>
        </div>
    </div>

    <!-- Modal Crédits -->
    <div id="credits-modal"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div
            style="background: rgba(255,255,255,0.95); padding: 40px; border-radius: 12px; text-align: center; max-width: 400px; width: 90%; backdrop-filter: blur(10px);">
            <h2 style="color: #333; margin-bottom: 20px;">Crédits</h2>
            <p style="color: #666; margin-bottom: 20px;">Equipe porte-manteaux</p>
            <p style="color: #666; margin-bottom: 10px;">Développeurs:</p>
            <ul style="list-style: none; padding: 0; color: #333;">
                <li>Quentin</li>
                <li>Kamdine</li>
                <li>Sael</li>
            </ul>
            <button id="close-modal"
                style="margin-top: 20px; padding: 10px 20px; background: #6366f1; color: white; border: none; border-radius: 8px; cursor: pointer;">Fermer</button>
        </div>
    </div>

    <script>
        // Use 'click' on the wrapper to trigger modals
        document.getElementById('how-to-play-trigger').addEventListener('click', function () {
            document.getElementById('how-to-play-modal').style.display = 'flex';
        });

        document.getElementById('close-how-to-play-modal').addEventListener('click', function () {
            document.getElementById('how-to-play-modal').style.display = 'none';
        });

        document.getElementById('credits-trigger').addEventListener('click', function () {
            document.getElementById('credits-modal').style.display = 'flex';
        });

        document.getElementById('close-modal').addEventListener('click', function () {
            document.getElementById('credits-modal').style.display = 'none';
        });
    </script>
</body>

</html>