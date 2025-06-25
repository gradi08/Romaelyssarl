<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotAdmin();

// Récupération de l'ID de l'offre
$job_id = isset($_GET['job_id']) ? intval($_GET['job_id']) : null;

// Vérifier si l'offre existe
if ($job_id) {
    $stmt = $pdo->prepare("SELECT title FROM jobs WHERE id = ?");
    $stmt->execute([$job_id]);
    $job = $stmt->fetch();
    
    if (!$job) {
        $_SESSION['error'] = "Offre introuvable";
        header('Location: index.php');
        exit();
    }
}

// Récupération des candidatures
$sql = "SELECT a.*, u.full_name, u.email, u.phone, j.title as job_title 
        FROM applications a
        JOIN users u ON a.user_id = u.id
        JOIN jobs j ON a.job_id = j.id";

if ($job_id) {
    $sql .= " WHERE a.job_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$job_id]);
} else {
    $stmt = $pdo->query($sql);
}

$applications = $stmt->fetchAll();

// Fonction pour obtenir la couleur du badge selon le statut
function getStatusColor($status) {
    switch ($status) {
        case 'accepted': return 'success';
        case 'rejected': return 'danger';
        case 'reviewed': return 'info';
        default: return 'secondary';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $job_id ? "Candidatures pour " . htmlspecialchars($job['title']) : "Toutes les candidatures" ?> - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .table-responsive {
            overflow-x: auto;
        }
        .status-badge {
            font-size: 0.875rem;
            padding: 5px 10px;
        }
        .job-title-header {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="bi bi-people-fill"></i> Gestion des Candidatures</h1>
            <?php if ($job_id): ?>
                <a href="gestion_offres.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Retour aux offres
                </a>
            <?php endif; ?>
        </div>

        <?php if ($job_id): ?>
            <div class="job-title-header">
                <h3><?= htmlspecialchars($job['title']) ?></h3>
                <p class="mb-0">Liste des candidatures pour cette offre</p>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <?php if (!$job_id): ?>
                            <th>Offre</th>
                        <?php endif; ?>
                        <th>Candidat</th>
                        <th>Contact</th>
                        <th>Statut</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($applications)): ?>
                        <tr>
                            <td colspan="<?= $job_id ? 5 : 6 ?>" class="text-center py-4">
                                <i class="bi bi-info-circle fs-4"></i>
                                <p class="mt-2">Aucune candidature trouvée</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($applications as $app): ?>
                            <tr>
                                <?php if (!$job_id): ?>
                                    <td>
                                        <strong><?= htmlspecialchars($app['job_title']) ?></strong>
                                        <br>
                                        <small class="text-muted">Ref: #<?= $app['job_id'] ?></small>
                                    </td>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($app['full_name']) ?></td>
                                <td>
                                    <?= htmlspecialchars($app['email']) ?>
                                    <br>
                                    <?= $app['phone'] ? htmlspecialchars($app['phone']) : 'N/A' ?>
                                </td>
                                <td>
                                    <span class="badge bg-<?= getStatusColor($app['status']) ?> status-badge">
                                        <?= ucfirst($app['status']) ?>
                                    </span>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($app['applied_at'])) ?></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="view.php?id=<?= $app['id'] ?>" 
                                           class="btn btn-sm btn-outline-primary"
                                           title="Voir détails">
                                           <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="../../assets/uploads/<?= htmlspecialchars($app['cv_path']) ?>" 
                                           class="btn btn-sm btn-outline-success"
                                           title="Télécharger CV"
                                           download>
                                           <i class="bi bi-download"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>