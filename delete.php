<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Vérifier si l'admin est connecté
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: login.php');
    exit;
}

// Vérifier que l'ID est présent et valide
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    $_SESSION['error_message'] = "ID d'offre invalide";
    header('Location: gestion_offres.php');
    exit;
}

$jobId = (int)$_GET['id'];

try {
    // Démarrer une transaction
    $pdo->beginTransaction();

    // 1. Récupérer le chemin de l'image avant suppression
    $stmt = $pdo->prepare("SELECT image_path FROM jobs WHERE id = ?");
    $stmt->execute([$jobId]);
    $imagePath = $stmt->fetchColumn();

    // 2. Supprimer les candidatures associées (si nécessaire)
    $pdo->prepare("DELETE FROM applications WHERE job_id = ?")->execute([$jobId]);

    // 3. Supprimer l'offre
    $deleteStmt = $pdo->prepare("DELETE FROM jobs WHERE id = ?");
    $deleteStmt->execute([$jobId]);

    // 4. Supprimer le fichier image s'il existe
    if ($imagePath && file_exists('../../' . $imagePath)) {
        unlink('../../' . $imagePath);
    }

    // Valider la transaction
    $pdo->commit();

    $_SESSION['success_message'] = "L'offre a été supprimée avec succès";
    
} catch (PDOException $e) {
    // Annuler en cas d'erreur
    $pdo->rollBack();
    $_SESSION['error_message'] = "Erreur lors de la suppression : " . $e->getMessage();
}

// Rediriger vers la liste des offres
header('Location: gestion_offres.php');
exit;
?>