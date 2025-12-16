<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Succès</title>

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

<body class="min-h-screen flex items-center justify-center
             bg-gradient-to-br from-slate-900 via-slate-800 to-black text-white">

    <!-- Glass container -->
    <div class="w-full max-w-md p-10
                rounded-3xl
                bg-white/10 backdrop-blur-xl
                border border-white/10
                shadow-2xl
                flex flex-col items-center text-center gap-6">

        <!-- Icône succès -->
        <div class="w-16 h-16 flex items-center justify-center
                    rounded-full bg-emerald-500/20 text-emerald-400 text-3xl">
            ✓
        </div>

        <!-- Titre -->
        <h1 class="text-2xl font-semibold tracking-wide">
            Avatar saved!
        </h1>

        <!-- Description -->
        <p class="text-white/70 text-base">
            Your data has been successfully saved to the database.
        </p>

        <!-- Bouton retour -->
        <a href="index.php"
           class="mt-4 inline-flex items-center justify-center
                  px-8 py-3 rounded-xl
                  bg-indigo-600 hover:bg-indigo-500
                  transition duration-300
                  shadow-lg hover:shadow-indigo-500/40
                  font-semibold text-lg">
            Back
        </a>
    </div>

</body>
</html>
