<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotLoggedIn();

// Vérification de l'authentification admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: index.php');
    exit;
}

// Récupération de toutes les offres
$stmt = $pdo->query("SELECT * FROM jobs ORDER BY created_at DESC");
$jobs = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Traitement de la suppression
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM jobs WHERE id = ?")->execute([$id]);
    header('Location: tous_offres.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des offres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .table-responsive { overflow-x: auto; }
        .action-btns { white-space: nowrap; }
        .card-header { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
    <!--  -->
    <div class="container-fluid">
        <div class="row">
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Gestion des offres d'emploi</h1>
                    <a href="add.php" class="btn btn-danger">
                        <i class="bi bi-plus-circle"></i> Ajouter une offre
                    </a>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-briefcase"></i> Liste des offres
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Catégorie</th>
                                        <th>Publié</th>
                                        <th>Expiration</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jobs as $job): ?>
                                    <tr>
                                        <td><?= $job['id'] ?></td>
                                        <td><?= htmlspecialchars($job['title']) ?></td>
                                        <td><?= htmlspecialchars($job['category']) ?></td>
                                        <td>
                                            <?= $job['published'] ? 
                                                '<span class="badge bg-success">Oui</span>' : 
                                                '<span class="badge bg-secondary">Non</span>' ?>
                                        </td>
                                        <td><?= date('d/m/Y', strtotime($job['expiry_date'])) ?></td>
                                        <td class="action-btns">
                                            <a href="edit.php?id=<?= $job['id'] ?>" 
                                               class="btn btn-sm btn-outline-primary">
                                               <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="tous_offres.php?delete=<?= $job['id'] ?>" 
                                               class="btn btn-sm btn-outline-danger" 
                                               onclick="return confirm('Supprimer cette offre ?')">
                                               <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>