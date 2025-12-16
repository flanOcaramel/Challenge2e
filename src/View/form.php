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
    <!-- Custom CSS (includes animation) -->
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-black text-white">

<main class="max-w-6xl mx-auto px-6 py-12">


<<<<<<< HEAD
 <form action="index.php?page=create_process" method="POST"
       class="grid grid-cols-1 lg:grid-cols-2 gap-12">

     <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
=======
        <form action="index.php?page=create_process" method="POST" class="grid grid-cols-1 lg:grid-cols-2 gap-12">
>>>>>>> origin/kamdine


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

        renderAvatar();

        /* ===== MONDES (SELECTION LOGIC) ===== */
        const worldInput = document.getElementById("idWorldInput");
        const allCards = document.querySelectorAll('.world-card');

        allCards.forEach(card => {
            card.addEventListener('click', () => {
                const id = card.getAttribute('data-id');
                worldInput.value = id;

                // Update visual selection for ALL cards with this ID (in both groups)
                allCards.forEach(c => {
                    const ring = c.querySelector('.selection-ring');
                    if (c.getAttribute('data-id') === id) {
                        ring.classList.add('active');
                    } else {
                        ring.classList.remove('active');
                    }
                });
            });
        });

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

        // Drag Interaction
        carouselContainer.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX;
            lastX = startX;
            carouselContainer.style.cursor = 'grabbing';
            pauseAnimations();
        });

        carouselContainer.addEventListener('mouseup', () => {
            if (isDown) {
                isDown = false;
                carouselContainer.style.cursor = 'grab';
                playAnimations();
            }
        });

        // Safety if mouse leaves window
        window.addEventListener('mouseup', () => {
            if (isDown) {
                isDown = false;
                carouselContainer.style.cursor = 'grab';
                playAnimations();
            }
        });

        carouselContainer.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();

            const currentX = e.pageX;
            const deltaX = currentX - lastX; // Pixel change since last frame
            lastX = currentX;

            scrubAnimations(deltaX);
        });

        // Touch support
        carouselContainer.addEventListener('touchstart', (e) => {
            isDown = true;
            startX = e.touches[0].pageX;
            lastX = startX;
            pauseAnimations();
        });
        carouselContainer.addEventListener('touchend', () => {
            isDown = false;
            playAnimations();
        });
        carouselContainer.addEventListener('touchmove', (e) => {
            if (!isDown) return;
            const currentX = e.touches[0].pageX;
            const deltaX = currentX - lastX;
            lastX = currentX;
            scrubAnimations(deltaX);
        });
    </script>

</body>

</html>