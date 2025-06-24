<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotAdmin();

// Vérifier si l'ID de la candidature est présent
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = "Candidature invalide";
    header('Location: index.php');
    exit();
}

$application_id = intval($_GET['id']);

// Récupérer les détails de la candidature
$stmt = $pdo->prepare("SELECT a.*, u.full_name, u.email, u.phone, u.address, 
                              j.title as job_title, j.category, j.expiry_date
                       FROM applications a
                       JOIN users u ON a.user_id = u.id
                       JOIN jobs j ON a.job_id = j.id
                       WHERE a.id = ?");
$stmt->execute([$application_id]);
$application = $stmt->fetch();

if (!$application) {
    $_SESSION['error'] = "Candidature introuvable";
    header('Location: index.php');
    exit();
}

// Mise à jour du statut si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $new_status = in_array($_POST['status'], ['pending', 'reviewed', 'accepted', 'rejected']) 
                  ? $_POST['status'] 
                  : 'pending';
    
    try {
        $stmt = $pdo->prepare("UPDATE applications SET status = ? WHERE id = ?");
        $stmt->execute([$new_status, $application_id]);
        $_SESSION['success'] = "Statut de la candidature mis à jour";
        header("Location: view.php?id=$application_id");
        exit();
    } catch(PDOException $e) {
        $_SESSION['error'] = "Erreur lors de la mise à jour: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails Candidature - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .detail-card {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .status-badge {
            font-size: 1rem;
            padding: 8px 12px;
        }
        .document-section {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }
        .info-label {
            font-weight: 500;
            color: #495057;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container">
        <div class="detail-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-file-earmark-person"></i> Détails de la candidature</h2>
                <span class="badge bg-<?= getStatusColor($application['status']) ?> status-badge">
                    <?= ucfirst($application['status']) ?>
                </span>
            </div>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success"><?= $_SESSION['success'] ?></div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="row mb-4">
                <div class="col-md-6">
                    <h4 class="border-bottom pb-2">Informations sur le poste</h4>
                    <div class="mb-3">
                        <span class="info-label">Offre:</span>
                        <p><?= htmlspecialchars($application['job_title']) ?></p>
                    </div>
                    <div class="mb-3">
                        <span class="info-label">Catégorie:</span>
                        <p><?= htmlspecialchars($application['category']) ?></p>
                    </div>
                    <div class="mb-3">
                        <span class="info-label">Date limite:</span>
                        <p><?= date('d/m/Y', strtotime($application['expiry_date'])) ?></p>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h4 class="border-bottom pb-2">Informations candidat</h4>
                    <div class="mb-3">
                        <span class="info-label">Nom complet:</span>
                        <p><?= htmlspecialchars($application['full_name']) ?></p>
                    </div>
                    <div class="mb-3">
                        <span class="info-label">Email:</span>
                        <p><a href="mailto:<?= htmlspecialchars($application['email']) ?>">
                            <?= htmlspecialchars($application['email']) ?>
                        </a></p>
                    </div>
                    <div class="mb-3">
                        <span class="info-label">Téléphone:</span>
                        <p><?= $application['phone'] ? htmlspecialchars($application['phone']) : 'Non renseigné' ?></p>
                    </div>
                    <div class="mb-3">
                        <span class="info-label">Adresse:</span>
                        <p><?= $application['address'] ? nl2br(htmlspecialchars($application['address'])) : 'Non renseignée' ?></p>
                    </div>
                </div>
            </div>

            <div class="document-section">
                <h4 class="border-bottom pb-2">Lettre de motivation</h4>
                <div class="mb-4">
                    <?= nl2br(htmlspecialchars($application['cover_letter'])) ?>
                </div>

                <h4 class="border-bottom pb-2">Curriculum Vitae</h4>
                <div class="d-flex align-items-center">
                    <i class="bi bi-file-earmark-pdf fs-1 me-3 text-danger"></i>
                    <div>
                        <p class="mb-1">CV du candidat</p>
                        <a href="../../assets/img/<?= htmlspecialchars($application['cv_path']) ?>" 
                           class="btn btn-sm btn-primary" download>
                           <i class="bi bi-download"></i> Télécharger le CV
                        </a>
                    </div>
                </div>
            </div>

            <form method="POST" class="mt-4">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="index.php<?= isset($_GET['job_id']) ? '?job_id=' . intval($_GET['job_id']) : '' ?>" 
                       class="btn btn-outline-secondary">
                       <i class="bi bi-arrow-left"></i> Retour à la liste
                    </a>
                    
                    <div class="d-flex align-items-center">
                        <select class="form-select me-2" name="status" style="width: auto;">
                            <option value="pending" <?= $application['status'] === 'pending' ? 'selected' : '' ?>>En attente</option>
                            <option value="reviewed" <?= $application['status'] === 'reviewed' ? 'selected' : '' ?>>Examiné</option>
                            <option value="accepted" <?= $application['status'] === 'accepted' ? 'selected' : '' ?>>Accepté</option>
                            <option value="rejected" <?= $application['status'] === 'rejected' ? 'selected' : '' ?>>Rejeté</option>
                        </select>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Mettre à jour
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Fonction helper pour la couleur du statut
function getStatusColor($status) {
    switch ($status) {
        case 'accepted': return 'success';
        case 'rejected': return 'danger';
        case 'reviewed': return 'info';
        default: return 'secondary';
    }
}
?>