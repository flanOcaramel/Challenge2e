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
        class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 items-center justify-center fade-in">
        <div
            class="bg-slate-900/90 border border-indigo-500/30 p-8 rounded-2xl max-w-xl w-[90%] shadow-2xl relative text-center">

            <h2 class="text-2xl font-bold text-indigo-400 mb-6 uppercase tracking-widest"
                style="text-shadow: 0 0 10px rgba(99, 102, 241, 0.5);">
                Comment jouer ?
            </h2>

            <p class="text-gray-300 mb-6 text-sm leading-relaxed">
                Bienvenue dans Chopin VR ! Préparez-vous à l'immersion :
            </p>

            <ul class="text-left text-gray-400 space-y-4 text-sm mb-8 px-4">
                <li class="flex items-start gap-3">
                    <span class="text-indigo-500 font-bold">01.</span>
                    <span>Créez votre avatar en choisissant un personnage unique et votre monde de départ.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-indigo-500 font-bold">02.</span>
                    <span>Sécurisez votre compte avec un identifiant et un mot de passe fort.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-indigo-500 font-bold">03.</span>
                    <span>Connectez-vous sur l'application VR via votre casque ou smartphone.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="text-indigo-500 font-bold">04.</span>
                    <span>Vivez l'expérience !</span>
                </li>
            </ul>

            <button id="close-how-to-play-modal"
                class="px-8 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg transition-all shadow-lg hover:shadow-indigo-500/50 uppercase tracking-wider text-sm font-semibold">
                Fermer
            </button>
        </div>
    </div>

    <!-- Modal Crédits -->
    <div id="credits-modal"
        class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 items-center justify-center fade-in">
        <div
            class="bg-slate-900/90 border border-indigo-500/30 p-8 rounded-2xl max-w-sm w-[90%] shadow-2xl relative text-center">

            <h2 class="text-2xl font-bold text-indigo-400 mb-8 uppercase tracking-widest"
                style="text-shadow: 0 0 10px rgba(99, 102, 241, 0.5);">
                Crédits
            </h2>

            <div class="space-y-6">
                <div>
                    <h3 class="text-white font-semibold mb-2 uppercase text-xs tracking-wider opacity-60">Équipe</h3>
                    <p class="text-indigo-300 font-medium">Porte-manteaux</p>
                </div>

                <div>
                    <h3 class="text-white font-semibold mb-3 uppercase text-xs tracking-wider opacity-60">Développeurs
                    </h3>
                    <p class="text-gray-300 font-light">
                        Quentin - Kamdine - Sael
                    </p>
                </div>
            </div>

            <button id="close-modal"
                class="mt-8 px-8 py-2 bg-indigo-600 hover:bg-indigo-500 text-white rounded-lg transition-all shadow-lg hover:shadow-indigo-500/50 uppercase tracking-wider text-sm font-semibold">
                Fermer
            </button>
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