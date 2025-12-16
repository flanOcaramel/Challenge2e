<?php require_once 'admin_navbar.php'; ?>

<div class="admin-container">
    <div class="admin-section">
        <div class="admin-header">
            <h1 class="admin-title">Gestion des Utilisateurs</h1>
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
            <!-- Liste des utilisateurs -->
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom d'utilisateur</th>
                        <th>Rôle</th>
                        <th>Avatar</th>
                        <th>Monde</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($user['idUser']); ?></td>
                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                <td>
                                    <span style="padding: 0.25rem 0.75rem; border-radius: 12px; font-size: 0.875rem; 
                                                background: <?php echo $user['userRole'] === 'ADMIN' ? '#10b981' : '#6366f1'; ?>; 
                                                color: white;">
                                        <?php echo htmlspecialchars($user['userRole']); ?>
                                    </span>
                                </td>
                                <td><?php echo htmlspecialchars($user['avatarName'] ?? 'N/A'); ?></td>
                                <td><?php echo htmlspecialchars($user['worldName'] ?? 'N/A'); ?></td>
                                <td>
                                    <div class="actions">
                                        <a href="index.php?page=admin_users&action=edit&id=<?php echo $user['idUser']; ?>" 
                                           class="btn-secondary">Modifier</a>
                                        <?php if ($user['userRole'] !== 'ADMIN'): ?>
                                            <form method="POST" action="index.php?page=admin_users&action=delete" 
                                                  style="display: inline;" 
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                                <input type="hidden" name="idUser" value="<?php echo $user['idUser']; ?>">
                                                <button type="submit" class="btn-danger">Supprimer</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align: center; color: #999;">Aucun utilisateur trouvé</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        <?php elseif ($_GET['action'] === 'edit' && isset($_GET['id'])): ?>
            <!-- Formulaire de modification -->
            <h2>Modifier l'utilisateur</h2>
            <form method="POST" action="index.php?page=admin_users&action=update">
                <input type="hidden" name="idUser" value="<?php echo htmlspecialchars($user['idUser']); ?>">
                
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input type="text" id="username" name="username" class="form-control" 
                           value="<?php echo htmlspecialchars($user['username']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="userRole">Rôle</label>
                    <select id="userRole" name="userRole" class="form-control" required>
                        <option value="JOUEUR" <?php echo $user['userRole'] === 'JOUEUR' ? 'selected' : ''; ?>>JOUEUR</option>
                        <option value="ADMIN" <?php echo $user['userRole'] === 'ADMIN' ? 'selected' : ''; ?>>ADMIN</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="idAvatar">Avatar</label>
                    <select id="idAvatar" name="idAvatar" class="form-control" required>
                        <?php if (!empty($avatars)): ?>
                            <?php foreach ($avatars as $avatar): ?>
                                <option value="<?php echo $avatar['idAvatar']; ?>" 
                                        <?php echo $user['idAvatar'] == $avatar['idAvatar'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($avatar['nameAvatar']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="idWorld">Monde</label>
                    <select id="idWorld" name="idWorld" class="form-control" required>
                        <?php if (!empty($worlds)): ?>
                            <?php foreach ($worlds as $world): ?>
                                <option value="<?php echo $world['idWorld']; ?>" 
                                        <?php echo $user['idWorld'] == $world['idWorld'] ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($world['nameWorld']); ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nouveau mot de passe (laisser vide pour ne pas changer)</label>
                    <input type="password" name="password" class="form-control" 
                           placeholder="Laisser vide inchangé"
                           pattern="(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}"
                           title="8 caractères min, 1 majuscule, 1 chiffre, 1 spécial">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-primary">Mettre à jour</button>
                    <a href="index.php?page=admin_users" class="btn-secondary" style="margin-left: 1rem;">Annuler</a>
                </div>
            </form>
        <?php endif; ?>
    </div>
</div>

</body>
</html>