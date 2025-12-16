<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Avatar - Chopin VR</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { scrollbar-width: none; }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-black text-white">

<main class="max-w-6xl mx-auto px-6 py-12">

<form action="index.php?page=create_process" method="POST"
      class="grid grid-cols-1 lg:grid-cols-2 gap-12">

    <!-- ================= GAUCHE ================= -->
    <section class="bg-white/10 backdrop-blur-xl border border-white/10
                    rounded-3xl p-10 shadow-2xl flex flex-col gap-6">

        <h1 class="text-2xl font-semibold">Create your character</h1>

        <input type="text" name="username" placeholder="Username" required
               class="px-5 py-4 rounded-xl bg-slate-900/80 border border-slate-700
                      focus:ring-2 focus:ring-indigo-500 outline-none">

        <input type="password" name="password" placeholder="Password" required
               pattern="(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}"
               title="8 caractères min, 1 majuscule, 1 chiffre, 1 spécial"
               class="px-5 py-4 rounded-xl bg-slate-900/80 border border-slate-700
                      focus:ring-2 focus:ring-indigo-500 outline-none">

        <button type="submit"
                class="mt-4 px-8 py-4 rounded-xl bg-indigo-600 hover:bg-indigo-500
                       transition shadow-lg font-semibold text-lg">
            Save your character
        </button>
    </section>

    <!-- ================= AVATAR ================= -->
    <section class="flex flex-col items-center gap-6">

        <input type="hidden" name="idAvatar" id="idAvatarInput">

        <div class="flex items-center gap-8">

            <button type="button" id="prevBtn"
                    class="w-12 h-12 rounded-full bg-slate-700 hover:bg-slate-600 text-xl">
                ‹
            </button>

            <div class="w-64 h-80 rounded-2xl bg-gradient-to-b from-emerald-400/20 to-slate-900
                        border border-white/10 shadow-xl flex items-center justify-center">
                <img id="avatarPreview" src="" alt="Avatar"
                     class="max-h-full object-contain">
            </div>

            <button type="button" id="nextBtn"
                    class="w-12 h-12 rounded-full bg-slate-700 hover:bg-slate-600 text-xl">
                ›
            </button>
        </div>

        <div id="avatarName" class="text-lg font-semibold text-white/80">
            Adventurer
        </div>
    </section>

    <!-- ================= MONDES ================= -->
    <section class="lg:col-span-2 mt-14">

        <h2 class="text-xl font-semibold mb-8 text-center">
            Choose your world
        </h2>

        <input type="hidden" name="idWorld" id="idWorldInput" required>

        <div class="flex items-center justify-center gap-10">

            <button type="button" id="worldPrev"
                    class="w-12 h-12 rounded-full bg-slate-700 hover:bg-slate-600 text-xl">
                ‹
            </button>

            <div id="worldCarousel"
                 class="flex gap-8 overflow-x-auto scroll-smooth snap-x snap-mandatory
                        max-w-[900px] px-2 scrollbar-hide">

                <?php foreach ($worlds as $world): ?>
                    <div data-id="<?= $world['idWorld'] ?>"
                         class="world-item snap-center shrink-0 w-64
                                bg-white/10 backdrop-blur border border-white/10
                                rounded-2xl overflow-hidden cursor-pointer
                                transition hover:scale-105">

                        <img src="<?= htmlspecialchars($world['imgWorld']) ?>"
                             class="h-40 w-full object-cover">

                        <div class="p-4 text-center font-semibold">
                            <?= htmlspecialchars($world['nameWorld']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>

            <button type="button" id="worldNext"
                    class="w-12 h-12 rounded-full bg-slate-700 hover:bg-slate-600 text-xl">
                ›
            </button>
        </div>
    </section>

</form>
</main>

<!-- ================= JS ================= -->
<script>
    /* ===== AVATARS ===== */
    const avatars = [
    { id: 1, name: "Adventurer", img: "assets/img/aventurier.jpg" },
    { id: 2, name: "chien_mako",    img: "assets/img/chien_pug.jpg" },
    { id: 3, name: "requin_mako",       img: "assets/img/requin_mako.jpg" },
    { id: 4, name: "fitness_man",      img: "assets/img/fitness_man.jpg" },
    { id: 5, name: "astraunote",      img: "assets/img/astronaute.jpg" }
];

    let currentAvatar = 0;

    const avatarImg   = document.getElementById("avatarPreview");
    const avatarName  = document.getElementById("avatarName");
    const avatarInput = document.getElementById("idAvatarInput");

    function renderAvatar() {
        avatarImg.src = avatars[currentAvatar].img;
        avatarName.textContent = avatars[currentAvatar].name;
        avatarInput.value = avatars[currentAvatar].id;
    }

    document.getElementById("prevBtn").onclick = () => {
        currentAvatar = (currentAvatar - 1 + avatars.length) % avatars.length;
        renderAvatar();
    };

    document.getElementById("nextBtn").onclick = () => {
        currentAvatar = (currentAvatar + 1) % avatars.length;
        renderAvatar();
    };

    renderAvatar();

    /* ===== MONDES ===== */
    /* ===== MONDES ===== */
    const carousel = document.getElementById("worldCarousel");
    const worldItems = document.querySelectorAll(".world-item");
    const worldInput = document.getElementById("idWorldInput");
    let currentWorld = 0;

    function renderWorld() {
        // Scroll vers l'élément courant
        worldItems[currentWorld].scrollIntoView({ behavior: 'smooth', inline: 'center' });

        // Mise en surbrillance
        worldItems.forEach((el, idx) => {
            el.classList.toggle("ring-2", idx === currentWorld);
            el.classList.toggle("ring-indigo-500", idx === currentWorld);
            el.classList.toggle("scale-110", idx === currentWorld);
        });

        worldInput.value = worldItems[currentWorld].dataset.id;
    }

    document.getElementById("worldPrev").onclick = () => {
        currentWorld = (currentWorld - 1 + worldItems.length) % worldItems.length;
        renderWorld();
    };

    document.getElementById("worldNext").onclick = () => {
        currentWorld = (currentWorld + 1) % worldItems.length;
        renderWorld();
    };

  
    renderWorld();

    worldItems.forEach((item, idx) => {
        item.onclick = () => {
            currentWorld = idx;
            renderWorld();
        };
    });
</script>

</body>
</html>


