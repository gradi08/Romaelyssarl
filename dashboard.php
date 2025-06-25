<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotAdmin();

// Statistiques à afficher
$stats = [
    'jobs' => $pdo->query("SELECT COUNT(*) FROM jobs")->fetchColumn(),
    'published_jobs' => $pdo->query("SELECT COUNT(*) FROM jobs WHERE published = 1")->fetchColumn(),
    'users' => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
    'applications' => $pdo->query("SELECT COUNT(*) FROM applications")->fetchColumn(),
    'pending_applications' => $pdo->query("SELECT COUNT(*) FROM applications WHERE status = 'pending'")->fetchColumn()
];

// Dernières candidatures
$recent_applications = $pdo->query(
    "SELECT a.*, u.full_name, j.title as job_title 
     FROM applications a
     JOIN users u ON a.user_id = u.id
     JOIN jobs j ON a.job_id = j.id
     ORDER BY a.applied_at DESC LIMIT 5"
)->fetchAll();

// Dernières offres
$recent_jobs = $pdo->query(
    "SELECT * FROM jobs ORDER BY created_at DESC LIMIT 5"
)->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .stat-card {
            border-radius: 10px;
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            font-size: 2rem;
            opacity: 0.8;
        }
        .recent-item {
            transition: background-color 0.2s;
        }
        .recent-item:hover {
            background-color: #f8f9fa;
        }
        .dashboard-section {
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.05);
            padding: 25px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container py-5">
        <h1 class="mb-4"><i class="bi bi-speedometer2"></i> Tableau de Bord Administrateur</h1>
        
        <!-- Section Statistiques -->
        <div class="dashboard-section">
            <div class="row">
                <div class="col-md-9">
        <h2 class="mb-4 border-bottom pb-2">Statistiques Globales</h2> 
                </div>
                <div class="col-md-3 mx-auto">
                        <a href="profile.php" class="btn btn-outline-secondary w-100 py-3">
                            <i class="bi bi-person"></i> profil
                        </a>
                    </div>
            </div>
            
            <div class="row mt-3">
                <!-- Offres d'emploi -->
                <div class="col-md-4 mb-4">
                    <div class="card stat-card bg-primary text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Offres d'emploi</h5>
                                    <h2 class="mb-0"><?= $stats['jobs'] ?></h2>
                                    <small><?= $stats['published_jobs'] ?> publiées</small>
                                </div>
                                <i class="bi bi-briefcase stat-icon"></i>
                            </div>
                            <a href="nos_offres.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                
                <!-- Utilisateurs -->
                <div class="col-md-4 mb-4">
                    <div class="card stat-card bg-success text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Utilisateurs</h5>
                                    <h2 class="mb-0"><?= $stats['users'] ?></h2>
                                </div>
                                <i class="bi bi-people stat-icon"></i>
                            </div>
                            <a href="users.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                
                <!-- Candidatures -->
                <div class="col-md-4 mb-4">
                    <div class="card stat-card bg-info text-white h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Candidatures</h5>
                                    <h2 class="mb-0"><?= $stats['applications'] ?></h2>
                                    <small><?= $stats['pending_applications'] ?> en attente</small>
                                </div>
                                <i class="bi bi-file-earmark-person stat-icon"></i>
                            </div>
                            <a href="gestion_candidature.php" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Actions rapides -->
        <div class="dashboard-section">
            <h2 class="mb-4 border-bottom pb-2">Actions Rapides</h2>
            <div class="row g-3">
                <div class="col-md-3">
                    <a href="add.php" class="btn btn-primary w-100 py-3">
                        <i class="bi bi-plus-circle"></i> Nouvelle Offre
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="gestion_offres.php" class="btn btn-outline-primary w-100 py-3">
                        <i class="bi bi-briefcase"></i> Gérer Offres
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="gestion_candidature.php" class="btn btn-outline-info w-100 py-3">
                        <i class="bi bi-people"></i> Voir Candidatures
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="users.php" class="btn btn-outline-secondary w-100 py-3">
                        <i class="bi bi-gear"></i> Gérer Utilisateurs
                    </a>
                </div>
                
            </div>
        </div>
        
        <div class="row">
            <!-- Dernières candidatures -->
            <div class="col-md-6">
                <div class="dashboard-section h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="mb-0">Dernières Candidatures</h2>
                        <a href="gestion_candidature.php" class="btn btn-sm btn-outline-primary">Voir tout</a>
                    </div>
                    
                    <div class="list-group">
                        <?php if (empty($recent_applications)): ?>
                            <div class="alert alert-info">Aucune candidature récente</div>
                        <?php else: ?>
                            <?php foreach ($recent_applications as $app): ?>
                                <a href="view.php?id=<?= $app['id'] ?>" 
                                   class="list-group-item list-group-item-action recent-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1"><?= htmlspecialchars($app['full_name']) ?></h6>
                                        <small class="text-muted"><?= htmlspecialchars($app['job_title']) ?></small>
                                    </div>
                                    <span class="badge bg-<?= 
                                        $app['status'] === 'accepted' ? 'success' : 
                                        ($app['status'] === 'rejected' ? 'danger' : 
                                        ($app['status'] === 'reviewed' ? 'info' : 'secondary')) 
                                    ?>">
                                        <?= ucfirst($app['status']) ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- Dernières offres -->
            <div class="col-md-6">
                <div class="dashboard-section h-100">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="mb-0">Dernières Offres</h2>
                        <a href="tous_offres.php" class="btn btn-sm btn-outline-primary">Voir tout</a>
                    </div>
                    
                    <div class="list-group">
                        <?php if (empty($recent_jobs)): ?>
                            <div class="alert alert-info">Aucune offre récente</div>
                        <?php else: ?>
                            <?php foreach ($recent_jobs as $job): ?>
                                <a href="edit.php?id=<?= $job['id'] ?>" 
                                   class="list-group-item list-group-item-action recent-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1"><?= htmlspecialchars($job['title']) ?></h6>
                                        <small class="text-muted"><?= htmlspecialchars($job['category']) ?></small>
                                    </div>
                                    <span class="badge bg-<?= $job['published'] ? 'success' : 'warning' ?>">
                                        <?= $job['published'] ? 'Publié' : 'Non publié' ?>
                                    </span>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>