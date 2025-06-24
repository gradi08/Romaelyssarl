<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotLoggedIn();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: profile.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$full_name = trim($_POST['full_name']);
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');

// Validation
$errors = [];

if (empty($full_name) || empty($email) || empty($username)) {
    $errors[] = "Tous les champs obligatoires doivent être remplis";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "L'email n'est pas valide";
}

// Vérifier l'unicité de l'email et du nom d'utilisateur
try {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE (email = ? OR username = ?) AND id != ?");
    $stmt->execute([$email, $username, $user_id]);
    
    if ($stmt->fetch()) {
        $errors[] = "L'email ou le nom d'utilisateur est déjà utilisé";
    }
} catch (PDOException $e) {
    $errors[] = "Erreur de base de données";
}

if (empty($errors)) {
    try {
        $stmt = $pdo->prepare("UPDATE users SET full_name = ?, email = ?, username = ?, phone = ?, address = ? WHERE id = ?");
        $stmt->execute([$full_name, $email, $username, $phone, $address, $user_id]);
        
        // Mettre à jour les données de session
        $_SESSION['username'] = $username;
        $_SESSION['full_name'] = $full_name;
        
        $_SESSION['profile_success'] = "Profil mis à jour avec succès";
    } catch (PDOException $e) {
        $_SESSION['profile_error'] = "Erreur lors de la mise à jour du profil";
    }
} else {
    $_SESSION['profile_error'] = implode("<br>", $errors);
}

header('Location: profile.php');
exit();