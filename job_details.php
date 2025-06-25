<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
// Vérifier si l'ID de l'offre est présent dans l'URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: nos_offres.php');
    exit;
}

$jobId = (int)$_GET['id'];

// Récupérer les détails de l'offre
$stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = ?");
$stmt->execute([$jobId]);
$job = $stmt->fetch(PDO::FETCH_ASSOC);

// Si l'offre n'existe pas, rediriger
if (!$job) {
    header('Location: nos_offres.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($job['title']) ?> - Détails de l'offre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .job-header {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), 
                        url('<?= $job['image_path'] ? htmlspecialchars($job['image_path']) : 'assets/img/default-job-bg.jpg' ?>');
            background-size: cover;
            background-position: center;
            min-height: 300px;
        }
        .job-details-card {
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: -100px;
        }
        .company-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
            border: 3px solid white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .highlight-box {
            border-left: 4px solid #dc3545;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <!-- En-tête avec image de fond -->
    <div class="job-header text-white d-flex align-items-center">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold"><?= htmlspecialchars($job['title']) ?></h1>
                    <div class="d-flex align-items-center mt-3">
                        <span class="badge bg-danger fs-6 me-3"><?= htmlspecialchars($job['category']) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Carte principale des détails -->
                <div class="card job-details-card mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h2 class="h4 fw-bold">Description du poste</h2>
                                <p class="text-muted">Publié le <?= date('d/m/Y', strtotime($job['created_at'])) ?></p>
                            </div>
                            <div class="text-end">
                                <span class="d-block fw-bold text-danger">Expire le <?= date('d/m/Y', strtotime($job['expiry_date'])) ?></span>
                                <span class="badge <?= $job['published'] ? 'bg-success' : 'bg-secondary' ?>">
                                    <?= $job['published'] ? 'Offre publiée' : 'Offre non publiée' ?>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="h5 fw-bold">Mission</h3>
                            <div class="highlight-box p-3">
                                <?= nl2br(htmlspecialchars($job['description'])) ?>
                            </div>
                        </div>

                        <?php if (!empty($job['requirements'])): ?>
                        <div class="mb-4">
                            <h3 class="h5 fw-bold">Profil recherché</h3>
                            <ul class="list-group list-group-flush">
                                <?php $requirements = explode("\n", $job['requirements']); ?>
                                <?php foreach ($requirements as $req): ?>
                                    <?php if (trim($req)): ?>
                                        <li class="list-group-item"><?= htmlspecialchars(trim($req)) ?></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <?php if (!empty($job['benefits'])): ?>
                        <div class="mb-4">
                            <h3 class="h5 fw-bold">Avantages</h3>
                            <div class="row">
                                <?php $benefits = explode("\n", $job['benefits']); ?>
                                <?php foreach ($benefits as $benefit): ?>
                                    <?php if (trim($benefit)): ?>
                                        <div class="col-md-6 mb-2">
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                                <span><?= htmlspecialchars(trim($benefit)) ?></span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Section pour postuler -->
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h2 class="h4 fw-bold mb-4">Postuler à cette offre</h2>
                        <a href="apply.php?job_id=<?= $job['id'] ?>" class="btn btn-danger btn-lg w-100 py-3">
                            <i class="bi bi-send-fill me-2"></i> Postuler maintenant
                        </a>
                        <p class="text-muted mt-3 mb-0">Vous serez redirigé vers notre formulaire de candidature</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
               

                <!-- Bouton de partage -->
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold mb-3">Partager cette offre</h3>
                        <div class="d-flex justify-content-around">
                            <a href="#" class="btn btn-outline-primary rounded-circle p-2">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info rounded-circle p-2">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger rounded-circle p-2">
                                <i class="bi bi-linkedin"></i>
                            </a>
                            <a href="#" class="btn btn-outline-success rounded-circle p-2">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                            <a href="#" class="btn btn-outline-secondary rounded-circle p-2">
                                <i class="bi bi-envelope"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>