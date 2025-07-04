<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotLoggedIn();

if (!isset($_GET['job_id']) || !is_numeric($_GET['job_id'])) {
    header('Location: nos_offres.php');
    exit();
}

$job_id = $_GET['job_id'];
$user_id = $_SESSION['user_id'];

// Vérifier si l'offre existe
$stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = ? AND published = 1 AND expiry_date >= CURDATE()");
$stmt->execute([$job_id]);
$job = $stmt->fetch();

if (!$job) {
    $_SESSION['error'] = "Offre non disponible ou expirée";
    header('Location: nos_offres.php');
    exit();
}

// Vérifier si l'utilisateur a déjà postulé
$stmt = $pdo->prepare("SELECT id FROM applications WHERE user_id = ? AND job_id = ?");
$stmt->execute([$user_id, $job_id]);

if ($stmt->fetch()) {
    $_SESSION['error'] = "Vous avez déjà postulé à cette offre";
    header('Location: nos_offres.php');
    exit();
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cover_letter = $_FILES['cover_letter']['name'];
    
    // Validation
    if (empty($cover_letter)) {
        $error = "La lettre de motivation est requise";
    } elseif (!isset($_FILES['cv']) || $_FILES['cv']['error'] !== UPLOAD_ERR_OK) {
        $error = "Veuillez uploader votre CV";
    } else {
        // Traitement du fichier CV
        $upload_dir = 'asset/cvs/';
        $cv_name = uniqid() . '_' . basename($_FILES['cv']['name']);
        $target_file = $upload_dir . $cv_name;
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Traitement du fichier lettre de motivation
        $upload_dirs = 'asset/lettre/';
        $cv_names = uniqid() . '_' . basename($_FILES['cover_letter']['name']);
        $target_files = $upload_dirs . $cv_names;
        $file_types = strtolower(pathinfo($target_files, PATHINFO_EXTENSION));
        
        // Vérifier le type de fichier
        $allowed_types = ['pdf', 'doc', 'docx'];
        if (!in_array($file_type, $allowed_types)) {
            $error = "Seuls les fichiers PDF, DOC et DOCX sont autorisés";
        } elseif ($_FILES['cv']['size'] > 2000000) { // 2MB max
            $error = "Le fichier est trop volumineux (max 2MB)";
        } elseif (move_uploaded_file($_FILES['cv']['tmp_name'], $target_file) && move_uploaded_file($_FILES['cover_letter']['tmp_name'], $target_files)) {
            // Enregistrer la candidature
            try {
                $stmt = $pdo->prepare("INSERT INTO applications (user_id, job_id, cover_letter, cv_path) VALUES (?, ?, ?, ?)");
                $stmt->execute([$user_id, $job_id, 'asset/lettre/' . $cv_names, 'asset/cvs/' . $cv_name]);
                
                $_SESSION['success'] = "Votre candidature a été envoyée avec succès!";
                header('Location: index.php');
                exit();
            } catch(PDOException $e) {
                $error = "Erreur: " . $e->getMessage();
            }
        } else {
            $error = "Erreur lors de l'upload du CV";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postuler - <?= $job['title'] ?></title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .application-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .job-header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container">
        <div class="application-container">
            <div class="job-header">
                <h3><i class="bi bi-briefcase"></i> <?= htmlspecialchars($job['title']) ?></h3>
                <p class="text-muted"><?= htmlspecialchars($job['category']) ?></p>
                <p>Date limite: <?= date('d/m/Y', strtotime($job['expiry_date'])) ?></p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="cover_letter" class="form-label">Lettre de motivation *</label>
                    <input type="file" class="form-control" id="cover_letter" name="cover_letter" accept=".pdf,.doc,.docx" required>
                    <div class="form-text">Taille maximale: 2MB</div>
                </div>
                
                <div class="mb-4">
                    <label for="cv" class="form-label">CV (PDF ou Word) *</label>
                    <input type="file" class="form-control" id="cv" name="cv" required accept=".pdf,.doc,.docx">
                    <div class="form-text">Taille maximale: 2MB</div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="../jobs.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send"></i> Envoyer ma candidature
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>