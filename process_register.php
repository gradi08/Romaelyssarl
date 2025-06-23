<?php
// process_register.php

// 1. Initialisation
session_start();
require_once 'includes/config.php';
require_once 'includes/functions.php';

// 2. Vérification de la méthode de requête
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit();
}

// 3. Récupération et nettoyage des données
$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$full_name = trim($_POST['full_name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$address = trim($_POST['address'] ?? '');

// 4. Validation des données
$errors = [];

// Validation du nom d'utilisateur
if (empty($username)) {
    $errors['username'] = "Le nom d'utilisateur est requis";
} elseif (strlen($username) < 3 || strlen($username) > 50) {
    $errors['username'] = "Le nom d'utilisateur doit contenir entre 3 et 50 caractères";
} elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
    $errors['username'] = "Seuls les lettres, chiffres et underscores sont autorisés";
}

// Validation de l'email
if (empty($email)) {
    $errors['email'] = "L'email est requis";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "L'email n'est pas valide";
}

// Validation du mot de passe
if (empty($password)) {
    $errors['password'] = "Le mot de passe est requis";
} elseif (strlen($password) < 8) {
    $errors['password'] = "Le mot de passe doit contenir au moins 8 caractères";
} elseif ($password !== $confirm_password) {
    $errors['confirm_password'] = "Les mots de passe ne correspondent pas";
}

// Validation du nom complet
if (empty($full_name)) {
    $errors['full_name'] = "Le nom complet est requis";
}

// 5. Vérification des doublons en base de données
if (empty($errors)) {
    try {
        // Vérification du nom d'utilisateur
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetch()) {
            $errors['username'] = "Ce nom d'utilisateur est déjà pris";
        }

        // Vérification de l'email
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            $errors['email'] = "Cet email est déjà utilisé";
        }
    } catch (PDOException $e) {
        $errors['database'] = "Erreur de base de données: " . $e->getMessage();
    }
}

// 6. Traitement des erreurs ou enregistrement
if (!empty($errors)) {
    // Stockage des erreurs et des données soumises dans la session
    $_SESSION['register_errors'] = $errors;
    $_SESSION['old_data'] = [
        'username' => $username,
        'email' => $email,
        'full_name' => $full_name,
        'phone' => $phone,
        'address' => $address
    ];
    header('Location: register.php');
    exit();
}

// 7. Hashage du mot de passe
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 8. Enregistrement en base de données
try {
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password, full_name, phone, address, user_type) 
                           VALUES (?, ?, ?, ?, ?, ?, 'candidate')");
    $stmt->execute([$username, $email, $hashed_password, $full_name, $phone, $address]);
    
    // Récupération de l'ID du nouvel utilisateur
    $user_id = $pdo->lastInsertId();
    
    // Connexion automatique après inscription
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['user_type'] = 'candidate';
    $_SESSION['success'] = "Inscription réussie! Bienvenue parmi nous.";
    
    header('Location: index.php');
    exit();
    
} catch (PDOException $e) {
    $_SESSION['register_errors']['database'] = "Erreur lors de l'inscription: " . $e->getMessage();
    header('Location: register.php');
    exit();
}