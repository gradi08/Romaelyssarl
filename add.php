<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotAdmin();

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title =trim($_POST['title']);
    $description = trim($_POST['description']);
    $requirements = trim($_POST['requirements']);
    $expiry_date = $_POST['expiry_date'];
    $category = trim($_POST['category']);
    $published = isset($_POST['published']) ? 1 : 0;
    
    // Upload de l'image
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'asset/img/';
        $image_name = uniqid() . '_' . basename($_FILES['image']['name']);
        $target_file = $upload_dir . $image_name;
        
        // Vérifier le type de fichier
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $image_path = 'asset/img/' . $image_name;
            } else {
                $error = "Erreur lors de l'upload de l'image.";
            }
        } else {
            $error = "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        }
    }
    
    if (empty($error)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO jobs (title, description, requirements, expiry_date, category, image_path, published) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $description, $requirements, $expiry_date, $category, $image_path, $published]);
            
            $_SESSION['success'] = "Offre d'emploi ajoutée avec succès!";
            header('Location: index.php');
            exit();
        } catch(PDOException $e) {
            $error = "Erreur: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une offre - Admin</title>
    <link rel="stylesheet" href="asset/css/style.css"> 
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
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="container">
        <div class="form-container">
            <div class="form-header">
                <h2><i class="bi bi-briefcase"></i> Ajouter une nouvelle offre</h2>
            </div>
            
            <?php if ($error): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-8">
                        <label for="title" class="form-label">Titre de l'offre *</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="col-md-4">
                        <label for="category" class="form-label">Catégorie *</label>
                        <select class="form-select" id="category" name="category" required>
                            <option value="">Sélectionner...</option>
                            <option value="Nettoyage">Nettoyage</option>
                            <option value="Sécurité">Sécurité</option>
                            <option value="Informatique">Informatique</option>
                            <option value="Électricité">Électricité</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description *</label>
                    <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="requirements" class="form-label">Exigences *</label>
                    <textarea class="form-control" id="requirements" name="requirements" rows="5" required></textarea>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="expiry_date" class="form-label">Date d'expiration *</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" required min="<?= date('Y-m-d') ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Image (optionnel)</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/*">
                    </div>
                </div>
                
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="published" name="published">
                    <label class="form-check-label" for="published">Publier immédiatement</label>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="index.php" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Retour
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>