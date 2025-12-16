<?php require_once 'admin_navbar.php'; ?>

<div class="admin-container">
    <div class="admin-section">
        <div class="admin-header">
            <h1 class="admin-title">Gestion des Mondes</h1>
            <a href="index.php?page=admin_worlds&action=add" class="btn-primary">Ajouter un monde</a>
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
            <!-- Liste des mondes -->
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Image</th>
                        <th>URL</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($worlds)): ?>
                        <?php foreach ($worlds as $world): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($world['idWorld']); ?></td>
                                <td><?php echo htmlspecialchars($world['nameWorld']); ?></td>
                                <td>
                                    <?php if (!empty($world['imgWorld'])): ?>
                                        <img src="<?php echo htmlspecialchars($world['imgWorld']); ?>" 
                                             alt="<?php echo htmlspecialchars($world['nameWorld']); ?>" 
                                             style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                                    <?php else: ?>
                                        <span style="color: #999;">Aucune image</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo htmlspecialchars($world['urlWorld']); ?></td>
                                <td>
                                    <div class="actions">
                                        <a href="index.php?page=admin_worlds&action=edit&id=<?php echo $world['idWorld']; ?>" 
                                           class="btn-secondary">Modifier</a>
                                        <form method="POST" action="index.php?page=admin_worlds&action=delete" 
                                              style="display: inline;" 
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce monde ?');">
                                            <input type="hidden" name="idWorld" value="<?php echo $world['idWorld']; ?>">
                                            <button type="submit" class="btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align: center; color: #999;">Aucun monde trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        <?php elseif ($_GET['action'] === 'add'): ?>
            <!-- Formulaire d'ajout -->
            <h2>Ajouter un nouveau monde</h2>
            <form method="POST" action="index.php?page=admin_worlds&action=create">
                <div class="form-group">
                    <label for="nameWorld">Nom du monde</label>
                    <input type="text" id="nameWorld" name="nameWorld" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="imgWorld">Chemin de l'image</label>
                    <input type="text" id="imgWorld" name="imgWorld" class="form-control" 
                           placeholder="assets/img/world1.png">
                </div>

                <div class="form-group">
                    <label for="urlWorld">URL du monde</label>
                    <input type="url" id="urlWorld" name="urlWorld" class="form-control" required
                           placeholder="https://vr.chopin.com/world1">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-primary">Ajouter le monde</button>
                    <a href="index.php?page=admin_worlds" class="btn-secondary" style="margin-left: 1rem;">Annuler</a>
                </div>
            </form>

        <?php elseif ($_GET['action'] === 'edit' && isset($_GET['id'])): ?>
            <!-- Formulaire de modification -->
            <h2>Modifier le monde</h2>
            <form method="POST" action="index.php?page=admin_worlds&action=update">
                <input type="hidden" name="idWorld" value="<?php echo htmlspecialchars($world['idWorld']); ?>">
                
                <div class="form-group">
                    <label for="nameWorld">Nom du monde</label>
                    <input type="text" id="nameWorld" name="nameWorld" class="form-control" 
                           value="<?php echo htmlspecialchars($world['nameWorld']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="imgWorld">Chemin de l'image</label>
                    <input type="text" id="imgWorld" name="imgWorld" class="form-control" 
                           value="<?php echo htmlspecialchars($world['imgWorld']); ?>"
                           placeholder="assets/img/world1.png">
                </div>

                <div class="form-group">
                    <label for="urlWorld">URL du monde</label>
                    <input type="url" id="urlWorld" name="urlWorld" class="form-control" 
                           value="<?php echo htmlspecialchars($world['urlWorld']); ?>" required
                           placeholder="https://vr.chopin.com/world1">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-primary">Mettre à jour</button>
                    <a href="index.php?page=admin_worlds" class="btn-secondary" style="margin-left: 1rem;">Annuler</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>