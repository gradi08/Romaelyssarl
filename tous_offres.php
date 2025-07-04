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
                    <a href="dashboard.php" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
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
                                                <a href="#" 
   class="btn btn-sm btn-outline-danger"
   data-bs-toggle="modal" 
   data-bs-target="#deleteConfirmModal"
   data-job-id="<?= $job['id'] ?>"
   data-bs-toggle="tooltip" 
   title="Supprimer">
    <i class="bi bi-trash"></i>
</a>
                                            <!-- <a href="tous_offres.php?delete=<?= $job['id'] ?>" 
                                               class="btn btn-sm btn-outline-danger" 
                                               onclick="return confirm('Supprimer cette offre ?')">
                                               <i class="bi bi-trash"></i>
                                            </a> -->
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
     <!-- Modal de confirmation -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="deleteConfirmModalLabel">Confirmer la suppression</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Êtes-vous sûr de vouloir supprimer cette offre ? Cette action est irréversible.</p>
        <p class="fw-bold">Toutes les candidatures associées seront également supprimées.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <a id="confirmDeleteBtn" href="#" class="btn btn-danger">Supprimer définitivement</a>
      </div>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteModal = document.getElementById('deleteConfirmModal');
    
    deleteModal.addEventListener('show.bs.modal', function(event) {
        // Boutton qui a déclenché le modal
        const button = event.relatedTarget;
        // Extraction de l'ID depuis l'attribut data-job-id
        const jobId = button.getAttribute('data-job-id');
        // Mise à jour du lien de suppression
        document.getElementById('confirmDeleteBtn').href = `delete.php?id=${jobId}`;
    });
    
    // Tooltips Bootstrap
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
</body>
</html>