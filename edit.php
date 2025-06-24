<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotAdmin();

// Vérifier si l'ID de l'offre est présent
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error'] = "Offre invalide";
    header('Location: index.php');
    exit();
}

$job_id = intval($_GET['id']);

// Récupérer les données actuelles de l'offre
$stmt = $pdo->prepare("SELECT * FROM jobs WHERE id = ?");
$stmt->execute([$job_id]);
$job = $stmt->fetch();

if (!$job) {
    $_SESSION['error'] = "Offre introuvable";
    header('Location: index.php');
    exit();
}

// Traitement du formulaire de modification
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $requirements = trim($_POST['requirements']);
    $expiry_date = $_POST['expiry_date'];
    $category = trim($_POST['category']);
    $published = isset($_POST['published']) ? 1 : 0;
    
    // Validation des données
    if (empty($title) || empty($description) || empty($requirements) || empty($expiry_date) || empty($category)) {
        $error = "Tous les champs obligatoires doivent être remplis";
    } elseif (strtotime($expiry_date) < strtotime('today')) {
        $error = "La date d'expiration doit être dans le futur";
    } else {
        // Gestion de l'upload de la nouvelle image
        $image_path = $job['image_path'];
        
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $upload_dir = '/assets/img/';
            $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
            $target_file = $upload_dir . $image_name;
            
            // Vérifier le type de fichier
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            
            if (in_array($imageFileType, $allowed_types)) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    // Supprimer l'ancienne image si elle existe
                    if ($image_path && file_exists('../../' . $image_path)) {
                        unlink('../../' . $image_path);
                    }
                    $image_path = 'assets/img/' . $image_name;
                } else {
                    $error = "Erreur lors de l'upload de l'image";
                }
            } else {
                $error = "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés";
            }
        }
        
        // Mise à jour en base de données si aucune erreur
        if (empty($error)) {
            try {
                $stmt = $pdo->prepare("UPDATE jobs SET 
                    title = ?, 
                    description = ?, 
                    requirements = ?, 
                    expiry_date = ?, 
                    category = ?, 
                    image_path = ?, 
                    published = ?,
                    updated_at = NOW()
                    WHERE id = ?");
                
                $stmt->execute([
                    $title, 
                    $description, 
                    $requirements, 
                    $expiry_date, 
                    $category, 
                    $image_path, 
                    $published,
                    $job_id
                ]);
                
                $_SESSION['success'] = "Offre mise à jour avec succès";
                header('Location: gestion_offres.php');
                exit();
            } catch(PDOException $e) {
                $error = "Erreur lors de la mise à jour: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'offre - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .form-container {
            max-width: 800px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .form-header {
            border-bottom: 1px solid #eee;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .current-image {
            max-width: 200px;
            max-height: 150px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2><i class="bi bi-pencil-square"></i> Modifier l'offre</h2>
                <p class="text-muted">ID: #<?= $job_id ?></p>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="title" class="form-label">Titre de l'offre *</label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="<?= htmlspecialchars($job['title']) ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="category" class="form-label">Catégorie *</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Sélectionner...</option>
                            <option value="Nettoyage" <?= $job['category'] === 'Nettoyage' ? 'selected' : '' ?>>Nettoyage</option>
                            <option value="Sécurité" <?= $job['category'] === 'Sécurité' ? 'selected' : '' ?>>Sécurité</option>
                            <option value="Informatique" <?= $job['category'] === 'Informatique' ? 'selected' : '' ?>>Informatique</option>
                            <option value="Électricité" <?= $job['category'] === 'Électricité' ? 'selected' : '' ?>>Électricité</option>
                            <option value="Autre" <?= $job['category'] === 'Autre' ? 'selected' : '' ?>>Autre</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description *</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required><?= htmlspecialchars($job['description']) ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="requirements" class="form-label">Exigences *</label>
                    <textarea class="form-control" id="requirements" name="requirements" rows="5" required><?= htmlspecialchars($job['requirements']) ?></textarea>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expiry_date" class="form-label">Date d'expiration *</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" 
                               value="<?= htmlspecialchars($job['expiry_date']) ?>" required 
                               min="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Image (optionnel)</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                        
                        <?php if ($job['image_path']): ?>
                            <div class="mt-2">
                                <p class="mb-1">Image actuelle:</p>
                                <img src="../../<?= htmlspecialchars($job['image_path']) ?>" class="current-image" alt="Image actuelle">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remove_image" name="remove_image">
                                    <label class="form-check-label" for="remove_image">
                                        Supprimer cette image
                                    </label>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="published" name="published" <?= $job['published'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="published">Publier cette offre</label>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Annuler
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Gestion de la suppression d'image
        document.getElementById('remove_image')?.addEventListener('change', function() {
            if (this.checked) {
                document.querySelector('.current-image').style.opacity = '0.5';
            } else {
                document.querySelector('.current-image').style.opacity = '1';
            }
        });
        
        // Validation de la date
        document.querySelector('form').addEventListener('submit', function(e) {
            const expiryDate = new Date(document.getElementById('expiry_date').value);
            const today = new Date();
            today.setHours(0, 0, 0, 0);
            
            if (expiryDate < today) {
                e.preventDefault();
                alert("La date d'expiration doit être aujourd'hui ou dans le futur");
            }
        });
    </script>
</body>
</html>