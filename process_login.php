<?php
// process_login.php

// 1. Initialisation
session_start();
require_once 'includes/config.php';
require_once 'includes/functions.php';

// 2. Vérification de la méthode de requête
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit();
}

// 3. Récupération et nettoyage des données
$username_or_email = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

// 4. Validation des données
if (empty($username_or_email) || empty($password)) {
    $_SESSION['login_error'] = "Veuillez remplir tous les champs";
    header('Location: login.php');
    exit();
}

// 5. Recherche de l'utilisateur
try {
    // Vérifier si l'identifiant est un email ou un nom d'utilisateur
    $is_email = filter_var($username_or_email, FILTER_VALIDATE_EMAIL);
    
    $query = $is_email 
        ? "SELECT * FROM users WHERE email = ?"
        : "SELECT * FROM users WHERE username = ?";
    
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username_or_email]);
    $user = $stmt->fetch();

    // 6. Vérification de l'utilisateur et du mot de passe
    if (!$user || !password_verify($password, $user['password'])) {
        $_SESSION['login_error'] = "Identifiants incorrects";
        header('Location: login.php');
        exit();
    }

    // 7. Connexion réussie - création de la session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_type'] = $user['user_type'];
    $_SESSION['full_name'] = $user['full_name'];

    // 8. Option "Se souvenir de moi"
    if ($remember) {
        $token = bin2hex(random_bytes(32));
        $expiry = date('Y-m-d H:i:s', strtotime('+30 days'));
        
        // Stocker le token en base de données
        $stmt = $pdo->prepare("UPDATE users SET remember_token = ?, token_expiry = ? WHERE id = ?");
        $stmt->execute([$token, $expiry, $user['id']]);
        
        // Créer un cookie sécurisé
        setcookie('remember_token', $token, [
            'expires' => strtotime('+30 days'),
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => 'Strict'
        ]);
    }

    // 9. Redirection selon le type d'utilisateur
    $redirect = $user['user_type'] === 'admin' ? 'admin/dashboard.php' : 'index.php';
    header("Location: $redirect");
    exit();

} catch (PDOException $e) {
    $_SESSION['login_error'] = "Erreur de connexion. Veuillez réessayer.";
    header('Location: login.php');
    exit();
}