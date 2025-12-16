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

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-black text-white">
    <!-- Contenu principal -->
    <main class="flex items-center justify-center min-h-screen">
        <a href="index.php?page=create_avatar"
           class="group relative inline-flex items-center justify-center
                  px-12 py-6 text-2xl font-semibold
                  rounded-2xl
                  bg-indigo-600 hover:bg-indigo-500
                  transition-all duration-300
                  shadow-lg hover:shadow-indigo-500/40">

            <span class="relative z-10">Créer un Avatar</span>

            <!-- Effet glow -->
            <span class="absolute inset-0 rounded-2xl bg-indigo-500 opacity-0
                         group-hover:opacity-20 transition"></span>
        </a>
    </main>

    <!-- Bouton Admin -->
    <div class="fixed bottom-6 right-6">
        <a href="index.php?page=admin_login"
           class="px-5 py-2 text-sm font-semibold
                  rounded-full
                  bg-slate-700 hover:bg-slate-600
                  transition shadow-md">
            ADMIN
        </a>
    </div>

</body>
</html>

