<?php
// Démarrer la session
session_start();

// Détruire la session
session_unset();
session_destroy();

// Définir une variable de session pour indiquer que l'utilisateur est déconnecté
$_SESSION['isConnected'] = false;

// Répondre au format JSON
header('Content-Type: application/json');
echo json_encode(array('isConnected' => false));

// Rediriger l'utilisateur vers la page d'accueil
header("Location: index.html");
exit;
?>
