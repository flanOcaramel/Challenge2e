<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-br from-slate-900 via-slate-800 to-black text-white">

    <!-- Dashboard Card -->
    <div class="w-full max-w-lg
                bg-white/10 backdrop-blur-xl
                border border-white/10
                rounded-3xl p-14
                shadow-2xl text-center">

        <!-- Titre -->
        <h1 class="text-3xl font-semibold mb-4 tracking-wide">
            Bienvenue Admin
        </h1>

        <!-- Sous-texte -->
        <p class="text-white/70 mb-10 text-lg">
            Vous êtes connecté au tableau de bord.
        </p>

        <!-- Actions -->
        <div class="flex justify-center gap-6">

            <!-- Déconnexion -->
            <a href="index.php"
               class="px-8 py-3 rounded-xl
                      bg-red-500/20 text-red-400
                      hover:bg-red-500/30
                      transition
                      border border-red-500/30
                      font-semibold">
                Déconnexion
            </a>

        </div>
    </div>
</body>
</html>
