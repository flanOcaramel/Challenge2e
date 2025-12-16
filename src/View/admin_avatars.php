<?php require_once 'admin_navbar.php'; ?>

<div class="admin-container">
    <div class="admin-section">
        <div class="admin-header">
            <h1 class="admin-title">Gestion des Avatars</h1>
            <a href="index.php?page=admin_avatars&action=add" class="btn-primary">Ajouter un avatar</a>
        </div>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_SESSION['success']); unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-error">
                <?php echo htmlspecialchars($_SESSION['error']); unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (!isset($_GET['action']) || $_GET['action'] === 'list'): ?>
            <!-- Liste des avatars -->
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Modèle 3D</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($avatars)): ?>
                        <?php foreach ($avatars as $avatar): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($avatar['idAvatar']); ?></td>
                                <td><?php echo htmlspecialchars($avatar['nameAvatar']); ?></td>
                                <td><?php echo htmlspecialchars($avatar['modelAvatar']); ?></td>
                                <td>
                                    <?php if (!empty($avatar['imgAvatar'])): ?>
                                        <img src="<?php echo htmlspecialchars($avatar['imgAvatar']); ?>" 
                                             alt="<?php echo htmlspecialchars($avatar['nameAvatar']); ?>" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                    <?php else: ?>
                                        <span style="color: #999;">Aucune image</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="actions">
                                        <a href="index.php?page=admin_avatars&action=edit&id=<?php echo $avatar['idAvatar']; ?>" 
                                           class="btn-secondary">Modifier</a>
                                        <form method="POST" action="index.php?page=admin_avatars&action=delete" 
                                              style="display: inline;" 
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet avatar ?');">
                                            <input type="hidden" name="idAvatar" value="<?php echo $avatar['idAvatar']; ?>">
                                            <button type="submit" class="btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; color: #999;">Aucun avatar trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        <?php elseif ($_GET['action'] === 'add'): ?>
            <!-- Formulaire d'ajout -->
            <h2>Ajouter un nouvel avatar</h2>
            <form method="POST" action="index.php?page=admin_avatars&action=create">
                <div class="form-group">
                    <label for="nameAvatar">Nom de l'avatar</label>
                    <input type="text" id="nameAvatar" name="nameAvatar" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="modelAvatar">Nom du modèle 3D</label>
                    <input type="text" id="modelAvatar" name="modelAvatar" class="form-control" required
                           placeholder="avatar.glb">
                </div>

                <div class="form-group">
                    <label for="imgAvatar">Chemin de l'image</label>
                    <input type="text" id="imgAvatar" name="imgAvatar" class="form-control" 
                           placeholder="assets/img/avatar.jpg">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-primary">Ajouter l'avatar</button>
                    <a href="index.php?page=admin_avatars" class="btn-secondary" style="margin-left: 1rem;">Annuler</a>
                </div>
            </form>

        <?php elseif ($_GET['action'] === 'edit' && isset($_GET['id'])): ?>
            <!-- Formulaire de modification -->
            <h2>Modifier l'avatar</h2>
            <form method="POST" action="index.php?page=admin_avatars&action=update">
                <input type="hidden" name="idAvatar" value="<?php echo htmlspecialchars($avatar['idAvatar']); ?>">
                
                <div class="form-group">
                    <label for="nameAvatar">Nom de l'avatar</label>
                    <input type="text" id="nameAvatar" name="nameAvatar" class="form-control" 
                           value="<?php echo htmlspecialchars($avatar['nameAvatar']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="modelAvatar">Nom du modèle 3D</label>
                    <input type="text" id="modelAvatar" name="modelAvatar" class="form-control" 
                           value="<?php echo htmlspecialchars($avatar['modelAvatar']); ?>" required
                           placeholder="avatar.glb">
                </div>

                <div class="form-group">
                    <label for="imgAvatar">Chemin de l'image</label>
                    <input type="text" id="imgAvatar" name="imgAvatar" class="form-control" 
                           value="<?php echo htmlspecialchars($avatar['imgAvatar']); ?>"
                           placeholder="assets/img/avatar.jpg">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-primary">Mettre à jour</button>
                    <a href="index.php?page=admin_avatars" class="btn-secondary" style="margin-left: 1rem;">Annuler</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>