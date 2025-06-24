<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotAdmin();

// Récupération de l'ID de l'offre si spécifié
$job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : null;

// Requête de base
$sql = "SELECT a.*, u.full_name, u.email, u.phone, j.title as job_title 
        FROM applications a
        JOIN users u ON a.user_id = u.id
        JOIN jobs j ON a.job_id = j.id";

// Filtrage par offre si spécifié
if ($job_id) {
    $sql .= " WHERE a.job_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$job_id]);
} else {
    $stmt = $pdo->query($sql);
}

$applications = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Candidatures - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .status-select {
            cursor: pointer;
            min-width: 120px;
        }
        .table-responsive {
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="bi bi-people"></i> Gestion des Candidatures</h1>
            <?php if ($job_id): ?>
                <a href="index.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Voir toutes les candidatures
                </a>
            <?php endif; ?>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Offre</th>
                        <th>Candidat</th>
                        <th>Contact</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($applications as $app): ?>
                        <tr>
                            <td>
                                <strong><?= htmlspecialchars($app['job_title']) ?></strong>
                                <br>
                                <small class="text-muted">Ref: #<?= $app['job_id'] ?></small>
                            </td>
                            <td><?= htmlspecialchars($app['full_name']) ?></td>
                            <td>
                                <?= htmlspecialchars($app['email']) ?>
                                <br>
                                <?= $app['phone'] ? htmlspecialchars($app['phone']) : 'N/A' ?>
                            </td>
                            <td>
                                <select class="form-select form-select-sm status-select" 
                                        data-application-id="<?= $app['id'] ?>">
                                    <option value="pending" <?= $app['status'] === 'pending' ? 'selected' : '' ?>>En attente</option>
                                    <option value="reviewed" <?= $app['status'] === 'reviewed' ? 'selected' : '' ?>>Examiné</option>
                                    <option value="accepted" <?= $app['status'] === 'accepted' ? 'selected' : '' ?>>Accepté</option>
                                    <option value="rejected" <?= $app['status'] === 'rejected' ? 'selected' : '' ?>>Rejeté</option>
                                </select>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($app['applied_at'])) ?></td>
                            <td>
                                <a href="view.php?id=<?= $app['id'] ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> Voir
                                </a>
                                <a href="../../assets/img/<?= htmlspecialchars($app['cv_path']) ?>" 
                                   class="btn btn-sm btn-outline-success" download>
                                    <i class="bi bi-download"></i> CV
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Mise à jour dynamique du statut
        document.querySelectorAll('.status-select').forEach(select => {
            select.addEventListener('change', function() {
                const applicationId = this.dataset.applicationId;
                const newStatus = this.value;
                
                fetch('update_status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `id=${applicationId}&status=${newStatus}`
                })
                .then(response => response.text())
                .then(data => {
                    const badgeClass = {
                        'pending': 'bg-secondary',
                        'reviewed': 'bg-info',
                        'accepted': 'bg-success',
                        'rejected': 'bg-danger'
                    }[newStatus];
                    
                    this.className = `form-select form-select-sm status-select ${badgeClass}`;
                });
            });
        });
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>