document.addEventListener('DOMContentLoaded', () => {

    // --- GESTION DU CARROUSEL AVATAR ---

    // Récupération des éléments du DOM
    const avatarImg = document.getElementById('avatarPreview');
    const avatarName = document.getElementById('avatarName');
    const idAvatarInput = document.getElementById('idAvatarInput'); // Input caché
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // Index actuel de l'avatar affiché
    let currentIndex = 0;

    // Fonction pour mettre à jour l'affichage
    function updateAvatarDisplay() {
        if (avatarsData.length > 0) {
            const avatar = avatarsData[currentIndex];

            // Mise à jour de l'image (si null en bdd, on met une placeholder)
            // Note: Comme les images sont fictives, on met un placeholder si le fichier n'est pas trouvé
            // Dans une vraie prod, on gérerait ça avec onerror
            avatarImg.src = avatar.imgAvatar || 'https://via.placeholder.com/200x300?text=No+Image';

            // Mise à jour du nom
            avatarName.textContent = avatar.nameAvatar;

            // Mise à jour de l'input caché pour l'envoi du formulaire
            idAvatarInput.value = avatar.idAvatar;
        } else {
            avatarName.textContent = "Aucun avatar disponible";
        }
    }

    // Gestion du clic "Suivant"
    nextBtn.addEventListener('click', () => {
        currentIndex++;
        if (currentIndex >= avatarsData.length) {
            currentIndex = 0; // Boucle au début
        }
        updateAvatarDisplay();
    });

    // Gestion du clic "Précédent"
    prevBtn.addEventListener('click', () => {
        currentIndex--;
        if (currentIndex < 0) {
            currentIndex = avatarsData.length - 1; // Boucle à la fin
        }
        updateAvatarDisplay();
    });

    // Initialisation
    updateAvatarDisplay();


    // --- GESTION DE LA SÉLECTION DU MONDE ---

    const worlds = document.querySelectorAll('.world-item-container');
    const idWorldInput = document.getElementById('idWorldInput');

    worlds.forEach(card => {
        card.addEventListener('click', () => {
            // 1. Retirer la classe 'selected' de tous les mondes (reset)
            worlds.forEach(c => c.classList.remove('selected'));

            // 2. Ajouter la classe 'selected' au monde cliqué
            card.classList.add('selected');

            // 3. Mettre à jour l'input caché avec l'ID du monde (stocké dans data-id)
            const id = card.getAttribute('data-id');
            idWorldInput.value = id;

            console.log("Monde sélectionné ID:", id); // Pour le debug
        });
    });

    // Sélectionner le premier monde par défaut s'il y en a
    if (worlds.length > 0) {
        worlds[0].click();
    }
});
