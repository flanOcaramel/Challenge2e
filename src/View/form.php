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
    
    <!-- Model Viewer -->
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.4.0/model-viewer.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Fix focus outline glitch on click */
        model-viewer:focus, model-viewer:focus-visible {
            outline: none !important;
            border: none !important;
            box-shadow: none !important;
        }
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

                        <div class="card-dots"><span></span><span></span><span></span></div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" id="username" name="username" required="" placeholder=" "
                                value="<?= htmlspecialchars($data['username'] ?? '') ?>" />
                            <label for="username" class="form-label" data-text="USERNAME">USERNAME</label>
                        </div>

                        <div class="form-group">
                            <input type="password" id="password" name="password" required="" placeholder=" " />
                            <label for="password" class="form-label" data-text="ACCESS_KEY">ACCESS_KEY</label>
                        </div>

                        <button data-text="INITIATE_CONNECTION" type="submit" class="submit-btn">
                            <span class="btn-text">INITIATE_CONNECTION</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- ================= AVATAR (Adjusted vertical offset) ================= -->
            <section class="flex flex-col items-center justify-center gap-6 lg:pt-12">

                <input type="hidden" name="idAvatar" id="idAvatarInput">

                <div class="flex items-center gap-8">

                    <button type="button" id="prevBtn"
                        class="w-12 h-12 rounded-full bg-slate-700 hover:bg-slate-600 text-xl flex items-center justify-center transition hover:scale-110 shadow-lg border border-white/10">
                        ‹
                    </button>

                    <!-- Avatar Card Frame -->
                    <!-- Updated Color: #e3e4e7 -->
                    <div
                        class="w-64 h-80 rounded-2xl bg-[#e3e4e7] shadow-xl flex items-center justify-center overflow-hidden border border-white/10 relative group">
                        <!-- Inner glow/shadow for depth -->
                        <div class="absolute inset-0 shadow-[inset_0_0_20px_rgba(0,0,0,0.05)] pointer-events-none z-10">
                        </div>

                        <!-- 3D Model Viewer -->
                        <model-viewer id="avatarPreview"
                            src=""
                            alt="Avatar 3D Model"
                            shadow-intensity="1"
                            camera-controls
                            auto-rotate
                            autoplay
                            bounds="tight"
                            min-camera-orbit="auto auto 5%"
                            interpolation-decay="200"
                            class="w-full h-full"
                            style="background-color: transparent;">
                        </model-viewer>
                        
                        <!-- Toggle Animation Button (Mini button overlaid) -->
                         <button type="button" id="animToggleBtn"
                            class="absolute bottom-4 right-4 z-20 w-10 h-10 bg-slate-800 hover:bg-slate-700 text-white rounded-full flex items-center justify-center shadow-md transition transform hover:scale-110 border border-white/20"
                            title="Change animation">
                            <!-- Icon: Running/Motion -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 17a2 2 0 0 0 2 2h2" />
                                <path d="M22 22a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2" />
                                <path d="M8 21h4" />
                                <path d="M15 7h4" />
                                <path d="M18 10v4" />
                                <path d="M8 8v4" />
                                <path d="M4 12v3" />
                                <path d="M4 15l10-10" />
                                <circle cx="4" cy="4" r="2" />
                                <path d="M14 14l-4 4" />
                            </svg>
                        </button>
                    </div>

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

                        <!-- Group 2 (Duplicate for loop) -->
                        <div class="carousel-group" aria-hidden="true">
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
                'img' => $a['imgAvatar'],
                'model' => $a['modelAvatar']
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

        const avatarModel = document.getElementById("avatarPreview");
        const avatarName = document.getElementById("avatarName");
        const avatarInput = document.getElementById("idAvatarInput");
        const animBtn = document.getElementById("animToggleBtn");

        function renderAvatar() {
            // Update Model Source
            // Assuming models are in 'assets/3d/' based on user findings
            avatarModel.src = "assets/3d/" + avatars[currentAvatar].model; 
            
            // If the model has an image fallback (Poster), we can set it here if needed
            // avatarModel.poster = avatars[currentAvatar].img;

            avatarName.textContent = avatars[currentAvatar].name;
            avatarInput.value = avatars[currentAvatar].id;
        }

        /* ===== ANIMATION TOGGLE ===== */
        animBtn.onclick = () => {
             const availableAnims = avatarModel.availableAnimations;
             if (availableAnims && availableAnims.length > 0) {
                 // Get current animation name or default to none
                 const currentAnim = avatarModel.animationName;
                 
                 let nextIndex = 0;
                 if (currentAnim) {
                     const currentIndex = availableAnims.indexOf(currentAnim);
                     if (currentIndex !== -1) {
                         nextIndex = (currentIndex + 1) % availableAnims.length;
                     }
                 }
                 
                 avatarModel.animationName = availableAnims[nextIndex];
                 console.log("Switched animation to:", availableAnims[nextIndex]);
             } else {
                 console.log("No animations available for this model.");
             }
        };

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