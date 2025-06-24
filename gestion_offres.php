<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotAdmin();

// Changement de statut publié/non publié
if (isset($_GET['toggle_status'])){
    $job_id = intval($_GET['toggle_status']);
    $stmt = $pdo->prepare("UPDATE jobs SET published = NOT published WHERE id = ?");
    $stmt->execute([$job_id]);
    $_SESSION['success'] = "Statut de l'offre mis à jour";
    header('Location: index.php');
    exit();
}

// Récupération de toutes les offres
$stmt = $pdo->prepare("SELECT * FROM jobs ORDER BY created_at DESC");
$stmt->execute();
$jobs = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Offres - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .status-badge {
            cursor: pointer;
        }
        .card {
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1><i class="bi bi-briefcase"></i> Gestion des Offres</h1>
            <a href="add.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Ajouter une offre
            </a>
        </div>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <div class="row">
            <?php foreach ($jobs as $job): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <?php if ($job['image_path']): ?>
                            <img src="../../<?= htmlspecialchars($job['image_path']) ?>" class="card-img-top" alt="<?= htmlspecialchars($job['title']) ?>">
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <h5 class="card-title"><?= htmlspecialchars($job['title']) ?></h5>
                                <span class="badge bg-<?= $job['published'] ? 'success' : 'warning' ?> status-badge"
                                      onclick="toggleStatus(<?= $job['id'] ?>)">
                                    <?= $job['published'] ? 'Publié' : 'Non publié' ?>
                                </span>
                            </div>
                            
                            <h6 class="card-subtitle mb-2 text-muted">
                                <?= htmlspecialchars($job['category']) ?>
                            </h6>
                            
                            <p class="card-text">
                                <?= nl2br(htmlspecialchars(shortenText($job['description'], 100))) ?>
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    Expire le: <?= date('d/m/Y', strtotime($job['expiry_date'])) ?>
                                </small>
                                <div>
                                    <a href="edit.php?id=<?= $job['id'] ?>" class="btn btn-sm btn-outline-primary">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="applications.php?job_id=<?= $job['id'] ?>" class="btn btn-sm btn-outline-info">
                                        <i class="bi bi-people"></i> Candidatures
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function toggleStatus(jobId) {
            if (confirm("Voulez-vous changer le statut de publication de cette offre ?")) {
                window.location.href = `index.php?toggle_status=${jobId}`;
            }
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>