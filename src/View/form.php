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

        <?php if (!empty($error)): ?>
            <div
                class="bg-red-500/20 border border-red-500 text-red-200 px-6 py-4 rounded-xl mb-8 text-center backdrop-blur-md">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>


        <h1 class="text-2xl font-semibold">Create your character</h1>


        <form action="index.php?page=create_process" method="POST" class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">


            <!-- ================= GAUCHE (GLITCH FORM) ================= -->
            <div class="glitch-form-wrapper">
                <div class="glitch-card">
                    <div class="card-header">
                        <div class="card-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                <path d="M12 11.5a3 3 0 0 0 -3 2.824v1.176a3 3 0 0 0 6 0v-1.176a3 3 0 0 0 -3 -2.824z">
                                </path>
                            </svg>
                            <span>AVATAR CREATION</span>
                        </div>


        <input type="password" name="password" placeholder="Password" required
               pattern="(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}"
               title="8 caractères min, 1 majuscule, 1 chiffre, 1 spécial"
               class="px-5 py-4 rounded-xl bg-slate-900/80 border border-slate-700
                      focus:ring-2 focus:ring-indigo-500 outline-none">

                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="username" name="username" required="" placeholder=" "
                                value="<?= htmlspecialchars($data['username'] ?? '') ?>" />
                            <label for="username" class="form-label" data-text="USERNAME">USERNAME</label>
                        </div>


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


                    <button type="button" id="nextBtn"
                        class="w-12 h-12 rounded-full bg-slate-700 hover:bg-slate-600 text-xl flex items-center justify-center transition hover:scale-110 shadow-lg border border-white/10">
                        ›
                    </button>
                </div>

                <div id="avatarName" class="text-xl font-bold text-white/90 tracking-widest uppercase"
                    style="text-shadow: 0 2px 10px rgba(165, 180, 252, 0.5);">
                    Adventurer
                </div>
            </section>

            <!-- ================= MONDES (CSS Infinite Scroll) ================= -->
            <section class="lg:col-span-2 mt-14 overflow-hidden">

                <h2 class="text-xl font-semibold mb-8 text-center text-white/90 tracking-wider uppercase"
                    style="text-shadow: 0 2px 10px rgba(165, 180, 252, 0.5);">
                    Choose your world
                </h2>

                <input type="hidden" name="idWorld" id="idWorldInput">

                <!-- Carousel Container -->
                <div class="infinite-carousel">
                    <!-- Wrapper that holds the two groups -->
                    <div class="carousel-track-wrapper">

                        <!-- Group 1 -->
                        <div class="carousel-group">
                            <?php foreach ($worlds as $world): ?>
                                <div class="world-card" data-id="<?= $world['idWorld'] ?>">
                                    <!-- Image -->
                                    <img src="<?= htmlspecialchars($world['imgWorld']) ?>" class="world-img">

                                    <!-- Overlay Title -->
                                    <div class="world-overlay">
                                        <h3 class="world-title-text">
                                            <?= htmlspecialchars($world['nameWorld']) ?>
                                        </h3>
                                    </div>

                                    <!-- Selection Ring -->
                                    <div class="selection-ring"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>


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

                </div>



        </form>
    </main>

    <!-- ================= JS ================= -->
    <script>
        /* ===== AVATARS (DYNAMIC FROM PHP) ===== */
        const avatars = <?php
        $avatarsJS = array_map(function ($a) {
            return [
                'id' => $a['idAvatar'],
                'name' => $a['nameAvatar'],
                'img' => $a['imgAvatar']
            ];
        }, $avatars);
        echo json_encode($avatarsJS);
        ?>;

        // Restore selection or default to 0
        const savedAvatarId = <?= isset($data['idAvatar']) ? $data['idAvatar'] : 'null' ?>;
        let currentAvatar = 0;

        if (savedAvatarId) {
            const foundIndex = avatars.findIndex(a => a.id == savedAvatarId);
            if (foundIndex !== -1) currentAvatar = foundIndex;
        }

        const avatarImg = document.getElementById("avatarPreview");
        const avatarName = document.getElementById("avatarName");
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
        { id: 2, name: "Mago Dog", img: "assets/img/chien_pug.jpg" },
        { id: 3, name: "Mako Shark", img: "assets/img/requin_mako.jpg" },
        { id: 4, name: "Fitness Man", img: "assets/img/fitness_man.jpg" },
        { id: 5, name: "Astronaut", img: "assets/img/astronaute.jpg" }
    ];

    let currentAvatar = 0;

    const avatarImg = document.getElementById("avatarPreview");
    const avatarName = document.getElementById("avatarName");
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


        // Initialize World Selection (Saved or First)
        const savedWorldId = <?= isset($data['idWorld']) ? $data['idWorld'] : 'null' ?>;

        if (allCards.length > 0) {
            let targetCard = allCards[0];

            // Should we restore a selection?
            if (savedWorldId) {
                const found = Array.from(allCards).find(c => c.getAttribute('data-id') == savedWorldId);
                if (found) targetCard = found;
            }

            const targetId = targetCard.getAttribute('data-id');
            worldInput.value = targetId;

            // Visual update
            allCards.forEach(c => {
                if (c.getAttribute('data-id') === targetId) {
                    c.querySelector('.selection-ring').classList.add('active');
                }
            });
        }

        /* ===== DRAG TO SLIDE (SCRUBBING) ===== */
        const carouselContainer = document.querySelector('.infinite-carousel');
        const carouselGroups = document.querySelectorAll('.carousel-group');

        let isDown = false;
        let startX;
        let lastX;

        // Helper to control animation
        function pauseAnimations() {
            carouselGroups.forEach(group => {
                group.getAnimations().forEach(anim => anim.pause());
            });
        }

        function playAnimations() {
            carouselGroups.forEach(group => {
                group.getAnimations().forEach(anim => anim.play());
            });
        }

        function scrubAnimations(deltaX) {
            carouselGroups.forEach(group => {
                group.getAnimations().forEach(anim => {
                    // Sensitivity: 15ms per pixel
                    let newTime = anim.currentTime - (deltaX * 15);

                    // NORMALIZE TIME to [0, 20000]
                    const duration = 20000;
                    newTime = (newTime % duration + duration) % duration;

                    anim.currentTime = newTime;
                });
            });
        }

        // Hover Effects
        carouselContainer.addEventListener('mouseenter', () => {
            if (!isDown) pauseAnimations();
        });
        carouselContainer.addEventListener('mouseleave', () => {
            if (!isDown) playAnimations();
        });


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

    worldItems.forEach((item, idx) => {
        item.onclick = () => {
            currentWorld = idx;
            renderWorld();
        };
    });

    renderWorld();
</script>

<?php if (isset($_SESSION['error'])): ?>
<script>
alert("<?php echo $_SESSION['error']; ?>");
</script>
<?php unset($_SESSION['error']); ?>
<?php endif; ?>

</body>
</html>