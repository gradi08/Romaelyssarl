<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: profile.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$current_password = $_POST['current_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Validation
$errors = [];

if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
    $errors[] = "Tous les champs doivent être remplis";
} elseif ($new_password !== $confirm_password) {
    $errors[] = "Les nouveaux mots de passe ne correspondent pas";
} elseif (strlen($new_password) < 8) {
    $errors[] = "Le nouveau mot de passe doit contenir au moins 8 caractères";
}

if (empty($errors)) {
    try {
        // Vérifier le mot de passe actuel
        $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch();
        
        if (!$user || !password_verify($current_password, $user['password'])) {
            $errors[] = "Le mot de passe actuel est incorrect";
        } else {
            // Mettre à jour le mot de passe
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
            $stmt->execute([$hashed_password, $user_id]);
            
            $_SESSION['profile_success'] = "Mot de passe changé avec succès";
        }
    } catch (PDOException $e) {
        $errors[] = "Erreur de base de données";
    }
}

if (!empty($errors)) {
    $_SESSION['profile_error'] = implode("<br>", $errors);
}

header('Location: profile.php');
exit();