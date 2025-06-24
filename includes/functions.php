<?php
function shortenText($text, $max_length = 100) {
    if (strlen($text) > $max_length) {
        return substr($text, 0, $max_length) . '...';
    }
    return $text;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function isAdmin() {
    return isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'admin';
}

function redirectIfNotLoggedIn() {
    if (!isLoggedIn()) {
        header('Location: ../login.php');
        exit();
    }
}

function redirectIfNotAdmin() {
    redirectIfNotLoggedIn();
    if (!isAdmin()) {
        header('Location: ../index.php');
        exit();
    }
}

// function redirectIfAdmin() {
//     redirectIfNotLoggedIn();
//     if (!isAdmin()) {
//         header('Location: ../dashbord.php');
//         exit();
//     }
// }
?>