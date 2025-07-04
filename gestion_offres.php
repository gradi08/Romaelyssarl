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

        <div class="row g-4">
    <?php foreach ($jobs as $job): ?>
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card h-100 shadow-sm border-0 overflow-hidden job-admin-card">
                <!-- Header avec image et badge de statut -->
                <div class="card-img-top position-relative" style="height: 180px; background-color: #f8f9fa;">
                    <?php if ($job['image_path']): ?>
                        <img src="../../<?= htmlspecialchars($job['image_path']) ?>" 
                             class="h-100 w-100 object-fit-cover" 
                             alt="<?= htmlspecialchars($job['title']) ?>">
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                            <i class="bi bi-image fs-1"></i>
                        </div>
                    <?php endif; ?>
                    
                    <div class="position-absolute top-0 end-0 m-3">
                        <span class="badge bg-<?= $job['published'] ? 'success' : 'warning' ?> status-badge cursor-pointer"
                              onclick="toggleStatus(<?= $job['id'] ?>)"
                              data-bs-toggle="tooltip" 
                              title="Cliquer pour changer le statut">
                            <i class="bi bi-<?= $job['published'] ? 'check-circle' : 'exclamation-triangle' ?> me-1"></i>
                            <?= $job['published'] ? 'Publié' : 'Non publié' ?>
                        </span>
                    </div>
                </div>
                
                <!-- Corps de la carte -->
                <div class="card-body d-flex flex-column">
                    <div class="mb-3">
                        <h5 class="card-title fw-bold mb-2">
                            <?= htmlspecialchars($job['title']) ?>
                        </h5>
                        
                        <div class="d-flex align-items-center mb-3">
                            <span class="badge bg-danger bg-opacity-10 text-danger me-2">
                                <?= htmlspecialchars($job['category']) ?>
                            </span>
                            <small class="text-muted">
                                <i class="bi bi-calendar-event me-1"></i>
                                <?= date('d/m/Y', strtotime($job['expiry_date'])) ?>
                            </small>
                        </div>
                        
                        <p class="card-text text-muted mb-3 line-clamp-2">
                            <?= nl2br(htmlspecialchars(shortenText($job['description'], 100))) ?>
                        </p>
                    </div>
                    
                    <!-- Footer avec actions -->
                    <div class="mt-auto pt-3 border-top">
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="bi bi-clock-history me-1"></i>
                                Créé le <?= date('d/m/Y', strtotime($job['created_at'])) ?>
                            </small>
                            
                            <div class="btn-group" role="group">
                                <a href="edit.php?id=<?= $job['id'] ?>" 
                                   class="btn btn-sm btn-outline-primary rounded-start-pill"
                                   data-bs-toggle="tooltip" 
                                   title="Modifier">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="applications.php?job_id=<?= $job['id'] ?>" 
                                   class="btn btn-sm btn-outline-info"
                                   data-bs-toggle="tooltip" 
                                   title="Voir candidatures">
                                    <i class="bi bi-people"></i>
                                </a>
                                <a href="#" 
   class="btn btn-sm btn-outline-danger rounded-end-pill"
   data-bs-toggle="modal" 
   data-bs-target="#deleteConfirmModal"
   data-job-id="<?= $job['id'] ?>"
   data-bs-toggle="tooltip" 
   title="Supprimer">
    <i class="bi bi-trash"></i>
</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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
</div>

<style>
    .job-admin-card {
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }
    
    .job-admin-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .status-badge {
        font-size: 0.75rem;
        padding: 0.35em 0.65em;
        transition: all 0.2s ease;
    }
    
    .status-badge:hover {
        opacity: 0.9;
        transform: scale(1.05);
    }
    
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .object-fit-cover {
        object-fit: cover;
    }
    
    .cursor-pointer {
        cursor: pointer;
    }
    
    .btn-group .btn {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }
</style>

<script>
// Activer les tooltips Bootstrap
document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

// Fonction pour confirmer la suppression
function confirmDelete(jobId) {
    if (confirm('Êtes-vous sûr de vouloir supprimer cette offre ? Toutes les candidatures associées seront également supprimées.')) {
        window.location.href = 'delete.php?id=' + jobId;
    }
}

// Fonction pour changer le statut (publié/non publié)
function toggleStatus(jobId) {
    fetch('toggle_status.php?id=' + jobId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Recharger la page pour voir le changement
            } else {
                alert('Erreur lors du changement de statut');
            }
        });
}
</script>
    </div>

    <script>
        function toggleStatus(jobId) {
            if (confirm("Voulez-vous changer le statut de publication de cette offre ?")) {
                window.location.href = `index.php?toggle_status=${jobId}`;
            }
        }
    </script>
    
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>