<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Avatar - Chopin VR</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
</head>

<body>

    <div class="main-layout-container">

        <form action="index.php?page=create_process" method="POST" id="profileForm" class="create-form-grid">

            <!-- COLOONE GAUCHE : INPUTS -->
            <div class="left-inputs">
                <div class="input-wrapper">
                    <input type="text" name="username" placeholder="username" required class="glass-input shadow-input"
                        autocomplete="off">
                </div>
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="password" required
                        class="glass-input shadow-input" pattern="(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}"
                        title="8 caractères min, 1 majuscule, 1 chiffre, 1 spécial">
                </div>

                <button type="submit" class="glass-submit-btn">Save your character</button>
            </div>

            <!-- COLONNE DROITE : AVATAR -->
            <div class="right-avatar">
                <!-- Input caché pour stocker l'ID de l'avatar choisi -->
                <input type="hidden" name="idAvatar" id="idAvatarInput" value="">

                <button type="button" id="prevBtn" class="nav-arrow left-arrow">&lt;</button>

                <div class="avatar-card">
                    <!-- Image de fond décorative type montagne/ciel vert (optionnel si CSS pur) -->
                    <div class="avatar-card-bg"></div>

                    <img src="" alt="Avatar" id="avatarPreview" class="avatar-img-layer">

                    <!-- Le nom de l'avatar en dessous de la carte ou sur la carte ? 
                         Sur la maquette, c'est en dessous. -->
                </div>

                <button type="button" id="nextBtn" class="nav-arrow right-arrow">&gt;</button>

                <!-- Nom Avatar Centré sous la carte -->
                <div class="avatar-name-display" id="avatarName">Adventurer</div>
            </div>


            <!-- LIGNE BAS : MONDES -->
            <div class="bottom-worlds-section">
                <div class="worlds-label">World :</div>

                <div class="worlds-grid">
                    <!-- Input caché pour stocker l'ID du monde choisi -->
                    <input type="hidden" name="idWorld" id="idWorldInput" required>

                    <?php if (isset($worlds)): ?>
                        <?php foreach ($worlds as $world): ?>
                            <div class="world-item-container" data-id="<?php echo $world['idWorld']; ?>">
                                <div class="world-card-image">
                                    <img src="<?php echo htmlspecialchars($world['imgWorld'] ?? ''); ?>"
                                        alt="<?php echo htmlspecialchars($world['nameWorld']); ?>">
                                </div>
                                <span class="world-title"><?php echo htmlspecialchars($world['nameWorld']); ?></span>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Bouton Submit caché (car pas sur maquette, mais nécessaire pour valider)
                 Peut-être qu'il faut un bouton "Valider" discret ou appui entrer ?
                 J'ajoute un bouton discret pour le dev -->
            <button type="submit" style="opacity: 0; position: absolute; pointer-events: none;">Submit</button>

            <?php if (isset($error)): ?>
                <div class="error-msg-overlay"><?php echo $error; ?></div>
            <?php endif; ?>

        </form>
    </div>

    <script>
        const avatarsData = <?php echo json_encode($avatars ?? []); ?>;
    </script>
    <script src="assets/js/script.js"></script>

</body>

</html>