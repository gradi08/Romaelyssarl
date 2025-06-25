<?php

require_once 'includes/config.php';
require_once 'includes/functions.php';

redirectIfNotAdmin();


// Connexion à la base de données (exemple avec PDO)
try {
    
    // ID de l'élément à supprimer (exemple ici : récupéré depuis l'URL)
    $id = $_GET['id'];

    // Préparer la requête de suppression
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    // Exécuter
    if ($stmt->execute()) {

        header('Location: index.php?'); "✅ L'utilisateur a été supprimé avec succès.";
    } else {
        echo "❌ Une erreur est survenue lors de la suppression.";
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>


