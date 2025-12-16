<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Chopin VR</title>

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

    <!-- Container -->
    <div class="w-full max-w-md
                bg-white/10 backdrop-blur-xl
                border border-white/10
                rounded-3xl p-12
                shadow-2xl text-center">

        <!-- Titre -->
        <h2 class="text-2xl font-semibold tracking-widest mb-8">
            ADMIN ACCESS
        </h2>

        <!-- Erreur -->
        <?php if (!empty($error)): ?>
            <div class="mb-6 px-5 py-3 rounded-xl
                        bg-red-500/20 text-red-400
                        border border-red-500/30 backdrop-blur">
                <?= htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire -->
        <form action="index.php?page=admin_auth" method="POST"
              class="flex flex-col gap-6 items-center">

            <input type="text" name="username" placeholder="Username" required autocomplete="off"
                   class="w-full px-5 py-4 rounded-xl
                          bg-slate-900/80 border border-slate-700
                          focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <input type="password" name="password" placeholder="Password" required
                   class="w-full px-5 py-4 rounded-xl
                          bg-slate-900/80 border border-slate-700
                          focus:outline-none focus:ring-2 focus:ring-indigo-500">

            <button type="submit"
                    class="mt-4 w-full px-8 py-4 rounded-xl
                           bg-indigo-600 hover:bg-indigo-500
                           transition duration-300
                           shadow-lg hover:shadow-indigo-500/40
                           font-semibold text-lg">
                Valider
            </button>
        </form>
    </div>

</body>
</html>

