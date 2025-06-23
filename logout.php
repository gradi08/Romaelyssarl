<?php
// logout.php
session_start();

// Suppression des variables de session
$_SESSION = array();

// Suppression du cookie de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destruction de la session
session_destroy();

// Suppression du cookie "Se souvenir de moi"
setcookie('remember_token', '', time() - 3600, '/');

// Redirection vers la page de connexion
header('Location: login.php');
exit();
?>